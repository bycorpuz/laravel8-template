<?php

namespace App\Http\Requests\Authentication;

use Illuminate\Foundation\Http\FormRequest;

class PermissionStoreRequest extends FormRequest
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
            'name' => 'required|unique:permissions,name,'. $this->hidden_id,
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The \'Permission Name\' field is required.',
            'name.unique'   => 'The \'Permission Name\' has already been taken.'
        ];
    }
}
