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
            'date' => 'required',
            'time' => 'required',
            'temp' => 'required | numeric',
            'dewp' => 'required | numeric',
            'stp' => 'required | numeric',
            'slp' => 'required | numeric',
            'visib' => 'required | numeric',
            'wdsp' => 'required | numeric',
            'prcp' => 'required | numeric',
            'sndp' => 'required | numeric',
            'frshtt' => 'required',
            'cldc' => 'required | numeric',
            'wnddir' => 'required | numeric',
            'events'
        ];
    }
}
