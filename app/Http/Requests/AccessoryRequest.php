<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AccessoryRequest extends FormRequest
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
        $flag = true;

        if (request()->isMethod('post')) {
            $flag = false;
        }

        return [
            'name' => ['required', 'string', 'max:255', $flag ?  Rule::unique('accessories')->ignore($this->route('accessory')) : 'unique:accessories'],
            'quantity' => 'required|integer|min:0|max:99999999999',
            'notes' => 'nullable|string|max:255',
            'category_id' => 'required|integer|min:0|max:99999999999'
        ];
    }
}
