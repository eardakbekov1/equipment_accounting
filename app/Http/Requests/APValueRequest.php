<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class APValueRequest extends FormRequest
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
            'accessory_id' => 'required|integer|min:0|max:99999999999',
            'a_parameter_id' => 'required|integer|min:0|max:99999999999',
            'a_p_value' => 'required|string|max:255'
        ];
    }
}
