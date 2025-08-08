<?php

namespace App\Repositories\Contracts;

use App\DTO\CommomDTO;
use App\DTO\Contas\CreateContasDTO;
use App\Models\Transacao;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Collection as SupportCollection;

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

    /**
     * @param CommomDTO $dto
     * @return SupportCollection
     */
    public function getTotalTrasacoesDosUsuarios(CommomDTO $dto): SupportCollection;
}
