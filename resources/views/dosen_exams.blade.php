<!DOCTYPE html>
<html lang="id" class="h-full">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Kelola Ujian | Portal Dosen</title>
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
                            d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"
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
                    class="flex items-center gap-4 p-4 bg-blue-50 text-blue-700 rounded-2xl font-bold transition-all shadow-sm border border-blue-100"
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
                                stroke-width="2"
                                d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"
                            ></path>
                        </svg>
                        <span>Pesan</span>
                    </div>
                    <span
                        class="text-[10px] bg-red-100 text-red-600 px-2 py-1 rounded-lg font-black"
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

        <main
            class="flex-1 h-screen overflow-y-auto flex flex-col relative bg-[#f8fafc]"
        >
            <header
                class="bg-white/80 backdrop-blur-xl border-b border-slate-200/60 px-8 py-6 sticky top-0 z-30 flex items-center justify-between"
            >
                <div>
                    <h2
                        class="text-2xl font-black text-slate-900 tracking-tight"
                    >
                        Kelola Ujian & Kuis
                    </h2>
                    <p class="text-sm font-medium text-slate-500">
                        Bank Soal, UTS, UAS, dan Kuis Harian
                    </p>
                </div>
            </header>

            <div class="p-6 lg:p-10 max-w-7xl mx-auto w-full space-y-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div
                        class="bg-white p-6 rounded-[2rem] border border-slate-200 shadow-sm flex items-center justify-between"
                    >
                        <div>
                            <p
                                class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1"
                            >
                                Ujian Aktif
                            </p>
                            <h2 class="text-3xl font-black text-slate-900">
                                2
                            </h2>
                        </div>
                        <div
                            class="w-12 h-12 bg-emerald-50 text-emerald-600 rounded-2xl flex items-center justify-center"
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
                    </div>
                    <div
                        class="bg-white p-6 rounded-[2rem] border border-slate-200 shadow-sm flex items-center justify-between"
                    >
                        <div>
                            <p
                                class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1"
                            >
                                Terjadwal
                            </p>
                            <h2 class="text-3xl font-black text-slate-900">
                                1
                            </h2>
                        </div>
                        <div
                            class="w-12 h-12 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center"
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
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
                                ></path>
                            </svg>
                        </div>
                    </div>
                    <div
                        class="bg-white p-6 rounded-[2rem] border border-slate-200 shadow-sm flex items-center justify-between"
                    >
                        <div>
                            <p
                                class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1"
                            >
                                Selesai
                            </p>
                            <h2 class="text-3xl font-black text-slate-900">
                                5
                            </h2>
                        </div>
                        <div
                            class="w-12 h-12 bg-slate-100 text-slate-600 rounded-2xl flex items-center justify-center"
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
                                    d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"
                                ></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="space-y-6">
                    <div class="flex gap-2 border-b border-slate-200 mb-6">
                        <button
                            class="px-6 py-3 border-b-2 border-slate-900 text-slate-900 font-bold text-sm"
                        >
                            Semua
                        </button>
                        <button
                            class="px-6 py-3 border-b-2 border-transparent text-slate-400 font-bold text-sm hover:text-slate-800"
                        >
                            UTS
                        </button>
                        <button
                            class="px-6 py-3 border-b-2 border-transparent text-slate-400 font-bold text-sm hover:text-slate-800"
                        >
                            UAS
                        </button>
                        <button
                            class="px-6 py-3 border-b-2 border-transparent text-slate-400 font-bold text-sm hover:text-slate-800"
                        >
                            Kuis
                        </button>
                    </div>

                    <div
                        onclick="alert('Buka Modal Buat Ujian')"
                        class="bg-slate-50 border-2 border-dashed border-slate-300 rounded-[2.5rem] p-8 flex flex-col items-center justify-center cursor-pointer hover:border-blue-400 hover:bg-blue-50 transition-all group min-h-[150px]"
                    >
                        <div
                            class="w-16 h-16 bg-white rounded-full flex items-center justify-center mb-4 group-hover:scale-110 transition-transform shadow-sm"
                        >
                            <svg
                                class="w-8 h-8 text-slate-400 group-hover:text-blue-500"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M12 4v16m8-8H4"
                                ></path>
                            </svg>
                        </div>
                        <h3
                            class="text-lg font-black text-slate-400 group-hover:text-blue-600 transition-colors uppercase tracking-widest"
                        >
                            Buat Ujian Baru
                        </h3>
                    </div>

                    <div
                        class="group bg-white p-6 rounded-[2.5rem] border border-slate-200 shadow-sm hover:shadow-lg transition-all flex flex-col md:flex-row items-center gap-6"
                    >
                        <div
                            class="w-full md:w-20 h-20 bg-orange-100 text-orange-600 rounded-3xl flex flex-col items-center justify-center shrink-0"
                        >
                            <span
                                class="text-xs font-bold uppercase tracking-wider"
                                >FEB</span
                            >
                            <span class="text-2xl font-black">04</span>
                        </div>
                        <div class="flex-1 w-full text-center md:text-left">
                            <div
                                class="flex flex-col md:flex-row items-center gap-3 mb-1"
                            >
                                <h4
                                    class="text-lg font-black text-slate-900 group-hover:text-blue-600 transition-colors"
                                >
                                    UTS: Algoritma & Pemrograman
                                </h4>
                                <span
                                    class="px-3 py-1 bg-emerald-100 text-emerald-700 text-[10px] font-bold rounded-full uppercase tracking-wide"
                                    >Sedang Berlangsung</span
                                >
                            </div>
                            <p class="text-sm text-slate-500 font-medium">
                                Struktur Data (3C) • 08:00 - 10:00 WIB
                            </p>
                        </div>
                        <div class="flex items-center gap-3 w-full md:w-auto">
                            <div class="text-right hidden md:block">
                                <span
                                    class="block text-xl font-black text-slate-900"
                                    >32<span
                                        class="text-sm text-slate-400 font-bold"
                                        >/35</span
                                    ></span
                                >
                                <span
                                    class="text-[9px] font-bold text-slate-400 uppercase tracking-widest"
                                    >Submit</span
                                >
                            </div>
                            <button
                                class="flex-1 md:flex-none px-6 py-3 bg-slate-900 text-white rounded-xl font-bold text-xs uppercase tracking-widest hover:bg-blue-600 transition-all"
                            >
                                Pantau
                            </button>
                        </div>
                    </div>

                    <div
                        class="group bg-white p-6 rounded-[2.5rem] border border-slate-200 shadow-sm hover:shadow-lg transition-all flex flex-col md:flex-row items-center gap-6 opacity-75 hover:opacity-100"
                    >
                        <div
                            class="w-full md:w-20 h-20 bg-blue-50 text-blue-600 rounded-3xl flex flex-col items-center justify-center shrink-0"
                        >
                            <span
                                class="text-xs font-bold uppercase tracking-wider"
                                >FEB</span
                            >
                            <span class="text-2xl font-black">10</span>
                        </div>
                        <div class="flex-1 w-full text-center md:text-left">
                            <div
                                class="flex flex-col md:flex-row items-center gap-3 mb-1"
                            >
                                <h4
                                    class="text-lg font-black text-slate-900 group-hover:text-blue-600 transition-colors"
                                >
                                    Kuis 2: Konsep OOP
                                </h4>
                                <span
                                    class="px-3 py-1 bg-blue-100 text-blue-700 text-[10px] font-bold rounded-full uppercase tracking-wide"
                                    >Terjadwal</span
                                >
                            </div>
                            <p class="text-sm text-slate-500 font-medium">
                                Pemrograman Objek (3A) • 13:00 - 14:00 WIB
                            </p>
                        </div>
                        <div class="flex items-center gap-3 w-full md:w-auto">
                            <button
                                class="flex-1 md:flex-none px-6 py-3 border border-slate-200 text-slate-500 rounded-xl font-bold text-xs uppercase tracking-widest hover:border-slate-400 hover:text-slate-800 transition-all"
                            >
                                Edit Soal
                            </button>
                        </div>
                    </div>

                    <div
                        class="group bg-white p-6 rounded-[2.5rem] border border-slate-200 shadow-sm hover:shadow-lg transition-all flex flex-col md:flex-row items-center gap-6 opacity-60 hover:opacity-100"
                    >
                        <div
                            class="w-full md:w-20 h-20 bg-slate-100 text-slate-500 rounded-3xl flex flex-col items-center justify-center shrink-0"
                        >
                            <span
                                class="text-xs font-bold uppercase tracking-wider"
                                >JAN</span
                            >
                            <span class="text-2xl font-black">28</span>
                        </div>
                        <div class="flex-1 w-full text-center md:text-left">
                            <div
                                class="flex flex-col md:flex-row items-center gap-3 mb-1"
                            >
                                <h4 class="text-lg font-black text-slate-900">
                                    Kuis 1: Pengantar Struktur Data
                                </h4>
                                <span
                                    class="px-3 py-1 bg-slate-200 text-slate-600 text-[10px] font-bold rounded-full uppercase tracking-wide"
                                    >Selesai</span
                                >
                            </div>
                            <p class="text-sm text-slate-500 font-medium">
                                Struktur Data (3C) • 35 Peserta
                            </p>
                        </div>
                        <div class="flex items-center gap-3 w-full md:w-auto">
                            <button
                                class="flex-1 md:flex-none px-6 py-3 border border-slate-200 text-blue-600 rounded-xl font-bold text-xs uppercase tracking-widest hover:bg-blue-50 transition-all"
                            >
                                Lihat Hasil
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </body>
</html>
