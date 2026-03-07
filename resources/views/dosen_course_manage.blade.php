<!DOCTYPE html>
<html lang="id" class="h-full">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>Kelola {{ $kelas->mataKuliah->nama }} | Portal Dosen</title>
        
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
            
            input[type="number"] { -moz-appearance: textfield; }
            input[type="number"]::-webkit-outer-spin-button, input[type="number"]::-webkit-inner-spin-button { -webkit-appearance: none; margin: 0; }
            
            .modal-active { display: flex !important; }
            @keyframes popUp { from { opacity: 0; transform: scale(0.95) translateY(10px); } to { opacity: 1; transform: scale(1) translateY(0); } }
            .animate-pop { animation: popUp 0.3s cubic-bezier(0.16, 1, 0.3, 1) forwards; }

            /* Animasi Notifikasi Alert */
            @keyframes slideInRight { from { transform: translateX(100%); opacity: 0; } to { transform: translateX(0); opacity: 1; } }
            @keyframes slideOutRight { from { transform: translateX(0); opacity: 1; } to { transform: translateX(100%); opacity: 0; } }
            .toast-enter { animation: slideInRight 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards; }
            .toast-leave { animation: slideOutRight 0.4s ease-in forwards; }
        </style>
    </head>
    <body class="m-0 font-['Plus_Jakarta_Sans'] bg-[#f1f5f9] text-slate-800 min-h-[100dvh] flex flex-col border-box overflow-x-hidden selection:bg-blue-200 relative">
        
        {{-- AREA NOTIFIKASI / ALERT --}}
        <div id="toast-container" class="fixed top-5 left-0 right-0 mx-auto md:left-auto md:right-8 z-[100] flex flex-col gap-3 w-[90%] md:w-auto max-w-sm pointer-events-none">
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

        {{-- HEADER / NAVBAR MASTER --}}
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
                        <h1 class="text-sm sm:text-lg md:text-2xl font-extrabold text-slate-900 tracking-tight leading-tight truncate">
                            {{ $kelas->mataKuliah->nama }}
                        </h1>
                        <div class="flex flex-wrap sm:flex-nowrap items-center gap-1.5 sm:gap-2 mt-1">
                            <span class="text-[8px] md:text-[10px] font-black text-blue-700 uppercase tracking-widest bg-blue-100 px-1.5 md:px-2.5 py-0.5 md:py-1 rounded-md shrink-0">
                                Kelas {{ $kelas->nama_kelas ?? 'Reguler' }} - {{ $kelas->kode_kelas }}
                            </span>
                            <span class="hidden sm:inline text-slate-300">•</span>
                            <span class="text-[8px] md:text-[11px] font-bold text-slate-400 uppercase tracking-wider truncate">
                                Dosen: {{ auth('dosen')->user()->nama ?? 'Dosen' }}
                            </span>
                        </div>
                    </div>
                </div>

                <div class="hidden md:block w-px h-10 bg-slate-200"></div>

                {{-- Kanan: Menu Tab Sub-Navigasi (Scrollable di Mobile) --}}
                <nav id="scroll-nav-container" class="w-full md:w-auto flex p-1.5 bg-slate-100/80 rounded-xl md:rounded-2xl overflow-x-auto scrollbar-hide snap-x gap-2 border border-slate-200/50 mt-2 md:mt-0">
                    {{-- TAB AKTIF --}}
                    <button id="active-nav-tab" class="snap-start shrink-0 px-4 md:px-6 py-2 md:py-2.5 rounded-lg md:rounded-xl bg-white text-blue-700 font-black text-[9px] md:text-[10px] uppercase tracking-widest shadow-sm border border-slate-200/60 whitespace-nowrap transition-all flex items-center justify-center cursor-default">
                        Materi & Modul
                    </button>

                    <a href="{{ route('dosen.attendance.index', $kelas->id) }}" class="snap-start shrink-0 px-4 md:px-6 py-2 md:py-2.5 rounded-lg md:rounded-xl text-slate-500 hover:text-slate-900 font-bold text-[9px] md:text-[10px] uppercase tracking-widest transition-all whitespace-nowrap hover:bg-white/60 flex items-center justify-center">
                        Absensi
                    </a>
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

        {{-- KONTEN UTAMA --}}
        <main class="flex-1 max-w-7xl mx-auto p-4 md:p-8 w-full space-y-6 md:space-y-10 mb-20 relative">
            
            {{-- HERO SECTION & FORM DESKRIPSI --}}
            <div data-aos="fade-up" data-aos-duration="800" class="bg-white rounded-[1.5rem] md:rounded-[2.5rem] border border-slate-200 shadow-sm overflow-hidden flex flex-col lg:flex-row group">
                
                {{-- Gambar Sampul Kelas --}}
                <div class="w-full lg:w-2/5 bg-slate-100 relative h-48 md:h-64 lg:h-auto overflow-hidden border-b lg:border-b-0 lg:border-r border-slate-200">
                    @if($kelas->sampul)
                        <img src="{{ asset('storage/' . $kelas->sampul) }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" alt="Sampul Kelas">
                    @else
                        <div class="w-full h-full bg-gradient-to-br from-blue-500 via-indigo-600 to-purple-700 flex flex-col items-center justify-center p-6 md:p-8 text-white text-center relative overflow-hidden">
                            <div class="absolute -top-10 -right-10 w-24 md:w-32 h-24 md:h-32 bg-white/10 rounded-full blur-2xl"></div>
                            <div class="absolute -bottom-10 -left-10 w-24 md:w-32 h-24 md:h-32 bg-black/10 rounded-full blur-2xl"></div>
                            
                            <svg class="w-12 h-12 md:w-16 md:h-16 mb-3 md:mb-4 text-white/80 drop-shadow-md transform group-hover:-translate-y-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                            <span class="text-[9px] md:text-[10px] font-black uppercase tracking-[0.2em] text-white/80">Mata Kuliah</span>
                            <h3 class="text-lg md:text-xl font-black mt-1 text-white drop-shadow-sm leading-tight px-4">{{ $kelas->mataKuliah->nama }}</h3>
                        </div>
                    @endif
                </div>

                {{-- Form Deskripsi --}}
                <div class="flex-1 p-5 sm:p-8 lg:p-10 bg-white">
                    <form action="{{ route('dosen.course.updateDeskripsi', $kelas->id) }}" method="POST" class="h-full flex flex-col">
                        @csrf 
                        @method('PUT')
                        <div class="flex justify-between items-center mb-4 md:mb-6">
                            <h3 class="text-lg md:text-xl font-black text-slate-900 tracking-tight flex items-center gap-2">
                                <svg class="w-5 h-5 md:w-6 md:h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
                                Deskripsi Kelas
                            </h3>
                            <button type="submit" class="px-4 py-2 md:px-5 md:py-2.5 bg-slate-900 text-white rounded-lg md:rounded-xl text-[9px] md:text-[10px] font-black uppercase tracking-widest hover:bg-blue-600 transition-colors shadow-md active:scale-95">
                                Simpan
                            </button>
                        </div>
                        <textarea name="deskripsi" class="flex-1 w-full bg-slate-50 border border-slate-200 rounded-xl md:rounded-[1.5rem] p-4 md:p-6 text-xs md:text-sm font-medium text-slate-600 focus:ring-2 focus:ring-blue-500 focus:bg-white transition-all h-32 sm:h-48 lg:h-full resize-none leading-relaxed placeholder:text-slate-400 custom-scrollbar" placeholder="Tuliskan deskripsi ringkas tentang mata kuliah ini... ">{{ old('deskripsi', $kelas->mataKuliah->deskripsi) }}</textarea>
                    </form>
                </div>
            </div>

            {{-- DAFTAR PERTEMUAN --}}
            <div class="space-y-4 md:space-y-6 pt-2 md:pt-6">
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3 sm:gap-4 px-2" data-aos="fade-right">
                    <div>
                        <h3 class="text-lg md:text-xl font-black text-slate-900 tracking-tight">Rencana Pertemuan</h3>
                        <p class="text-[10px] md:text-xs font-bold text-slate-400 mt-0.5 md:mt-1">Kelola silabus dan pertemuan pembelajaran kelas.</p>
                    </div>
                    <button onclick="toggleModal('modalAddSession', true)" class="w-full sm:w-auto justify-center px-5 py-3 md:px-6 md:py-3 bg-blue-600 text-white rounded-xl text-[9px] md:text-[10px] font-black uppercase tracking-widest hover:bg-blue-700 transition-transform transform hover:-translate-y-1 shadow-lg shadow-blue-200 flex items-center gap-2 active:scale-95">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4"></path></svg>
                        Tambah Pertemuan
                    </button>
                </div>

                <div class="space-y-3 md:space-y-4">
                    @forelse ($kelas->courseSessions as $session)
                        <div data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}" class="group bg-white p-4 md:p-6 rounded-[1.5rem] md:rounded-[2rem] border border-slate-200 shadow-sm hover:shadow-xl hover:border-blue-300 transition-all duration-300 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 md:gap-5 relative overflow-hidden transform hover:-translate-y-1">
                            
                            <div class="absolute left-0 top-0 bottom-0 w-1.5 md:w-2 bg-slate-100 group-hover:bg-blue-500 transition-colors duration-300"></div>

                            {{-- Info Pertemuan --}}
                            <div class="flex items-start sm:items-center gap-3 md:gap-5 w-full sm:w-auto pl-2 md:pl-2">
                                <div class="w-10 h-10 md:w-14 md:h-14 bg-slate-50 text-slate-400 rounded-xl md:rounded-2xl flex items-center justify-center font-black text-base md:text-xl shrink-0 group-hover:bg-blue-100 group-hover:text-blue-600 transition-colors border border-slate-100 group-hover:border-blue-200 mt-1 sm:mt-0">
                                    {{ $loop->iteration }}
                                </div>
                                <div class="flex-1">
                                    <h4 class="font-black text-slate-900 text-base md:text-lg mb-0.5 md:mb-1 group-hover:text-blue-700 transition-colors leading-tight">
                                        {{ $session->judul }}
                                    </h4>
                                    <p class="text-[9px] md:text-[10px] text-slate-400 font-bold uppercase tracking-widest flex flex-wrap items-center gap-2">
                                        <span class="flex items-center gap-1"><svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg> {{ $session->materi_count ?? 0 }} Materi</span>
                                        <span class="hidden sm:inline text-slate-300">•</span>
                                        <span class="flex items-center gap-1"><svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"></path></svg> {{ $session->diskusi_count ?? 0 }} Diskusi</span>
                                    </p>
                                </div>
                            </div>

                            {{-- Aksi --}}
                            <div class="flex items-center gap-2 md:gap-3 w-full sm:w-auto ml-10 sm:ml-0 border-t sm:border-t-0 border-slate-100 pt-3 sm:pt-0">
                                <a href="{{ route('dosen.course.session.detail', ['kelas' => $kelas->id, 'session' => $session->id]) }}" class="flex-1 sm:flex-none px-4 py-2.5 md:px-6 md:py-3.5 bg-blue-50 text-blue-700 rounded-xl font-black text-[9px] md:text-[10px] uppercase tracking-widest hover:bg-blue-600 hover:text-white transition-all text-center border border-blue-100 active:scale-95">
                                    Kelola Materi
                                </a>
                                
                                <form action="{{ route('dosen.course.session.destroy', ['kelas' => $kelas->id, 'session' => $session->id]) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pertemuan ini? Semua materi di dalamnya akan ikut terhapus.')" class="shrink-0">
                                    @csrf 
                                    @method('DELETE')
                                    <button type="submit" class="p-2.5 md:p-3.5 bg-slate-50 text-slate-400 hover:bg-red-500 hover:text-white rounded-xl transition-all border border-slate-100 hover:border-red-500 shadow-sm active:scale-95" title="Hapus Pertemuan">
                                        <svg class="w-4 h-4 md:w-4 md:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                    @empty
                        <div class="p-10 md:p-16 text-center bg-white rounded-[1.5rem] md:rounded-[2.5rem] border-2 border-dashed border-slate-200" data-aos="zoom-in">
                            <div class="w-16 h-16 md:w-20 md:h-20 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-3 md:mb-4 text-slate-300">
                                <svg class="w-8 h-8 md:w-10 md:h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                            </div>
                            <h3 class="font-black text-slate-800 text-base md:text-lg mb-1">Belum ada pertemuan</h3>
                            <p class="text-xs md:text-sm font-medium text-slate-400 mb-5 md:mb-6">Mulai tambahkan pertemuan pertama untuk kelas ini.</p>
                            <button onclick="toggleModal('modalAddSession', true)" class="px-5 py-2.5 md:px-6 md:py-2.5 bg-slate-900 text-white rounded-xl text-[9px] md:text-[10px] font-black uppercase tracking-widest hover:bg-blue-600 transition-all shadow-md inline-flex items-center gap-2 active:scale-95">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg> Tambah Pertemuan
                            </button>
                        </div>
                    @endforelse
                </div>
            </div>
        </main>

        {{-- MODAL TAMBAH PERTEMUAN --}}
        <div id="modalAddSession" class="fixed inset-0 z-[100] hidden overflow-hidden">
            <div class="absolute inset-0 bg-slate-900/60 backdrop-blur-sm transition-opacity opacity-0" id="modalBackdrop" onclick="toggleModal('modalAddSession', false)"></div>
            <div class="absolute inset-0 flex items-center justify-center p-4">
                <div id="modalContent" class="bg-white rounded-[1.5rem] md:rounded-[2.5rem] shadow-2xl w-full max-w-lg p-6 md:p-10 transform scale-95 opacity-0 transition-all duration-300 relative">
                    <form action="{{ route('dosen.course.session.store', $kelas->id) }}" method="POST">
                        @csrf
                        <div class="w-12 h-12 md:w-16 md:h-16 bg-blue-50 text-blue-600 rounded-full flex items-center justify-center mb-4 md:mb-6">
                            <svg class="w-6 h-6 md:w-8 md:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                        </div>
                        <h3 class="text-xl md:text-2xl font-black text-slate-900 mb-1 md:mb-2 tracking-tight">Pertemuan Baru</h3>
                        <p class="text-xs md:text-sm text-slate-500 font-medium mb-6 md:mb-8">Tentukan judul atau topik bahasan untuk pertemuan ini.</p>
                        
                        <div class="space-y-4 md:space-y-6">
                            <div>
                                <label class="text-[9px] md:text-[10px] font-black text-slate-400 uppercase tracking-[0.1em] mb-1.5 md:mb-2 block">Judul Pertemuan / Topik</label>
                                <input type="text" name="judul" placeholder="Contoh: Pengenalan Array & Linked List" required class="w-full bg-slate-50 border-2 border-slate-100 rounded-xl md:rounded-2xl px-4 py-3 md:px-5 md:py-4 text-sm md:text-base font-bold text-slate-800 focus:outline-none focus:border-blue-500 focus:bg-white transition-all shadow-sm" />
                            </div>
                            
                            <div class="flex gap-3 md:gap-4 pt-2 md:pt-4 mt-2">
                                <button type="button" onclick="toggleModal('modalAddSession', false)" class="flex-1 py-3.5 md:py-4 bg-slate-100 text-slate-500 rounded-xl md:rounded-2xl font-black text-[9px] md:text-[10px] uppercase tracking-widest hover:bg-slate-200 hover:text-slate-700 transition-all active:scale-95">
                                    Batal
                                </button>
                                <button type="submit" class="flex-1 py-3.5 md:py-4 bg-blue-600 text-white rounded-xl md:rounded-2xl font-black text-[9px] md:text-[10px] uppercase tracking-widest shadow-lg shadow-blue-200 hover:bg-blue-700 transition-transform transform hover:-translate-y-1 active:scale-95">
                                    Simpan 
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            // Inisialisasi AOS (Animasi Scroll)
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

            // Fungsi Penutupan Notifikasi Toast
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

            // Fungsi Toggle Modal dengan Animasi Transisi Halus
            function toggleModal(id, show) {
                const modal = document.getElementById(id);
                const backdrop = document.getElementById('modalBackdrop');
                const content = document.getElementById('modalContent');
                
                if (show) {
                    modal.classList.remove('hidden');
                    setTimeout(() => {
                        backdrop.classList.remove('opacity-0');
                        backdrop.classList.add('opacity-100');
                        content.classList.remove('scale-95', 'opacity-0');
                        content.classList.add('scale-100', 'opacity-100');
                    }, 10);
                } else {
                    backdrop.classList.remove('opacity-100');
                    backdrop.classList.add('opacity-0');
                    content.classList.remove('scale-100', 'opacity-100');
                    content.classList.add('scale-95', 'opacity-0');
                    
                    setTimeout(() => {
                        modal.classList.add('hidden');
                    }, 300);
                }
            }
        </script>
    </body>
</html>