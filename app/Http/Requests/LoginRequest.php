<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class LoginRequest extends FormRequest
{
  /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // Permitir a todos hacer esta solicitud
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => [
                'required',
                'email',
                'max:255',

            ],
            'password' => [
                'required',
                'string',
                'min:8',
                'max:255',
                'regex:/^[\w\-\.!@#$%^&*()]+$/' // Caracteres seguros para contraseñas
            ],
        ];
    }

    /**
     * Mensajes de validación personalizados
     */
    public function messages()
    {
        return [
            'email.required' => 'El nombre de usuario es obligatorio',
            'email.regex' => 'El nombre de usuario contiene caracteres no permitidos',
            'password.required' => 'La contraseña es obligatoria',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres',
            'password.regex' => 'La contraseña contiene caracteres no permitidos',
        ];
    }

    /**
     * Manejar fallo de validación
     */
    public function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        throw new HttpResponseException(
            response()->json([
                'success' => false,
                'message' => 'Error de validación',
                'errors' => $validator->errors()
            ], 422)
        );
    }

    /**
     * Preparar datos para validación (opcional)
     */
    protected function prepareForValidation()
    {
        // Limpiar posibles espacios en blanco
        $this->merge([
            'email' => trim($this->email),
            'password' => trim($this->password)
        ]);
    }
}
