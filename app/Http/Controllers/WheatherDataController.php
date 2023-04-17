<?php

namespace App\Http\Controllers;

use App\Http\Requests\WheatherDataRequest;
use App\Models\IncorrectData;
use App\Models\Station;
use App\Models\WheatherData;

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

        if (!$correctData){
            // first put incorrect data in the IncorrectData table
            $incorrectData = new IncorrectData();
            $incorrectData->station_id = $stationId;
            $this->addData($request, $incorrectData);
            // create new array with the right data and add this to the WheatherData table
            $wheatherData = new WheatherData();
            $this->addData($request, $wheatherData);
        }
        else {
            // if no incorrect data add data to WheatherData table
            $wheatherData = new WheatherData();
            $wheatherData->station_id = $stationId;
            $this->addData($request, $wheatherData);
        }
    }

    public function addData(WheatherDataRequest $request, $model)
    {
        $arrayDataNames = WheatherData::arrayKeys();
        foreach ($arrayDataNames as $data) {
            if($data === 'temp') {
                if (!$this->controlTemperature($request, $data)) {
                    $model->attr = $this->calculateNewData($request, $data);
                }
                else {
                    $model->attr = $request->get($data);
                }
            }
            elseif ($request->get($data) === 'null') {
                $model->attr = $this->calculateNewData($request, $data);
            }
            else {
                $model->attr = $request->get($data);
            }
        }
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