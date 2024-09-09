<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Responsavel extends Model
{
    use HasFactory, SoftDeletes, Uuids;

    protected $table     = 'responsaveis';
    protected $keyType   = 'string';
    public $incrementing = false;

    protected $fillable = [
        'user_id',
        'email',
        'nome',
        'ativo',
    ];

    protected $casts = [
        'ativo' => 'boolean'
    ];

    /** @return HasMany */
    public function transacoes(): HasMany
    {
        return $this->hasMany(Transacao::class, 'responsavel_id');
    }
}
