<?php

declare(strict_types=1);

namespace App\QueryBuilders;

use App\Models\Post;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;


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
     * @param int $post_id
     * @return Collection
     */
    public function getPostWithComments (int $post_id): Collection
    {
        return $this->model->where('id', $post_id)->with('comments')->with('user')->get();
    }
}
