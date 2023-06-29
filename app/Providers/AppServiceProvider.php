<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Pagination\CustomLengthAwarePaginator;
use Illuminate\Contracts\Pagination\LengthAwarePaginator as LengthAwarePaginatorContract;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(LengthAwarePaginatorContract::class, function ($app, $items, $total, $perPage, $currentPage, $options) {
        return new CustomLengthAwarePaginator($items, $total, $perPage, $currentPage, $options);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //app()->bind(LengthAwarePaginator::class, CustomLengthAwarePaginator::class);
                
    }
}
