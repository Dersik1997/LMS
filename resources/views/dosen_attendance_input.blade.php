<!DOCTYPE html>
<html lang="id" class="h-full">
    <head>
        <meta charset="UTF-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"
        />
        <title>Input Manual - Pertemuan 2 | Portal Dosen</title>
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

            /* Custom Radio Style */
            .radio-input:checked + .radio-label {
                background-color: var(--bg-color);
                color: white;
                border-color: var(--border-color);
                box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            }
        </style>
    </head>
    <body
        class="font-['Plus_Jakarta_Sans'] bg-[#f8fafc] text-slate-800 min-h-full flex flex-col border-box overflow-x-hidden"
    >
        <div
            class="bg-white/90 backdrop-blur-xl border-b border-slate-200 sticky top-0 z-40 px-4 md:px-6 py-4 shadow-sm transition-all"
        >
            <div class="max-w-6xl mx-auto flex items-center gap-4">
                <a
                    href="{{ route('dosen.course.attendance') }}"
                    class="w-10 h-10 rounded-full bg-slate-50 hover:bg-slate-100 text-slate-400 hover:text-slate-600 flex items-center justify-center transition-all border border-slate-200 shrink-0"
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
                        class="text-xl font-extrabold text-slate-900 tracking-tight leading-none truncate"
                    >
                        Input Presensi
                    </h1>
                    <p
                        class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mt-1 truncate"
                    >
                        Pertemuan 2: Array & Memory
                    </p>
                </div>
            </div>
        </div>

        <main
            class="flex-1 max-w-6xl mx-auto p-4 md:p-6 lg:p-8 w-full space-y-6"
        >
            <div
                class="flex flex-col md:flex-row justify-between items-end md:items-center gap-4 bg-white p-6 rounded-[2rem] border border-slate-200 shadow-sm"
            >
                <div>
                    <span
                        class="inline-block px-3 py-1 bg-blue-50 text-blue-600 rounded-lg text-[10px] font-bold uppercase tracking-widest mb-1"
                        >Status: Sedang Berlangsung</span
                    >
                    <h2 class="text-lg font-black text-slate-900">
                        Pertemuan 2: Array & Memory Management
                    </h2>
                    <p class="text-xs text-slate-500 font-medium">
                        Selasa, 4 Feb 2026 • 08:00 - 10:30 WIB
                    </p>
                </div>
                <div class="flex gap-3 w-full md:w-auto">
                    <button
                        class="flex-1 md:flex-none px-6 py-3 rounded-xl border border-slate-200 text-slate-500 font-bold text-xs uppercase tracking-widest hover:bg-slate-50 transition-all"
                    >
                        Reset
                    </button>
                    <button
                        class="flex-1 md:flex-none px-8 py-3 bg-blue-600 text-white rounded-xl font-bold text-xs uppercase tracking-widest hover:bg-blue-700 transition-all shadow-lg shadow-blue-200"
                    >
                        Simpan (35)
                    </button>
                </div>
            </div>

            <div
                class="bg-white rounded-[2.5rem] border border-slate-200 shadow-sm overflow-hidden"
            >
                <div
                    class="bg-slate-50/50 p-4 md:p-6 border-b border-slate-100 flex justify-between items-center"
                >
                    <h3
                        class="font-bold text-slate-700 text-sm uppercase tracking-wider"
                    >
                        Daftar Mahasiswa (35)
                    </h3>
                    <div class="flex gap-2">
                        <span
                            class="w-3 h-3 bg-emerald-500 rounded-full inline-block"
                        ></span>
                        <span
                            class="text-[10px] font-bold text-slate-400 uppercase"
                            >Hadir</span
                        >
                    </div>
                </div>

                <div class="divide-y divide-slate-100">
                    <div
                        class="p-4 md:p-6 flex flex-col md:flex-row md:items-center justify-between gap-4 hover:bg-slate-50 transition-colors"
                    >
                        <div class="flex items-center gap-4">
                            <div
                                class="w-10 h-10 rounded-full bg-indigo-100 text-indigo-600 flex items-center justify-center font-bold text-xs shrink-0"
                            >
                                RF
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-900 text-sm">
                                    Ridwan Firdaus
                                </h4>
                                <p class="text-[10px] text-slate-400 font-mono">
                                    2230511041
                                </p>
                            </div>
                        </div>

                        <div
                            class="flex items-center gap-2 bg-slate-50 p-1.5 rounded-xl border border-slate-200 w-full md:w-auto justify-between"
                        >
                            <label class="cursor-pointer relative">
                                <input
                                    type="radio"
                                    name="status_1"
                                    value="H"
                                    class="radio-input hidden"
                                    checked
                                />
                                <div
                                    class="radio-label w-10 h-10 md:w-12 md:h-10 rounded-lg flex items-center justify-center font-black text-xs text-slate-400 hover:bg-white transition-all border border-transparent"
                                    style="
                                        --bg-color: #10b981;
                                        --border-color: #059669;
                                    "
                                >
                                    H
                                </div>
                            </label>
                            <label class="cursor-pointer relative">
                                <input
                                    type="radio"
                                    name="status_1"
                                    value="I"
                                    class="radio-input hidden"
                                />
                                <div
                                    class="radio-label w-10 h-10 md:w-12 md:h-10 rounded-lg flex items-center justify-center font-black text-xs text-slate-400 hover:bg-white transition-all border border-transparent"
                                    style="
                                        --bg-color: #3b82f6;
                                        --border-color: #2563eb;
                                    "
                                >
                                    I
                                </div>
                            </label>
                            <label class="cursor-pointer relative">
                                <input
                                    type="radio"
                                    name="status_1"
                                    value="S"
                                    class="radio-input hidden"
                                />
                                <div
                                    class="radio-label w-10 h-10 md:w-12 md:h-10 rounded-lg flex items-center justify-center font-black text-xs text-slate-400 hover:bg-white transition-all border border-transparent"
                                    style="
                                        --bg-color: #f59e0b;
                                        --border-color: #d97706;
                                    "
                                >
                                    S
                                </div>
                            </label>
                            <label class="cursor-pointer relative">
                                <input
                                    type="radio"
                                    name="status_1"
                                    value="A"
                                    class="radio-input hidden"
                                />
                                <div
                                    class="radio-label w-10 h-10 md:w-12 md:h-10 rounded-lg flex items-center justify-center font-black text-xs text-slate-400 hover:bg-white transition-all border border-transparent"
                                    style="
                                        --bg-color: #ef4444;
                                        --border-color: #dc2626;
                                    "
                                >
                                    A
                                </div>
                            </label>
                        </div>
                    </div>

                    <div
                        class="p-4 md:p-6 flex flex-col md:flex-row md:items-center justify-between gap-4 bg-orange-50/30"
                    >
                        <div class="flex items-center gap-4">
                            <div
                                class="w-10 h-10 rounded-full bg-orange-100 text-orange-600 flex items-center justify-center font-bold text-xs shrink-0"
                            >
                                DA
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-900 text-sm">
                                    Dina Aulia
                                </h4>
                                <p class="text-[10px] text-slate-400 font-mono">
                                    2230511042
                                </p>
                            </div>
                        </div>

                        <div
                            class="flex items-center gap-2 bg-white p-1.5 rounded-xl border border-orange-200 w-full md:w-auto justify-between shadow-sm"
                        >
                            <label class="cursor-pointer relative">
                                <input
                                    type="radio"
                                    name="status_2"
                                    value="H"
                                    class="radio-input hidden"
                                />
                                <div
                                    class="radio-label w-10 h-10 md:w-12 md:h-10 rounded-lg flex items-center justify-center font-black text-xs text-slate-400 hover:bg-slate-50 transition-all border border-transparent"
                                    style="
                                        --bg-color: #10b981;
                                        --border-color: #059669;
                                    "
                                >
                                    H
                                </div>
                            </label>
                            <label class="cursor-pointer relative">
                                <input
                                    type="radio"
                                    name="status_2"
                                    value="I"
                                    class="radio-input hidden"
                                />
                                <div
                                    class="radio-label w-10 h-10 md:w-12 md:h-10 rounded-lg flex items-center justify-center font-black text-xs text-slate-400 hover:bg-slate-50 transition-all border border-transparent"
                                    style="
                                        --bg-color: #3b82f6;
                                        --border-color: #2563eb;
                                    "
                                >
                                    I
                                </div>
                            </label>
                            <label class="cursor-pointer relative">
                                <input
                                    type="radio"
                                    name="status_2"
                                    value="S"
                                    class="radio-input hidden"
                                    checked
                                />
                                <div
                                    class="radio-label w-10 h-10 md:w-12 md:h-10 rounded-lg flex items-center justify-center font-black text-xs text-slate-400 hover:bg-slate-50 transition-all border border-transparent"
                                    style="
                                        --bg-color: #f59e0b;
                                        --border-color: #d97706;
                                    "
                                >
                                    S
                                </div>
                            </label>
                            <label class="cursor-pointer relative">
                                <input
                                    type="radio"
                                    name="status_2"
                                    value="A"
                                    class="radio-input hidden"
                                />
                                <div
                                    class="radio-label w-10 h-10 md:w-12 md:h-10 rounded-lg flex items-center justify-center font-black text-xs text-slate-400 hover:bg-slate-50 transition-all border border-transparent"
                                    style="
                                        --bg-color: #ef4444;
                                        --border-color: #dc2626;
                                    "
                                >
                                    A
                                </div>
                            </label>
                        </div>
                    </div>

                    <div
                        class="p-4 md:p-6 flex flex-col md:flex-row md:items-center justify-between gap-4 bg-red-50/30"
                    >
                        <div class="flex items-center gap-4">
                            <div
                                class="w-10 h-10 rounded-full bg-red-100 text-red-600 flex items-center justify-center font-bold text-xs shrink-0"
                            >
                                BJ
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-900 text-sm">
                                    Budi Jaya
                                </h4>
                                <p class="text-[10px] text-slate-400 font-mono">
                                    2230511045
                                </p>
                            </div>
                        </div>

                        <div
                            class="flex items-center gap-2 bg-white p-1.5 rounded-xl border border-red-200 w-full md:w-auto justify-between shadow-sm"
                        >
                            <label class="cursor-pointer relative">
                                <input
                                    type="radio"
                                    name="status_3"
                                    value="H"
                                    class="radio-input hidden"
                                />
                                <div
                                    class="radio-label w-10 h-10 md:w-12 md:h-10 rounded-lg flex items-center justify-center font-black text-xs text-slate-400 hover:bg-slate-50 transition-all border border-transparent"
                                    style="
                                        --bg-color: #10b981;
                                        --border-color: #059669;
                                    "
                                >
                                    H
                                </div>
                            </label>
                            <label class="cursor-pointer relative">
                                <input
                                    type="radio"
                                    name="status_3"
                                    value="I"
                                    class="radio-input hidden"
                                />
                                <div
                                    class="radio-label w-10 h-10 md:w-12 md:h-10 rounded-lg flex items-center justify-center font-black text-xs text-slate-400 hover:bg-slate-50 transition-all border border-transparent"
                                    style="
                                        --bg-color: #3b82f6;
                                        --border-color: #2563eb;
                                    "
                                >
                                    I
                                </div>
                            </label>
                            <label class="cursor-pointer relative">
                                <input
                                    type="radio"
                                    name="status_3"
                                    value="S"
                                    class="radio-input hidden"
                                />
                                <div
                                    class="radio-label w-10 h-10 md:w-12 md:h-10 rounded-lg flex items-center justify-center font-black text-xs text-slate-400 hover:bg-slate-50 transition-all border border-transparent"
                                    style="
                                        --bg-color: #f59e0b;
                                        --border-color: #d97706;
                                    "
                                >
                                    S
                                </div>
                            </label>
                            <label class="cursor-pointer relative">
                                <input
                                    type="radio"
                                    name="status_3"
                                    value="A"
                                    class="radio-input hidden"
                                    checked
                                />
                                <div
                                    class="radio-label w-10 h-10 md:w-12 md:h-10 rounded-lg flex items-center justify-center font-black text-xs text-slate-400 hover:bg-slate-50 transition-all border border-transparent"
                                    style="
                                        --bg-color: #ef4444;
                                        --border-color: #dc2626;
                                    "
                                >
                                    A
                                </div>
                            </label>
                        </div>
                    </div>

                    <div
                        class="p-4 md:p-6 flex flex-col md:flex-row md:items-center justify-between gap-4 hover:bg-slate-50 transition-colors"
                    >
                        <div class="flex items-center gap-4">
                            <div
                                class="w-10 h-10 rounded-full bg-pink-100 text-pink-600 flex items-center justify-center font-bold text-xs shrink-0"
                            >
                                SR
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-900 text-sm">
                                    Siti Rahmawati
                                </h4>
                                <p class="text-[10px] text-slate-400 font-mono">
                                    2230511043
                                </p>
                            </div>
                        </div>

                        <div
                            class="flex items-center gap-2 bg-slate-50 p-1.5 rounded-xl border border-slate-200 w-full md:w-auto justify-between"
                        >
                            <label class="cursor-pointer relative">
                                <input
                                    type="radio"
                                    name="status_4"
                                    value="H"
                                    class="radio-input hidden"
                                    checked
                                />
                                <div
                                    class="radio-label w-10 h-10 md:w-12 md:h-10 rounded-lg flex items-center justify-center font-black text-xs text-slate-400 hover:bg-white transition-all border border-transparent"
                                    style="
                                        --bg-color: #10b981;
                                        --border-color: #059669;
                                    "
                                >
                                    H
                                </div>
                            </label>
                            <label class="cursor-pointer relative">
                                <input
                                    type="radio"
                                    name="status_4"
                                    value="I"
                                    class="radio-input hidden"
                                />
                                <div
                                    class="radio-label w-10 h-10 md:w-12 md:h-10 rounded-lg flex items-center justify-center font-black text-xs text-slate-400 hover:bg-white transition-all border border-transparent"
                                    style="
                                        --bg-color: #3b82f6;
                                        --border-color: #2563eb;
                                    "
                                >
                                    I
                                </div>
                            </label>
                            <label class="cursor-pointer relative">
                                <input
                                    type="radio"
                                    name="status_4"
                                    value="S"
                                    class="radio-input hidden"
                                />
                                <div
                                    class="radio-label w-10 h-10 md:w-12 md:h-10 rounded-lg flex items-center justify-center font-black text-xs text-slate-400 hover:bg-white transition-all border border-transparent"
                                    style="
                                        --bg-color: #f59e0b;
                                        --border-color: #d97706;
                                    "
                                >
                                    S
                                </div>
                            </label>
                            <label class="cursor-pointer relative">
                                <input
                                    type="radio"
                                    name="status_4"
                                    value="A"
                                    class="radio-input hidden"
                                />
                                <div
                                    class="radio-label w-10 h-10 md:w-12 md:h-10 rounded-lg flex items-center justify-center font-black text-xs text-slate-400 hover:bg-white transition-all border border-transparent"
                                    style="
                                        --bg-color: #ef4444;
                                        --border-color: #dc2626;
                                    "
                                >
                                    A
                                </div>
                            </label>
                        </div>
                    </div>
                </div>

                <div
                    class="p-6 bg-slate-50 border-t border-slate-100 flex justify-center"
                >
                    <span class="text-xs font-bold text-slate-400"
                        >Menampilkan 4 dari 35 Mahasiswa</span
                    >
                </div>
            </div>
        </main>
    </body>
</html>
