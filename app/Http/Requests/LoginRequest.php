<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Factory as ValidationFactory;

class LoginRequest extends FormRequest
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
            'documento' => 'required',
            'password' => 'required',
        ];
    }

    public function getCredenciales() {
        $usuario = $this->get('documento');

        if($this->isEmail($usuario)) {
            return [
                'email' => $usuario,
                'password' => $this->get('password'),
            ];
        }
        return $this->only('documento', 'password');
    }

    public function isEmail($value){
        $factory = $this->container->make(ValidationFactory::class);

        return !$factory->make(['documento' => $value], ['documento' => 'email'])->fails();
    }
}
