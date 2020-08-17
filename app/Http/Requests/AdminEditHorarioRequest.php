<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Validator;

class AdminEditHorarioRequest extends FormRequest
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
            'licenciatura_id' => 'required',
            'ciclo_id' => 'required',
            'grupo_id' => 'required',
            'dia' => 'required',
            'hora' => 'required',
            'materia_id' => 'required',
            'docente_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'licenciatura_id.required' => 'Necesita seleccionar la licenciatura.',
            'ciclo_id.required' => 'Necesita seleccionar el ciclo escolar.',
            'grupo_id.required' => 'Necesita seleccionar el grupo.',
            'dia.required' => 'Necesita seleccionar el día.',
            'hora.required' => 'Necesita seleeccionar la hora.',
            'materia_id.required' => 'Necesita seleccionar la materia,',
            'docente_id.required' => 'Necesita seleccionar un docente.',
        ];
    }
}
