<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', $generalSetting?->site_name ?? config('app.name', 'CodeExpress'))</title>
    <meta name="description" content="@yield('meta_description', 'CodeExpress delivers scalable, secure, and high-performance software solutions for organizations worldwide.')">
    <meta name="theme-color" content="@yield('theme_color', '#0A2540')">
    @stack('styles')
</head>
<body>
    @php
        $isHomePage = request()->routeIs('home');
        $homeLink = route('home');
        $siteLogo = file_exists(public_path('logo.png')) ? asset('logo.png') : $generalSetting?->logo;
    @endphp

    <header class="site-header">
        <div class="container nav">
            <a href="{{ $isHomePage ? '#home' : $homeLink }}" class="brand">
                @if($siteLogo)
                    <img src="{{ $siteLogo }}" alt="{{ $generalSetting?->site_name ?? 'CodeExpress' }}" class="brand-logo">
                @else
                    <span class="brand-mark">{{ strtoupper(substr($generalSetting?->site_name ?? 'C', 0, 1)) }}</span>
                    <span>{{ $generalSetting?->site_name ?? 'CodeExpress' }}</span>
                @endif
            </a>

            <nav class="nav-links" aria-label="Primary navigation">
                <a href="{{ $isHomePage ? '#about' : $homeLink . '#about' }}">About</a>
                <a href="{{ $isHomePage ? '#services' : $homeLink . '#services' }}">Services</a>
                <a href="{{ $isHomePage ? '#portfolio' : route('portfolio.index') }}">Portfolio</a>
                <a href="{{ $isHomePage ? '#why' : $homeLink . '#why' }}">Why Us</a>
                <a href="{{ $isHomePage ? '#technology' : $homeLink . '#technology' }}">Technology</a>
                <a href="{{ $isHomePage ? '#newsletter' : route('newsletter.index') }}">Newsletter</a>
                <a href="{{ $isHomePage ? '#contact' : $homeLink . '#contact' }}">Contact</a>
            </nav>

            <div class="nav-cta">
                <a href="{{ $isHomePage ? '#contact' : $homeLink . '#contact' }}" class="btn btn-primary desktop-only">Start a Conversation</a>
                <button class="mobile-toggle" id="mobileToggle" aria-label="Open menu" aria-expanded="false">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
        </div>

        <div class="nav-menu container" id="mobileMenu">
            <div class="nav-links">
                <a href="{{ $isHomePage ? '#about' : $homeLink . '#about' }}">About</a>
                <a href="{{ $isHomePage ? '#services' : $homeLink . '#services' }}">Services</a>
                <a href="{{ $isHomePage ? '#portfolio' : route('portfolio.index') }}">Portfolio</a>
                <a href="{{ $isHomePage ? '#why' : $homeLink . '#why' }}">Why Us</a>
                <a href="{{ $isHomePage ? '#technology' : $homeLink . '#technology' }}">Technology</a>
                <a href="{{ $isHomePage ? '#newsletter' : route('newsletter.index') }}">Newsletter</a>
                <a href="{{ $isHomePage ? '#contact' : $homeLink . '#contact' }}">Contact</a>
            </div>
            <div class="nav-cta">
                <a href="{{ $isHomePage ? '#contact' : $homeLink . '#contact' }}" class="btn btn-primary">Start a Conversation</a>
            </div>
        </div>
    </header>

    @yield('content')

    <footer class="site-footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-left">
                    <div class="footer-brand">
                        @if($siteLogo)
                            <img src="{{ $siteLogo }}" alt="{{ $generalSetting?->site_name ?? 'CodeExpress' }}" class="footer-brand-logo">
                        @else
                            <span class="footer-brand-mark">{{ strtoupper(substr($generalSetting?->site_name ?? 'C', 0, 1)) }}</span>
                            <span>{{ $generalSetting?->site_name ?? 'CodeExpress' }}</span>
                        @endif
                    </div>
                    <p class="footer-copy">
                        {{ $generalSetting?->tagline ?: 'Scalable software platforms, operational systems, and digital products designed for modern organizations that need clarity, reliability, and momentum.' }}
                    </p>
                    <div class="footer-contact">
                        @if($generalSetting?->email)
                            <span class="footer-contact-item">{{ $generalSetting->email }}</span>
                        @endif
                        @if($generalSetting?->phone)
                            <span class="footer-contact-item">{{ $generalSetting->phone }}</span>
                        @endif
                        @if($generalSetting?->address)
                            <span class="footer-contact-item">{{ $generalSetting->address }}</span>
                        @endif
                    </div>
                </div>

                <div class="footer-right">
                    <div class="footer-subscribe">
                        <h3>Subscribe to Newsletter</h3>
                        <form class="footer-subscribe-form" action="#" method="post">
                            <input type="email" name="newsletter_email" placeholder="Enter your email" aria-label="Email address">
                            <button type="submit" class="btn btn-primary">Subscribe</button>
                        </form>
                    </div>

                    <div class="footer-nav">
                        <a href="{{ $isHomePage ? '#about' : $homeLink . '#about' }}">About</a>
                        <a href="{{ $isHomePage ? '#services' : $homeLink . '#services' }}">Services</a>
                        <a href="{{ $isHomePage ? '#portfolio' : route('portfolio.index') }}">Portfolio</a>
                        <a href="{{ $isHomePage ? '#why' : $homeLink . '#why' }}">Why Us</a>
                        <a href="{{ $isHomePage ? '#technology' : $homeLink . '#technology' }}">Technology</a>
                        <a href="{{ $isHomePage ? '#newsletter' : route('newsletter.index') }}">Newsletter</a>
                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <div class="footer-bottom-left">
                    <div class="footer-social">
                        <a href="{{ $generalSetting?->facebook ?: 'https://facebook.com' }}" target="_blank" rel="noopener noreferrer" aria-label="Facebook">
                            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M13.5 22v-8.1h2.7l.4-3.2h-3.1V8.6c0-.9.3-1.6 1.7-1.6H16.7V4.1c-.3 0-1.2-.1-2.3-.1-2.3 0-3.9 1.4-3.9 4v2.2H8v3.2h2.5V22h3Z"/></svg>
                        </a>
                        <a href="{{ $generalSetting?->linkedin ?: 'https://linkedin.com' }}" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn">
                            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M6.9 8.5A1.9 1.9 0 1 1 6.9 4.7a1.9 1.9 0 0 1 0 3.8ZM5.3 9.9H8.5V20H5.3V9.9Zm5.1 0h3.1v1.4h.1c.4-.8 1.5-1.7 3.1-1.7 3.3 0 3.9 2.1 3.9 4.9V20h-3.2v-4.8c0-1.1 0-2.6-1.6-2.6s-1.8 1.2-1.8 2.5V20h-3.2V9.9Z"/></svg>
                        </a>
                        <a href="{{ $generalSetting?->instagram ?: 'https://instagram.com' }}" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
                            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 7.3A4.7 4.7 0 1 0 12 16.7 4.7 4.7 0 0 0 12 7.3Zm0 7.7A3 3 0 1 1 12 9a3 3 0 0 1 0 6Zm6-7.9a1.1 1.1 0 1 1-2.1 0 1.1 1.1 0 0 1 2.1 0ZM21 8.2c-.1-1.6-.4-3-1.6-4.2C18.2 2.8 16.8 2.5 15.2 2.4 13.5 2.3 10.5 2.3 8.8 2.4 7.2 2.5 5.8 2.8 4.6 4 3.4 5.2 3.1 6.6 3 8.2c-.1 1.7-.1 5.9 0 7.6.1 1.6.4 3 1.6 4.2 1.2 1.2 2.6 1.5 4.2 1.6 1.7.1 4.7.1 6.4 0 1.6-.1 3-.4 4.2-1.6 1.2-1.2 1.5-2.6 1.6-4.2.1-1.7.1-5.9 0-7.6Zm-2 9.2c-.1 1-.3 1.6-.7 2-.4.4-1 .6-2 .7-1.4.1-5.7.1-7.1 0-1-.1-1.6-.3-2-.7-.4-.4-.6-1-.7-2-.1-1.4-.1-5.7 0-7.1.1-1 .3-1.6.7-2 .4-.4 1-.6 2-.7 1.4-.1 5.7-.1 7.1 0 1 .1 1.6.3 2 .7.4.4.6 1 .7 2 .1 1.4.1 5.7 0 7.1Z"/></svg>
                        </a>
                        <a href="{{ $generalSetting?->youtube ?: 'https://youtube.com' }}" target="_blank" rel="noopener noreferrer" aria-label="YouTube">
                            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M21.6 7.2a2.9 2.9 0 0 0-2-2C17.8 4.7 12 4.7 12 4.7s-5.8 0-7.6.5a2.9 2.9 0 0 0-2 2A30.3 30.3 0 0 0 2 12a30.3 30.3 0 0 0 .4 4.8 2.9 2.9 0 0 0 2 2c1.8.5 7.6.5 7.6.5s5.8 0 7.6-.5a2.9 2.9 0 0 0 2-2A30.3 30.3 0 0 0 22 12a30.3 30.3 0 0 0-.4-4.8ZM10.1 15.1V8.9L15.5 12l-5.4 3.1Z"/></svg>
                        </a>
                    </div>
                </div>
                <div class="footer-bottom-center">
                    <a href="{{ $isHomePage ? '#home' : $homeLink }}" class="footer-top-link" aria-label="Back to top">
                        <span>Top</span>
                        <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 5.8 5.8 12l1.4 1.4 3.8-3.8V19h2V9.6l3.8 3.8 1.4-1.4L12 5.8Z"/></svg>
                    </a>
                </div>
                <div class="footer-bottom-right">
                    <span class="footer-meta">&copy; 2026 {{ $generalSetting?->site_name ?? 'CodeExpress' }}. All rights reserved.</span>
                </div>
            </div>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>
