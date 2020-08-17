<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Validator;

class AdminRequest1 extends FormRequest
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
        'matricula' => 'required',
        'sexo' => 'required',
        'curp' => 'required',
        'licenciatura_id' => 'required',
        'email' => ['required', 'string', 'email', 'max:255', 'unique:docentes'],
    ];
    }
}
