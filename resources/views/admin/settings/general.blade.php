@extends('layouts.admin')

@section('title', 'General Settings | CodeExpress Admin')
@section('admin_kicker', 'Site Settings')
@section('admin_title', 'General Settings')

@push('styles')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endpush

@push('topbar_actions')
    <a href="{{ route('home') }}" class="admin-primary-link">View Homepage</a>
@endpush

@section('content')
    <section class="admin-card admin-form-card">
        <div class="admin-card-head">
            <div>
                <small class="admin-card-kicker">Single source of truth</small>
                <h3>Branding and contact information</h3>
            </div>
            <span class="admin-soft-pill">Dynamic</span>
        </div>

        @if (session('status'))
            <div class="admin-alert success">{{ session('status') }}</div>
        @endif

        @if ($errors->any())
            <div class="admin-alert error">
                <strong>Please fix the highlighted fields.</strong>
            </div>
        @endif

        <form action="{{ route('admin.settings.general.update') }}" method="post" class="admin-form-grid">
            @csrf
            @method('PUT')

            <div class="admin-field-grid">
                <div class="admin-field">
                    <label for="site_name">Site Name</label>
                    <input id="site_name" name="site_name" type="text" value="{{ old('site_name', $setting->site_name) }}" required>
                    @error('site_name')<span class="admin-error">{{ $message }}</span>@enderror
                </div>

                <div class="admin-field">
                    <label for="logo">Logo URL</label>
                    <input id="logo" name="logo" type="text" value="{{ old('logo', $setting->logo) }}" placeholder="https://example.com/logo.png">
                    @error('logo')<span class="admin-error">{{ $message }}</span>@enderror
                </div>

                <div class="admin-field admin-field-full">
                    <label for="tagline">Tagline</label>
                    <input id="tagline" name="tagline" type="text" value="{{ old('tagline', $setting->tagline) }}" placeholder="Short brand line or footer summary">
                    @error('tagline')<span class="admin-error">{{ $message }}</span>@enderror
                </div>

                <div class="admin-field">
                    <label for="email">Email</label>
                    <input id="email" name="email" type="email" value="{{ old('email', $setting->email) }}">
                    @error('email')<span class="admin-error">{{ $message }}</span>@enderror
                </div>

                <div class="admin-field">
                    <label for="phone">Phone</label>
                    <input id="phone" name="phone" type="text" value="{{ old('phone', $setting->phone) }}">
                    @error('phone')<span class="admin-error">{{ $message }}</span>@enderror
                </div>

                <div class="admin-field admin-field-full">
                    <label for="address">Address</label>
                    <textarea id="address" name="address" rows="4">{{ old('address', $setting->address) }}</textarea>
                    @error('address')<span class="admin-error">{{ $message }}</span>@enderror
                </div>

                <div class="admin-field">
                    <label for="facebook">Facebook URL</label>
                    <input id="facebook" name="facebook" type="url" value="{{ old('facebook', $setting->facebook) }}">
                    @error('facebook')<span class="admin-error">{{ $message }}</span>@enderror
                </div>

                <div class="admin-field">
                    <label for="linkedin">LinkedIn URL</label>
                    <input id="linkedin" name="linkedin" type="url" value="{{ old('linkedin', $setting->linkedin) }}">
                    @error('linkedin')<span class="admin-error">{{ $message }}</span>@enderror
                </div>

                <div class="admin-field">
                    <label for="instagram">Instagram URL</label>
                    <input id="instagram" name="instagram" type="url" value="{{ old('instagram', $setting->instagram) }}">
                    @error('instagram')<span class="admin-error">{{ $message }}</span>@enderror
                </div>

                <div class="admin-field">
                    <label for="youtube">YouTube URL</label>
                    <input id="youtube" name="youtube" type="url" value="{{ old('youtube', $setting->youtube) }}">
                    @error('youtube')<span class="admin-error">{{ $message }}</span>@enderror
                </div>
            </div>

            <div class="admin-form-actions">
                <button type="submit" class="admin-primary-link admin-button-reset">Save Settings</button>
                <a href="{{ route('admin.dashboard') }}" class="admin-ghost-link">Back to Dashboard</a>
            </div>
        </form>
    </section>
@endsection

@push('scripts')
    <script src="{{ asset('js/admin.js') }}"></script>
@endpush
