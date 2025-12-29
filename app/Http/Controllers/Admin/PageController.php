<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::latest()->get();
        return view('admin.pages.index', compact('pages'));
    }

    public function create()
    {
        return view('admin.pages.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|unique:pages,slug',
            'content' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
            'is_active' => 'boolean',
        ]);

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }
        
        // Handle translation fields
        if ($request->has('title_translations')) {
            $data['title_translations'] = $request->input('title_translations');
        }
        if ($request->has('content_translations')) {
            $data['content_translations'] = $request->input('content_translations');
        }
        if ($request->has('meta_description_translations')) {
            $data['meta_description_translations'] = $request->input('meta_description_translations');
        }
        if ($request->has('meta_keywords_translations')) {
            $data['meta_keywords_translations'] = $request->input('meta_keywords_translations');
        }

        Page::create($data);

        return redirect()->route('admin.pages.index')
            ->with('success', 'Page created successfully!');
    }

    public function edit(Page $page)
    {
        return view('admin.pages.edit', compact('page'));
    }

    public function update(Request $request, Page $page)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|unique:pages,slug,' . $page->id,
            'content' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
            'is_active' => 'boolean',
        ]);
        
        // Handle translation fields
        if ($request->has('title_translations')) {
            $data['title_translations'] = $request->input('title_translations');
        }
        if ($request->has('content_translations')) {
            $data['content_translations'] = $request->input('content_translations');
        }
        if ($request->has('meta_description_translations')) {
            $data['meta_description_translations'] = $request->input('meta_description_translations');
        }
        if ($request->has('meta_keywords_translations')) {
            $data['meta_keywords_translations'] = $request->input('meta_keywords_translations');
        }

        $page->update($data);

        return redirect()->route('admin.pages.index')
            ->with('success', 'Page updated successfully!');
    }

    public function destroy(Page $page)
    {
        $page->delete();
        return redirect()->route('admin.pages.index')
            ->with('success', 'Page deleted successfully!');
    }
}
