<!DOCTYPE html>
<html lang="id" class="h-full">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>Anggota - {{ $mataKuliah->nama ?? 'Struktur Data 3C' }} | LMS Inklusi UMMI</title>

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
            
            /* Animasi Pencarian Tampil */
            @keyframes slideDown { from { opacity: 0; transform: translateY(-10px); } to { opacity: 1; transform: translateY(0); } }
            .search-active { animation: slideDown 0.3s ease forwards; display: block !important; }
        </style>
    </head>
    <body class="m-0 font-['Plus_Jakarta_Sans'] bg-[#f8fafc] min-h-[100dvh] flex flex-col border-box overflow-x-hidden text-slate-800">
        
        <div class="fixed top-0 left-0 w-full h-full overflow-hidden -z-10 pointer-events-none">
            <div class="absolute top-[-10%] right-[-5%] w-64 md:w-[400px] h-64 md:h-[400px] bg-blue-100/40 rounded-full blur-3xl opacity-50"></div>
            <div class="absolute bottom-[-10%] left-[-10%] w-64 md:w-[400px] h-64 md:h-[400px] bg-indigo-50/40 rounded-full blur-3xl opacity-50"></div>
        </div>

        {{-- PAKAI overflow-y-scroll BIAR GAK GESER --}}
        <main class="flex-1 flex flex-col h-full overflow-y-scroll custom-scrollbar relative">
            
            {{-- NAVBAR --}}
            <div class="bg-white/90 backdrop-blur-2xl border-b border-slate-200/60 sticky top-0 z-40 px-3 sm:px-4 md:px-8 py-3 sm:py-4 shadow-sm transition-all w-full cursor-pointer" id="voice-header" title="Ketuk 2x untuk memotong suara sistem">
                <div class="max-w-7xl mx-auto flex flex-col lg:flex-row lg:items-center justify-between gap-3 lg:gap-6 relative pointer-events-none">
                    
                    <div class="flex items-center justify-between w-full lg:w-auto gap-3 relative z-10 pointer-events-auto">
                        <div class="flex items-center gap-3 md:gap-4 flex-1 min-w-0">
                            
                            {{-- UKURAN DISAMAKAN 100% DENGAN HALAMAN LAIN --}}
                            <button data-menu="0" class="w-10 h-10 md:w-12 md:h-12 rounded-full bg-slate-100 hover:bg-blue-600 text-slate-500 hover:text-white flex items-center justify-center transition-all duration-300 shadow-sm shrink-0 group border border-slate-200 hover:border-blue-600 relative cursor-pointer active:scale-95">
                                <svg class="w-5 h-5 md:w-6 md:h-6 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path>
                                </svg>
                                <span class="absolute -bottom-1 -right-1 bg-slate-800 text-white text-[9px] font-black px-1.5 py-0.5 rounded-md border border-white shadow-sm">0</span>
                            </button>
                            
                            <div class="hidden sm:block text-left cursor-pointer group shrink-0" data-menu="0">
                                <span class="block text-[8px] md:text-[9px] font-bold text-slate-400 uppercase tracking-widest pointer-events-none">Navigasi Suara</span>
                                <span class="block text-[10px] md:text-xs font-black text-slate-700 group-hover:text-blue-600 transition-colors pointer-events-none">0 - Kembali</span>
                            </div>
                            
                            <div class="hidden lg:block w-px h-10 bg-slate-200 mx-1 md:mx-2"></div>
                            
                            <div class="overflow-hidden flex-1 pointer-events-none">
                                <h1 class="text-sm md:text-xl font-extrabold text-slate-900 tracking-tight leading-none truncate">
                                    {{ $mataKuliah->nama ?? 'Nama Mata Kuliah' }}
                                </h1>
                                <p class="text-[8px] md:text-[10px] font-bold text-blue-600 uppercase tracking-widest mt-1 truncate">
                                    Dosen: {{ $dosen->nama ?? '-' }}
                                </p>
                            </div>
                        </div>

                        <div class="flex lg:hidden items-center justify-end gap-1.5 shrink-0 pl-2 pointer-events-none">
                            <div class="flex items-center gap-[2px] h-4 w-6 justify-center" id="wave-container-mobile">
                                <div class="wave-bar w-[2px] bg-blue-500 rounded-full h-1 transition-all"></div>
                                <div class="wave-bar w-[2px] bg-blue-400 rounded-full h-1 transition-all"></div>
                                <div class="wave-bar w-[2px] bg-blue-600 rounded-full h-1 transition-all"></div>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center justify-between lg:justify-end gap-2 md:gap-4 w-full lg:w-auto pointer-events-auto">
                        <nav class="w-full lg:w-auto flex p-1.5 bg-slate-100/80 rounded-xl overflow-x-auto scrollbar-hide snap-x gap-1 border border-slate-200/50">
                            <button data-menu="1" class="cursor-pointer active:scale-95 snap-start shrink-0 px-4 md:px-5 py-1.5 md:py-2 rounded-lg text-slate-500 hover:text-slate-900 hover:bg-white/50 font-bold text-[9px] md:text-[10px] uppercase tracking-widest border border-transparent whitespace-nowrap transition-all">
                                1. Pembelajaran
                            </button>
                            <button data-menu="2" class="cursor-pointer active:scale-95 snap-start shrink-0 px-4 md:px-5 py-1.5 md:py-2 rounded-lg text-slate-500 hover:text-slate-900 hover:bg-white/50 font-bold text-[9px] md:text-[10px] uppercase tracking-widest border border-transparent whitespace-nowrap transition-all">
                                2. Presensi
                            </button>
                            <button data-menu="3" class="cursor-pointer active:scale-95 snap-start shrink-0 px-4 md:px-5 py-1.5 md:py-2 rounded-lg text-slate-500 hover:text-slate-900 hover:bg-white/50 font-bold text-[9px] md:text-[10px] uppercase tracking-widest border border-transparent whitespace-nowrap transition-all">
                                3. Penugasan
                            </button>
                            <button data-menu="4" class="cursor-pointer active:scale-95 snap-start shrink-0 px-4 md:px-5 py-1.5 md:py-2 rounded-lg bg-white text-blue-700 font-bold text-[9px] md:text-[10px] uppercase tracking-widest shadow-sm border border-slate-200 whitespace-nowrap transition-all">
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

            <div class="max-w-6xl mx-auto w-full p-4 sm:p-6 lg:p-8 space-y-6 sm:space-y-8 pb-20 relative z-10">
                
                {{-- KARTU DOSEN --}}
                <div data-aos="fade-up" data-aos-duration="600" class="bg-gradient-to-br from-blue-600 to-blue-800 rounded-[1.5rem] sm:rounded-[2rem] p-5 sm:p-8 text-white shadow-xl shadow-blue-200/50 relative overflow-hidden">
                    <div class="relative z-10 flex flex-col md:flex-row items-center gap-4 sm:gap-6 text-center md:text-left">
                        <div class="w-16 h-16 sm:w-20 sm:h-20 rounded-full bg-white/20 border-4 border-white/10 flex items-center justify-center text-xl sm:text-2xl font-black shadow-inner shrink-0 pointer-events-none">
                            {{ strtoupper(substr($dosen->nama ?? 'A', 0, 2)) }}
                        </div>
                        <div class="flex-1 space-y-1 pointer-events-none">
                            <span class="bg-blue-500/50 px-2.5 sm:px-3 py-1 rounded-full text-[8px] sm:text-[9px] font-black uppercase tracking-widest border border-white/10">Dosen Pengampu</span>
                            <h2 class="text-lg sm:text-2xl font-black tracking-tight">{{ $dosen->nama ?? 'Nama Dosen' }}</h2>
                            <p class="text-[10px] sm:text-xs font-medium text-blue-100 flex items-center justify-center md:justify-start gap-1.5 sm:gap-2">
                                <span class="w-1.5 h-1.5 sm:w-2 sm:h-2 bg-emerald-400 rounded-full animate-pulse"></span>
                                {{ $dosen->nidn ?? '-' }}
                            </p>
                        </div>
                        <button data-menu="5" class="mt-2 md:mt-0 w-full md:w-auto bg-white text-blue-700 px-4 sm:px-6 py-2.5 sm:py-3 rounded-lg sm:rounded-xl font-black text-[9px] sm:text-[10px] uppercase tracking-widest hover:bg-blue-50 transition-transform transform hover:scale-105 active:scale-95 shadow-lg flex justify-center items-center gap-2 cursor-pointer border-0">
                            <span class="bg-blue-100 text-blue-700 w-4 h-4 sm:w-5 sm:h-5 rounded text-[10px] sm:text-xs flex items-center justify-center font-black pointer-events-none">5</span> 
                            <span class="pointer-events-none">Hubungi Dosen</span>
                        </button>
                    </div>
                    <div class="absolute right-0 top-0 w-40 h-40 sm:w-64 sm:h-64 bg-white/5 rounded-full blur-2xl sm:blur-3xl -translate-y-1/2 translate-x-1/2 pointer-events-none"></div>
                </div>

                {{-- KONTROL PENCARIAN & DAFTAR ANGGOTA --}}
                <div class="space-y-4 sm:space-y-6">
                    <div data-aos="fade-in" class="flex flex-col md:flex-row md:items-center justify-between gap-3 sm:gap-4 px-1 sm:px-2 relative">
                        <h3 class="text-xs sm:text-sm font-black text-slate-900 uppercase tracking-widest flex items-center gap-2 w-full lg:w-auto pointer-events-none">
                            Mahasiswa
                            <span class="bg-slate-200 text-slate-600 px-2 py-0.5 rounded-md text-[8px] sm:text-[9px]">{{ $totalMembers ?? 0 }} Orang</span>
                        </h3>

                        <div class="flex items-center gap-2 sm:gap-3 w-full lg:w-auto overflow-hidden relative">
                            <button data-menu="7" class="flex-1 sm:flex-none bg-indigo-50 text-indigo-600 px-3 sm:px-4 py-2 sm:py-2.5 rounded-lg sm:rounded-xl border border-indigo-100 flex items-center justify-center gap-1.5 sm:gap-2 shadow-sm cursor-pointer hover:bg-indigo-100 hover:scale-105 transition-all group active:scale-95">
                                <span class="bg-indigo-200 text-indigo-700 w-4 h-4 rounded-sm flex items-center justify-center font-black text-[8px] sm:text-[9px] shrink-0 pointer-events-none">7</span>
                                <span class="text-[9px] sm:text-[10px] lg:text-xs font-bold truncate pointer-events-none">Dengar Nama</span>
                            </button>

                            <button data-menu="6" class="flex-1 sm:flex-none bg-white px-3 sm:px-4 py-2 sm:py-2.5 rounded-lg sm:rounded-xl border border-slate-200 flex items-center justify-center gap-1.5 sm:gap-2 shadow-sm cursor-pointer hover:border-blue-300 hover:scale-105 transition-all group active:scale-95">
                                <span class="bg-slate-100 text-slate-500 w-4 h-4 rounded-sm flex items-center justify-center font-black text-[8px] sm:text-[9px] shrink-0 pointer-events-none">6</span>
                                <span class="text-[9px] sm:text-[10px] lg:text-xs font-bold text-slate-500 group-hover:text-blue-500 truncate pointer-events-none">Cari Teman...</span>
                            </button>
                        </div>
                    </div>

                    {{-- SEARCH INPUT --}}
                    <div id="search-box-container" class="hidden px-1 sm:px-2 relative z-20 transition-all">
                        <div class="relative w-full">
                            <input type="text" id="input-cari-teman" placeholder="Ketik atau sebutkan nama teman..." class="w-full pl-10 pr-4 py-3 rounded-xl border border-blue-300 bg-blue-50/50 shadow-inner focus:outline-none focus:ring-2 focus:ring-blue-400 focus:bg-white transition-all text-sm font-bold text-slate-700" oninput="filterDaftarTeman(this.value)">
                            <div class="absolute left-3 top-3 text-blue-400 pointer-events-none">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                            </div>
                            <button id="btn-tutup-cari" onclick="tutupCariTeman()" class="absolute right-3 top-2.5 bg-red-100 text-red-500 hover:bg-red-500 hover:text-white p-1 rounded-md transition-colors cursor-pointer z-30">
                                <svg class="w-4 h-4 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"></path></svg>
                            </button>
                        </div>
                    </div>

                    {{-- DAFTAR ANGGOTA GRID --}}
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-4" id="daftar-anggota-grid">
                        @forelse ($members as $index => $mhs)
                            <div data-aos="fade-up" data-aos-duration="600" data-aos-delay="{{ 50 + ($index * 20) }}" class="member-card bg-white p-3 sm:p-5 rounded-2xl sm:rounded-3xl border border-slate-200 shadow-sm hover:shadow-md transition-all flex items-center gap-3 sm:gap-4 pointer-events-none">
                                <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-xl sm:rounded-2xl bg-indigo-50 text-indigo-600 flex items-center justify-center font-black text-xs sm:text-sm border border-indigo-100 shrink-0">
                                    {{ strtoupper(substr($mhs->nama, 0, 2)) }}
                                </div>
                                <div class="flex-1 min-w-0">
                                    <h4 class="member-name text-xs sm:text-sm font-bold text-slate-800 truncate">{{ $mhs->nama }}</h4>
                                    <p class="text-[9px] sm:text-[10px] text-slate-400 font-medium">{{ $mhs->nim }}</p>
                                </div>
                                <div class="w-1.5 h-1.5 sm:w-2 sm:h-2 {{ $mhs->is_online ? 'bg-emerald-500' : 'bg-slate-300' }} rounded-full shrink-0" title="{{ $mhs->is_online ? 'Online' : 'Offline' }}"></div>
                            </div>
                        @empty
                            <div class="col-span-full text-center py-6 sm:py-8 bg-white border border-dashed border-slate-200 rounded-2xl pointer-events-none">
                                <p class="text-slate-400 font-bold text-xs sm:text-sm">Belum ada mahasiswa yang terdaftar di kelas ini.</p>
                            </div>
                        @endforelse
                        
                        <div id="no-result" class="hidden col-span-full text-center py-6 sm:py-8 bg-white border border-dashed border-red-200 rounded-2xl pointer-events-none">
                            <p class="text-red-400 font-bold text-xs sm:text-sm">Mahasiswa tidak ditemukan.</p>
                        </div>
                    </div>

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
            const SpeechRec = window.webkitSpeechRecognition || window.SpeechRecognition;
            
            let rec = null;
            let dikteRec = null; 
            let isDictatingSearch = false;
            let waveInterval;
            let isRecActive = false;
            let isRedirecting = false;
            let isSpeaking = false;

            const membersList = @json($members);

            if (SpeechRec) {
                rec = new SpeechRec();
                rec.lang = "id-ID";
                rec.continuous = true;
                rec.interimResults = true; 
                
                dikteRec = new SpeechRec();
                dikteRec.lang = "id-ID";
                dikteRec.continuous = false; 
                dikteRec.interimResults = false; 
            }

            function setWave(active) {
                if (active) {
                    if (waveInterval) clearInterval(waveInterval);
                    waveInterval = setInterval(() => {
                        if (waveBarsDesktop.length > 0) waveBarsDesktop.forEach((bar) => { bar.style.height = `${Math.floor(Math.random() * 12) + 4}px`; });
                        if (waveBarsMobile.length > 0) waveBarsMobile.forEach((bar) => { bar.style.height = `${Math.floor(Math.random() * 12) + 4}px`; });
                    }, 100);
                } else {
                    clearInterval(waveInterval);
                    if (waveBarsDesktop.length > 0) waveBarsDesktop.forEach((bar) => (bar.style.height = "4px"));
                    if (waveBarsMobile.length > 0) waveBarsMobile.forEach((bar) => (bar.style.height = "4px"));
                }
            }

            let clickTimer = null;
            const clickDelay = 300; 

            document.body.addEventListener('click', (e) => {
                if (e.target.tagName === 'INPUT' || e.target.closest('#btn-tutup-cari')) return;

                const navElement = e.target.closest('[data-menu]');

                if (navElement) {
                    e.preventDefault(); 
                }

                if (clickTimer !== null) {
                    clearTimeout(clickTimer);
                    clickTimer = null;

                    if (!isRedirecting) {
                        synth.cancel(); 
                        isSpeaking = false;
                        setWave(false);
                        if (statusDesc) {
                            statusDesc.innerText = "MENDENGARKAN";
                            statusDesc.classList.replace("text-blue-600", "text-green-600");
                            statusDesc.classList.replace("text-slate-400", "text-green-600");
                        }
                        if (rec) { try { rec.abort(); } catch(err){} isRecActive = false; }
                        setTimeout(() => { mulaiMendengar(); }, 50);
                    }
                } else {
                    clickTimer = setTimeout(() => {
                        clickTimer = null;
                        if (navElement && !isRedirecting) {
                            const menuId = parseInt(navElement.getAttribute('data-menu'));
                            window.navigasiKe(menuId);
                        }
                    }, clickDelay);
                }
            });

            function mulaiMendengar() {
                if (!rec || isRedirecting || isRecActive || isDictatingSearch) return;
                try {
                    rec.start();
                    isRecActive = true;
                } catch (e) {
                    console.error("Mic error:", e);
                }
            }

            function bicara(teks, callback = null) {
                if (isRedirecting) return;
                synth.cancel();

                setTimeout(() => {
                    const utter = new SpeechSynthesisUtterance(teks);
                    utter.lang = "id-ID";
                    utter.rate = parseFloat(localStorage.getItem("speechRate")) || 1.1;

                    utter.onstart = () => {
                        isSpeaking = true;
                        if (statusDesc) {
                            statusDesc.innerText = "BERBICARA...";
                            statusDesc.classList.replace("text-slate-400", "text-blue-600");
                            statusDesc.classList.replace("text-green-600", "text-blue-600");
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
                            statusDesc.classList.replace("text-slate-400", "text-green-600");
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

            const urlPembelajaran = "{{ route('course.detail', ['kelas' => $kelas->id]) }}";
            const urlPresensi = "{{ (isset($session) && $session) ? route('course.attendance', ['id' => $session->id]) : '#' }}";
            const urlPenugasan = "{{ route('course.assignments', ['kelas' => $kelas->id ?? 0]) }}";
            const urlChatDosen = "{{ route('messages.show', $dosen->id ?? 0) }}";

            function getPanduanUtama() {
                const totalMhs = {{ $totalMembers ?? 0 }};
                let teks = `Anda berada di halaman Anggota Kelas. Terdapat ${totalMhs} mahasiswa di kelas ini. `;
                teks += "Sebutkan angka Lima untuk menghubungi dosen. ";
                teks += "Enam untuk mencari nama teman. ";
                teks += "Tujuh untuk mendengarkan saya menyebutkan nama teman sekelas. ";
                teks += "Atau sebut angka satu untuk Pembelajaran, dua untuk Presensi, tiga untuk Tugas, nol untuk Kembali. Katakan Ulang, jika butuh panduan lagi.";
                
                return teks;
            }

            function filterDaftarTeman(keyword) {
                keyword = keyword.toLowerCase();
                let cards = document.querySelectorAll('.member-card');
                let found = false;

                cards.forEach(card => {
                    let name = card.querySelector('.member-name').innerText.toLowerCase();
                    if(name.includes(keyword)) {
                        card.style.display = "flex";
                        found = true;
                    } else {
                        card.style.display = "none";
                    }
                });

                document.getElementById('no-result').style.display = found ? 'none' : 'block';
            }

            window.tutupCariTeman = function() {
                document.getElementById('search-box-container').classList.remove('search-active');
                document.getElementById('search-box-container').classList.add('hidden');
                document.getElementById('input-cari-teman').value = "";
                filterDaftarTeman("");
                if (isDictatingSearch) {
                    if (dikteRec) dikteRec.stop();
                    isDictatingSearch = false;
                    bicara("Pencarian dibatalkan.", () => mulaiMendengar());
                }
            }

            window.navigasiKe = function(nomor) {
                if (isRedirecting) return;

                let tujuan = ""; let teks = ""; let isAction = false;

                if (nomor === 0) { tujuan = urlPembelajaran; teks = "Nol. Kembali ke Beranda Kelas."; }
                else if (nomor === 1) { tujuan = urlPembelajaran; teks = "Satu. Membuka Menu Pembelajaran."; }
                else if (nomor === 2) { 
                    tujuan = urlPresensi; 
                    teks = tujuan.includes('#') ? "Halaman presensi belum tersedia di kelas ini." : "Dua. Membuka Menu Presensi."; 
                }
                else if (nomor === 3) { tujuan = urlPenugasan; teks = "Tiga. Membuka Menu Penugasan."; }
                else if (nomor === 4) { teks = "Empat. Anda sudah di Halaman Anggota."; isAction = true; }
                else if (nomor === 5) { tujuan = urlChatDosen; teks = "Lima. Mengarahkan ke ruang pesan Dosen."; }
                else if (nomor === 6) {
                    isAction = true;
                    document.getElementById('search-box-container').classList.remove('hidden');
                    document.getElementById('search-box-container').classList.add('search-active');
                    document.getElementById('input-cari-teman').focus();
                    
                    isDictatingSearch = true;
                    if(rec) rec.stop();
                    
                    teks = "Enam. Silakan sebutkan nama teman yang ingin dicari.";
                    bicara(teks, () => {
                        dikteRec.start();
                    });
                    return; 
                } 
                else if (nomor === 7) {
                    isAction = true;
                    if (membersList.length === 0) {
                        teks = "Belum ada mahasiswa yang terdaftar di kelas ini.";
                    } else {
                        teks = "Tujuh. Membacakan daftar teman sekelas. ";
                        let limit = membersList.length > 20 ? 20 : membersList.length; 
                        for(let i=0; i<limit; i++) {
                            teks += (i + 1) + ". " + membersList[i].nama + ". ";
                        }
                        if(membersList.length > 20) teks += "Dan seterusnya.";
                        else teks += "Selesai membacakan daftar anggota.";
                    }
                }

                if (teks !== "") {
                    if (!isAction && tujuan !== "") {
                        isRedirecting = true;
                        synth.cancel();
                        if(rec) rec.abort();

                        if(statusDesc) {
                            statusDesc.innerText = "MENGALIHKAN...";
                            statusDesc.classList.replace("text-green-600", "text-slate-800");
                            statusDesc.classList.replace("text-blue-600", "text-slate-800");
                        }
                        
                        bicara(teks);
                        // REDIRECT SATSET
                        setTimeout(() => { window.location.href = tujuan; }, 500);
                    } else {
                        bicara(teks, () => {
                            try { rec.start(); } catch(e){}
                        });
                    }
                }
            }

            if(dikteRec) {
                dikteRec.onresult = (event) => {
                    if (!isDictatingSearch) return;
                    
                    let namaDicari = event.results[event.results.length - 1][0].transcript.trim();
                    
                    if (namaDicari.toLowerCase() === "batal" || namaDicari.toLowerCase() === "kembali" || namaDicari.toLowerCase() === "batalkan") {
                        window.tutupCariTeman(); return;
                    }

                    document.getElementById('input-cari-teman').value = namaDicari;
                    filterDaftarTeman(namaDicari);
                    
                    isDictatingSearch = false;
                    if(dikteRec) dikteRec.stop();
                    
                    bicara(`Mencari nama ${namaDicari}.`, () => { mulaiMendengar(); });
                };
                dikteRec.onerror = () => { if (isDictatingSearch) { window.tutupCariTeman(); } };
            }

            if (rec) {
                rec.onresult = (event) => {
                    if (isRedirecting || isDictatingSearch) return;

                    let hasil = "";
                    for (let i = event.resultIndex; i < event.results.length; ++i) {
                        hasil += event.results[i][0].transcript;
                    }
                    hasil = hasil.toLowerCase().trim();

                    const omonganBot = [
                        "halaman anggota kelas", "terdapat", "mahasiswa di kelas ini", 
                        "lima untuk menghubungi", "enam untuk mencari", "tujuh untuk mendengarkan",
                        "satu untuk pembelajaran", "dua untuk presensi", "tiga untuk tugas",
                        "empat untuk anggota", "nol untuk kembali", "katakan ulang",
                        "membacakan daftar teman", "selesai membacakan", "silakan sebutkan nama teman", 
                        "mencari nama", "belum ada mahasiswa", "pencarian dibatalkan"
                    ];

                    if (omonganBot.some(kalimat => hasil.includes(kalimat))) return;
                    if (isSpeaking) return;

                    prosesJawaban(hasil);
                };

                rec.onend = () => { 
                    isRecActive = false;
                    if (!isRedirecting && !isDictatingSearch) mulaiMendengar(); 
                };
            }

            function prosesJawaban(hasil) {
                if(hasil.includes("stop") || hasil.includes("berhenti") || hasil.includes("diam")) {
                    synth.cancel();
                    if(statusDesc) statusDesc.innerText = "MENDENGARKAN";
                    setWave(false);
                    return;
                }

                if(hasil.includes("ulang") || hasil.includes("panduan") || hasil.includes("bantuan")) {
                    synth.cancel(); if(rec) rec.abort();
                    bicara(getPanduanUtama(), () => { mulaiMendengar(); });
                    return;
                }

                const angka = hasil.match(/\d+/);
                if (angka) {
                    synth.cancel(); if(rec) rec.abort(); navigasiKe(parseInt(angka[0])); return;
                }
                
                const kataAngka = {
                    "nol": 0, "kosong": 0,
                    "satu": 1, "sato": 1, "sate": 1,
                    "dua": 2, "tua": 2, "jua": 2, 
                    "tiga": 3, "empat": 4, "lima": 5,
                    "enam": 6, "tujuh": 7, "tuju": 7
                };

                for (let kata in kataAngka) {
                    if (hasil.includes(kata)) {
                        synth.cancel(); if(rec) rec.abort(); navigasiKe(kataAngka[kata]); return;
                    }
                }
                
                if (hasil.includes("kembali") || hasil.includes("beranda")) { synth.cancel(); if(rec) rec.abort(); window.navigasiKe(0); }
                else if (hasil.includes("pembelajaran") || hasil.includes("materi")) { synth.cancel(); if(rec) rec.abort(); window.navigasiKe(1); }
                else if (hasil.includes("presensi") || hasil.includes("absen")) { synth.cancel(); if(rec) rec.abort(); window.navigasiKe(2); }
                else if (hasil.includes("penugasan") || hasil.includes("tugas")) { synth.cancel(); if(rec) rec.abort(); window.navigasiKe(3); }
            }

            window.addEventListener("load", () => {
                document.body.addEventListener("click", () => {}, { once: true });
                setTimeout(() => { 
                    bicara(getPanduanUtama(), () => { mulaiMendengar(); }); 
                }, 800);
            });
        </script>
        <script defer src="https://accessibility-widget.pages.dev/js/app.js"></script>
    </body>
</html>