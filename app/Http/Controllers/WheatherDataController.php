<?php

namespace App\Http\Controllers;

use App\Http\Requests\WheatherDataRequest;
use App\Models\IncorrectData;
use App\Models\Station;
use App\Models\WheatherData;
use App\Models\Customer;
use Illuminate\Http\Request;

class WheatherDataController extends Controller
{
    public function index(WheatherDataRequest $request)
    {
        $correctData = true;
        $arrayDataNames = WheatherData::arrayKeys();
        foreach ($arrayDataNames as $data) {
            if ($data === 'temp') {
                if (!$this->controlTemperature($request, $data)) {
                    $correctData = false;
                }
            }
            if ($request->get($data) === 'null') {
                $correctData = false;
            }

        }
        $stationId = Station::query()->where('name', $request->get('stn'))->value('id');

        if (! $correctData){
            //first add correct data to weatherdata table
            //todo: calculate correct data where data is wrong
            $correctData = WheatherData::create([
                'station_id' => $stationId,
                'temperature' => $this->controlTemperature($request['TEMP']) ? $this->calculateNewValue('temperature') : $request['TEMP'],
                'date_time' => Carbon::createFromFormat('Y-m-dH:i:s', $request['DATE'] . $request['TIME']),
                'dewpoint' => ($request['DEWP'] === 'None') ? $this->calculateNewValue('dewpoint') : $request['DEWP'],
                'standard_pressure' => ($request['STP'] === 'None') ? $this->calculateNewValue('standard_pressure') : $request['STP'],
                'sea_level_pressure' => ($request['SLP'] === 'None') ? $this->calculateNewValue('sea_level_pressure') : $request['SLP'],
                'visibility' => ($request['VISIB'] === 'None') ? $this->calculateNewValue('visibility') : $request['VISIB'],
                'wind_speed' => ($request['WDSP'] === 'None') ? $this->calculateNewValue('wind_speed') : $request['WDSP'],
                'precipation' => ($request['PRCP'] === 'None') ? $this->calculateNewValue('precipation') : $request['PRCP'],
                'snow_depth' => ($request['SNDP'] === 'None') ? $this->calculateNewValue('snow_depth') : $request['SNDP'],
                'humidity' => ($request['FRSHTT'] === 'None') ? $this->calculateNewValue('humidity') : $request['FRSHTT'],
                'cloud_cover' => ($request['CLDC'] === 'None') ? $this->calculateNewValue('cloud_cover') : $request['CLDC'],
                'wind_direction' => ($request['WNDDIR'] === 'None') ? $this->calculateNewValue('wind_direction') : $request['WNDDIR'],
            ]);

            //then put incorrect data in the IncorrectData table
            $incorrectData = IncorrectData::create([
                'wheather_data_id' => $correctData->id,
                'temperature' => $request['TEMP'],
                'dewpoint' => $request['DEWP'],
                'standard_pressure' => $request['STP'],
                'sea_level_pressure' => $request['SLP'],
                'visibility' => $request['VISIB'],
                'wind_speed' => $request['WDSP'],
                'precipation' => $request['PRCP'],
                'snow_depth' => $request['SNDP'],
                'humidity' => $request['FRSHTT'],
                'cloud_cover' => $request['CLDC'],
                'wind_direction' => $request['WNDDIR'],
            ]);
        }
        else {
            $correctData = WheatherData::create([
                'station_id' => $stationId,
                'temperature' => $request['TEMP'],
                'date_time' => Carbon::createFromFormat('Y-m-dH:i:s', $request['DATE'] . $request['TIME']),
                'dewpoint' => $request['DEWP'],
                'standard_pressure' => $request['STP'],
                'sea_level_pressure' => $request['SLP'],
                'visibility' => $request['VISIB'],
                'wind_speed' => $request['WDSP'],
                'precipation' => $request['PRCP'],
                'snow_depth' => $request['SNDP'],
                'humidity' => $request['FRSHTT'],
                'cloud_cover' => $request['CLDC'],
                'wind_direction' => $request['WNDDIR'],
            ]);
        }
    }

    private function controlTemperature(WheatherDataRequest $request, $data)
    {
        if ($request->get($data) > $this->calculateNewData($request, $data) * 1.2||$request->get($data) < $this->calculateNewData($request, $data) * 0.8 ) {
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