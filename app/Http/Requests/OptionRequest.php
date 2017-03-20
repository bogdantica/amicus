<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OptionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
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
            'name' => 'string|max:255',
            'label' => 'required|max:255',
            'details' => 'string|nullable|max:100000',
            'required' => 'boolean',
            'cost' => 'boolean',
            'slots' => 'boolean',
            'order' => 'numeric',
            'option_type_id' => 'exists:lookup_option_types,option_type_id'
            //
        ];
    }
}
