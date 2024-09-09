<?php

namespace App\Repositories;

use App\Models\Transacao;
use App\Repositories\Contracts\ITransacaoRepository;
use Illuminate\Database\Eloquent\Collection;

class TransacaoRepository implements ITransacaoRepository
{
    public function __construct(private Transacao $transacao)
    {
    }

    /**
     * @param array $data
     * @return Transacao
     */
    public function create(array $data): Transacao
    {
        return $this->transacao->create($data);
    }

    /**
     * @param string $card_id
     * @param null|array $filter
     * @return Collection
     */
    public function list(string $card_id, array $filter = []): Collection
    {
        $mes = data_get($filter, 'mes', date('n'));
        $ano = data_get($filter, 'ano', date('Y'));

        return $this->transacao
            ->where('card_id', $card_id)
            ->withWhereHas('parcelas', function ($query) use ($mes, $ano) {
                $query->select([
                    'id', 'transacao_id', 'parcela', 'valor', 'mes', 'ano',
                    'desconto', 'is_pago', 'data_pagamento'
                ]);
                $query->where('mes', $mes);
                $query->where('ano', $ano);
            })
            ->where('ativo', true)
            ->get();
    }
}
