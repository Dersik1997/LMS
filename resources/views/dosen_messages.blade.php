<!DOCTYPE html>
<html lang="id" class="h-full">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Pesan | Portal Dosen</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link
            href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
            rel="stylesheet"
        />
    </head>
    <body
        class="m-0 font-['Plus_Jakarta_Sans'] bg-[#f8fafc] min-h-full flex overflow-hidden border-box text-slate-800"
    >
        <aside
            class="hidden lg:flex w-80 bg-white border-r border-slate-200 flex-col h-screen sticky top-0 z-20 flex-shrink-0"
        >
            <div class="p-8 border-b border-slate-100 flex items-center gap-4">
                <img
                    src="{{ asset('images/logo-ummi.png') }}"
                    class="w-12 h-12 object-contain"
                    alt="Logo UMMI"
                />
                <div>
                    <h1
                        class="text-xl font-black text-slate-900 tracking-tight leading-none"
                    >
                        LMS Inklusi
                    </h1>
                    <p
                        class="text-[10px] font-bold text-blue-600 uppercase tracking-widest mt-1"
                    >
                        Portal Dosen
                    </p>
                </div>
            </div>

            <nav class="flex-1 p-6 space-y-3 overflow-y-auto">
                <a
                    href="{{ route('dosen.dashboard') }}"
                    class="flex items-center gap-4 p-4 text-slate-500 hover:bg-slate-50 hover:text-slate-900 rounded-2xl font-bold transition-all"
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
                            stroke-width="2"
                            d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"
                        ></path>
                    </svg>
                    <span>Beranda</span>
                </a>

                <a
                    href="{{ route('dosen.courses') }}"
                    class="flex items-center gap-4 p-4 text-slate-500 hover:bg-slate-50 hover:text-slate-900 rounded-2xl font-bold transition-all"
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
                            stroke-width="2"
                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"
                        ></path>
                    </svg>
                    <span>Mata Kuliah</span>
                </a>

                <a
                    href="{{ route('dosen.schedule') }}"
                    class="flex items-center gap-4 p-4 text-slate-500 hover:bg-slate-50 hover:text-slate-900 rounded-2xl font-bold transition-all"
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
                            stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
                        ></path>
                    </svg>
                    <span>Jadwal Mengajar</span>
                </a>

                <a
                    href="{{ route('dosen.grading') }}"
                    class="flex items-center gap-4 p-4 text-slate-500 hover:bg-slate-50 hover:text-slate-900 rounded-2xl font-bold transition-all"
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
                            stroke-width="2"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"
                        ></path>
                    </svg>
                    <span>Input Nilai</span>
                </a>

                <a
                    href="{{ route('dosen.exams') }}"
                    class="flex items-center gap-4 p-4 text-slate-500 hover:bg-slate-50 hover:text-slate-900 rounded-2xl font-bold transition-all"
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
                            stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
                        ></path>
                    </svg>
                    <span>Kelola Ujian</span>
                </a>

                <a
                    href="{{ route('dosen.messages') }}"
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
                                stroke-width="2"
                                d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"
                            ></path>
                        </svg>
                        <span>Pesan</span>
                    </div>
                    <span
                        class="text-[10px] bg-blue-200 text-blue-800 px-2 py-1 rounded-lg font-black"
                        >3</span
                    >
                </a>

                <a
                    href="{{ route('dosen.profile') }}"
                    class="flex items-center gap-4 p-4 text-slate-500 hover:bg-slate-50 hover:text-slate-900 rounded-2xl font-bold transition-all"
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
                            stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                        ></path>
                    </svg>
                    <span>Profil Saya</span>
                </a>
            </nav>

            <div class="p-6 border-t border-slate-100">
                <a
                    href="{{ route('logout') }}"
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
                </a>
            </div>
        </aside>

        <main class="flex-1 h-screen flex flex-col bg-[#f8fafc]">
            <header
                class="bg-white/80 backdrop-blur-xl border-b border-slate-200/60 px-8 py-6 sticky top-0 z-30 flex items-center justify-between flex-shrink-0"
            >
                <div>
                    <h2
                        class="text-2xl font-black text-slate-900 tracking-tight"
                    >
                        Pesan Masuk
                    </h2>
                    <p class="text-sm font-medium text-slate-500">
                        Komunikasi dengan mahasiswa
                    </p>
                </div>
            </header>

            <div class="flex-1 flex overflow-hidden">
                <div
                    class="w-80 bg-white border-r border-slate-200 overflow-y-auto z-10 flex flex-col"
                >
                    <div
                        class="p-6 sticky top-0 bg-white/95 backdrop-blur-sm z-10 border-b border-slate-100"
                    >
                        <input
                            type="text"
                            placeholder="Cari mahasiswa..."
                            class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-3.5 text-sm font-bold focus:ring-2 focus:ring-blue-500 outline-none"
                        />
                    </div>
                    <div class="p-4 space-y-2">
                        <div
                            class="p-4 bg-blue-50 rounded-2xl cursor-pointer flex gap-4 items-center border border-blue-100 shadow-sm transition-all relative"
                        >
                            <div
                                class="w-12 h-12 bg-slate-200 rounded-full overflow-hidden shrink-0"
                            >
                                <img
                                    src="https://ui-avatars.com/api/?name=Ridwan+Firdaus&background=0D8ABC&color=fff"
                                    class="w-full h-full object-cover"
                                />
                            </div>
                            <div class="flex-1 min-w-0">
                                <h4
                                    class="text-sm font-black text-slate-900 truncate"
                                >
                                    M. Ridwan Firdaus
                                </h4>
                                <p
                                    class="text-xs text-blue-600 truncate font-bold"
                                >
                                    Baik pak, terima kasih...
                                </p>
                            </div>
                            <span
                                class="w-2.5 h-2.5 bg-blue-600 rounded-full"
                            ></span>
                        </div>

                        <div
                            class="p-4 hover:bg-slate-50 rounded-2xl cursor-pointer flex gap-4 items-center transition-all"
                        >
                            <div
                                class="w-12 h-12 bg-slate-200 rounded-full overflow-hidden shrink-0"
                            >
                                <img
                                    src="https://ui-avatars.com/api/?name=Siti+Aisyah&background=F1F5F9&color=64748B"
                                    class="w-full h-full object-cover"
                                />
                            </div>
                            <div class="flex-1 min-w-0">
                                <h4
                                    class="text-sm font-bold text-slate-700 truncate"
                                >
                                    Siti Aisyah
                                </h4>
                                <p
                                    class="text-xs text-slate-400 truncate font-medium"
                                >
                                    Izin bertanya soal tugas...
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex-1 flex flex-col bg-slate-50 relative">
                    <div class="flex-1 p-8 space-y-6 overflow-y-auto">
                        <div class="flex justify-end">
                            <div
                                class="bg-blue-600 text-white p-5 rounded-2xl rounded-tr-none max-w-lg shadow-lg shadow-blue-100"
                            >
                                <p class="text-sm font-medium leading-relaxed">
                                    Ridwan, tugas kamu belum lengkap bagian
                                    flowchartnya. Tolong dilengkapi sebelum
                                    tenggat waktu besok.
                                </p>
                                <span
                                    class="text-[10px] text-blue-200 mt-2 block text-right opacity-80"
                                    >10:30 AM</span
                                >
                            </div>
                        </div>

                        <div class="flex justify-start items-end gap-3">
                            <div
                                class="w-8 h-8 rounded-full bg-slate-200 overflow-hidden shrink-0 mb-1"
                            >
                                <img
                                    src="https://ui-avatars.com/api/?name=Ridwan+Firdaus&background=0D8ABC&color=fff"
                                    class="w-full h-full object-cover"
                                />
                            </div>
                            <div
                                class="bg-white text-slate-700 p-5 rounded-2xl rounded-tl-none max-w-lg shadow-sm border border-slate-100"
                            >
                                <p class="text-sm font-medium leading-relaxed">
                                    Baik pak, akan segera saya perbaiki dan
                                    upload ulang filenya. Terima kasih
                                    diingatkan.
                                </p>
                                <span
                                    class="text-[10px] text-slate-400 mt-2 block"
                                    >10:32 AM</span
                                >
                            </div>
                        </div>
                    </div>

                    <div
                        class="p-6 bg-white border-t border-slate-200 flex-shrink-0"
                    >
                        <div class="flex gap-4">
                            <input
                                type="text"
                                placeholder="Ketik balasan..."
                                class="flex-1 bg-slate-50 border border-slate-200 rounded-2xl px-6 py-4 text-sm font-medium focus:ring-2 focus:ring-blue-500 outline-none"
                            />
                            <button
                                class="bg-blue-600 text-white w-14 h-14 rounded-2xl flex items-center justify-center hover:bg-blue-700 shadow-lg shadow-blue-200 transition-all"
                            >
                                <svg
                                    class="w-6 h-6 transform rotate-90 ml-1"
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
    </body>
</html>
