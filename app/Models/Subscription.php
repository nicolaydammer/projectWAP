<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Subscription extends Model
{
    use HasFactory;

    /**
     * Get the customer of the subscription.
     */
    public function customer(): MorphOne
    {
        return $this->morphOne(Customer::class, 'customerable');
    }

    /**
     * The stations that belong to this subscription.
     */
    public function stations(): BelongsToMany
    {
        return $this->belongsToMany(Station::class);
    }
}
