<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

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

    protected $hidden = [
        'updated_at',
        'created_at',
        'country_id',
    ];

    /**
     * Get the country that belongs to these nearestlocations.
     */
    public function country(): HasOne
    {
        return $this->hasOne(Country::class, 'country_code', 'country_id');
    }

    /**
     * Get the stations that belongs to these nearestlocations.
     */
    public function station(): BelongsTo
    {
        return $this->belongsTo(Station::class);
    }
}
