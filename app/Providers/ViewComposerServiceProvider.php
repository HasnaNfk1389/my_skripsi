<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;


class ViewComposerServiceProvider extends ServiceProvider
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
        View::composer('*', function ($view) {
            if (Session::has('loggedUserClass')) {
                $client = new \GuzzleHttp\Client();
                $response = $client->get(sprintf('http://localhost:3000/allSubmittedTask/%s',session('loggedUserClass')));
                $submittedTask = json_decode($response->getBody(), true);


                $client = new \GuzzleHttp\Client();
                $response = $client->get(sprintf('http://localhost:3000/allTask/%s', Session::get('loggedUserClass')));
                $allTask = json_decode($response->getBody(), true);
                $view->with('allTask', $allTask)

                -> with('submitTask', $submittedTask);
            }
        });
        //
    }
}
