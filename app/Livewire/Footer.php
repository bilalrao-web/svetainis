<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\MenuItem;
use App\Models\Setting;

class Footer extends Component
{
    public function render()
    {
        $menuItems = MenuItem::active()->location('footer')->ordered()->get();
        $logo = Setting::get('logo', 'images/logo.png');
        $siteName = Setting::get('site_name', 'UPLANCE');
        $aboutText = Setting::get('about_text', '');
        $address = Setting::get('address', '');
        $phone = Setting::get('contact_phone', '');
        $email = Setting::get('contact_email', '');
        $facebook = Setting::get('facebook_url', '');
        $linkedin = Setting::get('linkedin_url', '');
        $youtube = Setting::get('youtube_url', '');
        $instagram = Setting::get('instagram_url', '');
        $tiktok = Setting::get('tiktok_url', '');
        
        return view('livewire.footer', compact(
            'menuItems', 'logo', 'siteName', 'aboutText', 
            'address', 'phone', 'email', 
            'facebook', 'linkedin', 'youtube', 'instagram', 'tiktok'
        ));
    }
}
