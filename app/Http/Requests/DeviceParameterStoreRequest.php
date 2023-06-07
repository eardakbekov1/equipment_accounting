<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeviceParameterStoreRequest extends FormRequest
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
            'device_id' => 'required|integer|min:0|max:99999999999',
            'name' => 'required|string|max:255',
            'unit' => 'nullable|string|max:255',
            'd_p_value' => 'required|string|max:255',
            'notes' => 'nullable|string|max:255'
        ];
    }
}
