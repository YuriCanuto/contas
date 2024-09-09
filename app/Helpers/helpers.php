<?php

use Carbon\CarbonPeriod;

if (! function_exists('meses_do_ano')) {
    function mesesDoAno(): array {
        return [
            1  => 'Janeiro',
            2  => 'Fevereiro',
            3  => 'Março',
            4  => 'Abril',
            5  => 'Maio',
            6  => 'Junho',
            7  => 'Julho',
            8  => 'Agosto',
            9  => 'Setembro',
            10 => 'Outubro',
            11 => 'Novembro',
            12 => 'Dezembro',
        ];
    }
}

if (! function_exists('range_ano')) {
    function rangeAno(): array {
        return collect(CarbonPeriod::create('2023-01-01', '1 year', now()->endOfYear()))
            ->map(fn($ano) => $ano->format('Y'))
            ->toArray();
    }
}
