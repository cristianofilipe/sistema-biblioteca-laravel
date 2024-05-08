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
            'nome' => ['required', 'min:3'],
            'email' => ['email'],
            'genero' => ['required', "regex:/^[MF]$/"],
            'tel.*' => ['nullable', 'regex:/^[0-9]{3}-[0-9]{3}-[0-9]{3}$/'],
            'cursos' => ['required', 'array'],
            'cursos.*' => ['exists:cursos,id_curso']
        ];
    }

    public function messages()
    {
        return [
            'regex' => ':attribute inválido',
            'required' => 'o campo :attribute é obrigatorio',
            'email.email' => 'Email invalido',
            'cursos.array' => 'Cursos invalidos'
        ];
    }
}
