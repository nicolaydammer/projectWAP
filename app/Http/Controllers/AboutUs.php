<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use function Illuminate\Events\queueable;


class AboutUs extends Controller
{
    public function index(Request $request): View
    {
        return view('AboutUs');
            }

}
