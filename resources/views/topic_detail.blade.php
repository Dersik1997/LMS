<!DOCTYPE html>
<html lang="id" class="h-full">
    <head>
        <meta charset="UTF-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"
        />
        <title>Topik: Array & Memori | LMS Inklusi UMMI</title>
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
                            class="text-lg md:text-xl font-extrabold text-slate-900 tracking-tight"
                        >
                            Array & Memori
                        </h1>
                        <p
                            class="text-[10px] font-bold text-blue-600 uppercase tracking-widest mt-1"
                        >
                            Pertemuan 2
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
                <div
                    onclick="navigasiKe(1)"
                    class="bg-blue-50 border-l-4 border-blue-500 rounded-r-2xl p-6 shadow-sm cursor-pointer hover:bg-blue-100 transition-all group relative"
                >
                    <div
                        class="absolute right-4 top-4 w-8 h-8 bg-blue-200 text-blue-700 rounded-lg flex items-center justify-center font-black text-xs"
                    >
                        1
                    </div>
                    <div class="flex items-start gap-4">
                        <div
                            class="w-10 h-10 rounded-full bg-blue-200 flex items-center justify-center shrink-0"
                        >
                            <svg
                                class="w-5 h-5 text-blue-700"
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
                        <div>
                            <h3
                                class="text-sm font-black text-blue-800 uppercase tracking-wide mb-1"
                            >
                                Pesan Dosen (1)
                            </h3>
                            <p
                                id="text-pengumuman"
                                class="text-sm font-medium text-slate-700 leading-relaxed"
                            >
                                "Assalamualaikum. Silakan simak video
                                visualisasi memori (3) terlebih dahulu sebelum
                                membaca modul PDF (2), agar lebih mudah
                                dipahami."
                            </p>
                        </div>
                    </div>
                </div>

                <div
                    class="bg-white rounded-[2rem] p-8 border border-slate-200 shadow-sm"
                >
                    <div
                        class="flex items-center gap-3 mb-6 border-b border-slate-100 pb-4"
                    >
                        <svg
                            class="w-6 h-6 text-red-500"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"
                            ></path>
                        </svg>
                        <h3
                            class="text-lg font-black text-slate-900 uppercase tracking-widest"
                        >
                            Materi Pembelajaran
                        </h3>
                    </div>

                    <div class="space-y-4">
                        <div
                            onclick="navigasiKe(2)"
                            class="group border border-slate-100 rounded-2xl p-4 hover:border-blue-300 hover:bg-blue-50/30 transition-all cursor-pointer relative"
                        >
                            <div
                                class="absolute right-4 top-4 w-8 h-8 bg-slate-100 text-slate-500 group-hover:bg-blue-600 group-hover:text-white rounded-lg flex items-center justify-center font-black text-xs transition-colors"
                            >
                                2
                            </div>
                            <div class="flex gap-4">
                                <div
                                    class="w-12 h-14 bg-red-50 rounded-lg border border-red-100 flex items-center justify-center shrink-0"
                                >
                                    <span
                                        class="text-[9px] font-black text-red-500 uppercase"
                                        >PDF</span
                                    >
                                </div>
                                <div>
                                    <h4
                                        class="text-sm font-bold text-slate-800 group-hover:text-blue-700"
                                    >
                                        Modul 2: Implementasi Array C++
                                    </h4>
                                    <p class="text-xs text-slate-400 mt-1">
                                        1.4 MB • Bacaan Wajib
                                    </p>
                                </div>
                            </div>
                            <div id="pdf-content-2" class="hidden">
                                Ini adalah isi Modul 2. Array adalah struktur
                                data yang menyimpan elemen-elemen dengan tipe
                                data yang sama dalam urutan memori yang
                                berdekatan.
                            </div>
                        </div>

                        <div
                            onclick="navigasiKe(3)"
                            class="group border border-slate-100 rounded-2xl p-4 hover:border-red-300 hover:bg-red-50/30 transition-all cursor-pointer relative"
                        >
                            <div
                                class="absolute right-4 top-4 w-8 h-8 bg-slate-100 text-slate-500 group-hover:bg-red-600 group-hover:text-white rounded-lg flex items-center justify-center font-black text-xs transition-colors"
                            >
                                3
                            </div>
                            <div class="flex gap-4">
                                <div
                                    class="w-12 h-14 bg-red-100 rounded-lg border border-red-200 flex items-center justify-center shrink-0 text-red-600"
                                >
                                    <svg
                                        class="w-6 h-6"
                                        fill="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"
                                        />
                                    </svg>
                                </div>
                                <div>
                                    <h4
                                        class="text-sm font-bold text-slate-800 group-hover:text-red-700"
                                    >
                                        Video: Visualisasi Memori
                                    </h4>
                                    <p class="text-xs text-slate-400 mt-1">
                                        Youtube • 15 Menit
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div
                            onclick="navigasiKe(4)"
                            class="group border border-slate-100 rounded-2xl p-4 hover:border-purple-300 hover:bg-purple-50/30 transition-all cursor-pointer relative"
                        >
                            <div
                                class="absolute right-4 top-4 w-8 h-8 bg-slate-100 text-slate-500 group-hover:bg-purple-600 group-hover:text-white rounded-lg flex items-center justify-center font-black text-xs transition-colors"
                            >
                                4
                            </div>
                            <div class="flex gap-4">
                                <div
                                    class="w-12 h-14 bg-purple-100 rounded-lg border border-purple-200 flex items-center justify-center shrink-0 text-purple-600"
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
                                            d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z"
                                        ></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4
                                        class="text-sm font-bold text-slate-800 group-hover:text-purple-700"
                                    >
                                        Audio: Penjelasan Tambahan
                                    </h4>
                                    <p class="text-xs text-slate-400 mt-1">
                                        MP3 • 5 Menit
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div
                        id="module-reader"
                        class="hidden mt-6 bg-slate-900 text-slate-200 p-6 rounded-2xl shadow-2xl animate-fade-in-up"
                    >
                        <div
                            class="flex justify-between items-center mb-4 border-b border-slate-700 pb-4"
                        >
                            <h3
                                class="text-xs font-black text-white uppercase tracking-widest flex items-center gap-2"
                            >
                                <span
                                    class="w-2 h-2 bg-emerald-500 rounded-full animate-pulse"
                                ></span>
                                Membacakan...
                            </h3>
                            <button
                                onclick="stopBicara()"
                                class="text-[9px] font-bold uppercase bg-red-500/20 text-red-400 px-3 py-1 rounded-lg hover:bg-red-500 hover:text-white transition-all"
                            >
                                Stop
                            </button>
                        </div>
                        <p
                            id="reader-text"
                            class="text-sm leading-loose font-medium font-mono"
                        >
                            Sedang memuat...
                        </p>
                    </div>
                </div>

                <div
                    class="bg-white rounded-[2rem] p-8 border border-slate-200 shadow-sm relative overflow-hidden"
                >
                    <div class="flex justify-between items-center mb-6">
                        <h3
                            class="text-lg font-black text-slate-900 uppercase tracking-tight"
                        >
                            Diskusi Kelas
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
                        class="flex flex-col gap-4 mb-6 max-h-80 overflow-y-auto pr-2 custom-scrollbar p-1"
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
                                    class="text-sm text-slate-600 leading-relaxed"
                                >
                                    Pak, untuk array 2 dimensi apakah harus
                                    ukurannya sama tiap baris?
                                </p>
                            </div>
                        </div>

                        <div class="flex gap-4 flex-row-reverse items-start">
                            <img
                                src="https://ui-avatars.com/api/?name=Ridwan&background=0ea5e9&color=fff"
                                class="w-10 h-10 rounded-full shrink-0 shadow-sm shadow-blue-200"
                            />
                            <div
                                class="bg-blue-50 p-4 rounded-2xl rounded-tr-none border border-blue-100 max-w-[80%] shadow-sm"
                            >
                                <p
                                    class="text-xs font-bold text-blue-500 mb-1 text-right"
                                >
                                    Anda
                                </p>
                                <p
                                    class="text-sm text-blue-800 leading-relaxed"
                                >
                                    Secara konsep matriks iya Bud, tapi kalau
                                    pakai pointer of pointer bisa beda-beda
                                    (jagged array).
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
            const readerBox = document.getElementById("module-reader");
            const readerText = document.getElementById("reader-text");
            const synth = window.speechSynthesis;
            const SpeechRec =
                window.webkitSpeechRecognition || window.SpeechRecognition;
            const rec = new SpeechRec();
            rec.lang = "id-ID";
            rec.continuous = true;

            function setWave(active) {
                waveBars.forEach((bar) => {
                    bar.style.height = active
                        ? `${Math.floor(Math.random() * 12) + 4}px`
                        : "4px";
                });
            }

            function bicara(teks, callback) {
                synth.cancel();
                const utter = new SpeechSynthesisUtterance(teks);
                utter.lang = "id-ID";
                utter.onstart = () => {
                    statusDesc.innerText = "Membaca...";
                    setInterval(() => setWave(true), 150);
                };
                utter.onend = () => {
                    statusDesc.innerText = "Standby";
                    setWave(false);
                    if (callback) callback();
                };
                synth.speak(utter);
            }

            function stopBicara() {
                synth.cancel();
                readerBox.classList.add("hidden");
            }

            function mulaiDikteChat() {
                bicara("Silahkan bicara pesan anda", () => {
                    document.getElementById("chat-input").focus();
                });
            }

            function navigasiKe(nomor) {
                let tujuan = "";
                let teks = "";

                if (nomor === 0) {
                    tujuan = "{{ route('course.detail') }}"; // Balik ke halaman sebelumnya
                    teks = "Kembali.";
                } else if (nomor === 1) {
                    teks =
                        "Pesan Dosen: " +
                        document.getElementById("text-pengumuman").innerText;
                } else if (nomor === 2) {
                    readerBox.classList.remove("hidden");
                    readerText.innerText =
                        document.getElementById("pdf-content-2").innerText;
                    teks = "Membuka PDF. " + readerText.innerText;
                } else if (nomor === 3) {
                    teks = "Memutar Video Pembelajaran.";
                    setTimeout(
                        () => window.open("https://youtube.com", "_blank"),
                        2000,
                    );
                } else if (nomor === 4) {
                    teks = "Memutar Audio Dosen.";
                }

                // DISKUSI (5,6,7)
                else if (nomor === 5) {
                    document.getElementById("chat-input").focus();
                    teks = "Fokus diskusi.";
                } else if (nomor === 6) {
                    document.getElementById("chat-image").click();
                    teks = "Upload gambar.";
                } else if (nomor === 7) {
                    if (document.getElementById("chat-input").value) {
                        teks = "Pesan terkirim.";
                        document.getElementById("chat-input").value = "";
                    } else {
                        teks = "Pesan kosong.";
                    }
                }

                if (teks !== "") bicara(teks);
                if (tujuan !== "")
                    setTimeout(() => {
                        window.location.href = tujuan;
                    }, 1500);
            }

            function mulaiMendengar() {
                try {
                    rec.start();
                    rec.onresult = (event) => {
                        const hasil =
                            event.results[
                                event.results.length - 1
                            ][0].transcript.toLowerCase();
                        const angka = hasil.match(/\d+/);
                        if (angka) navigasiKe(parseInt(angka[0]));
                        // Manual keywords
                        else if (
                            hasil.includes("nol") ||
                            hasil.includes("kembali")
                        )
                            navigasiKe(0);
                        else if (
                            hasil.includes("satu") ||
                            hasil.includes("pesan")
                        )
                            navigasiKe(1);
                        else if (hasil.includes("dua") || hasil.includes("pdf"))
                            navigasiKe(2);
                        else if (
                            hasil.includes("tiga") ||
                            hasil.includes("video")
                        )
                            navigasiKe(3);
                        else if (
                            hasil.includes("empat") ||
                            hasil.includes("audio")
                        )
                            navigasiKe(4);
                        else if (
                            hasil.includes("lima") ||
                            hasil.includes("tulis")
                        )
                            navigasiKe(5);
                        else if (
                            hasil.includes("enam") ||
                            hasil.includes("gambar")
                        )
                            navigasiKe(6);
                        else if (
                            hasil.includes("tujuh") ||
                            hasil.includes("kirim")
                        )
                            navigasiKe(7);

                        if (hasil.includes("stop")) stopBicara();
                    };
                } catch (e) {}
            }

            window.onload = () => {
                const orientasi =
                    "Halaman Materi. 1 Pesan Dosen, 2 PDF, 3 Video, 4 Audio. Diskusi di bawah, navigasi 5, 6, 7.";
                bicara(orientasi, () => {
                    mulaiMendengar();
                });
            };
        </script>
    </body>
</html>
