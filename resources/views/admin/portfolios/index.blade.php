@extends('layouts.admin')

@section('title', 'Portfolio Items | CodeExpress Admin')
@section('admin_kicker', 'Portfolio Management')
@section('admin_title', 'Portfolio Items')

@push('styles')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endpush

@push('topbar_actions')
    <a href="{{ route('admin.portfolios.create') }}" class="admin-primary-link">Add Portfolio</a>
@endpush

@section('content')
    <section class="admin-grid admin-grid-stats">
        <article class="stat-card stat-card-orange"><span>Published</span><strong>{{ str_pad((string) $publishedCount, 2, '0', STR_PAD_LEFT) }}</strong></article>
        <article class="stat-card stat-card-blue"><span>Featured</span><strong>{{ str_pad((string) $featuredCount, 2, '0', STR_PAD_LEFT) }}</strong></article>
        <article class="stat-card stat-card-green"><span>Total</span><strong>{{ str_pad((string) $portfolios->total(), 2, '0', STR_PAD_LEFT) }}</strong></article>
        <article class="stat-card stat-card-purple"><span>Module</span><strong>Live</strong></article>
    </section>

    <section class="admin-card admin-form-card">
        <div class="admin-card-head">
            <div>
                <small class="admin-card-kicker">Product portfolio</small>
                <h3>Managed product showcase</h3>
            </div>
            <span class="admin-soft-pill">Dynamic</span>
        </div>

        @if (session('status'))
            <div class="admin-alert success">{{ session('status') }}</div>
        @endif

        <div class="portfolio-admin-list">
            @forelse ($portfolios as $portfolio)
                <article class="portfolio-admin-item">
                    <div class="portfolio-admin-thumb">
                        <img src="{{ $portfolio->thumbnail }}" alt="{{ $portfolio->thumbnail_alt ?: $portfolio->title }}">
                    </div>
                    <div class="portfolio-admin-main">
                        <div class="portfolio-admin-head">
                            <div>
                                <p class="portfolio-admin-kicker">{{ $portfolio->category ?: 'Product Portfolio' }}</p>
                                <h4>{{ $portfolio->title }}</h4>
                            </div>
                            <div class="portfolio-admin-statuses">
                                <span class="inquiry-state {{ $portfolio->is_published ? 'read' : 'unread' }}">{{ $portfolio->is_published ? 'Published' : 'Draft' }}</span>
                                @if ($portfolio->is_featured)
                                    <span class="module-status">Featured</span>
                                @endif
                            </div>
                        </div>
                        <p class="portfolio-admin-copy">{{ $portfolio->short_description }}</p>
                        <div class="portfolio-admin-meta">
                            <span>Sort: {{ $portfolio->sort_order }}</span>
                            <span>Slug: {{ $portfolio->slug }}</span>
                        </div>
                    </div>
                    <div class="portfolio-admin-actions">
                        <a href="{{ route('portfolio.show', $portfolio) }}" class="admin-ghost-link" target="_blank" rel="noopener">View</a>
                        <a href="{{ route('admin.portfolios.edit', $portfolio) }}" class="admin-primary-link">Edit</a>
                    </div>
                </article>
            @empty
                <div class="admin-empty-state">
                    <h4>No portfolio items yet</h4>
                    <p>Create your first product entry to populate the homepage preview and portfolio detail pages.</p>
                </div>
            @endforelse
        </div>

        @if ($portfolios->hasPages())
            <div class="admin-pagination">{{ $portfolios->links() }}</div>
        @endif
    </section>
@endsection

@push('scripts')
    <script src="{{ asset('js/admin.js') }}"></script>
@endpush