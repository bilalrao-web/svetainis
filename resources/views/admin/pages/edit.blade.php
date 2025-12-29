@extends('admin.layouts.app')

@section('content')
<div>
    <h1 class="text-3xl font-bold mb-6">Edit Page</h1>
    
    <form method="POST" action="{{ route('admin.pages.update', $page) }}" class="bg-white p-6 rounded-lg shadow">
        @csrf
        @method('PUT')
        
        <div class="space-y-4">
            <div>
                <label class="block text-gray-700 font-bold mb-2">Title *</label>
                <input type="text" name="title" value="{{ old('title', $page->title) }}" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md">
            </div>

            <div>
                <label class="block text-gray-700 font-bold mb-2">Slug</label>
                <input type="text" name="slug" value="{{ old('slug', $page->slug) }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md">
            </div>

            <div>
                <label class="block text-gray-700 font-bold mb-2">Content</label>
                <textarea name="content" rows="10" 
                    class="w-full px-3 py-2 border border-gray-300 rounded-md">{{ old('content', $page->content) }}</textarea>
            </div>

            <div>
                <label class="block text-gray-700 font-bold mb-2">Meta Description</label>
                <textarea name="meta_description" rows="2" 
                    class="w-full px-3 py-2 border border-gray-300 rounded-md">{{ old('meta_description', $page->meta_description) }}</textarea>
            </div>

            <div>
                <label class="block text-gray-700 font-bold mb-2">Meta Keywords</label>
                <input type="text" name="meta_keywords" value="{{ old('meta_keywords', $page->meta_keywords) }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md">
            </div>

            <div>
                <label class="flex items-center">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', $page->is_active) ? 'checked' : '' }} class="mr-2">
                    <span class="text-gray-700">Active</span>
                </label>
            </div>
        </div>

        <div class="mt-6 flex gap-4">
            <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-md hover:bg-blue-600">
                Update Page
            </button>
            <a href="{{ route('admin.pages.index') }}" class="bg-gray-500 text-white px-6 py-2 rounded-md hover:bg-gray-600">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection



