<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmprestimoRequest extends FormRequest
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
            'nome_professor' => ['required', 'min:3'],
            'titulo_livro' => ['required', 'min:5'],
            'data_emprestimo' => ['required', "date", "before_or_equal:today"],
        ];
    }

    public function messages()
    {
        return [
            'required' => 'o campo :attribute é obrigatório',
            'min' => 'o campo :attribute precisa no minimo de :min caracteres',
            'date' => 'Formato de data inválida',
            'data_emprestimo.before_or_equal' => 'Data de emprestimo deve ser menor ou igual a data actual'
        ];
    }
}