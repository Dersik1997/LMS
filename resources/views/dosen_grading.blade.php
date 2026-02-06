<!DOCTYPE html>
<html lang="id" class="h-full">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Input Nilai | Portal Dosen</title>
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
                        Input Nilai
                    </h2>
                    <p class="text-sm font-medium text-slate-500">
                        Kelola penilaian mahasiswa
                    </p>
                </div>

                <div class="flex items-center gap-6">
                    <div class="relative">
                        <select
                            class="appearance-none bg-white border border-slate-200 rounded-xl px-6 py-2.5 font-bold text-sm outline-none focus:ring-2 focus:ring-blue-500 pr-10 shadow-sm text-slate-700 cursor-pointer hover:bg-slate-50 transition-all"
                        >
                            <option>Struktur Data - 3C</option>
                            <option>PBO - 3A</option>
                            <option>Kecerdasan Buatan - 5B</option>
                        </select>
                        <div
                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-slate-500"
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
                                    d="M19 9l-7 7-7-7"
                                ></path>
                            </svg>
                        </div>
                    </div>

            </header>

            <div class="p-6 lg:p-10 max-w-7xl mx-auto w-full">
                <div
                    class="bg-white rounded-[2rem] border border-slate-200 shadow-sm overflow-hidden"
                >
                    <div
                        class="p-6 border-b border-slate-100 flex justify-between items-center bg-slate-50/50"
                    >
                        <h3 class="font-bold text-slate-700">
                            Daftar Mahasiswa (35)
                        </h3>
                        <div class="flex gap-3">
                            <button
                                class="bg-white border border-slate-200 px-4 py-2 rounded-xl text-xs font-bold hover:bg-slate-50 transition-all text-slate-600"
                            >
                                Import Excel
                            </button>
                            <button
                                class="bg-blue-600 text-white px-6 py-2 rounded-xl text-xs font-bold hover:bg-blue-700 shadow-lg shadow-blue-200 transition-all"
                            >
                                Simpan Perubahan
                            </button>
                        </div>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm">
                            <thead
                                class="bg-slate-50 text-slate-500 uppercase tracking-widest text-[10px]"
                            >
                                <tr>
                                    <th class="px-6 py-5 font-black">NIM</th>
                                    <th class="px-6 py-5 font-black">
                                        Nama Mahasiswa
                                    </th>
                                    <th
                                        class="px-6 py-5 font-black text-center"
                                    >
                                        Tugas (30%)
                                    </th>
                                    <th
                                        class="px-6 py-5 font-black text-center"
                                    >
                                        UTS (30%)
                                    </th>
                                    <th
                                        class="px-6 py-5 font-black text-center"
                                    >
                                        UAS (40%)
                                    </th>
                                    <th
                                        class="px-6 py-5 font-black text-center"
                                    >
                                        Total
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100">
                                <tr
                                    class="hover:bg-blue-50/50 transition-colors"
                                >
                                    <td
                                        class="px-6 py-4 font-mono text-slate-500 font-bold"
                                    >
                                        2430511083
                                    </td>
                                    <td
                                        class="px-6 py-4 font-bold text-slate-800"
                                    >
                                        Muhammad Ridwan Firdaus
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <input
                                            type="number"
                                            value="95"
                                            class="w-20 bg-slate-50 border border-slate-200 rounded-lg p-2 text-center font-bold focus:border-blue-500 outline-none focus:ring-2 focus:ring-blue-100 transition-all text-slate-700"
                                        />
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <input
                                            type="number"
                                            value="88"
                                            class="w-20 bg-slate-50 border border-slate-200 rounded-lg p-2 text-center font-bold focus:border-blue-500 outline-none focus:ring-2 focus:ring-blue-100 transition-all text-slate-700"
                                        />
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <input
                                            type="number"
                                            placeholder="0"
                                            class="w-20 bg-white border border-slate-200 rounded-lg p-2 text-center font-bold focus:border-blue-500 outline-none focus:ring-2 focus:ring-blue-100 transition-all text-slate-700 placeholder:text-slate-300"
                                        />
                                    </td>
                                    <td
                                        class="px-6 py-4 text-center font-black text-blue-600"
                                    >
                                        --
                                    </td>
                                </tr>
                                <tr
                                    class="hover:bg-blue-50/50 transition-colors"
                                >
                                    <td
                                        class="px-6 py-4 font-mono text-slate-500 font-bold"
                                    >
                                        2430511084
                                    </td>
                                    <td
                                        class="px-6 py-4 font-bold text-slate-800"
                                    >
                                        Siti Aisyah
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <input
                                            type="number"
                                            value="90"
                                            class="w-20 bg-slate-50 border border-slate-200 rounded-lg p-2 text-center font-bold focus:border-blue-500 outline-none focus:ring-2 focus:ring-blue-100 transition-all text-slate-700"
                                        />
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <input
                                            type="number"
                                            value="92"
                                            class="w-20 bg-slate-50 border border-slate-200 rounded-lg p-2 text-center font-bold focus:border-blue-500 outline-none focus:ring-2 focus:ring-blue-100 transition-all text-slate-700"
                                        />
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <input
                                            type="number"
                                            placeholder="0"
                                            class="w-20 bg-white border border-slate-200 rounded-lg p-2 text-center font-bold focus:border-blue-500 outline-none focus:ring-2 focus:ring-blue-100 transition-all text-slate-700 placeholder:text-slate-300"
                                        />
                                    </td>
                                    <td
                                        class="px-6 py-4 text-center font-black text-blue-600"
                                    >
                                        --
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </body>
</html>
