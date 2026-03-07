<!DOCTYPE html>
<html lang="id" class="h-full">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Periksa Tugas | Portal Dosen</title>
        
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&display=swap" rel="stylesheet" />
        <script src="https://unpkg.com/wavesurfer.js@7"></script>

        <style>
            html { scroll-behavior: smooth; }
            .scrollbar-hide::-webkit-scrollbar { display: none; }
            .scrollbar-hide { -ms-overflow-style: none; scrollbar-width: none; }
            .custom-scrollbar::-webkit-scrollbar { width: 5px; height: 5px; }
            .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
            .custom-scrollbar::-webkit-scrollbar-thumb { background-color: #cbd5e1; border-radius: 20px; }
            .custom-scrollbar::-webkit-scrollbar-thumb:hover { background-color: #94a3b8; }
            
            #chat-wrapper { transition: transform 0.3s ease, box-shadow 0.3s ease, border-radius 0.3s ease; }
            .chat-expanded {
                position: fixed !important; top: 50% !important; left: 50% !important; transform: translate(-50%, -50%) !important;
                z-index: 9999 !important; height: 90vh !important; width: 90vw !important; max-width: 1200px !important;
                box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5) !important; display: flex !important; flex-direction: column !important;
                border-radius: 1.5rem !important;
            }

            #chat-overlay { display: none; position: fixed; inset: 0; background: rgba(15, 23, 42, 0.6); backdrop-filter: blur(8px); z-index: 9998; }
            #chat-overlay.active { display: block; }

            @keyframes wave-bounce { 0%, 100% { height: 3px; } 50% { height: 12px; } }
            .recording-wave .bar { width: 3px; background-color: #ef4444; border-radius: 99px; animation: wave-bounce 1s ease-in-out infinite; }
            .recording-wave .bar:nth-child(1) { animation-delay: 0.0s; height: 6px;}
            .recording-wave .bar:nth-child(2) { animation-delay: 0.2s; height: 10px;}
            .recording-wave .bar:nth-child(3) { animation-delay: 0.4s; height: 12px;}
            .recording-wave .bar:nth-child(4) { animation-delay: 0.1s; height: 8px;}
            .recording-wave .bar:nth-child(5) { animation-delay: 0.3s; height: 10px;}
            
            @keyframes popIn { 0% { opacity: 0; transform: translateY(15px) scale(0.95); } 100% { opacity: 1; transform: translateY(0) scale(1); } }
            .chat-bubble-new { animation: popIn 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards; }
        </style>
    </head>
    <body class="m-0 font-['Plus_Jakarta_Sans'] bg-[#f8fafc] min-h-screen flex flex-col border-box overflow-x-hidden text-slate-800 selection:bg-blue-200 relative">
        
        <div id="chat-overlay" onclick="toggleChat()"></div>

        <main class="flex-1 flex flex-col relative w-full pb-10">
            
            {{-- NAVBAR (Dicabut AOS agar tidak hilang di mobile) --}}
            <div class="bg-white/90 backdrop-blur-2xl border-b border-slate-200/60 sticky top-0 z-40 px-3 sm:px-4 md:px-8 py-3 shadow-sm transition-all w-full shrink-0">
                <div class="max-w-7xl mx-auto flex flex-wrap sm:flex-nowrap items-center justify-between relative gap-3 sm:gap-0">
                    
                    {{-- Tombol Back --}}
                    <div class="flex items-center gap-4 relative z-10 justify-start shrink-0">
                        <a href="{{ route('dosen.course.assignments', $kelas->id) }}" class="w-10 h-10 md:w-12 md:h-12 rounded-full bg-slate-100 hover:bg-blue-600 text-slate-500 hover:text-white flex items-center justify-center transition-all duration-300 shadow-sm shrink-0 group border border-slate-200 hover:border-blue-600 active:scale-95">
                            <svg class="w-5 h-5 md:w-6 md:h-6 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path>
                            </svg>
                        </a>
                    </div>
                    
                    {{-- Title Center (Mobile diubah letaknya agar sejajar) --}}
                    <div class="flex-1 min-w-[150px] flex flex-col justify-center items-center text-center mx-2 overflow-hidden">
                        <h1 class="text-sm sm:text-lg md:text-2xl font-black text-slate-900 tracking-tight leading-tight truncate w-full">
                            {{ $assignment->judul ?? 'Tugas' }}
                        </h1>
                        <div class="flex items-center justify-center gap-1.5 mt-1">
                            <span class="text-[8px] md:text-[10px] font-bold text-blue-600 uppercase tracking-widest bg-blue-100 px-1.5 py-0.5 rounded-md truncate max-w-[100px] md:max-w-full">
                                {{ $kelas->mataKuliah->nama ?? 'Kelas' }}
                            </span>
                            <span class="text-[9px] md:text-[11px] font-bold text-slate-400 uppercase tracking-wider truncate">
                                {{ $assignment ? $assignment->submissions()->count() : 0 }}/{{ $mahasiswas->count() }} Terkumpul
                            </span>
                        </div>
                    </div>
                    
                    {{-- Navigasi Mahasiswa (Next/Prev) --}}
                    <div class="flex items-center gap-1 sm:gap-2 relative z-10 shrink-0 ml-auto sm:ml-0">
                        @php
                            $index = $mahasiswas->search(fn($m) => $m->id == $activeMahasiswaId);
                            if($index === false) { $index = 0; }
                            $prev = $mahasiswas->get($index - 1);
                            $next = $mahasiswas->get($index + 1);
                        @endphp
                        
                        <a href="{{ $prev ? route('dosen.assignment.grade', [$kelas->id, $assignment->id, $prev->id]) : '#' }}" class="p-2 sm:px-3 md:px-4 sm:py-2 bg-white border border-slate-200 rounded-xl text-[10px] md:text-xs font-bold text-slate-600 hover:bg-slate-50 transition-all flex items-center gap-1 md:gap-2 active:scale-95 {{ !$prev ? 'opacity-50 pointer-events-none' : '' }}">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                            <span class="hidden md:inline">Prev</span>
                        </a>
                        
                        <div class="hidden sm:block text-[10px] md:text-xs font-bold text-slate-400 uppercase tracking-widest px-1 md:px-2 whitespace-nowrap">
                            {{ $index + 1 }} / {{ $mahasiswas->count() }}
                        </div>
                        
                        <a href="{{ $next ? route('dosen.assignment.grade', [$kelas->id, $assignment->id, $next->id]) : '#' }}" class="p-2 sm:px-3 md:px-4 sm:py-2 bg-slate-900 text-white rounded-xl text-[10px] md:text-xs font-bold hover:bg-blue-600 transition-all flex items-center gap-1 md:gap-2 shadow-lg active:scale-95 {{ !$next ? 'opacity-50 pointer-events-none' : '' }}">
                            <span class="hidden md:inline">Next</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </a>
                    </div>
                </div>
            </div>

            {{-- GRID LAYOUT UTAMA --}}
            <div class="max-w-7xl mx-auto w-full p-3 sm:p-4 md:p-8 flex flex-col lg:grid lg:grid-cols-12 gap-4 lg:gap-6">
                
                {{-- KOLOM 1: LIST MAHASISWA (Order 1, Swipe horizontal di Mobile) --}}
                <div class="order-1 lg:col-span-3 bg-white rounded-[1.5rem] lg:rounded-[2rem] border border-slate-200 shadow-sm flex flex-col overflow-hidden lg:sticky lg:top-[100px] lg:h-[calc(100vh-130px)] shrink-0" data-aos="fade-right" data-aos-duration="600">
                    
                    {{-- Search (Hanya di Desktop untuk hemat tempat di HP) --}}
                    <div class="p-4 border-b border-slate-100 bg-slate-50/50 hidden lg:block">
                        <input type="text" onkeyup="filterMahasiswa(this.value)" placeholder="Cari..." class="w-full bg-white border border-slate-200 rounded-xl px-4 py-2.5 text-xs font-bold focus:ring-2 focus:ring-blue-100 outline-none" />
                    </div>
                    
                    {{-- Title Mobile --}}
                    <div class="px-4 py-3 border-b border-slate-100 bg-slate-50/50 lg:hidden flex justify-between items-center">
                        <h3 class="text-[10px] font-black text-slate-800 uppercase tracking-widest">Daftar Mahasiswa</h3>
                        <span class="text-[9px] text-slate-400 font-bold bg-white px-2 py-1 rounded-lg border border-slate-200">{{ $index + 1 }} / {{ $mahasiswas->count() }}</span>
                    </div>

                    {{-- List Scroll Horizontal/Vertical --}}
                    <div class="flex flex-row lg:flex-col overflow-x-auto lg:overflow-y-auto custom-scrollbar p-2 gap-2 lg:gap-0 lg:space-y-1">
                        @foreach ($mahasiswas as $mhs)
                        <a href="{{ route('dosen.assignment.grade', [$kelas->id, $assignment->id, $mhs->id]) }}" class="mahasiswa-item block shrink-0 w-[220px] lg:w-auto" data-name="{{ strtolower($mhs->nama) }}">
                            <div class="p-2 sm:p-3 {{ $activeMahasiswaId == $mhs->id ? 'bg-blue-50 border-blue-200 shadow-sm' : 'border-transparent bg-slate-50 lg:bg-transparent' }} border rounded-xl flex items-center gap-3 transition-all h-full hover:bg-slate-100">
                                <img src="{{ $mhs->foto ? asset('storage/'.$mhs->foto) : 'https://ui-avatars.com/api/?name='.urlencode($mhs->nama).'&background=64748b&color=fff' }}" class="w-8 h-8 rounded-full object-cover shrink-0" />
                                <div class="flex-1 min-w-0">
                                    <h4 class="text-[11px] sm:text-xs font-bold truncate">{{ $mhs->nama }}</h4>
                                    <p class="text-[8px] sm:text-[9px] font-bold mt-0.5 {{ $mhs->status_pengumpulan === 'tepat_waktu' ? 'text-blue-600' : 'text-red-500' }} uppercase truncate">{{ $mhs->status_label ?? 'Belum' }}</p>
                                </div>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>

                {{-- KOLOM 2: PREVIEW TUGAS (Order 2) --}}
                <div class="order-2 lg:col-span-6 bg-slate-900 rounded-[1.5rem] lg:rounded-[2rem] shadow-xl flex flex-col overflow-hidden relative border border-slate-800 h-[500px] lg:h-[calc(100vh-130px)] shrink-0" data-aos="fade-up" data-aos-duration="600" data-aos-delay="100">
                    
                    {{-- Header Preview --}}
                    <div class="p-4 sm:p-5 border-b border-slate-800 bg-slate-900/90 z-10 flex justify-between items-center shrink-0">
                        <div>
                            <h3 class="text-white font-black text-xs sm:text-sm uppercase tracking-widest">Lembar Jawaban</h3>
                            <p class="text-slate-400 text-[9px] sm:text-[10px] font-bold mt-1 truncate max-w-[180px] sm:max-w-none">{{ $activeMahasiswa->nama ?? 'Mahasiswa' }}</p>
                        </div>
                        @if($submission && ($submission->file_path || $submission->text_online || $submission->text_submission || $submission->voice_url || $submission->voice_submission))
                            <span class="bg-emerald-500/20 text-emerald-400 border border-emerald-500/30 px-2 sm:px-3 py-1 rounded-full text-[9px] sm:text-[10px] font-bold uppercase tracking-wider shrink-0">Terkumpul</span>
                        @endif
                    </div>

                    {{-- Konten Preview --}}
                    <div class="flex-1 flex flex-col p-4 md:p-6 overflow-y-auto custom-scrollbar space-y-4 md:space-y-5 bg-[#0f172a]">
                        @php
                            $teks = $submission ? ($submission->text_online ?? $submission->text_submission) : null;
                            $voice = $submission ? ($submission->voice_url ?? $submission->voice_submission) : null;
                            $file = $submission ? $submission->file_path : null;
                        @endphp

                        @if ($submission && ($file || $teks || $voice))
                            
                            {{-- 1. UI KHUSUS JAWABAN TEKS --}}
                            @if($teks)
                            <div class="bg-slate-800 border border-slate-700 rounded-xl md:rounded-2xl p-4 md:p-5 shrink-0 shadow-lg">
                                <div class="flex items-center gap-2 mb-3 border-b border-slate-700 pb-3">
                                    <div class="w-7 h-7 md:w-8 md:h-8 rounded-lg bg-blue-500/20 text-blue-400 flex items-center justify-center shrink-0">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"></path></svg>
                                    </div>
                                    <h3 class="text-[10px] md:text-xs font-black text-slate-300 uppercase tracking-widest">Teks Jawaban</h3>
                                </div>
                                <div class="text-xs md:text-sm font-medium text-slate-200 leading-relaxed whitespace-pre-wrap">{{ $teks }}</div>
                            </div>
                            @endif

                            {{-- 2. UI KHUSUS JAWABAN VOICE NOTE --}}
                            @if($voice)
                            <div class="bg-slate-800 border border-slate-700 rounded-xl md:rounded-2xl p-4 md:p-5 shrink-0 w-full sm:w-[350px] shadow-lg">
                                <div class="flex items-center gap-2 mb-3 border-b border-slate-700 pb-3">
                                    <div class="w-7 h-7 md:w-8 md:h-8 rounded-lg bg-emerald-500/20 text-emerald-400 flex items-center justify-center shrink-0">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z"></path></svg>
                                    </div>
                                    <h3 class="text-[10px] md:text-xs font-black text-slate-300 uppercase tracking-widest">Voice Note</h3>
                                </div>
                                <div class="flex items-center gap-3 bg-slate-900 p-2 md:p-2.5 rounded-xl border border-slate-700">
                                    <button type="button" onclick="togglePlay('main-voice')" id="btn-main-voice" class="w-8 h-8 md:w-10 md:h-10 shrink-0 rounded-full bg-blue-600 text-white flex items-center justify-center shadow hover:scale-105 transition-transform text-[10px] md:text-xs">▶</button>
                                    <div id="main-voice" class="flex-1" data-audio="{{ asset('storage/'.$voice) }}"></div>
                                </div>
                            </div>
                            @endif

                            {{-- 3. UI KHUSUS JAWABAN FILE --}}
                            @if($file)
                                @php $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION)); @endphp
                                <div class="bg-slate-800 border border-slate-700 rounded-xl md:rounded-2xl flex flex-col flex-1 min-h-[300px] md:min-h-[400px] overflow-hidden shadow-lg">
                                    <div class="flex flex-col sm:flex-row sm:items-center justify-between p-3 border-b border-slate-700 bg-slate-800 shrink-0 gap-2 sm:gap-0">
                                        <div class="flex items-center gap-2">
                                            <div class="w-7 h-7 md:w-8 md:h-8 rounded-lg bg-red-500/20 text-red-400 flex items-center justify-center shrink-0">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                                            </div>
                                            <h3 class="text-[10px] md:text-xs font-black text-slate-300 uppercase tracking-widest">File Terlampir ({{ strtoupper($ext) }})</h3>
                                        </div>
                                        <a href="{{ asset('storage/' . $file) }}" target="_blank" download class="text-[9px] md:text-[10px] font-bold bg-slate-700 hover:bg-slate-600 text-white px-3 py-1.5 rounded-lg transition-colors flex items-center justify-center gap-1 active:scale-95">
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                            Download
                                        </a>
                                    </div>
                                    
                                    <div class="flex-1 w-full bg-slate-900 flex items-center justify-center relative">
                                        @if ($ext === 'pdf')
                                            <iframe src="{{ asset('storage/' . $file) }}" class="absolute inset-0 w-full h-full border-0 bg-white"></iframe>
                                        @elseif (in_array($ext, ['jpg', 'jpeg', 'png', 'gif', 'webp']))
                                            <img src="{{ asset('storage/' . $file) }}" class="max-w-full max-h-full object-contain p-2">
                                        @else
                                            <div class="text-center p-8">
                                                <div class="w-12 h-12 md:w-16 md:h-16 bg-slate-800 rounded-full flex items-center justify-center mx-auto mb-4 border border-slate-700">
                                                    <svg class="w-6 h-6 md:w-8 md:h-8 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                                                </div>
                                                <p class="text-slate-400 text-xs md:text-sm font-medium">Format file tidak dapat dipreview.</p>
                                                <p class="text-slate-500 text-[10px] md:text-xs mt-1">Silakan klik tombol download di atas.</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endif

                        @else
                            {{-- UI KETIKA BELUM MENGUMPULKAN SAMA SEKALI --}}
                            <div class="h-full flex flex-col items-center justify-center text-center p-6 md:p-8 opacity-60">
                                <div class="w-20 h-20 md:w-24 md:h-24 bg-slate-800 rounded-full flex items-center justify-center mb-5 border border-slate-700 shadow-inner">
                                    <svg class="w-10 h-10 md:w-12 md:h-12 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                </div>
                                <h3 class="text-white text-base md:text-xl font-black tracking-wider uppercase mb-2">Belum Mengumpulkan</h3>
                                <p class="text-slate-400 text-xs md:text-sm font-medium max-w-[250px] mx-auto leading-relaxed">Mahasiswa ini belum mengunggah file, teks, ataupun rekaman suara.</p>
                            </div>
                        @endif
                    </div>
                </div>

                {{-- KOLOM 3: FORM NILAI & DISKUSI (Order 3) --}}
                <div class="order-3 lg:col-span-3 flex flex-col gap-4 lg:gap-6 lg:sticky lg:top-[100px] lg:h-[calc(100vh-130px)] min-w-0" data-aos="fade-left" data-aos-duration="600" data-aos-delay="200">
                    
                    {{-- FORM NILAI --}}
                    <form method="POST" action="{{ route('dosen.assignment.grade.store', ['kelas' => $kelas->id, 'assignment' => $assignment->id, 'mahasiswa' => $activeMahasiswaId]) }}" class="bg-white rounded-[1.5rem] lg:rounded-[2rem] border border-slate-200 p-4 lg:p-5 shadow-sm shrink-0 {{ !$submission ? 'opacity-50 pointer-events-none' : '' }}">
                        @csrf
                        <div class="mb-3 border-b border-slate-100 pb-3 flex justify-between items-center">
                            <h3 class="text-xs font-black text-slate-900 uppercase tracking-widest">Penilaian</h3>
                            @if(!$submission) <span class="text-[9px] font-bold text-red-500 uppercase bg-red-50 px-2 py-0.5 rounded-md">Terkunci</span> @endif
                        </div>
                        <div class="space-y-3">
                            <input type="number" name="nilai" value="{{ $submission->nilai ?? '' }}" placeholder="{{ $submission ? '0 - 100' : '-' }}" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2 sm:py-2.5 text-lg sm:text-xl font-black text-center focus:outline-none focus:border-blue-500 disabled:bg-slate-100 transition-all" {{ !$submission ? 'disabled' : '' }} />
                            <button type="submit" class="w-full py-2.5 sm:py-3 bg-emerald-500 text-white rounded-xl text-[10px] md:text-[11px] font-black uppercase tracking-widest hover:bg-emerald-600 transition-all shadow-md shadow-emerald-200 disabled:bg-slate-300 active:scale-95" {{ !$submission ? 'disabled' : '' }}>Simpan Nilai</button>
                        </div>
                    </form>

                    <div id="chat-placeholder" class="hidden flex-1"></div>

                    {{-- DISKUSI CONTAINER (Tinggi minimum ditambahkan untuk Mobile) --}}
                    <div id="chat-wrapper" class="bg-white rounded-[1.5rem] lg:rounded-[2rem] border border-slate-200 shadow-sm flex flex-col flex-1 overflow-hidden h-[500px] lg:h-auto min-h-[400px] bg-white/90 backdrop-blur-xl">
                        
                        <div class="p-3 sm:p-4 border-b border-slate-100 flex justify-between items-center bg-slate-50/50 shrink-0">
                            <h3 class="text-[11px] md:text-xs font-black text-slate-900 uppercase tracking-widest">Diskusi Privat</h3>
                            <button onclick="toggleChat()" class="text-slate-400 hover:text-blue-600 active:scale-95 transition-transform" title="Perbesar Chat">
                                <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"></path></svg>
                            </button>
                        </div>

                        <div id="chatContainer" class="flex-1 p-3 sm:p-4 flex flex-col gap-3 sm:gap-4 overflow-y-auto custom-scrollbar bg-slate-50/50">
                            @php
                                $pesanDiskusi = ($submission && method_exists($submission, 'messages')) ? $submission->messages()->orderBy('created_at', 'asc')->get() : collect();
                            @endphp

                            @forelse ($pesanDiskusi as $diskusi)
                                @php
                                    $from = $diskusi->from ?? $diskusi->sender_type ?? 'mahasiswa';
                                    $isMe = ($from === 'dosen' || $from === 'App\Models\Dosen'); 
                                    
                                    $namaDosen = auth('dosen')->user()->nama ?? 'Anda';
                                    $namaMahasiswa = $activeMahasiswa->nama ?? 'Mahasiswa';
                                    
                                    $namaLabel = $isMe ? 'Anda' : $namaMahasiswa;
                                    
                                    $fotoProfil = $isMe 
                                        ? (auth('dosen')->user()->foto ? asset('storage/'.auth('dosen')->user()->foto) : 'https://ui-avatars.com/api/?name=' . urlencode($namaDosen) . '&background=2563eb&color=fff') 
                                        : ($activeMahasiswa->foto ? asset('storage/'.$activeMahasiswa->foto) : 'https://ui-avatars.com/api/?name=' . urlencode($namaMahasiswa) . '&background=64748b&color=fff');
                                    
                                    $bgChat = $isMe ? 'bg-blue-600 text-white rounded-tr-none border-blue-700' : 'bg-white text-slate-800 rounded-tl-none border-slate-200';
                                    $labelTeksWarna = $isMe ? 'text-blue-500' : 'text-slate-400';
                                    
                                    $body = $diskusi->body ?? $diskusi->message ?? '';
                                    $image = $diskusi->image ?? null; 
                                    $voice = $diskusi->voice ?? null; 
                                    $time = !empty($diskusi->created_at) ? \Carbon\Carbon::parse($diskusi->created_at)->format('H:i') : '';
                                    $diskusiId = $diskusi->id ?? rand(100, 9999);
                                @endphp
                                <div class="flex {{ $isMe ? 'justify-end' : 'justify-start' }}">
                                    <div class="flex gap-2 items-end max-w-[90%] md:max-w-[85%] {{ $isMe ? 'flex-row-reverse' : '' }}">
                                        <img src="{{ $fotoProfil }}" class="w-6 h-6 md:w-7 md:h-7 rounded-full shrink-0 shadow-sm object-cover border border-slate-100" />
                                        <div class="flex flex-col {{ $isMe ? 'items-end' : 'items-start' }}">
                                            <p class="text-[8px] font-bold mb-1 px-1 {{ $labelTeksWarna }} sender-name">{{ $namaLabel }}</p>
                                            <div class="p-2.5 md:p-3 rounded-xl md:rounded-2xl shadow-sm text-[11px] md:text-xs {{ $bgChat }}">
                                                @if(!empty($body)) <p class="whitespace-pre-wrap break-words leading-relaxed">{{ $body }}</p> @endif
                                                @if(!empty($image)) <img src="{{ asset('storage/' . $image) }}" class="mt-2 rounded-lg md:rounded-xl max-w-full border {{ $isMe ? 'border-white/20' : 'border-slate-200' }}"> @endif
                                                @if(!empty($voice))
                                                    <div class="mt-2 flex items-center gap-2 {{ $isMe ? 'bg-white/20 border-white/30' : 'bg-slate-50 border-slate-200' }} p-1.5 rounded-xl border w-[150px] md:w-[160px]">
                                                        <button type="button" onclick="togglePlay('wave-{{ $diskusiId }}')" id="btn-wave-{{ $diskusiId }}" class="w-5 h-5 md:w-6 md:h-6 shrink-0 flex items-center justify-center rounded-full {{ $isMe ? 'bg-white text-blue-600' : 'bg-blue-600 text-white' }} shadow text-[8px] md:text-[9px]">▶</button>
                                                        <div id="wave-{{ $diskusiId }}" class="flex-1 h-3 md:h-4" data-audio="{{ asset('storage/' . $voice) }}"></div>
                                                    </div>
                                                @endif
                                            </div>
                                            @if($time)<p class="text-[7px] md:text-[8px] mt-1 px-1 font-bold text-slate-400">{{ $time }}</p>@endif
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div id="emptyChat" class="h-full flex flex-col items-center justify-center text-center opacity-70">
                                    <div class="w-8 h-8 md:w-10 md:h-10 bg-blue-50 text-blue-400 rounded-full flex items-center justify-center mb-2">
                                        <svg class="w-4 h-4 md:w-5 md:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                                    </div>
                                    <p class="text-[9px] md:text-[10px] text-slate-500 font-bold uppercase tracking-widest">Belum Ada Diskusi</p>
                                </div>
                            @endforelse
                        </div>

                        {{-- Form Chat Responsive --}}
                        <div class="p-2 sm:p-3 md:p-4 border-t border-slate-100 bg-white shrink-0 shadow-[0_-4px_10px_rgba(0,0,0,0.02)] relative z-20 pb-4 sm:pb-4">
                            <div id="imagePreviewContainer" class="hidden mb-2 relative p-2 bg-slate-50 border border-slate-200 rounded-xl sm:rounded-2xl w-fit">
                                <img id="imagePreviewElement" src="" class="h-16 sm:h-20 md:h-24 w-auto object-cover rounded-lg sm:rounded-xl shadow-sm border border-slate-200">
                                <button type="button" onclick="cancelImage()" class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full w-5 h-5 sm:w-6 sm:h-6 flex items-center justify-center font-bold text-[10px] sm:text-xs shadow-lg hover:bg-red-600 hover:scale-110 transition-transform">✕</button>
                            </div>

                            <form id="chatForm" action="{{ route('dosen.assignment.message.store', ['assignment' => $assignment->id, 'mahasiswa' => $activeMahasiswaId ?? 0]) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="file" name="image" id="imageInput" accept="image/*" class="hidden" onchange="previewImage(this)">
                                <input type="file" name="voice" id="voiceInput" accept="audio/webm" class="hidden">

                                <div class="relative flex items-center gap-1.5 sm:gap-2 bg-slate-50 p-1.5 sm:p-2 rounded-full sm:rounded-2xl border border-slate-200 focus-within:border-blue-400 focus-within:ring-2 focus-within:ring-blue-100 transition-all shadow-sm w-full">
                                    
                                    <div id="uploadImageContainer" class="relative shrink-0 flex items-center">
                                        <button type="button" onclick="document.getElementById('imageInput').click()" id="btnUploadImage" class="w-8 h-8 sm:w-10 sm:h-10 rounded-full sm:rounded-xl flex items-center justify-center text-slate-400 hover:text-blue-600 hover:bg-white transition-all cursor-pointer shadow-sm border border-transparent hover:border-blue-100 bg-white sm:bg-transparent">
                                            <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                        </button>
                                    </div>

                                    <div id="normalInputWrapper" class="flex-1 min-w-0 relative flex items-center bg-white sm:bg-transparent rounded-xl sm:rounded-none px-2 sm:px-0 shadow-sm sm:shadow-none py-0.5 sm:py-0">
                                        <input type="text" name="message" id="messageInput" placeholder="Tulis balasan Anda..." autocomplete="off" class="w-full bg-transparent text-[10px] sm:text-xs md:text-sm font-medium text-slate-700 placeholder-slate-400 focus:outline-none transition-all py-1.5 sm:py-1 px-2" />
                                    </div>

                                    <div id="recordingWrapper" class="hidden flex-1 items-center justify-between px-2 bg-red-50 rounded-full py-1 sm:py-0 sm:bg-transparent border border-red-100 sm:border-none">
                                        <div class="flex items-center gap-1.5 sm:gap-2">
                                            <span class="w-2 h-2 sm:w-2.5 sm:h-2.5 bg-red-500 rounded-full animate-pulse shadow-[0_0_8px_rgba(239,68,68,0.8)]"></span>
                                            <span class="text-[9px] sm:text-[10px] font-bold text-red-500 font-mono tracking-wider" id="recordTimer">00:00</span>
                                            <div class="recording-wave flex items-center gap-0.5 sm:gap-1 h-3 sm:h-5 ml-1 sm:ml-2">
                                                <div class="bar"></div><div class="bar"></div><div class="bar"></div><div class="bar"></div><div class="bar"></div><div class="bar"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="recordBtnContainer" class="relative shrink-0 flex items-center gap-1">
                                        <button type="button" id="cancelVoiceBtn" class="hidden w-8 h-8 sm:w-10 sm:h-10 rounded-full flex items-center justify-center text-red-500 hover:text-red-600 hover:bg-red-50 transition-all cursor-pointer border border-transparent shadow-sm bg-white sm:bg-transparent text-[10px]" title="Batal Voice Note">✕</button>
                                        <button type="button" id="cancelRecordBtn" class="hidden w-8 h-8 sm:w-10 sm:h-10 rounded-full flex items-center justify-center text-slate-400 hover:text-red-500 transition-all cursor-pointer bg-white sm:bg-transparent font-black text-[8px] sm:text-[9px] uppercase" title="Batal Merekam">Batal</button>
                                        <button type="button" id="recordBtn" class="w-8 h-8 sm:w-10 sm:h-10 rounded-full sm:rounded-xl flex items-center justify-center text-slate-400 hover:text-red-500 hover:bg-red-50 transition-all cursor-pointer border border-transparent hover:border-red-100 shadow-sm bg-white sm:bg-transparent" title="Merekam Pesan Suara">
                                            <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18.75a6 6 0 006-6v-1.5m-6 7.5a6 6 0 01-6-6v-1.5m6 7.5v3.75m-3.75 0h7.5M12 15.75a3 3 0 01-3-3V4.5a3 3 0 116 0v8.25a3 3 0 01-3 3z"></path></svg>
                                        </button>
                                    </div>

                                    <div class="relative shrink-0 flex items-center ml-0.5 sm:ml-1 md:ml-0">
                                        <button type="submit" id="sendChatBtn" class="w-9 h-8 sm:w-10 sm:h-9 md:w-12 md:h-10 rounded-full sm:rounded-xl bg-blue-600 text-white flex items-center justify-center hover:bg-blue-700 transition-transform transform hover:scale-105 active:scale-95 shadow-md shadow-blue-200 cursor-pointer">
                                            <span id="sendIcon"><svg class="w-4 h-4 sm:w-5 sm:h-5 transform rotate-90 ml-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg></span>
                                            <span id="sendLoading" class="hidden"><svg class="w-4 h-4 sm:w-5 sm:h-5 animate-spin text-white" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path></svg></span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            AOS.init({ once: true, easing: "ease-out-cubic" });

            function filterMahasiswa(keyword) {
                keyword = keyword.toLowerCase();
                document.querySelectorAll('.mahasiswa-item').forEach(item => {
                    item.style.display = item.dataset.name.includes(keyword) ? 'block' : 'none';
                });
            }

            function toggleChat() {
                const w = document.getElementById('chat-wrapper');
                const o = document.getElementById('chat-overlay');
                const p = document.getElementById('chat-placeholder');
                const isExpanded = w.classList.contains('chat-expanded');

                if (!isExpanded) {
                    p.style.height = w.offsetHeight + 'px';
                    p.classList.remove('hidden');
                    document.body.appendChild(w);
                    w.classList.add('chat-expanded');
                    o.classList.add('active');
                    document.body.style.overflow = 'hidden'; 
                } else {
                    w.classList.remove('chat-expanded');
                    o.classList.remove('active');
                    document.body.style.overflow = 'auto'; 
                    p.parentNode.insertBefore(w, p);
                    p.classList.add('hidden');
                }
            }

            const wavesurfers = {};
            function initWaveSurfer(id, url, isMe) {
                wavesurfers[id] = WaveSurfer.create({
                    container: '#' + id,
                    waveColor: isMe ? 'rgba(255,255,255,0.4)' : '#cbd5e1',
                    progressColor: isMe ? '#fff' : '#2563eb',
                    height: 16, barWidth: 2, barGap: 2, cursorWidth: 0, url: url
                });
                wavesurfers[id].on('finish', () => document.getElementById('btn-'+id).innerHTML = '▶');
            }

            function togglePlay(id) {
                const ws = wavesurfers[id];
                if(ws) { ws.playPause(); document.getElementById('btn-'+id).innerHTML = ws.isPlaying() ? '⏸' : '▶'; }
            }

            document.addEventListener('DOMContentLoaded', () => {
                const chatContainer = document.getElementById('chatContainer');
                if(chatContainer) chatContainer.scrollTop = chatContainer.scrollHeight;
                
                document.querySelectorAll('[id^="wave-"]').forEach(el => {
                    initWaveSurfer(el.id, el.getAttribute('data-audio'), el.parentElement.classList.contains('bg-blue-600'));
                });
                
                const mainVoice = document.getElementById('main-voice');
                if(mainVoice) {
                    initWaveSurfer('main-voice', mainVoice.getAttribute('data-audio'), false);
                }
            });

            function previewImage(input) {
                if (input.files && input.files[0]) {
                    const r = new FileReader();
                    r.onload = e => {
                        document.getElementById('imagePreviewElement').src = e.target.result;
                        const container = document.getElementById('imagePreviewContainer');
                        container.classList.remove('hidden');
                        container.classList.add('inline-block');
                    }
                    r.readAsDataURL(input.files[0]);
                }
            }

            function cancelImage() {
                document.getElementById('imageInput').value = '';
                const container = document.getElementById('imagePreviewContainer');
                container.classList.remove('inline-block');
                container.classList.add('hidden');
            }

            // REKAM SUARA CHAT DOSEN
            let mediaRecorder, audioChunks = [], recordInterval, recordSeconds = 0, mediaStream = null;
            const recordBtn = document.getElementById('recordBtn');
            const cancelRecordBtn = document.getElementById('cancelRecordBtn');
            const cancelVoiceBtn = document.getElementById('cancelVoiceBtn');
            const voiceInput = document.getElementById('voiceInput');
            const messageInput = document.getElementById('messageInput');
            const btnUploadImage = document.getElementById('btnUploadImage');
            const uploadImageContainer = document.getElementById('uploadImageContainer');
            const normalInputWrapper = document.getElementById('normalInputWrapper');
            const recordingWrapper = document.getElementById('recordingWrapper');

            recordBtn.addEventListener('click', async () => {
                if (!mediaRecorder || mediaRecorder.state === "inactive") {
                    try {
                        mediaStream = await navigator.mediaDevices.getUserMedia({ audio: true });
                        mediaRecorder = new MediaRecorder(mediaStream);
                        mediaRecorder.start();
                        
                        normalInputWrapper.classList.add('hidden');
                        if (uploadImageContainer) uploadImageContainer.classList.add('hidden');
                        recordingWrapper.classList.remove('hidden');
                        recordingWrapper.classList.add('flex');
                        
                        recordBtn.classList.remove('text-slate-400', 'bg-white', 'sm:bg-transparent');
                        recordBtn.classList.add('text-white', 'bg-red-500', 'animate-pulse', 'border-red-600');
                        
                        if (cancelRecordBtn) cancelRecordBtn.classList.remove('hidden');

                        recordSeconds = 0; 
                        document.getElementById('recordTimer').innerText = "00:00";
                        
                        recordInterval = setInterval(() => {
                            recordSeconds++;
                            const m = String(Math.floor(recordSeconds/60)).padStart(2,'0');
                            const s = String(recordSeconds%60).padStart(2,'0');
                            document.getElementById('recordTimer').innerText = `${m}:${s}`;
                        }, 1000);

                        audioChunks = [];
                        mediaRecorder.ondataavailable = e => audioChunks.push(e.data);
                    } catch(err) { alert("Mic error!"); }
                } else {
                    mediaRecorder.onstop = () => {
                        if (mediaStream) {
                            mediaStream.getTracks().forEach(track => track.stop());
                        }

                        const file = new File([new Blob(audioChunks, { type: 'audio/webm' })], "voice.webm", { type: "audio/webm" });
                        const dt = new DataTransfer(); dt.items.add(file);
                        voiceInput.files = dt.files;
                        
                        recordingWrapper.classList.add('hidden');
                        recordingWrapper.classList.remove('flex');
                        normalInputWrapper.classList.remove('hidden');
                        
                        recordBtn.classList.add('hidden');
                        if (cancelRecordBtn) cancelRecordBtn.classList.add('hidden');
                        
                        messageInput.placeholder = "Suara siap...";
                        messageInput.disabled = true;
                        messageInput.classList.add('font-bold', 'text-blue-600', 'bg-blue-50', 'rounded-full', 'sm:rounded-xl', 'px-3', 'sm:px-4');
                        messageInput.classList.remove('bg-transparent', 'px-2');
                        cancelVoiceBtn.classList.remove('hidden');
                    };
                    mediaRecorder.stop();
                    clearInterval(recordInterval);
                }
            });

            cancelRecordBtn.addEventListener('click', () => {
                if(mediaRecorder && mediaRecorder.state !== "inactive") mediaRecorder.stop();
                if (mediaStream) { mediaStream.getTracks().forEach(track => track.stop()); }
                clearInterval(recordInterval);
                audioChunks = [];
                voiceInput.value = '';
                
                recordingWrapper.classList.add('hidden');
                recordingWrapper.classList.remove('flex');
                normalInputWrapper.classList.remove('hidden');
                if(uploadImageContainer) uploadImageContainer.classList.remove('hidden');
                
                recordBtn.classList.remove('text-white', 'bg-red-500', 'animate-pulse', 'border-red-600', 'hidden');
                recordBtn.classList.add('text-slate-400', 'bg-white', 'sm:bg-transparent');
                cancelRecordBtn.classList.add('hidden');

                messageInput.placeholder = "Tulis balasan Anda...";
                messageInput.disabled = false;
                messageInput.classList.remove('font-bold', 'text-blue-600', 'bg-blue-50', 'rounded-full', 'sm:rounded-xl', 'px-3', 'sm:px-4');
                messageInput.classList.add('bg-transparent', 'px-2');
            });

            cancelVoiceBtn.addEventListener('click', () => {
                voiceInput.value = '';
                messageInput.disabled = false;
                messageInput.placeholder = "Tulis balasan Anda...";
                messageInput.classList.remove('font-bold', 'text-blue-600', 'bg-blue-50', 'rounded-full', 'sm:rounded-xl', 'px-3', 'sm:px-4');
                messageInput.classList.add('bg-transparent', 'px-2');
                
                cancelVoiceBtn.classList.add('hidden');
                if (uploadImageContainer) uploadImageContainer.classList.remove('hidden');
                recordBtn.classList.remove('hidden', 'text-white', 'bg-red-500', 'animate-pulse', 'border-red-600');
                recordBtn.classList.add('text-slate-400', 'bg-white', 'sm:bg-transparent');
            });

            // LOGIKA FOTO ASLI (AJAX)
            const myName = "{{ auth('dosen')->user()->nama ?? 'Anda' }}";
            const myFotoRaw = "{{ auth('dosen')->user()->foto ?? '' }}";
            const myAvatar = myFotoRaw ? `/storage/${myFotoRaw}` : `https://ui-avatars.com/api/?name=${encodeURIComponent(myName)}&background=2563eb&color=fff`;

            // AJAX SEND DOSEN
            document.getElementById('chatForm').addEventListener('submit', async function(e) {
                e.preventDefault();
                
                const msgVal = document.getElementById('messageInput').value.trim();
                const imgFile = document.getElementById('imageInput').files.length;
                const voiceFile = document.getElementById('voiceInput').files.length;
                if(!msgVal && !imgFile && !voiceFile) return;

                const formData = new FormData(this);
                const btn = document.getElementById('sendChatBtn');
                
                document.getElementById('sendIcon').classList.add('hidden');
                document.getElementById('sendLoading').classList.remove('hidden');
                btn.disabled = true;

                try {
                    const res = await fetch(this.action, {
                        method: 'POST', body: formData,
                        headers: { 'X-Requested-With': 'XMLHttpRequest', 'Accept': 'application/json' }
                    });
                    const data = await res.json();

                    if(res.ok && data.success) {
                        this.reset(); cancelImage();
                        voiceInput.value = '';
                        messageInput.disabled = false;
                        messageInput.placeholder = "Tulis balasan Anda...";
                        messageInput.classList.remove('text-blue-600', 'font-bold', 'bg-blue-50', 'rounded-full', 'sm:rounded-xl', 'px-3', 'sm:px-4');
                        messageInput.classList.add('bg-transparent', 'px-2');
                        cancelVoiceBtn.classList.add('hidden');
                        if (uploadImageContainer) uploadImageContainer.classList.remove('hidden');
                        recordBtn.classList.remove('hidden', 'text-white', 'bg-red-500', 'animate-pulse', 'border-red-600');
                        recordBtn.classList.add('text-slate-400', 'bg-white', 'sm:bg-transparent');

                        const d = data.diskusi; 
                        if(d) {
                            let media = ''; const uid = 'wave-' + Date.now();
                            if(d.image) media += `<img src="${d.image}" class="mt-2 rounded-lg md:rounded-xl max-w-full md:max-w-xs border border-white/20">`;
                            if(d.voice) media += `<div class="mt-1.5 md:mt-2 flex items-center gap-2 md:gap-3 bg-white/20 p-1.5 md:p-2 rounded-lg md:rounded-xl backdrop-blur-sm border border-white/30 w-[150px] md:w-[180px] lg:w-[240px]"><button type="button" onclick="togglePlay('${uid}')" id="btn-${uid}" class="w-6 h-6 md:w-8 md:h-8 shrink-0 flex items-center justify-center rounded-full bg-white text-blue-600 shadow hover:scale-105 transition-transform text-[8px] md:text-xs">▶</button><div id="${uid}" class="flex-1 h-3 md:h-4" data-audio="${d.voice}"></div></div>`;
                            
                            const bodyText = d.message;
                            
                            const html = `<div class="flex justify-end chat-bubble-new"><div class="flex gap-2 md:gap-3 items-end max-w-[90%] md:max-w-[85%] lg:max-w-[70%] flex-row-reverse"><img src="${myAvatar}" class="w-6 h-6 md:w-9 md:h-9 rounded-full shrink-0 shadow-sm object-cover border border-slate-100"><div class="flex flex-col items-end"><p class="text-[8px] md:text-[10px] font-bold mb-1 px-1 text-slate-400">Anda</p><div class="p-2.5 md:p-4 rounded-xl md:rounded-2xl shadow-sm text-[11px] md:text-[13px] bg-blue-600 text-white rounded-tr-none border border-blue-700">${bodyText ? `<p class="whitespace-pre-wrap break-words leading-relaxed">${bodyText}</p>` : ''}${media}</div><p class="text-[7px] md:text-[9px] mt-1.5 px-1 font-bold text-slate-400">${d.time}</p></div></div></div>`;
                            
                            const box = document.getElementById('chatContainer');
                            const empty = document.getElementById('emptyChat');
                            if(empty) empty.remove();
                            
                            box.insertAdjacentHTML('beforeend', html);
                            box.scrollTop = box.scrollHeight;
                            if(d.voice) setTimeout(() => initWaveSurfer(uid, d.voice, true), 100);
                        }
                    } else {
                        alert(data.error || "Gagal mengirim pesan.");
                    }
                } catch(err) { 
                    alert("Koneksi bermasalah."); 
                } 
                finally {
                    btn.disabled = false;
                    document.getElementById('sendLoading').classList.add('hidden');
                    document.getElementById('sendIcon').classList.remove('hidden');
                }
            });

            // LOGIKA FOTO ASLI (ECHO/PUSHER MAHASISWA)
            @if($submission)
                const submissionId = {{ $submission->id }};
                if (window.Echo) {
                    window.Echo.private(`submission.${submissionId}`)
                        .listen('.assignment.message', (e) => {
                            const d = e.message;
                            
                            const isMe = d.from === 'dosen' || d.sender_type === 'dosen' || d.sender_type === 'App\\Models\\Dosen';
                            if (isMe) return; 

                            const senderName = "{{ $activeMahasiswa->nama ?? 'Mahasiswa' }}";
                            const mhsFotoRaw = "{{ $activeMahasiswa->foto ?? '' }}";
                            const avatarMahasiswa = mhsFotoRaw ? `/storage/${mhsFotoRaw}` : `https://ui-avatars.com/api/?name=${encodeURIComponent(senderName)}&background=64748b&color=fff`;
                            
                            let media = ''; const uid = 'wave-' + Date.now();
                            if(d.image) media += `<img src="${d.image}" class="mt-2 rounded-lg md:rounded-xl max-w-full md:max-w-xs border border-slate-200">`;
                            if(d.voice) media += `<div class="mt-1.5 md:mt-2 flex items-center gap-2 md:gap-3 bg-white border-slate-200 p-1.5 md:p-2 rounded-lg md:rounded-xl border w-[150px] md:w-[180px] lg:w-[240px]"><button type="button" onclick="togglePlay('${uid}')" id="btn-${uid}" class="w-6 h-6 md:w-8 md:h-8 shrink-0 flex items-center justify-center rounded-full bg-blue-600 text-white shadow hover:scale-105 transition-transform text-[8px] md:text-xs">▶</button><div id="${uid}" class="flex-1 h-3 md:h-4" data-audio="${d.voice}"></div></div>`;
                            
                            const html = `<div class="flex justify-start chat-bubble-new"><div class="flex gap-2 md:gap-3 items-end max-w-[90%] md:max-w-[85%] lg:max-w-[70%]"><img src="${avatarMahasiswa}" class="w-6 h-6 md:w-9 md:h-9 rounded-full shrink-0 shadow-sm object-cover border border-slate-100"><div class="flex flex-col items-start"><p class="text-[8px] md:text-[10px] font-bold mb-1 px-1 text-slate-400">${senderName}</p><div class="p-2.5 md:p-4 rounded-xl md:rounded-2xl shadow-sm text-[11px] md:text-[13px] bg-white text-slate-800 rounded-tl-none border border-slate-200">${d.message ? `<p class="whitespace-pre-wrap break-words leading-relaxed">${d.message}</p>` : ''}${media}</div><p class="text-[7px] md:text-[9px] mt-1.5 px-1 font-bold text-slate-400">${d.time}</p></div></div></div>`;
                            
                            const box = document.getElementById('chatContainer');
                            const empty = document.getElementById('emptyChat');
                            if(empty) empty.remove();
                            
                            box.insertAdjacentHTML('beforeend', html);
                            box.scrollTop = box.scrollHeight;
                            if(d.voice) setTimeout(() => initWaveSurfer(uid, d.voice, false), 100);
                        });
                }
            @endif
        </script>
    </body>
</html>