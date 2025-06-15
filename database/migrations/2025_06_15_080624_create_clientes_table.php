<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('plano_id')->constrained('planos')->onDelete('restrict');
            $table->string('nome_completo')->unique(); // Nome do cliente
            $table->string('cpf_cnpj')->unique(); // CPF ou CNPJ do cliente
            $table->string('rg')->nullable(); // Registro Geral (RG) do cliente
            $table->date('data_nascimento')->nullable(); // Data de nascimento do cliente
            $table->string('rua'); // Rua do endereço do cliente
            $table->string('numero')->nullable(); // Número da residência
            $table->string('cidade'); // cidade do cliente (o sistema só atende uma cidade)
            $table->string('estado', 2); //Estado do cliente (duas siglas apenas (Pe) pq o sistema só atende uma cidade de Pernambuco)
            $table->string('cep')->nullable(); // CEP do cliente
            $table->string('complemento')->nullable();
            $table->string('telefone_principal');
            $table->string('telefone_secundario')->nullable();
            $table->string('email')->unique();
            $table->date('data_inicio_contrato');
            $table->enum('status', ['ativo', 'suspenso', 'cancelado'])->default('ativo'); // Status do cliente
            $table->text('observacoes')->nullable();
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
};
