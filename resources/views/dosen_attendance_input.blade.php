<!DOCTYPE html>
<html lang="id" class="h-full">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Input Manual - Pertemuan {{ $session->urutan ?? $session->pertemuan }}: {{ $session->judul }} | Portal Dosen</title>
    
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&display=swap" rel="stylesheet" />
    
    <style>
        html { scroll-behavior: smooth; }
        .scrollbar-hide::-webkit-scrollbar { display: none; }
        .scrollbar-hide { -ms-overflow-style: none; scrollbar-width: none; }
        .custom-scrollbar::-webkit-scrollbar { width: 6px; }
        .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background-color: #cbd5e1; border-radius: 20px; }

        /* Custom Radio Style */
        .radio-input:checked + .radio-label {
            background-color: var(--bg-color);
            color: white;
            border-color: var(--border-color);
            box-shadow: 0 4px 10px -2px var(--shadow-color);
            transform: scale(1.05);
        }
    </style>
</head>
<body class="font-['Plus_Jakarta_Sans'] bg-[#f1f5f9] text-slate-800 min-h-[100dvh] flex flex-col border-box overflow-x-hidden overflow-y-scroll custom-scrollbar selection:bg-blue-200 relative">
    
    {{-- BACKGROUND DEKORASI --}}
    <div class="fixed top-0 left-0 w-full h-full overflow-hidden -z-10 pointer-events-none">
        <div class="absolute top-[-10%] right-[-5%] w-64 md:w-[400px] h-64 md:h-[400px] bg-blue-100/40 rounded-full blur-3xl opacity-50"></div>
        <div class="absolute bottom-[-10%] left-[-10%] w-64 md:w-[400px] h-64 md:h-[400px] bg-indigo-50/40 rounded-full blur-3xl opacity-50"></div>
    </div>

    {{-- NAVBAR MOBILE-FRIENDLY --}}
    <div class="bg-white/90 backdrop-blur-2xl border-b border-slate-200/60 sticky top-0 z-40 px-3 sm:px-4 md:px-8 py-2.5 sm:py-4 shadow-sm transition-all w-full shrink-0">
        <div class="max-w-7xl mx-auto grid grid-cols-3 items-center relative h-10 sm:h-12">
            
            {{-- Kiri: Tombol Back --}}
            <div class="flex items-center justify-start shrink-0">
                <a href="{{ route('dosen.attendance.index', $kelas->id) }}" class="w-9 h-9 sm:w-11 sm:h-11 md:w-12 md:h-12 rounded-full bg-slate-100 hover:bg-blue-600 text-slate-500 hover:text-white flex items-center justify-center transition-all duration-300 shadow-sm group border border-slate-200 hover:border-blue-600 active:scale-95">
                    <svg class="w-4 h-4 sm:w-5 sm:h-5 md:w-6 md:h-6 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </a>
            </div>

            {{-- Tengah: Judul & Info --}}
            <div class="flex flex-col items-center justify-center justify-self-center w-full max-w-[180px] sm:max-w-none pointer-events-none">
                <h1 class="text-sm sm:text-lg md:text-xl font-extrabold text-slate-900 tracking-tight leading-none truncate w-full text-center pointer-events-auto">
                    Input Presensi
                </h1>
                <div class="flex flex-wrap sm:flex-nowrap items-center justify-center gap-1 sm:gap-2 mt-1 sm:mt-1.5 pointer-events-auto">
                    <span class="text-[8px] sm:text-[9px] md:text-[10px] font-bold text-blue-600 uppercase tracking-widest bg-blue-100 px-1.5 sm:px-2 py-0.5 rounded-md whitespace-nowrap">
                        Sesi {{ $session->urutan ?? $session->pertemuan }}
                    </span>
                    <span class="hidden sm:inline text-slate-300">•</span>
                    <span class="text-[8px] sm:text-[9px] md:text-[10px] font-bold text-slate-500 uppercase tracking-wider truncate whitespace-nowrap">
                        Kelas {{ $kelas->nama_kelas ?? 'Reguler' }} - {{ $kelas->kode_kelas ?? '-' }}
                    </span>
                </div>
            </div>
            
            {{-- Kanan: Kosong untuk keseimbangan --}}
            <div class="justify-self-end w-9 h-9 sm:w-11 sm:h-11"></div>
            
        </div>
    </div>

    <main class="flex-1 max-w-7xl mx-auto p-3 sm:p-4 md:p-8 w-full space-y-4 sm:space-y-6 md:space-y-8 mb-10 sm:mb-20 relative z-10">
        
        <form action="{{ route('dosen.attendance.storeManual', $session->id) }}" method="POST">
            @csrf
            
            {{-- HERO INFO & TOMBOL SUBMIT --}}
            <div data-aos="fade-down" data-aos-duration="600" class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-4 sm:gap-6 bg-white p-5 sm:p-8 md:p-10 rounded-[1.5rem] sm:rounded-[2.5rem] border border-slate-200 shadow-sm mb-4 sm:mb-6">
                <div class="w-full lg:w-auto">
                    <span class="inline-block px-3 sm:px-3.5 py-1 sm:py-1.5 bg-blue-50 text-blue-600 rounded-lg sm:rounded-xl text-[9px] sm:text-[10px] font-black uppercase tracking-widest mb-2 sm:mb-3 border border-blue-100 shadow-sm">
                        Status: Sedang Berlangsung
                    </span>
                    <h2 class="text-xl sm:text-2xl md:text-3xl font-black text-slate-900 tracking-tight mb-1.5 sm:mb-2 leading-tight">
                        Pertemuan {{ $session->urutan ?? $session->pertemuan }}: {{ $session->judul }}
                    </h2>
                    <p class="text-xs sm:text-sm text-slate-500 font-medium">
                        {{ $session->tanggal ? \Carbon\Carbon::parse($session->tanggal)->translatedFormat('l, d M Y') : 'Hari Ini' }} 
                        @if($session->jam_mulai)
                            <span class="inline-block mx-1">•</span> {{ \Carbon\Carbon::parse($session->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($session->jam_selesai)->format('H:i') }} WIB
                        @endif
                    </p>
                </div>
                
                <div class="flex gap-2 sm:gap-3 w-full lg:w-auto mt-2 lg:mt-0">
                    <button type="reset" class="flex-1 lg:flex-none px-4 sm:px-6 py-3 sm:py-3.5 rounded-xl border-2 border-slate-200 text-slate-500 font-black text-[10px] sm:text-[11px] uppercase tracking-widest hover:bg-slate-100 hover:text-slate-700 transition-all active:scale-95 text-center">
                        Reset
                    </button>
                    <button type="submit" class="flex-1 lg:flex-none px-4 sm:px-8 py-3 sm:py-3.5 bg-blue-600 text-white rounded-xl font-black text-[10px] sm:text-[11px] uppercase tracking-widest hover:bg-blue-700 hover:-translate-y-0.5 transition-all shadow-lg shadow-blue-200 active:scale-95 text-center">
                        Simpan Presensi
                    </button>
                </div>
            </div>

            {{-- LIST MAHASISWA --}}
            <div data-aos="fade-up" data-aos-duration="800" data-aos-delay="100" class="bg-white rounded-[1.5rem] sm:rounded-[2.5rem] border border-slate-200 shadow-sm overflow-hidden">
                
                <div class="bg-slate-50/80 p-4 sm:p-6 md:px-8 border-b border-slate-100 flex justify-between items-center sticky top-0 z-20 backdrop-blur-md">
                    <h3 class="font-black text-slate-800 text-[11px] sm:text-sm uppercase tracking-wider">
                        Mahasiswa ({{ $mahasiswa->count() }})
                    </h3>
                    <div class="flex items-center gap-1.5 sm:gap-2 bg-white px-2.5 sm:px-3 py-1.5 rounded-lg border border-slate-200 shadow-sm">
                        <span class="w-2 sm:w-2.5 h-2 sm:h-2.5 bg-emerald-500 rounded-full inline-block animate-pulse"></span>
                        <span class="text-[8px] sm:text-[10px] font-bold text-slate-500 uppercase tracking-widest">Default: Hadir</span>
                    </div>
                </div>

                <div class="divide-y divide-slate-100 p-2 sm:p-4">
                    @foreach($mahasiswa as $index => $mhs)
                        @php
                            // Default 'hadir'
                            $selected = isset($attendances[$mhs->id]) ? $attendances[$mhs->id]->status : 'hadir';
                        @endphp

                        <div class="p-3 sm:p-4 md:p-5 flex flex-col lg:flex-row lg:items-center justify-between gap-3 sm:gap-5 hover:bg-slate-50 rounded-xl sm:rounded-2xl transition-colors group">
                            
                            {{-- Info Mhs --}}
                            <div class="flex items-center gap-3 sm:gap-4 lg:gap-5 w-full lg:w-auto pl-1 sm:pl-0">
                                <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-[0.8rem] sm:rounded-2xl bg-indigo-50 text-indigo-600 flex items-center justify-center font-black text-sm sm:text-lg shrink-0 border border-indigo-100 group-hover:bg-indigo-100 transition-colors">
                                    {{ strtoupper(substr($mhs->nama, 0, 2)) }}
                                </div>
                                <div class="flex-1 overflow-hidden">
                                    <h4 class="font-bold text-slate-900 text-xs sm:text-sm md:text-base mb-0.5 group-hover:text-blue-600 transition-colors line-clamp-1">
                                        {{ $mhs->nama }}
                                    </h4>
                                    <p class="text-[9px] sm:text-[10px] md:text-xs font-mono text-slate-400 font-medium tracking-wide">
                                        {{ $mhs->nim }}
                                    </p>
                                </div>
                            </div>

                            {{-- Pilihan Absensi Khusus Mobile Lebih Lebar --}}
                            <div class="flex items-center justify-between lg:justify-end gap-1.5 sm:gap-2 bg-white p-1 sm:p-1.5 rounded-xl sm:rounded-[1.25rem] border border-slate-200 shadow-sm w-full lg:w-auto mt-1 lg:mt-0">

                                {{-- HADIR --}}
                                <label class="cursor-pointer relative group/radio flex-1 lg:flex-none">
                                    <input type="radio" name="attendance[{{ $mhs->id }}]" value="hadir" class="radio-input hidden" {{ $selected == 'hadir' ? 'checked' : '' }} />
                                    <div class="radio-label w-full lg:w-14 h-10 md:h-12 rounded-lg sm:rounded-xl flex items-center justify-center font-black text-[10px] sm:text-xs md:text-sm text-slate-400 bg-slate-50 hover:bg-emerald-50 hover:text-emerald-500 transition-all border border-transparent shadow-none" 
                                         style="--bg-color: #10b981; --border-color: #059669; --shadow-color: rgba(16, 185, 129, 0.4);">
                                        <span class="lg:hidden">Hadir</span>
                                        <span class="hidden lg:inline">H</span>
                                    </div>
                                </label>

                                {{-- IZIN --}}
                                <label class="cursor-pointer relative group/radio flex-1 lg:flex-none">
                                    <input type="radio" name="attendance[{{ $mhs->id }}]" value="izin" class="radio-input hidden" {{ $selected == 'izin' ? 'checked' : '' }} />
                                    <div class="radio-label w-full lg:w-14 h-10 md:h-12 rounded-lg sm:rounded-xl flex items-center justify-center font-black text-[10px] sm:text-xs md:text-sm text-slate-400 bg-slate-50 hover:bg-blue-50 hover:text-blue-500 transition-all border border-transparent shadow-none" 
                                         style="--bg-color: #3b82f6; --border-color: #2563eb; --shadow-color: rgba(59, 130, 246, 0.4);">
                                        <span class="lg:hidden">Izin</span>
                                        <span class="hidden lg:inline">I</span>
                                    </div>
                                </label>

                                {{-- SAKIT --}}
                                <label class="cursor-pointer relative group/radio flex-1 lg:flex-none">
                                    <input type="radio" name="attendance[{{ $mhs->id }}]" value="sakit" class="radio-input hidden" {{ $selected == 'sakit' ? 'checked' : '' }} />
                                    <div class="radio-label w-full lg:w-14 h-10 md:h-12 rounded-lg sm:rounded-xl flex items-center justify-center font-black text-[10px] sm:text-xs md:text-sm text-slate-400 bg-slate-50 hover:bg-amber-50 hover:text-amber-500 transition-all border border-transparent shadow-none" 
                                         style="--bg-color: #f59e0b; --border-color: #d97706; --shadow-color: rgba(245, 158, 11, 0.4);">
                                        <span class="lg:hidden">Sakit</span>
                                        <span class="hidden lg:inline">S</span>
                                    </div>
                                </label>

                                {{-- ALPHA --}}
                                <label class="cursor-pointer relative group/radio flex-1 lg:flex-none">
                                    <input type="radio" name="attendance[{{ $mhs->id }}]" value="alpha" class="radio-input hidden" {{ $selected == 'alpha' ? 'checked' : '' }} />
                                    <div class="radio-label w-full lg:w-14 h-10 md:h-12 rounded-lg sm:rounded-xl flex items-center justify-center font-black text-[10px] sm:text-xs md:text-sm text-slate-400 bg-slate-50 hover:bg-red-50 hover:text-red-500 transition-all border border-transparent shadow-none" 
                                         style="--bg-color: #ef4444; --border-color: #dc2626; --shadow-color: rgba(239, 68, 68, 0.4);">
                                        <span class="lg:hidden">Alpha</span>
                                        <span class="hidden lg:inline">A</span>
                                    </div>
                                </label>

                            </div>
                        </div>

                    @endforeach

                </div>

                <div class="p-4 sm:p-5 sm:p-6 bg-slate-50 border-t border-slate-100 flex justify-center">
                    <span class="text-[9px] sm:text-[10px] font-black text-slate-400 uppercase tracking-widest">
                        Total: {{ $mahasiswa->count() }} Mahasiswa
                    </span>
                </div>
            </div>
        </form>
    </main>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({ once: true, easing: 'ease-out-cubic', duration: 800 });

        // Fungsi Reset mengembalikan ke "hadir"
        document.querySelector('button[type="reset"]').addEventListener('click', function(e) {
            e.preventDefault(); 
            document.querySelectorAll('input[value="hadir"]').forEach(function(el) {
                el.checked = true;
            });
        });
    </script>
    <x-accessibility-widget />
</body>
</html>