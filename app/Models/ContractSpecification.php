<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ContractSpecification extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'timezone',
        'latitude',
        'longitude',
        'Data_specifications'
    ];

    /**
     * Get the contract that belongs to these specifications.
     */
    public function contract(): BelongsTo
    {
        return $this->belongsTo(Contract::class);
    }

    /**
     * Get the country that belongs to these specifications.
     */
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }
}
