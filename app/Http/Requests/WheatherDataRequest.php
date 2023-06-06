<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WheatherDataRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, string>
     */
    public function rules(): array
    {
        return [
            'WEATHERDATA' => 'array',
            'WEATHERDATA.*.DATE' => 'required',
            'WEATHERDATA.*.TIME' => 'required',
            'WEATHERDATA.*.TEMP' => 'required | numeric',
            'WEATHERDATA.*.DEWP' => 'required | numeric',
            'WEATHERDATA.*.STP' => 'required | numeric',
            'WEATHERDATA.*.SLP' => 'required | numeric',
            'WEATHERDATA.*.VISIB' => 'required | numeric',
            'WEATHERDATA.*.WDSP' => 'required | numeric',
            'WEATHERDATA.*.PRCP' => 'required | numeric',
            'WEATHERDATA.*.SNDP' => 'required | numeric',
            'WEATHERDATA.*.FRSHTT' => 'required',
            'WEATHERDATA.*.CLDC' => 'required | numeric',
            'WATHERDATA.*.WNDDIR' => 'required | numeric',
            'WEATHERDATA.*.EVENTS' => 'nullable',
        ];
    }
}
