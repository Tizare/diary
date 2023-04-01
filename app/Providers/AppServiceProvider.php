<?php

namespace App\Providers;

use App\QueryBuilders\DiaryQueryBuilders;
use App\QueryBuilders\PhotosQueryBuilders;
use App\QueryBuilders\PostsQueryBuilders;
use App\QueryBuilders\QueryBuilder;
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
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
