<?php

namespace App\Repositories;

use App\DTO\CommomDTO;
use App\DTO\Contas\CreateContasDTO;
use App\Models\Transacao;
use App\Repositories\Contracts\ITransacaoRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Arr;

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
}
