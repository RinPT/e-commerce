<?php

namespace App\Providers;

use App\Models\Author;
use App\Models\Categories;
use App\Models\Config;
use App\Models\Countries;
use App\Models\Currencies;
use App\Models\Group;
use App\Models\Store;
use App\Models\Store_Requests;
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
        session_start();
        if(Schema::hasTable('config')){
            $site_title = Config::where('key','site_title')->value('value');
            $site_logo = Config::where('key','site_logo')->value('value');
            $site_tel = Config::where('key','site_tel')->value('value');
            $meta_keywords = Config::where('key','meta_keywords')->value('value');
            $meta_description = Config::where('key','meta_description')->value('value');

            View::share('site_title', $site_title);
            View::share('site_tel', $site_tel);
            View::share('site_logo', $site_logo);
            View::share('meta_keywords', $meta_keywords);
            View::share('meta_description', $meta_description);
        }
        if(Schema::hasTable('currencies')){
            $currencies = Currencies::get();

            View::share('header_currencies', $currencies);
        }
        if(Schema::hasTable('categories')){
            $categories = Categories::get();
            $items = Categories::tree();

            View::share('header_categories', $categories);
            View::share('header_items', $items);
        }
        if(Schema::hasTable('store_requests')){
            $store_requests_count = Store_Requests::where('status','waiting')->count();

            View::share('store_requests_count', $store_requests_count);
        }


        /**
         * Admin
         */
        if(Schema::hasTable('authors')){
            if(isset($_SESSION['author'])){
                if($_SESSION['author_type'] === "author"){
                    $logged_author = Author::find($_SESSION['author']);
                    $logged_author->group = json_decode($logged_author->group);
                    $allperms = [];
                    foreach ($logged_author->group as $group) {
                       $perms = json_decode(Group::find($group)->permissions);
                        foreach ($perms as $perm) {
                            $allperms[] = $perm;
                       }
                    }
                    $logged_author->perms = $allperms;
                }elseif($_SESSION['author_type'] === "store"){
                    $logged_author = Store::find($_SESSION['author']);
                }

                View::share('logged_author', $logged_author);
                View::share('logged_author_type', $_SESSION['author_type']);
                View::share('logged_author_gtype', $_SESSION['author_group_type']);
            }
        }
    }
}
