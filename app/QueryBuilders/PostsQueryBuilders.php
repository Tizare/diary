<?php

declare(strict_types=1);

namespace App\QueryBuilders;

use App\Models\Post;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;


final class PostsQueryBuilders extends QueryBuilder
{
    public Builder $model;

    public function __construct()
    {
        $this->model = Post::query();
    }

    function getAll(): Collection
    {
        return Post::query()->get();
    }

    /**
     * @param int $quantity
     * @return LengthAwarePaginator
     */
    public function getPostsWithPagination (int $quantity = 20): LengthAwarePaginator
    {
        return $this->model->with('users')->paginate($quantity);
    }

    /**
     * @param int $id
     * @return Collection
     */
    public function getPostById (int $id): Collection
    {
        return $this->model->where('id', $id)->get();
    }

    /**
     * @param int $id
     * @param int $quantity
     * @return LengthAwarePaginator
     */
    public function getPostsByUserId (int $id, int $quantity = 20): LengthAwarePaginator
    {
        return $this->model->with('user')->where("users_id", $id)->paginate($quantity);
    }

    public function getPostWithComments (int $post_id): Collection
    {
        return $this->model->where('id', $post_id)->with('comments')->with('user')->get();
    }
}
