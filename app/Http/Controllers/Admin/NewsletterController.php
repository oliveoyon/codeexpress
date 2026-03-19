<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Newsletter;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class NewsletterController extends Controller
{
    public function index(): View
    {
        return view('admin.newsletters.index', [
            'newsletters' => Newsletter::query()->orderBy('sort_order')->latest('published_at')->paginate(12),
            'publishedCount' => Newsletter::query()->where('is_published', true)->count(),
        ]);
    }

    public function create(): View
    {
        return view('admin.newsletters.form', [
            'newsletter' => new Newsletter([
                'is_published' => true,
                'sort_order' => Newsletter::max('sort_order') + 1,
                'published_at' => now(),
            ]),
            'formMode' => 'create',
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $newsletter = Newsletter::create($this->validatedData($request));

        return redirect()
            ->route('admin.newsletters.edit', $newsletter)
            ->with('status', 'Newsletter article created successfully.');
    }

    public function edit(Newsletter $newsletter): View
    {
        return view('admin.newsletters.form', [
            'newsletter' => $newsletter,
            'formMode' => 'edit',
        ]);
    }

    public function update(Request $request, Newsletter $newsletter): RedirectResponse
    {
        $newsletter->update($this->validatedData($request, $newsletter));

        return redirect()
            ->route('admin.newsletters.edit', $newsletter)
            ->with('status', 'Newsletter article updated successfully.');
    }

    public function destroy(Newsletter $newsletter): RedirectResponse
    {
        $this->deleteStoredFile($newsletter->image);
        $newsletter->delete();

        return redirect()
            ->route('admin.newsletters.index')
            ->with('status', 'Newsletter article deleted successfully.');
    }

    protected function validatedData(Request $request, ?Newsletter $newsletter = null): array
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:180'],
            'slug' => ['nullable', 'string', 'max:200', Rule::unique('newsletters', 'slug')->ignore($newsletter?->id)],
            'category' => ['nullable', 'string', 'max:120'],
            'excerpt' => ['required', 'string', 'max:500'],
            'content' => ['nullable', 'string'],
            'image' => ['nullable', 'url', 'max:2048'],
            'image_file' => ['nullable', 'image', 'max:5120'],
            'image_alt' => ['nullable', 'string', 'max:255'],
            'published_at' => ['nullable', 'date'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_published' => ['nullable', 'boolean'],
            'seo_title' => ['nullable', 'string', 'max:180'],
            'seo_description' => ['nullable', 'string', 'max:320'],
        ]);

        $validated['slug'] = Str::slug($validated['slug'] ?: $validated['title']);
        $validated['sort_order'] = $validated['sort_order'] ?? 0;
        $validated['is_published'] = $request->boolean('is_published', true);
        $validated['published_at'] = $validated['published_at'] ?? now();

        if ($request->hasFile('image_file')) {
            $this->deleteStoredFile($newsletter?->image);
            $validated['image'] = $this->storeImage($request->file('image_file'), 'newsletter');
        }

        unset($validated['image_file']);

        return $validated;
    }

    protected function storeImage($file, string $directory): string
    {
        $path = $file->store($directory, 'public');

        return Storage::url($path);
    }

    protected function deleteStoredFile(?string $url): void
    {
        if (!$this->isLocalStorageUrl($url)) {
            return;
        }

        $path = Str::after($url, '/storage/');

        if ($path !== '' && Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
    }

    protected function isLocalStorageUrl(?string $url): bool
    {
        return filled($url) && Str::startsWith($url, '/storage/');
    }
}
