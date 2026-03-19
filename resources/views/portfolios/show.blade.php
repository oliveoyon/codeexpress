@extends('layouts.site')

@section('title', ($portfolio->seo_title ?: $portfolio->title) . ' | CodeExpress')
@section('meta_description', $portfolio->seo_description ?: $portfolio->short_description)
@section('theme_color', '#0A2540')

@push('styles')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/portfolio.css') }}">
@endpush

@section('content')
<main class="portfolio-detail-shell">
    <section class="portfolio-detail-hero">
        <div class="container portfolio-detail-grid">
            <div class="portfolio-detail-copy reveal active">
                <span class="eyebrow">{{ $portfolio->category ?: 'Portfolio Project' }}</span>
                <h1>{{ $portfolio->title }}</h1>
                <p>{{ $portfolio->short_description }}</p>

                <div class="portfolio-detail-meta">
                    @if ($portfolio->industry)
                        <span class="portfolio-detail-chip">{{ $portfolio->industry }}</span>
                    @endif
                    @if ($portfolio->client_name)
                        <span class="portfolio-detail-chip">{{ $portfolio->client_name }}</span>
                    @endif
                    @if ($portfolio->project_date)
                        <span class="portfolio-detail-chip">{{ $portfolio->project_date->format('F Y') }}</span>
                    @endif
                </div>

                <div class="btn-group">
                    <a href="{{ route('portfolio.index') }}" class="btn btn-secondary">All Portfolio</a>
                    @if ($portfolio->project_url)
                        <a href="{{ $portfolio->project_url }}" class="btn btn-primary" target="_blank" rel="noopener">Visit Project</a>
                    @endif
                </div>
            </div>
            <div class="portfolio-detail-visual reveal">
                <img src="{{ $portfolio->thumbnail }}" alt="{{ $portfolio->thumbnail_alt ?: $portfolio->title }}">
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container portfolio-detail-content-grid">
            <article class="portfolio-detail-card reveal">
                <small class="portfolio-detail-kicker">Overview</small>
                <h2>Product direction and delivery context</h2>
                <p>{!! nl2br(e($portfolio->overview ?: $portfolio->short_description)) !!}</p>
            </article>

            <article class="portfolio-detail-card reveal">
                <small class="portfolio-detail-kicker">Quick Snapshot</small>
                <h2>What this product focuses on</h2>
                @if (!empty($portfolio->tags))
                    <div class="portfolio-tags portfolio-tags-detail">
                        @foreach ($portfolio->tags as $tag)
                            <span class="portfolio-tag">{{ $tag }}</span>
                        @endforeach
                    </div>
                @endif
                @if ($portfolio->excerpt_note)
                    <p class="portfolio-detail-note">{{ $portfolio->excerpt_note }}</p>
                @endif
            </article>
        </div>
    </section>

    @if (!empty($portfolio->key_features))
        <section class="section" style="background: var(--bg-soft);">
            <div class="container">
                <div class="section-header reveal">
                    <span class="eyebrow">Key Features</span>
                    <h2>Designed for clarity, scale, and practical use.</h2>
                </div>
                <div class="portfolio-feature-grid">
                    @foreach ($portfolio->key_features as $feature)
                        <article class="feature-card reveal">
                            <div class="icon-box">{!! $portfolio->icon ?: '&#9679;' !!}</div>
                            <p>{{ $feature }}</p>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @if (!empty($portfolio->results))
        <section class="section">
            <div class="container">
                <div class="section-header reveal">
                    <span class="eyebrow">Highlights</span>
                    <h2>What makes this product strong.</h2>
                </div>
                <div class="portfolio-result-grid">
                    @foreach ($portfolio->results as $result)
                        <article class="portfolio-result-card reveal">
                            <span class="portfolio-result-mark"></span>
                            <p>{{ $result }}</p>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @if ($relatedPortfolios->isNotEmpty())
        <section class="section" style="background: var(--bg-soft);">
            <div class="container">
                <div class="section-header reveal">
                    <span class="eyebrow">More Work</span>
                    <h2>Related product showcases.</h2>
                </div>
                <div class="portfolio-grid portfolio-grid-page">
                    @foreach ($relatedPortfolios as $related)
                        <a href="{{ route('portfolio.show', $related) }}" class="portfolio-card reveal portfolio-card-link">
                            <div class="portfolio-card-image">
                                <img src="{{ $related->thumbnail }}" alt="{{ $related->thumbnail_alt ?: $related->title }}">
                            </div>
                            <div class="portfolio-card-body">
                                <div class="portfolio-card-top">
                                    <div>
                                        <span class="portfolio-product-label">{{ $related->category ?: 'Product Portfolio' }}</span>
                                        <h3>{{ $related->title }}</h3>
                                    </div>
                                    <div class="portfolio-product-icon">{!! $related->icon ?: '&#9679;' !!}</div>
                                </div>
                                <p>{{ $related->short_description }}</p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
</main>
@endsection

@push('scripts')
    <script>
        const detailObserver = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('active');
                }
            });
        }, { threshold: 0.12 });

        document.querySelectorAll('.reveal').forEach((element) => detailObserver.observe(element));
    </script>
@endpush