<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomerRequest;
use App\Models\Contract;
use App\Models\Country;
use App\Models\Customer;
use App\Models\Geolocation;
use App\Models\Station;
use App\Models\WheatherData;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Illuminate\View\View;

class CustomerController extends Controller
{
    public static array $europeanCountries = [
        'AD',
        'AL',
        'AT',
        'BA',
        'BE',
        'BG',
        'BY',
        'CH',
        'CY',
        'CZ',
        'DE',
        'DK',
        'EE',
        'ES',
        'FI',
        'FR',
        'GR',
        'HR',
        'HU',
        'IE',
        'IS',
        'IT',
        'LI',
        'LT',
        'LU',
        'LV',
        'MC',
        'MD',
        'ME',
        'MK',
        'MT',
        'NL',
        'NO',
        'PL',
        'PT',
        'RO',
        'RS',
        'RU',
        'SE',
        'SI',
        'SK',
        'SM',
        'TR',
        'UA',
        'GB',
        'VA',
    ];

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

    public function getQuery(Request $request, int $nr)
    {
        $customer = Customer::query()->where('api_token', '=', $request->bearerToken())->first();

        if ($nr === 1) {
            $europeanStations = Geolocation::query()
                ->whereHas('country', function (Builder $builder) {
                    $builder->whereIn('country_code', self::$europeanCountries);
                })->pluck('station_id')->toArray();

            $japaneseStations = Geolocation::query()
                ->whereHas('country', function (Builder $builder) {
                    $builder->where('country_code', '=', 'JP');
                })->pluck('station_id')->toArray();

            $allStations = array_merge($europeanStations, $japaneseStations);

            return WheatherData::query()
                ->selectRaw('station_id, max(date_time) as date_time, temperature, precipation')
                ->whereIn('station_id', $allStations)
                ->groupBy(['station_id', 'temperature', 'precipation'])
                ->havingRaw('temperature <= 13.9 and date_time >= (NOW() - 1)')
                ->get();
        }

        // query 1 : temperatuur =< 13.9 en neerslag europa/japan
        // query 2 : top 10 windsnelheid europa
        return [];
    }

    public function create(): View
    {
        return view('customers.create');
    }
}
