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
                instructionText.innerHTML =
                    "Sebutkan <strong class='text-blue-600'>Lanjut</strong> atau <strong class='text-red-600'>Ulang</strong>.";

                bicara(
                    "Kecepatan diatur ke " +
                        this.value +
                        ". Sebutkan lanjut, atau ulang.",
                    newRate,
                );
            });

            document.body.addEventListener("click", (e) => {
                if (
                    e.target.id === "speedSlider" ||
                    e.target.id === "btn-lanjut-manual"
                )
                    return;
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

            function bicara(teks, rateValue = null, callback = null) {
                if (isRedirecting) return;

                synth.cancel(); // Hentikan suara sebelumnya

                // Jeda 50ms untuk mencegah bug Chrome Web Speech API yang sering "nge-hang"
                setTimeout(() => {
                    const utter = new SpeechSynthesisUtterance(teks);
                    utter.lang = "id-ID";
                    utter.rate = rateValue !== null ? rateValue : 1.0;

                    utter.onstart = () => {
                        isSpeaking = true;
                        if (statusDesc) {
                            statusDesc.innerText = "BERBICARA & MENDENGARKAN";
                            statusDesc.classList.replace(
                                "text-slate-800",
                                "text-blue-600",
                            );
                        }
                        setWave(true);
                        mulaiMendengar();
                    };

                    utter.onend = () => {
                        isSpeaking = false;
                        setWave(false);
                        if (!isRedirecting && statusDesc) {
                            statusDesc.innerText = "MENDENGARKAN";
                            statusDesc.classList.replace(
                                "text-blue-600",
                                "text-green-600",
                            );
                        }
                        if (callback) callback();
                    };

                    utter.onerror = (e) => {
                        isSpeaking = false;
                        setWave(false);
                        mulaiMendengar();
                        if (callback) callback(); // Pastikan callback tetap jalan meskipun error
                    };

                    synth.speak(utter);
                }, 50);
            }

            if (rec) {
                rec.onresult = (event) => {
                    if (isRedirecting) return;

                    let hasil = "";
                    for (
                        let i = event.resultIndex;
                        i < event.results.length;
                        ++i
                    ) {
                        hasil += event.results[i][0].transcript;
                    }
                    hasil = hasil.toLowerCase().trim();

                    const omonganBot = [
                        "selamat datang",
                        "kecepatan diatur",
                        "sebutkan lanjut",
                        "sebutkan kembali",
                        "ini adalah contoh",
                        "untuk melanjutkan",
                        "mengatur ulang",
                        "pengaturan disimpan",
                    ];
                    if (omonganBot.some((kalimat) => hasil.includes(kalimat))) {
                        return;
                    }

                    prosesJawaban(hasil);
                };

                rec.onend = () => {
                    isRecActive = false;
                    if (!isRedirecting) {
                        mulaiMendengar();
                    }
                };
            }

            function prosesJawaban(hasil) {
                if (currentStep === 1) {
                    const kataKeAngka = {
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
                        seratus: 100,
                    };

                    let angkaDeteksi = hasil.match(/\d+/);
                    let nilaiAngka = angkaDeteksi
                        ? parseInt(angkaDeteksi[0])
                        : null;

                    if (!nilaiAngka) {
                        for (let kata in kataKeAngka) {
                            if (hasil.includes(kata)) {
                                nilaiAngka = kataKeAngka[kata];
                                break;
                            }
                        }
                    }

                    if (
                        nilaiAngka !== null &&
                        nilaiAngka >= 1 &&
                        nilaiAngka <= 100
                    ) {
                        slider.value = nilaiAngka;
                        display.innerText = nilaiAngka;
                        const newRate = hitungRate(nilaiAngka);

                        instructionText.innerHTML =
                            "Sebutkan <strong class='text-blue-600'>Lanjut</strong> atau <strong class='text-red-600'>Ulang</strong>.";
                        currentStep = 2;

                        const teksKonfirmasi =
                            "Kecepatan diatur ke " +
                            nilaiAngka +
                            ". Ini adalah contoh kecepatan suara Anda. Sebutkan LANJUT untuk melanjutkan, atau ULANG untuk mengatur ulang.";
                        bicara(teksKonfirmasi, newRate);
                    } else if (!isSpeaking && hasil.length > 2) {
                        bicara(
                            "Maaf, sebutkan angka dari satu sampai seratus.",
                            1.0,
                        );
                    }
                } else if (currentStep === 2) {
                    const polaLanjut = [
                        "lanjut",
                        "lanju",
                        "lanjot",
                        "lajut",
                        "lanjutkan",
                        "maju",
                        "terus",
                    ];
                    const polaUlang = [
                        "ulang",
                        "ulangi",
                        "pulang",
                        "urang",
                        "tulang",
                        "kembali",
                        "ulank",
                        "kurang",
                    ];

                    const pilihLanjut = polaLanjut.some((kata) =>
                        hasil.includes(kata),
                    );
                    const pilihUlang = polaUlang.some((kata) =>
                        hasil.includes(kata),
                    );

                    if (pilihLanjut && !pilihUlang) {
                        if (rec) rec.stop();

                        // Sistem akan ngomong dulu, baru pindah halaman
                        bicara(
                            "Pengaturan disimpan. Mengalihkan ke halaman login.",
                            hitungRate(parseInt(slider.value)),
                            () => {
                                simpanDanLanjut();
                            },
                        );

                        // FALLBACK DARURAT: Jika suara nge-hang, paksa pindah dalam 3.5 detik
                        setTimeout(() => {
                            simpanDanLanjut();
                        }, 3500);
                    } else if (pilihUlang && !pilihLanjut) {
                        currentStep = 1;
                        slider.value = 50;
                        display.innerText = "50";
                        instructionText.innerHTML =
                            "Sebutkan angka <strong class='text-blue-600'>1 sampai 100</strong> untuk mengatur kecepatan asisten suara.";

                        bicara(
                            "Silakan sebutkan kembali angka kecepatan dari satu sampai seratus.",
                            1.0,
                        );
                    } else if (!isSpeaking && hasil.length > 2) {
                        bicara(
                            "Maaf, perintah tidak dikenali. Sebutkan LANJUT, atau ULANG.",
                            hitungRate(parseInt(slider.value)),
                        );
                    }
                }
            }

            function simpanDanLanjut() {
                if (isRedirecting) return; // Mencegah fungsi jalan dua kali
                isRedirecting = true;

                synth.cancel(); // Matikan semua suara saat pindah

                const finalRate = hitungRate(parseInt(slider.value));
                localStorage.setItem("speechRate", finalRate);
                localStorage.setItem("speechSpeedDisplay", slider.value);

                // Pastikan route ini menuju halaman Login Mahasiswa
                window.location.href = "{{ route('login') }}";
            }

            window.addEventListener("load", () => {
                AOS.init({ once: true, easing: "ease-out-cubic" });
                mulaiMendengar();

                setTimeout(() => {
                    const introText =
                        "Selamat datang di LMS Inklusi UMMI. Silakan sebutkan angka dari satu sampai seratus untuk mengatur kecepatan suara.";
                    bicara(introText, 1.0);
                }, 1000);
            });
        </script>
    </body>
</html>
