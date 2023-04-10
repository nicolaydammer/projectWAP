<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'lastname',
        'postalcode',
        'street',
        'house_number',
        'city',
        'country_id',
        'birthdate',
        'phonenumber'
    ];

    /**
     * Get the country that belongs to these employee.
     */
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }
}
