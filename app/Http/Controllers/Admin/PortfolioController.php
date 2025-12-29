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
        
        // Handle translation fields
        if ($request->has('title_translations')) {
            $data['title_translations'] = $request->input('title_translations');
        }
        if ($request->has('category_translations')) {
            $data['category_translations'] = $request->input('category_translations');
        }
        if ($request->has('description_translations')) {
            $data['description_translations'] = $request->input('description_translations');
        }
        if ($request->has('web_type_translations')) {
            $data['web_type_translations'] = $request->input('web_type_translations');
        }
        if ($request->has('use_cases_translations')) {
            $data['use_cases_translations'] = $request->input('use_cases_translations');
        }
        if ($request->has('challenge_translations')) {
            $data['challenge_translations'] = $request->input('challenge_translations');
        }
        if ($request->has('solution_translations')) {
            $data['solution_translations'] = $request->input('solution_translations');
        }
        if ($request->has('technologies_translations')) {
            $data['technologies_translations'] = $request->input('technologies_translations');
        }
        if ($request->has('results_translations')) {
            $data['results_translations'] = $request->input('results_translations');
        }
        if ($request->has('features_translations')) {
            $data['features_translations'] = $request->input('features_translations');
        }

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
        
        // Handle translation fields
        if ($request->has('title_translations')) {
            $data['title_translations'] = $request->input('title_translations');
        }
        if ($request->has('category_translations')) {
            $data['category_translations'] = $request->input('category_translations');
        }
        if ($request->has('description_translations')) {
            $data['description_translations'] = $request->input('description_translations');
        }
        if ($request->has('web_type_translations')) {
            $data['web_type_translations'] = $request->input('web_type_translations');
        }
        if ($request->has('use_cases_translations')) {
            $data['use_cases_translations'] = $request->input('use_cases_translations');
        }
        if ($request->has('challenge_translations')) {
            $data['challenge_translations'] = $request->input('challenge_translations');
        }
        if ($request->has('solution_translations')) {
            $data['solution_translations'] = $request->input('solution_translations');
        }
        if ($request->has('technologies_translations')) {
            $data['technologies_translations'] = $request->input('technologies_translations');
        }
        if ($request->has('results_translations')) {
            $data['results_translations'] = $request->input('results_translations');
        }
        if ($request->has('features_translations')) {
            $data['features_translations'] = $request->input('features_translations');
        }

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
