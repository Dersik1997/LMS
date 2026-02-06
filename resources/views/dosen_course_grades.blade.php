<!DOCTYPE html>
<html lang="id" class="h-full">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Rekap Nilai | Portal Dosen</title>
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
        class="font-['Plus_Jakarta_Sans'] bg-[#f8fafc] text-slate-800 min-h-full flex flex-col border-box overflow-x-hidden"
    >
        <div
            class="bg-white/90 backdrop-blur-xl border-b border-slate-200 sticky top-0 z-30 px-4 md:px-6 py-4 shadow-sm transition-all"
        >
            <div
                class="max-w-6xl mx-auto flex flex-col md:flex-row md:items-center md:justify-between gap-4 md:gap-6"
            >
                <div class="flex items-center gap-4 w-full md:w-auto">
                    <a
                        href="{{ route('dosen.courses') }}"
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
                    </a>
                    <div class="overflow-hidden">
                        <h1
                            class="text-xl font-extrabold text-slate-900 tracking-tight leading-none truncate max-w-[250px] md:max-w-none"
                        >
                            Struktur Data
                        </h1>
                        <div class="flex items-center gap-2 mt-1">
                            <span
                                class="text-[10px] font-bold text-blue-600 uppercase tracking-widest bg-blue-50 px-2 py-0.5 rounded"
                                >Kelas 3C</span
                            >
                            <span
                                class="text-[10px] font-bold text-slate-400 uppercase tracking-widest truncate"
                                >Dosen: Asril Adi Sunarto</span
                            >
                        </div>
                    </div>
                </div>

                <div class="hidden md:block w-px h-8 bg-slate-200"></div>

                <nav
                    class="w-full md:w-auto flex p-1 bg-slate-100 rounded-xl overflow-x-auto scrollbar-hide snap-x gap-1"
                >
                    <a
                        href="{{ route('dosen.course.manage') }}"
                        class="snap-start shrink-0 px-5 py-2 rounded-lg text-slate-500 hover:text-slate-900 font-bold text-[10px] uppercase tracking-widest transition-all whitespace-nowrap hover:bg-white/50 flex items-center justify-center"
                    >
                        Materi & Modul
                    </a>
                    <a
                        href="{{ route('dosen.course.attendance') }}"
                        class="snap-start shrink-0 px-5 py-2 rounded-lg text-slate-500 hover:text-slate-900 font-bold text-[10px] uppercase tracking-widest transition-all whitespace-nowrap hover:bg-white/50 flex items-center justify-center"
                    >
                        Absensi
                    </a>
                    <a
                        href="{{ route('dosen.course.assignments') }}"
                        class="snap-start shrink-0 px-5 py-2 rounded-lg text-slate-500 hover:text-slate-900 font-bold text-[10px] uppercase tracking-widest transition-all whitespace-nowrap hover:bg-white/50 flex items-center justify-center"
                    >
                        Penugasan (2)
                    </a>
                    <a
                        href="{{ route('dosen.course.students') }}"
                        class="snap-start shrink-0 px-5 py-2 rounded-lg text-slate-500 hover:text-slate-900 font-bold text-[10px] uppercase tracking-widest transition-all whitespace-nowrap hover:bg-white/50 flex items-center justify-center"
                    >
                        Peserta (35)
                    </a>
                    <button
                        class="snap-start shrink-0 px-5 py-2 rounded-lg bg-white text-blue-700 font-bold text-[10px] uppercase tracking-widest shadow-sm border border-slate-200 whitespace-nowrap transition-all"
                    >
                        Rekap Nilai
                    </button>
                </nav>

                <div class="hidden md:flex items-center justify-end w-10"></div>
            </div>
        </div>

        <main
            class="flex-1 max-w-6xl mx-auto p-4 md:p-6 lg:p-8 w-full space-y-8"
        >
            <div class="space-y-6">
                <div
                    class="flex flex-col md:flex-row justify-between items-end md:items-center gap-4"
                >
                    <div>
                        <h2
                            class="text-2xl font-black text-slate-900 tracking-tight"
                        >
                            Rekapitulasi Nilai
                        </h2>
                        <p class="text-sm text-slate-500 font-medium mt-1">
                            Pantau performa akademik mahasiswa semester ini.
                        </p>
                    </div>
                    <div class="flex gap-3">
                        <a
                            href="{{ route('dosen.grades.settings') }}"
                            class="px-5 py-2.5 bg-white border border-slate-200 rounded-xl text-xs font-bold text-slate-600 hover:bg-slate-50 hover:text-slate-900 transition-all shadow-sm flex items-center justify-center"
                        >
                            Edit Bobot
                        </a>

                        <button
                            class="px-5 py-2.5 bg-emerald-600 text-white rounded-xl text-xs font-bold hover:bg-emerald-700 transition-all shadow-lg shadow-emerald-200 flex items-center gap-2"
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
                                    d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"
                                ></path>
                            </svg>
                            Export Excel
                        </button>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div
                        class="bg-blue-600 rounded-[2rem] p-6 text-white shadow-xl shadow-blue-200 relative overflow-hidden"
                    >
                        <div class="relative z-10">
                            <p
                                class="text-[10px] font-bold uppercase tracking-widest opacity-80 mb-1"
                            >
                                Rata-rata Kelas
                            </p>
                            <h3 class="text-3xl font-black">82.5</h3>
                            <p
                                class="text-xs font-medium mt-2 bg-white/20 inline-block px-2 py-1 rounded"
                            >
                                +2.4 dari semester lalu
                            </p>
                        </div>
                        <div
                            class="absolute -right-6 -bottom-10 w-32 h-32 bg-white/10 rounded-full blur-2xl"
                        ></div>
                    </div>
                    <div
                        class="bg-white rounded-[2rem] p-6 border border-slate-200 shadow-sm flex flex-col justify-center"
                    >
                        <p
                            class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1"
                        >
                            Nilai Tertinggi
                        </p>
                        <div class="flex items-end gap-2">
                            <h3 class="text-3xl font-black text-emerald-600">
                                98.0
                            </h3>
                            <span
                                class="text-xs font-bold text-slate-500 mb-1.5"
                                >Siti Rahmawati</span
                            >
                        </div>
                    </div>
                    <div
                        class="bg-white rounded-[2rem] p-6 border border-slate-200 shadow-sm flex flex-col justify-center"
                    >
                        <p
                            class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1"
                        >
                            Nilai Terendah
                        </p>
                        <div class="flex items-end gap-2">
                            <h3 class="text-3xl font-black text-red-500">
                                45.0
                            </h3>
                            <span
                                class="text-xs font-bold text-slate-500 mb-1.5"
                                >Budi Jaya</span
                            >
                        </div>
                    </div>
                </div>
            </div>

            <div
                class="bg-white rounded-[2.5rem] border border-slate-200 shadow-sm overflow-hidden"
            >
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left">
                        <thead
                            class="bg-slate-50 border-b border-slate-100 text-xs text-slate-500 uppercase tracking-wider font-bold"
                        >
                            <tr>
                                <th class="px-6 py-5 w-10">#</th>
                                <th class="px-6 py-5">Mahasiswa</th>
                                <th class="px-6 py-5 text-center">
                                    Tugas (20%)
                                </th>
                                <th class="px-6 py-5 text-center">UTS (30%)</th>
                                <th class="px-6 py-5 text-center">UAS (40%)</th>
                                <th class="px-6 py-5 text-center">
                                    Absen (10%)
                                </th>
                                <th class="px-6 py-5 text-center">Akhir</th>
                                <th class="px-6 py-5 text-center">Huruf</th>
                                <th class="px-6 py-5 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-6 py-4 font-bold text-slate-400">
                                    1
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="w-8 h-8 rounded-full bg-pink-100 text-pink-600 flex items-center justify-center font-bold text-xs shrink-0"
                                        >
                                            SR
                                        </div>
                                        <div>
                                            <p class="font-bold text-slate-900">
                                                Siti Rahmawati
                                            </p>
                                            <p
                                                class="text-[10px] text-slate-400 font-mono"
                                            >
                                                2230511043
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td
                                    class="px-6 py-4 text-center font-medium text-slate-600"
                                >
                                    95
                                </td>
                                <td
                                    class="px-6 py-4 text-center font-medium text-slate-600"
                                >
                                    90
                                </td>
                                <td
                                    class="px-6 py-4 text-center font-medium text-slate-600"
                                >
                                    92
                                </td>
                                <td
                                    class="px-6 py-4 text-center font-medium text-slate-600"
                                >
                                    100
                                </td>
                                <td
                                    class="px-6 py-4 text-center font-black text-slate-900"
                                >
                                    93.5
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <span
                                        class="bg-emerald-100 text-emerald-700 px-2.5 py-1 rounded-lg text-[10px] font-black uppercase"
                                        >A</span
                                    >
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <a
                                        href="{{ route('dosen.grades.edit') }}"
                                        class="text-blue-600 hover:text-blue-800 font-bold text-xs"
                                        >Edit</a
                                    >
                                </td>
                            </tr>

                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-6 py-4 font-bold text-slate-400">
                                    2
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="w-8 h-8 rounded-full bg-indigo-100 text-indigo-600 flex items-center justify-center font-bold text-xs shrink-0"
                                        >
                                            RF
                                        </div>
                                        <div>
                                            <p class="font-bold text-slate-900">
                                                Ridwan Firdaus
                                            </p>
                                            <p
                                                class="text-[10px] text-slate-400 font-mono"
                                            >
                                                2230511041
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td
                                    class="px-6 py-4 text-center font-medium text-slate-600"
                                >
                                    80
                                </td>
                                <td
                                    class="px-6 py-4 text-center font-medium text-slate-600"
                                >
                                    75
                                </td>
                                <td
                                    class="px-6 py-4 text-center font-medium text-slate-600"
                                >
                                    78
                                </td>
                                <td
                                    class="px-6 py-4 text-center font-medium text-slate-600"
                                >
                                    90
                                </td>
                                <td
                                    class="px-6 py-4 text-center font-black text-slate-900"
                                >
                                    79.2
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <span
                                        class="bg-blue-100 text-blue-700 px-2.5 py-1 rounded-lg text-[10px] font-black uppercase"
                                        >B</span
                                    >
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <a
                                        href="{{ route('dosen.grades.edit') }}"
                                        class="text-blue-600 hover:text-blue-800 font-bold text-xs"
                                        >Edit</a
                                    >
                                </td>
                            </tr>

                            <tr
                                class="bg-red-50/30 hover:bg-red-50/60 transition-colors"
                            >
                                <td class="px-6 py-4 font-bold text-slate-400">
                                    3
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="w-8 h-8 rounded-full bg-red-100 text-red-600 flex items-center justify-center font-bold text-xs shrink-0"
                                        >
                                            BJ
                                        </div>
                                        <div>
                                            <p class="font-bold text-slate-900">
                                                Budi Jaya
                                            </p>
                                            <p
                                                class="text-[10px] text-slate-400 font-mono"
                                            >
                                                2230511045
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td
                                    class="px-6 py-4 text-center font-medium text-slate-600"
                                >
                                    40
                                </td>
                                <td
                                    class="px-6 py-4 text-center font-medium text-slate-600"
                                >
                                    50
                                </td>
                                <td
                                    class="px-6 py-4 text-center font-medium text-slate-600"
                                >
                                    30
                                </td>
                                <td
                                    class="px-6 py-4 text-center font-medium text-red-500"
                                >
                                    50
                                </td>
                                <td
                                    class="px-6 py-4 text-center font-black text-slate-900"
                                >
                                    40.0
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <span
                                        class="bg-red-100 text-red-700 px-2.5 py-1 rounded-lg text-[10px] font-black uppercase"
                                        >D</span
                                    >
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <a
                                        href="{{ route('dosen.grades.edit') }}"
                                        class="text-blue-600 hover:text-blue-800 font-bold text-xs"
                                        >Edit</a
                                    >
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div
                    class="p-6 bg-slate-50 border-t border-slate-100 flex justify-center"
                >
                    <span class="text-xs font-bold text-slate-400"
                        >Menampilkan 3 dari 35 Mahasiswa</span
                    >
                </div>
            </div>
        </main>
    </body>
</html>
