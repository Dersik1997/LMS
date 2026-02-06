<!DOCTYPE html>
<html lang="id" class="h-full">
    <head>
        <meta charset="UTF-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"
        />
        <title>Dashboard | LMS Inklusi UMMI</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link
            href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
            rel="stylesheet"
        />
        <style>
            .scrollbar-hide::-webkit-scrollbar {
                display: none;
            }
        </style>
    </head>
    <body
        class="m-0 font-['Plus_Jakarta_Sans'] bg-[#f8fafc] min-h-full flex overflow-hidden border-box text-slate-800"
    >
        <aside
            class="hidden lg:flex w-80 bg-white border-r border-slate-200 flex-col h-screen sticky top-0 z-20"
        >
            <div class="p-8 border-b border-slate-100 flex items-center gap-4">
                <img
                    src="{{ asset('images/logo-ummi.png') }}"
                    class="w-12 h-12 object-contain"
                    alt="Logo UMMI"
                />
                <div>
                    <h1
                        class="text-xl font-extrabold text-slate-900 tracking-tight leading-none"
                    >
                        LMS Inklusi
                    </h1>
                    <p
                        class="text-[10px] font-bold text-blue-600 uppercase tracking-widest mt-1"
                    >
                        UMMI Sukabumi
                    </p>
                </div>
            </div>

            <nav class="flex-1 p-6 space-y-3 overflow-y-auto">
                <a
                    href="{{ route('dashboard') }}"
                    onclick="navigasiKe(5)"
                    class="flex items-center justify-between p-4 bg-blue-50 text-blue-700 rounded-2xl font-bold transition-all shadow-sm border border-blue-100"
                >
                    <div class="flex items-center gap-4">
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
                                d="M3 12l2-2m0 0l7-7m9 9l-2-2m0 0l-7-7m7 7v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                            ></path>
                        </svg>
                        <span>Beranda</span>
                    </div>
                    <span
                        class="text-[10px] bg-blue-200 text-blue-800 px-2 py-1 rounded-lg font-black"
                        >5</span
                    >
                </a>

                <a
                    href="{{ route('profile') }}"
                    onclick="navigasiKe(6)"
                    class="flex items-center justify-between p-4 text-slate-500 hover:bg-slate-50 hover:text-slate-900 rounded-2xl font-bold transition-all"
                >
                    <div class="flex items-center gap-4">
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
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                            ></path>
                        </svg>
                        <span>Profil Saya</span>
                    </div>
                    <span
                        class="text-[10px] bg-slate-100 px-2 py-1 rounded-lg font-black"
                        >6</span
                    >
                </a>

                <a
                    href="{{ route('notifications') }}"
                    onclick="navigasiKe(7)"
                    class="flex items-center justify-between p-4 text-slate-500 hover:bg-slate-50 hover:text-slate-900 rounded-2xl font-bold transition-all"
                >
                    <div class="flex items-center gap-4">
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
                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"
                            ></path>
                        </svg>
                        <span>Pemberitahuan</span>
                    </div>
                    <span
                        class="text-[10px] bg-slate-100 px-2 py-1 rounded-lg font-black"
                        >7</span
                    >
                </a>

                <a
                    href="{{ route('messages') }}"
                    onclick="navigasiKe(8)"
                    class="flex items-center justify-between p-4 text-slate-500 hover:bg-slate-50 hover:text-slate-900 rounded-2xl font-bold transition-all"
                >
                    <div class="flex items-center gap-4">
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
                                d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"
                            ></path>
                        </svg>
                        <span>Pesan</span>
                    </div>
                    <span
                        class="text-[10px] bg-slate-100 px-2 py-1 rounded-lg font-black"
                        >8</span
                    >
                </a>

                <a
                    href="{{ route('help') }}"
                    onclick="navigasiKe(9)"
                    class="flex items-center justify-between p-4 text-slate-500 hover:bg-slate-50 hover:text-slate-900 rounded-2xl font-bold transition-all"
                >
                    <div class="flex items-center gap-4">
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
                                d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                            ></path>
                        </svg>
                        <span>Bantuan</span>
                    </div>
                    <span
                        class="text-[10px] bg-slate-100 px-2 py-1 rounded-lg font-black"
                        >9</span
                    >
                </a>
            </nav>

            <div class="p-6 border-t border-slate-100">
                <button
                    onclick="navigasiKe(0)"
                    class="w-full p-4 flex items-center justify-between text-red-600 font-bold bg-red-50 rounded-2xl hover:bg-red-100 transition-all border border-red-100"
                >
                    <div class="flex items-center gap-3">
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
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"
                            ></path>
                        </svg>
                        <span>Keluar</span>
                    </div>
                    <span
                        class="text-[10px] bg-red-200 text-red-800 px-2 py-1 rounded-lg font-black"
                        >0</span
                    >
                </button>
            </div>
        </aside>

        <main class="flex-1 h-screen overflow-y-auto flex flex-col relative">
            <div
                class="absolute top-0 left-0 w-full h-96 bg-gradient-to-b from-blue-50 to-transparent -z-10"
            ></div>

            <header
                class="bg-white/80 backdrop-blur-xl border-b border-slate-200/60 px-8 py-6 sticky top-0 z-30"
            >
                <div
                    class="max-w-7xl mx-auto flex items-center justify-between"
                >
                    <div>
                        <h2
                            class="text-2xl font-extrabold text-slate-900 tracking-tight"
                        >
                            Halo, Ridwan! 👋
                        </h2>
                        <p class="text-sm font-medium text-slate-500">
                            Siap untuk belajar hari ini?
                        </p>
                    </div>

                    <div class="flex items-center gap-4">
                        <div
                            class="flex items-center gap-3 pr-4 border-r border-slate-200"
                        >
                            <button
                                onclick="navigasiKe(7)"
                                class="p-2 text-slate-400 hover:text-blue-600 transition-all relative"
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
                                        d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"
                                    ></path>
                                </svg>
                                <span
                                    class="absolute top-2 right-2 w-2 h-2 bg-red-500 rounded-full border-2 border-white"
                                ></span>
                            </button>
                            <button
                                onclick="navigasiKe(9)"
                                class="p-2 text-slate-400 hover:text-blue-600 transition-all"
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
                                        d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                    ></path>
                                </svg>
                            </button>
                        </div>

                        <div class="hidden md:flex items-center gap-3 pl-4">
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
            </header>

            <div class="p-6 lg:p-10 max-w-7xl mx-auto w-full space-y-10">
                <div
                    class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6"
                >
                    <div
                        onclick="navigasiKe(1)"
                        class="group bg-white p-8 rounded-[2.5rem] shadow-sm hover:shadow-2xl hover:-translate-y-1 transition-all border border-slate-100 cursor-pointer relative overflow-hidden h-full"
                    >
                        <div
                            class="absolute top-0 right-0 w-24 h-24 bg-blue-50 rounded-bl-[100%] -mr-6 -mt-6 transition-transform group-hover:scale-110"
                        ></div>
                        <div
                            class="relative z-10 flex flex-col h-full justify-between"
                        >
                            <div
                                class="w-14 h-14 bg-blue-600 text-white rounded-2xl flex items-center justify-center mb-6 font-black text-xl shadow-lg shadow-blue-200"
                            >
                                1
                            </div>
                            <div>
                                <h3
                                    class="text-xl font-black text-slate-900 tracking-tight group-hover:text-blue-600 transition-colors leading-tight"
                                >
                                    Daftar Mata Kuliah
                                </h3>
                                <p
                                    class="text-sm text-slate-400 font-medium mt-2"
                                >
                                    Lihat semua.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div
                        onclick="navigasiKe(2)"
                        class="group bg-white p-8 rounded-[2.5rem] shadow-sm hover:shadow-2xl hover:-translate-y-1 transition-all border border-slate-100 cursor-pointer relative overflow-hidden h-full"
                    >
                        <div
                            class="absolute top-0 right-0 w-24 h-24 bg-emerald-50 rounded-bl-[100%] -mr-6 -mt-6 transition-transform group-hover:scale-110"
                        ></div>
                        <div
                            class="relative z-10 flex flex-col h-full justify-between"
                        >
                            <div
                                class="w-14 h-14 bg-emerald-500 text-white rounded-2xl flex items-center justify-center mb-6 font-black text-xl shadow-lg shadow-emerald-200"
                            >
                                2
                            </div>
                            <div>
                                <h3
                                    class="text-xl font-black text-slate-900 tracking-tight group-hover:text-emerald-600 transition-colors leading-tight"
                                >
                                    Gabung Mata Kuliah
                                </h3>
                                <p
                                    class="text-sm text-slate-400 font-medium mt-2"
                                >
                                    Masukan kode.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div
                        onclick="navigasiKe(3)"
                        class="group bg-white p-8 rounded-[2.5rem] shadow-sm hover:shadow-2xl hover:-translate-y-1 transition-all border border-slate-100 cursor-pointer relative overflow-hidden h-full"
                    >
                        <div
                            class="absolute top-0 right-0 w-24 h-24 bg-orange-50 rounded-bl-[100%] -mr-6 -mt-6 transition-transform group-hover:scale-110"
                        ></div>
                        <div
                            class="relative z-10 flex flex-col h-full justify-between"
                        >
                            <div
                                class="w-14 h-14 bg-orange-500 text-white rounded-2xl flex items-center justify-center mb-6 font-black text-xl shadow-lg shadow-orange-200"
                            >
                                3
                            </div>
                            <div>
                                <h3
                                    class="text-xl font-black text-slate-900 tracking-tight group-hover:text-orange-600 transition-colors leading-tight"
                                >
                                    Daftar Ujian
                                </h3>
                                <p
                                    class="text-sm text-slate-400 font-medium mt-2"
                                >
                                    Cek jadwal.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div
                        onclick="navigasiKe(4)"
                        class="group bg-gradient-to-br from-indigo-600 to-purple-700 p-8 rounded-[2.5rem] shadow-xl shadow-indigo-200 hover:shadow-2xl hover:-translate-y-1 transition-all text-white cursor-pointer relative overflow-hidden h-full"
                    >
                        <div
                            class="relative z-10 flex flex-col h-full justify-between"
                        >
                            <div
                                class="w-14 h-14 bg-white/20 border border-white/10 backdrop-blur-md rounded-2xl flex items-center justify-center mb-6 font-black text-xl"
                            >
                                4
                            </div>
                            <div>
                                <h3
                                    class="text-xl font-black tracking-tight leading-tight"
                                >
                                    Gabung Ujian
                                </h3>
                                <p
                                    class="text-sm text-indigo-100 font-medium mt-2"
                                >
                                    Input token.
                                </p>
                            </div>
                        </div>
                        <div
                            class="absolute -right-10 -bottom-10 w-40 h-40 bg-white/10 rounded-full blur-2xl"
                        ></div>
                    </div>
                </div>

                <div>
                    <div class="flex items-center justify-between mb-6 px-2">
                        <h3
                            class="text-sm font-black text-slate-900 uppercase tracking-widest"
                        >
                            Sedang Dipelajari
                        </h3>
                        <span
                            class="text-[10px] font-bold bg-slate-200 text-slate-600 px-3 py-1 rounded-full"
                            >Semester 3</span
                        >
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div
                            onclick="navigasiKe(11)"
                            class="group bg-white p-6 rounded-[2rem] border border-slate-200 shadow-sm hover:border-blue-300 hover:shadow-lg transition-all cursor-pointer flex items-center gap-6"
                        >
                            <div
                                class="w-20 h-20 bg-blue-50 text-blue-600 rounded-3xl flex items-center justify-center shrink-0 font-black text-2xl group-hover:bg-blue-600 group-hover:text-white transition-all shadow-inner"
                            >
                                11
                            </div>
                            <div class="flex-1">
                                <h4
                                    class="text-lg font-black text-slate-900 group-hover:text-blue-700 transition-colors leading-tight mb-1"
                                >
                                    Pemrograman Berorientasi Objek
                                </h4>
                                <p
                                    class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-2"
                                >
                                    Dr. Tech. Aris Martono
                                </p>
                                <div
                                    class="w-full h-1.5 bg-slate-100 rounded-full overflow-hidden"
                                >
                                    <div
                                        class="h-full bg-blue-500 w-[65%] rounded-full"
                                    ></div>
                                </div>
                            </div>
                        </div>

                        <div
                            onclick="navigasiKe(12)"
                            class="group bg-white p-6 rounded-[2rem] border border-slate-200 shadow-sm hover:border-orange-300 hover:shadow-lg transition-all cursor-pointer flex items-center gap-6"
                        >
                            <div
                                class="w-20 h-20 bg-orange-50 text-orange-600 rounded-3xl flex items-center justify-center shrink-0 font-black text-2xl group-hover:bg-orange-600 group-hover:text-white transition-all shadow-inner"
                            >
                                12
                            </div>
                            <div class="flex-1">
                                <h4
                                    class="text-lg font-black text-slate-900 group-hover:text-orange-700 transition-colors leading-tight mb-1"
                                >
                                    Statistika Terapan
                                </h4>
                                <p
                                    class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-2"
                                >
                                    Prof. Suharyanto
                                </p>
                                <div
                                    class="w-full h-1.5 bg-slate-100 rounded-full overflow-hidden"
                                >
                                    <div
                                        class="h-full bg-orange-500 w-[30%] rounded-full"
                                    ></div>
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

                if (nomor === 1) {
                    tujuan = "{{ route('courses') }}";
                    teks = "Membuka Daftar Semua Mata Kuliah.";
                } else if (nomor === 5) {
                    tujuan = "{{ route('dashboard') }}";
                    teks = "Memuat ulang Beranda.";
                } else if (nomor === 6) {
                    tujuan = "{{ route('profile') }}";
                    teks = "Membuka Profil Saya.";
                } else if (nomor === 7) {
                    tujuan = "{{ route('notifications') }}";
                    teks = "Membuka Pemberitahuan.";
                } else if (nomor === 8) {
                    tujuan = "{{ route('messages') }}";
                    teks = "Membuka Pesan.";
                } else if (nomor === 9) {
                    tujuan = "{{ route('help') }}";
                    teks = "Membuka Bantuan.";
                } else if (nomor === 0) {
                    tujuan = "{{ route('logout') }}";
                    teks = "Keluar akun.";
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

                        if (angka) {
                            navigasiKe(parseInt(angka[0]));
                        } else if (
                            hasil.includes("nol") ||
                            hasil.includes("keluar")
                        )
                            navigasiKe(0);
                    };
                } catch (e) {}
            }

            window.onload = () => {
                const orientasi =
                    "Selamat datang Ridwan. Sebutkan angka satu untuk Daftar Matkul, Dua untuk Gabung Kelas, Tiga untuk Ujian, atau Empat untuk Gabung Ujian. Sebutkan lima untuk kembali ke beranda.";
                bicara(orientasi, () => {
                    mulaiMendengar();
                });
            };
        </script>
    </body>
</html>
