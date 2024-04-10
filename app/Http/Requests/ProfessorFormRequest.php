<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfessorFormRequest extends FormRequest
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
            'nome' => ['required', 'min:3', "regex:/^[a-zA-ZÀ-ÿ']+([\s][a-zA-ZÀ-ÿ']+)*$/"],
            'email' => ['email'],
            'sexo' => ['required', "regex:/^[MF]$/"],
            'telefone' => ['regex:/^[0-9]{3}-[0-9]{3}-[0-9]{3}$/'],
            'cursos' => ['required', 'array'],
            'cursos.*' => ['exists:cursos,id_curso'],
            'telefones.*' => 'nullable|numeric'
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O nome eh obrigatorio',
            'nome.min' => 'O nome precisa no minimo 3 caracteres',
            'nome.regex' => 'Nome invalido',
            'email.email' => 'Email invalido',
            'sexo.required' => 'O sexo e obrigatorio',
            'sexo.regex' => 'Sexo invalido',
            'telefone.regex' => 'Telefone invalido',
            'cursos.required' => 'Selecione pelomenos um curso',
            'telefones.numeric' => 'Telefone invalido'
        ];
    }
}
