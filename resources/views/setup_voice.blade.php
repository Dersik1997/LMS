<!DOCTYPE html>
<html lang="id" class="h-full">
    <head>
        <meta charset="UTF-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"
        />
        <title>Pengaturan Aksesibilitas | LMS Inklusi UMMI</title>

        <link
            href="https://unpkg.com/aos@2.3.1/dist/aos.css"
            rel="stylesheet"
        />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link
            href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&display=swap"
            rel="stylesheet"
        />

        <link rel="prefetch" href="{{ route('login') }}" />

        <style>
            input[type="range"]::-webkit-slider-thumb {
                -webkit-appearance: none;
                appearance: none;
                width: 24px;
                height: 24px;
                border-radius: 50%;
                background: #2563eb;
                cursor: pointer;
                box-shadow: 0 0 10px rgba(37, 99, 235, 0.5);
                transition: transform 0.2s;
            }
            @media (min-width: 640px) {
                input[type="range"]::-webkit-slider-thumb {
                    width: 28px;
                    height: 28px;
                }
            }
            input[type="range"]::-webkit-slider-thumb:hover {
                transform: scale(1.15);
            }
            .wave-bar {
                transition: height 0.1s ease;
            }
        </style>
    </head>
    <body
        class="font-['Plus_Jakarta_Sans'] bg-[#f8fafc] min-h-screen flex flex-col items-center justify-center p-4 sm:p-6 text-slate-800 relative overflow-hidden"
    >
        <div
            class="absolute top-[-10%] left-[-10%] w-64 sm:w-96 h-64 sm:h-96 bg-blue-200 rounded-full mix-blend-multiply filter blur-3xl opacity-50 animate-blob z-0"
        ></div>
        <div
            class="absolute bottom-[-10%] right-[-10%] w-64 sm:w-96 h-64 sm:h-96 bg-purple-200 rounded-full mix-blend-multiply filter blur-3xl opacity-50 animate-blob animation-delay-2000 z-0"
        ></div>

        <div
            id="main-card"
            class="flex w-full max-w-lg bg-white/90 backdrop-blur-2xl rounded-[2rem] sm:rounded-[2.5rem] shadow-2xl border border-white/50 p-6 sm:p-10 md:p-12 relative z-10 flex-col items-center text-center mx-auto"
        >
            <div
                data-aos="fade-down"
                data-aos-duration="800"
                id="voice-header"
                class="w-full mb-6 sm:mb-8 cursor-pointer"
                title="Ketuk area ini untuk memotong suara sistem"
                onclick="hentikanSuaraBicara()"
            >
                <div
                    class="flex flex-row items-center justify-center gap-4 sm:gap-6 mb-4"
                >
                    <div
                        id="wave-container"
                        class="flex items-center gap-[2px] h-10 sm:h-12"
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
                        <div
                            class="wave-bar w-[2px] sm:w-[3px] bg-blue-600 rounded-full h-1"
                        ></div>
                        <div
                            class="wave-bar w-[2px] sm:w-[3px] bg-blue-400 rounded-full h-1"
                        ></div>
                        <div
                            class="wave-bar w-[2px] sm:w-[3px] bg-blue-500 rounded-full h-1"
                        ></div>
                        <div
                            class="wave-bar w-[2px] sm:w-[3px] bg-blue-600 rounded-full h-1"
                        ></div>
                        <div
                            class="wave-bar w-[2px] sm:w-[3px] bg-blue-400 rounded-full h-1"
                        ></div>
                    </div>
                    <div class="flex flex-col text-left">
                        <span
                            class="text-[8px] sm:text-[10px] font-black text-blue-600 uppercase tracking-[0.2em] sm:tracking-[0.3em]"
                        >
                            Status Sistem
                        </span>
                        <span
                            id="status-desc"
                            class="text-sm sm:text-base font-bold text-slate-800 leading-none mt-1 uppercase"
                        >
                            MENYIAPKAN...
                        </span>
                    </div>
                </div>
                <hr class="border-slate-100 w-full" />
            </div>

            <h1
                data-aos="fade-up"
                data-aos-delay="300"
                class="text-2xl sm:text-3xl font-black text-slate-900 tracking-tight mb-2"
            >
                Atur Suara
            </h1>
            <p
                data-aos="fade-up"
                data-aos-delay="400"
                id="instruction-text"
                class="text-slate-500 font-medium mb-6 sm:mb-8 text-xs sm:text-sm leading-relaxed px-2"
            >
                Sebutkan atau geser angka
                <strong class="text-blue-600">1 sampai 100</strong> untuk
                mengatur kecepatan.
            </p>

            <div
                data-aos="fade-up"
                data-aos-delay="500"
                class="bg-slate-50 p-5 sm:p-6 rounded-2xl sm:rounded-3xl border border-slate-200 mb-6 sm:mb-8 w-full text-left"
            >
                <div class="flex justify-between items-end mb-4">
                    <label
                        class="text-xs sm:text-sm font-bold text-slate-700 uppercase tracking-widest"
                    >
                        Tingkat Kecepatan
                    </label>
                    <span
                        id="speedValue"
                        class="text-2xl sm:text-3xl font-black text-blue-600"
                        >50</span
                    >
                </div>

                <div class="relative w-full py-2">
                    <input
                        type="range"
                        id="speedSlider"
                        min="1"
                        max="100"
                        value="50"
                        class="w-full h-2 sm:h-3 bg-slate-200 rounded-lg appearance-none outline-none cursor-pointer focus:ring-2 focus:ring-blue-200 relative z-20"
                    />
                </div>

                <div
                    class="flex justify-between mt-2 sm:mt-3 text-[9px] sm:text-[10px] font-bold text-slate-400 uppercase tracking-widest"
                >
                    <span>1 (Lambat)</span>
                    <span>100 (Cepat)</span>
                </div>
            </div>

            <button
                data-aos="zoom-in"
                data-aos-delay="600"
                id="btn-lanjut-manual"
                onclick="simpanDanLanjut()"
                class="w-full py-3 sm:py-4 bg-blue-600 text-white rounded-xl sm:rounded-2xl font-black text-xs sm:text-sm uppercase tracking-widest shadow-lg shadow-blue-200 hover:bg-blue-700 hover:shadow-xl hover:-translate-y-0.5 transition-all cursor-pointer relative z-20"
            >
                Lanjut Manual
            </button>
        </div>

        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

        <script>
            const slider = document.getElementById("speedSlider");
            const display = document.getElementById("speedValue");
            const instructionText = document.getElementById("instruction-text");
            const statusDesc = document.getElementById("status-desc");
            const waveBars = document.querySelectorAll(".wave-bar");

            const synth = window.speechSynthesis;
            const SpeechRec =
                window.webkitSpeechRecognition || window.SpeechRecognition;
            let rec = null;
            let isRecActive = false;
            let currentStep = 1;
            let isRedirecting = false;
            let isSpeaking = false;
            let timerSalahKata;

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
                            const h = Math.floor(Math.random() * 30) + 4;
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

            function hitungRate(val) {
                return 0.5 + (val - 1) * (1.5 / 99);
            }

            slider.addEventListener("input", function () {
                display.innerText = this.value;
            });

            slider.addEventListener("change", function () {
                if (isRedirecting) return;
                const newRate = hitungRate(parseInt(this.value));
                currentStep = 2;
                resetMicSession();

                instructionText.innerHTML =
                    "Sebutkan <strong class='text-blue-600'>Lanjut</strong> atau <strong class='text-red-600'>Ulang</strong>.";

                // Bot hanya mengonfirmasi angka, potong kata-kata basi
                bicara(this.value + ". Lanjut, atau ulang?", newRate);
            });

            // Fitur Interupsi Suara Manual
            function hentikanSuaraBicara() {
                if (isSpeaking && !isRedirecting) {
                    synth.cancel();
                    isSpeaking = false;
                    statusDesc.innerText = "MENDENGARKAN";
                    setWave(false);
                    mulaiMendengar();
                }
            }

            document.body.addEventListener("click", (e) => {
                if (
                    e.target.id === "speedSlider" ||
                    e.target.id === "btn-lanjut-manual" ||
                    e.target.closest("#voice-header")
                )
                    return;
                hentikanSuaraBicara(); // Jika klik area kosong, skip suara bot
            });

            function mulaiMendengar() {
                if (!rec || isRedirecting || isSpeaking || isRecActive) return;
                try {
                    rec.start();
                    isRecActive = true;
                } catch (e) {}
            }

            function bicara(teks, rateValue = null, callback = null) {
                if (isRedirecting) return;

                isSpeaking = true;
                resetMicSession();
                synth.cancel();

                setTimeout(() => {
                    const utter = new SpeechSynthesisUtterance(teks);
                    utter.lang = "id-ID";
                    utter.rate = rateValue !== null ? rateValue : 1.0;

                    utter.onstart = () => {
                        if (statusDesc) {
                            statusDesc.innerText = "SISTEM BERBICARA";
                            statusDesc.classList.replace(
                                "text-green-600",
                                "text-blue-600",
                            );
                        }
                        setWave(true);
                    };

                    // MIC LANGSUNG NYALA TANPA JEDA LAMA
                    utter.onend = () => {
                        isSpeaking = false;
                        setWave(false);

                        if (!isRedirecting && statusDesc) {
                            statusDesc.innerText = "MENDENGARKAN";
                            statusDesc.classList.replace(
                                "text-blue-600",
                                "text-green-600",
                            );

                            // Jeda super singkat mencegah echo
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

                    // Mengambil hanya hasil ucapan terbaru (instan)
                    let hasilTerakhir = event.results[
                        event.results.length - 1
                    ][0].transcript
                        .toLowerCase()
                        .trim();

                    prosesJawaban(hasilTerakhir);
                };

                rec.onend = () => {
                    isRecActive = false;
                    // Watchdog kilat
                    if (!isRedirecting && !isSpeaking) {
                        mulaiMendengar();
                    }
                };
            }

            function prosesJawaban(hasil) {
                if (currentStep === 1) {
                    let nilaiAngka = ubahTeksKeAngka(hasil);

                    if (
                        nilaiAngka !== null &&
                        nilaiAngka >= 1 &&
                        nilaiAngka <= 100
                    ) {
                        clearTimeout(timerSalahKata);
                        slider.value = nilaiAngka;
                        display.innerText = nilaiAngka;

                        currentStep = 2;
                        resetMicSession();

                        const newRate = hitungRate(nilaiAngka);
                        instructionText.innerHTML =
                            "Sebutkan <strong class='text-blue-600'>Lanjut</strong> atau <strong class='text-red-600'>Ulang</strong>.";

                        // Dipotong agar lebih cepat
                        bicara(nilaiAngka + ". Lanjut, atau ulang?", newRate);
                    } else if (hasil.length > 2) {
                        clearTimeout(timerSalahKata);
                        timerSalahKata = setTimeout(() => {
                            if (!isRedirecting && !isSpeaking) {
                                bicara("Sebut angka satu sampai seratus.", 1.0);
                            }
                        }, 1000); // Lebih reaktif
                    }
                } else if (currentStep === 2) {
                    // Regex dioptimalkan untuk mis-pronunciation umum
                    const polaLanjut =
                        /\b(lanjut|lanju|lanjot|lajut|lanjutkan|maju|terus|oke|ya|iya)\b/;
                    const polaUlang =
                        /\b(ulang|ulangi|pulang|urang|tulang|kembali|ulank|kurang|ganti|salah)\b/;

                    const pilihLanjut = hasil.match(polaLanjut);
                    const pilihUlang = hasil.match(polaUlang);

                    if (pilihLanjut && !pilihUlang) {
                        clearTimeout(timerSalahKata);
                        isRedirecting = true;
                        resetMicSession();

                        if (statusDesc) statusDesc.innerText = "MENGALIHKAN...";

                        // EKSEKUSI NAVIGASI KILAT
                        const utter = new SpeechSynthesisUtterance("Oke");
                        utter.lang = "id-ID";
                        utter.rate = hitungRate(parseInt(slider.value));
                        synth.speak(utter);

                        // Pindah dalam hitungan milidetik, tidak nunggu bot selesai ngomong panjang
                        setTimeout(() => {
                            simpanDanLanjut();
                        }, 400);
                    } else if (pilihUlang && !pilihLanjut) {
                        clearTimeout(timerSalahKata);
                        resetMicSession();
                        currentStep = 1;
                        slider.value = 50;
                        display.innerText = "50";
                        instructionText.innerHTML =
                            "Sebutkan angka <strong class='text-blue-600'>1 sampai 100</strong>.";

                        bicara("Ulangi. Sebut angka.", 1.0);
                    } else if (hasil.length > 2) {
                        clearTimeout(timerSalahKata);
                        timerSalahKata = setTimeout(() => {
                            if (!isRedirecting && !isSpeaking) {
                                bicara(
                                    "Lanjut, atau ulang?",
                                    hitungRate(parseInt(slider.value)),
                                );
                            }
                        }, 800);
                    }
                }
            }

            function ubahTeksKeAngka(teks) {
                let matchRegex = teks.match(/\d+/);
                if (matchRegex) return parseInt(matchRegex[0]);

                const kamusAngka = {
                    satu: 1,
                    dua: 2,
                    tiga: 3,
                    empat: 4,
                    lima: 5,
                    enam: 6,
                    tujuh: 7,
                    delapan: 8,
                    sembilan: 9,
                    sepuluh: 10,
                    sebelas: 11,
                    seratus: 100,
                };

                let kataKata = teks.split(/\s+/);
                let angkaKetemu = 0;
                let lagiNgitung = false;

                for (let kata of kataKata) {
                    if (kamusAngka[kata] !== undefined) {
                        lagiNgitung = true;
                        angkaKetemu += kamusAngka[kata];
                    } else if (kata === "belas" && lagiNgitung) {
                        angkaKetemu += 10;
                    } else if (kata === "puluh" && lagiNgitung) {
                        angkaKetemu *= 10;
                    } else if (lagiNgitung) {
                        break;
                    }
                }

                return lagiNgitung ? angkaKetemu : null;
            }

            function simpanDanLanjut() {
                if (!isRedirecting && event && event.type === "click")
                    isRedirecting = true; // Handle manual click

                synth.cancel();

                const finalRate = hitungRate(parseInt(slider.value));
                localStorage.setItem("speechRate", finalRate);
                localStorage.setItem("speechSpeedDisplay", slider.value);

                window.location.href = "{{ route('login') }}";
            }

            // Loop Watchdog 1 detik
            setInterval(() => {
                if (!isRecActive && !isRedirecting && !isSpeaking) {
                    mulaiMendengar();
                }
            }, 1000);

            window.addEventListener("load", () => {
                AOS.init({ once: true, easing: "ease-out-cubic" });
                mulaiMendengar();

                if (statusDesc) statusDesc.innerText = "MENDENGARKAN";

                setTimeout(() => {
                    // Kalimat awal dipersingkat agar to-the-point
                    bicara("Atur kecepatan. Sebut satu sampai seratus.", 1.0);
                }, 800);
            });
        </script>
    </body>
</html>
