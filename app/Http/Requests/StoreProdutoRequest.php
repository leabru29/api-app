<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProdutoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nome' => 'required|string|max:150',
            'descricao' => 'required|string|max:255',
            'preco' => 'required|decimal',
            'fornecedor_id' => 'required|exists:fornecedores,id',
            'categoria_id' => 'required|exists:categorias,id'
        ];
    }
}
