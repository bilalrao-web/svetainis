<div class="themain">
    <!-- Page Hero Section -->
    <div class="page-hero">
        <div class="page-hero-content">
            <h1 class="animate-fade-in-down">{{ !empty($translatedData) && isset($translatedData['title']) ? $translatedData['title'] : (isset($serviceDetails['title']) ? $serviceDetails['title'] : '') }}</h1>
            <p class="breadcrumb animate-fade-in-up">{{ __('messages.home_breadcrumb') }} > {{ strtoupper(__('messages.services')) }} > <span>{{ strtoupper(!empty($translatedData) && isset($translatedData['title']) ? $translatedData['title'] : (isset($serviceDetails['title']) ? $serviceDetails['title'] : '')) }}</span></p>
        </div>
    </div> 

    <!-- Service Detail Content -->
    <div class="service-detail-container">
        <div class="service-detail-content">
            <div class="service-image animate-fade-in-left">
                <img src="{{ !empty($translatedData) && isset($translatedData['image']) ? $translatedData['image'] : (isset($serviceDetails['image']) ? $serviceDetails['image'] : '') }}" alt="{{ !empty($translatedData) && isset($translatedData['title']) ? $translatedData['title'] : (isset($serviceDetails['title']) ? $serviceDetails['title'] : '') }}">
            </div>
            <div class="service-text animate-fade-in-right">
                <h2>{{ !empty($translatedData) && isset($translatedData['title']) ? $translatedData['title'] : (isset($serviceDetails['title']) ? $serviceDetails['title'] : '') }}</h2>
                <p class="service-intro">{{ !empty($translatedData) && isset($translatedData['description']) ? $translatedData['description'] : (isset($serviceDetails['description']) ? $serviceDetails['description'] : '') }}</p>
                
                @if ($service === 'website-development' && ((!empty($translatedData) && isset($translatedData['intro']) && $translatedData['intro']) || isset($serviceDetails['intro'])))
                    <p class="service-description">{{ !empty($translatedData) && isset($translatedData['intro']) && $translatedData['intro'] ? $translatedData['intro'] : (isset($serviceDetails['intro']) ? $serviceDetails['intro'] : '') }}</p>
                    
                    <div class="service-offerings">
                        <h3>{{ __('messages.what_we_offer') }}</h3>
                        <ul class="services-list">
                            @php
                                $servicesList = (!empty($translatedData) && isset($translatedData['services_list']) && $translatedData['services_list'] ? $translatedData['services_list'] : (isset($serviceDetails['services']) ? $serviceDetails['services'] : []));
                            @endphp
                            @foreach($servicesList as $serviceItem)
                                <li>{{ $serviceItem }}</li>
                            @endforeach
                        </ul>
                    </div>
                    
                    <p class="service-closing">{{ !empty($translatedData) && isset($translatedData['closing']) && $translatedData['closing'] ? $translatedData['closing'] : (isset($serviceDetails['closing']) ? $serviceDetails['closing'] : '') }}</p>
                    
                    <a href="#web-types-grid" class="cta-button">{{ __('messages.discover_more') }}</a>
                @elseif ($service === 'app-development' && ((!empty($translatedData) && isset($translatedData['intro']) && $translatedData['intro']) || isset($serviceDetails['intro'])))
                    <p class="service-description">{{ !empty($translatedData) && isset($translatedData['intro']) && $translatedData['intro'] ? $translatedData['intro'] : (isset($serviceDetails['intro']) ? $serviceDetails['intro'] : '') }}</p>
                    
                    <div class="service-offerings">
                        <h3>{{ __('messages.our_app_development_services') }}</h3>
                        <ul class="services-list">
                            @php
                                $servicesList = (!empty($translatedData) && isset($translatedData['services_list']) && $translatedData['services_list'] ? $translatedData['services_list'] : (isset($serviceDetails['services']) ? $serviceDetails['services'] : []));
                            @endphp
                            @foreach($servicesList as $serviceItem)
                                <li>{{ $serviceItem }}</li>
                            @endforeach
                        </ul>
                    </div>
                    
                    @if((!empty($translatedData) && isset($translatedData['note']) && $translatedData['note']) || isset($serviceDetails['note']))
                        <p class="service-note">{{ !empty($translatedData) && isset($translatedData['note']) && $translatedData['note'] ? $translatedData['note'] : (isset($serviceDetails['note']) ? $serviceDetails['note'] : '') }}</p>
                    @endif
                    
                    <div class="service-offerings why-choose">
                        <h3>{{ __('messages.why_choose_our_agency') }}</h3>
                        <ul class="services-list checkmark-list">
                            @php
                                $whyChoose = (!empty($translatedData) && isset($translatedData['why_choose']) && $translatedData['why_choose'] ? $translatedData['why_choose'] : (isset($serviceDetails['why_choose']) ? $serviceDetails['why_choose'] : []));
                            @endphp
                            @foreach($whyChoose as $benefit)
                                <li>{{ $benefit }}</li>
                            @endforeach
                        </ul>
                    </div>
                    
                    <p class="service-closing">{{ !empty($translatedData) && isset($translatedData['closing']) && $translatedData['closing'] ? $translatedData['closing'] : (isset($serviceDetails['closing']) ? $serviceDetails['closing'] : '') }}</p>
                    
                    <a href="{{ route('portfolio.detail', ['project' => (!empty($translatedData) && isset($translatedData['portfolio_project']) ? $translatedData['portfolio_project'] : (isset($serviceDetails['portfolio_project']) ? $serviceDetails['portfolio_project'] : ''))]) }}" class="cta-button" wire:navigate>{{ __('messages.discover_more') }}</a>
                @elseif ($service === 'graphic-designing' && ((!empty($translatedData) && isset($translatedData['intro']) && $translatedData['intro']) || isset($serviceDetails['intro'])))
                    <p class="service-description">{{ !empty($translatedData) && isset($translatedData['intro']) && $translatedData['intro'] ? $translatedData['intro'] : (isset($serviceDetails['intro']) ? $serviceDetails['intro'] : '') }}</p>
                    
                    <div class="service-offerings">
                        <h3>{{ __('messages.services_we_provide') }}</h3>
                        <ul class="services-list">
                            @php
                                $servicesList = (!empty($translatedData) && isset($translatedData['services_list']) && $translatedData['services_list'] ? $translatedData['services_list'] : (isset($serviceDetails['services']) ? $serviceDetails['services'] : []));
                            @endphp
                            @foreach($servicesList as $serviceItem)
                                <li>{{ $serviceItem }}</li>
                            @endforeach
                        </ul>
                    </div>
                    
                    <div class="service-offerings why-choose">
                        <h3>{{ __('messages.why_we_are_best_choice') }}</h3>
                        <p class="why-choose-intro">{{ __('messages.our_clients_receive') }}</p>
                        <ul class="services-list checkmark-list">
                            @php
                                $whyChoose = (!empty($translatedData) && isset($translatedData['why_choose']) && $translatedData['why_choose'] ? $translatedData['why_choose'] : (isset($serviceDetails['why_choose']) ? $serviceDetails['why_choose'] : []));
                            @endphp
                            @foreach($whyChoose as $benefit)
                                <li>{{ $benefit }}</li>
                            @endforeach
                        </ul>
                    </div>
                    
                    <p class="service-closing">{{ !empty($translatedData) && isset($translatedData['closing']) && $translatedData['closing'] ? $translatedData['closing'] : (isset($serviceDetails['closing']) ? $serviceDetails['closing'] : '') }}</p>
                    
                    <a href="{{ route('portfolio.detail', ['project' => (!empty($translatedData) && isset($translatedData['portfolio_project']) ? $translatedData['portfolio_project'] : (isset($serviceDetails['portfolio_project']) ? $serviceDetails['portfolio_project'] : ''))]) }}" class="cta-button" wire:navigate>{{ __('messages.discover_more') }}</a>
                @elseif ($service === 'seo-content-writing' && ((!empty($translatedData) && isset($translatedData['intro']) && $translatedData['intro']) || isset($serviceDetails['intro'])))
                    <p class="service-description">{{ !empty($translatedData) && isset($translatedData['intro']) && $translatedData['intro'] ? $translatedData['intro'] : (isset($serviceDetails['intro']) ? $serviceDetails['intro'] : '') }}</p>
                    
                    @if((!empty($translatedData) && isset($translatedData['note']) && $translatedData['note']) || isset($serviceDetails['note']))
                        <p class="service-note">{{ !empty($translatedData) && isset($translatedData['note']) && $translatedData['note'] ? $translatedData['note'] : (isset($serviceDetails['note']) ? $serviceDetails['note'] : '') }}</p>
                    @endif
                    
                    <div class="service-offerings">
                        <h3>{{ __('messages.core_seo_services') }}</h3>
                        <div class="seo-services-list">
                            @php
                                $serviceDetailsList = (!empty($translatedData) && isset($translatedData['service_details']) && $translatedData['service_details'] ? $translatedData['service_details'] : (isset($serviceDetails['services']) ? $serviceDetails['services'] : []));
                            @endphp
                            @foreach($serviceDetailsList as $serviceItem)
                                <div class="seo-service-item">
                                    <h4 class="seo-service-title">{{ isset($serviceItem['title']) ? $serviceItem['title'] : '' }}</h4>
                                    <p class="seo-service-description">{{ isset($serviceItem['description']) ? $serviceItem['description'] : '' }}</p>
                                    @if(isset($serviceItem['sub_items']) && count($serviceItem['sub_items']) > 0)
                                        <ul class="seo-sub-items">
                                            @foreach($serviceItem['sub_items'] as $subItem)
                                                <li>{{ $subItem }}</li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                    
                    <div class="service-offerings why-choose">
                        <h3>{{ __('messages.what_you_gain') }}</h3>
                        <ul class="services-list checkmark-list">
                            @php
                                $benefits = (!empty($translatedData) && isset($translatedData['benefits']) && $translatedData['benefits'] ? $translatedData['benefits'] : (isset($serviceDetails['benefits']) ? $serviceDetails['benefits'] : []));
                            @endphp
                            @foreach($benefits as $benefit)
                                <li>{{ $benefit }}</li>
                            @endforeach
                        </ul>
                    </div>
                    
                    <p class="service-closing">{{ !empty($translatedData) && isset($translatedData['closing']) && $translatedData['closing'] ? $translatedData['closing'] : (isset($serviceDetails['closing']) ? $serviceDetails['closing'] : '') }}</p>
                    
                    <a href="{{ route('portfolio.detail', ['project' => (!empty($translatedData) && isset($translatedData['portfolio_project']) ? $translatedData['portfolio_project'] : (isset($serviceDetails['portfolio_project']) ? $serviceDetails['portfolio_project'] : ''))]) }}" class="cta-button" wire:navigate>{{ __('messages.discover_more') }}</a>
                @else
                    <p>{{ !empty($translatedData) && isset($translatedData['description']) ? $translatedData['description'] : (isset($serviceDetails['description']) ? $serviceDetails['description'] : '') }}</p>
                    <a href="{{ route('portfolio.detail', ['project' => (!empty($translatedData) && isset($translatedData['portfolio_project']) ? $translatedData['portfolio_project'] : (isset($serviceDetails['portfolio_project']) ? $serviceDetails['portfolio_project'] : ''))]) }}" class="cta-button" wire:navigate>{{ __('messages.discover_more') }}</a>
                @endif
            </div>
        </div>
    </div>

    @if ($service === 'website-development')
    <!-- Related Web Types Grid -->
    <div id="web-types-grid" class="services-page-section">
        <div class="section-header">
            <h2>{{ __('messages.popular_website_types') }}</h2>
            <p>{{ __('messages.explore_diverse_solutions') }}</p>
        </div>

        <div class="services-grid">
            <a href="{{ route('portfolio.detail', ['project' => 'e-commerce-platform']) }}" class="service-card animate-fade-in-up" wire:navigate>
                <div class="service-icon"></div>
                <h3>{{ __('messages.ecommerce_platform') }}</h3>
                <p>{{ __('messages.ecommerce_description') }}</p>
            </a>

            <a href="{{ route('portfolio.detail', ['project' => 'saas-application']) }}" class="service-card animate-fade-in-up" style="animation-delay: 0.05s;" wire:navigate>
                <div class="service-icon"></div>
                <h3>{{ __('messages.saas_application') }}</h3>
                <p>{{ __('messages.saas_description') }}</p>
            </a>

            <a href="{{ route('portfolio.detail', ['project' => 'corporate-website']) }}" class="service-card animate-fade-in-up" style="animation-delay: 0.1s;" wire:navigate>
                <div class="service-icon"></div>
                <h3>{{ __('messages.corporate_website') }}</h3>
                <p>{{ __('messages.corporate_description') }}</p>
            </a>

            <a href="{{ route('portfolio.detail', ['project' => 'blog-platform']) }}" class="service-card animate-fade-in-up" style="animation-delay: 0.15s;" wire:navigate>
                <div class="service-icon"></div>
                <h3>{{ __('messages.blog_platform') }}</h3>
                <p>{{ __('messages.blog_description') }}</p>
            </a>

            <a href="{{ route('portfolio.detail', ['project' => 'learning-management-system']) }}" class="service-card animate-fade-in-up" style="animation-delay: 0.2s;" wire:navigate>
                <div class="service-icon"></div>
                <h3>{{ __('messages.lms_platform') }}</h3>
                <p>{{ __('messages.lms_description') }}</p>
            </a>

            <a href="{{ route('portfolio.detail', ['project' => 'real-estate-portal']) }}" class="service-card animate-fade-in-up" style="animation-delay: 0.25s;" wire:navigate>
                <div class="service-icon"></div>
                <h3>{{ __('messages.real_estate_portal') }}</h3>
                <p>{{ __('messages.real_estate_description') }}</p>
            </a>

            <a href="{{ route('portfolio.detail', ['project' => 'booking-reservation-system']) }}" class="service-card animate-fade-in-up" style="animation-delay: 0.3s;" wire:navigate>
                <div class="service-icon"></div>
                <h3>{{ __('messages.booking_system') }}</h3>
                <p>{{ __('messages.booking_description') }}</p>
            </a>

            <a href="{{ route('portfolio.detail', ['project' => 'news-portal']) }}" class="service-card animate-fade-in-up" style="animation-delay: 0.35s;" wire:navigate>
                <div class="service-icon"></div>
                <h3>{{ __('messages.news_portal') }}</h3>
                <p>{{ __('messages.news_description') }}</p>
            </a>

            <a href="{{ route('portfolio.detail', ['project' => 'healthcare-portal']) }}" class="service-card animate-fade-in-up" style="animation-delay: 0.4s;" wire:navigate>
                <div class="service-icon"></div>
                <h3>{{ __('messages.healthcare_portal') }}</h3>
                <p>{{ __('messages.healthcare_description') }}</p>
            </a>

            <a href="{{ route('portfolio.detail', ['project' => 'fintech-dashboard']) }}" class="service-card animate-fade-in-up" style="animation-delay: 0.45s;" wire:navigate>
                <div class="service-icon"></div>
                <h3>{{ __('messages.fintech_dashboard') }}</h3>
                <p>{{ __('messages.fintech_description') }}</p>
            </a>
        </div>
    </div>
    @endif
</div>
