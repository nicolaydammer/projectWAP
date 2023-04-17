<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class Administratie
{
    public function index(Request $request): View
    {
        return view('administratie', [
            'stations' => [
                ['location' => 'Groningen', 'id' => 123],
                ['location' => 'Groningen', 'id' => 124],
                ['location' => 'Groningen', 'id' => 125],
            ]
        ]);
    }
}