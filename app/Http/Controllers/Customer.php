<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomerRequest;
use App\Models\Contract;
use App\Models\ContractSpecification;
use App\Models\Country;

class Customer extends Controller
{
    public function store(StoreCustomerRequest $request) {
        $contract = new Contract();
        $contract->customer()->name = $request->get('customerName');
        $contract->frequency = $request->get('frequency');
        $contract->update_time = $request->get('time') ?? null;
        $contract->contractSpecifications()->latitude = $request->get('latitude') ?? null;
        $contract->contractSpecifications()->longitude = $request->get('longitude') ?? null;
        $contract->contractSpecifications()->timezone = $request->get('timezone') ?? null;
        $contract->contractSpecifications()->dataSpecifications = $request->get('customerDataList');
        $contract->contractSpecifications()->country = $request->get('country') !== null ? Country::query()->where('country', $request->get('country'))->value('id') : null;

        $contract->save();

    }
}

