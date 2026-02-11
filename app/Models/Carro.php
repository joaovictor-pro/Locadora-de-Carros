<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carro extends Model
{
    protected $fillable = [
        'modelo',
        'marca',
        'placa',
        'ano',
        'preco_diaria',
        'descricao',
        'status'
    ];

    // Um carro pode ter vários aluguéis
    public function aluguels()
    {
        return $this->hasMany(Aluguel::class);
    }
}
