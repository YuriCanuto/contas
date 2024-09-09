<?php

namespace App\Repositories;

use App\Models\Responsavel;
use App\Repositories\Contracts\IResponsavelRepository;
use Illuminate\Database\Eloquent\Collection;

class ResponsavelRepository implements IResponsavelRepository
{
    public function __construct(private Responsavel $responsavel)
    {
    }

    /**
     * @param array $data
     * @return Responsavel
     */
    public function create(array $data): Responsavel
    {
        return $this->responsavel->create($data)->fresh();
    }

    /**
     * @param string $user_id
     * @return Collection
     */
    public function list(string $user_id): Collection
    {
        return $this->responsavel->where('user_id', $user_id)->latest()->get();
    }

    /**
     * @param string $user_id
     * @param string $responsavel_id
     * @return null|Responsavel
     */
    public function show(string $user_id, string $responsavel_id): ?Responsavel
    {
        return $this->responsavel
            ->where('id', $responsavel_id)
            ->where('user_id', $user_id)
            ->first();
    }

    /**
     * @param string $user_id
     * @param string $responsavel_id
     * @param array $data
     * @return bool
     */
    public function update(string $user_id, string $responsavel_id, array $data): bool
    {
        return $this->responsavel
            ->where('user_id', $user_id)
            ->where('id', $responsavel_id)
            ->update($data);
    }

    /**
     * @param string $user_id
     * @param string $responsavel_id
     * @return bool
     */
    public function delete(string $user_id, string $responsavel_id): bool
    {
        return $this->responsavel
            ->where('user_id', $user_id)
            ->where('id', $responsavel_id)
            ->delete();
    }
}
