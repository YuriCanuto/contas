<?php

namespace App\Services;

use Carbon\Carbon;
use App\Models\Transacao;
use App\Repositories\Contracts\IParcelaRepository;
use App\Repositories\Contracts\ITransacaoRepository;

class TransacaoService
{
    public function __construct(
        private ITransacaoRepository $transacaoRepository,
        private IParcelaRepository $parcelaRepository
    ) {
    }

    /**
     * @param array $data
     * @return Transacao
     */
    public function create(array $data): Transacao
    {
        $transacao = $this->transacaoRepository->create($data);

        $mes = $data['mes_inicio'];
        $ano = data_get($data, 'ano_inicio') ? $data['ano_inicio'] : date('Y');
        $numero = 0;

        for ($i = 0; $i < $data['parcelas']; $i++) {

            $parcela = [
                'transacao_id' => $transacao->id,
                'parcela'      => ++$numero.' / '.$data['parcelas'],
                'valor'        => $data['valor_parcela']
            ];

            $parcela = array_merge($parcela, $this->createAnoEMesDaParcela($mes, $ano, $i));

            $this->parcelaRepository->create($parcela);
        }

        return $transacao;
    }

    /**
     * @param int $mes
     * @param int $ano
     * @param int $parcela
     * @return array
     */
    private function createAnoEMesDaParcela(int $mes, int $ano, int $parcela): array
    {
        $date = Carbon::createFromDate($ano, $mes, 1)->addMonth($parcela)->format('Y-m');

        list($ano, $mes) = explode('-', $date);

        return ['mes' => $mes, 'ano' => $ano];
    }
}
