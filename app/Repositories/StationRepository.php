<?php

namespace App\Repositories;

use App\Interfaces\StationRepositoryInterface;
use App\Models\Station;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use LaravelIdea\Helper\App\Models\_IH_Station_C;
use LaravelIdea\Helper\App\Models\_IH_Station_QB;

class StationRepository implements StationRepositoryInterface
{
    public static function getAllStations(?array $filter): array|LengthAwarePaginator
    {
        if (empty($filter)) {
            return Station::paginate(15);
        }

        return Station::orderBy($filter['order_by'], $filter['order'])
        ->paginate(15);
    }

    public static function getAllInvalidStations(?array $filter): LengthAwarePaginator|array
    {
        return Station::whereHas('incorrect_data')->paginate(15);
    }

    public static function getStationById(int $id): array|Station
    {
        return Station::findOrFail($id);
    }

    public static function searchStationByName(int $name): array|Collection
    {
        return Station::query()
            ->where('name', 'like', '%' . $name . '%')
            ->with(['nearestLocations', 'nearestLocations.country'])
            ->get();
    }
}