<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"
        />
        <title>Modul Panduan - LMS Inklusi UMMI</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link
            href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
            rel="stylesheet"
        />

        <style>
            .wave-bar {
                transition: height 0.1s ease;
            }

            .bg-animated {
                background: linear-gradient(
                    -45deg,
                    #f8fafc,
                    #e2e8f0,
                    #dbeafe,
                    #e0e7ff
                );
                background-size: 400% 400%;
                animation: gradientBG 15s ease infinite;
            }
            @keyframes gradientBG {
                0% {
                    background-position: 0% 50%;
                }
                50% {
                    background-position: 100% 50%;
                }
                100% {
                    background-position: 0% 50%;
                }
            }

            .glass-card {
                background: rgba(255, 255, 255, 0.75);
                backdrop-filter: blur(16px);
                -webkit-backdrop-filter: blur(16px);
                border: 1px solid rgba(255, 255, 255, 0.5);
                box-shadow: 0 10px 30px -10px rgba(0, 0, 0, 0.1);
            }

            .audio-pulse {
                box-shadow: 0 0 0 0 rgba(79, 70, 229, 0.4);
                animation: pulse-ring 2s infinite;
            }
            @keyframes pulse-ring {
                0% {
                    transform: scale(0.95);
                    box-shadow: 0 0 0 0 rgba(79, 70, 229, 0.4);
                }
                70% {
                    transform: scale(1);
                    box-shadow: 0 0 0 20px rgba(79, 70, 229, 0);
                }
                100% {
                    transform: scale(0.95);
                    box-shadow: 0 0 0 0 rgba(79, 70, 229, 0);
                }
            }

            .animate-fade-in-up {
                animation: fadeInUp 0.5s cubic-bezier(0.16, 1, 0.3, 1) forwards;
                opacity: 0;
                transform: translateY(20px);
            }
            @keyframes fadeInUp {
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            .delay-100 {
                animation-delay: 100ms;
            }
            .delay-200 {
                animation-delay: 200ms;
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
        </style>
    </head>
    <body
        class="bg-animated font-['Plus_Jakarta_Sans'] min-h-[100dvh] flex flex-col relative overflow-x-hidden text-slate-800 m-0 p-0"
    >
        <!-- Ornamen Latar Belakang -->
        <div class="fixed inset-0 z-0 overflow-hidden pointer-events-none">
            <div
                class="absolute top-[-10%] left-[-10%] w-72 md:w-[30rem] h-72 md:h-[30rem] bg-blue-300 rounded-full mix-blend-multiply filter blur-[80px] opacity-50 animate-blob"
            ></div>
            <div
                class="absolute bottom-[-10%] right-[-10%] w-72 md:w-[30rem] h-72 md:h-[30rem] bg-indigo-300 rounded-full mix-blend-multiply filter blur-[80px] opacity-50 animate-blob"
                style="animation-delay: 2s"
            ></div>
            <div
                class="absolute top-[40%] left-[40%] w-72 md:w-[30rem] h-72 md:h-[30rem] bg-teal-200 rounded-full mix-blend-multiply filter blur-[80px] opacity-40 animate-blob"
                style="animation-delay: 4s"
            ></div>
        </div>

        <!-- INDIKATOR SUARA GLOBAL -->
        <div
            id="voice-status-bar"
            class="fixed bottom-8 lg:bottom-auto lg:top-8 left-1/2 transform -translate-x-1/2 w-max bg-white/95 backdrop-blur-xl px-6 py-3.5 rounded-full shadow-2xl border border-slate-200 z-50 flex items-center justify-center gap-4 transition-all duration-500"
        >
            <div id="wave-container" class="flex items-center gap-[3px] h-5">
                <div
                    class="wave-bar w-[3px] bg-indigo-500 rounded-full h-1"
                ></div>
                <div
                    class="wave-bar w-[3px] bg-indigo-400 rounded-full h-1"
                ></div>
                <div
                    class="wave-bar w-[3px] bg-indigo-600 rounded-full h-1"
                ></div>
                <div
                    class="wave-bar w-[3px] bg-indigo-400 rounded-full h-1"
                ></div>
                <div
                    class="wave-bar w-[3px] bg-indigo-500 rounded-full h-1"
                ></div>
            </div>
            <span
                id="status-text"
                class="text-sm font-black text-slate-700 uppercase tracking-widest"
                >MENDENGARKAN</span
            >
        </div>

        <div
            class="w-full flex-grow flex flex-col relative z-10 min-h-[100dvh]"
        >
            <div
                class="flex-grow flex flex-col items-center justify-center px-4 sm:px-6 md:px-8 w-full max-w-5xl mx-auto pt-16 pb-12 lg:pt-28 lg:pb-16"
            >
                <div
                    class="text-center mb-10 sm:mb-12 animate-fade-in-up"
                    id="header-text"
                >
                    <div
                        class="inline-block px-4 py-1.5 bg-indigo-100 text-indigo-700 font-bold text-xs rounded-full mb-4 tracking-wider uppercase"
                        id="badge-header"
                    >
                        Pusat Bantuan Audio & Visual
                    </div>
                    <h1
                        class="text-4xl sm:text-5xl font-extrabold text-slate-900 mb-3 tracking-tight drop-shadow-sm"
                        id="title-header"
                    >
                        Modul Panduan
                    </h1>
                    <p
                        class="text-slate-600 text-base sm:text-lg max-w-2xl mx-auto leading-relaxed font-medium"
                        id="desc-header"
                    >
                        Sebutkan
                        <strong class="text-blue-600">Satu</strong> untuk Modul
                        Dosen, atau
                        <strong class="text-indigo-600">Dua</strong> untuk
                        Mahasiswa.
                    </p>
                </div>

                <!-- ========================================== -->
                <!-- 1. TAMPILAN MENU UTAMA (Pilih Dosen / Mahasiswa) -->
                <!-- ========================================== -->
                <div
                    class="grid grid-cols-1 md:grid-cols-2 gap-6 sm:gap-8 w-full max-w-4xl mx-auto relative animate-fade-in-up delay-100"
                    id="menu-utama"
                >
                    <button
                        onclick="bukaModulDosen()"
                        id="btn-dosen"
                        class="group glass-card p-8 sm:p-10 rounded-[2.5rem] hover:border-blue-400 transition-all duration-300 transform hover:-translate-y-2 text-center flex flex-col items-center justify-between h-full relative overflow-hidden focus:outline-none"
                    >
                        <div
                            class="absolute inset-0 bg-gradient-to-br from-blue-500/0 to-blue-500/5 group-hover:to-blue-500/10 transition-colors"
                        ></div>
                        <div
                            class="absolute top-6 left-6 w-10 h-10 bg-white text-blue-600 rounded-full flex items-center justify-center font-black text-lg border-2 border-blue-100 shadow-sm z-10 group-hover:bg-blue-600 group-hover:text-white transition-colors"
                        >
                            1
                        </div>

                        <div
                            class="w-24 h-24 bg-gradient-to-br from-blue-100 to-white rounded-[2rem] flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-500 shadow-sm border border-white z-10"
                        >
                            <svg
                                class="w-12 h-12 text-blue-600"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.5"
                                    d="M12 14l9-5-9-5-9 5 9 5z"
                                ></path>
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.5"
                                    d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"
                                ></path>
                            </svg>
                        </div>
                        <div
                            class="flex-grow flex flex-col justify-center z-10"
                        >
                            <h2
                                class="text-2xl font-black text-slate-800 mb-2 group-hover:text-blue-700 transition-colors"
                            >
                                Modul Dosen
                            </h2>
                            <p
                                class="text-sm text-slate-500 leading-relaxed px-2"
                            >
                                Panduan visual untuk manajemen kelas dan nilai
                                (Tanpa Suara).
                            </p>
                        </div>
                    </button>

                    <button
                        onclick="bacaAudioMahasiswa()"
                        id="btn-mahasiswa"
                        class="group glass-card p-8 sm:p-10 rounded-[2.5rem] hover:border-indigo-400 transition-all duration-300 transform hover:-translate-y-2 text-center flex flex-col items-center justify-between h-full relative overflow-hidden focus:outline-none"
                    >
                        <div
                            class="absolute inset-0 bg-gradient-to-br from-indigo-500/0 to-indigo-500/5 group-hover:to-indigo-500/10 transition-colors"
                        ></div>
                        <div
                            class="absolute top-6 left-6 w-10 h-10 bg-white text-indigo-600 rounded-full flex items-center justify-center font-black text-lg border-2 border-indigo-100 shadow-sm z-10 group-hover:bg-indigo-600 group-hover:text-white transition-colors"
                        >
                            2
                        </div>

                        <div
                            class="w-24 h-24 bg-gradient-to-br from-indigo-100 to-white rounded-[2rem] flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-500 shadow-sm border border-white z-10"
                        >
                            <svg
                                class="w-12 h-12 text-indigo-600"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.5"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"
                                ></path>
                            </svg>
                        </div>
                        <div
                            class="flex-grow flex flex-col justify-center z-10"
                        >
                            <h2
                                class="text-2xl font-black text-slate-800 mb-2 group-hover:text-indigo-700 transition-colors"
                            >
                                Modul Mahasiswa
                            </h2>
                            <p
                                class="text-sm text-slate-500 leading-relaxed px-2"
                            >
                                Panduan interaksi suara secara lengkap.
                            </p>
                        </div>
                    </button>
                </div>

                <!-- ========================================== -->
                <!-- 2. TAMPILAN VISUAL DOSEN -->
                <!-- ========================================== -->
                <div
                    id="konten-dosen"
                    class="w-full max-w-4xl glass-card p-8 sm:p-10 rounded-[2.5rem] shadow-xl border border-white mb-6 hidden animate-fade-in-up text-left"
                >
                    <h2
                        class="text-2xl font-black text-slate-800 mb-6 border-b border-slate-200 pb-4"
                    >
                        Panduan Visual Dosen
                    </h2>
                    <ul
                        class="space-y-5 custom-scrollbar overflow-y-auto max-h-[60vh] pr-2"
                    >
                        <li class="flex items-start gap-4">
                            <span
                                class="w-8 h-8 rounded-full bg-blue-600 text-white font-bold flex items-center justify-center shrink-0 mt-0.5"
                                >1</span
                            >
                            <div>
                                <strong
                                    class="text-slate-800 block text-base mb-1"
                                    >Dasbor & Jadwal</strong
                                >Lihat jadwal "Mengajar Hari Ini", total kelas,
                                dan antrean tugas yang perlu dinilai di halaman
                                awal.
                            </div>
                        </li>
                        <li class="flex items-start gap-4">
                            <span
                                class="w-8 h-8 rounded-full bg-blue-600 text-white font-bold flex items-center justify-center shrink-0 mt-0.5"
                                >2</span
                            >
                            <div>
                                <strong
                                    class="text-slate-800 block text-base mb-1"
                                    >Manajemen Mata Kuliah</strong
                                >Pilih menu "Mata Kuliah" lalu klik salah satu
                                kelas. Anda bisa membuat Sesi Pertemuan baru dan
                                mengunggah materi di dalamnya.
                            </div>
                        </li>
                        <li class="flex items-start gap-4">
                            <span
                                class="w-8 h-8 rounded-full bg-blue-600 text-white font-bold flex items-center justify-center shrink-0 mt-0.5"
                                >3</span
                            >
                            <div>
                                <strong
                                    class="text-slate-800 block text-base mb-1"
                                    >Sistem Input Penilaian</strong
                                >Masuk ke menu "Input Nilai", atur persentase
                                bobot (wajib 100%), lalu masukkan nilai. Sistem
                                akan menghitung otomatis huruf mutunya.
                            </div>
                        </li>
                    </ul>
                </div>

                <!-- ========================================== -->
                <!-- 3. TAMPILAN AUDIO PLAYER MAHASISWA -->
                <!-- ========================================== -->
                <div
                    id="konten-audio"
                    class="w-full max-w-4xl glass-card p-8 sm:p-12 rounded-[3rem] shadow-2xl border border-white mb-6 hidden flex-col items-center text-center animate-fade-in-up"
                >
                    <div
                        class="w-24 h-24 sm:w-28 sm:h-28 bg-gradient-to-br from-indigo-500 to-blue-600 rounded-full flex items-center justify-center mb-6 audio-pulse shadow-lg mx-auto"
                    >
                        <svg
                            class="w-12 h-12 text-white"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"
                            ></path>
                        </svg>
                    </div>
                    <div
                        class="inline-flex items-center gap-2 px-3 py-1 bg-indigo-50 text-indigo-600 rounded-full text-xs font-bold uppercase tracking-wider mb-4 mx-auto"
                    >
                        <span
                            class="w-2 h-2 rounded-full bg-indigo-500 animate-pulse"
                        ></span>
                        Audio Berjalan
                    </div>

                    <h2
                        class="text-2xl sm:text-3xl font-black text-slate-800 mb-6 tracking-tight w-full text-center"
                    >
                        Audio Panduan Mahasiswa
                    </h2>

                    <div
                        class="grid grid-cols-1 md:grid-cols-2 gap-6 w-full text-left"
                    >
                        <div
                            class="bg-indigo-50/50 p-6 rounded-3xl border border-indigo-100"
                        >
                            <h4
                                class="font-black text-indigo-900 mb-3 border-b border-indigo-200 pb-2"
                            >
                                Aturan Dasar Interaksi
                            </h4>
                            <ul
                                class="text-sm space-y-3 font-bold text-slate-700"
                            >
                                <li>
                                    <strong>1 Ketukan / Klik:</strong> Aktifkan
                                    Mikrofon.
                                </li>
                                <li>
                                    <strong>2 Ketukan / Klik:</strong> Memotong
                                    instruksi sistem (Skip).
                                </li>
                                <li>
                                    Sebut
                                    <strong class="text-indigo-600"
                                        >"Ulang"</strong
                                    >
                                    untuk mengulang instruksi dari awal.
                                </li>
                                <li>
                                    Sebut
                                    <strong class="text-indigo-600"
                                        >"Nol"</strong
                                    >
                                    untuk kembali / batal.
                                </li>
                            </ul>
                        </div>
                        <div
                            class="bg-blue-50/50 p-6 rounded-3xl border border-blue-100"
                        >
                            <h4
                                class="font-black text-blue-900 mb-3 border-b border-blue-200 pb-2"
                            >
                                Navigasi Sistem & Ujian
                            </h4>
                            <ul
                                class="text-sm space-y-3 font-bold text-slate-700"
                            >
                                <li>
                                    Dengarkan angka menu, lalu
                                    <strong>sebutkan angkanya</strong>.
                                </li>
                                <li>
                                    Saat Ujian, sebut
                                    <strong class="text-blue-600"
                                        >A, B, C, D, E</strong
                                    >
                                    untuk menjawab.
                                </li>
                                <li>
                                    Sebut
                                    <strong class="text-blue-600"
                                        >"Lanjut"</strong
                                    >
                                    atau
                                    <strong class="text-blue-600"
                                        >"Kembali"</strong
                                    >
                                    pindah soal.
                                </li>
                                <li>
                                    Sebut
                                    <strong class="text-blue-600"
                                        >"Kumpulkan"</strong
                                    >
                                    saat selesai ujian.
                                </li>
                            </ul>
                        </div>
                    </div>

                    <p class="text-sm font-bold text-slate-400 mt-8">
                        Ucapkan
                        <strong class="text-red-500">"Nol"</strong> untuk
                        kembali.
                    </p>
                </div>

                <!-- ========================================== -->
                <!-- TOMBOL KEMBALI DINAMIS -->
                <!-- ========================================== -->
                <div
                    class="w-full flex justify-center mt-4 sm:mt-6 animate-fade-in-up delay-200"
                    id="wrapper-kembali"
                >
                    <!-- Tombol Kembali ke Portal (di halaman awal modul) -->
                    <a
                        href="{{ route('choose_role') }}"
                        id="btn-kembali-portal"
                        class="group glass-card px-8 py-4 rounded-[2rem] hover:border-red-400 transition-all duration-300 transform hover:-translate-y-1 text-center flex items-center justify-center gap-4 relative overflow-hidden w-full max-w-md"
                    >
                        <div
                            class="absolute inset-0 bg-gradient-to-r from-red-500/0 to-red-500/5 group-hover:to-red-500/10 transition-colors"
                        ></div>
                        <div
                            class="w-10 h-10 bg-red-50 text-red-600 rounded-full flex items-center justify-center font-black text-lg border-2 border-red-100 z-10 group-hover:bg-red-600 group-hover:text-white transition-colors shrink-0"
                        >
                            0
                        </div>
                        <div class="flex flex-col text-left z-10 flex-grow">
                            <h2
                                class="text-lg font-bold text-slate-800 group-hover:text-red-700 transition-colors leading-tight"
                            >
                                Kembali ke Portal
                            </h2>
                        </div>
                    </a>

                    <!-- Tombol Kembali ke Menu Modul (di dalam Modul) -->
                    <button
                        onclick="kembaliKeMenuAwal()"
                        id="btn-kembali-menu"
                        class="hidden group glass-card px-8 py-4 rounded-[2rem] hover:border-slate-400 transition-all duration-300 transform hover:-translate-y-1 text-center flex items-center justify-center gap-4 relative overflow-hidden w-full max-w-md focus:outline-none"
                    >
                        <div
                            class="w-10 h-10 bg-slate-100 text-slate-600 rounded-full flex items-center justify-center font-black text-lg border-2 border-slate-200 z-10 group-hover:bg-slate-600 group-hover:text-white transition-colors shrink-0"
                        >
                            0
                        </div>
                        <div class="flex flex-col text-left z-10 flex-grow">
                            <h2
                                class="text-lg font-bold text-slate-800 group-hover:text-slate-700 transition-colors leading-tight"
                            >
                                Kembali ke Pilihan Modul
                            </h2>
                        </div>
                    </button>
                </div>
            </div>
        </div>

        <script>
            // Elements
            const statusBar = document.getElementById("voice-status-bar");
            const statusText = document.getElementById("status-text");
            const waveBars = document.querySelectorAll(".wave-bar");
            const badgeHeader = document.getElementById("badge-header");
            const titleHeader = document.getElementById("title-header");
            const descHeader = document.getElementById("desc-header");

            const secMenuUtama = document.getElementById("menu-utama");
            const secKontenDosen = document.getElementById("konten-dosen");
            const secKontenAudio = document.getElementById("konten-audio");

            const btnPortal = document.getElementById("btn-kembali-portal");
            const btnMenu = document.getElementById("btn-kembali-menu");

            const synth = window.speechSynthesis;
            const SpeechRec =
                window.webkitSpeechRecognition || window.SpeechRecognition;
            let rec = null;
            let isRecActive = false;
            let isRedirecting = false;
            let isSpeaking = false;
            let waveInterval;

            // State: main, dosen, mahasiswa_baca
            let currentState = "main";
            const savedRate =
                parseFloat(localStorage.getItem("speechRate")) || 1.1;

            let suaraIndonesia = null;
            function siapkanSuara() {
                const voices = synth.getVoices();
                suaraIndonesia =
                    voices.find(
                        (v) =>
                            v.lang.replace("_", "-") === "id-ID" &&
                            (v.name.includes("Google") ||
                                v.name.includes("Gadis") ||
                                v.name.includes("Female")),
                    ) ||
                    voices.find((v) => v.lang.replace("_", "-") === "id-ID");
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

            // Mulai pertama kali masuk halaman
            window.addEventListener("load", () => {
                setTimeout(() => {
                    bicara(
                        "Halaman Modul Panduan. Sebutkan Satu untuk Modul Dosen, atau Dua untuk Modul Mahasiswa. Sebutkan Nol untuk kembali ke portal utama.",
                    );
                }, 800);
            });

            function setWave(active) {
                if (active) {
                    waveInterval = setInterval(() => {
                        waveBars.forEach((bar) => {
                            bar.style.height = `${Math.floor(Math.random() * 20) + 4}px`;
                        });
                    }, 100);
                } else {
                    if (typeof waveInterval !== "undefined")
                        clearInterval(waveInterval);
                    waveBars.forEach((bar) => (bar.style.height = "4px"));
                }
            }

            function resetMicSession() {
                if (rec) {
                    try {
                        rec.abort();
                    } catch (e) {}
                    isRecActive = false;
                }
            }

            function bicara(teks) {
                if (isRedirecting) return;
                isSpeaking = true;
                resetMicSession();
                synth.cancel();

                setTimeout(() => {
                    const utter = new SpeechSynthesisUtterance(teks);
                    utter.lang = "id-ID";
                    utter.rate = savedRate;
                    if (suaraIndonesia) utter.voice = suaraIndonesia;

                    utter.onstart = () => {
                        if (statusText && teks !== "") {
                            statusText.innerText = "SISTEM BERBICARA";
                            statusText.classList.replace(
                                "text-slate-700",
                                "text-indigo-600",
                            );
                            statusText.classList.replace(
                                "text-green-600",
                                "text-indigo-600",
                            );
                        }
                        setWave(true);
                    };

                    utter.onend = () => {
                        isSpeaking = false;
                        setWave(false);
                        if (!isRedirecting && currentState !== "dosen") {
                            if (statusText) {
                                statusText.innerText = "MENDENGARKAN";
                                statusText.classList.replace(
                                    "text-indigo-600",
                                    "text-green-600",
                                );
                            }
                            try {
                                rec.start();
                                isRecActive = true;
                            } catch (e) {}
                        }
                    };

                    utter.onerror = () => {
                        isSpeaking = false;
                        setWave(false);
                    };
                    synth.speak(utter);
                }, 50);
            }

            // KLIK GANDA UNTUK SKIP SUARA
            let clickTimer = null;
            document.body.addEventListener("click", (e) => {
                const targetBtn = e.target.closest("button");
                const targetLink = e.target.closest("a");
                if (targetBtn || targetLink) return;

                if (clickTimer !== null) {
                    clearTimeout(clickTimer);
                    clickTimer = null;
                    if (!isRedirecting) {
                        synth.cancel();
                        isSpeaking = false;
                        setWave(false);
                        resetMicSession();

                        setTimeout(() => {
                            if (statusText) {
                                statusText.innerText = "MENDENGARKAN";
                                statusText.classList.replace(
                                    "text-indigo-600",
                                    "text-green-600",
                                );
                            }
                            try {
                                rec.start();
                                isRecActive = true;
                            } catch (error) {}
                        }, 50);
                    }
                } else {
                    clickTimer = setTimeout(() => {
                        clickTimer = null;
                    }, 300);
                }
            });

            // ==========================================
            // LOGIKA NAVIGASI ANTAR LAYAR MODUL
            // ==========================================

            window.bukaModulDosen = function () {
                currentState = "dosen";

                badgeHeader.innerText = "Hanya Visual";
                titleHeader.innerText = "Modul Dosen";
                descHeader.innerText =
                    "Silakan baca panduan manajemen kelas di bawah ini.";

                secMenuUtama.classList.add("hidden");
                secKontenDosen.classList.remove("hidden");
                btnPortal.classList.add("hidden");
                btnMenu.classList.remove("hidden");

                synth.cancel();
                isSpeaking = false;
                if (statusText) statusText.innerText = "MODE VISUAL DOSEN";
            };

            window.bacaAudioMahasiswa = function () {
                currentState = "mahasiswa_baca";

                badgeHeader.innerText = "Mode Audio";
                titleHeader.innerText = "Modul Mahasiswa";
                descHeader.innerText =
                    "Dengarkan instruksi yang dibacakan oleh sistem.";

                secMenuUtama.classList.add("hidden");
                secKontenAudio.classList.remove("hidden");
                secKontenAudio.classList.add("flex");
                btnPortal.classList.add("hidden");
                btnMenu.classList.remove("hidden");

                // Teks yang SUPER DETAIL tapi HANYA YANG PENTING SAJA sesuai sistem kamu
                let isiSuara =
                    "Memutar Modul Panduan Mahasiswa. Aplikasi ini menggunakan navigasi suara interaktif. Berikut adalah lima aturan dasar yang harus Anda ingat. Pertama, ketuk layar satu kali atau tekan keyboard untuk mengaktifkan mikrofon. Kedua, ketuk layar dua kali jika Anda ingin memotong suara sistem dan langsung memberikan perintah. Ketiga, sebutkan kata 'Ulang' jika Anda ingin sistem membacakan ulang instruksi di halaman manapun. Keempat, sebutkan angka 'Nol' untuk membatalkan aksi atau kembali ke halaman sebelumnya. Kelima, di setiap halaman, Anda cukup mendengarkan opsi angka yang dibacakan sistem, lalu sebutkan angkanya untuk berpindah menu. Khusus untuk ujian, sistem akan membacakan soal secara berurutan. Anda cukup menyebutkan huruf A, B, C, D, atau E untuk menjawab. Sebut 'Lanjut' untuk soal berikutnya, dan sebut 'Kumpulkan' untuk mengakhiri ujian. Panduan selesai. Sebutkan Nol untuk menghentikan audio dan kembali.";

                bicara(isiSuara);
            };

            window.kembaliKeMenuAwal = function () {
                synth.cancel();
                currentState = "main";

                badgeHeader.innerText = "Pusat Bantuan Audio & Visual";
                titleHeader.innerText = "Modul Panduan";
                descHeader.innerText =
                    "Sebutkan Satu untuk Modul Dosen, atau Dua untuk Mahasiswa.";

                secKontenDosen.classList.add("hidden");
                secKontenAudio.classList.add("hidden");
                secKontenAudio.classList.remove("flex");
                secMenuUtama.classList.remove("hidden");

                btnMenu.classList.add("hidden");
                btnPortal.classList.remove("hidden");

                bicara(
                    "Halaman Utama Modul. Sebutkan Satu untuk Modul Dosen, Dua untuk Modul Mahasiswa, atau Nol untuk kembali ke portal utama.",
                );
            };

            // ==========================================
            // PENGENALAN SUARA
            // ==========================================
            if (rec) {
                rec.onresult = (event) => {
                    if (isRedirecting || isSpeaking) return;

                    let hasil = event.results[0][0].transcript
                        .toLowerCase()
                        .replace(/[.,?!]/g, "")
                        .trim();

                    if (currentState === "main") {
                        if (
                            hasil.includes("satu") ||
                            hasil.includes("1") ||
                            hasil.includes("dosen")
                        ) {
                            bukaModulDosen();
                        } else if (
                            hasil.includes("dua") ||
                            hasil.includes("2") ||
                            hasil.includes("duwa") ||
                            hasil.includes("mahasiswa")
                        ) {
                            bacaAudioMahasiswa();
                        } else if (
                            hasil.includes("nol") ||
                            hasil.includes("0") ||
                            hasil.includes("kembali") ||
                            hasil.includes("portal")
                        ) {
                            isRedirecting = true;
                            resetMicSession();
                            setWave(false);
                            if (statusText)
                                statusText.innerText = "MENGALIHKAN...";
                            const utter = new SpeechSynthesisUtterance(
                                "Kembali ke portal utama.",
                            );
                            utter.lang = "id-ID";
                            if (suaraIndonesia) utter.voice = suaraIndonesia;
                            utter.onend = () => {
                                window.location.href =
                                    "{{ route('choose_role') }}";
                            };
                            synth.speak(utter);
                        } else if (hasil.includes("ulang")) {
                            resetMicSession();
                            bicara(
                                "Sebutkan Satu untuk Modul Dosen, atau Dua untuk Modul Mahasiswa. Sebutkan Nol untuk kembali ke portal utama.",
                            );
                        }
                    } else {
                        // KONDISI SEDANG BACA MODUL MAHASISWA ATAU DI DOSEN
                        if (
                            hasil.includes("nol") ||
                            hasil.includes("0") ||
                            hasil.includes("kembali") ||
                            hasil.includes("stop")
                        ) {
                            kembaliKeMenuAwal();
                        } else if (
                            hasil.includes("ulang") &&
                            currentState === "mahasiswa_baca"
                        ) {
                            bacaAudioMahasiswa();
                        }
                    }
                };

                rec.onend = () => {
                    isRecActive = false;
                    if (
                        !isRedirecting &&
                        !isSpeaking &&
                        currentState !== "dosen"
                    ) {
                        try {
                            rec.start();
                        } catch (e) {}
                    }
                };
            }
        </script>
        <x-accessibility-widget />
    </body>
</html>
