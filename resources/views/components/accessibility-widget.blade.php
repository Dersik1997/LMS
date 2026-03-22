<style>
    :root {
        --a11y-blue: #0052cc;
        --a11y-bg: #f4f5f7;
        --a11y-card: #ffffff;
        --a11y-text: #172b4d;
        --a11y-bar-off: #dfe1e6;
        --a11y-bar-on: #0052cc;
    }

    button:focus-visible { outline: 3px solid #ffab00 !important; outline-offset: 2px !important; }
    
    /* TRIGGER */
    #a11y-trigger {
        position: fixed; bottom: 30px; right: 30px; z-index: 2147483647;
        width: 60px; height: 60px; border-radius: 50%; background: var(--a11y-blue);
        border: 3px solid #fff; box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        cursor: grab; display: flex; align-items: center; justify-content: center; padding: 0; touch-action: none;
    }
    #a11y-trigger svg { width: 38px; height: 38px; fill: white; pointer-events: none; }

    /* PANEL MENU (ISOLASI) */
    #a11y-panel {
        position: fixed; top: 0; right: -450px; width: 420px; height: 100vh;
        background: var(--a11y-bg) !important; z-index: 2147483647;
        box-shadow: -10px 0 30px rgba(0,0,0,0.15); transition: right 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
        display: flex; flex-direction: column; font-family: 'Plus Jakarta Sans', sans-serif !important; visibility: hidden;
    }
    #a11y-panel.buka { right: 0; visibility: visible; }
    #a11y-panel * { font-size: 14px !important; color: var(--a11y-text) !important; line-height: normal !important; letter-spacing: normal !important; text-transform: none !important; }

    .a11y-header { background: var(--a11y-blue); padding: 18px 20px; display: flex; justify-content: space-between; align-items: center; }
    .a11y-header h2 { margin: 0; font-size: 16px !important; font-weight: 700 !important; color: white !important; }
    .a11y-close { background: rgba(0,0,0,0.2); border: none; color: white !important; width: 34px; height: 34px; border-radius: 50%; font-size: 22px !important; cursor: pointer; display: flex; align-items: center; justify-content: center; }
    .a11y-profile { background: #e9ecef; border: none; width: 100%; text-align: left; padding: 12px 20px; border-bottom: 1px solid #dfe1e6; display: flex; align-items: center; gap: 10px; cursor: pointer; font-weight: 700 !important; }
    .a11y-content { padding: 15px 20px; overflow-y: auto; flex-grow: 1; display: flex; flex-direction: column; gap: 15px; }
    
    .a11y-grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 10px; }
    .a11y-grid-3 { display: grid; grid-template-columns: repeat(3, 1fr); gap: 10px; }
    
    .a11y-card { background: var(--a11y-card) !important; border: 2px solid transparent !important; border-radius: 12px !important; padding: 10px 5px; display: flex; flex-direction: column; align-items: center; justify-content: center; gap: 8px; cursor: pointer; box-shadow: 0 2px 6px rgba(0,0,0,0.05); min-height: 95px; transition: 0.2s; }
    .a11y-card.aktif { border-color: var(--a11y-blue) !important; background: #f0f7ff !important; }
    .a11y-card-icon svg { width: 28px; height: 28px; fill: #172b4d !important; }
    .a11y-card.aktif .a11y-card-icon svg { fill: var(--a11y-blue) !important; }
    .a11y-card-title { font-size: 11px !important; font-weight: 700 !important; text-align: center; line-height: 1.2 !important; }
    
    .a11y-bars { display: flex; gap: 4px; width: 50%; height: 4px; margin-top: 5px; }
    .a11y-bar { flex: 1; background: var(--a11y-bar-off); border-radius: 2px; }
    
    /* LOGIKA BAR AKTIF (1-4 STEP) */
    .a11y-card.step-1 .a11y-bar:nth-child(1),
    .a11y-card.step-2 .a11y-bar:nth-child(1), .a11y-card.step-2 .a11y-bar:nth-child(2),
    .a11y-card.step-3 .a11y-bar:nth-child(1), .a11y-card.step-3 .a11y-bar:nth-child(2), .a11y-card.step-3 .a11y-bar:nth-child(3),
    .a11y-card.step-4 .a11y-bar { background: var(--a11y-bar-on) !important; }

    .a11y-footer { padding: 15px 20px; background: var(--a11y-bg); border-top: 1px solid #dfe1e6; }
    .a11y-reset-btn { width: 100%; background: var(--a11y-blue); color: white !important; border: none; border-radius: 30px; padding: 14px; font-weight: 700 !important; cursor: pointer; display: flex; justify-content: center; align-items: center; gap: 10px; }

    /* =================================================================
       LOGIKA CSS EFEK (DENGAN ISOLASI PANEL)
       ================================================================= */
    
    /* PERBESAR TEKS (4 STEP) */
    body.efek-teks-besar-1 *:not(#a11y-panel *) { font-size: 110% !important; }
    body.efek-teks-besar-2 *:not(#a11y-panel *) { font-size: 125% !important; }
    body.efek-teks-besar-3 *:not(#a11y-panel *) { font-size: 140% !important; }
    body.efek-teks-besar-4 *:not(#a11y-panel *) { font-size: 160% !important; }

    /* PERKECIL TEKS (4 STEP) */
    body.efek-teks-kecil-1 *:not(#a11y-panel *) { font-size: 90% !important; }
    body.efek-teks-kecil-2 *:not(#a11y-panel *) { font-size: 80% !important; }
    body.efek-teks-kecil-3 *:not(#a11y-panel *) { font-size: 70% !important; }
    body.efek-teks-kecil-4 *:not(#a11y-panel *) { font-size: 60% !important; }

    /* KEJENUHAN / SATURATION (4 STEP) */
    body.efek-desaturasi-1 *:not(#a11y-panel *) { filter: saturate(60%); }
    body.efek-desaturasi-2 *:not(#a11y-panel *) { filter: saturate(30%); }
    body.efek-desaturasi-3 *:not(#a11y-panel *) { filter: grayscale(100%); }
    body.efek-desaturasi-4 *:not(#a11y-panel *) { filter: saturate(200%); } /* Inverted saturation/High Vivid */

    /* KONTRAS (3 STEP) */
    body.efek-kontras-1 *:not(#a11y-panel *) { filter: contrast(130%); }
    body.efek-kontras-2 *:not(#a11y-panel *) { filter: contrast(180%); }
    body.efek-kontras-3 *:not(#a11y-panel *) { background-color: #000 !important; color: #fff !important; }
    body.efek-kontras-3 *:not(#a11y-panel *):not(a) { border-color: #fff !important; }

    /* RATA TULISAN (3 STEP: Kiri, Tengah, Kanan) */
    body.efek-rata-kiri-1 *:not(#a11y-panel *) { text-align: left !important; }
    body.efek-rata-kiri-2 *:not(#a11y-panel *) { text-align: center !important; }
    body.efek-rata-kiri-3 *:not(#a11y-panel *) { text-align: right !important; }

    /* TINGGI GARIS (3 STEP) */
    body.efek-tinggi-garis-1 *:not(#a11y-panel *) { line-height: 1.6 !important; }
    body.efek-tinggi-garis-2 *:not(#a11y-panel *) { line-height: 2.0 !important; }
    body.efek-tinggi-garis-3 *:not(#a11y-panel *) { line-height: 2.6 !important; }

    /* SPASI TEKS (3 STEP) */
    body.efek-spasi-teks-1 *:not(#a11y-panel *) { letter-spacing: 2px !important; }
    body.efek-spasi-teks-2 *:not(#a11y-panel *) { letter-spacing: 4px !important; }
    body.efek-spasi-teks-3 *:not(#a11y-panel *) { letter-spacing: 6px !important; }

    /* KURSOR (3 STEP) */
    body.efek-kursor-besar-1, body.efek-kursor-besar-1 *:not(#a11y-panel *) { cursor: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><path d="M7 2l12 11.2-5.8.5 3.3 7.3-2.2.9-3.2-7.4-4.4 4.7z"/></svg>'), auto !important; }
    body.efek-kursor-besar-2, body.efek-kursor-besar-2 *:not(#a11y-panel *) { cursor: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24"><path d="M7 2l12 11.2-5.8.5 3.3 7.3-2.2.9-3.2-7.4-4.4 4.7z"/></svg>'), auto !important; }
    body.efek-kursor-besar-3, body.efek-kursor-besar-3 *:not(#a11y-panel *) { cursor: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24"><path d="M7 2l12 11.2-5.8.5 3.3 7.3-2.2.9-3.2-7.4-4.4 4.7z"/></svg>'), auto !important; }

    /* SEMBUNYIKAN GAMBAR (TOGGLE) */
    body.efek-sembunyi-gambar img:not(#a11y-panel *), 
    body.efek-sembunyi-gambar video, 
    body.efek-sembunyi-gambar [style*="background-image"] { opacity: 0 !important; visibility: hidden !important; transition: 0.3s; }

    /* ANIMASI JEDA (TOGGLE) */
    body.efek-henti-animasi *, 
    body.efek-henti-animasi *:before, 
    body.efek-henti-animasi *:after { animation-play-state: paused !important; transition: none !important; }

    /* LAINNYA */
    body.efek-font-disleksia-2 *:not(#a11y-panel *) { font-family: "OpenDyslexic", sans-serif !important; }
    body.efek-garis-bawah a:not(#a11y-panel *) { text-decoration: underline !important; font-weight: bold !important; color: #ffab00 !important; }

    .sr-only { position: absolute; width: 1px; height: 1px; padding: 0; margin: -1px; overflow: hidden; clip: rect(0, 0, 0, 0); white-space: nowrap; border-width: 0; }
</style>

<div id="a11y-announcer" class="sr-only" aria-live="polite"></div>

<button id="a11y-trigger" title="Menu Aksesibilitas">
    <svg viewBox="0 0 24 24"><path d="M12 2c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2 .9-2 2-2zm9 7h-6v13h-2v-6h-2v6H9V9H3V7h18v2z"/></svg>
</button>

<div id="a11y-panel" role="dialog">
    <div class="a11y-header">
        <h2>Menu Aksesibilitas (CTRL+U)</h2>
        <button class="a11y-close" id="a11y-close-btn">&times;</button>
    </div>

    <button class="a11y-profile">
        <div class="a11y-profile-icon"><svg viewBox="0 0 24 24"><path d="M12 4a4 4 0 1 1 0 8 4 4 0 0 1 0-8zm0 10c4.42 0 8 1.79 8 4v2H4v-2c0-2.21 3.58-4 8-4z"/></svg></div>
        Bebas Pilih Profil ▼
    </button>

    <div class="a11y-content">
        <div class="a11y-grid-2">
            <button class="a11y-card" data-action="profil-motorik"><div class="a11y-card-icon"><svg viewBox="0 0 24 24"><path d="M12 2c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2 .9-2 2-2zm-3 7h6v5h-2v6h-2v-6H9V9z"/></svg></div><div class="a11y-card-title">Motorik</div></button>
            <button class="a11y-card" data-action="profil-netra"><div class="a11y-card-icon"><svg viewBox="0 0 24 24"><path d="M12 3v18m-4-14v10m8-10v10"/></svg></div><div class="a11y-card-title">Netra Total</div></button>
            <button class="a11y-card" data-action="profil-butawarna"><div class="a11y-card-icon"><svg viewBox="0 0 24 24"><path d="M12 21c-3.87 0-7-3.13-7-7 0-4.33 6-11 7-11s7 6.67 7 11c0 3.87-3.13 7-7 7z"/></svg></div><div class="a11y-card-title">Buta Warna</div></button>
            <button class="a11y-card" data-action="profil-disleksia"><div class="a11y-card-icon" style="font-weight:bold">Df</div><div class="a11y-card-title">Disleksia</div></button>
            <button class="a11y-card" data-action="profil-penglihatan"><div class="a11y-card-icon"><svg viewBox="0 0 24 24"><path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5z"/></svg></div><div class="a11y-card-title">Penglihatan</div></button>
            <button class="a11y-card" data-action="profil-kognitif"><div class="a11y-card-icon"><svg viewBox="0 0 24 24"><path d="M9 21c0 .55.45 1 1 1h4c.55 0 1-.45 1-1v-1H9v1zm3-19C8.14 2 5 5.14 5 9c0 2.38 1.19 4.47 3 5.74V17c0 .55.45 1 1 1h6c.55 0 1-.45 1-1v-2.26c1.81-1.27 3-3.36 3-5.74 0-3.86-3.14-7-7-7z"/></svg></div><div class="a11y-card-title">Kognitif</div></button>
            <button class="a11y-card" data-action="profil-epilepsi"><div class="a11y-card-icon"><svg viewBox="0 0 24 24"><path d="M12 3c-4.97 0-9 4.03-9 9s4.03 9 9 9 9-4.03 9-9-4.03-9-9-9z"/></svg></div><div class="a11y-card-title">Epilepsi</div></button>
            <button class="a11y-card" data-action="profil-adhd"><div class="a11y-card-icon"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="8" fill="none" stroke="currentColor" stroke-width="2"/><circle cx="12" cy="12" r="3" fill="currentColor"/></svg></div><div class="a11y-card-title">ADHD</div></button>
        </div>

        <hr style="border-color:#dfe1e6; margin:0;">

        <div class="a11y-grid-3">
            <button class="a11y-card" data-action="efek-suara"><div class="a11y-card-icon"><svg viewBox="0 0 24 24"><path d="M12 3v18m-4-14v10m8-10v10"/></svg></div><div class="a11y-card-title">Moda Suara</div></button>
            <button class="a11y-card" data-action="efek-teks-besar" data-steps="4"><div class="a11y-card-icon">T<span style="font-size:30px">T</span></div><div class="a11y-card-title">Perbesar Teks</div><div class="a11y-bars"><div class="a11y-bar"></div><div class="a11y-bar"></div><div class="a11y-bar"></div><div class="a11y-bar"></div></div></button>
            <button class="a11y-card" data-action="efek-teks-kecil" data-steps="4"><div class="a11y-card-icon" style="font-size:20px">T<span>T</span></div><div class="a11y-card-title">Perkecil Teks</div><div class="a11y-bars"><div class="a11y-bar"></div><div class="a11y-bar"></div><div class="a11y-bar"></div><div class="a11y-bar"></div></div></button>
            <button class="a11y-card" data-action="efek-desaturasi" data-steps="4"><div class="a11y-card-icon"><svg viewBox="0 0 24 24"><path d="M12 21c-3.87 0-7-3.13-7-7 0-4.33 6-11 7-11s7 6.67 7 11c0 3.87-3.13 7-7 7z"/></svg></div><div class="a11y-card-title">Kejenuhan</div><div class="a11y-bars"><div class="a11y-bar"></div><div class="a11y-bar"></div><div class="a11y-bar"></div><div class="a11y-bar"></div></div></button>
            <button class="a11y-card" data-action="efek-kontras" data-steps="3"><div class="a11y-card-icon"><svg viewBox="0 0 24 24"><path d="M12 2c5.52 0 10 4.48 10 10s-4.48 10-10 10S2 17.52 2 12 6.48 2 12 2z"/></svg></div><div class="a11y-card-title">Kontras+</div><div class="a11y-bars"><div class="a11y-bar"></div><div class="a11y-bar"></div><div class="a11y-bar"></div></div></button>
            <button class="a11y-card" data-action="efek-sembunyi-gambar"><div class="a11y-card-icon"><svg viewBox="0 0 24 24"><path d="M21 19V5c0-1.1-.9-2-2-2H5.83L21 18.17zM2.81 2.81L1.39 4.22 3 5.83V19c0 1.1.9 2 2 2h13.17l1.61 1.61 1.41-1.41L2.81 2.81z"/></svg></div><div class="a11y-card-title">Sembunyi Gambar</div></button>
            <button class="a11y-card" data-action="efek-rata-kiri" data-steps="3"><div class="a11y-card-icon"><svg viewBox="0 0 24 24"><path d="M3 21h18v-2H3v2zm0-4h12v-2H3v2zm0-4h18v-2H3v2zm0-4h12V7H3v2zm0-6v2h18V3H3z"/></svg></div><div class="a11y-card-title">Rata Tulisan</div><div class="a11y-bars"><div class="a11y-bar"></div><div class="a11y-bar"></div><div class="a11y-bar"></div></div></button>
            <button class="a11y-card" data-action="efek-font-disleksia" data-steps="2"><div class="a11y-card-icon" style="font-weight:bold">Df</div><div class="a11y-card-title">Ramah Disleksia</div><div class="a11y-bars"><div class="a11y-bar"></div><div class="a11y-bar"></div></div></button>
            <button class="a11y-card" data-action="efek-tinggi-garis" data-steps="3"><div class="a11y-card-icon"><svg viewBox="0 0 24 24"><path d="M3 15h18v-2H3v2zm0 4h18v-2H3v2zm0-8h18V9H3v2zm0-6v2h18V5H3z"/></svg></div><div class="a11y-card-title">Tinggi Garis</div><div class="a11y-bars"><div class="a11y-bar"></div><div class="a11y-bar"></div><div class="a11y-bar"></div></div></button>
            <button class="a11y-card" data-action="efek-henti-animasi"><div class="a11y-card-icon"><svg viewBox="0 0 24 24"><path d="M6 2v6h.01L6 8.01 10 12l-4 4 .01.01H6V22h12v-5.99h-.01L18 16l-4-4 4-3.99-.01-.01H18V2H6z"/></svg></div><div class="a11y-card-title">Animasi Jeda</div></button>
            <button class="a11y-card" data-action="efek-kursor-besar" data-steps="3"><div class="a11y-card-icon"><svg viewBox="0 0 24 24" style="transform:rotate(-45deg)"><path d="M7 2l12 11.2-5.8.5 3.3 7.3-2.2.9-3.2-7.4-4.4 4.7z"/></svg></div><div class="a11y-card-title">Kursor</div><div class="a11y-bars"><div class="a11y-bar"></div><div class="a11y-bar"></div><div class="a11y-bar"></div></div></button>
            <button class="a11y-card" data-action="efek-spasi-teks" data-steps="3"><div class="a11y-card-icon"><svg viewBox="0 0 24 24"><path d="M9 11v2h6v-2h-6zm12-4H3v2h18V7zM3 17h18v-2H3v2z"/></svg></div><div class="a11y-card-title">Spasi Teks</div><div class="a11y-bars"><div class="a11y-bar"></div><div class="a11y-bar"></div><div class="a11y-bar"></div></div></button>
            <button class="a11y-card" data-action="efek-garis-bawah"><div class="a11y-card-icon"><u>U</u></div><div class="a11y-card-title">Garis Bawah Link</div></button>
            <button class="a11y-card" data-action="efek-keterangan"><div class="a11y-card-icon"><svg viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"/></svg></div><div class="a11y-card-title">Keterangan Alat</div></button>
        </div>
    </div>

    <div class="a11y-footer">
        <button class="a11y-reset-btn" id="a11y-reset">Atur Ulang Semua</button>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const trigger = document.getElementById('a11y-trigger'), panel = document.getElementById('a11y-panel'), body = document.body;
    const cards = document.querySelectorAll('.a11y-card'), resetBtn = document.getElementById('a11y-reset');

    const profilCfg = {
        'profil-motorik': { 'efek-kursor-besar': 1, 'efek-henti-animasi': 1 },
        'profil-netra': { 'efek-suara': 1, 'efek-teks-besar': 4, 'efek-desaturasi': 3, 'efek-kontras': 3 },
        'profil-butawarna': { 'efek-desaturasi': 3 },
        'profil-disleksia': { 'efek-font-disleksia': 2, 'efek-spasi-teks': 2 },
        'profil-penglihatan': { 'efek-teks-besar': 3, 'efek-kontras': 3 },
        'profil-kognitif': { 'efek-henti-animasi': 1, 'efek-keterangan': 1 },
        'profil-epilepsi': { 'efek-henti-animasi': 1, 'efek-desaturasi': 1 },
        'profil-adhd': { 'efek-henti-animasi': 1, 'efek-spasi-teks': 1 }
    };

    // 1. DRAGGABLE
    let isDrag = false, moved = false, sx, sy;
    trigger.addEventListener('mousedown', e => { isDrag = true; moved = false; sx = e.clientX - trigger.offsetLeft; sy = e.clientY - trigger.offsetTop; });
    document.addEventListener('mousemove', e => { if(!isDrag) return; moved = true; trigger.style.left = (e.clientX-sx)+'px'; trigger.style.top = (e.clientY-sy)+'px'; trigger.style.right='auto'; trigger.style.bottom='auto'; });
    document.addEventListener('mouseup', () => { if(isDrag && moved) { localStorage.setItem('a11y_x', trigger.style.left); localStorage.setItem('a11y_y', trigger.style.top); } isDrag = false; });

    // 2. TOGGLE PANEL
    trigger.addEventListener('click', () => { if(!moved) panel.classList.toggle('buka'); });
    document.getElementById('a11y-close-btn').addEventListener('click', () => panel.classList.remove('buka'));

    // 3. LOGIKA EFEK & MEMORI
    function terapkan(aksi, step) {
        const btn = document.querySelector(`[data-action="${aksi}"]`);
        const max = parseInt(btn?.dataset.steps || 0);
        
        // Bersihkan semua kemungkinan class sebelumnya
        for(let i=1; i<=4; i++) body.classList.remove(`${aksi}-${i}`);
        body.classList.remove(aksi);

        if(step > 0) {
            body.classList.add(max > 0 ? `${aksi}-${step}` : aksi);
            localStorage.setItem(aksi, step);
        } else {
            localStorage.removeItem(aksi);
        }
    }

    cards.forEach(card => {
        const aksi = card.dataset.action;
        const saved = localStorage.getItem(aksi);

        // Load awal
        if(saved) {
            card.classList.add('aktif'); card.dataset.currentStep = saved;
            if(card.dataset.steps) card.classList.add('step-'+saved);
            terapkan(aksi, saved);
        }

        card.addEventListener('click', () => {
            if(aksi.startsWith('profil-')) {
                resetBtn.click(); // Bersihkan dulu
                card.classList.add('aktif');
                Object.entries(profilCfg[aksi]).forEach(([f, l]) => {
                    const b = document.querySelector(`[data-action="${f}"]`);
                    if(b) {
                        b.dataset.currentStep = l; b.classList.add('aktif');
                        if(b.dataset.steps) b.classList.add('step-'+l);
                        terapkan(f, l);
                    }
                });
            } else {
                let s = parseInt(card.dataset.currentStep || 0), m = parseInt(card.dataset.steps || 0);
                s = m > 0 ? (s >= m ? 0 : s + 1) : (s === 0 ? 1 : 0);
                
                card.dataset.currentStep = s;
                card.className = 'a11y-card'; // Reset class
                if(s > 0) { 
                    card.classList.add('aktif'); 
                    if(m > 0) card.classList.add('step-'+s); 
                }
                terapkan(aksi, s);
            }
        });
    });

    resetBtn.addEventListener('click', () => { 
        cards.forEach(c => { terapkan(c.dataset.action, 0); c.className = 'a11y-card'; c.dataset.currentStep = 0; });
        localStorage.clear();
    });

    if(localStorage.getItem('a11y_x')) {
        trigger.style.left = localStorage.getItem('a11y_x');
        trigger.style.top = localStorage.getItem('a11y_y');
        trigger.style.right='auto'; trigger.style.bottom='auto';
    }
});
</script>