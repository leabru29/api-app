<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClienteRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nome' => 'required|string|max:150',
            'cpf' => [
                'required',
                'cpf',
                // Validação de unicidade, ignorando o ID atual
                'unique:clientes,cpf,' . $this->route('cliente'),
            ],
            'telefone' => 'required|celular_com_ddd',
        ];
    }
}
