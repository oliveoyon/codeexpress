@extends('layouts.site')

@section('title', ($newsletter->seo_title ?: $newsletter->title) . ' | CodeExpress')
@section('meta_description', $newsletter->seo_description ?: $newsletter->excerpt)
@section('theme_color', '#0A2540')

@push('styles')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/newsletter.css') }}">
@endpush

@section('content')
<main class="newsletter-detail-shell">
    <section class="newsletter-detail-hero">
        <div class="container newsletter-detail-grid">
            <div class="reveal active">
                <span class="eyebrow">{{ $newsletter->category ?: 'Newsletter' }}</span>
                <h1>{{ $newsletter->title }}</h1>
                <p>{{ $newsletter->excerpt }}</p>
                <div class="newsletter-detail-meta">
                    <span class="portfolio-detail-chip">{{ optional($newsletter->published_at)->format('d F Y') ?: 'Draft' }}</span>
                </div>
                <div class="btn-group">
                    <a href="{{ route('newsletter.index') }}" class="btn btn-secondary">All Articles</a>
                </div>
            </div>
            @if ($newsletter->image)
                <div class="portfolio-detail-visual reveal">
                    <img src="{{ $newsletter->image }}" alt="{{ $newsletter->image_alt ?: $newsletter->title }}">
                </div>
            @endif
        </div>
    </section>

    <section class="section">
        <div class="container newsletter-article-wrap">
            <article class="portfolio-detail-card reveal">
                <small class="portfolio-detail-kicker">Article</small>
                <h2>Full update</h2>
                <div class="newsletter-article-content">{!! nl2br(e($newsletter->content ?: $newsletter->excerpt)) !!}</div>
            </article>
        </div>
    </section>

    @if ($relatedNewsletters->isNotEmpty())
        <section class="section" style="background: var(--bg-soft);">
            <div class="container">
                <div class="section-header reveal">
                    <span class="eyebrow">More Reading</span>
                    <h2>More from the newsletter.</h2>
                </div>
                <div class="newsletter-grid newsletter-grid-page">
                    @foreach ($relatedNewsletters as $related)
                        <article class="newsletter-card reveal">
                            @if ($related->image)
                                <div class="newsletter-image">
                                    <img src="{{ $related->image }}" alt="{{ $related->image_alt ?: $related->title }}">
                                </div>
                            @endif
                            <div class="newsletter-body">
                                <div class="newsletter-meta">
                                    <span class="newsletter-date">{{ optional($related->published_at)->format('F Y') ?: 'Draft' }}</span>
                                    <span class="card-badge blue">{{ $related->category ?: 'Newsletter' }}</span>
                                </div>
                                <h3>{{ $related->title }}</h3>
                                <p>{{ $related->excerpt }}</p>
                                <a href="{{ route('newsletter.show', $related) }}" class="newsletter-link">Read article</a>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
</main>
@endsection