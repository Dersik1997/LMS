<!DOCTYPE html>
<html lang="id" class="custom-scrollbar">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Kelola Detail Pertemuan | Portal Dosen</title>
    
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&display=swap" rel="stylesheet" />
    
    <script src="https://unpkg.com/wavesurfer.js@7"></script>

    <style>
        html { scroll-behavior: smooth; }
        .scrollbar-hide::-webkit-scrollbar { display: none; }
        .scrollbar-hide { -ms-overflow-style: none; scrollbar-width: none; }
        .custom-scrollbar::-webkit-scrollbar { width: 6px; }
        .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background-color: #cbd5e1; border-radius: 20px; }
        .custom-scrollbar::-webkit-scrollbar-thumb:hover { background-color: #94a3b8; }
        
        @keyframes popIn {
            0% { opacity: 0; transform: translateY(15px) scale(0.95); }
            100% { opacity: 1; transform: translateY(0) scale(1); }
        }
        .chat-bubble-new { animation: popIn 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards; }
        #chatContainer { scroll-behavior: smooth; }

        @keyframes wave-bounce {
            0%, 100% { height: 4px; }
            50% { height: 16px; }
        }
        .recording-wave .bar {
            width: 3px;
            background-color: #ef4444; 
            border-radius: 99px;
            animation: wave-bounce 1s ease-in-out infinite;
        }
        .recording-wave .bar:nth-child(1) { animation-delay: 0.0s; height: 8px;}
        .recording-wave .bar:nth-child(2) { animation-delay: 0.2s; height: 12px;}
        .recording-wave .bar:nth-child(3) { animation-delay: 0.4s; height: 16px;}
        .recording-wave .bar:nth-child(4) { animation-delay: 0.1s; height: 10px;}
        .recording-wave .bar:nth-child(5) { animation-delay: 0.3s; height: 14px;}
        .recording-wave .bar:nth-child(6) { animation-delay: 0.5s; height: 8px;}

        .modal-active { opacity: 1 !important; pointer-events: auto !important; }
        .modal-content-active { transform: scale(1) !important; opacity: 1 !important; }
    </style>
</head>
<body class="m-0 font-['Plus_Jakarta_Sans'] bg-[#f8fafc] min-h-screen flex flex-col border-box overflow-x-hidden text-slate-800 selection:bg-blue-200 relative">
    
    {{-- BACKGROUND DEKORASI --}}
    <div class="fixed top-0 left-0 w-full h-full overflow-hidden -z-10 pointer-events-none">
        <div class="absolute top-[-10%] right-[-5%] w-64 md:w-[400px] h-64 md:h-[400px] bg-blue-100/40 rounded-full blur-3xl opacity-50"></div>
        <div class="absolute bottom-[-10%] left-[-10%] w-64 md:w-[400px] h-64 md:h-[400px] bg-indigo-50/40 rounded-full blur-3xl opacity-50"></div>
    </div>

    <main class="flex-1 flex flex-col relative w-full">
        
        {{-- NAVBAR MOBILE-FRIENDLY DENGAN NAMA KELAS --}}
        <div class="bg-white/90 backdrop-blur-2xl border-b border-slate-200/60 sticky top-0 z-40 px-3 sm:px-4 md:px-8 py-2.5 sm:py-4 shadow-sm transition-all w-full shrink-0">
            <div class="max-w-7xl mx-auto grid grid-cols-3 items-center relative h-10 sm:h-12">
                
                {{-- Kiri: Tombol Back --}}
                <div class="flex items-center justify-start shrink-0">
                    <a href="{{ route('dosen.course.manage', $kelas->id) }}" class="w-9 h-9 sm:w-11 sm:h-11 md:w-12 md:h-12 rounded-full bg-slate-100 hover:bg-blue-600 text-slate-500 hover:text-white flex items-center justify-center transition-all duration-300 shadow-sm group border border-slate-200 hover:border-blue-600 active:scale-95">
                        <svg class="w-4 h-4 sm:w-5 sm:h-5 md:w-6 md:h-6 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path>
                        </svg>
                    </a>
                </div>
                
                {{-- Tengah: Judul & Info Kelas --}}
                <div class="flex flex-col items-center justify-center justify-self-center w-full max-w-[180px] sm:max-w-none pointer-events-none">
                    <h1 class="text-sm sm:text-lg md:text-xl font-extrabold text-slate-900 tracking-tight leading-none truncate w-full text-center pointer-events-auto">
                        Kelola Isi Pertemuan
                    </h1>
                    <div class="flex flex-wrap sm:flex-nowrap items-center justify-center gap-1 sm:gap-2 mt-1 sm:mt-1.5 pointer-events-auto">
                        <span class="text-[8px] sm:text-[9px] md:text-[10px] font-bold text-blue-600 uppercase tracking-widest bg-blue-100 px-1.5 sm:px-2 py-0.5 rounded-md whitespace-nowrap">
                            Pertemuan {{ $session->pertemuan_ke ?? $session->urutan ?? '' }}
                        </span>
                        <span class="hidden sm:inline text-slate-300">•</span>
                        <span class="text-[8px] sm:text-[9px] md:text-[10px] font-bold text-slate-500 uppercase tracking-wider truncate whitespace-nowrap">
                            Kelas {{ $kelas->nama_kelas ?? 'Reguler' }} - {{ $kelas->kode_kelas }}
                        </span>
                    </div>
                </div>
                
                {{-- Kanan: Kosong untuk keseimbangan grid --}}
                <div class="justify-self-end w-9 h-9 sm:w-11 sm:h-11"></div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto w-full p-4 md:p-8 space-y-5 md:space-y-8 pb-24 relative">
            
            {{-- PESAN INSTRUKSI MAHASISWA --}}
            <div class="bg-blue-50 border-l-4 border-blue-500 rounded-r-[1.5rem] sm:rounded-r-[2.5rem] p-5 sm:p-8 shadow-sm" data-aos="fade-down" data-aos-duration="600">
                <div class="flex flex-col sm:flex-row items-start gap-4 sm:gap-6">
                    <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-full bg-blue-200 flex items-center justify-center shrink-0 text-blue-700">
                        <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path>
                        </svg>
                    </div>
                    <div class="flex-1 w-full">
                        <form method="POST" action="{{ route('dosen.session.updateInstruksi', $session->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-3 mb-3 sm:mb-4">
                                <h3 class="text-[10px] sm:text-xs font-black text-blue-800 uppercase tracking-[0.2em]">
                                    Pesan Instruksi Mahasiswa
                                </h3>
                                <button type="submit" onclick="simpanPesan()" class="w-full sm:w-auto bg-blue-600 text-white px-4 py-2 sm:px-5 sm:py-2.5 rounded-xl text-[9px] sm:text-[10px] font-black uppercase tracking-widest hover:bg-blue-700 transition-all shadow-md shadow-blue-200 active:scale-95">
                                    Simpan Perubahan
                                </button>
                            </div>
                            <textarea name="instruksi" class="w-full bg-white/70 border border-blue-100 rounded-xl p-3 sm:p-5 text-xs sm:text-sm font-medium text-slate-700 leading-relaxed focus:ring-2 focus:ring-blue-400 focus:bg-white transition-all h-24 sm:h-24 resize-none">{{ $session->instruksi }}</textarea>
                        </form>
                    </div>
                </div>
            </div>

            {{-- MATERI PERTEMUAN --}}
            <div class="bg-white rounded-[1.5rem] sm:rounded-[2.5rem] p-5 sm:p-8 md:p-10 border border-slate-200 shadow-sm" data-aos="fade-up" data-aos-duration="800" data-aos-delay="100">
                <h3 class="text-base sm:text-lg font-black text-slate-900 uppercase tracking-tight mb-4 sm:mb-6">Materi Pertemuan</h3>

                <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4 mb-6 sm:mb-8">
                    <button type="button" onclick="openModal('materiModal')" class="p-3 sm:p-5 bg-slate-50 border-2 border-dashed border-slate-200 rounded-2xl flex flex-col items-center gap-1.5 sm:gap-2 hover:bg-blue-50 hover:border-blue-400 transition-all group text-center cursor-pointer active:scale-95">
                        <svg class="w-5 h-5 sm:w-6 sm:h-6 text-slate-400 group-hover:text-blue-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 2H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                        </svg>
                        <span class="text-[8px] sm:text-[9px] font-black text-slate-500 uppercase tracking-widest group-hover:text-blue-600 transition-colors">
                            + File / Link
                        </span>
                    </button>

                    <button type="button" onclick="openModal('textModal')" class="p-3 sm:p-5 bg-slate-50 border-2 border-dashed border-slate-200 rounded-2xl flex flex-col items-center gap-1.5 sm:gap-2 hover:bg-emerald-50 hover:border-emerald-400 transition-all group text-center cursor-pointer active:scale-95">
                        <svg class="w-5 h-5 sm:w-6 sm:h-6 text-slate-400 group-hover:text-emerald-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                        <span class="text-[8px] sm:text-[9px] font-black text-slate-500 uppercase tracking-widest group-hover:text-emerald-600 transition-colors">
                            + Tulis Teks
                        </span>
                    </button>

                    <button type="button" onclick="openModal('voiceModal')" class="p-3 sm:p-5 bg-slate-50 border-2 border-dashed border-slate-200 rounded-2xl flex flex-col items-center gap-1.5 sm:gap-2 hover:bg-purple-50 hover:border-purple-400 transition-all group text-center cursor-pointer active:scale-95">
                        <svg class="w-5 h-5 sm:w-6 sm:h-6 text-slate-400 group-hover:text-purple-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z"/>
                        </svg>
                        <span class="text-[8px] sm:text-[9px] font-black text-slate-500 uppercase tracking-widest group-hover:text-purple-600 transition-colors">
                            + Voice Note
                        </span>
                    </button>

                    <button type="button" onclick="openModal('videoModal')" class="p-3 sm:p-5 bg-slate-50 border-2 border-dashed border-slate-200 rounded-2xl flex flex-col items-center gap-1.5 sm:gap-2 hover:bg-red-50 hover:border-red-400 transition-all group text-center cursor-pointer active:scale-95">
                        <svg class="w-5 h-5 sm:w-6 sm:h-6 text-slate-400 group-hover:text-red-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 00-2 2z"/>
                        </svg>
                        <span class="text-[8px] sm:text-[9px] font-black text-slate-500 uppercase tracking-widest group-hover:text-red-600 transition-colors">
                            + Video
                        </span>
                    </button>
                </div>

                <div class="space-y-3">
                    <h4 class="text-[10px] font-black text-slate-400 uppercase tracking-widest px-1 mb-2">File Aktif</h4>
                    
                    @forelse($session->materis as $materi)
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between p-3 sm:p-4 bg-slate-50 rounded-2xl border border-slate-100 group hover:border-blue-200 transition-all shadow-sm gap-3 sm:gap-4">
                        
                        <div class="flex items-center gap-3 sm:gap-4">
                            <div class="w-10 h-10 sm:w-11 sm:h-11 bg-white text-blue-600 rounded-xl flex items-center justify-center border border-slate-200 shadow-sm group-hover:bg-blue-600 group-hover:text-white transition-all duration-300 shrink-0">
                                @if($materi->type == 'file')
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                @elseif($materi->type == 'text')
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"/></svg>
                                @elseif($materi->type == 'link')
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.828a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/></svg>
                                @elseif($materi->type == 'voice')
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z"/></svg>
                                @else
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 00-2 2z"/></svg>
                                @endif
                            </div>
                            <div class="flex flex-col">
                                <span class="text-xs sm:text-sm font-bold text-slate-700 group-hover:text-blue-700 transition-colors line-clamp-1">
                                    {{ $materi->judul }}
                                </span>
                                <span class="text-[9px] sm:text-[10px] font-bold text-slate-400 uppercase tracking-tight mt-0.5">
                                    {{ $materi->type }}
                                </span>
                            </div>
                        </div>

                        <div class="flex items-center gap-2 shrink-0 border-t sm:border-t-0 border-slate-100 pt-2 sm:pt-0">
                            @php
                                $url = $materi->file ? asset('storage/'.$materi->file) : ($materi->link ? $materi->link : '#');
                            @endphp
                            
                            <a href="{{ $url }}" target="_blank" class="flex-1 sm:flex-none px-3 sm:px-4 py-2 sm:py-2.5 bg-blue-100/50 text-blue-700 hover:bg-blue-600 hover:text-white rounded-lg sm:rounded-xl text-[9px] sm:text-[10px] font-black uppercase tracking-widest transition-all shadow-sm border border-transparent flex items-center justify-center active:scale-95">
                                Buka
                            </a>

                            <form method="POST" action="{{ route('dosen.materi.destroy', $materi->id) }}" onsubmit="return confirm('Yakin ingin menghapus materi ini?')" class="m-0 p-0 flex flex-1 sm:flex-none">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="w-full px-3 sm:px-4 py-2 sm:py-2.5 bg-red-100/50 text-red-600 hover:bg-red-600 hover:text-white rounded-lg sm:rounded-xl text-[9px] sm:text-[10px] font-black uppercase tracking-widest transition-all shadow-sm border border-transparent cursor-pointer flex items-center justify-center active:scale-95">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                    @empty
                    <div class="p-6 sm:p-8 text-center border-2 border-dashed border-slate-200 rounded-[1.5rem] bg-slate-50/50">
                        <svg class="w-8 h-8 text-slate-300 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                        <p class="text-[9px] sm:text-[10px] text-slate-400 font-bold uppercase tracking-widest">Belum ada materi yang ditambahkan.</p>
                    </div>
                    @endforelse
                </div>
            </div>

            {{-- RUANG DISKUSI (Tanpa AOS agar dijamin selalu tampil) --}}
            <div class="bg-white rounded-[1.5rem] sm:rounded-[2.5rem] border border-slate-200 shadow-sm overflow-hidden flex flex-col h-[500px] md:h-[600px]">
                
                <div class="p-4 sm:p-6 md:px-8 border-b border-slate-100 flex justify-between items-center bg-slate-50/50 z-10 shrink-0">
                    <div>
                        <h3 class="text-sm sm:text-lg font-black text-slate-900 uppercase tracking-tight">Ruang Diskusi</h3>
                        <p class="text-[8px] sm:text-[10px] font-bold text-slate-400 uppercase tracking-widest mt-0.5">Tanya jawab pertemuan ini</p>
                    </div>
                    <span class="text-[8px] sm:text-[10px] font-bold bg-green-100 text-green-700 px-2.5 py-1.5 sm:px-3 sm:py-1.5 rounded-full flex items-center gap-1.5 shrink-0">
                        <span class="w-1.5 h-1.5 sm:w-2 sm:h-2 bg-green-500 rounded-full animate-pulse"></span>
                        <span class="hidden sm:inline">
                            @if($onlineUsers ?? 0 > 0)
                                {{ $onlineUsers }} Online
                            @else
                                Tidak ada online
                            @endif
                        </span>
                        <span class="sm:hidden">{{ $onlineUsers ?? 0 }} On</span>
                    </span>
                </div>
                
                <div id="chatContainer" class="flex-1 p-3 sm:p-4 md:p-6 flex flex-col gap-4 sm:gap-6 overflow-y-auto custom-scrollbar bg-white">
                    @forelse($session->discussions->sortBy('created_at') as $diskusi)
                        @php
                            $sender = $diskusi->sender;
                            $isMe = $sender && (get_class($sender) == 'App\Models\Dosen' && $sender->id === auth('dosen')->id());
                            $namaPengirim = $sender->nama ?? $sender->name ?? 'Unknown User';
                            $fotoPengirim = isset($sender->foto) && $sender->foto 
                                            ? asset('storage/' . $sender->foto) 
                                            : 'https://ui-avatars.com/api/?name=' . urlencode($namaPengirim) . '&background=random&color=fff';
                        @endphp

                        <div class="flex {{ $isMe ? 'justify-end' : 'justify-start' }}">
                            <div class="flex gap-2 sm:gap-3 items-end max-w-[90%] md:max-w-[70%] {{ $isMe ? 'flex-row-reverse' : '' }}">
                                <img src="{{ $fotoPengirim }}" class="w-7 h-7 sm:w-8 sm:h-8 md:w-9 md:h-9 rounded-full shrink-0 shadow-sm object-cover border border-slate-100" />

                                <div class="flex flex-col {{ $isMe ? 'items-end' : 'items-start' }}">
                                    <p class="text-[8px] sm:text-[9px] md:text-[10px] font-bold mb-1 px-1 text-slate-400">
                                        {{ $isMe ? 'Anda' : $namaPengirim }}
                                    </p>
                                    
                                    <div class="p-2.5 sm:p-3 md:p-4 rounded-2xl shadow-sm border {{ $isMe ? 'bg-blue-600 text-white rounded-tr-none border-blue-700' : 'bg-slate-50 text-slate-800 rounded-tl-none border-slate-200' }}">
                                        
                                        @if($diskusi->message)
                                            <p class="text-[11px] sm:text-xs md:text-[13px] leading-relaxed font-medium whitespace-pre-wrap break-words">{{ $diskusi->message }}</p>
                                        @endif

                                        @if($diskusi->image)
                                            <img src="{{ asset('storage/' . $diskusi->image) }}" class="mt-2 rounded-xl max-w-full border {{ $isMe ? 'border-white/20' : 'border-slate-200' }}">
                                        @endif

                                        @if($diskusi->voice)
                                            <div class="mt-2 flex items-center gap-2 sm:gap-3 bg-white/20 p-1.5 sm:p-2 rounded-xl backdrop-blur-sm border {{ $isMe ? 'border-white/30' : 'border-slate-300 bg-white' }} w-[160px] sm:w-[200px] md:w-[240px]">
                                                <button type="button" onclick="togglePlay('wave-{{ $diskusi->id }}')" id="btn-wave-{{ $diskusi->id }}" class="w-6 h-6 sm:w-7 sm:h-7 md:w-8 md:h-8 shrink-0 flex items-center justify-center rounded-full {{ $isMe ? 'bg-white text-blue-600' : 'bg-blue-600 text-white' }} shadow hover:scale-105 transition-transform text-[8px] sm:text-[10px] md:text-xs">
                                                    ▶
                                                </button>
                                                <div id="wave-{{ $diskusi->id }}" class="flex-1" data-audio="{{ asset('storage/' . $diskusi->voice) }}"></div>
                                            </div>
                                        @endif

                                    </div>
                                    <p class="text-[7px] sm:text-[8px] md:text-[9px] mt-1.5 px-1 font-bold text-slate-400">
                                        {{ $diskusi->created_at->format('H:i') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div id="emptyChat" class="h-full flex flex-col items-center justify-center text-center opacity-70">
                            <div class="w-12 h-12 sm:w-14 sm:h-14 md:w-16 md:h-16 bg-blue-50 text-blue-400 rounded-full flex items-center justify-center mb-3 sm:mb-4 border border-blue-100">
                                <svg class="w-6 h-6 sm:w-7 sm:h-7 md:w-8 md:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                            </div>
                            <p class="text-[11px] sm:text-xs md:text-sm text-slate-600 font-bold">Ruang diskusi masih kosong.</p>
                            <p class="text-[8px] sm:text-[9px] md:text-[10px] text-slate-400 uppercase tracking-widest mt-1">Mulai sapa mahasiswa Anda!</p>
                        </div>
                    @endforelse
                </div>

                {{-- DESAIN INPUT CHAT BARU (Mirip Halaman Pesan) --}}
                <div class="p-2 sm:p-3 md:p-4 border-t border-slate-100 bg-white shrink-0 shadow-[0_-4px_10px_rgba(0,0,0,0.02)] relative z-20 pb-4 sm:pb-4">
                    <div id="imagePreviewContainer" class="hidden mb-2 relative p-2 bg-slate-50 border border-slate-200 rounded-xl sm:rounded-2xl w-fit">
                        <img id="imagePreviewElement" src="" class="h-16 sm:h-20 md:h-24 w-auto object-cover rounded-lg sm:rounded-xl shadow-sm border border-slate-200">
                        <button type="button" onclick="cancelImage()" class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full w-5 h-5 sm:w-6 sm:h-6 flex items-center justify-center font-bold text-[10px] sm:text-xs shadow-lg hover:bg-red-600 hover:scale-110 transition-transform">✕</button>
                    </div>

                    <form id="chatForm" method="POST" action="{{ route('session.diskusi.store', $session->id) }}" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="image" id="imageInput" accept="image/*" class="hidden" onchange="previewImage(this)">
                        <input type="file" name="voice" id="voiceInput" accept="audio/webm" class="hidden">
                        <input type="hidden" name="session_id" value="{{ $session->id }}">

                        <div class="relative flex items-center gap-1.5 sm:gap-2 md:gap-3 bg-slate-50 p-1.5 sm:p-2 md:p-3 rounded-full sm:rounded-[1.25rem] md:rounded-2xl border border-slate-200 focus-within:border-blue-400 focus-within:ring-2 focus-within:ring-blue-100 transition-all shadow-sm w-full">
                            
                            <div id="uploadImageContainer" class="relative shrink-0 flex items-center">
                                <button type="button" onclick="document.getElementById('imageInput').click()" id="btnUploadImage" class="w-8 h-8 sm:w-9 sm:h-9 md:w-10 md:h-10 rounded-full sm:rounded-xl flex items-center justify-center text-slate-400 hover:text-blue-600 hover:bg-white transition-all cursor-pointer shadow-sm border border-transparent hover:border-blue-100 bg-white sm:bg-transparent">
                                    <svg class="w-4 h-4 sm:w-5 sm:h-5 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                </button>
                            </div>

                            <div id="normalInputWrapper" class="flex-1 min-w-0 relative flex items-center bg-white sm:bg-transparent rounded-xl sm:rounded-none px-2 sm:px-0 shadow-sm sm:shadow-none py-0.5 sm:py-0">
                                <input type="text" name="message" id="messageInput" placeholder="Tulis balasan Anda..." autocomplete="off" class="w-full bg-transparent text-[10px] sm:text-xs md:text-sm font-medium text-slate-700 placeholder-slate-400 focus:outline-none transition-all py-1.5 sm:py-1 px-2" />
                            </div>

                            <div id="recordingWrapper" class="hidden flex-1 items-center justify-between px-2 bg-red-50 rounded-full py-1 sm:py-0 sm:bg-transparent border border-red-100 sm:border-none">
                                <div class="flex items-center gap-1.5 sm:gap-2">
                                    <span class="w-2 h-2 sm:w-2.5 sm:h-2.5 bg-red-500 rounded-full animate-pulse shadow-[0_0_8px_rgba(239,68,68,0.8)]"></span>
                                    <span class="text-[9px] sm:text-[10px] md:text-xs font-bold text-red-500 font-mono tracking-wider" id="recordTimer">00:00</span>
                                    <div class="recording-wave flex items-center gap-0.5 sm:gap-1 h-3 sm:h-5 md:h-6 ml-1 sm:ml-2">
                                        <div class="bar"></div><div class="bar"></div><div class="bar"></div><div class="bar"></div><div class="bar"></div><div class="bar"></div>
                                    </div>
                                </div>
                            </div>

                            <div id="recordBtnContainer" class="relative shrink-0 flex items-center gap-1">
                                <button type="button" id="cancelVoiceBtn" class="hidden w-8 h-8 sm:w-9 sm:h-9 md:w-10 md:h-10 rounded-full flex items-center justify-center text-red-500 hover:text-red-600 hover:bg-red-50 transition-all cursor-pointer border border-transparent shadow-sm bg-white sm:bg-transparent text-[10px]" title="Batal Voice Note">
                                    ✕
                                </button>
                                <button type="button" id="cancelRecordBtn" class="hidden w-8 h-8 sm:w-9 sm:h-9 md:w-10 md:h-10 rounded-full flex items-center justify-center text-slate-400 hover:text-red-500 transition-all cursor-pointer bg-white sm:bg-transparent font-black text-[8px] sm:text-[9px] uppercase" title="Batal Merekam">
                                    Batal
                                </button>
                                <button type="button" id="recordBtn" class="w-8 h-8 sm:w-9 sm:h-9 md:w-10 md:h-10 rounded-full sm:rounded-xl flex items-center justify-center text-slate-400 hover:text-red-500 hover:bg-red-50 transition-all cursor-pointer border border-transparent hover:border-red-100 shadow-sm bg-white sm:bg-transparent" title="Merekam Pesan Suara">
                                    <svg class="w-4 h-4 sm:w-5 sm:h-5 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18.75a6 6 0 006-6v-1.5m-6 7.5a6 6 0 01-6-6v-1.5m6 7.5v3.75m-3.75 0h7.5M12 15.75a3 3 0 01-3-3V4.5a3 3 0 116 0v8.25a3 3 0 01-3 3z"></path></svg>
                                </button>
                            </div>

                            <div class="relative shrink-0 flex items-center ml-0.5 sm:ml-1 md:ml-0">
                                <button type="submit" id="sendChatBtn" class="w-9 h-8 sm:w-10 sm:h-9 md:w-12 md:h-10 rounded-full sm:rounded-xl bg-blue-600 text-white flex items-center justify-center hover:bg-blue-700 transition-transform transform hover:scale-105 active:scale-95 shadow-md shadow-blue-200 cursor-pointer">
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

    {{-- MODALS BACKDROP --}}
    <div id="modalBackdrop" class="fixed inset-0 bg-slate-900/40 backdrop-blur-sm z-[60] opacity-0 pointer-events-none transition-opacity duration-300"></div>

    {{-- MATERI MODAL --}}
    <div id="materiModal" class="fixed inset-0 flex items-center justify-center z-[70] opacity-0 pointer-events-none transition-opacity duration-300 p-3 sm:p-4">
        <div class="bg-white rounded-[1.5rem] sm:rounded-[2rem] p-5 sm:p-6 md:p-8 w-full max-w-[400px] shadow-2xl transform scale-95 transition-transform duration-300 modal-box">
            <div class="flex justify-between items-center mb-5 sm:mb-6">
                <h3 class="text-base sm:text-lg font-black text-slate-800 tracking-tight">Tambah Materi</h3>
                <button type="button" onclick="closeModal('materiModal')" class="text-slate-400 hover:text-red-500 bg-slate-50 hover:bg-red-50 w-7 h-7 sm:w-8 sm:h-8 rounded-full flex items-center justify-center transition-colors active:scale-95">✕</button>
            </div>
            
            <div class="flex gap-2 mb-5 sm:mb-6 bg-slate-100 p-1 sm:p-1.5 rounded-lg sm:rounded-xl border border-slate-200/60">
                <button type="button" onclick="switchMateriTab('file')" id="btnTabFile" class="flex-1 bg-white text-blue-700 py-2 sm:py-2.5 rounded-md sm:rounded-lg text-[9px] sm:text-[10px] md:text-[11px] font-black uppercase tracking-widest shadow-sm transition-all active:scale-95">Upload File</button>
                <button type="button" onclick="switchMateriTab('link')" id="btnTabLink" class="flex-1 text-slate-500 hover:text-slate-700 py-2 sm:py-2.5 rounded-md sm:rounded-lg text-[9px] sm:text-[10px] md:text-[11px] font-black uppercase tracking-widest transition-all active:scale-95">Tambah Link</button>
            </div>

            <form id="formFile" method="POST" action="{{ route('dosen.materi.store', $session->id) }}" enctype="multipart/form-data" class="space-y-3 sm:space-y-4 block">
                @csrf
                <input type="hidden" name="type" value="file">
                <div>
                    <label class="text-[9px] sm:text-[10px] font-bold text-slate-500 uppercase tracking-widest block mb-1 sm:mb-1.5 ml-1">Judul Materi</label>
                    <input type="text" name="judul" placeholder="Contoh: Modul Pertemuan 1" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3 sm:px-4 py-2.5 sm:py-3 text-xs sm:text-sm font-bold text-slate-800 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition-all" required>
                </div>
                <div>
                    <label class="text-[9px] sm:text-[10px] font-bold text-slate-500 uppercase tracking-widest block mb-1 sm:mb-1.5 ml-1">Upload Dokumen</label>
                    <input type="file" name="file" class="w-full text-[10px] sm:text-xs text-slate-500 file:mr-3 sm:file:mr-4 file:py-2 sm:file:py-2.5 file:px-3 sm:file:px-4 md:file:px-5 file:rounded-lg sm:file:rounded-xl file:border-0 file:text-[8px] sm:file:text-[9px] md:file:text-[10px] file:font-black file:uppercase file:tracking-widest file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 cursor-pointer border border-dashed border-slate-200 p-1.5 sm:p-2 rounded-xl bg-slate-50" required>
                </div>
                <button type="submit" class="w-full bg-blue-600 text-white py-3 sm:py-3.5 rounded-xl text-[9px] sm:text-[10px] md:text-[11px] font-black uppercase tracking-widest shadow-lg shadow-blue-600/30 hover:bg-blue-700 hover:-translate-y-0.5 transition-all mt-2 sm:mt-4 active:scale-95">Simpan Dokumen</button>
            </form>

            <form id="formLink" method="POST" action="{{ route('dosen.materi.store', $session->id) }}" class="space-y-3 sm:space-y-4 hidden">
                @csrf
                <input type="hidden" name="type" value="link">
                <div>
                    <label class="text-[9px] sm:text-[10px] font-bold text-slate-500 uppercase tracking-widest block mb-1 sm:mb-1.5 ml-1">Judul Tautan</label>
                    <input type="text" name="judul" placeholder="Contoh: Referensi Artikel" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3 sm:px-4 py-2.5 sm:py-3 text-xs sm:text-sm font-bold text-slate-800 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition-all" required>
                </div>
                <div>
                    <label class="text-[9px] sm:text-[10px] font-bold text-slate-500 uppercase tracking-widest block mb-1 sm:mb-1.5 ml-1">URL / Link Web</label>
                    <input type="url" name="link" placeholder="https://" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3 sm:px-4 py-2.5 sm:py-3 text-xs sm:text-sm font-bold text-blue-600 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition-all" required>
                </div>
                <button type="submit" class="w-full bg-purple-600 text-white py-3 sm:py-3.5 rounded-xl text-[9px] sm:text-[10px] md:text-[11px] font-black uppercase tracking-widest shadow-lg shadow-purple-600/30 hover:bg-purple-700 hover:-translate-y-0.5 transition-all mt-2 sm:mt-4 active:scale-95">Simpan Tautan</button>
            </form>
        </div>
    </div>

    {{-- TEXT MODAL --}}
    <div id="textModal" class="fixed inset-0 flex items-center justify-center z-[70] opacity-0 pointer-events-none transition-opacity duration-300 p-3 sm:p-4">
        <div class="bg-white rounded-[1.5rem] sm:rounded-[2rem] p-5 sm:p-6 md:p-8 w-full max-w-[500px] shadow-2xl transform scale-95 transition-transform duration-300 modal-box">
            <div class="flex justify-between items-center mb-4 sm:mb-6">
                <h3 class="text-base sm:text-lg font-black text-slate-800 tracking-tight">Tulis Materi Teks</h3>
                <button type="button" onclick="closeModal('textModal')" class="text-slate-400 hover:text-red-500 bg-slate-50 hover:bg-red-50 w-7 h-7 sm:w-8 sm:h-8 rounded-full flex items-center justify-center transition-colors active:scale-95">✕</button>
            </div>
            
            <form method="POST" action="{{ route('dosen.materi.store', $session->id) }}" class="space-y-3 sm:space-y-4 block">
                @csrf
                <input type="hidden" name="type" value="text">
                <div>
                    <label class="text-[9px] sm:text-[10px] font-bold text-slate-500 uppercase tracking-widest block mb-1 sm:mb-1.5 ml-1">Judul Materi Teks</label>
                    <input type="text" name="judul" placeholder="Contoh: Rangkuman Bab 1" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3 sm:px-4 py-2.5 sm:py-3 text-xs sm:text-sm font-bold text-slate-800 focus:outline-none focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 transition-all" required>
                </div>
                <div>
                    <label class="text-[9px] sm:text-[10px] font-bold text-slate-500 uppercase tracking-widest block mb-1 sm:mb-1.5 ml-1">Isi Materi</label>
                    <textarea name="link" rows="4" placeholder="Ketik materi di sini..." class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3 sm:px-4 py-2.5 sm:py-3 text-xs sm:text-sm font-medium text-slate-700 focus:outline-none focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 transition-all resize-none custom-scrollbar" required></textarea>
                    <p class="text-[8px] sm:text-[9px] text-slate-400 mt-1 ml-1">*Teks akan langsung ditampilkan saat mahasiswa klik 'Buka'</p>
                </div>
                <button type="submit" class="w-full bg-emerald-600 text-white py-3 sm:py-3.5 rounded-xl text-[9px] sm:text-[10px] md:text-[11px] font-black uppercase tracking-widest shadow-lg shadow-emerald-600/30 hover:bg-emerald-700 hover:-translate-y-0.5 transition-all mt-2 sm:mt-4 active:scale-95">Simpan Teks Materi</button>
            </form>
        </div>
    </div>

    {{-- VOICE MODAL --}}
    <div id="voiceModal" class="fixed inset-0 flex items-center justify-center z-[70] opacity-0 pointer-events-none transition-opacity duration-300 p-3 sm:p-4">
        <div class="bg-white rounded-[1.5rem] sm:rounded-[2rem] p-5 sm:p-6 md:p-8 w-full max-w-[400px] shadow-2xl transform scale-95 transition-transform duration-300 modal-box">
            <div class="flex justify-between items-center mb-5 sm:mb-6">
                <h3 class="text-base sm:text-lg font-black text-slate-900 tracking-tight">Tambah Voice Note</h3>
                <button type="button" onclick="closeModal('voiceModal')" class="text-slate-400 hover:text-red-500 bg-slate-50 hover:bg-red-50 w-7 h-7 sm:w-8 sm:h-8 rounded-full flex items-center justify-center transition-colors active:scale-95">✕</button>
            </div>
            
            <div class="flex gap-2 mb-5 sm:mb-6 bg-slate-100 p-1 sm:p-1.5 rounded-lg sm:rounded-xl border border-slate-200/60">
                <button type="button" onclick="switchVoiceTab('upload')" id="btnTabVoiceUpload" class="flex-1 bg-white text-purple-700 py-2 sm:py-2.5 rounded-md sm:rounded-lg text-[9px] sm:text-[10px] md:text-[11px] font-black uppercase tracking-widest shadow-sm transition-all active:scale-95">Upload File</button>
                <button type="button" onclick="switchVoiceTab('record')" id="btnTabVoiceRecord" class="flex-1 text-slate-500 hover:text-slate-700 py-2 sm:py-2.5 rounded-md sm:rounded-lg text-[9px] sm:text-[10px] md:text-[11px] font-black uppercase tracking-widest transition-all active:scale-95">Rekam Langsung</button>
            </div>

            <form id="formVoiceUpload" method="POST" action="{{ route('dosen.materi.store', $session->id) }}" enctype="multipart/form-data" class="space-y-4 sm:space-y-5 block">
                @csrf
                <input type="hidden" name="type" value="voice">
                <div>
                    <label class="text-[9px] sm:text-[10px] font-bold text-slate-500 uppercase tracking-widest block mb-1 sm:mb-1.5 ml-1">Keterangan Suara</label>
                    <input type="text" name="judul" placeholder="Contoh: Penjelasan Tugas Akhir" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3 sm:px-4 py-2.5 sm:py-3 text-xs sm:text-sm font-bold text-slate-800 focus:outline-none focus:border-purple-500 focus:ring-2 focus:ring-purple-500/20 transition-all" required>
                </div>
                <div>
                    <label class="text-[9px] sm:text-[10px] font-bold text-slate-500 uppercase tracking-widest block mb-1 sm:mb-1.5 ml-1">File Audio (MP3/WAV/OGG)</label>
                    <input type="file" name="file" accept="audio/*" class="w-full text-[10px] sm:text-xs text-slate-500 file:mr-3 sm:file:mr-4 file:py-2 sm:file:py-2.5 file:px-3 sm:file:px-4 md:file:px-5 file:rounded-lg sm:file:rounded-xl file:border-0 file:text-[8px] sm:file:text-[9px] md:file:text-[10px] file:font-black file:uppercase file:tracking-widest file:bg-purple-50 file:text-purple-700 hover:file:bg-purple-100 cursor-pointer border border-dashed border-slate-200 p-1.5 sm:p-2 rounded-xl bg-slate-50" required>
                </div>
                <button type="submit" class="w-full bg-purple-600 text-white py-3 sm:py-3.5 rounded-xl text-[9px] sm:text-[10px] md:text-[11px] font-black uppercase tracking-widest shadow-lg shadow-purple-600/30 hover:bg-purple-700 hover:-translate-y-0.5 transition-all mt-2 sm:mt-4 active:scale-95">Simpan Audio</button>
            </form>

            <form id="formVoiceRecord" method="POST" action="{{ route('dosen.materi.store', $session->id) }}" enctype="multipart/form-data" class="space-y-4 sm:space-y-5 hidden">
                @csrf
                <input type="hidden" name="type" value="voice">
                <input type="file" name="file" id="recordedVoiceMateri" class="hidden">
                <div>
                    <label class="text-[9px] sm:text-[10px] font-bold text-slate-500 uppercase tracking-widest block mb-1 sm:mb-1.5 ml-1">Keterangan Suara</label>
                    <input type="text" name="judul" placeholder="Contoh: Rekaman Instruksi Praktikum" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3 sm:px-4 py-2.5 sm:py-3 text-xs sm:text-sm font-bold text-slate-800 focus:outline-none focus:border-purple-500 focus:ring-2 focus:ring-purple-500/20 transition-all" required>
                </div>
                
                <div class="text-center py-5 sm:py-6 border-2 border-dashed border-purple-200 rounded-xl bg-purple-50/30">
                    <button type="button" id="btnRecordMateriStart" class="w-12 h-12 sm:w-16 sm:h-16 rounded-full bg-white border border-purple-200 text-purple-500 flex items-center justify-center mx-auto hover:scale-110 transition-all shadow-sm active:scale-95">
                        <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z"/></svg>
                    </button>
                    <p id="recordMateriTimer" class="mt-2.5 sm:mt-3 text-[10px] sm:text-xs font-bold text-slate-500 tracking-widest font-mono">Ketuk untuk merekam</p>
                </div>
                
                <button type="submit" id="btnSubmitMateriRecord" disabled class="w-full bg-purple-600 text-white py-3 sm:py-3.5 rounded-xl text-[9px] sm:text-[10px] md:text-[11px] font-black uppercase tracking-widest shadow-lg shadow-purple-600/30 hover:bg-purple-700 hover:-translate-y-0.5 transition-all mt-2 sm:mt-4 disabled:opacity-50 disabled:cursor-not-allowed disabled:hover:translate-y-0 active:scale-95">Kirim & Simpan</button>
            </form>
        </div>
    </div>

    {{-- VIDEO MODAL --}}
    <div id="videoModal" class="fixed inset-0 flex items-center justify-center z-[70] opacity-0 pointer-events-none transition-opacity duration-300 p-3 sm:p-4">
        <div class="bg-white rounded-[1.5rem] sm:rounded-[2rem] p-5 sm:p-6 md:p-8 w-full max-w-[400px] shadow-2xl transform scale-95 transition-transform duration-300 modal-box">
            <div class="flex justify-between items-center mb-5 sm:mb-6">
                <h3 class="text-base sm:text-lg font-black text-slate-900 tracking-tight">Tambah Video</h3>
                <button type="button" onclick="closeModal('videoModal')" class="text-slate-400 hover:text-red-500 bg-slate-50 hover:bg-red-50 w-7 h-7 sm:w-8 sm:h-8 rounded-full flex items-center justify-center transition-colors active:scale-95">✕</button>
            </div>
            
            <div class="flex gap-2 mb-5 sm:mb-6 bg-slate-100 p-1 sm:p-1.5 rounded-lg sm:rounded-xl border border-slate-200/60">
                <button type="button" onclick="switchVideoTab('file')" id="btnTabVidFile" class="flex-1 bg-white text-red-600 py-2 sm:py-2.5 rounded-md sm:rounded-lg text-[9px] sm:text-[10px] md:text-[11px] font-black uppercase tracking-widest shadow-sm transition-all active:scale-95">Upload Video</button>
                <button type="button" onclick="switchVideoTab('link')" id="btnTabVidLink" class="flex-1 text-slate-500 hover:text-slate-700 py-2 sm:py-2.5 rounded-md sm:rounded-lg text-[9px] sm:text-[10px] md:text-[11px] font-black uppercase tracking-widest transition-all active:scale-95">Link YouTube</button>
            </div>

            <form id="formVidFile" method="POST" action="{{ route('dosen.materi.store', $session->id) }}" enctype="multipart/form-data" class="space-y-3 sm:space-y-4 block">
                @csrf
                <input type="hidden" name="type" value="video">
                <div>
                    <label class="text-[9px] sm:text-[10px] font-bold text-slate-500 uppercase tracking-widest block mb-1 sm:mb-1.5 ml-1">Judul Video</label>
                    <input type="text" name="judul" placeholder="Materi Visual..." class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3 sm:px-4 py-2.5 sm:py-3 text-xs sm:text-sm font-bold text-slate-800 focus:outline-none focus:border-red-500 focus:ring-2 focus:ring-red-500/20 transition-all" required>
                </div>
                <div>
                    <label class="text-[9px] sm:text-[10px] font-bold text-slate-500 uppercase tracking-widest block mb-1 sm:mb-1.5 ml-1">Pilih File Video (MP4/MKV)</label>
                    <input type="file" name="file" accept="video/*" class="w-full text-[10px] sm:text-xs text-slate-500 file:mr-3 sm:file:mr-4 file:py-2 sm:file:py-2.5 file:px-3 sm:file:px-4 md:file:px-5 file:rounded-lg sm:file:rounded-xl file:border-0 file:text-[8px] sm:file:text-[9px] md:file:text-[10px] file:font-black file:uppercase file:tracking-widest file:bg-red-50 file:text-red-600 hover:file:bg-red-100 cursor-pointer border border-dashed border-slate-200 p-1.5 sm:p-2 rounded-xl bg-slate-50" required>
                </div>
                <button type="submit" class="w-full bg-red-600 text-white py-3 sm:py-3.5 rounded-xl text-[9px] sm:text-[10px] md:text-[11px] font-black uppercase tracking-widest shadow-lg shadow-red-600/30 hover:bg-red-700 hover:-translate-y-0.5 transition-all mt-2 sm:mt-4 active:scale-95">Upload Video</button>
            </form>

            <form id="formVidLink" method="POST" action="{{ route('dosen.materi.store', $session->id) }}" class="space-y-3 sm:space-y-4 hidden">
                @csrf
                <input type="hidden" name="type" value="link">
                <div>
                    <label class="text-[9px] sm:text-[10px] font-bold text-slate-500 uppercase tracking-widest block mb-1 sm:mb-1.5 ml-1">Judul Video</label>
                    <input type="text" name="judul" placeholder="Video Eksternal..." class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3 sm:px-4 py-2.5 sm:py-3 text-xs sm:text-sm font-bold text-slate-800 focus:outline-none focus:border-red-500 focus:ring-2 focus:ring-red-500/20 transition-all" required>
                </div>
                <div>
                    <label class="text-[9px] sm:text-[10px] font-bold text-slate-500 uppercase tracking-widest block mb-1 sm:mb-1.5 ml-1">Link URL YouTube</label>
                    <input type="url" name="link" placeholder="https://youtube.com/..." class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3 sm:px-4 py-2.5 sm:py-3 text-xs sm:text-sm font-bold text-blue-600 focus:outline-none focus:border-red-500 focus:ring-2 focus:ring-red-500/20 transition-all" required>
                </div>
                <button type="submit" class="w-full bg-red-600 text-white py-3 sm:py-3.5 rounded-xl text-[9px] sm:text-[10px] md:text-[11px] font-black uppercase tracking-widest shadow-lg shadow-red-600/30 hover:bg-red-700 hover:-translate-y-0.5 transition-all mt-2 sm:mt-4 active:scale-95">Simpan Tautan</button>
            </form>
        </div>
    </div>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        // Init AOS (Animasi) - Dimatikan secara selektif agar tak ganggu form/chat scroll
        AOS.init({ once: true, easing: 'ease-out-cubic', duration: 800 });

        function simpanPesan() { alert("Instruksi kelas berhasil diperbarui."); }

        // ==========================================
        // 1. MODAL LOGIC (SMOOTH TRANSITIONS)
        // ==========================================
        const backdrop = document.getElementById('modalBackdrop');
        
        function openModal(modalId) {
            const modal = document.getElementById(modalId);
            const box = modal.querySelector('.modal-box');
            backdrop.classList.add('modal-active');
            modal.classList.add('modal-active');
            setTimeout(() => { box.classList.add('modal-content-active'); }, 10);
        }

        function closeModal(modalId) {
            const modal = document.getElementById(modalId);
            const box = modal.querySelector('.modal-box');
            box.classList.remove('modal-content-active');
            backdrop.classList.remove('modal-active');
            setTimeout(() => { modal.classList.remove('modal-active'); }, 300);
        }

        function switchMateriTab(type) {
            const isFile = type === 'file';
            document.getElementById('formFile').style.display = isFile ? 'block' : 'none';
            document.getElementById('formLink').style.display = isFile ? 'none' : 'block';
            
            document.getElementById('btnTabFile').className = isFile ? 'flex-1 bg-white text-blue-700 py-2 sm:py-2.5 rounded-md sm:rounded-lg text-[9px] sm:text-[10px] md:text-[11px] font-black uppercase tracking-widest shadow-sm transition-all active:scale-95' : 'flex-1 text-slate-500 hover:text-slate-700 py-2 sm:py-2.5 rounded-md sm:rounded-lg text-[9px] sm:text-[10px] md:text-[11px] font-black uppercase tracking-widest transition-all active:scale-95';
            document.getElementById('btnTabLink').className = isFile ? 'flex-1 text-slate-500 hover:text-slate-700 py-2 sm:py-2.5 rounded-md sm:rounded-lg text-[9px] sm:text-[10px] md:text-[11px] font-black uppercase tracking-widest transition-all active:scale-95' : 'flex-1 bg-white text-purple-700 py-2 sm:py-2.5 rounded-md sm:rounded-lg text-[9px] sm:text-[10px] md:text-[11px] font-black uppercase tracking-widest shadow-sm transition-all active:scale-95';
        }

        function switchVoiceTab(type) {
            const isUpload = type === 'upload';
            document.getElementById('formVoiceUpload').style.display = isUpload ? 'block' : 'none';
            document.getElementById('formVoiceRecord').style.display = isUpload ? 'none' : 'block';
            
            document.getElementById('btnTabVoiceUpload').className = isUpload ? 'flex-1 bg-white text-purple-700 py-2 sm:py-2.5 rounded-md sm:rounded-lg text-[9px] sm:text-[10px] md:text-[11px] font-black uppercase tracking-widest shadow-sm transition-all active:scale-95' : 'flex-1 text-slate-500 hover:text-slate-700 py-2 sm:py-2.5 rounded-md sm:rounded-lg text-[9px] sm:text-[10px] md:text-[11px] font-black uppercase tracking-widest transition-all active:scale-95';
            document.getElementById('btnTabVoiceRecord').className = isUpload ? 'flex-1 text-slate-500 hover:text-slate-700 py-2 sm:py-2.5 rounded-md sm:rounded-lg text-[9px] sm:text-[10px] md:text-[11px] font-black uppercase tracking-widest transition-all active:scale-95' : 'flex-1 bg-white text-purple-700 py-2 sm:py-2.5 rounded-md sm:rounded-lg text-[9px] sm:text-[10px] md:text-[11px] font-black uppercase tracking-widest shadow-sm transition-all active:scale-95';
        }

        function switchVideoTab(type) {
            const isFile = type === 'file';
            document.getElementById('formVidFile').style.display = isFile ? 'block' : 'none';
            document.getElementById('formVidLink').style.display = isFile ? 'none' : 'block';
            
            document.getElementById('btnTabVidFile').className = isFile ? 'flex-1 bg-white text-red-600 py-2 sm:py-2.5 rounded-md sm:rounded-lg text-[9px] sm:text-[10px] md:text-[11px] font-black uppercase tracking-widest shadow-sm transition-all active:scale-95' : 'flex-1 text-slate-500 hover:text-slate-700 py-2 sm:py-2.5 rounded-md sm:rounded-lg text-[9px] sm:text-[10px] md:text-[11px] font-black uppercase tracking-widest transition-all active:scale-95';
            document.getElementById('btnTabVidLink').className = isFile ? 'flex-1 text-slate-500 hover:text-slate-700 py-2 sm:py-2.5 rounded-md sm:rounded-lg text-[9px] sm:text-[10px] md:text-[11px] font-black uppercase tracking-widest transition-all active:scale-95' : 'flex-1 bg-white text-red-600 py-2 sm:py-2.5 rounded-md sm:rounded-lg text-[9px] sm:text-[10px] md:text-[11px] font-black uppercase tracking-widest shadow-sm transition-all active:scale-95';
        }

        // ==========================================
        // 2. LIVE RECORD UNTUK MATERI VOICE
        // ==========================================
        const btnRecordMateriStart = document.getElementById('btnRecordMateriStart');
        const timerMateri = document.getElementById('recordMateriTimer');
        const recordedVoiceMateri = document.getElementById('recordedVoiceMateri');
        const btnSubmitMateriRecord = document.getElementById('btnSubmitMateriRecord');

        let isRecordingMateri = false;
        let materiMediaRecorder, materiAudioChunks = [], materiRecordInterval, materiRecordSeconds = 0;

        btnRecordMateriStart.addEventListener('click', async () => {
            if (!isRecordingMateri) {
                try {
                    const stream = await navigator.mediaDevices.getUserMedia({ audio: true });
                    materiMediaRecorder = new MediaRecorder(stream);
                    materiMediaRecorder.start();
                    isRecordingMateri = true;
                    
                    btnRecordMateriStart.classList.remove('text-purple-500', 'bg-white');
                    btnRecordMateriStart.classList.add('bg-red-500', 'text-white', 'animate-pulse', 'border-red-500');
                    
                    materiRecordSeconds = 0;
                    materiRecordInterval = setInterval(() => {
                        materiRecordSeconds++;
                        const m = String(Math.floor(materiRecordSeconds / 60)).padStart(2, '0');
                        const s = String(materiRecordSeconds % 60).padStart(2, '0');
                        timerMateri.innerText = `🔴 Merekam... ${m}:${s}`;
                    }, 1000);

                    materiAudioChunks = [];
                    materiMediaRecorder.ondataavailable = e => materiAudioChunks.push(e.data);
                } catch(err) {
                    alert("Akses mikrofon ditolak atau tidak ditemukan!");
                }
            } else {
                materiMediaRecorder.onstop = () => {
                    const blob = new Blob(materiAudioChunks, { type: 'audio/webm' });
                    const file = new File([blob], 'materi_voice.webm', { type: 'audio/webm' });
                    
                    const dt = new DataTransfer();
                    dt.items.add(file);
                    recordedVoiceMateri.files = dt.files;
                    
                    btnSubmitMateriRecord.disabled = false;
                    timerMateri.innerText = "✅ Rekaman Selesai (" + timerMateri.innerText.split(' ')[2] + ")";
                    timerMateri.classList.remove('text-slate-500');
                    timerMateri.classList.add('text-green-600');
                    
                    btnRecordMateriStart.classList.remove('bg-red-500', 'text-white', 'animate-pulse', 'border-red-500');
                    btnRecordMateriStart.classList.add('bg-green-100', 'text-green-600', 'border-green-200'); 
                    btnRecordMateriStart.innerHTML = `<svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>`;
                    
                    isRecordingMateri = false;
                };
                materiMediaRecorder.stop();
                clearInterval(materiRecordInterval);
            }
        });


        // ==========================================
        // 3. AUDIO WAVE LOGIC (UNTUK CHAT)
        // ==========================================
        const wavesurfers = {};
        function initWaveSurfer(containerId, audioUrl, isMe) {
            const waveColor = isMe ? 'rgba(255, 255, 255, 0.4)' : '#cbd5e1';
            const progressColor = isMe ? '#ffffff' : '#2563eb';
            const ws = WaveSurfer.create({
                container: '#' + containerId,
                waveColor: waveColor,
                progressColor: progressColor,
                height: 20,
                barWidth: 2,
                barGap: 2,
                barRadius: 2,
                cursorWidth: 0,
                url: audioUrl
            });
            wavesurfers[containerId] = ws;
            ws.on('finish', () => { document.getElementById('btn-' + containerId).innerHTML = '▶'; });
        }

        function togglePlay(containerId) {
            const ws = wavesurfers[containerId];
            const btn = document.getElementById('btn-' + containerId);
            if(ws) {
                ws.playPause();
                btn.innerHTML = ws.isPlaying() ? '⏸' : '▶';
            }
        }

        document.addEventListener('DOMContentLoaded', () => {
            const chatContainer = document.getElementById('chatContainer');
            if(chatContainer) chatContainer.scrollTop = chatContainer.scrollHeight;

            document.querySelectorAll('[id^="wave-"]').forEach(el => {
                const url = el.getAttribute('data-audio');
                const isMe = el.parentElement.classList.contains('border-white/30');
                initWaveSurfer(el.id, url, isMe);
            });
        });

        // ==========================================
        // 4. CHAT LOGIC (Voice & Image)
        // ==========================================
        function previewImage(input) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('imagePreviewElement').src = e.target.result;
                    const container = document.getElementById('imagePreviewContainer');
                    container.classList.remove('hidden');
                    container.classList.add('inline-block');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        function cancelImage() {
            document.getElementById('imageInput').value = '';
            document.getElementById('imagePreviewElement').src = '';
            const container = document.getElementById('imagePreviewContainer');
            container.classList.remove('inline-block');
            container.classList.add('hidden');
        }

        let mediaRecorder;
        let audioChunks = [];
        let recordInterval;
        let recordSeconds = 0;
        let mediaStream = null;

        const recordBtn = document.getElementById('recordBtn');
        const cancelRecordBtn = document.getElementById('cancelRecordBtn');
        const voiceInput = document.getElementById('voiceInput');
        const messageInput = document.getElementById('messageInput');
        const normalInputWrapper = document.getElementById('normalInputWrapper');
        const recordingWrapper = document.getElementById('recordingWrapper');
        const timerText = document.getElementById('recordTimer');
        const btnUploadImage = document.getElementById('btnUploadImage');
        const cancelVoiceBtn = document.getElementById('cancelVoiceBtn');
        const uploadImageContainer = document.getElementById('uploadImageContainer');

        function updateChatTimer() {
            recordSeconds++;
            const m = String(Math.floor(recordSeconds / 60)).padStart(2, '0');
            const s = String(recordSeconds % 60).padStart(2, '0');
            timerText.innerText = `${m}:${s}`;
        }

        if(recordBtn) {
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
                        timerText.innerText = "00:00";
                        recordInterval = setInterval(updateChatTimer, 1000);

                        audioChunks = [];
                        mediaRecorder.ondataavailable = event => { audioChunks.push(event.data); };
                        
                    } catch(err) {
                        alert("Mikrofon tidak diizinkan atau tidak ditemukan!");
                    }
                } else {
                    // SELESAI REKAMAN
                    mediaRecorder.onstop = () => {
                        if (mediaStream) {
                            mediaStream.getTracks().forEach(track => track.stop());
                        }

                        const audioBlob = new Blob(audioChunks, { type: 'audio/webm' });
                        const file = new File([audioBlob], "voice.webm", { type: "audio/webm" });
                        
                        const dataTransfer = new DataTransfer();
                        dataTransfer.items.add(file);
                        voiceInput.files = dataTransfer.files;
                        
                        recordingWrapper.classList.add('hidden');
                        recordingWrapper.classList.remove('flex');
                        normalInputWrapper.classList.remove('hidden');
                        
                        recordBtn.classList.add('hidden');
                        if (cancelRecordBtn) cancelRecordBtn.classList.add('hidden');
                        
                        messageInput.placeholder = "Suara siap dikirim...";
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
                messageInput.placeholder = "Tulis balasan Anda...";
                messageInput.disabled = false;
                messageInput.classList.remove('font-bold', 'text-blue-600', 'bg-blue-50', 'rounded-full', 'sm:rounded-xl', 'px-3', 'sm:px-4');
                messageInput.classList.add('bg-transparent', 'px-2');
                
                cancelVoiceBtn.classList.add('hidden');
                if (uploadImageContainer) uploadImageContainer.classList.remove('hidden');
                recordBtn.classList.remove('hidden', 'text-white', 'bg-red-500', 'animate-pulse', 'border-red-600');
                recordBtn.classList.add('text-slate-400', 'bg-white', 'sm:bg-transparent');
            });
        }

        // ==========================================
        // 5. AJAX SEND CHAT
        // ==========================================
        const myName = "{{ auth('dosen')->user()->nama ?? auth('dosen')->user()->name ?? 'Dosen' }}";
        const myPhotoDb = "{{ auth('dosen')->user()->foto ?? '' }}";
        const myAvatar = myPhotoDb ? `{{ asset('storage') }}/${myPhotoDb}` : `https://ui-avatars.com/api/?name=${encodeURIComponent(myName)}&background=2563eb&color=fff`;

        const chatForm = document.getElementById('chatForm');
        if (chatForm) {
            chatForm.addEventListener('submit', async function (e) {
                e.preventDefault(); 
                
                if (!messageInput.value.trim() && (!imageInput || !imageInput.files.length) && (!voiceInput || !voiceInput.files.length)) return;

                const sendIcon = document.getElementById('sendIcon');
                const sendLoading = document.getElementById('sendLoading');
                const btnSubmit = document.getElementById('sendChatBtn');
                
                btnSubmit.disabled = true;
                sendIcon.classList.add('hidden');
                sendLoading.classList.remove('hidden');

                const formData = new FormData(this);

                try {
                    const response = await fetch(this.action, {
                        method: 'POST',
                        body: formData,
                        headers: { 'X-Requested-With': 'XMLHttpRequest', 'Accept': 'application/json' }
                    });

                    const data = await response.json();

                    if (response.ok && data.success) {
                        this.reset();
                        cancelImage(); 
                        
                        voiceInput.value = '';
                        messageInput.disabled = false;
                        messageInput.classList.remove('text-blue-600', 'font-bold', 'bg-blue-50', 'rounded-full', 'sm:rounded-xl', 'px-3', 'sm:px-4');
                        messageInput.classList.add('bg-transparent', 'px-2');
                        messageInput.placeholder = "Tulis balasan Anda...";
                        cancelVoiceBtn.classList.add('hidden');
                        if (uploadImageContainer) uploadImageContainer.classList.remove('hidden');
                        recordBtn.classList.remove('hidden', 'text-white', 'bg-red-500', 'animate-pulse', 'border-red-600');
                        recordBtn.classList.add('text-slate-400', 'bg-white', 'sm:bg-transparent');
                        
                        const d = data.diskusi;
                        let mediaHtml = '';
                        
                        if (d.image) {
                            mediaHtml += `<img src="${d.image}" class="mt-2 rounded-xl max-w-full md:max-w-xs border border-white/20">`;
                        }
                        
                        const uniqueWaveId = 'wave-new-' + Date.now();
                        if (d.voice) {
                            mediaHtml += `
                            <div class="mt-1.5 sm:mt-2 flex items-center gap-2 sm:gap-3 bg-white/20 p-1.5 sm:p-2 rounded-lg sm:rounded-xl backdrop-blur-sm border border-white/30 w-[160px] sm:w-[180px] md:w-[240px]">
                                <button type="button" onclick="togglePlay('${uniqueWaveId}')" id="btn-${uniqueWaveId}" class="w-6 h-6 sm:w-7 sm:h-7 md:w-8 md:h-8 shrink-0 flex items-center justify-center rounded-full bg-white text-blue-600 shadow hover:scale-105 transition-transform text-[8px] sm:text-[10px] md:text-xs">▶</button>
                                <div id="${uniqueWaveId}" class="flex-1 h-3 sm:h-4 md:h-4" data-audio="${d.voice}"></div>
                            </div>`;
                        }
                        
                        let msgHtml = d.message ? `<p class="text-[11px] sm:text-xs md:text-[13px] leading-relaxed font-medium whitespace-pre-wrap break-words">${d.message}</p>` : '';

                        const chatHtml = `
                        <div class="flex justify-end chat-bubble-new safe-fade-in">
                            <div class="flex gap-2 sm:gap-3 items-end max-w-[90%] sm:max-w-[85%] md:max-w-[70%] flex-row-reverse">
                                <img src="${myAvatar}" class="w-7 h-7 sm:w-8 sm:h-8 md:w-9 md:h-9 rounded-full shrink-0 shadow-sm object-cover border border-slate-100" />
                                <div class="flex flex-col items-end">
                                    <p class="text-[8px] sm:text-[9px] md:text-[10px] font-bold mb-1 px-1 text-slate-400">Anda</p>
                                    <div class="p-2.5 sm:p-3 md:p-4 rounded-xl sm:rounded-2xl shadow-sm border bg-blue-600 text-white rounded-tr-none border-blue-700">
                                        ${msgHtml}
                                        ${mediaHtml}
                                    </div>
                                    <p class="text-[7px] sm:text-[8px] md:text-[9px] mt-1.5 px-1 font-bold text-slate-400 mr-1">${d.time}</p>
                                </div>
                            </div>
                        </div>`;

                        const chatContainer = document.getElementById('chatContainer');
                        const emptyState = document.getElementById('emptyChat');
                        if (emptyState) emptyState.remove();

                        chatContainer.insertAdjacentHTML('beforeend', chatHtml);
                        chatContainer.scrollTop = chatContainer.scrollHeight; 
                        
                        if(d.voice) { setTimeout(() => initWaveSurfer(uniqueWaveId, d.voice, true), 100); }

                    } else { alert(data.error || "Pesan gagal dikirim."); }
                } catch (error) { console.error("Error:", error); } 
                finally {
                    btnSubmit.disabled = false;
                    sendLoading.classList.add('hidden');
                    sendIcon.classList.remove('hidden');
                }
            });
        }
    </script>
    <x-accessibility-widget />
</body>
</html>