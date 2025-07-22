<?php

namespace App\Providers;

use App\Contracts\PostServiceInterface;
use App\Contracts\SubscriptionServiceInterface;
use App\Contracts\UserServiceInterface;
use App\Contracts\WebSiteServiceInterface;
use App\Services\PostService;
use App\Services\SubscriptionService;
use App\Services\UserService;
use App\Services\WebSiteService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UserServiceInterface::class, UserService::class);
        $this->app->bind(PostServiceInterface::class, PostService::class);
        $this->app->bind(WebSiteServiceInterface::class, WebSiteService::class);
        $this->app->bind(SubscriptionServiceInterface::class, SubscriptionService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
