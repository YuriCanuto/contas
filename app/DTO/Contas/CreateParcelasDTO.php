<?php

namespace App\DTO\Contas;

use Spatie\LaravelData\Data;

class CreateParcelasDTO extends Data
{
    public function __construct(
        public string $transacao_id,
        public string $mes,
        public string $ano,
        public string $parcela,
        public string $valor
    ) {
        
    }
}
