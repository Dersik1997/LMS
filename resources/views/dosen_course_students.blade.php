<!DOCTYPE html>
<html lang="id" class="h-full">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Peserta Kelas | Portal Dosen</title>
    
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&display=swap" rel="stylesheet" />
    
    <style>
        /* KUNCI UTAMA HILANGKAN GARIS SCROLL & ANTI-GESER KANAN (SAMA DENGAN MASTER) */
        html, body { 
            max-width: 100vw; 
            overflow-x: hidden; 
            scrollbar-width: none; 
            -ms-overflow-style: none; 
        }
        
        html::-webkit-scrollbar, body::-webkit-scrollbar { 
            display: none; 
        }
        
        html { scroll-behavior: smooth; }

        .scrollbar-hide::-webkit-scrollbar { display: none; }
        .scrollbar-hide { -ms-overflow-style: none; scrollbar-width: none; }

        /* Custom Scrollbar HANYA untuk area di dalam tabel/konten */
        .custom-scrollbar::-webkit-scrollbar { width: 5px; height: 5px; display: block; }
        .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background-color: #cbd5e1; border-radius: 20px; }
        .custom-scrollbar::-webkit-scrollbar-thumb:hover { background-color: #94a3b8; }
        
        input[type="number"] { -moz-appearance: textfield; }
        input[type="number"]::-webkit-outer-spin-button, input[type="number"]::-webkit-inner-spin-button { -webkit-appearance: none; margin: 0; }
        
        /* Animasi Notifikasi Alert (Toast) */
        @keyframes slideInRight { from { transform: translateX(100%); opacity: 0; } to { transform: translateX(0); opacity: 1; } }
        @keyframes slideOutRight { from { transform: translateX(0); opacity: 1; } to { transform: translateX(100%); opacity: 0; } }
        .toast-enter { animation: slideInRight 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards; }
        .toast-leave { animation: slideOutRight 0.4s ease-in forwards; }
    </style>
</head>

{{-- overflow-y-scroll TETAP DIPERTAHANKAN agar halaman tidak geser/lompat saat pindah tab --}}
<body class="m-0 font-['Plus_Jakarta_Sans'] bg-[#f1f5f9] text-slate-800 min-h-[100dvh] flex flex-col border-box overflow-x-hidden overflow-y-scroll selection:bg-blue-200 relative">
    
    {{-- AREA NOTIFIKASI / ALERT MELAYANG (TOAST) --}}
    <div id="toast-container" class="fixed top-5 left-0 right-0 mx-auto md:left-auto md:right-8 z-[110] flex flex-col gap-3 w-[90%] md:w-auto max-w-sm pointer-events-none">
        @if(session('success'))
        <div id="toast-success" class="toast-enter pointer-events-auto flex items-center p-4 text-emerald-800 bg-white border border-emerald-200 rounded-2xl shadow-xl shadow-emerald-100/50" role="alert">
            <div class="inline-flex items-center justify-center shrink-0 w-10 h-10 text-emerald-500 bg-emerald-100 rounded-xl">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                </svg>
            </div>
            <div class="ml-3 mr-4 text-sm font-bold leading-tight">{{ session('success') }}</div>
            <button type="button" onclick="this.parentElement.remove()" class="ml-auto -mx-1.5 -my-1.5 bg-white text-slate-400 rounded-lg focus:ring-2 focus:ring-slate-300 p-1.5 hover:bg-slate-100 inline-flex items-center justify-center h-8 w-8 transition-colors">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/></svg>
            </button>
        </div>
        @endif

        @if(session('error') || $errors->any())
        <div id="toast-error" class="toast-enter pointer-events-auto flex items-center p-4 text-red-800 bg-white border border-red-200 rounded-2xl shadow-xl shadow-red-100/50" role="alert">
            <div class="inline-flex items-center justify-center shrink-0 w-10 h-10 text-red-500 bg-red-100 rounded-xl">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z"/>
                </svg>
            </div>
            <div class="ml-3 mr-4 text-sm font-bold leading-tight">
                {{ session('error') ?? $errors->first() ?? 'Terdapat kesalahan.' }}
            </div>
            <button type="button" onclick="this.parentElement.remove()" class="ml-auto -mx-1.5 -my-1.5 bg-white text-slate-400 rounded-lg focus:ring-2 focus:ring-slate-300 p-1.5 hover:bg-slate-100 inline-flex items-center justify-center h-8 w-8 transition-colors">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/></svg>
            </button>
        </div>
        @endif
    </div>

    <main class="flex-1 flex flex-col relative w-full">
        
        {{-- ============================================================== --}}
        {{-- HEADER / NAVBAR (SUDAH 100% SAMA DENGAN MASTER TEMPLATE)       --}}
        {{-- ============================================================== --}}
        <div class="bg-white/90 backdrop-blur-2xl border-b border-slate-200/60 sticky top-0 z-40 px-4 md:px-8 py-3 md:py-4 shadow-sm transition-all w-full shrink-0">
            <div class="max-w-7xl mx-auto flex flex-col md:flex-row md:items-center md:justify-between gap-4 md:gap-5 w-full">
                
                {{-- Kiri: Tombol Back & Info Mata Kuliah --}}
                <div class="flex items-center justify-start gap-3 md:gap-4 shrink-0 w-full md:w-auto">
                    <a href="{{ route('dosen.courses') }}" class="w-10 h-10 md:w-12 md:h-12 rounded-full bg-slate-100 hover:bg-blue-600 text-slate-500 hover:text-white flex items-center justify-center transition-all shadow-sm shrink-0 group active:scale-95">
                        <svg class="w-5 h-5 md:w-6 md:h-6 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path>
                        </svg>
                    </a>
                    
                    <div class="flex flex-col flex-1 min-w-0">
                        <h1 title="{{ $kelas->mataKuliah->nama ?? 'Nama Mata Kuliah' }}" class="text-sm sm:text-lg md:text-2xl font-extrabold text-slate-900 tracking-tight leading-tight truncate">
                            {{ $kelas->mataKuliah->nama ?? 'Nama Mata Kuliah' }}
                        </h1>
                        <div class="flex flex-wrap sm:flex-nowrap items-center gap-1.5 sm:gap-2 mt-1">
                            <span class="text-[8px] md:text-[10px] font-black text-blue-700 uppercase tracking-widest bg-blue-100 px-1.5 md:px-2.5 py-0.5 md:py-1 rounded-md shrink-0">
                                Kelas {{ $kelas->nama_kelas ?? 'Reguler' }} - {{ $kelas->kode_kelas ?? '-' }}
                            </span>
                            <span class="hidden sm:inline text-slate-300">•</span>
                            <span class="text-[8px] md:text-[11px] font-bold text-slate-400 uppercase tracking-wider truncate">
                                Dosen: {{ auth('dosen')->user()->nama ?? auth()->user()->nama ?? 'Dosen' }}
                            </span>
                        </div>
                    </div>
                </div>

                <div class="hidden md:block w-px h-10 bg-slate-200"></div>

                {{-- Kanan: Menu Tab Sub-Navigasi (Scrollable di Mobile) --}}
                <nav id="scroll-nav-container" class="w-full md:w-auto flex p-1.5 bg-slate-100/80 rounded-xl md:rounded-2xl overflow-x-auto scrollbar-hide snap-x gap-2 border border-slate-200/50 mt-2 md:mt-0">
                    <a href="{{ route('dosen.course.manage', $kelas->id) }}" class="snap-start shrink-0 px-4 md:px-6 py-2 md:py-2.5 rounded-lg md:rounded-xl text-slate-500 hover:text-slate-900 font-bold text-[9px] md:text-[10px] uppercase tracking-widest transition-all whitespace-nowrap hover:bg-white/60 flex items-center justify-center">
                        Materi & Modul
                    </a>
                    <a href="{{ route('dosen.attendance.index', $kelas->id) }}" class="snap-start shrink-0 px-4 md:px-6 py-2 md:py-2.5 rounded-lg md:rounded-xl text-slate-500 hover:text-slate-900 font-bold text-[9px] md:text-[10px] uppercase tracking-widest transition-all whitespace-nowrap hover:bg-white/60 flex items-center justify-center">
                        Absensi
                    </a>
                    <a href="{{ route('dosen.course.assignments', $kelas->id) }}" class="snap-start shrink-0 px-4 md:px-6 py-2 md:py-2.5 rounded-lg md:rounded-xl text-slate-500 hover:text-slate-900 font-bold text-[9px] md:text-[10px] uppercase tracking-widest transition-all whitespace-nowrap hover:bg-white/60 flex items-center justify-center">
                        Penugasan
                    </a>
                    
                    {{-- TAB AKTIF: PESERTA --}}
                    <button id="active-nav-tab" class="snap-start shrink-0 px-4 md:px-6 py-2 md:py-2.5 rounded-lg md:rounded-xl bg-white text-blue-700 font-black text-[9px] md:text-[10px] uppercase tracking-widest shadow-sm border border-slate-200/60 whitespace-nowrap transition-all flex items-center justify-center cursor-default">
                        Peserta
                    </button>
                    
                    <a href="{{ route('dosen.grades.recap', $kelas->id) }}" class="snap-start shrink-0 px-4 md:px-6 py-2 md:py-2.5 rounded-lg md:rounded-xl text-slate-500 hover:text-slate-900 font-bold text-[9px] md:text-[10px] uppercase tracking-widest transition-all whitespace-nowrap hover:bg-white/60 flex items-center justify-center">
                        Rekap Nilai
                    </a>
                </nav>
            </div>
        </div>

        {{-- KONTEN BAWAH --}}
        <div class="max-w-7xl mx-auto w-full p-4 md:p-8 space-y-6 md:space-y-8 pb-24 relative">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 md:gap-8">
                
                {{-- KOLOM KIRI (Informasi Akses & Form Tambah) --}}
                <div class="space-y-6">
                    
                    {{-- Card Kode Akses --}}
                    <div class="bg-gradient-to-br from-blue-600 to-indigo-700 rounded-[2rem] md:rounded-[2.5rem] p-6 md:p-8 text-white shadow-lg shadow-blue-200 flex flex-col justify-between relative overflow-hidden min-h-[220px] md:min-h-[256px]" data-aos="fade-up" data-aos-delay="100">
                        <div class="relative z-10">
                            <div class="flex items-center gap-2 md:gap-3 mb-3 md:mb-4 text-blue-200">
                                <svg class="w-5 h-5 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z"></path>
                                </svg>
                                <span class="text-[10px] md:text-xs font-black uppercase tracking-widest">Cara Cepat</span>
                            </div>
                            <h3 class="text-xl md:text-2xl font-black mb-2 md:mb-2">
                                Kode Akses Kelas
                            </h3>
                            <div class="bg-white/10 border border-white/20 rounded-xl md:rounded-2xl p-4 text-center backdrop-blur-md mt-4">
                                <span class="block text-2xl sm:text-3xl md:text-4xl font-black tracking-widest font-mono">
                                    {{ $kelas->kode_akses }}
                                </span>
                            </div>
                        </div>
                        <div class="relative z-10 mt-4 flex gap-3">
                            <button onclick="copyKodeAkses(event)" class="flex-1 py-3 bg-white text-blue-600 rounded-xl font-bold text-[10px] md:text-xs uppercase tracking-widest hover:bg-blue-50 transition-all shadow-sm active:scale-95 border border-transparent">
                                Salin Kode
                            </button>
                        </div>
                        <div class="absolute -right-10 -bottom-10 w-40 h-40 bg-white/10 rounded-full blur-3xl pointer-events-none"></div>
                    </div>

                    {{-- Form Tambah Mahasiswa Manual --}}
                    <div class="bg-white p-6 rounded-[2rem] md:rounded-[2.5rem] border border-slate-200 shadow-sm" data-aos="fade-up" data-aos-delay="200">
                        <h3 class="text-[11px] md:text-sm font-black text-slate-900 uppercase tracking-widest mb-4">
                            Tambah Manual
                        </h3>
                        <form method="POST" action="{{ route('dosen.course.addStudent', $kelas->id) }}" class="flex gap-2 w-full">
                            @csrf
                            <input type="text" name="nim" placeholder="Masukkan NIM..." class="flex-1 min-w-0 bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-xs md:text-sm font-bold focus:ring-2 focus:ring-blue-400 outline-none w-full placeholder-slate-400" required />
                            <button type="submit" class="bg-slate-900 text-white w-11 h-11 md:w-12 md:h-12 shrink-0 rounded-xl hover:bg-blue-600 transition-all flex items-center justify-center font-bold text-lg md:text-xl active:scale-95 shadow-sm border border-transparent">
                                +
                            </button>
                        </form>
                    </div>
                </div>

                {{-- KOLOM KANAN (Tabel Mahasiswa) --}}
                <div class="lg:col-span-2" data-aos="fade-up" data-aos-delay="150">
                    <div class="bg-white rounded-[2rem] md:rounded-[2.5rem] border border-slate-200 shadow-sm overflow-hidden h-full flex flex-col w-full">
                        
                        {{-- Header Tabel --}}
                        <div class="p-5 md:p-6 border-b border-slate-100 flex justify-between items-center bg-slate-50/50 shrink-0">
                            <h3 class="font-black text-sm md:text-base text-slate-800">
                                Daftar Mahasiswa ({{ $kelas->mahasiswa->count() }})
                            </h3>
                        </div>

                        {{-- Wrapper Tabel dengan Horizontal Scroll agar layar tak membesar --}}
                        <div class="overflow-x-auto overflow-y-auto max-h-[500px] md:max-h-[600px] custom-scrollbar w-full relative">
                            <table class="w-full text-left whitespace-nowrap md:whitespace-normal min-w-[500px]">
                                <thead class="bg-slate-50/80 backdrop-blur-sm text-slate-500 uppercase tracking-widest text-[9px] md:text-[10px] sticky top-0 z-10 shadow-[0_1px_2px_rgba(0,0,0,0.02)] border-b border-slate-100">
                                    <tr>
                                        <th class="px-5 py-3 md:px-6 md:py-4 font-black">Mahasiswa</th>
                                        <th class="px-5 py-3 md:px-6 md:py-4 font-black">NIM</th>
                                        <th class="px-5 py-3 md:px-6 md:py-4 font-black text-center">Status</th>
                                        <th class="px-5 py-3 md:px-6 md:py-4 font-black text-right">Aksi</th>
                                    </tr>
                                </thead>

                                <tbody class="divide-y divide-slate-100 text-xs md:text-sm">
                                    @forelse($kelas->mahasiswa as $mhs)
                                    <tr class="hover:bg-blue-50/50 transition-colors group">
                                        <td class="px-5 py-3 md:px-6 md:py-4">
                                            <div class="flex items-center gap-3">
                                                <div class="w-8 h-8 md:w-10 md:h-10 rounded-full bg-slate-200 overflow-hidden shrink-0 border border-slate-100">
                                                    <img
                                                        src="{{ $mhs->foto ? asset('storage/'.$mhs->foto) : 'https://ui-avatars.com/api/?name='.urlencode($mhs->nama).'&background=0D8ABC&color=fff' }}"
                                                        class="w-full h-full object-cover"
                                                    />
                                                </div>
                                                <span class="font-bold text-slate-900 truncate max-w-[150px] sm:max-w-xs md:max-w-none">
                                                    {{ $mhs->nama }}
                                                </span>
                                            </div>
                                        </td>
                                        <td class="px-5 py-3 md:px-6 md:py-4 font-mono text-slate-500 font-bold">
                                            {{ $mhs->nim }}
                                        </td>
                                        <td class="px-5 py-3 md:px-6 md:py-4 text-center">
                                            <span class="px-2.5 py-1 bg-emerald-50 text-emerald-600 rounded-md text-[9px] md:text-[10px] font-black uppercase tracking-widest border border-emerald-100">
                                                {{ $mhs->status ?? 'Aktif' }}
                                            </span>
                                        </td>
                                        <td class="px-5 py-3 md:px-6 md:py-4 text-right">
                                            <form method="POST" action="{{ route('dosen.course.removeStudent', [$kelas->id, $mhs->id]) }}" onsubmit="return confirm('Hapus mahasiswa ini dari kelas?');">
                                                @csrf
                                                @method('DELETE')
                                                <button class="text-slate-400 hover:text-red-600 transition-colors font-bold text-[10px] md:text-xs px-2.5 py-1.5 md:p-2 hover:bg-red-50 rounded-lg active:scale-95 border border-transparent hover:border-red-100 cursor-pointer">
                                                    Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="4" class="text-center py-12 md:py-16 text-slate-400">
                                            <div class="flex flex-col items-center justify-center">
                                                <div class="w-12 h-12 md:w-16 md:h-16 bg-slate-50 text-slate-300 rounded-full flex items-center justify-center mb-3 border border-slate-100">
                                                    <svg class="w-6 h-6 md:w-8 md:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                                                </div>
                                                <span class="text-[10px] md:text-xs font-bold uppercase tracking-widest">Belum ada mahasiswa</span>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({ once: true, easing: 'ease-out-cubic', duration: 800 });

        // LOGIKA AUTO-SCROLL NAVBAR SECARA INSTAN
        document.addEventListener("DOMContentLoaded", function() {
            const navContainer = document.getElementById('scroll-nav-container');
            const activeTab = document.getElementById('active-nav-tab');
            
            if (navContainer && activeTab) {
                // Menggeser scroll menu tab secara otomatis ke item yang aktif
                const scrollPosition = activeTab.offsetLeft - (navContainer.clientWidth / 2) + (activeTab.clientWidth / 2);
                navContainer.scrollLeft = scrollPosition; 
            }
        });

        function copyKodeAkses(event) {
            const kode = "{{ $kelas->kode_akses }}";
            navigator.clipboard.writeText(kode);

            const btn = event.target;
            const originalText = btn.innerText;
            btn.innerText = "Tersalin!";
            btn.classList.add('bg-blue-50', 'text-blue-700', 'border-blue-200');

            setTimeout(() => {
                btn.innerText = originalText;
                btn.classList.remove('bg-blue-50', 'text-blue-700', 'border-blue-200');
            }, 2000);
        }

        function closeToast(id) {
            const toast = document.getElementById(id);
            if(toast) {
                toast.classList.remove('toast-enter');
                toast.classList.add('toast-leave');
                setTimeout(() => toast.remove(), 400);
            }
        }

        document.addEventListener("DOMContentLoaded", function() {
            setTimeout(() => closeToast('toast-success'), 4000);
            setTimeout(() => closeToast('toast-error'), 4000);
        });
    </script>
<script defer src="https://accessibility-widget.pages.dev/js/app.js"></script>
</body>
</html>