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

            let currentStep = "ASK_NIM"; // Status pengisian form

            // Timer untuk mendeteksi kapan pengguna selesai bicara angka
            let typingTimer;
            const waktuTungguJeda = 2000; // 2 Detik menunggu sebelum deklarasi "Benar atau Ulang"

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
                            const h = Math.floor(Math.random() * 40) + 4;
                            bar.style.height = `${h}px`;
                        });
                    }, 100);
                } else {
                    clearInterval(waveInterval);
                    waveBars.forEach((bar) => (bar.style.height = "4px"));
                }
            }

            // Fitur Cut-Off Manual klik layar
            document.body.addEventListener("click", (e) => {
                if (
                    e.target.tagName === "INPUT" ||
                    e.target.tagName === "BUTTON"
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

            function bicara(teks, callback = null) {
                if (isRedirecting) return;
                synth.cancel();

                setTimeout(() => {
                    const utter = new SpeechSynthesisUtterance(teks);
                    utter.lang = "id-ID";
                    const savedRate = localStorage.getItem("speechRate");
                    utter.rate = savedRate ? parseFloat(savedRate) : 1.0;

                    utter.onstart = () => {
                        isSpeaking = true;
                        voiceHeader.classList.remove("opacity-0");
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
                        if (callback) callback();
                    };

                    synth.speak(utter);
                }, 50);
            }

            if (rec) {
                rec.onresult = (event) => {
                    if (isRedirecting) return;

                    let hasil = "";
                    // Iterasi dari 0 memastikan angka/huruf panjang terangkai penuh dari awal sampai akhir tanpa terpotong
                    for (let i = 0; i < event.results.length; ++i) {
                        hasil += event.results[i][0].transcript + " ";
                    }
                    hasil = hasil.toLowerCase().trim();

                    prosesJawaban(hasil);
                };

                rec.onend = () => {
                    isRecActive = false;
                    if (!isRedirecting) mulaiMendengar();
                };
            }

            function prosesJawaban(hasil) {
                if (currentStep === "ASK_NIM") {
                    const nimFix = hasil.replace(/[^0-9]/g, "");
                    if (nimFix.length > 0) {
                        synth.cancel(); // Matikan suara bot jika sedang ngoceh "Sebutkan NIM..."
                        inputNim.value = nimFix; // Input akan diketik secara real-time di layar

                        // Reset timer penunggu jeda bicara
                        clearTimeout(typingTimer);
                        typingTimer = setTimeout(() => {
                            if (rec) rec.abort(); // Reset mikrofon agar kalimat bot "Benar" tidak nyambung dengan angka sebelumnya
                            currentStep = "CONFIRM_NIM";
                            const spokenNim = inputNim.value
                                .split("")
                                .join(" ");
                            bicara(
                                `NIM anda adalah ${spokenNim}. Katakan Benar, atau Ulang.`,
                            );
                        }, waktuTungguJeda);
                    }
                } else if (currentStep === "CONFIRM_NIM") {
                    // Blokir Anti-Echo agar tidak memicu perintahnya sendiri
                    if (
                        hasil.includes("katakan benar") ||
                        hasil.includes("atau ulang")
                    )
                        return;

                    const pilihBenar =
                        hasil.includes("benar") ||
                        hasil.includes("ya") ||
                        hasil.includes("betul");
                    const pilihUlang =
                        hasil.includes("ulang") ||
                        hasil.includes("salah") ||
                        hasil.includes("bukan");

                    if (pilihBenar && !pilihUlang) {
                        clearTimeout(typingTimer);
                        synth.cancel();
                        if (rec) rec.abort();
                        flowPassword();
                    } else if (pilihUlang && !pilihBenar) {
                        clearTimeout(typingTimer);
                        synth.cancel();
                        if (rec) rec.abort();
                        inputNim.value = "";
                        currentStep = "ASK_NIM";
                        bicara(
                            "Mari ulangi. Silakan sebutkan kembali NIM anda.",
                        );
                    } else if (!isSpeaking && hasil.length > 2) {
                        bicara(
                            "Maaf, perintah tidak sesuai. Katakan BENAR, atau ULANG.",
                        );
                    }
                } else if (currentStep === "ASK_PASS") {
                    const passFix = kataKeAngka(hasil);
                    if (passFix && passFix.length > 0) {
                        synth.cancel();
                        inputPass.value = passFix;

                        // Reset timer penunggu jeda bicara
                        clearTimeout(typingTimer);
                        typingTimer = setTimeout(() => {
                            if (rec) rec.abort();
                            currentStep = "CONFIRM_PASS";
                            const passSpoken = inputPass.value
                                .split("")
                                .join(" ");
                            bicara(
                                `Kata sandi anda ${passSpoken}. Katakan Benar, atau Ulang.`,
                            );
                        }, waktuTungguJeda);
                    }
                } else if (currentStep === "CONFIRM_PASS") {
                    // Blokir Anti-Echo
                    if (
                        hasil.includes("katakan benar") ||
                        hasil.includes("atau ulang")
                    )
                        return;

                    const pilihBenar =
                        hasil.includes("benar") ||
                        hasil.includes("ya") ||
                        hasil.includes("betul");
                    const pilihUlang =
                        hasil.includes("ulang") ||
                        hasil.includes("salah") ||
                        hasil.includes("bukan");

                    if (pilihBenar && !pilihUlang) {
                        clearTimeout(typingTimer);
                        synth.cancel();
                        if (rec) rec.abort();
                        validasiAkhir();
                    } else if (pilihUlang && !pilihBenar) {
                        clearTimeout(typingTimer);
                        synth.cancel();
                        if (rec) rec.abort();
                        inputPass.value = "";
                        currentStep = "ASK_PASS";
                        bicara("Mari ulangi pengisian kata sandi.");
                    } else if (!isSpeaking && hasil.length > 2) {
                        bicara(
                            "Maaf, perintah tidak sesuai. Katakan BENAR, atau ULANG.",
                        );
                    }
                }
            }

            function startFlow() {
                currentStep = "ASK_NIM";
                fieldNim.classList.add(
                    "border-blue-600",
                    "bg-white",
                    "shadow-md",
                );
                bicara("Halaman Login. Silakan sebutkan NIM anda.");
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
                bicara("Silakan sebutkan kata sandi anda.");
            }

            function validasiAkhir() {
                if (isRedirecting) return;
                currentStep = "PROCESSING";
                const nim = inputNim.value;
                const pass = inputPass.value;

                synth.cancel();
                if (rec) rec.abort();

                bicara("Sedang memeriksa data anda.", () => {
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
                                bicara(
                                    "Akses diterima. Membuka dashboard mahasiswa.",
                                    () => {
                                        window.location.href = data.redirect;
                                    },
                                );
                                // Fallback jika API Text-To-Speech hang
                                setTimeout(() => {
                                    window.location.href = data.redirect;
                                }, 4000);
                            } else {
                                currentStep = "ASK_PASS";
                                inputPass.value = "";
                                bicara(
                                    data.message ||
                                        "Login gagal. Silakan sebutkan ulang kata sandi anda.",
                                    () => {
                                        mulaiMendengar();
                                    },
                                );
                            }
                        })
                        .catch(() => {
                            currentStep = "ASK_PASS";
                            bicara(
                                "Terjadi kesalahan sistem. Silakan coba kembali kata sandi anda.",
                            );
                        });
                });
            }

            // Fungsi cerdas yang bisa mengubah teks menjadi angka agar password huruf/angka tersaring dengan baik
            function kataKeAngka(teks) {
                if (!teks) return "";
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

                let hasil = teks.toLowerCase();
                let tokens = hasil.split(/\s+/);
                let finalNum = "";

                // Ekstrak angka baik yang berwujud nomor ("12") atau tulisan ("dua")
                for (let token of tokens) {
                    if (/\d/.test(token)) {
                        finalNum += token.replace(/\D/g, "");
                    } else if (map[token]) {
                        finalNum += map[token];
                    }
                }
                return finalNum;
            }

            window.addEventListener("load", () => {
                setTimeout(() => {
                    mulaiMendengar();
                    startFlow();
                }, 800);
            });
        </script>
    </body>
</html>
