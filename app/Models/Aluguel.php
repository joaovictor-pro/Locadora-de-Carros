<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Cliente;
use App\Models\Carro;

class Aluguel extends Model
{
    protected $fillable = [
        'cliente_id',
        'carro_id',
        'data_inicio',
        'data_final_prevista',
        'data_final_entregue',
        'status'
    ];

    // ja esse que um aluguel pertence á um cliente
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    // essa parte significa que um aluguel pertence á um carro.
    public function carro()
    {
        return $this->belongsTo(Carro::class);
    }
}
