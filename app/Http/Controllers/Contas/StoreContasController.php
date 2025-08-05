<?php

namespace App\Http\Controllers\Contas;

use App\DTO\Contas\CreateContasDTO;
use App\DTO\Contas\CreateParcelasDTO;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Validators\Contas\StoreContasValidator;
use App\Repositories\Contracts\IParcelaRepository;
use App\Repositories\Contracts\ITransacaoRepository;
use Carbon\CarbonImmutable;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class StoreContasController extends Controller
{
    public function __invoke(
        string $card_id,
        Request $request,
        StoreContasValidator $storeContasValidator,
        ITransacaoRepository $transacaoRepository,
        IParcelaRepository $parcelaRepository
    ) {
        $request->merge(['card_id' => $card_id]);

        $validate = $storeContasValidator->validate($request->input());

        DB::beginTransaction();

        try {

            $dto = CreateContasDTO::from($request->input());

            $transacao = $transacaoRepository->create($dto);

            $dataCompra = explode('/', $request->data_compra);
            $mes = $dataCompra[1];
            $ano = $dataCompra[2];

            $dataInicial = CarbonImmutable::createFromDate($ano, $mes, 1);
            $dataFinal = $dataInicial->addMonths((int)$request->qtd_parcelas - 1);

            $periodo = CarbonPeriod::create($dataInicial, $dataFinal)
                ->filter(function ($data) {
                    return $data->day == 1;
                });

            foreach ($periodo as $parcela => $data) {
                $dtoParcela = CreateParcelasDTO::from([
                    'transacao_id' => $transacao->id,
                    'mes' => $data->month,
                    'ano' => $data->year,
                    'parcela' => $parcela + 1,
                    'valor' => $request->valor
                ]);
                $parcelaRepository->create($dtoParcela);
            }

            DB::commit();

            return redirect()->route('cards.contas.listar', ['card_id' => $card_id]);
        } catch (\Illuminate\Validation\ValidationException $exception) {

            return redirect()->back()->withErrors($validate)->withInput();
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());

            DB::rollBack();

            return abort(500);
        }
    }
}
