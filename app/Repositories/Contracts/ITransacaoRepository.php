<?php

namespace App\Repositories\Contracts;

use App\Models\Transacao;
use Illuminate\Database\Eloquent\Collection;

interface ITransacaoRepository {

    /**
     * @param array $data
     * @return Transacao
     */
    public function create(array $data): Transacao;

    /**
     * @param string $card_id
     * @param array $filter
     * @return Collection
     */
    public function getTransacoes(string $card_id, array $filter = []): Collection;
}
