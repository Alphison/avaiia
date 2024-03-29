<?php

namespace App\Interfaces\Repositories;

use Illuminate\Database\Eloquent\Collection;

interface UserRepositoryInterface
{

    public function getAll(): Collection;

    public function getFromCursor(int $cursor = 0, int $limit = 25): Collection;
}
