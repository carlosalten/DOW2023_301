<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class JugadoresRequest extends FormRequest
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
            'rut' => 'required|min:9|max:10',
            'nombre' => 'required|alpha|min:2|max:30',
            'apellido' => 'required|alpha',
            'numero_camiseta' => 'bail|required|integer|gte:1|lte:99',
            'posicion' => ['required',Rule::in(['Arquero','Defensa','Volante','Delantero'])],
            'equipo' => 'required',
        ];
    }

    public function messages():array
    {
        return [
            'rut.required' => 'Indique el RUT',
            'rut.min' => 'RUT no válido',
            'rut.max' => 'RUT no válido',
            'nombre.required' => 'Indique el Nombre',
            'nombre.alpha' => 'El Nombre solo debe tener letras',
            'apellido.required' => 'Indique el Apellido',
            'apellido.alpha' => 'El Apellido solo debe tener letras',
            'numero_camiseta.required' => 'Indique el Número de Camiseta',
            'numero_camiseta.integer' => 'El Número de Camiseta debe ser un número entero',
            'numero_camiseta.gte' => 'El Número de Camiseta debe ser 1 o mayor',
            'numero_camiseta.lte' => 'El Número de Camiseta debe ser 99 o menor',
            'posicion.required' => 'Indique la Posición en el campo',
            'posicion.in' => 'Posición no válida',
            'equipo.required' => 'Indique el Equipo del Jugador',
        ];
    }
}
