<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Validator;

class AdminRequest extends FormRequest
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
        'apellido1' => 'required',
        'apellido2' => 'required',
        'nombre' => ['required', 'string', 'max:255'],
        'matricula' => ['required','unique:alumnos'],
        'sexo' => 'required',
        'curp' => 'required',
        'licenciatura' => 'required',
        'email' => ['required', 'string', 'email', 'max:255', 'unique:alumnos'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
    ];
    }

public function messages()
{
    return [
        'apellido1.required' => 'Hace falta llenar el campo apellido paterno.',
        'apellido2.required' => 'Hace falta llenar el campo apellido paterno.',
        'nombre.required' => 'Hace falta el campo nombre.',
        'matricula.required' => 'Hace falta llenar el campo matricula.',
        'sexo.required' => 'Hace falta llenar el campo sexo.',
        'curp.required' => 'Hace falta llenar el campo curp.',
        'licenciatura.required' => 'Hace falta llenar el campo licenciatura.',
        'email.required' => 'Hace falta llenar el campo email.',
        'password.required' => 'Hace falta llenar el campo password.',
        'password.confirmed' => 'Hay un error de llenado en la confirmación de contraseña.',
        'matricula.unique' => 'Matricula ya registrada',
        'email.unique' => 'Correo ya registrado'
    ];
}
}
