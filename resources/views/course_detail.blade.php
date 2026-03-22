<!DOCTYPE html>
<html lang="id" class="h-full">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>Pembelajaran - {{ $kelas->mataKuliah->nama }} | LMS Inklusi UMMI</title>

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
            
            <div class="bg-white/90 backdrop-blur-2xl border-b border-slate-200/60 sticky top-0 z-40 px-3 sm:px-4 md:px-8 py-3 sm:py-4 shadow-sm transition-all w-full cursor-pointer" id="voice-header" title="Ketuk 2x untuk memotong suara sistem">
                <div class="max-w-7xl mx-auto flex flex-col lg:flex-row lg:items-center justify-between gap-3 lg:gap-6 relative pointer-events-none">
                    
                    <div class="flex items-center justify-between w-full lg:w-auto gap-3 relative z-10 pointer-events-auto">
                        <div class="flex items-center gap-3 md:gap-4 flex-1 min-w-0">
                            
                            {{-- TOMBOL 0 - KEMBALI --}}
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
                                    {{ $kelas->mataKuliah->nama }}
                                </h1>
                                <p class="text-[8px] md:text-[10px] font-bold text-blue-600 uppercase tracking-widest mt-1 truncate">
                                    Dosen: {{ $kelas->dosen->nama ?? '-' }}
                                </p>
                            </div>
                        </div>

                        {{-- Wave Bar Mobile --}}
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
                            {{-- NAVIGASI TAB DIMULAI DARI 1 --}}
                            <button data-menu="1" class="cursor-pointer active:scale-95 snap-start shrink-0 px-4 md:px-5 py-1.5 md:py-2 rounded-lg bg-white text-blue-700 font-bold text-[9px] md:text-[10px] uppercase tracking-widest shadow-sm border border-slate-200 whitespace-nowrap transition-all">
                                1. Pembelajaran
                            </button>
                            <button data-menu="2" class="cursor-pointer active:scale-95 snap-start shrink-0 px-4 md:px-5 py-1.5 md:py-2 rounded-lg text-slate-500 hover:text-slate-900 hover:bg-white/50 font-bold text-[9px] md:text-[10px] uppercase tracking-widest border border-transparent whitespace-nowrap transition-all">
                                2. Presensi
                            </button>
                            <button data-menu="3" class="cursor-pointer active:scale-95 snap-start shrink-0 px-4 md:px-5 py-1.5 md:py-2 rounded-lg text-slate-500 hover:text-slate-900 hover:bg-white/50 font-bold text-[9px] md:text-[10px] uppercase tracking-widest border border-transparent whitespace-nowrap transition-all">
                                3. Penugasan
                            </button>
                            <button data-menu="4" class="cursor-pointer active:scale-95 snap-start shrink-0 px-4 md:px-5 py-1.5 md:py-2 rounded-lg text-slate-500 hover:text-slate-900 hover:bg-white/50 font-bold text-[9px] md:text-[10px] uppercase tracking-widest border border-transparent whitespace-nowrap transition-all">
                                4. Anggota
                            </button>
                        </nav>
                        
                        {{-- Wave Bar Desktop --}}
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

            <div class="max-w-6xl mx-auto w-full p-4 md:p-6 lg:p-8 space-y-4 sm:space-y-6 pb-20">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 sm:gap-6">
                    
                    <div class="lg:col-span-2 space-y-4 sm:space-y-6">
                        <div data-aos="fade-up" data-aos-duration="600" class="bg-white p-4 sm:p-6 rounded-[1.5rem] sm:rounded-[2rem] border border-slate-200 shadow-sm flex flex-col md:flex-row gap-4 sm:gap-6 items-start">
                            <div class="w-full md:w-1/3 h-40 sm:h-48 md:h-40 rounded-xl sm:rounded-2xl overflow-hidden relative group shrink-0">
                                <img src="{{ $kelas->sampul ? asset('storage/'.$kelas->sampul) : asset('images/course-banner.jpg') }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" alt="Thumbnail" />
                                <div class="absolute top-2 sm:top-3 left-2 sm:left-3 bg-white/90 backdrop-blur-sm px-2.5 sm:px-3 py-1 rounded-md sm:rounded-lg text-[8px] sm:text-[9px] font-black uppercase tracking-widest text-slate-900 shadow-sm">
                                    {{ $kelas->mataKuliah->kode }}
                                </div>
                            </div>
                            
                            <div class="flex-1 space-y-2 sm:space-y-3 w-full pointer-events-none">
                                <h2 class="text-base sm:text-lg md:text-xl font-black text-slate-900 leading-tight">
                                    {{ $kelas->mataKuliah->nama }}
                                </h2>
                                <p id="deskripsi-matkul" class="text-xs sm:text-sm font-medium text-slate-500 leading-relaxed line-clamp-3">
                                    {{ $kelas->mataKuliah->deskripsi }}
                                </p>
                                <div class="pt-1 sm:pt-2 flex gap-2">
                                    <span class="px-2 sm:px-3 py-1 bg-blue-50 text-blue-700 text-[8px] sm:text-[9px] font-bold uppercase tracking-wider rounded-md sm:rounded-lg border border-blue-100">{{ $kelas->mataKuliah->sks }} SKS</span>
                                </div>
                            </div>
                        </div>

                        <div data-aos="fade-up" data-aos-duration="600" data-aos-delay="100" class="bg-blue-600 rounded-[1.5rem] sm:rounded-[2rem] p-5 sm:p-8 text-white relative overflow-hidden shadow-lg shadow-blue-200/50">
                            <div class="relative z-10 flex flex-col sm:flex-row justify-between items-start sm:items-end gap-3 sm:gap-4">
                                <div class="pointer-events-none w-full">
                                    <p class="text-blue-200 text-[8px] sm:text-[10px] font-bold uppercase tracking-widest mb-1">Progres Belajar Anda</p>
                                    @php
                                        $totalSesi = $kelas->courseSessions->count();
                                        $sesiSelesai = 0;
                                        
                                        if($totalSesi > 0) {
                                            foreach($kelas->courseSessions as $idx => $ss) {
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
                                    <h3 class="text-2xl sm:text-3xl font-black tracking-tight">{{ $persenProgres }}% Selesai</h3>
                                    <p class="text-[9px] sm:text-[10px] text-blue-200 font-bold mt-1">{{ floor($sesiSelesai) }} dari {{ $totalSesi }} pertemuan penuh</p>
                                </div>
                            </div>
                            
                            <div class="absolute -right-6 -bottom-10 opacity-20 pointer-events-none">
                                <svg class="w-32 h-32 sm:w-40 sm:h-40" viewBox="0 0 200 200" fill="currentColor">
                                    <path d="M45,-75.4C58.9,-69.3,71.4,-59.1,79.9,-46.3C88.4,-33.5,92.9,-18.1,89.6,-3.3C86.3,11.5,75.2,25.7,64.2,38.2C53.2,50.7,42.3,61.5,29.9,67.3C17.5,73.1,3.6,73.9,-9.4,72.1C-22.4,70.3,-34.5,65.9,-45.6,58.8C-56.7,51.7,-66.8,41.9,-73.4,30.1C-80,18.3,-83.1,4.5,-79.8,-7.8C-76.5,-20.1,-66.8,-30.9,-56.3,-39.7C-45.8,-48.5,-34.5,-55.3,-22.8,-62.8C-11.1,-70.3,1,-78.5,14.3,-80.8L27.6,-83.1Z" transform="translate(100 100)" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div data-aos="fade-up" data-aos-duration="600" data-aos-delay="200" class="bg-white p-4 sm:p-6 rounded-[1.5rem] sm:rounded-[2rem] border border-slate-200 shadow-sm h-fit">
                        <div class="flex items-center justify-between mb-4 sm:mb-6 pointer-events-none">
                            <h3 class="text-xs sm:text-sm font-black text-slate-900 uppercase tracking-widest">Alur Belajar</h3>
                            <span class="text-[8px] sm:text-[9px] font-bold text-slate-400 bg-slate-100 px-2 py-1 rounded-md border border-slate-200">{{ $totalSesi }} Pertemuan</span>
                        </div>

                        <div class="relative space-y-0 pl-1 sm:pl-2">
                            <div class="absolute top-4 left-[15px] sm:left-[19px] bottom-4 w-[2px] bg-slate-100 pointer-events-none"></div>

                            {{-- MENGGUNAKAN DATA-MENU DIMULAI DARI 5 --}}
                            @php $voiceId = 5; @endphp 
                            @forelse ($kelas->courseSessions as $index => $sess)
                                @php
                                    $adaMateri = $sess->materis && $sess->materis->count() > 0;
                                    $adaDiskusi = $sess->discussions && $sess->discussions->count() > 0;
                                    $isSelesai = $adaMateri && $adaDiskusi; 
                                @endphp

                                <div data-menu="{{ $voiceId }}" class="relative pl-8 sm:pl-10 py-2 sm:py-3 group cursor-pointer active:scale-[0.98] transition-transform">
                                    
                                    <div class="absolute left-[6px] sm:left-[10px] top-4 sm:top-5 w-4 h-4 sm:w-5 sm:h-5 rounded-full border-4 border-white shadow-sm z-10 flex items-center justify-center pointer-events-none
                                        {{ $isSelesai ? 'bg-emerald-500' : 'bg-blue-600 animate-pulse' }}">
                                        @if ($isSelesai)
                                            <svg class="w-2 h-2 sm:w-2.5 sm:h-2.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M5 13l4 4L19 7" /></svg>
                                        @endif
                                    </div>

                                    <div class="bg-white border border-blue-100 sm:border-blue-200 shadow-sm sm:shadow-md shadow-blue-50 transform group-hover:scale-[1.02] p-3 sm:p-4 rounded-xl sm:rounded-2xl transition-all pointer-events-none">
                                        <div class="flex justify-between items-start">
                                            <span class="text-[8px] sm:text-[9px] font-black uppercase tracking-wider mb-1 block {{ $isSelesai ? 'text-emerald-600' : 'text-blue-600' }}">
                                                Pertemuan {{ $sess->urutan }}
                                            </span>
                                            <span class="text-[8px] sm:text-[9px] font-bold text-slate-400 bg-slate-50 px-1.5 py-0.5 rounded border border-slate-200 shadow-sm">#{{ $voiceId }}</span>
                                        </div>
                                        <h4 class="text-[11px] sm:text-xs font-bold uppercase text-slate-800 leading-snug">
                                            {{ $sess->judul ?? 'Materi Belum Diatur' }}
                                        </h4>
                                        @if ($isSelesai)
                                            <p class="text-[8px] sm:text-[9px] text-emerald-500 mt-1 font-bold">Selesai 100%</p>
                                        @else
                                            <p class="text-[8px] sm:text-[9px] text-blue-500 mt-1 font-bold">Progres 50%</p>
                                        @endif
                                    </div>
                                </div>
                                @php $voiceId++; @endphp
                            @empty
                                <div class="text-center py-4 text-[10px] sm:text-xs font-bold text-slate-400 border border-dashed border-slate-200 rounded-xl pointer-events-none">Belum ada sesi pertemuan.</div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            AOS.init({ once: true, easing: "ease-out-cubic" });

            const sesiList = [
                @php $vId = 5; @endphp
                @foreach($kelas->courseSessions as $sess)
                    {
                        id: {{ $sess->id }},
                        urutan: "{{ $sess->urutan }}",
                        judul: "{{ addslashes($sess->judul ?? 'Pertemuan '.$sess->urutan) }}",
                        voiceId: {{ $vId }}
                    },
                    @php $vId++; @endphp
                @endforeach
            ];

            const urlPembelajaran = "{{ route('course.detail', ['kelas' => $kelas->id]) }}";
            const urlPenugasan = "{{ route('course.assignments', ['kelas' => $kelas->id]) }}";
            const urlAnggota = "{{ route('course.members', ['kelas' => $kelas->id]) }}";
            const urlPresensi = "{{ $session ? route('course.attendance', ['id' => $session->id]) : '#' }}";

            // ==========================================
            // LOGIKA VOICE ASSISTANT & SECURE DOUBLE CLICK
            // ==========================================
            const statusDesc = document.getElementById("status-desc");
            const waveBarsDesktop = document.querySelectorAll("#wave-container-desktop .wave-bar");
            const waveBarsMobile = document.querySelectorAll("#wave-container-mobile .wave-bar");
            const synth = window.speechSynthesis;
            const SpeechRec = window.webkitSpeechRecognition || window.SpeechRecognition;
            
            let rec = null;
            let waveInterval;
            let isRecActive = false;
            let isRedirecting = false;
            let isSpeaking = false;

            if (SpeechRec) {
                rec = new SpeechRec();
                rec.lang = "id-ID";
                rec.continuous = true;
                rec.interimResults = true; 
            }

            function setWave(active) {
                if (active) {
                    if (waveInterval) clearInterval(waveInterval);
                    waveInterval = setInterval(() => {
                        if (waveBarsDesktop.length > 0) {
                            waveBarsDesktop.forEach((bar) => { bar.style.height = `${Math.floor(Math.random() * 16) + 4}px`; });
                        }
                        if (waveBarsMobile.length > 0) {
                            waveBarsMobile.forEach((bar) => { bar.style.height = `${Math.floor(Math.random() * 16) + 4}px`; });
                        }
                    }, 100);
                } else {
                    clearInterval(waveInterval);
                    if (waveBarsDesktop.length > 0) {
                        waveBarsDesktop.forEach((bar) => (bar.style.height = "4px"));
                    }
                    if (waveBarsMobile.length > 0) {
                        waveBarsMobile.forEach((bar) => (bar.style.height = "4px"));
                    }
                }
            }

            let clickTimer = null;
            const clickDelay = 300; 

            document.body.addEventListener('click', (e) => {
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
                if (!rec || isRedirecting || isRecActive) return;
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
                    const savedRate = localStorage.getItem("speechRate");
                    utter.rate = savedRate ? parseFloat(savedRate) : 1.1;

                    utter.onstart = () => {
                        isSpeaking = true;
                        if (statusDesc) {
                            statusDesc.innerText = "SISTEM BERBICARA";
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
                            statusDesc.classList.replace("text-slate-400", "text-green-600");
                            statusDesc.classList.replace("text-blue-600", "text-green-600");
                        }
                        if (callback) callback();
                    };

                    utter.onerror = () => {
                        isSpeaking = false;
                        setWave(false);
                        if (!isRedirecting && statusDesc) {
                            statusDesc.innerText = "MENDENGARKAN";
                            statusDesc.classList.replace("text-slate-400", "text-green-600");
                            statusDesc.classList.replace("text-blue-600", "text-green-600");
                        }
                        mulaiMendengar();
                    };

                    synth.speak(utter);
                }, 50);
            }

            function getPanduanSuara() {
                const namaMatkul = "{{ $kelas->mataKuliah->nama }}";
                const deskripsiMatkul = document.getElementById('deskripsi-matkul').innerText.trim();
                
                let teks = `Anda berada di kelas ${namaMatkul}. Deskripsi: ${deskripsiMatkul}. `;
                teks += "Daftar Alur Belajar Anda: ";
                
                if (sesiList.length > 0) {
                    let maxRead = sesiList.length > 3 ? 3 : sesiList.length;
                    for (let i = 0; i < maxRead; i++) {
                        let judulBersih = sesiList[i].judul.replace(/[^A-Za-z0-9 \.,\?]/g, '');
                        teks += `Pertemuan ${sesiList[i].urutan}: ${judulBersih}. Sebutkan angka ${sesiList[i].voiceId}. `;
                    }
                    if(sesiList.length > 3) teks += "Dan seterusnya. ";
                } else {
                    teks += "Belum ada materi pertemuan. ";
                }

                // Panduan suara dikembalikan 0 untuk kembali
                teks += "Menu navigasi: Satu untuk Pembelajaran, Dua untuk Presensi, Tiga untuk Penugasan, Empat untuk Anggota, atau Nol untuk kembali. Katakan Ulang, jika butuh panduan.";
                return teks;
            }

            window.navigasiKe = function(nomor) {
                if (isRedirecting) return;

                let tujuan = ""; let teks = "";

                // Navigasi dengan 0 sebagai kembali
                if (nomor === 0) {
                    tujuan = "{{ route('courses.index') }}";
                    teks = "Nol. Kembali ke Daftar Mata Kuliah.";
                } else if (nomor === 1) {
                    teks = "Satu. Anda sudah berada di halaman Pembelajaran.";
                } else if (nomor === 2) {
                    tujuan = urlPresensi;
                    teks = tujuan === '#' ? "Halaman presensi belum tersedia di kelas ini karena belum ada pertemuan." : "Dua. Membuka halaman Presensi.";
                } else if (nomor === 3) {
                    tujuan = urlPenugasan;
                    teks = "Tiga. Membuka halaman Penugasan.";
                } else if (nomor === 4) {
                    tujuan = urlAnggota;
                    teks = "Empat. Membuka daftar Anggota kelas.";
                } 
                // Navigasi ke Materi Pertemuan (Mulai dari 5)
                else if (nomor >= 5) {
                    let sesiTujuan = sesiList.find(s => s.voiceId === nomor);
                    if(sesiTujuan) {
                        teks = `Membuka materi ${sesiTujuan.judul.replace(/[^A-Za-z0-9 \.,\?]/g, '')}.`;
                        const baseUrl = "{{ route('topic.detail', ['kelas' => $kelas->id, 'session' => 'SESSION_ID']) }}"; 
                        tujuan = baseUrl.replace('SESSION_ID', sesiTujuan.id);
                    } else {
                        teks = "Nomor pertemuan tidak ditemukan.";
                    }
                }

                if (teks !== "") {
                    if (tujuan !== "" && tujuan !== "#") {
                        isRedirecting = true;
                        synth.cancel();
                        if(rec) rec.abort();

                        if(statusDesc) {
                            statusDesc.innerText = "MENGALIHKAN...";
                            statusDesc.classList.replace("text-green-600", "text-slate-800");
                            statusDesc.classList.replace("text-blue-600", "text-slate-800");
                        }

                        bicara(teks);
                        setTimeout(() => { window.location.href = tujuan; }, 400); 
                    } else {
                        bicara(teks, () => {
                            try { rec.start(); } catch(e){}
                        });
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

                    const omonganBot = [
                        "anda berada di kelas", "deskripsi:", "daftar alur belajar",
                        "pertemuan", "sebutkan angka", "belum ada materi",
                        "menu navigasi", "dua untuk presensi", "tiga untuk penugasan",
                        "empat untuk anggota", "nol untuk kembali", "katakan ulang",
                        "membuka materi", "sudah berada", "halaman presensi belum"
                    ];

                    if (omonganBot.some(kalimat => hasil.includes(kalimat))) return;
                    if (isSpeaking) return;

                    prosesJawaban(hasil);
                };

                rec.onend = () => { 
                    isRecActive = false;
                    if (!isRedirecting) mulaiMendengar(); 
                };
            }

            function prosesJawaban(hasil) {
                if (hasil.includes("ulang") || hasil.includes("panduan")) {
                    synth.cancel(); if(rec) rec.abort();
                    bicara(getPanduanSuara(), () => { mulaiMendengar(); });
                    return;
                }

                const angka = hasil.match(/\d+/);
                if (angka) {
                    window.navigasiKe(parseInt(angka[0]));
                    return;
                }

                // Pengenalan "nol" dan "kosong" dikembalikan
                const mapKata = {
                    "nol": 0, "kosong": 0,
                    "satu": 1, "sato": 1, "sate": 1,
                    "dua": 2, "tua": 2, "jua": 2, 
                    "tiga": 3, "empat": 4, "lima": 5, 
                    "enam": 6, "tujuh": 7, "tuju": 7, 
                    "delapan": 8, "sembilan": 9, "sepuluh": 10,
                    "sebelas": 11, "dua belas": 12, "tiga belas": 13, "empat belas": 14, "lima belas": 15,
                    "enam belas": 16, "tujuh belas": 17, "delapan belas": 18, "sembilan belas": 19, "dua puluh": 20
                };

                for (let kata in mapKata) {
                    if (hasil.includes(kata)) {
                        window.navigasiKe(mapKata[kata]);
                        return;
                    }
                }
            }

            window.addEventListener("load", () => {
                document.body.addEventListener("click", () => {}, { once: true });
                setTimeout(() => {
                    bicara(getPanduanSuara());
                }, 800);
            });
        </script>
        <x-accessibility-widget />
    </body>
</html>