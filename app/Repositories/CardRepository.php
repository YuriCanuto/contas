<?php

namespace App\Repositories;

use App\DTO\Cards\CreateCardDTO;
use App\DTO\Cards\UpdateCardDTO;
use App\Models\Card;
use App\Repositories\Contracts\ICardRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class CardRepository implements ICardRepository
{
    public function __construct(private Card $card)
    {
    }

    /** {@inheritdoc } */
    public function create(CreateCardDTO $dto): Card
    {
        return $this->card->create($dto->toArray());
    }

    /** {@inheritdoc } */
    public function list(array $filter): Collection
    {
        // $mes = data_get($filter, 'mes', date('n'));
        // $ano = data_get($filter, 'ano', date('Y'));

        return $this->card
            ->where('user_id', Auth::user()->id)
            // ->with(['transacoes' => function ($query) use ($mes, $ano) {
            //     $query->with(['parcelas' => function($query) use ($mes, $ano) {
            //         $query->select([
            //             'id', 'transacao_id', 'parcela', 'valor', 'mes', 'ano',
            //             'desconto', 'is_pago', 'data_pagamento'
            //         ]);
            //         $query->where('mes', $mes);
            //         $query->where('ano', $ano);
            //     }]);
            //     $query->where('ativo', true);
            // }])
            ->latest()
            ->get();
    }

    /** {@inheritdoc } */
    public function show(string $card_id): Card
    {
        return $this->card
            ->where('user_id', Auth::user()->id)
            ->where('id', $card_id)
            ->first();
    }

    /** {@inheritdoc } */
    public function update(UpdateCardDTO $dto): bool
    {
        return $this->card
            ->where('id', $dto->id)
            ->where('user_id', $dto->user_id)
            ->update(array_filter_null($dto->toArray(['id'])));
    }

    /** {@inheritdoc } */
    public function delete(string $card_id): bool
    {
        return $this->card
            ->where('user_id', Auth::user()->id)
            ->where('id', $card_id)
            ->delete();
    }
}
