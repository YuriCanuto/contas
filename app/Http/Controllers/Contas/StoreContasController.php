<?php

namespace App\Http\Controllers\Contas;

use App\DTO\Contas\CreateContasDTO;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Validators\Contas\StoreContasValidator;
use App\Repositories\Contracts\ITransacaoRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class StoreContasController extends Controller
{
    public function __invoke(
        string $card_id,
        Request $request,
        StoreContasValidator $storeContasValidator,
        ITransacaoRepository $transacaoRepository
    ) {
        $request->merge(['card_id' => $card_id]);

        $validate = $storeContasValidator->validate($request->input());

        DB::beginTransaction();

        try {

            $dto = CreateContasDTO::from($request->input());

            $transacaoRepository->create($dto);

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
