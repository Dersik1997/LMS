<!DOCTYPE html>
<html lang="id" class="h-full">
    <head>
        <meta charset="UTF-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"
        />
        <title>Detail Tugas | LMS Inklusi UMMI</title>
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
                width: 5px;
            }
            .custom-scrollbar::-webkit-scrollbar-track {
                background: transparent;
            }
            .custom-scrollbar::-webkit-scrollbar-thumb {
                background-color: #cbd5e1;
                border-radius: 20px;
            }

            /* Animasi Transisi */
            .fade-in {
                animation: fadeIn 0.5s ease-in-out;
            }
            @keyframes fadeIn {
                from {
                    opacity: 0;
                    transform: translateY(10px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
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
                        <button
                            onclick="navigasiKe(0)"
                            class="w-10 h-10 rounded-full bg-slate-50 hover:bg-blue-50 text-slate-400 hover:text-blue-600 flex items-center justify-center transition-all border border-slate-200 shrink-0"
                            title="Kembali (0)"
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
                        </button>
                    </div>
                    <div
                        class="text-center absolute left-1/2 transform -translate-x-1/2"
                    >
                        <h1
                            class="text-lg md:text-xl font-extrabold text-slate-900 tracking-tight leading-none"
                        >
                            Laporan Praktikum Modul 2
                        </h1>
                        <p
                            class="text-[10px] font-bold text-blue-600 uppercase tracking-widest mt-1"
                        >
                            Struktur Data 3C
                        </p>
                    </div>
                    <div
                        class="flex items-center gap-3 pl-6 border-l border-slate-200"
                    >
                        <div
                            id="wave-container"
                            class="flex items-center gap-[2px] h-4 w-10 justify-center"
                        >
                            <div
                                class="wave-bar w-[2px] bg-blue-500 rounded-full h-1"
                            ></div>
                            <div
                                class="wave-bar w-[2px] bg-indigo-500 rounded-full h-2"
                            ></div>
                            <div
                                class="wave-bar w-[2px] bg-blue-400 rounded-full h-1"
                            ></div>
                        </div>
                        <span
                            id="status-desc"
                            class="hidden md:block text-[9px] font-black text-slate-400 uppercase tracking-widest"
                            >Listening</span
                        >
                    </div>
                </div>
            </div>

            <div class="max-w-5xl mx-auto w-full p-6 space-y-8 pb-20">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div
                        class="bg-orange-50 border border-orange-200 p-6 rounded-[2rem] flex items-center gap-4"
                    >
                        <div
                            class="w-12 h-12 rounded-2xl bg-orange-100 text-orange-600 flex items-center justify-center"
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
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
                                ></path>
                            </svg>
                        </div>
                        <div>
                            <h3
                                class="text-sm font-black text-orange-700 uppercase tracking-wide"
                            >
                                Batas Waktu
                            </h3>
                            <p class="text-lg font-bold text-slate-800">
                                Besok, 23:59 WIB
                            </p>
                        </div>
                    </div>

                    <div
                        id="status-card"
                        class="bg-white border border-slate-200 p-6 rounded-[2rem] flex items-center gap-4 transition-all duration-300"
                    >
                        <div
                            id="status-icon"
                            class="w-12 h-12 rounded-2xl bg-slate-100 text-slate-500 flex items-center justify-center transition-all"
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
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
                                ></path>
                            </svg>
                        </div>
                        <div>
                            <h3
                                id="status-title"
                                class="text-sm font-black text-slate-400 uppercase tracking-wide transition-all"
                            >
                                Status
                            </h3>
                            <p
                                id="status-text"
                                class="text-lg font-bold text-slate-800 transition-all"
                            >
                                Belum Dikirim
                            </p>
                        </div>
                    </div>

                    <div
                        class="bg-white border border-slate-200 p-6 rounded-[2rem] flex items-center gap-4"
                    >
                        <div
                            class="w-12 h-12 rounded-2xl bg-blue-50 text-blue-600 flex items-center justify-center"
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
                        <div>
                            <h3
                                class="text-sm font-black text-slate-400 uppercase tracking-wide"
                            >
                                Nilai
                            </h3>
                            <p class="text-lg font-bold text-slate-300">
                                -- / 100
                            </p>
                        </div>
                    </div>
                </div>

                <div
                    class="bg-white rounded-[2rem] p-8 border border-slate-200 shadow-sm relative overflow-hidden"
                >
                    <div class="flex justify-between items-start mb-6">
                        <h3
                            class="text-lg font-black text-slate-900 uppercase tracking-tight"
                        >
                            Instruksi Tugas
                        </h3>
                        <button
                            onclick="navigasiKe(1)"
                            class="flex items-center gap-2 bg-blue-50 text-blue-600 px-3 py-1.5 rounded-lg text-[9px] font-bold uppercase tracking-widest hover:bg-blue-100 transition-all"
                        >
                            <svg
                                class="w-3 h-3"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"
                                ></path>
                            </svg>
                            Dengar Soal (1)
                        </button>
                    </div>
                    <div
                        id="soal-text"
                        class="prose prose-slate text-sm text-slate-600 leading-relaxed font-medium max-w-none"
                    >
                        <p>
                            Buatlah program C++ untuk mengimplementasikan Array
                            1 Dimensi dan 2 Dimensi. Program harus memiliki
                            fitur:
                        </p>
                        <ul class="list-disc pl-5 space-y-1">
                            <li>Input data mahasiswa (Nama, NIM, Nilai).</li>
                            <li>Menampilkan data yang sudah diinput.</li>
                            <li>Mencari nilai rata-rata kelas.</li>
                        </ul>
                        <p class="mt-4">
                            Kumpulkan jawaban anda berupa file
                            <strong>.PDF</strong> atau
                            <strong>.DOCX</strong> yang berisi source code dan
                            screenshot hasil running program.
                        </p>
                    </div>
                </div>

                <div
                    class="bg-white rounded-[2rem] p-8 border border-slate-200 shadow-sm relative overflow-hidden"
                >
                    <div id="submission-form">
                        <h3
                            class="text-lg font-black text-slate-900 uppercase tracking-tight mb-6"
                        >
                            Form Pengumpulan
                        </h3>

                        <div class="mb-6">
                            <label
                                class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-2 block"
                                >Upload File (2)</label
                            >
                            <div
                                onclick="navigasiKe(2)"
                                class="border-2 border-dashed border-slate-200 rounded-2xl p-8 text-center cursor-pointer hover:border-blue-400 hover:bg-blue-50 transition-all group bg-slate-50"
                            >
                                <input
                                    type="file"
                                    id="file-upload"
                                    class="hidden"
                                    onchange="handleFileSelect(this)"
                                />
                                <div
                                    class="w-12 h-12 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center mx-auto mb-3 group-hover:scale-110 transition-transform"
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
                                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"
                                        ></path>
                                    </svg>
                                </div>
                                <span
                                    id="file-label"
                                    class="text-sm font-bold text-slate-700 group-hover:text-blue-600 block"
                                    >Klik untuk Upload Jawaban</span
                                >
                                <span
                                    class="text-[10px] text-slate-400 mt-1 block"
                                    >Format: PDF, DOCX (Max 5MB)</span
                                >
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div class="md:col-span-2">
                                <label
                                    class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-2 block"
                                    >Tanggapan / Catatan (3)</label
                                >
                                <textarea
                                    id="tanggapan-text"
                                    rows="3"
                                    class="w-full bg-slate-50 border border-slate-200 rounded-xl p-4 text-xs font-medium focus:outline-none focus:border-blue-500 transition-all resize-none"
                                    placeholder="Tulis catatan untuk dosen di sini..."
                                ></textarea>
                            </div>
                            <div class="flex items-end">
                                <button
                                    onclick="navigasiKe(4)"
                                    class="w-full h-[100px] md:h-full bg-blue-600 text-white rounded-xl font-black text-xs uppercase tracking-[0.2em] shadow-lg shadow-blue-200 hover:bg-blue-700 transition-all hover:scale-[1.02] flex flex-col items-center justify-center gap-2"
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
                                            d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"
                                        ></path>
                                    </svg>
                                    <span>Kirim Tugas (4)</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div id="submission-success" class="hidden fade-in">
                        <h3
                            class="text-lg font-black text-slate-900 uppercase tracking-tight mb-6"
                        >
                            Status Pengumpulan
                        </h3>

                        <div
                            class="bg-emerald-50 border border-emerald-100 rounded-2xl p-4 flex items-center gap-4 mb-6"
                        >
                            <div
                                class="w-10 h-10 bg-emerald-100 text-emerald-600 rounded-full flex items-center justify-center shrink-0 shadow-sm"
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
                                        stroke-width="3"
                                        d="M5 13l4 4L19 7"
                                    ></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-sm font-bold text-emerald-800">
                                    Terima kasih, Tugas Berhasil Dikirim!
                                </h4>
                                <p class="text-xs text-emerald-600 mt-0.5">
                                    Dikirim pada: Baru saja
                                </p>
                            </div>
                        </div>

                        <div class="mb-6">
                            <label
                                class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-2 block"
                                >File Anda (2)</label
                            >
                            <div
                                onclick="navigasiKe(2)"
                                class="flex items-center gap-4 p-4 rounded-2xl border border-slate-200 bg-slate-50 hover:bg-white hover:border-blue-300 hover:shadow-md transition-all cursor-pointer group"
                            >
                                <div
                                    class="w-12 h-14 bg-red-50 text-red-500 rounded-xl flex items-center justify-center shrink-0 border border-red-100 group-hover:scale-110 transition-transform"
                                >
                                    <span
                                        class="text-[10px] font-black uppercase"
                                        >PDF</span
                                    >
                                </div>
                                <div class="flex-1">
                                    <h4
                                        class="text-sm font-bold text-slate-800 group-hover:text-blue-700"
                                    >
                                        Jawaban_Praktikum_Ridwan.pdf
                                    </h4>
                                    <p class="text-xs text-slate-400 mt-1">
                                        1.8 MB
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label
                                class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-2 block"
                                >Catatan Anda</label
                            >
                            <div
                                id="submitted-note"
                                class="w-full bg-slate-50 border border-slate-100 rounded-xl p-4 text-xs font-medium text-slate-600 italic"
                            >
                                - Tidak ada catatan -
                            </div>
                        </div>

                        <div
                            class="mt-6 pt-6 border-t border-slate-100 flex justify-end"
                        >
                            <button
                                onclick="navigasiKe(9)"
                                class="text-red-500 font-bold text-xs uppercase tracking-widest hover:text-red-700 transition-all flex items-center gap-2 px-4 py-2 hover:bg-red-50 rounded-xl"
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
                                        d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"
                                    ></path>
                                </svg>
                                Kirim Ulang (9)
                            </button>
                        </div>
                    </div>
                </div>

                <div
                    class="bg-white rounded-[2rem] p-8 border border-slate-200 shadow-sm relative overflow-hidden"
                >
                    <div class="flex justify-between items-center mb-6">
                        <div class="flex items-center gap-3">
                            <h3
                                class="text-lg font-black text-slate-900 uppercase tracking-tight"
                            >
                                Diskusi Kelas
                            </h3>
                            <button
                                onclick="navigasiKe(8)"
                                class="text-[10px] font-bold bg-blue-50 text-blue-600 px-3 py-1 rounded-lg border border-blue-100 hover:bg-blue-100 transition-all flex items-center gap-1"
                            >
                                Baca Chat (8)
                            </button>
                        </div>
                        <span
                            class="text-[9px] font-bold bg-green-100 text-green-700 px-3 py-1.5 rounded-full flex items-center gap-1.5"
                            ><span
                                class="w-2 h-2 bg-green-500 rounded-full animate-pulse"
                            ></span>
                            12 Online</span
                        >
                    </div>

                    <div
                        id="chat-container"
                        class="flex flex-col gap-4 mb-6 max-h-80 overflow-y-auto pr-2 custom-scrollbar p-1"
                    >
                        <div class="chat-bubble flex gap-4 items-start">
                            <img
                                src="https://ui-avatars.com/api/?name=Budi+S&background=random"
                                class="w-10 h-10 rounded-full shrink-0 shadow-sm"
                            />
                            <div
                                class="bg-slate-50 p-4 rounded-2xl rounded-tl-none border border-slate-100 max-w-[80%] shadow-sm"
                            >
                                <p
                                    class="text-xs font-bold text-slate-700 mb-1 sender-name"
                                >
                                    Budi Santoso
                                </p>
                                <p
                                    class="text-sm text-slate-600 leading-relaxed message-text"
                                >
                                    Izin bertanya Pak, untuk array 2 dimensinya
                                    maksimal berapa baris? Apakah ada ketentuan
                                    khusus?
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="pt-4 border-t border-slate-100">
                        <div
                            class="relative flex items-center gap-3 bg-slate-50 p-3 rounded-2xl border border-slate-200 focus-within:border-blue-400 focus-within:ring-2 focus-within:ring-blue-100 transition-all"
                        >
                            <input
                                type="file"
                                id="chat-image"
                                class="hidden"
                                accept="image/*"
                            />
                            <button
                                onclick="navigasiKe(6)"
                                class="w-10 h-10 rounded-xl flex items-center justify-center text-slate-400 hover:text-blue-600 hover:bg-white transition-all"
                                title="Upload Gambar (6)"
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
                                onclick="navigasiKe(5)"
                                type="text"
                                id="chat-input"
                                placeholder="Tulis pesan... (5)"
                                class="flex-1 bg-transparent text-sm font-medium text-slate-700 placeholder-slate-400 focus:outline-none"
                            />
                            <button
                                onclick="mulaiDikteChat()"
                                class="w-10 h-10 rounded-xl flex items-center justify-center text-red-500 bg-red-50 hover:bg-red-100 transition-all animate-pulse"
                                title="Dikte Suara"
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
                                onclick="navigasiKe(7)"
                                class="w-10 h-10 rounded-xl bg-blue-600 text-white flex items-center justify-center hover:bg-blue-700 transition-all shadow-md shadow-blue-200"
                                title="Kirim (7)"
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
                                    ></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <script>
            const statusDesc = document.getElementById("status-desc");
            const waveBars = document.querySelectorAll(".wave-bar");
            const synth = window.speechSynthesis;
            const SpeechRec =
                window.webkitSpeechRecognition || window.SpeechRecognition;

            // Instance Utama (Navigasi)
            const rec = new SpeechRec();
            rec.lang = "id-ID";
            rec.continuous = true;

            let isSubmitted = false;
            let isDictating = false;

            function setWave(active) {
                waveBars.forEach((bar) => {
                    bar.style.height = active
                        ? `${Math.floor(Math.random() * 12) + 4}px`
                        : "4px";
                });
            }

            function bicara(teks, callback) {
                if (!isDictating) rec.stop();

                synth.cancel();
                const utter = new SpeechSynthesisUtterance(teks);
                utter.lang = "id-ID";
                utter.rate = 0.9;

                utter.onstart = () => {
                    if (statusDesc) statusDesc.innerText = "Speaking";
                    let interval = setInterval(() => setWave(true), 150);
                    utter.onend = () => {
                        if (statusDesc) statusDesc.innerText = "Listening";
                        clearInterval(interval);
                        setWave(false);
                        if (!isDictating)
                            try {
                                rec.start();
                            } catch (e) {}
                        if (callback) callback();
                    };
                };
                synth.speak(utter);
            }

            function handleFileSelect(input) {
                if (input.files && input.files[0]) {
                    document.getElementById("file-label").innerText =
                        "Terpilih: " + input.files[0].name;
                    bicara(
                        "File " + input.files[0].name + " berhasil dipilih.",
                    );
                }
            }

            function mulaiDikteChat() {
                bicara("Silahkan bicara pesan anda", () => {
                    document.getElementById("chat-input").focus();
                });
            }

            function tambahChat(pesan) {
                const container = document.getElementById("chat-container");
                const html = `
                <div class="chat-bubble flex gap-4 flex-row-reverse items-start animate-fade-in-up">
                    <img src="https://ui-avatars.com/api/?name=Ridwan&background=0ea5e9&color=fff" class="w-10 h-10 rounded-full shrink-0 shadow-sm shadow-blue-200">
                    <div class="bg-blue-50 p-4 rounded-2xl rounded-tr-none border border-blue-100 max-w-[80%] shadow-sm">
                        <p class="text-xs font-bold text-blue-500 mb-1 text-right sender-name">Anda</p>
                        <p class="text-sm text-blue-800 leading-relaxed message-text">${pesan}</p>
                    </div>
                </div>`;
                container.insertAdjacentHTML("beforeend", html);
                container.scrollTop = container.scrollHeight;
            }

            // --- FITUR DIKTE CATATAN (NOMOR 3) ---
            function rekamCatatan() {
                rec.stop();
                isDictating = true;

                bicara("Silahkan ucapkan catatan Anda.", () => {
                    const noteRec = new SpeechRec();
                    noteRec.lang = "id-ID";
                    noteRec.interimResults = false;
                    noteRec.maxAlternatives = 1;

                    statusDesc.innerText = "Merekam Catatan...";
                    setWave(true);
                    noteRec.start();

                    noteRec.onresult = (event) => {
                        const hasilSuara = event.results[0][0].transcript;
                        document.getElementById("tanggapan-text").value =
                            hasilSuara;
                        setWave(false);
                        isDictating = false;

                        const konfirmasi =
                            "Saya menulis: " +
                            hasilSuara +
                            ". Jika sudah betul, sebutkan Empat untuk mengirim.";
                        bicara(konfirmasi);
                    };

                    noteRec.onerror = () => {
                        setWave(false);
                        isDictating = false;
                        bicara(
                            "Suara tidak jelas. Sebutkan Tiga untuk coba lagi.",
                        );
                    };
                });
            }

            // --- FUNGSI UPDATE UI ---
            function kirimTugas() {
                isSubmitted = true;
                document.getElementById("status-icon").className =
                    "w-12 h-12 rounded-2xl bg-emerald-100 text-emerald-600 flex items-center justify-center transition-all";
                document.getElementById("status-icon").innerHTML =
                    '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>';
                document.getElementById("status-title").className =
                    "text-sm font-black text-emerald-600 uppercase tracking-wide transition-all";
                document.getElementById("status-text").innerText =
                    "Sudah Dikirim";
                document
                    .getElementById("submission-form")
                    .classList.add("hidden");
                document
                    .getElementById("submission-success")
                    .classList.remove("hidden");

                const note = document.getElementById("tanggapan-text").value;
                if (note)
                    document.getElementById("submitted-note").innerText =
                        '"' + note + '"';

                bicara("Tugas berhasil dikirim. Terima kasih.");
            }

            function kirimUlang() {
                isSubmitted = false;
                document.getElementById("status-icon").className =
                    "w-12 h-12 rounded-2xl bg-slate-100 text-slate-500 flex items-center justify-center transition-all";
                document.getElementById("status-icon").innerHTML =
                    '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>';
                document.getElementById("status-title").className =
                    "text-sm font-black text-slate-400 uppercase tracking-wide transition-all";
                document.getElementById("status-text").innerText =
                    "Belum Dikirim";
                document
                    .getElementById("submission-success")
                    .classList.add("hidden");
                document
                    .getElementById("submission-form")
                    .classList.remove("hidden");
                bicara("Silahkan upload file baru.");
            }

            // --- NAVIGASI ---
            function navigasiKe(nomor) {
                if (isDictating) return;

                let tujuan = "";
                let teks = "";

                if (nomor === 0) {
                    tujuan = "{{ route('course.assignments') }}";
                    teks = "Kembali ke daftar tugas.";
                }

                // MATERI
                else if (nomor === 1) {
                    teks =
                        "Membacakan instruksi: " +
                        document.getElementById("soal-text").innerText;
                }

                // PENGUMPULAN
                else if (nomor === 2) {
                    if (!isSubmitted) {
                        document.getElementById("file-upload").click();
                        teks = "Membuka jendela upload.";
                    } else {
                        teks = "Membuka file jawaban Anda.";
                    }
                } else if (nomor === 3) {
                    if (!isSubmitted) {
                        rekamCatatan();
                        return;
                    } else {
                        teks = "Catatan sudah tersimpan.";
                    }
                } else if (nomor === 4) {
                    if (!isSubmitted) {
                        kirimTugas();
                        return;
                    } else {
                        teks = "Tugas sudah dikirim sebelumnya.";
                    }
                } else if (nomor === 9) {
                    if (isSubmitted) {
                        kirimUlang();
                        return;
                    }
                }

                // DISKUSI
                else if (nomor === 5) {
                    document.getElementById("chat-input").focus();
                    teks = "Fokus diskusi.";
                } else if (nomor === 6) {
                    document.getElementById("chat-image").click();
                    teks = "Buka galeri.";
                } else if (nomor === 7) {
                    const pesan = document.getElementById("chat-input").value;
                    if (pesan) {
                        teks = "Pesan dikirim.";
                        tambahChat(pesan);
                        document.getElementById("chat-input").value = "";
                    } else {
                        teks = "Pesan kosong.";
                    }
                } else if (nomor === 8) {
                    let bubbles = document.querySelectorAll(".chat-bubble");
                    let fullText = "Membacakan diskusi kelas. ";
                    bubbles.forEach((bubble) => {
                        fullText +=
                            "Dari " +
                            bubble.querySelector(".sender-name").innerText +
                            ": " +
                            bubble.querySelector(".message-text").innerText +
                            ". ";
                    });
                    teks = fullText;
                }

                if (teks !== "") bicara(teks);
                if (tujuan !== "")
                    setTimeout(() => {
                        window.location.href = tujuan;
                    }, 1500);
            }

            // --- LISTENER UTAMA ---
            rec.onresult = (event) => {
                if (isDictating) return;

                const hasil =
                    event.results[
                        event.results.length - 1
                    ][0].transcript.toLowerCase();
                const angka = hasil.match(/\d+/);

                if (angka) navigasiKe(parseInt(angka[0]));
                else if (hasil.includes("nol")) navigasiKe(0);
                else if (hasil.includes("satu")) navigasiKe(1);
                else if (hasil.includes("dua")) navigasiKe(2);
                else if (hasil.includes("tiga")) navigasiKe(3);
                else if (hasil.includes("empat")) navigasiKe(4);
                else if (hasil.includes("sembilan")) navigasiKe(9);
                else if (hasil.includes("lima")) navigasiKe(5);
                else if (hasil.includes("enam")) navigasiKe(6);
                else if (hasil.includes("tujuh")) navigasiKe(7);
                else if (hasil.includes("delapan")) navigasiKe(8);
            };

            // --- PANDUAN SUARA OTOMATIS SAAT LOAD ---
            window.onload = () => {
                const panduan =
                    "Selamat datang di Detail Tugas. Berikut panduan navigasi suara Anda. " +
                    "Sebutkan SATU untuk membaca instruksi teks. " +
                    "Sebutkan DUA untuk upload file. " +
                    "TIGA untuk mendiktekan catatan secara otomatis. " +
                    "EMPAT untuk mengirim tugas. " +
                    "SEMBILAN untuk kirim ulang. " +
                    "LIMA tulis pesan diskusi. ENAM kirim gambar. TUJUH kirim chat. DELAPAN baca diskusi. " +
                    "Dan NOL untuk kembali.";

                setTimeout(() => {
                    bicara(panduan, () => {
                        try {
                            rec.start();
                        } catch (e) {}
                    });
                }, 1000);
            };
        </script>
    </body>
</html>
