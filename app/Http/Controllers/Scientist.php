<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class Scientist extends Controller
{
    public function index(): View
    {
        return view('Scientist', [
            'stations' => [
            ['id' => 124, 'city' => 'Groningen', 'status' => 1],
            ['id' => 125, 'city' => 'Groningen', 'status' => 1],
            ['id' => 127, 'city' => 'Groningen', 'status' => 2],
            ['id' => 123, 'city' => 'Groningen', 'status' => 1]
                ]]);
    }
}
