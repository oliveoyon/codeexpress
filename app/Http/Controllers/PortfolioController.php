<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Contracts\View\View;

class PortfolioController extends Controller
{
    public function index(): View
    {
        $portfolios = Portfolio::query()
            ->published()
            ->orderBy('sort_order')
            ->latest('id')
            ->paginate(9);

        return view('portfolios.index', [
            'portfolios' => $portfolios,
        ]);
    }

    public function show(Portfolio $portfolio): View
    {
        abort_unless($portfolio->is_published, 404);

        $relatedPortfolios = Portfolio::query()
            ->published()
            ->whereKeyNot($portfolio->getKey())
            ->orderBy('sort_order')
            ->latest('id')
            ->take(3)
            ->get();

        return view('portfolios.show', [
            'portfolio' => $portfolio,
            'relatedPortfolios' => $relatedPortfolios,
        ]);
    }
}