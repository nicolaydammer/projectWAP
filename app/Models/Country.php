<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Country extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'country_code',
        'country',
    ];

    /**
     * Get the contract specifications associated with the country.
     */
    public function contractSpecifications(): HasMany
    {
        return $this->hasMany(ContractSpecification::class);
    }

    /**
     * Get the geolocations associated with the country.
     */
    public function geolocations(): HasMany
    {
        return $this->hasMany(Geolocation::class);
    }

    /**
     * Get the nearestlocations associated with the country.
     */
    public function neareslocations(): HasMany
    {
        return $this->hasMany(NearestLocation::class);
    }

    /**
     * Get the employees associated with the country.
     */
    public function employees(): HasMany
    {
        return $this->hasMany(Employee::class);
    }
}
