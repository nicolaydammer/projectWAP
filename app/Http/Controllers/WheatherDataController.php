<?php

namespace App\Http\Controllers;

use App\Http\Requests\WheatherDataRequest;
use App\Models\IncorrectData;
use App\Models\Station;
use App\Models\WheatherData;
use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class WheatherDataController extends Controller
{
    public function index(WheatherDataRequest $request)
    {
        $correctData = true;
        $json = $request->all();
        $wheatherData = $json['WEATHERDATA'];

        foreach ($wheatherData as $data) {
            foreach ($data as $key => $value) {
                if ($key === 'TEMP' && !$this->controlTemperature($value)) {
                    $correctData = false;
                } elseif ($value === 'null') {
                    $correctData = false;
                }
            }
            if (!$correctData){
                $this->incorrectData($data);

            } else {
                $this->correctData($data);
            }
        }
    }

    public function correctData($data)
    {
        $stationId = Station::query()->where('name', $data['STN'])->value('id');

        $correctData = WheatherData::create([
            'station_id' => $stationId,
            'temperature' => $data['TEMP'],
            'date_time' => Carbon::createFromFormat('Y-m-dH:i:s', $data['DATE'] . $data['TIME']),
            'dewpoint' => $data['DEWP'],
            'standard_pressure' => $data['STP'],
            'sea_level_pressure' => $data['SLP'],
            'visibility' => $data['VISIB'],
            'wind_speed' => $data['WDSP'],
            'precipation' => $data['PRCP'],
            'snow_depth' => $data['SNDP'],
            'humidity' => $data['FRSHTT'],
            'cloud_cover' => $data['CLDC'],
            'wind_direction' => $data['WNDDIR'],
        ]);
    }

    public function incorrectData($data)
    {
        $stationId = Station::query()->where('name', $data->get('STN'))->value('id');
        //first add correct data to weatherdata table
        $correctData = WheatherData::create([
            'station_id' => $stationId,
            'temperature' => $this->controlTemperature($data['TEMP']) ? $this->calculateNewValue('temperature') : $data['TEMP'],
            'date_time' => Carbon::createFromFormat('Y-m-dH:i:s', $data['DATE'] . $data['TIME']),
            'dewpoint' => ($data['DEWP'] === 'None') ? $this->calculateNewValue('dewpoint') : $data['DEWP'],
            'standard_pressure' => ($data['STP'] === 'None') ? $this->calculateNewValue('standard_pressure') : $data['STP'],
            'sea_level_pressure' => ($data['SLP'] === 'None') ? $this->calculateNewValue('sea_level_pressure') : $data['SLP'],
            'visibility' => ($data['VISIB'] === 'None') ? $this->calculateNewValue('visibility') : $data['VISIB'],
            'wind_speed' => ($data['WDSP'] === 'None') ? $this->calculateNewValue('wind_speed') : $data['WDSP'],
            'precipation' => ($data['PRCP'] === 'None') ? $this->calculateNewValue('precipation') : $data['PRCP'],
            'snow_depth' => ($data['SNDP'] === 'None') ? $this->calculateNewValue('snow_depth') : $data['SNDP'],
            'humidity' => ($data['FRSHTT'] === 'None') ? $this->calculateNewValue('humidity') : $data['FRSHTT'],
            'cloud_cover' => ($data['CLDC'] === 'None') ? $this->calculateNewValue('cloud_cover') : $data['CLDC'],
            'wind_direction' => ($data['WNDDIR'] === 'None') ? $this->calculateNewValue('wind_direction') : $data['WNDDIR'],
        ]);
        //then put incorrect data in the IncorrectData table
        $incorrectData = IncorrectData::create([
            'wheather_data_id' => $correctData->id,
            'temperature' => $data['TEMP'],
            'dewpoint' => $data['DEWP'],
            'standard_pressure' => $data['STP'],
            'sea_level_pressure' => $data['SLP'],
            'visibility' => $data['VISIB'],
            'wind_speed' => $data['WDSP'],
            'precipation' => $data['PRCP'],
            'snow_depth' => $data['SNDP'],
            'humidity' => $data['FRSHTT'],
            'cloud_cover' => $data['CLDC'],
            'wind_direction' => $data['WNDDIR'],
        ]);
    }

    private function controlTemperature($tempData): bool
    {
        $rawNewData = $this->calculateNewValue('temperature');

        if (! $rawNewData) {
            return true;
        }

        $one = $rawNewData * 1.2;
        $two = $rawNewData * 0.8;

        if ($tempData > $one || $tempData < $two ) {
            return false;
        }
        return true;
    }

    private function getNewData(Collection $points): float | false
    {
        $nrDataPoints = 30;
        $totalOfData = 0;
        $totalOfDelta = 0;
        $previousPoint = 0;

        if ($points->count() < $nrDataPoints) {
            return false;
        }

        foreach ($points as $point) {
            $totalOfData += $point;             // elk punt bij elkaar optellen
            $delta = $point - $previousPoint;   // delta berekenen
            $totalOfDelta += $delta;            // elk delta bij elkaar optellen
            $previousPoint = $point;
        }
        $averageData = $totalOfData / $nrDataPoints;
        $averageDelta = $totalOfDelta / $nrDataPoints;
        return $averageData + $averageDelta;
    }

    private function calculateNewValue(string $dataKey): float | false
    {
        return $this->getNewData(
            WheatherData::query()
                ->where('station_id', request()['STN'])
                ->orderByDesc('date_time')
                ->limit(30)
                ->get()
                ->pluck($dataKey)
        );
    }

    public function retrieveWeatherData(Request $request) {
        $customer = Customer::query()->where('token', '=', $request->header('token'));

        //todo: implement retrieve weather data
        return '';
    }
}