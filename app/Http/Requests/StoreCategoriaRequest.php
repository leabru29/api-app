<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoriaRequest extends FormRequest
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
                // Valida o nome único se o fornecedor for o mesmo
                'unique:categorias,nome,NULL,id,fornecedor_id,' . $this->input('fornecedor_id'),
            ],
        ];
    }
}
