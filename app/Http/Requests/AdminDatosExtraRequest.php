<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Validator;

class AdminDatosExtraRequest extends FormRequest
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
            'ciclo' => 'required',
            'grupo' => 'required',
            'carrera' => 'required',
            'licenciatura_id' => 'required',
            'materia' => 'required',
            'semestre' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'ciclo.required' => 'Hace falta llenar el campo ciclo escolar.',
            'grupo.required' => 'Hace falta llenar el campo grupo.',
            'carrera.required' => 'Hace falta el campo carrera.',
            'licenciatura_id.required' => 'Hace falta seleccionar la licenciatura .',
            'materia.required' => 'Hace falta llenar el campo de materia',
            'semestre.required' => 'Hace falta seleccionar el semestre.',
        ];
    }
}
