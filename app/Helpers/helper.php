<?php

use Carbon\CarbonImmutable;
use Carbon\CarbonPeriod;

if (! function_exists('dias_do_mes')) {
    function dias_do_mes(): array {
        return range(1, 31);
    }
}

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
        return collect(CarbonPeriod::create('2024-01-01', '1 year', now()->addYearNoOverflow(3)->endOfYear()))
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

if (! function_exists('datas_calendario')) {
    function datas_calendario(string $ano, string $mes, string $url): array {

        $mesAtual = CarbonImmutable::createFromDate($ano, $mes, 1);
        $dataAnterior = $mesAtual->subMonthsNoOverflow(1);
        $dataPosterior = $mesAtual->addMonths(1);

        $urlMesAnterior = "$url?".http_build_query([
            'mes' => $dataAnterior->format('n'),
            'ano' => $dataAnterior->format('Y')
        ]);

        $urlProximoMes = "$url?".http_build_query([
            'mes' => $dataPosterior->format('n'),
            'ano' => $dataPosterior->format('Y')
        ]);

        return [
            'mes_atual' => $mesAtual->translatedFormat('F \de Y'),
            'url_mes_anterior' => $urlMesAnterior,
            'url_proximo_mes' => $urlProximoMes
        ];
    }
}