<?php

namespace App\Actions;

use App\DTO\Contas\CreateParcelasDTO;
use App\Repositories\Contracts\IParcelaRepository;
use Carbon\CarbonImmutable;
use Carbon\CarbonPeriod;

class CadastrarParcelasAction
{
    public function __construct(
        private IParcelaRepository $parcelaRepository
    ) {}

    public function execute(
        string $dataCompra, 
        string $qtdParcelas, 
        string $transacaoId, 
        string $valor
    )
    {
        $dataCompra = explode('-', $dataCompra);
        $mes = $dataCompra[1];
        $ano = $dataCompra[0];

        $dataInicial = CarbonImmutable::createFromDate($ano, $mes, 1);
        $dataFinal = $dataInicial->addMonths((int)$qtdParcelas - 1);

        $periodo = CarbonPeriod::create($dataInicial, $dataFinal)
            ->filter(function ($data) {
                return $data->day == 1;
            });

        foreach ($periodo as $parcela => $data) {
            $dtoParcela = CreateParcelasDTO::from([
                'transacao_id' => $transacaoId,
                'mes'          => $data->month,
                'ano'          => $data->year,
                'parcela'      => $parcela + 1,
                'valor'        => $valor
            ]);
            $this->parcelaRepository->create($dtoParcela);
        }
    }
}
