@extends('layouts.admin')

@section('title', 'Inquiry Details | CodeExpress')
@section('admin_kicker', 'Lead Management')
@section('admin_title', 'Inquiry Details')

@push('styles')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endpush

@push('topbar_actions')
    <a href="{{ route('admin.inquiries.index') }}" class="admin-ghost-link">Back to Inquiries</a>
@endpush

@section('content')
    <section class="admin-grid admin-grid-main">
        <div class="admin-card admin-form-card">
            <div class="admin-card-head">
                <div>
                    <small class="admin-card-kicker">Message</small>
                    <h3>{{ $inquiry->subject }}</h3>
                </div>
                <span class="inquiry-state {{ $inquiry->is_read ? 'read' : 'unread' }}">{{ $inquiry->is_read ? 'Read' : 'Unread' }}</span>
            </div>

            @if (session('status'))
                <div class="admin-alert success">{{ session('status') }}</div>
            @endif

            <div class="inquiry-detail-grid">
                <div class="inquiry-detail-card">
                    <span>Name</span>
                    <strong>{{ $inquiry->name }}</strong>
                </div>
                <div class="inquiry-detail-card">
                    <span>Email</span>
                    <strong>{{ $inquiry->email }}</strong>
                </div>
                <div class="inquiry-detail-card">
                    <span>Phone</span>
                    <strong>{{ $inquiry->phone ?: 'Not provided' }}</strong>
                </div>
                <div class="inquiry-detail-card">
                    <span>Received</span>
                    <strong>{{ $inquiry->created_at->format('d M Y, h:i A') }}</strong>
                </div>
            </div>

            <div class="inquiry-message-box">
                <h4>Message</h4>
                <p>{!! nl2br(e($inquiry->message)) !!}</p>
            </div>
        </div>

        <div class="admin-side-stack">
            <div class="admin-card">
                <div class="admin-card-head">
                    <div>
                        <small class="admin-card-kicker">Status</small>
                        <h3>Inquiry actions</h3>
                    </div>
                </div>

                <div class="admin-form-actions">
                    @if ($inquiry->is_read)
                        <form action="{{ route('admin.inquiries.mark-unread', $inquiry) }}" method="post">
                            @csrf
                            @patch
                            <button type="submit" class="admin-ghost-link admin-button-reset">Mark as Unread</button>
                        </form>
                    @else
                        <form action="{{ route('admin.inquiries.mark-read', $inquiry) }}" method="post">
                            @csrf
                            @patch
                            <button type="submit" class="admin-primary-link admin-button-reset">Mark as Read</button>
                        </form>
                    @endif
                </div>

                <div class="inquiry-status-note">
                    <p>This inquiry is currently <strong>{{ $inquiry->is_read ? 'read' : 'unread' }}</strong>.</p>
                    @if ($inquiry->read_at)
                        <p>Last opened on {{ $inquiry->read_at->format('d M Y, h:i A') }}.</p>
                    @else
                        <p>It has not been reviewed yet.</p>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script src="{{ asset('js/admin.js') }}"></script>
@endpush