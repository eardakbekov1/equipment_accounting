<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BranchRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255', $flag ?  Rule::unique('branches')->ignore($this->route('branch')) : 'unique:branches'],
            'phone_number' => ['required', 'string', 'max:255', $flag ?  Rule::unique('branches')->ignore($this->route('branch')) : 'unique:branches'],
            'organization_id' => 'required|integer|min:0|max:99999999999',
            'location_id' => 'required|integer|min:0|max:99999999999'
        ];
    }
}
