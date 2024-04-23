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
            'titulo' => ['required', 'min:5', 'regex:/^[A-Za-z0-9\s]+$/'],
            'volume' => ['required', 'regex:/^[0-9]+$/'],
            'ano_publicacao' => ['required', 'regex:/^[0-9]+$/'],
            'edicao' => ['required', 'regex:/^(1st|2nd|3rd|[4-9]th|10th|[IVXLCDM]+)$/'],
            'isbn' => ['required'],
            'editora' => ['required', 'regex:/^[A-Za-z0-9\s]+$/'],
            'cdd' => ['required', 'regex:/^[0-9]+$/'],
            'modo_aquisicao' => ['required', "regex:/^[a-zA-Z]+$/"],
            'qtd_material' => ['required', "regex:/^[0-9]+$/"],
            'data_entrada' => ['required', "regex:/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/"],
            'estante' => ['required', 'regex:/^[0-9]+$/']
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute eh obrigatorio',
            'regex' => ':attribute eh invalido',
            'titulo.min' => 'O titulo precisa no minimo 5 caracteres'
        ];
    }
}
