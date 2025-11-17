<div class="themain">
    <!-- Page Hero Section -->
    <div class="page-hero">
        <div class="page-hero-content">
            <h1 class="animate-fade-in-down">{{ $projectDetails['title'] }}</h1>
            <p class="breadcrumb animate-fade-in-up">HOME > PORTFOLIO > <span>{{ strtoupper($projectDetails['title']) }}</span></p>
            <p class="service-relation">Related to: <a href="{{ route('service.detail', ['service' => $projectDetails['service_slug']]) }}" wire:navigate>{{ $projectDetails['category'] }}</a></p>
        </div>
    </div>

    <!-- Project Overview Section -->
    <div class="project-overview-section">
        <div class="project-overview-container">
            <div class="project-image animate-fade-in-left">
                <img src="{{ $projectDetails['image'] }}" alt="{{ $projectDetails['title'] }}">
            </div>
            <div class="project-info animate-fade-in-right">
                <div class="project-category-badge">{{ $projectDetails['category'] }}</div>
                <h2>{{ $projectDetails['title'] }}</h2>
                <p class="project-description">{{ $projectDetails['description'] }}</p>
                
                <div class="project-meta">
                    @if(isset($projectDetails['web_type']))
                        <div class="meta-item">
                            <strong>Web Type:</strong> {{ $projectDetails['web_type'] }}
                        </div>
                        <div class="meta-item">
                            <strong>Use Cases:</strong> {{ $projectDetails['use_cases'] }}
                        </div>
                    @else
                    @endif
                </div>

                <div class="project-technologies">
                    <h4>Technologies Used</h4>
                    <div class="tech-tags">
                        @foreach($projectDetails['technologies'] as $tech)
                            <span class="tech-tag">{{ $tech }}</span>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Project Challenge & Solution Section -->
    <div class="project-details-section">
        <div class="project-details-container">
            <div class="challenge-solution-grid">
                <div class="challenge-box">
                    <h3>Challenge</h3>
                    <p>{{ $projectDetails['challenge'] }}</p>
                </div>
                <div class="solution-box">
                    <h3>Solution</h3>
                    <p>{{ $projectDetails['solution'] }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Project Results Section -->
    <div class="project-results-section">
        <div class="project-results-container">
            <h3>Key Results</h3>
            <div class="results-grid">
                @foreach($projectDetails['results'] as $result)
                    <div class="result-item">
                        <div class="result-icon">✓</div>
                        <span>{{ $result }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Project Features Section -->
    <div class="project-features-section">
        <div class="project-features-container">
            <h3>Key Features</h3>
            <div class="features-grid">
                @foreach($projectDetails['features'] as $feature)
                    <div class="feature-item">
                        <div class="feature-icon">•</div>
                        <span>{{ $feature }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Call to Action Section -->
    <div class="project-cta-section">
        <div class="project-cta-container">
            <h3>Interested in Similar Work?</h3>
            <p>Let's discuss how we can help bring your project to life with our expertise and creative solutions.</p>
            <div class="cta-buttons">
                <a href="{{ route('contact') }}" class="cta-button primary" wire:navigate>Start Your Project</a>
                <a href="{{ route('portfolio') }}" class="cta-button secondary" wire:navigate>View More Projects</a>
            </div>
        </div>
    </div>
</div>
