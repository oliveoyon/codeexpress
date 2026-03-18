<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class InquiryController extends Controller
{
    public function index(): View
    {
        $inquiries = Inquiry::query()
            ->latest()
            ->paginate(12);

        return view('admin.inquiries.index', [
            'inquiries' => $inquiries,
            'unreadCount' => Inquiry::query()->where('is_read', false)->count(),
            'totalCount' => Inquiry::query()->count(),
        ]);
    }

    public function show(Inquiry $inquiry): View
    {
        $inquiry->markAsRead();

        return view('admin.inquiries.show', [
            'inquiry' => $inquiry->fresh(),
        ]);
    }

    public function markUnread(Inquiry $inquiry): RedirectResponse
    {
        $inquiry->markAsUnread();

        return redirect()
            ->route('admin.inquiries.show', $inquiry)
            ->with('status', 'Inquiry marked as unread.');
    }

    public function markRead(Inquiry $inquiry): RedirectResponse
    {
        $inquiry->markAsRead();

        return redirect()
            ->route('admin.inquiries.show', $inquiry)
            ->with('status', 'Inquiry marked as read.');
    }
}