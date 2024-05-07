<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LivroFormRequest extends FormRequest
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
            'isbn' => 'required',
            'titulo' => ['required', 'min:5'],
            'volume' => ['required', 'regex:/^[0-9]+$/'],
            'ano_publicacao' => ['required', 'regex:/^[0-9]+$/'],
            'edicao' => ['required'],
            'editora' => ['required', 'regex:/^[A-Za-z0-9\s]+$/'],
            'modo_aquisicao' => ['required', "regex:/^[a-zA-Z]+$/"],
            'qtd_material' => ['required', "regex:/^[0-9]+$/"],
            'data_entrada' => ['required', "date", "before_or_equal:today"],
            'estante' => ['required', 'regex:/^[0-9]+$/'],
            'autor' => ['required', 'min:5' ,"regex:/^[a-zA-ZÀ-ÿ']+([\s][a-zA-ZÀ-ÿ']+)*$/"],
            'autores.*' => ['nullable', "regex:/^[a-zA-ZÀ-ÿ']+([\s][a-zA-ZÀ-ÿ']+)*$/"]
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute eh obrigatorio',
            'regex' => ':attribute eh invalido',
            'titulo.min' => 'O titulo precisa no minimo 5 caracteres',
            'data_entrada.before_or_equal' => "Data invalida" 
        ];
    }
}
