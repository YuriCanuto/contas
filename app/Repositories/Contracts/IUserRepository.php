<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Collection;

interface IUserRepository
{
    public function getUsuarios(): Collection;
}
