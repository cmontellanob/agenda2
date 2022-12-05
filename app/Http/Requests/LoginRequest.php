<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;


class LoginRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email' => 'required|email|max:35|exists:usuarios,email',
            'password' => 'required|string|max:35',
            //
        ];
    }
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'transaccion' => false,
            'mensaje' => 'Errores de validación',
            'response' => $validator->errors()
        ]));
    }
    public function messages()
    {
        return [
            'email.required'=>'El campo email es obligatorio',
            'email.email'=>'El usuario debe ser un email',
            'email.max'=>'El campo debe tener un maximo de 35 caracteres',
            'email.exists'=>'Error de autenticacion',
            'password.required'=>'El campo password es obligatorio',
            'password.string'=>'El campo debe ser una cadena',
            'password.max'=>'El campo debe tener un maximo de 35 caracteres',
            
        ];

    }
}
