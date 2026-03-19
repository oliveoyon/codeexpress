@extends('layouts.admin')

@section('title', ($formMode === 'create' ? 'Create Portfolio' : 'Edit Portfolio') . ' | CodeExpress Admin')
@section('admin_kicker', 'Portfolio Management')
@section('admin_title', $formMode === 'create' ? 'Create Portfolio' : 'Edit Portfolio')

@php
    $tagLines = old('tags', implode(PHP_EOL, $portfolio->tags ?? []));
    $featureLines = old('key_features', implode(PHP_EOL, $portfolio->key_features ?? []));
    $resultLines = old('results', implode(PHP_EOL, $portfolio->results ?? []));
@endphp

@push('styles')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endpush

@push('topbar_actions')
    <a href="{{ route('admin.portfolios.index') }}" class="admin-ghost-link">Back to Portfolios</a>
@endpush

@section('content')
    <section class="admin-card admin-form-card">
        <div class="admin-card-head">
            <div>
                <small class="admin-card-kicker">World-class portfolio item</small>
                <h3>{{ $formMode === 'create' ? 'Create a product showcase' : 'Refine product details' }}</h3>
            </div>
            <span class="admin-soft-pill">Structured</span>
        </div>

        @if (session('status'))
            <div class="admin-alert success">{{ session('status') }}</div>
        @endif

        @if ($errors->any())
            <div class="admin-alert error"><strong>Please fix the highlighted fields.</strong></div>
        @endif

        <form action="{{ $formMode === 'create' ? route('admin.portfolios.store') : route('admin.portfolios.update', $portfolio) }}" method="post" enctype="multipart/form-data" class="admin-form-grid">
            @csrf
            @if ($formMode === 'edit') @method('PUT') @endif

            <div class="admin-field-grid">
                <div class="admin-field">
                    <label for="title">Title</label>
                    <input id="title" name="title" type="text" value="{{ old('title', $portfolio->title) }}" required>
                    @error('title')<span class="admin-error">{{ $message }}</span>@enderror
                </div>
                <div class="admin-field">
                    <label for="slug">Slug</label>
                    <input id="slug" name="slug" type="text" value="{{ old('slug', $portfolio->slug) }}" placeholder="auto-generated if empty">
                    @error('slug')<span class="admin-error">{{ $message }}</span>@enderror
                </div>
                <div class="admin-field">
                    <label for="category">Category</label>
                    <input id="category" name="category" type="text" value="{{ old('category', $portfolio->category) }}" placeholder="Education Product">
                    @error('category')<span class="admin-error">{{ $message }}</span>@enderror
                </div>
                <div class="admin-field">
                    <label for="icon">Icon Entity</label>
                    <input id="icon" name="icon" type="text" value="{{ old('icon', $portfolio->icon) }}" placeholder="&#9998;">
                    @error('icon')<span class="admin-error">{{ $message }}</span>@enderror
                </div>
                <div class="admin-field admin-field-full">
                    <label for="short_description">Short Description</label>
                    <textarea id="short_description" name="short_description" rows="4">{{ old('short_description', $portfolio->short_description) }}</textarea>
                    @error('short_description')<span class="admin-error">{{ $message }}</span>@enderror
                </div>
                <div class="admin-field admin-field-full">
                    <label for="overview">Overview</label>
                    <textarea id="overview" name="overview" rows="7">{{ old('overview', $portfolio->overview) }}</textarea>
                    @error('overview')<span class="admin-error">{{ $message }}</span>@enderror
                </div>
                <div class="admin-field">
                    <label for="excerpt_note">Excerpt Note</label>
                    <input id="excerpt_note" name="excerpt_note" type="text" value="{{ old('excerpt_note', $portfolio->excerpt_note) }}" placeholder="Built for structured digital learning delivery">
                    @error('excerpt_note')<span class="admin-error">{{ $message }}</span>@enderror
                </div>
                <div class="admin-field">
                    <label for="thumbnail_file">Portfolio Image</label>
                    <input id="thumbnail_file" name="thumbnail_file" type="file" accept="image/*">
                    <small class="admin-field-hint">Upload JPG, PNG, WEBP, AVIF, or GIF up to 5MB.</small>
                    @error('thumbnail_file')<span class="admin-error">{{ $message }}</span>@enderror
                    @error('thumbnail')<span class="admin-error">{{ $message }}</span>@enderror
                </div>
                <div class="admin-field admin-field-full">
                    <label for="thumbnail">Image URL</label>
                    <input id="thumbnail" name="thumbnail" type="url" value="{{ old('thumbnail', $portfolio->thumbnail) }}" placeholder="Optional external image URL">
                    <small class="admin-field-hint">Use this only when you want to keep an external image instead of uploading.</small>
                    @error('thumbnail')<span class="admin-error">{{ $message }}</span>@enderror
                </div>
                @if ($portfolio->thumbnail)
                    <div class="admin-field admin-field-full">
                        <label>Current Image</label>
                        <div class="admin-image-preview-card">
                            <img src="{{ $portfolio->thumbnail }}" alt="{{ $portfolio->thumbnail_alt ?: $portfolio->title }}" class="admin-image-preview">
                        </div>
                    </div>
                @endif
                <div class="admin-field admin-field-full">
                    <label for="thumbnail_alt">Thumbnail Alt Text</label>
                    <input id="thumbnail_alt" name="thumbnail_alt" type="text" value="{{ old('thumbnail_alt', $portfolio->thumbnail_alt) }}">
                    @error('thumbnail_alt')<span class="admin-error">{{ $message }}</span>@enderror
                </div>
                <div class="admin-field">
                    <label for="industry">Industry</label>
                    <input id="industry" name="industry" type="text" value="{{ old('industry', $portfolio->industry) }}">
                    @error('industry')<span class="admin-error">{{ $message }}</span>@enderror
                </div>
                <div class="admin-field">
                    <label for="client_name">Client / Brand</label>
                    <input id="client_name" name="client_name" type="text" value="{{ old('client_name', $portfolio->client_name) }}">
                    @error('client_name')<span class="admin-error">{{ $message }}</span>@enderror
                </div>
                <div class="admin-field">
                    <label for="project_date">Project Date</label>
                    <input id="project_date" name="project_date" type="date" value="{{ old('project_date', optional($portfolio->project_date)->format('Y-m-d')) }}">
                    @error('project_date')<span class="admin-error">{{ $message }}</span>@enderror
                </div>
                <div class="admin-field">
                    <label for="project_url">Project URL</label>
                    <input id="project_url" name="project_url" type="url" value="{{ old('project_url', $portfolio->project_url) }}">
                    @error('project_url')<span class="admin-error">{{ $message }}</span>@enderror
                </div>
                <div class="admin-field">
                    <label for="sort_order">Sort Order</label>
                    <input id="sort_order" name="sort_order" type="number" min="0" value="{{ old('sort_order', $portfolio->sort_order) }}">
                    @error('sort_order')<span class="admin-error">{{ $message }}</span>@enderror
                </div>
                <div class="admin-field admin-field-checks">
                    <label class="admin-check"><input type="checkbox" name="is_published" value="1" {{ old('is_published', $portfolio->is_published) ? 'checked' : '' }}> <span>Published</span></label>
                    <label class="admin-check"><input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $portfolio->is_featured) ? 'checked' : '' }}> <span>Featured</span></label>
                </div>
                <div class="admin-field">
                    <label for="tags">Tags</label>
                    <textarea id="tags" name="tags" rows="5" placeholder="One per line or comma-separated">{{ $tagLines }}</textarea>
                    @error('tags')<span class="admin-error">{{ $message }}</span>@enderror
                </div>
                <div class="admin-field">
                    <label for="key_features">Key Features</label>
                    <textarea id="key_features" name="key_features" rows="5" placeholder="One per line or comma-separated">{{ $featureLines }}</textarea>
                    @error('key_features')<span class="admin-error">{{ $message }}</span>@enderror
                </div>
                <div class="admin-field admin-field-full">
                    <label for="results">Results / Highlights</label>
                    <textarea id="results" name="results" rows="5" placeholder="One per line or comma-separated">{{ $resultLines }}</textarea>
                    @error('results')<span class="admin-error">{{ $message }}</span>@enderror
                </div>
                <div class="admin-field">
                    <label for="seo_title">SEO Title</label>
                    <input id="seo_title" name="seo_title" type="text" value="{{ old('seo_title', $portfolio->seo_title) }}">
                    @error('seo_title')<span class="admin-error">{{ $message }}</span>@enderror
                </div>
                <div class="admin-field">
                    <label for="seo_description">SEO Description</label>
                    <textarea id="seo_description" name="seo_description" rows="4">{{ old('seo_description', $portfolio->seo_description) }}</textarea>
                    @error('seo_description')<span class="admin-error">{{ $message }}</span>@enderror
                </div>
            </div>

            <div class="admin-form-actions">
                <button type="submit" class="admin-primary-link admin-button-reset">{{ $formMode === 'create' ? 'Create Portfolio' : 'Save Changes' }}</button>
            </div>
        </form>

        @if ($formMode === 'edit')
            <form action="{{ route('admin.portfolios.destroy', $portfolio) }}" method="post" onsubmit="return confirm('Delete this portfolio item?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="admin-ghost-link admin-button-reset">Delete Portfolio</button>
            </form>
        @endif
    </section>
@endsection

@push('scripts')
    <script src="{{ asset('js/admin.js') }}"></script>
@endpush
