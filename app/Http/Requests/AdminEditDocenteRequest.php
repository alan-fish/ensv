<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Validator;

class AdminEditDocenteRequest extends FormRequest
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
            'estado' => 'required',
            'fecha_ingreso' => 'required',
            'licenciatura' => 'required',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ];
    }
    public function messages()
    {
        return [
            'apellido1.required' => 'No se puede enviar el apellido paterno vacío.',
            'apellido2.required' => 'No se puede enviar el apellido materno vacío.',
            'nombre.required' => 'No se puede enviar el campo nombre vacío.',
            'estado.required' => 'No se puede enviar el estado laboral vacío',
            'fecha_ingreso.required' => 'No se puede enviar la fecha de ingreso vacía',
            'licenciatura.required' => 'No se puede enviar la licenciatura vacía',
            'email.required' => 'No se puede enviar el campo campo email vacío.',
            'matricula.unique' => 'Matricula ya registrada',
            'email.unique' => 'Correo ya registrado'
        ];
    }
}
