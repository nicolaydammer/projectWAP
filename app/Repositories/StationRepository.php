<?php

namespace App\Repositories;

use App\Interfaces\StationRepositoryInterface;
use App\Models\Station;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use LaravelIdea\Helper\App\Models\_IH_Station_C;

class StationRepository implements StationRepositoryInterface
{

    public static function getAllStations(): array|LengthAwarePaginator|_IH_Station_C
    {
        return Station::paginate(15);
    }

    public static function getAllInvalidStations(): LengthAwarePaginator|array|_IH_Station_C
    {
        return Station::whereHas('incorrect_data')->paginate(20);
    }

    public static function getStationById(int $id): array|Station|_IH_Station_C
    {
        return Station::findOrFail($id);
    }
}