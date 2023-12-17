<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Session;

class GlobalDataServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        if (session('loggedUserClass')) {
            $client = new Client();
            $response = $client->get(sprintf('http://localhost:3000/allTask/%s', session('loggedUserClass')));
            $allTask = json_decode($response->getBody(), true);
            View::share('allTask', $allTask);
        }
        //
    }
}
