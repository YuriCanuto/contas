<?php

namespace App\Repositories\Contracts;

use App\DTO\Cards\CreateCardDTO;
use App\DTO\Cards\UpdateCardDTO;
use App\Models\Card;
use Illuminate\Database\Eloquent\Collection;

interface ICardRepository
{
    /**
     * @param CreateCardDTO $createCardDTO
     * @return Card
     */
    public function create(CreateCardDTO $createCardDTO): Card;

    /**
     * @param array $filter
     * @return Collection
     */
    public function list(array $filter): Collection;

    /**
     * @param string $card_id
     * @return Card
     */
    public function show(string $card_id): Card;

    /**
     * @param UpdateCardDTO $updateCardDTO
     * @return bool
     */
    public function update(UpdateCardDTO $updateCardDTO): bool;

    /**
     * @param string $card_id
     * @return bool
     */
    public function delete(string $card_id): bool;
}
