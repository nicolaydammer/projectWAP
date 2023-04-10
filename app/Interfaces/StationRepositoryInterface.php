<?php

namespace App\Interfaces;

interface StationRepositoryInterface
{
    public static function getAllStations();

    public static function getAllInvalidStations();

    public static function getStationById(int $id);
}