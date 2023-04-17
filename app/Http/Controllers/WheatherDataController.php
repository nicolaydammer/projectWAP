<?php

namespace App\Http\Controllers;

use App\Http\Requests\WheatherDataRequest;
use App\Models\IncorrectData;
use App\Models\Station;
use App\Models\WheatherData;
use http\Env\Request;
use Illuminate\Support\Carbon;

class WheatherDataController
{
    public function index(WheatherDataRequest $request)
    {
        $correctData = true;
        $fillableData = WheatherData::getFillable();
        foreach ($fillableData as $data) {
            if ($data === 'temp') {
                if (!$this->controlTemperature($request, $data)) {
                    $correctData = false;
                    //$request->get($data) = $this->calculateNewData($request, $data);
                }
            }
            if ($request->get($data) === 'null') {
                $correctData = false;
                //$request->get($data) = $this->calculateNewData($request, $data);
            }

        }
        $stationId = Station::find($request->get('stn'));
        if (!$correctData){
            $incorrectData = new IncorrectData();
            $incorrectData->station_id = $stationId;
            $this->addData($request, $incorrectData);
        }
        else {
            $wheatherData = new WheatherData();
            $wheatherData->station_id = $stationId;
            $this->addData($request, $wheatherData);
        }
    }

    public function addData(WheatherDataRequest $request, $model)
    {
        $model->date_time = Carbon::parse($request->get('date').$request->get('time')) ;
        $model->temperature = $request->get('temp');
        $model->dewpoint = $request->get('dewp');
        $model->standard_pressure = $request->get('stp');
        $model->sea_level_pressure = $request->get('SLP');
        $model->visibility = $request->get('visib');
        $model->wind_speed = $request->get('wdsp');
        $model->precipation = $request->get('prcp');
        $model->snow_depth = $request->get('sndp');
        $model->humidity = $request->get('frshtt');
        $model->cloud_cover = $request->get('cldc');
        $model->wind_direction = $request->get('wnddir');
    }

    public function controlTemperature(WheatherDataRequest $request, $data)
    {
        if ($request->get($data) > $this->calculateNewData($request, $data) * 1.2||$request->get($data) < $this->calculateNewData($request, $data) * 0.8 ) {
            return false;
        }
        return true;
    }

    public function calculateNewData(WheatherDataRequest $request,$data)
    {
        $nrDataPoints = 30;
        $totalOfData = 0;
        $totalOfDelta = 0;
        $previousPoint = 0;
        // query 30 data punten van deze station van deze specifieke data ophalen
        $dataPoints = WheatherData::query()->where('station_id', $request->get('stn'), )->value($data)->limit(30);
        // $data = SELECT * FROM wheatherData WHERE station_id = $this->station_id ORDER BY desc
        foreach ($dataPoints as $point) {
              $totalOfData += $point;             // elk punt bij elkaar optellen
              $delta = $point - $previousPoint;   // delta berekenen
              $totalOfDelta += $delta;            // elk delta bij elkaar optellen
              $previousPoint = $point;
        }
        $averageData = $totalOfData / $nrDataPoints;
        $averageDelta = $totalOfDelta / $nrDataPoints;
        return $averageData + $averageDelta;
    }
}