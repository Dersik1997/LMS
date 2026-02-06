<!DOCTYPE html>
<html lang="id" class="h-full">
    <head>
        <meta charset="UTF-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"
        />
        <title>Pusat Bantuan | LMS Inklusi UMMI</title>
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
                                d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                            ></path>
                        </svg>
                        <span>Bantuan</span>
                    </div>
                    <span
                        class="text-[10px] bg-blue-200 text-blue-800 px-2 py-1 rounded-lg font-black"
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
                            class="text-2xl font-extrabold text-slate-900 tracking-tight"
                        >
                            Pusat Bantuan
                        </h2>
                        <span
                            class="text-xs font-bold text-slate-400 uppercase tracking-widest"
                            >Panduan Penggunaan</span
                        >
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
                            class="p-2 text-blue-600 hover:text-blue-700 bg-blue-50 rounded-xl transition-all"
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
                <div
                    class="bg-gradient-to-br from-blue-600 to-indigo-700 rounded-[2.5rem] p-10 text-white shadow-xl shadow-blue-200 relative overflow-hidden"
                >
                    <div
                        class="relative z-10 grid grid-cols-1 lg:grid-cols-2 gap-8 items-center"
                    >
                        <div>
                            <h3
                                class="text-3xl font-black uppercase tracking-tighter mb-4"
                            >
                                Navigasi Suara
                            </h3>
                            <p
                                class="text-blue-100 font-medium mb-6 leading-relaxed"
                            >
                                Sistem LMS Inklusi dikendalikan menggunakan
                                perintah suara berbasis nomor. Cukup sebutkan
                                angka menu untuk berpindah halaman secara
                                instan.
                            </p>

                            <div class="grid grid-cols-4 gap-4">
                                <div
                                    class="bg-white/10 p-3 rounded-2xl border border-white/20 text-center backdrop-blur-md"
                                >
                                    <span class="block text-2xl font-black"
                                        >5</span
                                    >
                                    <span
                                        class="text-[9px] font-bold uppercase tracking-widest opacity-80"
                                        >Beranda</span
                                    >
                                </div>
                                <div
                                    class="bg-white/10 p-3 rounded-2xl border border-white/20 text-center backdrop-blur-md"
                                >
                                    <span class="block text-2xl font-black"
                                        >6</span
                                    >
                                    <span
                                        class="text-[9px] font-bold uppercase tracking-widest opacity-80"
                                        >Profil</span
                                    >
                                </div>
                                <div
                                    class="bg-white/10 p-3 rounded-2xl border border-white/20 text-center backdrop-blur-md"
                                >
                                    <span class="block text-2xl font-black"
                                        >7</span
                                    >
                                    <span
                                        class="text-[9px] font-bold uppercase tracking-widest opacity-80"
                                        >Notif</span
                                    >
                                </div>
                                <div
                                    class="bg-white/10 p-3 rounded-2xl border border-white/20 text-center backdrop-blur-md"
                                >
                                    <span class="block text-2xl font-black"
                                        >0</span
                                    >
                                    <span
                                        class="text-[9px] font-bold uppercase tracking-widest opacity-80"
                                        >Keluar</span
                                    >
                                </div>
                            </div>
                        </div>

                        <div class="hidden lg:flex justify-center">
                            <div
                                class="w-64 h-64 bg-white/10 rounded-full flex items-center justify-center border-4 border-white/20 relative"
                            >
                                <svg
                                    class="w-32 h-32 text-white opacity-80"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="1.5"
                                        d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z"
                                    ></path>
                                </svg>
                                <div
                                    class="absolute inset-0 rounded-full border border-white/30 animate-ping"
                                ></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div
                    class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6"
                >
                    <div
                        class="bg-white p-8 rounded-[2.5rem] shadow-sm border border-slate-100 hover:shadow-lg transition-all group"
                    >
                        <div
                            class="w-12 h-12 bg-orange-50 text-orange-500 rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform"
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
                        </div>
                        <h4 class="font-black text-slate-900 mb-2">
                            Suara Tidak Terdeteksi?
                        </h4>
                        <p
                            class="text-sm text-slate-500 font-medium leading-relaxed"
                        >
                            Pastikan Anda telah memberikan izin (Allow) pada
                            browser untuk mengakses mikrofon.
                        </p>
                    </div>

                    <div
                        class="bg-white p-8 rounded-[2.5rem] shadow-sm border border-slate-100 hover:shadow-lg transition-all group"
                    >
                        <div
                            class="w-12 h-12 bg-blue-50 text-blue-500 rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform"
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
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
                                ></path>
                            </svg>
                        </div>
                        <h4 class="font-black text-slate-900 mb-2">
                            Cara Kirim Tugas?
                        </h4>
                        <p
                            class="text-sm text-slate-500 font-medium leading-relaxed"
                        >
                            Masuk ke menu Penugasan, pilih tugas aktif, lalu
                            tekan tombol Upload File.
                        </p>
                    </div>

                    <div
                        class="bg-white p-8 rounded-[2.5rem] shadow-sm border border-slate-100 hover:shadow-lg transition-all group"
                    >
                        <div
                            class="w-12 h-12 bg-slate-100 text-slate-500 rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform"
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
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 00-2 2zm10-10V7a4 4 0 00-8 0v4h8z"
                                ></path>
                            </svg>
                        </div>
                        <h4 class="font-black text-slate-900 mb-2">
                            Lupa Password?
                        </h4>
                        <p
                            class="text-sm text-slate-500 font-medium leading-relaxed"
                        >
                            Hubungi Admin UPT TIK di Gedung A Lantai 2 untuk
                            reset password SIAK.
                        </p>
                    </div>
                </div>

                <div
                    class="bg-white rounded-[2.5rem] p-8 border border-slate-100 flex flex-col md:flex-row items-center justify-between gap-6 shadow-sm"
                >
                    <div class="flex items-center gap-6">
                        <div
                            class="w-16 h-16 bg-slate-900 text-white rounded-2xl flex items-center justify-center shadow-lg shadow-slate-200"
                        >
                            <svg
                                class="w-8 h-8"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"
                                ></path>
                            </svg>
                        </div>
                        <div>
                            <h4
                                class="text-xl font-black text-slate-900 tracking-tight"
                            >
                                Butuh Bantuan Lebih?
                            </h4>
                            <p class="text-sm text-slate-500 font-medium mt-1">
                                Tim IT Inklusi UMMI siap membantu Anda.
                            </p>
                        </div>
                    </div>
                    <button
                        class="px-8 py-4 bg-blue-600 text-white rounded-xl font-black text-[10px] uppercase tracking-widest hover:bg-blue-700 transition-all shadow-lg shadow-blue-200"
                    >
                        Hubungi Admin
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
                    setInterval(() => setWave(true), 150);
                };
                utter.onend = () => {
                    if (statusDesc) statusDesc.innerText = "Listening";
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
                    tujuan = "{{ route('profile') }}";
                    teks = "Membuka Profil.";
                } else if (nomor === 7) {
                    tujuan = "{{ route('notifications') }}";
                    teks = "Membuka Pemberitahuan.";
                } else if (nomor === 8) {
                    tujuan = "{{ route('messages') }}";
                    teks = "Membuka Pesan.";
                } else if (nomor === 9) {
                    teks = "Anda sudah di halaman Bantuan.";
                } else if (nomor === 0) {
                    tujuan = "{{ route('logout') }}";
                    teks = "Keluar akun.";
                }

                if (teks !== "") bicara(teks);
                if (tujuan !== "" && tujuan !== "#")
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
                    };
                } catch (e) {}
            }

            window.onload = () => {
                const orientasi =
                    "Halaman pusat bantuan. Ridwan, sistem ini dikendalikan dengan angka panggil suara. Sebutkan lima untuk beranda, enam untuk profil, tujuh untuk notifikasi, delapan untuk pesan, atau sembilan untuk halaman ini kembali.";
                bicara(orientasi, () => {
                    mulaiMendengar();
                });
            };
        </script>
    </body>
</html>
