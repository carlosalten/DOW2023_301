<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EquiposRequest extends FormRequest
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
            'nombre'=>'required|unique:equipos,nombre',
            'entrenador'=>'required',
        ];
    }

    public function messages():array
    {
        //'campo.regla'=>'mensaje'
        return [
            'nombre.required'=>'Indique el nombre del equipo',
            'nombre.unique'=>'El equipo :input ya existe en el sistema',
            'entrenador.required'=>'Indique el entrenador',
        ];
    }
}
