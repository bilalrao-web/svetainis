<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\MenuItem;
use App\Models\Page;
use App\Models\Portfolio;
use App\Models\ContactMessage;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'services' => Service::count(),
            'portfolios' => Portfolio::count(),
            'menu_items' => MenuItem::count(),
            'pages' => Page::count(),
            'messages' => ContactMessage::count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}
