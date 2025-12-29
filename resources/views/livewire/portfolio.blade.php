<div class="themain">
    <section class="page-hero">
        <div class="page-hero-content">
            <h1 class="animate-fade-in-down">{{ __('messages.portfolio_page') }}</h1>
            <p class="breadcrumb animate-fade-in-up">{{ __('messages.home_breadcrumb') }} > <span>{{ __('messages.portfolio') }}</span></p>
        </div>
    </section>
    

    <section class="content-section">
        <div class="container">
            <h2 class="section-title">{{ __('messages.recent_projects') }}</h2>
            <p class="section-subtitle">{{ __('messages.portfolio_subtitle') }}</p>

            <div class="portfolio-grid">
                @forelse($portfolios as $project)
                    <a href="{{ route('portfolio.detail', ['project' => $project->slug]) }}" class="portfolio-card" wire:navigate>
                        <div class="portfolio-card-image">
                            <img src="{{ $project->image }}" alt="{{ $project->translated_title }}">
                        </div>
                        <div class="portfolio-card-content">
                            <p class="project-category">{{ $project->translated_category }}</p>
                            <h3>{{ $project->translated_title }}</h3>
                            <p class="project-description">{{ $project->translated_description }}</p>
                            @if($project->translated_technologies && count($project->translated_technologies) > 0)
                                <div class="project-tech">
                                    @foreach($project->translated_technologies as $tech)
                                        <span class="tech-tag">{{ $tech }}</span>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </a>
                @empty
                    <p>{{ __('messages.no_projects_found') }}</p>
                @endforelse
            </div>
        </div>
    </section>
</div>
