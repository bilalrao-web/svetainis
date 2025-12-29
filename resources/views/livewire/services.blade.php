<div class="themain">
    <!-- Page Hero Section -->
    <div class="page-hero">
        <div class="page-hero-content">
            <h1 class="animate-fade-in-down">{{ __('messages.services_page') }}</h1>
            <p class="breadcrumb animate-fade-in-up">{{ __('messages.home_breadcrumb') }} > <span>{{ strtoupper(__('messages.services')) }}</span></p>
        </div>
    </div>

    <!-- Services Section -->
    <div class="services-page-section">
        <div class="section-header">
            <h2>{{ __('messages.we_shape_perfect_solutions') }}</h2>
            <p>{{ __('messages.we_are_committed') }}</p>
        </div>

        <div class="services-grid">
            <!-- Service 1: Website Development -->
            <a href="{{ route('service.detail', ['service' => 'website-development']) }}" class="service-card animate-fade-in-up" wire:navigate>
                <div class="service-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" viewBox="0 0 16 16"><path d="M10.478 1.647a.5.5 0 1 0-.956-.294l-4 13a.5.5 0 0 0 .956.294l4-13zM4.854 4.146a.5.5 0 0 1 0 .708L1.707 8l3.147 3.146a.5.5 0 0 1-.708.708l-3.5-3.5a.5.5 0 0 1 0-.708l3.5-3.5a.5.5 0 0 1 .708 0zm6.292 0a.5.5 0 0 0 0 .708L14.293 8l-3.147 3.146a.5.5 0 0 0 .708.708l3.5-3.5a.5.5 0 0 0 0-.708l-3.5-3.5a.5.5 0 0 0-.708 0z"/></svg>
                </div>
                <h3>{{ __('messages.website_development') }}</h3>
                <p>{{ __('messages.service_description_website') }}</p>
            </a>

            <!-- Service 2: Graphic Designing -->
            <a href="{{ route('service.detail', ['service' => 'graphic-designing']) }}" class="service-card animate-fade-in-up" style="animation-delay: 0.1s;" wire:navigate>
                <div class="service-icon">
                     <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-palette-fill" viewBox="0 0 16 16"><path d="M12.433 10.07C14.133 9.585 16 8.007 16 6c0-2.507-2.03-4.5-4.5-4.5C9.333 1.5 7.79 3.25 7.155 4.94a.5.5 0 1 1-.95.308C7.845 3.34 9.47 1.5 11.5 1.5 14.467 1.5 17 3.657 17 6.5c0 2.11-1.317 3.916-3.166 4.604a.5.5 0 0 1-.434-.934z"/><path d="M0 8a8 8 0 1 0 16 0A8 8 0 0 0 0 8zM4.5 5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm-1.898 3.328a.5.5 0 0 1 .668.16C3.93 9.403 4.8 10.5 5.5 10.5c.7 0 1.57-.904 2.226-2.016a.5.5 0 1 1 .894.448C7.94 10.024 7 11.5 5.5 11.5c-1.5 0-2.56-1.476-3.12-2.534a.5.5 0 0 1 .16-.668zM5 12.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm6.5-1.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/></svg>
                </div>
                <h3>{{ __('messages.graphic_designing') }}</h3>
                <p>{{ __('messages.service_description_graphic') }}</p>
            </a>

            <!-- Service 3: Digital Marketing -->
            <a href="{{ route('service.detail', ['service' => 'digital-marketing']) }}" class="service-card animate-fade-in-up" style="animation-delay: 0.2s;" wire:navigate>
                 <div class="service-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-megaphone-fill" viewBox="0 0 16 16"><path d="M13 2.5a1.5 1.5 0 0 1 3 0v11a1.5 1.5 0 0 1-3 0v-11zm-1 .724c-2.067.95-4.539 1.481-7 1.656v6.237a25.222 25.222 0 0 1 1.088.085c2.053.204 4.038.668 5.912 1.56V3.224zM0 7.5A.5.5 0 0 1 .5 7h1a.5.5 0 0 1 0 1H.5a.5.5 0 0 1-.5-.5z"/></svg>
                 </div>
                <h3>{{ __('messages.digital_marketing') }}</h3>
                <p>{{ __('messages.service_description_digital') }}</p>
            </a>

            <!-- Service 4: SEO & Content Writing -->
            <a href="{{ route('service.detail', ['service' => 'seo-content-writing']) }}" class="service-card animate-fade-in-up" style="animation-delay: 0.3s;" wire:navigate>
                 <div class="service-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16"><path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/></svg>
                 </div>
                <h3>{{ __('messages.seo_content_writing') }}</h3>
                <p>{{ __('messages.service_description_seo') }}</p>
            </a>

            <!-- Service 5: App Development -->
            <a href="{{ route('service.detail', ['service' => 'app-development']) }}" class="service-card animate-fade-in-up" style="animation-delay: 0.4s;" wire:navigate>
                 <div class="service-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-phone-fill" viewBox="0 0 16 16"><path d="M3 2a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V2zm6 11a1 1 0 1 0-2 0 1 1 0 0 0 2 0z"/></svg>
                 </div>
                <h3>{{ __('messages.app_development') }}</h3>
                <p>{{ __('messages.service_description_app') }}</p>
            </a>

            <!-- Service 6: UI/UX Designing -->
            <a href="{{ route('service.detail', ['service' => 'ui-ux-designing']) }}" class="service-card animate-fade-in-up" style="animation-delay: 0.5s;" wire:navigate>
                 <div class="service-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-grid-1x2-fill" viewBox="0 0 16 16"><path d="M0 1a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V1zm9 0a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1h-5a1 1 0 0 1-1-1V1z"/></svg>
                 </div>
                <h3>{{ __('messages.ui_ux_designing') }}</h3>
                <p>{{ __('messages.service_description_uiux') }}</p>
            </a>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="cta-section">
        <h2>{{ __('messages.ready_bigger_projects') }}</h2>
        <a href="{{ route('contact') }}" class="contact-button" wire:navigate>{{ __('messages.contact_with_us') }}</a>
    </div>
</div>

