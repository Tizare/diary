<?php

declare(strict_types=1);

namespace App\QueryBuilders;

use App\Models\Photo;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

final class AlbumQueryBuilders extends QueryBuilder
{
    public Builder $model;

    public function __construct()
    {
        $this->model = Photo::query();
    }

    function getAll(): Collection
    {
        return $this->model->get();
    }

    function getPhotosByUserId($id): LengthAwarePaginator
    {
        return $this->model->with('user')->where('user_id', $id)->orderByDesc('id')->paginate(1);
    }

}
