<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UsuarioFormRequest extends FormRequest
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
            'name' => ['required', 'min:3'],
            'email' => ['required', 'min:5', Rule::unique('usuarios', 'email')->ignore($this->usuario)],
            'password' => ['required'],
            'tipo_usuario' => ['required', 'in:admin,co-admin']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O nome é obrigatório',
            'name.min' => 'O nome precisa no minimo de 3 caracteres',
            'email.required' => 'O email é obrigatorio',
            'email.email' => 'Email invalido',
            'email.unique' => 'Este este email já está sendo utilizado por outro usuário',
            'password.required' => 'A palavra passe é obrigatório',
            'tipo_usuario.required' => 'O tipo de usuario é obrigatório',
            'tipo_usuario.in' => 'Tipo de usuario invalido'
        ];
    }
}
