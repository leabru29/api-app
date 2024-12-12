<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateColaboradorRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nome' => 'required|string|max:150',
            'cpf' => ['required', 'cpf', 'unique:colaboradores,cpf,' . $this->route('colaborador'),]
        ];
    }
}
