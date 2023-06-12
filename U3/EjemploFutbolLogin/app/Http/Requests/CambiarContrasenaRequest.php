<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CambiarContrasenaRequest extends FormRequest
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
            'password_actual' => 'required|current_password',
            'password1' => 'required|min:6|max:20|same:password2',
            'password2' => 'required',
        ];
    }

    public function messages():array
    {
        return [
            'password_actual.required' => 'Indique la contraseña actual',
            'password_actual.current_password' => 'Contraseña actual incorrecta',
            'password1.required' => 'Indique la contraseña nueva',
            'password1.min' => 'La contraseña debe tener entre 6 y 20 caracteres',
            'password1.max' => 'La contraseña debe tener entre 6 y 20 caracteres',
            'password1.same' => 'Las contraseñas no coinciden',
            'password2.required' => 'Debe repetir la contraseña nueva',
        ];
    }
}
