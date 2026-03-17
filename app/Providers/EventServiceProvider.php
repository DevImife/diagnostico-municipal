<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     */
    public $listen = [
        \Illuminate\Auth\Events\Login::class => [
            \App\Listeners\LogUserLogin::class,
        ],
        \Illuminate\Auth\Events\Logout::class => [
            \App\Listeners\LogUserLogout::class,
        ],
    ];

    /**
     * Register any services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any services.
     */
    public function boot(): void
    {
        //
    }
}
