@extends('admin.layouts.app')

@section('content')
<div>
    <h1 class="text-3xl font-bold mb-6">Site Settings</h1>
    
    <form method="POST" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow">
        @csrf
        @method('PUT')
        
        <div class="space-y-6">
            <div>
                <label class="block text-gray-700 font-bold mb-2">Site Name</label>
                <input type="text" name="site_name" value="{{ $settings['site_name'] ?? '' }}" 
                    class="w-full px-3 py-2 border border-gray-300 rounded-md">
            </div>

            <div>
                <label class="block text-gray-700 font-bold mb-2">Site Title</label>
                <input type="text" name="site_title" value="{{ $settings['site_title'] ?? '' }}" 
                    class="w-full px-3 py-2 border border-gray-300 rounded-md">
            </div>

            <div>
                <label class="block text-gray-700 font-bold mb-2">Logo</label>
                @if(isset($settings['logo']) && $settings['logo'])
                    <img src="{{ asset('storage/' . $settings['logo']) }}" alt="Logo" class="mb-2 h-20">
                @endif
                <input type="file" name="logo" accept="image/*" 
                    class="w-full px-3 py-2 border border-gray-300 rounded-md">
            </div>

            <div>
                <label class="block text-gray-700 font-bold mb-2">Footer Text</label>
                <textarea name="footer_text" rows="3" 
                    class="w-full px-3 py-2 border border-gray-300 rounded-md">{{ $settings['footer_text'] ?? '' }}</textarea>
            </div>

            <div>
                <label class="block text-gray-700 font-bold mb-2">Contact Email</label>
                <input type="email" name="contact_email" value="{{ $settings['contact_email'] ?? '' }}" 
                    class="w-full px-3 py-2 border border-gray-300 rounded-md">
            </div>

            <div>
                <label class="block text-gray-700 font-bold mb-2">Contact Phone</label>
                <input type="text" name="contact_phone" value="{{ $settings['contact_phone'] ?? '' }}" 
                    class="w-full px-3 py-2 border border-gray-300 rounded-md">
            </div>
        </div>

        <div class="mt-6">
            <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-md hover:bg-blue-600">
                Update Settings
            </button>
        </div>
    </form>
</div>
@endsection

