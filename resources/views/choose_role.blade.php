<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"
        />
        <title>Portal LMS Inklusi UMMI</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link
            href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
            rel="stylesheet"
        />

        <link rel="prefetch" href="{{ route('login.dosen') }}" />
        <link rel="prefetch" href="{{ route('setup.voice') }}" />
        <link rel="prefetch" href="{{ route('modul.panduan') }}" />

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
        </style>
    </head>
    <body
        class="bg-animated font-['Plus_Jakarta_Sans'] min-h-[100dvh] flex flex-col relative overflow-x-hidden text-slate-800 m-0 p-0"
    >
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

        <!-- LAYAR AKTIVASI SUARA (Bisa di-bypass oleh Session Storage) -->
        <div
            id="permission-overlay"
            class="fixed inset-0 z-[100] bg-slate-900/95 backdrop-blur-2xl flex flex-col items-center justify-center p-6 text-center cursor-pointer transition-opacity duration-700"
        >
            <div
                class="w-24 h-24 sm:w-28 sm:h-28 bg-blue-600/20 rounded-full flex items-center justify-center mb-8 animate-pulse border border-blue-500/30 text-blue-400 shadow-[0_0_40px_rgba(37,99,235,0.3)]"
            >
                <svg
                    class="w-12 h-12 sm:w-14 sm:h-14"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z"
                    ></path>
                </svg>
            </div>
            <h2
                class="text-3xl sm:text-4xl font-black mb-4 uppercase tracking-tighter text-white"
            >
                Sistem Suara
            </h2>
            <p class="text-slate-300 text-base sm:text-lg max-w-md">
                Ketuk layar <strong>atau tekan tombol apa saja</strong> di
                keyboard Anda untuk mengaktifkan asisten suara.
            </p>
        </div>

        <div
            id="voice-status-bar"
            class="fixed bottom-8 lg:bottom-auto lg:top-8 left-1/2 transform -translate-x-1/2 w-max bg-white/95 backdrop-blur-xl px-6 py-3.5 rounded-full shadow-2xl border border-slate-200 z-50 flex items-center justify-center gap-4 hidden transition-all duration-500 opacity-0 translate-y-10 lg:-translate-y-10"
        >
            <div id="wave-container" class="flex items-center gap-[3px] h-5">
                <div
                    class="wave-bar w-[3px] bg-blue-500 rounded-full h-1"
                ></div>
                <div
                    class="wave-bar w-[3px] bg-blue-400 rounded-full h-1"
                ></div>
                <div
                    class="wave-bar w-[3px] bg-blue-600 rounded-full h-1"
                ></div>
                <div
                    class="wave-bar w-[3px] bg-blue-400 rounded-full h-1"
                ></div>
                <div
                    class="wave-bar w-[3px] bg-blue-500 rounded-full h-1"
                ></div>
            </div>
            <span
                id="status-text"
                class="text-sm font-black text-slate-700 uppercase tracking-widest"
                >MENDENGARKAN</span
            >
        </div>

        <!-- KONTEN UTAMA -->
        <div
            id="main-content"
            class="w-full flex-grow flex flex-col opacity-0 transition-opacity duration-1000 hidden relative z-10 min-h-[100dvh]"
        >
            <div
                class="flex-grow flex flex-col items-center justify-center px-4 sm:px-6 md:px-8 w-full max-w-5xl mx-auto pt-16 pb-12 lg:pt-28 lg:pb-16"
            >
                <!-- BAGIAN HEADER YANG DIREVISI -->
                <div class="text-center mb-10 sm:mb-14">
                    <div
                        class="inline-block px-4 py-1.5 bg-blue-100 text-blue-700 font-bold text-xs rounded-full mb-3 tracking-wider uppercase"
                    >
                        Portal Akademik Terintegrasi
                    </div>

                    <h1
                        class="text-2xl sm:text-3xl md:text-4xl font-extrabold text-slate-900 mb-3 tracking-tight drop-shadow-sm leading-tight max-w-3xl mx-auto"
                    >
                        Selamat Datang di Kampus Inklusi
                        <br class="hidden md:block" />Universitas Muhammadiyah
                        Sukabumi
                    </h1>

                    <p
                        class="text-slate-600 text-sm sm:text-base max-w-xl mx-auto leading-relaxed font-medium"
                    >
                        Silakan pilih akses peran Anda untuk memulai
                        pembelajaran.
                    </p>
                </div>

                <div class="flex flex-col gap-6 w-full max-w-4xl relative">
                    <!-- 2 KARTU UTAMA -->
                    <div
                        class="grid grid-cols-1 md:grid-cols-2 gap-6 sm:gap-8 w-full"
                    >
                        <a
                            href="{{ route('login.dosen') }}"
                            id="btn-dosen"
                            class="group glass-card p-8 sm:p-10 rounded-[2.5rem] hover:shadow-[0_20px_40px_-15px_rgba(37,99,235,0.3)] hover:border-blue-400 transition-all duration-300 transform hover:-translate-y-2 text-center flex flex-col items-center justify-between h-full relative overflow-hidden"
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
                                class="w-24 h-24 sm:w-28 sm:h-28 bg-gradient-to-br from-blue-100 to-white rounded-[2rem] flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-500 shadow-sm border border-white z-10"
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
                                    class="text-2xl font-black text-slate-800 mb-3 group-hover:text-blue-700 transition-colors"
                                >
                                    Dosen
                                </h2>
                                <p
                                    class="text-base text-slate-500 leading-relaxed px-2"
                                >
                                    Masuk untuk mengelola kelas, memberikan
                                    materi, dan memantau nilai.
                                </p>
                            </div>
                        </a>

                        <a
                            href="{{ route('setup.voice') }}"
                            id="btn-mahasiswa"
                            class="group glass-card p-8 sm:p-10 rounded-[2.5rem] hover:shadow-[0_20px_40px_-15px_rgba(79,70,229,0.3)] hover:border-indigo-400 transition-all duration-300 transform hover:-translate-y-2 text-center flex flex-col items-center justify-between h-full relative overflow-hidden"
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
                                class="w-24 h-24 sm:w-28 sm:h-28 bg-gradient-to-br from-indigo-100 to-white rounded-[2rem] flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-500 shadow-sm border border-white z-10"
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
                                    class="text-2xl font-black text-slate-800 mb-3 group-hover:text-indigo-700 transition-colors"
                                >
                                    Mahasiswa
                                </h2>
                                <p
                                    class="text-base text-slate-500 leading-relaxed px-2"
                                >
                                    Masuk untuk mengakses materi perkuliahan dan
                                    mengerjakan ujian.
                                </p>
                            </div>
                        </a>
                    </div>

                    <!-- KARTU 3: MODUL PANDUAN BANNER -->
                    <a
                        href="{{ route('modul.panduan') }}"
                        id="btn-modul"
                        class="group glass-card px-6 py-4 sm:px-8 sm:py-6 rounded-[1.5rem] hover:shadow-[0_10px_20px_-10px_rgba(13,148,136,0.3)] hover:border-teal-400 transition-all duration-300 transform hover:-translate-y-1 text-left flex items-center gap-4 sm:gap-6 relative overflow-hidden mx-auto w-full mt-2"
                    >
                        <div
                            class="absolute inset-0 bg-gradient-to-r from-teal-500/0 to-teal-500/5 group-hover:to-teal-500/10 transition-colors"
                        ></div>
                        <div
                            class="w-12 h-12 sm:w-16 sm:h-16 bg-white text-teal-600 rounded-[1rem] flex items-center justify-center font-black text-xl sm:text-2xl border-2 border-teal-100 shadow-sm shrink-0 z-10 group-hover:bg-teal-600 group-hover:text-white transition-colors"
                        >
                            3
                        </div>
                        <div class="flex-grow z-10">
                            <h2
                                class="text-lg sm:text-2xl font-bold text-slate-800 group-hover:text-teal-700 transition-colors leading-tight mb-1"
                            >
                                Buka Modul Panduan
                            </h2>
                            <p class="text-xs sm:text-base text-slate-500">
                                Dengarkan panduan lengkap penggunaan aplikasi
                                ini.
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
            const overlay = document.getElementById("permission-overlay");
            const mainContent = document.getElementById("main-content");
            const statusBar = document.getElementById("voice-status-bar");
            const statusText = document.getElementById("status-text");
            const waveBars = document.querySelectorAll(".wave-bar");

            const synth = window.speechSynthesis;
            const SpeechRec =
                window.webkitSpeechRecognition || window.SpeechRecognition;
            let rec = null;
            let isRecActive = false;
            let isRedirecting = false;
            let isSpeaking = false;
            let idleTimer;
            let waveInterval;

            const savedRate =
                parseFloat(localStorage.getItem("speechRate")) || 1.1;

            const teksSambutanUtama =
                "Selamat datang di Kampus Inklusi Universitas Muhammadiyah Sukabumi. Silakan pilih akses masuk Anda. Sebutkan Satu, untuk masuk sebagai Dosen. Sebutkan Dua, untuk masuk sebagai Mahasiswa. Atau sebutkan Tiga, untuk membuka halaman Modul Panduan.";

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

            // AUTO-BYPASS OVERLAY JIKA SUDAH AKTIF SEBELUMNYA
            window.addEventListener("DOMContentLoaded", () => {
                if (sessionStorage.getItem("sistem_suara_aktif") === "true") {
                    // Bypass Overlay
                    overlay.classList.add("hidden");
                    mainContent.classList.remove("hidden", "opacity-0");
                    statusBar.classList.remove(
                        "hidden",
                        "opacity-0",
                        "translate-y-10",
                        "lg:-translate-y-10",
                    );

                    // Langsung ngomong
                    setTimeout(() => {
                        bicara(teksSambutanUtama);
                        resetIdleTimer();
                    }, 400);
                }
            });

            function mulaiAktivasi() {
                if (overlay.classList.contains("hidden")) return;

                // Simpan Sesi (Jadi kalo back dari halaman lain ga perlu klik lagi)
                sessionStorage.setItem("sistem_suara_aktif", "true");
                overlay.classList.add("opacity-0", "pointer-events-none");

                let pancingan = new SpeechSynthesisUtterance("");
                synth.speak(pancingan);

                setTimeout(() => {
                    overlay.classList.add("hidden");
                    mainContent.classList.remove("hidden");
                    setTimeout(
                        () => mainContent.classList.remove("opacity-0"),
                        50,
                    );

                    statusBar.classList.remove("hidden");
                    setTimeout(() => {
                        statusBar.classList.remove(
                            "opacity-0",
                            "translate-y-10",
                            "lg:-translate-y-10",
                        );
                    }, 50);

                    setTimeout(() => {
                        bicara(teksSambutanUtama);
                        resetIdleTimer();
                    }, 400);
                }, 700);
            }

            overlay.addEventListener("click", mulaiAktivasi);
            document.addEventListener("keydown", mulaiAktivasi);

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
                    bicara(teksSambutanUtama);
                }, 180000);
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
                                "text-blue-600",
                            );
                            statusText.classList.replace(
                                "text-green-600",
                                "text-blue-600",
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
                                    "text-blue-600",
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

            // DOUBLE CLICK UNTUK SKIP SUARA
            let clickTimer = null;
            mainContent.addEventListener("click", (e) => {
                e.preventDefault();
                const targetLink = e.target.closest("a");

                if (clickTimer !== null) {
                    // KLIK GANDA (Skip Suara & Aktifkan Mic Seketika)
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
                                    "text-blue-600",
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
                    // KLIK TUNGGAL (Navigasi manual untuk pengguna awas)
                    clickTimer = setTimeout(() => {
                        clickTimer = null;
                        if (
                            targetLink &&
                            targetLink.href &&
                            targetLink.href !== "#" &&
                            !targetLink.href.includes("javascript:")
                        ) {
                            window.location.href = targetLink.href;
                        }
                    }, 300);
                }
            });

            if (rec) {
                rec.onresult = (event) => {
                    if (isRedirecting || isSpeaking) return;
                    resetIdleTimer();

                    // MENGHILANGKAN TANDA BACA DAN MENGUBAH KE HURUF KECIL
                    let hasilTerakhir = event.results[0][0].transcript
                        .toLowerCase()
                        .replace(/[.,?!]/g, "")
                        .trim();

                    // TANGKAP "1" / DOSEN
                    if (
                        hasilTerakhir.includes("satu") ||
                        hasilTerakhir.includes("1") ||
                        hasilTerakhir.includes("atu") ||
                        hasilTerakhir.includes("dosen")
                    ) {
                        isRedirecting = true;
                        resetMicSession();
                        setWave(false);
                        document
                            .getElementById("btn-dosen")
                            .classList.add(
                                "ring-4",
                                "ring-blue-400",
                                "scale-105",
                            );
                        if (statusText) statusText.innerText = "MENGALIHKAN...";

                        const utter = new SpeechSynthesisUtterance(
                            "Masuk sebagai Dosen",
                        );
                        utter.lang = "id-ID";
                        if (suaraIndonesia) utter.voice = suaraIndonesia;
                        utter.onend = () => {
                            window.location.href = "{{ route('login.dosen') }}";
                        };
                        synth.speak(utter);
                    }
                    // TANGKAP "2" / MAHASISWA
                    else if (
                        hasilTerakhir.includes("dua") ||
                        hasilTerakhir.includes("2") ||
                        hasilTerakhir.includes("duwa") ||
                        hasilTerakhir.includes("doa") ||
                        hasilTerakhir.includes("mahasiswa")
                    ) {
                        isRedirecting = true;
                        resetMicSession();
                        setWave(false);
                        document
                            .getElementById("btn-mahasiswa")
                            .classList.add(
                                "ring-4",
                                "ring-indigo-400",
                                "scale-105",
                            );
                        if (statusText) statusText.innerText = "MENGALIHKAN...";

                        const utter = new SpeechSynthesisUtterance(
                            "Masuk sebagai Mahasiswa",
                        );
                        utter.lang = "id-ID";
                        if (suaraIndonesia) utter.voice = suaraIndonesia;
                        utter.onend = () => {
                            window.location.href = "{{ route('setup.voice') }}";
                        };
                        synth.speak(utter);
                    }
                    // TANGKAP "3" / MODUL (TIGA ALIAS LEBIH BANYAK)
                    else if (
                        hasilTerakhir.includes("tiga") ||
                        hasilTerakhir.includes("3") ||
                        hasilTerakhir.includes("ti ga") ||
                        hasilTerakhir.includes("tig") ||
                        hasilTerakhir.includes("iga") ||
                        hasilTerakhir.includes("modul")
                    ) {
                        isRedirecting = true;
                        resetMicSession();
                        setWave(false);
                        document
                            .getElementById("btn-modul")
                            .classList.add(
                                "ring-4",
                                "ring-teal-400",
                                "scale-105",
                            );
                        if (statusText) statusText.innerText = "MENGALIHKAN...";

                        const utter = new SpeechSynthesisUtterance(
                            "Membuka Halaman Modul Panduan",
                        );
                        utter.lang = "id-ID";
                        if (suaraIndonesia) utter.voice = suaraIndonesia;
                        utter.onend = () => {
                            window.location.href =
                                "{{ route('modul.panduan') }}";
                        };
                        synth.speak(utter);
                    } else if (hasilTerakhir.includes("ulang")) {
                        resetMicSession();
                        bicara(teksSambutanUtama);
                    } else {
                        resetMicSession();
                        bicara("Sebut ulang angka pilihan Anda.");
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
