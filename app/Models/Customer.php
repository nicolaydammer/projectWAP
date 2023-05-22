<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Laravel\Sanctum\HasApiTokens;

class Customer extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'api_token'
    ];

    /**
     * Get the parent customerable model (contract or subscription)
     */
    public function customerable():MorphTo
    {

        return $this->morphTo();
    }


}
