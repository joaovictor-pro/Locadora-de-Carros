<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = ['nome','email','senha','status'];

    public function alugueis() {
        return $this->hasMany(Aluguel::class);
    }
}
