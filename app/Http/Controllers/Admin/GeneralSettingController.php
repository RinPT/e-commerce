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
        $sender_email_title = Config::where('key','sender_email_title')->value('value');
        $smtp_server = Config::where('key','smtp_server')->value('value');
        $smtp_port = Config::where('key','smtp_port')->value('value');
        $smtp_username = Config::where('key','smtp_username')->value('value');
        $smtp_password = Config::where('key','smtp_password')->value('value');
        $meta_keywords = Config::where('key','meta_keywords')->value('value');
        $meta_description = Config::where('key','meta_description')->value('value');

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
            'sender_email_title' => $sender_email_title,
            'smtp_server' => $smtp_server,
            'smtp_port' => $smtp_port,
            'smtp_username' => $smtp_username,
            'smtp_password' => $smtp_password,
            'meta_keywords' => $meta_keywords,
            'meta_description' => $meta_description,
        ]);
    }

    public function update(Request $request)
    {
        Config::where('key','site_title')->update([
            'value' => $request->site_title
        ]);
//        Config::where('key','site_logo')->update([
//            'value' => $request->site_logo
//        ]);
//        Config::where('key','default_product_logo')->update([
//            'value' => $request->default_product_logo
//        ]);
        Config::where('key','product_count_per_click_main_page')->update([
            'value' => $request->product_count_per_click_main_page
        ]);
        Config::where('key','product_count_per_click_category_page')->update([
            'value' => $request->product_count_per_click_category_page
        ]);
        Config::where('key','email_confirmation_required')->update([
            'value' => $request->email_confirmation_required
        ]);
        Config::where('key','email_confirmation_required')->update([
            'value' => $request->email_confirmation_required
        ]);
        return back()->with('success', 'General settings updated successfully.');
    }
}
