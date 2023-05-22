<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomerRequest;
use App\Models\Contract;
use App\Models\ContractSpecification;
use App\Models\Country;
use App\Models\Subscription;
use http\Env\Response;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;

class Customer extends Controller
{
    public function store(StoreCustomerRequest $request) {
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
}

