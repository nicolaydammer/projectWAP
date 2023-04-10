<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    /**
     * Get the country that belongs to these geolocation.
     */
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }
    /**
     * Get the station that belongs to this geolocation.
     */
    public function station(): BelongsTo
    {
        return $this->belongsTo(Station::class);
    }
}
