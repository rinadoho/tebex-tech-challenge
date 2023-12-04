<?php

namespace App\Providers;

use App\Interfaces\RequestInterface;
use App\Services\Steam;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class RequestServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register() : void
    {
        $requestType = Str::headline(request()->type);
        $requestClass = '\App\Services\\' . $requestType;

        $this->app->bind(RequestInterface::class, $requestClass );
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
