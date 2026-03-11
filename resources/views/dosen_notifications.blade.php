<!DOCTYPE html>
@php
    $dosenId = Auth::guard('dosen')->id();
    // Mengambil dari variabel controller, kalau kosong (fallback), hitung ulang
    $unreadMessageCount = $unreadMessageCount ?? \App\Models\Message::where('receiver_type', 'dosen')->where('receiver_id', $dosenId)->where('is_read', 0)->count();
    
    // Hitung berapa notifikasi (bukan pesan) yang belum dibaca
    $unreadNotifCount = $notifications->where('is_read', false)->count();
@endphp
<html lang="id">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Pemberitahuan | Portal Dosen</title>

        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet" />

        <style>
            .custom-scrollbar::-webkit-scrollbar { width: 5px; }
            .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
            .custom-scrollbar::-webkit-scrollbar-thumb { background-color: #cbd5e1; border-radius: 20px; }
        </style>
    </head>
    <body class="m-0 font-['Plus_Jakarta_Sans'] bg-slate-50 text-slate-800 antialiased h-[100dvh] flex overflow-hidden border-box">
        
        <div id="mobileBackdrop" onclick="toggleSidebar()" class="fixed inset-0 bg-slate-900/50 z-40 hidden lg:hidden transition-opacity"></div>

        <aside id="sidebar" class="fixed lg:static inset-y-0 left-0 z-50 w-80 bg-white border-r border-slate-200 flex flex-col h-[100dvh] transform -translate-x-full lg:translate-x-0 lg:static transition-transform duration-300 ease-in-out shrink-0">
            <div class="p-8 border-b border-slate-100 flex items-center gap-4 shrink-0">
                <img src="{{ asset('images/logo-ummi.png') }}" class="w-10 h-10 object-contain" alt="Logo" onerror="this.src='https://ui-avatars.com/api/?name=UMMI&background=0D8ABC&color=fff'" />
                <div>
                    <h1 class="text-lg font-black text-slate-900 tracking-tight leading-none">LMS Inklusi</h1>
                    <p class="text-[9px] font-bold text-blue-600 uppercase tracking-widest mt-1">Portal Dosen</p>
                </div>
                <button onclick="toggleSidebar()" class="lg:hidden ml-auto text-slate-400 hover:text-slate-600 bg-slate-50 p-2 rounded-lg cursor-pointer">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>

            <nav class="flex-1 p-6 space-y-3 overflow-y-auto custom-scrollbar">
                <a href="{{ route('dosen.dashboard') }}" class="flex items-center gap-4 p-4 text-slate-500 hover:bg-slate-50 hover:text-slate-900 rounded-2xl font-bold transition-all cursor-pointer">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                    <span>Beranda</span>
                </a>
                <a href="{{ route('dosen.courses') }}" class="flex items-center gap-4 p-4 text-slate-500 hover:bg-slate-50 hover:text-slate-900 rounded-2xl font-bold transition-all cursor-pointer">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                    <span>Mata Kuliah</span>
                </a>
                <a href="{{ route('dosen.schedule') ?? '#' }}" class="flex items-center gap-4 p-4 text-slate-500 hover:bg-slate-50 hover:text-slate-900 rounded-2xl font-bold transition-all cursor-pointer">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    <span>Jadwal Mengajar</span>
                </a>
                <a href="{{ route('dosen.grading') ?? '#' }}" class="flex items-center gap-4 p-4 text-slate-500 hover:bg-slate-50 hover:text-slate-900 rounded-2xl font-bold transition-all cursor-pointer">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                    <span>Input Nilai</span>
                </a>
                <a href="{{ route('dosen.exams') ?? '#' }}" class="flex items-center gap-4 p-4 text-slate-500 hover:bg-slate-50 hover:text-slate-900 rounded-2xl font-bold transition-all cursor-pointer">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    <span>Kelola Ujian</span>
                </a>
                <a href="{{ route('dosen.messages') }}" class="flex items-center justify-between p-4 text-slate-500 hover:bg-slate-50 hover:text-slate-900 rounded-2xl font-bold transition-all cursor-pointer">
                    <div class="flex items-center gap-4">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
                        <span>Pesan</span>
                    </div>
                    @if($unreadMessageCount > 0)
                        <span class="text-[10px] bg-red-500 text-white px-2 py-1 rounded-lg font-black shadow-sm">{{ $unreadMessageCount }} Baru</span>
                    @endif
                </a>
                <a href="{{ route('dosen.notifications') ?? '#' }}" class="flex items-center justify-between p-4 bg-blue-50 text-blue-700 rounded-2xl font-bold transition-all shadow-sm border border-blue-100 cursor-pointer">
                    <div class="flex items-center gap-4">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                        <span>Pemberitahuan</span>
                    </div>
                    @if($unreadNotifCount > 0)
                        <span class="w-2 h-2 bg-red-500 rounded-full animate-pulse"></span>
                    @else
                        <span class="text-[10px] bg-blue-100 text-blue-600 px-2 py-1 rounded-lg font-black">Aktif</span>
                    @endif
                </a>
                <a href="{{ route('dosen.profile') ?? '#' }}" class="flex items-center gap-4 p-4 text-slate-500 hover:bg-slate-50 hover:text-slate-900 rounded-2xl font-bold transition-all cursor-pointer">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    <span>Profil Saya</span>
                </a>
            </nav>

            <div class="p-6 border-t border-slate-100 shrink-0">
                <a href="{{ route('logout.dosen') }}" class="w-full p-4 flex items-center justify-between text-red-600 font-bold bg-red-50 rounded-2xl hover:bg-red-100 transition-all border border-red-100 cursor-pointer">
                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                        <span>Keluar</span>
                    </div>
                </a>
            </div>
        </aside>

        <main class="flex-1 flex flex-col h-[100dvh] relative min-w-0 bg-[#f8fafc] overflow-y-auto custom-scrollbar">
            <div class="absolute top-0 left-0 w-full h-80 bg-gradient-to-b from-blue-50/50 to-transparent -z-10"></div>

            <header class="bg-white/80 backdrop-blur-xl border-b border-slate-200/60 px-4 md:px-8 py-3 sm:py-6 sticky top-0 z-20 shrink-0">
                <div class="max-w-7xl mx-auto flex items-center justify-between h-10 sm:h-14">
                    <div class="flex items-center gap-3 sm:gap-4">
                        <button onclick="toggleSidebar()" class="lg:hidden p-1.5 sm:p-2 text-slate-500 hover:bg-slate-100 rounded-lg transition-all focus:outline-none focus:ring-2 focus:ring-slate-200 cursor-pointer border border-transparent">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                        </button>
                        <div>
                            <h2 class="text-lg sm:text-2xl font-black text-slate-900 tracking-tight leading-none">Pemberitahuan</h2>
                            <span class="text-[9px] sm:text-[10px] font-bold text-slate-400 uppercase tracking-widest mt-1 sm:mt-1.5 block">Informasi Sistem</span>
                        </div>
                    </div>
                </div>
            </header>

            <div class="p-4 sm:p-6 lg:p-8 max-w-7xl mx-auto w-full space-y-4 sm:space-y-6 pb-20">
                
                <div class="flex justify-between items-center mb-2 sm:mb-4 px-1" data-aos="fade-in" data-aos-duration="800">
                    <h3 class="text-xs sm:text-sm font-bold text-slate-500 uppercase tracking-widest">Terbaru ({{ $unreadNotifCount }})</h3>
                    @if($unreadNotifCount > 0)
                    <form action="{{ route('dosen.notifications.read') }}" method="POST">
                        @csrf
                        <button type="submit" class="text-[9px] sm:text-[10px] font-bold text-blue-600 uppercase tracking-widest hover:underline hover:text-blue-700 transition-all cursor-pointer">
                            Tandai semua dibaca
                        </button>
                    </form>
                    @endif
                </div>

                <div class="space-y-3 sm:space-y-4">
                    @forelse ($notifications as $notif)
                        @php
                            $colorStr = $notif->type == 'warning' ? 'orange' : ($notif->type == 'success' ? 'blue' : 'slate');
                            $opacity = $notif->is_read ? 'opacity-75 hover:opacity-100 bg-slate-50' : 'bg-white shadow-sm';
                        @endphp
                        
                        {{-- CUKUP PANGGIL ROUTE SAJA, TIDAK PERLU JAVASCRIPT --}}
                        <a href="{{ route('dosen.notifications.read.single', $notif->id) }}" 
                           data-aos="fade-up" 
                           data-aos-delay="100" 
                           class="{{ $opacity }} p-4 sm:p-6 md:p-8 rounded-[1.5rem] sm:rounded-[2rem] md:rounded-[2.5rem] border-l-[6px] sm:border-l-8 border-{{ $colorStr }}-500 hover:shadow-md transition-all flex flex-col md:flex-row items-start md:items-center gap-4 sm:gap-5 md:gap-6 cursor-pointer group no-underline decoration-transparent">
                            
                            <div class="flex items-center gap-3 sm:gap-4 w-full md:w-auto">
                                <div class="w-12 h-12 sm:w-14 sm:h-14 md:w-16 md:h-16 bg-{{ $colorStr }}-50 rounded-[1rem] sm:rounded-2xl md:rounded-3xl flex items-center justify-center text-{{ $colorStr }}-600 shrink-0 group-hover:scale-110 transition-transform">
                                    @if($notif->type == 'warning')
                                        <svg class="w-6 h-6 sm:w-7 sm:h-7 md:w-8 md:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    @elseif($notif->type == 'success')
                                        <svg class="w-6 h-6 sm:w-7 sm:h-7 md:w-8 md:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                    @else
                                        <svg class="w-6 h-6 sm:w-7 sm:h-7 md:w-8 md:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                                    @endif
                                </div>
                                <div class="flex-1 md:hidden">
                                    <h4 class="text-sm sm:text-base font-bold text-slate-900 group-hover:text-{{ $colorStr }}-600 transition-colors leading-tight">
                                        {{ $notif->title }}
                                    </h4>
                                    <span class="text-[8px] sm:text-[9px] font-bold text-slate-400 uppercase tracking-widest mt-1 block">
                                        {{ $notif->created_at->diffForHumans() }}
                                    </span>
                                </div>
                            </div>

                            <div class="flex-1 w-full text-left">
                                <div class="hidden md:flex justify-between items-start mb-2 gap-2">
                                    <h4 class="text-base md:text-lg font-bold text-slate-900 group-hover:text-{{ $colorStr }}-600 transition-colors">
                                        {{ $notif->title }}
                                    </h4>
                                    <span class="text-[9px] md:text-[10px] font-bold text-slate-400 uppercase tracking-widest bg-{{ $notif->is_read ? 'white' : 'slate-50' }} px-2.5 py-1 rounded-lg border border-slate-200 whitespace-nowrap">
                                        {{ $notif->created_at->diffForHumans() }}
                                    </span>
                                </div>
                                <p class="text-xs sm:text-sm text-slate-500 leading-relaxed font-medium">
                                    {!! $notif->message !!}
                                </p>
                            </div>
                        </a>
                    @empty
                        <div data-aos="zoom-in" data-aos-duration="600" class="text-center py-16 sm:py-20 bg-white rounded-[1.5rem] sm:rounded-[2.5rem] border border-slate-100 shadow-sm flex flex-col items-center justify-center">
                            <svg class="w-12 h-12 sm:w-16 sm:h-16 mx-auto text-slate-300 mb-3 sm:mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                            <h4 class="text-base sm:text-lg font-bold text-slate-600">Belum ada pemberitahuan</h4>
                        </div>
                    @endforelse
                </div>

                @if(count($notifications) > 5)
                <div class="pt-6 sm:pt-8 text-center" data-aos="fade-up" data-aos-delay="400">
                    <button class="px-6 py-3 sm:px-8 sm:py-4 bg-white border border-slate-200 text-slate-500 rounded-xl sm:rounded-2xl font-black text-[9px] sm:text-[10px] uppercase tracking-[0.1em] sm:tracking-[0.2em] hover:bg-blue-50 hover:text-blue-600 transition-all shadow-sm cursor-pointer">
                        Muat Lebih Banyak
                    </button>
                </div>
                @endif
            </div>
        </main>

        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                AOS.init({ once: true, easing: "ease-out-cubic", offset: 50 });
            });
            function toggleSidebar() {
                const sidebar = document.getElementById("sidebar");
                const backdrop = document.getElementById("mobileBackdrop");
                sidebar.classList.toggle("-translate-x-full");
                backdrop.classList.toggle("hidden");
            }
        </script>
    </body>
</html>