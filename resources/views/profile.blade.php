<!DOCTYPE html>
<html lang="id" class="h-full">
    <head>
        <meta charset="UTF-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"
        />
        <title>Profil Saya | LMS Inklusi UMMI</title>
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
                                d="M3 12l2-2m0 0l7-7m9 9l-2-2m0 0l-7-7m7 7v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                            ></path>
                        </svg>
                        <span>Beranda</span>
                    </div>
                    <span
                        class="text-[10px] bg-slate-100 px-2 py-1 rounded-lg font-black"
                        >5</span
                    >
                </a>

                <a
                    href="{{ route('profile') }}"
                    onclick="navigasiKe(6)"
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
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                            ></path>
                        </svg>
                        <span>Profil Saya</span>
                    </div>
                    <span
                        class="text-[10px] bg-blue-200 text-blue-800 px-2 py-1 rounded-lg font-black"
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
                class="absolute top-0 left-0 w-full h-80 bg-gradient-to-b from-blue-50 to-transparent -z-10"
            ></div>

            <header
                class="bg-white/80 backdrop-blur-xl border-b border-slate-200/60 px-8 py-6 sticky top-0 z-30"
            >
                <div
                    class="max-w-7xl mx-auto flex items-center justify-between"
                >
                    <div>
                        <h2
                            class="text-2xl font-black text-slate-900 tracking-tight"
                        >
                            Identitas Diri
                        </h2>
                        <p class="text-sm font-medium text-slate-500">
                            Informasi akademik dan personal.
                        </p>
                    </div>
                    <div class="flex items-center gap-4">
                        <button
                            onclick="navigasiKe(7)"
                            class="relative p-2 text-slate-400 hover:text-blue-600 transition-all"
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

                        <div
                            class="hidden md:flex items-center gap-3 pl-4 border-l border-slate-200"
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
            </header>

            <div class="p-6 lg:p-10 max-w-6xl mx-auto w-full space-y-8">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <div
                        class="bg-white p-8 rounded-[2.5rem] shadow-sm border border-slate-100 flex flex-col items-center text-center"
                    >
                        <div
                            class="w-40 h-40 rounded-[2rem] border-4 border-blue-50 p-1 mb-6"
                        >
                            <img
                                src="{{ asset('images/avatar.jpg') }}"
                                class="w-full h-full object-cover rounded-[1.8rem]"
                                alt="Foto Profil"
                            />
                        </div>
                        <h2
                            class="text-xl font-black text-slate-900 tracking-tight"
                        >
                            M. Ridwan Firdaus
                        </h2>
                        <p class="text-sm font-bold text-slate-400 mt-1">
                            2430511083
                        </p>
                        <div class="mt-6 flex flex-wrap justify-center gap-2">
                            <span
                                class="px-4 py-2 bg-emerald-50 text-emerald-600 rounded-xl text-[10px] font-black uppercase tracking-widest border border-emerald-100"
                                >Mahasiswa Aktif</span
                            >
                            <span
                                class="px-4 py-2 bg-blue-50 text-blue-600 rounded-xl text-[10px] font-black uppercase tracking-widest border border-blue-100"
                                >Semester 3</span
                            >
                        </div>
                    </div>

                    <div
                        class="lg:col-span-2 bg-white p-8 rounded-[2.5rem] shadow-sm border border-slate-100 relative overflow-hidden"
                    >
                        <div
                            class="absolute top-0 right-0 w-64 h-64 bg-blue-50 rounded-full blur-3xl opacity-50 -mr-16 -mt-16 pointer-events-none"
                        ></div>
                        <div class="relative z-10 space-y-8">
                            <div>
                                <h3
                                    class="text-lg font-black text-slate-900 mb-6 flex items-center gap-3"
                                >
                                    <svg
                                        class="w-5 h-5 text-blue-500"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"
                                        ></path>
                                    </svg>
                                    Data Akademik
                                </h3>
                                <div
                                    class="grid grid-cols-1 md:grid-cols-2 gap-6"
                                >
                                    <div
                                        class="bg-slate-50 p-4 rounded-2xl border border-slate-100"
                                    >
                                        <label
                                            class="text-[9px] font-bold text-slate-400 uppercase tracking-widest block mb-1"
                                            >Program Studi</label
                                        >
                                        <p class="font-bold text-slate-800">
                                            Teknik Informatika
                                        </p>
                                    </div>
                                    <div
                                        class="bg-slate-50 p-4 rounded-2xl border border-slate-100"
                                    >
                                        <label
                                            class="text-[9px] font-bold text-slate-400 uppercase tracking-widest block mb-1"
                                            >Fakultas</label
                                        >
                                        <p class="font-bold text-slate-800">
                                            Sains & Teknologi
                                        </p>
                                    </div>
                                    <div
                                        class="bg-slate-50 p-4 rounded-2xl border border-slate-100"
                                    >
                                        <label
                                            class="text-[9px] font-bold text-slate-400 uppercase tracking-widest block mb-1"
                                            >Tahun Masuk</label
                                        >
                                        <p class="font-bold text-slate-800">
                                            2024
                                        </p>
                                    </div>
                                    <div
                                        class="bg-slate-50 p-4 rounded-2xl border border-slate-100"
                                    >
                                        <label
                                            class="text-[9px] font-bold text-slate-400 uppercase tracking-widest block mb-1"
                                            >Email Institusi</label
                                        >
                                        <p
                                            class="font-bold text-blue-600 text-sm truncate"
                                        >
                                            muhammadridwan@ummi.ac.id
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <hr class="border-slate-100" />

                            <div>
                                <h3
                                    class="text-lg font-black text-slate-900 mb-6 flex items-center gap-3"
                                >
                                    <svg
                                        class="w-5 h-5 text-orange-500"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 12.284 3 6V5z"
                                        ></path>
                                    </svg>
                                    Kontak Pribadi
                                </h3>
                                <div
                                    class="grid grid-cols-1 md:grid-cols-2 gap-6"
                                >
                                    <div
                                        class="bg-slate-50 p-4 rounded-2xl border border-slate-100"
                                    >
                                        <label
                                            class="text-[9px] font-bold text-slate-400 uppercase tracking-widest block mb-1"
                                            >Nomor Handphone</label
                                        >
                                        <p class="font-bold text-slate-800">
                                            0852-1182-2737
                                        </p>
                                    </div>
                                    <div
                                        class="bg-slate-50 p-4 rounded-2xl border border-slate-100"
                                    >
                                        <label
                                            class="text-[9px] font-bold text-slate-400 uppercase tracking-widest block mb-1"
                                            >Email Pribadi</label
                                        >
                                        <p
                                            class="font-bold text-slate-800 text-sm truncate"
                                        >
                                            muhammadridwanfirdaus1997@gmail.com
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div
                    class="bg-gradient-to-r from-slate-900 to-slate-800 rounded-[2.5rem] p-8 shadow-xl text-white flex flex-col md:flex-row items-center justify-between gap-6"
                >
                    <div class="flex items-center gap-6">
                        <div
                            class="w-14 h-14 bg-white/10 rounded-2xl flex items-center justify-center backdrop-blur-md"
                        >
                            <svg
                                class="w-7 h-7 text-white"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 00-2 2zm10-10V7a4 4 0 00-8 0v4h8z"
                                ></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-black tracking-tight">
                                Keamanan Akun
                            </h3>
                            <p class="text-slate-300 text-sm font-medium">
                                Ubah kata sandi secara berkala untuk
                                perlindungan ekstra.
                            </p>
                        </div>
                    </div>
                    <button
                        class="px-8 py-3 bg-white text-slate-900 rounded-xl font-black text-[10px] uppercase tracking-widest hover:bg-blue-50 transition-all"
                    >
                        Ganti Password
                    </button>
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
                if (nomor === 5) {
                    tujuan = "{{ route('dashboard') }}";
                    teks = "Kembali ke Beranda.";
                } else if (nomor === 6) {
                    teks = "Anda sudah di Halaman Profil.";
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
                    if (tujuan !== "" && tujuan !== "#")
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
                        else if (hasil.includes("lima")) navigasiKe(5);
                        else if (hasil.includes("enam")) navigasiKe(6);
                        else if (hasil.includes("tujuh")) navigasiKe(7);
                        else if (hasil.includes("delapan")) navigasiKe(8);
                        else if (hasil.includes("sembilan")) navigasiKe(9);
                    };
                } catch (e) {}
            }

            window.onload = () => {
                const orientasi =
                    "Halaman profil. Ridwan, NIM 2430511083. Sebutkan angka lima untuk kembali ke beranda, atau nol untuk keluar.";
                bicara(orientasi, () => {
                    mulaiMendengar();
                });
            };
        </script>
    </body>
</html>
