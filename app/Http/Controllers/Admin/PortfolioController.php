<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::ordered()->get();
        return view('admin.portfolios.index', compact('portfolios'));
    }

    public function create()
    {
        return view('admin.portfolios.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|unique:portfolios,slug',
            'category' => 'required|string',
            'service_slug' => 'required|string',
            'description' => 'nullable|string',
            'image' => 'nullable|url',
            'web_type' => 'nullable|string',
            'use_cases' => 'nullable|string',
            'challenge' => 'nullable|string',
            'solution' => 'nullable|string',
            'client' => 'nullable|string',
            'duration' => 'nullable|string',
            'team_size' => 'nullable|string',
            'is_active' => 'boolean',
        ]);

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }

        $data['technologies'] = $request->input('technologies', []);
        $data['results'] = $request->input('results', []);
        $data['features'] = $request->input('features', []);

        Portfolio::create($data);

        return redirect()->route('admin.portfolios.index')
            ->with('success', 'Portfolio created successfully!');
    }

    public function edit(Portfolio $portfolio)
    {
        return view('admin.portfolios.edit', compact('portfolio'));
    }

    public function update(Request $request, Portfolio $portfolio)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|unique:portfolios,slug,' . $portfolio->id,
            'category' => 'required|string',
            'service_slug' => 'required|string',
            'description' => 'nullable|string',
            'image' => 'nullable|url',
            'web_type' => 'nullable|string',
            'use_cases' => 'nullable|string',
            'challenge' => 'nullable|string',
            'solution' => 'nullable|string',
            'client' => 'nullable|string',
            'duration' => 'nullable|string',
            'team_size' => 'nullable|string',
            'is_active' => 'boolean',
        ]);

        $data['technologies'] = $request->input('technologies', []);
        $data['results'] = $request->input('results', []);
        $data['features'] = $request->input('features', []);

        $portfolio->update($data);

        return redirect()->route('admin.portfolios.index')
            ->with('success', 'Portfolio updated successfully!');
    }

    public function destroy(Portfolio $portfolio)
    {
        $portfolio->delete();
        return redirect()->route('admin.portfolios.index')
            ->with('success', 'Portfolio deleted successfully!');
    }
}
