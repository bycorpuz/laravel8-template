<?php

namespace App\Http\Requests\Authentication;

use Illuminate\Foundation\Http\FormRequest;

class ModelHasPermissionRequest extends FormRequest
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
            'permission_id' => 'required',
            'model_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'permission_id.required'  => 'The \'Permission Name\' field is required.',
            'model_id.required'  => 'The \'User Email\' field is required.',
        ];
    }
}
