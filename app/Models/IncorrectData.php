<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class IncorrectData extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'incorrect_data';

    protected $guarded = [];

    /**
     * Get the wheather data that belongs to this incorrect data.
     */
    public function wheatherData(): BelongsTo
    {
        return $this->belongsTo(WheatherData::class);
    }
}
