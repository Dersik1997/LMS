<!DOCTYPE html>
<html lang="id" class="h-full">
    <head>
        <meta charset="UTF-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"
        />
        <title>Struktur Data 3C | LMS Inklusi UMMI</title>
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
                            class="snap-start shrink-0 px-5 py-2 rounded-lg bg-white text-blue-700 font-bold text-[10px] uppercase tracking-widest shadow-sm border border-slate-200 whitespace-nowrap transition-all"
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
                            class="snap-start shrink-0 px-5 py-2 rounded-lg text-slate-500 hover:text-slate-900 font-bold text-[10px] uppercase tracking-widest transition-all whitespace-nowrap hover:bg-white/50"
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

            <div class="max-w-6xl mx-auto w-full p-4 md:p-6 lg:p-8 space-y-6">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <div class="lg:col-span-2 space-y-6">
                        <div
                            class="bg-white p-6 rounded-[2rem] border border-slate-200 shadow-sm flex flex-col md:flex-row gap-6 items-start"
                        >
                            <div
                                class="w-full md:w-1/3 h-48 md:h-40 rounded-2xl overflow-hidden relative group shrink-0"
                            >
                                <img
                                    src="{{
                                        asset('images/course-banner.jpg')
                                    }}"
                                    class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                                    alt="Thumbnail"
                                />
                                <div
                                    class="absolute top-3 left-3 bg-white/90 backdrop-blur-sm px-3 py-1 rounded-lg text-[9px] font-black uppercase tracking-widest text-slate-900"
                                >
                                    Semester 3
                                </div>
                            </div>
                            <div class="flex-1 space-y-3">
                                <h2
                                    class="text-lg font-black text-slate-900 leading-tight"
                                >
                                    Pengorganisasian Data & Memori Komputer
                                </h2>
                                <p
                                    class="text-sm font-medium text-slate-500 leading-relaxed line-clamp-3"
                                >
                                    Mempelajari struktur data linier dan
                                    non-linier seperti Array, Stack, Queue, Tree
                                    dan Graph untuk efisiensi pemrograman
                                    tingkat lanjut.
                                </p>
                                <div class="pt-2 flex gap-2">
                                    <span
                                        class="px-3 py-1 bg-blue-50 text-blue-700 text-[9px] font-bold uppercase tracking-wider rounded-lg"
                                        >3 SKS</span
                                    >
                                    <span
                                        class="px-3 py-1 bg-purple-50 text-purple-700 text-[9px] font-bold uppercase tracking-wider rounded-lg"
                                        >Wajib</span
                                    >
                                </div>
                            </div>
                        </div>

                        <div
                            class="bg-blue-600 rounded-[2rem] p-8 text-white relative overflow-hidden shadow-lg shadow-blue-200"
                        >
                            <div
                                class="relative z-10 flex flex-col md:flex-row justify-between items-start md:items-end gap-4"
                            >
                                <div>
                                    <p
                                        class="text-blue-200 text-[10px] font-bold uppercase tracking-widest mb-1"
                                    >
                                        Progres Belajar Anda
                                    </p>
                                    <h3
                                        class="text-3xl font-black tracking-tight"
                                    >
                                        47% Selesai
                                    </h3>
                                </div>
                                <button
                                    onclick="navigasiKe(12)"
                                    class="bg-white text-blue-600 px-6 py-2.5 rounded-xl text-[10px] font-black uppercase tracking-widest hover:bg-blue-50 transition-all w-full md:w-auto"
                                >
                                    Lanjut (12)
                                </button>
                            </div>
                            <div
                                class="absolute -right-6 -bottom-10 opacity-20 pointer-events-none"
                            >
                                <svg
                                    class="w-40 h-40"
                                    viewBox="0 0 200 200"
                                    fill="currentColor"
                                >
                                    <path
                                        d="M45,-75.4C58.9,-69.3,71.4,-59.1,79.9,-46.3C88.4,-33.5,92.9,-18.1,89.6,-3.3C86.3,11.5,75.2,25.7,64.2,38.2C53.2,50.7,42.3,61.5,29.9,67.3C17.5,73.1,3.6,73.9,-9.4,72.1C-22.4,70.3,-34.5,65.9,-45.6,58.8C-56.7,51.7,-66.8,41.9,-73.4,30.1C-80,18.3,-83.1,4.5,-79.8,-7.8C-76.5,-20.1,-66.8,-30.9,-56.3,-39.7C-45.8,-48.5,-34.5,-55.3,-22.8,-62.8C-11.1,-70.3,1,-78.5,14.3,-80.8L27.6,-83.1Z"
                                        transform="translate(100 100)"
                                    />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div
                        class="bg-white p-6 rounded-[2rem] border border-slate-200 shadow-sm h-fit"
                    >
                        <div class="flex items-center justify-between mb-6">
                            <h3
                                class="text-sm font-black text-slate-900 uppercase tracking-widest"
                            >
                                Alur Belajar
                            </h3>
                            <span
                                class="text-[9px] font-bold text-slate-400 bg-slate-100 px-2 py-1 rounded-md"
                                >12 Topik</span
                            >
                        </div>

                        <div class="relative space-y-0 pl-2">
                            <div
                                class="absolute top-4 left-[19px] bottom-4 w-[2px] bg-slate-100"
                            ></div>

                            <div
                                onclick="navigasiKe(11)"
                                class="relative pl-10 py-3 group cursor-pointer"
                            >
                                <div
                                    class="absolute left-[10px] top-5 w-5 h-5 rounded-full bg-emerald-500 border-4 border-white shadow-sm z-10 flex items-center justify-center"
                                >
                                    <svg
                                        class="w-2.5 h-2.5 text-white"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="4"
                                            d="M5 13l4 4L19 7"
                                        />
                                    </svg>
                                </div>
                                <div
                                    class="bg-slate-50 group-hover:bg-blue-50 p-4 rounded-2xl border border-transparent group-hover:border-blue-100 transition-all"
                                >
                                    <div
                                        class="flex justify-between items-start"
                                    >
                                        <span
                                            class="text-[9px] font-black text-emerald-600 uppercase tracking-wider mb-1 block"
                                            >Pertemuan 1</span
                                        >
                                        <span
                                            class="text-[9px] font-bold text-slate-300"
                                            >#11</span
                                        >
                                    </div>
                                    <h4
                                        class="text-xs font-bold text-slate-800 uppercase"
                                    >
                                        Kontrak & Pengumuman
                                    </h4>
                                </div>
                            </div>

                            <div
                                onclick="navigasiKe(12)"
                                class="relative pl-10 py-3 group cursor-pointer"
                            >
                                <div
                                    class="absolute left-[10px] top-5 w-5 h-5 rounded-full bg-blue-600 border-4 border-white shadow-sm z-10 animate-pulse"
                                ></div>
                                <div
                                    class="bg-white p-4 rounded-2xl border border-blue-200 shadow-md shadow-blue-100 transition-all transform group-hover:scale-[1.02]"
                                >
                                    <div
                                        class="flex justify-between items-start"
                                    >
                                        <span
                                            class="text-[9px] font-black text-blue-600 uppercase tracking-wider mb-1 block"
                                            >Pertemuan 2</span
                                        >
                                        <span
                                            class="text-[9px] font-bold text-blue-300"
                                            >#12</span
                                        >
                                    </div>
                                    <h4
                                        class="text-xs font-bold text-slate-800 uppercase"
                                    >
                                        Array & Memory
                                    </h4>
                                    <p
                                        class="text-[9px] text-slate-400 mt-1 font-medium"
                                    >
                                        Sedang dipelajari
                                    </p>
                                </div>
                            </div>

                            <div
                                onclick="navigasiKe(13)"
                                class="relative pl-10 py-3 group cursor-pointer opacity-60 hover:opacity-100 transition-opacity"
                            >
                                <div
                                    class="absolute left-[10px] top-5 w-5 h-5 rounded-full bg-slate-200 border-4 border-white z-10 flex items-center justify-center"
                                >
                                    <svg
                                        class="w-2.5 h-2.5 text-slate-400"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="3"
                                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 00-2 2zm10-10V7a4 4 0 00-8 0v4h8z"
                                        ></path>
                                    </svg>
                                </div>
                                <div
                                    class="bg-white p-4 rounded-2xl border border-slate-100 transition-all"
                                >
                                    <div
                                        class="flex justify-between items-start"
                                    >
                                        <span
                                            class="text-[9px] font-black text-slate-400 uppercase tracking-wider mb-1 block"
                                            >Pertemuan 3</span
                                        >
                                        <span
                                            class="text-[9px] font-bold text-slate-300"
                                            >#13</span
                                        >
                                    </div>
                                    <h4
                                        class="text-xs font-bold text-slate-600 uppercase"
                                    >
                                        Linked List
                                    </h4>
                                </div>
                            </div>
                        </div>

                        <button
                            class="w-full mt-6 py-2 text-center text-[10px] font-bold text-slate-400 uppercase tracking-widest hover:text-blue-600"
                        >
                            Lihat Semua
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

                // LOGIKA NAVIGASI BARU (1-4)
                if (nomor === 0) {
                    tujuan = "{{ route('courses') }}";
                    teks = "Kembali ke Dashboard.";
                } else if (nomor === 1) {
                    teks = "Anda sudah di Pembelajaran."; // Tab Aktif
                } else if (nomor === 2) {
                    tujuan = "{{ route('course.attendance') }}";
                    teks = "Membuka halaman Presensi.";
                } else if (nomor === 3) {
                    tujuan = "{{ route('course.assignments') }}";
                    teks = "Membuka halaman Penugasan.";
                } else if (nomor === 4) {
                    tujuan = "{{ route('course.members') }}";
                    teks = "Membuka daftar Anggota.";
                }

                // LOGIKA MATERI (11, 12, 13)
                else if (nomor === 11) {
                    teks = "Membuka Kontrak Kuliah.";
                } else if (nomor === 12) {
                    tujuan = "{{ route('topic.detail') }}";
                    teks = "Membuka materi Array.";
                } else if (nomor === 13) {
                    teks = "Materi Linked List belum dibuka.";
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
                        }
                        // Keyword Manual
                        else if (
                            hasil.includes("nol") ||
                            hasil.includes("kembali")
                        )
                            navigasiKe(0);
                        else if (hasil.includes("satu")) navigasiKe(1);
                        else if (hasil.includes("dua")) navigasiKe(2);
                        else if (hasil.includes("tiga")) navigasiKe(3);
                        else if (hasil.includes("empat")) navigasiKe(4);
                    };
                } catch (e) {}
            }

            window.onload = () => {
                const orientasi =
                    "Menu aktif. Satu Pembelajaran, Dua Presensi, Tiga Penugasan, Empat Anggota. Nol untuk kembali.";
                bicara(orientasi, () => {
                    mulaiMendengar();
                });
            };
        </script>
    </body>
</html>
