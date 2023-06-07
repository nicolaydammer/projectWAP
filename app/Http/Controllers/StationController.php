<?php

namespace App\Http\Controllers;

use App\Models\Station;
use App\Repositories\StationRepository;
use Illuminate\Http\Request;

class StationController extends Controller
{
    public function ListStations(Request $request)
    {
        return Station::all();
    }

    public function getStationByName(Request $request, int $naam)
    {
        return StationRepository::searchStationByName($naam);
    }
}
