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
            <span class="admin-badge">Live control center</span>
            <h2>Manage portfolio, newsletter, inquiries, and site settings from one operational dashboard.</h2>
            <p>
                This dashboard now reflects your actual modules and recent records, so you can see what is live,
                what needs attention, and where to continue editing next.
            </p>
        </div>

        <div class="admin-hero-panel">
            <small>Admin focus</small>
            <ul>
                <li>Review unread inquiries and respond faster.</li>
                <li>Keep portfolio and newsletter records current.</li>
                <li>Maintain contact, branding, and public site readiness.</li>
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
                    <small class="admin-card-kicker">Modules</small>
                    <h3>Management areas</h3>
                </div>
                <span class="admin-soft-pill">Operational</span>
            </div>

            <div class="module-list">
                @foreach ($modules as $module)
                    <article class="module-item">
                        <div>
                            <h4>{{ $module['name'] }}</h4>
                            <p>{{ $module['description'] }}</p>
                        </div>
                        <div class="module-actions">
                            <span class="module-status">{{ $module['status'] }}</span>
                            @if (!is_null($module['count']))
                                <span class="dashboard-count">{{ str_pad((string) $module['count'], 2, '0', STR_PAD_LEFT) }}</span>
                            @endif
                            <a href="{{ $module['href'] }}" class="module-link">{{ $module['action'] }}</a>
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
                        <small class="admin-card-kicker">Site Status</small>
                        <h3>Readiness</h3>
                    </div>
                </div>

                <div class="check-list">
                    @foreach ($siteChecklist as $item)
                        <article class="check-item {{ $item['state'] }}">
                            <div>
                                <h4>{{ $item['label'] }}</h4>
                                <p>{{ $item['value'] }}</p>
                            </div>
                            <span class="check-dot"></span>
                        </article>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="admin-grid admin-grid-main">
        <div class="admin-card">
            <div class="admin-card-head">
                <div>
                    <small class="admin-card-kicker">Recent Content</small>
                    <h3>Latest portfolio and newsletter updates</h3>
                </div>
            </div>

            <div class="dashboard-split-list">
                <div>
                    <h4 class="dashboard-section-title">Portfolio</h4>
                    <div class="activity-list">
                        @forelse ($recentPortfolios as $portfolio)
                            <article class="activity-item">
                                <span class="activity-dot"></span>
                                <div>
                                    <h4>{{ $portfolio->title }}</h4>
                                    <p>{{ $portfolio->is_published ? 'Published' : 'Draft' }} � Updated {{ $portfolio->updated_at->diffForHumans() }}</p>
                                </div>
                            </article>
                        @empty
                            <article class="activity-item">
                                <span class="activity-dot"></span>
                                <div>
                                    <h4>No portfolio items yet</h4>
                                    <p>Create your first portfolio record.</p>
                                </div>
                            </article>
                        @endforelse
                    </div>
                </div>

                <div>
                    <h4 class="dashboard-section-title">Newsletter</h4>
                    <div class="activity-list">
                        @forelse ($recentNewsletters as $newsletter)
                            <article class="activity-item">
                                <span class="activity-dot"></span>
                                <div>
                                    <h4>{{ $newsletter->title }}</h4>
                                    <p>{{ $newsletter->is_published ? 'Published' : 'Draft' }} � {{ optional($newsletter->published_at)->format('d M Y') ?: 'No date' }}</p>
                                </div>
                            </article>
                        @empty
                            <article class="activity-item">
                                <span class="activity-dot"></span>
                                <div>
                                    <h4>No newsletter articles yet</h4>
                                    <p>Create your first article.</p>
                                </div>
                            </article>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

        <div class="admin-card">
            <div class="admin-card-head">
                <div>
                    <small class="admin-card-kicker">Inbox Preview</small>
                    <h3>Latest inquiries</h3>
                </div>
            </div>

            <div class="activity-list">
                @forelse ($latestInquiries as $inquiry)
                    <article class="activity-item">
                        <span class="activity-dot"></span>
                        <div>
                            <h4>{{ $inquiry->subject }}</h4>
                            <p>{{ $inquiry->name }} � {{ $inquiry->is_read ? 'Read' : 'Unread' }} � {{ $inquiry->created_at->diffForHumans() }}</p>
                        </div>
                    </article>
                @empty
                    <article class="activity-item">
                        <span class="activity-dot"></span>
                        <div>
                            <h4>No inquiries yet</h4>
                            <p>Incoming contact messages will appear here.</p>
                        </div>
                    </article>
                @endforelse
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script src="{{ asset('js/admin.js') }}"></script>
@endpush