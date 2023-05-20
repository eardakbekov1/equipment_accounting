<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class D_modelRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255', $flag ?  Rule::unique('d_models')->ignore($this->route('d_model')) : 'unique:d_models'],
            'manufacturer_id' => 'required|integer|min:0|max:99999999999'
        ];
    }
}
