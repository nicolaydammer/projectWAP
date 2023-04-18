<?php

namespace App\Repositories;

use App\Interfaces\StationRepositoryInterface;
use App\Models\Station;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use LaravelIdea\Helper\App\Models\_IH_Station_C;

class StationRepository implements StationRepositoryInterface
{
    public static function getAllStations(?array $filter): array|LengthAwarePaginator|_IH_Station_C
    {
        if (empty($filter)) {
            return Station::paginate(15);
        }

        return Station::orderBy($filter['order_by'], $filter['order'])
        ->paginate(15);
    }

    public static function getAllInvalidStations(?array $filter): LengthAwarePaginator|array|_IH_Station_C
    {
        return Station::whereHas('incorrect_data')->paginate(15);
    }

    public static function getStationById(int $id): array|Station|_IH_Station_C
    {
        return Station::findOrFail($id);
    }

    public static function searchStationByName(string $name): array|LengthAwarePaginator|_IH_Station_C
    {
        return Station::where('name', 'like', '%' . $name . '%')->paginate(15);
    }
}