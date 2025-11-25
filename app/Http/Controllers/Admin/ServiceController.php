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
