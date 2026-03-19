<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use App\Models\Portfolio;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $portfolios = Portfolio::query()
            ->published()
            ->orderBy('sort_order')
            ->latest('id')
            ->take(6)
            ->get();

        $newsletters = Newsletter::query()
            ->published()
            ->orderBy('sort_order')
            ->latest('published_at')
            ->take(3)
            ->get();

        return view('home', [
            'portfolios' => $portfolios,
            'newsletters' => $newsletters,
        ]);
    }
}