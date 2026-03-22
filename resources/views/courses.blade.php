<!DOCTYPE html>
<html lang="id" class="h-full">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>Daftar Mata Kuliah | LMS Inklusi UMMI</title>

        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet" />

        <style>
            .custom-scrollbar::-webkit-scrollbar { width: 5px; }
            .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
            .custom-scrollbar::-webkit-scrollbar-thumb { background-color: #cbd5e1; border-radius: 20px; }
            .wave-bar { transition: height 0.1s ease; }
        </style>
    </head>
    <body class="m-0 font-['Plus_Jakarta_Sans'] bg-[#f8fafc] min-h-[100dvh] flex flex-col border-box overflow-x-hidden text-slate-800">
        
        <div class="fixed top-0 left-0 w-full h-full overflow-hidden -z-10 pointer-events-none">
            <div class="absolute top-[-10%] right-[-5%] w-64 md:w-[400px] h-64 md:h-[400px] bg-blue-100/40 rounded-full blur-3xl opacity-50"></div>
            <div class="absolute bottom-[-10%] left-[-10%] w-64 md:w-[400px] h-64 md:h-[400px] bg-indigo-50/40 rounded-full blur-3xl opacity-50"></div>
        </div>

        <main class="flex-1 flex flex-col h-full overflow-y-auto custom-scrollbar relative w-full">
            
            {{-- NAVBAR HEADER --}}
            <div class="bg-white/90 backdrop-blur-2xl border-b border-slate-200/60 sticky top-0 z-40 px-4 md:px-8 py-3 sm:py-4 shadow-sm transition-all w-full cursor-pointer" id="voice-header" title="Ketuk 2x untuk memotong suara sistem">
                <div class="max-w-7xl mx-auto flex items-center justify-between relative h-10 sm:h-12 md:h-14">
                    
                    {{-- TOMBOL 0 - KEMBALI --}}
                    <div class="flex items-center gap-2 sm:gap-4 relative z-10 w-auto justify-start pointer-events-auto">
                        <button data-menu="0" class="w-9 h-9 sm:w-11 sm:h-11 md:w-12 md:h-12 rounded-full bg-slate-100 hover:bg-blue-600 text-slate-500 hover:text-white flex items-center justify-center transition-all duration-300 shadow-sm shrink-0 group border border-slate-200 hover:border-blue-600 relative cursor-pointer">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5 md:w-6 md:h-6 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path>
                            </svg>
                            <span class="absolute -bottom-1 -right-1 bg-slate-800 text-white text-[8px] md:text-[9px] font-black px-1.5 py-0.5 rounded-md border border-white">0</span>
                        </button>
                        <div class="hidden sm:block text-left cursor-pointer group" data-menu="0">
                            <span class="block text-[8px] md:text-[9px] font-bold text-slate-400 uppercase tracking-widest pointer-events-none">Navigasi Suara</span>
                            <span class="block text-[10px] md:text-xs font-black text-slate-700 group-hover:text-blue-600 transition-colors pointer-events-none">0 - Kembali</span>
                        </div>
                    </div>

                    <div class="text-center absolute left-1/2 transform -translate-x-1/2 w-[50%] sm:w-[60%] md:max-w-md mt-0 pointer-events-none">
                        <h1 class="text-sm sm:text-lg md:text-2xl font-black text-slate-900 tracking-tight leading-tight truncate">
                            Daftar Mata Kuliah
                        </h1>
                        <div class="flex items-center justify-center gap-1 sm:gap-2 mt-0.5 sm:mt-1">
                            <span class="text-[7px] sm:text-[9px] md:text-[10px] font-bold text-blue-600 uppercase tracking-widest bg-blue-100 px-1.5 sm:px-2 py-0.5 rounded-md">
                                Sem. Berjalan
                            </span>
                        </div>
                    </div>

                    <div class="flex items-center gap-1.5 sm:gap-3 pl-2 sm:pl-6 border-l border-slate-200 relative z-10 justify-end pointer-events-none">
                        <div class="flex items-center gap-[2px] h-4 w-6 sm:w-10 justify-center" id="wave-container">
                            <div class="wave-bar w-[2px] bg-blue-500 rounded-full h-1 transition-all"></div>
                            <div class="wave-bar w-[2px] bg-blue-400 rounded-full h-1 transition-all"></div>
                            <div class="wave-bar w-[2px] bg-blue-600 rounded-full h-1 transition-all"></div>
                        </div>
                        <span id="status-desc" class="hidden sm:block text-[8px] md:text-[9px] font-black text-slate-400 uppercase tracking-widest w-12 sm:w-20 text-left">MENYIAPKAN</span>
                    </div>
                </div>
            </div>

            <div class="max-w-4xl mx-auto w-full p-4 md:p-8 space-y-4 md:space-y-5 pt-4 md:pt-8 pb-20">
                
                <div data-aos="fade-up" data-menu="1" class="group relative bg-gradient-to-r from-blue-600 to-indigo-600 rounded-[1.5rem] sm:rounded-[2rem] p-4 sm:p-6 shadow-lg hover:shadow-xl hover:-translate-y-1 transition-all duration-300 cursor-pointer overflow-hidden flex items-center justify-between mb-4 sm:mb-8">
                    <div class="absolute -right-4 -top-10 w-32 h-32 bg-white/10 rounded-full blur-2xl group-hover:scale-150 transition-transform duration-700"></div>
                    <div class="relative z-10 flex items-center gap-4 sm:gap-6 pointer-events-none">
                        <div class="w-12 h-12 sm:w-16 sm:h-16 rounded-xl sm:rounded-2xl bg-white/20 text-white flex items-center justify-center shrink-0 border border-white/30 backdrop-blur-sm shadow-inner">
                            <span class="text-xl sm:text-3xl font-black tracking-tighter">1</span>
                        </div>
                        <div>
                            <h2 class="text-lg sm:text-2xl font-black text-white tracking-tight leading-tight">Gabung Mata Kuliah</h2>
                            <p class="text-[10px] sm:text-sm text-blue-100 font-medium mt-1">Gunakan kode akses dari Dosen.</p>
                        </div>
                    </div>
                    <div class="relative z-10 hidden sm:flex bg-white/20 hover:bg-white text-white hover:text-blue-600 px-6 py-3 rounded-xl font-black text-xs uppercase tracking-wider border border-white/30 transition-colors backdrop-blur-md pointer-events-none">
                        Mulai Gabung
                    </div>
                </div>

                @if(count($kelas) > 0)
                    @foreach ($kelas as $i => $item)
                    @php
                        $nomorVoice = $i + 2; 
                        $themes = [ 0 => ['blue', 'blue'], 1 => ['orange', 'orange'], 2 => ['emerald', 'emerald'] ];
                        $theme = $themes[$i % 3];
                        $persenProgres = $item['progress'] ?? 0;
                    @endphp

                    <div data-aos="fade-up" data-aos-delay="{{ ($i + 1) * 100 }}" data-menu="{{ $nomorVoice }}" class="group relative bg-white rounded-[1.5rem] sm:rounded-[2rem] p-4 sm:p-6 border border-slate-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 cursor-pointer overflow-hidden flex flex-col sm:flex-row items-start sm:items-center gap-3 sm:gap-5">
                        <div class="absolute left-0 top-0 bottom-0 w-1.5 bg-{{ $theme[0] }}-500 group-hover:w-2 transition-all"></div>
                        <div class="flex w-full sm:w-auto items-center justify-between sm:justify-start pointer-events-none">
                            <div class="w-12 h-12 sm:w-14 sm:h-14 md:w-16 md:h-16 rounded-xl sm:rounded-2xl bg-{{ $theme[0] }}-50 text-{{ $theme[0] }}-600 flex items-center justify-center shrink-0 border border-{{ $theme[0] }}-100 group-hover:bg-{{ $theme[0] }}-600 group-hover:text-white transition-all shadow-inner">
                                <span class="text-xl sm:text-2xl font-black tracking-tighter">{{ $nomorVoice }}</span>
                            </div>
                        </div>
                        <div class="flex-1 min-w-0 w-full sm:pl-2 pointer-events-none">
                            <div class="flex flex-col sm:flex-row sm:items-center gap-1.5 sm:gap-3 mb-1.5 sm:mb-1">
                                <h2 class="text-base sm:text-lg md:text-xl font-black text-slate-900 group-hover:text-{{ $theme[0] }}-700 transition-colors tracking-tight truncate">{{ $item['nama'] }}</h2>
                                <span class="w-fit px-2 py-0.5 sm:py-1 rounded-md bg-slate-100 text-slate-600 text-[8px] sm:text-[9px] md:text-[10px] font-bold uppercase border border-slate-200 shrink-0">{{ $item['sks'] }} SKS</span>
                            </div>
                            <div class="flex items-center gap-2 text-[10px] sm:text-xs md:text-sm font-medium text-slate-500 mb-3 sm:mb-4">
                                <span>{{ $item['kode'] }}</span>
                                <span class="w-1 h-1 sm:w-1.5 sm:h-1.5 rounded-full bg-slate-300"></span>
                                <span class="truncate">{{ Str::limit($item['deskripsi'], 60) }}</span>
                            </div>
                            <div class="flex items-center gap-2 sm:gap-3 w-full max-w-sm">
                                <div class="flex-1 h-1.5 sm:h-1.5 bg-slate-100 rounded-full overflow-hidden">
                                    <div class="h-full bg-{{ $theme[0] }}-500 rounded-full transition-all duration-1000" style="width: {{ $persenProgres }}%"></div>
                                </div>
                                <span class="text-[9px] sm:text-[10px] font-bold text-{{ $theme[0] }}-600 shrink-0">{{ $persenProgres }}% Selesai</span>
                            </div>
                        </div>
                        <button class="hidden sm:flex bg-slate-900 text-white px-6 md:px-8 py-3 md:py-4 rounded-xl font-black text-[10px] md:text-xs uppercase tracking-wider shadow-md group-hover:bg-{{ $theme[0] }}-600 transition-all pointer-events-none">Masuk</button>
                    </div>
                    @endforeach
                @else
                    <div class="flex flex-col items-center justify-center py-16 sm:py-20 text-center" data-aos="fade-up">
                        <div class="w-20 h-20 sm:w-24 sm:h-24 bg-slate-100 text-slate-300 rounded-full flex items-center justify-center mb-4 sm:mb-6">
                            <svg class="w-10 h-10 sm:w-12 sm:h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                        </div>
                        <h2 class="text-lg sm:text-xl font-black text-slate-800 mb-2">Belum Ada Mata Kuliah</h2>
                        <p class="text-xs sm:text-sm text-slate-500 max-w-sm px-4">Anda belum tergabung di kelas manapun. Silakan sebutkan angka satu untuk bergabung.</p>
                    </div>
                @endif
            </div>
        </main>

        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

        <script>
            const kelasList = [
                @foreach($kelas as $i => $k)
                    { nomor: {{ $i + 2 }}, nama: "{{ addslashes($k['nama']) }}", url: "{{ route('course.detail', ['kelas' => $k['id']]) }}" },
                @endforeach
            ];

            AOS.init({ once: true, easing: "ease-out-cubic" });

            const statusDesc = document.getElementById("status-desc");
            const waveBars = document.querySelectorAll(".wave-bar");
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
                        if (waveBars.length > 0) {
                            waveBars.forEach((bar) => {
                                bar.style.height = `${Math.floor(Math.random() * 16) + 4}px`;
                            });
                        }
                    }, 100);
                } else {
                    clearInterval(waveInterval);
                    if (waveBars.length > 0) {
                        waveBars.forEach((bar) => (bar.style.height = "4px"));
                    }
                }
            }

            let clickTimer = null;
            const clickDelay = 300; 

            document.body.addEventListener('click', (e) => {
                const navElement = e.target.closest('[data-menu]');

                if (navElement) { e.preventDefault(); }

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
                try { rec.start(); isRecActive = true; } catch (e) {}
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
                        mulaiMendengar();
                    };

                    synth.speak(utter);
                }, 50);
            }

            function getPanduanSuara() {
                let orientasi = "Halaman Daftar Mata Kuliah. Sebutkan angka satu untuk Gabung Kelas Baru. ";
                if (kelasList.length === 0) {
                    orientasi += "Saat ini Anda belum memiliki mata kuliah yang aktif. ";
                } else {
                    let maxRead = kelasList.length > 3 ? 3 : kelasList.length;
                    for (let i = 0; i < maxRead; i++) {
                        orientasi += `Sebutkan angka ${kelasList[i].nomor} untuk kelas ${kelasList[i].nama}. `;
                    }
                    if(kelasList.length > 3) orientasi += "Dan seterusnya. ";
                }
                orientasi += "Sebutkan angka nol untuk kembali ke Beranda. Katakan Ulang jika butuh panduan.";
                return orientasi;
            }

            window.navigasiKe = function(nomor) {
                if (isRedirecting) return;

                let tujuan = ""; let teks = "";

                if (nomor === 0) { 
                    tujuan = "{{ route('dashboard') ?? '#' }}"; 
                    teks = "Nol. Kembali ke Beranda."; 
                }
                else if (nomor === 1) {
                    tujuan = "{{ route('courses.join') ?? '#' }}";
                    teks = "Membuka halaman Gabung Mata Kuliah.";
                } else {
                    let kelasTujuan = kelasList.find(k => k.nomor === nomor);
                    if (kelasTujuan) {
                        tujuan = kelasTujuan.url;
                        teks = `Membuka mata kuliah ${kelasTujuan.nama}.`;
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
                        bicara(teks, () => { try { rec.start(); } catch (e) {} });
                    }
                }
            }

            if (rec) {
                rec.onresult = (event) => {
                    if (isRedirecting) return;
                    let hasil = "";
                    for (let i = event.resultIndex; i < event.results.length; ++i) { hasil += event.results[i][0].transcript; }
                    hasil = hasil.toLowerCase().replace(/[.,?!]/g, '').trim();

                    const omonganBot = ["halaman daftar", "sebutkan angka satu", "gabung", "mata kuliah", "angka nol", "kembali", "katakan ulang", "membuka"];
                    if (omonganBot.some(kalimat => hasil.includes(kalimat))) return;
                    if (isSpeaking) return;

                    prosesJawaban(hasil);
                };

                rec.onend = () => { isRecActive = false; if (!isRedirecting) mulaiMendengar(); };
            }

            function prosesJawaban(hasil) {
                if (hasil.includes("ulang") || hasil.includes("panduan")) {
                    synth.cancel(); if(rec) rec.abort(); bicara(getPanduanSuara()); return;
                }

                const angka = hasil.match(/\d+/);
                if (angka) { window.navigasiKe(parseInt(angka[0])); return; }

                const mapKata = { "nol": 0, "kosong": 0, "satu": 1, "dua": 2, "tiga": 3, "empat": 4, "lima": 5, "enam": 6, "tujuh": 7, "delapan": 8, "sembilan": 9, "sepuluh": 10 };
                for (let kata in mapKata) {
                    if (hasil.includes(kata)) { window.navigasiKe(mapKata[kata]); return; }
                }
            }

            window.addEventListener("load", () => {
                document.body.addEventListener("click", () => {}, { once: true });
                setTimeout(() => { bicara(getPanduanSuara()); }, 800);
            });
        </script>
        <x-accessibility-widget />
    </body>
</html>