<?php

namespace App\Http\Controllers\Cards;

use App\DTO\Cards\CreateCardDTO;
use App\DTO\Cards\UpdateCardDTO;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Validators\Cards\StoreCardValidator;
use App\Http\Controllers\Validators\Cards\UpdateCardValidator;
use App\Repositories\Contracts\ICardRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UpdateCardController extends Controller {

    public function __invoke(
        string $card_id,
        Request $request,
        UpdateCardDTO $updateCardDTO,
        ICardRepository $cardRepository,
        UpdateCardValidator $updateCardValidator
    )
    { 
        $request->merge(['id' => $card_id]);

        $validate = $updateCardValidator->validate($request->input());

        try {
            
            $updateCardDTO->registrar($validate->validated());

            $cardRepository->update($updateCardDTO);

            return redirect()->route('cards.listar');

        } catch (\Illuminate\Validation\ValidationException $exception) {

            return redirect()->back()->withErrors($validate)->withInput();
            
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return abort(500);
        }
    }

}