<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LocationRequest extends FormRequest
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
            'city_id' => 'required|integer|min:0|max:99999999999',
            'address' => ['required', 'string', 'max:255', $flag ?  Rule::unique('locations')->ignore($this->route('location')) : 'unique:locations']
        ];
    }
}
