<!DOCTYPE html>
<html lang="id" class="h-full">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Login Dosen | LMS Inklusi UMMI</title>

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet" />

    <style>
        @keyframes popUp {
            from { opacity: 0; transform: scale(0.9) translateY(30px); }
            to { opacity: 1; transform: scale(1) translateY(0); }
        }
        .animate-pop { animation: popUp 0.4s cubic-bezier(0.17, 0.89, 0.32, 1.28) forwards; }
        .modal-active { display: flex !important; }
    </style>
</head>

<body class="m-0 p-4 font-['Plus_Jakarta_Sans'] bg-slate-50 min-h-full flex items-center justify-center overflow-x-hidden">

    @if(view()->exists('components.page_transition'))
        @include('components.page_transition')
    @endif

    <div class="w-full max-w-6xl bg-white rounded-[2rem] md:rounded-[3.5rem] shadow-2xl overflow-hidden border border-slate-100 grid grid-cols-1 lg:grid-cols-2 h-auto lg:h-[85vh] lg:max-h-[700px]">
        
        <div data-aos="fade-right" data-aos-duration="1000"
            class="hidden lg:block bg-cover bg-center shadow-inner"
            style="background-image: url('{{ asset('images/login.png') }}');"
        ></div>

        <div class="p-6 md:p-10 lg:p-6 flex flex-col justify-center bg-white items-center relative">
            <div class="w-full max-w-md lg:max-w-[400px] mx-auto">

                <div class="mb-8">
                    <h2 data-aos="fade-up" data-aos-delay="100"
                        class="text-2xl sm:text-3xl font-black text-slate-900 tracking-tighter uppercase leading-none">
                        Masuk Dosen
                    </h2>
                    <p data-aos="fade-up" data-aos-delay="200"
                        class="text-slate-400 text-[10px] font-bold mt-2 uppercase tracking-widest leading-loose">
                        Pusat Pembelajaran Disabilitas
                    </p>
                    
                    @if(session('error'))
                        <div class="mt-4 p-3 bg-red-50 border border-red-200 text-red-600 rounded-xl text-xs font-bold text-center">
                            {{ session('error') }}
                        </div>
                    @endif
                </div>

                <form id="loginForm" class="space-y-4">
                    @csrf
                    <div data-aos="fade-up" data-aos-delay="300"
                        class="p-4 rounded-2xl bg-slate-50 border-2 border-slate-100 focus-within:border-blue-600 transition-colors duration-300">
                        <label class="block text-[8px] font-black text-slate-400 uppercase tracking-widest mb-1">
                            NIDN / Email Dosen
                        </label>
                        <input type="text" name="login_id" required
                            class="w-full bg-transparent text-sm font-semibold text-slate-700 outline-none placeholder:text-slate-300"
                            placeholder="Masukkan NIDN atau Email" />
                    </div>

                    <div data-aos="fade-up" data-aos-delay="400"
                        class="p-4 rounded-2xl bg-slate-50 border-2 border-slate-100 focus-within:border-blue-600 transition-colors duration-300 relative">
                        <label class="block text-[8px] font-black text-slate-400 uppercase tracking-widest mb-1">
                            Kata Sandi
                        </label>
                        <div class="flex items-center">
                            <input type="password" id="passwordInput" name="password" required
                                class="w-full bg-transparent text-sm font-semibold text-slate-700 outline-none placeholder:text-slate-300"
                                placeholder="Masukkan kata sandi" />
                            <button type="button" onclick="togglePassword()" class="text-slate-400 hover:text-blue-600 transition-colors focus:outline-none">
                                <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.644C3.67 8.5 7.652 6 12 6c4.348 0 8.332 2.5 9.964 5.678a1.012 1.012 0 0 1 0 .644C20.33 15.5 16.348 18 12 18c-4.348 0-8.332-2.5-9.964-5.678Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div class="pt-4 space-y-3">
                        <button type="submit" data-aos="fade-up" data-aos-delay="500"
                            class="w-full py-4 bg-blue-800 text-white rounded-xl font-black text-[10px] tracking-widest uppercase shadow-lg shadow-blue-100 hover:bg-blue-900 hover:-translate-y-0.5 transition-all cursor-pointer">
                            Login Sekarang
                        </button>

                        <button type="button" onclick="toggleModal('registerModal')" data-aos="fade-up" data-aos-delay="600"
                            class="w-full py-4 bg-white border border-slate-200 rounded-xl flex items-center justify-center gap-3 hover:bg-slate-50 transition-all cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 text-blue-600">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
                            </svg>
                            <span class="text-[9px] font-black text-slate-600 tracking-widest uppercase">Buat Akun Dosen</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="registerModal" class="fixed inset-0 z-[999] hidden items-center justify-center p-4 bg-slate-900/40 backdrop-blur-md transition-all duration-500">
        <div class="w-full max-w-md bg-white rounded-[3rem] shadow-[0_20px_50px_rgba(0,0,0,0.1)] p-10 relative animate-pop overflow-hidden">
            
            <div class="absolute -top-24 -right-24 w-48 h-48 bg-blue-50 rounded-full blur-3xl"></div>
            <div class="absolute -bottom-24 -left-24 w-48 h-48 bg-indigo-50 rounded-full blur-3xl"></div>

            <button onclick="toggleModal('registerModal')" class="absolute top-8 right-8 text-slate-300 hover:text-red-500 hover:rotate-90 transition-all duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </button>

            <div class="mb-10 relative text-center">
                <div class="w-16 h-16 bg-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg shadow-blue-200">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-8 h-8 text-white">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
                    </svg>
                </div>
                <h3 class="text-2xl font-black text-slate-900 uppercase tracking-tighter">Bergabung Dosen</h3>
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-[0.2em] mt-2">Lengkapi Informasi Akun</p>
            </div>

            <form id="registerForm" class="space-y-5 relative">
                @csrf
                <div class="group">
                    <label class="block text-[9px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">Nama Lengkap & Gelar</label>
                    <input type="text" name="nama" required class="w-full bg-slate-50 border-2 border-slate-50 rounded-2xl px-5 py-4 text-sm font-bold text-slate-700 outline-none focus:border-blue-600 focus:bg-white transition-all" placeholder="Nama Lengkap">
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="group">
                        <label class="block text-[9px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">NIDN</label>
                        <input type="text" name="nidn" required class="w-full bg-slate-50 border-2 border-slate-50 rounded-2xl px-5 py-4 text-sm font-bold text-slate-700 outline-none focus:border-blue-600 focus:bg-white transition-all" placeholder="10 Digit">
                    </div>
                    <div class="group">
                        <label class="block text-[9px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">Email Kampus</label>
                        <input type="email" name="email" required class="w-full bg-slate-50 border-2 border-slate-50 rounded-2xl px-5 py-4 text-sm font-bold text-slate-700 outline-none focus:border-blue-600 focus:bg-white transition-all" placeholder="@ummi.ac.id">
                    </div>
                </div>

                <div class="group">
                    <label class="block text-[9px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">Kata Sandi</label>
                    <input type="password" name="password" required class="w-full bg-slate-50 border-2 border-slate-50 rounded-2xl px-5 py-4 text-sm font-bold text-slate-700 outline-none focus:border-blue-600 focus:bg-white transition-all" placeholder="Min. 8 Karakter">
                </div>

                <button type="submit" id="regBtn" class="w-full py-5 bg-blue-600 text-white rounded-[1.5rem] font-black text-xs tracking-[0.2em] uppercase shadow-xl hover:bg-blue-700 active:scale-95 transition-all mt-4">
                    Daftar Akun Sekarang
                </button>
            </form>
        </div>
    </div>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({ once: true, easing: 'ease-out-cubic' });

        function toggleModal(id) {
            const modal = document.getElementById(id);
            if (modal.classList.contains('hidden')) {
                modal.classList.remove('hidden');
                modal.classList.add('flex');
                document.body.style.overflow = 'hidden';
            } else {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
                document.body.style.overflow = 'auto';
            }
        }

        function togglePassword() {
            const passwordInput = document.getElementById('passwordInput');
            const eyeIcon = document.getElementById('eyeIcon');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />`;
            } else {
                passwordInput.type = 'password';
                eyeIcon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.644C3.67 8.5 7.652 6 12 6c4.348 0 8.332 2.5 9.964 5.678a1.012 1.012 0 0 1 0 .644C20.33 15.5 16.348 18 12 18c-4.348 0-8.332-2.5-9.964-5.678Z" /><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />`;
            }
        }

        // AJAX LOGIN
        document.getElementById("loginForm").addEventListener("submit", async function (e) {
            e.preventDefault();
            const submitBtn = this.querySelector('button[type="submit"]');
            submitBtn.innerText = "MEMPROSES...";
            submitBtn.disabled = true;

            try {
                const res = await fetch("{{ route('login.dosen.post') }}", {
                    method: "POST",
                    headers: { "Content-Type": "application/json", "X-CSRF-TOKEN": "{{ csrf_token() }}" },
                    body: JSON.stringify({ login_id: this.login_id.value, password: this.password.value })
                });
                const json = await res.json();
                if (res.ok && json.success) { window.location.href = json.redirect; } 
                else { alert(json.message || "Login gagal"); }
            } catch (error) { alert("Terjadi kesalahan sistem"); }
            finally { submitBtn.innerText = "LOGIN SEKARANG"; submitBtn.disabled = false; }
        });

        // AJAX REGISTER
        document.getElementById("registerForm").addEventListener("submit", async function (e) {
            e.preventDefault();
            const btn = document.getElementById('regBtn');
            btn.innerText = "MENDAFTAR...";
            btn.disabled = true;

            try {
                const res = await fetch("{{ route('register.dosen.post') }}", {
                    method: "POST",
                    headers: { "X-CSRF-TOKEN": "{{ csrf_token() }}", "Accept": "application/json" },
                    body: new FormData(this)
                });
                const json = await res.json();
                if (res.ok && json.success) {
                    alert("Registrasi Berhasil! Silakan login.");
                    this.reset();
                    toggleModal('registerModal');
                } else { alert(json.message || "Gagal mendaftar"); }
            } catch (error) { alert("Terjadi kesalahan sistem"); }
            finally { btn.innerText = "DAFTAR AKUN SEKARANG"; btn.disabled = false; }
        });
    </script>
    <x-accessibility-widget />
</body>
</html>