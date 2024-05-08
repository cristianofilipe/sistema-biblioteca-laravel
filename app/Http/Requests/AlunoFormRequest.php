<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlunoFormRequest extends FormRequest
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
            'sexo' => ['required', "regex:/^[MF]$/"],
            'classe' => ['required', "regex:/^[0-9]{2}$/"],
            'turma' => ['required', "regex:/^[A-Z]{2}\d{2}[A-Z]$/"],
            'curso' => ['required', "regex:/^[0-9]$/"]
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'Insira o nome',
            'nome.min'=>'Digite um nome com mais letras',
            'nome.regex' => 'Nome invalido',
            'sexo.required' => 'Insira o sexo',
            'sexo.regex' => 'Sexo invalido',
            'classe.required' => 'Insira a classe',
            'classe.regex'=> 'classe invalida',
            'turma.required' => 'Insira a turma',
            'turma.regex' => 'Turma invalida',
            'curso.required' => 'Insira o curso',
            'curso.regex' => 'curso invalido'
        ];
    }
}
