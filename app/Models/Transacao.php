<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Arr;

class Transacao extends Model
{
    use HasFactory, SoftDeletes, Uuids;

    protected $table     = 'transacoes';
    protected $keyType   = 'string';
    public $incrementing = false;

    protected $fillable = [
        'card_id',
        'user_id',
        'descricao',
        'data_compra',
        'ativo'
    ];

    protected $casts = [
        'ativo' => 'boolean',
        'data_compra' => 'date',
    ];

    /** @return Attribute */
    protected function parcela(): Attribute
    {
        return Attribute::make(
            get: fn () => Arr::get(Arr::first($this->parcelas), 'parcela'),
        );
    }

    /** @return Attribute */
    protected function valor(): Attribute
    {
        return Attribute::make(
            get: fn () => Arr::get(Arr::first($this->parcelas), 'valor'),
        );
    }

    /** @return Attribute */
    protected function status(): Attribute
    {
        return Attribute::make(
            get: fn () => Arr::get(Arr::first($this->parcelas), 'is_pago') ? 
                '<span class="badge rounded-pill text-bg-success">Sim</span>' :
                '<span class="badge rounded-pill text-bg-danger">Não</span>'
        );
    }

    /** @return BelongsTo */
    public function card(): BelongsTo
    {
        return $this->belongsTo(Card::class, 'card_id');
    }

    /** @return BelongsTo */
    public function responsavel(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /** @return HasMany */
    public function parcelas(): HasMany
    {
        return $this->hasMany(Parcela::class, 'transacao_id');
    }
}
