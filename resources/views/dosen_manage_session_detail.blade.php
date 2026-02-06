<!DOCTYPE html>
<html lang="id" class="h-full">
    <head>
        <meta charset="UTF-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"
        />
        <title>Kelola Detail Sesi | Portal Dosen</title>
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
            .custom-scrollbar::-webkit-scrollbar {
                width: 4px;
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
        <main class="flex-1 flex flex-col h-screen overflow-y-auto">
            <div
                class="bg-white/80 backdrop-blur-md border-b border-slate-200/60 sticky top-0 z-30 px-6 py-4"
            >
                <div
                    class="max-w-5xl mx-auto flex items-center justify-between"
                >
                    <div class="flex items-center gap-4">
                        <a
                            href="{{ route('dosen.course.manage') }}"
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
                    </div>
                    <div
                        class="text-center absolute left-1/2 transform -translate-x-1/2"
                    >
                        <h1
                            class="text-lg md:text-xl font-extrabold text-slate-900 tracking-tight"
                        >
                            Kelola Isi Sesi
                        </h1>
                        <p
                            class="text-[10px] font-bold text-blue-600 uppercase tracking-widest mt-1"
                        >
                            Pertemuan 2: Array & Memori
                        </p>
                    </div>
                    <div class="w-10"></div>
                </div>
            </div>

            <div class="max-w-5xl mx-auto w-full p-6 space-y-8 pb-20">
                <div
                    class="bg-blue-50 border-l-4 border-blue-500 rounded-r-2xl p-6 shadow-sm"
                >
                    <div class="flex items-start gap-4">
                        <div
                            class="w-10 h-10 rounded-full bg-blue-200 flex items-center justify-center shrink-0 text-blue-700"
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
                                    d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"
                                ></path>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <div class="flex justify-between items-center mb-3">
                                <h3
                                    class="text-[10px] font-black text-blue-800 uppercase tracking-[0.2em]"
                                >
                                    Pesan Instruksi Mahasiswa
                                </h3>
                                <button
                                    onclick="simpanPesan()"
                                    class="bg-blue-600 text-white px-3 py-1 rounded-lg text-[9px] font-black uppercase tracking-widest hover:bg-blue-700 transition-all shadow-sm shadow-blue-200"
                                >
                                    Simpan
                                </button>
                            </div>
                            <textarea
                                id="instruction-area"
                                class="w-full bg-white/50 border border-blue-100 rounded-xl p-4 text-sm font-medium text-slate-700 leading-relaxed focus:ring-2 focus:ring-blue-400 focus:bg-white transition-all h-24 resize-none"
                            >
"Assalamualaikum. Silakan simak video visualisasi memori terlebih dahulu sebelum membaca modul PDF, agar lebih mudah dipahami."</textarea
                            >
                        </div>
                    </div>
                </div>

                <div
                    class="bg-white rounded-[2rem] p-8 border border-slate-200 shadow-sm"
                >
                    <h3
                        class="text-lg font-black text-slate-900 uppercase tracking-tight mb-6"
                    >
                        Materi Sesi
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
                        <button
                            class="p-4 bg-slate-50 border-2 border-dashed border-slate-200 rounded-2xl flex flex-col items-center gap-2 hover:bg-blue-50 hover:border-blue-400 transition-all group text-center"
                        >
                            <svg
                                class="w-6 h-6 text-slate-400 group-hover:text-blue-600"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 2H7a2 2 0 00-2 2v14a2 2 0 002 2z"
                                ></path>
                            </svg>
                            <span
                                class="text-[9px] font-black text-slate-500 uppercase tracking-widest"
                                >+ Materi PDF/Word</span
                            >
                        </button>
                        <button
                            class="p-4 bg-slate-50 border-2 border-dashed border-slate-200 rounded-2xl flex flex-col items-center gap-2 hover:bg-purple-50 hover:border-purple-400 transition-all group text-center"
                        >
                            <svg
                                class="w-6 h-6 text-slate-400 group-hover:text-purple-600"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z"
                                ></path>
                            </svg>
                            <span
                                class="text-[9px] font-black text-slate-500 uppercase tracking-widest"
                                >+ Tambah Voice Note</span
                            >
                        </button>
                        <button
                            class="p-4 bg-slate-50 border-2 border-dashed border-slate-200 rounded-2xl flex flex-col items-center gap-2 hover:bg-red-50 hover:border-red-400 transition-all group text-center"
                        >
                            <svg
                                class="w-6 h-6 text-slate-400 group-hover:text-red-600"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 00-2 2z"
                                ></path>
                            </svg>
                            <span
                                class="text-[9px] font-black text-slate-500 uppercase tracking-widest"
                                >+ Tambah Video</span
                            >
                        </button>
                    </div>

                    <div class="space-y-3">
                        <h4
                            class="text-[10px] font-black text-slate-400 uppercase tracking-widest px-1"
                        >
                            File Aktif
                        </h4>
                        <div
                            class="flex items-center justify-between p-4 bg-slate-50 rounded-2xl border border-slate-100 group"
                        >
                            <div class="flex items-center gap-3">
                                <div
                                    class="w-10 h-10 bg-red-50 text-red-500 rounded-xl flex items-center justify-center font-black text-[10px] border border-red-100"
                                >
                                    PDF
                                </div>
                                <span class="text-xs font-bold text-slate-700"
                                    >Modul_Array.pdf</span
                                >
                            </div>
                            <button
                                class="p-2 text-slate-300 hover:text-red-500 transition-colors"
                            >
                                <svg
                                    class="w-5 h-5"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                                    ></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <div
                    class="bg-white rounded-[2rem] p-8 border border-slate-200 shadow-sm"
                >
                    <div class="flex justify-between items-center mb-6">
                        <h3
                            class="text-lg font-black text-slate-900 uppercase tracking-tight"
                        >
                            Diskusi Sesi
                        </h3>
                        <span
                            class="text-[9px] font-bold bg-green-100 text-green-700 px-3 py-1.5 rounded-full flex items-center gap-1.5"
                        >
                            <span
                                class="w-2 h-2 bg-green-500 rounded-full animate-pulse"
                            ></span>
                            12 Online
                        </span>
                    </div>

                    <div
                        class="flex flex-col gap-6 mb-8 max-h-[400px] overflow-y-auto pr-3 custom-scrollbar"
                    >
                        <div class="flex gap-4 items-start">
                            <img
                                src="https://ui-avatars.com/api/?name=Budi+S&background=random"
                                class="w-10 h-10 rounded-full shrink-0 shadow-sm"
                            />
                            <div
                                class="bg-slate-50 p-4 rounded-2xl rounded-tl-none border border-slate-100 max-w-[80%] shadow-sm"
                            >
                                <p
                                    class="text-xs font-bold text-slate-700 mb-1"
                                >
                                    Budi Santoso
                                </p>
                                <p
                                    class="text-sm text-slate-600 leading-relaxed font-medium"
                                >
                                    Pak, apakah implementasi array di C++ selalu
                                    statis?
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="pt-4 border-t border-slate-100">
                        <div
                            class="relative flex items-center gap-3 bg-slate-50 p-3 rounded-2xl border border-slate-200 focus-within:border-blue-400 focus-within:ring-2 focus-within:ring-blue-100 transition-all"
                        >
                            <button
                                class="w-10 h-10 rounded-xl flex items-center justify-center text-slate-400 hover:text-blue-600 hover:bg-white transition-all"
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
                                type="text"
                                placeholder="Tulis balasan anda..."
                                class="flex-1 bg-transparent text-sm font-medium text-slate-700 placeholder-slate-400 focus:outline-none"
                            />

                            <button
                                class="w-10 h-10 rounded-xl flex items-center justify-center text-red-500 bg-red-50 hover:bg-red-100 transition-all"
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
                                        d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z"
                                    ></path>
                                </svg>
                            </button>

                            <button
                                class="w-10 h-10 rounded-xl bg-blue-600 text-white flex items-center justify-center hover:bg-blue-700 transition-all shadow-md shadow-blue-200"
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
                                        d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"
                                    />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <script>
            function simpanPesan() {
                alert("Pesan instruksi berhasil diperbarui!");
            }
        </script>
    </body>
</html>
