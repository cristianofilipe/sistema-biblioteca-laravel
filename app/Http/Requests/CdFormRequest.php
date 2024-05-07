<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CdFormRequest extends FormRequest
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
            'capacidade' => ['required', 'numeric'],
            'conteudo' => ['required'],
            'modo_aquisicao' => ['required', "regex:/^[a-zA-Z]+$/"],
            'qtd_material' => ['required', "numeric"],
            'data_entrada' => ['required', "regex:/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/"],
            'estante' => ['required', 'numeric']
        ];
    }

    public function messages()
    {
        return [
            'capacidade.decimal' => 'Capacidade invalida',
            'regex' => ':attribute invalido',
            'numeric' => ':attribute invalido',
            'required' => ':attribute eh obrigatorio'
        ];
    }
}
