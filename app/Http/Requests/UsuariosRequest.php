<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UsuariosRequest extends Request
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
            'name' => 'min:4|max:50|required|regex:/^[a-z ñáéíóú]+$/i',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:4',
        ];
    }
}
