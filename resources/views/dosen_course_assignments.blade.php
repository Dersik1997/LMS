<!DOCTYPE html>
<html lang="id" class="h-full">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Kelola Penugasan | Portal Dosen</title>
    
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
        
        /* Modal Animation Classes */
        .modal-active { opacity: 1 !important; pointer-events: auto !important; }
        .modal-content-active { transform: scale(1) translateY(0) !important; opacity: 1 !important; }

        /* Animasi Notifikasi Alert (Toast) */
        @keyframes slideInRight { from { transform: translateX(100%); opacity: 0; } to { transform: translateX(0); opacity: 1; } }
        @keyframes slideOutRight { from { transform: translateX(0); opacity: 1; } to { transform: translateX(100%); opacity: 0; } }
        .toast-enter { animation: slideInRight 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards; }
        .toast-leave { animation: slideOutRight 0.4s ease-in forwards; }
    </style>
</head>
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
                {{ session('error') ?? $errors->first() ?? 'Terdapat kesalahan pada input form Anda.' }}
            </div>
            <button type="button" onclick="this.parentElement.remove()" class="ml-auto -mx-1.5 -my-1.5 bg-white text-slate-400 rounded-lg focus:ring-2 focus:ring-slate-300 p-1.5 hover:bg-slate-100 inline-flex items-center justify-center h-8 w-8 transition-colors">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/></svg>
            </button>
        </div>
        @endif
    </div>

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
                <a href="{{ route('dosen.attendance.index', $kelas->id) }}" class="snap-start shrink-0 px-4 md:px-6 py-2 md:py-2.5 rounded-lg md:rounded-xl text-slate-500 hover:text-slate-900 font-bold text-[9px] md:text-[10px] uppercase tracking-widest transition-all whitespace-nowrap hover:bg-white/60 flex items-center justify-center">
                    Absensi
                </a>
                
                {{-- TAB AKTIF: PENUGASAN --}}
                <button id="active-nav-tab" class="snap-start shrink-0 px-4 md:px-6 py-2 md:py-2.5 rounded-lg md:rounded-xl bg-white text-blue-700 font-black text-[9px] md:text-[10px] uppercase tracking-widest shadow-sm border border-slate-200/60 whitespace-nowrap transition-all flex items-center justify-center cursor-default">
                    Penugasan
                </button>
                
                <a href="{{ route('dosen.course.students', $kelas->id) }}" class="snap-start shrink-0 px-4 md:px-6 py-2 md:py-2.5 rounded-lg md:rounded-xl text-slate-500 hover:text-slate-900 font-bold text-[9px] md:text-[10px] uppercase tracking-widest transition-all whitespace-nowrap hover:bg-white/60 flex items-center justify-center">
                    Peserta
                </a>
                <a href="{{ route('dosen.grades.recap', $kelas->id) }}" class="snap-start shrink-0 px-4 md:px-6 py-2 md:py-2.5 rounded-lg md:rounded-xl text-slate-500 hover:text-slate-900 font-bold text-[9px] md:text-[10px] uppercase tracking-widest transition-all whitespace-nowrap hover:bg-white/60 flex items-center justify-center">
                    Rekap Nilai
                </a>
            </nav>
        </div>
    </div>

    {{-- KONTEN UTAMA --}}
    <main class="flex-1 max-w-7xl mx-auto p-4 sm:p-6 md:p-8 w-full space-y-6 md:space-y-10 mb-20 relative z-10">
        
        <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-4 border-b border-slate-200 pb-4 sm:pb-6" data-aos="fade-down">
            <div>
                <h2 class="text-xl sm:text-2xl md:text-3xl font-black text-slate-900 tracking-tight">Daftar Penugasan</h2>
                <p class="text-[10px] sm:text-xs md:text-sm text-slate-500 font-medium mt-1">Kelola tugas, kuis, dan pantau pengumpulan mahasiswa.</p>
            </div>
            
            <div class="flex flex-row items-center gap-2 sm:gap-3 w-full md:w-auto">
                <a href="{{ route('dosen.assignment.recap', $kelas->id) }}" class="flex-1 sm:flex-none px-4 sm:px-6 py-3 sm:py-3.5 bg-white border-2 border-slate-200 text-slate-600 rounded-xl font-black text-[9px] sm:text-[10px] md:text-[11px] uppercase tracking-widest hover:bg-slate-50 hover:border-blue-300 hover:text-blue-600 transition-all flex items-center justify-center gap-1.5 sm:gap-2 shadow-sm active:scale-95 text-center">
                    <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 17v1a3 3 0 106 0v-1m-6 0a3 3 0 006 0v-1m-6 0h6m-6-5h6m-6-4h6M4 21h16a2 2 0 002-2V5a2 2 0 00-2-2H4a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                    </svg>
                    <span class="hidden sm:inline">Rekap Nilai</span>
                    <span class="sm:hidden">Rekap</span>
                </a>

                {{-- TOMBOL TRIGGER MODAL BUAT TUGAS --}}
                <button type="button" onclick="openCreateModal()" class="flex-1 sm:flex-none px-4 sm:px-6 py-3 sm:py-3.5 bg-blue-600 text-white rounded-xl font-black text-[9px] sm:text-[10px] md:text-[11px] uppercase tracking-widest hover:bg-blue-700 hover:-translate-y-0.5 transition-all flex items-center justify-center gap-1.5 sm:gap-2 shadow-lg shadow-blue-200 active:scale-95 text-center">
                    <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Buat Tugas
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 sm:gap-6">
            
            @forelse($assignments as $assignment)
            @php
                $isPublished = $assignment->status === 'published';
                $hadirCount = $assignment->submissions_count ?? 0;
                $totalCount = $kelas->mahasiswa_count ?? 0;
            @endphp
            
            <div data-aos="fade-up" data-aos-delay="{{ $loop->index * 50 }}" class="group bg-white p-4 sm:p-5 md:p-6 rounded-[1.5rem] sm:rounded-[2.5rem] border border-slate-200 shadow-sm hover:shadow-xl hover:border-blue-300 transition-all duration-300 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 sm:gap-5 relative overflow-hidden transform hover:-translate-y-1">
                
                <div class="absolute left-0 top-0 bottom-0 w-1.5 sm:w-2 {{ $isPublished ? 'bg-blue-500' : 'bg-slate-300' }} transition-colors"></div>

                <div class="flex items-start sm:items-center gap-3 sm:gap-5 w-full sm:w-auto pl-1 sm:pl-2">
                    <div class="w-10 h-10 sm:w-12 sm:h-14 md:w-14 {{ $isPublished ? 'bg-blue-50 text-blue-600 border-blue-100' : 'bg-slate-50 text-slate-400 border-slate-100' }} rounded-xl sm:rounded-2xl flex items-center justify-center font-black text-base sm:text-xl shrink-0 border group-hover:scale-105 transition-transform mt-1 sm:mt-0">
                        T{{ $loop->iteration }}
                    </div>
                    <div class="overflow-hidden flex-1">
                        <h4 class="font-black text-slate-900 text-sm sm:text-base md:text-lg mb-0.5 sm:mb-1 group-hover:text-blue-700 transition-colors line-clamp-2 leading-tight">
                            {{ $assignment->judul }}
                        </h4>
                        <div class="flex flex-wrap items-center gap-1.5 sm:gap-3 text-[8px] sm:text-[9px] md:text-[10px] font-bold uppercase tracking-widest">
                            @if($assignment->deadline)
                                <span class="text-orange-600 flex items-center gap-1 shrink-0">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                                    {{ \Carbon\Carbon::parse($assignment->deadline)->translatedFormat('d M Y') }}
                                </span>
                            @endif
                            <span class="hidden sm:inline text-slate-300">•</span>
                            <span class="{{ $isPublished ? 'text-emerald-600' : 'text-slate-400' }} shrink-0">
                                {{ $isPublished ? 'Published' : 'Draft' }}
                            </span>
                        </div>
                    </div>
                </div>

                <div class="flex items-center gap-2 sm:gap-4 w-full sm:w-auto border-t sm:border-t-0 border-slate-100 pt-3 sm:pt-0 pl-1 sm:pl-0">
                    @if($isPublished)
                    <div class="text-right hidden sm:block">
                        <span class="block text-lg sm:text-xl font-black text-slate-900">{{ $hadirCount }}<span class="text-xs sm:text-sm text-slate-400">/{{ $totalCount }}</span></span>
                        <span class="text-[8px] sm:text-[9px] font-black text-slate-400 uppercase tracking-widest">Submit</span>
                    </div>
                    @endif

                    <div class="flex items-center gap-2 flex-1 sm:flex-none">
                        @if($isPublished)
                            <a href="{{ route('dosen.assignment.grade', ['kelas' => $kelas->id, 'assignment' => $assignment->id]) }}" class="flex-1 sm:flex-none px-4 py-2.5 sm:px-5 sm:py-3 bg-blue-50 text-blue-700 rounded-xl font-black text-[9px] sm:text-[10px] uppercase tracking-widest hover:bg-blue-600 hover:text-white transition-all text-center border border-blue-100 active:scale-95">
                                Periksa
                            </a>
                        @else
                            {{-- TOMBOL TRIGGER MODAL EDIT TUGAS --}}
                            <button type="button" 
                                onclick="openEditModal('{{ $assignment->id }}', '{{ addslashes($assignment->judul) }}', '{{ addslashes($assignment->deskripsi) }}', '{{ \Carbon\Carbon::parse($assignment->deadline)->format('Y-m-d') }}', '{{ \Carbon\Carbon::parse($assignment->deadline)->format('H:i') }}', '{{ $assignment->poin }}', '{{ $assignment->tipe_pengumpulan }}')" 
                                class="flex-1 sm:flex-none px-4 py-2.5 sm:px-5 sm:py-3 bg-blue-50 text-blue-700 rounded-xl font-black text-[9px] sm:text-[10px] uppercase tracking-widest hover:bg-blue-600 hover:text-white transition-all text-center border border-blue-100 cursor-pointer active:scale-95">
                                Edit
                            </button>
                        @endif

                        <form action="{{ route('dosen.assignment.destroy', [$kelas->id, $assignment->id]) }}" method="POST" onsubmit="return confirm('Hapus tugas ini?')" class="m-0 shrink-0">
                            @csrf @method('DELETE')
                            <button type="submit" class="p-2.5 sm:p-3 bg-slate-50 text-slate-400 hover:bg-red-500 hover:text-white rounded-xl transition-all border border-slate-100 hover:border-red-500 shadow-sm cursor-pointer active:scale-95">
                                <svg class="w-4 h-4 sm:w-4 sm:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full p-10 sm:p-20 text-center bg-white rounded-[1.5rem] sm:rounded-[2.5rem] border-2 border-dashed border-slate-200" data-aos="zoom-in">
                <div class="w-16 h-16 sm:w-20 sm:h-20 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-3 sm:mb-4 text-slate-300 border border-slate-100">
                    <svg class="w-8 h-8 sm:w-10 sm:h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                </div>
                <h3 class="font-black text-slate-800 text-base sm:text-lg mb-1">Belum ada penugasan</h3>
                <p class="text-xs sm:text-sm font-medium text-slate-400 mb-5 sm:mb-6">Mulai buat tugas atau kuis pertama untuk mahasiswa Anda.</p>
                <button type="button" onclick="openCreateModal()" class="px-5 sm:px-6 py-2.5 bg-slate-900 text-white rounded-xl text-[9px] sm:text-[10px] font-black uppercase tracking-widest hover:bg-blue-600 transition-all shadow-md inline-flex items-center gap-2 cursor-pointer active:scale-95">
                    <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg> Buat Tugas
                </button>
            </div>
            @endforelse

        </div>
    </main>

    {{-- MODAL BACKDROP --}}
    <div id="modalBackdrop" class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm z-[60] opacity-0 pointer-events-none transition-opacity duration-300" onclick="closeAllModals()"></div>
    
    {{-- ======================================================== --}}
    {{-- 1. MODAL BUAT TUGAS BARU --}}
    {{-- ======================================================== --}}
    <div id="createAssignmentModal" class="fixed inset-0 flex items-end sm:items-center justify-center z-[70] opacity-0 pointer-events-none transition-opacity duration-300 sm:p-4 md:p-6 overflow-hidden">
        <div class="bg-[#f8fafc] w-full sm:w-[95vw] sm:max-w-7xl h-[90vh] sm:h-auto sm:max-h-[95vh] rounded-t-[2rem] sm:rounded-[2rem] shadow-2xl transform scale-100 sm:scale-95 translate-y-full sm:translate-y-4 transition-transform duration-300 flex flex-col border border-slate-200 overflow-hidden sm:my-auto pb-10 sm:pb-0" id="modalContentCreate">
            
            <div class="bg-white px-5 py-4 border-b border-slate-200 flex justify-between items-center z-20 shrink-0">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 sm:w-10 sm:h-10 bg-blue-50 text-blue-600 rounded-lg sm:rounded-xl flex items-center justify-center">
                        <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    </div>
                    <div>
                        <h2 class="text-base sm:text-lg font-black text-slate-900 leading-tight">Buat Tugas Baru</h2>
                        <p class="text-[9px] sm:text-[10px] font-bold text-slate-400 uppercase tracking-widest line-clamp-1">{{ $kelas->mataKuliah->nama }}</p>
                    </div>
                </div>
                <button type="button" onclick="closeCreateModal()" class="w-8 h-8 sm:w-10 sm:h-10 flex items-center justify-center bg-slate-100 hover:bg-red-100 text-slate-500 hover:text-red-600 rounded-full transition-all cursor-pointer active:scale-95 shrink-0">
                    <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>

            <form action="{{ route('dosen.course.assignments.store', ['kelas' => $kelas->id]) }}" method="POST" enctype="multipart/form-data" class="flex-1 overflow-y-auto custom-scrollbar p-4 sm:p-6 pb-20 sm:pb-6">
                @csrf
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-4 sm:gap-6">
                    
                    {{-- Form Kiri --}}
                    <div class="lg:col-span-8 flex flex-col gap-4 sm:gap-6">
                        <div class="bg-white p-4 sm:p-5 rounded-2xl sm:rounded-3xl border border-slate-200 shadow-sm space-y-4">
                            <div>
                                <label class="block text-[10px] sm:text-xs font-bold text-slate-700 mb-1.5 ml-1">Judul Tugas <span class="text-red-500">*</span></label>
                                <input type="text" name="judul" value="{{ old('judul') }}" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3 sm:px-4 py-2.5 sm:py-3 text-xs sm:text-sm font-bold text-slate-800 focus:outline-none focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-50/50 transition-all placeholder-slate-400" placeholder="Contoh: Analisis Kompleksitas Algoritma" required />
                            </div>
                            <div>
                                <label class="block text-[10px] sm:text-xs font-bold text-slate-700 mb-1.5 ml-1">Instruksi / Deskripsi Detail <span class="text-red-500">*</span></label>
                                <textarea name="deskripsi" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3 sm:px-4 py-2.5 sm:py-3 min-h-[120px] sm:min-h-[140px] outline-none text-slate-700 font-medium leading-relaxed resize-y placeholder-slate-400 text-xs sm:text-sm focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-50/50 transition-all custom-scrollbar" placeholder="Tuliskan instruksi pengerjaan tugas di sini..." required>{{ old('deskripsi') }}</textarea>
                            </div>
                        </div>

                        <div class="bg-white p-4 sm:p-5 rounded-2xl sm:rounded-3xl border border-slate-200 shadow-sm">
                            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 sm:gap-4">
                                <div class="flex-1">
                                    <h3 class="text-xs sm:text-sm font-black text-slate-900 mb-0.5 sm:mb-1">Lampiran File Tugas</h3>
                                    <p class="text-[9px] sm:text-[10px] font-medium text-slate-400">Opsional. Maks 10MB (PDF/DOCX/ZIP)</p>
                                </div>
                                <div class="flex-1 w-full sm:w-auto">
                                    <label class="flex items-center justify-center w-full h-12 sm:h-16 border-2 border-slate-300 border-dashed rounded-xl cursor-pointer bg-slate-50 hover:bg-blue-50/50 hover:border-blue-400 transition-all group/upload shadow-sm relative overflow-hidden active:scale-95">
                                        <div class="flex items-center gap-2 sm:gap-3 px-2 sm:px-4 z-10">
                                            <div class="w-6 h-6 sm:w-8 sm:h-8 bg-white rounded-full flex items-center justify-center text-slate-400 group-hover/upload:text-blue-600 group-hover/upload:bg-blue-100 transition-colors shadow-sm shrink-0">
                                                <svg class="w-3 h-3 sm:w-4 sm:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
                                            </div>
                                            <p class="text-[10px] sm:text-xs text-slate-700 font-bold group-hover/upload:text-blue-600 truncate">Pilih File Lampiran</p>
                                        </div>
                                        <input type="file" name="file" id="fileInputCreate" class="hidden" />
                                    </label>
                                </div>
                            </div>
                            
                            <div id="filePreviewContainerCreate" class="hidden items-center justify-between p-2 sm:p-3 mt-3 sm:mt-4 bg-emerald-50 border border-emerald-100 rounded-xl shadow-sm transition-all">
                                <div class="flex items-center gap-2 sm:gap-3 overflow-hidden">
                                    <div class="w-6 h-6 sm:w-8 sm:h-8 bg-white rounded-lg flex items-center justify-center text-emerald-600 border border-emerald-200 shrink-0">
                                        <svg class="w-3 h-3 sm:w-4 sm:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    </div>
                                    <div class="overflow-hidden flex-1">
                                        <p id="fileNameCreate" class="text-[10px] sm:text-xs font-bold text-slate-800 truncate">namafile.pdf</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Form Kanan --}}
                    <div class="lg:col-span-4 flex flex-col gap-4 sm:gap-5">
                        <div class="bg-white p-4 sm:p-5 rounded-2xl sm:rounded-3xl border border-slate-200 shadow-sm flex flex-col h-full">
                            <h3 class="font-black text-slate-900 text-xs sm:text-sm pb-2.5 sm:pb-3 border-b border-slate-100 flex items-center gap-2 mb-3 sm:mb-4">
                                <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                Pengaturan Tugas
                            </h3>

                            <div class="space-y-3 sm:space-y-4 flex-1">
                                <div class="grid grid-cols-2 lg:grid-cols-1 gap-3 sm:gap-4">
                                    <div>
                                        <label class="block text-[9px] sm:text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1 sm:mb-1.5 ml-1">Batas Tanggal</label>
                                        <input type="date" name="deadline_tanggal" value="{{ old('deadline_tanggal') }}" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3 sm:px-4 py-2 sm:py-2.5 font-bold text-slate-800 focus:outline-none focus:bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition-all cursor-pointer text-xs sm:text-sm" required />
                                    </div>
                                    <div>
                                        <label class="block text-[9px] sm:text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1 sm:mb-1.5 ml-1">Batas Waktu</label>
                                        <input type="time" name="deadline_jam" value="{{ old('deadline_jam', '23:59') }}" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3 sm:px-4 py-2 sm:py-2.5 font-bold text-slate-800 focus:outline-none focus:bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition-all cursor-pointer text-xs sm:text-sm" required />
                                    </div>
                                </div>

                                <div class="grid grid-cols-2 lg:grid-cols-1 gap-3 sm:gap-4">
                                    <div>
                                        <label class="block text-[9px] sm:text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1 sm:mb-1.5 ml-1">Poin Maksimal</label>
                                        <div class="relative group">
                                            <input type="number" name="poin" value="{{ old('poin', 100) }}" min="1" class="w-full bg-slate-50 border border-slate-200 rounded-xl pl-3 sm:pl-4 pr-10 sm:pr-12 py-2 sm:py-2.5 font-bold text-slate-800 focus:outline-none focus:bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition-all text-xs sm:text-sm" placeholder="100" required />
                                            <span class="absolute right-3 sm:right-4 top-1/2 -translate-y-1/2 text-[9px] sm:text-[10px] font-black text-slate-400 uppercase tracking-widest group-focus-within:text-blue-500">PTS</span>
                                        </div>
                                    </div>
                                    <div>
                                        <label class="block text-[9px] sm:text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1 sm:mb-1.5 ml-1">Tipe Penyerahan</label>
                                        <div class="relative">
                                             <select name="tipe_pengumpulan" class="w-full bg-slate-50 border border-slate-200 rounded-xl pl-3 sm:pl-4 pr-8 sm:pr-10 py-2 sm:py-2.5 font-bold text-slate-800 focus:outline-none focus:bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-100 appearance-none transition-all cursor-pointer text-xs sm:text-sm" required>
                                                <option value="file" {{ old('tipe_pengumpulan') == 'file' ? 'selected' : '' }}>Upload File</option>
                                                <option value="text" {{ old('tipe_pengumpulan') == 'text' ? 'selected' : '' }}>Teks Online</option>
                                                <option value="both" {{ old('tipe_pengumpulan') == 'both' ? 'selected' : '' }}>Keduanya</option>
                                            </select>
                                             <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-slate-500 absolute right-3 top-1/2 -translate-y-1/2 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-5 sm:mt-6 pt-4 sm:pt-5 border-t border-slate-100 space-y-2.5 sm:space-y-3 shrink-0">
                                <button type="submit" name="action" value="publish" class="w-full py-3 sm:py-3.5 bg-blue-600 text-white rounded-xl font-black text-[10px] sm:text-xs uppercase tracking-widest hover:bg-blue-700 transition-all shadow-md shadow-blue-500/30 flex items-center justify-center gap-1.5 sm:gap-2 cursor-pointer active:scale-95">
                                    <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                                    Terbitkan Tugas
                                </button>
                                <div class="flex gap-2">
                                    <button type="submit" name="action" value="draft" class="flex-1 py-2.5 sm:py-2.5 bg-slate-800 text-white rounded-xl font-bold text-[9px] sm:text-[10px] uppercase tracking-wider hover:bg-slate-900 transition-all shadow-sm cursor-pointer active:scale-95">
                                        Simpan Draft
                                    </button>
                                    <button type="button" onclick="closeCreateModal()" class="flex-1 py-2.5 sm:py-2.5 bg-slate-100 text-slate-600 rounded-xl font-bold text-[9px] sm:text-[10px] uppercase tracking-wider hover:bg-slate-200 transition-all cursor-pointer active:scale-95">
                                        Batal
                                    </button>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>


    {{-- ======================================================== --}}
    {{-- 2. MODAL EDIT TUGAS --}}
    {{-- ======================================================== --}}
    <div id="editAssignmentModal" class="fixed inset-0 flex items-end sm:items-center justify-center z-[70] opacity-0 pointer-events-none transition-opacity duration-300 sm:p-4 md:p-6 overflow-hidden">
        <div class="bg-[#f8fafc] w-full sm:w-[95vw] sm:max-w-7xl h-[90vh] sm:h-auto sm:max-h-[95vh] rounded-t-[2rem] sm:rounded-[2rem] shadow-2xl transform scale-100 sm:scale-95 translate-y-full sm:translate-y-4 transition-transform duration-300 flex flex-col border border-slate-200 overflow-hidden sm:my-auto pb-10 sm:pb-0" id="modalContentEdit">
            
            <div class="bg-white px-5 py-4 border-b border-slate-200 flex justify-between items-center z-20 shrink-0">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 sm:w-10 sm:h-10 bg-amber-50 text-amber-600 rounded-lg sm:rounded-xl flex items-center justify-center">
                        <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                    </div>
                    <div>
                        <h2 class="text-base sm:text-lg font-black text-slate-900 leading-tight">Perbarui Tugas</h2>
                        <p class="text-[9px] sm:text-[10px] font-bold text-slate-400 uppercase tracking-widest line-clamp-1">{{ $kelas->mataKuliah->nama }}</p>
                    </div>
                </div>
                <button type="button" onclick="closeEditModal()" class="w-8 h-8 sm:w-10 sm:h-10 flex items-center justify-center bg-slate-100 hover:bg-red-100 text-slate-500 hover:text-red-600 rounded-full transition-all cursor-pointer active:scale-95 shrink-0">
                    <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>

            <form id="editFormElement" method="POST" enctype="multipart/form-data" class="flex-1 overflow-y-auto custom-scrollbar p-4 sm:p-6 pb-20 sm:pb-6">
                @csrf
                @method('PUT')
                
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-4 sm:gap-6">
                    <div class="lg:col-span-8 flex flex-col gap-4 sm:gap-6">
                        <div class="bg-white p-4 sm:p-5 rounded-2xl sm:rounded-3xl border border-slate-200 shadow-sm space-y-4">
                            <div>
                                <label class="block text-[10px] sm:text-xs font-bold text-slate-700 mb-1.5 ml-1">Judul Tugas <span class="text-red-500">*</span></label>
                                <input type="text" name="judul" id="edit_judul" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3 sm:px-4 py-2.5 sm:py-3 text-xs sm:text-sm font-bold text-slate-800 focus:outline-none focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-50/50 transition-all placeholder-slate-400" required />
                            </div>
                            <div>
                                <label class="block text-[10px] sm:text-xs font-bold text-slate-700 mb-1.5 ml-1">Instruksi / Deskripsi Detail <span class="text-red-500">*</span></label>
                                <textarea name="deskripsi" id="edit_deskripsi" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3 sm:px-4 py-2.5 sm:py-3 min-h-[120px] sm:min-h-[140px] outline-none text-slate-700 font-medium leading-relaxed resize-y placeholder-slate-400 text-xs sm:text-sm focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-50/50 transition-all custom-scrollbar" required></textarea>
                            </div>
                        </div>

                        <div class="bg-white p-4 sm:p-5 rounded-2xl sm:rounded-3xl border border-slate-200 shadow-sm">
                            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 sm:gap-4">
                                <div class="flex-1">
                                    <h3 class="text-xs sm:text-sm font-black text-slate-900 mb-0.5 sm:mb-1">Ganti File Tugas</h3>
                                    <p class="text-[9px] sm:text-[10px] font-medium text-slate-400">Pilih file jika ingin menimpa file lama.</p>
                                </div>
                                <div class="flex-1 w-full sm:w-auto">
                                    <label class="flex items-center justify-center w-full h-12 sm:h-16 border-2 border-slate-300 border-dashed rounded-xl cursor-pointer bg-slate-50 hover:bg-blue-50/50 hover:border-blue-400 transition-all group/upload shadow-sm relative overflow-hidden active:scale-95">
                                        <div class="flex items-center gap-2 sm:gap-3 px-2 sm:px-4 z-10">
                                            <div class="w-6 h-6 sm:w-8 sm:h-8 bg-white rounded-full flex items-center justify-center text-slate-400 group-hover/upload:text-blue-600 group-hover/upload:bg-blue-100 transition-colors shadow-sm shrink-0">
                                                <svg class="w-3 h-3 sm:w-4 sm:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
                                            </div>
                                            <p class="text-[10px] sm:text-xs text-slate-700 font-bold group-hover/upload:text-blue-600 truncate">Pilih File Baru</p>
                                        </div>
                                        <input type="file" name="file" id="fileInputEdit" class="hidden" />
                                    </label>
                                </div>
                            </div>
                            
                            <div id="filePreviewContainerEdit" class="hidden items-center justify-between p-2 sm:p-3 mt-3 sm:mt-4 bg-emerald-50 border border-emerald-100 rounded-xl shadow-sm transition-all">
                                <div class="flex items-center gap-2 sm:gap-3 overflow-hidden">
                                    <div class="w-6 h-6 sm:w-8 sm:h-8 bg-white rounded-lg flex items-center justify-center text-emerald-600 border border-emerald-200 shrink-0">
                                        <svg class="w-3 h-3 sm:w-4 sm:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    </div>
                                    <div class="overflow-hidden flex-1">
                                        <p id="fileNameEdit" class="text-[10px] sm:text-xs font-bold text-slate-800 truncate">namafile.pdf</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="lg:col-span-4 flex flex-col gap-4 sm:gap-5">
                        <div class="bg-white p-4 sm:p-5 rounded-2xl sm:rounded-3xl border border-slate-200 shadow-sm flex flex-col h-full">
                            <h3 class="font-black text-slate-900 text-xs sm:text-sm pb-2.5 sm:pb-3 border-b border-slate-100 flex items-center gap-2 mb-3 sm:mb-4">
                                <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                Pengaturan Tugas
                            </h3>

                            <div class="space-y-3 sm:space-y-4 flex-1">
                                <div class="grid grid-cols-2 lg:grid-cols-1 gap-3 sm:gap-4">
                                    <div>
                                        <label class="block text-[9px] sm:text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1 sm:mb-1.5 ml-1">Batas Tanggal</label>
                                        <input type="date" name="deadline_tanggal" id="edit_deadline_tanggal" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3 sm:px-4 py-2 sm:py-2.5 font-bold text-slate-800 focus:outline-none focus:bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition-all cursor-pointer text-xs sm:text-sm" required />
                                    </div>
                                    <div>
                                        <label class="block text-[9px] sm:text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1 sm:mb-1.5 ml-1">Batas Waktu</label>
                                        <input type="time" name="deadline_jam" id="edit_deadline_jam" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3 sm:px-4 py-2 sm:py-2.5 font-bold text-slate-800 focus:outline-none focus:bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition-all cursor-pointer text-xs sm:text-sm" required />
                                    </div>
                                </div>
                                
                                <div class="grid grid-cols-2 lg:grid-cols-1 gap-3 sm:gap-4">
                                    <div>
                                        <label class="block text-[9px] sm:text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1 sm:mb-1.5 ml-1">Poin Maksimal</label>
                                        <div class="relative group">
                                            <input type="number" name="poin" id="edit_poin" min="1" class="w-full bg-slate-50 border border-slate-200 rounded-xl pl-3 sm:pl-4 pr-10 sm:pr-12 py-2 sm:py-2.5 font-bold text-slate-800 focus:outline-none focus:bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition-all text-xs sm:text-sm" required />
                                            <span class="absolute right-3 sm:right-4 top-1/2 -translate-y-1/2 text-[9px] sm:text-[10px] font-black text-slate-400 uppercase tracking-widest group-focus-within:text-blue-500">PTS</span>
                                        </div>
                                    </div>
                                    <div>
                                        <label class="block text-[9px] sm:text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1 sm:mb-1.5 ml-1">Tipe Penyerahan</label>
                                        <div class="relative">
                                             <select name="tipe_pengumpulan" id="edit_tipe_pengumpulan" class="w-full bg-slate-50 border border-slate-200 rounded-xl pl-3 sm:pl-4 pr-8 sm:pr-10 py-2 sm:py-2.5 font-bold text-slate-800 focus:outline-none focus:bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-100 appearance-none transition-all cursor-pointer text-xs sm:text-sm" required>
                                                <option value="file">Upload File</option>
                                                <option value="text">Teks Online</option>
                                                <option value="both">Keduanya</option>
                                            </select>
                                             <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-slate-500 absolute right-3 top-1/2 -translate-y-1/2 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-5 sm:mt-6 pt-4 sm:pt-5 border-t border-slate-100 space-y-2.5 sm:space-y-3 shrink-0">
                                <button type="submit" name="action" value="publish" class="w-full py-3 sm:py-3.5 bg-blue-600 text-white rounded-xl font-black text-[10px] sm:text-xs uppercase tracking-widest hover:bg-blue-700 transition-all shadow-md shadow-blue-500/30 flex items-center justify-center gap-1.5 sm:gap-2 cursor-pointer active:scale-95">
                                    <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                                    Terbitkan Tugas
                                </button>
                                <div class="flex gap-2">
                                    <button type="submit" name="action" value="draft" class="flex-1 py-2.5 sm:py-2.5 bg-slate-800 text-white rounded-xl font-bold text-[9px] sm:text-[10px] uppercase tracking-wider hover:bg-slate-900 transition-all shadow-sm cursor-pointer flex items-center justify-center gap-1.5 active:scale-95">
                                        <svg class="w-3 h-3 sm:w-3.5 sm:h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                        Simpan Edit
                                    </button>
                                    <button type="button" onclick="closeEditModal()" class="flex-1 py-2.5 sm:py-2.5 bg-slate-100 text-slate-600 rounded-xl font-bold text-[9px] sm:text-[10px] uppercase tracking-wider hover:bg-slate-200 transition-all cursor-pointer active:scale-95">
                                        Batal
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>


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

        function closeAllModals() {
            closeCreateModal();
            closeEditModal();
        }

        // ==========================================
        // JS MODAL BUAT TUGAS
        // ==========================================
        function openCreateModal() {
            const backdrop = document.getElementById('modalBackdrop');
            const modal = document.getElementById('createAssignmentModal');
            const content = document.getElementById('modalContentCreate');
            
            backdrop.classList.add('modal-active');
            modal.classList.add('modal-active');
            document.body.style.overflow = 'hidden'; 
            
            // Ganti animasi pop-up (Mobile = Slide up, Desktop = Scale up)
            setTimeout(() => { 
                if (window.innerWidth < 640) {
                    content.classList.remove('translate-y-full');
                    content.classList.add('translate-y-0');
                } else {
                    content.classList.add('modal-content-active'); 
                }
            }, 10);
        }

        function closeCreateModal() {
            const backdrop = document.getElementById('modalBackdrop');
            const modal = document.getElementById('createAssignmentModal');
            const content = document.getElementById('modalContentCreate');
            
            if (window.innerWidth < 640) {
                content.classList.remove('translate-y-0');
                content.classList.add('translate-y-full');
            } else {
                content.classList.remove('modal-content-active');
            }
            
            setTimeout(() => {
                backdrop.classList.remove('modal-active');
                modal.classList.remove('modal-active');
                document.body.style.overflow = 'auto'; 
            }, 300);
        }

        // ==========================================
        // JS MODAL EDIT TUGAS
        // ==========================================
        function openEditModal(id, judul, deskripsi, tgl, jam, poin, tipe) {
            const backdrop = document.getElementById('modalBackdrop');
            const modal = document.getElementById('editAssignmentModal');
            const content = document.getElementById('modalContentEdit');
            const form = document.getElementById('editFormElement');

            form.action = `/dosen/mata-kuliah/{{ $kelas->id }}/penugasan/${id}`;

            document.getElementById('edit_judul').value = judul;
            document.getElementById('edit_deskripsi').value = deskripsi;
            document.getElementById('edit_deadline_tanggal').value = tgl;
            document.getElementById('edit_deadline_jam').value = jam;
            document.getElementById('edit_poin').value = poin;
            document.getElementById('edit_tipe_pengumpulan').value = tipe;
            
            backdrop.classList.add('modal-active');
            modal.classList.add('modal-active');
            document.body.style.overflow = 'hidden'; 
            
            setTimeout(() => { 
                if (window.innerWidth < 640) {
                    content.classList.remove('translate-y-full');
                    content.classList.add('translate-y-0');
                } else {
                    content.classList.add('modal-content-active'); 
                }
            }, 10);
        }

        function closeEditModal() {
            const backdrop = document.getElementById('modalBackdrop');
            const modal = document.getElementById('editAssignmentModal');
            const content = document.getElementById('modalContentEdit');
            
            if (window.innerWidth < 640) {
                content.classList.remove('translate-y-0');
                content.classList.add('translate-y-full');
            } else {
                content.classList.remove('modal-content-active');
            }
            
            setTimeout(() => {
                backdrop.classList.remove('modal-active');
                modal.classList.remove('modal-active');
                document.body.style.overflow = 'auto'; 
            }, 300);
        }

        @if($errors->any() && !old('_method'))
            document.addEventListener('DOMContentLoaded', () => { openCreateModal(); });
        @endif

        // File Input Script
        function handleFilePreview(inputId, nameId, containerId) {
            const input = document.getElementById(inputId);
            const nameLabel = document.getElementById(nameId);
            const container = document.getElementById(containerId);

            if(input) {
                input.addEventListener('change', function () {
                    if (this.files.length > 0) {
                        const file = this.files[0];
                        if(nameLabel) nameLabel.textContent = file.name;
                        if(container) {
                            container.classList.remove('hidden');
                            container.classList.add('flex');
                        }
                    } else {
                        if(container) {
                            container.classList.add('hidden');
                            container.classList.remove('flex');
                        }
                    }
                });
            }
        }

        handleFilePreview('fileInputCreate', 'fileNameCreate', 'filePreviewContainerCreate');
        handleFilePreview('fileInputEdit', 'fileNameEdit', 'filePreviewContainerEdit');

    </script>
</body>
</html>