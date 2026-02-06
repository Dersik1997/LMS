<!DOCTYPE html>
<html lang="id" class="h-full">
    <head>
        <meta charset="UTF-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"
        />
        <title>Gabung Ujian | LMS Inklusi UMMI</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link
            href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
            rel="stylesheet"
        />
    </head>
    <body
        class="m-0 font-['Plus_Jakarta_Sans'] bg-[#f1f5f9] min-h-full flex flex-col border-box overflow-x-hidden text-slate-800"
    >
        <main
            class="flex-1 flex flex-col h-screen overflow-y-auto justify-center items-center p-6"
        >
            <div
                class="w-full max-w-lg bg-white rounded-[3rem] p-8 md:p-12 shadow-2xl shadow-indigo-100 border border-slate-200 relative overflow-hidden text-center"
            >
                <button
                    onclick="navigasiKe(50)"
                    class="absolute top-8 left-8 text-slate-400 hover:text-indigo-600 transition-all flex items-center gap-2"
                >
                    <svg
                        class="w-5 h-5"
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
                        class="text-[10px] font-black uppercase tracking-widest"
                        >Kembali (50)</span
                    >
                </button>

                <div
                    class="w-20 h-20 bg-indigo-50 text-indigo-600 rounded-3xl mx-auto flex items-center justify-center mb-6"
                >
                    <svg
                        class="w-10 h-10"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"
                        ></path>
                    </svg>
                </div>

                <h1
                    class="text-3xl font-black text-slate-900 tracking-tight mb-2"
                >
                    Gabung Ujian
                </h1>
                <p class="text-slate-500 font-medium text-sm mb-10">
                    Masukkan token yang diberikan oleh dosen pengawas.
                </p>

                <div class="mb-8 relative group" onclick="navigasiKe(56)">
                    <label
                        class="block text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-2"
                        >Token Ujian (56)</label
                    >
                    <input
                        type="text"
                        id="token-input"
                        placeholder="Contoh: X7Y-99"
                        class="w-full bg-slate-50 border-2 border-slate-200 rounded-2xl px-6 py-4 text-center text-2xl font-black text-slate-800 tracking-[0.2em] focus:outline-none focus:border-indigo-500 focus:bg-white transition-all uppercase placeholder:tracking-normal placeholder:font-bold placeholder:text-slate-300"
                    />
                    <div
                        class="absolute right-4 top-[38px] text-slate-300 group-hover:text-indigo-500 transition-colors"
                    >
                        <svg
                            class="w-6 h-6"
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
                </div>

                <button
                    onclick="navigasiKe(57)"
                    class="w-full bg-indigo-600 text-white py-4 rounded-2xl font-black text-sm uppercase tracking-[0.2em] shadow-lg shadow-indigo-200 hover:bg-indigo-700 hover:shadow-indigo-300 transition-all transform hover:-translate-y-1"
                >
                    Gabung (57)
                </button>
            </div>

            <div
                class="fixed bottom-8 bg-white border border-slate-200 px-6 py-3 rounded-full shadow-lg flex items-center gap-4"
            >
                <span
                    id="status-desc"
                    class="text-[10px] font-black text-slate-400 uppercase tracking-widest"
                    >Listening...</span
                >
                <div
                    id="wave-container"
                    class="flex items-center gap-[2px] h-4 w-10 justify-center"
                >
                    <div
                        class="wave-bar w-[2px] bg-indigo-500 rounded-full h-2"
                    ></div>
                    <div
                        class="wave-bar w-[2px] bg-purple-500 rounded-full h-3"
                    ></div>
                    <div
                        class="wave-bar w-[2px] bg-indigo-400 rounded-full h-2"
                    ></div>
                </div>
            </div>
        </main>

        <script>
            const statusDesc = document.getElementById("status-desc");
            const waveBars = document.querySelectorAll(".wave-bar");
            const tokenInput = document.getElementById("token-input");
            const synth = window.speechSynthesis;
            const SpeechRec =
                window.webkitSpeechRecognition || window.SpeechRecognition;
            const rec = new SpeechRec();
            rec.lang = "id-ID";
            rec.continuous = true;

            function setWave(active) {
                waveBars.forEach((bar) => {
                    bar.style.height = active
                        ? `${Math.floor(Math.random() * 12) + 4}px`
                        : "4px";
                });
            }

            let interval;
            function bicara(teks, callback) {
                synth.cancel();
                const utter = new SpeechSynthesisUtterance(teks);
                utter.lang = "id-ID";
                utter.onstart = () => {
                    interval = setInterval(() => setWave(true), 150);
                };
                utter.onend = () => {
                    clearInterval(interval);
                    setWave(false);
                    if (callback) callback();
                };
                synth.speak(utter);
            }

            function navigasiKe(nomor) {
                let tujuan = "";
                let teks = "";

                if (nomor === 50) {
                    tujuan = "{{ route('exams') }}";
                    teks = "Kembali ke Daftar Ujian.";
                }

                // 56: Fokus Input
                else if (nomor === 56) {
                    tokenInput.focus();
                    teks = "Silahkan eja atau ketik token ujian anda.";
                }

                // 57: Submit
                else if (nomor === 57) {
                    if (tokenInput.value.length < 3) {
                        teks =
                            "Token terlalu pendek. Silahkan periksa kembali.";
                    } else {
                        tujuan = "{{ route('exam.start') }}";
                        teks = "Token valid. Masuk ke ruang ujian.";
                    }
                }

                if (teks !== "") bicara(teks);
                setTimeout(() => {
                    if (tujuan !== "") window.location.href = tujuan;
                }, 1500);
            }

            function mulaiMendengar() {
                try {
                    rec.start();
                    rec.onresult = (event) => {
                        const hasil =
                            event.results[
                                event.results.length - 1
                            ][0].transcript.toLowerCase();
                        const angka = hasil.match(/\d+/);
                        if (angka) navigasiKe(parseInt(angka[0]));
                        // Fitur eja token sederhana (jika input fokus)
                        if (document.activeElement === tokenInput && !angka) {
                            tokenInput.value = hasil
                                .replace(/\s/g, "")
                                .toUpperCase();
                        }
                    };
                } catch (e) {}
            }

            window.onload = () => {
                const orientasi =
                    "Masukkan Token Ujian. Sebutkan lima puluh enam untuk mengetik token, atau lima puluh tujuh untuk gabung.";
                bicara(orientasi, () => {
                    mulaiMendengar();
                });
            };
        </script>
    </body>
</html>
