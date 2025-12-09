@extends('admin.layouts.app')

@section('content')
<div>
    <h1 class="text-3xl font-bold mb-6">Create New Menu Item</h1>
    
    <form method="POST" action="{{ route('admin.menus.store') }}" class="bg-white p-6 rounded-lg shadow">
        @csrf
        
        <div class="space-y-4">
            <div>
                <label class="block text-gray-700 font-bold mb-2">Label *</label>
                <input type="text" name="label" value="{{ old('label') }}" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md">
            </div>

            <div>
                <label class="block text-gray-700 font-bold mb-2">Route Name</label>
                <input type="text" name="route" value="{{ old('route') }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md {{ $errors->has('route') ? 'border-red-500' : '' }}" 
                    placeholder="e.g., landing, services, portfolio">
                <p class="text-sm text-gray-500 mt-1">Laravel route name (preferred). Available routes: landing, services, portfolio, contact, service.detail, portfolio.detail</p>
                @error('route')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-gray-700 font-bold mb-2">Or URL</label>
                <input type="text" name="url" value="{{ old('url') }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md" placeholder="e.g., /about">
                <p class="text-sm text-gray-500 mt-1">Use if route is not available</p>
            </div>

            <div>
                <label class="block text-gray-700 font-bold mb-2">Location *</label>
                <select name="location" required class="w-full px-3 py-2 border border-gray-300 rounded-md">
                    <option value="header" {{ old('location') == 'header' ? 'selected' : '' }}>Header</option>
                    <option value="footer" {{ old('location') == 'footer' ? 'selected' : '' }}>Footer</option>
                </select>
            </div>

            <div>
                <label class="block text-gray-700 font-bold mb-2">Order</label>
                <input type="number" name="order" value="{{ old('order', 0) }}" min="0"
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
                Create Menu Item
            </button>
            <a href="{{ route('admin.menus.index') }}" class="bg-gray-500 text-white px-6 py-2 rounded-md hover:bg-gray-600">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection

