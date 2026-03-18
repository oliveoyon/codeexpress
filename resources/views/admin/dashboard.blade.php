@extends('layouts.admin')

@section('title', 'Admin Dashboard | CodeExpress')
@section('admin_kicker', 'Website Management')
@section('admin_title', 'Admin Dashboard')

@push('styles')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endpush

@push('topbar_actions')
    <a href="{{ route('admin.settings.general.edit') }}" class="admin-primary-link">Open Settings</a>
@endpush

@section('content')
    <section class="admin-hero">
        <div>
            <span class="admin-badge">Dynamic admin foundation</span>
            <h2>Manage content, structure, and future site modules from one place.</h2>
            <p>
                This panel is designed as a flexible base for homepage content, portfolio items,
                newsletter posts, settings, and future dynamic modules.
            </p>
        </div>

        <div class="admin-hero-panel">
            <small>Next steps</small>
            <ul>
                <li>Connect homepage sections to database-backed content blocks.</li>
                <li>Add CRUD screens for portfolio and newsletter modules.</li>
                <li>Extend site settings with media uploads and SEO fields.</li>
            </ul>
        </div>
    </section>

    <section class="admin-grid admin-grid-stats">
        @foreach ($stats as $stat)
            <article class="stat-card stat-card-{{ $stat['tone'] }}">
                <span>{{ $stat['label'] }}</span>
                <strong>{{ $stat['value'] }}</strong>
            </article>
        @endforeach
    </section>

    <section class="admin-grid admin-grid-main">
        <div class="admin-card">
            <div class="admin-card-head">
                <div>
                    <small class="admin-card-kicker">Control Center</small>
                    <h3>Content modules</h3>
                </div>
                <span class="admin-soft-pill">Scalable</span>
            </div>

            <div class="module-list">
                @foreach ($sections as $section)
                    <article class="module-item">
                        <div>
                            <h4>{{ $section['name'] }}</h4>
                            <p>{{ $section['description'] }}</p>
                        </div>
                        <div class="module-actions">
                            <span class="module-status">{{ $section['status'] }}</span>
                            @if (!empty($section['href']))
                                <a href="{{ $section['href'] }}" class="module-link">Open</a>
                            @endif
                        </div>
                    </article>
                @endforeach
            </div>
        </div>

        <div class="admin-side-stack">
            <div class="admin-card">
                <div class="admin-card-head">
                    <div>
                        <small class="admin-card-kicker">Quick Access</small>
                        <h3>Shortcuts</h3>
                    </div>
                </div>

                <div class="quick-links">
                    @foreach ($quickLinks as $link)
                        <a href="{{ $link['href'] }}" class="quick-link">{{ $link['label'] }}</a>
                    @endforeach
                </div>
            </div>

            <div class="admin-card">
                <div class="admin-card-head">
                    <div>
                        <small class="admin-card-kicker">Recent Activity</small>
                        <h3>Latest setup</h3>
                    </div>
                </div>

                <div class="activity-list">
                    @foreach ($activity as $item)
                        <article class="activity-item">
                            <span class="activity-dot"></span>
                            <div>
                                <h4>{{ $item['title'] }}</h4>
                                <p>{{ $item['time'] }}</p>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script src="{{ asset('js/admin.js') }}"></script>
@endpush
