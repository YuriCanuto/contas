<?php

namespace App\Repositories\Contracts;

use App\DTO\Contas\CreateParcelasDTO;
use App\Models\Parcela;

interface IParcelaRepository
{
    /**
     * @param CreateParcelasDTO $dto
     * @return Parcela
     */
    public function create(CreateParcelasDTO $dto): Parcela;
}
