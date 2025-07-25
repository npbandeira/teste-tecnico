<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nome' => 'sometimes|required|string',
            'preco' => 'sometimes|required|numeric|min:0.01',
            'quantidade' => 'sometimes|required|integer|min:0',
        ];
    }

    public function messages()
    {
        return [
            'nome.string' => 'O campo nome deve ser um texto.',
            'preco.numeric' => 'O campo preço deve ser um número.',
            'preco.min' => 'O campo preço deve ser maior que 0.',
            'quantidade.integer' => 'O campo quantidade deve ser um número inteiro.',
            'quantidade.min' => 'O campo quantidade deve ser maior ou igual a 0.',
        ];
    }
}
