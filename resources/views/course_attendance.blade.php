<!DOCTYPE html>
<html lang="id" class="h-full">
    <head>
        <meta charset="UTF-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"
        />
        <title>Presensi - Struktur Data 3C | LMS Inklusi UMMI</title>
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
                            class="snap-start shrink-0 px-5 py-2 rounded-lg bg-white text-blue-700 font-bold text-[10px] uppercase tracking-widest shadow-sm border border-slate-200 whitespace-nowrap transition-all"
                        >
                            2. Presensi
                        </button>
                        <button
                            onclick="navigasiKe(3)"
                            class="snap-start shrink-0 px-5 py-2 rounded-lg text-slate-500 hover:text-slate-900 font-bold text-[10px] uppercase tracking-widest transition-all whitespace-nowrap hover:bg-white/50"
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
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <div
                        class="bg-blue-600 text-white p-6 rounded-[2rem] shadow-lg shadow-blue-200 flex flex-col justify-between h-32 relative overflow-hidden group"
                    >
                        <div class="relative z-10">
                            <h3 class="text-4xl font-black tracking-tighter">
                                100%
                            </h3>
                            <p
                                class="text-[9px] font-bold text-blue-200 uppercase tracking-widest mt-1"
                            >
                                Total Kehadiran
                            </p>
                        </div>
                        <div
                            class="absolute -right-4 -bottom-4 opacity-20 group-hover:scale-110 transition-transform"
                        >
                            <svg
                                class="w-24 h-24"
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
                    </div>
                    <div
                        class="bg-white p-6 rounded-[2rem] border border-emerald-100 shadow-sm flex flex-col justify-center items-center text-center"
                    >
                        <div
                            class="w-10 h-10 rounded-full bg-emerald-50 text-emerald-600 flex items-center justify-center mb-2"
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
                        <span class="text-2xl font-black text-slate-900">2</span
                        ><span
                            class="text-[9px] font-bold text-slate-400 uppercase tracking-widest"
                            >Hadir</span
                        >
                    </div>
                    <div
                        class="bg-white p-6 rounded-[2rem] border border-orange-100 shadow-sm flex flex-col justify-center items-center text-center"
                    >
                        <div
                            class="w-10 h-10 rounded-full bg-orange-50 text-orange-600 flex items-center justify-center mb-2"
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
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
                                ></path>
                            </svg>
                        </div>
                        <span class="text-2xl font-black text-slate-900">0</span
                        ><span
                            class="text-[9px] font-bold text-slate-400 uppercase tracking-widest"
                            >Izin/Sakit</span
                        >
                    </div>
                    <div
                        class="bg-white p-6 rounded-[2rem] border border-red-100 shadow-sm flex flex-col justify-center items-center text-center"
                    >
                        <div
                            class="w-10 h-10 rounded-full bg-red-50 text-red-600 flex items-center justify-center mb-2"
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
                                    d="M6 18L18 6M6 6l12 12"
                                ></path>
                            </svg>
                        </div>
                        <span class="text-2xl font-black text-slate-900">0</span
                        ><span
                            class="text-[9px] font-bold text-slate-400 uppercase tracking-widest"
                            >Alpha</span
                        >
                    </div>
                </div>

                <div class="space-y-4">
                    <h3
                        class="text-sm font-black text-slate-900 uppercase tracking-widest px-2"
                    >
                        Riwayat Pertemuan
                    </h3>

                    <div
                        class="group bg-white rounded-[2.5rem] p-1 border-2 border-blue-500 shadow-lg shadow-blue-100 relative overflow-hidden transition-transform hover:scale-[1.01]"
                    >
                        <div
                            class="absolute top-0 right-0 bg-blue-500 text-white text-[9px] font-black px-4 py-1 rounded-bl-xl uppercase tracking-widest"
                        >
                            Sedang Berlangsung
                        </div>

                        <div class="p-6">
                            <div
                                class="flex flex-col md:flex-row items-center gap-6 mb-6"
                            >
                                <div
                                    class="w-20 h-20 rounded-2xl bg-blue-50 text-blue-600 flex flex-col items-center justify-center shrink-0 border border-blue-100"
                                >
                                    <span
                                        class="text-[10px] font-black uppercase tracking-widest text-blue-400"
                                        >OKT</span
                                    >
                                    <span class="text-3xl font-black">24</span>
                                </div>
                                <div class="flex-1 text-center md:text-left">
                                    <h4
                                        class="text-lg font-black text-slate-900"
                                    >
                                        Pertemuan 3: Linked List
                                    </h4>
                                    <p
                                        class="text-xs font-medium text-slate-500 mt-1"
                                    >
                                        Silahkan isi kehadiran sebelum pukul
                                        10:00 WIB.
                                    </p>
                                    <div
                                        class="mt-3 inline-flex items-center gap-2 bg-blue-50 px-3 py-1 rounded-lg"
                                    >
                                        <span
                                            class="w-2 h-2 bg-blue-500 rounded-full animate-pulse"
                                        ></span>
                                        <span
                                            class="text-[9px] font-bold text-blue-600 uppercase tracking-widest"
                                            >Presensi Dibuka</span
                                        >
                                    </div>
                                </div>
                            </div>

                            <div
                                class="grid grid-cols-1 md:grid-cols-3 gap-4 pt-4 border-t border-slate-100"
                            >
                                <button
                                    onclick="navigasiKe(5)"
                                    class="flex items-center justify-center gap-3 w-full bg-emerald-500 text-white px-6 py-4 rounded-2xl font-black text-[10px] uppercase tracking-[0.2em] shadow-lg hover:bg-emerald-600 hover:-translate-y-1 transition-all"
                                >
                                    <span
                                        class="bg-white/20 w-6 h-6 rounded-full flex items-center justify-center text-xs"
                                        >5</span
                                    >
                                    Hadir
                                </button>

                                <button
                                    onclick="navigasiKe(6)"
                                    class="flex items-center justify-center gap-3 w-full bg-orange-500 text-white px-6 py-4 rounded-2xl font-black text-[10px] uppercase tracking-[0.2em] shadow-lg hover:bg-orange-600 hover:-translate-y-1 transition-all"
                                >
                                    <span
                                        class="bg-white/20 w-6 h-6 rounded-full flex items-center justify-center text-xs"
                                        >6</span
                                    >
                                    Sakit
                                </button>

                                <button
                                    onclick="navigasiKe(7)"
                                    class="flex items-center justify-center gap-3 w-full bg-blue-500 text-white px-6 py-4 rounded-2xl font-black text-[10px] uppercase tracking-[0.2em] shadow-lg hover:bg-blue-600 hover:-translate-y-1 transition-all"
                                >
                                    <span
                                        class="bg-white/20 w-6 h-6 rounded-full flex items-center justify-center text-xs"
                                        >7</span
                                    >
                                    Izin
                                </button>
                            </div>
                        </div>
                    </div>

                    <div
                        class="bg-white rounded-[2.5rem] p-6 border border-slate-200 shadow-sm flex flex-col md:flex-row items-center gap-6 opacity-60 hover:opacity-100 transition-all"
                    >
                        <div
                            class="w-16 h-16 rounded-2xl bg-slate-50 text-slate-400 flex flex-col items-center justify-center shrink-0"
                        >
                            <span
                                class="text-[8px] font-black uppercase tracking-widest"
                                >OKT</span
                            >
                            <span class="text-2xl font-black">17</span>
                        </div>
                        <div class="flex-1 text-center md:text-left">
                            <h4 class="text-base font-bold text-slate-700">
                                Pertemuan 2: Array & Memory
                            </h4>
                            <p
                                class="text-[10px] font-medium text-slate-400 mt-1"
                            >
                                08:00 - 10:00 WIB
                            </p>
                        </div>
                        <div
                            class="px-6 py-2 rounded-xl bg-emerald-50 text-emerald-600 font-black text-[10px] uppercase tracking-widest border border-emerald-100 flex items-center gap-2"
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
                                    stroke-width="3"
                                    d="M5 13l4 4L19 7"
                                ></path>
                            </svg>
                            Hadir
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
                    teks = "Anda sudah di Halaman Presensi.";
                } else if (nomor === 3) {
                    tujuan = "{{ route('course.assignments') }}";
                    teks = "Membuka Menu Penugasan.";
                } else if (nomor === 4) {
                    tujuan = "{{ route('course.members') }}";
                    teks = "Membuka Menu Anggota Kelas.";

                    // --- LOGIKA PRESENSI ---
                } else if (nomor === 5) {
                    teks = "Mencatat kehadiran: Hadir.";
                    bicara(teks, () => {
                        setTimeout(() => {
                            alert("Berhasil: Hadir!");
                        }, 500);
                    });
                    return;
                } else if (nomor === 6) {
                    teks =
                        "Mencatat kehadiran: Sakit. Silahkan upload surat dokter nanti.";
                    bicara(teks, () => {
                        setTimeout(() => {
                            alert("Berhasil: Sakit!");
                        }, 500);
                    });
                    return;
                } else if (nomor === 7) {
                    teks = "Mencatat kehadiran: Izin.";
                    bicara(teks, () => {
                        setTimeout(() => {
                            alert("Berhasil: Izin!");
                        }, 500);
                    });
                    return;
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
                        else if (
                            hasil.includes("nol") ||
                            hasil.includes("kembali")
                        )
                            navigasiKe(0);
                        else if (hasil.includes("satu")) navigasiKe(1);
                        else if (hasil.includes("dua")) navigasiKe(2);
                        else if (hasil.includes("tiga")) navigasiKe(3);
                        else if (hasil.includes("empat")) navigasiKe(4);
                        // Voice Commands Presensi
                        else if (
                            hasil.includes("lima") ||
                            hasil.includes("hadir")
                        )
                            navigasiKe(5);
                        else if (
                            hasil.includes("enam") ||
                            hasil.includes("sakit")
                        )
                            navigasiKe(6);
                        else if (
                            hasil.includes("tujuh") ||
                            hasil.includes("izin")
                        )
                            navigasiKe(7);
                    };
                } catch (e) {}
            }

            window.onload = () => {
                const orientasi =
                    "Menu Presensi. Sebutkan Lima untuk Hadir, Enam untuk Sakit, Tujuh untuk Izin. Atau Nol untuk kembali.";
                bicara(orientasi, () => {
                    mulaiMendengar();
                });
            };
        </script>
    </body>
</html>
