<?php

namespace App\Http\Controllers\Contas;

use App\DTO\CommomDTO;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\ITransacaoRepository;
use Carbon\Carbon;
use Carbon\CarbonImmutable;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

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

        $contasUsuarios = $repository->getTotalTrasacoesDosUsuarios($dto);

        $valorTotal = $transacoes->sum(function($value) {
            return $value->parcelas->first()->valor;
        });

        $dadosCalendario = datas_calendario(
            $dto->ano, $dto->mes, $request->url()
        );

        return view('contas.index', [
            'card_id'          => $card_id,
            'contas'           => $transacoes,
            'mes_atual'        => ucfirst(Arr::get($dadosCalendario, 'mes_atual')),
            'url_mes_anterior' => Arr::get($dadosCalendario, 'url_mes_anterior'),
            'url_proximo_mes'  => Arr::get($dadosCalendario, 'url_proximo_mes'),
            'valor_total'      => $valorTotal,
            'contas_usuarios'  => $contasUsuarios,
        ]);
    }

}