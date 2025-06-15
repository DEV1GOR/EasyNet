<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema; // Certifique-se que esta linha está presente

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // ***** VERIFIQUE ESTA LINHA ABAIXO *****
        Schema::create('planos', function (Blueprint $table) {
            $table->id();
            $table->string('nome')->unique();
            $table->integer('velocidade_download_mbps')->nullable();
            $table->integer('velocidade_upload_mbps')->nullable();
            $table->decimal('valor_mensal', 10, 2);
            $table->text('descricao')->nullable();
            $table->boolean('ativo')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('planos');
    }
};