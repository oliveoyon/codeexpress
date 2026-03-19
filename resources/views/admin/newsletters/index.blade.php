@extends('layouts.admin')

@section('title', 'Newsletter Articles | CodeExpress Admin')
@section('admin_kicker', 'Newsletter Management')
@section('admin_title', 'Newsletter Articles')

@push('styles')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endpush

@push('topbar_actions')
    <a href="{{ route('admin.newsletters.create') }}" class="admin-primary-link">Add Article</a>
@endpush

@section('content')
    <section class="admin-grid admin-grid-stats">
        <article class="stat-card stat-card-orange"><span>Published</span><strong>{{ str_pad((string) $publishedCount, 2, '0', STR_PAD_LEFT) }}</strong></article>
        <article class="stat-card stat-card-blue"><span>Total</span><strong>{{ str_pad((string) $newsletters->total(), 2, '0', STR_PAD_LEFT) }}</strong></article>
        <article class="stat-card stat-card-green"><span>Module</span><strong>Live</strong></article>
        <article class="stat-card stat-card-purple"><span>Type</span><strong>Blog</strong></article>
    </section>

    <section class="admin-card admin-form-card">
        <div class="admin-card-head">
            <div>
                <small class="admin-card-kicker">Editorial listing</small>
                <h3>Managed newsletter articles</h3>
            </div>
            <span class="admin-soft-pill">Dynamic</span>
        </div>

        @if (session('status'))
            <div class="admin-alert success">{{ session('status') }}</div>
        @endif

        <div class="newsletter-admin-list">
            @forelse ($newsletters as $newsletter)
                <article class="newsletter-admin-item">
                    <div class="portfolio-admin-thumb">
                        @if ($newsletter->image)
                            <img src="{{ $newsletter->image }}" alt="{{ $newsletter->image_alt ?: $newsletter->title }}">
                        @endif
                    </div>
                    <div class="portfolio-admin-main">
                        <div class="portfolio-admin-head">
                            <div>
                                <p class="portfolio-admin-kicker">{{ $newsletter->category ?: 'Newsletter' }}</p>
                                <h4>{{ $newsletter->title }}</h4>
                            </div>
                            <span class="inquiry-state {{ $newsletter->is_published ? 'read' : 'unread' }}">{{ $newsletter->is_published ? 'Published' : 'Draft' }}</span>
                        </div>
                        <p class="portfolio-admin-copy">{{ $newsletter->excerpt }}</p>
                        <div class="portfolio-admin-meta">
                            <span>{{ optional($newsletter->published_at)->format('d M Y') ?: 'No date' }}</span>
                            <span>{{ $newsletter->slug }}</span>
                        </div>
                    </div>
                    <div class="portfolio-admin-actions">
                        <a href="{{ route('newsletter.show', $newsletter) }}" class="admin-ghost-link" target="_blank" rel="noopener">View</a>
                        <a href="{{ route('admin.newsletters.edit', $newsletter) }}" class="admin-primary-link">Edit</a>
                    </div>
                </article>
            @empty
                <div class="admin-empty-state">
                    <h4>No newsletter articles yet</h4>
                    <p>Create your first article to populate the homepage newsletter preview and detail pages.</p>
                </div>
            @endforelse
        </div>

        @if ($newsletters->hasPages())
            <div class="admin-pagination">{{ $newsletters->links() }}</div>
        @endif
    </section>
@endsection

@push('scripts')
    <script src="{{ asset('js/admin.js') }}"></script>
@endpush