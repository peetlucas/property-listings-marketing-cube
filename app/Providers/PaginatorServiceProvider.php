<?php

namespace App\Providers;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class PaginatorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Paginator::currentPathResolver(function () {
            /** @var LengthAwarePaginator $this */
            return $this->resolveCurrentPath();
        });

        Paginator::currentPageResolver(function ($pageName = 'page') {
            $page = $this->resolveCurrentPage($pageName);           
            return $page == 1 ? null : $page;
        });
    }
}
?>