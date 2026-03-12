<!DOCTYPE html>
<html lang="id" class="h-full">
    <head>
        <meta charset="UTF-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"
        />
        <title>Login | LMS Inklusi UMMI</title>

        <link
            href="https://unpkg.com/aos@2.3.1/dist/aos.css"
            rel="stylesheet"
        />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link
            href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap"
            rel="stylesheet"
        />

        <style>
            .wave-bar {
                transition: height 0.1s ease;
            }
        </style>
    </head>
    <body
        class="m-0 p-4 font-['Plus_Jakarta_Sans'] bg-slate-50 min-h-full flex items-center justify-center overflow-x-hidden relative"
    >
        <div
            class="w-full max-w-6xl bg-white rounded-[2rem] md:rounded-[3.5rem] shadow-2xl overflow-hidden border border-slate-100 grid grid-cols-1 lg:grid-cols-2 h-auto lg:h-[85vh] lg:max-h-[700px]"
        >
            <div
                data-aos="fade-right"
                data-aos-duration="1000"
                class="hidden lg:block bg-cover bg-center shadow-inner"
                style="background-image: url('{{
                    asset('images/login.png')
                }}');"
            ></div>

            <div
                class="p-6 md:p-10 lg:p-6 flex flex-col justify-center bg-white items-center relative"
            >
                <div class="w-full max-w-md lg:max-w-[400px] mx-auto">
                    <div
                        id="voice-header"
                        class="mb-10 opacity-0 transition-opacity duration-500 cursor-pointer"
                        title="Ketuk untuk skip suara"
                        onclick="hentikanSuaraBicara()"
                    >
                        <div class="flex items-center gap-6 mb-4">
                            <div
                                id="wave-container"
                                class="flex items-center gap-[2px] h-12"
                            >
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
                                <div
                                    class="wave-bar w-[3px] bg-blue-600 rounded-full h-1"
                                ></div>
                                <div
                                    class="wave-bar w-[3px] bg-blue-400 rounded-full h-1"
                                ></div>
                                <div
                                    class="wave-bar w-[3px] bg-blue-500 rounded-full h-1"
                                ></div>
                                <div
                                    class="wave-bar w-[3px] bg-blue-600 rounded-full h-1"
                                ></div>
                                <div
                                    class="wave-bar w-[3px] bg-blue-400 rounded-full h-1"
                                ></div>
                            </div>
                            <div class="flex flex-col">
                                <span
                                    class="text-[8px] font-black text-blue-600 uppercase tracking-[0.3em]"
                                    >Status Sistem</span
                                >
                                <span
                                    id="status-desc"
                                    class="text-base font-bold text-slate-800 leading-none mt-1 uppercase"
                                    >MEMULAI...</span
                                >
                            </div>
                        </div>
                        <hr class="border-slate-100 w-full" />
                    </div>

                    <div class="mb-8">
                        <h2
                            data-aos="fade-up"
                            data-aos-delay="100"
                            class="text-2xl sm:text-3xl font-black text-slate-900 tracking-tighter uppercase leading-none"
                        >
                            Masuk Akun
                        </h2>
                        <p
                            data-aos="fade-up"
                            data-aos-delay="200"
                            class="text-slate-400 text-[10px] font-bold mt-2 uppercase tracking-widest leading-loose"
                        >
                            Pusat Pembelajaran Disabilitas
                        </p>
                    </div>

                    <div class="space-y-4">
                        <div
                            data-aos="fade-up"
                            data-aos-delay="300"
                            id="field-nim"
                            class="p-4 rounded-2xl bg-slate-50 border-2 border-transparent transition-all duration-300"
                        >
                            <label
                                class="block text-[8px] font-black text-slate-400 uppercase tracking-widest mb-1"
                                >NIM Mahasiswa</label
                            >
                            <input
                                type="text"
                                id="input-nim"
                                readonly
                                class="w-full bg-transparent text-lg font-bold text-black outline-none"
                                placeholder="---"
                            />
                        </div>

                        <div
                            data-aos="fade-up"
                            data-aos-delay="400"
                            id="field-pass"
                            class="p-4 rounded-2xl bg-slate-50 border-2 border-transparent transition-all duration-300 opacity-20"
                        >
                            <label
                                class="block text-[8px] font-black text-slate-400 uppercase tracking-widest mb-1"
                                >Kata Sandi</label
                            >
                            <input
                                type="password"
                                id="input-pass"
                                readonly
                                autocomplete="off"
                                inputmode="none"
                                class="w-full bg-transparent text-lg font-bold text-black outline-none"
                            />
                        </div>

                        <div class="pt-4 space-y-3">
                            <button
                                data-aos="fade-up"
                                data-aos-delay="500"
                                id="btn-login"
                                onclick="validasiAkhir()"
                                class="w-full py-4 bg-blue-800 text-white rounded-xl font-black text-[10px] tracking-widest uppercase shadow-lg shadow-blue-100 transition-all hover:bg-blue-900 hover:-translate-y-0.5 hover:shadow-xl cursor-pointer"
                            >
                                Login Sekarang
                            </button>

                            <button
                                data-aos="fade-up"
                                data-aos-delay="600"
                                class="w-full py-4 bg-white border border-slate-200 rounded-xl flex items-center justify-center gap-3 transition-all hover:bg-slate-50 hover:border-slate-300 cursor-pointer"
                            >
                                <img
                                    src="{{ asset('images/gogle.svg') }}"
                                    class="w-4 h-4"
                                    alt="Google"
                                />
                                <span
                                    class="text-[9px] font-black text-slate-600 tracking-widest uppercase"
                                    >Login with Google</span
                                >
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

        <script>
            AOS.init({ once: true, easing: "ease-out-cubic" });

            const voiceHeader = document.getElementById("voice-header");
            const statusDesc = document.getElementById("status-desc");
            const waveBars = document.querySelectorAll(".wave-bar");
            const inputNim = document.getElementById("input-nim");
            const inputPass = document.getElementById("input-pass");

            const fNim = document.getElementById("field-nim");
            const fPass = document.getElementById("field-pass");
            const btnLogin = document.getElementById("btn-login");

            const synth = window.speechSynthesis;
            const SpeechRec =
                window.webkitSpeechRecognition || window.SpeechRecognition;
            let rec = null;

            let isRecActive = false;
            let isSpeaking = false;
            let isProcessing = false;
            let currentStep = 1;

            const savedRate =
                parseFloat(localStorage.getItem("speechRate")) || 1.1;

            if (SpeechRec) {
                rec = new SpeechRec();
                rec.lang = "id-ID";
                // Tunggu jeda diam baru di proses
                rec.continuous = false;
                rec.interimResults = false;
            }

            let waveInterval;
            function setWave(active) {
                if (active) {
                    if (waveInterval) clearInterval(waveInterval);
                    waveInterval = setInterval(() => {
                        waveBars.forEach((bar) => {
                            const h = Math.floor(Math.random() * 40) + 4;
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
                if (!rec || isProcessing || isSpeaking || isRecActive) return;
                try {
                    rec.start();
                    isRecActive = true;
                    statusDesc.innerText = "MENDENGARKAN";
                } catch (e) {
                    console.log("Mic diblokir:", e);
                }
            }

            function hentikanSuaraBicara() {
                if (isSpeaking && !isProcessing) {
                    synth.cancel();
                    isSpeaking = false;
                    statusDesc.innerText = "MENDENGARKAN";
                    setWave(false);
                    mulaiMendengar();
                }
            }

            function bicara(teks, callback = null) {
                if (isProcessing && currentStep !== 5) return;

                isSpeaking = true;
                resetMicSession();
                synth.cancel();

                setTimeout(() => {
                    const utter = new SpeechSynthesisUtterance(teks);
                    utter.lang = "id-ID";
                    utter.rate = savedRate;

                    utter.onstart = () => {
                        voiceHeader.classList.remove("opacity-0");
                        statusDesc.innerText = "SISTEM BERBICARA";
                        setWave(true);
                    };

                    utter.onend = () => {
                        isSpeaking = false;
                        setWave(false);

                        if (currentStep !== 5) {
                            statusDesc.innerText = "MENDENGARKAN";
                            setTimeout(() => {
                                mulaiMendengar();
                            }, 100);
                        }
                        if (callback) callback();
                    };

                    utter.onerror = () => {
                        isSpeaking = false;
                        setWave(false);
                        if (currentStep !== 5) mulaiMendengar();
                        if (callback) callback();
                    };

                    synth.speak(utter);
                }, 50);
            }

            function ekstraksiAngka(teks) {
                const map = {
                    nol: "0",
                    kosong: "0",
                    satu: "1",
                    dua: "2",
                    tiga: "3",
                    empat: "4",
                    lima: "5",
                    enam: "6",
                    tujuh: "7",
                    delapan: "8",
                    sembilan: "9",
                };
                const angkaLangsung = teks.match(/\d+/g);
                if (angkaLangsung) return angkaLangsung.join("");
                return teks
                    .toLowerCase()
                    .split(/\s+/)
                    .map((k) => map[k] || "")
                    .join("");
            }

            function fokusUI(step) {
                if (step === 1) {
                    fNim.classList.add(
                        "border-blue-600",
                        "bg-white",
                        "shadow-md",
                    );
                    fPass.classList.remove(
                        "border-blue-600",
                        "bg-white",
                        "shadow-md",
                    );
                    fPass.classList.add("opacity-20");
                } else if (step === 3) {
                    fNim.classList.remove(
                        "border-blue-600",
                        "bg-white",
                        "shadow-md",
                    );
                    fPass.classList.remove("opacity-20");
                    fPass.classList.add(
                        "border-blue-600",
                        "bg-white",
                        "shadow-md",
                    );
                } else if (step === 5) {
                    btnLogin.classList.add(
                        "ring-4",
                        "ring-blue-400",
                        "scale-105",
                    );
                }
            }

            if (rec) {
                rec.onresult = (event) => {
                    if (isProcessing || isSpeaking) return;

                    let teksUtuh = event.results[0][0].transcript
                        .toLowerCase()
                        .trim();

                    const polaBenar = /\b(benar|ya|iya|lanjut|oke|betul)\b/;
                    const polaSalah = /\b(salah|ulang|ulangi|ganti|bukan)\b/;

                    if (currentStep === 1) {
                        let angkaDeteksi = ekstraksiAngka(teksUtuh);

                        if (angkaDeteksi.length > 0) {
                            inputNim.value = angkaDeteksi;
                            currentStep = 2;
                            resetMicSession();

                            const ejaanNIM = inputNim.value.split("").join(" ");
                            bicara(ejaanNIM + ". Benar, atau salah?");
                        } else {
                            resetMicSession();
                            bicara("Angka tidak terdengar. Ulangi sebut NIM.");
                        }
                    } else if (currentStep === 2) {
                        if (teksUtuh.match(polaBenar)) {
                            currentStep = 3;
                            resetMicSession();
                            fokusUI(3);
                            bicara("Kata sandi?");
                        } else if (teksUtuh.match(polaSalah)) {
                            currentStep = 1;
                            inputNim.value = "";
                            resetMicSession();
                            fokusUI(1);
                            bicara("Sebut ulang NIM.");
                        } else {
                            resetMicSession();
                            bicara("Mohon sebut benar, atau salah.");
                        }
                    } else if (currentStep === 3) {
                        let rawPass = teksUtuh.replace(/\s+/g, "");
                        let numPass = ekstraksiAngka(teksUtuh);
                        let finalPass = numPass.length > 0 ? numPass : rawPass;

                        if (finalPass.length > 0) {
                            inputPass.value = finalPass;
                            currentStep = 4;
                            resetMicSession();

                            const ejaanSandi = inputPass.value
                                .split("")
                                .join(" ");
                            bicara(ejaanSandi + ". Benar, atau salah?");
                        } else {
                            resetMicSession();
                            bicara(
                                "Sandi tidak terdengar. Ulangi sebut sandi.",
                            );
                        }
                    } else if (currentStep === 4) {
                        if (teksUtuh.match(polaBenar)) {
                            resetMicSession();
                            statusDesc.innerText = "MEMPROSES...";
                            fokusUI(5);
                            bicara(
                                "Sandi dikonfirmasi. Memeriksa data...",
                                () => {
                                    validasiAkhir();
                                },
                            );
                        } else if (teksUtuh.match(polaSalah)) {
                            currentStep = 3;
                            inputPass.value = "";
                            resetMicSession();
                            bicara("Sebut ulang sandi.");
                        } else {
                            resetMicSession();
                            bicara("Mohon sebut benar, atau salah.");
                        }
                    }
                };

                rec.onend = () => {
                    isRecActive = false;
                    if (!isProcessing && !isSpeaking) {
                        setTimeout(mulaiMendengar, 150);
                    }
                };
            }

            function validasiAkhir() {
                if (isProcessing && currentStep === 5) return;
                isProcessing = true;
                currentStep = 5;
                resetMicSession();
                setWave(false);

                const nim = inputNim.value;
                const pass = inputPass.value;

                if (!nim || !pass) {
                    isProcessing = false;
                    currentStep = 1;
                    fokusUI(1);
                    btnLogin.classList.remove(
                        "ring-4",
                        "ring-blue-400",
                        "scale-105",
                    );
                    bicara("Data kosong. Sebutkan NIM.");
                    return;
                }

                fetch("{{ route('login.mahasiswa.post') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                    },
                    body: JSON.stringify({ nim: nim, password: pass }),
                })
                    .then(async (res) => {
                        let data = {};
                        try {
                            data = await res.json();
                        } catch (e) {}

                        if (res.ok && data.success) {
                            bicara(
                                "Kata sandi benar. Login berhasil. Mengalihkan ke dasbor.",
                                () => {
                                    window.location.href = data.redirect;
                                },
                            );
                        } else {
                            isProcessing = false;
                            currentStep = 3;
                            inputPass.value = "";

                            bicara(
                                data.message ||
                                    "Sandi salah. Silakan sebut ulang sandi.",
                                () => {
                                    fokusUI(3);
                                    btnLogin.classList.remove(
                                        "ring-4",
                                        "ring-blue-400",
                                        "scale-105",
                                    );
                                    mulaiMendengar();
                                },
                            );
                        }
                    })
                    .catch(() => {
                        isProcessing = false;
                        currentStep = 1;
                        btnLogin.classList.remove(
                            "ring-4",
                            "ring-blue-400",
                            "scale-105",
                        );
                        bicara("Error jaringan. Sebut ulang NIM.", () => {
                            fokusUI(1);
                            mulaiMendengar();
                        });
                    });
            }

            setInterval(() => {
                if (!isRecActive && !isProcessing && !isSpeaking) {
                    mulaiMendengar();
                }
            }, 1000);

            // LANGSUNG JALAN SAAT HALAMAN SELESAI DIMUAT (TANPA KETUK)
            window.onload = () => {
                setTimeout(() => {
                    fokusUI(1);
                    mulaiMendengar();
                    bicara("Sebutkan NIM anda.");
                }, 800);
            };
        </script>
    </body>
</html>
