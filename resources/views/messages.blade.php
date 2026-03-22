<!DOCTYPE html>
@php
    $activeDosenId = $dosen ?? null;
    $messages = $chatMessages ?? collect();
    $listPercakapan = $conversations ?? []; 
    
    $mahasiswaId = Auth::guard('mahasiswa')->id() ?? 1; 
    $unreadCount = \App\Models\Message::where('receiver_type', 'mahasiswa')
                    ->where('receiver_id', $mahasiswaId)
                    ->where('is_read', 0)
                    ->count();

    // DEFINISI NAMA DOSEN AKTIF
    $displayName = 'Dosen';
    if($activeDosenId) {
        $currentDosen = \App\Models\Dosen::find($activeDosenId);
        $displayName = $currentDosen->nama ?? 'Dosen';
    }

    // VARIABEL UNTUK VOICE ASSISTANT
    $lastMsgVA = $messages->last();
    $hasVoice = ($lastMsgVA && $lastMsgVA->voice_path) ? 'true' : 'false';
    $hasImage = ($lastMsgVA && $lastMsgVA->image_path) ? 'true' : 'false';
    $lastWaveId = ($lastMsgVA && $lastMsgVA->voice_path) ? 'wave-' . $lastMsgVA->id : '';
    
    $lastMsgTextVA = '';
    if ($lastMsgVA) {
        if ($lastMsgVA->body) {
            $lastMsgTextVA = $lastMsgVA->body;
        } elseif ($lastMsgVA->voice_path) {
            $lastMsgTextVA = 'Pesan suara';
        } elseif ($lastMsgVA->image_path) {
            $lastMsgTextVA = 'Mengirim gambar';
        }
    } else {
        $lastMsgTextVA = 'Belum ada pesan';
    }
    
    $senderNameVA = ($lastMsgVA && $lastMsgVA->sender_type == 'dosen') ? $displayName : 'Anda';
@endphp
<html lang="id">
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>Pesan | LMS Inklusi UMMI</title>

        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
        <script src="https://unpkg.com/wavesurfer.js@7"></script>

        <style>
            .scrollbar-hide::-webkit-scrollbar { display: none; }
            .custom-scrollbar::-webkit-scrollbar { width: 4px; }
            .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
            .custom-scrollbar::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 4px; }
            .custom-scrollbar::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
            
            @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
            @keyframes popIn { 0% { opacity: 0; transform: translateY(15px) scale(0.95); } 100% { opacity: 1; transform: translateY(0) scale(1); } }
            
            .safe-fade-in { animation: fadeIn 0.4s ease-out forwards; opacity: 0; }
            .chat-bubble-new { animation: popIn 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards; }
            #chatBox { scroll-behavior: smooth; }
            
            @keyframes wave-bounce { 0%, 100% { height: 4px; } 50% { height: 16px; } }
            .recording-wave .bar { width: 3px; background-color: #ef4444; border-radius: 99px; animation: wave-bounce 1s ease-in-out infinite; }
            .recording-wave .bar:nth-child(1) { animation-delay: 0.0s; height: 8px;}
            .recording-wave .bar:nth-child(2) { animation-delay: 0.2s; height: 12px;}
            .recording-wave .bar:nth-child(3) { animation-delay: 0.4s; height: 16px;}
            .recording-wave .bar:nth-child(4) { animation-delay: 0.1s; height: 10px;}
            .recording-wave .bar:nth-child(5) { animation-delay: 0.3s; height: 14px;}
            .recording-wave .bar:nth-child(6) { animation-delay: 0.5s; height: 8px;}
            
            @keyframes pulse-border { 0% { border-color: #3b82f6; box-shadow: 0 0 0 0 rgba(59, 130, 246, 0.4); } 70% { border-color: #60a5fa; box-shadow: 0 0 0 6px rgba(59, 130, 246, 0); } 100% { border-color: #3b82f6; box-shadow: 0 0 0 0 rgba(59, 130, 246, 0); } }
            .dictating-active { animation: pulse-border 1.5s infinite; background-color: #eff6ff !important; }
            .confirming-active { background-color: #fef3c7 !important; border-color: #f59e0b !important; }
            .wave-bar { transition: height 0.1s ease; }
        </style>
    </head>
    <body class="m-0 font-['Plus_Jakarta_Sans'] bg-slate-50 text-slate-800 antialiased h-[100dvh] flex overflow-hidden">
        <div id="mobileBackdrop" onclick="toggleSidebar()" class="fixed inset-0 bg-slate-900/50 z-40 hidden lg:hidden transition-opacity"></div>

        <aside id="sidebar" class="fixed lg:static inset-y-0 left-0 z-50 w-80 bg-white border-r border-slate-200 flex flex-col h-[100dvh] transform -translate-x-full lg:translate-x-0 transition-transform duration-300 shrink-0 shadow-2xl lg:shadow-none">
            <div class="p-8 border-b border-slate-100 flex items-center gap-4 shrink-0">
                <img src="{{ asset('images/logo-ummi.png') }}" class="w-10 h-10 object-contain" alt="Logo UMMI" onerror="this.src = 'https://via.placeholder.com/40'" />
                <div>
                    <h1 class="text-lg font-black text-slate-900 tracking-tight leading-none">LMS Inklusi</h1>
                    <p class="text-[9px] font-bold text-blue-600 uppercase tracking-widest mt-1">Portal Mahasiswa</p>
                </div>
                <button onclick="toggleSidebar()" class="lg:hidden ml-auto text-slate-400 hover:text-slate-600 bg-slate-50 p-2 rounded-lg cursor-pointer">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>

            <nav class="flex-1 p-6 space-y-3 overflow-y-auto custom-scrollbar">
                <a href="{{ url('/dashboard') }}" data-menu="5" class="flex items-center justify-between p-4 text-slate-500 hover:bg-slate-50 hover:text-slate-900 rounded-2xl font-bold transition-all">
                    <div class="flex items-center gap-4">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                        <span>Beranda</span>
                    </div>
                    <span class="text-[10px] bg-black text-white px-2 py-1 rounded-lg font-black shadow-sm">5</span>
                </a>

                <a href="{{ url('/mahasiswa/profile') }}" data-menu="6" class="flex items-center justify-between p-4 text-slate-500 hover:bg-slate-50 hover:text-slate-900 rounded-2xl font-bold transition-all">
                    <div class="flex items-center gap-4">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        <span>Profil Saya</span>
                    </div>
                    <span class="text-[10px] bg-black text-white px-2 py-1 rounded-lg font-black shadow-sm">6</span>
                </a>

                <a href="{{ url('/pemberitahuan') }}" data-menu="7" class="flex items-center justify-between p-4 text-slate-500 hover:bg-slate-50 hover:text-slate-900 rounded-2xl font-bold transition-all">
                    <div class="flex items-center gap-4">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                        <span>Pemberitahuan</span>
                    </div>
                    <span class="text-[10px] bg-black text-white px-2 py-1 rounded-lg font-black shadow-sm">7</span>
                </a>

                <a href="{{ url('/pesan') }}" data-menu="8" class="flex items-center justify-between p-4 bg-blue-50 text-blue-700 rounded-2xl font-bold transition-all shadow-sm border border-blue-100">
                    <div class="flex items-center gap-4">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
                        <span>Pesan</span>
                    </div>
                    <span class="text-[10px] bg-black text-white px-2 py-1 rounded-lg font-black shadow-sm">8</span>
                </a>

                <a href="{{ url('/bantuan') }}" data-menu="9" class="flex items-center justify-between p-4 text-slate-500 hover:bg-slate-50 hover:text-slate-900 rounded-2xl font-bold transition-all">
                    <div class="flex items-center gap-4">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span>Bantuan</span>
                    </div>
                    <span class="text-[10px] bg-black text-white px-2 py-1 rounded-lg font-black shadow-sm">9</span>
                </a>
            </nav>

            <div class="p-6 border-t border-slate-100 shrink-0">
                <button data-menu="0" class="w-full p-4 flex items-center justify-between text-red-600 font-bold bg-red-50 rounded-2xl hover:bg-red-100 transition-all border border-red-100 cursor-pointer">
                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                        <span>Keluar</span>
                    </div>
                    <span class="text-[10px] bg-black text-white px-2 py-1 rounded-lg font-black shadow-sm">0</span>
                </button>
            </div>
        </aside>

        <main class="flex-1 flex flex-col h-[100dvh] relative min-w-0 bg-[#f8fafc] overflow-hidden">
            
            <header class="bg-white/80 backdrop-blur-xl border-b border-slate-200/60 px-4 md:px-8 py-3 sm:py-6 shrink-0 z-20 cursor-pointer" id="voice-header" title="Ketuk 2x untuk memotong suara sistem">
                <div class="max-w-7xl mx-auto flex items-center justify-between h-10 sm:h-14 pointer-events-none">
                    <div class="flex items-center gap-2 sm:gap-4 pointer-events-auto">
                        <button onclick="toggleSidebar()" class="lg:hidden p-1.5 sm:p-2 text-slate-500 hover:bg-slate-100 hover:text-slate-800 rounded-lg transition-all focus:outline-none cursor-pointer">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                        </button>
                        <div>
                            <h2 class="text-lg sm:text-2xl font-extrabold text-slate-900 tracking-tight leading-none">Pesan Masuk</h2>
                            <p class="text-[9px] sm:text-sm font-medium text-slate-500 mt-1">Komunikasi Akademik</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-2 sm:gap-4 pointer-events-auto">
                        <div class="flex items-center gap-1 sm:gap-3 pr-2 sm:pr-4 border-r border-slate-200">
                            <button data-menu="7" class="relative p-1.5 sm:p-2 text-slate-400 hover:text-blue-600 transition-all cursor-pointer">
                                <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                                @if($unreadCount > 0)<span class="absolute top-1.5 right-1.5 sm:top-2 sm:right-2 w-2 h-2 bg-red-500 rounded-full animate-pulse border-2 border-white z-10"></span>@endif
                            </button>
                            <button data-menu="9" class="hidden sm:block p-1.5 sm:p-2 text-slate-400 hover:text-blue-600 transition-all cursor-pointer relative">
                                <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </button>
                        </div>
                        
                        <div class="flex items-center gap-1.5 sm:gap-3 pl-1 sm:pl-2 w-[90px] sm:w-[130px] justify-start shrink-0 cursor-pointer">
                            <div class="flex items-center gap-[2px] h-4 w-4 sm:w-6 justify-center shrink-0" id="wave-container">
                                <div class="wave-bar w-[2px] bg-blue-500 rounded-full h-1 transition-all"></div>
                                <div class="wave-bar w-[2px] bg-blue-400 rounded-full h-1 transition-all"></div>
                                <div class="wave-bar w-[2px] bg-blue-600 rounded-full h-1 transition-all"></div>
                            </div>
                            <span id="status-desc" class="text-[8px] sm:text-[9px] font-black text-slate-400 uppercase tracking-widest text-left w-16 sm:w-24 truncate">MENYIAPKAN</span>
                        </div>
                    </div>
                </div>
            </header>

            <div class="flex-1 flex overflow-hidden max-w-7xl mx-auto w-full">
                <div data-aos="fade-right" data-aos-duration="600" class="w-full md:w-80 bg-white border-r border-l border-slate-200 flex-col overflow-y-auto z-10 shrink-0 safe-fade-in custom-scrollbar {{ $activeDosenId ? 'hidden md:flex' : 'flex' }}">
                    <div class="p-3 sm:p-4 border-b border-slate-100 sticky top-0 bg-white/90 backdrop-blur-sm z-10">
                        <div class="relative">
                            <input type="text" id="searchInput" placeholder="Cari Dosen..." class="w-full bg-slate-50 border border-slate-100 rounded-xl px-4 py-2.5 sm:py-3 text-[10px] sm:text-xs font-bold focus:ring-2 focus:ring-blue-500 outline-none transition-all placeholder:text-slate-400 pl-9 sm:pl-10" />
                            <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 absolute left-3.5 sm:left-4 top-3 sm:top-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        </div>
                    </div>
                    
                    <div id="contactList" class="p-2 space-y-1 overflow-y-auto custom-scrollbar">
                        @php $voiceIdCounter = 15; @endphp
                        @forelse($listPercakapan as $d_id => $msgs)
                            @php
                                $last = $msgs->last();
                                $dsn = \App\Models\Dosen::find($d_id);
                                $isUnread = $last->sender_type == 'dosen' && $last->is_read == 0;
                            @endphp
                            @if($dsn)
                            <a href="{{ url('/messages/'.$d_id) }}" data-voice-id="{{ $voiceIdCounter }}" class="block safe-fade-in relative mt-2 contact-item">
                                <div class="p-2.5 sm:p-3 {{ $activeDosenId == $d_id ? 'bg-blue-50 border border-blue-100 shadow-sm' : 'hover:bg-slate-50 border border-transparent hover:border-slate-100' }} rounded-xl flex gap-2 sm:gap-3 cursor-pointer transition-all relative">
                                    @if($isUnread) <span class="absolute top-2 right-2 w-2 h-2 sm:w-2.5 sm:h-2.5 bg-red-500 rounded-full animate-pulse border-2 border-white z-10"></span> @endif
                                    
                                    <div class="absolute -left-1 -top-1 bg-black text-white text-[8px] sm:text-[10px] font-black px-1.5 py-0.5 rounded-md shadow-sm z-10">{{ $voiceIdCounter }}</div>

                                    <div class="w-9 h-9 sm:w-10 sm:h-10 rounded-lg sm:rounded-xl bg-slate-200 shrink-0 overflow-hidden border border-slate-100 flex items-center justify-center ml-1">
                                        <img src="https://ui-avatars.com/api/?name={{ urlencode($dsn->nama) }}&background=0D8ABC&color=fff" class="w-full h-full object-cover" />
                                    </div>
                                    <div class="flex-1 overflow-hidden">
                                        <div class="flex justify-between items-center mb-0.5">
                                            <h4 class="font-bold {{ $isUnread ? 'text-slate-900' : 'text-slate-700' }} text-[10px] sm:text-xs truncate">{{ $dsn->nama }}</h4>
                                            <span class="text-[8px] sm:text-[9px] font-bold {{ $isUnread ? 'text-blue-600' : 'text-slate-400' }} shrink-0 ml-2">{{ $last ? $last->created_at->format('H:i') : '' }}</span>
                                        </div>
                                        <p class="text-[9px] sm:text-[10px] {{ $isUnread ? 'text-slate-800 font-bold' : 'text-slate-500 font-medium' }} truncate">
                                            {{ $last && $last->body ? $last->body : ($last && $last->voice_path ? '[Voice Note]' : ($last && $last->image_path ? '[Gambar]' : 'Belum ada pesan')) }}
                                        </p>
                                    </div>
                                </div>
                            </a>
                            @php $voiceIdCounter++; @endphp
                            @endif
                        @empty
                            <div class="p-6 text-center"><p class="text-[10px] sm:text-xs text-slate-400 font-bold">Belum ada riwayat obrolan.</p></div>
                        @endforelse
                    </div>
                </div>

                <div class="flex-1 flex-col bg-[#f0f4f8] relative safe-fade-in {{ $activeDosenId ? 'flex' : 'hidden md:flex' }}">
                    @if($activeDosenId)
                        <div class="p-3 sm:p-4 bg-white/80 backdrop-blur-md border-b border-slate-200 flex items-center justify-between sticky top-0 z-10 shrink-0 shadow-sm">
                            <div class="flex items-center gap-3" data-aos="fade-down" data-aos-duration="500">
                                <a href="{{ url('/pesan') }}" class="md:hidden flex items-center justify-center w-8 h-8 rounded-full bg-slate-100 text-slate-600 hover:bg-slate-200 transition-all border border-slate-200 mr-1">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                                </a>
                                <div class="w-9 h-9 sm:w-10 sm:h-10 rounded-xl bg-blue-100 overflow-hidden border border-blue-200 shrink-0">
                                    <img src="https://ui-avatars.com/api/?name={{ urlencode($displayName) }}&background=0D8ABC&color=fff" class="w-full h-full object-cover" />
                                </div>
                                <div>
                                    <h4 class="font-black text-slate-900 text-xs sm:text-sm leading-tight max-w-[150px] sm:max-w-xs truncate">{{ $displayName }}</h4>
                                    <span class="inline-flex items-center text-[9px] font-bold text-emerald-600 uppercase tracking-widest mt-0.5">
                                        <span class="w-1.5 h-1.5 bg-emerald-500 rounded-full mr-1.5 animate-pulse"></span> Online
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="flex-1 p-3 sm:p-4 md:p-6 overflow-y-auto space-y-4 sm:space-y-6 custom-scrollbar bg-white" id="chatBox">
                            @forelse($messages as $msg)
                                @php $isMe = $msg->sender_type === 'mahasiswa'; @endphp
                                <div id="msg-{{ $msg->id }}" class="flex {{ $isMe ? 'justify-end' : 'justify-start' }} safe-fade-in chat-bubble-new">
                                    <div class="flex flex-col {{ $isMe ? 'items-end' : 'items-start' }} max-w-[85%] md:max-w-[70%]">
                                        <div class="p-2.5 sm:p-3 md:p-4 rounded-xl sm:rounded-2xl shadow-sm border {{ $isMe ? 'bg-blue-600 text-white rounded-tr-none border-blue-700' : 'bg-slate-50 text-slate-800 rounded-tl-none border-slate-200' }}">
                                            @if($msg->body)<p class="text-[11px] sm:text-xs md:text-[13px] leading-relaxed font-medium whitespace-pre-wrap break-words">{{ $msg->body }}</p>@endif
                                            @if($msg->image_path)<img src="{{ asset('storage/'.$msg->image_path) }}" class="mt-1.5 sm:mt-2 rounded-lg sm:rounded-xl max-w-full md:max-w-xs border {{ $isMe ? 'border-white/20' : 'border-slate-200' }}">@endif
                                            @if(isset($msg->voice_path) && $msg->voice_path)
                                                <div class="mt-1.5 sm:mt-2 flex items-center gap-2 sm:gap-3 bg-white/20 p-1.5 sm:p-2 rounded-lg sm:rounded-xl backdrop-blur-sm border {{ $isMe ? 'border-white/30' : 'border-slate-300 bg-white' }} w-[160px] sm:w-[180px] md:w-[240px]">
                                                    <button type="button" onclick="togglePlay('wave-{{ $msg->id }}')" id="btn-wave-{{ $msg->id }}" class="w-6 h-6 sm:w-7 sm:h-7 md:w-8 md:h-8 shrink-0 flex items-center justify-center rounded-full {{ $isMe ? 'bg-white text-blue-600' : 'bg-blue-600 text-white' }} shadow hover:scale-105 transition-transform text-[8px] sm:text-[10px] md:text-xs">▶</button>
                                                    <div id="wave-{{ $msg->id }}" class="flex-1 h-3 sm:h-4 md:h-4" data-audio="{{ asset('storage/' . $msg->voice_path) }}"></div>
                                                </div>
                                            @endif
                                        </div>
                                        <span class="text-[7px] sm:text-[8px] md:text-[9px] font-bold text-slate-400 mt-1 {{ $isMe ? 'mr-1' : 'ml-1' }}">{{ $msg->created_at->format('H:i') }}</span>
                                    </div>
                                </div>
                            @empty
                                <div id="emptyChat" class="h-full flex flex-col items-center justify-center text-center opacity-70">
                                    <div class="w-12 h-12 sm:w-14 sm:h-14 md:w-16 md:h-16 bg-blue-50 text-blue-400 rounded-full flex items-center justify-center mb-3 sm:mb-4 border border-blue-100">
                                        <svg class="w-6 h-6 sm:w-7 sm:h-7 md:w-8 md:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                                    </div>
                                    <p class="text-xs sm:text-sm md:text-base text-slate-600 font-bold">Belum ada percakapan.</p>
                                    <p class="text-[8px] sm:text-[9px] md:text-[10px] text-slate-400 uppercase tracking-widest mt-1">Sapa Dosen Anda!</p>
                                </div>
                            @endforelse
                        </div>

                        <div class="p-2 sm:p-3 md:p-4 border-t border-slate-100 bg-white shrink-0 shadow-[0_-4px_10px_rgba(0,0,0,0.02)] relative z-20 pb-4 sm:pb-4">
                            <div id="imagePreviewContainer" class="hidden mb-2 relative p-2 bg-slate-50 border border-slate-200 rounded-xl sm:rounded-2xl w-fit">
                                <img id="imagePreviewElement" src="" class="h-16 sm:h-20 md:h-24 w-auto object-cover rounded-lg sm:rounded-xl shadow-sm border border-slate-200">
                                <button type="button" onclick="cancelImage()" class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full w-5 h-5 sm:w-6 sm:h-6 flex items-center justify-center font-bold text-[10px] sm:text-xs shadow-lg hover:bg-red-600 hover:scale-110 transition-transform">✕</button>
                            </div>

                            <form id="chatForm" method="POST" action="{{ url('/messages/send') }}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="receiver_id" value="{{ $activeDosenId }}">
                                <input type="file" name="image" id="imageInput" accept="image/*" class="hidden" onchange="previewImage(this)">
                                <input type="file" name="voice" id="voiceInput" accept="audio/webm" class="hidden">

                                <div class="relative flex items-center gap-1.5 sm:gap-2 md:gap-3 bg-slate-50 p-1.5 sm:p-2 md:p-3 rounded-2xl sm:rounded-[1.25rem] md:rounded-2xl border border-slate-200 focus-within:border-blue-400 focus-within:ring-2 focus-within:ring-blue-100 transition-all shadow-sm w-full">
                                    
                                    <div id="uploadImageContainer" class="relative shrink-0 flex items-center">
                                        <button type="button" onclick="document.getElementById('imageInput').click()" id="btnUploadImage" class="w-8 h-8 sm:w-9 sm:h-9 md:w-10 md:h-10 rounded-xl flex items-center justify-center text-slate-400 hover:text-blue-600 hover:bg-white transition-all cursor-pointer shadow-sm border border-transparent hover:border-blue-100 bg-white sm:bg-transparent">
                                            <svg class="w-4 h-4 sm:w-5 sm:h-5 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                        </button>
                                        <span class="absolute -top-1 -right-1 sm:-top-1.5 sm:-right-1.5 bg-slate-900 text-white text-[7px] sm:text-[8px] font-black px-1.5 py-0.5 rounded-md shadow-sm border border-white">2</span>
                                    </div>

                                    <div id="normalInputWrapper" class="flex-1 min-w-0 relative flex items-center bg-white sm:bg-transparent rounded-xl sm:rounded-none px-2 sm:px-0 shadow-sm sm:shadow-none py-0.5 sm:py-0">
                                        <div class="absolute left-2 text-[8px] sm:text-[10px] font-black text-white bg-slate-900 px-1.5 py-0.5 rounded-md shadow-sm z-10 hidden sm:block">1</div>
                                        <input type="text" name="body" id="messageInput" placeholder="Sebut 1 untuk ketik..." autocomplete="off" class="w-full bg-transparent text-[10px] sm:text-xs md:text-sm font-medium text-slate-700 placeholder-slate-400 focus:outline-none transition-all py-1 sm:py-1.5 pl-1 sm:pl-8" />
                                        
                                        <button type="button" id="cancelVoiceToTextBtn" onclick="batalKetikSuara()" class="hidden absolute right-1 sm:right-2 text-[8px] sm:text-[10px] font-black text-white bg-red-500 hover:bg-red-600 px-2 py-1 sm:px-2.5 sm:py-1.5 rounded-md sm:rounded-lg shadow-sm transition-all cursor-pointer z-20">Batal</button>
                                        <button type="button" id="cancelVoiceBtn" onclick="batalRekamChat()" class="hidden absolute right-1 sm:right-2 text-[8px] sm:text-[10px] font-black text-white bg-red-500 hover:bg-red-600 px-2 py-1 sm:px-2.5 sm:py-1.5 rounded-md sm:rounded-lg shadow-sm transition-all cursor-pointer z-20">Batal</button>
                                    </div>

                                    <div id="recordingWrapper" class="hidden flex-1 items-center justify-between px-2 bg-red-50 rounded-lg py-1 sm:py-0 sm:bg-transparent border border-red-100 sm:border-none">
                                        <div class="flex items-center gap-1.5 sm:gap-2">
                                            <span class="w-2 h-2 sm:w-2.5 sm:h-2.5 bg-red-500 rounded-full animate-pulse shadow-[0_0_8px_rgba(239,68,68,0.8)]"></span>
                                            <span class="text-[9px] sm:text-[10px] font-bold text-red-500 font-mono tracking-wider" id="recordTimer">00:00</span>
                                            <div class="recording-wave flex items-center gap-0.5 sm:gap-1 h-3 sm:h-5 ml-1 sm:ml-2">
                                                <div class="bar"></div><div class="bar"></div><div class="bar"></div><div class="bar"></div><div class="bar"></div><div class="bar"></div>
                                            </div>
                                        </div>
                                        <button type="button" id="cancelRecordBtn" onclick="batalRekamChat()" class="text-[8px] sm:text-[9px] font-black uppercase text-slate-400 hover:text-red-500 px-1 sm:px-2 transition-colors cursor-pointer bg-white sm:bg-transparent rounded py-0.5 sm:py-0 shadow-sm sm:shadow-none">Batal</button>
                                    </div>

                                    <div id="recordBtnContainer" class="relative shrink-0 flex items-center">
                                        <button type="button" id="recordBtn" class="w-8 h-8 sm:w-9 sm:h-9 md:w-10 md:h-10 rounded-xl flex items-center justify-center text-slate-400 hover:text-red-500 hover:bg-red-50 transition-all cursor-pointer border border-transparent hover:border-red-100 shadow-sm bg-white sm:bg-transparent">
                                            <svg class="w-4 h-4 sm:w-5 sm:h-5 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18.75a6 6 0 006-6v-1.5m-6 7.5a6 6 0 01-6-6v-1.5m6 7.5v3.75m-3.75 0h7.5M12 15.75a3 3 0 01-3-3V4.5a3 3 0 116 0v8.25a3 3 0 01-3 3z"></path></svg>
                                        </button>
                                        <span class="absolute -top-1 -right-1 sm:-top-1.5 sm:-right-1.5 bg-slate-900 text-white text-[7px] sm:text-[8px] font-black px-1.5 py-0.5 rounded-md shadow-sm border border-white">3</span>
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
                    @else
                        <div class="flex-1 flex flex-col items-center justify-center text-center p-6 safe-fade-in h-full">
                            <div class="w-16 h-16 sm:w-20 sm:h-20 bg-blue-50 text-blue-300 rounded-full flex items-center justify-center mb-4"><svg class="w-8 h-8 sm:w-10 sm:h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg></div>
                            <h3 class="text-base sm:text-lg md:text-xl font-black text-slate-700">Pesan Inklusi</h3>
                            <p class="text-[10px] sm:text-xs md:text-sm text-slate-500 mt-2 max-w-xs">Pilih kontak Dosen atau ucapkan "Cari [Nama]" untuk memulai obrolan.</p>
                        </div>
                    @endif
                </div>
            </div>
        </main>

        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            const listDosenVA = [
                @php $vId = 15; @endphp
                @foreach($listPercakapan as $d_id => $msgs)
                    @php $dsnName = \App\Models\Dosen::find($d_id)->nama ?? 'Dosen'; @endphp
                    { id: {{ $d_id }}, nama: "{{ addslashes($dsnName) }}", voiceId: {{ $vId }} },
                    @php $vId++; @endphp
                @endforeach
            ];

            const isActiveChat = {{ $activeDosenId ? 'true' : 'false' }};
            const currentDosenName = "{{ addslashes($displayName ?? '') }}";
            const mahasiswaId = {{ $mahasiswaId }};
            
            const isLastMsgVoice = {{ $hasVoice }};
            const isLastMsgImage = {{ $hasImage }};
            const lastMessageText = "{{ addslashes($lastMsgTextVA) }}";
            const lastMessageSender = "{{ addslashes($senderNameVA) }}";

            AOS.init({ once: true, easing: "ease-out-cubic" });

            function toggleSidebar() {
                document.getElementById("sidebar").classList.toggle("-translate-x-full");
                document.getElementById("mobileBackdrop").classList.toggle("hidden");
            }

            let isAutoPlaying = false; 

            const wavesurfers = {};
            function initWaveSurfer(containerId, audioUrl, isMe) {
                const ws = WaveSurfer.create({
                    container: '#' + containerId,
                    waveColor: isMe ? 'rgba(255, 255, 255, 0.4)' : '#cbd5e1',
                    progressColor: isMe ? '#ffffff' : '#2563eb',
                    height: 20, barWidth: 2, barGap: 2, barRadius: 2, cursorWidth: 0, url: audioUrl
                });
                wavesurfers[containerId] = ws;
                ws.on('finish', () => { 
                    document.getElementById('btn-' + containerId).innerHTML = '▶'; 
                    if(isAutoPlaying) {
                        isAutoPlaying = false;
                        setTimeout(() => { 
                            bicara("Pesan audio selesai. Sebutkan satu untuk membalas ketik, atau tiga untuk balas suara.", () => { 
                                mulaiMendengar(); 
                            }); 
                        }, 800);
                    }
                });
            }
            
            function togglePlay(containerId) {
                const ws = wavesurfers[containerId];
                const btn = document.getElementById('btn-' + containerId);
                if(ws) { ws.playPause(); btn.innerHTML = ws.isPlaying() ? '⏸' : '▶'; }
            }

            document.addEventListener("DOMContentLoaded", function () {
                let chatBox = document.getElementById("chatBox");
                function scrollBottom(){ if(chatBox) chatBox.scrollTop = chatBox.scrollHeight; }
                scrollBottom();

                document.querySelectorAll('[id^="wave-"]').forEach(el => {
                    initWaveSurfer(el.id, el.getAttribute('data-audio'), el.parentElement.classList.contains('border-white/30') || el.parentElement.classList.contains('bg-white/20'));
                });

                if(window.Echo && isActiveChat) {
                    window.Echo.private(`chat.mahasiswa.${mahasiswaId}`)
                        .listen('.message.sent', (e) => {
                            let mediaHtml = '';
                            if (e.message.image_path) mediaHtml += `<img src="/storage/${e.message.image_path}" class="mt-1.5 sm:mt-2 rounded-lg sm:rounded-xl max-w-full md:max-w-xs border border-slate-200">`;
                            
                            const uniqueWaveId = 'wave-incoming-' + Date.now();
                            if (e.message.voice_path) {
                                mediaHtml += `<div class="mt-1.5 sm:mt-2 flex items-center gap-2 sm:gap-3 bg-white/20 p-1.5 sm:p-2 rounded-lg sm:rounded-xl backdrop-blur-sm border border-slate-300 bg-white w-[160px] sm:w-[180px] md:w-[240px]"><button type="button" onclick="togglePlay('${uniqueWaveId}')" id="btn-${uniqueWaveId}" class="w-6 h-6 sm:w-7 sm:h-7 md:w-8 md:h-8 shrink-0 flex items-center justify-center rounded-full bg-blue-600 text-white shadow hover:scale-105 transition-transform text-[8px] sm:text-[10px] md:text-xs">▶</button><div id="${uniqueWaveId}" class="flex-1 h-3 sm:h-4 md:h-4" data-audio="/storage/${e.message.voice_path}"></div></div>`;
                            }
                            
                            let msgHtml = e.message.body ? `<p class="text-[11px] sm:text-xs md:text-[13px] leading-relaxed font-medium whitespace-pre-wrap break-words">${e.message.body}</p>` : '';
                            
                            let html = `<div class="flex flex-col items-start max-w-[90%] sm:max-w-[85%] md:max-w-[70%] safe-fade-in chat-bubble-new"><div class="bg-slate-50 text-slate-800 rounded-xl sm:rounded-2xl rounded-tl-none border border-slate-200 shadow-sm p-2.5 sm:p-3 md:p-4 w-fit max-w-full">${msgHtml}${mediaHtml}</div><span class="text-[7px] sm:text-[8px] md:text-[9px] font-bold text-slate-400 mt-1 sm:mt-1.5 ml-1">${e.message.time}</span></div>`;

                            let emptyNotice = document.getElementById('emptyChat');
                            if(emptyNotice) emptyNotice.remove();
                            chatBox.insertAdjacentHTML('beforeend', html);
                            scrollBottom();

                            if (e.message.voice_path) {
                                setTimeout(() => {
                                    initWaveSurfer(uniqueWaveId, `/storage/${e.message.voice_path}`, false);
                                    wavesurfers[uniqueWaveId].on('ready', function () {
                                        isAutoPlaying = true;
                                        bicara(`Ada pesan suara baru dari Dosen. Memutar pesan sekarang.`, () => {
                                            wavesurfers[uniqueWaveId].play();
                                            document.getElementById('btn-' + uniqueWaveId).innerHTML = '⏸';
                                        });
                                    });
                                }, 100);
                            } else if(e.message.body) {
                                let cleanBdy = e.message.body.replace(/[^A-Za-z0-9 \.,\?]/g, '');
                                bicara(`Pesan baru dari Dosen: ${cleanBdy}. Sebutkan satu untuk membalas.`, () => { mulaiMendengar(); });
                            }
                        });
                }

                let searchInput = document.getElementById("searchInput");
                let contactList = document.getElementById("contactList");
                let originalContactHTML = contactList ? contactList.innerHTML : '';
                let searchDebounceTimer = null;
                
                window.lakukanPencarian = function(keyword) {
                    if(!searchInput || !contactList) return;
                    if(keyword.length === 0) { contactList.innerHTML = originalContactHTML; return; }
                    
                    contactList.innerHTML = `<div class="p-6 text-center"><p class="text-[10px] sm:text-xs text-slate-400 font-bold animate-pulse">Mencari...</p></div>`;
                    
                    fetch(`{{ url('/messages/search') }}?q=${encodeURIComponent(keyword)}`)
                    .then(res => res.json())
                    .then(data => {
                        if(data.length === 0) { 
                            contactList.innerHTML = `<div class="p-6 text-center"><p class="text-[10px] sm:text-xs text-slate-400 font-bold">Tidak ditemukan.</p></div>`; 
                            bicara(`Tidak ditemukan dosen dengan nama ${keyword}. Sebutkan angka lima untuk kembali.`); return; 
                        }
                        
                        let html = ''; let searchVoiceId = 30; 
                        data.forEach(dsn => {
                            html += `
                            <a href="{{ url('/messages') }}/${dsn.id}" data-voice-id="${searchVoiceId}" class="block safe-fade-in relative mt-2 contact-item">
                                <div class="p-2.5 sm:p-3 hover:bg-slate-50 border border-transparent hover:border-slate-100 rounded-xl flex gap-2 sm:gap-3 cursor-pointer transition-all">
                                    <div class="absolute -left-1 -top-1 bg-black text-white text-[8px] sm:text-[10px] font-black px-1.5 py-0.5 rounded-md shadow-sm z-10">${searchVoiceId}</div>
                                    <div class="w-9 h-9 sm:w-10 sm:h-10 rounded-lg sm:rounded-xl bg-slate-200 shrink-0 overflow-hidden border border-slate-100 flex items-center justify-center ml-1">
                                        <img src="https://ui-avatars.com/api/?name=${encodeURIComponent(dsn.nama)}&background=0D8ABC&color=fff" class="w-full h-full object-cover" />
                                    </div>
                                    <div class="flex-1 flex flex-col justify-center overflow-hidden">
                                        <h4 class="font-bold text-slate-900 text-[10px] sm:text-xs truncate">${dsn.nama}</h4>
                                        <p class="text-[9px] sm:text-[10px] text-slate-500 truncate font-medium">Sebutkan ${searchVoiceId} untuk chat</p>
                                    </div>
                                </div>
                            </a>`;
                            searchVoiceId++;
                        });
                        contactList.innerHTML = html;
                        bicara(`Ditemukan ${data.length} dosen. Sebutkan angkanya di layar untuk membuka obrolan.`);
                    });
                };

                if(searchInput) {
                    searchInput.addEventListener("input", function() { 
                        clearTimeout(searchDebounceTimer);
                        searchDebounceTimer = setTimeout(() => {
                            window.lakukanPencarian(this.value.trim());
                        }, 400); 
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

                window.previewImage = function(input) {
                    if (input.files && input.files[0]) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            document.getElementById('imagePreviewElement').src = e.target.result;
                            document.getElementById('imagePreviewContainer').classList.remove('hidden');
                            document.getElementById('imagePreviewContainer').classList.add('inline-block');
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
                function updateTimer() {
                    recordSeconds++;
                    document.getElementById('recordTimer').innerText = `${String(Math.floor(recordSeconds / 60)).padStart(2, '0')}:${String(recordSeconds % 60).padStart(2, '0')}`;
                }

                window.batalRekamChat = function() {
                    if(mediaRecorder && mediaRecorder.state !== "inactive") mediaRecorder.stop();
                    if (mediaStream) { mediaStream.getTracks().forEach(track => track.stop()); }
                    clearInterval(recordInterval); audioChunks = []; voiceInput.value = '';
                    
                    recordingWrapper.classList.add('hidden'); recordingWrapper.classList.remove('flex');
                    normalInputWrapper.classList.remove('hidden'); 
                    if(uploadImageContainer) uploadImageContainer.classList.remove('hidden');
                    
                    recordBtn.classList.remove('text-white', 'bg-red-500', 'animate-pulse', 'border-red-600');
                    recordBtn.classList.add('text-slate-400', 'bg-white', 'sm:bg-transparent');
                    
                    messageInput.disabled = false;
                    messageInput.placeholder = "Sebut 1 untuk ketik...";
                    messageInput.classList.remove('font-bold', 'text-blue-600', 'bg-blue-100/50', 'rounded-xl', 'px-4');
                    messageInput.classList.add('bg-transparent', 'pl-1', 'sm:pl-8');
                    
                    cancelVoiceBtn.classList.add('hidden'); 
                    if(recordBtnContainer) recordBtnContainer.classList.remove('hidden');
                };

                if(recordBtn) {
                    recordBtn.addEventListener('click', async () => {
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
                                
                                recordSeconds = 0; document.getElementById('recordTimer').innerText = "00:00";
                                recordInterval = setInterval(updateTimer, 1000);
                                audioChunks = []; mediaRecorder.ondataavailable = event => { audioChunks.push(event.data); };
                            } catch(err) { alert("Mikrofon tidak diizinkan!"); }
                        } else {
                            mediaRecorder.onstop = () => {
                                if (mediaStream) {
                                    mediaStream.getTracks().forEach(track => track.stop());
                                }

                                const file = new File([new Blob(audioChunks, { type: 'audio/webm' })], "voice.webm", { type: "audio/webm" });
                                const dataTransfer = new DataTransfer(); dataTransfer.items.add(file); voiceInput.files = dataTransfer.files;
                                
                                recordingWrapper.classList.add('hidden'); recordingWrapper.classList.remove('flex');
                                normalInputWrapper.classList.remove('hidden');
                                
                                if(recordBtnContainer) recordBtnContainer.classList.add('hidden');
                                
                                messageInput.placeholder = "Suara siap dikirim...";
                                messageInput.disabled = true; 
                                messageInput.classList.add('font-bold', 'text-blue-600', 'bg-blue-100/50', 'rounded-xl', 'px-4');
                                messageInput.classList.remove('bg-transparent', 'pl-1', 'sm:pl-8');
                                
                                cancelVoiceBtn.classList.remove('hidden');
                            };
                            mediaRecorder.stop(); clearInterval(recordInterval);
                        }
                    });
                }

                // Submit Form Ajax
                let form = document.getElementById("chatForm");
                if(form) {
                    form.addEventListener("submit", async function(e){
                        e.preventDefault();
                        if (!messageInput.value.trim() && (!imageInput || !imageInput.files.length) && (!voiceInput || !voiceInput.files.length)) return;
                        
                        const btnSubmit = document.getElementById('sendChatBtn'); btnSubmit.disabled = true;
                        document.getElementById('sendIcon').classList.add('hidden'); document.getElementById('sendLoading').classList.remove('hidden');

                        try {
                            const actionUrl = this.getAttribute('action');
                            const response = await fetch(actionUrl, { method: "POST", body: new FormData(this), headers: { 'X-Requested-With': 'XMLHttpRequest', 'Accept': 'application/json' } });
                            const data = await response.json();
                            
                            if(data.success){
                                this.reset(); cancelImage();
                                if(voiceInput) voiceInput.value = '';
                                
                                messageInput.placeholder = "Sebutkan 1 untuk ketik..."; messageInput.disabled = false;
                                messageInput.classList.remove('font-bold', 'text-blue-600', 'bg-blue-100/50', 'rounded-xl', 'px-4');
                                messageInput.classList.add('bg-transparent', 'pl-1', 'sm:pl-8');
                                
                                cancelVoiceBtn.classList.add('hidden');
                                if(uploadImageContainer) uploadImageContainer.classList.remove('hidden');
                                if(recordBtnContainer) recordBtnContainer.classList.remove('hidden');
                                
                                recordBtn.classList.remove('text-white', 'bg-red-500', 'animate-pulse', 'border-red-600');
                                recordBtn.classList.add('text-slate-400', 'bg-white', 'sm:bg-transparent');
                                
                                let mediaHtml = '';
                                if (data.message.image_path) mediaHtml += `<img src="/storage/${data.message.image_path}" class="mt-1.5 sm:mt-2 rounded-lg sm:rounded-xl max-w-full md:max-w-xs border border-white/20">`;
                                const uniqueWaveId = 'wave-new-' + Date.now();
                                if (data.message.voice_path) {
                                    mediaHtml += `<div class="mt-1.5 sm:mt-2 flex items-center gap-2 sm:gap-3 bg-white/20 p-1.5 sm:p-2 rounded-lg sm:rounded-xl backdrop-blur-sm border border-white/30 w-[160px] sm:w-[180px] md:w-[240px]"><button type="button" onclick="togglePlay('${uniqueWaveId}')" id="btn-${uniqueWaveId}" class="w-6 h-6 sm:w-7 sm:h-7 md:w-8 md:h-8 shrink-0 flex items-center justify-center rounded-full bg-white text-blue-600 shadow hover:scale-105 transition-transform text-[8px] sm:text-[10px] md:text-xs">▶</button><div id="${uniqueWaveId}" class="flex-1 h-3 sm:h-4 md:h-4" data-audio="/storage/${data.message.voice_path}"></div></div>`;
                                }
                                let msgHtml = data.message.body ? `<p class="text-[11px] sm:text-xs md:text-[13px] leading-relaxed font-medium whitespace-pre-wrap break-words">${data.message.body}</p>` : '';
                                
                                let html = `<div class="flex flex-col items-end ml-auto max-w-[90%] sm:max-w-[85%] md:max-w-[70%] safe-fade-in chat-bubble-new"><div class="bg-blue-600 text-white rounded-xl sm:rounded-2xl rounded-tr-none border border-blue-700 shadow-sm p-2.5 sm:p-3 md:p-4 w-fit max-w-full">${msgHtml}${mediaHtml}</div><span class="text-[7px] sm:text-[8px] md:text-[9px] font-bold text-slate-400 mt-1 sm:mt-1.5 mr-1">${data.message.time}</span></div>`;

                                let emptyNotice = document.getElementById('emptyChat'); if(emptyNotice) emptyNotice.remove();
                                chatBox.insertAdjacentHTML('beforeend', html); scrollBottom();
                                if(data.message.voice_path) setTimeout(() => initWaveSurfer(uniqueWaveId, `/storage/${data.message.voice_path}`, true), 100);
                                
                                // Feedback setelah terkirim
                                bicara("Pesan berhasil terkirim. Sebutkan satu untuk balas mengetik, tiga untuk merekam suara, atau lima untuk kembali ke Beranda.", () => { mulaiMendengar(); });
                            } else { alert("Gagal mengirim pesan."); }
                        } catch (err) { alert("Koneksi bermasalah."); } finally {
                            btnSubmit.disabled = false; document.getElementById('sendLoading').classList.add('hidden'); document.getElementById('sendIcon').classList.remove('hidden');
                        }
                    });
                }
            });

            // ==========================================
            // VOICE ASSISTANT SYSTEM (STABIL & BEBAS LAG)
            // ==========================================
            const statusDesc = document.getElementById("status-desc");
            const waveBars = document.querySelectorAll(".wave-bar");
            const synth = window.speechSynthesis;
            const SpeechRec = window.webkitSpeechRecognition || window.SpeechRecognition;
            let rec = null;
            
            let modeKetikSuara = false; 
            let menungguKonfirmasiKirim = false;
            let menungguKonfirmasiVoice = false;
            let jedaKetikTimer = null;
            let isRecActive = false;
            let isRedirecting = false;
            let isSpeaking = false;

            if (SpeechRec) { 
                rec = new SpeechRec(); 
                rec.lang = "id-ID"; 
                rec.continuous = true; 
                rec.interimResults = true; 
            }

            let waveInterval;
            function setWave(active) {
                if (active) {
                    if (waveInterval) clearInterval(waveInterval);
                    waveInterval = setInterval(() => {
                        waveBars.forEach((bar) => {
                            const h = Math.floor(Math.random() * 20) + 4;
                            bar.style.height = `${h}px`;
                        });
                    }, 100);
                } else {
                    if(waveInterval) clearInterval(waveInterval);
                    waveBars.forEach((bar) => (bar.style.height = "4px"));
                }
            }

            // PENDETEKSI DOUBLE-CLICK TANPA MENGGANGGU KLIK BIASA (BEBAS LAG)
            let lastClickTime = 0;
            document.body.addEventListener('click', (e) => {
                const currentTime = new Date().getTime();
                const tapLength = currentTime - lastClickTime;
                lastClickTime = currentTime;

                // Jika jarak antar klik kurang dari 400ms (Double Click Detected)
                if (tapLength > 0 && tapLength < 400) {
                    if (isSpeaking && !isRedirecting) {
                        synth.cancel(); 
                        isSpeaking = false;
                        setWave(false);
                        if (statusDesc) {
                            statusDesc.innerText = "MENDENGARKAN";
                            statusDesc.classList.replace("text-blue-600", "text-green-600");
                        }
                        if (rec) { try { rec.abort(); } catch(err){} isRecActive = false; }
                        setTimeout(() => { mulaiMendengar(); }, 50);
                    }
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
                        if(statusDesc) {
                            statusDesc.innerText = "MENDENGARKAN";
                            statusDesc.classList.replace("text-slate-400", "text-green-600");
                            statusDesc.classList.replace("text-blue-600", "text-green-600");
                        }
                        mulaiMendengar();
                    };

                    synth.speak(utter);
                }, 50);
            }

            function getPanduanUtama(isUlang = false) {
                let sapaan = "";
                let navigasiTeks = "Sebutkan satu ketik pesan, dua kirim gambar, tiga rekam suara. Lima kembali ke beranda.";
                
                if (!isActiveChat) {
                    sapaan = "Halaman Pesan. ";
                    if (listDosenVA.length > 0) {
                        sapaan += "Sebutkan cari diikuti nama dosen, atau sebut angkanya di layar. ";
                    } else {
                        sapaan += "Sebutkan cari diikuti nama dosen. ";
                    }
                    sapaan += "Sebutkan lima untuk kembali.";
                } else {
                    sapaan = `Obrolan dengan Dosen ${currentDosenName}. `;
                    
                    if (!isUlang && lastMessageSender !== '') {
                        if (isLastMsgVoice) {
                            sapaan += `Pesan terakhir dari ${lastMessageSender} berupa pesan suara. Memutar sekarang. `;
                            return sapaan; 
                        } else if (isLastMsgImage && lastMessageText === 'Mengirim gambar') {
                            sapaan += `Pesan gambar terakhir dari ${lastMessageSender}. ${navigasiTeks}`;
                        } else {
                            let cleanText = lastMessageText.replace(/[^A-Za-z0-9 \.,\?]/g, '');
                            sapaan += `Pesan terakhir dari ${lastMessageSender} berbunyi: ${cleanText}. ${navigasiTeks}`;
                        }
                    } else {
                        sapaan += navigasiTeks;
                    }
                }
                return sapaan;
            }

            window.batalKetikSuara = function() {
                modeKetikSuara = false;
                menungguKonfirmasiKirim = false;
                clearTimeout(jedaKetikTimer);
                document.getElementById('normalInputWrapper').classList.remove('dictating-active', 'confirming-active');
                document.getElementById('cancelVoiceToTextBtn').classList.add('hidden');
                document.getElementById("messageInput").value = "";
                document.getElementById("messageInput").placeholder = "Sebut 1 untuk ketik...";
            }

            function triggerKonfirmasiKetik() {
                modeKetikSuara = false;
                menungguKonfirmasiKirim = true;
                if(rec) rec.abort();
                document.getElementById('normalInputWrapper').classList.remove('dictating-active');
                document.getElementById('normalInputWrapper').classList.add('confirming-active');
                
                let teksBaca = document.getElementById("messageInput").value;
                if(teksBaca.trim() === "") {
                    menungguKonfirmasiKirim = false;
                    window.batalKetikSuara();
                    bicara("Tidak terdengar pesan. Sebutkan satu untuk mengulang, atau lima untuk kembali.", () => { mulaiMendengar(); });
                    return;
                }

                if(teksBaca.length > 50) teksBaca = teksBaca.substring(0, 50) + "...";
                
                bicara(`Pesan Anda berbunyi: ${teksBaca}. Mau dikirim? Sebutkan kirim, atau batal.`, () => { mulaiMendengar(); });
            }

            window.navigasiKe = function(nomor) {
                if (isRedirecting) return;
                
                let tujuan = ""; let teks = ""; let isAction = false;

                if (nomor === 5) { tujuan = "{{ url('/dashboard') }}"; teks = "Membuka Beranda."; }
                else if (nomor === 6) { tujuan = "{{ url('/mahasiswa/profile') }}"; teks = "Membuka Profil."; }
                else if (nomor === 7) { tujuan = "{{ url('/pemberitahuan') }}"; teks = "Membuka Pemberitahuan."; }
                else if (nomor === 8) { 
                    if(isActiveChat) { tujuan = "{{ url('/pesan') }}"; teks = "Menutup obrolan."; }
                }
                else if (nomor === 9) { tujuan = "{{ url('/bantuan') }}"; teks = "Membuka Bantuan."; }
                else if (nomor === 0) { tujuan = "{{ url('/logout') }}"; teks = "Keluar aplikasi."; }
                
                else if (nomor === 1) {
                    if (!isActiveChat) return;
                    isAction = true;
                    modeKetikSuara = true;
                    menungguKonfirmasiKirim = false;
                    document.getElementById('normalInputWrapper').classList.add('dictating-active');
                    document.getElementById('normalInputWrapper').classList.remove('confirming-active');
                    document.getElementById('cancelVoiceToTextBtn').classList.remove('hidden');
                    document.getElementById("messageInput").value = "";
                    document.getElementById("messageInput").placeholder = "Mendengarkan teks...";
                    teks = "Mode ketik aktif. Silakan bicara pesan Anda. Jika sudah, ucapkan selesai, atau diam sejenak.";
                } else if (nomor === 2) {
                    if (!isActiveChat) return;
                    isAction = true;
                    teks = "Pilih gambar, lalu sebutkan kata kirim.";
                    bicara(teks, () => { 
                        document.getElementById('imageInput').click(); 
                        menungguKonfirmasiVoice = true;
                    });
                    return;
                } else if (nomor === 3) {
                    if (!isActiveChat) return;
                    isAction = true;
                    const recordBtn = document.getElementById('recordBtn');
                    if (!recordBtn.classList.contains('text-white')) {
                        teks = "Merekam suara. Silakan bicara setelah bip. Untuk berhenti, sebutkan kata selesai.";
                        bicara(teks, () => { recordBtn.click(); });
                        return;
                    }
                }
                else if (nomor >= 15) {
                    let targetLink = document.querySelector(`a[data-voice-id="${nomor}"]`);
                    if (targetLink) { teks = "Membuka obrolan."; tujuan = targetLink.getAttribute("href"); }
                }

                if (teks !== "") {
                    if (!isAction && tujuan !== "") {
                        isRedirecting = true;
                        synth.cancel();
                        if(rec) rec.abort();
                        if(statusDesc) {
                            statusDesc.innerText = "MENGALIHKAN...";
                            statusDesc.classList.replace("text-green-600", "text-slate-800");
                            statusDesc.classList.replace("text-blue-600", "text-slate-800");
                        }
                    }

                    bicara(teks, () => { 
                        if (!isAction && tujuan !== "") window.location.href = tujuan; 
                        else { try { rec.start(); } catch(e){} } 
                    });

                    if (!isAction && tujuan !== "") setTimeout(() => { window.location.href = tujuan; }, 3000);
                }
            }

            if (rec) {
                rec.onresult = (event) => {
                    if (isRedirecting) return;

                    let hasil = "";
                    let isFinal = false;
                    for (let i = event.resultIndex; i < event.results.length; ++i) {
                        hasil += event.results[i][0].transcript;
                        if (event.results[i].isFinal) {
                            isFinal = true;
                        }
                    }
                    
                    hasil = hasil.toLowerCase().replace(/[.,?!]/g, '').trim();

                    if (!hasil) return;

                    // FILTER ECHO: Hanya proses jika final atau jika ada kata batal/selesai
                    if (modeKetikSuara && !isFinal && !hasil.includes("batal") && !hasil.includes("selesai")) {
                        return;
                    }

                    if (isSpeaking) return;

                    prosesJawaban(hasil);
                };

                rec.onend = () => { 
                    isRecActive = false;
                    if (!isRedirecting) mulaiMendengar(); 
                };
            }

            function prosesJawaban(hasil) {
                // LOGIKA 1: KONFIRMASI KIRIM PESAN TEKS
                if (menungguKonfirmasiKirim) {
                    if (hasil.includes("kirim") || hasil.includes("ya") || hasil.includes("iya")) { 
                        menungguKonfirmasiKirim = false; 
                        synth.cancel();
                        document.getElementById('normalInputWrapper').classList.remove('confirming-active');
                        document.getElementById('cancelVoiceToTextBtn').classList.add('hidden');
                        document.getElementById("sendChatBtn").click(); 
                        return; 
                    }
                    if (hasil.includes("batal") || hasil.includes("tidak")) { 
                        window.batalKetikSuara(); 
                        bicara("Pesan dibatalkan. Sebutkan satu untuk mencoba lagi, atau lima untuk kembali.", () => { mulaiMendengar(); });
                        return; 
                    }
                    return; 
                }

                // LOGIKA 2: SEDANG MEREKAM SUARA
                const recordBtn = document.getElementById('recordBtn');
                if (recordBtn && recordBtn.classList.contains('text-white')) {
                    if (hasil.includes("selesai")) {
                        recordBtn.click();
                        menungguKonfirmasiVoice = true;
                        bicara("Suara berhasil disimpan. Sebutkan kirim, atau batal.", () => { mulaiMendengar(); });
                    }
                    return; 
                }

                // LOGIKA 3: KONFIRMASI VOICE NOTE / GAMBAR
                if (menungguKonfirmasiVoice) {
                    if (hasil.includes("kirim") || hasil.includes("ya") || hasil.includes("iya")) {
                        menungguKonfirmasiVoice = false;
                        synth.cancel();
                        document.getElementById("sendChatBtn").click();
                        return;
                    }
                    if (hasil.includes("batal") || hasil.includes("tidak")) {
                        menungguKonfirmasiVoice = false;
                        window.batalRekamChat(); 
                        window.cancelImage();
                        bicara("Dibatalkan. Sebutkan angka satu, dua, atau tiga.", () => { mulaiMendengar(); });
                        return;
                    }
                    return; 
                }

                // LOGIKA 4: SEDANG DIKTE MENDENGARKAN TEKS (Voice-to-Text)
                if (modeKetikSuara) {
                    if (hasil.includes("batal")) { 
                        window.batalKetikSuara(); 
                        bicara("Dibatalkan. Sebutkan satu untuk mengetik ulang.", () => { mulaiMendengar(); }); 
                        return; 
                    }

                    let textToAppend = hasil;
                    let isDone = false;

                    if (hasil.includes("selesai")) {
                        textToAppend = hasil.replace("selesai", "").trim();
                        isDone = true;
                    }
                    
                    if (textToAppend !== "") {
                        let inputEl = document.getElementById("messageInput");
                        inputEl.value += (inputEl.value === "" ? "" : " ") + textToAppend;
                    }
                    
                    clearTimeout(jedaKetikTimer);

                    if (isDone) {
                        triggerKonfirmasiKetik();
                    } else {
                        // Jika dalam 2.5 detik diam, otomatis review pesan
                        jedaKetikTimer = setTimeout(() => {
                            triggerKonfirmasiKetik();
                        }, 2500); 
                    }
                    return; 
                }

                // LOGIKA 5: FITUR PENCARIAN DOSEN 
                if (hasil.startsWith("cari ")) {
                    let namaDosen = hasil.replace("cari ", "").trim();
                    document.getElementById("searchInput").value = namaDosen; 
                    window.lakukanPencarian(namaDosen); 
                    return;
                }

                // LOGIKA 6: NAVIGASI DASAR (MURNI ANGKA)
                if (/\b(ulang|ulangi|panduan|baca ulang)\b/.test(hasil)) { synth.cancel(); if(rec) rec.abort(); bicara(getPanduanUtama(true), () => { mulaiMendengar(); }); return; }
                else if (/\b(satu|1|sato|sapu|saku|atu|aku|tu|kesatu)\b/.test(hasil)) { window.navigasiKe(1); }
                else if (/\b(dua|2|duwa|doa|tua|jua|kedua)\b/.test(hasil)) { window.navigasiKe(2); }
                else if (/\b(tiga|3|ti ga|ketiga)\b/.test(hasil)) { window.navigasiKe(3); }
                else if (/\b(lima|5|kelima)\b/.test(hasil)) { window.navigasiKe(5); }
                else if (/\b(enam|6|nam|keenam)\b/.test(hasil)) { window.navigasiKe(6); }
                else if (/\b(tujuh|7|tuju|ketujuh)\b/.test(hasil)) { window.navigasiKe(7); }
                else if (/\b(delapan|8|kedelapan)\b/.test(hasil)) { window.navigasiKe(8); }
                else if (/\b(sembilan|9|kesembilan)\b/.test(hasil)) { window.navigasiKe(9); }
                else if (/\b(nol|0|kosong)\b/.test(hasil)) { window.navigasiKe(0); }
                else {
                    const angka = hasil.match(/\d+/);
                    if (angka && parseInt(angka[0]) >= 15) {
                        synth.cancel(); if(rec) rec.abort(); window.navigasiKe(parseInt(angka[0])); return;
                    }
                }
            }

            window.addEventListener("load", () => {
                document.body.addEventListener("click", () => {}, { once: true });
                setTimeout(() => {
                    let teksAwal = getPanduanUtama(false);
                    bicara(teksAwal, () => {
                        if (isActiveChat && isLastMsgVoice) {
                            isAutoPlaying = true; 
                            const waveId = "{{ $lastWaveId }}";
                            if (wavesurfers[waveId]) {
                                let playPromise = wavesurfers[waveId].play();
                                if (playPromise !== undefined) {
                                    playPromise.then(_ => {
                                        document.getElementById('btn-' + waveId).innerHTML = '⏸';
                                    }).catch(error => {
                                        isAutoPlaying = false;
                                        bicara("Tap layar untuk memutar suara.", () => { mulaiMendengar(); });
                                    });
                                }
                            } else { mulaiMendengar(); }
                        } else { mulaiMendengar(); }
                    });
                }, 800);
            });
        </script>
        <script defer src="https://accessibility-widget.pages.dev/js/app.js"></script>
    </body>
</html>