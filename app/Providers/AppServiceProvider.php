<?php

namespace App\Providers;

use App\Interfaces\IAdmin;
use App\Interfaces\ICategory;
use App\Services\AdminService;
use App\Services\CategoryService;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IAdmin::class, AdminService::class);
        $this->app->bind(ICategory::class, CategoryService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
    }
}
