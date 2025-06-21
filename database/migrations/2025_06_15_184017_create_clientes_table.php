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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('empresa_id')->constrained()->cascadeOnDelete();

            $table->enum('tipo', ['pf', 'pj'])->default('pf');

            // Pessoa Física
            $table->string('nome')->nullable();
            $table->string('cpf', 14)->nullable();

            // Pessoa Jurídica
            $table->string('razao_social')->nullable();
            $table->string('cnpj', 18)->nullable();

            $table->string('telefone')->nullable();
            $table->string('email')->nullable();
            $table->string('endereco')->nullable();
            
            $table->index('cpf');
            $table->index('cnpj');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};