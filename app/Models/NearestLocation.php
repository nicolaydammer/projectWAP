<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class NearestLocation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'administrative_region1',
        'administrative_region2',
        'longitude',
        'latitude',
        'elevation'
    ];

    /**
     * Get the country that belongs to these nearestlocations.
     */
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    /**
     * Get the stations that belongs to these nearestlocations.
     */
    public function station(): BelongsTo
    {
        return $this->belongsTo(Station::class);
    }
}
