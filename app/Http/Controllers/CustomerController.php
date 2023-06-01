<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomerRequest;
use App\Models\Contract;
use App\Models\Country;
use App\Models\Customer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
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

    public function store(StoreCustomerRequest $request): RedirectResponse
    {
        $contract = new Contract();
        $contract->frequency = $request->get('frequency');
        $contract->update_time = $request->get('time') ?? null;

        $contract->save();

        $contract->contractSpecifications()->create([
            'latitude' => $request->get('latitude') ?? null,
            'longitude' => $request->get('longitude') ?? null,
            'timezone' => $request->get('timezone') ?? null,
            'country' => $request->get('country') ? Country::query()->where('country', $request->get('country'))->value('id') : null,
            'Data_specifications' => json_encode($request->get('customerDataList')),
            'contract_id' => $contract->id,
        ]);

        $contract->customer()->create([
            'name' => $request->get('customerName'),
            'customerable_type' => '\App\Models\Subscription',
            'customerable_id' => $contract->id,
            'api_token' => hash('sha256', Str::uuid()),
        ]);

        return response()->redirectTo('customers');
    }

    public function getQuery(Request $request): array
    {
        $customer = Customer::query()->where('api_token', '=', $request->bearerToken())->first();

        // query 1 : temperatuur =< 13.9 en neerslag europa/japan
        // query 2 : top 10 windsnelheid europa
    }

    public function create(): View
    {
        return view('customers.create');
    }
}
