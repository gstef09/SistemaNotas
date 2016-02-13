<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProfesorRequest extends Request
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
            'facultad' => 'required',
            'cedula' => 'min:11|max:11|required|unique:profesores',
            'nombres' => 'min:4|max:50|required|regex:/^[a-z ñáéíóú]+$/i|unique:profesores',
            'apellidos' => 'min:4|max:50|required|regex:/^[a-z]+$/i|unique:profesores',
            'telefono' => 'max:10|required',
            'direccion' => 'max:50|required',
            'correo' => 'required|email|max:255|unique:profesores'
        ];
    }
}
