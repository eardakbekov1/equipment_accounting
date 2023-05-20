<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EmployeeRequest extends FormRequest
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
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'surname' => 'string|max:255|nullable',
            'organization_id' => 'integer|min:0|max:99999999999|nullable',
            'position_id' => 'integer|min:0|max:99999999999|nullable',
            'phone_number' => ['string', 'max:255', 'nullable', $flag ?  Rule::unique('employees')->ignore($this->route('employee')) : 'unique:employees'],
            'username' => ['nullable', 'string', 'max:255', $flag ?  Rule::unique('employees')->ignore($this->route('employee')) : 'unique:employees'],
            'email' => ['nullable', 'string', 'max:255', $flag ?  Rule::unique('employees')->ignore($this->route('employee')) : 'unique:employees']
        ];
    }
}
