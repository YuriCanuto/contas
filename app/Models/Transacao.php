<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transacao extends Model
{
    use HasFactory, SoftDeletes, Uuids;

    protected $table     = 'transacoes';
    protected $keyType   = 'string';
    public $incrementing = false;

    protected $fillable = [
        'card_id',
        'responsavel_id',
        'descricao',
        'ativo'
    ];

    protected $casts = [
        'ativo' => 'boolean'
    ];

    /** @return BelongsTo */
    public function card(): BelongsTo
    {
        return $this->belongsTo(Card::class, 'card_id');
    }

    /** @return BelongsTo */
    public function responsavel(): BelongsTo
    {
        return $this->belongsTo(Responsavel::class, 'responsavel_id');
    }

    /** @return HasMany */
    public function parcelas(): HasMany
    {
        return $this->hasMany(Parcela::class, 'transacao_id');
    }
}
