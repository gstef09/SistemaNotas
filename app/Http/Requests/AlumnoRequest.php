<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AlumnoRequest extends Request
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
        //|regex:/^[0-9][-]+$/i
        return [
            'facultad' => 'required',
            'cedula' => 'min:11|max:11|required|unique:alumnos',
            'nombres' => 'min:4|max:50|required|regex:/^[a-z ñáéíóú]+$/i|unique:alumnos',
            'apellidos' => 'min:4|max:50|required|regex:/^[a-z ñáéíóú]+$/i|unique:alumnos',
            'telefono' => 'max:10|required',
            'direccion' => 'max:50|required',
            'correo' => 'required|email|max:255|unique:alumnos'
        ];
    }
}
