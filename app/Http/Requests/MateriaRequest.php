<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class MateriaRequest extends Request
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
            'descripcion' => 'min:4|max:50|required|regex:/^[a-z ñáéíóú]+$/i|unique:materias',
            'credito' => 'required',
        ];
    }
}
