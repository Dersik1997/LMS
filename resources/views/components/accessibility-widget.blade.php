<style>
    /* VARIABEL WARNA & FONT */
    :root {
        --a11y-blue: #0052cc;
        --a11y-bg: #f4f5f7;
        --a11y-card: #ffffff;
        --a11y-text: #172b4d;
    }

    /* TOMBOL TRIGGER (Melayang di layar) */
    #a11y-trigger {
        position: fixed; bottom: 30px; right: 30px; z-index: 2147483647;
        width: 60px; height: 60px; border-radius: 50%; background: var(--a11y-blue);
        border: 3px solid #fff; box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        cursor: pointer; display: flex; align-items: center; justify-content: center;
        transition: transform 0.2s; padding: 0;
    }
    #a11y-trigger:hover { transform: scale(1.05); }
    #a11y-trigger svg { width: 32px; height: 32px; fill: white; }

    /* PANEL UTAMA (Sisi Kanan Layar) */
    #a11y-panel {
        position: fixed; top: 0; right: -420px; width: 400px; height: 100vh;
        background: var(--a11y-bg); z-index: 2147483647;
        box-shadow: -5px 0 25px rgba(0,0,0,0.15); transition: right 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        display: flex; flex-direction: column; font-family: 'Plus Jakarta Sans', sans-serif;
    }
    #a11y-panel.buka { right: 0; }

    /* HEADER BIRU */
    .a11y-header {
        background: var(--a11y-blue); color: white; padding: 15px 20px;
        display: flex; justify-content: space-between; align-items: center;
    }
    .a11y-header h2 { margin: 0; font-size: 16px; font-weight: 700; letter-spacing: 0.5px; }
    .a11y-close {
        background: rgba(0,0,0,0.2); border: none; color: white; width: 32px; height: 32px;
        border-radius: 50%; font-size: 20px; cursor: pointer; display: flex;
        align-items: center; justify-content: center; transition: 0.2s;
    }
    .a11y-close:hover { background: rgba(0,0,0,0.4); }

    /* PROFIL SECTION */
    .a11y-profile {
        background: #e9ecef; padding: 15px 20px; border-bottom: 1px solid #dfe1e6;
        display: flex; align-items: center; gap: 10px; font-weight: 700; font-size: 14px; color: var(--a11y-text);
    }
    .a11y-profile-icon { background: black; color: white; width: 28px; height: 28px; border-radius: 50%; display: flex; align-items: center; justify-content: center; }

    /* KONTEN (SCROLLABLE) */
    .a11y-content { padding: 20px; overflow-y: auto; flex-grow: 1; display: flex; flex-direction: column; gap: 20px; }

    /* GRID TOMBOL */
    .a11y-grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; }
    .a11y-grid-3 { display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 12px; }

    /* KARTU MENU (Mirip Gambar) */
    .a11y-card {
        background: var(--a11y-card); border: 2px solid transparent; border-radius: 12px;
        padding: 15px 10px; display: flex; flex-direction: column; align-items: center;
        gap: 12px; cursor: pointer; box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        transition: all 0.2s; text-align: center; position: relative;
    }
    .a11y-card:hover { transform: translateY(-2px); box-shadow: 0 4px 10px rgba(0,0,0,0.1); }
    .a11y-card.aktif { border-color: var(--a11y-blue); outline: 2px solid var(--a11y-blue); outline-offset: -2px; }
    .a11y-card-icon { height: 35px; display: flex; align-items: center; justify-content: center; font-size: 28px; font-weight: 800; color: #111;}
    .a11y-card-title { font-size: 12px; font-weight: 700; color: var(--a11y-text); line-height: 1.2; }
    
    /* INDIKATOR BAR (Slider bawah) */
    .a11y-bars { display: flex; gap: 3px; width: 60%; height: 4px; margin-top: 5px; }
    .a11y-bar { flex: 1; background: #dfe1e6; border-radius: 2px; }
    .a11y-card.step-1 .a11y-bar:nth-child(1) { background: #505f79; }
    .a11y-card.step-2 .a11y-bar:nth-child(1), .a11y-card.step-2 .a11y-bar:nth-child(2) { background: #505f79; }
    .a11y-card.step-3 .a11y-bar { background: #505f79; }

    /* TOMBOL RESET BESAR */
    .a11y-footer { padding: 20px; background: var(--a11y-bg); border-top: 1px solid #dfe1e6; }
    .a11y-reset-btn {
        width: 100%; background: var(--a11y-blue); color: white; border: none;
        border-radius: 30px; padding: 15px; font-size: 14px; font-weight: 700;
        cursor: pointer; display: flex; justify-content: center; align-items: center; gap: 10px;
        transition: background 0.2s;
    }
    .a11y-reset-btn:hover { background: #0043a6; }

    /* KELAS EFEK CSS (Diaplikasikan ke Body) */
    body.efek-teks-besar * { font-size: 110% !important; line-height: 1.6 !important; }
    body.efek-teks-besar-2 * { font-size: 120% !important; line-height: 1.7 !important; }
    body.efek-teks-kecil * { font-size: 90% !important; }
    body.efek-kontras-tinggi { background-color: #000 !important; color: #fff !important; }
    body.efek-kontras-tinggi * { background-color: #000 !important; color: #fff !important; border-color: #fff !important; }
    body.efek-disleksia * { font-family: "Comic Sans MS", "OpenDyslexic", sans-serif !important; }
    body.efek-monokrom { filter: grayscale(100%) !important; }
    body.efek-spasi-besar * { letter-spacing: 0.1em !important; word-spacing: 0.2em !important; }
    body.efek-garis-bawah a { text-decoration: underline !important; font-weight: bold !important; background: yellow !important; color: black !important; }
    body.efek-kursor-besar, body.efek-kursor-besar * { cursor: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><path fill="%23000" stroke="%23fff" stroke-width="2" d="M5.5 3.21V20.8c0 .45.54.67.85.35l4.86-4.86a.5.5 0 0 1 .35-.15h6.87c.45 0 .67-.54.35-.85L5.5 3.21z"/></svg>'), auto !important; }
    body.efek-sembunyi-gambar img { opacity: 0 !important; }
    body.efek-rata-kiri * { text-align: left !important; }
</style>

<button id="a11y-trigger" aria-label="Buka Menu Aksesibilitas">
    <svg viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z"/></svg>
</button>

<div id="a11y-panel">
    <div class="a11y-header">
        <h2>Menu Aksesibilitas (CTRL+U)</h2>
        <button class="a11y-close" id="a11y-close-btn">&times;</button>
    </div>

    <div class="a11y-profile">
        <div class="a11y-profile-icon">
            <svg style="width:16px;fill:white;" viewBox="0 0 24 24"><path d="M12 4a4 4 0 1 1 0 8 4 4 0 0 1 0-8zm0 10c4.42 0 8 1.79 8 4v2H4v-2c0-2.21 3.58-4 8-4z"/></svg>
        </div>
        Bebas Pilih Profil ▼
    </div>

    <div class="a11y-content">
        <div class="a11y-grid-2">
            <div class="a11y-card" data-action="efek-disleksia">
                <div class="a11y-card-icon">Df</div>
                <div class="a11y-card-title">Disleksia</div>
            </div>
            <div class="a11y-card" data-action="efek-kontras-tinggi">
                <div class="a11y-card-icon">◐</div>
                <div class="a11y-card-title">Gangguan<br>Penglihatan</div>
            </div>
        </div>

        <hr style="border-color:#dfe1e6; margin:0;">

        <div class="a11y-grid-3">
            <div class="a11y-card" data-action="efek-teks-besar" data-steps="2">
                <div class="a11y-card-icon">T<span style="font-size:36px;">T</span></div>
                <div class="a11y-card-title">Perbesar Teks</div>
                <div class="a11y-bars"><div class="a11y-bar"></div><div class="a11y-bar"></div></div>
            </div>
            <div class="a11y-card" data-action="efek-teks-kecil">
                <div class="a11y-card-icon" style="font-size:20px;">T<span>T</span></div>
                <div class="a11y-card-title">Perkecil Teks</div>
            </div>
            <div class="a11y-card" data-action="efek-monokrom">
                <div class="a11y-card-icon">💧</div>
                <div class="a11y-card-title">Desaturasi</div>
            </div>
            <div class="a11y-card" data-action="efek-rata-kiri">
                <div class="a11y-card-icon">⇶</div>
                <div class="a11y-card-title">Rata Kiri</div>
            </div>
            <div class="a11y-card" data-action="efek-sembunyi-gambar">
                <div class="a11y-card-icon">🚫</div>
                <div class="a11y-card-title">Sembunyikan Gambar</div>
            </div>
            <div class="a11y-card" data-action="efek-kursor-besar">
                <div class="a11y-card-icon">➚</div>
                <div class="a11y-card-title">Kursor Besar</div>
            </div>
            <div class="a11y-card" data-action="efek-spasi-besar">
                <div class="a11y-card-icon">↔</div>
                <div class="a11y-card-title">Spasi Teks</div>
            </div>
            <div class="a11y-card" data-action="efek-garis-bawah">
                <div class="a11y-card-icon"><u>U</u></div>
                <div class="a11y-card-title">Garis Bawahi Tautan</div>
            </div>
        </div>
    </div>

    <div class="a11y-footer">
        <button class="a11y-reset-btn" id="a11y-reset">
            <svg style="width:20px;fill:white;" viewBox="0 0 24 24"><path d="M17.65 6.35C16.2 4.9 14.21 4 12 4c-4.42 0-7.99 3.58-7.99 8s3.57 8 7.99 8c3.73 0 6.84-2.55 7.73-6h-2.08c-.82 2.33-3.04 4-5.65 4-3.31 0-6-2.69-6-6s2.69-6 6-6c1.66 0 3.14.69 4.22 1.78L13 11h7V4l-2.35 2.35z"/></svg>
            Atur Ulang Semua Pengaturan
        </button>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const trigger = document.getElementById('a11y-trigger');
    const panel = document.getElementById('a11y-panel');
    const closeBtn = document.getElementById('a11y-close-btn');
    const resetBtn = document.getElementById('a11y-reset');
    const cards = document.querySelectorAll('.a11y-card');
    const body = document.body;

    // 1. Logika Buka Tutup Panel
    trigger.addEventListener('click', () => panel.classList.add('buka'));
    closeBtn.addEventListener('click', () => panel.classList.remove('buka'));

    // Buka dengan Shortcut Keyboard (CTRL + U)
    document.addEventListener('keydown', (e) => {
        if (e.ctrlKey && e.key.toLowerCase() === 'u') {
            e.preventDefault();
            panel.classList.toggle('buka');
        }
    });

    // 2. Fungsi Menerapkan Efek ke Body & Simpan ke Memori
    function terapkanEfek(aksi, step) {
        if (step > 0) {
            // Logika khusus bertingkat (misal: teks besar tingkat 1, tingkat 2)
            body.classList.remove(aksi, aksi + '-2');
            if (step === 1) body.classList.add(aksi);
            if (step === 2) body.classList.add(aksi + '-2');
        } else {
            // Logika tombol on/off biasa
            body.classList.toggle(aksi);
        }
        
        // Simpan ke local storage agar tidak hilang saat pindah halaman
        if(body.classList.contains(aksi) || body.classList.contains(aksi+'-2')) {
            localStorage.setItem(aksi, step !== undefined ? step : 'aktif');
        } else {
            localStorage.removeItem(aksi);
        }
    }

    // 3. Baca Memori Saat Halaman Dimuat
    cards.forEach(card => {
        const aksi = card.getAttribute('data-action');
        const maxSteps = parseInt(card.getAttribute('data-steps')) || 0;
        const savedData = localStorage.getItem(aksi);

        if (savedData) {
            card.classList.add('aktif');
            if (maxSteps > 0) {
                let currentStep = parseInt(savedData);
                card.classList.add('step-' + currentStep);
                card.dataset.currentStep = currentStep;
                terapkanEfek(aksi, currentStep);
            } else {
                body.classList.add(aksi);
            }
        } else {
            card.dataset.currentStep = 0;
        }

        // 4. Interaksi Klik pada Kartu
        card.addEventListener('click', () => {
            if (maxSteps > 0) {
                let step = parseInt(card.dataset.currentStep || 0);
                step = (step + 1) > maxSteps ? 0 : (step + 1); // Loop step
                
                card.dataset.currentStep = step;
                card.className = 'a11y-card'; // Reset kelas
                if (step > 0) {
                    card.classList.add('aktif', 'step-' + step);
                }
                terapkanEfek(aksi, step);
            } else {
                card.classList.toggle('aktif');
                terapkanEfek(aksi);
            }
        });
    });

    // 5. Logika Tombol Reset Semua
    resetBtn.addEventListener('click', () => {
        cards.forEach(card => {
            const aksi = card.getAttribute('data-action');
            body.classList.remove(aksi, aksi + '-2');
            card.className = 'a11y-card'; // Buang status aktif dan step
            card.dataset.currentStep = 0;
            localStorage.removeItem(aksi);
        });
    });
});
</script>