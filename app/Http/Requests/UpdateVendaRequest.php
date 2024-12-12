<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVendaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'cliente_id' => 'required|exists:clientes,id',
            'produto_id' => 'required|exists:produtos,id',
            'quantidade' => 'required|integer',
            'pagamento_id' => 'required|exists:pagamentos,id'
        ];
    }
}
