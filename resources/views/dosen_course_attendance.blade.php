<!DOCTYPE html>
<html lang="id" class="h-full">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>Kelola Absensi | Portal Dosen</title>
        
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&display=swap" rel="stylesheet" />
        
        <style>
            /* KUNCI UTAMA HILANGKAN GARIS SCROLL & ANTI-GESER KANAN */
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

            /* Custom Scrollbar HANYA untuk area di dalam halaman */
            .custom-scrollbar::-webkit-scrollbar { width: 5px; height: 5px; display: block; }
            .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
            .custom-scrollbar::-webkit-scrollbar-thumb { background-color: #cbd5e1; border-radius: 20px; }
            .custom-scrollbar::-webkit-scrollbar-thumb:hover { background-color: #94a3b8; }
            
            /* Animasi Notifikasi Alert */
            @keyframes slideInRight { from { transform: translateX(100%); opacity: 0; } to { transform: translateX(0); opacity: 1; } }
            @keyframes slideOutRight { from { transform: translateX(0); opacity: 1; } to { transform: translateX(100%); opacity: 0; } }
            .toast-enter { animation: slideInRight 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards; }
            .toast-leave { animation: slideOutRight 0.4s ease-in forwards; }
        </style>
    </head>
    <body class="m-0 font-['Plus_Jakarta_Sans'] bg-[#f1f5f9] text-slate-800 min-h-[100dvh] flex flex-col border-box overflow-x-hidden selection:bg-blue-200 relative">
        
        {{-- AREA NOTIFIKASI / ALERT (Z-INDEX NAIK JADI 110 AGAR PALING ATAS) --}}
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
                    {{ session('error') ?? $errors->first() }}
                </div>
                <button type="button" onclick="this.parentElement.remove()" class="ml-auto -mx-1.5 -my-1.5 bg-white text-slate-400 rounded-lg focus:ring-2 focus:ring-slate-300 p-1.5 hover:bg-slate-100 inline-flex items-center justify-center h-8 w-8 transition-colors">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/></svg>
                </button>
            </div>
            @endif
        </div>

        <main class="flex-1 flex flex-col relative w-full">
            
            {{-- HEADER / NAVBAR (SUDAH 100% SAMA DENGAN MASTER TEMPLATE) --}}
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
                            <h1 title="{{ $kelas->mataKuliah->nama }}" class="text-sm sm:text-lg md:text-2xl font-extrabold text-slate-900 tracking-tight leading-tight truncate">
                                {{ $kelas->mataKuliah->nama }}
                            </h1>
                            <div class="flex flex-wrap sm:flex-nowrap items-center gap-1.5 sm:gap-2 mt-1">
                                <span class="text-[8px] md:text-[10px] font-black text-blue-700 uppercase tracking-widest bg-blue-100 px-1.5 md:px-2.5 py-0.5 md:py-1 rounded-md shrink-0">
                                    Kelas {{ $kelas->nama_kelas ?? 'Reguler' }} - {{ $kelas->kode_kelas }}
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
                        
                        {{-- TAB AKTIF: ABSENSI --}}
                        <button id="active-nav-tab" class="snap-start shrink-0 px-4 md:px-6 py-2 md:py-2.5 rounded-lg md:rounded-xl bg-white text-blue-700 font-black text-[9px] md:text-[10px] uppercase tracking-widest shadow-sm border border-slate-200/60 whitespace-nowrap transition-all flex items-center justify-center cursor-default">
                            Absensi
                        </button>
                        
                        <a href="{{ route('dosen.course.assignments', $kelas->id) }}" class="snap-start shrink-0 px-4 md:px-6 py-2 md:py-2.5 rounded-lg md:rounded-xl text-slate-500 hover:text-slate-900 font-bold text-[9px] md:text-[10px] uppercase tracking-widest transition-all whitespace-nowrap hover:bg-white/60 flex items-center justify-center">
                            Penugasan
                        </a>
                        <a href="{{ route('dosen.course.students', $kelas->id) }}" class="snap-start shrink-0 px-4 md:px-6 py-2 md:py-2.5 rounded-lg md:rounded-xl text-slate-500 hover:text-slate-900 font-bold text-[9px] md:text-[10px] uppercase tracking-widest transition-all whitespace-nowrap hover:bg-white/60 flex items-center justify-center">
                            Peserta
                        </a>
                        <a href="{{ route('dosen.grades.recap', $kelas->id) }}" class="snap-start shrink-0 px-4 md:px-6 py-2 md:py-2.5 rounded-lg md:rounded-xl text-slate-500 hover:text-slate-900 font-bold text-[9px] md:text-[10px] uppercase tracking-widest transition-all whitespace-nowrap hover:bg-white/60 flex items-center justify-center">
                            Rekap Nilai
                        </a>
                    </nav>
                </div>
            </div>

            {{-- KONTEN BAWAH (KELOLA ABSENSI) --}}
            <div class="max-w-7xl mx-auto w-full p-4 md:p-8 space-y-6 md:space-y-8 pb-24 relative">
                
                {{-- HERO SECTION (SESI AKTIF) --}}
                <div class="bg-gradient-to-br from-blue-600 to-indigo-700 rounded-[2rem] md:rounded-[2.5rem] p-6 md:p-10 text-white shadow-lg shadow-blue-200 relative overflow-hidden" data-aos="fade-up" data-aos-duration="600">
                    <div class="relative z-10 flex flex-col md:flex-row justify-between items-start md:items-center gap-5 md:gap-6">
                        
                        <div class="w-full md:w-auto text-left">
                            @if ($todaySession)
                                <span class="inline-block px-4 py-1.5 bg-white/20 rounded-xl text-[10px] font-black uppercase tracking-widest mb-3 backdrop-blur-md border border-white/20 shadow-sm">
                                    Sedang Berlangsung • Pertemuan {{ $todaySession->pertemuan ?? $todaySession->urutan }}
                                </span>
                                <h2 class="text-3xl md:text-4xl font-black mb-2 tracking-tight leading-tight">
                                    {{ $todaySession->judul }}
                                </h2>
                                <p class="text-blue-100 font-medium text-xs md:text-sm">
                                    {{ $todaySession->tanggal ? \Carbon\Carbon::parse($todaySession->tanggal)->translatedFormat('l, d F Y') : 'Hari Ini' }}
                                </p>
                            @else
                                <span class="inline-block px-4 py-1.5 bg-white/20 rounded-xl text-[10px] font-black uppercase tracking-widest mb-3 backdrop-blur-md border border-white/20 shadow-sm">
                                    Informasi Absensi
                                </span>
                                <h2 class="text-3xl md:text-4xl font-black mb-2 tracking-tight opacity-50">—</h2>
                                <p class="text-blue-100 font-medium text-xs md:text-sm">
                                    Tidak ada pertemuan aktif untuk hari ini.
                                </p>
                            @endif
                        </div>

                        <div class="w-full md:w-auto mt-2 md:mt-0 flex justify-start md:justify-end">
                            @if ($todaySession)
                                <a href="{{ route('dosen.attendance.manual', $todaySession->id) }}" class="w-full md:w-auto bg-slate-900 text-white px-6 py-4 rounded-2xl font-black text-[11px] uppercase tracking-widest hover:bg-slate-800 transition-transform transform hover:-translate-y-0.5 shadow-lg flex items-center justify-center active:scale-95 gap-2 border border-transparent">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                    Input Absensi Manual
                                </a>
                            @else
                                <button disabled class="w-full md:w-auto bg-slate-800 text-white px-6 py-4 rounded-2xl font-black text-[11px] uppercase tracking-widest shadow-lg flex items-center justify-center cursor-not-allowed opacity-50 border border-slate-700 gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8V7a4 4 0 00-8 0v4h8z"></path></svg>
                                    Belum Ada Sesi
                                </button>
                            @endif
                        </div>
                    </div>

                    <div class="absolute -right-10 -bottom-10 w-48 md:w-64 h-48 md:h-64 bg-white/10 rounded-full blur-2xl md:blur-3xl pointer-events-none"></div>
                    <div class="absolute -left-10 -top-10 w-32 md:w-40 h-32 md:h-40 bg-blue-400/20 rounded-full blur-xl md:blur-2xl pointer-events-none"></div>
                </div>

                {{-- RIWAYAT ABSENSI --}}
                <div class="space-y-4 md:space-y-6 pt-2 md:pt-4">
                    <div class="flex items-center justify-between px-2" data-aos="fade-right" data-aos-duration="600">
                        <div>
                            <h3 class="text-xl md:text-2xl font-black text-slate-900 tracking-tight">Riwayat Absensi</h3>
                            <p class="text-[10px] md:text-xs font-bold text-slate-400 mt-1">Daftar presensi untuk sesi pertemuan yang telah berlalu.</p>
                        </div>
                    </div>

                    <div class="space-y-4">
                        @forelse($riwayat as $session)
                            @php
                                $hadir = $session->attendances()->where('status', 'hadir')->count() ?? 0;
                                $total = $totalMahasiswa ?? 0;
                                $isPerfect = ($total > 0 && $hadir == $total);
                            @endphp

                            <a href="{{ route('dosen.attendance.history', $session->id) }}" 
                               data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}"
                               class="block bg-white border border-slate-200 rounded-[1.5rem] md:rounded-[2rem] p-5 md:p-6 hover:shadow-xl hover:border-blue-300 hover:-translate-y-1 transition-all duration-300 group relative overflow-hidden active:scale-[0.98]">
                                
                                <div class="absolute left-0 top-0 bottom-0 w-2 {{ $isPerfect ? 'bg-emerald-400 group-hover:bg-emerald-500' : 'bg-slate-200 group-hover:bg-blue-500' }} transition-colors duration-300"></div>

                                <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-5 md:gap-6 pl-3 md:pl-4">
                                    
                                    <div class="flex items-center gap-4 md:gap-5 w-full md:w-auto">
                                        <div class="w-12 h-12 md:w-14 md:h-14 rounded-xl md:rounded-2xl flex items-center justify-center font-black text-xl md:text-2xl shrink-0 transition-colors {{ $isPerfect ? 'bg-emerald-50 text-emerald-600 border border-emerald-100 group-hover:bg-emerald-100' : 'bg-slate-50 text-slate-400 border border-slate-100 group-hover:bg-blue-50 group-hover:text-blue-600 group-hover:border-blue-200' }}">
                                            {{ sprintf("%02d", $session->pertemuan ?? $loop->iteration) }}
                                        </div>
                                        
                                        <div class="flex-1">
                                            <h4 class="font-black text-lg md:text-xl text-slate-900 group-hover:text-blue-700 transition-colors mb-1 line-clamp-1 leading-tight">
                                                {{ $session->judul }}
                                            </h4>
                                            <div class="flex items-center gap-2 text-[10px] md:text-[11px] font-bold text-slate-400 uppercase tracking-widest">
                                                <span class="flex items-center gap-1.5">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                                    {{ $session->tanggal ? \Carbon\Carbon::parse($session->tanggal)->translatedFormat('d F Y') : '-' }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex items-center justify-between w-full md:w-auto gap-5 md:gap-8 bg-slate-50 md:bg-transparent p-4 md:p-0 rounded-xl md:rounded-none border border-slate-100 md:border-none mt-2 md:mt-0">
                                        <div class="text-left md:text-right flex-1 md:flex-none flex md:block items-center justify-between md:justify-start">
                                            <span class="text-[9px] md:text-[10px] font-black uppercase tracking-widest md:mt-1 inline-block md:order-2 order-1 {{ $isPerfect ? 'text-emerald-500' : 'text-slate-400' }}">
                                                Mahasiswa Hadir
                                            </span>
                                            <span class="block text-2xl md:text-3xl font-black {{ $isPerfect ? 'text-emerald-600' : 'text-slate-800' }} leading-none order-2 md:order-1">
                                                {{ $hadir }}<span class="text-sm md:text-lg text-slate-400 font-bold">/{{ $total }}</span>
                                            </span>
                                        </div>
                                        
                                        <div class="w-10 h-10 md:w-12 md:h-12 bg-white border border-slate-200 rounded-xl md:rounded-2xl flex items-center justify-center text-slate-400 group-hover:bg-blue-600 group-hover:border-blue-600 group-hover:text-white transition-all shadow-sm shrink-0">
                                            <svg class="w-5 h-5 md:w-6 md:h-6 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path>
                                            </svg>
                                        </div>
                                    </div>

                                </div>
                            </a>
                        @empty
                            @if(!$todaySession)
                                <div class="p-12 md:p-16 flex flex-col items-center justify-center text-center bg-white border-2 border-dashed border-slate-200 rounded-[2rem] md:rounded-[2.5rem]" data-aos="zoom-in">
                                    <div class="w-16 h-16 md:w-20 md:h-20 bg-slate-50 rounded-full flex items-center justify-center text-slate-300 mb-4 border border-slate-100">
                                        <svg class="w-8 h-8 md:w-10 md:h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    </div>
                                    <h3 class="text-lg md:text-xl font-black text-slate-800 mb-1">Belum Ada Riwayat</h3>
                                    <p class="text-[10px] md:text-xs font-bold text-slate-400 uppercase tracking-widest">Sesi pertemuan yang sudah lewat akan muncul di sini</p>
                                </div>
                            @endif
                        @endforelse
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
                    const scrollPosition = activeTab.offsetLeft - (navContainer.clientWidth / 2) + (activeTab.clientWidth / 2);
                    navContainer.scrollLeft = scrollPosition; 
                }
            });

            // Tutup Notifikasi Toast
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
    </body>
</html>