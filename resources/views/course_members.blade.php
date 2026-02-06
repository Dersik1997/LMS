<!DOCTYPE html>
<html lang="id" class="h-full">
    <head>
        <meta charset="UTF-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"
        />
        <title>Anggota - Struktur Data 3C | LMS Inklusi UMMI</title>
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
                            class="snap-start shrink-0 px-5 py-2 rounded-lg text-slate-500 hover:text-slate-900 font-bold text-[10px] uppercase tracking-widest transition-all whitespace-nowrap hover:bg-white/50"
                        >
                            3. Penugasan
                        </button>
                        <button
                            onclick="navigasiKe(4)"
                            class="snap-start shrink-0 px-5 py-2 rounded-lg bg-white text-blue-700 font-bold text-[10px] uppercase tracking-widest shadow-sm border border-slate-200 whitespace-nowrap transition-all"
                        >
                            4. Anggota
                        </button>
                    </nav>

                    <div
                        class="hidden md:flex items-center gap-3 pl-6 border-l border-slate-200"
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
                            class="text-[9px] font-black text-slate-400 uppercase tracking-widest"
                            >Listening</span
                        >
                    </div>
                </div>
            </div>

            <div class="max-w-6xl mx-auto w-full p-6 lg:p-8 space-y-8">
                <div
                    onclick="navigasiKe(5)"
                    class="group bg-gradient-to-br from-blue-600 to-blue-800 rounded-[2rem] p-8 text-white shadow-xl shadow-blue-200 cursor-pointer relative overflow-hidden transition-transform hover:scale-[1.01]"
                >
                    <div
                        class="relative z-10 flex flex-col md:flex-row items-center gap-6"
                    >
                        <div
                            class="w-20 h-20 rounded-full bg-white/20 border-4 border-white/10 flex items-center justify-center text-2xl font-black shadow-inner"
                        >
                            AS
                        </div>
                        <div class="flex-1 text-center md:text-left space-y-1">
                            <span
                                class="bg-blue-500/50 px-3 py-1 rounded-full text-[9px] font-black uppercase tracking-widest border border-white/10"
                                >Dosen Pengampu</span
                            >
                            <h2 class="text-2xl font-black tracking-tight">
                                Asril Adi Sunarto, S.T., M.Kom.
                            </h2>
                            <p
                                class="text-xs font-medium text-blue-100 flex items-center justify-center md:justify-start gap-2"
                            >
                                <span
                                    class="w-2 h-2 bg-emerald-400 rounded-full animate-pulse"
                                ></span>
                                Online • NIDN: 041123456
                            </p>
                        </div>
                        <button
                            class="bg-white text-blue-700 px-6 py-3 rounded-xl font-black text-[10px] uppercase tracking-widest hover:bg-blue-50 transition-all shadow-lg"
                        >
                            <span class="mr-2 opacity-50">5</span> Hubungi
                        </button>
                    </div>
                    <div
                        class="absolute right-0 top-0 w-64 h-64 bg-white/5 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2 pointer-events-none"
                    ></div>
                </div>

                <div class="space-y-6">
                    <div
                        class="flex flex-col md:flex-row items-center justify-between gap-4"
                    >
                        <h3
                            class="text-sm font-black text-slate-900 uppercase tracking-widest px-2 flex items-center gap-2"
                        >
                            Mahasiswa
                            <span
                                class="bg-slate-200 text-slate-600 px-2 py-0.5 rounded-md text-[9px]"
                                >28 Orang</span
                            >
                        </h3>

                        <div
                            onclick="navigasiKe(6)"
                            class="w-full md:w-auto bg-white px-4 py-2 rounded-xl border border-slate-200 flex items-center gap-3 shadow-sm cursor-pointer hover:border-blue-300 transition-all group"
                        >
                            <svg
                                class="w-4 h-4 text-slate-400 group-hover:text-blue-500"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                                ></path>
                            </svg>
                            <span
                                class="text-xs font-bold text-slate-400 group-hover:text-blue-500"
                                >Cari Teman (6)...</span
                            >
                        </div>
                    </div>

                    <div
                        class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4"
                    >
                        <div
                            class="bg-white p-5 rounded-3xl border border-slate-200 shadow-sm hover:shadow-md transition-all flex items-center gap-4"
                        >
                            <div
                                class="w-12 h-12 rounded-2xl bg-indigo-50 text-indigo-600 flex items-center justify-center font-black text-sm border border-indigo-100"
                            >
                                RF
                            </div>
                            <div class="flex-1 min-w-0">
                                <h4
                                    class="text-sm font-bold text-slate-800 truncate"
                                >
                                    Ridwan Firdaus
                                </h4>
                                <p
                                    class="text-[10px] text-slate-400 font-medium"
                                >
                                    2230511041
                                </p>
                            </div>
                            <div
                                class="w-2 h-2 bg-emerald-500 rounded-full"
                                title="Online"
                            ></div>
                        </div>

                        <div
                            class="bg-white p-5 rounded-3xl border border-slate-200 shadow-sm hover:shadow-md transition-all flex items-center gap-4"
                        >
                            <div
                                class="w-12 h-12 rounded-2xl bg-orange-50 text-orange-600 flex items-center justify-center font-black text-sm border border-orange-100"
                            >
                                DA
                            </div>
                            <div class="flex-1 min-w-0">
                                <h4
                                    class="text-sm font-bold text-slate-800 truncate"
                                >
                                    Dina Aulia
                                </h4>
                                <p
                                    class="text-[10px] text-slate-400 font-medium"
                                >
                                    2230511042
                                </p>
                            </div>
                            <div
                                class="w-2 h-2 bg-slate-300 rounded-full"
                                title="Offline"
                            ></div>
                        </div>

                        <div
                            class="bg-white p-5 rounded-3xl border border-slate-200 shadow-sm hover:shadow-md transition-all flex items-center gap-4"
                        >
                            <div
                                class="w-12 h-12 rounded-2xl bg-pink-50 text-pink-600 flex items-center justify-center font-black text-sm border border-pink-100"
                            >
                                SR
                            </div>
                            <div class="flex-1 min-w-0">
                                <h4
                                    class="text-sm font-bold text-slate-800 truncate"
                                >
                                    Siti Rahmawati
                                </h4>
                                <p
                                    class="text-[10px] text-slate-400 font-medium"
                                >
                                    2230511043
                                </p>
                            </div>
                            <div
                                class="w-2 h-2 bg-emerald-500 rounded-full"
                                title="Online"
                            ></div>
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
                    tujuan = "{{ route('course.assignments') }}";
                    teks = "Membuka halaman Penugasan.";
                } else if (nomor === 4) {
                    teks = "Anda sudah di Halaman Anggota.";
                }

                // LOGIKA KONTEN HALAMAN INI (5 & 6)
                else if (nomor === 5) {
                    teks = "Membuka chat dengan Dosen Asril.";
                    setTimeout(() => alert("Fitur Chat Dosen Terbuka"), 1000);
                } else if (nomor === 6) {
                    teks = "Mengaktifkan pencarian teman.";
                    setTimeout(() => alert("Ketik nama teman..."), 1000);
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

                        if (angka) {
                            navigasiKe(parseInt(angka[0]));
                        } else if (
                            hasil.includes("nol") ||
                            hasil.includes("kembali")
                        )
                            navigasiKe(0);
                        else if (hasil.includes("satu")) navigasiKe(1);
                        else if (hasil.includes("dua")) navigasiKe(2);
                        else if (hasil.includes("tiga")) navigasiKe(3);
                        else if (hasil.includes("empat")) navigasiKe(4);
                        // Deteksi Konten Halaman Ini (Lima & Enam)
                        else if (hasil.includes("lima")) navigasiKe(5);
                        else if (hasil.includes("enam")) navigasiKe(6);
                    };
                } catch (e) {}
            }

            window.onload = () => {
                const orientasi =
                    "Anda berada di menu Anggota. " +
                    "Navigasi Utama: Satu Pembelajaran, Dua Presensi, Tiga Penugasan, Empat Anggota, Nol Kembali. " +
                    ". . . " +
                    "Dosen Pengampu: Pak Asril. " +
                    "Sebutkan nomor Lima untuk menghubungi dosen, atau Enam untuk cari teman.";

                setTimeout(() => {
                    bicara(orientasi, () => {
                        mulaiMendengar();
                    });
                }, 1000);
            };
        </script>
    </body>
</html>
