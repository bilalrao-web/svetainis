<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\MenuItem;
use App\Models\Setting;

class Header extends Component
{
    public function render()
    {
        $menuItems = MenuItem::active()->location('header')->ordered()->get();
        $logo = Setting::get('logo', 'images/logo.png');
        $siteName = Setting::get('site_name', 'UPLANCE');
        
        return view('livewire.header', compact('menuItems', 'logo', 'siteName'));
    }
}
