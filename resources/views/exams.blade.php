<!DOCTYPE html>
<html lang="id" class="h-full">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Daftar Ujian | LMS Inklusi UMMI</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&display=swap" rel="stylesheet" />
    
    <style>
        html { scroll-behavior: smooth; }
        .custom-scrollbar::-webkit-scrollbar { width: 5px; height: 5px; }
        .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background-color: #cbd5e1; border-radius: 20px; }
        
        @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
        .safe-fade-in { animation: fadeIn 0.6s ease-out forwards; opacity: 0; }
        
        .wave-bar { transition: height 0.1s ease; }
    </style>
</head>
<body class="m-0 font-['Plus_Jakarta_Sans'] bg-[#f8fafc] text-slate-800 relative custom-scrollbar flex flex-col h-[100dvh] overflow-hidden">
    
    {{-- BACKGROUND DEKORASI --}}
    <div class="fixed top-0 left-0 w-full h-full overflow-hidden -z-10 pointer-events-none">
        <div class="absolute top-[-10%] right-[-5%] w-64 md:w-[400px] h-64 md:h-[400px] bg-blue-100/40 rounded-full blur-3xl opacity-50"></div>
        <div class="absolute bottom-[-10%] left-[-10%] w-64 md:w-[400px] h-64 md:h-[400px] bg-indigo-50/40 rounded-full blur-3xl opacity-50"></div>
    </div>

    {{-- NAVBAR & VOICE STATUS --}}
    <header class="bg-white/90 backdrop-blur-2xl border-b border-slate-200/60 sticky top-0 z-40 px-3 sm:px-4 md:px-8 py-2 sm:py-4 shadow-sm w-full shrink-0 cursor-pointer" id="voice-header" title="Ketuk layar 2x untuk memotong suara sistem">
        <div class="max-w-7xl mx-auto grid grid-cols-3 items-center relative h-10 sm:h-12 md:h-14">
            
            {{-- Kiri: Tombol 0 (Kembali ke Dashboard) --}}
            <div class="flex items-center gap-2 sm:gap-4 justify-start shrink-0 pointer-events-auto">
                <button data-menu="0" class="flex w-9 h-9 sm:w-11 sm:h-11 md:w-12 md:h-12 rounded-full bg-slate-100 hover:bg-blue-600 text-slate-500 hover:text-white items-center justify-center transition-all duration-300 shadow-sm group border border-slate-200 hover:border-blue-600 relative cursor-pointer active:scale-95">
                    <svg class="w-4 h-4 sm:w-5 sm:h-5 md:w-6 md:h-6 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    <span class="absolute -bottom-1 -right-1 bg-slate-800 text-white text-[8px] md:text-[9px] font-black px-1.5 py-0.5 rounded-md border border-white">0</span>
                </button>
                <div class="hidden sm:block text-left cursor-pointer group" data-menu="0">
                    <span class="block text-[8px] md:text-[9px] font-bold text-slate-400 uppercase tracking-widest pointer-events-none">Navigasi Suara</span>
                    <span class="block text-[10px] md:text-xs font-black text-slate-700 group-hover:text-blue-600 transition-colors pointer-events-none">0 - Kembali</span>
                </div>
            </div>

            {{-- Tengah: Judul --}}
            <div class="flex flex-col items-center justify-center justify-self-center w-full max-w-[150px] sm:max-w-none pointer-events-none">
                <h1 class="text-sm sm:text-lg md:text-xl font-extrabold text-slate-900 tracking-tight leading-none truncate w-full text-center pointer-events-auto">
                    Ujian Online
                </h1>
                <p class="text-[8px] sm:text-[10px] font-bold text-blue-600 uppercase tracking-widest mt-1 truncate pointer-events-auto">
                    Daftar Ujian Tersedia
                </p>
            </div>

            {{-- Kanan: Indikator Voice --}}
            <div class="flex items-center justify-end gap-1.5 sm:gap-3 justify-self-end shrink-0 pointer-events-auto">
                <div class="flex items-center gap-[2px] h-4 w-6 sm:w-10 justify-center" id="wave-container">
                    <div class="wave-bar w-[2px] bg-blue-500 rounded-full h-1 transition-all"></div>
                    <div class="wave-bar w-[2px] bg-blue-400 rounded-full h-1 transition-all"></div>
                    <div class="wave-bar w-[2px] bg-blue-600 rounded-full h-1 transition-all"></div>
                </div>
                <span id="status-desc" class="hidden sm:block text-[8px] md:text-[9px] font-black text-slate-400 uppercase tracking-widest w-12 sm:w-20 text-left pointer-events-none">MENYIAPKAN</span>
            </div>
        </div>
    </header>

    {{-- PAKAI overflow-y-scroll BIAR GAK GESER --}}
    <main class="flex-1 overflow-y-scroll custom-scrollbar relative">
        <div class="p-3 sm:p-6 lg:p-10 max-w-5xl mx-auto w-full space-y-6 sm:space-y-8 pb-32">
            
            {{-- Pesan Sukses Ujian Selesai --}}
            @if(session('success'))
                <div class="p-3 sm:p-4 bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-xl sm:rounded-2xl font-bold text-xs sm:text-sm safe-fade-in flex items-center gap-2 sm:gap-3 shadow-sm">
                    <div class="p-1 sm:p-1.5 bg-emerald-100 rounded-lg shrink-0">
                        <svg class="w-4 h-4 sm:w-5 sm:h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                    </div>
                    {{ session('success') }}
                </div>
            @endif

            {{-- TOMBOL 1: MASUKKAN TOKEN --}}
            <div data-menu="1" class="group bg-gradient-to-r from-blue-600 to-indigo-600 rounded-[1.5rem] sm:rounded-[2.5rem] p-5 md:p-8 text-white shadow-xl shadow-blue-200/50 cursor-pointer relative overflow-hidden transform hover:-translate-y-1 active:scale-95 transition-all safe-fade-in" style="animation-delay: 0.1s">
                <div class="relative z-10 flex flex-col md:flex-row items-center justify-between gap-5 md:gap-6 text-center md:text-left pointer-events-none">
                    <div class="flex flex-col md:flex-row items-center gap-4 md:gap-6 w-full md:w-auto">
                        <div class="w-14 h-14 sm:w-16 sm:h-16 rounded-2xl bg-white/20 border border-white/10 flex items-center justify-center backdrop-blur-md shrink-0">
                            <span class="text-2xl sm:text-3xl font-black tracking-tighter">1</span>
                        </div>
                        <div>
                            <h2 class="text-xl sm:text-2xl font-black tracking-tight">Punya Token Ujian?</h2>
                            <p class="text-blue-50 text-xs sm:text-sm font-medium mt-1">Gabung ujian dadakan atau kuis khusus menggunakan kode dari dosen.</p>
                        </div>
                    </div>
                    <button class="w-full md:w-auto bg-white text-blue-700 px-6 py-3.5 rounded-xl font-black text-xs uppercase tracking-widest group-hover:bg-blue-50 transition-all shadow-lg flex items-center justify-center md:justify-start gap-2 shrink-0 active:scale-95 pointer-events-none">
                        Masukkan Token
                    </button>
                </div>
                <div class="absolute right-0 top-0 w-64 h-64 bg-white/10 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2 pointer-events-none"></div>
            </div>

            <div class="space-y-4 sm:space-y-6">
                
                {{-- FILTER TABS --}}
                <div class="flex gap-2 border-b border-slate-200 mb-4 sm:mb-6 safe-fade-in overflow-x-auto custom-scrollbar pb-2" style="animation-delay: 0.2s" id="filterTabs">
                    <button onclick="filterExams('Semua', this)" class="tab-btn px-4 sm:px-6 py-2.5 sm:py-3 border-b-2 border-blue-600 text-blue-600 font-bold text-xs sm:text-sm whitespace-nowrap transition-colors">Semua</button>
                    <button onclick="filterExams('UTS', this)" class="tab-btn px-4 sm:px-6 py-2.5 sm:py-3 border-b-2 border-transparent text-slate-400 font-bold text-xs sm:text-sm hover:text-slate-800 transition-colors whitespace-nowrap">UTS</button>
                    <button onclick="filterExams('UAS', this)" class="tab-btn px-4 sm:px-6 py-2.5 sm:py-3 border-b-2 border-transparent text-slate-400 font-bold text-xs sm:text-sm hover:text-slate-800 transition-colors whitespace-nowrap">UAS</button>
                    <button onclick="filterExams('Kuis', this)" class="tab-btn px-4 sm:px-6 py-2.5 sm:py-3 border-b-2 border-transparent text-slate-400 font-bold text-xs sm:text-sm hover:text-slate-800 transition-colors whitespace-nowrap">Kuis</button>
                </div>

                {{-- GRID UJIAN --}}
                <div class="grid grid-cols-1 gap-4 sm:gap-5">
                    @forelse ($exams as $index => $exam)
                        @php
                            // Penomoran Voice dimulai dari 2, karena 1 untuk Token Ujian
                            $voiceId = $index + 2; 

                            $mahasiswaId = Auth::guard('mahasiswa')->id();
                            $userResult = \App\Models\ExamResult::where('exam_id', $exam->id)
                                            ->where('mahasiswa_id', $mahasiswaId)
                                            ->first();
                            
                            $sudahSelesai = $userResult && $userResult->status === 'selesai';

                            $isPublished = $exam->is_published ?? (isset($exam->status) ? $exam->status != 'draft' : true);
                            $inTimeWindow = (now() >= $exam->waktu_mulai && now() <= $exam->waktu_selesai);
                            
                            // Logika Kombinasi Status
                            if ($sudahSelesai) {
                                $isAktif = false;
                                $status_text = 'Sudah Dikerjakan';
                                $bgClass = 'bg-emerald-50'; $textClass = 'text-emerald-700'; $dateTextClass = 'text-emerald-600'; $borderClass = 'border-emerald-200';
                            } elseif (!$isPublished) {
                                $isAktif = false;
                                $status_text = 'Belum Terbit';
                                $bgClass = 'bg-slate-50'; $textClass = 'text-slate-400'; $dateTextClass = 'text-slate-400'; $borderClass = 'border-slate-200';
                            } elseif (!$inTimeWindow && now() > $exam->waktu_selesai) {
                                $isAktif = false;
                                $status_text = 'Waktu Habis';
                                $bgClass = 'bg-slate-100'; $textClass = 'text-slate-700'; $dateTextClass = 'text-slate-600'; $borderClass = 'border-slate-200';
                            } elseif (!$inTimeWindow && now() < $exam->waktu_mulai) {
                                $isAktif = false;
                                $status_text = 'Belum Dimulai';
                                $bgClass = 'bg-slate-50'; $textClass = 'text-slate-500'; $dateTextClass = 'text-slate-400'; $borderClass = 'border-slate-200';
                            } else {
                                $isAktif = true;
                                $status_text = 'Sedang Berlangsung';
                                $bgClass = 'bg-blue-50'; $textClass = 'text-blue-700'; $dateTextClass = 'text-blue-600'; $borderClass = 'border-blue-200';
                            }

                            // Card Styling
                            $cardClass = $isAktif 
                                ? "bg-white border-blue-200 shadow-lg shadow-blue-100/50 cursor-pointer hover:-translate-y-1 active:scale-[0.98]" 
                                : ($sudahSelesai ? "bg-emerald-50/40 border-emerald-200 shadow-sm cursor-pointer hover:-translate-y-1 active:scale-[0.98]" : "bg-slate-50 border-slate-200 shadow-sm cursor-not-allowed opacity-80");
                            
                            $badgeBg = $isAktif ? 'bg-slate-800 text-white' : ($sudahSelesai ? 'bg-emerald-600 text-white' : 'bg-slate-300 text-slate-500');
                        @endphp

                        <div data-menu="{{ $voiceId }}" class="exam-card group p-4 sm:p-5 rounded-[1.5rem] sm:rounded-[2rem] border-2 transition-all relative overflow-hidden flex flex-col sm:flex-row items-center sm:items-stretch gap-4 sm:gap-6 safe-fade-in {{ $cardClass }}" data-kategori="{{ $exam->kategori }}" style="animation-delay: 0.3s">
                            
                            @if($isAktif)
                                <div class="absolute top-0 right-0 bg-blue-500 text-white text-[8px] sm:text-[9px] font-black px-3 sm:px-4 py-1 rounded-bl-xl uppercase tracking-widest animate-pulse shadow-sm pointer-events-none">
                                    Sedang Berlangsung
                                </div>
                            @elseif($sudahSelesai)
                                <div class="absolute top-0 right-0 bg-emerald-500 text-white text-[8px] sm:text-[9px] font-black px-3 sm:px-4 py-1 rounded-bl-xl uppercase tracking-widest shadow-sm flex items-center gap-1 pointer-events-none">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                                    Selesai
                                </div>
                            @endif

                            {{-- Tanggal Box --}}
                            <div class="w-full sm:w-24 py-3 sm:py-0 h-auto sm:h-24 {{ $bgClass }} {{ $dateTextClass }} rounded-[1rem] sm:rounded-[1.5rem] flex flex-row sm:flex-col items-center justify-center gap-2 sm:gap-0 shrink-0 border {{ $borderClass }} relative mt-4 sm:mt-0 pointer-events-none">
                                <div class="absolute -top-3 -left-3 w-7 h-7 sm:w-8 sm:h-8 rounded-full {{ $badgeBg }} flex items-center justify-center font-black text-[10px] sm:text-xs border-[3px] border-white shadow-sm z-10 transition-colors">
                                    {{ $voiceId }}
                                </div>
                                <span class="text-[9px] sm:text-[10px] font-black bg-white/60 px-2 py-0.5 rounded-md shadow-sm sm:mb-1 sm:mt-2">{{ $exam->kategori }}</span>
                                <span class="hidden sm:block text-3xl font-black leading-none">{{ \Carbon\Carbon::parse($exam->waktu_mulai)->format('d') }}</span>
                                <span class="sm:hidden text-lg font-black leading-none">Tgl {{ \Carbon\Carbon::parse($exam->waktu_mulai)->format('d') }}</span>
                            </div>
                            
                            {{-- Info Box --}}
                            <div class="flex-1 w-full text-center sm:text-left pr-0 pointer-events-none">
                                <div class="flex flex-col sm:flex-row items-center gap-2 sm:gap-3 mb-2">
                                    <h4 class="text-base sm:text-xl font-black {{ $isAktif ? 'text-slate-900 group-hover:text-blue-600' : 'text-slate-600' }} transition-colors">
                                        {{ $exam->judul }}
                                    </h4>
                                    <span class="px-2.5 py-1 {{ $bgClass }} {{ $textClass }} text-[9px] sm:text-[10px] font-bold rounded-full uppercase tracking-wide border {{ $borderClass }}">
                                        {{ $status_text }}
                                    </span>
                                </div>
                                <div class="flex flex-col xl:flex-row xl:items-center gap-1.5 sm:gap-4 text-[11px] sm:text-sm {{ $isAktif ? 'text-slate-500' : 'text-slate-400' }} font-medium justify-center sm:justify-start">
                                    <span class="flex items-center gap-1.5 justify-center sm:justify-start">
                                        <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                                        {{ $exam->kelas->mataKuliah->nama ?? 'Kelas' }}
                                    </span>
                                    <span class="hidden xl:inline text-slate-300">•</span>
                                    <span class="flex items-center gap-1.5 justify-center sm:justify-start">
                                        <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                        {{ \Carbon\Carbon::parse($exam->waktu_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($exam->waktu_selesai)->format('H:i') }} WIB
                                    </span>
                                </div>
                            </div>
                            
                            {{-- Tombol Aksi Utama --}}
                            <div class="flex flex-wrap items-center justify-center sm:justify-end w-full sm:w-auto mt-2 sm:mt-0 pointer-events-none">
                                @if($sudahSelesai)
                                    <div class="flex flex-row sm:flex-col items-center justify-center gap-3 sm:gap-0 sm:items-end w-full sm:w-auto p-3 sm:p-0 bg-emerald-50 sm:bg-transparent rounded-xl sm:rounded-none">
                                        <span class="text-[9px] sm:text-[10px] font-black text-emerald-600 uppercase tracking-widest sm:mb-1">Nilai Anda:</span>
                                        <span class="px-4 py-1.5 sm:px-5 sm:py-2.5 bg-white text-emerald-600 font-black rounded-lg sm:rounded-xl text-base sm:text-lg border border-emerald-200 shadow-sm">
                                            {{ rtrim(rtrim(number_format($userResult->nilai, 2, '.', ''), '0'), '.') }}
                                        </span>
                                    </div>
                                @elseif($status_text == 'Belum Terbit' || $status_text == 'Belum Dimulai' || $status_text == 'Waktu Habis')
                                    <button disabled class="w-full sm:w-auto px-4 py-2.5 sm:py-3 bg-slate-100 text-slate-400 font-bold rounded-xl text-[10px] sm:text-xs uppercase tracking-widest flex items-center justify-center gap-2 cursor-not-allowed border border-slate-200">
                                        <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8V7a4 4 0 00-8 0v4h8z"></path></svg>
                                        {{ $status_text }}
                                    </button>
                                @elseif($status_text == 'Sedang Berlangsung')
                                    <a href="{{ route('exam.preparation', $exam->id) }}" class="w-full sm:w-auto px-5 py-3 sm:py-3 bg-blue-600 text-white font-black rounded-xl text-[10px] sm:text-xs uppercase tracking-widest hover:bg-blue-700 transition-all shadow-md shadow-blue-200 flex items-center justify-center gap-2 pointer-events-none">
                                        <span class="w-2 h-2 rounded-full bg-white animate-pulse"></span>
                                        Kerjakan
                                    </a>
                                @endif
                            </div>

                        </div>
                    @empty
                        <div class="text-center py-16 sm:py-20 bg-white rounded-[1.5rem] sm:rounded-[2rem] border border-slate-200 shadow-sm exam-empty">
                            <div class="w-16 h-16 sm:w-24 sm:h-24 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-4 sm:mb-5">
                                <svg class="w-8 h-8 sm:w-12 sm:h-12 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                            </div>
                            <h4 class="text-lg sm:text-xl font-black text-slate-700 px-4">Belum ada ujian yang tersedia.</h4>
                            <p class="text-xs sm:text-sm font-medium text-slate-500 mt-2 px-6">Daftar ujian akan muncul jika dosen sudah menerbitkannya.</p>
                        </div>
                    @endforelse

                    <div id="noDataFiltered" class="hidden text-center py-16 sm:py-20 bg-white rounded-[1.5rem] sm:rounded-[2rem] border border-slate-200 shadow-sm">
                        <div class="w-16 h-16 sm:w-20 sm:h-20 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 sm:w-10 sm:h-10 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        </div>
                        <h4 class="text-base sm:text-lg font-bold text-slate-600">Tidak ada ujian di kategori ini.</h4>
                    </div>

                </div>
            </div>
        </div>
    </main>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        AOS.init({ once: true, easing: "ease-out-cubic" });

        // --- Logika Filter Tabs ---
        function filterExams(kategori, btnElement) {
            const tabs = document.querySelectorAll('.tab-btn');
            tabs.forEach(tab => {
                tab.classList.remove('border-blue-600', 'text-blue-600');
                tab.classList.add('border-transparent', 'text-slate-400');
            });
            btnElement.classList.remove('border-transparent', 'text-slate-400');
            btnElement.classList.add('border-blue-600', 'text-blue-600');

            const cards = document.querySelectorAll('.exam-card');
            let countVisible = 0;

            cards.forEach(card => {
                if (kategori === 'Semua' || card.getAttribute('data-kategori') === kategori) {
                    card.style.display = 'flex';
                    countVisible++;
                } else {
                    card.style.display = 'none';
                }
            });

            const noDataMsg = document.getElementById('noDataFiltered');
            if (countVisible === 0 && cards.length > 0) {
                noDataMsg.classList.remove('hidden');
            } else {
                noDataMsg.classList.add('hidden');
            }
        }

        // ==================================================
        // LOGIKA VOICE ASSISTANT & SECURE DOUBLE CLICK
        // ==================================================
        
        const examList = [
            @foreach($exams as $index => $ex)
                @php 
                    $userRes = \App\Models\ExamResult::where('exam_id', $ex->id)->where('mahasiswa_id', Auth::guard('mahasiswa')->id())->first();
                    $isSelesaiJS = $userRes && $userRes->status === 'selesai';
                    $nilaiJS = $isSelesaiJS ? rtrim(rtrim(number_format($userRes->nilai, 2, '.', ''), '0'), '.') : '0';

                    $isPub = $ex->is_published ?? (isset($ex->status) ? $ex->status != 'draft' : true);
                    $isActiveVoice = $isPub && (now() >= $ex->waktu_mulai && now() <= $ex->waktu_selesai) && !$isSelesaiJS; 
                    $alasan = $isSelesaiJS ? "sudah berhasil Anda kerjakan" : "belum dibuka atau sudah berakhir";
                @endphp
                {
                    id: {{ $ex->id }},
                    judul: "{{ addslashes($ex->judul) }}",
                    kategori: "{{ addslashes($ex->kategori) }}",
                    mataKuliah: "{{ addslashes($ex->kelas->mataKuliah->nama ?? 'Kelas') }}",
                    voiceId: {{ $index + 2 }},
                    isAktif: {{ $isActiveVoice ? 'true' : 'false' }},
                    isSelesai: {{ $isSelesaiJS ? 'true' : 'false' }},
                    nilai: "{{ $nilaiJS }}",
                    alasan: "{{ $alasan }}"
                },
            @endforeach
        ];

        const statusDesc = document.getElementById("status-desc");
        const waveBars = document.querySelectorAll(".wave-bar");
        const synth = window.speechSynthesis;
        const SpeechRec = window.webkitSpeechRecognition || window.SpeechRecognition;
        
        let rec = null;
        let isRecActive = false;
        let isRedirecting = false;
        let isSpeaking = false;
        let waveInterval;

        if (SpeechRec) { 
            rec = new SpeechRec(); 
            rec.lang = "id-ID"; 
            rec.continuous = true; 
            rec.interimResults = true; 
        }

        function setWave(active) {
            if (active) {
                if (waveInterval) clearInterval(waveInterval);
                waveInterval = setInterval(() => {
                    if (waveBars.length > 0) {
                        waveBars.forEach((bar) => {
                            bar.style.height = `${Math.floor(Math.random() * 12) + 4}px`;
                        });
                    }
                }, 100);
            } else {
                clearInterval(waveInterval);
                if (waveBars.length > 0) {
                    waveBars.forEach((bar) => (bar.style.height = "4px"));
                }
            }
        }

        // ==========================================
        // LOGIKA SECURE DOUBLE CLICK 
        // ==========================================
        let clickTimer = null;
        const clickDelay = 300; 

        document.body.addEventListener('click', (e) => {
            const navElement = e.target.closest('[data-menu]');

            if (navElement) {
                e.preventDefault(); 
            }

            if (clickTimer !== null) {
                clearTimeout(clickTimer);
                clickTimer = null;

                if (!isRedirecting) {
                    synth.cancel(); 
                    isSpeaking = false;
                    setWave(false);
                    if (statusDesc) {
                        statusDesc.innerText = "MENDENGARKAN";
                        statusDesc.classList.replace("text-blue-600", "text-green-600");
                        statusDesc.classList.replace("text-slate-400", "text-green-600");
                    }
                    if (rec) { try { rec.abort(); } catch(err){} isRecActive = false; }
                    setTimeout(() => { mulaiMendengar(); }, 50);
                }
            } else {
                clickTimer = setTimeout(() => {
                    clickTimer = null;
                    if (navElement && !isRedirecting) {
                        const menuId = parseInt(navElement.getAttribute('data-menu'));
                        window.navigasiKe(menuId);
                    }
                }, clickDelay);
            }
        });

        function mulaiMendengar() {
            if (!rec || isRedirecting || isRecActive) return;
            try {
                rec.start();
                isRecActive = true;
            } catch (e) {
                console.error("Mic error:", e);
            }
        }

        function bicara(teks, callback = null) {
            if (isRedirecting) return;
            synth.cancel();
            
            window.currentBotText = teks;

            setTimeout(() => {
                const utter = new SpeechSynthesisUtterance(teks);
                utter.lang = "id-ID";
                const savedRate = localStorage.getItem("speechRate");
                utter.rate = savedRate ? parseFloat(savedRate) : 1.1;

                utter.onstart = () => { 
                    isSpeaking = true;
                    if (statusDesc) {
                        statusDesc.innerText = "SISTEM BERBICARA";
                        statusDesc.classList.replace("text-slate-400", "text-blue-600");
                        statusDesc.classList.replace("text-green-600", "text-blue-600");
                    }
                    setWave(true); 
                    mulaiMendengar(); 
                };
                
                utter.onend = () => { 
                    isSpeaking = false;
                    setWave(false);
                    if (!isRedirecting && statusDesc) {
                        statusDesc.innerText = "MENDENGARKAN";
                        statusDesc.classList.replace("text-slate-400", "text-green-600");
                        statusDesc.classList.replace("text-blue-600", "text-green-600");
                    }
                    if (callback) callback(); 
                };

                utter.onerror = () => {
                    isSpeaking = false;
                    setWave(false);
                    mulaiMendengar();
                };

                synth.speak(utter);
            }, 50);
        }

        function getPanduanUtama(isInitial = false) {
            let teks = "";
            
            if (isInitial && "{{ session('success') }}") {
                teks += "Terima kasih telah mengikuti ujian. Jawaban Anda telah berhasil disimpan. ";
            }

            let totalUjian = {{ count($exams) }};
            teks += "Halaman Daftar Ujian. ";
            
            if (totalUjian >= 0) {
                teks += "Sebutkan angka satu untuk memasukkan Token Ujian. ";
                
                let activeExams = examList.filter(e => e.isAktif);
                let finishedExams = examList.filter(e => e.isSelesai);

                if(activeExams.length > 0) {
                    teks += "Ujian yang bisa Anda ikuti: ";
                    activeExams.forEach(e => {
                        teks += `Sebutkan angka ${e.voiceId} untuk ujian ${e.judul}. `;
                    });
                } else if (totalUjian > 0) {
                    teks += "Saat ini tidak ada ujian yang sedang aktif untuk dikerjakan. ";
                }

                if(finishedExams.length > 0) {
                    teks += "Ujian yang sudah Anda kerjakan: ";
                    finishedExams.forEach(e => {
                        teks += `${e.judul}, nilai Anda ${e.nilai}. `;
                    });
                }
                
                teks += "Sebutkan nol untuk kembali ke dashboard utama.";
            }
            
            teks += " Katakan Ulang, untuk mendengarkan panduan.";
            return teks;
        }

        window.navigasiKe = function(nomor) {
            if (isRedirecting) return;

            let tujuan = "";
            let teks = "";

            if (nomor === 0) {
                tujuan = "{{ route('dashboard') }}"; 
                teks = "Nol. Kembali ke Dashboard utama.";
            } else if (nomor === 1) {
                tujuan = "{{ route('join.exam') }}";
                teks = "Satu. Membuka halaman untuk memasukkan token ujian.";
            } else if (nomor >= 2) {
                let examTujuan = examList.find(e => e.voiceId === nomor);
                
                if (examTujuan) {
                    if (examTujuan.isAktif) {
                        teks = `Membuka persiapan untuk ujian ${examTujuan.judul.replace(/[^A-Za-z0-9 \.,\?]/g, '')}.`;
                        const baseUrl = "{{ route('exam.preparation', 'EXAM_ID') }}";
                        tujuan = baseUrl.replace('EXAM_ID', examTujuan.id);
                    } else if (examTujuan.isSelesai) {
                        tujuan = "#";
                        teks = `Ujian ${examTujuan.judul.replace(/[^A-Za-z0-9 \.,\?]/g, '')} sudah Anda kerjakan dengan nilai ${examTujuan.nilai}.`;
                    } else {
                        tujuan = "#";
                        teks = `Maaf, ujian ${examTujuan.judul.replace(/[^A-Za-z0-9 \.,\?]/g, '')} ${examTujuan.alasan}.`;
                    }
                } else {
                    tujuan = "#";
                    teks = "Nomor ujian tidak ditemukan.";
                }
            }

            if (teks !== "") {
                if (tujuan !== "" && tujuan !== "#") {
                    isRedirecting = true;
                    synth.cancel();
                    if(rec) rec.abort();

                    if(statusDesc) {
                        statusDesc.innerText = "MENGALIHKAN...";
                        statusDesc.classList.replace("text-green-600", "text-slate-800");
                        statusDesc.classList.replace("text-blue-600", "text-slate-800");
                    }
                    
                    bicara(teks);
                    setTimeout(() => { window.location.href = tujuan; }, 500); // REDIRECT SATSET
                } else {
                    bicara(teks, () => {
                        try { rec.start(); } catch(e){}
                    });
                }
            }
        }

        if (rec) {
            rec.onresult = (event) => {
                if (isRedirecting) return;

                let hasil = "";
                for (let i = event.resultIndex; i < event.results.length; ++i) {
                    hasil += event.results[i][0].transcript;
                }
                hasil = hasil.replace(/[.,!?]/g, '').toLowerCase().trim();
                
                if (isSpeaking) {
                    let botText = (window.currentBotText || "").replace(/[.,!?]/g, '').toLowerCase().trim();
                    if (botText.includes(hasil)) {
                        return; 
                    }
                }

                const omonganBot = [
                    "terima kasih telah mengikuti", "halaman daftar ujian", 
                    "sebutkan angka satu", "token ujian", "ujian yang bisa anda ikuti", 
                    "sebutkan angka", "saat ini tidak ada", "ujian yang sudah anda kerjakan", 
                    "nilai anda", "kembali ke dashboard", "katakan ulang", "sudah anda kerjakan dengan nilai"
                ];

                if (omonganBot.some(kalimat => hasil.includes(kalimat))) {
                    return;
                }

                prosesJawaban(hasil);
            };

            rec.onend = () => { 
                isRecActive = false;
                if (!isRedirecting) mulaiMendengar(); 
            };
        }

        function prosesJawaban(hasil) {
            if (hasil.includes("ulang") || hasil.includes("panduan") || hasil.includes("bantuan")) {
                synth.cancel();
                if(rec) rec.abort();
                bicara(getPanduanUtama(false));
                return;
            }

            const angka = hasil.match(/\d+/);
            if (angka) {
                synth.cancel(); if(rec) rec.abort();
                window.navigasiKe(parseInt(angka[0]));
                return;
            }

            const kataAngka = {
                "nol": 0, "kosong": 0, "0": 0,
                "satu": 1, "sato": 1, "sate": 1, "1": 1,
                "dua": 2, "tua": 2, "jua": 2, "2": 2,
                "tiga": 3, "3": 3,
                "empat": 4, "4": 4,
                "lima": 5, "5": 5,
                "enam": 6, "6": 6,
                "tujuh": 7, "tuju": 7, "7": 7,
                "delapan": 8, "8": 8,
                "sembilan": 9, "9": 9,
                "sepuluh": 10, "10": 10
            };

            for (let kata in kataAngka) {
                if (hasil.includes(kata)) { 
                    synth.cancel(); if(rec) rec.abort();
                    window.navigasiKe(kataAngka[kata]); 
                    return;
                }
            }

            if (hasil.includes("kembali") || hasil.includes("dashboard")) { 
                synth.cancel(); if(rec) rec.abort(); window.navigasiKe(0); 
            } else if (hasil.includes("token")) { 
                synth.cancel(); if(rec) rec.abort(); window.navigasiKe(1); 
            }
        }

        window.addEventListener("load", () => {
            document.body.addEventListener("click", () => {}, { once: true });
            setTimeout(() => { 
                bicara(getPanduanUtama(true)); 
            }, 800);
        });
    </script>
</body>
</html>