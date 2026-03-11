<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use App\Models\DosenNotification;
use Illuminate\Support\Facades\Auth;

class DosenNotificationController extends Controller
{
    public function index()
    {
        $dosenId = Auth::guard('dosen')->id();

        $notifications = DosenNotification::where('dosen_id', $dosenId)
            ->latest()
            ->get();

        return view('dosen_notifications', compact('notifications'));
    }

    public function markAllRead()
    {
        $dosenId = Auth::guard('dosen')->id();

        DosenNotification::where('dosen_id', $dosenId)
            ->update(['is_read' => true]);

        return back()->with('success', 'Semua pemberitahuan ditandai telah dibaca.');
    }

    // Fungsi untuk menangani klik pada satu notifikasi
    public function read($id)
    {
        // Cari notifikasi berdasarkan ID
        $notif = DosenNotification::findOrFail($id);

        // Tandai sudah dibaca jika notifikasi ini milik dosen yang sedang login
        if ($notif->dosen_id === Auth::guard('dosen')->id()) {
            $notif->update(['is_read' => true]);
        }

        // [PERBAIKAN] Langsung cek ke kolom URL, jika ada isinya langsung redirect!
        if (!empty($notif->url)) {
            return redirect($notif->url);
        }

        // Fallback: Jika URL benar-benar kosong (misal data lama)
        return redirect()->route('dosen.dashboard');
    }
}