@extends('admin.layouts.app')

@section('content')
<div>
    <h1 class="text-3xl font-bold mb-6">Edit Portfolio Project</h1>
    
    <form method="POST" action="{{ route('admin.portfolios.update', $portfolio) }}" class="bg-white p-6 rounded-lg shadow">
        @csrf
        @method('PUT')
        
        <div class="space-y-4">
            <div>
                <label class="block text-gray-700 font-bold mb-2">Title *</label>
                <input type="text" name="title" value="{{ old('title', $portfolio->title) }}" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md">
            </div>

            <div>
                <label class="block text-gray-700 font-bold mb-2">Slug</label>
                <input type="text" name="slug" value="{{ old('slug', $portfolio->slug) }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md">
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-gray-700 font-bold mb-2">Category *</label>
                    <input type="text" name="category" value="{{ old('category', $portfolio->category) }}" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-md">
                </div>
                <div>
                    <label class="block text-gray-700 font-bold mb-2">Service Slug *</label>
                    <input type="text" name="service_slug" value="{{ old('service_slug', $portfolio->service_slug) }}" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-md">
                </div>
            </div>

            <div>
                <label class="block text-gray-700 font-bold mb-2">Description</label>
                <textarea name="description" rows="3" 
                    class="w-full px-3 py-2 border border-gray-300 rounded-md">{{ old('description', $portfolio->description) }}</textarea>
            </div>

            <div>
                <label class="block text-gray-700 font-bold mb-2">Image URL</label>
                <input type="url" name="image" value="{{ old('image', $portfolio->image) }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md">
            </div>

            <div>
                <label class="block text-gray-700 font-bold mb-2">Challenge</label>
                <textarea name="challenge" rows="2" 
                    class="w-full px-3 py-2 border border-gray-300 rounded-md">{{ old('challenge', $portfolio->challenge) }}</textarea>
            </div>

            <div>
                <label class="block text-gray-700 font-bold mb-2">Solution</label>
                <textarea name="solution" rows="2" 
                    class="w-full px-3 py-2 border border-gray-300 rounded-md">{{ old('solution', $portfolio->solution) }}</textarea>
            </div>

            <div>
                <label class="flex items-center">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', $portfolio->is_active) ? 'checked' : '' }} class="mr-2">
                    <span class="text-gray-700">Active</span>
                </label>
            </div>
        </div>

        <div class="mt-6 flex gap-4">
            <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-md hover:bg-blue-600">
                Update Portfolio
            </button>
            <a href="{{ route('admin.portfolios.index') }}" class="bg-gray-500 text-white px-6 py-2 rounded-md hover:bg-gray-600">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection



