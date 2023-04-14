<?php

namespace App\Http\Controllers;

use App\Http\Requests\WheatherDataRequest;
use App\Models\IncorrectData;
use App\Models\WheatherData;
use http\Env\Request;

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

        if (!$correctData){
            $incorrectData = new IncorrectData();
            $this->addData($request, $incorrectData);
        }
        else {
            $wheatherData = new WheatherData();
            $this->addData($request, $wheatherData);
        }
    }

    public function addData(WheatherDataRequest $request, $model)
    {
        $model->temperature = $request->get('date_time');
        $model->temperature = $request->get('temperature');
        $model->temperature = $request->get('dewpoint');
        $model->temperature = $request->get('standard_pressure');
        $model->temperature = $request->get('sea_level_pressure');
        $model->temperature = $request->get('visibility');
        $model->temperature = $request->get('wind_speed');
        $model->temperature = $request->get('precipation');
        $model->temperature = $request->get('snow_depth');
        $model->temperature = $request->get('humidity');
        $model->temperature = $request->get('cloud_cover');
        $model->temperature = $request->get('wind_direction');
        $model->temperature = $request->get('events');
    }
}