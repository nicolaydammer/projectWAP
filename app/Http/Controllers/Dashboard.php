<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use function Illuminate\Events\queueable;

class dashboard extends Controller
{
    public function index(Request $request)
    {
        return view('dashboard', [
            'name' => "Alwin Stecher",
            'stations' => [
                ['id' => 124, 'city' => 'Groningen', 'status' => 1],
                ['id' => 125, 'city' => 'Groningen', 'status' => 1],
                ['id' => 127, 'city' => 'Groningen', 'status' => 2],
                ['id' => 123, 'city' => 'Groningen', 'status' => 1]
            ]
        ]);
    }


}
