<?php

namespace App\DTO;

use Spatie\LaravelData\Data;

class CommomDTO extends Data
{
    public function __construct(
        public string|null $page,
        public string|null $mes,
        public string|null $ano,
        public string|null $card_id
    )
    {
        $this->page = $this->page ?? 1;
        $this->mes = $this->mes ?? date('n');
        $this->ano = $this->ano ?? date('Y');
    }
}