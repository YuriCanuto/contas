<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Card extends Model
{
    use HasFactory, SoftDeletes, Uuids;

    protected $keyType   = 'string';
    public $incrementing = false;

    protected $fillable = [
        'user_id',
        'nome',
        'descricao',
        'anuidade',
        'extras',
        'ativo',
        'is_compartilhado',
        'data_expiracao',
    ];

    protected $casts = [
        'is_compartilhado' => 'boolean',
        'ativo'            => 'boolean'
    ];

    /** @return BelongsTo */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /** @return HasMany */
    public function transacoes(): HasMany
    {
        return $this->hasMany(Transacao::class, 'card_id');
    }
}
