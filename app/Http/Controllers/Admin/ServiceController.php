<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::ordered()->get();
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|unique:services,slug',
            'description' => 'nullable|string',
            'intro' => 'nullable|string',
            'note' => 'nullable|string',
            'closing' => 'nullable|string',
            'image' => 'nullable|url',
            'portfolio_project' => 'nullable|string',
            'is_active' => 'boolean',
        ]);

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }

        $data['services_list'] = $request->input('services_list', []);
        $data['why_choose'] = $request->input('why_choose', []);
        $data['benefits'] = $request->input('benefits', []);
        $data['service_details'] = $request->input('service_details', []);
        
        // Handle translation fields
        if ($request->has('title_translations')) {
            $data['title_translations'] = $request->input('title_translations');
        }
        if ($request->has('description_translations')) {
            $data['description_translations'] = $request->input('description_translations');
        }
        if ($request->has('intro_translations')) {
            $data['intro_translations'] = $request->input('intro_translations');
        }
        if ($request->has('note_translations')) {
            $data['note_translations'] = $request->input('note_translations');
        }
        if ($request->has('closing_translations')) {
            $data['closing_translations'] = $request->input('closing_translations');
        }
        if ($request->has('services_list_translations')) {
            $data['services_list_translations'] = $request->input('services_list_translations');
        }
        if ($request->has('why_choose_translations')) {
            $data['why_choose_translations'] = $request->input('why_choose_translations');
        }
        if ($request->has('benefits_translations')) {
            $data['benefits_translations'] = $request->input('benefits_translations');
        }
        if ($request->has('service_details_translations')) {
            $data['service_details_translations'] = $request->input('service_details_translations');
        }

        Service::create($data);

        return redirect()->route('admin.services.index')
            ->with('success', 'Service created successfully!');
    }

    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|unique:services,slug,' . $service->id,
            'description' => 'nullable|string',
            'intro' => 'nullable|string',
            'note' => 'nullable|string',
            'closing' => 'nullable|string',
            'image' => 'nullable|url',
            'portfolio_project' => 'nullable|string',
            'is_active' => 'boolean',
        ]);

        $data['services_list'] = $request->input('services_list', []);
        $data['why_choose'] = $request->input('why_choose', []);
        $data['benefits'] = $request->input('benefits', []);
        $data['service_details'] = $request->input('service_details', []);
        
        // Handle translation fields
        if ($request->has('title_translations')) {
            $data['title_translations'] = $request->input('title_translations');
        }
        if ($request->has('description_translations')) {
            $data['description_translations'] = $request->input('description_translations');
        }
        if ($request->has('intro_translations')) {
            $data['intro_translations'] = $request->input('intro_translations');
        }
        if ($request->has('note_translations')) {
            $data['note_translations'] = $request->input('note_translations');
        }
        if ($request->has('closing_translations')) {
            $data['closing_translations'] = $request->input('closing_translations');
        }
        if ($request->has('services_list_translations')) {
            $data['services_list_translations'] = $request->input('services_list_translations');
        }
        if ($request->has('why_choose_translations')) {
            $data['why_choose_translations'] = $request->input('why_choose_translations');
        }
        if ($request->has('benefits_translations')) {
            $data['benefits_translations'] = $request->input('benefits_translations');
        }
        if ($request->has('service_details_translations')) {
            $data['service_details_translations'] = $request->input('service_details_translations');
        }

        $service->update($data);

        return redirect()->route('admin.services.index')
            ->with('success', 'Service updated successfully!');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('admin.services.index')
            ->with('success', 'Service deleted successfully!');
    }
}
