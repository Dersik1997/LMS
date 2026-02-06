<!DOCTYPE html>
<html lang="id" class="h-full">
    <head>
        <meta charset="UTF-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"
        />
        <title>Ujian Online | LMS Inklusi UMMI</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link
            href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
            rel="stylesheet"
        />
    </head>
    <body
        class="m-0 font-['Plus_Jakarta_Sans'] bg-[#f1f5f9] min-h-full flex flex-col border-box overflow-x-hidden text-slate-800"
    >
        <main class="flex-1 flex flex-col h-screen overflow-y-auto">
            <div
                class="bg-white px-6 py-6 border-b border-slate-200 sticky top-0 z-20 shadow-sm/50 backdrop-blur-xl bg-white/90"
            >
                <div
                    class="max-w-5xl mx-auto flex items-center justify-between"
                >
                    <button
                        onclick="navigasiKe(4)"
                        class="group flex items-center gap-3 text-slate-500 hover:text-blue-600 transition-all"
                    >
                        <div
                            class="w-10 h-10 rounded-full bg-slate-50 border border-slate-200 flex items-center justify-center shadow-sm group-hover:bg-blue-600 group-hover:border-blue-600 group-hover:text-white transition-all"
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
                        </div>
                        <div>
                            <span
                                class="text-[9px] font-bold uppercase tracking-widest block text-slate-400"
                                >Kembali ke Dashboard (4)</span
                            >
                            <h1
                                class="text-lg font-black text-slate-900 tracking-tight"
                            >
                                Ujian Online
                            </h1>
                        </div>
                    </button>

                    <div
                        class="flex items-center gap-3 bg-white border border-slate-200 rounded-full px-4 py-2 shadow-sm"
                    >
                        <div
                            id="wave-container"
                            class="flex items-center gap-[2px] h-4 w-8 justify-center"
                        >
                            <div
                                class="wave-bar w-[2px] bg-blue-500 rounded-full h-1"
                            ></div>
                            <div
                                class="wave-bar w-[2px] bg-indigo-500 rounded-full h-2"
                            ></div>
                            <div
                                class="wave-bar w-[2px] bg-blue-400 rounded-full h-1"
                            ></div>
                        </div>
                        <span
                            id="status-desc"
                            class="text-[9px] font-black text-slate-400 uppercase tracking-widest"
                            >Aktif</span
                        >
                    </div>
                </div>
            </div>

            <div class="max-w-5xl mx-auto w-full p-6 space-y-6">
                <div
                    onclick="navigasiKe(55)"
                    class="group bg-gradient-to-r from-purple-600 to-indigo-600 rounded-[2.5rem] p-8 text-white shadow-xl shadow-indigo-200 cursor-pointer relative overflow-hidden"
                >
                    <div
                        class="relative z-10 flex flex-col md:flex-row items-center justify-between gap-6"
                    >
                        <div class="flex items-center gap-6">
                            <div
                                class="w-16 h-16 rounded-2xl bg-white/20 border border-white/10 flex items-center justify-center backdrop-blur-md"
                            >
                                <svg
                                    class="w-8 h-8 text-white"
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
                            <div>
                                <h2 class="text-2xl font-black tracking-tight">
                                    Punya Token Ujian?
                                </h2>
                                <p
                                    class="text-indigo-100 text-sm font-medium mt-1"
                                >
                                    Gabung ujian dadakan atau kuis khusus
                                    menggunakan kode.
                                </p>
                            </div>
                        </div>
                        <button
                            class="bg-white text-indigo-700 px-8 py-3 rounded-xl font-black text-[10px] uppercase tracking-widest hover:bg-indigo-50 transition-all shadow-lg flex items-center gap-2"
                        >
                            <span class="opacity-50">55</span> Masukkan Token
                        </button>
                    </div>
                    <div
                        class="absolute right-0 top-0 w-64 h-64 bg-white/10 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2 pointer-events-none"
                    ></div>
                </div>

                <div class="space-y-4">
                    <h3
                        class="text-sm font-black text-slate-900 uppercase tracking-widest px-2"
                    >
                        Ujian Tersedia
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div
                            onclick="navigasiKe(51)"
                            class="group bg-white p-6 rounded-[2rem] border-2 border-blue-500 shadow-lg shadow-blue-100 cursor-pointer hover:-translate-y-1 transition-all relative overflow-hidden"
                        >
                            <div
                                class="absolute top-0 right-0 bg-blue-500 text-white text-[9px] font-black px-4 py-1 rounded-bl-xl uppercase tracking-widest animate-pulse"
                            >
                                Sedang Berlangsung
                            </div>

                            <div class="flex justify-between items-start mb-6">
                                <div
                                    class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center font-black text-lg"
                                >
                                    51
                                </div>
                                <span
                                    class="px-3 py-1 rounded-full bg-slate-100 text-slate-500 text-[9px] font-bold uppercase tracking-widest"
                                    >Struktur Data</span
                                >
                            </div>

                            <h4 class="text-xl font-black text-slate-900 mb-2">
                                Ujian Tengah Semester
                            </h4>
                            <div
                                class="space-y-2 text-xs font-medium text-slate-500"
                            >
                                <div class="flex items-center gap-2">
                                    <svg
                                        class="w-4 h-4"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
                                        ></path>
                                    </svg>
                                    <span>24 Oktober 2025</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <svg
                                        class="w-4 h-4"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
                                        ></path>
                                    </svg>
                                    <span>08:00 - 10:00 WIB (90 Menit)</span>
                                </div>
                            </div>

                            <div
                                class="mt-6 pt-4 border-t border-slate-100 flex justify-between items-center"
                            >
                                <span
                                    class="text-[9px] font-bold text-slate-400 uppercase tracking-widest"
                                    >40 Soal PG</span
                                >
                                <span
                                    class="text-blue-600 font-bold text-xs group-hover:underline"
                                    >Kerjakan Sekarang &rarr;</span
                                >
                            </div>
                        </div>

                        <div
                            onclick="navigasiKe(52)"
                            class="group bg-white p-6 rounded-[2rem] border border-slate-200 shadow-sm cursor-pointer hover:border-slate-300 transition-all"
                        >
                            <div class="flex justify-between items-start mb-6">
                                <div
                                    class="w-12 h-12 rounded-xl bg-slate-100 text-slate-500 flex items-center justify-center font-black text-lg"
                                >
                                    52
                                </div>
                                <span
                                    class="px-3 py-1 rounded-full bg-slate-100 text-slate-500 text-[9px] font-bold uppercase tracking-widest"
                                    >Basis Data</span
                                >
                            </div>

                            <h4 class="text-xl font-black text-slate-900 mb-2">
                                Kuis 1: Normalisasi
                            </h4>
                            <div
                                class="space-y-2 text-xs font-medium text-slate-500"
                            >
                                <div class="flex items-center gap-2">
                                    <svg
                                        class="w-4 h-4"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
                                        ></path>
                                    </svg>
                                    <span>26 Oktober 2025</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <svg
                                        class="w-4 h-4"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
                                        ></path>
                                    </svg>
                                    <span>13:00 WIB (30 Menit)</span>
                                </div>
                            </div>

                            <div
                                class="mt-6 pt-4 border-t border-slate-100 flex justify-between items-center"
                            >
                                <span
                                    class="text-[9px] font-bold text-slate-400 uppercase tracking-widest"
                                    >10 Soal Esai</span
                                >
                                <span class="text-slate-400 font-bold text-xs"
                                    >Belum Dibuka</span
                                >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <script>
            const statusDesc = document.getElementById("status-desc");
            const waveBars = document.querySelectorAll(".wave-bar");
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
                    if (statusDesc) statusDesc.innerText = "Speaking";
                    interval = setInterval(() => setWave(true), 150);
                };
                utter.onend = () => {
                    if (statusDesc) statusDesc.innerText = "Listening";
                    clearInterval(interval);
                    setWave(false);
                    if (callback) callback();
                };
                synth.speak(utter);
            }

            function navigasiKe(nomor) {
                let tujuan = "";
                let teks = "";

                if (nomor === 4) {
                    tujuan = "{{ route('dashboard') }}";
                    teks = "Kembali ke Dashboard.";
                } else if (nomor === 55) {
                    tujuan = "{{ route('join.exam') }}";
                    teks = "Membuka halaman masukkan token ujian.";
                } else if (nomor === 51) {
                    tujuan = "{{ route('exam.start') }}";
                    teks = "Memulai Ujian Tengah Semester.";
                } else if (nomor === 52) {
                    teks = "Ujian Basis Data belum dimulai.";
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
                    };
                } catch (e) {}
            }

            window.onload = () => {
                const orientasi =
                    "Halaman Ujian Online. Sebutkan lima puluh satu untuk mulai UTS Struktur Data. Sebutkan lima puluh lima untuk memasukkan Token Ujian.";
                bicara(orientasi, () => {
                    mulaiMendengar();
                });
            };
        </script>
    </body>
</html>
