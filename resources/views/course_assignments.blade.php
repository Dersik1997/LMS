<!DOCTYPE html>
<html lang="id" class="h-full">
    <head>
        <meta charset="UTF-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"
        />
        <title>Daftar Tugas | LMS Inklusi UMMI</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link
            href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
            rel="stylesheet"
        />
        <style>
            .scrollbar-hide::-webkit-scrollbar {
                display: none;
            }
            .scrollbar-hide {
                -ms-overflow-style: none;
                scrollbar-width: none;
            }
        </style>
    </head>
    <body
        class="m-0 font-['Plus_Jakarta_Sans'] bg-[#f1f5f9] min-h-full flex flex-col border-box overflow-x-hidden text-slate-800"
    >
        <main class="flex-1 flex flex-col h-screen overflow-y-auto">
            <div
                class="bg-white px-4 md:px-6 py-4 border-b border-slate-200 sticky top-0 z-30 shadow-sm/50 backdrop-blur-xl bg-white/90 transition-all"
            >
                <div
                    class="max-w-6xl mx-auto flex flex-col md:flex-row md:items-center md:justify-between gap-4 md:gap-6"
                >
                    <div class="flex items-center gap-4 w-full md:w-auto">
                        <button
                            onclick="navigasiKe(0)"
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
                        <div class="overflow-hidden">
                            <h1
                                class="text-lg md:text-xl font-extrabold text-slate-900 tracking-tight leading-none truncate max-w-[250px] md:max-w-none"
                            >
                                Struktur Data 3C
                            </h1>
                            <p
                                class="text-[10px] font-bold text-blue-600 uppercase tracking-widest mt-1 truncate"
                            >
                                Dosen: Asril Adi Sunarto
                            </p>
                        </div>
                    </div>

                    <div class="hidden md:block w-px h-8 bg-slate-200"></div>

                    <nav
                        class="w-full md:w-auto flex p-1 bg-slate-100 rounded-xl overflow-x-auto scrollbar-hide snap-x gap-1"
                    >
                        <button
                            onclick="navigasiKe(1)"
                            class="snap-start shrink-0 px-5 py-2 rounded-lg text-slate-500 hover:text-slate-900 font-bold text-[10px] uppercase tracking-widest transition-all whitespace-nowrap hover:bg-white/50"
                        >
                            1. Pembelajaran
                        </button>
                        <button
                            onclick="navigasiKe(2)"
                            class="snap-start shrink-0 px-5 py-2 rounded-lg text-slate-500 hover:text-slate-900 font-bold text-[10px] uppercase tracking-widest transition-all whitespace-nowrap hover:bg-white/50"
                        >
                            2. Presensi
                        </button>
                        <button
                            onclick="navigasiKe(3)"
                            class="snap-start shrink-0 px-5 py-2 rounded-lg bg-white text-blue-700 font-bold text-[10px] uppercase tracking-widest shadow-sm border border-slate-200 whitespace-nowrap transition-all"
                        >
                            3. Penugasan
                        </button>
                        <button
                            onclick="navigasiKe(4)"
                            class="snap-start shrink-0 px-5 py-2 rounded-lg text-slate-500 hover:text-slate-900 font-bold text-[10px] uppercase tracking-widest transition-all whitespace-nowrap hover:bg-white/50"
                        >
                            4. Anggota
                        </button>
                    </nav>

                    <div
                        class="hidden md:flex items-center gap-3 pl-6 border-l border-slate-200"
                    >
                        <div
                            id="wave-container"
                            class="flex items-center gap-[2px] h-4 w-10 justify-center"
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
                            class="text-[9px] font-black text-slate-400 uppercase tracking-widest"
                            >Listening</span
                        >
                    </div>
                </div>
            </div>

            <div class="max-w-6xl mx-auto w-full p-6 lg:p-8 space-y-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div
                        class="bg-white p-6 rounded-[2rem] border border-slate-200 shadow-sm flex items-center gap-4"
                    >
                        <div
                            class="w-12 h-12 rounded-2xl bg-blue-50 text-blue-600 flex items-center justify-center"
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
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"
                                ></path>
                            </svg>
                        </div>
                        <div>
                            <h3
                                class="text-2xl font-black text-slate-900 leading-none"
                            >
                                4 Tugas
                            </h3>
                            <p
                                class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mt-1"
                            >
                                Total Semester Ini
                            </p>
                        </div>
                    </div>
                    <div
                        class="bg-white p-6 rounded-[2rem] border border-orange-200 shadow-sm flex items-center gap-4 relative overflow-hidden"
                    >
                        <div
                            class="w-12 h-12 rounded-2xl bg-orange-50 text-orange-600 flex items-center justify-center"
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
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
                                ></path>
                            </svg>
                        </div>
                        <div>
                            <h3
                                class="text-2xl font-black text-orange-600 leading-none"
                            >
                                2 Aktif
                            </h3>
                            <p
                                class="text-[10px] font-bold text-orange-400 uppercase tracking-widest mt-1"
                            >
                                Perlu Dikerjakan
                            </p>
                        </div>
                    </div>
                    <div
                        class="bg-white p-6 rounded-[2rem] border border-emerald-200 shadow-sm flex items-center gap-4"
                    >
                        <div
                            class="w-12 h-12 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center"
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
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                                ></path>
                            </svg>
                        </div>
                        <div>
                            <h3
                                class="text-2xl font-black text-emerald-600 leading-none"
                            >
                                2 Selesai
                            </h3>
                            <p
                                class="text-[10px] font-bold text-emerald-400 uppercase tracking-widest mt-1"
                            >
                                Sudah Dinilai
                            </p>
                        </div>
                    </div>
                </div>

                <div class="space-y-8">
                    <div>
                        <div
                            class="flex items-center justify-between mb-4 px-2"
                        >
                            <h3
                                class="text-sm font-black text-slate-900 uppercase tracking-widest"
                            >
                                Perlu Dikerjakan
                            </h3>
                        </div>
                        <div
                            class="bg-white rounded-[2.5rem] p-6 border border-slate-200 shadow-sm space-y-4"
                        >
                            <div
                                onclick="navigasiKe(5)"
                                class="group flex flex-col md:flex-row items-start md:items-center gap-4 p-4 rounded-2xl border border-slate-100 hover:border-orange-200 hover:bg-orange-50/30 transition-all cursor-pointer relative overflow-hidden"
                            >
                                <div
                                    class="absolute left-0 top-0 bottom-0 w-1 bg-orange-400 rounded-l-2xl"
                                ></div>
                                <div class="flex items-center gap-4 flex-1">
                                    <div
                                        class="w-12 h-12 rounded-xl bg-orange-100 text-orange-700 flex items-center justify-center shrink-0 font-black text-sm shadow-sm group-hover:scale-105 transition-transform"
                                    >
                                        5
                                    </div>
                                    <div>
                                        <h4
                                            class="text-sm font-bold text-slate-800 group-hover:text-orange-800 transition-colors"
                                        >
                                            Laporan Praktikum Modul 2: Array
                                        </h4>
                                        <div
                                            class="flex items-center gap-2 mt-1 text-xs font-medium text-orange-600"
                                        >
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
                                            <span
                                                >Tenggat: Besok, 23:59 WIB</span
                                            >
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="flex flex-col md:flex-row items-end md:items-center gap-3 shrink-0 mt-3 md:mt-0 w-full md:w-auto"
                                >
                                    <span
                                        class="px-3 py-1 rounded-full bg-orange-100 text-orange-700 text-[9px] font-bold uppercase tracking-widest"
                                        >Belum Dikumpulkan</span
                                    >
                                    <button
                                        class="w-full md:w-auto px-4 py-2 rounded-xl bg-white border-2 border-orange-100 text-orange-700 font-bold text-[10px] uppercase tracking-widest hover:bg-orange-600 hover:text-white hover:border-transparent transition-all"
                                    >
                                        Buka
                                    </button>
                                </div>
                            </div>

                            <div
                                onclick="navigasiKe(6)"
                                class="group flex flex-col md:flex-row items-start md:items-center gap-4 p-4 rounded-2xl border border-slate-100 hover:border-blue-200 hover:bg-blue-50/30 transition-all cursor-pointer relative overflow-hidden"
                            >
                                <div
                                    class="absolute left-0 top-0 bottom-0 w-1 bg-blue-400 rounded-l-2xl"
                                ></div>
                                <div class="flex items-center gap-4 flex-1">
                                    <div
                                        class="w-12 h-12 rounded-xl bg-blue-100 text-blue-700 flex items-center justify-center shrink-0 font-black text-sm shadow-sm group-hover:scale-105 transition-transform"
                                    >
                                        6
                                    </div>
                                    <div>
                                        <h4
                                            class="text-sm font-bold text-slate-800 group-hover:text-blue-800 transition-colors"
                                        >
                                            Tugas Analisis Linked List
                                        </h4>
                                        <div
                                            class="flex items-center gap-2 mt-1 text-xs font-medium text-slate-500"
                                        >
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
                                            <span
                                                >Tenggat: 25 Okt, 23:59
                                                WIB</span
                                            >
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="flex flex-col md:flex-row items-end md:items-center gap-3 shrink-0 mt-3 md:mt-0 w-full md:w-auto"
                                >
                                    <span
                                        class="px-3 py-1 rounded-full bg-slate-100 text-slate-600 text-[9px] font-bold uppercase tracking-widest"
                                        >Baru Dibuka</span
                                    >
                                    <button
                                        class="w-full md:w-auto px-4 py-2 rounded-xl bg-white border-2 border-blue-100 text-blue-700 font-bold text-[10px] uppercase tracking-widest hover:bg-blue-600 hover:text-white hover:border-transparent transition-all"
                                    >
                                        Buka
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="opacity-90">
                        <div
                            class="flex items-center justify-between mb-4 px-2"
                        >
                            <h3
                                class="text-sm font-black text-slate-900 uppercase tracking-widest"
                            >
                                Riwayat Selesai
                            </h3>
                        </div>
                        <div
                            class="bg-white rounded-[2.5rem] p-6 border border-slate-200 shadow-sm space-y-4"
                        >
                            <div
                                onclick="navigasiKe(7)"
                                class="group flex flex-col md:flex-row items-start md:items-center gap-4 p-4 rounded-2xl border border-slate-100 bg-emerald-50/20 hover:border-emerald-200 hover:bg-emerald-50 transition-all cursor-pointer relative overflow-hidden"
                            >
                                <div
                                    class="absolute left-0 top-0 bottom-0 w-1 bg-emerald-400 rounded-l-2xl"
                                ></div>
                                <div class="flex items-center gap-4 flex-1">
                                    <div
                                        class="w-12 h-12 rounded-xl bg-emerald-100 text-emerald-700 flex items-center justify-center shrink-0 font-black text-sm shadow-sm"
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
                                                stroke-width="3"
                                                d="M5 13l4 4L19 7"
                                            ></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="flex items-center gap-2">
                                            <span
                                                class="bg-emerald-600 text-white text-[8px] font-black px-1.5 py-0.5 rounded"
                                                >7</span
                                            >
                                            <h4
                                                class="text-sm font-bold text-slate-800"
                                            >
                                                Laporan Praktikum Modul 1
                                            </h4>
                                        </div>
                                        <p
                                            class="text-xs font-medium text-emerald-600 mt-1"
                                        >
                                            Diserahkan: 17 Okt 2025
                                        </p>
                                    </div>
                                </div>
                                <div
                                    class="flex flex-col items-end justify-center"
                                >
                                    <span
                                        class="text-2xl font-black text-emerald-600"
                                        >100</span
                                    >
                                    <span
                                        class="text-[9px] font-bold text-emerald-400 uppercase tracking-widest"
                                        >Nilai (A)</span
                                    >
                                </div>
                            </div>

                            <div
                                onclick="navigasiKe(8)"
                                class="group flex flex-col md:flex-row items-start md:items-center gap-4 p-4 rounded-2xl border border-slate-100 bg-emerald-50/20 hover:border-emerald-200 hover:bg-emerald-50 transition-all cursor-pointer relative overflow-hidden"
                            >
                                <div
                                    class="absolute left-0 top-0 bottom-0 w-1 bg-emerald-400 rounded-l-2xl"
                                ></div>
                                <div class="flex items-center gap-4 flex-1">
                                    <div
                                        class="w-12 h-12 rounded-xl bg-emerald-100 text-emerald-700 flex items-center justify-center shrink-0 font-black text-sm shadow-sm"
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
                                                stroke-width="3"
                                                d="M5 13l4 4L19 7"
                                            ></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="flex items-center gap-2">
                                            <span
                                                class="bg-emerald-600 text-white text-[8px] font-black px-1.5 py-0.5 rounded"
                                                >8</span
                                            >
                                            <h4
                                                class="text-sm font-bold text-slate-800"
                                            >
                                                Quiz Pre-Test Logika
                                            </h4>
                                        </div>
                                        <p
                                            class="text-xs font-medium text-emerald-600 mt-1"
                                        >
                                            Diserahkan: 10 Okt 2025
                                        </p>
                                    </div>
                                </div>
                                <div
                                    class="flex flex-col items-end justify-center"
                                >
                                    <span
                                        class="text-2xl font-black text-emerald-600"
                                        >85</span
                                    >
                                    <span
                                        class="text-[9px] font-bold text-emerald-400 uppercase tracking-widest"
                                        >Nilai (B)</span
                                    >
                                </div>
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

                if (nomor === 0) {
                    tujuan = "{{ route('dashboard') }}";
                    teks = "Kembali ke Beranda.";
                } else if (nomor === 1) {
                    tujuan = "{{ route('course.detail') }}";
                    teks = "Membuka Menu Pembelajaran.";
                } else if (nomor === 2) {
                    tujuan = "{{ route('course.attendance') }}";
                    teks = "Membuka halaman Presensi.";
                } else if (nomor === 3) {
                    teks = "Anda sudah di halaman Penugasan.";
                } else if (nomor === 4) {
                    tujuan = "{{ route('course.members') }}";
                    teks = "Membuka daftar Anggota.";
                }

                // TUGAS
                else if (nomor === 5) {
                    tujuan = "{{ route('assignment.detail') }}";
                    teks = "Membuka Laporan Modul 2.";
                } else if (nomor === 6) {
                    tujuan = "{{ route('assignment.detail') }}";
                    teks = "Membuka Tugas Analisis.";
                } else if (nomor === 7) {
                    tujuan = "{{ route('assignment.detail') }}";
                    teks = "Membuka Laporan Modul 1.";
                } else if (nomor === 8) {
                    tujuan = "{{ route('assignment.detail') }}";
                    teks = "Membuka Quiz.";
                }

                if (teks !== "") bicara(teks);
                if (tujuan !== "")
                    setTimeout(() => {
                        window.location.href = tujuan;
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
                        else if (hasil.includes("nol")) navigasiKe(0);
                        else if (hasil.includes("satu")) navigasiKe(1);
                        else if (hasil.includes("dua")) navigasiKe(2);
                        else if (hasil.includes("tiga")) navigasiKe(3);
                        else if (hasil.includes("empat")) navigasiKe(4);
                        else if (hasil.includes("lima")) navigasiKe(5);
                        else if (hasil.includes("enam")) navigasiKe(6);
                        else if (hasil.includes("tujuh")) navigasiKe(7);
                        else if (hasil.includes("delapan")) navigasiKe(8);
                    };
                } catch (e) {}
            }

            window.onload = () => {
                const orientasi =
                    "Daftar Tugas. 5 dan 6 Tugas Aktif. 7 dan 8 Tugas Selesai. Sebutkan nomor untuk membuka.";
                setTimeout(() => {
                    bicara(orientasi, () => {
                        mulaiMendengar();
                    });
                }, 1000);
            };
        </script>
    </body>
</html>
