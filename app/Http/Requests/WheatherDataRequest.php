<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WheatherDataRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'date_time' => 'required',
            'temperature' => 'required | numeric',
            'dewpoint' => 'required | numeric',
            'standard_pressure' => 'required | numeric',
            'sea_level_pressure' => 'required | numeric',
            'visibility' => 'required | numeric',
            'wind_speed' => 'required | numeric',
            'precipation' => 'required | numeric',
            'snow_depth' => 'required | numeric',
            'humidity' => 'required',
            'cloud_cover' => 'required | numeric',
            'wind_direction' => 'required | numeric',
            'events'
        ];
    }
}
