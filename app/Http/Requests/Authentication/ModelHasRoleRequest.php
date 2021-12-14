<?php

namespace App\Http\Requests\Authentication;

use Illuminate\Foundation\Http\FormRequest;

class ModelHasRoleRequest extends FormRequest
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
            'role_id' => 'required',
            'model_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'role_id.required'  => 'The \'Role Name\' field is required.',
            'model_id.required'  => 'The \'User Email\' field is required.',
        ];
    }
}
