<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepostoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Http\Interfaces\UserRepositoryInterface',
            'App\Http\Repositories\UserRepository'
        );

        $this->app->bind(
            'App\Http\Interfaces\AdminRepositoryInterface',
            'App\Http\Repositories\AdminRepository'
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
