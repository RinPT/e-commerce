<?php

namespace App\Providers;

use App\Models\Config;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
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
        if(Schema::hasTable('config')){
            $site_title = Config::where('key','site_title')->value('value');
            $site_logo = Config::where('key','site_logo')->value('value');
            $meta_keywords = Config::where('key','meta_keywords')->value('value');
            $meta_description = Config::where('key','meta_description')->value('value');

            View::share('site_title', $site_title);
            View::share('site_logo', $site_logo);
            View::share('meta_keywords', $meta_keywords);
            View::share('meta_description', $meta_description);
        }
    }
}
