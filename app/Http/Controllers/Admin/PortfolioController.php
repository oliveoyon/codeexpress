<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class PortfolioController extends Controller
{
    public function index(): View
    {
        return view('admin.portfolios.index', [
            'portfolios' => Portfolio::query()->orderBy('sort_order')->latest('id')->paginate(12),
            'publishedCount' => Portfolio::query()->where('is_published', true)->count(),
            'featuredCount' => Portfolio::query()->where('is_featured', true)->count(),
        ]);
    }

    public function create(): View
    {
        return view('admin.portfolios.form', [
            'portfolio' => new Portfolio([
                'icon' => '&#9998;',
                'is_published' => true,
                'is_featured' => false,
                'sort_order' => Portfolio::max('sort_order') + 1,
            ]),
            'formMode' => 'create',
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $portfolio = Portfolio::create($this->validatedData($request));

        return redirect()
            ->route('admin.portfolios.edit', $portfolio)
            ->with('status', 'Portfolio created successfully.');
    }

    public function edit(Portfolio $portfolio): View
    {
        return view('admin.portfolios.form', [
            'portfolio' => $portfolio,
            'formMode' => 'edit',
        ]);
    }

    public function update(Request $request, Portfolio $portfolio): RedirectResponse
    {
        $portfolio->update($this->validatedData($request, $portfolio));

        return redirect()
            ->route('admin.portfolios.edit', $portfolio)
            ->with('status', 'Portfolio updated successfully.');
    }

    public function destroy(Portfolio $portfolio): RedirectResponse
    {
        $this->deleteStoredFile($portfolio->thumbnail);
        $portfolio->delete();

        return redirect()
            ->route('admin.portfolios.index')
            ->with('status', 'Portfolio deleted successfully.');
    }

    protected function validatedData(Request $request, ?Portfolio $portfolio = null): array
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:160'],
            'slug' => ['nullable', 'string', 'max:180', Rule::unique('portfolios', 'slug')->ignore($portfolio?->id)],
            'category' => ['nullable', 'string', 'max:120'],
            'icon' => ['nullable', 'string', 'max:40'],
            'short_description' => ['required', 'string', 'max:500'],
            'excerpt_note' => ['nullable', 'string', 'max:180'],
            'overview' => ['nullable', 'string'],
            'thumbnail' => ['nullable', 'url', 'max:2048'],
            'thumbnail_file' => ['nullable', 'image', 'max:5120'],
            'thumbnail_alt' => ['nullable', 'string', 'max:255'],
            'industry' => ['nullable', 'string', 'max:120'],
            'client_name' => ['nullable', 'string', 'max:160'],
            'project_date' => ['nullable', 'date'],
            'project_url' => ['nullable', 'url', 'max:2048'],
            'tags' => ['nullable', 'string'],
            'key_features' => ['nullable', 'string'],
            'results' => ['nullable', 'string'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_featured' => ['nullable', 'boolean'],
            'is_published' => ['nullable', 'boolean'],
            'seo_title' => ['nullable', 'string', 'max:180'],
            'seo_description' => ['nullable', 'string', 'max:320'],
        ]);

        $validated['slug'] = Str::slug($validated['slug'] ?: $validated['title']);
        $validated['sort_order'] = $validated['sort_order'] ?? 0;
        $validated['is_featured'] = $request->boolean('is_featured');
        $validated['is_published'] = $request->boolean('is_published', true);
        $validated['tags'] = $this->linesToArray($validated['tags'] ?? '');
        $validated['key_features'] = $this->linesToArray($validated['key_features'] ?? '');
        $validated['results'] = $this->linesToArray($validated['results'] ?? '');

        if ($request->hasFile('thumbnail_file')) {
            $this->deleteStoredFile($portfolio?->thumbnail);
            $validated['thumbnail'] = $this->storeImage($request->file('thumbnail_file'), 'portfolio');
        }

        if (blank($validated['thumbnail'] ?? null) && blank($portfolio?->thumbnail)) {
            throw ValidationException::withMessages([
                'thumbnail' => 'A portfolio image is required. Upload one or provide an image URL.',
            ]);
        }

        unset($validated['thumbnail_file']);

        return $validated;
    }

    protected function linesToArray(string $value): array
    {
        return collect(preg_split('/\r\n|\r|\n/', $value))
            ->flatMap(fn ($line) => array_map('trim', explode(',', $line)))
            ->filter()
            ->values()
            ->all();
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
