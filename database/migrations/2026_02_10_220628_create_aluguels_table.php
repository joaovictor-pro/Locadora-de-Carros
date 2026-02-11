<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('aluguels', function (Blueprint $table) {
            $table->id();

            $table->foreignId('cliente_id')->constrained('clientes');
            $table->foreignId('carro_id')->constrained('carros');
            $table->date('data_inicio');
            $table->date('data_final_prevista');
            $table->date('data_final_entregue')->nullable();
            $table->enum('status', ['aberto', 'finalizado', 'cancelado'])->default('aberto');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('aluguels');
    }
};
