<?php

namespace App\DTO\Cards;

use Spatie\LaravelData\Data;

class CreateCardDTO extends Data
{
    public function __construct(
        public string       $user_id,
        public string       $nome,
        public string|null  $numero_final,
        public string|null  $descricao,
        public float        $anuidade,
        public bool|null    $ativo,
        public bool|null    $is_compartilhado,
        public int          $melhor_dia_compra
    ) {
        $this->ativo = true;
        $this->is_compartilhado = true;
    }
}
