<div>
    <div class="main-container">
        <main class="hero-section">
            <div class="hero-content">
                <p class="subtitle">{{ __('messages.welcome_to') }}</p>
                <h1>{{ __('messages.smart_web') }} <br> {{ __('messages.design_agency') }}</h1>
                <a href="#services-section" class="cta-button">{{ __('messages.discover_more') }}</a>
            </div>
        </main>
    </div>

    <!-- Services Section on Landing Page -->
    <div id="services-section" class="landing-services-section">
        <div class="landing-services-container">
            <div class="landing-services-header">
                <h2>{{ __('messages.our_services') }}</h2>
                <p>{{ __('messages.we_shape_perfect_solutions') }}</p>
            </div>

            <div class="landing-services-grid">
                @forelse($services as $index => $service)
                    <a href="{{ route('service.detail', ['service' => $service->slug]) }}" class="landing-service-card animate-fade-in-up" style="animation-delay: {{ $index * 0.1 }}s;" wire:navigate>
                        @if($service->image)
                            <div class="landing-service-image">
                                <img src="{{ $service->image }}" alt="{{ $service->title }}">
                            </div>
                        @endif
                        <div class="landing-service-content">
                            <h3>{{ strtoupper($service->translated_title) }}</h3>
                            <p>{{ \Illuminate\Support\Str::limit($service->translated_description, 100) }}</p>
                        </div>
                    </a>
                @empty
                    {{-- Fallback to hardcoded services if database is empty --}}
                    <a href="{{ route('service.detail', ['service' => 'website-development']) }}" class="landing-service-card animate-fade-in-up" wire:navigate>
                        <div class="landing-service-content">
                            <h3>{{ strtoupper(__('messages.website_development')) }}</h3>
                            <p>{{ __('messages.service_description_website') }}</p>
                        </div>
                    </a>
                    <a href="{{ route('service.detail', ['service' => 'graphic-designing']) }}" class="landing-service-card animate-fade-in-up" style="animation-delay: 0.1s;" wire:navigate>
                        <div class="landing-service-content">
                            <h3>{{ strtoupper(__('messages.graphic_designing')) }}</h3>
                            <p>{{ __('messages.service_description_graphic') }}</p>
                        </div>
                    </a>
                    <a href="{{ route('service.detail', ['service' => 'digital-marketing']) }}" class="landing-service-card animate-fade-in-up" style="animation-delay: 0.2s;" wire:navigate>
                        <div class="landing-service-content">
                            <h3>{{ strtoupper(__('messages.digital_marketing')) }}</h3>
                            <p>{{ __('messages.service_description_digital') }}</p>
                        </div>
                    </a>
                    <a href="{{ route('service.detail', ['service' => 'seo-content-writing']) }}" class="landing-service-card animate-fade-in-up" style="animation-delay: 0.3s;" wire:navigate>
                        <div class="landing-service-content">
                            <h3>{{ strtoupper(__('messages.seo_content_writing')) }}</h3>
                            <p>{{ __('messages.service_description_seo') }}</p>
                        </div>
                    </a>
                    <a href="{{ route('service.detail', ['service' => 'app-development']) }}" class="landing-service-card animate-fade-in-up" style="animation-delay: 0.4s;" wire:navigate>
                        <div class="landing-service-content">
                            <h3>{{ strtoupper(__('messages.app_development')) }}</h3>
                            <p>{{ __('messages.service_description_app') }}</p>
                        </div>
                    </a>
                    <a href="{{ route('service.detail', ['service' => 'ui-ux-designing']) }}" class="landing-service-card animate-fade-in-up" style="animation-delay: 0.5s;" wire:navigate>
                        <div class="landing-service-content">
                            <h3>{{ strtoupper(__('messages.ui_ux_designing')) }}</h3>
                            <p>{{ __('messages.service_description_uiux') }}</p>
                        </div>
                    </a>
                @endforelse
            </div>

            <div class="landing-services-cta">
                <a href="{{ route('services') }}" class="cta-button-secondary" wire:navigate>{{ __('messages.view_all_services') }}</a>
            </div>
        </div>
    </div>
</div>

