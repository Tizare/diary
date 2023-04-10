<?php

declare(strict_types=1);

namespace App\QueryBuilders;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;


final class UserQueryBuilders extends QueryBuilder
{
    public Builder $model;

    public function __construct()
    {
        $this->model = User::query();
    }

    function getAll(): Collection
    {
        return $this->model->get();
    }

    public function getUserById(int $id): Collection
    {
        return $this->model->where('id', $id)->get();
    }

    public function getLastUsers(): Collection
    {
        return $this->model->orderByDesc('id')->limit(2)->get();
    }

    public function getWaitingUsers(): Collection
    {
        return User::query()->where('waiting', true)->inRandomOrder()->limit(2)->get();
    }

    public function getNotWaitingUsers(): Collection
    {
        return User::query()->where('waiting', false)->inRandomOrder()->limit(2)->get();
    }
}
