<?php

namespace App\DTO\Contas;

use Spatie\LaravelData\Data;

class CreateContasDTO extends Data
{
    public function __construct(
        public string    $card_id,
        public string    $user_id,
        public string    $descricao,
        public string    $data_compra,
        public bool|null $ativo,
    ) {
        $this->ativo = true;
        $this->data_compra = implode('-', array_reverse(explode('/', $this->data_compra)));
    }
}
