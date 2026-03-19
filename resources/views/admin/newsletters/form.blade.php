@extends('layouts.admin')

@section('title', ($formMode === 'create' ? 'Create Newsletter Article' : 'Edit Newsletter Article') . ' | CodeExpress Admin')
@section('admin_kicker', 'Newsletter Management')
@section('admin_title', $formMode === 'create' ? 'Create Newsletter' : 'Edit Newsletter')

@push('styles')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endpush

@push('topbar_actions')
    <a href="{{ route('admin.newsletters.index') }}" class="admin-ghost-link">Back to Newsletter</a>
@endpush

@section('content')
    <section class="admin-card admin-form-card">
        <div class="admin-card-head">
            <div>
                <small class="admin-card-kicker">Editorial article</small>
                <h3>{{ $formMode === 'create' ? 'Create newsletter article' : 'Refine newsletter article' }}</h3>
            </div>
            <span class="admin-soft-pill">Structured</span>
        </div>

        @if (session('status'))
            <div class="admin-alert success">{{ session('status') }}</div>
        @endif

        @if ($errors->any())
            <div class="admin-alert error"><strong>Please fix the highlighted fields.</strong></div>
        @endif

        <form action="{{ $formMode === 'create' ? route('admin.newsletters.store') : route('admin.newsletters.update', $newsletter) }}" method="post" enctype="multipart/form-data" class="admin-form-grid">
            @csrf
            @if ($formMode === 'edit') @method('PUT') @endif

            <div class="admin-field-grid">
                <div class="admin-field">
                    <label for="title">Title</label>
                    <input id="title" name="title" type="text" value="{{ old('title', $newsletter->title) }}" required>
                    @error('title')<span class="admin-error">{{ $message }}</span>@enderror
                </div>
                <div class="admin-field">
                    <label for="slug">Slug</label>
                    <input id="slug" name="slug" type="text" value="{{ old('slug', $newsletter->slug) }}" placeholder="auto-generated if empty">
                    @error('slug')<span class="admin-error">{{ $message }}</span>@enderror
                </div>
                <div class="admin-field">
                    <label for="category">Category</label>
                    <input id="category" name="category" type="text" value="{{ old('category', $newsletter->category) }}" placeholder="Product Update">
                    @error('category')<span class="admin-error">{{ $message }}</span>@enderror
                </div>
                <div class="admin-field">
                    <label for="published_at">Published At</label>
                    <input id="published_at" name="published_at" type="date" value="{{ old('published_at', optional($newsletter->published_at)->format('Y-m-d')) }}">
                    @error('published_at')<span class="admin-error">{{ $message }}</span>@enderror
                </div>
                <div class="admin-field admin-field-full">
                    <label for="excerpt">Excerpt</label>
                    <textarea id="excerpt" name="excerpt" rows="4">{{ old('excerpt', $newsletter->excerpt) }}</textarea>
                    @error('excerpt')<span class="admin-error">{{ $message }}</span>@enderror
                </div>
                <div class="admin-field admin-field-full">
                    <label for="content">Content</label>
                    <textarea id="content" name="content" rows="10">{{ old('content', $newsletter->content) }}</textarea>
                    @error('content')<span class="admin-error">{{ $message }}</span>@enderror
                </div>
                <div class="admin-field">
                    <label for="image_file">Article Image</label>
                    <input id="image_file" name="image_file" type="file" accept="image/*">
                    <small class="admin-field-hint">Upload JPG, PNG, WEBP, AVIF, or GIF up to 5MB.</small>
                    @error('image_file')<span class="admin-error">{{ $message }}</span>@enderror
                </div>
                <div class="admin-field admin-field-full">
                    <label for="image">Image URL</label>
                    <input id="image" name="image" type="url" value="{{ old('image', $newsletter->image) }}" placeholder="Optional external image URL">
                    <small class="admin-field-hint">Use this only when you want to keep an external image instead of uploading.</small>
                    @error('image')<span class="admin-error">{{ $message }}</span>@enderror
                </div>
                @if ($newsletter->image)
                    <div class="admin-field admin-field-full">
                        <label>Current Image</label>
                        <div class="admin-image-preview-card">
                            <img src="{{ $newsletter->image }}" alt="{{ $newsletter->image_alt ?: $newsletter->title }}" class="admin-image-preview">
                        </div>
                    </div>
                @endif
                <div class="admin-field">
                    <label for="image_alt">Image Alt Text</label>
                    <input id="image_alt" name="image_alt" type="text" value="{{ old('image_alt', $newsletter->image_alt) }}">
                    @error('image_alt')<span class="admin-error">{{ $message }}</span>@enderror
                </div>
                <div class="admin-field">
                    <label for="sort_order">Sort Order</label>
                    <input id="sort_order" name="sort_order" type="number" min="0" value="{{ old('sort_order', $newsletter->sort_order) }}">
                    @error('sort_order')<span class="admin-error">{{ $message }}</span>@enderror
                </div>
                <div class="admin-field admin-field-checks">
                    <label class="admin-check"><input type="checkbox" name="is_published" value="1" {{ old('is_published', $newsletter->is_published) ? 'checked' : '' }}> <span>Published</span></label>
                </div>
                <div class="admin-field">
                    <label for="seo_title">SEO Title</label>
                    <input id="seo_title" name="seo_title" type="text" value="{{ old('seo_title', $newsletter->seo_title) }}">
                    @error('seo_title')<span class="admin-error">{{ $message }}</span>@enderror
                </div>
                <div class="admin-field">
                    <label for="seo_description">SEO Description</label>
                    <textarea id="seo_description" name="seo_description" rows="4">{{ old('seo_description', $newsletter->seo_description) }}</textarea>
                    @error('seo_description')<span class="admin-error">{{ $message }}</span>@enderror
                </div>
            </div>

            <div class="admin-form-actions">
                <button type="submit" class="admin-primary-link admin-button-reset">{{ $formMode === 'create' ? 'Create Article' : 'Save Changes' }}</button>
            </div>
        </form>

        @if ($formMode === 'edit')
            <form action="{{ route('admin.newsletters.destroy', $newsletter) }}" method="post" onsubmit="return confirm('Delete this newsletter article?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="admin-ghost-link admin-button-reset">Delete Article</button>
            </form>
        @endif
    </section>
@endsection

@push('scripts')
    <script src="{{ asset('js/admin.js') }}"></script>
@endpush
