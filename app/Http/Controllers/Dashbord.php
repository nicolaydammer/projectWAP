<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Dashbord extends Controller
{
    public function index(Request $request)
    {
        return view('dashbord');
    }
}
