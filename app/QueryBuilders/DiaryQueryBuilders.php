<?php

declare(strict_types=1);

namespace App\QueryBuilders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;


final class DiaryQueryBuilders extends QueryBuilder
{
    public Builder $model;

    public function __construct()
    {
        $this->model = Post::query();
    }

    function getAll(): Collection
    {
        return $this->model->get();
    }

    public function getPostsByUserId (int $id, int $quantity = 3): LengthAwarePaginator
    {
        return $this->model->where("user_id", $id)->orderByDesc('id')->with('comments')->paginate($quantity);
    }

}
