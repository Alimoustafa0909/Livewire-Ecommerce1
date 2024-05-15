<?php

namespace App\Providers;

use App\Services\Dashboard\Admin\AdminService;
use App\Services\Dashboard\Admin\AdminServiceInterface;
use App\Services\Dashboard\Category\CategoryService;
use App\Services\Dashboard\Category\CategoryServiceInterface;
use App\Services\Dashboard\Product\ProductService;
use App\Services\Dashboard\Product\ProductServiceInterface;
use App\Services\Dashboard\Slider\SliderService;
use App\Services\Dashboard\Slider\SliderServiceInterface;
use App\Services\Dashboard\User\UserService;
use App\Services\Dashboard\User\UserServiceInterface;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ProductServiceInterface::class, ProductService::class);
        $this->app->bind(AdminServiceInterface::class, AdminService::class);
        $this->app->bind(CategoryServiceInterface::class, CategoryService::class);
        $this->app->bind(UserServiceInterface::class, UserService::class);
        $this->app->bind(SliderServiceInterface::class, SliderService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
    }
}
