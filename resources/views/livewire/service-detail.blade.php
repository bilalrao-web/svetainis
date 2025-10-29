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
                <a href="{{ route('portfolio.detail', ['project' => $serviceDetails['portfolio_project']]) }}" class="cta-button" wire:navigate>DISCOVER MORE</a>
            </div>
        </div>
    </div>
</div>
