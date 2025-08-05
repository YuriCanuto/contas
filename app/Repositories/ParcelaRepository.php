<?php

namespace App\Repositories;

use App\DTO\Contas\CreateParcelasDTO;
use App\Models\Parcela;
use App\Repositories\Contracts\IParcelaRepository;

class ParcelaRepository implements IParcelaRepository
{
    public function __construct(private Parcela $parcela)
    {
    }

    /** {@inheritdoc } */
    public function create(CreateParcelasDTO $dto): Parcela
    {
        return $this->parcela->create($dto->toArray());
    }
}
