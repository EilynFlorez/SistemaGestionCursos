<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistroRequest extends FormRequest
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
            'id_rol' => 'required|in:1',
            'tipo_documento' => 'required|in:CC,TI,CE,PEP,PPT',
            'documento' => 'required|unique:usuarios,documento',
            'nombres' => 'required|string|max:40',
            'papellido' => 'required|string|max:20',
            'sapellido' => 'required|string|max:20',
            'edad' => 'required|integer|between:12,100',
            'genero' => 'required|in:M,F,otro',
            'email' => 'required|unique:usuarios,email',
            'password' => 'required|min:8',
            'password_confirmacion' => 'required|same:password',
        ];
    }
}
