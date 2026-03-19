@extends('layouts.site')

@section('title', 'Newsletter | CodeExpress')
@section('meta_description', 'Read product updates, delivery insights, and digital execution notes from CodeExpress.')
@section('theme_color', '#0A2540')

@push('styles')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/newsletter.css') }}">
@endpush

@section('content')
<main class="newsletter-page-shell">
    <section class="newsletter-page-hero">
        <div class="container newsletter-page-hero-grid">
            <div class="reveal active">
                <span class="eyebrow">Newsletter</span>
                <h1>Insights, product thinking, and digital delivery notes.</h1>
                <p>Browse updates from CodeExpress on product design, engineering decisions, operational systems, and structured digital execution.</p>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="newsletter-grid newsletter-grid-page">
                @forelse ($newsletters as $newsletter)
                    <article class="newsletter-card reveal">
                        @if ($newsletter->image)
                            <div class="newsletter-image">
                                <img src="{{ $newsletter->image }}" alt="{{ $newsletter->image_alt ?: $newsletter->title }}">
                            </div>
                        @endif
                        <div class="newsletter-body">
                            <div class="newsletter-meta">
                                <span class="newsletter-date">{{ optional($newsletter->published_at)->format('F Y') ?: 'Draft' }}</span>
                                <span class="card-badge blue">{{ $newsletter->category ?: 'Newsletter' }}</span>
                            </div>
                            <h3>{{ $newsletter->title }}</h3>
                            <p>{{ $newsletter->excerpt }}</p>
                            <a href="{{ route('newsletter.show', $newsletter) }}" class="newsletter-link">Read article</a>
                        </div>
                    </article>
                @empty
                    <div class="portfolio-empty-card">
                        <h3>No newsletter articles published yet</h3>
                        <p>Newsletter articles will appear here as soon as they are published from the admin panel.</p>
                    </div>
                @endforelse
            </div>

            @if ($newsletters->hasPages())
                <div class="portfolio-page-pagination">{{ $newsletters->links() }}</div>
            @endif
        </div>
    </section>
</main>
@endsection