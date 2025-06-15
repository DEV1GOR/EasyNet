<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plano extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'velocidade_download_mbps',
        'velocidade_upload_mbps',
        'valor_mensal',
        'descricao',
        'ativo',
    ];

    // Relacionamento: Um plano pode ter muitos clientes
    public function clientes()
    {
        return $this->hasMany(Cliente::class);
    }

    // Relacionamento: Um plano pode estar em muitos pagamentos (histórico)
    public function pagamentos()
    {
        return $this->hasMany(Pagamento::class);
    }
}