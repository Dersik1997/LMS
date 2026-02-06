<!DOCTYPE html>
<html lang="id" class="h-full">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Persiapan Ujian | LMS Inklusi</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link
            href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
            rel="stylesheet"
        />
    </head>
    <body
        class="font-['Plus_Jakarta_Sans'] bg-[#f8fafc] text-slate-800 min-h-full flex flex-col border-box overflow-x-hidden"
    >
        <div
            class="bg-white/90 backdrop-blur-xl border-b border-slate-200 sticky top-0 z-40 px-4 md:px-6 py-4 shadow-sm transition-all"
        >
            <div class="max-w-4xl mx-auto flex items-center gap-4">
                <a
                    href="{{ route('join.exam') }}"
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
                        Konfirmasi Ujian
                    </h1>
                    <p
                        class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mt-1 truncate"
                    >
                        Pastikan data sudah benar
                    </p>
                </div>
            </div>
        </div>

        <main
            class="flex-1 max-w-4xl mx-auto p-4 md:p-6 lg:p-8 w-full space-y-8 pb-32"
        >
            <div
                class="bg-gradient-to-br from-blue-600 to-indigo-700 rounded-[2.5rem] p-8 text-white shadow-xl shadow-blue-200 relative overflow-hidden text-center"
            >
                <div class="relative z-10">
                    <span
                        class="inline-block px-3 py-1 bg-white/20 rounded-lg text-[10px] font-bold uppercase tracking-widest mb-4 border border-white/10"
                        >Ujian Tengah Semester</span
                    >
                    <h2
                        class="text-3xl md:text-4xl font-black tracking-tight mb-2"
                    >
                        Struktur Data & Algoritma
                    </h2>
                    <p class="text-blue-100 font-medium text-lg">
                        Dosen: Asril Adi Sunarto
                    </p>
                </div>
                <div
                    class="absolute -right-10 -bottom-20 w-64 h-64 bg-white/10 rounded-full blur-3xl"
                ></div>
                <div
                    class="absolute -left-10 -top-20 w-64 h-64 bg-white/10 rounded-full blur-3xl"
                ></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div
                    class="bg-white p-6 rounded-[2rem] border border-slate-200 shadow-sm space-y-6"
                >
                    <div>
                        <p
                            class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-1"
                        >
                            Durasi Pengerjaan
                        </p>
                        <div class="flex items-center gap-3">
                            <div
                                class="w-10 h-10 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center"
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
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
                                    ></path>
                                </svg>
                            </div>
                            <span class="text-xl font-black text-slate-900"
                                >90 Menit</span
                            >
                        </div>
                    </div>
                    <div>
                        <p
                            class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-1"
                        >
                            Jumlah Soal
                        </p>
                        <div class="flex items-center gap-3">
                            <div
                                class="w-10 h-10 bg-purple-50 text-purple-600 rounded-xl flex items-center justify-center"
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
                            </div>
                            <span class="text-xl font-black text-slate-900"
                                >50 Soal</span
                            >
                        </div>
                    </div>
                    <div>
                        <p
                            class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-1"
                        >
                            KKM / Passing Grade
                        </p>
                        <div class="flex items-center gap-3">
                            <div
                                class="w-10 h-10 bg-emerald-50 text-emerald-600 rounded-xl flex items-center justify-center"
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
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                                    ></path>
                                </svg>
                            </div>
                            <span class="text-xl font-black text-slate-900"
                                >75.00</span
                            >
                        </div>
                    </div>
                </div>

                <div
                    class="md:col-span-2 bg-white p-6 md:p-8 rounded-[2rem] border border-slate-200 shadow-sm"
                >
                    <h3 class="text-lg font-black text-slate-900 mb-4">
                        Tata Tertib & Petunjuk
                    </h3>
                    <ul class="space-y-4">
                        <li class="flex gap-4">
                            <span
                                class="w-6 h-6 rounded-full bg-slate-100 text-slate-500 flex items-center justify-center text-xs font-bold shrink-0"
                                >1</span
                            >
                            <p
                                class="text-sm text-slate-600 font-medium leading-relaxed"
                            >
                                Berdoalah sebelum memulai ujian agar diberi
                                kemudahan dan kelancaran.
                            </p>
                        </li>
                        <li class="flex gap-4">
                            <span
                                class="w-6 h-6 rounded-full bg-slate-100 text-slate-500 flex items-center justify-center text-xs font-bold shrink-0"
                                >2</span
                            >
                            <p
                                class="text-sm text-slate-600 font-medium leading-relaxed"
                            >
                                Waktu akan otomatis berjalan mundur saat Anda
                                menekan tombol "Mulai".
                            </p>
                        </li>
                        <li class="flex gap-4">
                            <span
                                class="w-6 h-6 rounded-full bg-slate-100 text-slate-500 flex items-center justify-center text-xs font-bold shrink-0"
                                >3</span
                            >
                            <p
                                class="text-sm text-slate-600 font-medium leading-relaxed"
                            >
                                Pastikan koneksi internet Anda stabil. Jika
                                terputus, jawaban akan tersimpan otomatis di
                                perangkat lokal.
                            </p>
                        </li>
                        <li class="flex gap-4">
                            <span
                                class="w-6 h-6 rounded-full bg-slate-100 text-slate-500 flex items-center justify-center text-xs font-bold shrink-0"
                                >4</span
                            >
                            <p
                                class="text-sm text-slate-600 font-medium leading-relaxed"
                            >
                                Dilarang keras membuka tab lain, aplikasi lain,
                                atau bekerja sama dengan peserta lain.
                            </p>
                        </li>
                    </ul>

                    <div
                        class="mt-8 p-4 bg-orange-50 border border-orange-100 rounded-xl flex gap-3"
                    >
                        <svg
                            class="w-5 h-5 text-orange-600 shrink-0"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"
                            ></path>
                        </svg>
                        <p
                            class="text-xs font-bold text-orange-700 leading-relaxed"
                        >
                            Dengan menekan tombol mulai, Anda dianggap telah
                            membaca dan menyetujui seluruh tata tertib ujian.
                        </p>
                    </div>
                </div>
            </div>
        </main>

        <div
            class="fixed bottom-0 left-0 w-full bg-white border-t border-slate-200 p-4 md:p-6 z-50"
        >
            <div
                class="max-w-4xl mx-auto flex flex-col md:flex-row items-center justify-between gap-4"
            >
                <div class="hidden md:block">
                    <p
                        class="text-xs text-slate-400 font-bold uppercase tracking-widest"
                    >
                        Token Ujian
                    </p>
                    <p class="text-lg font-mono font-black text-slate-900">
                        UAS-STR-2026
                    </p>
                </div>

                <form action="#" method="GET" class="w-full md:w-auto">
                    <button
                        type="button"
                        class="w-full md:w-auto bg-blue-600 text-white px-8 py-4 rounded-xl font-bold uppercase tracking-widest hover:bg-blue-700 transition-all shadow-xl shadow-blue-200 flex items-center justify-center gap-3"
                    >
                        <span>Mulai Mengerjakan</span>
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
                                d="M14 5l7 7m0 0l-7 7m7-7H3"
                            ></path>
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </body>
</html>
