<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('carros', function (Blueprint $table) {
            $table->id();
            $table->string('modelo');
            $table->string('marca');
            $table->string('placa')->unique();
            $table->integer('ano');
            $table->decimal('preco_diaria', 10, 2);
            $table->text('descricao')->nullable();
            $table->enum('status', ['disponivel','alugado','manutencao'])->default('disponivel');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('carros');
    }
};
