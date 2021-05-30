<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Config;
use Carbon\Carbon;
use Illuminate\Http\Request;

class GeneralSettingController extends Controller
{

    public function edit()
    {
        $site_title = Config::where('key','site_title')->value('value');
        $site_tel = Config::where('key','site_tel')->value('value');
        $site_email = Config::where('key','site_email')->value('value');
        $site_address = Config::where('key','site_address')->value('value');
        $site_logo = Config::where('key','site_logo')->value('value');
        $site_facebook = Config::where('key','site_facebook')->value('value');
        $site_twitter = Config::where('key','site_twitter')->value('value');
        $site_instagram = Config::where('key','site_instagram')->value('value');
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
            'site_tel' => $site_tel,
            'site_email' => $site_email,
            'site_address' => $site_address,
            'site_facebook' => $site_facebook,
            'site_twitter' => $site_twitter,
            'site_instagram' => $site_instagram,
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
        Config::where('key','site_tel')->update([
            'value' => $request->site_tel
        ]);
        Config::where('key','site_email')->update([
            'value' => $request->site_email
        ]);
        Config::where('key','site_address')->update([
            'value' => $request->site_address
        ]);

        if ($request->hasFile('site_logo')) {
            $file = $request->file('site_logo');
            if ($file->isValid()) {
                $oldPhoto = Config::where('key','site_logo')->value('value');
                if(file_exists(public_path('photo/'.$oldPhoto))){
                    unlink(public_path('photo/'.$oldPhoto));
                }
                $filename = strtotime(Carbon::now())."-logo.".$file->getClientOriginalExtension();
                $file->storeAs('photo',$filename, 'public_html');
                Config::where('key','site_logo')->update([
                    'value' => $filename
                ]);
            }else{
                return back()->with('error', 'An error occurred while uploading the file.');
            }
        }

        if ($request->hasFile('default_product_logo')) {
            $file = $request->file('default_product_logo');
            if ($file->isValid()) {
                $oldPhoto = Config::where('key','default_product_logo')->value('value');
                if(file_exists(public_path('photo/'.$oldPhoto))){
                    unlink(public_path('photo/'.$oldPhoto));
                }
                $filename = strtotime(Carbon::now())."-def-product-logo.".$file->getClientOriginalExtension();
                $file->storeAs('photo',$filename, 'public_html');
                Config::where('key','default_product_logo')->update([
                    'value' => $filename
                ]);
            }else{
                return back()->with('error', 'An error occurred while uploading the file.');
            }
        }

        Config::where('key','product_count_per_click_main_page')->update([
            'value' => $request->product_count_per_click_main_page
        ]);
        Config::where('key','product_count_per_click_category_page')->update([
            'value' => $request->product_count_per_click_category_page
        ]);

        if($request->email_confirmation_required){
            Config::where('key','email_confirmation_required')->update([
                'value' => 1
            ]);
        }else{
            Config::where('key','email_confirmation_required')->update([
                'value' => 0
            ]);
        }

        Config::where('key','registration_rules')->update([
            'value' => $request->registration_rules
        ]);
        Config::where('key','privacy_policy')->update([
            'value' => $request->privacy_policy
        ]);
        Config::where('key','purchase_rules')->update([
            'value' => $request->purchase_rules
        ]);
        Config::where('key','sender_email_title')->update([
            'value' => $request->sender_email_title
        ]);
        Config::where('key','smtp_server')->update([
            'value' => $request->smtp_server
        ]);
        Config::where('key','smtp_port')->update([
            'value' => $request->smtp_port
        ]);
        Config::where('key','smtp_username')->update([
            'value' => $request->smtp_username
        ]);
        if($request->smtp_password){
            Config::where('key','smtp_password')->update([
                'value' => $request->smtp_password
            ]);
        }
        if($request->meta_keywords){
            Config::where('key','meta_keywords')->update([
                'value' => $request->meta_keywords
            ]);
        }
        if($request->meta_description){
            Config::where('key','meta_description')->update([
                'value' => $request->meta_description
            ]);
        }
        return back()->with('success', 'General settings updated successfully.');
    }
}
