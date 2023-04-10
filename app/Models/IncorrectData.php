<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncorrectData extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'incorrect_data';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
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
     * Get the wheather data that belongs to this incorrect data.
     */
    public function wheatherData(): BelongsTo
    {
        return $this->belongsTo(WheatherData::class);
    }
}
