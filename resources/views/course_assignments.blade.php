<!DOCTYPE html>
<html lang="id" class="h-full">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>Daftar Tugas - {{ $kelas->mataKuliah->nama }} | LMS Inklusi UMMI</title>

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
                                    {{ $kelas->mataKuliah->nama }}
                                </h1>
                                <p class="text-[8px] md:text-[10px] font-bold text-blue-600 uppercase tracking-widest mt-1 truncate">
                                    Dosen: {{ $kelas->dosen->nama ?? '-' }}
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
                        <nav class="w-full lg:w-auto flex p-1 sm:p-1.5 bg-slate-100/80 rounded-xl overflow-x-auto scrollbar-hide snap-x gap-1 border border-slate-200/50">
                            <button onclick="navigasiKe(1)" class="cursor-pointer active:scale-95 snap-start shrink-0 px-3 sm:px-5 py-1.5 sm:py-2 rounded-lg text-slate-500 hover:text-slate-900 hover:bg-white/50 font-bold text-[9px] sm:text-[10px] uppercase tracking-widest border border-transparent whitespace-nowrap transition-all">
                                1. Pembelajaran
                            </button>
                            <button onclick="navigasiKe(2)" class="cursor-pointer active:scale-95 snap-start shrink-0 px-3 sm:px-5 py-1.5 sm:py-2 rounded-lg text-slate-500 hover:text-slate-900 hover:bg-white/50 font-bold text-[9px] sm:text-[10px] uppercase tracking-widest border border-transparent whitespace-nowrap transition-all">
                                2. Presensi
                            </button>
                            <button onclick="navigasiKe(3)" class="cursor-pointer active:scale-95 snap-start shrink-0 px-3 sm:px-5 py-1.5 sm:py-2 rounded-lg bg-white text-blue-700 font-bold text-[9px] sm:text-[10px] uppercase tracking-widest shadow-sm border border-slate-200 whitespace-nowrap transition-all">
                                3. Penugasan
                            </button>
                            <button onclick="navigasiKe(4)" class="cursor-pointer active:scale-95 snap-start shrink-0 px-3 sm:px-5 py-1.5 sm:py-2 rounded-lg text-slate-500 hover:text-slate-900 hover:bg-white/50 font-bold text-[9px] sm:text-[10px] uppercase tracking-widest border border-transparent whitespace-nowrap transition-all">
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

            @php
                $mahasiswaId = Auth::guard('mahasiswa')->id();
                $jumlahSelesai = 0;
                $jumlahBelum = 0;

                foreach($assignments as $tugas) {
                    $sub = \App\Models\Submission::where('assignment_id', $tugas->id)
                                ->where('mahasiswa_id', $mahasiswaId)
                                ->first();

                    $isBenarSelesai = $sub && ($sub->file_path || $sub->text_submission || $sub->voice_submission || $sub->voice_url || $sub->text_online);

                    if ($isBenarSelesai) {
                        $jumlahSelesai++;
                    } else {
                        $jumlahBelum++;
                    }
                }
            @endphp

            <div class="max-w-6xl mx-auto w-full p-4 sm:p-6 lg:p-8 space-y-6 sm:space-y-8 pb-20">
                
                <div class="grid grid-cols-2 md:grid-cols-2 gap-3 sm:gap-4">
                    <div data-aos="fade-up" data-aos-duration="600" class="bg-white p-4 sm:p-6 rounded-[1.5rem] sm:rounded-[2rem] border border-slate-200 shadow-sm flex flex-col sm:flex-row items-center gap-3 sm:gap-4 text-center sm:text-left">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-xl sm:rounded-2xl bg-blue-50 text-blue-600 flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                        </div>
                        <div>
                            <h3 class="text-xl sm:text-2xl font-black text-slate-900 leading-none">{{ $assignments->count() }} <span class="hidden sm:inline">Tugas</span></h3>
                            <p class="text-[8px] sm:text-[10px] font-bold text-slate-400 uppercase tracking-widest mt-1">Total Semester Ini</p>
                        </div>
                    </div>

                    <div data-aos="fade-up" data-aos-duration="600" data-aos-delay="100" class="bg-white p-4 sm:p-6 rounded-[1.5rem] sm:rounded-[2rem] border border-orange-200 shadow-sm flex flex-col sm:flex-row items-center gap-3 sm:gap-4 text-center sm:text-left">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-xl sm:rounded-2xl bg-orange-50 text-orange-600 flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <div>
                            <h3 class="text-xl sm:text-2xl font-black text-orange-600 leading-none">{{ $jumlahBelum }} <span class="hidden sm:inline">Aktif</span></h3>
                            <p class="text-[8px] sm:text-[10px] font-bold text-orange-400 uppercase tracking-widest mt-1">Perlu Dikerjakan</p>
                        </div>
                    </div>
                </div>

                <div class="space-y-4 sm:space-y-8">
                    <div>
                        <div data-aos="fade-in" class="flex items-center justify-between mb-3 sm:mb-4 px-1 sm:px-2">
                            <h3 class="text-xs sm:text-sm font-black text-slate-900 uppercase tracking-widest">Daftar Semua Tugas</h3>
                        </div>

                        <div data-aos="fade-up" data-aos-duration="600" class="bg-white rounded-[1.5rem] sm:rounded-[2.5rem] p-4 sm:p-6 border border-slate-200 shadow-sm space-y-3 sm:space-y-4">
                            
                            @forelse($assignments as $index => $tugas)
                                @php
                                    $subData = \App\Models\Submission::where('assignment_id', $tugas->id)
                                        ->where('mahasiswa_id', Auth::guard('mahasiswa')->id())
                                        ->first();

                                    $isSelesai = $subData && ($subData->file_path || $subData->text_submission || $subData->text_online || $subData->voice_submission || $subData->voice_url);
                                    
                                    $borderClass = $isSelesai ? 'border-emerald-200 hover:bg-emerald-50 bg-emerald-50/20' : 'border-slate-100 hover:border-orange-200 hover:bg-orange-50/30';
                                    $lineClass = $isSelesai ? 'bg-emerald-400' : 'bg-orange-400';
                                    $iconBg = $isSelesai ? 'bg-emerald-100 text-emerald-700' : 'bg-orange-100 text-orange-700';
                                @endphp

                                <a href="{{ route('mahasiswa.assignment.detail', ['kelas' => $kelas->id,'assignment' => $tugas->id]) }}" class="group flex flex-col sm:flex-row items-start sm:items-center gap-3 sm:gap-4 p-3 sm:p-4 rounded-xl sm:rounded-2xl border {{ $borderClass }} transition-all cursor-pointer relative overflow-hidden block">
                                    <div class="absolute left-0 top-0 bottom-0 w-1 sm:w-1.5 {{ $lineClass }} rounded-l-xl sm:rounded-l-2xl"></div>
                                    
                                    <div class="flex items-center gap-3 sm:gap-4 w-full sm:flex-1">
                                        <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-lg sm:rounded-xl {{ $iconBg }} flex items-center justify-center shrink-0 font-black text-xs sm:text-sm shadow-sm group-hover:scale-105 transition-transform">
                                            {{ $index + 5 }} 
                                        </div>
                                        <div class="flex-1 min-w-0 pr-2 sm:pr-0">
                                            <h4 class="text-xs sm:text-sm font-bold text-slate-800 truncate sm:whitespace-normal">{{ $tugas->judul }}</h4>
                                            <div class="flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-2 mt-1 text-[10px] sm:text-xs font-medium {{ $isSelesai ? 'text-emerald-600' : 'text-orange-600' }}">
                                                <div class="flex items-center gap-1">
                                                    <svg class="w-3 h-3 sm:w-4 sm:h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                                    <span class="truncate">Tenggat: {{ \Carbon\Carbon::parse($tugas->deadline)->translatedFormat('d M Y, H:i') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex flex-row items-center justify-between sm:justify-end gap-3 shrink-0 mt-2 sm:mt-0 w-full sm:w-auto pl-14 sm:pl-0">
                                        @if($isSelesai)
                                            @if($subData->nilai !== null)
                                                <span class="px-2.5 sm:px-3 py-1 rounded-full bg-emerald-100 text-emerald-700 text-[8px] sm:text-[9px] font-bold uppercase tracking-widest truncate">Nilai: {{ $subData->nilai }}</span>
                                            @else
                                                <span class="px-2.5 sm:px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-[8px] sm:text-[9px] font-bold uppercase tracking-widest truncate">Menunggu Nilai</span>
                                            @endif
                                        @else
                                            <span class="px-2.5 sm:px-3 py-1 rounded-full bg-orange-100 text-orange-700 text-[8px] sm:text-[9px] font-bold uppercase tracking-widest truncate">Belum Dikumpulkan</span>
                                        @endif
                                        
                                        <span class="text-center sm:text-left px-3 sm:px-4 py-1.5 sm:py-2 rounded-lg sm:rounded-xl bg-white border sm:border-2 border-slate-100 text-slate-700 font-bold text-[9px] sm:text-[10px] uppercase tracking-widest group-hover:bg-slate-800 group-hover:text-white group-hover:border-transparent transition-all">Buka</span>
                                    </div>
                                </a>
                            @empty
                                <div class="text-center py-8">
                                    <p class="text-slate-400 font-bold text-xs sm:text-sm">Belum ada tugas di kelas ini.</p>
                                </div>
                            @endforelse

                        </div>
                    </div>
                </div>
            </div>
        </main>

        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            AOS.init({ once: true, easing: "ease-out-cubic" });

            // Data Tugas Dinamis Untuk Navigasi Suara
            const tugasList = [
                @foreach($assignments as $index => $tugas)
                    {
                        id: {{ $tugas->id }},
                        judul: "{{ addslashes($tugas->judul) }}",
                        voiceId: {{ $index + 5 }}
                    },
                @endforeach
            ];

            // ==========================================
            // LOGIKA VOICE ASSISTANT (BARGE-IN & ANTI-HANG)
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
                    utter.rate = savedRate ? parseFloat(savedRate) : 1.0;

                    utter.onstart = () => {
                        isSpeaking = true;
                        if (statusDesc) {
                            statusDesc.innerText = "BERBICARA...";
                            statusDesc.classList.replace("text-slate-400", "text-blue-600");
                        }
                        setWave(true);
                        mulaiMendengar(); // Microphone nyala berbarengan (Barge-in)
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

            // Fungsi Terpusat Untuk Membacakan Panduan Halaman Tugas
            function getPanduanSuara() {
                const namaMatkul = "{{ addslashes($kelas->mataKuliah->nama) }}";
                let totalTugas = {{ $assignments->count() }};
                let sisaTugas = {{ $jumlahBelum }};
                
                let teks = `Anda berada di Halaman Daftar Penugasan untuk mata kuliah ${namaMatkul}. `;
                
                if (totalTugas > 0) {
                    teks += `Terdapat ${totalTugas} tugas. `;
                    if(sisaTugas > 0) {
                        teks += `Anda memiliki ${sisaTugas} tugas yang belum dikerjakan. `;
                    } else {
                        teks += `Hebat, semua tugas telah Anda selesaikan. `;
                    }

                    teks += `Berikut adalah daftar tugasnya: `;
                    
                    let maxRead = tugasList.length > 3 ? 3 : tugasList.length;
                    for (let i = 0; i < maxRead; i++) {
                        let judulBersih = tugasList[i].judul.replace(/[^A-Za-z0-9 \.,\?]/g, '');
                        teks += `Sebutkan angka ${tugasList[i].voiceId} untuk membuka tugas ${judulBersih}. `;
                    }
                    if(tugasList.length > 3) teks += "Dan seterusnya. ";
                } else {
                    teks += "Saat ini belum ada tugas yang diberikan oleh dosen. ";
                }
                
                teks += "Untuk navigasi, sebutkan satu untuk Pembelajaran, dua untuk Presensi, tiga tetap di Penugasan, empat untuk Anggota kelas, atau nol untuk kembali. Katakan Ulang, jika butuh panduan lagi.";
                
                return teks;
            }

            function navigasiKe(nomor) {
                if (isRedirecting) return;

                let tujuan = ""; let teks = "";

                if (nomor === 0 || nomor === 1) {
                    tujuan = "{{ route('course.detail', $kelas->id) }}";
                    teks = nomor === 0 ? "Nol. Kembali ke Beranda Kelas." : "Satu. Membuka halaman Pembelajaran.";
                } 
                else if (nomor === 2) {
                    @if(isset($session) && $session)
                        tujuan = "{{ route('course.attendance', $session->id) }}";
                        teks = "Dua. Membuka halaman Presensi.";
                    @else
                        tujuan = "#";
                        teks = "Dua. Halaman presensi belum tersedia di kelas ini karena belum ada sesi yang dibuat dosen.";
                    @endif
                } 
                else if (nomor === 3) {
                    tujuan = "#";
                    teks = "Tiga. Anda sudah berada di halaman Penugasan.";
                } 
                else if (nomor === 4) {
                    tujuan = "{{ route('course.members', $kelas->id) }}";
                    teks = "Empat. Membuka daftar Anggota kelas.";
                } 
                else if (nomor >= 5) {
                    let tugasTujuan = tugasList.find(t => t.voiceId === nomor);
                    if(tugasTujuan) {
                        teks = `Membuka Tugas ${tugasTujuan.judul.replace(/[^A-Za-z0-9 \.,\?]/g, '')}.`;
                        tujuan = "{{ url('/mata-kuliah') }}/{{ $kelas->id }}/penugasan/" + tugasTujuan.id;
                    } else {
                        teks = "Nomor tugas tidak ditemukan.";
                        tujuan = "#";
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
                        }
                    }

                    bicara(teks, () => {
                        if (tujuan !== "" && tujuan !== "#") {
                            window.location.href = tujuan;
                        } else {
                            try { rec.start(); } catch(e){}
                        }
                    });

                    // Fallback Anti-Hang Chrome
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
                        "anda berada di halaman daftar penugasan", "panduan navigasi menu",
                        "sebutkan angka satu", "dua untuk presensi", "tiga untuk tetap",
                        "empat untuk anggota", "terdapat", "tugas yang belum dikerjakan",
                        "hebat semua tugas telah", "berikut daftarnya", "membuka tugas",
                        "dan seterusnya", "belum ada tugas", "sebutkan angka nol", "katakan ulang",
                        "sudah berada"
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
                // Fitur Ulangi Panduan
                if(hasil.includes("ulang") || hasil.includes("panduan") || hasil.includes("bantuan")) {
                    synth.cancel(); if(rec) rec.abort();
                    bicara(getPanduanSuara(), () => { mulaiMendengar(); });
                    return;
                }

                // Deteksi Angka Langsung
                const angka = hasil.match(/\d+/);
                if (angka) {
                    synth.cancel(); if(rec) rec.abort();
                    navigasiKe(parseInt(angka[0]));
                    return;
                }

                // Deteksi Pengejaan Kata
                const kataAngka = {
                    "nol": 0, "kosong": 0, 
                    "satu": 1, "sato": 1, 
                    "dua": 2, "tua": 2, "jua": 2, 
                    "tiga": 3, "empat": 4, "lima": 5, 
                    "enam": 6, "tujuh": 7, "tuju": 7, 
                    "delapan": 8, "sembilan": 9, "sepuluh": 10,
                    "sebelas": 11, "dua belas": 12, "tiga belas": 13, "empat belas": 14, "lima belas": 15
                };

                for (let kata in kataAngka) {
                    if (hasil.includes(kata)) { 
                        synth.cancel(); if(rec) rec.abort();
                        navigasiKe(kataAngka[kata]); 
                        return; 
                    }
                }

                // Deteksi Alias
                if (hasil.includes("kembali") || hasil.includes("beranda")) { synth.cancel(); if(rec) rec.abort(); navigasiKe(0); }
                else if (hasil.includes("pembelajaran") || hasil.includes("materi")) { synth.cancel(); if(rec) rec.abort(); navigasiKe(1); }
                else if (hasil.includes("presensi") || hasil.includes("absen")) { synth.cancel(); if(rec) rec.abort(); navigasiKe(2); }
                else if (hasil.includes("penugasan") || hasil.includes("tugas")) { synth.cancel(); if(rec) rec.abort(); navigasiKe(3); }
                else if (hasil.includes("anggota") || hasil.includes("peserta")) { synth.cancel(); if(rec) rec.abort(); navigasiKe(4); }
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