<!DOCTYPE html>
<html lang="id" class="h-full">
    <head>
        <meta charset="UTF-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"
        />
        <title>Gabung Kelas | LMS Inklusi UMMI</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link
            href="https://unpkg.com/aos@2.3.1/dist/aos.css"
            rel="stylesheet"
        />
        <link
            href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
            rel="stylesheet"
        />

        <style>
            .custom-scrollbar::-webkit-scrollbar {
                width: 5px;
            }
            .custom-scrollbar::-webkit-scrollbar-track {
                background: transparent;
            }
            .custom-scrollbar::-webkit-scrollbar-thumb {
                background-color: #cbd5e1;
                border-radius: 20px;
            }
            .wave-bar { transition: height 0.1s ease; }
        </style>
    </head>
    <body
        class="m-0 font-['Plus_Jakarta_Sans'] bg-[#f8fafc] min-h-full flex flex-col border-box overflow-x-hidden text-slate-800"
    >
        <div
            class="fixed top-0 left-0 w-full h-full overflow-hidden -z-10 pointer-events-none"
        >
            <div
                class="absolute top-[-10%] right-[-5%] w-64 md:w-[400px] h-64 md:h-[400px] bg-emerald-100/40 rounded-full blur-3xl opacity-50"
            ></div>
            <div
                class="absolute bottom-[-10%] left-[-10%] w-64 md:w-[400px] h-64 md:h-[400px] bg-blue-50/40 rounded-full blur-3xl opacity-50"
            ></div>
        </div>

        <main
            class="flex-1 flex flex-col h-screen overflow-y-auto custom-scrollbar relative"
        >
            {{-- NAVBAR MOBILE-FRIENDLY --}}
            <div
                class="bg-white/90 backdrop-blur-2xl border-b border-slate-200/60 sticky top-0 z-40 px-3 sm:px-4 md:px-8 py-3 sm:py-4 shadow-sm transition-all w-full cursor-pointer" id="voice-header" title="Ketuk untuk memotong suara sistem"
            >
                <div
                    class="max-w-7xl mx-auto flex items-center justify-between relative h-10 sm:h-12 md:h-14 pointer-events-none"
                >
                    <div
                        class="flex items-center gap-2 sm:gap-4 relative z-10 w-auto justify-start pointer-events-auto"
                    >
                        <button
                            onclick="navigasiKe(0)"
                            class="w-9 h-9 sm:w-11 sm:h-11 md:w-12 md:h-12 rounded-full bg-slate-100 hover:bg-blue-600 text-slate-500 hover:text-white flex items-center justify-center transition-all duration-300 shadow-sm shrink-0 group border border-slate-200 hover:border-blue-600 relative cursor-pointer"
                        >
                            <svg
                                class="w-4 h-4 sm:w-5 sm:h-5 md:w-6 md:h-6 transform group-hover:-translate-x-1 transition-transform"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2.5"
                                    d="M15 19l-7-7 7-7"
                                ></path>
                            </svg>
                            <span
                                class="absolute -bottom-1 -right-1 bg-slate-800 text-white text-[8px] md:text-[9px] font-black px-1.5 py-0.5 rounded-md border border-white"
                                >0</span
                            >
                        </button>
                        <div
                            class="hidden sm:block text-left cursor-pointer group"
                            onclick="navigasiKe(0)"
                        >
                            <span
                                class="block text-[8px] md:text-[9px] font-bold text-slate-400 uppercase tracking-widest"
                                >Navigasi Suara</span
                            >
                            <span
                                class="block text-[10px] md:text-xs font-black text-slate-700 group-hover:text-blue-600 transition-colors"
                                >0 - Kembali</span
                            >
                        </div>
                    </div>

                    <div
                        class="text-center absolute left-1/2 transform -translate-x-1/2 w-[50%] sm:w-[60%] md:max-w-md mt-0"
                    >
                        <h1
                            class="text-sm sm:text-lg md:text-2xl font-extrabold text-slate-900 tracking-tight leading-tight truncate"
                        >
                            Gabung Kelas Baru
                        </h1>
                        <div
                            class="flex items-center justify-center gap-1 sm:gap-2 mt-0.5 sm:mt-1"
                        >
                            <span
                                class="text-[7px] sm:text-[9px] md:text-[10px] font-bold text-blue-600 uppercase tracking-widest bg-blue-100 px-1.5 sm:px-2 py-0.5 rounded-md"
                            >
                                Mahasiswa
                            </span>
                        </div>
                    </div>

                    <div
                        class="flex items-center gap-1.5 sm:gap-3 pl-2 sm:pl-6 border-l border-slate-200 relative z-10 justify-end pointer-events-auto"
                    >
                        <div
                            class="flex items-center gap-[2px] h-4 w-6 sm:w-10 justify-center"
                            id="wave-container"
                        >
                            <div
                                class="wave-bar w-[2px] bg-blue-500 rounded-full h-1 transition-all"
                            ></div>
                            <div
                                class="wave-bar w-[2px] bg-blue-400 rounded-full h-1 transition-all"
                            ></div>
                            <div
                                class="wave-bar w-[2px] bg-blue-600 rounded-full h-1 transition-all"
                            ></div>
                        </div>
                        <span
                            id="status-desc"
                            class="hidden sm:block text-[8px] md:text-[9px] font-black text-slate-400 uppercase tracking-widest w-12 sm:w-20 text-left"
                            >MENYIAPKAN</span
                        >
                    </div>
                </div>
            </div>

            {{-- KONTEN UTAMA --}}
            <div
                class="max-w-4xl mx-auto w-full p-4 sm:p-6 flex flex-col items-center justify-center min-h-[80vh] pb-20"
            >
                <div
                    class="bg-white rounded-[2rem] sm:rounded-[3rem] shadow-xl shadow-slate-100 border border-slate-200 p-6 sm:p-8 md:p-12 w-full relative overflow-hidden"
                >
                    <div
                        class="absolute top-0 right-0 w-40 sm:w-64 h-40 sm:h-64 bg-gradient-to-br from-emerald-50 to-teal-50 rounded-bl-[100%] -mr-5 -mt-5 sm:-mr-10 sm:-mt-10 -z-0"
                    ></div>

                    <div
                        class="relative z-10 text-center space-y-6 sm:space-y-8"
                    >
                        {{-- Notifikasi Error/Gagal --}}
                        @if ($errors->any())
                            <div class="bg-red-50 border border-red-200 text-red-600 px-4 py-3 rounded-xl text-sm font-bold text-left mb-4 shadow-sm animate-pulse">
                                @foreach ($errors->all() as $error)
                                    <p class="flex items-center gap-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                                        {{ $error }}
                                    </p>
                                @endforeach
                            </div>
                        @endif

                        <div class="space-y-2">
                            <h2
                                class="text-2xl sm:text-3xl font-black text-slate-900 tracking-tight"
                            >
                                Punya Kode Kelas?
                            </h2>
                            <p
                                class="text-xs sm:text-sm text-slate-500 font-medium px-4 sm:px-0"
                            >
                                Masukkan kode yang diberikan dosen untuk
                                bergabung.
                            </p>
                        </div>

                        <form
                            action="{{ route('mahasiswa.join.kelas') }}"
                            method="POST"
                            class="max-w-md mx-auto space-y-4 sm:space-y-6"
                            id="join-form"
                        >
                            @csrf
                            <div id="field-code" class="group cursor-text p-4 rounded-2xl bg-slate-50 border-2 border-transparent transition-all duration-300 relative">
                                <label
                                    class="block text-[10px] sm:text-xs font-bold text-slate-400 uppercase tracking-widest mb-2 sm:mb-3"
                                    >Kode Akses</label
                                >
                                <input
                                    type="text"
                                    id="class-code"
                                    name="code"
                                    placeholder="Contoh: X7Y-99"
                                    class="w-full text-center text-2xl sm:text-3xl font-black uppercase tracking-[0.1em] sm:tracking-[0.2em] py-3 sm:py-5 border-b-4 border-slate-200 bg-transparent text-slate-800 placeholder-slate-300 focus:outline-none focus:border-emerald-500 transition-all font-mono"
                                    maxlength="8"
                                    autocomplete="off"
                                />
                            </div>

                            <button
                                type="button"
                                onclick="validasiAkhir()"
                                class="w-full bg-slate-900 text-white py-3 sm:py-4 rounded-xl sm:rounded-2xl font-bold text-xs sm:text-sm uppercase tracking-widest hover:bg-emerald-600 hover:shadow-lg hover:shadow-emerald-200 transition-all transform hover:-translate-y-1 flex items-center justify-center gap-2 sm:gap-3"
                            >
                                <span>Gabung Sekarang</span>
                                <svg
                                    class="w-4 h-4 sm:w-5 sm:h-5"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M13 7l5 5m0 0l-5 5m5-5H6"
                                    ></path>
                                </svg>
                            </button>
                        </form>

                        <div
                            class="bg-slate-50 rounded-xl sm:rounded-2xl p-3 sm:p-4 flex items-start gap-3 sm:gap-4 text-left border border-slate-100 mt-6 sm:mt-8"
                        >
                            <div
                                class="w-6 h-6 sm:w-8 sm:h-8 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center shrink-0 font-bold text-[10px] sm:text-xs"
                            >
                                i
                            </div>
                            <p
                                class="text-[10px] sm:text-xs text-slate-500 leading-relaxed"
                            >
                                <span class="font-bold text-slate-700"
                                    >Tips:</span
                                >
                                Pastikan kode kelas yang dimasukkan sudah benar
                                (6-8 karakter). Jika bermasalah, hubungi dosen
                                yang bersangkutan.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        
        <script>
            AOS.init({ once: true, easing: "ease-out-cubic" });

            // ==========================================
            // LOGIKA VOICE ASSISTANT & MANUAL INPUT
            // ==========================================
            const statusDesc = document.getElementById("status-desc");
            const waveBars = document.querySelectorAll(".wave-bar");
            const inputCode = document.getElementById("class-code");
            const fieldCode = document.getElementById("field-code");
            const formObj = document.getElementById("join-form");

            const synth = window.speechSynthesis;
            const SpeechRec = window.webkitSpeechRecognition || window.SpeechRecognition;
            
            let rec = null;
            let waveInterval;
            let isRecActive = false;
            let isRedirecting = false;
            let isSpeaking = false;
            
            // STATE MACHINE
            let currentStep = 'ASK_CODE'; 
            let typingTimer;
            const waktuTungguJeda = 2000; // Tunggu 2 detik setelah user ngomong sblm konfirmasi

            if (SpeechRec) {
                rec = new SpeechRec();
                rec.lang = "id-ID";
                rec.continuous = true;
                rec.interimResults = true; // Kunci Voice Barge-in
            }

            function setWave(active) {
                if (active) {
                    if (waveInterval) clearInterval(waveInterval);
                    waveInterval = setInterval(() => {
                        if (waveBars.length > 0) {
                            waveBars.forEach((bar) => {
                                bar.style.height = `${Math.floor(Math.random() * 12) + 4}px`;
                            });
                        }
                    }, 100);
                } else {
                    clearInterval(waveInterval);
                    if (waveBars.length > 0) {
                        waveBars.forEach((bar) => (bar.style.height = "4px"));
                    }
                }
            }

            // Fitur Cut-Off Manual klik layar
            document.body.addEventListener('click', (e) => {
                if (e.target.tagName === 'BUTTON' || e.target.tagName === 'INPUT' || e.target.tagName === 'A' || e.target.closest('button')) return;
                if (isSpeaking && !isRedirecting) {
                    synth.cancel();
                    setWave(false);
                }
            });

            // EVENT LISTENER JIKA USER MENGETIK MANUAL DI KEYBOARD
            inputCode.addEventListener('input', function(e) {
                // Format input: huruf besar semua, hapus spasi
                this.value = this.value.toUpperCase().replace(/\s+/g, '');
                
                // Hentikan suara bot jika user sedang mengetik manual
                if (isSpeaking) {
                    synth.cancel();
                    setWave(false);
                }
                
                // Batalkan timer konfirmasi suara karena user ambil alih via keyboard
                clearTimeout(typingTimer);
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
                        if (statusDesc) {
                            statusDesc.innerText = "BERBICARA...";
                            statusDesc.classList.replace("text-slate-400", "text-blue-600");
                        }
                        setWave(true);
                        mulaiMendengar(); // Microphone nyala berbarengan (Barge-in)
                    };

                    utter.onend = () => {
                        isSpeaking = false;
                        setWave(false);
                        if (!isRedirecting && statusDesc) {
                            statusDesc.innerText = "MENDENGARKAN";
                            statusDesc.classList.replace("text-blue-600", "text-green-600");
                        }
                        if (callback) callback();
                    };

                    utter.onerror = () => {
                        isSpeaking = false;
                        setWave(false);
                        mulaiMendengar();
                    };

                    synth.speak(utter);
                }, 50);
            }

            function startFlow() {
                currentStep = 'ASK_CODE';
                fieldCode.classList.add("border-blue-600", "bg-white", "shadow-md");
                let teks = "Halaman Gabung Kelas. ";
                @if($errors->any())
                    teks += "Terdapat kesalahan. {{ $errors->first() }}. ";
                @endif
                teks += "Silakan sebutkan atau ketik kode kelas Anda. Sebutkan angka nol jika ingin kembali.";
                bicara(teks);
            }

            function validasiAkhir() {
                if (isRedirecting) return;
                
                const code = inputCode.value.trim();
                if (code.length < 3) {
                    currentStep = 'ASK_CODE';
                    fieldCode.classList.add("border-blue-600", "bg-white", "shadow-md");
                    bicara("Kode kelas kosong atau terlalu pendek. Silakan masukkan ulang.");
                    return;
                }

                currentStep = 'PROCESSING';
                isRedirecting = true;
                synth.cancel();
                if(rec) rec.abort();
                
                if(statusDesc) {
                    statusDesc.innerText = "MENGALIHKAN...";
                    statusDesc.classList.replace("text-green-600", "text-slate-800");
                }

                bicara("Memproses kode kelas. Mohon tunggu.", () => {
                    formObj.submit();
                });

                // Fallback Anti Hang
                setTimeout(() => { formObj.submit(); }, 3000);
            }

            function navigasiKe(nomor) {
                if (isRedirecting) return;

                if (nomor === 0) {
                    isRedirecting = true;
                    synth.cancel();
                    if(rec) rec.abort();
                    
                    if(statusDesc) {
                        statusDesc.innerText = "MENGALIHKAN...";
                        statusDesc.classList.replace("text-green-600", "text-slate-800");
                    }
                    bicara("Nol. Kembali ke Daftar Mata Kuliah.", () => {
                        window.location.href = "{{ route('courses.index') }}";
                    });
                    setTimeout(() => { window.location.href = "{{ route('courses.index') }}"; }, 3000);
                } 
            }

            // Fungsi pengonversi teks suara ke format kode (Toleransi angka)
            function parseKode(teks) {
                if (!teks) return "";
                const map = {
                    nol: "0", kosong: "0", satu: "1", sato: "1", dua: "2", tua: "2", jua: "2", tiga: "3", 
                    empat: "4", lima: "5", enam: "6", tujuh: "7", tuju: "7", delapan: "8", sembilan: "9"
                };

                let hasil = teks.toLowerCase();
                let tokens = hasil.split(/\s+/);
                let finalCode = "";

                for (let token of tokens) {
                    // Abaikan kata navigasi
                    if (['ulang', 'kembali', 'panduan', 'bantuan', 'gabung', 'benar', 'salah'].includes(token)) continue;

                    if (/\d/.test(token)) {
                        finalCode += token.replace(/\D/g, "");
                    } else if (map[token]) {
                        finalCode += map[token];
                    } else if (token.length === 1 && /[a-z]/.test(token)) {
                        // Jika mendikte satu per satu huruf
                        finalCode += token.toUpperCase();
                    } else {
                        // Jika mesin speech nangkap kata panjang (misal ex untuk X)
                        finalCode += token.toUpperCase();
                    }
                }
                return finalCode.substring(0, 8); // max 8 karakter sesuai input
            }

            if (rec) {
                rec.onresult = (event) => {
                    if (isRedirecting) return;

                    let hasil = "";
                    for (let i = event.resultIndex; i < event.results.length; ++i) {
                        hasil += event.results[i][0].transcript + " ";
                    }
                    hasil = hasil.toLowerCase().trim();

                    // ANTI ECHO (Mencegah bot memotong suaranya sendiri)
                    const omonganBot = [
                        "halaman gabung kelas", "terdapat kesalahan", "sebutkan atau ketik",
                        "kode kelas anda", "sebutkan angka nol", "kode anda adalah", 
                        "katakan benar", "atau ulang", "mari ulangi", "memproses kode kelas"
                    ];

                    if (omonganBot.some(kalimat => hasil.includes(kalimat))) {
                        return;
                    }

                    prosesJawaban(hasil);
                };

                rec.onend = () => { 
                    isRecActive = false;
                    if (!isRedirecting) mulaiMendengar(); 
                };
            }

            function prosesJawaban(hasil) {
                // Menu Navigasi Dasar & Kembali
                if (hasil === "nol" || hasil.includes("kembali") || hasil.includes("daftar mata kuliah")) {
                    navigasiKe(0); return;
                }
                if (hasil.includes("panduan") || hasil.includes("bantuan")) {
                    synth.cancel(); if(rec) rec.abort();
                    startFlow(); return;
                }

                if (currentStep === 'ASK_CODE') {
                    // Deteksi jika ucapan adalah perintah reset
                    if (hasil.includes("ulang")) {
                        synth.cancel(); if(rec) rec.abort();
                        inputCode.value = "";
                        bicara("Silakan sebutkan ulang kode Anda dari awal.");
                        return;
                    }

                    // Parse dan masukkan teks ke input
                    const kodeParsed = parseKode(hasil);
                    if (kodeParsed.length > 0) {
                        synth.cancel(); // Matikan suara bot yg lagi ngoceh
                        inputCode.value = kodeParsed;
                        
                        // Set Timer Debounce 2 Detik
                        clearTimeout(typingTimer);
                        typingTimer = setTimeout(() => {
                            if (rec) rec.abort(); 
                            currentStep = 'CONFIRM_CODE';
                            fieldCode.classList.remove("border-blue-600");
                            fieldCode.classList.add("border-emerald-500");
                            
                            let ejaan = inputCode.value.split("").join(" ");
                            bicara(`Kode Anda adalah ${ejaan}. Katakan Benar untuk gabung, atau Ulang untuk memperbaiki.`);
                        }, waktuTungguJeda);
                    }
                } 
                else if (currentStep === 'CONFIRM_CODE') {
                    const pilihBenar = hasil.includes("benar") || hasil.includes("ya") || hasil.includes("betul") || hasil.includes("gabung");
                    const pilihUlang = hasil.includes("ulang") || hasil.includes("salah") || hasil.includes("bukan");

                    if (pilihBenar && !pilihUlang) {
                        clearTimeout(typingTimer);
                        validasiAkhir();
                    } else if (pilihUlang && !pilihBenar) {
                        clearTimeout(typingTimer);
                        synth.cancel();
                        if(rec) rec.abort();
                        inputCode.value = "";
                        currentStep = 'ASK_CODE';
                        fieldCode.classList.remove("border-emerald-500");
                        fieldCode.classList.add("border-blue-600");
                        bicara("Mari ulangi. Silakan sebutkan kembali kode kelas Anda.");
                    } else if (!isSpeaking && hasil.length > 2) {
                        bicara("Maaf, perintah tidak sesuai. Katakan BENAR, atau ULANG.");
                    }
                }
            }

            window.addEventListener("load", () => {
                document.body.addEventListener("click", () => {}, { once: true });
                setTimeout(() => {
                    mulaiMendengar(); 
                    startFlow();
                }, 800);
            });
        </script>
    </body>
</html>