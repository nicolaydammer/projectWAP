<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Contract extends Model
{
    use HasFactory;
    /**
     * Get the customer of the contract.
     */
    public function customer(): MorphOne
    {
        return $this->morphOne(Customer::class, 'customerable');
    }

    /**
     * Get the contract specifications associated with the contract.
     */
    public function contractSpecifications(): HasOne
    {
        return $this->hasOne(ContractSpecification::class);
    }
}
