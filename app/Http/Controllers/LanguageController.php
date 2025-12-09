<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function switch($locale)
    {
        if (!in_array($locale, ['en', 'lt'])) {
            $locale = 'lt'; // Default to Lithuanian
        }

        // Set in session
        Session::put('locale', $locale);
        
        // Also set in cookie as backup
        cookie()->queue('locale', $locale, 60 * 24 * 30); // 30 days
        
        // Set locale for current request
        App::setLocale($locale);
        
        // Force session save
        Session::save();

        return redirect()->back();
    }
}
