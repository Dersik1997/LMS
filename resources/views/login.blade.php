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
                        class="mb-10 opacity-0 transition-opacity duration-500"
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
                                    >Siap</span
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

            const synth = window.speechSynthesis;
            const SpeechRec =
                window.webkitSpeechRecognition || window.SpeechRecognition;
            const rec = new SpeechRec();
            rec.lang = "id-ID";
            // Kunci agar mic sabar menunggu sampai pengguna hening
            rec.continuous = false;
            rec.interimResults = false;

            let waveInterval;
            function setWave(active) {
                if (active) {
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

            function bicara(teks, callback) {
                synth.cancel();

                const utter = new SpeechSynthesisUtterance(teks);
                utter.lang = "id-ID";

                const savedRate = localStorage.getItem("speechRate");
                if (savedRate) {
                    utter.rate = parseFloat(savedRate);
                } else {
                    utter.rate = 1.0;
                }

                utter.onstart = () => {
                    voiceHeader.classList.remove("opacity-0");
                    statusDesc.innerText = "SISTEM BERBICARA";
                    setWave(true);
                };
                utter.onend = () => {
                    setWave(false);
                    if (callback) callback();
                };
                synth.speak(utter);
            }

            function dengar(onResult) {
                statusDesc.innerText = "MENDENGARKAN...";
                setWave(true);

                try {
                    rec.abort();
                } catch (e) {}

                rec.start();

                rec.onresult = (e) => {
                    setWave(false);
                    rec.stop();
                    // Karena interimResults false, ini akan me-return kalimat final setelah diam
                    onResult(e.results[0][0].transcript);
                };

                rec.onerror = () => {
                    setWave(false);
                    rec.stop();
                    setTimeout(() => dengar(onResult), 500);
                };
            }

            function startFlow() {
                const fNim = document.getElementById("field-nim");
                fNim.classList.add("border-blue-600", "bg-white", "shadow-md");

                bicara("Halaman Login. Silakan sebutkan NIM anda.", () => {
                    dengar((hasil) => {
                        const nimFix = hasil.replace(/[^0-9]/g, "");

                        if (nimFix.length > 0) {
                            inputNim.value = nimFix;
                            bicara(
                                `NIM anda adalah ${nimFix.split("").join(" ")}. Benar, atau salah?`,
                                () => {
                                    dengar((konf) => {
                                        const jawab = konf.toLowerCase();
                                        if (
                                            jawab.includes("benar") ||
                                            jawab.includes("ya")
                                        ) {
                                            flowPassword();
                                        } else if (
                                            jawab.includes("salah") ||
                                            jawab.includes("ulang") ||
                                            jawab.includes("bukan")
                                        ) {
                                            inputNim.value = "";
                                            bicara(
                                                "Sebut ulang NIM anda.",
                                                startFlow,
                                            );
                                        } else {
                                            inputNim.value = "";
                                            bicara(
                                                "Jawaban tidak dikenali. Mari ulangi dari awal. Sebutkan NIM anda.",
                                                startFlow,
                                            );
                                        }
                                    });
                                },
                            );
                        } else {
                            bicara(
                                "NIM tidak terdengar dengan jelas. Mari ulangi.",
                                startFlow,
                            );
                        }
                    });
                });
            }

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

                const angkaLangsung = hasil.match(/\d+/g);
                if (angkaLangsung) {
                    return angkaLangsung.join("");
                }

                return hasil
                    .replace(/[^a-z\s]/g, " ")
                    .split(/\s+/)
                    .map((k) => map[k] || "")
                    .join("");
            }

            function flowPassword() {
                const fNim = document.getElementById("field-nim");
                const fPass = document.getElementById("field-pass");

                fNim.classList.remove(
                    "border-blue-600",
                    "bg-white",
                    "shadow-md",
                );
                fPass.classList.remove("opacity-20");
                fPass.classList.add("border-blue-600", "bg-white", "shadow-md");

                bicara("Sebutkan kata sandi anda.", () => {
                    dengar((hasil) => {
                        const passFix = kataKeAngka(hasil);

                        if (!passFix || passFix.length === 0) {
                            inputPass.value = "";
                            bicara(
                                "Kata sandi tidak terbaca. Silakan sebutkan ulang.",
                                flowPassword,
                            );
                            return;
                        }

                        inputPass.value = passFix;
                        const passSpoken = passFix.split("").join(" ");

                        bicara(
                            `Kata sandi anda adalah ${passSpoken}. Benar, atau salah?`,
                            () => {
                                dengar((konf) => {
                                    const jawab = konf.toLowerCase();
                                    if (
                                        jawab.includes("benar") ||
                                        jawab.includes("ya")
                                    ) {
                                        validasiAkhir();
                                    } else if (
                                        jawab.includes("salah") ||
                                        jawab.includes("ulang") ||
                                        jawab.includes("bukan")
                                    ) {
                                        inputPass.value = "";
                                        bicara(
                                            "Sebut ulang kata sandi anda.",
                                            flowPassword,
                                        );
                                    } else {
                                        inputPass.value = "";
                                        bicara(
                                            "Jawaban tidak dikenali. Sebutkan kata sandi anda.",
                                            flowPassword,
                                        );
                                    }
                                });
                            },
                        );
                    });
                });
            }

            function validasiAkhir() {
                const nim = inputNim.value;
                const pass = inputPass.value;

                statusDesc.innerText = "MEMPROSES...";

                bicara("Sedang memeriksa data anda.", () => {
                    fetch("{{ route('login.mahasiswa.post') }}", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": "{{ csrf_token() }}",
                        },
                        body: JSON.stringify({
                            nim: nim,
                            password: pass,
                        }),
                    })
                        .then(async (res) => {
                            let data = {};
                            try {
                                data = await res.json();
                            } catch (e) {}

                            if (res.ok && data.success) {
                                // FEEDBACK SUARA BERHASIL
                                bicara(
                                    "Kata sandi benar. Akses diterima. Mengalihkan ke dasbor mahasiswa.",
                                    () => {
                                        window.location.href = data.redirect;
                                    },
                                );
                            } else {
                                // FEEDBACK SUARA GAGAL
                                inputPass.value = "";
                                bicara(
                                    data.message ||
                                        "Kata sandi salah. Silakan sebut ulang kata sandi anda.",
                                    () => {
                                        flowPassword();
                                    },
                                );
                            }
                        })
                        .catch(() => {
                            bicara(
                                "Terjadi kesalahan sistem. Silakan coba kembali.",
                                () => {
                                    inputPass.value = "";
                                    flowPassword();
                                },
                            );
                        });
                });
            }

            // OTOMATIS JALAN SAAT HALAMAN SELESAI DIMUAT
            window.onload = () => {
                setTimeout(() => {
                    startFlow();
                }, 800);
            };
        </script>
    </body>
</html>
