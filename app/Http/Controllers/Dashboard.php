<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class dashboard extends Controller
{
    public function index(Request $request)
    {
        return view('dashboard', ['name' => "Alwin Stecher"]);
    }


}
