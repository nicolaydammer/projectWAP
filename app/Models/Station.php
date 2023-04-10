<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    use HasFactory;


    /**
     * Get the nearestlocations associated with the station.
     */
    public function nearestlocations(): HasMany
    {
        return $this->hasMany(NearestLocation::class);
    }
    /**
     * Get the geolocation associated with the station.
     */
    public function geolocation(): HasOne
    {
        return $this->HasOne(NearestLocation::class);
    }

    /**
     * The subscriptions that belong to this station.
     */
    public function subscriptions(): BelongsToMany
    {
        return $this->belongsToMany(Subscription::class);
    }
}
