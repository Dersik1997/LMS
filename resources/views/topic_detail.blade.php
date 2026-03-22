<!DOCTYPE html>
@php
    $materiCount = isset($session->materis) ? $session->materis->count() : 0;
    
    // Internal command ID (Angka)
    $chatStart = max(5, 2 + $materiCount);
    $cmdKetik  = $chatStart;
    $cmdGambar = $chatStart + 1;
    $cmdRekam  = $chatStart + 2;
    $cmdBaca   = $chatStart + 3;

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
        <title>Pertemuan: {{ $session->judul ?? 'Materi' }} | LMS Inklusi UMMI</title>

        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
        
        <script src="https://unpkg.com/wavesurfer.js@7"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.min.js"></script>
        <script src="https://www.youtube.com/iframe_api"></script>

        <style>
            html { scrollbar-gutter: stable; }
            .scrollbar-hide::-webkit-scrollbar { display: none; }
            .scrollbar-hide { -ms-overflow-style: none; scrollbar-width: none; }
            .custom-scrollbar::-webkit-scrollbar { width: 5px; height: 5px; }
            .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
            .custom-scrollbar::-webkit-scrollbar-thumb { background-color: #cbd5e1; border-radius: 20px; }
            .custom-scrollbar::-webkit-scrollbar-thumb:hover { background: #94a3b8; }

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

            /* ANIMASI MATERI AKTIF (EQUALIZER) */
            .materi-active {
                transform: scale(1.02) !important;
                box-shadow: 0 10px 25px -5px rgba(59, 130, 246, 0.4) !important;
                border-color: #60a5fa !important;
                background-color: #eff6ff !important;
                z-index: 10;
            }
            @keyframes eq-bounce {
                0%, 100% { height: 20%; }
                50% { height: 80%; }
            }
            .animate-eq-bounce { animation: eq-bounce 0.8s ease-in-out infinite; }

            @keyframes pulse-border { 0% { border-color: #3b82f6; box-shadow: 0 0 0 0 rgba(59, 130, 246, 0.4); } 70% { border-color: #60a5fa; box-shadow: 0 0 0 6px rgba(59, 130, 246, 0); } 100% { border-color: #3b82f6; box-shadow: 0 0 0 0 rgba(59, 130, 246, 0); } }
            .dictating-active { animation: pulse-border 1.5s infinite; background-color: #eff6ff !important; }
            .confirming-active { background-color: #fef3c7 !important; border-color: #f59e0b !important; }
            .safe-fade-in { animation: popIn 0.4s ease-out forwards; opacity: 0; }
            
            .modal-active { opacity: 1 !important; pointer-events: auto !important; }
            .modal-content-active { transform: scale(1) !important; opacity: 1 !important; }
            .wave-bar { transition: height 0.1s ease; }
        </style>
    </head>
    <body class="m-0 font-['Plus_Jakarta_Sans'] bg-[#f8fafc] min-h-[100dvh] flex flex-col border-box overflow-x-hidden text-slate-800">
        
        <div class="fixed top-0 left-0 w-full h-full overflow-hidden -z-10 pointer-events-none">
            <div class="absolute top-[-10%] right-[-5%] w-64 md:w-[400px] h-64 md:h-[400px] bg-blue-100/40 rounded-full blur-3xl opacity-50"></div>
            <div class="absolute bottom-[-10%] left-[-10%] w-64 md:w-[400px] h-64 md:h-[400px] bg-indigo-50/40 rounded-full blur-3xl opacity-50"></div>
        </div>

        <main class="flex-1 flex flex-col h-full overflow-y-auto custom-scrollbar relative">
            
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
                        <h1 class="text-sm sm:text-base md:text-xl font-extrabold text-slate-900 tracking-tight leading-none truncate pointer-events-auto">{{ $kelas->mataKuliah->nama ?? 'Nama Kelas' }}</h1>
                        <p class="text-[8px] sm:text-[9px] md:text-[10px] font-bold text-blue-600 uppercase tracking-widest mt-1 truncate pointer-events-auto">Pertemuan {{ $session->pertemuan_ke ?? 1 }}: {{ $session->judul ?? 'Materi' }}</p>
                    </div>

                    <div class="flex items-center justify-end gap-1.5 sm:gap-3 pl-2 sm:pl-4 relative z-10 shrink-0 pointer-events-auto">
                        <div class="flex items-center gap-[2px] h-4 w-6 sm:w-10 justify-center" id="wave-container">
                            <div class="wave-bar w-[2px] bg-blue-500 rounded-full h-1 transition-all"></div>
                            <div class="wave-bar w-[2px] bg-blue-400 rounded-full h-1 transition-all"></div>
                            <div class="wave-bar w-[2px] bg-blue-600 rounded-full h-1 transition-all"></div>
                        </div>
                        <span id="status-desc" class="hidden md:block text-[8px] sm:text-[9px] font-black text-slate-400 uppercase tracking-widest text-left w-12 sm:w-20">MENYIAPKAN</span>
                    </div>
                </div>
            </div>

            <div class="max-w-7xl mx-auto w-full px-3 sm:px-4 md:px-8 py-4 sm:py-6 md:py-8 space-y-4 sm:space-y-6 md:space-y-8 pb-20">
                
                {{-- PESAN DOSEN --}}
                <div data-aos="fade-up" data-aos-duration="600" data-menu="1" class="bg-blue-50 border-l-[3px] sm:border-l-4 border-blue-500 rounded-r-[1.5rem] sm:rounded-r-[2rem] p-4 sm:p-6 shadow-sm cursor-pointer hover:bg-blue-100 transition-all group relative active:scale-[0.98]">
                    <div class="absolute right-3 sm:right-4 top-3 sm:top-4 w-6 h-6 sm:w-8 sm:h-8 bg-blue-500 text-white shadow-md rounded-md sm:rounded-lg flex items-center justify-center font-black text-[10px] sm:text-xs pointer-events-none">1</div>
                    <div class="flex items-start gap-3 sm:gap-4 pointer-events-none">
                        <div class="w-8 h-8 sm:w-10 sm:h-10 md:w-12 md:h-12 rounded-full bg-blue-200 flex items-center justify-center shrink-0">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5 md:w-6 md:h-6 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path></svg>
                        </div>
                        <div class="pr-8 sm:pr-10 flex-1">
                            <h3 class="text-[9px] sm:text-[10px] md:text-xs font-black text-blue-800 uppercase tracking-[0.1em] sm:tracking-[0.2em] mb-0.5 sm:mb-1">Pesan Dosen</h3>
                            <p id="text-pengumuman" class="text-xs sm:text-sm md:text-base font-medium text-slate-700 leading-relaxed">{{ $session->instruksi ?? 'Belum ada pesan atau instruksi dari dosen.' }}</p>
                        </div>
                    </div>
                </div>

                {{-- MATERI PEMBELAJARAN --}}
                <div data-aos="fade-up" data-aos-duration="600" data-aos-delay="100" class="bg-white rounded-[1.5rem] sm:rounded-[2rem] md:rounded-[2.5rem] p-4 sm:p-6 md:p-8 border border-slate-200 shadow-sm relative">
                    <div class="flex items-center gap-2 sm:gap-3 mb-4 sm:mb-6 border-b border-slate-100 pb-3 sm:pb-4 pointer-events-none">
                        <svg class="w-5 h-5 sm:w-6 sm:h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                        <h3 class="text-sm sm:text-base md:text-lg font-black text-slate-900 uppercase tracking-widest">Materi Pembelajaran</h3>
                    </div>

                    <div id="materi-container" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-3 sm:gap-4">
                        @forelse($session->materis as $materi)
                            @php
                                $type = $materi->type ?? 'file';
                                $voiceNum = 1 + $loop->iteration; 

                                $config = [
                                    'file'  => [
                                        'label' => 'PDF', 
                                        'bg' => 'bg-blue-50', 'border' => 'border-blue-200', 'text' => 'text-blue-600', 'badge_bg' => 'bg-blue-500',
                                        'hover_border' => 'hover:border-blue-300', 'hover_bg' => 'hover:bg-blue-50'
                                    ],
                                    'text' => [
                                        'label' => 'TEKS', 
                                        'bg' => 'bg-emerald-50', 'border' => 'border-emerald-200', 'text' => 'text-emerald-600', 'badge_bg' => 'bg-emerald-500',
                                        'hover_border' => 'hover:border-emerald-300', 'hover_bg' => 'hover:bg-emerald-50'
                                    ],
                                    'video' => [
                                        'label' => 'VIDEO', 
                                        'bg' => 'bg-red-50', 'border' => 'border-red-200', 'text' => 'text-red-600', 'badge_bg' => 'bg-red-500',
                                        'hover_border' => 'hover:border-red-300', 'hover_bg' => 'hover:bg-red-50'
                                    ],
                                    'link'  => [
                                        'label' => 'YOUTUBE', 
                                        'bg' => 'bg-red-50', 'border' => 'border-red-200', 'text' => 'text-red-600', 'badge_bg' => 'bg-red-500',
                                        'hover_border' => 'hover:border-red-300', 'hover_bg' => 'hover:bg-red-50'
                                    ],
                                    'voice' => [
                                        'label' => 'AUDIO', 
                                        'bg' => 'bg-purple-50', 'border' => 'border-purple-200', 'text' => 'text-purple-600', 'badge_bg' => 'bg-purple-500',
                                        'hover_border' => 'hover:border-purple-300', 'hover_bg' => 'hover:bg-purple-50'
                                    ],
                                    'audio' => [
                                        'label' => 'AUDIO', 
                                        'bg' => 'bg-purple-50', 'border' => 'border-purple-200', 'text' => 'text-purple-600', 'badge_bg' => 'bg-purple-500',
                                        'hover_border' => 'hover:border-purple-300', 'hover_bg' => 'hover:bg-purple-50'
                                    ],
                                ];
                                $ui = $config[$type] ?? $config['file'];
                                
                                $fileUrl = $materi->file ? asset('storage/'.$materi->file) : ($materi->link ? $materi->link : '#');
                                $isYT = ($type === 'link' && (str_contains($materi->link, 'youtu') || str_contains($materi->link, 'youtube'))) ? 'true' : 'false';
                                
                                $textContent = ($type === 'text') ? htmlspecialchars($materi->link ?? $materi->file ?? '') : '';
                            @endphp

                            <div id="materi-{{ $voiceNum }}" data-menu="{{ $voiceNum }}" data-url="{{ $fileUrl }}" data-materi-type="{{ $type }}" data-yt="{{ $isYT }}" data-title="{{ $materi->judul }}" data-text="{{ $textContent }}" class="group border border-slate-100 rounded-xl sm:rounded-2xl p-3 sm:p-4 md:p-5 {{ $ui['hover_border'] }} {{ $ui['hover_bg'] }} transition-all cursor-pointer relative active:scale-[0.98]">
                                <div class="absolute right-3 sm:right-4 top-3 sm:top-4 w-5 h-5 sm:w-6 sm:h-6 {{ $ui['badge_bg'] }} text-white shadow-md rounded-md sm:rounded-lg flex items-center justify-center font-black text-[9px] sm:text-[10px] transition-colors pointer-events-none overflow-hidden">
                                    <span class="badge-text">{{ $voiceNum }}</span>
                                    <div class="materi-playing-wave hidden mini-wave pointer-events-none">
                                        <div class="bar"></div><div class="bar"></div><div class="bar"></div>
                                    </div>
                                </div>
                                <div class="flex flex-row sm:flex-col items-center sm:items-start gap-3 sm:gap-3 pointer-events-none">
                                    <div class="w-10 h-12 sm:w-12 sm:h-14 {{ $ui['bg'] }} rounded-lg border {{ $ui['border'] }} flex items-center justify-center shrink-0 {{ $ui['text'] }} relative overflow-hidden">
                                        <div class="original-icon w-full h-full flex items-center justify-center">
                                            @if($type === 'file')
                                                <span class="text-[8px] sm:text-[9px] font-black uppercase">PDF</span>
                                            @elseif($type === 'text')
                                                <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"/></svg>
                                            @elseif($type === 'video' || $type === 'link')
                                                <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z" /></svg>
                                            @elseif($type === 'voice' || $type === 'audio')
                                                <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z"></path></svg>
                                            @endif
                                        </div>

                                        {{-- ANIMASI EQUALIZER SAAT AUDIO DIMAINKAN --}}
                                        @if($type === 'voice' || $type === 'audio')
                                            <div class="audio-playing-icon hidden absolute inset-0 flex items-center justify-center bg-purple-100 gap-[3px]">
                                                <div class="w-[3px] bg-purple-600 rounded-full animate-eq-bounce" style="animation-delay: 0.1s;"></div>
                                                <div class="w-[3px] bg-purple-600 rounded-full animate-eq-bounce" style="animation-delay: 0.4s;"></div>
                                                <div class="w-[3px] bg-purple-600 rounded-full animate-eq-bounce" style="animation-delay: 0.2s;"></div>
                                                <div class="w-[3px] bg-purple-600 rounded-full animate-eq-bounce" style="animation-delay: 0.5s;"></div>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="flex-1 min-w-0 pr-6 sm:pr-0">
                                        <h4 class="text-xs sm:text-sm font-bold text-slate-800 group-hover:{{ $ui['text'] }} truncate sm:line-clamp-1 sm:whitespace-normal sm:break-words">{{ $materi->judul }}</h4>
                                        <p class="text-[8px] sm:text-[10px] text-slate-400 mt-0.5 sm:mt-1 uppercase tracking-wider">{{ $ui['label'] }} <span class="hidden sm:inline">• Klik Buka</span></p>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-span-1 sm:col-span-2 md:col-span-3 bg-slate-50 border border-dashed border-slate-300 rounded-xl sm:rounded-2xl p-6 sm:p-8 text-center flex flex-col items-center justify-center pointer-events-none">
                                <svg class="w-8 h-8 sm:w-10 sm:h-10 text-slate-300 mb-2 sm:mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                                <h4 class="text-slate-500 font-bold text-xs sm:text-sm">Materi Kosong</h4>
                                <p class="text-[10px] sm:text-xs text-slate-400 mt-1">Dosen belum mengunggah materi untuk sesi ini.</p>
                            </div>
                        @endforelse
                    </div>

                    <div id="module-reader" class="hidden mt-4 sm:mt-6 bg-slate-900 text-slate-200 p-4 sm:p-6 rounded-xl sm:rounded-2xl shadow-2xl animate-fade-in-up relative">
                        <div class="flex justify-between items-center mb-3 sm:mb-4 border-b border-slate-700 pb-3 sm:pb-4">
                            <h3 class="text-[10px] sm:text-xs font-black text-white uppercase tracking-widest flex items-center gap-2">
                                <span class="w-1.5 h-1.5 sm:w-2 sm:h-2 bg-emerald-500 rounded-full animate-pulse"></span> Membaca...
                            </h3>
                            <button onclick="stopBicara()" class="text-[8px] sm:text-[9px] font-bold uppercase bg-red-500/20 text-red-400 px-2.5 py-1 sm:px-3 sm:py-1 rounded-md sm:rounded-lg hover:bg-red-500 hover:text-white transition-all cursor-pointer active:scale-95">Stop</button>
                        </div>
                        <p id="reader-text" class="text-xs sm:text-sm leading-relaxed sm:leading-loose font-medium font-mono h-24 sm:h-32 overflow-y-auto custom-scrollbar whitespace-pre-wrap">Memuat materi...</p>
                    </div>
                </div>

                {{-- RUANG DISKUSI --}}
                <div data-aos="fade-up" data-aos-duration="600" data-aos-delay="200" class="bg-white rounded-[1.5rem] sm:rounded-[2rem] md:rounded-[2.5rem] border border-slate-200 shadow-sm overflow-hidden flex flex-col h-[500px] sm:h-[600px]">
                    <div class="p-4 sm:p-5 md:p-6 md:px-8 border-b border-slate-100 flex flex-col sm:flex-row sm:justify-between sm:items-center gap-2 sm:gap-0 bg-slate-50/30 z-10 pointer-events-none">
                        <div>
                            <h3 class="text-sm sm:text-base md:text-lg font-black text-slate-900 uppercase tracking-tight">Ruang Diskusi</h3>
                            <p class="text-[8px] sm:text-[9px] md:text-[10px] font-bold text-slate-400 uppercase tracking-widest mt-0.5">Tanya jawab sesi ini</p>
                        </div>
                        <span data-menu="{{ $cmdBaca }}" class="w-fit text-[8px] sm:text-[9px] font-bold bg-blue-100 text-blue-700 px-2.5 py-1 sm:px-3 sm:py-1.5 rounded-full flex items-center gap-1.5 cursor-pointer hover:bg-blue-200 transition-colors pointer-events-auto">
                            <span class="bg-blue-500 text-white px-1.5 py-0.5 rounded pointer-events-none">{{ $cmdBaca }}</span> <span class="pointer-events-none">Baca Chat</span>
                        </span>
                    </div>

                    <div id="chatContainer" class="flex-1 p-3 sm:p-4 md:p-6 flex flex-col gap-4 sm:gap-6 overflow-y-auto custom-scrollbar bg-slate-50/30">
                        @forelse($session->discussions->sortBy('created_at') as $diskusi)
                            @php
                                $sender = $diskusi->sender;
                                $loggedInId = Auth::guard('mahasiswa')->id() ?? 0;
                                
                                $isMe = (in_array($diskusi->sender_type, ['mahasiswa', 'App\Models\Mahasiswa'])) && ($diskusi->sender_id == $loggedInId);
                                $isDosen = in_array($diskusi->sender_type, ['dosen', 'App\Models\Dosen']);
                                
                                $namaAsli = $sender->nama ?? 'Mahasiswa';
                                $labelTeks = $isMe ? 'Anda' : ($isDosen ? ($sender->nama ?? 'Dosen') : $namaAsli);
                                $avatarName = $isMe ? $namaAsli : $labelTeks;
                                $avatarBg = $isMe ? '2563eb' : ($isDosen ? 'f59e0b' : '64748b'); 
                                
                                $fotoProfil = $sender->foto_profil ?? $sender->foto ?? null;
                                $fallbackAvatar = "https://ui-avatars.com/api/?name=" . urlencode($avatarName) . "&background=" . $avatarBg . "&color=fff";
                                $avatarUrl = $fotoProfil ? asset('storage/' . $fotoProfil) : $fallbackAvatar;
                            @endphp
                            
                            <div id="msg-{{ $diskusi->id }}" class="flex {{ $isMe ? 'justify-end' : 'justify-start' }} safe-fade-in chat-bubble-new">
                                <div class="flex gap-2 md:gap-3 items-end max-w-[90%] sm:max-w-[85%] md:max-w-[70%] {{ $isMe ? 'flex-row-reverse' : '' }}">
                                    <img src="{{ $avatarUrl }}" onerror="this.src='{{ $fallbackAvatar }}'" class="w-6 h-6 sm:w-8 sm:h-8 md:w-9 md:h-9 rounded-full shrink-0 shadow-sm object-cover border border-slate-100" />
                                    
                                    <div class="flex flex-col {{ $isMe ? 'items-end' : 'items-start' }} w-full min-w-0">
                                        <p class="text-[8px] sm:text-[9px] md:text-[10px] font-bold mb-1 px-1 {{ $isDosen ? 'text-orange-500' : 'text-slate-400' }} truncate max-w-full">
                                            <span class="sender-name">{{ $labelTeks }}</span> 
                                            @if($isDosen)
                                                <span class="bg-orange-100 text-orange-600 px-1 sm:px-1.5 py-0.5 rounded ml-1 text-[7px] sm:text-[8px] uppercase">Dosen</span>
                                            @endif
                                        </p>
                                        
                                        <div class="p-2.5 sm:p-3 md:p-4 rounded-xl sm:rounded-2xl shadow-sm border w-fit max-w-full {{ $isMe ? 'bg-blue-600 text-white rounded-tr-none border-blue-700' : 'bg-white text-slate-800 rounded-tl-none border-slate-200' }}">
                                            @if($diskusi->message)
                                                <p class="text-[11px] sm:text-xs md:text-[13px] leading-relaxed font-medium whitespace-pre-wrap break-words message-text">{{ $diskusi->message }}</p>
                                            @endif
                                            @if(isset($diskusi->image) && $diskusi->image)
                                                <img src="{{ asset('storage/'.$diskusi->image) }}" class="mt-1.5 sm:mt-2 rounded-lg sm:rounded-xl max-w-full md:max-w-xs border {{ $isMe ? 'border-white/20' : 'border-slate-200' }}">
                                            @endif
                                            @if(isset($diskusi->voice) && $diskusi->voice)
                                                <div class="mt-1.5 sm:mt-2 flex items-center gap-2 sm:gap-3 {{ $isMe ? 'bg-white/20 border-white/30' : 'bg-slate-50 border-slate-300' }} p-1.5 sm:p-2 rounded-lg sm:rounded-xl backdrop-blur-sm border w-[160px] sm:w-[200px] md:w-[240px]">
                                                    <button type="button" onclick="togglePlay('wave-{{ $diskusi->id }}')" id="btn-wave-{{ $diskusi->id }}" class="w-6 h-6 sm:w-7 sm:h-7 md:w-8 md:h-8 shrink-0 flex items-center justify-center rounded-full {{ $isMe ? 'bg-white text-blue-600' : 'bg-blue-600 text-white' }} shadow hover:scale-105 transition-transform text-[8px] sm:text-[10px] md:text-xs">▶</button>
                                                    <div id="wave-{{ $diskusi->id }}" class="flex-1 h-3 sm:h-4" data-audio="{{ asset('storage/' . $diskusi->voice) }}"></div>
                                                </div>
                                            @endif
                                        </div>
                                        <p class="text-[7px] sm:text-[8px] md:text-[9px] mt-1 sm:mt-1.5 px-1 font-bold text-slate-400">{{ $diskusi->created_at->format('H:i') }}</p>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div id="emptyChat" class="h-full flex flex-col items-center justify-center text-center opacity-70 pointer-events-none">
                                <div class="w-12 h-12 sm:w-14 sm:h-14 md:w-16 md:h-16 bg-blue-50 text-blue-400 rounded-full flex items-center justify-center mb-3 sm:mb-4 border border-blue-100">
                                    <svg class="w-6 h-6 sm:w-7 sm:h-7 md:w-8 md:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                                </div>
                                <p class="text-xs sm:text-sm text-slate-600 font-bold">Ruang diskusi masih kosong.</p>
                                <p class="text-[8px] sm:text-[9px] md:text-[10px] text-slate-400 uppercase tracking-widest mt-1">Sebut angka navigasi untuk interaksi.</p>
                            </div>
                        @endforelse
                    </div>

                    <div class="p-2 sm:p-3 md:p-4 border-t border-slate-100 bg-white shrink-0 relative z-20 shadow-[0_-4px_10px_rgba(0,0,0,0.02)] pb-4 sm:pb-4">
                        <div id="imagePreviewContainer" class="hidden mb-2 relative p-2 bg-slate-50 border border-slate-200 rounded-xl sm:rounded-2xl w-fit">
                            <img id="imagePreviewElement" src="" class="h-16 sm:h-20 w-auto object-cover rounded-lg sm:rounded-xl shadow-sm border border-slate-200">
                            <button type="button" onclick="cancelImage()" class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full w-5 h-5 flex items-center justify-center font-bold text-[10px] shadow-lg hover:bg-red-600 hover:scale-110 transition-transform">✕</button>
                        </div>

                        <form id="chatForm" action="{{ route('mahasiswa.discussion.store', $session->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="sender_type" value="mahasiswa">
                            <input type="file" name="image" id="imageInput" accept="image/*" class="hidden" onchange="previewImage(this)">
                            <input type="file" name="voice" id="voiceInput" accept="audio/webm" class="hidden">

                            <div class="relative flex items-center gap-1.5 sm:gap-2 md:gap-3 bg-slate-50 p-1.5 sm:p-2 md:p-3 rounded-2xl sm:rounded-[1.25rem] border border-slate-200 focus-within:border-blue-400 focus-within:ring-2 focus-within:ring-blue-100 transition-all shadow-sm w-full">
                                
                                <div id="uploadImageContainer" class="relative shrink-0 flex items-center">
                                    <button data-menu="{{ $cmdGambar }}" type="button" onclick="document.getElementById('imageInput').click()" id="btnUploadImage" class="w-8 h-8 sm:w-9 sm:h-9 md:w-10 md:h-10 rounded-xl flex items-center justify-center text-slate-400 hover:text-blue-600 hover:bg-white transition-all cursor-pointer shadow-sm border border-transparent hover:border-blue-100 bg-white sm:bg-transparent pointer-events-auto">
                                        <svg class="w-4 h-4 sm:w-5 sm:h-5 md:w-6 md:h-6 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    </button>
                                    <span class="absolute -top-1 -right-1 sm:-top-1.5 sm:-right-1.5 bg-slate-900 text-white text-[7px] sm:text-[8px] font-black px-1.5 py-0.5 rounded-md shadow-sm border border-white pointer-events-none">{{ $cmdGambar }}</span>
                                </div>

                                <div id="normalInputWrapper" class="flex-1 min-w-0 relative flex items-center bg-white sm:bg-transparent rounded-xl sm:rounded-none px-2 sm:px-0 shadow-sm sm:shadow-none py-0.5 sm:py-0">
                                    <div class="absolute left-2 text-[8px] sm:text-[10px] font-black text-white bg-slate-900 px-1.5 py-0.5 rounded-md shadow-sm hidden sm:block z-10 pointer-events-none">{{ $cmdKetik }}</div>
                                    <input type="text" name="message" id="messageInput" placeholder="Sebut angka {{ $cmdKetik }} untuk mendikte pesan..." autocomplete="off" class="w-full bg-transparent text-[10px] sm:text-xs md:text-sm font-medium text-slate-700 placeholder-slate-400 focus:outline-none transition-all py-1 sm:py-1.5 pl-1 sm:pl-8 pointer-events-auto" />
                                    
                                    <button type="button" id="cancelVoiceToTextBtn" onclick="batalKetikSuara()" class="hidden absolute right-1 sm:right-2 text-[8px] sm:text-[10px] font-black uppercase text-white bg-red-500 hover:bg-red-600 px-2 py-1 sm:px-2.5 sm:py-1.5 rounded-md sm:rounded-lg shadow-sm transition-all cursor-pointer z-20">BATAL ✕</button>
                                </div>

                                <div id="recordingWrapper" class="hidden flex-1 items-center justify-between px-2 bg-red-50 rounded-lg py-1 sm:py-0 sm:bg-transparent border border-red-100 sm:border-none">
                                    <div class="flex items-center gap-1.5 sm:gap-2 w-full">
                                        <span class="w-2 h-2 sm:w-2.5 sm:h-2.5 bg-red-500 rounded-full animate-pulse shadow-[0_0_8px_rgba(239,68,68,0.8)]"></span>
                                        <span class="text-[9px] sm:text-[10px] md:text-xs font-bold text-red-500 font-mono tracking-wider" id="recordTimer">00:00</span>
                                        <div class="recording-wave flex items-center gap-0.5 sm:gap-1 h-3 sm:h-5 md:h-6 ml-1 sm:ml-2">
                                            <div class="bar"></div><div class="bar"></div><div class="bar"></div><div class="bar"></div><div class="bar"></div><div class="bar"></div>
                                        </div>
                                        <button type="button" id="cancelVoiceBtn" onclick="batalRekamChat()" class="ml-auto text-[8px] sm:text-[10px] font-black uppercase text-white bg-red-500 hover:bg-red-600 px-2 py-1 sm:px-2.5 sm:py-1.5 rounded-md sm:rounded-lg shadow-sm transition-all cursor-pointer z-20">BATAL ✕</button>
                                    </div>
                                </div>

                                <div id="recordBtnContainer" class="relative shrink-0 flex items-center">
                                    <button data-menu="{{ $cmdRekam }}" type="button" id="recordBtn" onclick="window.toggleRekam()" class="w-8 h-8 sm:w-9 sm:h-9 md:w-10 md:h-10 rounded-xl flex items-center justify-center text-slate-400 hover:text-red-500 hover:bg-red-50 transition-all cursor-pointer border border-transparent hover:border-red-100 shadow-sm bg-white sm:bg-transparent pointer-events-auto">
                                        <svg class="w-4 h-4 sm:w-5 sm:h-5 md:w-6 md:h-6 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18.75a6 6 0 006-6v-1.5m-6 7.5a6 6 0 01-6-6v-1.5m6 7.5v3.75m-3.75 0h7.5M12 15.75a3 3 0 01-3-3V4.5a3 3 0 116 0v8.25a3 3 0 01-3 3z"></path></svg>
                                    </button>
                                    <span id="rekamBadgeText" class="absolute -top-1 -right-1 sm:-top-1.5 sm:-right-1.5 bg-slate-900 text-white text-[7px] sm:text-[8px] font-black px-1.5 py-0.5 rounded-md shadow-sm border border-white pointer-events-none">{{ $cmdRekam }}</span>
                                </div>

                                <div class="relative shrink-0 flex items-center ml-0.5 sm:ml-1 md:ml-0">
                                    <button type="submit" id="sendChatBtn" class="w-9 h-8 sm:w-10 sm:h-9 md:w-12 md:h-10 rounded-xl bg-blue-600 text-white flex items-center justify-center hover:bg-blue-700 transition-transform transform hover:scale-105 active:scale-95 shadow-md shadow-blue-200 cursor-pointer pointer-events-auto">
                                        <span id="sendIcon" class="pointer-events-none"><svg class="w-4 h-4 sm:w-4 sm:h-4 md:w-5 md:h-5 transform rotate-90 ml-0.5 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg></span>
                                        <span id="sendLoading" class="hidden pointer-events-none"><svg class="w-4 h-4 sm:w-4 sm:h-4 md:w-5 md:h-5 animate-spin text-white pointer-events-none" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path></svg></span>
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
            pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.worker.min.js';

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

            // INISIALISASI WAVESURFER
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

            // ==========================================
            // LOGIKA VOICE ASSISTANT & SECURE DOUBLE CLICK
            // ==========================================
            const statusDesc = document.getElementById("status-desc");
            const readerBox = document.getElementById("module-reader");
            const readerText = document.getElementById("reader-text");
            const synth = window.speechSynthesis;
            const SpeechRec = window.webkitSpeechRecognition || window.SpeechRecognition;

            let rec = null; 
            let dikteChatRec = null;
            let interval; 
            let waveInterval;
            let previewAudio = null; // Penampung audio preview sebelum dikirim
            let isDictatingChat = false;
            let menungguKonfirmasiKirim = false; 
            let menungguKonfirmasiVoice = false; 
            let jedaKetikTimer = null;
            let isVideoPlaying = false; 
            let ytPlayerInstance = null;
            let isVoicePaused = false;
            let isRecActive = false;
            let isRedirecting = false;
            let isSpeaking = false;
            
            // Variabel untuk melacak materi yang aktif
            let currentActiveMateri = null;

            if (SpeechRec) { 
                rec = new SpeechRec(); 
                rec.lang = "id-ID"; 
                rec.continuous = true; 
                rec.interimResults = true; 
                
                dikteChatRec = new SpeechRec(); 
                dikteChatRec.lang = "id-ID"; 
                dikteChatRec.continuous = true; 
                dikteChatRec.interimResults = false; 
            }

            // --- FUNGSI AKTIFKAN/MATIKAN ANIMASI MATERI & BERSIHKAN MATERI ---
            function tutupSemuaMateri() {
                if(readerBox) readerBox.classList.add("hidden");
                let globalAudio = document.getElementById('globalAudioPlayer');
                if(globalAudio) { globalAudio.pause(); globalAudio.currentTime = 0; }
                if(isVideoPlaying) closeVideoPlayer();
                clearActiveMateri();
            }

            function setActiveMateri(id) {
                clearActiveMateri();
                const el = document.getElementById("materi-" + id);
                if (el) {
                    el.classList.add('materi-active');
                    const origIcon = el.querySelector('.original-icon');
                    const playIcon = el.querySelector('.audio-playing-icon');
                    if (origIcon && playIcon) {
                        origIcon.classList.add('hidden');
                        playIcon.classList.remove('hidden');
                    }
                    currentActiveMateri = id;
                }
            }

            function clearActiveMateri() {
                if (currentActiveMateri) {
                    const el = document.getElementById("materi-" + currentActiveMateri);
                    if (el) {
                        el.classList.remove('materi-active');
                        const origIcon = el.querySelector('.original-icon');
                        const playIcon = el.querySelector('.audio-playing-icon');
                        if (origIcon && playIcon) {
                            origIcon.classList.remove('hidden');
                            playIcon.classList.add('hidden');
                        }
                    }
                    currentActiveMateri = null;
                }
            }
            // ----------------------------------------------

            function setWave(active) {
                if (active) {
                    if (waveInterval) clearInterval(waveInterval);
                    waveInterval = setInterval(() => {
                        document.querySelectorAll(".wave-bar").forEach((bar) => { bar.style.height = `${Math.floor(Math.random() * 16) + 4}px`; });
                    }, 100);
                } else {
                    clearInterval(waveInterval);
                    document.querySelectorAll(".wave-bar").forEach((bar) => (bar.style.height = "4px"));
                }
            }

            // PENDETEKSI DOUBLE-CLICK SECURE (MURNI CUT-OFF SUARA)
            let clickTimer = null;
            const clickDelay = 300; 

            document.body.addEventListener('click', (e) => {
                // Abaikan klik dari elemen form yang punya interaksi native
                const isFormElement = e.target.tagName === 'INPUT' || e.target.tagName === 'TEXTAREA' || e.target.closest('#chatForm') !== null;
                const navElement = e.target.closest('[data-menu]');

                if (clickTimer !== null) {
                    // DOUBLE CLICK DETECTED: Murni matikan suara sistem
                    clearTimeout(clickTimer);
                    clickTimer = null;

                    if (!isRedirecting) {
                        synth.cancel();
                        if (typeof stopBicara === 'function') stopBicara();
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
                    if(navElement && !isFormElement) e.preventDefault();
                } else {
                    // SINGLE CLICK DETECTED
                    if(navElement && !isFormElement) e.preventDefault();

                    clickTimer = setTimeout(() => {
                        clickTimer = null;

                        // Eksekusi navigasi HANYA jika yang diklik punya data-menu 
                        // dan tidak ada aktivitas lain yang menahan form.
                        if (navElement && !isFormElement && !isRedirecting && !isDictatingChat && !menungguKonfirmasiVoice && !menungguKonfirmasiKirim) {
                            const menuId = parseInt(navElement.getAttribute('data-menu'));
                            window.navigasiKe(menuId);
                        }
                    }, clickDelay);
                }
            });

            function mulaiMendengar() {
                if (!rec || isRedirecting || isRecActive || isDictatingChat) return;
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

                setTimeout(() => {
                    const utter = new SpeechSynthesisUtterance(teks);
                    utter.lang = "id-ID";
                    utter.rate = localStorage.getItem("speechRate") ? parseFloat(localStorage.getItem("speechRate")) : 1.0;
                    
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
                        if (!isRedirecting && statusDesc) {
                            statusDesc.innerText = "MENDENGARKAN";
                            statusDesc.classList.replace("text-slate-400", "text-green-600");
                            statusDesc.classList.replace("text-blue-600", "text-green-600");
                        }
                        mulaiMendengar(); 
                    };

                    synth.speak(utter);
                }, 50);
            }

            window.stopBicara = function() {
                synth.cancel();
                tutupSemuaMateri(); 
                
                if(previewAudio) { previewAudio.pause(); previewAudio.currentTime = 0; previewAudio = null; }
                
                isSpeaking = false;
                setWave(false);
                if (statusDesc) {
                    statusDesc.innerText = "MENDENGARKAN";
                    statusDesc.classList.replace("text-blue-600", "text-green-600");
                    statusDesc.classList.replace("text-slate-400", "text-green-600");
                }
            }

            function arahkanSingkat(pesanAwal) {
                bicara(pesanAwal + ". Katakan Ulang, jika butuh panduan.", () => { mulaiMendengar(); });
            }

            async function readPDFText(url) {
                try {
                    let pdf = await pdfjsLib.getDocument(url).promise;
                    let fullText = "";
                    for(let i = 1; i <= pdf.numPages; i++) {
                        let page = await pdf.getPage(i);
                        let textContent = await page.getTextContent();
                        fullText += textContent.items.map(s => s.str).join(" ") + " ";
                    }
                    return fullText.trim() || "Dokumen PDF ini berisi gambar yang tidak dapat dibaca teksnya.";
                } catch(e) {
                    return "Maaf, sistem gagal mengekstrak isi dokumen PDF ini.";
                }
            }

            function openVideoPlayer(url, isYoutube, title) {
                isVideoPlaying = true; 
                ytPlayerInstance = null; 
                
                document.getElementById('videoPlayerTitle').innerText = title || "Video Player";
                const container = document.getElementById('videoPlayerContainer');
                container.innerHTML = '';

                if (isYoutube === 'true' || isYoutube === true || url.includes('youtu')) {
                    let videoId = '';
                    const regExp = /^.*(youtu\.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=|shorts\/)([^#\&\?]*).*/;
                    const match = url.match(regExp);
                    if (match && match[2].length === 11) { videoId = match[2]; } 
                    else { try { let urlObj = new URL(url); videoId = urlObj.searchParams.get("v") || url.split('/').pop(); } catch(e) { videoId = ''; } }
                    
                    let embedUrl = videoId ? `https://www.youtube.com/embed/${videoId}?autoplay=1&rel=0&enablejsapi=1` : url;
                    container.innerHTML = `<iframe id="ytVideoIframe" src="${embedUrl}" class="w-full h-full border-0 absolute top-0 left-0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>`;
                    
                    setTimeout(() => {
                        if (window.YT && window.YT.Player) {
                            ytPlayerInstance = new YT.Player('ytVideoIframe', {
                                events: {
                                    'onReady': function(event) { event.target.playVideo(); },
                                    'onStateChange': function(event) {
                                        if (event.data === YT.PlayerState.ENDED) {
                                            closeVideoPlayer();
                                            arahkanSingkat("Video " + title + " sudah selesai ditonton");
                                        }
                                    }
                                }
                            });
                        }
                    }, 1000);

                } else {
                    container.innerHTML = `<video id="localVideo" controls autoplay class="w-full h-full absolute top-0 left-0 outline-none"><source src="${url}" type="video/mp4">Browser Anda tidak mendukung HTML5 video.</video>`;
                    
                    setTimeout(() => {
                        const vid = document.getElementById("localVideo");
                        if (vid) {
                            vid.play();
                            vid.onended = function() {
                                closeVideoPlayer();
                                arahkanSingkat("Video " + title + " sudah selesai ditonton");
                            };
                        }
                    }, 500);
                }

                const modal = document.getElementById('videoPlayerModal');
                const box = modal.querySelector('.modal-box');
                document.getElementById('modalBackdrop').classList.add('modal-active');
                modal.classList.add('modal-active');
                setTimeout(() => { box.classList.add('modal-content-active'); }, 10);
            }

            window.closeVideoPlayer = function() {
                isVideoPlaying = false; 
                ytPlayerInstance = null;
                
                clearActiveMateri(); 

                const modal = document.getElementById('videoPlayerModal');
                const box = modal.querySelector('.modal-box');
                box.classList.remove('modal-content-active');
                document.getElementById('modalBackdrop').classList.remove('modal-active');
                setTimeout(() => { 
                    modal.classList.remove('modal-active'); 
                    document.getElementById('videoPlayerContainer').innerHTML = ''; 
                }, 300);
            }

            window.batalKetikSuara = function(speak = true) {
                isDictatingChat = false; 
                menungguKonfirmasiKirim = false; 
                clearTimeout(jedaKetikTimer);
                document.getElementById('normalInputWrapper').classList.remove('dictating-active', 'confirming-active');
                document.getElementById('cancelVoiceToTextBtn').classList.add('hidden');
                document.getElementById("messageInput").value = "";
                document.getElementById("messageInput").placeholder = "Sebut angka " + {{ $cmdKetik }} + " untuk mendikte pesan...";
                if(speak) bicara("Dibatalkan. Sebutkan angka " + {{ $cmdKetik }} + " untuk mengulang, atau navigasi lainnya.", () => mulaiMendengar());
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

            window.previewImage = function(input) {
                if (input.files && input.files[0]) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById('imagePreviewElement').src = e.target.result;
                        document.getElementById('imagePreviewContainer').classList.remove('hidden');
                        document.getElementById('imagePreviewContainer').classList.add('inline-block');
                        bicara("Gambar dipilih. Sebut kirim, atau batal.", () => { rec.start(); });
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
            window.cancelImage = function() {
                if(imageInput) imageInput.value = '';
                document.getElementById('imagePreviewContainer').classList.remove('inline-block');
                document.getElementById('imagePreviewContainer').classList.add('hidden');
            }

            let mediaRecorder, audioChunks = [], recordInterval, recordSeconds = 0, mediaStream = null;
            let isCancellingRecord = false;

            function updateTimer() {
                recordSeconds++;
                document.getElementById('recordTimer').innerText = `${String(Math.floor(recordSeconds / 60)).padStart(2, '0')}:${String(recordSeconds % 60).padStart(2, '0')}`;
            }

            // Fungsi toggleRekam dipanggil via klik manual ATAU perintah suara
            window.toggleRekam = async function() {
                if (!mediaRecorder || mediaRecorder.state === "inactive") {
                    try {
                        mediaStream = await navigator.mediaDevices.getUserMedia({ audio: true });
                        mediaRecorder = new MediaRecorder(mediaStream);
                        mediaRecorder.start();
                        
                        normalInputWrapper.classList.add('hidden'); 
                        if(uploadImageContainer) uploadImageContainer.classList.add('hidden');
                        recordingWrapper.classList.remove('hidden'); recordingWrapper.classList.add('flex');
                        
                        recordBtn.classList.remove('text-slate-400', 'bg-white', 'sm:bg-transparent');
                        recordBtn.classList.add('text-white', 'bg-red-500', 'animate-pulse', 'border-red-600');
                        
                        document.getElementById('rekamBadgeText').classList.add('hidden');
                        
                        recordSeconds = 0; document.getElementById('recordTimer').innerText = "00:00";
                        recordInterval = setInterval(updateTimer, 1000);
                        audioChunks = []; mediaRecorder.ondataavailable = event => { audioChunks.push(event.data); };
                        isCancellingRecord = false;
                    } catch(err) { alert("Mikrofon tidak diizinkan!"); }
                } else {
                    mediaRecorder.onstop = () => {
                        if (mediaStream) { mediaStream.getTracks().forEach(track => track.stop()); }
                        
                        recordingWrapper.classList.add('hidden'); recordingWrapper.classList.remove('flex');
                        normalInputWrapper.classList.remove('hidden');
                        if(recordBtnContainer) recordBtnContainer.classList.add('hidden');

                        if(isCancellingRecord) {
                            isCancellingRecord = false;
                            return;
                        }

                        const blob = new Blob(audioChunks, { type: 'audio/webm' });
                        const file = new File([blob], "voice.webm", { type: "audio/webm" });
                        const dataTransfer = new DataTransfer(); dataTransfer.items.add(file); voiceInput.files = dataTransfer.files;
                        
                        messageInput.placeholder = "Suara siap dikirim...";
                        messageInput.disabled = true; 
                        messageInput.classList.add('font-bold', 'text-blue-600', 'bg-blue-100/50', 'rounded-xl', 'px-4');
                        messageInput.classList.remove('bg-transparent', 'pl-1', 'sm:pl-8');
                        
                        cancelVoiceBtn.classList.remove('hidden');

                        // AUTO PLAYBACK CHAT
                        if(previewAudio) { previewAudio.pause(); previewAudio.currentTime = 0; }
                        const audioUrl = URL.createObjectURL(blob);
                        previewAudio = new Audio(audioUrl);
                        previewAudio.play();
                        
                        previewAudio.onended = () => {
                            // Hanya jalankan konfirmasi jika file voice masih terlampir dan belum dikirim
                            if(voiceInput && voiceInput.files.length > 0 && recordBtn.classList.contains('text-slate-400')) {
                                menungguKonfirmasiVoice = true;
                                bicara("Pesan suara telah diputar. Sebut kirim, atau batal.", () => { mulaiMendengar(); });
                            }
                        };
                    };
                    mediaRecorder.stop(); clearInterval(recordInterval);
                }
            }

            window.batalRekamChat = function(speak = true) {
                if(previewAudio) { previewAudio.pause(); previewAudio.currentTime = 0; previewAudio = null; }
                if(mediaRecorder && mediaRecorder.state !== "inactive") mediaRecorder.stop();
                if (mediaStream) { mediaStream.getTracks().forEach(track => track.stop()); mediaStream = null; }
                clearInterval(recordInterval); audioChunks = []; 
                if(voiceInput) voiceInput.value = '';
                
                recordingWrapper.classList.add('hidden'); recordingWrapper.classList.remove('flex');
                normalInputWrapper.classList.remove('hidden'); 
                if(uploadImageContainer) uploadImageContainer.classList.remove('hidden');
                if(recordBtnContainer) recordBtnContainer.classList.remove('hidden');
                
                recordBtn.classList.remove('text-white', 'bg-red-500', 'animate-pulse', 'border-red-600');
                recordBtn.classList.add('text-slate-400', 'bg-white', 'sm:bg-transparent');
                
                document.getElementById('rekamBadgeText').classList.remove('hidden');

                // MENGEMBALIKAN UI KE NORMAL 100%
                messageInput.disabled = false;
                messageInput.value = '';
                messageInput.placeholder = "Sebut angka " + {{ $cmdKetik }} + " untuk mendikte pesan...";
                messageInput.classList.remove('font-bold', 'text-blue-600', 'bg-blue-100/50', 'rounded-xl', 'px-4');
                messageInput.classList.add('bg-transparent', 'pl-1', 'sm:pl-8');
                
                cancelVoiceBtn.classList.add('hidden');
                menungguKonfirmasiVoice = false;

                if (speak) bicara("Perekaman dibatalkan. Sebut angka navigasi untuk interaksi lainnya.", () => mulaiMendengar());
            }

            function getPanduanUtama(isUlang = false) {
                const pertemuanKe = "{{ $session->pertemuan_ke ?? 1 }}";
                const judulSesi = "{{ addslashes($session->judul ?? 'Materi') }}".replace(/[^A-Za-z0-9 \.,\?]/g, '');
                const pesanDosen = document.getElementById("text-pengumuman").innerText.trim();
                
                let teks = `Halaman Pertemuan ke ${pertemuanKe}, ${judulSesi}. `;
                
                if (pesanDosen && pesanDosen !== "Belum ada pesan atau instruksi dari dosen.") {
                    teks += `Pesan dari dosen: ${pesanDosen}. `;
                } else {
                    teks += `Tidak ada pesan dari dosen untuk pertemuan ini. `;
                }
                
                let isAdaMateri = false;
                @if($session->materis && $session->materis->count() > 0)
                    isAdaMateri = true;
                @endif
                
                if(isAdaMateri) {
                    teks += "Materi tersedia: ";
                    @foreach($session->materis as $materi)
                        @php
                            $type = $materi->type ?? 'file';
                            $voiceNum = 1 + $loop->iteration; 
                            $jenis = $type === 'file' ? 'PDF' : ($type === 'text' ? 'Teks' : (($type === 'voice' || $type === 'audio') ? 'Audio' : 'Video'));
                            $judulClean = preg_replace('/[^A-Za-z0-9 \.,\?]/', '', $materi->judul);
                        @endphp
                        teks += "Materi {{ $judulClean }}, berbentuk {{ $jenis }}. Sebut angka {{ $voiceNum }}. ";
                    @endforeach
                } else {
                    teks += "Belum ada materi terlampir di pertemuan ini. ";
                }

                if (!isUlang) {
                    const senderNameDiskusi = "{{ addslashes($senderNameDiskusi) }}";
                    const hasVoiceDiskusi = {{ $hasVoiceDiskusi }};

                    if (senderNameDiskusi !== "Belum ada diskusi") {
                        if (senderNameDiskusi === 'Anda') {
                            if (hasVoiceDiskusi) teks += "Diskusi terakhir dari Anda berupa suara. "; 
                            else teks += "Diskusi terakhir dari Anda berbentuk teks. ";
                        } else {
                            if (hasVoiceDiskusi) teks += `Diskusi terakhir dari ${senderNameDiskusi} berupa suara. Memutar pesan sekarang. `; 
                            else teks += `Diskusi terakhir dari ${senderNameDiskusi} berbentuk teks. `;
                        }
                    }
                }

                teks += "Sebut angka " + {{ $cmdKetik }} + " untuk mendikte pesan, " + {{ $cmdGambar }} + " untuk upload gambar, " + {{ $cmdRekam }} + " merekam suara. " + {{ $cmdBaca }} + " dengar riwayat chat. Nol kembali. Katakan Ulang, untuk mendengar panduan ini kembali.";
                return teks;
            }

            window.navigasiKe = function(nomor) {
                if (isRedirecting || isDictatingChat) return;
                let teks = ""; let tujuan = "";

                if (nomor === 0) {
                    tujuan = "{{ route('course.detail', $kelas->id) }}";
                    teks = "Nol. Kembali ke Menu Utama Pembelajaran.";
                } else if (nomor === 1) {
                    let pesanBersih = document.getElementById("text-pengumuman").innerText.replace(/[^A-Za-z0-9 \.,\?]/g, '');
                    teks = "Satu. Pesan Dosen: " + pesanBersih;
                } 
                else if (nomor >= 2 && nomor < {{ 2 + $materiCount }}) {
                    if (currentActiveMateri === nomor) {
                        tutupSemuaMateri();
                        arahkanSingkat("Materi ditutup.");
                        return;
                    }

                    tutupSemuaMateri();

                    let el = document.getElementById("materi-" + nomor);
                    if(el) {
                        let type = el.getAttribute("data-materi-type");
                        let url = el.getAttribute("data-url");
                        let isYt = el.getAttribute("data-yt");
                        let title = el.getAttribute("data-title").replace(/[^A-Za-z0-9 \.,\?]/g, '');
                        let textContent = el.getAttribute("data-text");

                        setActiveMateri(nomor); 

                        if (type === 'file') {
                            readerBox.classList.remove("hidden");
                            readerText.innerText = "Mengekstrak teks asli PDF, mohon tunggu sebentar...";
                            bicara("Mengekstrak isi file PDF " + title + ", mohon tunggu.", () => {
                                readPDFText(url).then(extractedText => {
                                    readerText.innerText = extractedText; 
                                    bicara(extractedText, () => { 
                                        clearActiveMateri(); 
                                        arahkanSingkat("Selesai membaca materi PDF " + title); 
                                    });
                                });
                            });
                            return;
                        } else if (type === 'text') {
                            readerBox.classList.remove("hidden");
                            readerText.innerText = textContent;
                            bicara("Membacakan materi teks " + title + ". " + textContent, () => {
                                clearActiveMateri(); 
                                arahkanSingkat("Selesai membaca materi teks " + title);
                            });
                            return;
                        } else if (type === 'video' || type === 'link') {
                            teks = "Membuka video " + title + ". Sebutkan stop untuk jeda, lanjut untuk memutar, atau selesai untuk menutup.";
                            bicara(teks, () => { openVideoPlayer(url, isYt, title); mulaiMendengar(); });
                            return;
                        } else if (type === 'voice' || type === 'audio') {
                            teks = "Memutar audio " + title + ".";
                            bicara(teks, () => {
                                let player = document.getElementById('globalAudioPlayer');
                                player.src = url; player.play(); 
                                player.onended = () => { 
                                    clearActiveMateri(); 
                                    arahkanSingkat("Pemutaran audio selesai"); 
                                };
                                mulaiMendengar();
                            });
                            return;
                        }
                    } else { teks = "Materi tidak ditemukan."; }
                } 
                else if (nomor === {{ $cmdKetik }}) {
                    isDictatingChat = true; menungguKonfirmasiKirim = false;
                    document.getElementById('normalInputWrapper').classList.add('dictating-active');
                    document.getElementById('normalInputWrapper').classList.remove('confirming-active');
                    document.getElementById('cancelVoiceToTextBtn').classList.remove('hidden');
                    document.getElementById("messageInput").value = "";
                    document.getElementById("messageInput").placeholder = "Mendengarkan teks...";
                    teks = "Silakan berbicara untuk mendikte pesan diskusi.";
                    bicara(teks, () => { dikteChatRec.start(); }); return;
                } else if (nomor === {{ $cmdGambar }}) {
                    teks = "Membuka galeri. Pilih gambar, lalu sebutkan kirim.";
                    bicara(teks, () => { document.getElementById('imageInput').click(); mulaiMendengar(); });
                    return;
                } else if (nomor === {{ $cmdRekam }}) {
                    if (!mediaRecorder || mediaRecorder.state === "inactive") {
                        teks = "Merekam suara. Silakan bicara setelah bip. Sebutkan selesai jika sudah beres.";
                        bicara(teks, () => { 
                            window.toggleRekam(); 
                            setTimeout(() => { mulaiMendengar(); }, 500);
                        });
                        return;
                    } else {
                        window.toggleRekam(); 
                        return;
                    }
                } else if (nomor === {{ $cmdBaca }}) {
                    let chats = document.querySelectorAll('#chatContainer .chat-bubble-new');
                    if(chats.length === 0) {
                        bicara("Belum ada diskusi di ruang ini.", () => { mulaiMendengar(); });
                    } else {
                        bacaRiwayatChatAsync(chats);
                    }
                    return; 
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
                        setTimeout(() => { window.location.href = tujuan; }, 400); 
                    } else {
                        bicara(teks, () => {
                            mulaiMendengar(); 
                        });
                    }
                }
            }

            if (rec) {
                rec.onresult = (event) => {
                    if (isRedirecting || isDictatingChat) return;

                    let hasil = "";
                    for (let i = event.resultIndex; i < event.results.length; ++i) {
                        hasil += event.results[i][0].transcript;
                    }
                    hasil = hasil.toLowerCase().trim();

                    if (isVideoPlaying) {
                        if (hasil.includes("selesai") || hasil.includes("tutup") || hasil.includes("kembali")) {
                            closeVideoPlayer(); arahkanSingkat("Video berhasil ditutup");
                        } 
                        else if (hasil.includes("stop") || hasil.includes("berhenti") || hasil.includes("jeda")) {
                            if (ytPlayerInstance && typeof ytPlayerInstance.pauseVideo === 'function') ytPlayerInstance.pauseVideo();
                            else { const localVid = document.getElementById("localVideo"); if(localVid) localVid.pause(); }
                            bicara("Video dijeda.", () => { mulaiMendengar(); });
                        }
                        else if (hasil.includes("lanjut") || hasil.includes("putar") || hasil.includes("play")) {
                            if (ytPlayerInstance && typeof ytPlayerInstance.playVideo === 'function') ytPlayerInstance.playVideo();
                            else { const localVid = document.getElementById("localVideo"); if(localVid) localVid.play(); }
                        }
                        return; 
                    }

                    // ANTI ECHO PINTAR
                    const omonganBot = [
                        "halaman pertemuan", "pesan dosen", "materi tersedia",
                        "berbentuk pdf", "berbentuk video", "berbentuk teks", "sebutkan", "untuk membuka",
                        "diskusi terakhir", "dari anda", "berupa suara", "memutar pesan sekarang",
                        "untuk mendikte pesan", "upload gambar", "rekam suara", "dengarkan riwayat chat",
                        "katakan ulang", "mengekstrak isi file", "membacakan materi", "membuka video",
                        "memutar audio", "selesai membaca", "sudah selesai ditonton", "pemutaran audio selesai",
                        "membacakan riwayat", "pesan yang anda ketik", "suara disimpan", "pesan berhasil terkirim",
                        "dibatalkan", "mengetik ulang", "merekam ulang", "pesan dari dosen", "tidak ada pesan dari dosen", "kembali ke menu utama"
                    ];

                    if (omonganBot.some(kalimat => hasil.includes(kalimat))) {
                        return;
                    }

                    prosesJawaban(hasil);
                };

                rec.onend = () => { 
                    isRecActive = false;
                    if (!isRedirecting && !isDictatingChat && !isVoicePaused) mulaiMendengar(); 
                };
            }

            function prosesJawaban(hasil) {
                // LOGIKA 1: PERINTAH "KIRIM" (Saat sedang menunggu konfirmasi)
                if (menungguKonfirmasiKirim || menungguKonfirmasiVoice || hasil.includes("kirim")) {
                    if (hasil.includes("kirim") || hasil.includes("ya") || hasil.includes("iya")) { 
                        const textVal = document.getElementById("messageInput").value.trim();
                        const imgVal = document.getElementById("imageInput").files.length;
                        const voiceVal = document.getElementById("voiceInput").files.length;

                        if (textVal !== "" || imgVal > 0 || voiceVal > 0) {
                            menungguKonfirmasiKirim = false;
                            menungguKonfirmasiVoice = false;
                            synth.cancel();
                            document.getElementById('normalInputWrapper').classList.remove('confirming-active');
                            document.getElementById('cancelVoiceToTextBtn').classList.add('hidden');
                            document.getElementById("sendChatBtn").click(); 
                        } else {
                            bicara("Pesan kosong. Sebut angka navigasi untuk merekam atau mengetik.", () => mulaiMendengar());
                        }
                        return; 
                    }
                }

                // LOGIKA 2: BATALKAN PROSES (Dikte atau Rekaman)
                if (hasil.includes("batal") || hasil.includes("batalkan") || hasil.includes("tidak")) { 
                    if(isDictatingChat || menungguKonfirmasiKirim) { window.batalKetikSuara(true); return; }
                    if((mediaRecorder && mediaRecorder.state !== "inactive") || menungguKonfirmasiVoice) { window.batalRekamChat(true); return; }
                }

                // LOGIKA 3: SEDANG MEREKAM SUARA LALU MENGUCAPKAN "SELESAI"
                if (mediaRecorder && mediaRecorder.state !== "inactive") {
                    if (hasil.includes("selesai") || hasil.includes("berhenti")) {
                        window.toggleRekam();
                        return;
                    }
                }

                // Hentikan suara bot jika pengguna berkata Stop / Berhenti
                if(hasil.includes("stop") || hasil.includes("berhenti") || hasil.includes("diam")) {
                    stopBicara(); mulaiMendengar(); return;
                }

                if(hasil.includes("ulang") || hasil.includes("panduan") || hasil.includes("bantuan")) {
                    synth.cancel(); if(rec) rec.abort();
                    bicara(getPanduanUtama(true), () => { mulaiMendengar(); });
                    return;
                }

                const angka = hasil.match(/\d+/);
                if (angka) {
                    let val = parseInt(angka[0]);
                    synth.cancel(); if(rec) rec.abort(); window.navigasiKe(val); return;
                }
                
                // Deteksi Pengejaan Kata Angka
                const kataAngka = {
                    "nol": 0, "kosong": 0, "satu": 1, "sato": 1, "sate": 1,
                    "dua": 2, "tua": 2, "jua": 2, "tiga": 3, "empat": 4, "lima": 5,
                    "enam": 6, "tujuh": 7, "tuju": 7, "delapan": 8, "sembilan": 9,
                    "sepuluh": 10, "sebelas": 11, "dua belas": 12, "tiga belas": 13,
                    "empat belas": 14, "lima belas": 15, "enam belas": 16, 
                    "tujuh belas": 17, "delapan belas": 18, "sembilan belas": 19, "dua puluh": 20
                };

                for (let kata in kataAngka) {
                    if (hasil.includes(kata)) {
                        synth.cancel(); if(rec) rec.abort(); window.navigasiKe(kataAngka[kata]); return;
                    }
                }
            }

            // Dictation for Chat Teks (TIDAK BERULANG)
            if(dikteChatRec) {
                dikteChatRec.onresult = (event) => {
                    if (!isDictatingChat) return;
                    
                    let newTxt = event.results[event.results.length - 1][0].transcript.trim();

                    if (newTxt.toLowerCase() === "batal" || newTxt.toLowerCase() === "batalkan") { 
                        window.batalKetikSuara(true); return; 
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
                        bicara(`Pesan yang Anda ketik: ${teksBaca}. Sebut kirim, atau batal.`, () => { mulaiMendengar(); });
                    }, 2500); 
                };
                dikteChatRec.onerror = () => { if (isDictatingChat) { window.batalKetikSuara(true); } };
                dikteChatRec.onend = () => { if(isDictatingChat) dikteChatRec.start(); };
            }

            // Fungsi Baca Histori Chat
            async function bacaRiwayatChatAsync(chats) {
                if(rec) { try { rec.abort(); } catch(e){} }

                const speakAsync = (text) => new Promise(resolve => {
                    synth.cancel();
                    let utter = new SpeechSynthesisUtterance(text);
                    utter.lang = "id-ID";
                    utter.rate = parseFloat(localStorage.getItem("speechRate")) || 1.0;
                    utter.onstart = () => { 
                        if (statusDesc) {
                            statusDesc.innerText = "BERBICARA...";
                            statusDesc.classList.replace("text-slate-400", "text-blue-600");
                            statusDesc.classList.replace("text-green-600", "text-blue-600");
                        }
                        interval = setInterval(() => setWave(true), 150); 
                    };
                    utter.onend = () => { clearInterval(interval); setWave(false); resolve(); };
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
                        await speakAsync(sender + " bilang, " + msgText);
                    } else if (waveEl) {
                        await speakAsync(sender + " mengirim pesan suara.");
                    } else {
                        await speakAsync(sender + " mengirim lampiran gambar.");
                    }

                    if (waveEl) {
                        await playAudioAsync(waveEl.id);
                    }
                    
                    await new Promise(r => setTimeout(r, 500));
                }

                await speakAsync("Selesai membacakan diskusi tugas.");
                arahkanSingkat("Pembacaan riwayat selesai");
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

                isVoicePaused = true;
                if(rec) { try { rec.abort(); } catch(e){} }
                if(previewAudio) { previewAudio.pause(); previewAudio.currentTime = 0; previewAudio = null; }

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
                        this.reset(); 
                        window.cancelImage();
                        
                        if(voiceInput) voiceInput.value = '';
                        if(mediaRecorder && mediaRecorder.state !== "inactive") mediaRecorder.stop();
                        if(mediaStream) { mediaStream.getTracks().forEach(track => track.stop()); mediaStream = null; }
                        clearInterval(recordInterval); audioChunks = []; 
                        
                        recordingWrapper.classList.add('hidden'); recordingWrapper.classList.remove('flex');
                        normalInputWrapper.classList.remove('hidden'); 
                        if(uploadImageContainer) uploadImageContainer.classList.remove('hidden');
                        if(recordBtnContainer) recordBtnContainer.classList.remove('hidden');
                        
                        recordBtn.classList.remove('text-white', 'bg-red-500', 'animate-pulse', 'border-red-600');
                        recordBtn.classList.add('text-slate-400', 'bg-white', 'sm:bg-transparent');
                        document.getElementById('rekamBadgeText').classList.remove('hidden');
                        
                        messageInput.disabled = false;
                        messageInput.placeholder = "Sebut angka " + {{ $cmdKetik }} + " untuk mendikte pesan..."; 
                        messageInput.classList.remove('font-bold', 'text-blue-600', 'bg-blue-100/50', 'rounded-xl', 'px-4');
                        messageInput.classList.add('bg-transparent', 'pl-1', 'sm:pl-8');
                        
                        cancelVoiceBtn.classList.add('hidden');
                        document.getElementById('normalInputWrapper').classList.remove('dictating-active', 'confirming-active');
                        document.getElementById('cancelVoiceToTextBtn').classList.add('hidden');

                        const d = responseData.diskusi || responseData.data || {};
                        const myRealName = "{{ Auth::guard('mahasiswa')->user()->nama ?? 'Mahasiswa' }}";
                        
                        const myDbFoto = "{{ Auth::guard('mahasiswa')->user()->foto_profil ?? Auth::guard('mahasiswa')->user()->foto ?? '' }}";
                        const fallbackAvatar = `https://ui-avatars.com/api/?name=${encodeURIComponent(myRealName)}&background=2563eb&color=fff`;
                        const myAvatar = myDbFoto ? `/storage/${myDbFoto}` : fallbackAvatar;
                        
                        const uniqueWaveId = 'wave-new-' + Date.now();
                        let mediaHtml = '';
                        
                        const finalImgToRender = localImageUrl || (d.image ? getMediaUrl(d.image) : null);
                        if (finalImgToRender) { 
                            mediaHtml += `<img src="${finalImgToRender}" class="mt-1.5 sm:mt-2 rounded-lg sm:rounded-xl max-w-full md:max-w-xs border border-white/20 shadow">`; 
                        }
                        
                        const finalAudioToRender = localAudioUrl || (d.voice ? getMediaUrl(d.voice) : null);
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
                        
                        menungguKonfirmasiVoice = false;
                        menungguKonfirmasiKirim = false;
                        isVoicePaused = false;

                        bicara("Pesan berhasil terkirim. Sebutkan angka navigasi untuk perintah lainnya.", () => { mulaiMendengar(); });
                        
                    } else {
                        isVoicePaused = false;
                        bicara("Maaf, pesan gagal dikirim.", () => { mulaiMendengar(); });
                    }
                } catch (error) {
                    isVoicePaused = false;
                    bicara("Gagal mengirim pesan.", () => { mulaiMendengar(); });
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
                                        bicara("Ketuk layar sekali untuk memutar pesan suara.", () => { mulaiMendengar(); });
                                    });
                                }
                            } else { mulaiMendengar(); }
                        } else {
                            mulaiMendengar(); 
                        }
                    }); 
                }, 800);
            });
        </script>
        <script defer src="https://accessibility-widget.pages.dev/js/app.js"></script>
    </body>
</html>