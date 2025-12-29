<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{
    public function index()
    {
        $settings = Setting::all()->pluck('value', 'key');
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $data = $request->except(['_token', '_method']);

        foreach ($data as $key => $value) {
            if ($request->hasFile($key)) {
                $file = $request->file($key);
                $path = $file->store('settings', 'public');
                Setting::set($key, $path, 'image');
            } else {
                $setting = Setting::where('key', $key)->first();
                if ($setting) {
                    $setting->value = $value ?? '';
                    // Handle translation fields
                    if ($request->has($key . '_translations')) {
                        $setting->value_translations = $request->input($key . '_translations');
                    }
                    $setting->save();
                } else {
                    Setting::set($key, $value ?? '');
                }
            }
        }

        return redirect()->route('admin.settings.index')
            ->with('success', 'Settings updated successfully!');
    }
}
