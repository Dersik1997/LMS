<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Pantau Ujian | Portal Dosen</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&display=swap" rel="stylesheet" />

    {{-- Auto Refresh Halaman Setiap 30 Detik untuk Pantau Live --}}
    <meta http-equiv="refresh" content="30">

    <style>
        .custom-scrollbar::-webkit-scrollbar { width: 6px; height: 6px; }
        .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background-color: #cbd5e1; border-radius: 20px; }

        @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
        .safe-fade-in { animation: fadeIn 0.4s ease-out forwards; opacity: 0; }
    </style>
</head>

<body class="m-0 font-['Plus_Jakarta_Sans'] bg-slate-50 text-slate-800 antialiased h-[100dvh] flex flex-col overflow-hidden">
    
    {{-- HEADER STICKY RESPONSIVE --}}
    <header class="bg-white/90 backdrop-blur-2xl border-b border-slate-200/60 sticky top-0 z-40 px-3 sm:px-4 md:px-8 py-3 sm:py-4 shadow-sm w-full shrink-0">
        <div class="max-w-7xl mx-auto flex items-center justify-between relative h-10 sm:h-12 md:h-14">
            
            {{-- Tombol Back di Kiri --}}
            <div class="flex items-center gap-2 sm:gap-4 relative z-10 w-auto justify-start shrink-0">
                <a href="{{ route('dosen.exams') }}" class="w-9 h-9 sm:w-11 sm:h-11 md:w-12 md:h-12 rounded-full bg-slate-100 hover:bg-blue-600 text-slate-500 hover:text-white flex items-center justify-center transition-all duration-300 shadow-sm group border border-slate-200 hover:border-blue-600">
                    <svg class="w-4 h-4 sm:w-5 sm:h-5 md:w-6 md:h-6 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path></svg>
                </a>
            </div>

            {{-- Judul di Tengah (Responsive) --}}
            <div class="text-center absolute left-1/2 transform -translate-x-1/2 w-[55%] md:w-full max-w-md z-0 pointer-events-none">
                <h1 class="text-sm sm:text-lg md:text-xl font-black text-slate-900 tracking-tight leading-tight truncate flex items-center justify-center gap-1.5 sm:gap-2 pointer-events-auto">
                    <span class="w-2 h-2 sm:w-2.5 sm:h-2.5 bg-emerald-500 rounded-full animate-pulse"></span>
                    Pantau Live
                </h1>
                <div class="flex items-center justify-center gap-1 sm:gap-2 mt-0.5 sm:mt-1 pointer-events-auto">
                    <span class="text-[8px] sm:text-[9px] md:text-[10px] font-bold text-emerald-700 uppercase tracking-widest bg-emerald-100 px-1.5 sm:px-2 py-0.5 rounded-md truncate max-w-[80px] sm:max-w-none border border-emerald-200">
                        {{ $exam->judul ?? 'Ujian' }}
                    </span>
                    <span class="text-[8px] sm:text-[10px] md:text-[11px] font-bold text-slate-400 uppercase tracking-wider truncate hidden sm:inline">
                        • Kelas {{ $exam->kelas->nama_kelas ?? '-' }} - {{ $exam->kelas->mataKuliah->nama ?? 'Mata Kuliah' }}
                    </span>
                </div>
            </div>

            {{-- Tombol Refresh di Kanan --}}
            <div class="flex items-center relative z-10 w-auto justify-end shrink-0">
                <button onclick="window.location.reload()" class="px-3 sm:px-5 md:px-6 py-2 sm:py-2.5 md:py-3 bg-white border border-slate-200 text-slate-600 font-black rounded-lg sm:rounded-xl text-[9px] sm:text-[10px] md:text-xs uppercase tracking-widest hover:bg-slate-50 transition-all shadow-sm flex items-center gap-1.5 sm:gap-2 transform active:scale-95">
                    <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 md:w-5 md:h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                    <span class="hidden sm:inline">Refresh Data</span>
                    <span class="sm:hidden">Refresh</span>
                </button>
            </div>
        </div>
    </header>

    {{-- KONTEN UTAMA --}}
    <main class="flex-1 overflow-y-auto custom-scrollbar p-3 sm:p-4 md:p-6 lg:p-8 relative bg-slate-50/50 pb-20">
        <div class="w-full max-w-7xl mx-auto space-y-4 sm:space-y-6 safe-fade-in relative z-10">
            
            @php
                // Hitung statistik dinamis dari database
                $totalMengerjakan = $exam->results->where('status', 'mengerjakan')->count();
                $totalSelesai = $exam->results->where('status', 'selesai')->count();
                $totalPeserta = $exam->results->count();
            @endphp

            {{-- Statistik Pemantauan (Grid) --}}
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 sm:gap-4 md:gap-6 mb-6 sm:mb-8">
                
                <div class="bg-white p-4 sm:p-5 md:p-6 rounded-xl sm:rounded-[1.5rem] border border-slate-200 shadow-sm flex items-center gap-4 sm:gap-5">
                    <div class="w-12 h-12 sm:w-14 sm:h-14 bg-blue-50 text-blue-600 rounded-xl sm:rounded-2xl flex items-center justify-center shrink-0">
                        <svg class="w-6 h-6 sm:w-7 sm:h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    </div>
                    <div>
                        <p class="text-[9px] sm:text-[10px] font-black text-slate-500 uppercase tracking-widest">Total Peserta</p>
                        <h3 class="text-2xl sm:text-3xl font-black text-slate-800 mt-0.5 sm:mt-1">{{ $totalPeserta }}</h3>
                    </div>
                </div>
                
                <div class="bg-white p-4 sm:p-5 md:p-6 rounded-xl sm:rounded-[1.5rem] border border-slate-200 shadow-sm flex items-center gap-4 sm:gap-5">
                    <div class="w-12 h-12 sm:w-14 sm:h-14 bg-emerald-50 text-emerald-600 rounded-xl sm:rounded-2xl flex items-center justify-center shrink-0">
                        <svg class="w-6 h-6 sm:w-7 sm:h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                    </div>
                    <div>
                        <p class="text-[9px] sm:text-[10px] font-black text-emerald-600/70 uppercase tracking-widest">Sedang Berjalan</p>
                        <h3 class="text-2xl sm:text-3xl font-black text-emerald-700 mt-0.5 sm:mt-1">{{ $totalMengerjakan }}</h3>
                    </div>
                </div>
                
                <div class="bg-white p-4 sm:p-5 md:p-6 rounded-xl sm:rounded-[1.5rem] border border-slate-200 shadow-sm flex items-center gap-4 sm:gap-5">
                    <div class="w-12 h-12 sm:w-14 sm:h-14 bg-slate-100 text-slate-600 rounded-xl sm:rounded-2xl flex items-center justify-center shrink-0">
                        <svg class="w-6 h-6 sm:w-7 sm:h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <div>
                        <p class="text-[9px] sm:text-[10px] font-black text-slate-500 uppercase tracking-widest">Sudah Selesai</p>
                        <h3 class="text-2xl sm:text-3xl font-black text-slate-800 mt-0.5 sm:mt-1">{{ $totalSelesai }}</h3>
                    </div>
                </div>

            </div>

            {{-- Tabel Peserta --}}
            <div class="bg-white rounded-xl sm:rounded-[1.5rem] border border-slate-200 shadow-sm overflow-hidden">
                <div class="p-4 sm:p-5 md:p-6 border-b border-slate-100 bg-slate-50/50 flex flex-col sm:flex-row sm:items-center justify-between gap-2 sm:gap-4">
                    <h3 class="font-black text-slate-800 text-sm sm:text-base">Status Peserta Ujian</h3>
                    <span class="text-[10px] sm:text-xs font-bold text-slate-500 text-left sm:text-right flex items-center gap-1.5">
                        <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        Refresh otomatis 30 detik
                    </span>
                </div>
                
                {{-- Wrapper Overflow untuk Tabel agar bisa digeser di HP --}}
                <div class="overflow-x-auto custom-scrollbar w-full">
                    <table class="w-full text-left border-collapse min-w-[500px]">
                        <thead>
                            <tr class="bg-white border-b border-slate-100 text-[9px] sm:text-[10px] uppercase tracking-widest text-slate-400 font-black whitespace-nowrap">
                                <th class="p-3 sm:p-4 pl-4 sm:pl-6">Mahasiswa</th>
                                <th class="p-3 sm:p-4">Waktu Mulai</th>
                                <th class="p-3 sm:p-4">Status</th>
                                <th class="p-3 sm:p-4 text-center pr-4 sm:pr-6">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- LOOPING DATA DARI DATABASE --}}
                            @forelse($exam->results as $result)
                                <tr class="border-b border-slate-50 hover:bg-slate-50 transition-colors">
                                    <td class="p-3 sm:p-4 pl-4 sm:pl-6">
                                        <div class="font-bold text-slate-800 text-xs sm:text-sm truncate max-w-[150px] sm:max-w-none">{{ $result->mahasiswa->nama ?? 'Nama Tidak Ditemukan' }}</div>
                                        <div class="text-[9px] sm:text-[10px] font-bold text-slate-400 mt-0.5">NIM: {{ $result->mahasiswa->nim ?? '-' }}</div>
                                    </td>
                                    <td class="p-3 sm:p-4 text-xs sm:text-sm font-medium text-slate-600 whitespace-nowrap">
                                        {{ $result->waktu_mulai ? \Carbon\Carbon::parse($result->waktu_mulai)->format('H:i') . ' WIB' : '-' }}
                                    </td>
                                    <td class="p-3 sm:p-4 whitespace-nowrap">
                                        @if($result->status == 'mengerjakan')
                                            <span class="px-2.5 sm:px-3 py-1 bg-emerald-100 text-emerald-700 text-[9px] sm:text-[10px] font-bold rounded-full border border-emerald-200 animate-pulse">Sedang Mengerjakan</span>
                                        @else
                                            <span class="px-2.5 sm:px-3 py-1 bg-slate-100 text-slate-700 text-[9px] sm:text-[10px] font-bold rounded-full border border-slate-200">Selesai</span>
                                        @endif
                                    </td>
                                    <td class="p-3 sm:p-4 text-center text-[10px] sm:text-xs font-bold text-slate-500 pr-4 sm:pr-6 whitespace-nowrap">
                                        @if($result->status == 'selesai')
                                            Waktu Submit: {{ \Carbon\Carbon::parse($result->waktu_selesai)->format('H:i') }}
                                        @else
                                            Menunggu Submit...
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="p-8 sm:p-12 text-center text-slate-500 font-medium">
                                        <div class="text-sm">Belum ada mahasiswa yang masuk ke ujian ini.</div>
                                        <div class="text-[10px] sm:text-xs opacity-70 mt-1">(Data otomatis muncul saat mahasiswa memasukkan token)</div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </main>
    <script defer src="https://accessibility-widget.pages.dev/js/app.js"></script>
</body>
</html>