<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // Importar SoftDeletes

class Cliente extends Model
{
    use HasFactory, SoftDeletes; // Usar SoftDeletes aqui

    protected $fillable = [
        'plano_id',
        'nome_completo',
        'cpf_cnpj',
        'rg',
        'data_nascimento',
        'rua',
        'numero',
        'bairro',
        'cidade',
        'estado',
        'cep',
        'complemento',
        'telefone_principal',
        'telefone_secundario',
        'email',
        'data_inicio_contrato',
        'status',
        'observacoes',
    ];

    // Relacionamento: Um cliente pertence a um plano
    public function plano()
    {
        return $this->belongsTo(Plano::class);
    }

    // Relacionamento: Um cliente pode ter muitos pagamentos
    public function pagamentos()
    {
        return $this->hasMany(Pagamento::class);
    }
}