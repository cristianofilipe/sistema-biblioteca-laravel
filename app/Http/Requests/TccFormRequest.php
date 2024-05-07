<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TccFormRequest extends FormRequest
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
            'tema' => ['required', 'min:10'],
            'orientador' => ['required', 'min:5' ,"regex:/^[a-zA-ZÀ-ÿ']+([\s][a-zA-ZÀ-ÿ']+)*$/"],
            'autor' => ['required', 'min:5' ,"regex:/^[a-zA-ZÀ-ÿ']+([\s][a-zA-ZÀ-ÿ']+)*$/"],
            'autores.*' => ['nullable', "regex:/^[a-zA-ZÀ-ÿ']+([\s][a-zA-ZÀ-ÿ']+)*$/"],
            'data_entrada' => ['required', "regex:/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/"],
            'estante' => ['required', 'regex:/^[0-9]+$/'],
            'curso' => ['required', "regex:/^[1-8]$/"],
            'ano' => ['required', "regex:/^[0-9]{4}$/"]
        ];
    }

    public function messages()
    {
        return [
            'autores.*.regex' => 'Autor inválido',
            'tema.alpha' => 'Tema invalido', 
            'required' => 'O campo :attribute é obrigatório',
            'min' => 'O :attribute precisa no minimo :min caracteres',
            'regex' => ':attribute inválido'
        ];
    }
}
