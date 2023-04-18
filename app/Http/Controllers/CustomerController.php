<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CustomerController extends Controller
{
    public function index(): View
    {
        $customers = Customer::all();
//        $customertest = Customer::find(1);
//        $relatedData = $customers->customerable;
        return view('customers.index', compact('customers'));
    }

    public function create(): View
    {
        return view('customers.create');
    }
}
