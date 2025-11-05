<div>
    <!-- Page Hero Section -->
    <div class="page-hero">
        <div class="page-hero-content">
            <h1 class="animate-fade-in-down">{{ $serviceDetails['title'] }}</h1>
            <p class="breadcrumb animate-fade-in-up">HOME > SERVICES > <span>{{ strtoupper($serviceDetails['title']) }}</span></p>
        </div>
    </div> 

    <!-- Service Detail Content -->
    <div class="service-detail-container">
        <div class="service-detail-content">
            <div class="service-image animate-fade-in-left">
                <img src="{{ $serviceDetails['image'] }}" alt="{{ $serviceDetails['title'] }}">
            </div>
            <div class="service-text animate-fade-in-right">
                <h2>{{ $serviceDetails['title'] }}</h2>
                <p>{{ $serviceDetails['description'] }}</p>
                @if ($service === 'website-development')
                    <a href="#web-types-grid" class="cta-button">DISCOVER MORE</a>
                @else
                    <a href="{{ route('portfolio.detail', ['project' => $serviceDetails['portfolio_project']]) }}" class="cta-button" wire:navigate>DISCOVER MORE</a>
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
