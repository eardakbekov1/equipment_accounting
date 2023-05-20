<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class HistoryRequest extends FormRequest
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
            'handovered_date' => 'required|string|max:255',
            'received_date' => 'string|max:255|nullable',
            'device_id' => 'required|integer|min:0|max:99999999999',
            'employee_id' => 'required|integer|min:0|max:99999999999',
            'notes' => 'string|max:255|nullable'
        ];
    }
}
