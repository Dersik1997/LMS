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
        </style>
    </head>
    <body class="m-0 font-['Plus_Jakarta_Sans'] bg-[#f8fafc] min-h-[100dvh] flex flex-col border-box overflow-x-hidden text-slate-800">
        
        <div class="fixed top-0 left-0 w-full h-full overflow-hidden -z-10 pointer-events-none">
            <div class="absolute top-[-10%] right-[-5%] w-64 md:w-[400px] h-64 md:h-[400px] bg-blue-100/40 rounded-full blur-3xl opacity-50"></div>
            <div class="absolute bottom-[-10%] left-[-10%] w-64 md:w-[400px] h-64 md:h-[400px] bg-indigo-50/40 rounded-full blur-3xl opacity-50"></div>
        </div>

        <main class="flex-1 flex flex-col h-full overflow-y-auto custom-scrollbar relative">
            
            <div class="bg-white/90 backdrop-blur-2xl border-b border-slate-200/60 sticky top-0 z-40 px-3 sm:px-4 md:px-8 py-3 sm:py-4 shadow-sm transition-all w-full">
                <div class="max-w-7xl mx-auto flex flex-col lg:flex-row lg:items-center justify-between gap-3 lg:gap-6 relative">
                    
                    <div class="flex items-center justify-between w-full lg:w-auto gap-3 relative z-10">
                        <div class="flex items-center gap-3 md:gap-4 flex-1 min-w-0">
                            <a href="{{ route('course.detail', $kelas->id ?? 0) }}" class="w-9 h-9 sm:w-11 sm:h-11 md:w-12 md:h-12 rounded-full bg-slate-100 hover:bg-blue-600 text-slate-500 hover:text-white flex items-center justify-center transition-all duration-300 shadow-sm shrink-0 group border border-slate-200 hover:border-blue-600 relative cursor-pointer active:scale-95">
                                <svg class="w-4 h-4 sm:w-5 sm:h-5 md:w-6 md:h-6 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path>
                                </svg>
                                <span class="absolute -bottom-1 -right-1 bg-slate-800 text-white text-[8px] sm:text-[9px] font-black px-1.5 py-0.5 rounded-md border border-white shadow-sm">0</span>
                            </a>
                            
                            <a href="{{ route('course.detail', $kelas->id ?? 0) }}" class="hidden sm:block text-left cursor-pointer group shrink-0 decoration-transparent">
                                <span class="block text-[8px] md:text-[9px] font-bold text-slate-400 uppercase tracking-widest">Navigasi Suara</span>
                                <span class="block text-[10px] md:text-xs font-black text-slate-700 group-hover:text-blue-600 transition-colors">0 - Kembali</span>
                            </a>
                            
                            <div class="hidden lg:block w-px h-10 bg-slate-200 mx-1 md:mx-2"></div>
                            
                            <div class="overflow-hidden flex-1">
                                <h1 class="text-sm md:text-xl font-extrabold text-slate-900 tracking-tight leading-none truncate">
                                    {{ $mataKuliah->nama ?? 'Nama Mata Kuliah' }}
                                </h1>
                                <p class="text-[8px] md:text-[10px] font-bold text-blue-600 uppercase tracking-widest mt-1 truncate">
                                    Dosen: {{ $dosen->nama ?? '-' }}
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

                    <div class="flex flex-col sm:flex-row items-center gap-2 sm:gap-4 w-full lg:w-auto">
                        <nav class="w-full lg:w-auto flex p-1 sm:p-1.5 bg-slate-100/80 rounded-xl overflow-x-auto scrollbar-hide snap-x gap-1 border border-slate-200/50">
                            <button onclick="navigasiKe(1)" class="cursor-pointer active:scale-95 snap-start shrink-0 px-4 md:px-5 py-1.5 md:py-2 rounded-lg text-slate-500 hover:text-slate-900 hover:bg-white/50 font-bold text-[9px] md:text-[10px] uppercase tracking-widest border border-transparent whitespace-nowrap transition-all">
                                1. Pembelajaran
                            </button>
                            <button onclick="navigasiKe(2)" class="cursor-pointer active:scale-95 snap-start shrink-0 px-4 md:px-5 py-1.5 md:py-2 rounded-lg text-slate-500 hover:text-slate-900 hover:bg-white/50 font-bold text-[9px] md:text-[10px] uppercase tracking-widest border border-transparent whitespace-nowrap transition-all">
                                2. Presensi
                            </button>
                            <button onclick="navigasiKe(3)" class="cursor-pointer active:scale-95 snap-start shrink-0 px-4 md:px-5 py-1.5 md:py-2 rounded-lg text-slate-500 hover:text-slate-900 hover:bg-white/50 font-bold text-[9px] md:text-[10px] uppercase tracking-widest border border-transparent whitespace-nowrap transition-all">
                                3. Penugasan
                            </button>
                            <button onclick="navigasiKe(4)" class="cursor-pointer active:scale-95 snap-start shrink-0 px-4 md:px-5 py-1.5 md:py-2 rounded-lg bg-white text-blue-700 font-bold text-[9px] md:text-[10px] uppercase tracking-widest shadow-sm border border-slate-200 whitespace-nowrap transition-all">
                                4. Anggota
                            </button>
                        </nav>
                        
                        <div class="hidden lg:flex items-center gap-3 pl-4 border-l border-slate-200 relative z-10 justify-end shrink-0 w-32">
                            <div class="flex items-center gap-[2px] h-4 w-10 justify-center" id="wave-container-desktop">
                                <div class="wave-bar w-[2px] bg-blue-500 rounded-full h-1 transition-all"></div>
                                <div class="wave-bar w-[2px] bg-blue-400 rounded-full h-1 transition-all"></div>
                                <div class="wave-bar w-[2px] bg-blue-600 rounded-full h-1 transition-all"></div>
                            </div>
                            <span id="status-desc" class="text-[9px] font-black text-slate-400 uppercase tracking-widest w-full text-left">SIAP</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="max-w-6xl mx-auto w-full p-4 sm:p-6 lg:p-8 space-y-6 sm:space-y-8 pb-20">
                
                <div data-aos="fade-up" data-aos-duration="600" class="bg-gradient-to-br from-blue-600 to-blue-800 rounded-[1.5rem] sm:rounded-[2rem] p-5 sm:p-8 text-white shadow-xl shadow-blue-200/50 relative overflow-hidden">
                    <div class="relative z-10 flex flex-col md:flex-row items-center gap-4 sm:gap-6 text-center md:text-left">
                        <div class="w-16 h-16 sm:w-20 sm:h-20 rounded-full bg-white/20 border-4 border-white/10 flex items-center justify-center text-xl sm:text-2xl font-black shadow-inner shrink-0">
                            {{ strtoupper(substr($dosen->nama ?? 'A', 0, 2)) }}
                        </div>
                        <div class="flex-1 space-y-1">
                            <span class="bg-blue-500/50 px-2.5 sm:px-3 py-1 rounded-full text-[8px] sm:text-[9px] font-black uppercase tracking-widest border border-white/10">Dosen Pengampu</span>
                            <h2 class="text-lg sm:text-2xl font-black tracking-tight">{{ $dosen->nama ?? 'Nama Dosen' }}</h2>
                            <p class="text-[10px] sm:text-xs font-medium text-blue-100 flex items-center justify-center md:justify-start gap-1.5 sm:gap-2">
                                <span class="w-1.5 h-1.5 sm:w-2 sm:h-2 bg-emerald-400 rounded-full animate-pulse"></span>
                                {{ $dosen->nidn ?? '-' }}
                            </p>
                        </div>
                        <a href="{{ route('messages.show', $dosen->id ?? 0) }}" class="mt-2 md:mt-0 w-full md:w-auto bg-white text-blue-700 px-4 sm:px-6 py-2.5 sm:py-3 rounded-lg sm:rounded-xl font-black text-[9px] sm:text-[10px] uppercase tracking-widest hover:bg-blue-50 transition-transform transform hover:scale-105 active:scale-95 shadow-lg flex justify-center items-center gap-2 cursor-pointer">
                            <span class="bg-blue-100 text-blue-700 w-4 h-4 sm:w-5 sm:h-5 rounded text-[10px] sm:text-xs flex items-center justify-center font-black">5</span> Hubungi Dosen
                        </a>
                    </div>
                    <div class="absolute right-0 top-0 w-40 h-40 sm:w-64 sm:h-64 bg-white/5 rounded-full blur-2xl sm:blur-3xl -translate-y-1/2 translate-x-1/2 pointer-events-none"></div>
                </div>

                <div class="space-y-4 sm:space-y-6">
                    <div data-aos="fade-in" class="flex flex-col md:flex-row md:items-center justify-between gap-3 sm:gap-4 px-1 sm:px-2">
                        <h3 class="text-xs sm:text-sm font-black text-slate-900 uppercase tracking-widest flex items-center gap-2 w-full lg:w-auto">
                            Mahasiswa
                            <span class="bg-slate-200 text-slate-600 px-2 py-0.5 rounded-md text-[8px] sm:text-[9px]">{{ $totalMembers ?? 0 }} Orang</span>
                        </h3>

                        <div class="flex items-center gap-2 sm:gap-3 w-full lg:w-auto overflow-hidden">
                            <button onclick="navigasiKe(7)" class="flex-1 sm:flex-none bg-indigo-50 text-indigo-600 px-3 sm:px-4 py-2 sm:py-2.5 rounded-lg sm:rounded-xl border border-indigo-100 flex items-center justify-center gap-1.5 sm:gap-2 shadow-sm cursor-pointer hover:bg-indigo-100 hover:scale-105 transition-all group active:scale-95">
                                <span class="bg-indigo-200 text-indigo-700 w-4 h-4 rounded-sm flex items-center justify-center font-black text-[8px] sm:text-[9px] shrink-0">7</span>
                                <span class="text-[9px] sm:text-[10px] lg:text-xs font-bold truncate">Dengar Nama</span>
                            </button>

                            <div onclick="navigasiKe(6)" class="flex-1 sm:flex-none bg-white px-3 sm:px-4 py-2 sm:py-2.5 rounded-lg sm:rounded-xl border border-slate-200 flex items-center justify-center gap-1.5 sm:gap-2 shadow-sm cursor-pointer hover:border-blue-300 hover:scale-105 transition-all group active:scale-95">
                                <span class="bg-slate-100 text-slate-500 w-4 h-4 rounded-sm flex items-center justify-center font-black text-[8px] sm:text-[9px] shrink-0">6</span>
                                <span class="text-[9px] sm:text-[10px] lg:text-xs font-bold text-slate-500 group-hover:text-blue-500 truncate">Cari Teman...</span>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-4">
                        @forelse ($members as $index => $mhs)
                            <div data-aos="fade-up" data-aos-duration="600" data-aos-delay="{{ 100 + ($index * 20) }}" class="bg-white p-3 sm:p-5 rounded-2xl sm:rounded-3xl border border-slate-200 shadow-sm hover:shadow-md transition-all flex items-center gap-3 sm:gap-4 cursor-pointer hover:-translate-y-1 active:scale-[0.98]">
                                <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-xl sm:rounded-2xl bg-indigo-50 text-indigo-600 flex items-center justify-center font-black text-xs sm:text-sm border border-indigo-100 shrink-0">
                                    {{ strtoupper(substr($mhs->nama, 0, 2)) }}
                                </div>
                                <div class="flex-1 min-w-0">
                                    <h4 class="text-xs sm:text-sm font-bold text-slate-800 truncate">{{ $mhs->nama }}</h4>
                                    <p class="text-[9px] sm:text-[10px] text-slate-400 font-medium">{{ $mhs->nim }}</p>
                                </div>
                                <div class="w-1.5 h-1.5 sm:w-2 sm:h-2 {{ $mhs->is_online ? 'bg-emerald-500' : 'bg-slate-300' }} rounded-full shrink-0" title="{{ $mhs->is_online ? 'Online' : 'Offline' }}"></div>
                            </div>
                        @empty
                            <div class="col-span-full text-center py-6 sm:py-8 bg-white border border-dashed border-slate-200 rounded-2xl">
                                <p class="text-slate-400 font-bold text-xs sm:text-sm">Belum ada mahasiswa yang terdaftar di kelas ini.</p>
                            </div>
                        @endforelse
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
            let interval;

            // DATA ANGGOTA KELAS UNTUK DIBACAKAN
            const membersList = @json($members);

            if (SpeechRec) {
                rec = new SpeechRec();
                rec.lang = "id-ID";
                rec.continuous = true;
            }

            function setWave(active) {
                if (waveBarsDesktop.length > 0) {
                    waveBarsDesktop.forEach((bar) => { bar.style.height = active ? `${Math.floor(Math.random() * 12) + 4}px` : "4px"; });
                }
                if (waveBarsMobile.length > 0) {
                    waveBarsMobile.forEach((bar) => { bar.style.height = active ? `${Math.floor(Math.random() * 12) + 4}px` : "4px"; });
                }
            }

            function bicara(teks, callback) {
                synth.cancel();
                const utter = new SpeechSynthesisUtterance(teks);
                utter.lang = "id-ID";
                const savedRate = localStorage.getItem("speechRate");
                utter.rate = savedRate ? parseFloat(savedRate) : 1.0;

                utter.onstart = () => {
                    if (statusDesc) statusDesc.innerText = "BERBICARA...";
                    interval = setInterval(() => setWave(true), 150);
                };
                utter.onend = () => {
                    if (statusDesc) statusDesc.innerText = "MENDENGARKAN...";
                    clearInterval(interval);
                    setWave(false);
                    if (callback) callback();
                };
                synth.speak(utter);
            }

            const urlPembelajaran = "{{ route('course.detail', ['kelas' => $kelas->id]) }}";
            const urlPresensi = "{{ (isset($session) && $session) ? route('course.attendance', ['kelas' => $kelas->id, 'session' => $session->id]) : '#' }}";
            const urlPenugasan = "{{ (isset($session) && $session) ? route('course.assignments', ['kelas' => $kelas->id, 'session' => $session->id]) : '#' }}";
            const urlChatDosen = "{{ route('messages.show', $dosen->id ?? 0) }}";

            function getPanduanUtama() {
                const totalMhs = {{ $totalMembers ?? 0 }};
                let teks = `Anda berada di halaman Anggota Kelas. Terdapat ${totalMhs} mahasiswa di kelas ini. `;
                teks += "Sebutkan angka Lima untuk langsung menghubungi atau mengobrol dengan dosen Anda. ";
                teks += "Sebutkan angka Enam untuk mencari nama teman tertentu. ";
                teks += "Sebutkan angka Tujuh untuk mendengarkan saya menyebutkan satu per satu nama teman sekelas Anda. ";
                teks += "Sebutkan angka nol untuk kembali. Katakan Ulang, jika butuh bantuan panduan lagi. Katakan Stop, untuk menghentikan suara saya kapan saja.";
                
                return teks;
            }

            function navigasiKe(nomor) {
                let tujuan = "";
                let teks = "";

                if (nomor === 0) {
                    tujuan = urlPembelajaran;
                    teks = "Kembali ke Beranda Kelas.";
                } else if (nomor === 1) {
                    tujuan = urlPembelajaran;
                    teks = "Membuka Menu Pembelajaran.";
                } else if (nomor === 2) {
                    tujuan = urlPresensi;
                    teks = tujuan.includes('#') ? "Halaman presensi belum tersedia di kelas ini." : "Membuka Menu Presensi.";
                } else if (nomor === 3) {
                    tujuan = urlPenugasan;
                    teks = "Membuka Menu Penugasan.";
                } else if (nomor === 4) {
                    teks = "Anda sudah di Halaman Anggota.";
                } else if (nomor === 5) {
                    tujuan = urlChatDosen;
                    teks = "Mengarahkan ke ruang pesan Dosen.";
                } else if (nomor === 6) {
                    teks = "Mengaktifkan pencarian teman.";
                    bicara(teks, () => {
                        setTimeout(() => alert("Fitur pencarian diaktifkan... (Ketik nama)"), 500);
                        mulaiMendengar();
                    });
                    return; 
                } else if (nomor === 7) {
                    if (membersList.length === 0) {
                        teks = "Belum ada mahasiswa yang terdaftar di kelas ini.";
                    } else {
                        teks = "Membacakan daftar teman sekelas. ";
                        membersList.forEach((mhs, index) => {
                            teks += (index + 1) + ". " + mhs.nama + ". ";
                        });
                        teks += "Selesai membacakan daftar anggota.";
                    }
                }

                if (teks !== "") {
                    bicara(teks, () => {
                        if (tujuan !== "" && tujuan !== "#") {
                            window.location.href = tujuan;
                        } else {
                            mulaiMendengar();
                        }
                    });
                } else if (tujuan !== "" && tujuan !== "#") {
                    window.location.href = tujuan;
                }
            }

            function mulaiMendengar() {
                if (!rec) return;
                try {
                    rec.start();
                    rec.onresult = (event) => {
                        const hasil = event.results[event.results.length - 1][0].transcript.toLowerCase().trim();
                        
                        if(hasil.includes("stop") || hasil.includes("berhenti")) {
                            synth.cancel();
                            if(statusDesc) statusDesc.innerText = "MENDENGARKAN...";
                            clearInterval(interval);
                            setWave(false);
                            return;
                        }

                        if(hasil.includes("ulang") || hasil.includes("panduan") || hasil.includes("bantuan")) {
                            bicara(getPanduanUtama(), () => { mulaiMendengar(); });
                            return;
                        }

                        const kataAngka = {
                            "nol": 0, "satu": 1, "dua": 2, "tiga": 3, "empat": 4, "lima": 5, 
                            "enam": 6, "tujuh": 7, "delapan": 8, "sembilan": 9, "sepuluh": 10
                        };

                        let terdeteksiAngka = null;
                        const regexAngka = hasil.match(/\d+/);
                        
                        if (regexAngka) {
                            terdeteksiAngka = parseInt(regexAngka[0]);
                        } else {
                            for (let kata in kataAngka) {
                                if (hasil.includes(kata)) { terdeteksiAngka = kataAngka[kata]; break; }
                            }
                        }

                        if (terdeteksiAngka !== null) { navigasiKe(terdeteksiAngka); }
                        else if (hasil.includes("kembali") || hasil.includes("beranda")) { navigasiKe(0); }
                        else if (hasil.includes("pembelajaran") || hasil.includes("materi")) { navigasiKe(1); }
                        else if (hasil.includes("presensi") || hasil.includes("absen")) { navigasiKe(2); }
                        else if (hasil.includes("penugasan") || hasil.includes("tugas")) { navigasiKe(3); }
                        else if (hasil.includes("anggota") || hasil.includes("peserta")) { navigasiKe(4); }
                        else if (hasil.includes("dosen") || hasil.includes("hubungi") || hasil.includes("chat")) { navigasiKe(5); }
                        else if (hasil.includes("cari")) { navigasiKe(6); }
                        else if (hasil.includes("semua nama") || hasil.includes("dengar semua")) { navigasiKe(7); }
                    };
                    
                    rec.onend = () => { rec.start(); };
                } catch (e) { console.error("Error recognition:", e); }
            }

            window.onload = () => {
                document.body.addEventListener("click", () => {}, { once: true });
                
                setTimeout(() => { 
                    bicara(getPanduanUtama(), () => { mulaiMendengar(); }); 
                }, 800);
            };
        </script>
    </body>
</html>