<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel | CodeExpress')</title>
    <meta name="description" content="@yield('meta_description', 'CodeExpress admin panel for managing website content and settings.')">
    <meta name="theme-color" content="#091f36">
    @stack('styles')
</head>
<body class="admin-body">
    <div class="admin-shell">
        <aside class="admin-sidebar" id="adminSidebar">
            <div class="admin-brand">
                <a href="{{ route('admin.dashboard') }}" class="admin-brand-link">
                    <span class="admin-brand-mark">C</span>
                    <span>
                        <strong>CodeExpress</strong>
                        <small>Admin Console</small>
                    </span>
                </a>
            </div>

            <nav class="admin-nav" aria-label="Admin navigation">
                <a href="{{ route('admin.dashboard') }}" class="admin-nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <span class="admin-nav-icon">&#9635;</span>
                    <span>Dashboard</span>
                </a>
                <a href="{{ route('admin.inquiries.index') }}" class="admin-nav-link {{ request()->routeIs('admin.inquiries.*') ? 'active' : '' }}">
                    <span class="admin-nav-icon">&#9993;</span>
                    <span>Inquiries</span>
                </a>
                <a href="#" class="admin-nav-link">
                    <span class="admin-nav-icon">&#8599;</span>
                    <span>Homepage</span>
                </a>
                <a href="#" class="admin-nav-link">
                    <span class="admin-nav-icon">&#128194;</span>
                    <span>Portfolio</span>
                </a>
                <a href="#" class="admin-nav-link">
                    <span class="admin-nav-icon">&#9998;</span>
                    <span>Newsletter</span>
                </a>
                <a href="{{ route('admin.settings.general.edit') }}" class="admin-nav-link {{ request()->routeIs('admin.settings.general.*') ? 'active' : '' }}">
                    <span class="admin-nav-icon">&#9881;</span>
                    <span>Settings</span>
                </a>
            </nav>

            <div class="admin-sidebar-card">
                <small>Flexible foundation</small>
                <p>This admin shell is ready for Breeze auth, CRUD pages, media uploads, and settings modules.</p>
            </div>
        </aside>

        <div class="admin-main">
            <header class="admin-topbar">
                <div class="admin-topbar-left">
                    <button class="admin-menu-toggle" id="adminMenuToggle" type="button" aria-label="Toggle admin menu" aria-expanded="false">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                    <div>
                        <p class="admin-kicker">@yield('admin_kicker', 'Administration')</p>
                        <h1 class="admin-title">@yield('admin_title', 'Dashboard')</h1>
                    </div>
                </div>

                <div class="admin-topbar-right">
                    <a href="{{ route('home') }}" class="admin-ghost-link">View Site</a>
                    @stack('topbar_actions')
                </div>
            </header>

            <main class="admin-content">
                @yield('content')
            </main>
        </div>
    </div>

    @stack('scripts')
</body>
</html>