<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Query Debug Log
        DB::listen(function ($query) {
            Log::channel(config('filesnames.QUERY_LOG'))->info(sprintf(
                "\nQuery: %s\nBindings: %s\nTimes: %s",
                $query->sql,
                json_encode($query->bindings),
                $query->time,
            ));
        });
    }
}
