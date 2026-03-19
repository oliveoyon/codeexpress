<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use Illuminate\Contracts\View\View;

class NewsletterController extends Controller
{
    public function index(): View
    {
        $newsletters = Newsletter::query()
            ->published()
            ->orderBy('sort_order')
            ->latest('published_at')
            ->paginate(9);

        return view('newsletters.index', [
            'newsletters' => $newsletters,
        ]);
    }

    public function show(Newsletter $newsletter): View
    {
        abort_unless($newsletter->is_published, 404);

        $relatedNewsletters = Newsletter::query()
            ->published()
            ->whereKeyNot($newsletter->getKey())
            ->orderBy('sort_order')
            ->latest('published_at')
            ->take(3)
            ->get();

        return view('newsletters.show', [
            'newsletter' => $newsletter,
            'relatedNewsletters' => $relatedNewsletters,
        ]);
    }
}