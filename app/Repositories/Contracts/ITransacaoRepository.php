<?php

namespace App\Repositories\Contracts;

use App\Models\Transacao;
use Illuminate\Database\Eloquent\Collection;

interface ITransacaoRepository {

    public function create(array $data): Transacao;
    public function list(string $card_id, array $filter = []): Collection;
}
