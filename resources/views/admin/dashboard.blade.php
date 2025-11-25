@extends('admin.layouts.app')

@section('content')
<div>
    <h1 class="text-3xl font-bold mb-6">Dashboard</h1>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white p-6 rounded-lg shadow">
            <div class="flex items-center">
                <div class="p-3 bg-blue-100 rounded-lg">
                    <i class="fas fa-briefcase text-blue-600 text-2xl"></i>
                </div>
                <div class="ml-4">
                    <p class="text-gray-600">Services</p>
                    <p class="text-2xl font-bold">{{ $stats['services'] }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white p-6 rounded-lg shadow">
            <div class="flex items-center">
                <div class="p-3 bg-green-100 rounded-lg">
                    <i class="fas fa-bars text-green-600 text-2xl"></i>
                </div>
                <div class="ml-4">
                    <p class="text-gray-600">Menu Items</p>
                    <p class="text-2xl font-bold">{{ $stats['menu_items'] }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white p-6 rounded-lg shadow">
            <div class="flex items-center">
                <div class="p-3 bg-yellow-100 rounded-lg">
                    <i class="fas fa-file-alt text-yellow-600 text-2xl"></i>
                </div>
                <div class="ml-4">
                    <p class="text-gray-600">Pages</p>
                    <p class="text-2xl font-bold">{{ $stats['pages'] }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white p-6 rounded-lg shadow">
            <div class="flex items-center">
                <div class="p-3 bg-purple-100 rounded-lg">
                    <i class="fas fa-briefcase text-purple-600 text-2xl"></i>
                </div>
                <div class="ml-4">
                    <p class="text-gray-600">Portfolios</p>
                    <p class="text-2xl font-bold">{{ $stats['portfolios'] }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white p-6 rounded-lg shadow">
            <div class="flex items-center">
                <div class="p-3 bg-red-100 rounded-lg">
                    <i class="fas fa-envelope text-red-600 text-2xl"></i>
                </div>
                <div class="ml-4">
                    <p class="text-gray-600">Messages</p>
                    <p class="text-2xl font-bold">{{ $stats['messages'] }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

