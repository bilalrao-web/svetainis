<header class="header">
    <a href="{{ route('landing') }}" wire:navigate class="logo-container">
        @if(str_starts_with($logo, 'storage/'))
            <img src="{{ asset($logo) }}" alt="{{ $siteName }} Logo" class="logo-image">
        @else
            <img src="{{ asset($logo) }}" alt="{{ $siteName }} Logo" class="logo-image">
        @endif
    </a>

    <nav class="main-nav">
        <ul>
            @forelse($menuItems as $item)
                <li>
                    @php
                        $href = '#';
                        if ($item->route) {
                            try {
                                $href = route($item->route);
                            } catch (\Exception $e) {
                                // Route doesn't exist, use URL if available
                                $href = $item->url ?: '#';
                            }
                        } else {
                            $href = $item->url ?: '#';
                        }
                    @endphp
                    <a href="{{ $href }}"
                       class="{{ ($item->route && request()->routeIs($item->route)) || ($item->url && request()->is($item->url)) ? 'active' : '' }}"
                       wire:navigate>
                        {{ $item->translated_label }}
                    </a>
                </li>
            @empty
                {{-- Fallback to default menu if no items in database --}}
                <li><a href="{{ route('landing') }}" class="{{ request()->routeIs('landing') ? 'active' : '' }}" wire:navigate>{{ __('messages.home') }}</a></li>
                <li><a href="{{ route('services') }}" class="{{ request()->routeIs('services') || request()->routeIs('service.detail') ? 'active' : '' }}" wire:navigate>{{ __('messages.services') }}</a></li>
                <li><a href="{{ route('portfolio') }}" class="{{ request()->routeIs('portfolio') ? 'active' : '' }}" wire:navigate>{{ __('messages.portfolio') }}</a></li>
                <li><a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}" wire:navigate>{{ __('messages.contact_us') }}</a></li>
            @endforelse
        </ul>
    </nav>

    <!-- Language Switcher -->
    <div class="language-switcher">
        <a href="{{ route('language.switch', 'lt') }}" 
           class="lang-btn {{ app()->getLocale() === 'lt' ? 'active' : '' }}">
            LT
        </a>
        <a href="{{ route('language.switch', 'en') }}" 
           class="lang-btn {{ app()->getLocale() === 'en' ? 'active' : '' }}">
            EN
        </a>
    </div>
</header>

