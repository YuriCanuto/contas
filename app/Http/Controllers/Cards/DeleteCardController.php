<?php

namespace App\Http\Controllers\Cards;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\ICardRepository;
use Illuminate\Support\Facades\Log;

class DeleteCardController extends Controller {

    public function __invoke(
        string $card_id,
        ICardRepository $cardRepository,
    )
    { 
        try {
            
            $cardRepository->delete($card_id);

            return redirect()->route('cards.listar');

        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return abort(500);
        }
    }

}