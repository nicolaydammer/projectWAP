<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use function Illuminate\Events\queueable;

class Dashboard extends Controller
{
    public function index(Request $request): View
    {
        return view('dashboard', [
            'name' => "Ben Vos",
            'stations' => [
                ['id' => 124, 'city' => 'Groningen', 'status' => 1],
                ['id' => 125, 'city' => 'Groningen', 'status' => 1],
                ['id' => 127, 'city' => 'Groningen', 'status' => 2],
                ['id' => 123, 'city' => 'Groningen', 'status' => 1]
            ]
        ]);
    }
}
