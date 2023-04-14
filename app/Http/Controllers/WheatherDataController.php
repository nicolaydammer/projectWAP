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
            if ($request->get($data) === 'null') {
                $correctData = false;
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
}