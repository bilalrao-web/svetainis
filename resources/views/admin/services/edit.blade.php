@extends('admin.layouts.app')

@section('content')
<div>
    <h1 class="text-3xl font-bold mb-6">Edit Service</h1>
    
    <form method="POST" action="{{ route('admin.services.update', $service) }}" class="bg-white p-6 rounded-lg shadow">
        @csrf
        @method('PUT')
        
        <div class="space-y-4">
            <div>
                <label class="block text-gray-700 font-bold mb-2">Title *</label>
                <input type="text" name="title" value="{{ old('title', $service->title) }}" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md">
            </div>

            <div>
                <label class="block text-gray-700 font-bold mb-2">Slug</label>
                <input type="text" name="slug" value="{{ old('slug', $service->slug) }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md">
            </div>

            <div>
                <label class="block text-gray-700 font-bold mb-2">Description</label>
                <textarea name="description" rows="3" 
                    class="w-full px-3 py-2 border border-gray-300 rounded-md">{{ old('description', $service->description) }}</textarea>
            </div>

            <div>
                <label class="block text-gray-700 font-bold mb-2">Intro</label>
                <textarea name="intro" rows="3" 
                    class="w-full px-3 py-2 border border-gray-300 rounded-md">{{ old('intro', $service->intro) }}</textarea>
            </div>

            <div>
                <label class="block text-gray-700 font-bold mb-2">Note</label>
                <textarea name="note" rows="2" 
                    class="w-full px-3 py-2 border border-gray-300 rounded-md">{{ old('note', $service->note) }}</textarea>
            </div>

            <div>
                <label class="block text-gray-700 font-bold mb-2">Closing</label>
                <textarea name="closing" rows="3" 
                    class="w-full px-3 py-2 border border-gray-300 rounded-md">{{ old('closing', $service->closing) }}</textarea>
            </div>

            <div>
                <label class="block text-gray-700 font-bold mb-2">Image URL</label>
                <input type="url" name="image" value="{{ old('image', $service->image) }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md">
            </div>

            <div>
                <label class="block text-gray-700 font-bold mb-2">Portfolio Project</label>
                <input type="text" name="portfolio_project" value="{{ old('portfolio_project', $service->portfolio_project) }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md">
            </div>

            <div>
                <label class="flex items-center">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', $service->is_active) ? 'checked' : '' }} class="mr-2">
                    <span class="text-gray-700">Active</span>
                </label>
            </div>
        </div>

        <div class="mt-6 flex gap-4">
            <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-md hover:bg-blue-600">
                Update Service
            </button>
            <a href="{{ route('admin.services.index') }}" class="bg-gray-500 text-white px-6 py-2 rounded-md hover:bg-gray-600">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection


