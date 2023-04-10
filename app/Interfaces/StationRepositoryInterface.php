<?php

namespace App\Interfaces;

use App\Models\Station;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use LaravelIdea\Helper\App\Models\_IH_Station_C;

interface StationRepositoryInterface
{
    public static function getAllStations(array $filter): array|LengthAwarePaginator|_IH_Station_C;

    public static function getAllInvalidStations(array $filter): array|LengthAwarePaginator|_IH_Station_C;

    public static function getStationById(int $id): array|Station|_IH_Station_C;

    public static function searchStationByName(string $name): array|LengthAwarePaginator|_IH_Station_C;
}