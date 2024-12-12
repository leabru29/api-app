<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEstoqueRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'produto_id' => 'required|exists:produtos,id',
            'quantidade' => 'required|integer',
            'data_validade' => 'required|date'
        ];
    }
}
