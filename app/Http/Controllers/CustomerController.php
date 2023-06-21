<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomerRequest;
use App\Models\Contract;
use App\Models\Country;
use App\Models\Customer;
use App\Models\Geolocation;
use App\Models\WheatherData;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $dateTime = Carbon::now()
            ->subDay()
            ->subDay()
            ->timezone('Europe/Amsterdam')
            ->format('Y-m-d H:i:s');
        $dateTimeQuery = "date_time >= '$dateTime'";

        if ($nr === 1) {

            $europeData = WheatherData::query()
                ->select('wheather_data.station_id', 'precipation')
                ->join(DB::raw('(select station_id, max(date_time) as date_time from wheather_data group by station_id)a'), function ($join) {
                    $join->on('wheather_data.station_id', '=', 'a.station_id');
                    $join->on('wheather_data.date_time', '=', 'a.date_time');
                })
                ->with('station.geolocation.country')
                ->where('temperature', '<=', '13.9')
                ->whereHas('station.geolocation.country', function ($builder) {
                    $builder->whereIn('country_code', self::$europeanCountries);
                })
                ->orderBy('wheather_data.station_id')
                ->get()->toArray();



            $japanData = WheatherData::query()
                ->select('wheather_data.station_id', 'precipation')
                ->join(DB::raw('(select station_id, max(date_time) as date_time from wheather_data group by station_id)a'), function ($join) {
                    $join->on('wheather_data.station_id', '=', 'a.station_id');
                    $join->on('wheather_data.date_time', '=', 'a.date_time');
                })
                ->with('station.geolocation.country')
                ->where('temperature', '<=', '13.9')
                ->whereHas('station.geolocation.country', function ($builder) {
                    $builder->whereIn('country_code', ['JP']);
                })
                ->orderBy('wheather_data.station_id')
                ->get()->toArray();

            return ['europe' => $europeData, 'japan' => $japanData];
        }

        if ($nr === 2) {
            return WheatherData::query()
                ->selectRaw('station_id, max(wind_speed) as wind_speed')
                ->whereIn('station_id', $europeanStations)
                ->groupBy('station_id')
                ->whereRaw($dateTimeQuery)
                ->limit(10)
                ->orderBy('wind_speed', 'desc')
                ->with('station.geolocation.country')
                ->get();
        }

        throw new \InvalidArgumentException('invalid query number given');
// query 1 : temperatuur =< 13.9 en neerslag europa/japan
// query 2 : top 10 windsnelheid europa
    }

    public
    function create(): View
    {
        return view('customers.create');
    }
}
