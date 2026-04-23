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

        <link rel="prefetch" href="{{ route('dashboard') ?? '#' }}" />

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
                        class="mb-10 opacity-0 transition-opacity duration-500 cursor-pointer"
                        title="Ketuk 2x untuk memotong suara sistem"
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
    type="button"
    onclick="openRegisterModal()"
    data-aos="fade-up"
    data-aos-delay="600"
    class="w-full py-4 bg-white border border-slate-200 rounded-xl flex items-center justify-center gap-3 transition-all hover:bg-slate-50 cursor-pointer"
>
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 text-blue-600">
        <path stroke-linecap="round" stroke-linejoin="round" d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
    </svg>
    <span class="text-[9px] font-black text-slate-600 tracking-widest uppercase">Daftar Akun Mahasiswa</span>
</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="registerModal" class="fixed inset-0 z-[999] hidden items-center justify-center p-4 bg-slate-900/40 backdrop-blur-md transition-all duration-500">
    <div class="w-full max-w-md bg-white rounded-[3rem] shadow-2xl p-10 relative animate-pop overflow-hidden">
        <button type="button" onclick="closeRegisterModal()" class="absolute top-8 right-8 text-slate-300 hover:text-red-500 transition-all">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" /></svg>
        </button>

        <div class="mb-10 text-center">
            <h3 class="text-2xl font-black text-slate-900 uppercase">Daftar Mahasiswa</h3>
            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mt-2">Gunakan Suara atau Ketik Langsung</p>
        </div>

        <form id="registerForm" class="space-y-4">
            @csrf
            <div class="p-4 rounded-2xl bg-slate-50 border-2 border-transparent transition-all">
                <label class="block text-[8px] font-black text-slate-400 uppercase">Nama Lengkap</label>
                <input type="text" name="nama" id="reg-input-nama" class="w-full bg-transparent text-sm font-bold outline-none" placeholder="Ketik atau sebutkan nama">
            </div>
            <div class="p-4 rounded-2xl bg-slate-50 border-2 border-transparent transition-all">
                <label class="block text-[8px] font-black text-slate-400 uppercase">NIM</label>
                <input type="text" name="nim" id="reg-input-nim" class="w-full bg-transparent text-sm font-bold outline-none" placeholder="Sebutkan angka NIM">
            </div>
            <div class="p-4 rounded-2xl bg-slate-50 border-2 border-transparent transition-all">
                <label class="block text-[8px] font-black text-slate-400 uppercase">Kata Sandi</label>
                <input type="password" name="password" id="reg-input-pass" class="w-full bg-transparent text-sm font-bold outline-none" placeholder="Sebutkan angka sandi">
            </div>
            <button type="submit" id="regBtn" class="w-full py-5 bg-blue-600 text-white rounded-2xl font-black text-xs uppercase shadow-xl hover:bg-blue-700 transition-all mt-4">Daftar Akun Sekarang</button>
        </form>
    </div>
</div>

        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>

            // Tambahkan di bagian atas script

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

            // STATE MANAGEMENT
            let step = "NIM"; // NIM -> CONFIRM_NIM -> PASS -> CONFIRM_PASS -> PROSES
            let isSpeaking = false;
            let idleTimer;

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
                    if (typeof waveInterval !== "undefined")
                        clearInterval(waveInterval);
                    waveBars.forEach((bar) => (bar.style.height = "4px"));
                }
            }

            function resetIdleTimer() {
                clearTimeout(idleTimer);
                if (step === "PROSES") return;
                idleTimer = setTimeout(() => {
                    if (step === "NIM")
                        bicara(
                            "Waktu tunggu habis. Silakan sebutkan Nomor Induk Mahasiswa Anda untuk melanjutkan.",
                        );
                    else if (step === "CONFIRM_NIM" || step === "CONFIRM_PASS")
                        bicara(
                            "Sistem menunggu konfirmasi Anda. Jawab dengan kata, benar, atau salah?",
                        );
                    // DIKEMBALIKAN KE BENAR/SALAH
                    else if (step === "PASS")
                        bicara(
                            "Waktu tunggu habis. Silakan sebutkan kata sandi Anda untuk melanjutkan.",
                        );
                }, 180000);
            }

            function resetMic() {
                if (rec) {
                    try {
                        rec.abort();
                    } catch (e) {}
                }
            }

            let clickTimer = null;
            const clickDelay = 300;

            document.body.addEventListener("click", (e) => {
                if (e.target.tagName.toLowerCase() === "input") return;

                if (clickTimer !== null) {
                    clearTimeout(clickTimer);
                    clickTimer = null;

                    if (step !== "PROSES") {
                        synth.cancel();
                        isSpeaking = false;
                        setWave(false);
                        resetMic();

                        setTimeout(() => {
                            if (statusDesc) {
                                statusDesc.innerText = "MENDENGARKAN";
                                statusDesc.classList.replace(
                                    "text-blue-600",
                                    "text-green-600",
                                );
                            }
                            try {
                                rec.start();
                                resetIdleTimer();
                            } catch (error) {}
                        }, 50);
                    }
                } else {
                    clickTimer = setTimeout(() => {
                        clickTimer = null;
                    }, clickDelay);
                }
            });

            function bicara(teks, callback = null) {
                if (step === "PROSES" && teks === "") return;
                isSpeaking = true;
                resetMic();
                synth.cancel();

                setTimeout(() => {
                    const utter = new SpeechSynthesisUtterance(teks);
                    utter.lang = "id-ID";
                    if (suaraIndonesia) utter.voice = suaraIndonesia;

                    utter.rate =
                        parseFloat(localStorage.getItem("speechRate")) || 1.1;

                    utter.onstart = () => {
                        voiceHeader.classList.remove("opacity-0");
                        if (teks !== "") {
                            statusDesc.innerText = "SISTEM BERBICARA";
                            statusDesc.classList.replace(
                                "text-green-600",
                                "text-blue-600",
                            );
                        }
                        setWave(true);
                    };

                    utter.onend = () => {
                        isSpeaking = false;
                        setWave(false);

                        if (callback) {
                            callback();
                        } else if (step !== "PROSES") {
                            statusDesc.innerText = "MENDENGARKAN";
                            statusDesc.classList.replace(
                                "text-blue-600",
                                "text-green-600",
                            );
                            try {
                                rec.start();
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
                if (angkaLangsung) return angkaLangsung.join("");

                return hasil
                    .replace(/[^a-z\s]/g, " ")
                    .split(/\s+/)
                    .map((k) => map[k] || "")
                    .join("");
            }

            if (rec) {
                rec.onresult = (event) => {
                    if (step === "PROSES" || isSpeaking) return;
                    resetIdleTimer();

                    let hasilTerakhir = event.results[0][0].transcript
                        .toLowerCase()
                        .replace(/[.,?!]/g, "")
                        .trim();

                    if (step === "NIM") {
                        let nimFix = hasilTerakhir.replace(/[^0-9]/g, "");
                        if (nimFix.length > 0) {
                            inputNim.value = nimFix;
                            step = "CONFIRM_NIM";

                            // KEMBALI MENGGUNAKAN BENAR/SALAH
                            bicara(
                                `NIM Anda adalah ${nimFix.split("").join(" ")}. Benar, atau salah?`,
                            );
                        } else {
                            bicara("Sebut ulang Nomor Induk Mahasiswa Anda.");
                        }
                    } else if (step === "CONFIRM_NIM") {
                        // KEMBALI MENDETEKSI BENAR/SALAH
                        if (hasilTerakhir.includes("benar")) {
                            step = "PASS";
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

                            bicara(
                                "Nomor terkonfirmasi. Sekarang, silakan sebutkan kata sandi Anda.",
                            );
                        } else if (
                            hasilTerakhir.includes("salah") ||
                            hasilTerakhir.includes("ulang")
                        ) {
                            step = "NIM";
                            inputNim.value = "";
                            bicara("Sebut ulang Nomor Induk Mahasiswa Anda.");
                        } else {
                            bicara(
                                "Jawaban tidak valid. Jawab dengan kata, benar, atau salah.",
                            );
                        }
                    } else if (step === "PASS") {
                        let passFix = kataKeAngka(hasilTerakhir);
                        if (passFix.length > 0) {
                            inputPass.value = passFix;
                            step = "CONFIRM_PASS";

                            // KEMBALI MENGGUNAKAN BENAR/SALAH
                            bicara(
                                `Kata sandi Anda adalah ${passFix.split("").join(" ")}. Benar, atau salah?`,
                            );
                        } else {
                            bicara("Sebut ulang kata sandi Anda.");
                        }
                    } else if (step === "CONFIRM_PASS") {
                        // KEMBALI MENDETEKSI BENAR/SALAH
                        if (hasilTerakhir.includes("benar")) {
                            validasiAkhir();
                        } else if (
                            hasilTerakhir.includes("salah") ||
                            hasilTerakhir.includes("ulang")
                        ) {
                            step = "PASS";
                            inputPass.value = "";
                            bicara("Sebut ulang kata sandi Anda.");
                        } else {
                            bicara(
                                "Jawaban tidak valid. Jawab dengan kata, benar, atau salah.",
                            );
                        }
                    }
                };

                rec.onend = () => {
                    if (!isSpeaking && step !== "PROSES") {
                        try {
                            rec.start();
                        } catch (e) {}
                    }
                };
            }

            function startFlow() {
                step = "NIM";
                fieldNim.classList.add(
                    "border-blue-600",
                    "bg-white",
                    "shadow-md",
                );

                bicara(
                    "Halaman login mahasiswa. Silakan sebutkan Nomor Induk Mahasiswa Anda.",
                );
            }

            function validasiAkhir() {
                step = "PROSES";
                synth.cancel();
                resetMic();

                const nim = inputNim.value;
                const pass = inputPass.value;

                statusDesc.innerText = "MEMPROSES...";
                statusDesc.classList.replace("text-green-600", "text-blue-600");

                bicara("Sedang memverifikasi data Anda. Mohon tunggu.", () => {
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
                                    "Akses diterima. Mengalihkan ke dasbor mahasiswa.",
                                    () => {
                                        window.location.href = data.redirect;
                                    },
                                );
                            } else {
                                step = "PASS";
                                inputPass.value = "";
                                fieldPass.classList.add("border-red-500");
                                setTimeout(
                                    () =>
                                        fieldPass.classList.remove(
                                            "border-red-500",
                                        ),
                                    2000,
                                );

                                bicara(
                                    "Verifikasi gagal. Kata sandi yang Anda masukkan salah. Silakan sebut ulang kata sandi Anda.",
                                );
                            }
                        })
                        .catch(() => {
                            step = "NIM";
                            inputNim.value = "";
                            inputPass.value = "";
                            fieldPass.classList.add("opacity-20");
                            fieldPass.classList.remove(
                                "border-blue-600",
                                "bg-white",
                                "shadow-md",
                            );
                            fieldNim.classList.add(
                                "border-blue-600",
                                "bg-white",
                                "shadow-md",
                            );

                            bicara(
                                "Terjadi kesalahan pada jaringan. Mari kita mulai lagi. Silakan sebutkan Nomor Induk Mahasiswa Anda.",
                            );
                        });
                });
            }

            window.onload = () => {
                setTimeout(() => {
                    startFlow();
                }, 800);
            };

            
        </script>
        <script>
    // 1. Definisikan variabel state di bagian paling atas script utama
    let isModalOpen = false;

    // 2. Fungsi untuk membuka modal (pastikan ID sesuai dengan HTML)
    function openRegisterModal() {
        const modal = document.getElementById('registerModal');
        if (modal) {
            isModalOpen = true;
            modal.classList.remove('hidden'); // Pastikan menghapus 'hidden'
            modal.classList.add('flex', 'modal-active'); // Tambahkan flex untuk tampil
            
            // Logika Suara
            step = "REG_NAMA";
            bicara("Menu pendaftaran mahasiswa. Silakan sebutkan nama lengkap Anda.");
        } else {
            console.error("Elemen registerModal tidak ditemukan!");
        }
    }

    // 3. Fungsi untuk menutup modal
    function closeRegisterModal() {
        const modal = document.getElementById('registerModal');
        if (modal) {
            isModalOpen = false;
            modal.classList.add('hidden');
            modal.classList.remove('flex', 'modal-active');
            
            // Kembali ke alur Login Utama
            step = "NIM";
            startFlow();
        }
    }

    // 4. Update Event Listener Submit (Gunakan event delegation agar lebih aman)
    const registerForm = document.getElementById('registerForm');
    if (registerForm) {
        registerForm.addEventListener('submit', async function(e) {
            e.preventDefault();
            const btn = document.getElementById('regBtn');
            btn.innerText = "MENDAFTAR...";
            btn.disabled = true;

            try {
                const res = await fetch("{{ route('register.mahasiswa.post') }}", {
                    method: "POST",
                    headers: { 
                        "X-CSRF-TOKEN": "{{ csrf_token() }}", 
                        "Accept": "application/json" 
                    },
                    body: new FormData(this)
                });
                
                const json = await res.json();
                if (json.success) {
                    alert("Berhasil Daftar! Silakan Login.");
                    closeRegisterModal();
                    this.reset(); // Kosongkan form setelah sukses
                } else {
                    bicara(json.message || "Pendaftaran gagal. NIM mungkin sudah terdaftar.");
                    btn.innerText = "Daftar Akun Sekarang";
                    btn.disabled = false;
                }
            } catch (error) {
                console.error(error);
                btn.innerText = "Daftar Akun Sekarang";
                btn.disabled = false;
            }
        });
    }
</script>
        <x-accessibility-widget />
    </body>
</html>
