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
     * @return LengthAwarePaginator
     */
    function getPhotosWithPagination (): LengthAwarePaginator
    {
        return $this->model->paginate(1);
    }

    /**
     * @param int $id
     * @return Collection
     */
    public function getPhotoById(int $id): Collection
    {
        return $this->model->where('id', $id)->get();
    }

    /**
     * @param int $id
     * @return LengthAwarePaginator
     */
    public function getPhotosByUserId (int $id): LengthAwarePaginator
    {
        return $this->model->with('users')->where("users_id", $id)->paginate(1);
    }
}
