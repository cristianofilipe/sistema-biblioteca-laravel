<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RevistaFormRequest extends FormRequest
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
            'titulo' => ['required', 'min:5'],
            'subtitulo' => ['min:5'],
            'modo_aquisicao' => ['required', "regex:/^[a-zA-Z]+$/"],
            'qtd_material' => ['required', "regex:/^[0-9]+$/"],
            'data_entrada' => ['required', "regex:/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/"],
            'estante' => ['required', 'regex:/^[0-9]+$/']
        ];
        
    }

    public function messages()
    {
        return [
            'titulo.required' => 'O titulo é obrigado',
            'tiulo.min' => 'O titulo precisa no minimo de 5 caracteres',
            'titulo.regex' => 'Titulo invalido',

            'subtitulo.min' => 'O subtitulo precisa no minimo de 5 caracteres',
            'subtitulo.regex' => 'subtitulo invalido',

            'modo_aquisicao.required' => 'O modo de aquisicao é obrigatorio',
            'modo_aquisicao.regex' => 'Modo de aquisicao invalido',

            'qtd_material.required' => 'A quantidade é obrigatorio', 
            'qtd_material.regex' => 'Quantidade de material invalida',

            'data_entrada.required' => 'Data de entrada é obrigatorio',
            'data_entrada.regex' => 'Data invalida',

            'estante.required' => 'A estante é obrigatoria',
            'estante.regex' => 'Estante invalida'
        ];
    }
}
