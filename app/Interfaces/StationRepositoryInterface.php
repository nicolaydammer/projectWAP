<?php

namespace App\Interfaces;

use App\Models\Station;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use LaravelIdea\Helper\App\Models\_IH_Station_C;

interface StationRepositoryInterface
{
    public static function getAllStations(?array $filter);

    public static function getAllInvalidStations(?array $filter);

    public static function getStationById(int $id);

    public static function searchStationByName(string $name);
}