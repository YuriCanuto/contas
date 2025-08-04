<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Contracts\IUserRepository;
use Illuminate\Database\Eloquent\Collection;

class UserRepository implements IUserRepository
{
    public function __construct(private User $user)
    {}

    public function getUsuarios(): Collection
    {
        return $this->user->get();
    }

}