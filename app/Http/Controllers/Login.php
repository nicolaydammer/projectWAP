<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class Login extends Controller
{
    public function index(Request $request)
    {
        return view('login');
    }

    public function login(LoginRequest $request)
    {
        return redirect()->route('dashboard');
    }
}
