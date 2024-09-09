<?php

namespace App\Repositories\Contracts;

use App\Models\Card;
use Illuminate\Database\Eloquent\Collection;

interface ICardRepository
{
    public function create(array $data): Card;
    public function list(string $user_id, ?array $filter): Collection;
    public function show(string $user_id, string $card_id): Card;
    public function update(string $user_id, string $card_id, array $data): bool;
    public function delete(string $user_id, string $card_id): bool;
}
