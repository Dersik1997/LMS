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
    </head>
    <body
        class="m-0 p-4 font-['Plus_Jakarta_Sans'] bg-slate-50 min-h-full flex items-center justify-center overflow-x-hidden"
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
                        title="Ketuk untuk memotong suara sistem"
                    >
                        <div class="flex items-center gap-6 mb-4">
                            <div
                                id="wave-container"
                                class="flex items-center gap-[2px] h-12"
                            >
                                <div
                                    class="wave-bar w-[3px] bg-blue-500 rounded-full transition-all duration-150 h-1"
                                ></div>
                                <div
                                    class="wave-bar w-[3px] bg-blue-400 rounded-full transition-all duration-150 h-1"
                                ></div>
                                <div
                                    class="wave-bar w-[3px] bg-blue-600 rounded-full transition-all duration-150 h-1"
                                ></div>
                                <div
                                    class="wave-bar w-[3px] bg-blue-400 rounded-full transition-all duration-150 h-1"
                                ></div>
                                <div
                                    class="wave-bar w-[3px] bg-blue-500 rounded-full transition-all duration-150 h-1"
                                ></div>
                                <div
                                    class="wave-bar w-[3px] bg-blue-600 rounded-full transition-all duration-150 h-1"
                                ></div>
                                <div
                                    class="wave-bar w-[3px] bg-blue-400 rounded-full transition-all duration-150 h-1"
                                ></div>
                                <div
                                    class="wave-bar w-[3px] bg-blue-500 rounded-full transition-all duration-150 h-1"
                                ></div>
                                <div
                                    class="wave-bar w-[3px] bg-blue-600 rounded-full transition-all duration-150 h-1"
                                ></div>
                                <div
                                    class="wave-bar w-[3px] bg-blue-400 rounded-full transition-all duration-150 h-1"
                                ></div>
                            </div>
                            <div class="flex flex-col">
                                <span
                                    class="text-[8px] font-black text-blue-600 uppercase tracking-[0.3em]"
                                >
                                    Status Sistem
                                </span>
                                <span
                                    id="status-desc"
                                    class="text-base font-bold text-slate-800 leading-none mt-1 uppercase"
                                >
                                    Siap
                                </span>
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
                                placeholder="---"
                            />
                        </div>

                        <div class="pt-4 space-y-3">
                            <button
                                data-aos="fade-up"
                                data-aos-delay="500"
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
        </script>

        <script>
            const voiceHeader = document.getElementById("voice-header");
            const statusDesc = document.getElementById("status-desc");
            const waveBars = document.querySelectorAll(".wave-bar");
            const inputNim = document.getElementById("input-nim");
            const inputPass = document.getElementById("input-pass");
            const fieldNim = document.getElementById("field-nim");
            const fieldPass = document.getElementById("field-pass");

            const synth = window.speechSynthesis;
            const SpeechRec =
                window.webkitSpeechRecognition || window.SpeechRecognition;
            let rec = null;
            let isRecActive = false;
            let isRedirecting = false;
            let isSpeaking = false;
            let timerSalahKata; // Timer untuk mengoreksi omongan tak jelas

            let currentStep = "ASK_NIM";
            let typingTimer;
            const waktuTungguJeda = 1200; // Sangat cepat menangkap angka

            if (SpeechRec) {
                rec = new SpeechRec();
                rec.lang = "id-ID";
                rec.continuous = true;
                rec.interimResults = true; // Langsung tangkap agar gesit
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

            // Fitur sentuh layar untuk skip instruksi bot
            document.body.addEventListener("click", (e) => {
                if (
                    e.target.tagName === "INPUT" ||
                    e.target.tagName === "BUTTON"
                )
                    return;
                if (isSpeaking && !isRedirecting) {
                    synth.cancel();
                    setWave(false);
                    isSpeaking = false;
                }
                if (!isRecActive && !isRedirecting) mulaiMendengar();
            });

            function mulaiMendengar() {
                if (!rec || isRedirecting || isSpeaking || isRecActive) return;
                try {
                    rec.start();
                    isRecActive = true;
                } catch (e) {}
            }

            function bicara(teks, callback = null) {
                if (isRedirecting) return;

                // MURNI WALKIE-TALKIE: Matikan mic 100% saat bot bicara
                isSpeaking = true;
                resetMicSession();
                synth.resume();
                synth.cancel();

                setTimeout(() => {
                    const utter = new SpeechSynthesisUtterance(teks);
                    utter.lang = "id-ID";
                    const savedRate = localStorage.getItem("speechRate");
                    utter.rate = savedRate ? parseFloat(savedRate) : 1.0;

                    utter.onstart = () => {
                        voiceHeader.classList.remove("opacity-0");
                        if (statusDesc) {
                            statusDesc.innerText = "SISTEM BERBICARA";
                            statusDesc.classList.replace(
                                "text-slate-800",
                                "text-blue-600",
                            );
                            statusDesc.classList.replace(
                                "text-green-600",
                                "text-blue-600",
                            );
                        }
                        setWave(true);
                    };

                    utter.onend = () => {
                        setWave(false);
                        if (!isRedirecting && statusDesc) {
                            statusDesc.innerText = "MENDENGARKAN";
                            statusDesc.classList.replace(
                                "text-blue-600",
                                "text-green-600",
                            );
                        }

                        // Jeda 400ms memastikan gema speaker hilang sebelum telinga dibuka
                        setTimeout(() => {
                            isSpeaking = false;
                            mulaiMendengar();
                            if (callback) callback();
                        }, 400);
                    };

                    utter.onerror = () => {
                        isSpeaking = false;
                        setWave(false);
                        mulaiMendengar();
                        if (callback) callback();
                    };

                    synth.speak(utter);
                }, 50);
            }

            if (rec) {
                rec.onresult = (event) => {
                    // PENGAMAN MUTLAK: Mode tuli saat bicara (Mustahil merespons diri sendiri)
                    if (isRedirecting || isSpeaking) return;

                    let hasil = "";
                    for (
                        let i = event.resultIndex;
                        i < event.results.length;
                        ++i
                    ) {
                        hasil += event.results[i][0].transcript + " ";
                    }
                    let bersih = hasil.toLowerCase().trim();

                    // ==========================================
                    // PERINTAH MUTLAK (REGEX)
                    // ==========================================
                    const pilihBenar = bersih.match(
                        /\b(benar|bener|ya|betul|sesuai|lanjut|oke)\b/,
                    );
                    const pilihSalah = bersih.match(
                        /\b(salah|bukan|ulang|ulangi|ganti|hapus)\b/,
                    );
                    const angkaMasuk = kataKeAngka(bersih);

                    if (currentStep === "ASK_NIM") {
                        if (angkaMasuk.length > 0) {
                            inputNim.value = angkaMasuk;
                            clearTimeout(typingTimer);
                            clearTimeout(timerSalahKata);

                            typingTimer = setTimeout(() => {
                                if (currentStep !== "ASK_NIM") return;
                                currentStep = "CONFIRM_NIM";
                                resetMicSession();
                                const spokenNim = inputNim.value
                                    .split("")
                                    .join(" ");

                                // Micro-Prompt
                                bicara(`NIM, ${spokenNim}. Benar, atau Salah?`);
                            }, waktuTungguJeda);
                        } else if (bersih.length > 2) {
                            clearTimeout(timerSalahKata);
                            timerSalahKata = setTimeout(() => {
                                if (!isRedirecting && !isSpeaking)
                                    bicara("Sebutkan NIM.");
                            }, 1200);
                        }
                    } else if (currentStep === "CONFIRM_NIM") {
                        if (pilihBenar && !pilihSalah) {
                            clearTimeout(typingTimer);
                            clearTimeout(timerSalahKata);
                            flowPassword();
                        } else if (pilihSalah && !pilihBenar) {
                            clearTimeout(typingTimer);
                            clearTimeout(timerSalahKata);
                            inputNim.value = "";
                            currentStep = "ASK_NIM";

                            // Micro-Prompt
                            bicara("Sebutkan ulang NIM.");
                        } else if (
                            angkaMasuk.length > 0 &&
                            angkaMasuk !== inputNim.value
                        ) {
                            // User langsung koreksi dengan nyebut angka baru saat bot diam
                            inputNim.value = angkaMasuk;
                            currentStep = "ASK_NIM";
                            clearTimeout(typingTimer);
                            clearTimeout(timerSalahKata);

                            typingTimer = setTimeout(() => {
                                if (currentStep !== "ASK_NIM") return;
                                currentStep = "CONFIRM_NIM";
                                resetMicSession();
                                const spokenNim = inputNim.value
                                    .split("")
                                    .join(" ");
                                bicara(`NIM, ${spokenNim}. Benar, atau Salah?`);
                            }, waktuTungguJeda);
                        } else if (bersih.length > 2) {
                            clearTimeout(timerSalahKata);
                            timerSalahKata = setTimeout(() => {
                                if (!isRedirecting && !isSpeaking)
                                    bicara("Benar, atau Salah?");
                            }, 1200);
                        }
                    } else if (currentStep === "ASK_PASS") {
                        if (angkaMasuk.length > 0) {
                            inputPass.value = angkaMasuk;
                            clearTimeout(typingTimer);
                            clearTimeout(timerSalahKata);

                            typingTimer = setTimeout(() => {
                                if (currentStep !== "ASK_PASS") return;
                                currentStep = "CONFIRM_PASS";
                                resetMicSession();
                                const passSpoken = inputPass.value
                                    .split("")
                                    .join(" ");

                                // Micro-Prompt
                                bicara(
                                    `Sandi, ${passSpoken}. Benar, atau Salah?`,
                                );
                            }, waktuTungguJeda);
                        } else if (bersih.length > 2) {
                            clearTimeout(timerSalahKata);
                            timerSalahKata = setTimeout(() => {
                                if (!isRedirecting && !isSpeaking)
                                    bicara("Sebutkan Sandi.");
                            }, 1200);
                        }
                    } else if (currentStep === "CONFIRM_PASS") {
                        if (pilihBenar && !pilihSalah) {
                            clearTimeout(typingTimer);
                            clearTimeout(timerSalahKata);
                            validasiAkhir();
                        } else if (pilihSalah && !pilihBenar) {
                            clearTimeout(typingTimer);
                            clearTimeout(timerSalahKata);
                            inputPass.value = "";
                            currentStep = "ASK_PASS";

                            // Micro-Prompt
                            bicara("Sebutkan ulang sandi.");
                        } else if (
                            angkaMasuk.length > 0 &&
                            angkaMasuk !== inputPass.value
                        ) {
                            inputPass.value = angkaMasuk;
                            currentStep = "ASK_PASS";
                            clearTimeout(typingTimer);
                            clearTimeout(timerSalahKata);

                            typingTimer = setTimeout(() => {
                                if (currentStep !== "ASK_PASS") return;
                                currentStep = "CONFIRM_PASS";
                                resetMicSession();
                                const passSpoken = inputPass.value
                                    .split("")
                                    .join(" ");
                                bicara(
                                    `Sandi, ${passSpoken}. Benar, atau Salah?`,
                                );
                            }, waktuTungguJeda);
                        } else if (bersih.length > 2) {
                            clearTimeout(timerSalahKata);
                            timerSalahKata = setTimeout(() => {
                                if (!isRedirecting && !isSpeaking)
                                    bicara("Benar, atau Salah?");
                            }, 1200);
                        }
                    }
                };

                rec.onend = () => {
                    isRecActive = false;
                    // Terus bangunkan mic jika tidak sedang loading atau bicara
                    if (!isRedirecting && !isSpeaking) {
                        setTimeout(mulaiMendengar, 300);
                    }
                };
            }

            function startFlow() {
                currentStep = "ASK_NIM";
                fieldNim.classList.add(
                    "border-blue-600",
                    "bg-white",
                    "shadow-md",
                );

                // Micro-Prompt
                bicara("Login Mahasiswa. Sebutkan NIM.");
            }

            function flowPassword() {
                currentStep = "ASK_PASS";
                fieldNim.classList.remove(
                    "border-blue-600",
                    "bg-white",
                    "shadow-md",
                );
                fieldPass.classList.remove("opacity-20");
                fieldPass.classList.add(
                    "border-blue-600",
                    "bg-white",
                    "shadow-md",
                );

                // Micro-Prompt
                bicara("Sebutkan sandi.");
            }

            function validasiAkhir() {
                if (isRedirecting) return;
                currentStep = "PROCESSING";
                const nim = inputNim.value;
                const pass = inputPass.value;

                resetMicSession();

                // Micro-Prompt
                bicara("Memeriksa data.", () => {
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
                                isRedirecting = true;
                                // Micro-Prompt
                                bicara("Berhasil. Membuka dasbor.", () => {
                                    window.location.href = data.redirect;
                                });
                                setTimeout(() => {
                                    window.location.href = data.redirect;
                                }, 4000);
                            } else {
                                currentStep = "ASK_PASS";
                                inputPass.value = "";
                                // Micro-Prompt
                                bicara(
                                    data.message ||
                                        "Gagal. Sebutkan ulang sandi.",
                                );
                            }
                        })
                        .catch(() => {
                            currentStep = "ASK_PASS";
                            // Micro-Prompt
                            bicara("Error. Sebutkan ulang sandi.");
                        });
                });
            }

            function kataKeAngka(teks) {
                if (!teks) return "";
                const map = {
                    nol: "0",
                    kosong: "0",
                    o: "0",
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

                let hasil = teks.toLowerCase();
                let tokens = hasil.split(/\s+/);
                let finalNum = "";

                for (let token of tokens) {
                    if (/\d/.test(token)) {
                        finalNum += token.replace(/\D/g, "");
                    } else if (map[token]) {
                        finalNum += map[token];
                    }
                }
                return finalNum;
            }

            // PENJAGA MALAM (Watchdog): Menghidupkan mic paksa jika browser ketiduran
            setInterval(() => {
                if (!isRecActive && !isRedirecting && !isSpeaking) {
                    mulaiMendengar();
                }
            }, 1500);

            window.addEventListener("load", () => {
                setTimeout(() => {
                    mulaiMendengar();
                    startFlow();
                }, 800);
            });
        </script>
    </body>
</html>
