<?php

namespace App\Repositories\Contracts;

use App\DTO\Contas\CreateContasDTO;
use App\Models\Transacao;
use Illuminate\Database\Eloquent\Collection;

interface ITransacaoRepository {

    /**
     * @param CreateContasDTO $dto
     * @return Transacao
     */
    public function create(CreateContasDTO $dto): Transacao;

    /**
     * @param string $card_id
     * @param array $filter
     * @return Collection
     */
    public function getTransacoes(string $card_id, array $filter = []): Collection;
}
