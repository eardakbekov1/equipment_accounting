<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
            'name' => ['string', 'required', 'max:255', $flag ?  Rule::unique('users')->ignore($this->route('user')) : 'unique:users'],
            'email' => ['string', 'required', 'max:255', $flag ?  Rule::unique('users')->ignore($this->route('user')) : 'unique:users'],
            'password' => 'string|max:255|required|min:8|confirmed',
            'employee_id' => 'integer|min:0|max:99999999999|nullable'
        ];
    }
}
