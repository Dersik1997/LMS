<!DOCTYPE html>
<html lang="id" class="h-full">
    <head>
        <meta charset="UTF-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"
        />
        <title>Pesan | LMS Inklusi UMMI</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link
            href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
            rel="stylesheet"
        />
        <style>
            .scrollbar-hide::-webkit-scrollbar {
                display: none;
            }
            .custom-scrollbar::-webkit-scrollbar {
                width: 4px;
            }
            .custom-scrollbar::-webkit-scrollbar-track {
                background: #f1f5f9;
            }
            .custom-scrollbar::-webkit-scrollbar-thumb {
                background: #cbd5e1;
                border-radius: 4px;
            }
            .custom-scrollbar::-webkit-scrollbar-thumb:hover {
                background: #94a3b8;
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
                                d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"
                            ></path>
                        </svg>
                        <span>Pesan</span>
                    </div>
                    <span
                        class="text-[10px] bg-blue-200 text-blue-800 px-2 py-1 rounded-lg font-black"
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

        <main
            class="flex-1 h-screen overflow-hidden flex flex-col relative bg-slate-50"
        >
            <header
                class="bg-white/80 backdrop-blur-xl border-b border-slate-200/60 px-8 py-4 sticky top-0 z-30 shrink-0 flex justify-between items-center"
            >
                <div>
                    <h2
                        class="text-xl font-extrabold text-slate-900 tracking-tight"
                    >
                        Pesan Masuk
                    </h2>
                    <span
                        class="text-xs font-bold text-slate-400 uppercase tracking-widest"
                        >Komunikasi</span
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
            </header>

            <div class="flex-1 flex overflow-hidden">
                <div
                    class="w-full md:w-80 bg-white border-r border-slate-200 flex flex-col z-10 hidden md:flex"
                >
                    <div class="p-4 border-b border-slate-100">
                        <input
                            type="text"
                            placeholder="Cari..."
                            class="w-full bg-slate-50 border border-slate-100 rounded-xl px-4 py-3 text-xs font-bold focus:ring-2 focus:ring-blue-500 outline-none transition-all placeholder:text-slate-400"
                        />
                    </div>
                    <div class="flex-1 overflow-y-auto p-2 space-y-1">
                        <div
                            onclick="navigasiKe(10)"
                            class="p-3 bg-blue-50 rounded-xl flex gap-3 cursor-pointer border border-blue-100 relative group transition-all"
                        >
                            <div
                                class="w-10 h-10 rounded-xl bg-blue-200 shrink-0 overflow-hidden"
                            >
                                <img
                                    src="https://ui-avatars.com/api/?name=Aris+Martono&background=DBEAFE&color=2563EB"
                                    class="w-full h-full object-cover"
                                />
                            </div>
                            <div class="flex-1 overflow-hidden">
                                <div
                                    class="flex justify-between items-center mb-0.5"
                                >
                                    <h4
                                        class="font-bold text-slate-900 text-xs truncate"
                                    >
                                        Dr. Aris Martono
                                    </h4>
                                    <span
                                        class="text-[9px] font-bold text-blue-600"
                                        >10:45</span
                                    >
                                </div>
                                <p
                                    class="text-[10px] text-slate-500 truncate font-medium"
                                >
                                    Tugas sudah saya terima, Ridwan...
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex-1 flex flex-col bg-[#f0f4f8] relative">
                    <div
                        class="p-4 bg-white/80 backdrop-blur-md border-b border-slate-200 flex items-center justify-between sticky top-0 z-10"
                    >
                        <div class="flex items-center gap-3">
                            <div
                                class="w-10 h-10 rounded-xl bg-blue-100 overflow-hidden shadow-sm"
                            >
                                <img
                                    src="https://ui-avatars.com/api/?name=Aris+Martono&background=DBEAFE&color=2563EB"
                                    class="w-full h-full object-cover"
                                />
                            </div>
                            <div>
                                <h4
                                    class="font-black text-slate-900 text-sm leading-tight"
                                >
                                    Dr. Aris Martono
                                </h4>
                                <span
                                    class="inline-flex items-center text-[9px] font-bold text-emerald-600 uppercase tracking-widest"
                                >
                                    <span
                                        class="w-1.5 h-1.5 bg-emerald-500 rounded-full mr-1.5 animate-pulse"
                                    ></span>
                                    Online
                                </span>
                            </div>
                        </div>
                    </div>

                    <div
                        class="flex-1 p-6 overflow-y-auto space-y-6 custom-scrollbar"
                        id="chat-container"
                    >
                        <div class="flex flex-col items-start max-w-[80%]">
                            <div
                                class="bg-white p-4 rounded-2xl rounded-tl-none shadow-sm border border-slate-100"
                            >
                                <p
                                    class="text-sm text-slate-700 leading-relaxed font-medium"
                                >
                                    Ridwan, apakah ada kendala dalam pengerjaan
                                    tugas nomor 2?
                                </p>
                            </div>
                            <span
                                class="text-[9px] font-bold text-slate-400 mt-1 ml-1"
                                >10:40 AM</span
                            >
                        </div>

                        <div
                            class="flex flex-col items-end ml-auto max-w-[80%]"
                        >
                            <div
                                class="bg-blue-600 p-4 rounded-2xl rounded-tr-none shadow-md shadow-blue-100"
                            >
                                <p
                                    class="text-sm text-white leading-relaxed font-medium"
                                >
                                    Belum ada pak, sedang saya kerjakan bagian
                                    logikanya. Nanti saya kabari lagi.
                                </p>
                            </div>
                            <span
                                class="text-[9px] font-bold text-slate-400 mt-1 mr-1"
                                >10:42 AM</span
                            >
                        </div>
                    </div>

                    <div class="p-4 bg-white border-t border-slate-200">
                        <div
                            class="flex items-center gap-2 bg-slate-50 p-2 rounded-2xl border border-slate-200"
                        >
                            <button
                                onclick="navigasiKe(12)"
                                class="w-10 h-10 flex items-center justify-center text-slate-400 hover:text-blue-600 hover:bg-white rounded-xl transition-all"
                                title="Kirim Gambar (12)"
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
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"
                                    ></path>
                                </svg>
                            </button>

                            <input
                                onclick="navigasiKe(11)"
                                type="text"
                                id="chat-input"
                                placeholder="Ketik pesan... (11)"
                                class="flex-1 bg-transparent text-sm font-medium text-slate-700 placeholder-slate-400 focus:outline-none px-2"
                            />

                            <button
                                onclick="navigasiKe(13)"
                                class="w-10 h-10 flex items-center justify-center text-slate-400 hover:text-red-500 hover:bg-red-50 rounded-xl transition-all"
                                title="Voice Note (13)"
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
                            </button>

                            <button
                                onclick="navigasiKe(14)"
                                class="w-12 h-10 bg-blue-600 text-white rounded-xl flex items-center justify-center shadow-md hover:bg-blue-700 transition-all"
                                title="Kirim (14)"
                            >
                                <svg
                                    class="w-5 h-5 transform rotate-90 ml-0.5"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"
                                    ></path>
                                </svg>
                            </button>
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

            function bicara(teks, callback) {
                const utter = new SpeechSynthesisUtterance(teks);
                utter.lang = "id-ID";
                utter.onstart = () => {
                    if (statusDesc) statusDesc.innerText = "Speaking";
                    interval = setInterval(() => setWave(true), 150);
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
                    teks = "Anda sudah di Halaman Pesan.";
                } else if (nomor === 9) {
                    tujuan = "{{ route('help') }}";
                    teks = "Membuka Bantuan.";
                } else if (nomor === 0) {
                    tujuan = "{{ route('logout') }}";
                    teks = "Keluar akun.";
                }

                // FITUR PESAN
                else if (nomor === 10) {
                    teks = "Membuka chat dengan Dr. Aris Martono.";
                } else if (nomor === 11) {
                    document.getElementById("chat-input").focus();
                    teks = "Silahkan ketik pesan.";
                } else if (nomor === 12) {
                    teks = "Membuka galeri untuk kirim gambar.";
                } else if (nomor === 13) {
                    teks = "Merekam suara... Silahkan bicara.";
                } else if (nomor === 14) {
                    if (document.getElementById("chat-input").value) {
                        teks = "Pesan terkirim.";
                        document.getElementById("chat-input").value = "";
                    } else {
                        teks = "Pesan kosong.";
                    }
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
                    "Halaman Pesan. Sebutkan lima sampai sembilan untuk menu samping. Sebelas ketik, Dua belas gambar, Tiga belas suara, Empat belas kirim.";
                bicara(orientasi, () => {
                    mulaiMendengar();
                });
            };
        </script>
    </body>
</html>
