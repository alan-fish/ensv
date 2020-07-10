<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Alumnopassword extends FormRequest
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
            'mypassword' => 'required',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];
    }

    public function messages()
{
        return [
            'mypassword.required' => 'Campo vacío de contraseña actual',
            'password.required' => 'Campo vacío de  nueva contraseña.',
            'password.confirmed' => 'La contraseña nueva y la confirmación no coinciden',
            'password.min' => "La contraseña es de minimo 8 caracteres"
        ];
}
}
