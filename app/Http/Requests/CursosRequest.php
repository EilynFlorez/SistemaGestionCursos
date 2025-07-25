<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CursosRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
        'nombre' => 'string|max:100',
        'descripcion' => 'string',
        'imagen' => 'image|mimes:jpg,jpeg,png',
        'cupos_disponibles' => 'integer|min:0',
        'f_inicio' => 'date',
        'f_fin'=> 'date|after:f_inicio',
        ];
    }
}
