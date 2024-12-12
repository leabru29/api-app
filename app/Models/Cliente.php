<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory, HasUuids;

    protected $increments = false;

    protected $table = 'clientes';

    protected $fillable = [
        'nome',
        'cpf',
        'telefone'
    ];
}
