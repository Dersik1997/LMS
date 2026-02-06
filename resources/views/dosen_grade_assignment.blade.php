<!DOCTYPE html>
<html lang="id" class="h-full">
    <head>
        <meta charset="UTF-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"
        />
        <title>Periksa Tugas | Portal Dosen</title>
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
                width: 5px;
            }
            .custom-scrollbar::-webkit-scrollbar-track {
                background: transparent;
            }
            .custom-scrollbar::-webkit-scrollbar-thumb {
                background-color: #cbd5e1;
                border-radius: 20px;
            }
        </style>
    </head>
    <body
        class="m-0 font-['Plus_Jakarta_Sans'] bg-[#f8fafc] min-h-full flex flex-col border-box overflow-x-hidden text-slate-800"
    >
        <div
            class="bg-white/90 backdrop-blur-xl border-b border-slate-200 sticky top-0 z-30 px-6 py-4"
        >
            <div class="max-w-7xl mx-auto flex items-center justify-between">
                <div class="flex items-center gap-4">
                    <a
                        href="{{ route('dosen.course.assignments') }}"
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
                    <div>
                        <h1
                            class="text-lg font-extrabold text-slate-900 tracking-tight"
                        >
                            T1: Implementasi Array
                        </h1>
                        <p
                            class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mt-0.5"
                        >
                            Struktur Data 3C • 28/35 Terkumpul
                        </p>
                    </div>
                </div>

                <div class="flex items-center gap-2">
                    <button
                        class="px-4 py-2 bg-white border border-slate-200 rounded-xl text-xs font-bold text-slate-600 hover:bg-slate-50 transition-all flex items-center gap-2"
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
                                d="M15 19l-7-7 7-7"
                            ></path>
                        </svg>
                        Prev
                    </button>
                    <div
                        class="text-xs font-bold text-slate-400 uppercase tracking-widest px-2"
                    >
                        Mhs 1 dari 28
                    </div>
                    <button
                        class="px-4 py-2 bg-slate-900 text-white rounded-xl text-xs font-bold hover:bg-blue-600 transition-all flex items-center gap-2 shadow-lg"
                    >
                        Next
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
                                d="M9 5l7 7-7 7"
                            ></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <main
            class="flex-1 max-w-7xl mx-auto p-6 w-full h-[calc(100vh-80px)] grid grid-cols-1 lg:grid-cols-12 gap-6"
        >
            <div
                class="hidden lg:block lg:col-span-3 bg-white rounded-[2rem] border border-slate-200 shadow-sm overflow-hidden flex flex-col"
            >
                <div class="p-4 border-b border-slate-100 bg-slate-50">
                    <input
                        type="text"
                        placeholder="Cari Mahasiswa..."
                        class="w-full bg-white border border-slate-200 rounded-xl px-4 py-2 text-xs font-bold focus:outline-none focus:border-blue-500 transition-all"
                    />
                </div>
                <div
                    class="flex-1 overflow-y-auto custom-scrollbar p-2 space-y-1"
                >
                    <div
                        class="p-3 bg-blue-50 border border-blue-100 rounded-xl cursor-pointer flex items-center justify-between group transition-all"
                    >
                        <div class="flex items-center gap-3">
                            <img
                                src="https://ui-avatars.com/api/?name=Ridwan&background=0ea5e9&color=fff"
                                class="w-8 h-8 rounded-full"
                            />
                            <div>
                                <h4 class="text-xs font-bold text-slate-900">
                                    Ridwan Kamil
                                </h4>
                                <p
                                    class="text-[9px] font-bold text-blue-600 uppercase"
                                >
                                    Tepat Waktu
                                </p>
                            </div>
                        </div>
                        <div class="w-2 h-2 bg-blue-600 rounded-full"></div>
                    </div>
                    <div
                        class="p-3 hover:bg-slate-50 border border-transparent hover:border-slate-100 rounded-xl cursor-pointer flex items-center justify-between group transition-all"
                    >
                        <div class="flex items-center gap-3">
                            <img
                                src="https://ui-avatars.com/api/?name=Siti+A&background=random"
                                class="w-8 h-8 rounded-full grayscale opacity-70 group-hover:grayscale-0 group-hover:opacity-100 transition-all"
                            />
                            <div>
                                <h4
                                    class="text-xs font-bold text-slate-600 group-hover:text-slate-900"
                                >
                                    Siti Aminah
                                </h4>
                                <p
                                    class="text-[9px] font-bold text-red-500 uppercase"
                                >
                                    Terlambat 2 Jam
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div
                class="lg:col-span-9 grid grid-cols-1 lg:grid-cols-3 gap-6 h-full overflow-hidden"
            >
                <div
                    class="lg:col-span-2 bg-slate-800 rounded-[2rem] shadow-lg flex flex-col overflow-hidden relative"
                >
                    <div class="absolute top-4 right-4 z-10 flex gap-2">
                        <button
                            class="bg-black/50 text-white px-3 py-1.5 rounded-lg text-[10px] font-bold uppercase backdrop-blur-md hover:bg-black/70 transition-all"
                        >
                            Download
                        </button>
                    </div>
                    <div
                        class="flex-1 flex items-center justify-center bg-slate-900/50"
                    >
                        <div class="text-center">
                            <svg
                                class="w-16 h-16 text-slate-600 mx-auto mb-4"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 2H7a2 2 0 00-2 2v14a2 2 0 002 2z"
                                ></path>
                            </svg>
                            <p class="text-slate-400 text-sm font-medium">
                                Pratinjau PDF Jawaban
                            </p>
                            <p class="text-slate-600 text-xs mt-1">
                                Jawaban_Ridwan.pdf
                            </p>
                        </div>
                    </div>
                    <div
                        class="h-12 bg-slate-900 border-t border-slate-700 flex items-center justify-center gap-4 text-white text-xs font-bold"
                    >
                        <button class="hover:text-blue-400"><</button>
                        <span>Halaman 1 / 5</span>
                        <button class="hover:text-blue-400">></button>
                    </div>
                </div>

                <div
                    class="lg:col-span-1 flex flex-col gap-4 h-full overflow-hidden"
                >
                    <div
                        class="bg-white rounded-[2rem] border border-slate-200 shadow-sm p-5 overflow-y-auto custom-scrollbar shrink-0 max-h-[50%] flex flex-col"
                    >
                        <div class="mb-3 pb-3 border-b border-slate-100">
                            <h3
                                class="text-sm font-black text-slate-900 uppercase tracking-widest mb-1"
                            >
                                Form Penilaian
                            </h3>
                            <p class="text-xs text-slate-400">
                                Ridwan Kamil (123456)
                            </p>
                        </div>

                        <div class="space-y-3">
                            <div>
                                <label
                                    class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1 block"
                                    >Nilai (0-100)</label
                                >
                                <input
                                    type="number"
                                    value="85"
                                    class="w-full bg-slate-50 border-2 border-slate-200 rounded-xl px-4 py-2 text-lg font-black text-slate-800 focus:outline-none focus:border-blue-500 text-center transition-all"
                                />
                            </div>
                            <div>
                                <label
                                    class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1 block"
                                    >Feedback</label
                                >
                                <textarea
                                    rows="3"
                                    class="w-full bg-slate-50 border border-slate-200 rounded-xl p-3 text-xs font-medium text-slate-700 focus:outline-none focus:border-blue-500 transition-all resize-none"
                                    placeholder="Catatan..."
                                ></textarea>
                            </div>
                            <button
                                class="w-full py-3 bg-emerald-500 text-white rounded-xl font-black text-xs uppercase tracking-widest hover:bg-emerald-600 transition-all shadow-lg shadow-emerald-100 flex items-center justify-center gap-2"
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
                                        d="M5 13l4 4L19 7"
                                    ></path>
                                </svg>
                                Simpan
                            </button>
                        </div>
                    </div>

                    <div
                        class="bg-white rounded-[2rem] border border-slate-200 shadow-sm flex flex-col flex-1 overflow-hidden min-h-0"
                    >
                        <div
                            class="p-4 border-b border-slate-100 flex justify-between items-center bg-white shrink-0"
                        >
                            <h3
                                class="text-xs font-black text-slate-900 uppercase tracking-widest"
                            >
                                Diskusi Pribadi
                            </h3>
                            <span
                                class="text-[9px] font-bold bg-blue-50 text-blue-600 px-2 py-0.5 rounded uppercase"
                                >Privat</span
                            >
                        </div>

                        <div
                            class="flex-1 overflow-y-auto custom-scrollbar p-4 space-y-4 bg-white"
                        >
                            <div class="flex gap-3 items-start">
                                <img
                                    src="https://ui-avatars.com/api/?name=Ridwan&background=0ea5e9&color=fff"
                                    class="w-8 h-8 rounded-full shrink-0 shadow-sm"
                                />
                                <div
                                    class="bg-slate-50 p-3 rounded-2xl rounded-tl-none border border-slate-100 max-w-[90%]"
                                >
                                    <p
                                        class="text-[10px] font-bold text-slate-700 mb-1"
                                    >
                                        Ridwan Kamil
                                    </p>
                                    <p
                                        class="text-xs text-slate-600 leading-relaxed font-medium"
                                    >
                                        Maaf Pak, saya telat submit karena
                                        internet down.
                                    </p>
                                </div>
                            </div>

                            <div
                                class="flex gap-3 flex-row-reverse items-start"
                            >
                                <div
                                    class="w-8 h-8 rounded-full bg-blue-600 flex items-center justify-center text-white font-bold text-[10px] shrink-0 shadow-md"
                                >
                                    AS
                                </div>
                                <div
                                    class="bg-blue-600 p-3 rounded-2xl rounded-tr-none shadow-md text-white max-w-[90%]"
                                >
                                    <p
                                        class="text-[10px] font-bold mb-1 text-blue-100 text-right"
                                    >
                                        Anda
                                    </p>
                                    <p
                                        class="text-xs leading-relaxed font-medium"
                                    >
                                        Oke Ridwan, nilainya tetap saya proses
                                        ya.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div
                            class="p-3 bg-white border-t border-slate-100 shrink-0"
                        >
                            <div
                                class="w-full flex items-center gap-2 bg-slate-50 p-2 rounded-2xl border border-slate-200 focus-within:border-blue-400 focus-within:ring-2 focus-within:ring-blue-100 transition-all"
                            >
                                <button
                                    class="w-8 h-8 shrink-0 rounded-xl flex items-center justify-center text-slate-400 hover:text-blue-600 hover:bg-white transition-all"
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
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"
                                        ></path>
                                    </svg>
                                </button>

                                <input
                                    type="text"
                                    placeholder="Balas..."
                                    class="flex-1 min-w-0 bg-transparent text-xs font-medium text-slate-700 placeholder-slate-400 focus:outline-none"
                                />

                                <button
                                    class="w-8 h-8 shrink-0 rounded-xl flex items-center justify-center text-red-500 bg-red-50 hover:bg-red-100 transition-all"
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
                                            d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z"
                                        ></path>
                                    </svg>
                                </button>

                                <button
                                    class="w-8 h-8 shrink-0 rounded-xl bg-blue-600 text-white flex items-center justify-center hover:bg-blue-700 transition-all shadow-md"
                                >
                                    <svg
                                        class="w-5 h-5"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
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
            </div>
        </main>
    </body>
</html>
