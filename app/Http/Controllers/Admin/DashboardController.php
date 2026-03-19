<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GeneralSetting;
use App\Models\Inquiry;
use App\Models\Newsletter;
use App\Models\Portfolio;
use Illuminate\Contracts\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $generalSetting = GeneralSetting::current();
        $unreadInquiries = Inquiry::query()->where('is_read', false)->count();
        $totalInquiries = Inquiry::query()->count();
        $portfolioCount = Portfolio::query()->where('is_published', true)->count();
        $newsletterCount = Newsletter::query()->where('is_published', true)->count();

        $recentPortfolios = Portfolio::query()
            ->orderBy('sort_order')
            ->latest('updated_at')
            ->take(3)
            ->get(['title', 'slug', 'is_published', 'updated_at']);

        $recentNewsletters = Newsletter::query()
            ->latest('published_at')
            ->take(3)
            ->get(['title', 'slug', 'is_published', 'published_at']);

        $latestInquiries = Inquiry::query()
            ->latest()
            ->take(4)
            ->get(['id', 'name', 'subject', 'is_read', 'created_at']);

        $siteChecklist = [
            [
                'label' => 'Branding',
                'value' => $generalSetting->site_name ?: 'Missing',
                'state' => $generalSetting->site_name ? 'good' : 'warn',
            ],
            [
                'label' => 'Contact Email',
                'value' => $generalSetting->email ?: 'Not set',
                'state' => $generalSetting->email ? 'good' : 'warn',
            ],
            [
                'label' => 'Phone',
                'value' => $generalSetting->phone ?: 'Not set',
                'state' => $generalSetting->phone ? 'good' : 'warn',
            ],
            [
                'label' => 'Social Links',
                'value' => collect([$generalSetting->facebook, $generalSetting->linkedin, $generalSetting->instagram, $generalSetting->youtube])->filter()->count() . ' connected',
                'state' => collect([$generalSetting->facebook, $generalSetting->linkedin, $generalSetting->instagram, $generalSetting->youtube])->filter()->isNotEmpty() ? 'good' : 'warn',
            ],
        ];

        return view('admin.dashboard', [
            'stats' => [
                ['label' => 'Unread Inquiries', 'value' => str_pad((string) $unreadInquiries, 2, '0', STR_PAD_LEFT), 'tone' => 'orange'],
                ['label' => 'Portfolio Live', 'value' => str_pad((string) $portfolioCount, 2, '0', STR_PAD_LEFT), 'tone' => 'blue'],
                ['label' => 'Newsletter Live', 'value' => str_pad((string) $newsletterCount, 2, '0', STR_PAD_LEFT), 'tone' => 'green'],
                ['label' => 'Total Messages', 'value' => str_pad((string) $totalInquiries, 2, '0', STR_PAD_LEFT), 'tone' => 'purple'],
            ],
            'modules' => [
                [
                    'name' => 'Portfolio',
                    'description' => 'Manage product showcases, listing cards, and detail pages.',
                    'count' => $portfolioCount,
                    'status' => 'Active',
                    'href' => route('admin.portfolios.index'),
                    'action' => 'Manage Portfolio',
                ],
                [
                    'name' => 'Newsletter',
                    'description' => 'Manage article previews, publishing dates, and detail pages.',
                    'count' => $newsletterCount,
                    'status' => 'Active',
                    'href' => route('admin.newsletters.index'),
                    'action' => 'Manage Newsletter',
                ],
                [
                    'name' => 'Inquiries',
                    'description' => 'Track incoming contact submissions and follow-up status.',
                    'count' => $totalInquiries,
                    'status' => $unreadInquiries > 0 ? $unreadInquiries . ' unread' : 'Clear',
                    'href' => route('admin.inquiries.index'),
                    'action' => 'Open Inbox',
                ],
                [
                    'name' => 'Site Settings',
                    'description' => 'Control contact details, branding, and global site information.',
                    'count' => null,
                    'status' => 'Configured',
                    'href' => route('admin.settings.general.edit'),
                    'action' => 'Open Settings',
                ],
            ],
            'quickLinks' => [
                ['label' => 'Create Portfolio', 'href' => route('admin.portfolios.create')],
                ['label' => 'Create Newsletter', 'href' => route('admin.newsletters.create')],
                ['label' => 'Open Inbox', 'href' => route('admin.inquiries.index')],
                ['label' => 'General Settings', 'href' => route('admin.settings.general.edit')],
                ['label' => 'Open Live Site', 'href' => route('home')],
            ],
            'recentPortfolios' => $recentPortfolios,
            'recentNewsletters' => $recentNewsletters,
            'latestInquiries' => $latestInquiries,
            'siteChecklist' => $siteChecklist,
        ]);
    }
}