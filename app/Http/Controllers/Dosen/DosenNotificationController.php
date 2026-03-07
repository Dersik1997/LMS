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

        // Diperbarui agar menggunakan DosenNotification sesuai dengan tabel Anda
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

        // Ubah data menjadi array agar mudah dibaca (menangani string JSON maupun Object)
        $notifData = is_string($notif->data) ? json_decode($notif->data, true) : (array) $notif->data;

        // 1. JIKA NOTIFIKASI PESAN (Cek apakah ada 'mahasiswa_id')
        if (isset($notifData['mahasiswa_id'])) {
            return redirect()->route('dosen.messages.show', ['mahasiswa' => $notifData['mahasiswa_id']]);
        }

        // 2. JIKA NOTIFIKASI DISKUSI/MATERI (Cek apakah ada 'session_id' atau 'diskusi_id')
        if (isset($notifData['session_id'])) {
            return redirect()->route('dosen.course.session.detail', $notifData['session_id']);
        } elseif (isset($notifData['diskusi_id'])) {
            return redirect()->route('dosen.course.session.detail', $notifData['diskusi_id']);
        }

        // 3. JIKA ADA URL LANGSUNG DARI DATABASE
        if (isset($notifData['url'])) {
            return redirect($notifData['url']);
        }

        // --- DEBUGGING (Hapus tanda // di bawah ini jika masih lari ke dashboard) ---
        // dd("Sistem tidak tahu harus dialihkan ke mana. Isi data notifikasi Anda:", $notifData);

        // Fallback: Jika tidak ada data yang cocok sama sekali
        return redirect()->route('dosen.dashboard');
    }

   
}