<?php

namespace App\Repositories;

use App\Interfaces\Repositories\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class UserRepository implements UserRepositoryInterface
{
    public function __construct(
        private User $model
    )
    {
    }

    public function getAll(): Collection
    {
        return $this->model->get();
    }

    public function getFromCursor(int $cursor = 0, int $limit = 25): Collection
    {
        return $this->model
            ->where('id', '>', $cursor)
            ->orderBy('id')
            ->limit($limit)
            ->get();
    }
}
