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
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;
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

        View::share('QS', $_SERVER['QUERY_STRING'] ?? "");

        /**
         * Cart
         */
        if(isset($_COOKIE['cart_products'])){
            $cart_products = json_decode($_COOKIE['cart_products']);
            $count = 0;
            foreach ($cart_products as $p) {
                $count += $p->count;
            }
            View::share('cart_product_count',$count);
        }else{
            View::share('cart_product_count',0);
        }

        if(Schema::hasTable('currencies')){
            $currencies = Currencies::get();

            /**
             * Set first
             */
            if(!isset($_COOKIE["cookie_currency"])) {
                if(count($currencies)){
                    setcookie("cookie_currency", $currencies[0],time() + (86400 * 30));
                    View::share('cookie_currency', $currencies[0]);
                }
            }else{
                View::share('cookie_currency', json_decode($_COOKIE["cookie_currency"]));
            }
            /**
             * Change with request
             */
            if(!is_null(Request::input('currency'))){
                $currency = Currencies::where('id',Request::input('currency'))->get();
                setcookie("cookie_currency", $currency[0],time() + (86400 * 30));
                View::share('cookie_currency', $currency[0]);
            }
            View::share('header_currencies', $currencies);
        }

        if(Schema::hasTable('config')){
            $site_title = Config::where('key','site_title')->value('value');
            $site_logo = Config::where('key','site_logo')->value('value');
            $site_tel = Config::where('key','site_tel')->value('value');
            $site_email = Config::where('key','site_email')->value('value');
            $site_address = Config::where('key','site_address')->value('value');
            $site_facebook = Config::where('key','site_facebook')->value('value');
            $site_twitter = Config::where('key','site_twitter')->value('value');
            $site_instagram = Config::where('key','site_instagram')->value('value');
            $meta_keywords = Config::where('key','meta_keywords')->value('value');
            $meta_description = Config::where('key','meta_description')->value('value');

            View::share('site_title', $site_title);
            View::share('site_tel', $site_tel);
            View::share('site_logo', $site_logo);
            View::share('site_email', $site_email);
            View::share('site_address', $site_address);
            View::share('site_facebook', $site_facebook);
            View::share('site_twitter', $site_twitter);
            View::share('site_instagram', $site_instagram);
            View::share('meta_keywords', $meta_keywords);
            View::share('meta_description', $meta_description);
        }
        if(Schema::hasTable('categories')){
            $categories = Categories::get();
            $items = Categories::tree();

            View::share('header_categories', $categories);
            View::share('header_items', $items);
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
                    $allperms = [];
                    $perms = json_decode(Group::find(3)->permissions);
                    foreach ($perms as $perm) {
                        $allperms[] = $perm;
                    }
                    $logged_author->perms = $allperms;
                }

                View::share('logged_author', $logged_author);
                View::share('logged_author_type', $_SESSION['author_type']);
                View::share('logged_author_gtype', $_SESSION['author_group_type']);
            }
        }
        if(Schema::hasTable('store_requests')){
            $store_requests_count = Store_Requests::where('status','waiting')->count();

            View::share('store_requests_count', $store_requests_count);
        }
    }
}
