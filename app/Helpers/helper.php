<?php

use Carbon\CarbonPeriod;

if (! function_exists('meses_do_ano')) {
    function meses_do_ano(): array {
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
    function range_ano(): array {
        return collect(CarbonPeriod::create('2023-01-01', '1 year', now()->endOfYear()))
            ->map(fn($ano) => $ano->format('Y'))
            ->toArray();
    }
}

if (! function_exists('get_true_ou_false')) {
    function get_true_ou_false($value): string {
        return $value ? 'true' : 'false';
    }
}

if (! function_exists('array_filter_null')) {
    function array_filter_null(array $value): array {
        return array_filter($value, fn ($value) => !is_null($value));
    }
}