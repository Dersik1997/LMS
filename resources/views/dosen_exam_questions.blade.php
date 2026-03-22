<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"
        />
        <title>Builder Soal Ujian | Portal Dosen</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link
            href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&display=swap"
            rel="stylesheet"
        />

        <style>
            .custom-scrollbar::-webkit-scrollbar {
                width: 4px;
                height: 4px;
            }
            .custom-scrollbar::-webkit-scrollbar-track {
                background: transparent;
            }
            .custom-scrollbar::-webkit-scrollbar-thumb {
                background-color: #cbd5e1;
                border-radius: 20px;
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
            .safe-fade-in {
                animation: fadeIn 0.4s ease-out forwards;
                opacity: 0;
            }
            html,
            body {
                scroll-behavior: smooth;
            }
        </style>
    </head>

    <body
        class="m-0 font-['Plus_Jakarta_Sans'] bg-slate-50 text-slate-800 antialiased h-[100dvh] flex flex-col overflow-hidden"
    >
        {{-- FORM HIDDEN UNTUK SUBMIT KE BACKEND --}}
        <form
            id="formSimpanSoal"
            action="{{ route('dosen.exams.questions.store', $exam->id) }}"
            method="POST"
            class="hidden"
        >
            @csrf
            <input type="hidden" name="soal_data" id="soal_data_input" />
        </form>

        {{-- HEADER STICKY (RAPI DI MOBILE) --}}
        <header
            class="bg-white/90 backdrop-blur-2xl border-b border-slate-200/60 sticky top-0 z-40 px-3 sm:px-8 py-3 sm:py-4 shadow-sm w-full shrink-0"
        >
            <div
                class="max-w-7xl mx-auto flex items-center justify-between relative h-10 sm:h-12"
            >
                {{-- Tombol Back --}}
                <div
                    class="flex items-center gap-2 sm:gap-4 relative z-10 w-auto justify-start shrink-0"
                >
                    <a
                        href="{{ route('dosen.exams') }}"
                        class="w-9 h-9 sm:w-11 sm:h-11 rounded-full bg-slate-100 hover:bg-blue-600 text-slate-500 hover:text-white flex items-center justify-center transition-all duration-300 shadow-sm shrink-0 group border border-slate-200 hover:border-blue-600"
                    >
                        <svg
                            class="w-4 h-4 sm:w-5 sm:h-5 transform group-hover:-translate-x-0.5 transition-transform"
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

                {{-- Judul di Tengah --}}
                <div
                    class="text-center absolute left-1/2 transform -translate-x-1/2 w-[55%] md:w-full max-w-md"
                >
                    <h1
                        class="text-sm sm:text-lg md:text-xl font-black text-slate-900 tracking-tight leading-tight truncate"
                    >
                        Builder Soal
                    </h1>
                    <div
                        class="flex items-center justify-center gap-1 sm:gap-2 mt-0.5 sm:mt-1"
                    >
                        <span
                            class="text-[8px] sm:text-[10px] font-bold text-blue-600 uppercase tracking-widest bg-blue-100 px-1.5 sm:px-2 py-0.5 rounded-md truncate max-w-[80px] sm:max-w-none"
                        >
                            {{ $exam->judul ?? 'Ujian' }}
                        </span>
                        <span
                            class="text-[8px] sm:text-[10px] md:text-[11px] font-bold text-slate-400 uppercase tracking-wider shrink-0"
                        >
                            • <span id="badgeTotalSoalHeader">0</span> Soal
                        </span>
                    </div>
                </div>

                {{-- Tombol Simpan di Kanan --}}
                <div
                    class="flex items-center relative z-10 w-auto justify-end shrink-0"
                >
                    <button
                        type="button"
                        onclick="simpanSemuaSoal()"
                        class="px-3 sm:px-6 py-2 sm:py-2.5 bg-blue-600 text-white font-black rounded-lg sm:rounded-xl text-[9px] sm:text-xs uppercase tracking-widest hover:bg-blue-700 transition-all shadow-md shadow-blue-200 flex items-center gap-1.5 sm:gap-2 transform active:scale-95"
                    >
                        <svg
                            class="w-3.5 h-3.5 sm:w-4 sm:h-4"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2.5"
                                d="M5 13l4 4L19 7"
                            ></path>
                        </svg>
                        <span class="hidden sm:inline">Simpan Semua</span>
                        <span class="sm:hidden">Simpan</span>
                    </button>
                </div>
            </div>
        </header>

        {{-- KONTEN UTAMA BUILDER --}}
        <main
            class="flex-1 overflow-y-auto custom-scrollbar p-3 sm:p-6 lg:p-8 relative bg-slate-50/50 scroll-smooth pb-20"
        >
            <div
                class="w-full max-w-6xl mx-auto flex flex-col lg:flex-row gap-4 sm:gap-6 mb-10 safe-fade-in relative z-10"
            >
                {{-- SIDEBAR KIRI: Navigasi Daftar Soal --}}
                <aside
                    class="w-full lg:w-72 shrink-0 flex flex-col lg:sticky lg:top-6 lg:h-[calc(100vh-140px)]"
                >
                    <div
                        class="bg-white p-4 sm:p-5 rounded-[1.25rem] sm:rounded-[1.5rem] border border-slate-200 shadow-sm flex flex-col h-auto lg:h-full max-h-[250px] lg:max-h-full"
                    >
                        <h3
                            class="text-[10px] sm:text-[11px] font-black text-slate-500 uppercase tracking-widest mb-3 border-b border-slate-100 pb-2 sm:pb-3 flex items-center justify-between shrink-0"
                        >
                            Navigasi Soal
                            <span
                                class="bg-blue-50 text-blue-600 px-2 py-0.5 rounded-md"
                                id="badgeTotalSoal"
                                >0</span
                            >
                        </h3>

                        <div
                            id="sidebarListContainer"
                            class="flex-1 overflow-y-auto custom-scrollbar space-y-2 pr-1 sm:pr-2"
                        ></div>

                        <button
                            onclick="tambahSoal()"
                            class="w-full mt-3 sm:mt-4 p-2.5 sm:p-3 border-2 border-dashed border-blue-200 text-blue-600 font-bold rounded-lg sm:rounded-xl text-[10px] sm:text-xs hover:bg-blue-50 transition-all flex items-center justify-center gap-1.5 sm:gap-2 group shrink-0"
                        >
                            <div
                                class="bg-white rounded-md p-1 group-hover:scale-110 transition-transform shadow-sm"
                            >
                                <svg
                                    class="w-3.5 h-3.5 sm:w-4 sm:h-4"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2.5"
                                        d="M12 4v16m8-8H4"
                                    ></path>
                                </svg>
                            </div>
                            Tambah Soal
                        </button>
                    </div>
                </aside>

                {{-- AREA KANAN: Editor Soal --}}
                <div
                    id="editorArea"
                    class="flex-1 bg-white p-4 sm:p-6 md:p-8 rounded-[1.25rem] sm:rounded-[1.5rem] border border-slate-200 shadow-sm flex-col hidden h-fit"
                >
                    <div
                        class="flex items-start justify-between gap-3 mb-5 sm:mb-8 border-b border-slate-100 pb-4 sm:pb-5"
                    >
                        <div class="min-w-0">
                            <h2
                                id="editorTitle"
                                class="text-base sm:text-lg md:text-xl font-black text-slate-900 truncate"
                            >
                                Editor Soal
                            </h2>
                            <p
                                class="text-[9px] sm:text-[10px] md:text-[11px] font-medium text-slate-500 mt-0.5 sm:mt-1"
                            >
                                Lengkapi form pertanyaan dan jawaban.
                            </p>
                        </div>
                        <button
                            onclick="hapusSoalAktif()"
                            class="text-red-500 hover:bg-red-50 p-2 sm:px-4 sm:py-2 rounded-lg sm:rounded-xl transition-colors flex items-center justify-center gap-1.5 text-[10px] sm:text-xs font-bold border border-red-100 shadow-sm shrink-0"
                        >
                            <svg
                                class="w-4 h-4 sm:w-4 sm:h-4 shrink-0"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                                ></path>
                            </svg>
                            <span class="hidden sm:inline">Hapus Soal</span>
                        </button>
                    </div>

                    <div class="space-y-5 sm:space-y-6 flex-1">
                        <div class="grid grid-cols-2 gap-3 sm:gap-6">
                            <div>
                                <label
                                    class="block text-[9px] sm:text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5 sm:mb-2"
                                    >Tipe Soal</label
                                >
                                <select
                                    id="inputTipeSoal"
                                    onchange="updateTipeSoal(this.value)"
                                    class="w-full bg-slate-50 border border-slate-200 rounded-lg sm:rounded-xl p-2.5 sm:p-3.5 font-bold text-slate-800 text-xs sm:text-sm focus:ring-2 focus:ring-blue-500 outline-none cursor-pointer hover:border-blue-300 transition-colors shadow-sm"
                                >
                                    <option value="PG">Pilihan Ganda</option>
                                    <option value="ESAI">Esai</option>
                                </select>
                            </div>
                            <div>
                                <label
                                    class="block text-[9px] sm:text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5 sm:mb-2"
                                    >Bobot Nilai</label
                                >
                                <input
                                    type="number"
                                    id="inputBobotSoal"
                                    oninput="updateDataSoal()"
                                    min="1"
                                    max="100"
                                    class="w-full bg-slate-50 border border-slate-200 rounded-lg sm:rounded-xl p-2.5 sm:p-3.5 font-bold text-slate-800 text-xs sm:text-sm focus:ring-2 focus:ring-blue-500 outline-none hover:border-blue-300 transition-colors shadow-sm"
                                />
                            </div>
                        </div>

                        <div>
                            <label
                                class="block text-[9px] sm:text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5 sm:mb-2"
                                >Teks Pertanyaan</label
                            >
                            <textarea
                                id="inputTeksSoal"
                                oninput="updateDataSoal()"
                                rows="4"
                                class="w-full bg-slate-50 border border-slate-200 rounded-lg sm:rounded-xl p-3 sm:p-4 font-medium text-slate-800 text-xs sm:text-sm focus:ring-2 focus:ring-blue-500 outline-none resize-y leading-relaxed hover:border-blue-300 transition-colors shadow-inner placeholder:text-slate-400"
                                placeholder="Ketik deskripsi atau instruksi soal Anda di sini..."
                            ></textarea>
                        </div>

                        {{-- Area Opsi Jawaban (Khusus Tipe PG) --}}
                        <div
                            id="opsiJawabanContainer"
                            class="space-y-3 sm:space-y-4 pt-3 sm:pt-4 border-t border-slate-100 hidden"
                        >
                            <div class="flex items-center justify-between">
                                <label
                                    class="block text-[9px] sm:text-[10px] font-black text-slate-600 uppercase tracking-widest flex items-center flex-wrap gap-2"
                                >
                                    Pilihan Jawaban
                                    <span
                                        class="text-blue-600 normal-case font-bold tracking-normal bg-blue-50 px-1.5 sm:px-2 py-0.5 rounded-md border border-blue-100 text-[8px] sm:text-[9px]"
                                        >Pilih 1 jawaban benar</span
                                    >
                                </label>
                            </div>

                            <div
                                id="listOpsi"
                                class="grid gap-2.5 sm:gap-3"
                            ></div>

                            <button
                                type="button"
                                onclick="tambahOpsi()"
                                class="mt-2 text-[10px] sm:text-xs font-bold text-blue-600 hover:text-white bg-blue-50 hover:bg-blue-600 border border-blue-200 hover:border-blue-600 px-3 sm:px-4 py-2 sm:py-2.5 rounded-lg sm:rounded-xl transition-all flex items-center justify-center gap-1.5 sm:gap-2 w-full sm:w-auto shadow-sm"
                            >
                                <svg
                                    class="w-3.5 h-3.5 sm:w-4 sm:h-4"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2.5"
                                        d="M12 4v16m8-8H4"
                                    ></path>
                                </svg>
                                Tambah Opsi
                            </button>
                        </div>
                    </div>
                </div>

                {{-- State Kosong (Jika belum ada soal) --}}
                <div
                    id="emptyState"
                    class="flex-1 bg-white p-8 sm:p-12 rounded-[1.25rem] sm:rounded-[1.5rem] border border-slate-200 shadow-sm flex flex-col items-center justify-center text-center"
                >
                    <div
                        class="w-16 h-16 sm:w-20 sm:h-20 bg-slate-50 rounded-full flex items-center justify-center mb-4 border border-slate-100 shadow-inner"
                    >
                        <svg
                            class="w-8 h-8 sm:w-10 sm:h-10 text-slate-300"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.5"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
                            ></path>
                        </svg>
                    </div>
                    <h3 class="text-lg sm:text-xl font-black text-slate-800">
                        Belum Ada Soal
                    </h3>
                    <p
                        class="text-xs sm:text-sm font-medium text-slate-500 mt-1 sm:mt-2 mb-6 sm:mb-8"
                    >
                        Mulai bangun ujian Anda dengan menambahkan pertanyaan
                        pertama.
                    </p>
                    <button
                        onclick="tambahSoal()"
                        class="px-6 sm:px-8 py-3 sm:py-3.5 bg-blue-600 text-white rounded-lg sm:rounded-xl font-bold text-[10px] sm:text-sm uppercase tracking-widest hover:bg-blue-700 shadow-md shadow-blue-200 transition-all flex items-center gap-2 transform active:scale-95"
                    >
                        <svg
                            class="w-4 h-4 sm:w-5 sm:h-5"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2.5"
                                d="M12 4v16m8-8H4"
                            ></path>
                        </svg>
                        Buat Soal
                    </button>
                </div>
            </div>
        </main>

        {{-- LOGIKA JAVASCRIPT BUILDER --}}
        <script>
            // 1. DATA STATE: Tarik data dari Backend dengan aman
            let dbQuestionsRaw = {!! json_encode($exam->questions ?? []) !!};
            let dbQuestions = Array.isArray(dbQuestionsRaw) ? dbQuestionsRaw : Object.values(dbQuestionsRaw);

            function generateId() {
                return Math.random().toString(36).substr(2, 9);
            }

            // Parsing Data Database ke Format Javascript Builder
            let questions = dbQuestions.map(q => {
                let qType = String(q.tipe || 'PG').toUpperCase();
                if(qType !== 'PG' && qType !== 'ESAI') qType = 'PG';

                let opts = [];
                if(q.options && Array.isArray(q.options) && q.options.length > 0) {
                    opts = q.options.map(o => ({
                        id: String(o.id || generateId()),
                        text: o.teks_opsi || '',
                        isCorrect: o.is_correct == 1 || o.is_correct === true
                    }));
                }

                if(qType === 'PG' && opts.length === 0) {
                    opts = [
                        { id: generateId(), text: '', isCorrect: true },
                        { id: generateId(), text: '', isCorrect: false },
                        { id: generateId(), text: '', isCorrect: false },
                        { id: generateId(), text: '', isCorrect: false }
                    ];
                }

                return {
                    id: String(q.id || generateId()),
                    type: qType,
                    score: q.bobot || 10,
                    text: q.teks_soal || '',
                    options: opts
                };
            });

            let activeQuestionId = questions.length > 0 ? questions[0].id : null;

            // 2. RENDER ENGINE UTAMA
            function renderApp() {
                updateTotal();
                renderSidebar();
                renderEditor();
            }

            function updateTotal() {
                const total = questions.length;
                document.getElementById('badgeTotalSoal').innerText = total;
                document.getElementById('badgeTotalSoalHeader').innerText = total;

                const editorArea = document.getElementById('editorArea');
                const emptyState = document.getElementById('emptyState');

                if (total === 0) {
                    editorArea.classList.remove('flex');
                    editorArea.classList.add('hidden');
                    emptyState.classList.remove('hidden');
                } else {
                    editorArea.classList.add('flex');
                    editorArea.classList.remove('hidden');
                    emptyState.classList.add('hidden');
                }
            }

            function renderSidebar() {
                const container = document.getElementById('sidebarListContainer');
                container.innerHTML = '';

                questions.forEach((q, index) => {
                    const isActive = q.id === activeQuestionId;
                    const num = index + 1;
                    const labelType = q.type === 'PG' ? 'Pilihan Ganda' : 'Esai';
                    const isEmpty = !q.text || q.text.trim() === '';

                    const btnHTML = `
                        <button onclick="pilihSoal('${q.id}')" class="w-full flex items-center justify-between p-2.5 sm:p-3 rounded-xl text-left transition-all ${isActive ? 'bg-blue-600 text-white shadow-md' : 'bg-white border border-slate-200 hover:border-blue-300 group'}">
                            <div class="flex items-center gap-2.5 sm:gap-3 w-full">
                                <span class="w-6 h-6 sm:w-7 sm:h-7 rounded-full flex items-center justify-center text-[9px] sm:text-[10px] font-black shrink-0 ${isActive ? 'bg-white text-blue-600 shadow-sm' : 'bg-slate-100 text-slate-500 group-hover:bg-blue-50'}">${num}</span>
                                <div class="flex flex-col flex-1 min-w-0">
                                    <span class="text-[10px] sm:text-xs font-bold truncate ${isActive ? 'text-white' : 'text-slate-700'}">Soal #${num}</span>
                                    <span class="text-[8px] sm:text-[9px] font-medium uppercase tracking-wider ${isActive ? 'text-blue-100' : 'text-slate-400'}">${labelType}</span>
                                </div>
                                ${isEmpty ? `<div title="Pertanyaan masih kosong"><span class="w-1.5 h-1.5 sm:w-2 sm:h-2 rounded-full bg-red-400 block shrink-0 ${isActive ? 'ring-2 ring-white' : ''}"></span></div>` : ''}
                            </div>
                        </button>
                    `;
                    container.insertAdjacentHTML('beforeend', btnHTML);
                });
            }

            function renderEditor() {
                if (!activeQuestionId) return;

                const q = questions.find(x => x.id === activeQuestionId);
                if (!q) return;

                const index = questions.findIndex(x => x.id === activeQuestionId);
                document.getElementById('editorTitle').innerText = `Editor Soal #${index + 1}`;

                // Set Value Form
                document.getElementById('inputTipeSoal').value = q.type;
                document.getElementById('inputBobotSoal').value = q.score;
                document.getElementById('inputTeksSoal').value = q.text;

                // Tampilkan atau Sembunyikan Area Pilihan Ganda
                const opsiContainer = document.getElementById('opsiJawabanContainer');
                if (q.type === 'PG') {
                    opsiContainer.classList.remove('hidden');
                    renderOpsi(q.options);
                } else {
                    opsiContainer.classList.add('hidden');
                }
            }

            // Render Opsi Radio Button untuk Pilihan Ganda
            function renderOpsi(options) {
                const listOpsi = document.getElementById('listOpsi');
                listOpsi.innerHTML = '';
                const abjad = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H'];

                options.forEach((opt, idx) => {
                    const isChecked = opt.isCorrect ? 'checked' : '';
                    const letter = abjad[idx] || '?';
                    const borderClass = opt.isCorrect ? 'border-blue-500 bg-blue-50/50 ring-1 ring-blue-400' : 'border-slate-200 bg-white';

                    const html = `
                        <div class="flex items-start sm:items-center gap-1.5 sm:gap-3 p-2 sm:p-2.5 rounded-xl border ${borderClass} focus-within:border-blue-500 focus-within:ring-2 focus-within:ring-blue-200 transition-all shadow-sm group">
                            <div class="pl-1 sm:pl-2 pt-1.5 sm:pt-0 flex items-center justify-center shrink-0">
                                <input type="radio" name="correct_answer_${activeQuestionId}" onchange="setKunciJawaban('${opt.id}')" class="w-4 h-4 sm:w-5 sm:h-5 text-blue-600 focus:ring-blue-500 cursor-pointer" ${isChecked} title="Jadikan Kunci Jawaban" />
                            </div>
                            <span class="font-black w-4 sm:w-6 text-center text-xs sm:text-sm pt-1.5 sm:pt-0 ${opt.isCorrect ? 'text-blue-700' : 'text-slate-400 group-focus-within:text-blue-600'}">${letter}.</span>
                            <textarea oninput="updateTeksOpsi('${opt.id}', this.value)" rows="1" class="flex-1 bg-transparent outline-none text-[11px] sm:text-sm font-medium text-slate-800 py-1 sm:py-1.5 resize-y min-h-[30px]" placeholder="Ketik pilihan jawaban...">${opt.text}</textarea>

                            <button type="button" onclick="hapusOpsi('${opt.id}')" class="text-slate-300 hover:text-red-500 hover:bg-red-50 p-1.5 sm:p-2 rounded-lg transition-colors shrink-0 pt-1.5 sm:pt-0" title="Hapus Pilihan">
                                <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                            </button>
                        </div>
                    `;
                    listOpsi.insertAdjacentHTML('beforeend', html);
                });
            }

            // 3. FUNGSI INTERAKSI EDITOR
            function pilihSoal(id) {
                activeQuestionId = String(id);
                renderApp();

                // Auto scroll ke editor di layar mobile
                if (window.innerWidth < 1024) {
                    const editor = document.getElementById('editorArea');
                    if(editor) editor.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            }

            function tambahSoal() {
                const newId = generateId();
                questions.push({
                    id: newId,
                    type: 'PG',
                    score: 10,
                    text: '',
                    options: [
                        { id: generateId(), text: '', isCorrect: true },
                        { id: generateId(), text: '', isCorrect: false },
                        { id: generateId(), text: '', isCorrect: false },
                        { id: generateId(), text: '', isCorrect: false }
                    ]
                });
                activeQuestionId = newId;
                renderApp();

                setTimeout(() => {
                    const container = document.getElementById('sidebarListContainer');
                    if(container) container.scrollTop = container.scrollHeight;

                    if (window.innerWidth < 1024) {
                        const editor = document.getElementById('editorArea');
                        if(editor) editor.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    }
                }, 50);
            }

            function hapusSoalAktif() {
                if (confirm("Apakah Anda yakin ingin menghapus soal ini?")) {
                    questions = questions.filter(q => String(q.id) !== activeQuestionId);
                    activeQuestionId = questions.length > 0 ? questions[questions.length - 1].id : null;
                    renderApp();
                }
            }

            function updateDataSoal() {
                const q = questions.find(x => String(x.id) === activeQuestionId);
                if (q) {
                    q.score = document.getElementById('inputBobotSoal').value;
                    q.text = document.getElementById('inputTeksSoal').value;
                    renderSidebar(); // Update warning icon di sidebar tanpa re-render editor
                }
            }

            function updateTipeSoal(tipeBaru) {
                const q = questions.find(x => String(x.id) === activeQuestionId);
                if (q) {
                    q.type = tipeBaru;
                    if (tipeBaru === 'PG' && (!q.options || q.options.length === 0)) {
                        q.options = [
                            { id: generateId(), text: '', isCorrect: true },
                            { id: generateId(), text: '', isCorrect: false },
                            { id: generateId(), text: '', isCorrect: false },
                            { id: generateId(), text: '', isCorrect: false }
                        ];
                    }
                    renderApp();
                }
            }

            function tambahOpsi() {
                const q = questions.find(x => String(x.id) === activeQuestionId);
                if (q && q.type === 'PG') {
                    if (q.options.length >= 8) {
                        alert("Batas maksimal adalah 8 pilihan jawaban (A sampai H).");
                        return;
                    }
                    q.options.push({ id: generateId(), text: '', isCorrect: false });
                    renderOpsi(q.options);
                }
            }

            function hapusOpsi(optId) {
                const q = questions.find(x => String(x.id) === activeQuestionId);
                if (q && q.options.length > 2) {
                    q.options = q.options.filter(opt => String(opt.id) !== String(optId));

                    // Pastikan selalu ada 1 jawaban yang benar (jika kunci jawaban terhapus)
                    if (!q.options.some(opt => opt.isCorrect)) {
                        q.options[0].isCorrect = true;
                    }
                    renderOpsi(q.options);
                } else {
                    alert("Soal Pilihan Ganda minimal harus memiliki 2 pilihan jawaban.");
                }
            }

            function updateTeksOpsi(optId, text) {
                const q = questions.find(x => String(x.id) === activeQuestionId);
                if (q) {
                    const opt = q.options.find(o => String(o.id) === String(optId));
                    if (opt) opt.text = text;
                }
            }

            function setKunciJawaban(optId) {
                const q = questions.find(x => String(x.id) === activeQuestionId);
                if (q) {
                    q.options.forEach(opt => {
                        opt.isCorrect = (String(opt.id) === String(optId));
                    });
                    renderOpsi(q.options);
                }
            }

            // 4. SUBMIT FORM KE LARAVEL
            function simpanSemuaSoal() {
                if (questions.length === 0) {
                    alert("Tidak ada soal untuk disimpan. Silakan buat soal terlebih dahulu.");
                    return;
                }

                let adaError = false;
                questions.forEach((q, i) => {
                    if (!q.text || q.text.trim() === '') {
                        alert(`Mohon isi Teks Pertanyaan pada Soal #${i + 1} sebelum menyimpan.`);
                        adaError = true;
                        pilihSoal(q.id);
                    }
                });

                if (adaError) return;

                document.getElementById('soal_data_input').value = JSON.stringify(questions);
                document.getElementById('formSimpanSoal').submit();
            }

            // 5. INISIALISASI SAAT HALAMAN DIMUAT
            document.addEventListener("DOMContentLoaded", () => {
                renderApp();
            });
        </script>
        <x-accessibility-widget />
    </body>
</html>
