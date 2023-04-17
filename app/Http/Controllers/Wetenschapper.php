<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
//use Couchbase\View;
use App\Models\Station;
use App\Models\WheatherData;
use Illuminate\Http\Request;
use Illuminate\View\View;

class Wetenschapper
{
    public function index(Request $request)
    {
        return view('wetenschapper');
    }

    public function compare(Request $request)
    {
        $stations = Station::pluck('name', 'id');

        return view('scientists.compare', compact('stations'));
    }

    public function compareTwo(Request $request)
    {
        $request->validate([
            'weatherstation1' => 'required|numeric|min:0',
            'weatherstation2' => 'required|numeric|min:0',
        ]);

        $station1 = Station::find($request->weatherstation1);
        $station2 = Station::find($request->weatherstation2);

        $data1 = WheatherData::where('station_id', $request->weatherstation1)->first();
        $data2 = WheatherData::where('station_id', $request->weatherstation2)->first();

        $stations = Station::pluck('name', 'id');

        return view('scientists.compare2', compact('station1','station2','data1','data2','stations'));
    }

    public function getStationData($id)
    {
        // Code to fetch data for the selected station with ID $id from your database or API
        $data = "testdata";

        return response()->json($data);
    }

}