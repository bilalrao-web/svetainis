<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MenuItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class MenuController extends Controller
{
    public function index()
    {
        $menuItems = MenuItem::ordered()->get();
        return view('admin.menus.index', compact('menuItems'));
    }

    public function create()
    {
        return view('admin.menus.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'label' => 'required|string|max:255',
            'url' => 'nullable|string',
            'route' => 'nullable|string',
            'icon' => 'nullable|string',
            'order' => 'integer|min:0',
            'is_active' => 'boolean',
            'location' => 'required|in:header,footer',
        ]);

        // Validate route exists if provided
        if ($data['route'] && !Route::has($data['route'])) {
            return back()->withErrors(['route' => 'The route "' . $data['route'] . '" does not exist. Please use a valid route name or provide a URL instead.'])->withInput();
        }

        // Ensure either route or url is provided
        if (empty($data['route']) && empty($data['url'])) {
            return back()->withErrors(['route' => 'Either a route name or URL must be provided.'])->withInput();
        }

        MenuItem::create($data);

        return redirect()->route('admin.menus.index')
            ->with('success', 'Menu item created successfully!');
    }

    public function edit(MenuItem $menuItem)
    {
        return view('admin.menus.edit', compact('menuItem'));
    }

    public function update(Request $request, MenuItem $menuItem)
    {
        $data = $request->validate([
            'label' => 'required|string|max:255',
            'url' => 'nullable|string',
            'route' => 'nullable|string',
            'icon' => 'nullable|string',
            'order' => 'integer|min:0',
            'is_active' => 'boolean',
            'location' => 'required|in:header,footer',
        ]);

        // Validate route exists if provided
        if ($data['route'] && !Route::has($data['route'])) {
            return back()->withErrors(['route' => 'The route "' . $data['route'] . '" does not exist. Please use a valid route name or provide a URL instead.'])->withInput();
        }

        // Ensure either route or url is provided
        if (empty($data['route']) && empty($data['url'])) {
            return back()->withErrors(['route' => 'Either a route name or URL must be provided.'])->withInput();
        }

        $menuItem->update($data);

        return redirect()->route('admin.menus.index')
            ->with('success', 'Menu item updated successfully!');
    }

    public function destroy(MenuItem $menuItem)
    {
        $menuItem->delete();
        return redirect()->route('admin.menus.index')
            ->with('success', 'Menu item deleted successfully!');
    }
}
