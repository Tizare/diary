<?php

declare(strict_types=1);

namespace App\QueryBuilders;

use App\Models\Photo;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

final class PhotosQueryBuilders extends QueryBuilder
{
    public Builder $model;

    public function __construct()
    {
        $this->model = Photo::query();
    }
    function getAll(): Collection
    {
        return Photo::query()->get();
    }

    /**
     * @param int $id
     * @return Collection
     */
    public function getPhotosByUserId (int $id): Collection
    {
        return $this->model->where("user_id", $id)->get();
    }
}
