<!DOCTYPE html>
<html lang="id" class="h-full">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Mata Kuliah | Portal Dosen</title>
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
                        Mata Kuliah Diampu
                    </h2>
                    <p class="text-sm font-medium text-slate-500">
                        Semester Ganjil 2025/2026
                    </p>
                </div>
            </header>

            <div
                class="p-6 lg:p-10 max-w-7xl mx-auto w-full grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6"
            >
                <div
                    onclick="toggleModal('modalKelas', true)"
                    class="bg-slate-50 border-2 border-dashed border-slate-300 rounded-[2.5rem] p-8 flex flex-col items-center justify-center cursor-pointer hover:border-blue-400 hover:bg-blue-50 transition-all group min-h-[300px]"
                >
                    <div
                        class="w-20 h-20 bg-white rounded-full flex items-center justify-center mb-4 group-hover:scale-110 transition-transform shadow-sm"
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
                        Buat Kelas Baru
                    </h3>
                </div>

                <div
                    class="bg-white p-8 rounded-[2.5rem] border border-slate-200 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all group cursor-pointer relative overflow-hidden"
                >
                    <div
                        class="flex justify-between items-start mb-6 relative z-10"
                    >
                        <div
                            class="w-16 h-16 bg-blue-100 text-blue-600 rounded-3xl flex items-center justify-center font-black text-xl shadow-inner"
                        >
                            SD
                        </div>
                        <span
                            class="px-4 py-2 bg-blue-50 text-blue-700 text-xs font-bold rounded-xl uppercase tracking-widest"
                            >Kelas 3C</span
                        >
                    </div>
                    <div class="relative z-10">
                        <h3
                            class="text-xl font-black text-slate-900 mb-2 group-hover:text-blue-600 transition-colors"
                        >
                            Struktur Data
                        </h3>
                        <p class="text-sm text-slate-500 mb-8 font-medium">
                            Selasa, 08:00 - 10:30 • Lab Komputer 2
                        </p>
                        <div
                            class="flex items-center justify-between border-t border-slate-100 pt-6"
                        >
                            <span
                                class="text-xs font-bold text-slate-400 uppercase tracking-widest"
                                >35 Mahasiswa</span
                            >
                            <a
                                href="{{ route('dosen.course.manage') }}"
                                class="text-blue-600 font-bold text-sm hover:underline"
                                >Kelola Kelas &rarr;</a
                            >
                        </div>
                    </div>
                    <div
                        class="absolute -right-8 -top-8 w-32 h-32 bg-blue-50 rounded-full blur-2xl opacity-0 group-hover:opacity-100 transition-opacity"
                    ></div>
                </div>

                <div
                    class="bg-white p-8 rounded-[2.5rem] border border-slate-200 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all group cursor-pointer relative overflow-hidden"
                >
                    <div
                        class="flex justify-between items-start mb-6 relative z-10"
                    >
                        <div
                            class="w-16 h-16 bg-purple-100 text-purple-600 rounded-3xl flex items-center justify-center font-black text-xl shadow-inner"
                        >
                            PBO
                        </div>
                        <span
                            class="px-4 py-2 bg-purple-50 text-purple-700 text-xs font-bold rounded-xl uppercase tracking-widest"
                            >Kelas 3A</span
                        >
                    </div>
                    <div class="relative z-10">
                        <h3
                            class="text-xl font-black text-slate-900 mb-2 group-hover:text-purple-600 transition-colors"
                        >
                            Pemrograman Objek
                        </h3>
                        <p class="text-sm text-slate-500 mb-8 font-medium">
                            Rabu, 13:00 - 15:30 • Lab Komputer 1
                        </p>
                        <div
                            class="flex items-center justify-between border-t border-slate-100 pt-6"
                        >
                            <span
                                class="text-xs font-bold text-slate-400 uppercase tracking-widest"
                                >40 Mahasiswa</span
                            >
                            <button
                                class="text-purple-600 font-bold text-sm hover:underline"
                            >
                                Kelola Kelas &rarr;
                            </button>
                        </div>
                    </div>
                    <div
                        class="absolute -right-8 -top-8 w-32 h-32 bg-purple-50 rounded-full blur-2xl opacity-0 group-hover:opacity-100 transition-opacity"
                    ></div>
                </div>

                <div
                    class="bg-white p-8 rounded-[2.5rem] border border-slate-200 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all group cursor-pointer opacity-80 hover:opacity-100"
                >
                    <div class="flex justify-between items-start mb-6">
                        <div
                            class="w-16 h-16 bg-slate-100 text-slate-500 rounded-3xl flex items-center justify-center font-black text-xl shadow-inner"
                        >
                            KB
                        </div>
                        <span
                            class="px-4 py-2 bg-slate-100 text-slate-600 text-xs font-bold rounded-xl uppercase tracking-widest"
                            >Kelas 5B</span
                        >
                    </div>
                    <h3
                        class="text-xl font-black text-slate-900 mb-2 group-hover:text-slate-600 transition-colors"
                    >
                        Kecerdasan Buatan
                    </h3>
                    <p class="text-sm text-slate-500 mb-8 font-medium">
                        Jumat, 09:00 - 11:30 • R. 402
                    </p>
                    <div
                        class="flex items-center justify-between border-t border-slate-100 pt-6"
                    >
                        <span
                            class="text-xs font-bold text-slate-400 uppercase tracking-widest"
                            >28 Mahasiswa</span
                        >
                        <button
                            class="text-slate-600 font-bold text-sm hover:underline"
                        >
                            Lihat Arsip &rarr;
                        </button>
                    </div>
                </div>
            </div>
        </main>

        <div id="modalKelas" class="fixed inset-0 z-50 hidden">
            <div
                class="absolute inset-0 bg-slate-900/50 backdrop-blur-sm transition-opacity"
                onclick="toggleModal('modalKelas', false)"
            ></div>

            <div class="absolute inset-0 flex items-center justify-center p-4">
                <div
                    class="bg-white rounded-[2rem] shadow-2xl w-full max-w-lg transform scale-100 transition-transform"
                >
                    <div
                        class="p-8 border-b border-slate-100 flex justify-between items-center"
                    >
                        <h3 class="text-xl font-black text-slate-900">
                            Buat Kelas Baru
                        </h3>
                        <button
                            onclick="toggleModal('modalKelas', false)"
                            class="p-2 bg-slate-50 rounded-full hover:bg-red-50 hover:text-red-500 transition-colors"
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
                                    d="M6 18L18 6M6 6l12 12"
                                ></path>
                            </svg>
                        </button>
                    </div>

                    <div class="p-8 space-y-6">
                        <div>
                            <label
                                class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2"
                                >Nama Mata Kuliah</label
                            >
                            <input
                                type="text"
                                placeholder="Contoh: Algoritma Pemrograman"
                                class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 font-bold text-slate-800 focus:outline-none focus:ring-2 focus:ring-blue-500"
                            />
                        </div>

                        <div class="grid grid-cols-2 gap-6">
                            <div>
                                <label
                                    class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2"
                                    >Kode Kelas</label
                                >
                                <input
                                    type="text"
                                    placeholder="Contoh: 3A"
                                    class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 font-bold text-slate-800 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                />
                            </div>
                            <div>
                                <label
                                    class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2"
                                    >SKS</label
                                >
                                <input
                                    type="number"
                                    placeholder="3"
                                    class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 font-bold text-slate-800 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                />
                            </div>
                        </div>

                        <div>
                            <label
                                class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2"
                                >Jadwal (Hari & Jam)</label
                            >
                            <input
                                type="text"
                                placeholder="Contoh: Senin, 08:00 - 10:00"
                                class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 font-bold text-slate-800 focus:outline-none focus:ring-2 focus:ring-blue-500"
                            />
                        </div>
                    </div>

                    <div
                        class="p-8 border-t border-slate-100 flex justify-end gap-3"
                    >
                        <button
                            onclick="toggleModal('modalKelas', false)"
                            class="px-6 py-3 rounded-xl font-bold text-slate-500 hover:bg-slate-50 transition-all"
                        >
                            Batal
                        </button>
                        <button
                            class="px-8 py-3 bg-blue-600 text-white rounded-xl font-bold hover:bg-blue-700 transition-all shadow-lg shadow-blue-200"
                        >
                            Simpan Kelas
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function toggleModal(modalID, show) {
                const modal = document.getElementById(modalID);
                if (show) {
                    modal.classList.remove("hidden");
                    // Animasi masuk
                    const content = modal.querySelector(
                        'div[class*="transform"]',
                    );
                    content.classList.remove("scale-95", "opacity-0");
                    content.classList.add("scale-100", "opacity-100");
                } else {
                    modal.classList.add("hidden");
                }
            }
        </script>
    </body>
</html>
