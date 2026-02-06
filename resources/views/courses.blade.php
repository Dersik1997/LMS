<!DOCTYPE html>
<html lang="id" class="h-full">
    <head>
        <meta charset="UTF-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"
        />
        <title>Daftar Mata Kuliah | LMS Inklusi UMMI</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link
            href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
            rel="stylesheet"
        />
    </head>
    <body
        class="m-0 font-['Plus_Jakarta_Sans'] bg-[#f8fafc] min-h-full flex flex-col border-box overflow-x-hidden text-slate-800"
    >
        <div
            class="fixed top-0 left-0 w-full h-full overflow-hidden -z-10 pointer-events-none"
        >
            <div
                class="absolute top-[-10%] right-[-5%] w-[400px] h-[400px] bg-blue-100/40 rounded-full blur-3xl opacity-50"
            ></div>
            <div
                class="absolute bottom-[-10%] left-[-10%] w-[400px] h-[400px] bg-indigo-50/40 rounded-full blur-3xl opacity-50"
            ></div>
        </div>

        <main class="flex-1 flex flex-col h-screen overflow-y-auto">
            <div
                class="bg-white/80 backdrop-blur-md border-b border-slate-200/60 sticky top-0 z-30 px-6 py-4"
            >
                <div
                    class="max-w-6xl mx-auto flex items-center justify-between"
                >
                    <div class="flex items-center gap-4">
                        <button
                            onclick="navigasiKe(4)"
                            class="w-10 h-10 rounded-full bg-slate-50 hover:bg-blue-50 text-slate-400 hover:text-blue-600 flex items-center justify-center transition-all border border-slate-200 shrink-0"
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
                        </button>
                    </div>

                    <div
                        class="text-center absolute left-1/2 transform -translate-x-1/2"
                    >
                        <h1
                            class="text-lg md:text-xl font-extrabold text-slate-900 tracking-tight leading-none"
                        >
                            Daftar Mata Kuliah
                        </h1>
                        <p
                            class="text-[10px] font-bold text-blue-600 uppercase tracking-widest mt-1"
                        >
                            Sem. Ganjil 2025/2026
                        </p>
                    </div>

                    <div
                        class="flex items-center gap-3 pl-6 border-l border-slate-200"
                    >
                        <div
                            class="flex items-center gap-[2px] h-4 w-10 justify-center"
                            id="wave-container"
                        >
                            <div
                                class="wave-bar w-[2px] bg-blue-500 rounded-full h-1"
                            ></div>
                            <div
                                class="wave-bar w-[2px] bg-blue-400 rounded-full h-1"
                            ></div>
                            <div
                                class="wave-bar w-[2px] bg-blue-600 rounded-full h-1"
                            ></div>
                        </div>
                        <span
                            id="status-desc"
                            class="hidden md:block text-[9px] font-black text-slate-400 uppercase tracking-widest"
                            >Listening</span
                        >
                    </div>
                </div>
            </div>

            <div class="max-w-6xl mx-auto w-full p-6 space-y-4">
                <div class="grid grid-cols-1 gap-4">
                    <div
                        onclick="navigasiKe(11)"
                        class="group relative bg-white rounded-3xl p-5 border border-slate-100 shadow-sm hover:shadow-lg hover:-translate-y-0.5 transition-all duration-300 cursor-pointer overflow-hidden flex items-center gap-5"
                    >
                        <div
                            class="absolute left-0 top-0 bottom-0 w-1 bg-blue-500 group-hover:w-1.5 transition-all"
                        ></div>
                        <div
                            class="w-14 h-14 rounded-2xl bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 border border-blue-100 group-hover:bg-blue-600 group-hover:text-white transition-all shadow-inner"
                        >
                            <span class="text-xl font-black tracking-tighter"
                                >11</span
                            >
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center gap-2 mb-1">
                                <h2
                                    class="text-base font-black text-slate-900 group-hover:text-blue-700 transition-colors tracking-tight truncate"
                                >
                                    Struktur Data 3C
                                </h2>
                                <span
                                    class="px-2 py-0.5 rounded-md bg-emerald-50 text-emerald-600 text-[9px] font-bold uppercase border border-emerald-100 shrink-0"
                                    >3 SKS</span
                                >
                            </div>
                            <div
                                class="flex items-center gap-2 text-xs font-medium text-slate-400 mb-2"
                            >
                                <span>GD48453IP</span>
                                <span
                                    class="w-1 h-1 rounded-full bg-slate-300"
                                ></span>
                                <span class="truncate"
                                    >Linier & Non-Linier Data</span
                                >
                            </div>
                            <div class="flex items-center gap-2">
                                <div
                                    class="flex-1 h-1.5 bg-slate-100 rounded-full overflow-hidden max-w-[120px]"
                                >
                                    <div
                                        class="h-full bg-blue-500 rounded-full w-[47%]"
                                    ></div>
                                </div>
                                <span class="text-[9px] font-bold text-blue-600"
                                    >47%</span
                                >
                            </div>
                        </div>
                        <button
                            class="hidden sm:block bg-slate-900 text-white px-5 py-2.5 rounded-xl font-bold text-[10px] uppercase tracking-wider shadow-md hover:bg-blue-600 transition-all shrink-0"
                        >
                            Masuk
                        </button>
                    </div>

                    <div
                        onclick="navigasiKe(12)"
                        class="group relative bg-white rounded-3xl p-5 border border-slate-100 shadow-sm hover:shadow-lg hover:-translate-y-0.5 transition-all duration-300 cursor-pointer overflow-hidden flex items-center gap-5"
                    >
                        <div
                            class="absolute left-0 top-0 bottom-0 w-1 bg-orange-500 group-hover:w-1.5 transition-all"
                        ></div>
                        <div
                            class="w-14 h-14 rounded-2xl bg-orange-50 text-orange-600 flex items-center justify-center shrink-0 border border-orange-100 group-hover:bg-orange-600 group-hover:text-white transition-all shadow-inner"
                        >
                            <span class="text-xl font-black tracking-tighter"
                                >12</span
                            >
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center gap-2 mb-1">
                                <h2
                                    class="text-base font-black text-slate-900 group-hover:text-orange-700 transition-colors tracking-tight truncate"
                                >
                                    Pemograman Berorientasi Objek
                                </h2>
                                <span
                                    class="px-2 py-0.5 rounded-md bg-emerald-50 text-emerald-600 text-[9px] font-bold uppercase border border-emerald-100 shrink-0"
                                    >3 SKS</span
                                >
                            </div>
                            <div
                                class="flex items-center gap-2 text-xs font-medium text-slate-400 mb-2"
                            >
                                <span>IJ48145HI</span>
                                <span
                                    class="w-1 h-1 rounded-full bg-slate-300"
                                ></span>
                                <span class="truncate">OOP Concepts</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <div
                                    class="flex-1 h-1.5 bg-slate-100 rounded-full overflow-hidden max-w-[120px]"
                                >
                                    <div
                                        class="h-full bg-orange-500 rounded-full w-[25%]"
                                    ></div>
                                </div>
                                <span
                                    class="text-[9px] font-bold text-orange-600"
                                    >25%</span
                                >
                            </div>
                        </div>
                        <button
                            class="hidden sm:block bg-slate-900 text-white px-5 py-2.5 rounded-xl font-bold text-[10px] uppercase tracking-wider shadow-md hover:bg-orange-600 transition-all shrink-0"
                        >
                            Masuk
                        </button>
                    </div>

                    <div
                        onclick="navigasiKe(13)"
                        class="group relative bg-white rounded-3xl p-5 border border-slate-100 shadow-sm hover:shadow-lg hover:-translate-y-0.5 transition-all duration-300 cursor-pointer overflow-hidden flex items-center gap-5"
                    >
                        <div
                            class="absolute left-0 top-0 bottom-0 w-1 bg-indigo-500 group-hover:w-1.5 transition-all"
                        ></div>
                        <div
                            class="w-14 h-14 rounded-2xl bg-indigo-50 text-indigo-600 flex items-center justify-center shrink-0 border border-indigo-100 group-hover:bg-indigo-600 group-hover:text-white transition-all shadow-inner"
                        >
                            <span class="text-xl font-black tracking-tighter"
                                >13</span
                            >
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center gap-2 mb-1">
                                <h2
                                    class="text-base font-black text-slate-900 group-hover:text-indigo-700 transition-colors tracking-tight truncate"
                                >
                                    Basis Data
                                </h2>
                                <span
                                    class="px-2 py-0.5 rounded-md bg-emerald-50 text-emerald-600 text-[9px] font-bold uppercase border border-emerald-100 shrink-0"
                                    >2 SKS</span
                                >
                            </div>
                            <div
                                class="flex items-center gap-2 text-xs font-medium text-slate-400 mb-2"
                            >
                                <span>VF48139AV</span>
                                <span
                                    class="w-1 h-1 rounded-full bg-slate-300"
                                ></span>
                                <span class="truncate">Relational DB</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <div
                                    class="flex-1 h-1.5 bg-slate-100 rounded-full overflow-hidden max-w-[120px]"
                                >
                                    <div
                                        class="h-full bg-indigo-500 rounded-full w-[10%]"
                                    ></div>
                                </div>
                                <span
                                    class="text-[9px] font-bold text-indigo-600"
                                    >10%</span
                                >
                            </div>
                        </div>
                        <button
                            class="hidden sm:block bg-slate-900 text-white px-5 py-2.5 rounded-xl font-bold text-[10px] uppercase tracking-wider shadow-md hover:bg-indigo-600 transition-all shrink-0"
                        >
                            Masuk
                        </button>
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
                if (waveBars.length > 0) {
                    waveBars.forEach((bar) => {
                        bar.style.height = active
                            ? `${Math.floor(Math.random() * 12) + 4}px`
                            : "4px";
                    });
                }
            }

            let interval;
            function bicara(teks, callback) {
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
                    teks = "Kembali ke Beranda.";
                } else if (nomor === 11) {
                    tujuan = "{{ route('course.detail') }}";
                    teks = "Membuka Detail Mata Kuliah Struktur Data.";
                } else if (nomor === 12) {
                    tujuan = "{{ route('course.detail') }}";
                    teks =
                        "Membuka Detail Mata Kuliah Pemograman Berorientasi Objek.";
                } else if (nomor === 13) {
                    tujuan = "{{ route('course.detail') }}";
                    teks = "Membuka Detail Mata Kuliah Basis Data.";
                }

                if (teks !== "") {
                    bicara(teks);
                    setTimeout(() => {
                        if (tujuan !== "") window.location.href = tujuan;
                    }, 1500);
                }
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

                        if (angka) {
                            navigasiKe(parseInt(angka[0]));
                        } else if (hasil.includes("sebelas")) {
                            navigasiKe(11);
                        } else if (hasil.includes("dua belas")) {
                            navigasiKe(12);
                        } else if (hasil.includes("tiga belas")) {
                            navigasiKe(13);
                        } else if (
                            hasil.includes("empat") ||
                            hasil.includes("kembali")
                        ) {
                            navigasiKe(4);
                        }
                    };
                } catch (e) {}
            }

            window.onload = () => {
                const orientasi =
                    "Daftar mata kuliah aktif. Sebutkan angka sebelas untuk Struktur Data, dua belas untuk PBO, atau tiga belas untuk Basis Data. Sebutkan nomor empat untuk kembali.";

                setTimeout(() => {
                    bicara(orientasi, () => {
                        mulaiMendengar();
                    });
                }, 1000);
            };
        </script>
    </body>
</html>
