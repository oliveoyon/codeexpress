<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use Illuminate\Contracts\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $unreadInquiries = Inquiry::query()->where('is_read', false)->count();
        $totalInquiries = Inquiry::query()->count();

        return view('admin.dashboard', [
            'stats' => [
                ['label' => 'Unread Inquiries', 'value' => str_pad((string) $unreadInquiries, 2, '0', STR_PAD_LEFT), 'tone' => 'orange'],
                ['label' => 'Total Inquiries', 'value' => str_pad((string) $totalInquiries, 2, '0', STR_PAD_LEFT), 'tone' => 'blue'],
                ['label' => 'Portfolio Items', 'value' => '06', 'tone' => 'green'],
                ['label' => 'Newsletter Posts', 'value' => '03', 'tone' => 'purple'],
            ],
            'sections' => [
                [
                    'name' => 'Contact Inquiries',
                    'description' => 'Review customer messages, monitor unread items, and manage follow-up status.',
                    'status' => $unreadInquiries > 0 ? $unreadInquiries . ' unread' : 'Clear',
                    'href' => route('admin.inquiries.index'),
                ],
                [
                    'name' => 'Homepage Sections',
                    'description' => 'Manage hero, services, portfolio previews, process, and footer content.',
                    'status' => 'Ready',
                ],
                [
                    'name' => 'Portfolio Listing',
                    'description' => 'Prepare dedicated portfolio records, categories, and preview media.',
                    'status' => 'Planned',
                ],
                [
                    'name' => 'Newsletter Listing',
                    'description' => 'Organize article cards, publish states, and future subscription flow.',
                    'status' => 'Planned',
                ],
                [
                    'name' => 'Site Settings',
                    'description' => 'Control contact details, navigation labels, SEO defaults, and branding.',
                    'status' => 'Ready',
                    'href' => route('admin.settings.general.edit'),
                ],
            ],
            'quickLinks' => [
                ['label' => 'View Inquiries', 'href' => route('admin.inquiries.index')],
                ['label' => 'General Settings', 'href' => route('admin.settings.general.edit')],
                ['label' => 'Manage Portfolio', 'href' => '#'],
                ['label' => 'Manage Newsletter', 'href' => '#'],
                ['label' => 'Open Live Site', 'href' => route('home')],
            ],
            'activity' => [
                ['title' => $unreadInquiries > 0 ? $unreadInquiries . ' inquiry messages are waiting for review' : 'Inquiry inbox is clear right now', 'time' => 'Live status'],
                ['title' => 'Homepage template connected to Laravel views', 'time' => 'Just now'],
                ['title' => 'Admin shell prepared for Breeze auth', 'time' => 'Today'],
            ],
        ]);
    }
}