<div class="themain">
    <!-- Page Hero Section -->
    <div class="page-hero">
        <div class="page-hero-content">
            <h1 class="animate-fade-in-down">{{ !empty($translatedData) ? $translatedData['title'] : $serviceDetails['title'] }}</h1>
            <p class="breadcrumb animate-fade-in-up">{{ __('messages.home_breadcrumb') }} > {{ strtoupper(__('messages.services')) }} > <span>{{ strtoupper(!empty($translatedData) ? $translatedData['title'] : $serviceDetails['title']) }}</span></p>
        </div>
    </div> 

    <!-- Service Detail Content -->
    <div class="service-detail-container">
        <div class="service-detail-content">
            <div class="service-image animate-fade-in-left">
                <img src="{{ !empty($translatedData) ? $translatedData['image'] : $serviceDetails['image'] }}" alt="{{ !empty($translatedData) ? $translatedData['title'] : $serviceDetails['title'] }}">
            </div>
            <div class="service-text animate-fade-in-right">
                <h2>{{ !empty($translatedData) ? $translatedData['title'] : $serviceDetails['title'] }}</h2>
                <p class="service-intro">{{ !empty($translatedData) ? $translatedData['description'] : $serviceDetails['description'] }}</p>
                
                @if ($service === 'website-development' && (!empty($translatedData) && $translatedData['intro'] || isset($serviceDetails['intro'])))
                    <p class="service-description">{{ !empty($translatedData) && $translatedData['intro'] ? $translatedData['intro'] : $serviceDetails['intro'] }}</p>
                    
                    <div class="service-offerings">
                        <h3>{{ __('messages.what_we_offer') }}</h3>
                        <ul class="services-list">
                            @foreach((!empty($translatedData) && $translatedData['services_list'] ? $translatedData['services_list'] : $serviceDetails['services']) as $serviceItem)
                                <li>{{ $serviceItem }}</li>
                            @endforeach
                        </ul>
                    </div>
                    
                    <p class="service-closing">{{ !empty($translatedData) && $translatedData['closing'] ? $translatedData['closing'] : $serviceDetails['closing'] }}</p>
                    
                    <a href="#web-types-grid" class="cta-button">{{ __('messages.discover_more') }}</a>
                @elseif ($service === 'app-development' && (!empty($translatedData) && $translatedData['intro'] || isset($serviceDetails['intro'])))
                    <p class="service-description">{{ !empty($translatedData) && $translatedData['intro'] ? $translatedData['intro'] : $serviceDetails['intro'] }}</p>
                    
                    <div class="service-offerings">
                        <h3>{{ __('messages.our_app_development_services') }}</h3>
                        <ul class="services-list">
                            @foreach((!empty($translatedData) && $translatedData['services_list'] ? $translatedData['services_list'] : $serviceDetails['services']) as $serviceItem)
                                <li>{{ $serviceItem }}</li>
                            @endforeach
                        </ul>
                    </div>
                    
                    @if(!empty($translatedData) && $translatedData['note'] || isset($serviceDetails['note']))
                        <p class="service-note">{{ !empty($translatedData) && $translatedData['note'] ? $translatedData['note'] : $serviceDetails['note'] }}</p>
                    @endif
                    
                    <div class="service-offerings why-choose">
                        <h3>{{ __('messages.why_choose_our_agency') }}</h3>
                        <ul class="services-list checkmark-list">
                            @foreach((!empty($translatedData) && $translatedData['why_choose'] ? $translatedData['why_choose'] : $serviceDetails['why_choose']) as $benefit)
                                <li>{{ $benefit }}</li>
                            @endforeach
                        </ul>
                    </div>
                    
                    <p class="service-closing">{{ $serviceDetails['closing'] }}</p>
                    
                    <a href="{{ route('portfolio.detail', ['project' => (!empty($translatedData) ? $translatedData['portfolio_project'] : $serviceDetails['portfolio_project'])]) }}" class="cta-button" wire:navigate>{{ __('messages.discover_more') }}</a>
                @elseif ($service === 'graphic-designing' && (!empty($translatedData) && $translatedData['intro'] || isset($serviceDetails['intro'])))
                    <p class="service-description">{{ !empty($translatedData) && $translatedData['intro'] ? $translatedData['intro'] : $serviceDetails['intro'] }}</p>
                    
                    <div class="service-offerings">
                        <h3>{{ __('messages.services_we_provide') }}</h3>
                        <ul class="services-list">
                            @foreach((!empty($translatedData) && $translatedData['services_list'] ? $translatedData['services_list'] : $serviceDetails['services']) as $serviceItem)
                                <li>{{ $serviceItem }}</li>
                            @endforeach
                        </ul>
                    </div>
                    
                    <div class="service-offerings why-choose">
                        <h3>{{ __('messages.why_we_are_best_choice') }}</h3>
                        <p class="why-choose-intro">Our clients receive:</p>
                        <ul class="services-list checkmark-list">
                            @foreach((!empty($translatedData) && $translatedData['why_choose'] ? $translatedData['why_choose'] : $serviceDetails['why_choose']) as $benefit)
                                <li>{{ $benefit }}</li>
                            @endforeach
                        </ul>
                    </div>
                    
                    <p class="service-closing">{{ !empty($translatedData) && $translatedData['closing'] ? $translatedData['closing'] : $serviceDetails['closing'] }}</p>
                    
                    <a href="{{ route('portfolio.detail', ['project' => (!empty($translatedData) ? $translatedData['portfolio_project'] : $serviceDetails['portfolio_project'])]) }}" class="cta-button" wire:navigate>{{ __('messages.discover_more') }}</a>
                @elseif ($service === 'seo-content-writing' && (!empty($translatedData) && $translatedData['intro'] || isset($serviceDetails['intro'])))
                    <p class="service-description">{{ !empty($translatedData) && $translatedData['intro'] ? $translatedData['intro'] : $serviceDetails['intro'] }}</p>
                    
                    @if(!empty($translatedData) && $translatedData['note'] || isset($serviceDetails['note']))
                        <p class="service-note">{{ !empty($translatedData) && $translatedData['note'] ? $translatedData['note'] : $serviceDetails['note'] }}</p>
                    @endif
                    
                    <div class="service-offerings">
                        <h3>{{ __('messages.core_seo_services') }}</h3>
                        <div class="seo-services-list">
                            @foreach((!empty($translatedData) && $translatedData['service_details'] ? $translatedData['service_details'] : $serviceDetails['services']) as $serviceItem)
                                <div class="seo-service-item">
                                    <h4 class="seo-service-title">{{ $serviceItem['title'] }}</h4>
                                    <p class="seo-service-description">{{ $serviceItem['description'] }}</p>
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
                            @foreach((!empty($translatedData) && $translatedData['benefits'] ? $translatedData['benefits'] : $serviceDetails['benefits']) as $benefit)
                                <li>{{ $benefit }}</li>
                            @endforeach
                        </ul>
                    </div>
                    
                    <p class="service-closing">{{ !empty($translatedData) && $translatedData['closing'] ? $translatedData['closing'] : $serviceDetails['closing'] }}</p>
                    
                    <a href="{{ route('portfolio.detail', ['project' => (!empty($translatedData) ? $translatedData['portfolio_project'] : $serviceDetails['portfolio_project'])]) }}" class="cta-button" wire:navigate>{{ __('messages.discover_more') }}</a>
                @else
                    <p>{{ !empty($translatedData) ? $translatedData['description'] : $serviceDetails['description'] }}</p>
                    <a href="{{ route('portfolio.detail', ['project' => (!empty($translatedData) ? $translatedData['portfolio_project'] : $serviceDetails['portfolio_project'])]) }}" class="cta-button" wire:navigate>{{ __('messages.discover_more') }}</a>
                @endif
            </div>
        </div>
    </div>

    @if ($service === 'website-development')
    <!-- Related Web Types Grid -->
    <div id="web-types-grid" class="services-page-section">
        <div class="section-header">
            <h2>Popular Website Types We Build</h2>
            <p>Explore diverse modern web solutions tailored for different industries and use-cases.</p>
        </div>

        <div class="services-grid">
            <a href="{{ route('portfolio.detail', ['project' => 'e-commerce-platform']) }}" class="service-card animate-fade-in-up" wire:navigate>
                <div class="service-icon"></div>
                <h3>E‑COMMERCE PLATFORM</h3>
                <p>Scalable online stores with payments, inventory, and order management.</p>
            </a>

            <a href="{{ route('portfolio.detail', ['project' => 'saas-application']) }}" class="service-card animate-fade-in-up" style="animation-delay: 0.05s;" wire:navigate>
                <div class="service-icon"></div>
                <h3>SaaS APPLICATION</h3>
                <p>Multi-tenant cloud apps with subscriptions, roles, and real-time features.</p>
            </a>

            <a href="{{ route('portfolio.detail', ['project' => 'corporate-website']) }}" class="service-card animate-fade-in-up" style="animation-delay: 0.1s;" wire:navigate>
                <div class="service-icon"></div>
                <h3>CORPORATE WEBSITE</h3>
                <p>Brand-focused sites with CMS, multilingual support, and SEO.</p>
            </a>

            <a href="{{ route('portfolio.detail', ['project' => 'blog-platform']) }}" class="service-card animate-fade-in-up" style="animation-delay: 0.15s;" wire:navigate>
                <div class="service-icon"></div>
                <h3>BLOG / MEDIA PLATFORM</h3>
                <p>SEO-first publishing platforms with markdown and social sharing.</p>
            </a>

            <a href="{{ route('portfolio.detail', ['project' => 'learning-management-system']) }}" class="service-card animate-fade-in-up" style="animation-delay: 0.2s;" wire:navigate>
                <div class="service-icon"></div>
                <h3>LEARNING MANAGEMENT SYSTEM</h3>
                <p>Courses, streaming, quizzes, certificates, and student tracking.</p>
            </a>

            <a href="{{ route('portfolio.detail', ['project' => 'real-estate-portal']) }}" class="service-card animate-fade-in-up" style="animation-delay: 0.25s;" wire:navigate>
                <div class="service-icon"></div>
                <h3>REAL ESTATE PORTAL</h3>
                <p>Listings, maps, filters, agents, and lead management.</p>
            </a>

            <a href="{{ route('portfolio.detail', ['project' => 'booking-reservation-system']) }}" class="service-card animate-fade-in-up" style="animation-delay: 0.3s;" wire:navigate>
                <div class="service-icon"></div>
                <h3>BOOKING / RESERVATION</h3>
                <p>Calendars, payments, availability, and notifications.</p>
            </a>

            <a href="{{ route('portfolio.detail', ['project' => 'news-portal']) }}" class="service-card animate-fade-in-up" style="animation-delay: 0.35s;" wire:navigate>
                <div class="service-icon"></div>
                <h3>NEWS PORTAL</h3>
                <p>Editorial workflows, categories, tags, and ads.</p>
            </a>

            <a href="{{ route('portfolio.detail', ['project' => 'healthcare-portal']) }}" class="service-card animate-fade-in-up" style="animation-delay: 0.4s;" wire:navigate>
                <div class="service-icon"></div>
                <h3>HEALTHCARE PORTAL</h3>
                <p>Appointments, patient dashboards, and secure records.</p>
            </a>

            <a href="{{ route('portfolio.detail', ['project' => 'fintech-dashboard']) }}" class="service-card animate-fade-in-up" style="animation-delay: 0.45s;" wire:navigate>
                <div class="service-icon"></div>
                <h3>FINTECH DASHBOARD</h3>
                <p>Analytics, charts, role-based access, and integrations.</p>
            </a>
        </div>
    </div>
    @endif
</div>
