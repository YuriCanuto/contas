<?php

namespace App\Http\Controllers\Contas;

use App\DTO\CommomDTO;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\ITransacaoRepository;
use Carbon\Carbon;
use Carbon\CarbonImmutable;
use Illuminate\Http\Request;

class ListarContasController extends Controller {

    public function __invoke(
        string $card_id,
        Request $request,
        ITransacaoRepository $repository
    )
    {
        $dto = CommomDTO::from([
            'card_id' => $card_id,
            'page'    => $request->get('page'),
            'mes'     => $request->get('mes'),
            'ano'     => $request->get('ano'),
        ]);

        $transacoes = $repository->getTransacoes($dto);

        $valorTotal = $transacoes->sum(function($value) {
            return $value->parcelas->first()->valor;
        });

        // CRIAR UM HELPER
        $mesAtual = CarbonImmutable::createFromDate($dto->ano, $dto->mes, 1);
        $dataAnterior = $mesAtual->subMonthsNoOverflow(1);
        $dataPosterior = $mesAtual->addMonths(1);

        $urlMesAnterior = $request->url()."?".http_build_query([
            'mes' => $dataAnterior->format('n'),
            'ano' => $dataAnterior->format('Y')
        ]);

        $urlProximoMes = $request->url()."?".http_build_query([
            'mes' => $dataPosterior->format('n'),
            'ano' => $dataPosterior->format('Y')
        ]);

        return view('contas.index', [
            'card_id'          => $card_id,
            'contas'           => $transacoes,
            'mes_atual'        => ucfirst($mesAtual->translatedFormat('F \de Y')),
            'url_mes_anterior' => $urlMesAnterior,
            'url_proximo_mes'  => $urlProximoMes,
            'valor_total'      => $valorTotal,
        ]);
    }

}