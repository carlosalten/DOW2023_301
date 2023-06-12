<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UsuariosRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'nombre' => 'required|min:2|max:50',
            'email' => 'required|email:rfc|unique:usuarios',
            'password' => 'bail|required|min:6|max:20|same:password2',
            'rol' => 'bail|required|integer|gte:1|exists:roles,id',
        ];
    }

    public function messages():array
    {
        return [
            'nombre.required' => 'Indique nombre del usuario',
            'nombre.min' => 'El nombre debe tener entre 2 y 50 caracteres',
            'nombre.max' => 'El nombre debe tener entre 2 y 50 caracteres',
            'email.required' => 'Indique email del usuario',
            'email.email' => 'Email no válido',
            'email.unique' => 'El email indicado ya está asignado a otro usuario',
            'password.required' => 'Indique contraseña del usuario',
            'password.min' => 'La contraseña debe tener entre 6 y 20 caracteres',
            'password.max' => 'La contraseña debe tener entre 6 y 20 caracteres',
            'password.same' => 'Las contraseñas no coinciden',
            'rol.required' => 'Indique rol del usuario',
            'rol.integer' => 'Rol no válido',
            'rol.gte' => 'Rol no válido',
            'rol.exists' => 'Rol no válido',
        ];
    }
}
