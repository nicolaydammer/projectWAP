<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class Wetenschapper
{
    public function index(Request $request)
    {
        return view('wetenschapper');
    }

}