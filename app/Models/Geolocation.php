<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Geolocation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'island',
        'county',
        'place',
        'hamlet',
        'town',
        'municipality',
        'state_district',
        'administrative',
        'state',
        'village',
        'region',
        'province',
        'city',
        'locality',
        'postalcode'
    ];

    protected $hidden = [
        'island',
        'county',
        'place',
        'hamlet',
        'town',
        'municipality',
        'state_district',
        'administrative',
        'state',
        'village',
        'region',
        'province',
        'locality',
        'postalcode',
        'id',
        'station_id',
        'country_id',
        'created_at',
        'updated_at'
    ];

    /**
     * Get the country that belongs to these geolocation.
     */
    public function country(): HasOne
    {
        return $this->hasOne(Country::class, 'country_code','country_id');
    }
    /**
     * Get the station that belongs to this geolocation.
     */
    public function stations(): HasOne
    {
        return $this->HasOne(Station::class, 'name', 'station_id');
    }
}
