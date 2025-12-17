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
                        
                        // Check if menu item should be active
                        $isActive = false;
                        
                        // Check exact route match
                        if ($item->route && request()->routeIs($item->route)) {
                            $isActive = true;
                        }
                        // Check URL match
                        elseif ($item->url && request()->is($item->url)) {
                            $isActive = true;
                        }
                        // Check if on service detail page and menu item is services
                        elseif ($item->route === 'services' && request()->routeIs('service.detail')) {
                            $isActive = true;
                        }
                        // Check if on portfolio detail page and menu item is portfolio
                        elseif ($item->route === 'portfolio' && request()->routeIs('portfolio.detail')) {
                            $isActive = true;
                        }
                        // Check URL patterns for services
                        elseif ($item->url && (str_starts_with($item->url, '/services') || $item->url === 'services') && request()->is('services/*')) {
                            $isActive = true;
                        }
                        // Check URL patterns for portfolio
                        elseif ($item->url && (str_starts_with($item->url, '/portfolio') || $item->url === 'portfolio') && request()->is('portfolio/*')) {
                            $isActive = true;
                        }
                    @endphp
                    <a href="{{ $href }}"
                       class="{{ $isActive ? 'active' : '' }}"
                       wire:navigate>
                        {{ $item->translated_label }}
                    </a>
                </li>
            @empty
                {{-- Fallback to default menu if no items in database --}}
                <li><a href="{{ route('landing') }}" class="{{ request()->routeIs('landing') ? 'active' : '' }}" wire:navigate>{{ __('messages.home') }}</a></li>
                <li><a href="{{ route('services') }}" class="{{ request()->routeIs('services') || request()->routeIs('service.detail') ? 'active' : '' }}" wire:navigate>{{ __('messages.services') }}</a></li>
                <li><a href="{{ route('portfolio') }}" class="{{ request()->routeIs('portfolio') || request()->routeIs('portfolio.detail') ? 'active' : '' }}" wire:navigate>{{ __('messages.portfolio') }}</a></li>
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

