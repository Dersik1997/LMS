<!DOCTYPE html>
@php
    $lastDiskusi = isset($session->discussions) ? $session->discussions->sortBy('created_at')->last() : null;
    $hasVoiceDiskusi = ($lastDiskusi && $lastDiskusi->voice) ? 'true' : 'false';
    $isLastDiskusiFromDosen = ($lastDiskusi && in_array($lastDiskusi->sender_type, ['dosen', 'App\Models\Dosen'])) ? 'true' : 'false';
    $lastWaveIdDiskusi = ($lastDiskusi && $lastDiskusi->voice) ? 'wave-' . $lastDiskusi->id : '';
    $lastMsgTextDiskusi = $lastDiskusi ? ($lastDiskusi->message ?: ($lastDiskusi->voice ? 'Pesan suara' : 'Mengirim gambar')) : 'Belum ada diskusi';
    
    $loggedInId = Auth::guard('mahasiswa')->id() ?? 0;
    $isLastDiskusiMe = ($lastDiskusi && in_array($lastDiskusi->sender_type, ['mahasiswa', 'App\Models\Mahasiswa']) && $lastDiskusi->sender_id == $loggedInId);
    $senderNameDiskusi = $isLastDiskusiMe ? 'Anda' : ($isLastDiskusiFromDosen == 'true' ? 'Dosen' : ($lastDiskusi->sender->nama ?? 'Mahasiswa Lain'));
@endphp
<html lang="id" class="h-full">
    <head>
        <meta charset="UTF-8" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>Detail Tugas - {{ $assignment->judul }} | LMS Inklusi UMMI</title>

        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet" />

        <script src="https://unpkg.com/wavesurfer.js@7"></script>

        <style>
            html { scrollbar-gutter: stable; }
            .scrollbar-hide::-webkit-scrollbar { display: none; }
            .scrollbar-hide { -ms-overflow-style: none; scrollbar-width: none; }
            .custom-scrollbar::-webkit-scrollbar { width: 5px; height: 5px; }
            .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
            .custom-scrollbar::-webkit-scrollbar-thumb { background-color: #cbd5e1; border-radius: 20px; }
            .custom-scrollbar::-webkit-scrollbar-thumb:hover { background-color: #94a3b8; }

            .fade-in { animation: fadeIn 0.4s ease-in-out forwards; }
            @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
            @keyframes popIn { 0% { opacity: 0; transform: translateY(15px) scale(0.95); } 100% { opacity: 1; transform: translateY(0) scale(1); } }
            
            .chat-bubble-new { animation: popIn 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards; }
            #chatContainer { scroll-behavior: smooth; }

            @keyframes wave-bounce { 0%, 100% { height: 4px; } 50% { height: 16px; } }
            .recording-wave .bar { width: 3px; background-color: #ef4444; border-radius: 99px; animation: wave-bounce 1s ease-in-out infinite; }
            .recording-wave .bar:nth-child(1) { animation-delay: 0s; height: 8px; }
            .recording-wave .bar:nth-child(2) { animation-delay: 0.2s; height: 12px; }
            .recording-wave .bar:nth-child(3) { animation-delay: 0.4s; height: 16px; }
            .recording-wave .bar:nth-child(4) { animation-delay: 0.1s; height: 10px; }
            .recording-wave .bar:nth-child(5) { animation-delay: 0.3s; height: 14px; }
            .recording-wave .bar:nth-child(6) { animation-delay: 0.5s; height: 8px; }

            @keyframes pulse-border { 0% { border-color: #3b82f6; box-shadow: 0 0 0 0 rgba(59, 130, 246, 0.4); } 70% { border-color: #60a5fa; box-shadow: 0 0 0 6px rgba(59, 130, 246, 0); } 100% { border-color: #3b82f6; box-shadow: 0 0 0 0 rgba(59, 130, 246, 0); } }
            .dictating-active { animation: pulse-border 1.5s infinite; background-color: #eff6ff !important; }
            .confirming-active { background-color: #fef3c7 !important; border-color: #f59e0b !important; }
            .wave-bar { transition: height 0.1s ease; }
        </style>
    </head>
    <body class="m-0 font-['Plus_Jakarta_Sans'] bg-[#f8fafc] min-h-[100dvh] flex flex-col border-box overflow-x-hidden text-slate-800">
        
        <div class="fixed top-0 left-0 w-full h-full overflow-hidden -z-10 pointer-events-none">
            <div class="absolute top-[-10%] right-[-5%] w-64 md:w-[400px] h-64 md:h-[400px] bg-blue-100/40 rounded-full blur-3xl opacity-50"></div>
            <div class="absolute bottom-[-10%] left-[-10%] w-64 md:w-[400px] h-64 md:h-[400px] bg-indigo-50/40 rounded-full blur-3xl opacity-50"></div>
        </div>

        <main class="flex-1 flex flex-col h-full overflow-y-scroll custom-scrollbar relative">
            
            {{-- NAVBAR --}}
            <div class="bg-white/90 backdrop-blur-2xl border-b border-slate-200/60 sticky top-0 z-40 px-3 sm:px-4 md:px-8 py-3 sm:py-4 shadow-sm transition-all w-full cursor-pointer" id="voice-header" title="Ketuk layar 2x untuk potong suara bot">
                <div class="max-w-7xl mx-auto flex items-center justify-between relative h-10 sm:h-12 md:h-14 pointer-events-none">
                    
                    <div class="flex items-center gap-2 sm:gap-4 relative z-10 w-auto justify-start pointer-events-auto">
                        <button data-menu="0" class="w-9 h-9 sm:w-11 sm:h-11 md:w-12 md:h-12 rounded-full bg-slate-100 hover:bg-blue-600 text-slate-500 hover:text-white flex items-center justify-center transition-all duration-300 shadow-sm group border border-slate-200 hover:border-blue-600 relative cursor-pointer active:scale-95 shrink-0">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5 md:w-6 md:h-6 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path>
                            </svg>
                            <span class="absolute -bottom-1 -right-1 bg-slate-800 text-white text-[8px] sm:text-[9px] font-black px-1.5 py-0.5 rounded-md border border-white shadow-sm">0</span>
                        </button>

                        <div class="hidden sm:block text-left cursor-pointer group shrink-0" data-menu="0">
                            <span class="block text-[8px] sm:text-[9px] font-bold text-slate-400 uppercase tracking-widest pointer-events-none">Navigasi Suara</span>
                            <span class="block text-[10px] sm:text-xs font-black text-slate-700 group-hover:text-blue-600 transition-colors pointer-events-none">0 - Kembali</span>
                        </div>
                    </div>

                    <div class="absolute left-1/2 transform -translate-x-1/2 text-center w-[50%] sm:w-[60%] md:w-[50%] z-0 pointer-events-none">
                        <h1 class="text-sm sm:text-base md:text-xl font-extrabold text-slate-900 tracking-tight leading-none truncate pointer-events-auto">{{ $assignment->judul }}</h1>
                        <p class="text-[8px] sm:text-[9px] md:text-[10px] font-bold text-blue-600 uppercase tracking-widest mt-1 truncate pointer-events-auto">{{ $kelas->mataKuliah->nama }}</p>
                    </div>

                    <div class="flex items-center justify-end gap-1.5 sm:gap-3 pl-2 sm:pl-4 relative z-10 shrink-0 pointer-events-auto">
                        <div class="flex items-center gap-[2px] h-4 w-6 sm:w-10 justify-center" id="wave-container">
                            <div class="wave-bar w-[2px] bg-blue-500 rounded-full h-1 transition-all"></div>
                            <div class="wave-bar w-[2px] bg-blue-400 rounded-full h-1 transition-all"></div>
                            <div class="wave-bar w-[2px] bg-blue-600 rounded-full h-1 transition-all"></div>
                        </div>
                        <span id="status-desc" class="hidden md:block text-[8px] sm:text-[9px] font-black text-slate-400 uppercase tracking-widest text-left w-12 sm:w-20 pointer-events-none">MENYIAPKAN</span>
                    </div>
                </div>
            </div>

            <div class="max-w-6xl mx-auto w-full px-3 sm:px-4 md:px-8 py-4 sm:py-6 md:py-8 space-y-4 sm:space-y-6 md:space-y-8 pb-20">
                @php
                    $isSubmittedStatus = isset($submission) && ($submission->file_path || $submission->text_submission || $submission->voice_submission);
                @endphp

                @if(session('success'))
                    <div class="bg-emerald-100 border border-emerald-200 text-emerald-700 px-3 sm:px-4 py-2 sm:py-3 rounded-lg sm:rounded-xl relative flex items-center gap-2 sm:gap-3 fade-in" role="alert">
                        <span class="w-1.5 h-1.5 sm:w-2 sm:h-2 bg-emerald-500 rounded-full animate-pulse shrink-0"></span>
                        <span class="block sm:inline font-bold text-xs sm:text-sm">{{ session('success') }}</span>
                    </div>
                @endif
                @if(session('error'))
                    <div class="bg-red-100 border border-red-200 text-red-700 px-3 sm:px-4 py-2 sm:py-3 rounded-lg sm:rounded-xl relative flex items-center gap-2 sm:gap-3 fade-in" role="alert">
                        <span class="w-1.5 h-1.5 sm:w-2 sm:h-2 bg-red-500 rounded-full animate-pulse shrink-0"></span>
                        <span class="block sm:inline font-bold text-xs sm:text-sm">{{ session('error') }}</span>
                    </div>
                @endif

                <div class="grid grid-cols-1 md:grid-cols-3 gap-3 sm:gap-4 lg:gap-6">
                    <div class="bg-orange-50 border border-orange-200 p-4 sm:p-5 lg:p-6 rounded-[1.5rem] lg:rounded-[2rem] flex items-center gap-3 sm:gap-4 shadow-sm" data-aos="fade-up" data-aos-duration="600">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-xl sm:rounded-2xl bg-orange-100 text-orange-600 flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <div>
                            <h3 class="text-xs sm:text-sm font-black text-orange-700 uppercase tracking-wide">Batas Waktu</h3>
                            <p class="text-sm sm:text-base lg:text-lg font-bold text-slate-800 leading-tight mt-0.5">{{ \Carbon\Carbon::parse($assignment->deadline)->translatedFormat('d M Y, H:i') }} WIB</p>
                        </div>
                    </div>

                    <div id="status-card" class="bg-white border {{ $isSubmittedStatus ? 'border-emerald-300 bg-emerald-50/40 shadow-emerald-100' : 'border-slate-200 shadow-sm' }} p-4 sm:p-5 lg:p-6 rounded-[1.5rem] lg:rounded-[2rem] flex items-center gap-3 sm:gap-4 transition-all duration-300" data-aos="fade-up" data-aos-duration="600" data-aos-delay="100">
                        <div id="status-icon" class="w-10 h-10 sm:w-12 sm:h-12 rounded-xl sm:rounded-2xl flex items-center justify-center transition-all shrink-0 {{ $isSubmittedStatus ? 'bg-emerald-500 text-white shadow-md' : 'bg-slate-100 text-slate-500' }}">
                            @if($isSubmittedStatus)
                                <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                            @else
                                <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                            @endif
                        </div>
                        <div>
                            <h3 id="status-title" class="text-[10px] sm:text-xs lg:text-sm font-black uppercase tracking-wide transition-all {{ $isSubmittedStatus ? 'text-emerald-700' : 'text-slate-400' }}">Status</h3>
                            <p id="status-text" class="text-sm sm:text-base lg:text-lg font-bold transition-all mt-0.5 leading-tight {{ $isSubmittedStatus ? 'text-emerald-600' : 'text-slate-800' }}">{{ $isSubmittedStatus ? 'Sudah Dikumpulkan' : 'Belum Dikirim' }}</p>
                        </div>
                    </div>

                    <div class="bg-white border border-slate-200 p-4 sm:p-5 lg:p-6 rounded-[1.5rem] lg:rounded-[2rem] flex items-center gap-3 sm:gap-4 shadow-sm" data-aos="fade-up" data-aos-duration="600" data-aos-delay="200">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-xl sm:rounded-2xl bg-blue-50 text-blue-600 flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <div>
                            <h3 class="text-[10px] sm:text-xs lg:text-sm font-black text-slate-400 uppercase tracking-wide">Nilai Dosen</h3>
                            <p class="text-sm sm:text-base lg:text-lg font-bold text-slate-800 mt-0.5 leading-tight">{{ isset($submission) && $submission->nilai !== null ? $submission->nilai : '--' }} / {{ $assignment->poin }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-[1.5rem] sm:rounded-[2rem] p-5 sm:p-6 lg:p-8 border border-slate-200 shadow-sm relative overflow-hidden" data-aos="fade-up" data-aos-duration="600">
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 sm:gap-4 mb-4 sm:mb-6">
                        <h3 class="text-base sm:text-lg font-black text-slate-900 uppercase tracking-tight">Instruksi Tugas</h3>
                        <button data-menu="1" class="w-fit flex items-center gap-2 bg-blue-50 text-blue-600 px-2.5 sm:px-3 py-1.5 rounded-lg text-[8px] sm:text-[9px] font-bold uppercase tracking-widest hover:bg-blue-100 transition-all cursor-pointer active:scale-95 group border border-blue-100">
                            <span class="bg-blue-500 text-white w-4 h-4 rounded-md flex items-center justify-center font-black group-hover:bg-blue-600 pointer-events-none">1</span> <span class="pointer-events-none">Dengar Soal</span>
                        </button>
                    </div>
                    
                    <div id="soal-text" class="prose prose-slate text-xs sm:text-sm text-slate-600 leading-relaxed font-medium max-w-none mb-6 sm:mb-8 whitespace-pre-wrap">{{ $assignment->deskripsi }}</div>

                    @if($assignment->file_path)
                    <div class="mb-6 sm:mb-8 p-3 sm:p-4 bg-slate-50 border border-slate-200 rounded-xl sm:rounded-2xl">
                        <p class="text-[9px] sm:text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1.5 sm:mb-2 block">Lampiran Dosen</p>
                        <a href="{{ asset('storage/'.$assignment->file_path) }}" target="_blank" class="flex flex-col sm:flex-row sm:items-center gap-2 sm:gap-3 group">
                            <div class="w-10 h-10 sm:w-12 sm:h-12 bg-blue-100 text-blue-600 rounded-lg sm:rounded-xl flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform">
                                <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4-4m0 0l-4-4m4 4V4"></path></svg>
                            </div>
                            <span class="text-xs sm:text-sm font-bold text-blue-600 group-hover:text-blue-800 underline-offset-2 group-hover:underline">Download Dokumen Tugas</span>
                        </a>
                    </div>
                    @endif

                    <div id="submission-success" class="{{ $isSubmittedStatus ? 'block' : 'hidden' }} fade-in mt-6 sm:mt-8 border-2 border-emerald-400 bg-emerald-50/50 rounded-[1.5rem] sm:rounded-[2rem] p-4 sm:p-6 lg:p-8 relative overflow-hidden shadow-sm">
                        <div class="absolute top-0 right-0 bg-emerald-500 text-white px-3 sm:px-4 py-1 sm:py-1.5 rounded-bl-lg sm:rounded-bl-xl font-bold text-[8px] sm:text-[10px] uppercase tracking-widest shadow-sm">
                            Berhasil Diserahkan
                        </div>

                        <div class="flex items-center gap-2 sm:gap-3 mb-4 sm:mb-6 border-b border-emerald-200/60 pb-3 sm:pb-4">
                            <div class="w-8 h-8 sm:w-10 sm:h-10 bg-emerald-100 text-emerald-600 rounded-full flex items-center justify-center shrink-0">
                                <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <div>
                                <h3 class="text-base sm:text-lg font-black text-emerald-900 tracking-tight">Jawaban Anda</h3>
                                <p class="text-[8px] sm:text-[10px] font-bold text-emerald-600 uppercase tracking-widest mt-0.5">Tugas ini telah berhasil dikumpulkan</p>
                            </div>
                        </div>

                        <div class="space-y-4">
                            @if(isset($submission) && $submission->file_path)
                            <div>
                                <label class="text-[9px] sm:text-[10px] font-bold text-emerald-700 uppercase tracking-widest mb-1 sm:mb-2 block flex items-center gap-1 sm:gap-2">File Lampiran Jawaban</label>
                                <div class="flex items-center gap-3 sm:gap-4 p-3 sm:p-4 rounded-xl sm:rounded-2xl border border-emerald-200 bg-white shadow-sm group">
                                    <div class="w-10 h-12 sm:w-12 sm:h-14 bg-red-50 text-red-500 rounded-lg sm:rounded-xl flex items-center justify-center shrink-0 border border-red-100"><span class="text-[8px] sm:text-[10px] font-black uppercase">FILE</span></div>
                                    <div class="flex-1"><h4 class="text-xs sm:text-sm font-bold text-slate-800 line-clamp-1">Lampiran Jawaban Tersimpan</h4></div>
                                </div>
                            </div>
                            @endif

                            @if(isset($submission) && $submission->text_submission)
                            <div>
                                <label class="text-[9px] sm:text-[10px] font-bold text-emerald-700 uppercase tracking-widest mb-1 sm:mb-2 block">Teks Jawaban Anda</label>
                                <div class="w-full bg-white border border-emerald-200 rounded-xl sm:rounded-2xl p-4 sm:p-5 text-xs sm:text-sm font-medium text-slate-700 whitespace-pre-wrap leading-relaxed">{{ $submission->text_submission }}</div>
                            </div>
                            @endif

                            @if(isset($submission) && $submission->voice_submission)
                            <div>
                                <label class="text-[9px] sm:text-[10px] font-bold text-emerald-700 uppercase tracking-widest mb-1 sm:mb-2 block">Voice Note Jawaban</label>
                                <div class="w-full bg-white border border-emerald-200 rounded-xl sm:rounded-2xl p-3 sm:p-4 flex items-center">
                                    <audio controls class="w-full h-8 sm:h-10"><source src="{{ asset('storage/'.$submission->voice_submission) }}"></audio>
                                </div>
                            </div>
                            @endif
                        </div>

                        @if(now() <= $assignment->deadline)
                        <div class="mt-6 sm:mt-8 pt-4 sm:pt-6 border-t border-emerald-200/60 flex justify-end">
                            <button data-menu="5" class="w-full sm:w-auto bg-white border-2 border-emerald-300 text-emerald-700 font-bold text-[10px] sm:text-xs uppercase tracking-widest hover:bg-emerald-100 transition-all flex justify-center sm:justify-start items-center gap-2 px-4 sm:px-6 py-2.5 sm:py-3 rounded-lg sm:rounded-xl cursor-pointer active:scale-95 group shadow-sm">
                                <span class="bg-emerald-500 text-white w-4 h-4 sm:w-5 sm:h-5 rounded flex items-center justify-center text-[9px] sm:text-[10px] shadow-sm pointer-events-none">5</span> <span class="pointer-events-none">Kirim Ulang Jawaban</span>
                            </button>
                        </div>
                        @endif
                    </div>

                    <div id="submission-form" class="{{ $isSubmittedStatus ? 'hidden' : 'block' }}">
                        <h3 class="text-base sm:text-lg font-black text-slate-900 uppercase tracking-tight mb-4 sm:mb-6 mt-6 sm:mt-8 border-t border-slate-100 pt-6 sm:pt-8">Form Pengumpulan</h3>
                        @if(now() <= $assignment->deadline)
                        <form action="{{ route('mahasiswa.assignment.store', ['kelas' => $kelas->id, 'assignment' => $assignment->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 sm:gap-6 mb-4 sm:mb-6">
                                
                                <div>
                                    <label class="text-[9px] sm:text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1.5 sm:mb-2 flex items-center gap-1.5 sm:gap-2">
                                        <span class="bg-slate-200 text-slate-600 w-4 h-4 rounded flex items-center justify-center">2</span> Upload File
                                    </label>
                                    <div onclick="document.getElementById('file-upload').click()" class="border-2 border-dashed border-slate-300 rounded-xl sm:rounded-2xl p-4 sm:p-6 text-center cursor-pointer hover:border-blue-500 hover:bg-blue-50 transition-all group bg-slate-50 active:scale-[0.99] h-24 sm:h-32 flex flex-col justify-center">
                                        <input type="file" name="file" id="file-upload" class="hidden" onchange="handleFileSelect(this)" />
                                        <div class="w-8 h-8 sm:w-10 sm:h-10 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center mx-auto mb-1 sm:mb-2 group-hover:scale-110 transition-transform shadow-sm pointer-events-none">
                                            <svg class="w-4 h-4 sm:w-5 sm:h-5 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
                                        </div>
                                        <span id="file-label" class="text-[10px] sm:text-xs font-bold text-slate-700 group-hover:text-blue-700 block line-clamp-1 pointer-events-none">Klik Pilih File</span>
                                    </div>
                                </div>

                                <div class="flex flex-col h-full">
                                    <label class="text-[9px] sm:text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1.5 sm:mb-2 flex items-center justify-between">
                                        <span class="flex items-center gap-1.5 sm:gap-2"><span class="bg-slate-200 text-slate-600 w-4 h-4 rounded flex items-center justify-center">3</span> Ketik Jawaban</span>
                                        <span id="typing-indicator" class="hidden text-red-500 animate-pulse text-[8px] sm:text-[9px]">Mendengarkan...</span>
                                    </label>
                                    <textarea name="text_submission" id="text-submission" class="flex-1 w-full bg-slate-50 border border-slate-300 rounded-xl sm:rounded-2xl p-3 sm:p-4 text-xs sm:text-sm font-medium text-slate-700 placeholder-slate-400 focus:outline-none focus:border-blue-400 focus:bg-white transition-all resize-none min-h-[6rem] sm:min-h-[8rem]" placeholder="Sebut 3 mendikte..."></textarea>
                                </div>

                                <div class="flex flex-col h-full">
                                    <label class="text-[9px] sm:text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1.5 sm:mb-2 flex items-center justify-between">
                                        <span class="flex items-center gap-1.5 sm:gap-2"><span class="bg-slate-200 text-slate-600 w-4 h-4 rounded flex items-center justify-center">4</span> Rekam Suara</span>
                                        <span id="assignment-record-timer" class="hidden text-red-500 font-mono text-[8px] sm:text-[9px] animate-pulse">00:00</span>
                                    </label>
                                    <div class="flex-1 w-full bg-slate-50 border border-slate-300 rounded-xl sm:rounded-2xl p-3 sm:p-4 flex flex-col items-center justify-center gap-1.5 sm:gap-2 transition-all min-h-[6rem] sm:min-h-[8rem]" id="assignmentVoiceBox">
                                        <input type="file" name="voice_submission" id="assignmentVoiceInput" accept="audio/webm" class="hidden">
                                        <button type="button" id="btnAssignmentRecord" class="w-10 h-10 sm:w-12 sm:h-12 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center hover:bg-blue-200 hover:scale-110 transition-all shadow-md shrink-0">
                                            <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18.75a6 6 0 006-6v-1.5m-6 7.5a6 6 0 01-6-6v-1.5m6 7.5v3.75m-3.75 0h7.5M12 15.75a3 3 0 01-3-3V4.5a3 3 0 116 0v8.25a3 3 0 01-3 3z"></path></svg>
                                        </button>
                                        <span id="assignmentVoiceLabel" class="text-[10px] sm:text-xs font-bold text-slate-500 text-center">Sebut 4 merekam</span>
                                        <button type="button" id="btnCancelAssignmentVoice" class="hidden text-[9px] sm:text-[10px] font-bold text-red-500 hover:underline mt-0.5 sm:mt-1">Batal Rekam</button>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="flex items-center gap-3 w-full mt-4 sm:mt-6">
                                <button type="submit" id="btnSubmitForm" class="w-1/2 bg-blue-600 text-white rounded-lg sm:rounded-xl py-3 sm:py-4 font-black text-[10px] sm:text-xs uppercase tracking-[0.1em] sm:tracking-[0.2em] shadow-lg shadow-blue-200 hover:bg-blue-700 transition-all hover:scale-[1.01] active:scale-95 flex items-center justify-center gap-2 sm:gap-3 relative overflow-hidden">
                                    <svg class="w-4 h-4 sm:w-5 sm:h-5 group-hover:-translate-y-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                                    <span>Kirim Tugas</span>
                                </button>
                                <button type="button" id="btnCancelForm" onclick="window.batalSemuaTugas()" class="w-1/2 bg-red-50 text-red-600 rounded-lg sm:rounded-xl py-3 sm:py-4 font-black text-[10px] sm:text-xs uppercase tracking-widest hover:bg-red-600 hover:text-white transition-all active:scale-95 flex items-center justify-center border border-red-200 group">
                                    <svg class="w-4 h-4 sm:w-5 sm:h-5 mr-2 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"></path></svg>
                                    Batal
                                </button>
                            </div>

                        </form>
                        @else
                            <div class="bg-red-50 text-red-600 p-3 sm:p-4 rounded-xl border border-red-200 text-center text-xs sm:text-sm font-bold shadow-sm">Waktu pengumpulan sudah habis.</div>
                        @endif
                    </div>
                </div>

                <div data-aos="fade-up" data-aos-duration="600" data-aos-delay="200" class="bg-white rounded-[1.5rem] sm:rounded-[2rem] md:rounded-[2.5rem] border border-slate-200 shadow-sm overflow-hidden flex flex-col h-[500px] sm:h-[600px] mt-6 sm:mt-8">
                    <div class="p-4 sm:p-5 md:p-6 md:px-8 border-b border-slate-100 flex flex-col sm:flex-row justify-between sm:items-center gap-2 sm:gap-0 bg-slate-50/50 z-10">
                        <div>
                            <h3 class="text-sm sm:text-base md:text-lg font-black text-slate-900 uppercase tracking-tight">Diskusi Tugas Privat</h3>
                            <p class="text-[8px] sm:text-[9px] md:text-[10px] font-bold text-slate-400 uppercase tracking-widest mt-0.5">Tanya jawab terkait tugas ini dengan Dosen</p>
                        </div>
                        <button data-menu="9" class="w-fit text-[8px] sm:text-[9px] font-bold bg-blue-100 text-blue-700 px-2.5 sm:px-3 py-1.5 rounded-full flex items-center gap-1.5 cursor-pointer hover:bg-blue-200 transition-colors">
                            <span class="bg-blue-500 text-white w-4 h-4 rounded-md flex items-center justify-center font-black pointer-events-none">9</span> <span class="pointer-events-none">Baca Chat</span>
                        </button>
                    </div>

                    <div id="chatContainer" class="flex-1 p-3 sm:p-4 md:p-6 flex flex-col gap-4 sm:gap-6 overflow-y-auto custom-scrollbar bg-slate-50/30">
                        @php
                            $pesanTugas = (isset($submission) && method_exists($submission, 'messages')) ? $submission->messages()->orderBy('created_at', 'asc')->get() : collect();
                        @endphp
                        
                        @forelse($pesanTugas as $diskusi)
                            @php
                                $isMe = ($diskusi->from === 'mahasiswa' || strtolower($diskusi->sender_type ?? '') === 'mahasiswa');
                                $isDosen = ($diskusi->from === 'dosen' || strtolower($diskusi->sender_type ?? '') === 'dosen');
                                
                                $namaDosen = $kelas->dosen->nama ?? 'Dosen';
                                $fotoDosenRaw = $kelas->dosen->foto ?? null; 
                                
                                $namaMahasiswa = Auth::guard('mahasiswa')->user()->nama ?? 'Anda';
                                $fotoMahasiswaRaw = Auth::guard('mahasiswa')->user()->foto_profil ?? Auth::guard('mahasiswa')->user()->foto ?? null; 

                                $labelTeks = $isMe ? 'Anda' : $namaDosen;
                                
                                $fallbackMhs = 'https://ui-avatars.com/api/?name='.urlencode($namaMahasiswa).'&background=2563eb&color=fff';
                                $fallbackDsn = 'https://ui-avatars.com/api/?name='.urlencode($namaDosen).'&background=f59e0b&color=fff';
                                
                                if ($isMe) {
                                    $fotoProfil = $fotoMahasiswaRaw ? asset('storage/' . $fotoMahasiswaRaw) : $fallbackMhs;
                                    $fotoError = $fallbackMhs;
                                } else {
                                    $fotoProfil = $fotoDosenRaw ? asset('storage/' . $fotoDosenRaw) : $fallbackDsn;
                                    $fotoError = $fallbackDsn;
                                }
                                
                                $bgChat = $isMe ? 'bg-blue-600 text-white rounded-tr-none border-blue-700' : 'bg-white text-slate-800 rounded-tl-none border-slate-200';
                            @endphp
                            
                            <div id="msg-{{ $diskusi->id }}" class="flex {{ $isMe ? 'justify-end' : 'justify-start' }} fade-in chat-bubble">
                                <div class="flex gap-2 md:gap-3 items-end max-w-[90%] sm:max-w-[85%] md:max-w-[70%] {{ $isMe ? 'flex-row-reverse' : '' }}">
                                    <img src="{{ $fotoProfil }}" onerror="this.src='{{ $fotoError }}'" class="w-6 h-6 sm:w-8 h-8 rounded-full shrink-0 shadow-sm object-cover border border-slate-100" />
                                    
                                    <div class="flex flex-col {{ $isMe ? 'items-end' : 'items-start' }} w-full min-w-0">
                                        <p class="text-[8px] sm:text-[9px] md:text-[10px] font-bold mb-1 px-1 {{ $isDosen ? 'text-orange-500' : 'text-slate-400' }} sender-name truncate max-w-full">
                                            {{ $labelTeks }}
                                        </p>
                                        
                                        <div class="p-2.5 sm:p-3 md:p-4 rounded-xl sm:rounded-2xl shadow-sm border text-[11px] sm:text-xs md:text-[13px] w-fit max-w-full {{ $bgChat }}">
                                            @if($diskusi->body)
                                                <p class="whitespace-pre-wrap break-words leading-relaxed message-text">{{ $diskusi->body }}</p>
                                            @endif
                                            @if(isset($diskusi->image) && $diskusi->image)
                                                <img src="{{ asset('storage/'.$diskusi->image) }}" onerror="this.style.display='none'" class="mt-1.5 sm:mt-2 rounded-lg sm:rounded-xl max-w-full md:max-w-xs border {{ $isMe ? 'border-white/20' : 'border-slate-200' }}">
                                            @endif
                                            @if(isset($diskusi->voice) && $diskusi->voice)
                                                <div class="mt-1.5 sm:mt-2 flex items-center gap-2 {{ $isMe ? 'bg-white/20 border-white/30' : 'bg-slate-50 border-slate-200' }} p-1.5 rounded-xl border w-[160px] sm:w-[180px] md:w-[200px]">
                                                    <button type="button" onclick="togglePlay('wave-{{ $diskusi->id }}')" id="btn-wave-{{ $diskusi->id }}" class="w-5 h-5 sm:w-6 sm:h-6 shrink-0 flex items-center justify-center rounded-full {{ $isMe ? 'bg-white text-blue-600' : 'bg-blue-600 text-white' }} shadow text-[8px] sm:text-[9px]">▶</button>
                                                    <div id="wave-{{ $diskusi->id }}" class="flex-1 h-3 sm:h-4" data-audio="{{ asset('storage/' . $diskusi->voice) }}"></div>
                                                </div>
                                            @endif
                                        </div>
                                        <p class="text-[7px] sm:text-[8px] md:text-[9px] mt-1 sm:mt-1.5 px-1 font-bold text-slate-400">{{ $diskusi->created_at->format('H:i') }}</p>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div id="emptyChat" class="h-full flex flex-col items-center justify-center text-center opacity-70">
                                <div class="w-12 h-12 sm:w-14 sm:h-14 bg-blue-50 text-blue-400 rounded-full flex items-center justify-center mb-3 border border-blue-100">
                                    <svg class="w-6 h-6 sm:w-7 sm:h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                                </div>
                                <p class="text-xs sm:text-sm text-slate-600 font-bold">Belum ada diskusi.</p>
                                <p class="text-[8px] sm:text-[10px] text-slate-400 uppercase tracking-widest mt-1">Sebut 6 untuk mendikte pesan ke dosen.</p>
                            </div>
                        @endforelse
                    </div>

                    <div class="p-2 sm:p-3 md:p-4 border-t border-slate-100 bg-white shrink-0 relative z-20 shadow-[0_-4px_10px_rgba(0,0,0,0.02)] pb-4 sm:pb-4">
                        <div id="imagePreviewContainer" class="hidden mb-2 relative p-2 bg-slate-50 border border-slate-200 rounded-xl sm:rounded-2xl w-fit">
                            <img id="imagePreviewElement" src="" class="h-16 sm:h-20 w-auto object-cover rounded-lg sm:rounded-xl shadow-sm border border-slate-200">
                            <button type="button" onclick="cancelImage()" class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full w-5 h-5 flex items-center justify-center font-bold text-[10px] shadow-lg hover:bg-red-600 hover:scale-110 transition-transform">✕</button>
                        </div>

                        <form id="chatForm" action="{{ route('mahasiswa.assignment.message.store', [ 'kelas' => $kelas->id, 'assignment' => $assignment->id ]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="sender_type" value="mahasiswa">
                            <input type="file" name="image" id="imageInput" accept="image/*" class="hidden" onchange="previewImage(this)">
                            <input type="file" name="voice" id="voiceInput" accept="audio/webm" class="hidden">

                            <div class="relative flex items-center gap-1.5 sm:gap-2 md:gap-3 bg-slate-50 p-1.5 sm:p-2 md:p-3 rounded-xl sm:rounded-[1.25rem] border border-slate-200 focus-within:border-blue-400 focus-within:ring-2 focus-within:ring-blue-100 transition-all shadow-sm w-full">
                                
                                <div id="uploadImageContainer" class="relative shrink-0 flex items-center">
                                    <button type="button" onclick="document.getElementById('imageInput').click()" id="btnUploadImage" class="w-8 h-8 sm:w-9 sm:h-9 md:w-10 md:h-10 rounded-xl flex items-center justify-center text-slate-400 hover:text-blue-600 hover:bg-white transition-all cursor-pointer shadow-sm border border-transparent hover:border-blue-100 bg-white sm:bg-transparent">
                                        <svg class="w-4 h-4 sm:w-5 sm:h-5 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    </button>
                                    <span class="absolute -top-1 -right-1 sm:-top-1.5 sm:-right-1.5 bg-slate-900 text-white text-[7px] sm:text-[8px] font-black px-1.5 py-0.5 rounded-md shadow-sm border border-white">7</span>
                                </div>

                                <div id="normalInputWrapper" class="flex-1 min-w-0 relative flex items-center bg-white sm:bg-transparent rounded-xl sm:rounded-none px-2 sm:px-0 shadow-sm sm:shadow-none py-0.5 sm:py-0">
                                    <div class="absolute left-2 text-[8px] sm:text-[10px] font-black text-white bg-slate-900 px-1.5 py-0.5 rounded-md shadow-sm hidden sm:block z-10">6</div>
                                    <input type="text" name="message" id="messageInput" placeholder="Sebut 6 ketik..." autocomplete="off" class="w-full bg-transparent text-[10px] sm:text-xs md:text-sm font-medium text-slate-700 placeholder-slate-400 focus:outline-none transition-all py-1.5 sm:py-1 px-2 pl-1 sm:pl-8" />
                                    
                                    <button type="button" id="cancelVoiceToTextBtn" onclick="batalKetikSuara()" class="hidden absolute right-1 sm:right-2 text-[8px] sm:text-[10px] font-black uppercase text-white bg-red-500 hover:bg-red-600 px-2 py-1 sm:px-2.5 sm:py-1.5 rounded-md sm:rounded-lg shadow-sm transition-all cursor-pointer z-20">Batal ✕</button>
                                    <button type="button" id="cancelVoiceBtn" onclick="batalRekamChat()" class="hidden absolute right-1 sm:right-2 text-[8px] sm:text-[10px] font-black uppercase text-white bg-red-500 hover:bg-red-600 px-2 py-1 sm:px-2.5 sm:py-1.5 rounded-md sm:rounded-lg shadow-sm transition-all cursor-pointer z-20">Batal ✕</button>
                                </div>

                                <div id="recordingWrapper" class="hidden flex-1 items-center justify-between px-2 bg-red-50 rounded-lg py-1 sm:py-0 sm:bg-transparent border border-red-100 sm:border-none">
                                    <div class="flex items-center gap-1.5 sm:gap-2">
                                        <span class="w-2 h-2 sm:w-2.5 sm:h-2.5 bg-red-500 rounded-full animate-pulse shadow-[0_0_8px_rgba(239,68,68,0.8)]"></span>
                                        <span class="text-[9px] sm:text-[10px] md:text-xs font-bold text-red-500 font-mono tracking-wider" id="recordTimer">00:00</span>
                                        <div class="recording-wave flex items-center gap-0.5 sm:gap-1 h-3 sm:h-5 md:h-6 ml-1 sm:ml-2">
                                            <div class="bar"></div><div class="bar"></div><div class="bar"></div><div class="bar"></div><div class="bar"></div><div class="bar"></div>
                                        </div>
                                    </div>
                                    <button type="button" id="cancelRecordBtn" onclick="batalRekamChat()" class="text-[8px] sm:text-[9px] md:text-[10px] font-black uppercase text-slate-500 hover:text-red-500 px-1 sm:px-2 transition-colors cursor-pointer bg-white sm:bg-transparent rounded py-0.5 sm:py-0 shadow-sm sm:shadow-none">Batal</button>
                                </div>

                                <div id="recordBtnContainer" class="relative shrink-0 flex items-center gap-1">
                                    <button type="button" id="recordBtn" class="w-8 h-8 sm:w-9 sm:h-9 md:w-10 md:h-10 rounded-xl flex items-center justify-center text-slate-400 hover:text-red-500 hover:bg-red-50 transition-all cursor-pointer border border-transparent hover:border-red-100 shadow-sm bg-white sm:bg-transparent">
                                        <svg class="w-4 h-4 sm:w-5 sm:h-5 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18.75a6 6 0 006-6v-1.5m-6 7.5a6 6 0 01-6-6v-1.5m6 7.5v3.75m-3.75 0h7.5M12 15.75a3 3 0 01-3-3V4.5a3 3 0 116 0v8.25a3 3 0 01-3 3z"></path></svg>
                                    </button>
                                    <span class="absolute -top-1 -right-1 sm:-top-1.5 sm:-right-1.5 bg-slate-900 text-white text-[7px] sm:text-[8px] font-black px-1.5 py-0.5 rounded-md shadow-sm border border-white">8</span>
                                </div>

                                <div class="relative shrink-0 flex items-center ml-0.5 sm:ml-1 md:ml-0">
                                    <button type="submit" id="sendChatBtn" class="w-9 h-8 sm:w-10 sm:h-9 md:w-12 md:h-10 rounded-xl bg-blue-600 text-white flex items-center justify-center hover:bg-blue-700 transition-transform transform hover:scale-105 active:scale-95 shadow-md shadow-blue-200 cursor-pointer">
                                        <span id="sendIcon"><svg class="w-4 h-4 sm:w-4 sm:h-4 md:w-5 md:h-5 transform rotate-90 ml-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg></span>
                                        <span id="sendLoading" class="hidden"><svg class="w-4 h-4 sm:w-4 sm:h-4 md:w-5 md:h-5 animate-spin text-white" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path></svg></span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>

        <audio id="globalAudioPlayer" class="hidden"></audio>

        <div id="modalBackdrop" class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm z-[60] opacity-0 pointer-events-none transition-opacity duration-300"></div>
        <div id="videoPlayerModal" class="fixed inset-0 flex items-center justify-center z-[70] opacity-0 pointer-events-none transition-opacity duration-300 p-2 sm:p-4 md:p-8">
            <div class="bg-black w-full max-w-4xl rounded-xl sm:rounded-2xl md:rounded-[2rem] overflow-hidden shadow-2xl transform scale-95 transition-transform duration-300 modal-box flex flex-col border border-slate-800">
                <div class="flex justify-between items-center p-3 sm:p-4 md:p-5 bg-gradient-to-b from-black/80 to-transparent absolute top-0 w-full z-10 pointer-events-auto">
                    <h3 id="videoPlayerTitle" class="text-white font-bold text-xs sm:text-sm md:text-base truncate pr-4 drop-shadow-md">Pemutar Video</h3>
                    <button type="button" onclick="closeVideoPlayer()" class="text-white hover:text-red-500 w-6 h-6 sm:w-8 sm:h-8 md:w-10 md:h-10 flex items-center justify-center bg-white/20 hover:bg-white/30 backdrop-blur-md rounded-full transition-all shrink-0 text-xs sm:text-base">✕</button>
                </div>
                <div id="videoPlayerContainer" class="w-full aspect-video bg-black flex items-center justify-center relative"></div>
            </div>
        </div>

        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        
        <script>
            AOS.init({ once: true, easing: "ease-out-cubic" });

            const storageBaseUrl = "{{ asset('storage') }}";
            function getMediaUrl(path) {
                if (!path) return '';
                if (path.startsWith('http') || path.startsWith('blob:')) return path;
                
                let cleanPath = path.replace(/\\/g, '/');
                if (cleanPath.startsWith('/')) cleanPath = cleanPath.substring(1);
                if (cleanPath.startsWith('storage/')) cleanPath = cleanPath.substring(8);
                if (cleanPath.startsWith('public/')) cleanPath = cleanPath.substring(7);
                
                const base = storageBaseUrl.endsWith('/') ? storageBaseUrl.slice(0, -1) : storageBaseUrl;
                return base + '/' + cleanPath;
            }

            const wavesurfers = {};
            function initWaveSurfer(containerId, audioUrl, isMe) {
                if (!document.getElementById(containerId)) return;
                const ws = WaveSurfer.create({
                    container: '#' + containerId,
                    waveColor: isMe ? 'rgba(255, 255, 255, 0.4)' : '#cbd5e1',
                    progressColor: isMe ? '#ffffff' : '#2563eb',
                    height: 20, barWidth: 2, barGap: 2, barRadius: 2, cursorWidth: 0, url: audioUrl
                });
                wavesurfers[containerId] = ws;
                ws.on('finish', () => { 
                    const btn = document.getElementById('btn-' + containerId);
                    if(btn) btn.innerHTML = '▶'; 
                });
            }

            function togglePlay(containerId) {
                const ws = wavesurfers[containerId];
                const btn = document.getElementById('btn-' + containerId);
                if(ws) { ws.playPause(); btn.innerHTML = ws.isPlaying() ? '⏸' : '▶'; }
            }

            document.addEventListener('DOMContentLoaded', () => {
                document.querySelectorAll('[data-audio]').forEach(el => {
                    const url = el.getAttribute('data-audio');
                    if (url) {
                        const isMe = el.parentElement.classList.contains('bg-white/20') || el.parentElement.classList.contains('bg-blue-600');
                        initWaveSurfer(el.id, url, isMe);
                    }
                });
            });

            const statusDesc = document.getElementById("status-desc");
            const waveBars = document.querySelectorAll(".wave-bar"); 
            const synth = window.speechSynthesis;
            const SpeechRec = window.webkitSpeechRecognition || window.SpeechRecognition;

            let rec = null; 
            let dikteChatRec = null; 
            let dikteTugasRec = null;
            let interval; 
            let waveInterval;
            
            // --- STATE VARIABELS ---
            let isDictatingChat = false; 
            let isDictatingTugas = false; 
            let isSubmitted = {{ $isSubmittedStatus ? 'true' : 'false' }};
            let wasOriginallySubmitted = {{ $isSubmittedStatus ? 'true' : 'false' }};
            let jedaKetikTimer = null; 
            let isRecActive = false; 
            let isRedirecting = false; 
            let isSpeaking = false;
            let isRecordingVoice = false;
            
            // STATE KONFIRMASI
            let menungguKonfirmasiKirim = false; 
            let menungguKonfirmasiVoiceChat = false;
            let menungguKonfirmasiImageChat = false;
            
            let menungguKonfirmasiTugasTeks = false;
            let menungguKonfirmasiTugasVoice = false;
            let menungguKonfirmasiTugasFile = false;

            // TIMER IDLE
            let idleTimer = null;
            let isMenungguIdle = false;

            if (SpeechRec) { 
                rec = new SpeechRec(); 
                rec.lang = "id-ID"; 
                rec.continuous = true; 
                rec.interimResults = true; 
                
                dikteChatRec = new SpeechRec(); 
                dikteChatRec.lang = "id-ID"; 
                dikteChatRec.continuous = true; 
                dikteChatRec.interimResults = false; 
                
                dikteTugasRec = new SpeechRec(); 
                dikteTugasRec.lang = "id-ID"; 
                dikteTugasRec.continuous = true; 
                dikteTugasRec.interimResults = false; 
            }

            function mulaiTimerIdle() {
                clearTimeout(idleTimer);
                idleTimer = setTimeout(() => {
                    if (!isSubmitted && !isDictatingTugas && !menungguKonfirmasiTugasTeks && !menungguKonfirmasiTugasVoice && !menungguKonfirmasiTugasFile && !isRecordingVoice) {
                        isMenungguIdle = true;
                        if (wasOriginallySubmitted) {
                            bicara("Anda belum melakukan tindakan. Apakah jadi kirim ulang tugas, atau batal? Sebut Lanjut, atau Batal.");
                        } else {
                            bicara("Anda belum mengisi form tugas. Silakan sebut dua untuk upload file, tiga untuk ketik, atau empat untuk merekam suara.");
                        }
                    }
                }, 15000);
            }

            function resetTimerIdle() {
                clearTimeout(idleTimer);
                isMenungguIdle = false;
            }

            function setWave(active) {
                if (active) {
                    if (waveInterval) clearInterval(waveInterval);
                    waveInterval = setInterval(() => {
                        if (waveBars.length > 0) waveBars.forEach((bar) => { bar.style.height = `${Math.floor(Math.random() * 12) + 4}px`; });
                    }, 100);
                } else {
                    clearInterval(waveInterval);
                    if (waveBars.length > 0) waveBars.forEach((bar) => (bar.style.height = "4px"));
                }
            }

            // ==========================================
            // LOGIKA SECURE DOUBLE CLICK & DATA-MENU
            // ==========================================
            let clickTimer = null;
            const clickDelay = 300; 

            document.body.addEventListener('click', (e) => {
                // Abaikan klik form atau elemen native agar berfungsi normal
                if ((e.target.tagName === 'INPUT' || e.target.tagName === 'TEXTAREA' || e.target.tagName === 'AUDIO') && !e.target.closest('[data-menu]')) {
                    return;
                }

                const navElement = e.target.closest('[data-menu]');

                if (navElement) {
                    e.preventDefault(); 
                }

                if (clickTimer !== null) {
                    // DOUBLE CLICK: Potong suara bot sepenuhnya
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
                    // SINGLE CLICK
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
                if (!rec || isRedirecting || isDictatingChat || isDictatingTugas) return;
                if (isRecActive) return; 
                try {
                    rec.start();
                    isRecActive = true;
                } catch (e) {}
            }

            function bicara(teks, callback = null) {
                if (isRedirecting) return;
                synth.cancel();
                
                window.currentBotText = teks; 

                if(dikteChatRec) { try { dikteChatRec.abort(); } catch(e){} }
                if(dikteTugasRec) { try { dikteTugasRec.abort(); } catch(e){} }

                setTimeout(() => {
                    const utter = new SpeechSynthesisUtterance(teks);
                    utter.lang = "id-ID";
                    utter.rate = parseFloat(localStorage.getItem("speechRate")) || 1.1;
                    
                    utter.onstart = () => { 
                        isSpeaking = true;
                        if (statusDesc) {
                            statusDesc.innerText = "SISTEM BERBICARA";
                            statusDesc.classList.replace("text-slate-400", "text-blue-600");
                            statusDesc.classList.replace("text-green-600", "text-blue-600");
                        }
                        setWave(true); 
                        
                        if(!isRecordingVoice && !isDictatingChat && !isDictatingTugas) {
                            mulaiMendengar();
                        }
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
                        
                        if (!isRecordingVoice && !isDictatingChat && !isDictatingTugas) {
                            try { rec.stop(); } catch(e){}
                            setTimeout(() => { mulaiMendengar(); }, 150);
                        }
                    };
                    utter.onerror = () => { 
                        isSpeaking = false;
                        setWave(false); 
                        if (callback) callback(); 
                    };

                    synth.speak(utter);
                }, 50);
            }

            function stopBicara() {
                synth.cancel();
                isSpeaking = false;
                let globalAudio = document.getElementById('globalAudioPlayer');
                if(globalAudio) { globalAudio.pause(); globalAudio.currentTime = 0; }
            }

            window.batalSemuaTugas = function(speak = true) {
                document.getElementById('file-upload').value = '';
                document.getElementById('text-submission').value = '';
                document.getElementById("typing-indicator").classList.add("hidden");
                document.getElementById('text-submission').placeholder = 'Sebut 3 mendikte...';
                document.getElementById('assignmentVoiceInput').value = '';
                document.getElementById('file-label').innerText = 'Klik Pilih File';
                document.getElementById('file-label').classList.remove('text-blue-600');
                document.getElementById('assignmentVoiceLabel').innerText = 'Sebut 4 merekam';
                document.getElementById('assignmentVoiceLabel').classList.remove('text-blue-600');
                document.getElementById('btnCancelAssignmentVoice').classList.add('hidden');
                
                menungguKonfirmasiTugasTeks = false;
                menungguKonfirmasiTugasVoice = false;
                menungguKonfirmasiTugasFile = false;
                resetTimerIdle();
                
                if (wasOriginallySubmitted) {
                    isSubmitted = true;
                    document.getElementById("submission-success").classList.remove("hidden");
                    document.getElementById("submission-form").classList.add("hidden");
                    
                    const stCard = document.getElementById("status-card");
                    const stIcon = document.getElementById("status-icon");
                    const stTitle = document.getElementById("status-title");
                    
                    stCard.classList.add('border-emerald-300', 'bg-emerald-50/40', 'shadow-emerald-100');
                    stCard.classList.remove('border-slate-200', 'shadow-sm');
                    
                    stIcon.classList.add('bg-emerald-500', 'text-white', 'shadow-md');
                    stIcon.classList.remove('bg-slate-100', 'text-slate-500');
                    stIcon.innerHTML = `<svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>`;
                    
                    stTitle.classList.add('text-emerald-700');
                    stTitle.classList.remove('text-slate-400');
                    
                    document.getElementById("status-text").classList.add('text-emerald-600');
                    document.getElementById("status-text").classList.remove('text-slate-800');
                    document.getElementById("status-text").innerText = "Sudah Dikumpulkan";

                    if(speak) bicara("Kirim ulang dibatalkan. Tugas Anda kembali pada jawaban sebelumnya. Sebut 6 untuk diskusi dengan dosen.");
                } else {
                    if(speak) bicara("Form tugas dibatalkan. Sebut angka 3 untuk mengetik, atau 4 merekam suara.");
                }
            }

            function kirimUlang() {
                isSubmitted = false;
                document.getElementById("submission-success").classList.add("hidden");
                document.getElementById("submission-form").classList.remove("hidden");
                document.getElementById("status-text").innerText = "Belum Dikirim";
                
                const stCard = document.getElementById("status-card");
                const stIcon = document.getElementById("status-icon");
                const stTitle = document.getElementById("status-title");
                
                stCard.classList.remove('border-emerald-300', 'bg-emerald-50/40', 'shadow-emerald-100');
                stCard.classList.add('border-slate-200', 'shadow-sm');
                
                stIcon.classList.remove('bg-emerald-500', 'text-white', 'shadow-md');
                stIcon.classList.add('bg-slate-100', 'text-slate-500');
                stIcon.innerHTML = `<svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>`;
                
                stTitle.classList.remove('text-emerald-700');
                stTitle.classList.add('text-slate-400');
                
                document.getElementById("status-text").classList.remove('text-emerald-600');
                document.getElementById("status-text").classList.add('text-slate-800');

                bicara("Mode kirim ulang aktif. Silakan pilih file, dikte teks, atau rekam suara untuk memperbarui jawaban tugas Anda.", () => { 
                    mulaiTimerIdle(); 
                });
            }

            function handleFileSelect(input) {
                if (input.files && input.files[0]) {
                    resetTimerIdle();
                    document.getElementById("file-label").innerText = "Terpilih: " + input.files[0].name;
                    document.getElementById("file-label").classList.add('text-blue-600');
                    menungguKonfirmasiTugasFile = true;
                    bicara("File tugas siap dilampirkan. Sebut Kirim untuk mengirim tugas, atau Batal.");
                }
            }

            const btnAssignmentRecord = document.getElementById('btnAssignmentRecord');
            const assignmentVoiceInput = document.getElementById('assignmentVoiceInput');
            const assignmentTimer = document.getElementById('assignment-record-timer');
            const assignmentVoiceLabel = document.getElementById('assignmentVoiceLabel');
            const btnCancelAssignmentVoice = document.getElementById('btnCancelAssignmentVoice');

            let tugasMediaRecorder, tugasAudioChunks = [], tugasRecordInterval, tugasRecordSeconds = 0;

            function updateTugasTimer() {
                tugasRecordSeconds++;
                const m = String(Math.floor(tugasRecordSeconds / 60)).padStart(2, '0');
                const s = String(tugasRecordSeconds % 60).padStart(2, '0');
                assignmentTimer.innerText = `${m}:${s}`;
            }

            if(btnAssignmentRecord) {
                btnAssignmentRecord.addEventListener('click', async () => {
                    if (!tugasMediaRecorder || tugasMediaRecorder.state === "inactive") {
                        try {
                            isRecordingVoice = true;
                            if(rec) { try { rec.abort(); } catch(e){} }
                            resetTimerIdle();
                            
                            setTimeout(async () => {
                                const stream = await navigator.mediaDevices.getUserMedia({ audio: true });
                                tugasMediaRecorder = new MediaRecorder(stream);
                                tugasMediaRecorder.start();
                                
                                btnAssignmentRecord.classList.remove('bg-blue-100', 'text-blue-600');
                                btnAssignmentRecord.classList.add('bg-red-500', 'text-white', 'animate-pulse');
                                assignmentVoiceLabel.innerText = "Merekam suara...";
                                assignmentVoiceLabel.classList.add('text-red-500');
                                assignmentTimer.classList.remove('hidden');
                                btnCancelAssignmentVoice.classList.add('hidden');
                                
                                tugasRecordSeconds = 0; assignmentTimer.innerText = "00:00";
                                tugasRecordInterval = setInterval(updateTugasTimer, 1000);
                                tugasAudioChunks = []; tugasMediaRecorder.ondataavailable = e => { tugasAudioChunks.push(e.data); };
                                
                                mulaiMendengar();
                            }, 300); 
                            
                        } catch(err) { isRecordingVoice = false; bicara("Mikrofon tidak diizinkan oleh sistem Anda."); }
                    } else {
                        isRecordingVoice = false;
                        tugasMediaRecorder.onstop = () => {
                            const blob = new Blob(tugasAudioChunks, { type: 'audio/webm' });
                            const file = new File([blob], "tugas_voice.webm", { type: "audio/webm" });
                            const dt = new DataTransfer(); dt.items.add(file); assignmentVoiceInput.files = dt.files;
                            
                            btnAssignmentRecord.classList.add('bg-blue-100', 'text-blue-600');
                            btnAssignmentRecord.classList.remove('bg-red-500', 'text-white', 'animate-pulse');
                            assignmentTimer.classList.add('hidden');
                            assignmentVoiceLabel.innerText = "▶ ılıılı Voice Note Siap";
                            assignmentVoiceLabel.classList.remove('text-red-500');
                            assignmentVoiceLabel.classList.add('text-blue-600');
                            btnCancelAssignmentVoice.classList.remove('hidden');

                            const audioUrl = URL.createObjectURL(blob);
                            const audio = new Audio(audioUrl);
                            audio.play();
                            audio.onended = () => {
                                menungguKonfirmasiTugasVoice = true;
                                bicara("Itu adalah rekaman jawaban Anda. Mau dikirim atau batal? Sebut Kirim, atau Batal.");
                            };
                        };
                        tugasMediaRecorder.stop(); clearInterval(tugasRecordInterval);
                    }
                });

                btnCancelAssignmentVoice.addEventListener('click', () => {
                    assignmentVoiceInput.value = '';
                    assignmentVoiceLabel.innerText = "Sebut 4 untuk merekam";
                    assignmentVoiceLabel.classList.remove('text-blue-600');
                    btnCancelAssignmentVoice.classList.add('hidden');
                    menungguKonfirmasiTugasVoice = false;
                    mulaiTimerIdle();
                });
            }

            let imageInput = document.getElementById("imageInput");
            let messageInput = document.getElementById("messageInput");
            let voiceInput = document.getElementById("voiceInput");
            const recordBtn = document.getElementById('recordBtn');
            const btnUploadImage = document.getElementById('btnUploadImage');
            const normalInputWrapper = document.getElementById('normalInputWrapper');
            const recordingWrapper = document.getElementById('recordingWrapper');
            const cancelVoiceBtn = document.getElementById('cancelVoiceBtn');
            const uploadImageContainer = document.getElementById('uploadImageContainer');
            const recordBtnContainer = document.getElementById('recordBtnContainer');
            const cancelRecordBtn = document.getElementById('cancelRecordBtn');
            const timerText = document.getElementById('recordTimer');

            let chatMediaRecorder, chatAudioChunks = [], chatRecordInterval, chatRecordSeconds = 0, mediaStream = null;

            window.previewImage = function(input) {
                if (input.files && input.files[0]) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById('imagePreviewElement').src = e.target.result;
                        document.getElementById('imagePreviewContainer').classList.remove('hidden');
                        document.getElementById('imagePreviewContainer').classList.add('inline-block');
                        menungguKonfirmasiImageChat = true;
                        bicara("Gambar dipilih. Sebut Kirim, atau Batal.");
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
            window.cancelImage = function() {
                if(imageInput) imageInput.value = '';
                document.getElementById('imagePreviewContainer').classList.remove('inline-block');
                document.getElementById('imagePreviewContainer').classList.add('hidden');
            }

            function updateChatTimer() {
                chatRecordSeconds++;
                const m = String(Math.floor(chatRecordSeconds / 60)).padStart(2, '0');
                const s = String(chatRecordSeconds % 60).padStart(2, '0');
                timerText.innerText = `${m}:${s}`;
            }

            if(recordBtn) {
                recordBtn.addEventListener('click', async () => {
                    if (!chatMediaRecorder || chatMediaRecorder.state === "inactive") {
                        try {
                            isRecordingVoice = true;
                            if(rec) { try { rec.abort(); } catch(e){} }
                            setTimeout(async () => {
                                mediaStream = await navigator.mediaDevices.getUserMedia({ audio: true });
                                chatMediaRecorder = new MediaRecorder(mediaStream);
                                chatMediaRecorder.start();
                                
                                normalInputWrapper.classList.add('hidden'); 
                                if(uploadImageContainer) uploadImageContainer.classList.add('hidden');
                                recordingWrapper.classList.remove('hidden'); recordingWrapper.classList.add('flex');
                                
                                recordBtn.classList.remove('text-slate-400', 'bg-white', 'sm:bg-transparent');
                                recordBtn.classList.add('text-white', 'bg-red-500', 'animate-pulse', 'border-red-600');
                                
                                if (cancelRecordBtn) cancelRecordBtn.classList.remove('hidden');

                                chatRecordSeconds = 0; timerText.innerText = "00:00";
                                chatRecordInterval = setInterval(updateChatTimer, 1000);
                                chatAudioChunks = []; chatMediaRecorder.ondataavailable = event => { chatAudioChunks.push(event.data); };
                                
                                mulaiMendengar();
                            }, 300); 
                            
                        } catch(err) { isRecordingVoice = false; bicara("Akses mikrofon ditolak sistem."); }
                    } else {
                        isRecordingVoice = false;
                        chatMediaRecorder.onstop = () => {
                            if (mediaStream) { mediaStream.getTracks().forEach(track => track.stop()); }
                            
                            recordingWrapper.classList.add('hidden'); recordingWrapper.classList.remove('flex');
                            normalInputWrapper.classList.remove('hidden');
                            if(recordBtnContainer) recordBtnContainer.classList.add('hidden');

                            const blob = new Blob(chatAudioChunks, { type: 'audio/webm' });
                            const file = new File([blob], "voice.webm", { type: "audio/webm" });
                            const dataTransfer = new DataTransfer(); dataTransfer.items.add(file); voiceInput.files = dataTransfer.files;
                            
                            messageInput.placeholder = "Suara siap dikirim...";
                            messageInput.disabled = true; 
                            messageInput.classList.add('font-bold', 'text-blue-600', 'bg-blue-100/50', 'rounded-xl', 'px-4');
                            messageInput.classList.remove('bg-transparent', 'pl-1', 'sm:pl-8');
                            
                            cancelVoiceBtn.classList.remove('hidden');

                            const audioUrl = URL.createObjectURL(blob);
                            const audio = new Audio(audioUrl);
                            audio.play();
                            audio.onended = () => {
                                menungguKonfirmasiVoiceChat = true;
                                bicara("Itu adalah rekaman pesan Anda. Mau dikirim atau batal? Sebut Kirim, atau Batal.");
                            };
                        };
                        chatMediaRecorder.stop(); clearInterval(chatRecordInterval);
                    }
                });

                if (cancelRecordBtn) {
                    cancelRecordBtn.addEventListener('click', () => { window.batalRekamChat(true); });
                }
                cancelVoiceBtn.addEventListener('click', () => { window.batalRekamChat(true); });
            }

            window.batalKetikSuara = function(speak = true) {
                isDictatingChat = false; 
                menungguKonfirmasiKirim = false; 
                clearTimeout(jedaKetikTimer);
                if(dikteChatRec) { try { dikteChatRec.stop(); } catch(e){} }
                document.getElementById('normalInputWrapper').classList.remove('dictating-active', 'confirming-active');
                document.getElementById('cancelVoiceToTextBtn').classList.add('hidden');
                document.getElementById("messageInput").value = "";
                document.getElementById("messageInput").placeholder = "Sebutkan 6 untuk ketik chat...";
                if(speak) bicara("Pesan dibatalkan. Sebut 6 untuk mengetik ulang pesan, atau angka lain.");
            }

            window.batalRekamChat = function(speak = true) {
                if(chatMediaRecorder && chatMediaRecorder.state !== "inactive") chatMediaRecorder.stop();
                if (mediaStream) { mediaStream.getTracks().forEach(track => track.stop()); }
                clearInterval(chatRecordInterval); chatAudioChunks = []; voiceInput.value = '';
                
                recordingWrapper.classList.add('hidden'); recordingWrapper.classList.remove('flex');
                normalInputWrapper.classList.remove('hidden'); 
                if(uploadImageContainer) uploadImageContainer.classList.remove('hidden');
                if(recordBtnContainer) recordBtnContainer.classList.remove('hidden');
                
                recordBtn.classList.remove('text-white', 'bg-red-500', 'animate-pulse', 'border-red-600');
                recordBtn.classList.add('text-slate-400', 'bg-white', 'sm:bg-transparent');
                if (cancelRecordBtn) cancelRecordBtn.classList.add('hidden');
                
                messageInput.disabled = false;
                messageInput.placeholder = "Sebutkan 6 untuk ketik chat...";
                messageInput.classList.remove('font-bold', 'text-blue-600', 'bg-blue-100/50', 'rounded-xl', 'px-4');
                messageInput.classList.add('bg-transparent', 'pl-1', 'sm:pl-8');
                
                cancelVoiceBtn.classList.add('hidden');
                menungguKonfirmasiVoiceChat = false;

                if(speak) bicara("Pesan suara dibatalkan. Sebut 8 untuk merekam ulang pesan, atau 6 untuk mengetik teks.");
            }

            function batalDikteTugas() {
                isDictatingTugas = false; clearTimeout(jedaKetikTimer);
                if (dikteTugasRec) { try { dikteTugasRec.stop(); } catch(e){} }
                document.getElementById("typing-indicator").classList.add("hidden");
                document.getElementById("text-submission").placeholder = "Sebut 3 untuk mendikte jawaban...";
                document.getElementById("text-submission").value = "";
                menungguKonfirmasiTugasTeks = false;
                bicara("Dikte teks tugas dibatalkan. Sebut angka 3 untuk mendikte ulang.", () => { mulaiTimerIdle(); });
            }

            function getPanduanUtama(isUlang = false) {
                const judul = "{{ addslashes($assignment->judul) }}".replace(/[^A-Za-z0-9 \.,\?]/g, '');
                const tgl = "{{ \Carbon\Carbon::parse($assignment->deadline)->translatedFormat('d F Y, jam H:i') }}";
                let teks = "";

                @if(session('success'))
                    if(!isUlang) teks += "Selamat, tugas Anda sudah berhasil dikumpulkan! ";
                @endif
                
                teks += `Halaman Detail Tugas: ${judul}. Batas waktu pengumpulan: ${tgl}. `;

                if (isSubmitted) {
                    teks += `Status: Sudah dikumpulkan. Untuk mengulang pengumpulan, sebutkan angka lima. `;
                } else {
                    teks += `Status: Belum dikumpulkan. Sebutkan angka satu untuk membaca instruksi soal. Dua untuk upload file. Tiga untuk mengetik jawaban. Empat merekam jawaban suara. Jika sudah, sebut Kirim atau Batal. `;
                }

                teks += `Untuk diskusi dengan dosen: Enam ketik pesan. Tujuh upload gambar. Delapan rekam suara. Sembilan baca riwayat. Nol kembali. Katakan Ulang, untuk mendengar panduan ini kembali.`;
                return teks;
            }

            window.navigasiKe = function(nomor) {
                if (isRedirecting || isDictatingChat || isDictatingTugas) return;
                let teks = ""; let tujuan = ""; let isAction = false;

                if (nomor === 0) { tujuan = "{{ route('course.assignments', $kelas->id) }}"; teks = "Nol. Kembali ke Daftar Tugas."; }
                else if (nomor === 1) { 
                    isAction = true;
                    let soalBersih = document.getElementById("soal-text").innerText.replace(/[^A-Za-z0-9 \.,\?]/g, '');
                    if (isSubmitted) {
                        teks = "Satu. Instruksi Tugas: " + soalBersih + ". Tugas Anda sudah dikirim. Apakah kamu mau kirim ulang? Sebut Lima untuk kirim ulang."; 
                    } else {
                        teks = "Satu. Instruksi Tugas: " + soalBersih + ". Setelah ini, sebut 2 untuk upload file, 3 untuk ketik, atau 4 untuk rekam jawaban."; 
                    }
                }
                else if (nomor === 2) {
                    isAction = true;
                    if (!isSubmitted) { document.getElementById("file-upload").click(); teks = "Dua. Membuka file explorer."; resetTimerIdle(); }
                    else { teks = "Tugas sudah dikumpulkan. Sebut lima untuk kirim ulang."; }
                }
                else if (nomor === 3) {
                    isAction = true;
                    if (!isSubmitted) {
                        try { rec.stop(); } catch(e){}
                        resetTimerIdle();
                        isDictatingTugas = true;
                        document.getElementById("typing-indicator").classList.remove("hidden");
                        document.getElementById("text-submission").value = "";
                        document.getElementById("text-submission").placeholder = "Mendengarkan jawaban tugas Anda...";
                        teks = "Tiga. Silakan ucapkan teks jawaban tugas Anda.";
                        bicara(teks, () => { dikteTugasRec.start(); }); return;
                    } else { teks = "Tugas sudah dikumpulkan. Sebut lima untuk kirim ulang."; }
                }
                else if (nomor === 4) {
                    isAction = true;
                    if (!isSubmitted) {
                        resetTimerIdle();
                        if (!tugasMediaRecorder || tugasMediaRecorder.state === "inactive") {
                            teks = "Empat. Merekam suara tugas. Bicara setelah bip. Sebut Selesai untuk berhenti.";
                            bicara(teks, () => { btnAssignmentRecord.click(); }); return;
                        } else {
                            btnAssignmentRecord.click(); return;
                        }
                    } else { teks = "Tugas sudah dikumpulkan. Sebut lima untuk kirim ulang."; }
                }
                else if (nomor === 5) {
                    isAction = true;
                    if (isSubmitted) { kirimUlang(); return; } 
                    else { teks = "Perintah 5 saat ini digunakan khusus untuk Kirim Ulang. Sebut Kirim, jika Anda ingin mengumpulkan tugas."; }
                }
                else if (nomor === 6) {
                    isAction = true;
                    try { rec.stop(); } catch(e){} 
                    isDictatingChat = true; menungguKonfirmasiKirim = false;
                    document.getElementById('normalInputWrapper').classList.add('dictating-active');
                    document.getElementById('normalInputWrapper').classList.remove('confirming-active');
                    document.getElementById('cancelVoiceToTextBtn').classList.remove('hidden');
                    document.getElementById("messageInput").value = "";
                    document.getElementById("messageInput").placeholder = "Mendengarkan teks...";
                    teks = "Enam. Silakan bicara pesan diskusi untuk dosen.";
                    bicara(teks, () => { dikteChatRec.start(); }); return;
                }
                else if (nomor === 7) {
                    isAction = true;
                    teks = "Tujuh. Membuka galeri. Pilih gambar.";
                    bicara(teks, () => { document.getElementById('imageInput').click(); });
                    return;
                }
                else if (nomor === 8) {
                    isAction = true;
                    if (!chatMediaRecorder || chatMediaRecorder.state === "inactive") {
                        teks = "Delapan. Merekam pesan chat. Bicara setelah bip. Sebut Selesai untuk berhenti.";
                        bicara(teks, () => { document.getElementById('recordBtn').click(); });
                        return;
                    } else {
                        try { rec.stop(); } catch(e){}
                        document.getElementById('recordBtn').click(); 
                        return;
                    }
                }
                else if (nomor === 9) {
                    isAction = true;
                    let chats = document.querySelectorAll('#chatContainer .chat-bubble-new, #chatContainer .chat-bubble');
                    if(chats.length === 0) {
                        bicara("Belum ada riwayat diskusi.");
                    } else {
                        bacaRiwayatChatAsync(chats);
                    }
                    return; 
                }

                if (teks !== "") {
                    if (!isAction && tujuan !== "" && tujuan !== "#") {
                        isRedirecting = true;
                        synth.cancel();
                        if(rec) rec.abort();

                        if(statusDesc) {
                            statusDesc.innerText = "MENGALIHKAN...";
                            statusDesc.classList.replace("text-green-600", "text-slate-800");
                            statusDesc.classList.replace("text-blue-600", "text-slate-800");
                        }
                        
                        bicara(teks);
                        setTimeout(() => { window.location.href = tujuan; }, 500);
                    } else {
                        bicara(teks, () => {
                            try { rec.start(); } catch(e){}
                        });
                    }
                }
            }

            if (rec) {
                rec.onresult = (event) => {
                    if (isRedirecting || isDictatingChat || isDictatingTugas) return;

                    let hasil = "";
                    for (let i = event.resultIndex; i < event.results.length; ++i) {
                        hasil += event.results[i][0].transcript;
                    }
                    hasil = hasil.replace(/[.,!?]/g, '').toLowerCase().trim();

                    if (isSpeaking) {
                        let botText = (window.currentBotText || "").replace(/[.,!?]/g, '').toLowerCase().trim();
                        if (botText.includes(hasil)) {
                            let perintahPenting = ["kirim", "batal", "selesai", "stop", "berhenti", "iya", "ya", "tidak", "lanjut", "oke", "ulang"];
                            let isPerintah = perintahPenting.some(cmd => hasil === cmd || hasil.includes(cmd));
                            
                            if (!isPerintah) {
                                return; 
                            } else {
                                synth.cancel();
                                isSpeaking = false;
                            }
                        }
                    }

                    if (isRecordingVoice) {
                        if (hasil.includes("selesai") || hasil.includes("berhenti") || hasil.includes("stop")) {
                            const recChatBtn = document.getElementById('recordBtn');
                            if (recChatBtn && recChatBtn.classList.contains('text-white')) {
                                try { rec.stop(); } catch(e){}
                                recChatBtn.click();
                            }
                            const recTugasBtn = document.getElementById('btnAssignmentRecord');
                            if (recTugasBtn && recTugasBtn.classList.contains('text-white')) {
                                try { rec.stop(); } catch(e){}
                                recTugasBtn.click();
                            }
                        }
                        return;
                    }

                    if (menungguKonfirmasiTugasTeks || menungguKonfirmasiTugasVoice || menungguKonfirmasiTugasFile || menungguKonfirmasiKirim || menungguKonfirmasiVoiceChat || menungguKonfirmasiImageChat) {
                        
                        let cleanHasil = hasil;
                        
                        if (cleanHasil.includes("kirim") || cleanHasil.includes("iya") || cleanHasil.includes("ya") || cleanHasil.includes("oke") || cleanHasil.includes("lanjut")) { 
                            synth.cancel();
                            if (menungguKonfirmasiTugasTeks || menungguKonfirmasiTugasVoice || menungguKonfirmasiTugasFile) {
                                menungguKonfirmasiTugasTeks = false; menungguKonfirmasiTugasVoice = false; menungguKonfirmasiTugasFile = false;
                                resetTimerIdle();
                                bicara("Sedang mengirim tugas, mohon tunggu sebentar...", () => {
                                    document.getElementById("btnSubmitForm").click(); 
                                });
                            } else {
                                menungguKonfirmasiKirim = false; menungguKonfirmasiVoiceChat = false; menungguKonfirmasiImageChat = false; 
                                document.getElementById("sendChatBtn").click(); 
                            }
                            return;
                        }

                        if (cleanHasil.includes("batal") || cleanHasil.includes("tidak") || cleanHasil.includes("ganti") || cleanHasil.includes("ulang")) {
                            synth.cancel();
                            if (menungguKonfirmasiTugasTeks || menungguKonfirmasiTugasVoice || menungguKonfirmasiTugasFile) {
                                window.batalSemuaTugas(true);
                            } else {
                                if(menungguKonfirmasiKirim) window.batalKetikSuara(true);
                                if(menungguKonfirmasiVoiceChat) window.batalRekamChat(true);
                                if(menungguKonfirmasiImageChat) { window.cancelImage(); bicara("Dibatalkan. Sebut 7 untuk upload ulang gambar."); }
                                menungguKonfirmasiImageChat = false;
                            }
                            return;
                        }
                        return; 
                    }

                    prosesJawabanNormal(hasil);
                };

                rec.onend = () => { 
                    isRecActive = false;
                    if (!isRedirecting && !isDictatingChat && !isDictatingTugas && !isRecordingVoice) mulaiMendengar(); 
                };
            }

            function prosesJawabanNormal(hasil) {
                const strictMatch = (wordStr) => new RegExp("\\b(" + wordStr + ")\\b").test(hasil);

                const kataAngka = {
                    "nol": 0, "kosong": 0, "0": 0,
                    "satu": 1, "1": 1,
                    "dua": 2, "2": 2,
                    "tiga": 3, "3": 3,
                    "empat": 4, "4": 4,
                    "lima": 5, "5": 5,
                    "enam": 6, "6": 6,
                    "tujuh": 7, "7": 7,
                    "delapan": 8, "8": 8,
                    "sembilan": 9, "9": 9
                };

                let targetAngka = null;
                const angkaMurni = hasil.match(/\b\d+\b/);
                if (angkaMurni) {
                    targetAngka = parseInt(angkaMurni[0]);
                } else {
                    for (let kata in kataAngka) {
                        if (strictMatch(kata)) {
                            targetAngka = kataAngka[kata]; break;
                        }
                    }
                }

                if (targetAngka !== null && targetAngka <= 9) {
                    synth.cancel(); 
                    if(rec) { try { rec.abort(); } catch(e){} }
                    navigasiKe(targetAngka); 
                    return;
                }

                if (isMenungguIdle) {
                    if (hasil.includes("lanjut") || hasil.includes("ulang") || hasil.includes("iya")) {
                        isMenungguIdle = false;
                        bicara("Silakan sebut dua untuk file, tiga untuk teks, atau empat merekam suara.", () => { mulaiTimerIdle(); });
                        return;
                    }
                    if (hasil.includes("batal") || hasil.includes("tidak")) {
                        isMenungguIdle = false;
                        window.batalSemuaTugas(true);
                        return;
                    }
                }

                if(hasil.includes("ulang") || hasil.includes("panduan") || hasil.includes("bantuan")) {
                    synth.cancel(); if(rec) { try { rec.abort(); } catch(e){} }
                    bicara(getPanduanUtama(true));
                    return;
                }

                if(hasil.includes("stop") || hasil.includes("berhenti")) {
                    stopBicara(); return;
                }
            }

            if(dikteChatRec) {
                dikteChatRec.onresult = (event) => {
                    if (!isDictatingChat) return;
                    
                    let newTxt = event.results[event.results.length - 1][0].transcript.trim();
                    let cleanTxt = newTxt.replace(/[^a-z0-9]/gi, '').toLowerCase();

                    if (cleanTxt.includes("batal") || cleanTxt.includes("batalkan") || cleanTxt.includes("berhenti")) { 
                        window.batalKetikSuara(); return; 
                    }

                    const inputChat = document.getElementById("messageInput");
                    inputChat.value += (inputChat.value === "" ? "" : " ") + newTxt;
                    
                    clearTimeout(jedaKetikTimer);
                    jedaKetikTimer = setTimeout(() => {
                        isDictatingChat = false; 
                        menungguKonfirmasiKirim = true;
                        if(dikteChatRec) dikteChatRec.stop();
                        document.getElementById('normalInputWrapper').classList.remove('dictating-active');
                        document.getElementById('normalInputWrapper').classList.add('confirming-active');
                        
                        let teksBaca = inputChat.value.trim().replace(/[^A-Za-z0-9 \.,\?]/g, '');
                        if(teksBaca.length > 50) teksBaca = teksBaca.substring(0, 50) + "...";
                        bicara(`Pesan: ${teksBaca}. Mau dikirim atau batal? Sebut Kirim, atau Batal.`);
                    }, 2500); 
                };
                dikteChatRec.onerror = () => { if (isDictatingChat) { window.batalKetikSuara(); } };
                dikteChatRec.onend = () => { if(isDictatingChat) dikteChatRec.start(); };
            }

            if(dikteTugasRec) {
                dikteTugasRec.onresult = (event) => {
                    if (isDictatingTugas) {
                        let newTxt = event.results[event.results.length - 1][0].transcript.trim();
                        let cleanTxt = newTxt.replace(/[^a-z0-9]/gi, '').toLowerCase();

                        if (cleanTxt.includes("batal") || cleanTxt.includes("batalkan") || cleanTxt.includes("berhenti")) { 
                            batalDikteTugas(); return; 
                        }

                        const inputTugas = document.getElementById("text-submission");
                        inputTugas.value += (inputTugas.value === "" ? "" : " ") + newTxt;
                        
                        clearTimeout(jedaKetikTimer);
                        jedaKetikTimer = setTimeout(() => {
                            isDictatingTugas = false;
                            menungguKonfirmasiTugasTeks = true;
                            if(dikteTugasRec) dikteTugasRec.stop();
                            document.getElementById("typing-indicator").classList.add("hidden");
                            document.getElementById("text-submission").placeholder = "Sebut 3 untuk mendikte jawaban...";
                            
                            let teksBaca = inputTugas.value.trim().replace(/[^A-Za-z0-9 \.,\?]/g, '');
                            if(teksBaca.length > 100) teksBaca = teksBaca.substring(0, 100) + "...";
                            
                            bicara(`Jawaban Anda: ${teksBaca}. Mau dikirim atau batal? Sebut Kirim, atau Batal.`);
                        }, 3000);
                    }
                };
                dikteTugasRec.onerror = () => { if (isDictatingTugas) batalDikteTugas(); };
                dikteTugasRec.onend = () => { if(isDictatingTugas) dikteTugasRec.start(); };
            }

            async function bacaRiwayatChatAsync(chats) {
                if(rec) { try { rec.abort(); } catch(e){} }

                const speakAsync = (text) => new Promise(resolve => {
                    synth.cancel();
                    let utter = new SpeechSynthesisUtterance(text);
                    utter.lang = "id-ID";
                    utter.rate = parseFloat(localStorage.getItem("speechRate")) || 1.0;
                    utter.onstart = () => { if (statusDesc) { statusDesc.innerText = "SISTEM BERBICARA"; statusDesc.classList.replace("text-slate-400", "text-blue-600"); statusDesc.classList.replace("text-green-600", "text-blue-600"); } interval = setInterval(() => setWave(true), 150); mulaiMendengar(); };
                    utter.onend = () => { clearInterval(interval); setWave(false); try { rec.stop(); } catch(e){} setTimeout(() => { mulaiMendengar(); }, 150); resolve(); };
                    utter.onerror = () => { clearInterval(interval); setWave(false); resolve(); };
                    synth.speak(utter);
                });

                const playAudioAsync = (waveId) => new Promise(resolve => {
                    let ws = wavesurfers[waveId];
                    if(ws) {
                        const finishHandler = () => { resolve(); };
                        ws.once('finish', finishHandler);
                        ws.once('error', finishHandler);
                        
                        if(ws.getDuration() === 0) {
                            ws.once('ready', () => {
                                ws.play();
                                document.getElementById('btn-' + waveId).innerHTML = '⏸';
                            });
                            setTimeout(resolve, 5000); 
                        } else {
                            ws.play();
                            document.getElementById('btn-' + waveId).innerHTML = '⏸';
                        }
                    } else {
                        resolve();
                    }
                });

                await speakAsync("Membacakan riwayat pesan diskusi.");

                for (let i = 0; i < chats.length; i++) {
                    let chat = chats[i];
                    let senderEl = chat.querySelector('.sender-name');
                    let sender = senderEl ? senderEl.innerText.replace('Dosen', '').trim() : "Seseorang";
                    
                    let msgElement = chat.querySelector('.message-text');
                    let msgText = msgElement ? msgElement.innerText.trim() : "";

                    let waveEl = chat.querySelector('[id^="wave-"]');

                    if (msgText) {
                        window.currentBotText = sender + " bilang, " + msgText;
                        await speakAsync(sender + " bilang, " + msgText);
                    } else if (waveEl) {
                        window.currentBotText = sender + " mengirim pesan suara.";
                        await speakAsync(sender + " mengirim pesan suara.");
                    } else {
                        window.currentBotText = sender + " mengirim lampiran gambar.";
                        await speakAsync(sender + " mengirim lampiran gambar.");
                    }

                    if (waveEl) {
                        await playAudioAsync(waveEl.id);
                    }
                    
                    await new Promise(r => setTimeout(r, 500));
                }

                window.currentBotText = "Selesai membacakan diskusi tugas. Sebut enam untuk membalas, atau sebut angka lain sesuai panduan.";
                await speakAsync("Selesai membacakan diskusi tugas. Sebut enam untuk membalas, atau sebut angka lain sesuai panduan.");
            }

            const chatForm = document.getElementById("chatForm");
            const chatContainer = document.getElementById("chatContainer");
            const actionUrl = chatForm.getAttribute("action");

            chatForm.addEventListener("submit", async function(e){
                e.preventDefault();
                if (!messageInput.value.trim() && (!imageInput || !imageInput.files.length) && (!voiceInput || !voiceInput.files.length)) return;

                const btnSubmit = document.getElementById('sendChatBtn'); 
                btnSubmit.disabled = true;
                document.getElementById('sendIcon').classList.add('hidden'); 
                document.getElementById('sendLoading').classList.remove('hidden');

                if(rec) { try { rec.abort(); } catch(e){} }

                const formData = new FormData(this);

                let localAudioUrl = null;
                if (voiceInput && voiceInput.files.length > 0) {
                    localAudioUrl = URL.createObjectURL(voiceInput.files[0]);
                }
                let localImageUrl = null;
                if (imageInput && imageInput.files.length > 0) {
                    const imgElement = document.getElementById('imagePreviewElement');
                    localImageUrl = imgElement ? imgElement.src : null;
                }

                try {
                    const response = await fetch(actionUrl, {
                        method: "POST",
                        headers: {
                            "X-Requested-With": "XMLHttpRequest",
                            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
                            "Accept": "application/json"
                        },
                        body: formData
                    });

                    if (response.status === 401 || response.status === 419) {
                        alert("Sesi berakhir. Silakan login kembali.");
                        window.location.reload(); 
                        return;
                    }

                    const responseData = await response.json();

                    if (response.ok && responseData.success) {
                        this.reset(); window.cancelImage();
                        
                        if(voiceInput) voiceInput.value = '';
                        messageInput.placeholder = "Sebutkan 6 untuk ketik chat..."; 
                        messageInput.disabled = false;
                        messageInput.classList.remove('font-bold', 'text-blue-600', 'bg-blue-100/50', 'rounded-xl', 'px-4');
                        messageInput.classList.add('bg-transparent', 'pl-1', 'sm:pl-8');
                        
                        cancelVoiceBtn.classList.add('hidden');
                        if(uploadImageContainer) uploadImageContainer.classList.remove('hidden');
                        if(recordBtnContainer) recordBtnContainer.classList.remove('hidden');
                        
                        const recordBtn = document.getElementById('recordBtn');
                        if(recordBtn) {
                            recordBtn.classList.remove('hidden', 'text-white', 'bg-red-500', 'animate-pulse', 'border-red-600');
                            recordBtn.classList.add('text-slate-400', 'bg-white', 'sm:bg-transparent');
                        }

                        const d = responseData.diskusi || responseData.data || {};
                        const myRealName = "{{ Auth::guard('mahasiswa')->user()->nama ?? 'Mahasiswa' }}";
                        
                        const myDbFoto = "{{ Auth::guard('mahasiswa')->user()->foto_profil ?? Auth::guard('mahasiswa')->user()->foto ?? '' }}";
                        const fallbackAvatar = `https://ui-avatars.com/api/?name=${encodeURIComponent(myRealName)}&background=2563eb&color=fff`;
                        const myAvatar = myDbFoto ? `/storage/${myDbFoto}` : fallbackAvatar;
                        
                        const uniqueWaveId = 'wave-new-' + Date.now();
                        let mediaHtml = '';
                        
                        const baseStorage = "{{ asset('storage') }}";
                        
                        const finalImgToRender = localImageUrl || (d.image ? `${baseStorage}/${d.image}` : null);
                        if (finalImgToRender) { 
                            mediaHtml += `<img src="${finalImgToRender}" class="mt-1.5 sm:mt-2 rounded-lg sm:rounded-xl max-w-full md:max-w-xs border border-white/20 shadow">`; 
                        }
                        
                        const finalAudioToRender = localAudioUrl || (d.voice ? `${baseStorage}/${d.voice}` : null);
                        if (finalAudioToRender) { 
                            mediaHtml += `
                            <div class="mt-1.5 sm:mt-2 flex items-center gap-2 sm:gap-3 bg-white/20 p-1.5 sm:p-2 rounded-lg sm:rounded-xl backdrop-blur-sm border border-white/30 w-[160px] sm:w-[200px] md:w-[240px]">
                                <button type="button" onclick="togglePlay('${uniqueWaveId}')" id="btn-${uniqueWaveId}" class="w-6 h-6 sm:w-7 sm:h-7 md:w-8 md:h-8 shrink-0 flex items-center justify-center rounded-full bg-white text-blue-600 shadow hover:scale-105 transition-transform text-[8px] sm:text-[10px] md:text-xs">▶</button>
                                <div id="${uniqueWaveId}" class="flex-1 h-3 sm:h-4" data-audio="${finalAudioToRender}"></div>
                            </div>`; 
                        }

                        let msgText = messageInput.value.trim() || d.message || '';
                        let msgHtml = msgText ? `<p class="text-[11px] sm:text-xs md:text-[13px] leading-relaxed font-medium whitespace-pre-wrap break-words">${msgText}</p>` : '';
                        let timeStr = d.time || new Date().getHours().toString().padStart(2,"0") + ":" + new Date().getMinutes().toString().padStart(2,"0");

                        const chatHtml = `
                        <div class="flex justify-end chat-bubble-new safe-fade-in">
                            <div class="flex gap-2 md:gap-3 items-end max-w-[90%] sm:max-w-[85%] md:max-w-[70%] flex-row-reverse">
                                <img src="${myAvatar}" onerror="this.src='${fallbackAvatar}'" class="w-6 h-6 sm:w-8 sm:h-8 md:w-9 md:h-9 rounded-full shrink-0 shadow-sm object-cover border border-slate-100" />
                                <div class="flex flex-col items-end min-w-0">
                                    <p class="text-[8px] sm:text-[9px] md:text-[10px] font-bold mb-1 px-1 text-slate-400">Anda</p>
                                    <div class="p-2.5 sm:p-3 md:p-4 rounded-xl sm:rounded-2xl shadow-sm border bg-blue-600 text-white rounded-tr-none border-blue-700 w-fit max-w-full">
                                        ${msgHtml}
                                        ${mediaHtml}
                                    </div>
                                    <p class="text-[7px] sm:text-[8px] md:text-[9px] mt-1 sm:mt-1.5 px-1 font-bold text-slate-400">${timeStr}</p>
                                </div>
                            </div>
                        </div>`;

                        let emptyChatEl = document.getElementById("emptyChat");
                        if(emptyChatEl) emptyChatEl.remove();

                        chatContainer.insertAdjacentHTML("beforeend", chatHtml);
                        chatContainer.scrollTop = chatContainer.scrollHeight;

                        if(finalAudioToRender) { 
                            setTimeout(() => initWaveSurfer(uniqueWaveId, finalAudioToRender, true), 100); 
                        }
                        
                        menungguKonfirmasiVoiceChat = false;
                        menungguKonfirmasiKirim = false;

                        bicara("Pesan berhasil terkirim. Untuk diskusi dengan dosen: Enam ketik pesan. Tujuh upload gambar. Delapan rekam suara. Sembilan baca riwayat. Nol kembali.");
                        
                    } else {
                        bicara("Maaf, pesan gagal dikirim.");
                    }
                } catch (error) {
                    bicara("Gagal mengirim pesan.");
                } finally {
                    btnSubmit.disabled = false; 
                    document.getElementById('sendLoading').classList.add('hidden'); 
                    document.getElementById('sendIcon').classList.remove('hidden');
                }
            });

            window.addEventListener("load", () => {
                document.body.addEventListener("click", () => {}, { once: true });
                
                setTimeout(() => { 
                    function scrollBottom(){ if(chatContainer) chatContainer.scrollTop = chatContainer.scrollHeight; }
                    scrollBottom();
                    
                    bicara(getPanduanUtama(), () => {
                        const hasVoiceDiskusi = {{ $hasVoiceDiskusi }};
                        const isLastDiskusiFromDosen = {{ $isLastDiskusiFromDosen }}; 

                        if (hasVoiceDiskusi && isLastDiskusiFromDosen) {
                            const waveId = "{{ $lastWaveIdDiskusi }}";
                            if (wavesurfers[waveId]) {
                                let playPromise = wavesurfers[waveId].play();
                                if (playPromise !== undefined) {
                                    playPromise.then(_ => {
                                        document.getElementById('btn-' + waveId).innerHTML = '⏸';
                                    }).catch(error => {
                                        bicara("Ketuk layar sekali untuk memutar pesan suara.");
                                    });
                                }
                            }
                        }
                    }); 
                }, 800);
            });
        </script>
        <x-accessibility-widget />
    </body>
</html>