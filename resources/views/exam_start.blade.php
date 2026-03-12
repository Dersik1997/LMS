<!DOCTYPE html>
<html lang="id" class="h-full">
    <head>
        <meta charset="UTF-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"
        />
        <title>Persiapan Ujian | LMS Inklusi UMMI</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link
            href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
            rel="stylesheet"
        />

        <style>
            html {
                scroll-behavior: smooth;
            }
            .custom-scrollbar::-webkit-scrollbar {
                width: 5px;
                height: 5px;
            }
            .custom-scrollbar::-webkit-scrollbar-track {
                background: transparent;
            }
            .custom-scrollbar::-webkit-scrollbar-thumb {
                background-color: #cbd5e1;
                border-radius: 20px;
            }
            body {
                min-height: 100dvh;
                display: flex;
                flex-direction: column;
                overflow-x: hidden;
            }

            @keyframes wave-bounce {
                0%,
                100% {
                    height: 4px;
                }
                50% {
                    height: 16px;
                }
            }
            .wave-bar {
                transition: height 0.1s ease;
            }
        </style>
    </head>
    <body
        class="m-0 font-['Plus_Jakarta_Sans'] bg-[#f8fafc] text-slate-800 relative custom-scrollbar flex flex-col h-[100dvh]"
    >
        @php $mulai = \Carbon\Carbon::parse($exam->waktu_mulai); $selesai =
        \Carbon\Carbon::parse($exam->waktu_selesai); $durasiMenit =
        $mulai->diffInMinutes($selesai); $jumlahSoal = $exam->questions ?
        $exam->questions->count() : 0; $namaDosen = $exam->kelas->dosen->nama ??
        $exam->dosen->nama ?? 'Dosen Pengampu'; @endphp

        {{-- BACKGROUND DEKORASI --}}
        <div
            class="fixed top-0 left-0 w-full h-full overflow-hidden -z-10 pointer-events-none"
        >
            <div
                class="absolute top-[-10%] right-[-5%] w-64 md:w-[400px] h-64 md:h-[400px] bg-blue-100/40 rounded-full blur-3xl opacity-50"
            ></div>
            <div
                class="absolute bottom-[-10%] left-[-10%] w-64 md:w-[400px] h-64 md:h-[400px] bg-indigo-50/40 rounded-full blur-3xl opacity-50"
            ></div>
        </div>

        {{-- NAVBAR MOBILE-FRIENDLY (Grid System) --}}
        <header
            class="bg-white/90 backdrop-blur-2xl border-b border-slate-200/60 sticky top-0 z-40 px-3 sm:px-4 md:px-8 py-2 sm:py-4 shadow-sm w-full shrink-0 cursor-pointer"
            id="voice-header"
            title="Ketuk layar 2x untuk memotong suara sistem"
        >
            <div
                class="max-w-7xl mx-auto grid grid-cols-3 items-center relative h-10 sm:h-12 md:h-14 pointer-events-none"
            >
                {{-- Kiri: Tombol 0 (Kembali) --}}
                <div
                    class="flex items-center gap-2 sm:gap-4 justify-start shrink-0 pointer-events-auto"
                >
                    <button
                        data-menu="0"
                        class="w-9 h-9 sm:w-11 sm:h-11 md:w-12 md:h-12 rounded-full bg-slate-100 hover:bg-blue-600 text-slate-500 hover:text-white flex items-center justify-center transition-all duration-300 shadow-sm shrink-0 group border border-slate-200 hover:border-blue-600 relative cursor-pointer active:scale-95"
                    >
                        <svg
                            class="w-4 h-4 sm:w-5 sm:h-5 md:w-6 md:h-6 transform group-hover:-translate-x-1 transition-transform"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2.5"
                                d="M15 19l-7-7 7-7"
                            ></path>
                        </svg>
                        <span
                            class="absolute -bottom-1 -right-1 bg-slate-800 text-white text-[8px] md:text-[9px] font-black px-1.5 py-0.5 rounded-md border border-white shadow-sm pointer-events-none"
                            >0</span
                        >
                    </button>
                    <div
                        data-menu="0"
                        class="hidden sm:block text-left cursor-pointer group shrink-0"
                    >
                        <span
                            class="block text-[8px] md:text-[9px] font-bold text-slate-400 uppercase tracking-widest pointer-events-none"
                            >Navigasi Suara</span
                        >
                        <span
                            class="block text-[10px] md:text-xs font-black text-slate-700 group-hover:text-blue-600 transition-colors pointer-events-none"
                            >0 - Kembali</span
                        >
                    </div>
                </div>

                {{-- Tengah: Judul --}}
                <div
                    class="flex flex-col items-center justify-center justify-self-center w-full max-w-[150px] sm:max-w-none pointer-events-none"
                >
                    <h1
                        class="text-sm sm:text-lg md:text-xl font-extrabold text-slate-900 tracking-tight leading-none truncate w-full text-center pointer-events-auto"
                    >
                        Persiapan Ujian
                    </h1>
                    <p
                        class="text-[8px] sm:text-[10px] font-bold text-blue-600 uppercase tracking-widest mt-1 truncate pointer-events-auto"
                    >
                        Konfirmasi Data
                    </p>
                </div>

                {{-- Kanan: Indikator Voice --}}
                <div
                    class="flex items-center justify-end gap-1.5 sm:gap-3 justify-self-end shrink-0 pointer-events-auto"
                >
                    <div
                        class="flex items-center gap-[2px] h-4 w-6 sm:w-10 justify-center"
                        id="wave-container"
                    >
                        <div
                            class="wave-bar w-[2px] bg-blue-500 rounded-full h-1 transition-all"
                        ></div>
                        <div
                            class="wave-bar w-[2px] bg-blue-400 rounded-full h-1 transition-all"
                        ></div>
                        <div
                            class="wave-bar w-[2px] bg-blue-600 rounded-full h-1 transition-all"
                        ></div>
                    </div>
                    <span
                        id="status-desc"
                        class="hidden sm:block text-[8px] md:text-[9px] font-black text-slate-400 uppercase tracking-widest w-12 sm:w-20 text-left pointer-events-none"
                        >MENYIAPKAN</span
                    >
                </div>
            </div>
        </header>

        <main
            class="flex-1 w-full max-w-4xl mx-auto p-4 sm:p-6 lg:p-8 space-y-4 sm:space-y-6 pb-20 mt-2 sm:mt-4 relative z-10 overflow-y-scroll custom-scrollbar"
        >
            {{-- HEADER / HERO SECTION --}}
            <div
                class="bg-blue-600 rounded-[1.5rem] sm:rounded-[2.5rem] p-6 sm:p-8 md:p-10 text-white shadow-xl shadow-blue-200/50 relative overflow-hidden flex flex-col items-center text-center text-balance"
            >
                <div class="relative z-10">
                    <span
                        class="inline-block px-3 sm:px-4 py-1.5 bg-white/20 backdrop-blur-md rounded-lg sm:rounded-xl text-[9px] sm:text-[10px] font-black uppercase tracking-widest mb-3 sm:mb-4 border border-white/20 shadow-sm pointer-events-none"
                    >
                        {{ $exam->kategori ?? 'Ujian' }}
                    </span>
                    <h2
                        class="text-2xl sm:text-3xl md:text-4xl font-black tracking-tight mb-2 sm:mb-3 leading-tight pointer-events-none"
                    >
                        {{ $exam->judul }}
                    </h2>
                    <p
                        class="text-blue-200 font-medium text-xs sm:text-sm md:text-base flex items-center justify-center gap-1.5 sm:gap-2 pointer-events-none"
                    >
                        <svg
                            class="w-3.5 h-3.5 sm:w-4 sm:h-4"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                            ></path>
                        </svg>
                        Dosen: {{ $namaDosen }}
                    </p>
                </div>

                <div
                    class="absolute -right-10 -bottom-20 w-40 sm:w-64 h-40 sm:h-64 bg-white/10 rounded-full blur-3xl pointer-events-none"
                ></div>
                <div
                    class="absolute -left-10 -top-20 w-40 sm:w-64 h-40 sm:h-64 bg-white/10 rounded-full blur-3xl pointer-events-none"
                ></div>
            </div>

            {{-- GRID STATISTIK --}}
            <div
                class="grid grid-cols-1 md:grid-cols-3 gap-3 sm:gap-4 md:gap-6 pointer-events-none"
            >
                {{-- Durasi --}}
                <div
                    class="bg-white p-4 sm:p-5 md:p-6 rounded-[1.25rem] sm:rounded-[2rem] border border-slate-200 shadow-sm flex items-center gap-3 sm:gap-4 hover:-translate-y-1 transition-transform"
                >
                    <div
                        class="w-10 h-10 sm:w-12 sm:h-12 bg-blue-50 text-blue-600 rounded-xl sm:rounded-2xl flex items-center justify-center shrink-0"
                    >
                        <svg
                            class="w-5 h-5 sm:w-6 sm:h-6"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
                            ></path>
                        </svg>
                    </div>
                    <div>
                        <p
                            class="text-[9px] sm:text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-0.5"
                        >
                            Durasi
                        </p>
                        <h3
                            class="text-base sm:text-lg font-black text-slate-900 leading-none"
                        >
                            {{ $durasiMenit }} Menit
                        </h3>
                    </div>
                </div>

                {{-- Soal --}}
                <div
                    class="bg-white p-4 sm:p-5 md:p-6 rounded-[1.25rem] sm:rounded-[2rem] border border-slate-200 shadow-sm flex items-center gap-3 sm:gap-4 hover:-translate-y-1 transition-transform"
                >
                    <div
                        class="w-10 h-10 sm:w-12 sm:h-12 bg-purple-50 text-purple-600 rounded-xl sm:rounded-2xl flex items-center justify-center shrink-0"
                    >
                        <svg
                            class="w-5 h-5 sm:w-6 sm:h-6"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
                            ></path>
                        </svg>
                    </div>
                    <div>
                        <p
                            class="text-[9px] sm:text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-0.5"
                        >
                            Soal
                        </p>
                        <h3
                            class="text-base sm:text-lg font-black text-slate-900 leading-none"
                        >
                            {{ $jumlahSoal }} Butir
                        </h3>
                    </div>
                </div>

                {{-- Mata Kuliah --}}
                <div
                    class="bg-white p-4 sm:p-5 md:p-6 rounded-[1.25rem] sm:rounded-[2rem] border border-slate-200 shadow-sm flex items-center gap-3 sm:gap-4 hover:-translate-y-1 transition-transform"
                >
                    <div
                        class="w-10 h-10 sm:w-12 sm:h-12 bg-emerald-50 text-emerald-600 rounded-xl sm:rounded-2xl flex items-center justify-center shrink-0"
                    >
                        <svg
                            class="w-5 h-5 sm:w-6 sm:h-6"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                            ></path>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <p
                            class="text-[9px] sm:text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-0.5"
                        >
                            Mata Kuliah
                        </p>
                        <h3
                            class="text-sm sm:text-xs md:text-sm font-black text-slate-900 leading-tight line-clamp-2"
                        >
                            {{ $exam->kelas->mataKuliah->nama ?? '-' }}
                        </h3>
                    </div>
                </div>
            </div>

            {{-- TATA TERTIB --}}
            <div
                class="bg-white p-5 sm:p-6 md:p-8 rounded-[1.5rem] sm:rounded-[2rem] border border-slate-200 shadow-sm pointer-events-none"
            >
                <h3
                    class="text-base sm:text-lg font-black text-slate-900 mb-4 sm:mb-6 flex items-center gap-2 sm:gap-3 border-b border-slate-100 pb-3 sm:pb-4"
                >
                    <span
                        class="w-7 h-7 sm:w-8 sm:h-8 rounded-full bg-slate-100 flex items-center justify-center text-slate-500 shrink-0"
                    >
                        <svg
                            class="w-4 h-4"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                            ></path>
                        </svg>
                    </span>
                    Tata Tertib & Petunjuk
                </h3>
                <ul class="space-y-4 sm:space-y-5">
                    <li class="flex gap-3 sm:gap-4 items-start">
                        <span
                            class="w-6 h-6 sm:w-7 sm:h-7 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center text-xs font-black shrink-0 mt-0.5"
                            >1</span
                        >
                        <p
                            class="text-xs sm:text-sm text-slate-600 font-medium leading-relaxed"
                        >
                            Berdoalah sebelum memulai ujian agar diberi
                            kemudahan dan kelancaran.
                        </p>
                    </li>
                    <li class="flex gap-3 sm:gap-4 items-start">
                        <span
                            class="w-6 h-6 sm:w-7 sm:h-7 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center text-xs font-black shrink-0 mt-0.5"
                            >2</span
                        >
                        <p
                            class="text-xs sm:text-sm text-slate-600 font-medium leading-relaxed"
                        >
                            Waktu akan otomatis berjalan mundur saat Anda
                            menekan tombol "Mulai Mengerjakan".
                        </p>
                    </li>
                    <li class="flex gap-3 sm:gap-4 items-start">
                        <span
                            class="w-6 h-6 sm:w-7 sm:h-7 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center text-xs font-black shrink-0 mt-0.5"
                            >3</span
                        >
                        <p
                            class="text-xs sm:text-sm text-slate-600 font-medium leading-relaxed"
                        >
                            Pastikan koneksi internet stabil. Jika terputus,
                            jawaban akan tersimpan secara otomatis di sistem.
                        </p>
                    </li>
                    <li class="flex gap-3 sm:gap-4 items-start">
                        <span
                            class="w-6 h-6 sm:w-7 sm:h-7 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center text-xs font-black shrink-0 mt-0.5"
                            >4</span
                        >
                        <p
                            class="text-xs sm:text-sm text-slate-600 font-medium leading-relaxed"
                        >
                            Dilarang keras membuka tab lain, aplikasi lain, atau
                            bekerja sama dengan peserta lain selama ujian
                            berlangsung.
                        </p>
                    </li>
                </ul>

                <div
                    class="mt-6 sm:mt-8 p-4 sm:p-5 bg-orange-50 border border-orange-100 rounded-xl sm:rounded-2xl flex flex-col sm:flex-row gap-3 sm:gap-4 items-center sm:items-start text-center sm:text-left"
                >
                    <div
                        class="w-8 h-8 sm:w-10 sm:h-10 bg-orange-100 text-orange-600 rounded-full flex items-center justify-center shrink-0"
                    >
                        <svg
                            class="w-4 h-4 sm:w-5 sm:h-5"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2.5"
                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"
                            ></path>
                        </svg>
                    </div>
                    <p
                        class="text-[11px] sm:text-xs font-bold text-orange-800 leading-relaxed sm:mt-1"
                    >
                        Dengan menekan tombol mulai di bawah, Anda dianggap
                        telah membaca, memahami, dan menyetujui seluruh tata
                        tertib ujian di atas.
                    </p>
                </div>
            </div>

            {{-- BOX ACTION MULAI UJIAN --}}
            <div
                class="bg-white p-5 sm:p-6 md:p-8 rounded-[1.5rem] sm:rounded-[2rem] border border-slate-200 shadow-sm flex flex-col md:flex-row items-center justify-between gap-5 sm:gap-6"
            >
                <div
                    class="text-center md:text-left w-full md:w-auto pointer-events-none"
                >
                    <p
                        class="text-[9px] sm:text-[10px] text-slate-400 font-bold uppercase tracking-widest mb-1"
                    >
                        Token Ujian
                    </p>
                    <p
                        class="text-xl sm:text-2xl font-mono font-black text-slate-900 tracking-wider"
                    >
                        {{ $exam->token }}
                    </p>
                </div>

                <form
                    action="{{ route('exam.start', $exam->id) }}"
                    method="POST"
                    class="w-full md:w-auto"
                    id="form-mulai-ujian"
                >
                    @csrf
                    <button
                        type="button"
                        data-menu="1"
                        class="w-full md:w-auto bg-blue-600 text-white px-6 sm:px-8 py-3.5 sm:py-4 rounded-xl font-black text-xs sm:text-sm uppercase tracking-widest hover:bg-blue-700 transition-all shadow-lg shadow-blue-200 flex items-center justify-center gap-2 sm:gap-3 transform hover:-translate-y-0.5 active:scale-95 cursor-pointer"
                    >
                        <span
                            class="bg-white/20 text-white w-5 h-5 sm:w-6 sm:h-6 rounded flex items-center justify-center font-black text-[9px] sm:text-[10px] pointer-events-none"
                            >1</span
                        >
                        <span class="pointer-events-none"
                            >Mulai Mengerjakan</span
                        >
                        <svg
                            class="w-4 h-4 sm:w-5 sm:h-5 pointer-events-none"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2.5"
                                d="M14 5l7 7m0 0l-7 7m7-7H3"
                            ></path>
                        </svg>
                    </button>
                </form>
            </div>
        </main>

        <script>
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
                rec.interimResults = true; // Kunci Barge-in
            }

            function setWave(active) {
                if (active) {
                    if (waveInterval) clearInterval(waveInterval);
                    waveInterval = setInterval(() => {
                        if (waveBars.length > 0) {
                            waveBars.forEach((bar) => {
                                bar.style.height = `${Math.floor(Math.random() * 12) + 4}px`;
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

            // ==========================================
            // LOGIKA SECURE DOUBLE CLICK & DATA-MENU
            // ==========================================
            let clickTimer = null;
            const clickDelay = 300;

            document.body.addEventListener('click', (e) => {
                const navElement = e.target.closest('[data-menu]');

                if (navElement) {
                    e.preventDefault();
                }

                if (clickTimer !== null) {
                    // DOUBLE CLICK DETECTED: Murni matikan suara sistem
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
                    // SINGLE CLICK DETECTED
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

                    window.currentBotText = teks;

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

            function getPanduanUtama() {
                const durasi = {{ $durasiMenit }};
                let teks = `Halaman Persiapan Ujian. Waktu pengerjaan Anda adalah ${durasi} menit. `;
                teks += "Sebutkan angka satu untuk mulai mengerjakan. Atau sebutkan angka nol untuk batal dan kembali. ";
                teks += "Katakan Ulang, jika butuh mendengarkan panduan ini lagi.";

                return teks;
            }

            window.navigasiKe = function(nomor) {
                if (isRedirecting) return;

                let tujuan = "";
                let teks = "";

                if (nomor === 0) {
                    tujuan = "{{ route('exams') }}";
                    teks = "Nol. Membatalkan persiapan ujian. Kembali ke daftar ujian.";
                } else if (nomor === 1) {
                    tujuan = "SUBMIT_FORM";
                    teks = "Satu. Ujian dimulai. Waktu terus berjalan, semoga berhasil.";
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

                        // REDIRECT SATSET
                        setTimeout(() => {
                            if (tujuan === "SUBMIT_FORM") {
                                document.getElementById("form-mulai-ujian").submit();
                            } else {
                                window.location.href = tujuan;
                            }
                        }, 500);

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

                    // Anti-Echo
                    if (isSpeaking) {
                        let botText = (window.currentBotText || "").replace(/[.,!?]/g, '').toLowerCase().trim();
                        if (botText.includes(hasil)) {
                            return;
                        }
                    }

                    if(hasil.includes("ulang") || hasil.includes("panduan") || hasil.includes("bantuan")) {
                        synth.cancel(); if(rec) rec.abort();
                        bicara(getPanduanUtama(), () => { mulaiMendengar(); });
                        return;
                    }

                    if (hasil.includes("satu") || hasil.includes("mulai") || hasil.includes("kerjakan")) {
                        synth.cancel(); if(rec) rec.abort();
                        navigasiKe(1);
                    } else if (hasil.includes("nol") || hasil.includes("kosong") || hasil.includes("batal") || hasil.includes("kembali")) {
                        synth.cancel(); if(rec) rec.abort();
                        navigasiKe(0);
                    }
                };

                rec.onend = () => {
                    isRecActive = false;
                    if (!isRedirecting) mulaiMendengar();
                };
            }

            window.onload = () => {
                document.body.addEventListener("click", () => {}, { once: true });
                setTimeout(() => {
                    bicara(getPanduanUtama(), () => {
                        mulaiMendengar();
                    });
                }, 800);
            };
        </script>
    </body>
</html>
