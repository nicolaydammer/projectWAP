<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Station extends Model
{
    protected $fillable = [
        'name',
        'longitude',
        'latitude',
        'elevation',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    /**
     * Get the nearestlocations associated with the station.
     */
    public function nearestlocations(): HasOne
    {
        return $this->hasOne(NearestLocation::class, 'station_id','name');
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
