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
        Schema::create('pagamentos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cliente_id')->constrained('clientes')->onDelete('cascade'); // Se o cliente for deletado (soft), os pagamentos ficam. Se for hard delete, cascade apaga.
            $table->foreignId('plano_id')->constrained('planos')->onDelete('restrict'); // Mantém o plano do pagamento mesmo que o cliente mude de plano
            $table->decimal('valor', 10, 2);
            $table->date('data_vencimento');
            $table->date('data_pagamento')->nullable(); // Nulo se não pago
            $table->decimal('valor_pago', 10, 2)->nullable(); // Se pago a mais ou a menos
            $table->decimal('multa_juros', 10, 2)->default(0.00); // Valor de multa/juros
            $table->enum('status', ['pendente', 'pago', 'atrasado', 'cancelado', 'estornado'])->default('pendente');
            $table->string('metodo_pagamento')->nullable(); // Ex: 'pix', 'cartao', 'dinheiro'
            $table->string('identificador_transacao_gateway')->nullable()->unique(); // ID da transação no gateway de pagamento
            $table->text('pix_copia_cola')->nullable(); // O código Pix Copia e Cola
            $table->string('qrcode_image_path')->nullable(); // Caminho para a imagem QR Code gerada (se for salva localmente)
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
        Schema::dropIfExists('pagamentos');
    }
};
