<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFornecedorRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nome' => 'required',
            'cnpj' => [
                'required',
                'cnpj',
                'unique:fornecedores,cnpj,' . $this->route('fornecedor'),
            ],
            'logradouro' => 'required|string|max:255',
            'numero' => 'required|integer',
            'complemento' => 'nullable|string|max:255',
            'bairro' => 'required|string|max:150',
            'cidade' => 'required|string|max:100',
            'uf' => 'required|string|min:2|max:20'
        ];
    }
}
