<?php

namespace App\Providers;

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
        $this->app->bind('path.public',function (){
            return base_path(). '/public_html';
        });
        app()->usePublicPath(base_path(). '/public_html');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(UrlGenerator $url)
    {
        //
         if (env('APP_ENV') == 'production') {
         $url->forceScheme('https');
     }
    }
}
