<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transacoes', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('card_id')->references('id')->on('cards');
            $table->foreignUuid('responsavel_id')->references('id')->on('responsaveis');
            $table->date('data_compra');
            $table->string('descricao', 100);
            $table->boolean('ativo')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('parcelas', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('transacao_id')->references('id')->on('transacoes');
            $table->char('mes', 2);
            $table->char('ano', 4);
            $table->char('parcela', 3);
            $table->float('valor', 10, 2);
            $table->float('desconto', 10, 2)->default(0);
            $table->boolean('ativo')->default(true);
            $table->boolean('is_pago')->default(false);
            $table->dateTime('data_pagamento')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parcelas');
        Schema::dropIfExists('transacoes');
    }
};
