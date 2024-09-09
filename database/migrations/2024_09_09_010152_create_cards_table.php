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
        Schema::create('cards', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('user_id')->references('id')->on('users');
            $table->string('nome', 100);
            $table->string('descricao', 255)->nullable();
            $table->float('anuidade', 3, 2)->default(0);
            $table->json('extras', 3, 2)->nullable();
            $table->boolean('ativo')->default(true);
            $table->boolean('is_compartilhado')->default(true);
            $table->unsignedInteger('data_expiracao');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cards');
    }
};
