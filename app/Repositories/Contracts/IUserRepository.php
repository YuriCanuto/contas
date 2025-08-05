<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Collection;

interface IUserRepository
{
    /** @return Collection */
    public function getUsuarios(): Collection;
}
