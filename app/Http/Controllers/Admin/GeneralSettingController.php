<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Config;
use Illuminate\Http\Request;

class GeneralSettingController extends Controller
{

    public function edit()
    {
        $site_title = Config::where('key','site_title')->value('value');
        $site_logo = Config::where('key','site_logo')->value('value');
        $default_product_logo = Config::where('key','default_product_logo')->value('value');
        $product_count_per_click_main_page = Config::where('key','product_count_per_click_main_page')->value('value');
        $product_count_per_click_category_page = Config::where('key','product_count_per_click_category_page')->value('value');
        $email_confirmation_required = Config::where('key','email_confirmation_required')->value('value');
        $registration_rules = Config::where('key','registration_rules')->value('value');
        $privacy_policy = Config::where('key','privacy_policy')->value('value');
        $purchase_rules = Config::where('key','purchase_rules')->value('value');

        return view('admin.settings.general_settings')->with([
            'site_title' => $site_title,
            'site_logo' => $site_logo,
            'default_product_logo' => $default_product_logo,
            'product_count_per_click_main_page' => $product_count_per_click_main_page,
            'product_count_per_click_category_page' => $product_count_per_click_category_page,
            'email_confirmation_required' => $email_confirmation_required,
            'registration_rules' => $registration_rules,
            'privacy_policy' => $privacy_policy,
            'purchase_rules' => $purchase_rules,
        ]);
    }

    public function update(Request $request, $id)
    {
        //
    }
}
