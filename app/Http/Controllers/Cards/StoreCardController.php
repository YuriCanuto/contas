<?php

namespace App\Http\Controllers\Cards;

use App\DTO\Cards\CreateCardDTO;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Validators\Cards\StoreCardValidator;
use App\Repositories\Contracts\ICardRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class StoreCardController extends Controller {

    public function __invoke(
        Request $request,
        CreateCardDTO $createCardDTO,
        ICardRepository $cardRepository,
        StoreCardValidator $storeCardValidator
    )
    { 
        $validate = $storeCardValidator::validate($request->input());

        try {
            
            $createCardDTO->registrar($validate->validated());

            $cardRepository->create($createCardDTO);

            return redirect()->route('cards.listar');

        } catch (\Illuminate\Validation\ValidationException $exception) {

            return redirect()->back()->withErrors($validate)->withInput();
            
        } catch (\Exception $exception) {
            
            Log::error($exception->getMessage());
            return abort(500);
        }
    }

}