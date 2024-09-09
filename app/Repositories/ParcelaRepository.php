<?php

namespace App\Repositories;

use App\Models\Parcela;
use App\Repositories\Contracts\IParcelaRepository;

class ParcelaRepository implements IParcelaRepository
{
    public function __construct(private Parcela $parcela)
    {
    }

    /**
     * @param array $data
     * @return void
     */
    public function create(array $data): void
    {
        $this->parcela->create($data);
    }
}
