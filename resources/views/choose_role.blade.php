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

        <style>
            .wave-bar {
                transition: height 0.1s ease;
            }
        </style>
    </head>
    <body
        class="bg-slate-50 font-['Plus_Jakarta_Sans'] min-h-[100dvh] flex flex-col relative overflow-x-hidden text-slate-800 m-0 p-0"
    >
        <div class="fixed inset-0 z-0 overflow-hidden pointer-events-none">
            <div
                class="absolute top-[-10%] left-[-10%] w-64 md:w-96 h-64 md:h-96 bg-blue-200 rounded-full mix-blend-multiply filter blur-3xl opacity-40 animate-blob"
            ></div>
            <div
                class="absolute bottom-[-10%] right-[-10%] w-64 md:w-96 h-64 md:h-96 bg-indigo-200 rounded-full mix-blend-multiply filter blur-3xl opacity-40 animate-blob animation-delay-2000"
            ></div>
        </div>

        <div
            id="permission-overlay"
            class="fixed inset-0 z-[100] bg-blue-950/95 backdrop-blur-xl flex flex-col items-center justify-center p-6 text-center cursor-pointer transition-opacity duration-700"
        >
            <div
                class="w-20 h-20 sm:w-24 sm:h-24 bg-white/10 rounded-full sm:rounded-[2.5rem] flex items-center justify-center mb-6 sm:mb-8 animate-pulse border border-white/20 text-white"
            >
                <svg
                    class="w-10 h-10 sm:w-12 sm:h-12"
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
                class="text-2xl sm:text-3xl font-black mb-3 sm:mb-4 uppercase tracking-tighter text-white animate-bounce"
            >
                Aktivasi Suara
            </h2>
            <p class="text-blue-200 text-sm sm:text-lg max-w-xs sm:max-w-none">
                Ketuk layar untuk memulai
            </p>
        </div>

        <div
            id="voice-status-bar"
            class="fixed bottom-8 lg:bottom-auto lg:top-8 left-1/2 transform -translate-x-1/2 w-max max-w-[85%] bg-white/95 backdrop-blur-xl px-4 py-2.5 sm:px-6 sm:py-3 rounded-2xl shadow-xl border border-slate-200 z-50 flex items-center justify-center gap-3 hidden transition-all duration-500 opacity-0 translate-y-10 lg:-translate-y-10 cursor-pointer"
            onclick="hentikanSuaraBicara()"
        >
            <div
                id="wave-container"
                class="flex items-center gap-[2px] h-4 sm:h-5"
            >
                <div
                    class="wave-bar w-[2px] sm:w-[3px] bg-blue-500 rounded-full h-1"
                ></div>
                <div
                    class="wave-bar w-[2px] sm:w-[3px] bg-blue-400 rounded-full h-1"
                ></div>
                <div
                    class="wave-bar w-[2px] sm:w-[3px] bg-blue-600 rounded-full h-1"
                ></div>
                <div
                    class="wave-bar w-[2px] sm:w-[3px] bg-blue-400 rounded-full h-1"
                ></div>
                <div
                    class="wave-bar w-[2px] sm:w-[3px] bg-blue-500 rounded-full h-1"
                ></div>
            </div>
            <span
                id="status-text"
                class="text-xs sm:text-sm font-bold text-slate-700 uppercase tracking-widest"
            >
                MENDENGARKAN
            </span>
        </div>

        <div
            id="main-content"
            class="w-full flex-grow flex flex-col opacity-0 transition-opacity duration-1000 hidden relative z-10 min-h-[100dvh]"
            onclick="hentikanSuaraBicara()"
        >
            <div
                class="flex-grow flex flex-col items-center justify-center px-4 sm:px-6 md:px-8 w-full max-w-5xl mx-auto pt-12 pb-12 lg:pt-28 lg:pb-16"
            >
                <div class="text-center mb-8 sm:mb-12">
                    <h1
                        class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-slate-900 mb-3 sm:mb-4 tracking-tight"
                    >
                        LMS Inklusi UMMI
                    </h1>
                    <p
                        class="text-slate-500 text-base sm:text-lg max-w-2xl mx-auto leading-relaxed"
                    >
                        Selamat datang di Platform Pembelajaran Inklusif.
                        <br class="hidden sm:block" />
                        Sebutkan
                        <strong class="text-blue-600">Satu</strong> untuk Dosen,
                        atau <strong class="text-indigo-600">Dua</strong> untuk
                        Mahasiswa.
                    </p>
                </div>

                <div
                    class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6 lg:gap-8 w-full max-w-4xl"
                >
                    <a
                        href="{{ route('login.dosen') }}"
                        id="btn-dosen"
                        class="group relative bg-white/80 backdrop-blur-xl p-6 sm:p-8 rounded-3xl shadow-lg shadow-slate-200/50 border border-white hover:shadow-2xl hover:border-blue-300 transition-all duration-300 transform hover:-translate-y-2 text-center flex flex-col items-center justify-between h-full"
                    >
                        <div
                            class="absolute top-4 left-4 sm:top-5 sm:left-5 w-8 h-8 sm:w-10 sm:h-10 bg-blue-50 text-blue-600 rounded-full flex items-center justify-center font-black text-sm sm:text-lg border border-blue-100"
                        >
                            1
                        </div>
                        <div
                            class="w-16 h-16 sm:w-20 sm:h-20 lg:w-24 lg:h-24 bg-gradient-to-br from-blue-100 to-blue-50 rounded-[1.5rem] flex items-center justify-center mb-5 sm:mb-6 group-hover:from-blue-600 group-hover:to-blue-500 transition-all duration-300 shadow-inner"
                        >
                            <svg
                                class="w-8 h-8 sm:w-10 sm:h-10 lg:w-12 lg:h-12 text-blue-600 group-hover:text-white transition-colors"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M12 14l9-5-9-5-9 5 9 5z"
                                ></path>
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"
                                ></path>
                            </svg>
                        </div>
                        <div class="flex-grow flex flex-col justify-center">
                            <h2
                                class="text-xl sm:text-2xl font-bold text-slate-800 mb-2 sm:mb-3"
                            >
                                Dosen
                            </h2>
                            <p
                                class="text-sm sm:text-base text-slate-500 leading-relaxed px-2"
                            >
                                Kelola perkuliahan, materi, dan berikan
                                bimbingan kepada mahasiswa.
                            </p>
                        </div>
                    </a>

                    <a
                        href="{{ route('setup.voice') }}"
                        id="btn-mahasiswa"
                        class="group relative bg-white/80 backdrop-blur-xl p-6 sm:p-8 rounded-3xl shadow-lg shadow-slate-200/50 border border-white hover:shadow-2xl hover:border-indigo-300 transition-all duration-300 transform hover:-translate-y-2 text-center flex flex-col items-center justify-between h-full"
                    >
                        <div
                            class="absolute top-4 left-4 sm:top-5 sm:left-5 w-8 h-8 sm:w-10 sm:h-10 bg-indigo-50 text-indigo-600 rounded-full flex items-center justify-center font-black text-sm sm:text-lg border border-indigo-100"
                        >
                            2
                        </div>
                        <div
                            class="w-16 h-16 sm:w-20 sm:h-20 lg:w-24 lg:h-24 bg-gradient-to-br from-indigo-100 to-indigo-50 rounded-[1.5rem] flex items-center justify-center mb-5 sm:mb-6 group-hover:from-indigo-600 group-hover:to-indigo-500 transition-all duration-300 shadow-inner"
                        >
                            <svg
                                class="w-8 h-8 sm:w-10 sm:h-10 lg:w-12 lg:h-12 text-indigo-600 group-hover:text-white transition-colors"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"
                                ></path>
                            </svg>
                        </div>
                        <div class="flex-grow flex flex-col justify-center">
                            <h2
                                class="text-xl sm:text-2xl font-bold text-slate-800 mb-2 sm:mb-3"
                            >
                                Mahasiswa
                            </h2>
                            <p
                                class="text-sm sm:text-base text-slate-500 leading-relaxed px-2"
                            >
                                Akses materi kuliah, kumpulkan tugas, dan pantau
                                perkembangan belajar Anda.
                            </p>
                        </div>
                    </a>
                </div>
            </div>
            <footer
                class="w-full text-center py-4 text-slate-400 text-xs sm:text-sm italic mt-auto relative z-10 bg-white/50 backdrop-blur-md border-t border-slate-200/50"
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
            let timerSalahKata;

            const savedRate =
                parseFloat(localStorage.getItem("speechRate")) || 1.1;

            if (SpeechRec) {
                rec = new SpeechRec();
                rec.lang = "id-ID";
                rec.continuous = true;
                rec.interimResults = true;
            }

            let waveInterval;
            function setWave(active) {
                if (active) {
                    if (waveInterval) clearInterval(waveInterval);
                    waveInterval = setInterval(() => {
                        waveBars.forEach((bar) => {
                            const h = Math.floor(Math.random() * 16) + 4;
                            bar.style.height = `${h}px`;
                        });
                    }, 100);
                } else {
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

            function mulaiMendengar() {
                if (!rec || isRedirecting || isSpeaking || isRecActive) return;
                try {
                    rec.start();
                    isRecActive = true;
                } catch (e) {}
            }

            // Fitur Interupsi Manual
            function hentikanSuaraBicara() {
                if (isSpeaking && !isRedirecting) {
                    synth.cancel();
                    isSpeaking = false;
                    statusText.innerText = "MENDENGARKAN";
                    setWave(false);
                    mulaiMendengar(); // Langsung nyala saat di-skip
                }
            }

            function bicara(teks, callback = null) {
                if (isRedirecting) return;

                isSpeaking = true;
                resetMicSession(); // Matikan mic saat bot ngomong
                synth.cancel();

                setTimeout(() => {
                    const utter = new SpeechSynthesisUtterance(teks);
                    utter.lang = "id-ID";
                    utter.rate = savedRate;

                    utter.onstart = () => {
                        if (statusText) {
                            statusText.innerText = "SISTEM BERBICARA";
                            statusText.classList.replace(
                                "text-green-600",
                                "text-blue-600",
                            );
                        }
                        setWave(true);
                    };

                    // KUNCI PERBAIKAN: Langsung menyalakan mic saat suara bot habis
                    utter.onend = () => {
                        isSpeaking = false; // Set flag false INSTAN
                        setWave(false);

                        if (!isRedirecting && statusText) {
                            statusText.innerText = "MENDENGARKAN";
                            statusText.classList.replace(
                                "text-blue-600",
                                "text-green-600",
                            );

                            // Jeda 50ms saja untuk mencegah mic menangkap sisa gema (echo) speaker
                            setTimeout(() => {
                                mulaiMendengar();
                            }, 50);
                        }

                        if (callback) callback();
                    };

                    utter.onerror = () => {
                        isSpeaking = false;
                        setWave(false);
                        if (!isRedirecting) mulaiMendengar();
                        if (callback) callback();
                    };

                    synth.speak(utter);
                }, 10);
            }

            if (rec) {
                rec.onresult = (event) => {
                    if (isRedirecting || isSpeaking) return;

                    let hasilTerakhir = event.results[
                        event.results.length - 1
                    ][0].transcript
                        .toLowerCase()
                        .trim();

                    const polaSatu = /\b(satu|1|sato|sat)\b/;
                    const polaDua = /\b(dua|2|duwa|doa|da)\b/;

                    const pilihSatu = hasilTerakhir.match(polaSatu);
                    const pilihDua = hasilTerakhir.match(polaDua);

                    if (pilihSatu && !pilihDua) {
                        clearTimeout(timerSalahKata);
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

                        // KUNCI PERBAIKAN PENGALIHAN:
                        // Berbicara singkat ("Oke") dan paksa pindah halaman dalam 400ms.
                        // Tidak menunggu event onend dari sintesis suara agar terasa super cepat.
                        const utter = new SpeechSynthesisUtterance("Oke");
                        utter.lang = "id-ID";
                        utter.rate = savedRate;
                        synth.speak(utter);

                        setTimeout(() => {
                            window.location.href = "{{ route('login.dosen') }}";
                        }, 400);
                    } else if (pilihDua && !pilihSatu) {
                        clearTimeout(timerSalahKata);
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

                        const utter = new SpeechSynthesisUtterance("Oke");
                        utter.lang = "id-ID";
                        utter.rate = savedRate;
                        synth.speak(utter);

                        setTimeout(() => {
                            window.location.href = "{{ route('setup.voice') }}";
                        }, 400);
                    } else if (hasilTerakhir.length > 2) {
                        clearTimeout(timerSalahKata);
                        timerSalahKata = setTimeout(() => {
                            if (!isRedirecting && !isSpeaking) {
                                // Potong kalimat peringatan agar lebih pendek
                                bicara("Satu, atau dua?");
                            }
                        }, 800);
                    }
                };

                rec.onend = () => {
                    isRecActive = false;
                    // Watchdog loop: pastikan mic selalu hidup ulang seketika
                    if (!isRedirecting && !isSpeaking) {
                        mulaiMendengar();
                    }
                };
            }

            setInterval(() => {
                if (!isRecActive && !isRedirecting && !isSpeaking) {
                    mulaiMendengar();
                }
            }, 1000); // Dipercepat pengecekannya tiap 1 detik

            overlay.addEventListener("click", () => {
                overlay.classList.add("opacity-0", "pointer-events-none");

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
                        // Diperpendek agar pengguna tidak bosan
                        bicara("Pilih. Satu Dosen. Dua Mahasiswa.");
                    }, 300);
                }, 700);
            });
        </script>
    </body>
</html>
