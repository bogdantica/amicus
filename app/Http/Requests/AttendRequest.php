<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttendRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //todo check if user already attended to this event !
        return true;
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'textOptions.*' => 'string|max:10000',
            'multipleValues.*' => 'attendValues:active,available|sometimes',
            'enumerationValues.*.*' => 'attendValues:active,available|sometimes',

        ];
    }

    public function messages()
    {
        return [
            'textOptions.*.string' => 'Campul trebuie sa fie text !'
        ];
    }
}
