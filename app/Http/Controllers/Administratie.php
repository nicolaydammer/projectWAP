<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class Administratie
{
    public function index(Request $request)
    {
        return view('administratie');
    }

}