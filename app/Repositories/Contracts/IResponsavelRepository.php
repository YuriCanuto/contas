<?php

namespace App\Repositories\Contracts;

use App\Models\Responsavel;
use Illuminate\Database\Eloquent\Collection;

interface IResponsavelRepository
{
    public function create(array $data): Responsavel;
    public function list(string $user_id): Collection;
    public function show(string $user_id, string $responsavel_id): ?Responsavel;
    public function update(string $user_id, string $responsavel_id, array $data): bool;
    public function delete(string $user_id, string $responsavel_id): bool;
}
