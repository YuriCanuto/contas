<?php

namespace App\DTO\Cards;

use Spatie\LaravelData\Data;

class UpdateCardDTO extends Data
{
    public function __construct(
        public string    $id,
        public string    $user_id,
        public string    $nome,
        public string    $numero_final,
        public ?string   $descricao,
        public float     $anuidade,
        public ?string   $extras,
        public bool|null $ativo,
        public bool|null $is_compartilhado,
        public int       $melhor_dia_compra,
    ) {
        $this->ativo = !is_null($ativo);
        $this->is_compartilhado = !is_null($is_compartilhado);
    }
}
