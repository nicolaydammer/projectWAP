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
            'DATE' => 'required',
            'TIME' => 'required',
            'TEMP' => 'required | numeric',
            'DEWP' => 'required | numeric',
            'STP' => 'required | numeric',
            'SLP' => 'required | numeric',
            'VISIB' => 'required | numeric',
            'WDSP' => 'required | numeric',
            'PRCP' => 'required | numeric',
            'SNDP' => 'required | numeric',
            'FRSHTT' => 'required',
            'CLDC' => 'required | numeric',
            'WNDDIR' => 'required | numeric',
            'EVENTS' => 'nullable',
        ];
    }
}
