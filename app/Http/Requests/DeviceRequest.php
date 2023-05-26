<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DeviceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
//    public function authorize()
//    {
////        return false;
//    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $flag = true;

        if (request()->isMethod('post')) {
            $flag = false;
        }

        return [
            'd_name_id' => 'required|integer|min:0|max:99999999999',
            'd_model_id' => 'required|integer|min:0|max:99999999999',
            'sponsor_inventory' => ['string', 'nullable', 'max:255', $flag ?  Rule::unique('devices')->ignore($this->route('device')) : 'unique:devices'],
            'implementer_inventory' => ['string', 'nullable', 'max:255', $flag ?  Rule::unique('devices')->ignore($this->route('device')) : 'unique:devices'],
            'parent_id' => 'integer|min:0|max:99999999999|nullable',
            'purpose_id' => 'integer|min:0|max:99999999999|nullable',
            'serial_number' => ['required', 'string', 'max:255', $flag ?  Rule::unique('devices')->ignore($this->route('device')) : 'unique:devices'],
            'location_id' => 'integer|min:0|max:99999999999|nullable',
            'condition_id' => 'integer|min:0|max:99999999999|nullable',
            'notes' => 'string|max:255|nullable'
        ];
    }
}
