<?php

declare(strict_types=1);

namespace App\Providers;

use App\QueryBuilders\AlbumQueryBuilders;
use App\QueryBuilders\DiaryQueryBuilders;
use App\QueryBuilders\PhotosQueryBuilders;
use App\QueryBuilders\PostsQueryBuilders;
use App\QueryBuilders\QueryBuilder;
use App\QueryBuilders\UserQueryBuilders;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(QueryBuilder::class, PostsQueryBuilders::class);
        $this->app->bind(QueryBuilder::class, PhotosQueryBuilders::class);
        $this->app->bind(QueryBuilder::class, DiaryQueryBuilders::class);
        $this->app->bind(QueryBuilder::class, AlbumQueryBuilders::class);
        $this->app->bind(QueryBuilder::class, UserQueryBuilders::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

    }
}
