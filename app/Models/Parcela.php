<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Parcela extends Model
{
    use HasFactory, SoftDeletes, Uuids;

    protected $table     = 'parcelas';
    protected $keyType   = 'string';
    public $incrementing = false;

    protected $fillable = [
        'transacao_id',
        'mes',
        'ano',
        'parcela',
        'valor',
        'desconto',
        'ativo',
        'is_pago',
        'data_pagamento'
    ];

    protected $casts = [
        'valor' => 'float',
        'desconto' => 'float',
        'is_pago' => 'boolean',
        'ativo' => 'boolean',
        'data_pagamento' => 'datetime',
    ];

    /** @return BelongsTo */
    public function parcelas(): BelongsTo
    {
        return $this->belongsTo(Transacao::class, 'transacao_id');
    }
}
