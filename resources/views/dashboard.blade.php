<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"
        />
        <title>Dashboard Mahasiswa | LMS Inklusi UMMI</title>

        <link
            href="https://unpkg.com/aos@2.3.1/dist/aos.css"
            rel="stylesheet"
        />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link
            href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
            rel="stylesheet"
        />

        <style>
            .custom-scrollbar::-webkit-scrollbar {
                width: 5px;
            }
            .custom-scrollbar::-webkit-scrollbar-track {
                background: transparent;
            }
            .custom-scrollbar::-webkit-scrollbar-thumb {
                background-color: #cbd5e1;
                border-radius: 20px;
            }
            .wave-bar {
                transition: height 0.1s ease;
            }
        </style>
    </head>

    <body class="m-0 font-['Plus_Jakarta_Sans'] bg-[#f8fafc] h-[100dvh] flex flex-col lg:flex-row border-box text-slate-800 overflow-hidden">
        
        <div id="mobileBackdrop" onclick="toggleSidebar()" class="fixed inset-0 bg-slate-900/50 z-40 hidden lg:hidden transition-opacity cursor-pointer"></div>

        <aside id="sidebar" class="fixed inset-y-0 left-0 z-50 w-80 bg-white border-r border-slate-200 flex flex-col h-[100dvh] transform -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out shrink-0">
            <div class="p-8 border-b border-slate-100 flex items-center gap-4 shrink-0">
                <img
                    src="{{ asset('images/logo-ummi.png') }}"
                    class="w-10 h-10 object-contain"
                    alt="Logo"
                    onerror="this.src = 'https://via.placeholder.com/40'"
                />
                <div>
                    <h1 class="text-lg font-black text-slate-900 tracking-tight leading-none">LMS Inklusi</h1>
                    <p class="text-[9px] font-bold text-blue-600 uppercase tracking-widest mt-1">Portal Mahasiswa</p>
                </div>
                <button onclick="toggleSidebar()" class="lg:hidden ml-auto text-slate-400 hover:text-slate-600 cursor-pointer p-2 bg-slate-50 rounded-lg">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <nav class="flex-1 p-6 space-y-3 overflow-y-auto custom-scrollbar">
                <a href="{{ route('dashboard') ?? '#' }}" data-menu="-1" class="flex items-center justify-between p-4 bg-blue-50 text-blue-700 rounded-2xl font-bold transition-all shadow-sm border border-blue-100 cursor-pointer">
                    <div class="flex items-center gap-4">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                        </svg>
                        <span>Beranda</span>
                    </div>
                </a>

                <a href="{{ route('profile') ?? '#' }}" data-menu="3" class="flex items-center justify-between p-4 text-slate-500 hover:bg-slate-50 hover:text-slate-900 rounded-2xl font-bold transition-all cursor-pointer">
                    <div class="flex items-center gap-4">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        <span>Profil Saya</span>
                    </div>
                    <span class="text-[10px] bg-slate-800 text-white px-2 py-1 rounded-lg font-black shadow-sm">3</span>
                </a>

                <a href="{{ route('notifications') ?? '#' }}" data-menu="4" class="flex items-center justify-between p-4 text-slate-500 hover:bg-slate-50 hover:text-slate-900 rounded-2xl font-bold transition-all cursor-pointer">
                    <div class="flex items-center gap-4">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                        </svg>
                        <span>Pemberitahuan</span>
                    </div>
                    <span class="text-[10px] bg-slate-800 text-white px-2 py-1 rounded-lg font-black shadow-sm">4</span>
                </a>

                <a href="{{ route('messages') ?? '#' }}" data-menu="5" class="flex items-center justify-between p-4 text-slate-500 hover:bg-slate-50 hover:text-slate-900 rounded-2xl font-bold transition-all cursor-pointer">
                    <div class="flex items-center gap-4">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path>
                        </svg>
                        <span>Pesan</span>
                    </div>
                    <span class="text-[10px] bg-slate-800 text-white px-2 py-1 rounded-lg font-black shadow-sm">5</span>
                </a>

                <a href="{{ route('help') ?? '#' }}" data-menu="6" class="flex items-center justify-between p-4 text-slate-500 hover:bg-slate-50 hover:text-slate-900 rounded-2xl font-bold transition-all cursor-pointer">
                    <div class="flex items-center gap-4">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span>Bantuan</span>
                    </div>
                    <span class="text-[10px] bg-slate-800 text-white px-2 py-1 rounded-lg font-black shadow-sm">6</span>
                </a>
            </nav>

            <div class="p-6 border-t border-slate-100 shrink-0">
                <button data-menu="0" class="w-full p-4 flex items-center justify-between text-red-600 font-bold bg-red-50 rounded-2xl hover:bg-red-100 transition-all border border-red-100 cursor-pointer">
                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                        </svg>
                        <span>Keluar</span>
                    </div>
                    <span class="text-[10px] bg-black text-white px-2 py-1 rounded-lg font-black shadow-sm">0</span>
                </button>
            </div>
        </aside>

        <main class="flex-1 flex flex-col h-[100dvh] overflow-y-auto relative lg:ml-80 transition-all duration-300 custom-scrollbar">
            <div class="absolute top-0 left-0 w-full h-96 bg-gradient-to-b from-blue-50 to-transparent -z-10"></div>

            <header class="bg-white/80 backdrop-blur-xl border-b border-slate-200/60 px-4 sm:px-8 py-3 sm:py-6 sticky top-0 z-30 shrink-0" title="Ketuk 2x area ini untuk memotong suara sistem">
                <div class="max-w-7xl mx-auto flex items-center justify-between h-10 sm:h-14">
                    <div class="flex items-center gap-2 sm:gap-4">
                        <button onclick="toggleSidebar()" class="lg:hidden p-1.5 sm:p-2 text-slate-500 hover:bg-slate-100 rounded-lg cursor-pointer">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                        </button>
                        <div>
                            <h2 class="text-xl sm:text-2xl font-extrabold text-slate-900 tracking-tight leading-none">
                                @php
                                    $namaArray = explode(' ', $mahasiswa->nama ?? 'Mahasiswa');
                                    $namaPanggilan = $namaArray[0];
                                @endphp
                                Halo, {{ $namaPanggilan }}
                            </h2>
                            <p class="text-[9px] sm:text-sm font-medium text-slate-500 mt-1">Siap untuk belajar hari ini?</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-2 sm:gap-4">
                        <div class="flex items-center gap-1 sm:gap-3 pr-2 sm:pr-4 border-r border-slate-200">
                            <button data-menu="4" class="relative p-1.5 sm:p-2 text-slate-400 hover:text-blue-600 transition-all cursor-pointer">
                                <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                                </svg>
                                @if(isset($unreadCount) && $unreadCount > 0)
                                    <span class="absolute top-1.5 right-1.5 sm:top-2 sm:right-2 w-2 h-2 bg-red-500 rounded-full border-2 border-white"></span>
                                @endif
                            </button>
                            <button data-menu="6" class="hidden sm:block p-1.5 sm:p-2 text-slate-400 hover:text-blue-600 transition-all cursor-pointer relative">
                                <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </button>
                        </div>

                        <div class="flex items-center gap-1.5 sm:gap-3 pl-1 sm:pl-2 w-[90px] sm:w-[130px] justify-start shrink-0 cursor-pointer">
                            <div class="flex items-center gap-[2px] h-4 w-4 sm:w-6 justify-center shrink-0" id="wave-container">
                                <div class="wave-bar w-[2px] bg-blue-500 rounded-full h-1 transition-all"></div>
                                <div class="wave-bar w-[2px] bg-blue-400 rounded-full h-1 transition-all"></div>
                                <div class="wave-bar w-[2px] bg-blue-600 rounded-full h-1 transition-all"></div>
                            </div>
                            <span id="status-desc" class="text-[8px] sm:text-[9px] font-black text-slate-400 uppercase tracking-widest text-left w-16 sm:w-24 truncate">MENYIAPKAN</span>
                        </div>
                    </div>
                </div>
            </header>

            <div class="p-4 sm:p-6 lg:p-10 max-w-7xl mx-auto w-full space-y-8 sm:space-y-10">
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6">
                    <div data-menu="1" data-aos="fade-up" data-aos-delay="100" class="group bg-white p-6 sm:p-8 rounded-[1.5rem] sm:rounded-[2.5rem] shadow-sm hover:shadow-2xl hover:-translate-y-1 transition-all border border-slate-100 cursor-pointer relative overflow-hidden flex flex-col justify-between">
                        <div class="absolute top-0 right-0 w-24 h-24 sm:w-32 sm:h-32 bg-blue-50 rounded-bl-[100%] -mr-4 -mt-4 transition-transform group-hover:scale-110"></div>
                        <div class="relative z-10 flex flex-col h-full justify-between">
                            <div class="w-12 h-12 sm:w-16 sm:h-16 bg-blue-600 text-white rounded-xl sm:rounded-2xl flex items-center justify-center mb-4 sm:mb-8 font-black text-xl sm:text-2xl shadow-lg shadow-blue-200">1</div>
                            <div>
                                <h3 class="text-lg sm:text-2xl font-black text-slate-900 tracking-tight group-hover:text-blue-600 transition-colors leading-tight">Daftar Mata Kuliah</h3>
                                <p class="text-xs sm:text-base text-slate-400 font-medium mt-1 sm:mt-2">Lihat dan gabung mata kuliah.</p>
                            </div>
                        </div>
                    </div>

                    <div data-menu="2" data-aos="fade-up" data-aos-delay="200" class="group bg-gradient-to-br from-indigo-600 to-purple-700 p-6 sm:p-8 rounded-[1.5rem] sm:rounded-[2.5rem] shadow-xl shadow-indigo-200 hover:shadow-2xl hover:-translate-y-1 transition-all text-white cursor-pointer relative overflow-hidden flex flex-col justify-between">
                        <div class="relative z-10 flex flex-col h-full justify-between">
                            <div class="w-12 h-12 sm:w-16 sm:h-16 bg-white/20 border border-white/10 backdrop-blur-md rounded-xl sm:rounded-2xl flex items-center justify-center mb-4 sm:mb-8 font-black text-xl sm:text-2xl">2</div>
                            <div>
                                <h3 class="text-lg sm:text-2xl font-black tracking-tight leading-tight">Daftar Ujian</h3>
                                <p class="text-xs sm:text-base text-indigo-100 font-medium mt-1 sm:mt-2">Cek jadwal dan mulai ujian.</p>
                            </div>
                        </div>
                        <div class="absolute -right-6 -bottom-6 w-32 h-32 bg-white/10 rounded-full blur-2xl"></div>
                    </div>
                </div>

                <div data-aos="fade-up" data-aos-delay="300">
                    <div class="flex items-center justify-between mb-4 sm:mb-6 px-1">
                        <h3 class="text-xs sm:text-sm font-black text-slate-900 uppercase tracking-widest">Sedang Dipelajari</h3>
                        <span class="text-[9px] sm:text-[10px] font-bold bg-slate-200 text-slate-600 px-2 sm:px-3 py-1 rounded-full">Semester {{ $mahasiswa->semester ?? '-' }}</span>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6">
                        @if(isset($kelas) && count($kelas) > 0)
                            @foreach ($kelas as $k)
                                @php
                                    // LOGIKA PROGRESS SAMA SEPERTI DI COURSE DETAIL
                                    $totalSesi = $k->courseSessions->count();
                                    $sesiSelesai = 0;
                                    
                                    if($totalSesi > 0) {
                                        foreach($k->courseSessions as $ss) {
                                            $adaMateri = $ss->materis && $ss->materis->count() > 0;
                                            $adaDiskusi = $ss->discussions && $ss->discussions->count() > 0;
                                            
                                            if($adaMateri && $adaDiskusi) {
                                                $sesiSelesai += 1;
                                            } else {
                                                $sesiSelesai += 0.5;
                                            }
                                        }
                                    }
                                    $persenProgres = $totalSesi > 0 ? min(100, round(($sesiSelesai / $totalSesi) * 100)) : 0;
                                @endphp

                                <a href="{{ route('course.detail', ['kelas' => $k->id]) }}" class="group bg-white p-4 sm:p-6 rounded-[1.5rem] sm:rounded-[2rem] border border-slate-200 shadow-sm hover:shadow-lg transition-all flex items-center gap-4 sm:gap-6 cursor-pointer link-navigasi">
                                    <div class="w-14 h-14 sm:w-16 sm:h-16 bg-slate-50 text-slate-400 group-hover:bg-blue-50 group-hover:text-blue-600 rounded-xl sm:rounded-2xl flex items-center justify-center shrink-0 transition-colors">
                                        <svg class="w-6 h-6 sm:w-8 sm:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                        </svg>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <div class="flex justify-between items-center mb-0.5">
                                            <h4 class="text-sm sm:text-base font-black text-slate-900 truncate pr-2">{{ $k->mataKuliah->nama }}</h4>
                                            <span class="text-[9px] sm:text-[10px] font-black text-blue-600">{{ $persenProgres }}%</span>
                                        </div>
                                        <p class="text-[10px] sm:text-xs font-bold text-slate-400 uppercase truncate">{{ $k->dosen->nama }}</p>
                                        <div class="w-full h-1.5 bg-slate-100 rounded-full overflow-hidden mt-2">
                                            <div class="h-full bg-blue-500 rounded-full transition-all" style="width: {{ $persenProgres }}%"></div>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        @else
                            <div class="col-span-full p-8 text-center text-slate-400 text-sm font-medium border-2 border-dashed border-slate-200 rounded-3xl">
                                Belum ada mata kuliah yang sedang dipelajari.
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </main>

        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

        <script>
            AOS.init({ once: true, easing: "ease-out-cubic" });

            function toggleSidebar() {
                document.getElementById("sidebar").classList.toggle("-translate-x-full");
                document.getElementById("mobileBackdrop").classList.toggle("hidden");
            }

            const statusDesc = document.getElementById("status-desc");
            const waveBars = document.querySelectorAll(".wave-bar");
            const synth = window.speechSynthesis;

            const SpeechRec = window.webkitSpeechRecognition || window.SpeechRecognition;
            let rec = null;
            let isRecActive = false;
            let isRedirecting = false;
            let isSpeaking = false;
            let idleTimer;

            let suaraIndonesia = null;
            function siapkanSuara() {
                const voices = synth.getVoices();
                suaraIndonesia = voices.find(v => v.lang.replace('_', '-') === 'id-ID' && (v.name.includes('Google') || v.name.includes('Gadis') || v.name.includes('Female'))) 
                               || voices.find(v => v.lang.replace('_', '-') === 'id-ID');
            }
            if (speechSynthesis.onvoiceschanged !== undefined) {
                speechSynthesis.onvoiceschanged = siapkanSuara;
            }
            siapkanSuara();

            if (SpeechRec) {
                rec = new SpeechRec();
                rec.lang = "id-ID";
                rec.continuous = false;
                rec.interimResults = false; 
            }

            let waveInterval;
            function setWave(active) {
                if (active) {
                    if (waveInterval) clearInterval(waveInterval);
                    waveInterval = setInterval(() => {
                        waveBars.forEach((bar) => {
                            const h = Math.floor(Math.random() * 20) + 4;
                            bar.style.height = `${h}px`;
                        });
                    }, 100);
                } else {
                    if(waveInterval) clearInterval(waveInterval);
                    waveBars.forEach((bar) => (bar.style.height = "4px"));
                }
            }

            function resetIdleTimer() {
                clearTimeout(idleTimer);
                if (isRedirecting) return;
                idleTimer = setTimeout(() => {
                    bicara(getPanduanUtama());
                }, 180000); 
            }

            function mulaiMendengar() {
                if (!rec || isRedirecting || isRecActive) return;
                try {
                    rec.start();
                    isRecActive = true;
                    if(statusDesc) {
                        statusDesc.innerText = "MENDENGARKAN";
                        statusDesc.classList.replace("text-slate-400", "text-green-600");
                        statusDesc.classList.replace("text-blue-600", "text-green-600");
                    }
                    resetIdleTimer();
                } catch (e) {
                    console.error("Mic error:", e);
                }
            }

            let clickTimer = null;
            const clickDelay = 300; 

            document.body.addEventListener('click', (e) => {
                const isMobileToggle = e.target.closest('[onclick="toggleSidebar()"]');
                if (isMobileToggle) return;

                const menuElement = e.target.closest('[data-menu]');
                const linkElement = e.target.closest('a[href]');

                if (menuElement || linkElement) {
                    e.preventDefault(); 
                }

                if (clickTimer !== null) {
                    clearTimeout(clickTimer);
                    clickTimer = null;

                    if (!isRedirecting) {
                        synth.cancel(); 
                        isSpeaking = false;
                        setWave(false);
                        if (rec) { try { rec.abort(); } catch(err){} isRecActive = false; }

                        setTimeout(() => {
                            mulaiMendengar();
                        }, 50);
                    }
                } else {
                    clickTimer = setTimeout(() => {
                        clickTimer = null;

                        if (menuElement) {
                            const menuId = parseInt(menuElement.getAttribute('data-menu'));
                            eksekusiNavigasi(menuId);
                        } else if (linkElement) {
                            const url = linkElement.href;
                            if (url && !url.endsWith('#')) {
                                window.location.assign(url);
                            }
                        }
                    }, clickDelay);
                }
            });

            function bicara(teks, callback = null) {
                if (isRedirecting && teks !== "Mohon maaf, halaman belum tersedia.") return;
                isSpeaking = true;
                
                if (rec) {
                    try { rec.abort(); } catch(e) {}
                    isRecActive = false;
                }
                synth.cancel();

                setTimeout(() => {
                    const utter = new SpeechSynthesisUtterance(teks);
                    utter.lang = "id-ID";
                    if (suaraIndonesia) utter.voice = suaraIndonesia; 
                    utter.rate = parseFloat(localStorage.getItem("speechRate")) || 1.1;

                    utter.onstart = () => {
                        if(statusDesc && teks !== "") {
                            statusDesc.innerText = "SISTEM BERBICARA";
                            statusDesc.classList.replace("text-slate-400", "text-blue-600");
                            statusDesc.classList.replace("text-green-600", "text-blue-600");
                        }
                        setWave(true);
                    };

                    utter.onend = () => {
                        isSpeaking = false;
                        setWave(false);
                        
                        if (!isRedirecting) {
                            mulaiMendengar();
                        }
                        if (callback) callback();
                    };

                    utter.onerror = () => {
                        isSpeaking = false;
                        setWave(false);
                    };

                    synth.speak(utter);
                }, 50);
            }

            function getPanduanUtama() {
                let nama = "{{ $namaPanggilan }}";
                let panduan = `Halo ${nama}. Sebutkan angka berikut: `;
                panduan += "Satu, Daftar Mata Kuliah. ";
                panduan += "Dua, Daftar Ujian. ";
                panduan += "Tiga, Profil Saya. ";
                panduan += "Empat, Pemberitahuan. ";
                panduan += "Lima, Pesan Privat. ";
                panduan += "Enam, Bantuan. ";
                panduan += "Atau Nol, Keluar. Katakan Ulang, untuk mendengar panduan ini dari awal.";
                return panduan;
            }

            const dataMenu = {
                1: { rute: "{{ route('courses.index') ?? '' }}", nama: "Daftar Mata Kuliah" },
                2: { rute: "{{ route('exams') ?? '' }}", nama: "Daftar Ujian" },
                3: { rute: "{{ route('profile') ?? '' }}", nama: "Profil Saya" },
                4: { rute: "{{ route('notifications') ?? '' }}", nama: "Pemberitahuan" },
                5: { rute: "{{ route('messages') ?? '' }}", nama: "Pesan" },
                6: { rute: "{{ route('help') ?? '' }}", nama: "Bantuan" },
                0: { rute: "{{ route('logout') ?? '' }}", nama: "Keluar Aplikasi" }
            };

            function eksekusiNavigasi(nomor) {
                if (isRedirecting) return;
                const menu = dataMenu[nomor];
                if (!menu) return;

                if (!menu.rute || menu.rute === '#' || menu.rute.includes('undefined')) {
                    bicara("Mohon maaf, halaman belum tersedia.");
                    return;
                }

                isRedirecting = true;
                synth.cancel();
                if(rec) { try { rec.abort(); } catch(e){} isRecActive = false; }

                if(statusDesc) {
                    statusDesc.innerText = "MENGALIHKAN...";
                    statusDesc.classList.replace("text-green-600", "text-slate-800");
                    statusDesc.classList.replace("text-blue-600", "text-slate-800");
                }

                const utter = new SpeechSynthesisUtterance(menu.nama);
                utter.lang = "id-ID";
                if (suaraIndonesia) utter.voice = suaraIndonesia;
                utter.rate = parseFloat(localStorage.getItem("speechRate")) || 1.1;
                
                synth.speak(utter);

                setTimeout(() => {
                    window.location.assign(menu.rute);
                }, 100); 
            }

            if (rec) {
                rec.onresult = (event) => {
                    if (isRedirecting || isSpeaking) return;
                    resetIdleTimer();

                    let hasil = event.results[0][0].transcript.toLowerCase().replace(/[.,?!]/g, '').trim();

                    if (/\b(ulang|ulangi|panduan|baca ulang)\b/.test(hasil)) { 
                        bicara(getPanduanUtama()); 
                    }
                    else if (/\b(satu|1|sato|sapu|saku|atu|aku|tu|kesatu)\b/.test(hasil)) { eksekusiNavigasi(1); }
                    else if (/\b(dua|2|duwa|doa|tua|jua|kedua)\b/.test(hasil)) { eksekusiNavigasi(2); }
                    else if (/\b(tiga|3|ti ga|ketiga)\b/.test(hasil)) { eksekusiNavigasi(3); }
                    else if (/\b(empat|4|pat|keempat)\b/.test(hasil)) { eksekusiNavigasi(4); }
                    else if (/\b(lima|5|kelima)\b/.test(hasil)) { eksekusiNavigasi(5); }
                    else if (/\b(enam|6|nam|keenam)\b/.test(hasil)) { eksekusiNavigasi(6); }
                    else if (/\b(nol|0|kosong|keluar)\b/.test(hasil)) { eksekusiNavigasi(0); }
                    else {
                        bicara("Perintah tidak dikenali. Silakan sebut ulang angkanya.");
                    }
                };

                rec.onend = () => {
                    isRecActive = false;
                    if (!isRedirecting && !isSpeaking) {
                        mulaiMendengar(); 
                    }
                };
            }

            window.addEventListener("load", () => {
                setTimeout(() => {
                    bicara(getPanduanUtama());
                }, 800);
            });
        </script>
    </body>
</html>