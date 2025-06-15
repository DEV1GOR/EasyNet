<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 

class Pagamento extends Model
{
    use HasFactory, SoftDeletes; 

    protected $fillable = [
        'cliente_id',
        'plano_id', 
        'valor',
        'data_vencimento',
        'data_pagamento',
        'valor_pago',
        'multa_juros',
        'status',
        'metodo_pagamento',
        'identificador_transacao_gateway',
        'pix_copia_cola',
        'qrcode_image_path',
        'observacoes',
    ];

    
    protected $casts = [
        'data_vencimento' => 'date',
        'data_pagamento' => 'date',
    ];

    // Relacionamento: Um pagamento pertence a um cliente
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    // Relacionamento: Um pagamento pertence a um plano (mesmo que o cliente mude de plano, o pagamento mantém o histórico do plano daquela cobrança)
    public function plano()
    {
        return $this->belongsTo(Plano::class);
    }
}