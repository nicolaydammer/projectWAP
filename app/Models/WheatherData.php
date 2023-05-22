<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WheatherData extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'wheather_data';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'station_id',
        'date_time',
        'temperature',
        'dewpoint',
        'standard_pressure',
        'sea_level_pressure',
        'visibility',
        'wind_speed',
        'precipation',
        'snow_depth',
        'humidity',
        'cloud_cover',
        'wind_direction',
        'events'
    ];

    /**
     * @return array|string[]
     */
    public function getFillable(): array
    {
        return $this->fillable;
    }

    /**
     * Get the station that belongs to these wheather data.
     */
    public function station(): BelongsTo
    {
        return $this->belongsTo(Station::class);
    }

    /**
     * Get the incorrect data associated with this wheather data.
     */
    public function incorrectData(): HasOne
    {
        return $this->HasOne(IncorrectData::class);
    }

}
