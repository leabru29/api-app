<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoriaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nome' => [
                'required',
                'string',
                'max:30',
                // Validação de unicidade por fornecedor, ignorando o ID atual
                'unique:categorias,nome,' . $this->route('categoria') . ',id,fornecedor_id,' . $this->input('fornecedor_id'),
            ],
        ];
    }
}
