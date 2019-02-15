<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * 修改用户资料
 * Class UserRequest
 * @package App\Http\Requests
 */
class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    public function rules()
    {

    }

    public function messages()
    {

    }
}
