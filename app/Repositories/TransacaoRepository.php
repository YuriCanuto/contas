<?php

namespace App\Repositories;

use App\DTO\CommomDTO;
use App\DTO\Contas\CreateContasDTO;
use App\Models\Transacao;
use App\Repositories\Contracts\ITransacaoRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection as SupportCollection;
use Illuminate\Support\Facades\DB;

class TransacaoRepository implements ITransacaoRepository
{
    public function __construct(private Transacao $transacao)
    {
    }

    /** {@inheritdoc } */
    public function create(CreateContasDTO $dto): Transacao
    {
        return $this->transacao->create($dto->toArray());
    }

    /** {@inheritdoc } */
    public function getTransacoes(CommomDTO $dto): Collection
    {
        return $this->transacao
            ->where('card_id', $dto->card_id)
            ->withWhereHas('parcelas', function ($query) use ($dto) {
                $query->where('mes', $dto->mes);
                $query->where('ano', $dto->ano);
            })
            ->where('ativo', true)
            ->orderBy('user_id')
            ->get();
    }

    /** {@inheritdoc } */
    public function getTotalTrasacoesDosUsuarios(CommomDTO $dto): SupportCollection
    {
        return DB::table('transacoes AS t')
            ->selectRaw('u.nome, ROUND(SUM(p.valor), 2) AS total')
            ->join('parcelas AS p', 'p.transacao_id', '=', 't.id')
            ->join('users AS u', 'u.id', '=', 't.user_id')
            ->where('p.mes', $dto->mes)
            ->where('p.ano', $dto->ano)
            ->where('card_id', $dto->card_id)
            ->groupBy('t.user_id')
            ->get();
    }
}
