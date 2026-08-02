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

            /* Background diselaraskan 100% dengan choose_role */
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

            /* Efek Kaca diselaraskan */
            .glass-card {
                background: rgba(255, 255, 255, 0.75);
                backdrop-filter: blur(16px);
                -webkit-backdrop-filter: blur(16px);
                border: 1px solid rgba(255, 255, 255, 0.5);
                box-shadow: 0 10px 30px -10px rgba(0, 0, 0, 0.1);
            }

            /* Animasi untuk "Audio Player" saat membaca */
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
        </style>
    </head>
    <body
        class="bg-animated font-['Plus_Jakarta_Sans'] min-h-[100dvh] flex flex-col relative overflow-x-hidden text-slate-800 m-0 p-0"
    >
        <!-- Ornamen Latar Belakang (Sama dengan halaman role) -->
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
                <div class="text-center mb-10 sm:mb-16" id="header-text">
                    <div
                        class="inline-block px-4 py-1.5 bg-indigo-100 text-indigo-700 font-bold text-xs rounded-full mb-4 tracking-wider uppercase"
                    >
                        Pusat Bantuan Suara
                    </div>
                    <h1
                        class="text-4xl sm:text-5xl md:text-6xl font-extrabold text-slate-900 mb-4 tracking-tight drop-shadow-sm"
                    >
                        Modul Panduan
                    </h1>
                    <p
                        class="text-slate-600 text-lg sm:text-xl max-w-2xl mx-auto leading-relaxed font-medium"
                        id="panduan-desc"
                    >
                        Sebutkan
                        <strong class="text-blue-600">Satu</strong> untuk Modul
                        Dosen,
                        <strong class="text-indigo-600">Dua</strong> untuk Modul
                        Mahasiswa, atau
                        <strong class="text-red-500">Nol</strong> untuk Kembali.
                    </p>
                </div>

                <!-- TAMPILAN "AUDIO PLAYER" SAAT MODUL DIBACA -->
                <div
                    id="konten-pembacaan"
                    class="w-full max-w-4xl glass-card p-8 sm:p-12 rounded-[3rem] shadow-2xl border border-white mb-8 hidden flex-col items-center text-center"
                >
                    <!-- Ikon Audio Berdetak -->
                    <div
                        class="w-24 h-24 sm:w-32 sm:h-32 bg-gradient-to-br from-indigo-500 to-blue-600 rounded-full flex items-center justify-center mb-8 audio-pulse shadow-[0_10px_30px_rgba(79,70,229,0.5)]"
                    >
                        <svg
                            class="w-12 h-12 sm:w-16 sm:h-16 text-white"
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
                        class="inline-flex items-center gap-2 px-4 py-1.5 bg-indigo-50 text-indigo-600 rounded-full text-sm font-bold uppercase tracking-wider mb-4"
                    >
                        <span
                            class="w-2 h-2 rounded-full bg-indigo-500 animate-pulse"
                        ></span>
                        Audio Berjalan
                    </div>

                    <h2
                        id="judul-pembacaan"
                        class="text-3xl sm:text-4xl font-black text-slate-800 mb-6 tracking-tight"
                    >
                        Membaca Modul...
                    </h2>

                    <div
                        id="teks-pembacaan"
                        class="text-lg sm:text-xl leading-loose text-slate-600 font-medium max-w-2xl mx-auto"
                    >
                        <!-- Teks Modul Masuk Sini -->
                    </div>

                    <div class="w-full h-[1px] bg-slate-200 my-8"></div>

                    <p class="text-sm font-bold text-slate-400">
                        Ucapkan <strong class="text-red-500">"Nol"</strong> atau
                        <strong class="text-red-500">"Kembali"</strong> untuk
                        menghentikan audio.
                    </p>
                </div>

                <!-- 3 KARTU MENU MODUL -->
                <div
                    class="grid grid-cols-1 md:grid-cols-3 gap-6 sm:gap-8 w-full max-w-5xl relative"
                    id="menu-cards"
                >
                    <!-- KARTU 1: MODUL DOSEN -->
                    <button
                        onclick="bacaModul('dosen')"
                        id="btn-dosen"
                        class="group glass-card p-8 sm:p-10 rounded-[2.5rem] hover:shadow-[0_20px_40px_-15px_rgba(37,99,235,0.3)] hover:border-blue-400 transition-all duration-300 transform hover:-translate-y-2 text-center flex flex-col items-center justify-between h-full relative overflow-hidden focus:outline-none"
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
                            class="w-20 h-20 sm:w-24 sm:h-24 bg-gradient-to-br from-blue-100 to-white rounded-[1.5rem] flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-500 shadow-sm border border-white z-10"
                        >
                            <svg
                                class="w-10 h-10 text-blue-600"
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
                                class="text-xl font-black text-slate-800 mb-2 group-hover:text-blue-700 transition-colors"
                            >
                                Modul Dosen
                            </h2>
                            <p
                                class="text-sm text-slate-500 leading-relaxed px-2"
                            >
                                Panduan mengelola kelas dan materi secara
                                efisien.
                            </p>
                        </div>
                    </button>

                    <!-- KARTU 2: MODUL MAHASISWA -->
                    <button
                        onclick="bacaModul('mahasiswa')"
                        id="btn-mahasiswa"
                        class="group glass-card p-8 sm:p-10 rounded-[2.5rem] hover:shadow-[0_20px_40px_-15px_rgba(79,70,229,0.3)] hover:border-indigo-400 transition-all duration-300 transform hover:-translate-y-2 text-center flex flex-col items-center justify-between h-full relative overflow-hidden focus:outline-none"
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
                            class="w-20 h-20 sm:w-24 sm:h-24 bg-gradient-to-br from-indigo-100 to-white rounded-[1.5rem] flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-500 shadow-sm border border-white z-10"
                        >
                            <svg
                                class="w-10 h-10 text-indigo-600"
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
                                class="text-xl font-black text-slate-800 mb-2 group-hover:text-indigo-700 transition-colors"
                            >
                                Modul Mahasiswa
                            </h2>
                            <p
                                class="text-sm text-slate-500 leading-relaxed px-2"
                            >
                                Panduan navigasi audio dan tata cara ujian
                                online.
                            </p>
                        </div>
                    </button>

                    <!-- KARTU 3: KEMBALI -->
                    <a
                        href="{{ route('choose_role') }}"
                        id="btn-kembali"
                        class="group glass-card p-8 sm:p-10 rounded-[2.5rem] hover:shadow-[0_20px_40px_-15px_rgba(239,68,68,0.3)] hover:border-red-400 transition-all duration-300 transform hover:-translate-y-2 text-center flex flex-col items-center justify-between h-full relative overflow-hidden"
                    >
                        <div
                            class="absolute inset-0 bg-gradient-to-br from-red-500/0 to-red-500/5 group-hover:to-red-500/10 transition-colors"
                        ></div>
                        <div
                            class="absolute top-6 left-6 w-10 h-10 bg-white text-red-600 rounded-full flex items-center justify-center font-black text-lg border-2 border-red-100 shadow-sm z-10 group-hover:bg-red-600 group-hover:text-white transition-colors"
                        >
                            0
                        </div>

                        <div
                            class="w-20 h-20 sm:w-24 sm:h-24 bg-gradient-to-br from-red-100 to-white rounded-[1.5rem] flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-500 shadow-sm border border-white z-10"
                        >
                            <svg
                                class="w-10 h-10 text-red-600"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.5"
                                    d="M10 19l-7-7m0 0l7-7m-7 7h18"
                                ></path>
                            </svg>
                        </div>
                        <div
                            class="flex-grow flex flex-col justify-center z-10"
                        >
                            <h2
                                class="text-xl font-black text-slate-800 mb-2 group-hover:text-red-700 transition-colors"
                            >
                                Kembali
                            </h2>
                            <p
                                class="text-sm text-slate-500 leading-relaxed px-2"
                            >
                                Tutup halaman ini dan kembali ke menu utama.
                            </p>
                        </div>
                    </a>
                </div>
            </div>

            <footer
                class="w-full text-center py-6 text-slate-500 text-sm font-medium mt-auto relative z-10 bg-white/40 backdrop-blur-md border-t border-slate-200/50"
            >
                &copy; 2026 Universitas Muhammadiyah Sukabumi - Kampus Inklusi
            </footer>
        </div>

        <script>
            const statusBar = document.getElementById("voice-status-bar");
            const statusText = document.getElementById("status-text");
            const waveBars = document.querySelectorAll(".wave-bar");

            const headerText = document.getElementById("header-text");
            const menuCards = document.getElementById("menu-cards");
            const kontenPembacaan = document.getElementById("konten-pembacaan");
            const judulPembacaan = document.getElementById("judul-pembacaan");
            const teksPembacaan = document.getElementById("teks-pembacaan");

            const synth = window.speechSynthesis;
            const SpeechRec =
                window.webkitSpeechRecognition || window.SpeechRecognition;
            let rec = null;
            let isRecActive = false;
            let isRedirecting = false;
            let isSpeaking = false;
            let idleTimer;
            let waveInterval;

            let sedangMembaca = false;
            const savedRate =
                parseFloat(localStorage.getItem("speechRate")) || 1.1;
            const teksAwal =
                "Anda berada di halaman Modul Panduan. Sebutkan Satu untuk memutar audio modul Dosen. Sebutkan Dua untuk memutar audio modul Mahasiswa. Atau sebutkan Nol untuk kembali ke halaman utama.";

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

            // AUTO START SAAT HALAMAN DIBUKA
            window.addEventListener("load", () => {
                setTimeout(() => {
                    bicara(teksAwal);
                    resetIdleTimer();
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

            function resetIdleTimer() {
                clearTimeout(idleTimer);
                if (isRedirecting) return;
                idleTimer = setTimeout(() => {
                    if (!sedangMembaca) bicara(teksAwal);
                }, 180000); // diam 3 menit diulang
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

                        if (!isRedirecting) {
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
                                resetIdleTimer();
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

            // MENGHENTIKAN SUARA DENGAN KLIK GANDA
            let clickTimer = null;
            document.body.addEventListener("click", (e) => {
                const targetLink = e.target.closest("a");
                const targetBtn = e.target.closest("button");

                if (targetBtn) return; // biarkan onClick HTML (bacaModul) berjalan normal

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
                                resetIdleTimer();
                            } catch (error) {}
                        }, 50);
                    }
                } else {
                    clickTimer = setTimeout(() => {
                        clickTimer = null;
                        if (
                            targetLink &&
                            targetLink.href &&
                            targetLink.href !== "#"
                        ) {
                            window.location.href = targetLink.href;
                        }
                    }, 300);
                }
            });

            // LOGIKA AUDIO PLAYER MODUL
            window.bacaModul = function (tipe) {
                sedangMembaca = true;

                // Ubah Tampilan: Sembunyikan Grid Menu, Munculkan Audio Player
                headerText.classList.add("hidden");
                menuCards.classList.add("hidden");
                kontenPembacaan.classList.remove("hidden");
                kontenPembacaan.classList.add("flex"); // Pastikan class flex dari Tailwind berjalan

                let isiSuara = "";
                if (tipe === "dosen") {
                    judulPembacaan.innerText = "Audio Panduan Dosen";
                    teksPembacaan.innerHTML = `
                        <p>Sebagai Dosen, Anda memiliki hak akses penuh untuk mengelola kegiatan akademik. Langkah pertama adalah masuk menggunakan NIDN dan kata sandi.</p>
                        <p>Pada halaman dasbor, Anda dapat melihat jadwal mengajar, membuat sesi perkuliahan, mengunggah materi, dan memantau absensi.</p>
                        <p>Untuk mengelola nilai mahasiswa, silakan gunakan menu Penilaian secara berkala.</p>
                    `;
                    isiSuara =
                        "Memutar Audio Panduan Dosen. Sebagai Dosen, Anda memiliki hak akses penuh untuk mengelola kegiatan akademik. Langkah pertama adalah masuk menggunakan N I D N dan kata sandi. Pada halaman dasbor, Anda dapat melihat jadwal mengajar, membuat sesi perkuliahan, mengunggah materi, dan memantau absensi. Untuk mengelola nilai mahasiswa, silakan gunakan menu Penilaian secara berkala. Panduan selesai. Sebutkan Nol, untuk menghentikan audio dan kembali.";
                } else {
                    judulPembacaan.innerText = "Audio Panduan Mahasiswa";
                    teksPembacaan.innerHTML = `
                        <p>Aplikasi ini terintegrasi penuh dengan asisten suara. Pastikan Anda berada di ruangan yang cukup tenang agar mikrofon dapat menangkap suara dengan baik.</p>
                        <p>Di setiap halaman, Anda cukup menyebutkan angka yang dibacakan oleh sistem. Misalnya, sebutkan angka 'Satu' untuk melihat daftar mata kuliah.</p>
                        <p>Saat Anda mengerjakan ujian online, sistem akan membacakan soal, dan Anda cukup membalas dengan menyebutkan opsi jawaban A, B, C, atau D.</p>
                    `;
                    isiSuara =
                        "Memutar Audio Panduan Mahasiswa. Aplikasi ini terintegrasi penuh dengan asisten suara. Pastikan Anda berada di ruangan yang cukup tenang agar mikrofon dapat menangkap suara dengan baik. Di setiap halaman, Anda cukup menyebutkan angka yang dibacakan oleh sistem. Misalnya, sebutkan angka Satu untuk melihat daftar mata kuliah. Saat Anda mengerjakan ujian online, sistem akan membacakan soal secara berurutan, dan Anda cukup membalas dengan menyebutkan opsi jawaban A, B, C, atau D. Panduan selesai. Sebutkan Nol, untuk menghentikan audio dan kembali.";
                }

                bicara(isiSuara);
            };

            function tutupBacaModul() {
                sedangMembaca = false;

                // Kembalikan Tampilan Awal
                kontenPembacaan.classList.add("hidden");
                kontenPembacaan.classList.remove("flex");
                headerText.classList.remove("hidden");
                menuCards.classList.remove("hidden");

                bicara(teksAwal);
            }

            // PENGENALAN SUARA
            if (rec) {
                rec.onresult = (event) => {
                    if (isRedirecting || isSpeaking) return;
                    resetIdleTimer();

                    let hasilTerakhir =
                        event.results[0][0].transcript.toLowerCase();

                    if (!sedangMembaca) {
                        // Kondisi Milih Modul (Belum diputar)
                        if (
                            hasilTerakhir.includes("satu") ||
                            hasilTerakhir.includes("1")
                        ) {
                            document
                                .getElementById("btn-dosen")
                                .classList.add("ring-4", "ring-blue-400");
                            bacaModul("dosen");
                        } else if (
                            hasilTerakhir.includes("dua") ||
                            hasilTerakhir.includes("2") ||
                            hasilTerakhir.includes("duwa") ||
                            hasilTerakhir.includes("doa")
                        ) {
                            document
                                .getElementById("btn-mahasiswa")
                                .classList.add("ring-4", "ring-indigo-400");
                            bacaModul("mahasiswa");
                        } else if (
                            hasilTerakhir.includes("nol") ||
                            hasilTerakhir.includes("0") ||
                            hasilTerakhir.includes("kembali")
                        ) {
                            isRedirecting = true;
                            resetMicSession();
                            setWave(false);
                            document
                                .getElementById("btn-kembali")
                                .classList.add("ring-4", "ring-red-400");
                            if (statusText)
                                statusText.innerText = "MENGALIHKAN...";

                            const utter = new SpeechSynthesisUtterance(
                                "Kembali ke halaman utama.",
                            );
                            utter.lang = "id-ID";
                            if (suaraIndonesia) utter.voice = suaraIndonesia;
                            utter.onend = () => {
                                window.location.href =
                                    "{{ route('choose_role') }}";
                            };
                            synth.speak(utter);
                        } else if (hasilTerakhir.includes("ulang")) {
                            resetMicSession();
                            bicara(teksAwal);
                        } else {
                            resetMicSession();
                            bicara("Sebut ulang angka pilihan Anda.");
                        }
                    } else {
                        // Kondisi Audio Sedang/Selesai Diputar
                        if (
                            hasilTerakhir.includes("nol") ||
                            hasilTerakhir.includes("0") ||
                            hasilTerakhir.includes("kembali") ||
                            hasilTerakhir.includes("stop") ||
                            hasilTerakhir.includes("berhenti")
                        ) {
                            document
                                .getElementById("btn-dosen")
                                .classList.remove("ring-4", "ring-blue-400");
                            document
                                .getElementById("btn-mahasiswa")
                                .classList.remove("ring-4", "ring-indigo-400");
                            tutupBacaModul();
                        } else {
                            resetMicSession();
                            bicara(
                                "Ucapkan Nol atau Kembali, untuk menghentikan audio.",
                            );
                        }
                    }
                };

                rec.onend = () => {
                    isRecActive = false;
                    if (!isRedirecting && !isSpeaking) {
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
