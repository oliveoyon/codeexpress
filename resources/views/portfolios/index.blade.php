@extends('layouts.site')

@section('title', 'Portfolio | CodeExpress')
@section('meta_description', 'Explore software products and digital platforms built by CodeExpress across operations, education, commerce, finance, and workflow systems.')
@section('theme_color', '#0A2540')

@push('styles')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/portfolio.css') }}">
@endpush

@section('content')
<main class="portfolio-page-shell">
    <section class="portfolio-page-hero">
        <div class="container portfolio-page-hero-grid">
            <div class="reveal active">
                <span class="eyebrow">Portfolio</span>
                <h1>Products designed for real operations and modern growth.</h1>
                <p>Browse CodeExpress product work across education, commerce, finance, workforce, and operational systems, presented with the same structured delivery thinking used in production.</p>
            </div>
            <div class="portfolio-page-panel reveal">
                <span class="portfolio-page-pill">Curated Work</span>
                <p>Each portfolio entry opens to a dedicated project page with fuller context, key features, and product direction.</p>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="portfolio-grid portfolio-grid-page">
                @forelse ($portfolios as $portfolio)
                    <a href="{{ route('portfolio.show', $portfolio) }}" class="portfolio-card reveal portfolio-card-link">
                        <div class="portfolio-card-image">
                            <img src="{{ $portfolio->thumbnail }}" alt="{{ $portfolio->thumbnail_alt ?: $portfolio->title }}">
                        </div>
                        <div class="portfolio-card-body">
                            <div class="portfolio-card-top">
                                <div>
                                    <span class="portfolio-product-label">{{ $portfolio->category ?: 'Product Portfolio' }}</span>
                                    <h3>{{ $portfolio->title }}</h3>
                                </div>
                                <div class="portfolio-product-icon">{!! $portfolio->icon ?: '&#9679;' !!}</div>
                            </div>
                            <p>{{ $portfolio->short_description }}</p>
                            @if (!empty($portfolio->tags))
                                <div class="portfolio-tags">
                                    @foreach (collect($portfolio->tags)->take(3) as $tag)
                                        <span class="portfolio-tag">{{ $tag }}</span>
                                    @endforeach
                                </div>
                            @endif
                            @if ($portfolio->excerpt_note)
                                <span class="portfolio-note">{{ $portfolio->excerpt_note }}</span>
                            @endif
                        </div>
                    </a>
                @empty
                    <div class="portfolio-empty-card">
                        <h3>No portfolio items published yet</h3>
                        <p>Portfolio products will appear here as soon as they are published from the admin panel.</p>
                    </div>
                @endforelse
            </div>

            @if ($portfolios->hasPages())
                <div class="portfolio-page-pagination">{{ $portfolios->links() }}</div>
            @endif
        </div>
    </section>
</main>
@endsection

@push('scripts')
    <script>
        const portfolioObserver = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('active');
                }
            });
        }, { threshold: 0.12 });

        document.querySelectorAll('.reveal').forEach((element) => portfolioObserver.observe(element));
    </script>
@endpush