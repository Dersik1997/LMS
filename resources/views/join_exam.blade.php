<!DOCTYPE html>
<html lang="id" class="h-full">
    <head>
        <meta charset="UTF-8" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>Gabung Ujian | LMS Inklusi UMMI</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
        <style>
            html { scroll-behavior: smooth; }
            .custom-scrollbar::-webkit-scrollbar { width: 5px; height: 5px; }
            .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
            .custom-scrollbar::-webkit-scrollbar-thumb { background-color: #cbd5e1; border-radius: 20px; }
            body { min-height: 100dvh; display: flex; flex-direction: column; overflow-x: hidden; }
            .wave-bar { transition: height 0.1s ease; }
        </style>
    </head>
    <body class="m-0 font-['Plus_Jakarta_Sans'] bg-[#f8fafc] text-slate-800 relative custom-scrollbar flex flex-col h-screen">
        
        {{-- BACKGROUND DEKORASI --}}
        <div class="fixed top-0 left-0 w-full h-full overflow-hidden -z-10 pointer-events-none">
            <div class="absolute top-[-10%] right-[-5%] w-64 md:w-[400px] h-64 md:h-[400px] bg-indigo-100/40 rounded-full blur-3xl opacity-50"></div>
            <div class="absolute bottom-[-10%] left-[-10%] w-64 md:w-[400px] h-64 md:h-[400px] bg-purple-50/40 rounded-full blur-3xl opacity-50"></div>
        </div>

        <main class="flex-1 flex flex-col h-screen overflow-y-auto custom-scrollbar relative">
            
            {{-- NAVBAR --}}
            <header class="bg-white/90 backdrop-blur-2xl border-b border-slate-200/60 sticky top-0 z-40 px-3 sm:px-4 md:px-8 py-3 sm:py-4 shadow-sm w-full shrink-0 cursor-pointer" id="voice-header" title="Ketuk untuk memotong suara sistem">
                <div class="max-w-7xl mx-auto flex items-center justify-between relative h-10 sm:h-12 md:h-14 pointer-events-none">
                    
                    {{-- Kiri: Tombol 0 (Kembali) --}}
                    <div class="flex items-center gap-2 sm:gap-4 relative z-10 w-auto justify-start shrink-0 pointer-events-auto">
                        <button onclick="navigasiKe(0)" class="flex w-9 h-9 sm:w-11 sm:h-11 md:w-12 md:h-12 rounded-full bg-slate-100 hover:bg-blue-600 text-slate-500 hover:text-white items-center justify-center transition-all duration-300 shadow-sm shrink-0 group border border-slate-200 hover:border-blue-600 relative cursor-pointer active:scale-95">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5 md:w-6 md:h-6 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path>
                            </svg>
                            <span class="absolute -bottom-1 -right-1 bg-black text-white text-[8px] md:text-[9px] font-black px-1.5 py-0.5 rounded-md border border-white">0</span>
                        </button>
                        <div class="hidden sm:block text-left cursor-pointer group" onclick="navigasiKe(0)">
                            <span class="block text-[8px] md:text-[9px] font-bold text-slate-400 uppercase tracking-widest">Navigasi Suara</span>
                            <span class="block text-[10px] md:text-xs font-black text-slate-700 group-hover:text-blue-600 transition-colors">0 - Kembali</span>
                        </div>
                    </div>

                    {{-- Tengah: Judul --}}
                    <div class="text-center absolute left-1/2 transform -translate-x-1/2 w-[50%] sm:w-[60%] md:w-1/3 z-0 flex flex-col items-center justify-center pointer-events-none">
                        <h1 class="text-sm sm:text-lg md:text-xl font-extrabold text-slate-900 tracking-tight leading-none truncate pointer-events-auto">Gabung Ujian</h1>
                        <p class="text-[8px] sm:text-[10px] font-bold text-blue-600 uppercase tracking-widest mt-1 truncate pointer-events-auto">Mahasiswa</p>
                    </div>

                    {{-- Kanan: Indikator Voice --}}
                    <div class="flex items-center justify-end gap-1.5 sm:gap-3 relative z-10 w-auto shrink-0 pointer-events-auto">
                        <div class="flex items-center gap-[2px] h-4 w-6 sm:w-10 justify-center" id="wave-container">
                            <div class="wave-bar w-[2px] bg-blue-500 rounded-full h-1 transition-all"></div>
                            <div class="wave-bar w-[2px] bg-blue-400 rounded-full h-1 transition-all"></div>
                            <div class="wave-bar w-[2px] bg-blue-600 rounded-full h-1 transition-all"></div>
                        </div>
                        <span id="status-desc" class="hidden sm:block text-[8px] md:text-[9px] font-black text-slate-400 uppercase tracking-widest w-12 sm:w-20 text-left">MENYIAPKAN</span>
                    </div>
                </div>
            </header>

            {{-- KONTEN UTAMA --}}
            <div class="max-w-4xl mx-auto w-full p-4 sm:p-6 flex flex-col items-center justify-center min-h-[80vh] pb-20 relative z-10">
                <div data-aos="zoom-in" class="bg-white rounded-[2rem] sm:rounded-[3rem] shadow-xl shadow-indigo-100/50 border border-slate-200 p-6 sm:p-8 md:p-12 w-full relative overflow-hidden text-center">
                    <div class="absolute top-0 right-0 w-40 sm:w-64 h-40 sm:h-64 bg-gradient-to-br from-indigo-50 to-purple-50 rounded-bl-[100%] -mr-5 -mt-5 sm:-mr-10 sm:-mt-10 -z-0"></div>

                    <div class="relative z-10 text-center space-y-6 sm:space-y-8">
                        
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
                            <h2 class="text-2xl sm:text-3xl font-black text-slate-900 tracking-tight">Punya Token Ujian?</h2>
                            <p class="text-xs sm:text-sm text-slate-500 font-medium px-4 sm:px-0">Masukkan token yang diberikan oleh dosen pengawas untuk memulai ujian Anda.</p>
                        </div>

                        <form action="{{ route('exam.verify') }}" method="POST" id="join-form" class="max-w-md mx-auto space-y-4 sm:space-y-6">
                            @csrf
                            <div id="field-token" class="group cursor-text text-left p-4 rounded-2xl bg-slate-50 border-2 border-transparent transition-all duration-300 relative" onclick="navigasiKe(1)">
                                <label class="block text-[9px] sm:text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-2 sm:mb-3 text-center">Token Ujian (1)</label>
                                <div class="relative">
                                    <input
                                        type="text"
                                        id="token-input"
                                        name="token"
                                        placeholder="Contoh: X7Y-99"
                                        class="w-full text-center text-2xl sm:text-3xl font-black uppercase tracking-[0.1em] sm:tracking-[0.2em] py-3 sm:py-5 border-b-4 border-slate-200 bg-transparent text-slate-800 placeholder-slate-300 focus:outline-none focus:border-indigo-500 transition-all font-mono"
                                        maxlength="10"
                                        autocomplete="off"
                                    />
                                    <div class="absolute right-2 sm:right-4 top-[14px] sm:top-[22px] text-slate-300 group-hover:text-indigo-500 transition-colors pointer-events-none">
                                        <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <button
                                type="button"
                                onclick="validasiAkhir()"
                                class="w-full bg-slate-900 text-white py-3 sm:py-4 rounded-xl sm:rounded-2xl font-bold text-xs sm:text-sm uppercase tracking-widest hover:bg-indigo-600 hover:shadow-lg hover:shadow-indigo-200 transition-all transform hover:-translate-y-1 flex items-center justify-center gap-2 sm:gap-3"
                            >
                                <span>Gabung Sekarang (2)</span>
                                <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                </svg>
                            </button>
                        </form>

                        <div class="bg-slate-50 rounded-xl sm:rounded-2xl p-3 sm:p-4 flex items-start gap-3 sm:gap-4 text-left border border-slate-100 mt-6 sm:mt-8">
                            <div class="w-6 h-6 sm:w-8 sm:h-8 rounded-full bg-indigo-100 text-indigo-600 flex items-center justify-center shrink-0 font-bold text-[10px] sm:text-xs">i</div>
                            <p class="text-[10px] sm:text-xs text-slate-500 leading-relaxed">
                                <span class="font-bold text-slate-700">Tips:</span> Pastikan token ujian sudah benar (kombinasi huruf dan angka). Jika bermasalah, hubungi dosen pengawas.
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
            const tokenInput = document.getElementById("token-input");
            const fieldToken = document.getElementById("field-token");
            const formObj = document.getElementById("join-form");

            const synth = window.speechSynthesis;
            const SpeechRec = window.webkitSpeechRecognition || window.SpeechRecognition;
            
            let rec = null;
            let waveInterval;
            let isRecActive = false;
            let isRedirecting = false;
            let isSpeaking = false;
            
            // STATE MACHINE
            let currentStep = 'ASK_TOKEN'; 
            let typingTimer;
            const waktuTungguJeda = 2000;

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

            // EVENT LISTENER MANUAL KEYBOARD INPUT
            tokenInput.addEventListener('input', function(e) {
                this.value = this.value.toUpperCase().replace(/\s+/g, '');
                if (isSpeaking) {
                    synth.cancel();
                    setWave(false);
                }
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
                        mulaiMendengar(); 
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
                currentStep = 'ASK_TOKEN';
                fieldToken.classList.add("border-blue-600", "bg-white", "shadow-md");
                let teks = "Halaman Gabung Ujian. ";
                @if($errors->any())
                    teks += "Terdapat kesalahan. {{ $errors->first() }}. ";
                @endif
                teks += "Silakan sebutkan atau ketik token ujian Anda. Sebutkan angka nol jika ingin kembali.";
                bicara(teks);
            }

            function validasiAkhir() {
                if (isRedirecting) return;
                
                const code = tokenInput.value.trim();
                if (code.length < 3) {
                    currentStep = 'ASK_TOKEN';
                    fieldToken.classList.add("border-blue-600", "bg-white", "shadow-md");
                    bicara("Token kosong atau terlalu pendek. Silakan masukkan ulang.");
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

                bicara("Memproses token ujian. Masuk ke ruang ujian.", () => {
                    formObj.submit();
                });

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
                    bicara("Nol. Kembali ke Daftar Ujian.", () => {
                        window.location.href = "{{ route('exams') }}";
                    });
                    setTimeout(() => { window.location.href = "{{ route('exams') }}"; }, 3000);
                } 
            }

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
                    if (['ulang', 'kembali', 'panduan', 'bantuan', 'gabung', 'benar', 'salah', 'tidak'].includes(token)) continue;

                    if (/\d/.test(token)) {
                        finalCode += token.replace(/\D/g, "");
                    } else if (map[token]) {
                        finalCode += map[token];
                    } else if (token.length === 1 && /[a-z]/.test(token)) {
                        finalCode += token.toUpperCase();
                    } else {
                        finalCode += token.toUpperCase();
                    }
                }
                return finalCode.substring(0, 10);
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
                        "halaman gabung ujian", "terdapat kesalahan", "sebutkan atau ketik",
                        "token ujian anda", "sebutkan angka nol", "token anda adalah", 
                        "katakan benar", "atau ulang", "mari ulangi", "memproses token ujian"
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
                // Menu Navigasi Dasar
                if (hasil === "nol" || hasil.includes("kembali") || hasil.includes("daftar ujian")) {
                    navigasiKe(0); return;
                }
                if (hasil.includes("panduan") || hasil.includes("bantuan")) {
                    synth.cancel(); if(rec) rec.abort();
                    startFlow(); return;
                }

                if (currentStep === 'ASK_TOKEN') {
                    if (hasil.includes("ulang")) {
                        synth.cancel(); if(rec) rec.abort();
                        tokenInput.value = "";
                        bicara("Silakan sebutkan ulang token Anda dari awal.");
                        return;
                    }

                    const kodeParsed = parseKode(hasil);
                    if (kodeParsed.length > 0) {
                        synth.cancel(); 
                        tokenInput.value = kodeParsed;
                        
                        clearTimeout(typingTimer);
                        typingTimer = setTimeout(() => {
                            if (rec) rec.abort(); 
                            currentStep = 'CONFIRM_TOKEN';
                            fieldToken.classList.remove("border-blue-600");
                            fieldToken.classList.add("border-indigo-500");
                            
                            let ejaan = tokenInput.value.split("").join(" ");
                            bicara(`Token Anda adalah ${ejaan}. Katakan Benar untuk gabung, atau Ulang untuk memperbaiki.`);
                        }, waktuTungguJeda);
                    }
                } 
                else if (currentStep === 'CONFIRM_TOKEN') {
                    const pilihBenar = hasil.includes("benar") || hasil.includes("ya") || hasil.includes("betul") || hasil.includes("gabung");
                    const pilihUlang = hasil.includes("ulang") || hasil.includes("salah") || hasil.includes("bukan");

                    if (pilihBenar && !pilihUlang) {
                        clearTimeout(typingTimer);
                        validasiAkhir();
                    } else if (pilihUlang && !pilihBenar) {
                        clearTimeout(typingTimer);
                        synth.cancel();
                        if(rec) rec.abort();
                        tokenInput.value = "";
                        currentStep = 'ASK_TOKEN';
                        fieldToken.classList.remove("border-indigo-500");
                        fieldToken.classList.add("border-blue-600");
                        bicara("Mari ulangi. Silakan sebutkan kembali token ujian Anda.");
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