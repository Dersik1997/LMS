<!DOCTYPE html>
<html lang="id" class="h-full">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Buat Tugas Baru | Portal Dosen</title>
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
        class="font-['Plus_Jakarta_Sans'] bg-[#f8fafc] text-slate-800 min-h-full flex flex-col border-box overflow-x-hidden"
    >
        <div
            class="bg-white/90 backdrop-blur-xl border-b border-slate-200 sticky top-0 z-40 px-4 md:px-6 py-4 shadow-sm transition-all"
        >
            <div class="max-w-5xl mx-auto flex items-center gap-4">
                <a
                    href="{{ route('dosen.course.assignments') }}"
                    class="w-10 h-10 rounded-full bg-slate-50 text-slate-400 border border-slate-200 flex items-center justify-center transition-all shrink-0 hover:bg-blue-50 hover:text-blue-600 hover:border-blue-200 active:scale-95"
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
                        Buat Tugas Baru
                    </h1>
                    <p
                        class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mt-1 truncate"
                    >
                        Struktur Data 3C
                    </p>
                </div>
            </div>
        </div>

        <main
            class="flex-1 max-w-5xl mx-auto p-4 md:p-6 lg:p-8 w-full space-y-8"
        >
            <form
                action="#"
                method="POST"
                enctype="multipart/form-data"
                class="space-y-8"
            >
                @csrf

                <div
                    class="bg-white p-6 md:p-8 rounded-[2.5rem] border border-slate-200 shadow-sm space-y-6"
                >
                    <div>
                        <label
                            class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2"
                            >Judul Tugas</label
                        >
                        <input
                            type="text"
                            placeholder="Contoh: Analisis Kompleksitas Algoritma"
                            class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 font-bold text-slate-800 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all placeholder:font-medium placeholder:text-slate-400"
                        />
                    </div>

                    <div>
                        <label
                            class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2"
                            >Instruksi / Deskripsi</label
                        >
                        <div
                            class="w-full bg-slate-50 border border-slate-200 rounded-xl overflow-hidden focus-within:ring-2 focus-within:ring-blue-500 transition-all"
                        >
                            <div
                                class="bg-white border-b border-slate-200 px-3 py-2 flex gap-2 overflow-x-auto"
                            >
                                <button
                                    type="button"
                                    class="p-1.5 hover:bg-slate-100 rounded text-slate-500"
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
                                            d="M6 12h8a4 4 0 100-8H6v8zm0 0v4a4 4 0 100 8h8a4 4 0 100-8H6z"
                                        ></path>
                                    </svg>
                                </button>
                                <button
                                    type="button"
                                    class="p-1.5 hover:bg-slate-100 rounded text-slate-500"
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
                                            d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"
                                        ></path>
                                    </svg>
                                </button>
                                <div class="w-px h-6 bg-slate-200 mx-1"></div>
                                <button
                                    type="button"
                                    class="p-1.5 hover:bg-slate-100 rounded text-slate-500"
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
                                            d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"
                                        ></path>
                                    </svg>
                                </button>
                                <button
                                    type="button"
                                    class="p-1.5 hover:bg-slate-100 rounded text-slate-500"
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
                                            d="M4 6h16M4 12h16M4 18h7"
                                        ></path>
                                    </svg>
                                </button>
                            </div>
                            <textarea
                                class="w-full bg-transparent p-4 min-h-[150px] outline-none text-slate-700 font-medium resize-y"
                                placeholder="Tuliskan instruksi pengerjaan tugas di sini..."
                            ></textarea>
                        </div>
                    </div>

                    <div>
                        <label
                            class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2"
                            >Lampiran File (Opsional)</label
                        >
                        <label
                            class="flex flex-col items-center justify-center w-full h-32 border-2 border-slate-300 border-dashed rounded-xl cursor-pointer bg-slate-50 hover:bg-blue-50 hover:border-blue-400 transition-all group"
                        >
                            <div
                                class="flex flex-col items-center justify-center pt-5 pb-6"
                            >
                                <div
                                    class="p-2 bg-white rounded-full shadow-sm mb-3 group-hover:scale-110 transition-transform"
                                >
                                    <svg
                                        class="w-6 h-6 text-slate-400 group-hover:text-blue-500"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"
                                        ></path>
                                    </svg>
                                </div>
                                <p
                                    class="mb-1 text-sm text-slate-500 font-medium"
                                >
                                    Klik untuk upload atau drag & drop
                                </p>
                                <p class="text-xs text-slate-400">
                                    PDF, DOCX, ZIP (Max. 10MB)
                                </p>
                            </div>
                            <input type="file" class="hidden" />
                        </label>
                    </div>
                </div>

                <div
                    class="bg-white p-6 md:p-8 rounded-[2.5rem] border border-slate-200 shadow-sm"
                >
                    <h3
                        class="font-bold text-slate-800 text-lg mb-6 border-b border-slate-100 pb-4"
                    >
                        Pengaturan Pengumpulan
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label
                                class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2"
                                >Tanggal Batas Waktu</label
                            >
                            <input
                                type="date"
                                class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 font-bold text-slate-800 focus:outline-none focus:ring-2 focus:ring-blue-500"
                            />
                        </div>
                        <div>
                            <label
                                class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2"
                                >Jam Batas Waktu</label
                            >
                            <input
                                type="time"
                                class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 font-bold text-slate-800 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                value="23:59"
                            />
                        </div>
                        <div>
                            <label
                                class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2"
                                >Poin Maksimal</label
                            >
                            <div class="relative">
                                <input
                                    type="number"
                                    value="100"
                                    class="w-full bg-slate-50 border border-slate-200 rounded-xl pl-4 pr-12 py-3 font-bold text-slate-800 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                />
                                <span
                                    class="absolute right-4 top-1/2 -translate-y-1/2 text-xs font-bold text-slate-400"
                                    >PTS</span
                                >
                            </div>
                        </div>
                        <div>
                            <label
                                class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2"
                                >Tipe Pengumpulan</label
                            >
                            <select
                                class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 font-bold text-slate-800 focus:outline-none focus:ring-2 focus:ring-blue-500 appearance-none"
                            >
                                <option value="file">Upload File</option>
                                <option value="text">Teks Online</option>
                                <option value="both">File & Teks</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div
                    class="flex flex-col-reverse md:flex-row justify-end gap-4 pt-4 pb-12"
                >
                    <a
                        href="{{ route('dosen.course.assignments') }}"
                        class="px-8 py-4 rounded-xl font-bold text-slate-500 hover:bg-slate-100 transition-all text-center"
                    >
                        Batal
                    </a>

                    <button
                        type="submit"
                        name="action"
                        value="draft"
                        class="px-8 py-4 bg-slate-800 text-white rounded-xl font-bold uppercase tracking-widest hover:bg-slate-900 transition-all flex items-center justify-center gap-2 shadow-lg"
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
                                d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"
                            ></path>
                        </svg>
                        Simpan Draft
                    </button>

                    <button
                        type="submit"
                        name="action"
                        value="publish"
                        class="px-10 py-4 bg-blue-600 text-white rounded-xl font-bold uppercase tracking-widest hover:bg-blue-700 transition-all shadow-xl shadow-blue-200 flex items-center justify-center gap-2"
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
                                d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"
                            ></path>
                        </svg>
                        Terbitkan Tugas
                    </button>
                </div>
            </form>
        </main>
    </body>
</html>
