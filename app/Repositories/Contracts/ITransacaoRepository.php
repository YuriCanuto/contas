<?php

namespace App\Repositories\Contracts;

use App\DTO\CommomDTO;
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
     * @param CommomDTO $dto
     * @return Collection
     */
    public function getTransacoes(CommomDTO $dto): Collection;
}
