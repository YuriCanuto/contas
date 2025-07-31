<?php

namespace App\Http\Controllers\Contas;

use App\DTO\Cards\CreateCardDTO;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Validators\Cards\StoreCardValidator;
use App\Repositories\Contracts\ICardRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class StoreContasController extends Controller {

    public function __invoke(
        Request $request,
        // ICardRepository $cardRepository,
        // StoreCardValidator $storeCardValidator
    )
    { 
        // $request->merge(['user_id' => Auth::user()->id]);

        // $validate = $storeCardValidator->validate($request->input());

        // try {

        //     $dto = CreateCardDTO::from($request->input());

        //     $cardRepository->create($dto);

        //     return redirect()->route('cards.listar');

        // } catch (\Illuminate\Validation\ValidationException $exception) {

        //     return redirect()->back()->withErrors($validate)->withInput();
            
        // } catch (\Exception $exception) {
        //     Log::error($exception->getMessage());
        //     return abort(500);
        // }
    }

}