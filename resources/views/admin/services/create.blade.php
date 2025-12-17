@extends('admin.layouts.app')

@section('content')
<div>
    <h1 class="text-3xl font-bold mb-6">Create New Service</h1>
    
    <form method="POST" action="{{ route('admin.services.store') }}" class="bg-white p-6 rounded-lg shadow">
        @csrf
        
        <div class="space-y-4">
            <div>
                <label class="block text-gray-700 font-bold mb-2">Title *</label>
                <input type="text" name="title" value="{{ old('title') }}" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md">
            </div>

            <div>
                <label class="block text-gray-700 font-bold mb-2">Slug</label>
                <input type="text" name="slug" value="{{ old('slug') }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md">
                <p class="text-sm text-gray-500 mt-1">Leave empty to auto-generate from title</p>
            </div>

            <div>
                <label class="block text-gray-700 font-bold mb-2">Description</label>
                <textarea name="description" rows="3" 
                    class="w-full px-3 py-2 border border-gray-300 rounded-md">{{ old('description') }}</textarea>
            </div>

            <div>
                <label class="block text-gray-700 font-bold mb-2">Image URL</label>
                <input type="url" name="image" value="{{ old('image') }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md">
            </div>

            <div>
                <label class="block text-gray-700 font-bold mb-2">Portfolio Project</label>
                <input type="text" name="portfolio_project" value="{{ old('portfolio_project') }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md">
            </div>

            <div>
                <label class="flex items-center">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active') ? 'checked' : '' }} class="mr-2">
                    <span class="text-gray-700">Active</span>
                </label>
            </div>
        </div>

        <div class="mt-6 flex gap-4">
            <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-md hover:bg-blue-600">
                Create Service
            </button>
            <a href="{{ route('admin.services.index') }}" class="bg-gray-500 text-white px-6 py-2 rounded-md hover:bg-gray-600">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection


