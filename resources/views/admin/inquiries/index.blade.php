@extends('layouts.admin')

@section('title', 'Contact Inquiries | CodeExpress')
@section('admin_kicker', 'Lead Management')
@section('admin_title', 'Contact Inquiries')

@push('styles')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endpush

@push('topbar_actions')
    <a href="{{ route('admin.dashboard') }}" class="admin-ghost-link">Back to Dashboard</a>
@endpush

@section('content')
    <section class="admin-grid admin-grid-stats">
        <article class="stat-card stat-card-orange">
            <span>Unread Inquiries</span>
            <strong>{{ str_pad((string) $unreadCount, 2, '0', STR_PAD_LEFT) }}</strong>
        </article>
        <article class="stat-card stat-card-blue">
            <span>Total Inquiries</span>
            <strong>{{ str_pad((string) $totalCount, 2, '0', STR_PAD_LEFT) }}</strong>
        </article>
        <article class="stat-card stat-card-green">
            <span>Read Messages</span>
            <strong>{{ str_pad((string) ($totalCount - $unreadCount), 2, '0', STR_PAD_LEFT) }}</strong>
        </article>
        <article class="stat-card stat-card-purple">
            <span>Status</span>
            <strong>{{ $unreadCount > 0 ? 'Live' : 'Clear' }}</strong>
        </article>
    </section>

    <section class="admin-card admin-form-card">
        <div class="admin-card-head">
            <div>
                <small class="admin-card-kicker">Inbox</small>
                <h3>Website inquiry messages</h3>
            </div>
            <span class="admin-soft-pill">Read / Unread</span>
        </div>

        @if (session('status'))
            <div class="admin-alert success">{{ session('status') }}</div>
        @endif

        <div class="inquiry-list">
            @forelse ($inquiries as $inquiry)
                <article class="inquiry-item {{ $inquiry->is_read ? 'is-read' : 'is-unread' }}">
                    <div class="inquiry-main">
                        <div class="inquiry-head">
                            <div>
                                <div class="inquiry-title-row">
                                    <h4>{{ $inquiry->subject }}</h4>
                                    <span class="inquiry-state {{ $inquiry->is_read ? 'read' : 'unread' }}">{{ $inquiry->is_read ? 'Read' : 'Unread' }}</span>
                                </div>
                                <p class="inquiry-meta">{{ $inquiry->name }} · {{ $inquiry->email }}@if($inquiry->phone) · {{ $inquiry->phone }}@endif</p>
                            </div>
                            <span class="inquiry-date">{{ $inquiry->created_at->format('d M Y, h:i A') }}</span>
                        </div>
                        <p class="inquiry-preview">{{ \Illuminate\Support\Str::limit($inquiry->message, 180) }}</p>
                    </div>
                    <div class="inquiry-actions">
                        <a href="{{ route('admin.inquiries.show', $inquiry) }}" class="admin-primary-link">Open</a>
                    </div>
                </article>
            @empty
                <div class="admin-empty-state">
                    <h4>No inquiries yet</h4>
                    <p>Once someone submits the contact form from the website, the message will appear here.</p>
                </div>
            @endforelse
        </div>

        @if ($inquiries->hasPages())
            <div class="admin-pagination">
                {{ $inquiries->links() }}
            </div>
        @endif
    </section>
@endsection

@push('scripts')
    <script src="{{ asset('js/admin.js') }}"></script>
@endpush