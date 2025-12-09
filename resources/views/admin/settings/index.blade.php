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
                    @if(str_starts_with($settings['logo'], 'storage/'))
                        <img src="{{ asset($settings['logo']) }}" alt="Logo" class="mb-2 h-20">
                    @else
                        <img src="{{ asset($settings['logo']) }}" alt="Logo" class="mb-2 h-20">
                    @endif
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

            <div>
                <label class="block text-gray-700 font-bold mb-2">Address</label>
                <textarea name="address" rows="2" 
                    class="w-full px-3 py-2 border border-gray-300 rounded-md">{{ $settings['address'] ?? '' }}</textarea>
            </div>

            <div>
                <label class="block text-gray-700 font-bold mb-2">About Text</label>
                <textarea name="about_text" rows="4" 
                    class="w-full px-3 py-2 border border-gray-300 rounded-md">{{ $settings['about_text'] ?? '' }}</textarea>
                <p class="text-sm text-gray-500 mt-1">This text will appear in the footer "About" section</p>
            </div>

            <div class="border-t pt-6 mt-6">
                <h3 class="text-xl font-bold mb-4">Social Media Links</h3>
                
                <div class="space-y-4">
                    <div>
                        <label class="block text-gray-700 font-bold mb-2">Instagram URL</label>
                        <input type="url" name="instagram_url" value="{{ $settings['instagram_url'] ?? '' }}" 
                            class="w-full px-3 py-2 border border-gray-300 rounded-md" placeholder="https://instagram.com/yourpage">
                    </div>

                    <div>
                        <label class="block text-gray-700 font-bold mb-2">TikTok URL</label>
                        <input type="url" name="tiktok_url" value="{{ $settings['tiktok_url'] ?? '' }}" 
                            class="w-full px-3 py-2 border border-gray-300 rounded-md" placeholder="https://tiktok.com/@yourpage">
                    </div>

                    <div>
                        <label class="block text-gray-700 font-bold mb-2">LinkedIn URL</label>
                        <input type="url" name="linkedin_url" value="{{ $settings['linkedin_url'] ?? '' }}" 
                            class="w-full px-3 py-2 border border-gray-300 rounded-md" placeholder="https://linkedin.com/company/yourcompany">
                    </div>

                    <div>
                        <label class="block text-gray-700 font-bold mb-2">Facebook URL</label>
                        <input type="url" name="facebook_url" value="{{ $settings['facebook_url'] ?? '' }}" 
                            class="w-full px-3 py-2 border border-gray-300 rounded-md" placeholder="https://facebook.com/yourpage">
                    </div>

                    <div>
                        <label class="block text-gray-700 font-bold mb-2">YouTube URL</label>
                        <input type="url" name="youtube_url" value="{{ $settings['youtube_url'] ?? '' }}" 
                            class="w-full px-3 py-2 border border-gray-300 rounded-md" placeholder="https://youtube.com/@yourchannel">
                    </div>
                </div>
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

