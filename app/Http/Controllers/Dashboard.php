<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Station;
use App\Models\User;
use App\Repositories\StationRepository;
use Illuminate\Http\Request;
use Illuminate\View\View;
use function Illuminate\Events\queueable;

class Dashboard extends Controller
{
    public function index(Request $request): View
    {
        return view('dashboard', [
            'stations' => StationRepository::getAllStations(),
        ]);
    }

    public function search(Request $request)
    {

    }

    public function getStationById(Request $request): Station
    {
        return StationRepository::getStationById($request->get('id'));
    }
}
