<?php

namespace App\Repositories;

use App\Models\Card;
use App\Repositories\Contracts\ICardRepository;
use Illuminate\Database\Eloquent\Collection;

class CardRepository implements ICardRepository
{
    public function __construct(private Card $card)
    {
    }

    /**
     * @param array $data
     * @return Card
     */
    public function create(array $data): Card
    {
        return $this->card->create($data);
    }

    /**
     * @param null|array $filter
     * @return Collection
     */
    public function list(string $user_id, ?array $filter): Collection
    {
        $mes = data_get($filter, 'mes', date('n'));
        $ano = data_get($filter, 'ano', date('Y'));

        return $this->card
            ->where('user_id', $user_id)
            ->with(['transacoes' => function ($query) use ($mes, $ano) {
                $query->with(['parcelas' => function($query) use ($mes, $ano) {
                    $query->select([
                        'id', 'transacao_id', 'parcela', 'valor', 'mes', 'ano',
                        'desconto', 'is_pago', 'data_pagamento'
                    ]);
                    $query->where('mes', $mes);
                    $query->where('ano', $ano);
                }]);
                $query->where('ativo', true);
            }])
            ->latest()
            ->get();
    }

    /**
     * @param string $user_id
     * @param string $card_id
     * @return null|Card
     */
    public function show(string $user_id, string $card_id): Card
    {
        return $this->card
            ->where('id', $card_id)
            ->where('user_id', $user_id)
            ->first();
    }

    /**
     * @param string $user_id
     * @param string $card_id
     * @param array $data
     * @return bool
     */
    public function update(string $user_id, string $card_id, array $data): bool
    {
        return $this->card
            ->where('id', $card_id)
            ->where('user_id', $user_id)
            ->update($data);
    }

    /**
     * @param string $user_id
     * @param string $card_id
     * @return bool
     */
    public function delete(string $user_id, string $card_id): bool
    {
        return $this->card
            ->where('id', $card_id)
            ->where('user_id', $user_id)
            ->delete();
    }
}
