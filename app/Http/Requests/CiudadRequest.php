<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class CiudadRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $usuario=$this->attributes->get('usuario');
        
        $rol=$usuario->rol;
        if ($rol!='admin') {
            throw new HttpResponseException(response()->json([
                'error'   => true,
                'message'   => 'No tienes permiso para realizar esta acción',
                'status' => 401
    
            ]));
           
        }
      
   
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
            'nombre' => 'required|string|max:35|unique:ciudades,nombre',
            'departamento' => 'required|string|max:25',
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
            'nombre.required'=>'El campo nombre es obligatorio',
            'nombre.string'=>'El campo debe ser una cadena',
            'nombre.max'=>'El campo debe tener un maximo de 35 caracteres',
            'nombre.unique'=>'El nombre de la ciudad ya existe',
            'departamento.required'=>'El campo departamento es obligatorio',
            'departamento.string'=>'El campo debe ser una cadena',
            'departamento.max'=>'El campo debe tener un maximo de 25 caracteres',
        ];

    }
}
