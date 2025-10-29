<header class="header">
    <a href="{{ route('landing') }}" wire:navigate class="logo-container">
        <img src="{{ asset('images/logo.png') }}" alt="SVETAINIS Logo" class="logo-image">
    </a>

    <nav class="main-nav">
        <ul>
            <li><a href="{{ route('landing') }}" class="{{ request()->routeIs('landing') ? 'active' : '' }}" wire:navigate>Home</a></li>
            <li><a href="{{ route('services') }}" class="{{ request()->routeIs('services') || request()->routeIs('service.detail') || request()->is('services*') ? 'active' : '' }}" wire:navigate>Services</a></li>
            <li><a href="{{ route('portfolio') }}" class="{{ request()->routeIs('portfolio') ? 'active' : '' }}" wire:navigate>Portfolio</a></li>
            <li><a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}" wire:navigate>Contact Us</a></li>
        </ul>
    </nav>
</header>

