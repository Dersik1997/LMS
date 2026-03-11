<!DOCTYPE html>
<html lang="id" class="h-full">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>Presensi - {{ $kelas->mataKuliah->nama ?? 'Mata Kuliah' }} | LMS Inklusi UMMI</title>

        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet" />

        <style>
            html { scrollbar-gutter: stable; }
            .custom-scrollbar::-webkit-scrollbar { width: 5px; height: 5px; }
            .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
            .custom-scrollbar::-webkit-scrollbar-thumb { background-color: #cbd5e1; border-radius: 20px; }
            .scrollbar-hide::-webkit-scrollbar { display: none; }
            .scrollbar-hide { -ms-overflow-style: none; scrollbar-width: none; }
            .wave-bar { transition: height 0.1s ease; }
        </style>
    </head>
    <body class="m-0 font-['Plus_Jakarta_Sans'] bg-[#f8fafc] min-h-[100dvh] flex flex-col border-box overflow-x-hidden text-slate-800">
        
        <div class="fixed top-0 left-0 w-full h-full overflow-hidden -z-10 pointer-events-none">
            <div class="absolute top-[-10%] right-[-5%] w-64 md:w-[400px] h-64 md:h-[400px] bg-blue-100/40 rounded-full blur-3xl opacity-50"></div>
            <div class="absolute bottom-[-10%] left-[-10%] w-64 md:w-[400px] h-64 md:h-[400px] bg-indigo-50/40 rounded-full blur-3xl opacity-50"></div>
        </div>

        <main class="flex-1 flex flex-col h-full overflow-y-auto custom-scrollbar relative">
            <div class="bg-white/90 backdrop-blur-2xl border-b border-slate-200/60 sticky top-0 z-40 px-3 sm:px-4 md:px-8 py-3 sm:py-4 shadow-sm transition-all w-full cursor-pointer" id="voice-header" title="Ketuk untuk memotong suara sistem">
                <div class="max-w-7xl mx-auto flex flex-col lg:flex-row lg:items-center justify-between gap-3 lg:gap-6 relative pointer-events-none">
                    
                    <div class="flex items-center justify-between w-full lg:w-auto gap-3 relative z-10 pointer-events-auto">
                        <div class="flex items-center gap-3 md:gap-4 flex-1 min-w-0">
                            <button onclick="navigasiKe(0)" class="w-10 h-10 md:w-12 md:h-12 rounded-full bg-slate-100 hover:bg-blue-600 text-slate-500 hover:text-white flex items-center justify-center transition-all duration-300 shadow-sm shrink-0 group border border-slate-200 hover:border-blue-600 relative cursor-pointer active:scale-95">
                                <svg class="w-5 h-5 md:w-6 md:h-6 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path>
                                </svg>
                                <span class="absolute -bottom-1 -right-1 bg-slate-800 text-white text-[9px] font-black px-1.5 py-0.5 rounded-md border border-white shadow-sm">0</span>
                            </button>
                            
                            <div class="hidden sm:block text-left cursor-pointer group shrink-0" onclick="navigasiKe(0)">
                                <span class="block text-[8px] md:text-[9px] font-bold text-slate-400 uppercase tracking-widest">Navigasi Suara</span>
                                <span class="block text-[10px] md:text-xs font-black text-slate-700 group-hover:text-blue-600 transition-colors">0 - Kembali</span>
                            </div>
                            
                            <div class="hidden lg:block w-px h-10 bg-slate-200 mx-1 md:mx-2"></div>
                            
                            <div class="overflow-hidden flex-1 pointer-events-none">
                                <h1 class="text-sm md:text-xl font-extrabold text-slate-900 tracking-tight leading-none truncate">
                                    {{ $session->kelas->mataKuliah->nama ?? 'Mata Kuliah' }}
                                </h1>
                                <p class="text-[8px] md:text-[10px] font-bold text-blue-600 uppercase tracking-widest mt-1 truncate">
                                    Dosen: {{ $session->kelas->dosen->nama ?? '-' }}
                                </p>
                            </div>
                        </div>

                        <div class="flex lg:hidden items-center justify-end gap-1.5 shrink-0 pl-2">
                            <div class="flex items-center gap-[2px] h-4 w-6 justify-center" id="wave-container-mobile">
                                <div class="wave-bar w-[2px] bg-blue-500 rounded-full h-1 transition-all"></div>
                                <div class="wave-bar w-[2px] bg-blue-400 rounded-full h-1 transition-all"></div>
                                <div class="wave-bar w-[2px] bg-blue-600 rounded-full h-1 transition-all"></div>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center justify-between lg:justify-end gap-2 md:gap-4 w-full lg:w-auto pointer-events-auto">
                        <nav class="w-full lg:w-auto flex p-1.5 bg-slate-100/80 rounded-xl overflow-x-auto scrollbar-hide snap-x gap-1 border border-slate-200/50">
                            <button onclick="navigasiKe(1)" class="cursor-pointer active:scale-95 snap-start shrink-0 px-4 md:px-5 py-1.5 md:py-2 rounded-lg text-slate-500 hover:text-slate-900 hover:bg-white/50 font-bold text-[9px] md:text-[10px] uppercase tracking-widest border border-transparent whitespace-nowrap transition-all">
                                1. Pembelajaran
                            </button>
                            <button onclick="navigasiKe(2)" class="cursor-pointer active:scale-95 snap-start shrink-0 px-4 md:px-5 py-1.5 md:py-2 rounded-lg bg-white text-blue-700 font-bold text-[9px] md:text-[10px] uppercase tracking-widest shadow-sm border border-slate-200 whitespace-nowrap transition-all">
                                2. Presensi
                            </button>
                            <button onclick="navigasiKe(3)" class="cursor-pointer active:scale-95 snap-start shrink-0 px-4 md:px-5 py-1.5 md:py-2 rounded-lg text-slate-500 hover:text-slate-900 hover:bg-white/50 font-bold text-[9px] md:text-[10px] uppercase tracking-widest border border-transparent whitespace-nowrap transition-all">
                                3. Penugasan
                            </button>
                            <button onclick="navigasiKe(4)" class="cursor-pointer active:scale-95 snap-start shrink-0 px-4 md:px-5 py-1.5 md:py-2 rounded-lg text-slate-500 hover:text-slate-900 hover:bg-white/50 font-bold text-[9px] md:text-[10px] uppercase tracking-widest border border-transparent whitespace-nowrap transition-all">
                                4. Anggota
                            </button>
                        </nav>
                        
                        <div class="hidden lg:flex items-center gap-3 pl-4 border-l border-slate-200 relative z-10 justify-end shrink-0 w-32 pointer-events-none">
                            <div class="flex items-center gap-[2px] h-4 w-10 justify-center" id="wave-container-desktop">
                                <div class="wave-bar w-[2px] bg-blue-500 rounded-full h-1 transition-all"></div>
                                <div class="wave-bar w-[2px] bg-blue-400 rounded-full h-1 transition-all"></div>
                                <div class="wave-bar w-[2px] bg-blue-600 rounded-full h-1 transition-all"></div>
                            </div>
                            <span id="status-desc" class="text-[9px] font-black text-slate-400 uppercase tracking-widest w-full text-left pointer-events-auto">MENYIAPKAN</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="max-w-6xl mx-auto w-full p-4 md:p-6 lg:p-8 space-y-6 sm:space-y-8 pb-20">
                
                <div class="grid grid-cols-2 md:grid-cols-4 gap-3 sm:gap-4">
                    <div data-aos="fade-up" data-aos-duration="600" class="bg-blue-600 text-white p-4 sm:p-6 rounded-[1.5rem] sm:rounded-[2rem] shadow-lg shadow-blue-200/50 flex flex-col justify-between h-24 sm:h-32 relative overflow-hidden group">
                        <div class="relative z-10">
                            <h3 class="text-2xl sm:text-4xl font-black tracking-tighter">
                                @php
                                $total = $stats['hadir'] + $stats['izin'] + $stats['sakit'] + $stats['alpha'];
                                $persen = $total > 0 ? round(($stats['hadir'] / $total) * 100) : 0;
                                @endphp
                                {{ $persen }}%
                            </h3>
                            <p class="text-[8px] sm:text-[9px] font-bold text-blue-200 uppercase tracking-widest mt-1">Total Kehadiran</p>
                        </div>
                        <div class="absolute -right-4 -bottom-4 opacity-20 group-hover:scale-110 transition-transform">
                            <svg class="w-16 h-16 sm:w-24 sm:h-24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                    </div>

                    <div data-aos="fade-up" data-aos-duration="600" data-aos-delay="100" class="bg-white p-4 sm:p-6 rounded-[1.5rem] sm:rounded-[2rem] border border-emerald-100 shadow-sm flex flex-col justify-center items-center text-center">
                        <div class="w-8 h-8 sm:w-10 sm:h-10 rounded-full bg-emerald-50 text-emerald-600 flex items-center justify-center mb-1.5 sm:mb-2">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                        </div>
                        <span class="text-xl sm:text-2xl font-black text-slate-900">{{ $stats['hadir'] }}</span>
                        <span class="text-[8px] sm:text-[9px] font-bold text-slate-400 uppercase tracking-widest">Hadir</span>
                    </div>

                    <div data-aos="fade-up" data-aos-duration="600" data-aos-delay="200" class="bg-white p-4 sm:p-6 rounded-[1.5rem] sm:rounded-[2rem] border border-orange-100 shadow-sm flex flex-col justify-center items-center text-center">
                        <div class="w-8 h-8 sm:w-10 sm:h-10 rounded-full bg-orange-50 text-orange-600 flex items-center justify-center mb-1.5 sm:mb-2">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <span class="text-xl sm:text-2xl font-black text-slate-900">{{ $stats['izin'] + $stats['sakit'] }}</span>
                        <span class="text-[8px] sm:text-[9px] font-bold text-slate-400 uppercase tracking-widest">Izin/Sakit</span>
                    </div>

                    <div data-aos="fade-up" data-aos-duration="600" data-aos-delay="300" class="bg-white p-4 sm:p-6 rounded-[1.5rem] sm:rounded-[2rem] border border-red-100 shadow-sm flex flex-col justify-center items-center text-center">
                        <div class="w-8 h-8 sm:w-10 sm:h-10 rounded-full bg-red-50 text-red-600 flex items-center justify-center mb-1.5 sm:mb-2">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M6 18L18 6M6 6l12 12"></path></svg>
                        </div>
                        <span class="text-xl sm:text-2xl font-black text-slate-900">{{ $stats['alpha'] }}</span>
                        <span class="text-[8px] sm:text-[9px] font-bold text-slate-400 uppercase tracking-widest">Alpha</span>
                    </div>
                </div>

                <div class="space-y-4">
                    <h3 data-aos="fade-in" class="text-xs sm:text-sm font-black text-slate-900 uppercase tracking-widest px-1 sm:px-2">Riwayat Pertemuan</h3>

                    {{-- 🔵 PERTEMUAN SEDANG BERLANGSUNG --}}
                    @php
                        $attendanceCurrent = null;
                        if($currentSession) {
                            $attendanceCurrent = $myAttendances[$currentSession->id] ?? null;
                        }
                    @endphp

                    @if ($currentSession)
                        <div data-aos="fade-up" data-aos-duration="600" class="group bg-white rounded-[1.5rem] sm:rounded-[2.5rem] p-1 border-2 {{ $attendanceCurrent ? 'border-emerald-500 shadow-emerald-100' : 'border-blue-500 shadow-blue-100' }} shadow-lg relative overflow-hidden transition-transform hover:scale-[1.01]">
                            
                            <div class="absolute top-0 right-0 {{ $attendanceCurrent ? 'bg-emerald-500' : 'bg-blue-500 animate-pulse' }} text-white text-[8px] sm:text-[9px] font-black px-3 sm:px-4 py-1 rounded-bl-lg sm:rounded-bl-xl uppercase tracking-widest shadow-sm">
                                {{ $attendanceCurrent ? 'Sudah Absen' : 'Sedang Berlangsung' }}
                            </div>

                            <div class="p-4 sm:p-6">
                                <div class="flex flex-col sm:flex-row items-center gap-4 sm:gap-6 mb-4 sm:mb-6 mt-4 sm:mt-0">
                                    <div class="w-16 h-16 sm:w-20 sm:h-20 rounded-xl sm:rounded-2xl {{ $attendanceCurrent ? 'bg-emerald-50 text-emerald-600 border-emerald-100' : 'bg-blue-50 text-blue-600 border-blue-100' }} flex flex-col items-center justify-center shrink-0 border">
                                       <span class="text-[8px] sm:text-[10px] font-black uppercase tracking-widest {{ $attendanceCurrent ? 'text-emerald-400' : 'text-blue-400' }}">
                                            {{ \Carbon\Carbon::parse($currentSession->created_at)->translatedFormat('M') }}
                                        </span>
                                        <span class="text-xl sm:text-3xl font-black">
                                            {{ \Carbon\Carbon::parse($currentSession->created_at)->translatedFormat('d') }}
                                        </span>
                                    </div>

                                    <div class="flex-1 text-center sm:text-left">
                                        <h4 class="text-base sm:text-lg font-black text-slate-900">
                                            Pertemuan {{ $currentSession->urutan }}: {{ $currentSession->judul }}
                                        </h4>
                                        <p class="text-[10px] sm:text-xs font-medium text-slate-500 mt-1">
                                            {{ $attendanceCurrent ? 'Anda sudah mengisi kehadiran.' : 'Silahkan isi kehadiran sesuai jam pembelajaran.' }}
                                        </p>

                                        @if(!$attendanceCurrent)
                                            <div class="mt-2 sm:mt-3 inline-flex items-center gap-1.5 sm:gap-2 bg-blue-50 px-2 sm:px-3 py-1 rounded-md sm:rounded-lg">
                                                <span class="w-1.5 h-1.5 sm:w-2 sm:h-2 bg-blue-500 rounded-full animate-pulse"></span>
                                                <span class="text-[8px] sm:text-[9px] font-bold text-blue-600 uppercase tracking-widest">Presensi Dibuka</span>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                {{-- BUTTON PRESENSI --}}
                                @if(!$attendanceCurrent)
                                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 sm:gap-4 pt-3 sm:pt-4 border-t border-slate-100">
                                        <button onclick="navigasiKe(5)" class="cursor-pointer active:scale-95 flex items-center justify-center gap-2 sm:gap-3 w-full bg-emerald-500 text-white px-4 sm:px-6 py-3 sm:py-4 rounded-xl sm:rounded-2xl font-black text-[9px] sm:text-[10px] uppercase tracking-[0.1em] sm:tracking-[0.2em] shadow-lg hover:bg-emerald-600 hover:-translate-y-1 transition-all">
                                            <span class="bg-white/20 w-5 h-5 sm:w-6 sm:h-6 rounded-full flex items-center justify-center text-[10px] sm:text-xs">5</span> Hadir
                                        </button>
                                        <button onclick="navigasiKe(6)" class="cursor-pointer active:scale-95 flex items-center justify-center gap-2 sm:gap-3 w-full bg-orange-500 text-white px-4 sm:px-6 py-3 sm:py-4 rounded-xl sm:rounded-2xl font-black text-[9px] sm:text-[10px] uppercase tracking-[0.1em] sm:tracking-[0.2em] shadow-lg hover:bg-orange-600 hover:-translate-y-1 transition-all">
                                            <span class="bg-white/20 w-5 h-5 sm:w-6 sm:h-6 rounded-full flex items-center justify-center text-[10px] sm:text-xs">6</span> Sakit
                                        </button>
                                        <button onclick="navigasiKe(7)" class="cursor-pointer active:scale-95 flex items-center justify-center gap-2 sm:gap-3 w-full bg-blue-500 text-white px-4 sm:px-6 py-3 sm:py-4 rounded-xl sm:rounded-2xl font-black text-[9px] sm:text-[10px] uppercase tracking-[0.1em] sm:tracking-[0.2em] shadow-lg hover:bg-blue-600 hover:-translate-y-1 transition-all">
                                            <span class="bg-white/20 w-5 h-5 sm:w-6 sm:h-6 rounded-full flex items-center justify-center text-[10px] sm:text-xs">7</span> Izin
                                        </button>
                                    </div>
                                @else
                                    <div class="pt-3 sm:pt-4 border-t border-slate-100 flex justify-center sm:justify-start">
                                        <button disabled class="w-full sm:w-auto px-6 py-3 rounded-xl font-black text-[10px] justify-center uppercase tracking-widest border flex items-center gap-2 cursor-not-allowed bg-emerald-50 text-emerald-600 border-emerald-100">
                                            ✔ Kehadiran Tercatat: {{ ucfirst($attendanceCurrent->status) }}
                                        </button>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif

                    {{-- ⚪ RIWAYAT PERTEMUAN SEBELUMNYA --}}
                    @foreach ($sessions->where('id','!=', optional($currentSession)->id) as $session)
                        @php
                            $attendance = $myAttendances[$session->id] ?? null;
                        @endphp

                        <div data-aos="fade-up" data-aos-duration="600" class="bg-white rounded-[1.5rem] sm:rounded-[2.5rem] p-4 sm:p-6 border border-slate-200 shadow-sm flex flex-col sm:flex-row items-center gap-4 sm:gap-6 {{ $attendance ? '' : 'opacity-60' }}">
                            <div class="w-12 h-12 sm:w-16 sm:h-16 rounded-xl sm:rounded-2xl bg-slate-50 text-slate-400 flex flex-col items-center justify-center shrink-0">
                                <span class="text-[7px] sm:text-[8px] font-black uppercase tracking-widest">
                                    {{ \Carbon\Carbon::parse($session->tanggal)->translatedFormat('M') }}
                                </span>
                                <span class="text-lg sm:text-2xl font-black">
                                    {{ \Carbon\Carbon::parse($session->tanggal)->translatedFormat('d') }}
                                </span>
                            </div>

                            <div class="flex-1 text-center sm:text-left">
                                <h4 class="text-sm sm:text-base font-bold text-slate-700">
                                    Pertemuan {{ $session->urutan }}: {{ $session->judul }}
                                </h4>
                                <p class="text-[9px] sm:text-[10px] font-medium text-slate-400 mt-1">
                                    {{ $session->jam_mulai }} - {{ $session->jam_selesai }} WIB
                                </p>
                            </div>

                            @if ($attendance)
                                <button disabled class="w-full sm:w-auto px-4 sm:px-6 py-2 rounded-lg sm:rounded-xl font-black text-[9px] sm:text-[10px] justify-center uppercase tracking-widest border flex items-center gap-1.5 sm:gap-2 cursor-not-allowed {{ $attendance->status === 'hadir' ? 'bg-emerald-50 text-emerald-600 border-emerald-100' : ($attendance->status === 'izin' ? 'bg-blue-50 text-blue-600 border-blue-100' : 'bg-orange-50 text-orange-600 border-orange-100') }}">
                                    ✔ {{ ucfirst($attendance->status) }}
                                </button>
                            @else
                                <span class="w-full sm:w-auto text-center text-[9px] sm:text-[10px] font-bold text-slate-400 uppercase tracking-widest">
                                    Belum Absen
                                </span>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </main>

        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            AOS.init({ once: true, easing: "ease-out-cubic" });

            const statusDesc = document.getElementById("status-desc");
            const waveBarsDesktop = document.querySelectorAll("#wave-container-desktop .wave-bar");
            const waveBarsMobile = document.querySelectorAll("#wave-container-mobile .wave-bar");
            const synth = window.speechSynthesis;

            // 🔐 SESSION ID AMAN (sinkron Blade)
            const CURRENT_SESSION_ID = @json(optional($currentSession)->id);
            
            // Variabel Data Statistik untuk Suara
            const namaMatkul = "{{ $kelas->mataKuliah->nama ?? 'Mata Kuliah' }}";
            const hasActiveSession = {{ $currentSession ? 'true' : 'false' }};
            const activeUrutan = "{{ $currentSession->urutan ?? '' }}";
            const isAlreadyAbsen = {{ $attendanceCurrent ? 'true' : 'false' }};
            const statusAbsenSekarang = "{{ $attendanceCurrent->status ?? '' }}";

            let rec = null;
            let waveInterval;
            let isRecActive = false;
            let isRedirecting = false;
            let isSpeaking = false;

            if ('webkitSpeechRecognition' in window || 'SpeechRecognition' in window) {
                const SpeechRec = window.webkitSpeechRecognition || window.SpeechRecognition;
                rec = new SpeechRec();
                rec.lang = "id-ID";
                rec.continuous = true;
                rec.interimResults = true; // Kunci Voice Barge-in
            }

            function setWave(active) {
                if (active) {
                    if (waveInterval) clearInterval(waveInterval);
                    waveInterval = setInterval(() => {
                        if (waveBarsDesktop.length > 0) {
                            waveBarsDesktop.forEach((bar) => { bar.style.height = `${Math.floor(Math.random() * 12) + 4}px`; });
                        }
                        if (waveBarsMobile.length > 0) {
                            waveBarsMobile.forEach((bar) => { bar.style.height = `${Math.floor(Math.random() * 12) + 4}px`; });
                        }
                    }, 100);
                } else {
                    clearInterval(waveInterval);
                    if (waveBarsDesktop.length > 0) waveBarsDesktop.forEach((bar) => (bar.style.height = "4px"));
                    if (waveBarsMobile.length > 0) waveBarsMobile.forEach((bar) => (bar.style.height = "4px"));
                }
            }

            // Fitur Cut-Off Manual klik layar
            document.body.addEventListener('click', (e) => {
                if (e.target.tagName === 'BUTTON' || e.target.tagName === 'A' || e.target.closest('button') || e.target.closest('a')) return;
                if (isSpeaking && !isRedirecting) {
                    synth.cancel();
                    setWave(false);
                }
            });

            function bicara(teks, callback = null) {
                if (isRedirecting) return;
                synth.cancel();

                setTimeout(() => {
                    const utter = new SpeechSynthesisUtterance(teks);
                    utter.lang = "id-ID";
                    utter.rate = parseFloat(localStorage.getItem("speechRate")) || 1.0;

                    utter.onstart = () => {
                        isSpeaking = true;
                        if (statusDesc) {
                            statusDesc.innerText = "BERBICARA...";
                            statusDesc.classList.replace("text-slate-400", "text-blue-600");
                        }
                        setWave(true);
                        mulaiMendengar(); 
                    };

                    utter.onend = () => {
                        isSpeaking = false;
                        setWave(false);
                        if (!isRedirecting && statusDesc) {
                            statusDesc.innerText = "MENDENGARKAN";
                            statusDesc.classList.replace("text-blue-600", "text-green-600");
                        }
                        if (callback) callback();
                    };

                    utter.onerror = () => {
                        isSpeaking = false;
                        setWave(false);
                        mulaiMendengar();
                    };

                    synth.speak(utter);
                }, 50);
            }

            function mulaiMendengar() {
                if (!rec || isRedirecting || isRecActive) return;
                try {
                    rec.start();
                    isRecActive = true;
                } catch (e) {
                    console.error("Mic error:", e);
                }
            }

            // =====================================
            // LOGIKA PANDUAN PINTAR BERDASARKAN STATUS ABSEN
            // =====================================
            function getPanduanSuara() {
                let teks = `Halaman Presensi kelas ${namaMatkul}. `;

                if (hasActiveSession) {
                    if (isAlreadyAbsen) {
                        teks += `Status Anda sudah tercatat sebagai ${statusAbsenSekarang} pada pertemuan ke ${activeUrutan}. `;
                        teks += "Menu navigasi: Sebutkan satu untuk Pembelajaran, dua tetap di Presensi, tiga untuk Penugasan, empat untuk Anggota kelas, atau nol untuk kembali. Katakan Ulang, untuk mendengar panduan.";
                    } else {
                        // Jika belum absen, sistem FOKUS MINTA ABSEN DULU
                        teks += `Pertemuan ke ${activeUrutan} sedang berlangsung. Anda belum mengisi presensi. `;
                        teks += "Silakan sebutkan angka lima untuk Hadir, enam untuk Sakit, atau tujuh untuk Izin, untuk menyimpan kehadiran Anda.";
                    }
                } else {
                    teks += "Saat ini belum ada pertemuan yang membuka absensi. ";
                    teks += "Menu navigasi: Sebutkan satu untuk Pembelajaran, dua tetap di Presensi, tiga untuk Penugasan, empat untuk Anggota kelas, atau nol untuk kembali.";
                }
                
                return teks;
            }

            function kirimPresensi(status) {
                if (!CURRENT_SESSION_ID) {
                    bicara("Tidak ada sesi pertemuan aktif saat ini.");
                    return;
                }

                isRedirecting = true;
                synth.cancel();
                if(rec) rec.abort();

                if (statusDesc) {
                    statusDesc.innerText = "MEMPROSES...";
                    statusDesc.classList.replace("text-green-600", "text-slate-800");
                }

                fetch("{{ url('presensi') }}/" + CURRENT_SESSION_ID + "/" + status, {
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                        "Accept": "application/json"
                    }
                })
                .then(response => {
                    if (!response.ok) throw new Error("Gagal");
                    return response.json();
                })
                .then(data => {
                    // FEEDBACK SUKSES & BACAKAN NAVIGASI BARU
                    let teksSuccess = `Presensi ${status} Anda berhasil dicatat. Halaman akan dimuat ulang.`;
                    bicara(teksSuccess, () => {
                        location.reload();
                    });
                    setTimeout(() => { location.reload(); }, 4000);
                })
                .catch(error => {
                    isRedirecting = false;
                    bicara("Presensi gagal atau Anda sudah mengisi absen sebelumnya.", () => {
                        mulaiMendengar();
                    });
                });
            }

            const urlPembelajaran = "{{ route('course.detail', $session->kelas->id ?? 0) }}";
            const urlPenugasan = "{{ route('course.assignments', $currentSession?->kelas->id ?? 0) }}";
            const urlAnggota = "{{ route('course.members', $currentSession?->kelas->id ?? 0) }}";

            function navigasiKe(nomor) {
                if (isRedirecting) return;

                let tujuan = ""; let teks = "";

                if (nomor === 0) {
                    tujuan = "{{ route('course.detail', $session->kelas->id ?? 0) }}";
                    teks = "Nol. Kembali ke Menu Utama Pembelajaran.";
                } else if (nomor === 1) {
                    tujuan = urlPembelajaran;
                    teks = "Satu. Membuka Menu Pembelajaran.";
                } else if (nomor === 2) {
                    teks = "Anda sudah berada di Halaman Presensi.";
                } else if (nomor === 3) {
                    tujuan = urlPenugasan;
                    teks = "Tiga. Membuka Menu Penugasan.";
                } else if (nomor === 4) {
                    tujuan = urlAnggota;
                    teks = "Empat. Membuka daftar Anggota Kelas.";
                } else if (nomor >= 5 && nomor <= 7) {
                    if(!hasActiveSession) { 
                        bicara("Maaf, belum ada absensi yang dibuka saat ini.", () => mulaiMendengar()); 
                        return; 
                    }
                    if(isAlreadyAbsen) {
                        bicara(`Maaf, kehadiran Anda sudah tercatat sebagai ${statusAbsenSekarang}.`);
                        return;
                    }

                    if(nomor === 5) kirimPresensi("hadir");
                    if(nomor === 6) kirimPresensi("sakit");
                    if(nomor === 7) kirimPresensi("izin");
                    return;
                }

                if (teks !== "") {
                    if (tujuan !== "" && tujuan !== "#") {
                        isRedirecting = true;
                        synth.cancel();
                        if(rec) rec.abort();

                        if(statusDesc) {
                            statusDesc.innerText = "MENGALIHKAN...";
                            statusDesc.classList.replace("text-green-600", "text-slate-800");
                        }
                    }

                    bicara(teks, () => {
                        if (tujuan !== "" && tujuan !== "#") window.location.href = tujuan;
                        else { try { rec.start(); } catch(e){} }
                    });

                    // Fallback Anti-Hang
                    if (tujuan !== "" && tujuan !== "#") {
                        setTimeout(() => { window.location.href = tujuan; }, 4000);
                    }
                }
            }

            if (rec) {
                rec.onresult = (event) => {
                    if (isRedirecting) return;

                    let hasil = "";
                    for (let i = event.resultIndex; i < event.results.length; ++i) {
                        hasil += event.results[i][0].transcript;
                    }
                    hasil = hasil.toLowerCase().trim();

                    // ANTI ECHO (Mencegah bot memotong suaranya sendiri)
                    const omonganBot = [
                        "halaman presensi kelas", "statistik kehadiran anda", 
                        "sedang berlangsung", "anda belum mengisi presensi", 
                        "sebutkan angka lima untuk hadir", "enam untuk sakit", "tujuh untuk izin",
                        "status anda sudah tercatat", "menu navigasi", "satu untuk pembelajaran", 
                        "presensi anda berhasil", "belum ada pertemuan", "katakan ulang"
                    ];

                    if (omonganBot.some(kalimat => hasil.includes(kalimat))) {
                        return;
                    }

                    prosesJawaban(hasil);
                };

                rec.onend = () => { 
                    isRecActive = false;
                    if (!isRedirecting) mulaiMendengar(); 
                };
            }

            function prosesJawaban(hasil) {
                if (hasil.includes("ulang") || hasil.includes("panduan") || hasil.includes("bantuan")) {
                    synth.cancel(); if(rec) rec.abort();
                    bicara(getPanduanSuara(), () => { mulaiMendengar(); });
                    return;
                }

                const angka = hasil.match(/\d+/);
                let commandNum = -1;

                if (angka) commandNum = parseInt(angka[0]);
                else if (hasil.includes("nol") || hasil.includes("kembali")) commandNum = 0;
                else if (hasil.includes("satu") || hasil.includes("pembelajaran")) commandNum = 1;
                else if (hasil.includes("dua") || hasil.includes("presensi")) commandNum = 2;
                else if (hasil.includes("tiga") || hasil.includes("penugasan")) commandNum = 3;
                else if (hasil.includes("empat") || hasil.includes("anggota")) commandNum = 4;
                else if (hasil.includes("lima") || hasil.includes("hadir")) commandNum = 5;
                else if (hasil.includes("enam") || hasil.includes("sakit")) commandNum = 6;
                else if (hasil.includes("tujuh") || hasil.includes("izin")) commandNum = 7;

                if (commandNum !== -1) {
                    // Pengecekan Khusus: Jika belum absen, KUNCI navigasi lain (hanya boleh 5,6,7)
                    if (hasActiveSession && !isAlreadyAbsen) {
                        if (commandNum !== 5 && commandNum !== 6 && commandNum !== 7) {
                            synth.cancel(); if(rec) rec.abort();
                            bicara("Anda belum absen. Silakan sebutkan lima untuk Hadir, enam untuk Sakit, atau tujuh untuk Izin terlebih dahulu.", () => { mulaiMendengar(); });
                            return;
                        }
                    }

                    synth.cancel(); if(rec) rec.abort();
                    navigasiKe(commandNum);
                }
            }

            window.addEventListener("load", () => {
                document.body.addEventListener("click", () => {}, { once: true });
                setTimeout(() => {
                    bicara(getPanduanSuara());
                }, 800);
            });
        </script>
    </body>
</html>