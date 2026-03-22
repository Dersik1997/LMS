<style>
    /* VARIABEL WARNA & FONT */
    :root {
        --a11y-blue: #0052cc;
        --a11y-bg: #f4f5f7;
        --a11y-card: #ffffff;
        --a11y-text: #172b4d;
        --a11y-bar-off: #dfe1e6;
        --a11y-bar-on: #42526e;
    }

    /* TOMBOL TRIGGER */
    #a11y-trigger {
        position: fixed; bottom: 30px; right: 30px; z-index: 2147483647;
        width: 60px; height: 60px; border-radius: 50%; background: var(--a11y-blue);
        border: 3px solid #fff; box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        cursor: pointer; display: flex; align-items: center; justify-content: center;
        transition: transform 0.2s; padding: 0;
    }
    #a11y-trigger:hover { transform: scale(1.05); }
    #a11y-trigger svg { width: 32px; height: 32px; fill: white; }

    /* PANEL UTAMA */
    #a11y-panel {
        position: fixed; top: 0; right: -450px; width: 420px; height: 100vh;
        background: var(--a11y-bg); z-index: 2147483647;
        box-shadow: -5px 0 25px rgba(0,0,0,0.15); transition: right 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        display: flex; flex-direction: column; font-family: 'Plus Jakarta Sans', sans-serif;
    }
    #a11y-panel.buka { right: 0; }

    /* HEADER */
    .a11y-header { background: var(--a11y-blue); color: white; padding: 15px 20px; display: flex; justify-content: space-between; align-items: center; }
    .a11y-header h2 { margin: 0; font-size: 15px; font-weight: 700; }
    .a11y-close { background: rgba(0,0,0,0.2); border: none; color: white; width: 30px; height: 30px; border-radius: 50%; font-size: 20px; cursor: pointer; display: flex; align-items: center; justify-content: center; }
    .a11y-close:hover { background: rgba(0,0,0,0.4); }

    /* PROFIL SECTION */
    .a11y-profile { background: #e9ecef; padding: 12px 20px; border-bottom: 1px solid #dfe1e6; display: flex; align-items: center; gap: 10px; font-weight: 700; font-size: 13px; color: var(--a11y-text); cursor: pointer; }
    .a11y-profile-icon { background: black; color: white; width: 24px; height: 24px; border-radius: 50%; display: flex; align-items: center; justify-content: center; }
    .a11y-profile-icon svg { width: 14px; fill: white; }

    /* KONTEN (SCROLLABLE) */
    .a11y-content { padding: 15px 20px; overflow-y: auto; flex-grow: 1; display: flex; flex-direction: column; gap: 20px; }

    /* GRID */
    .a11y-grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 10px; }
    .a11y-grid-3 { display: grid; grid-template-columns: repeat(3, 1fr); gap: 10px; }

    /* KARTU MENU */
    .a11y-card {
        background: var(--a11y-card); border: 2px solid transparent; border-radius: 10px;
        padding: 15px 5px; display: flex; flex-direction: column; align-items: center; justify-content: center;
        gap: 8px; cursor: pointer; box-shadow: 0 2px 5px rgba(0,0,0,0.04);
        transition: all 0.2s; text-align: center; position: relative; min-height: 90px;
    }
    .a11y-card:hover { transform: translateY(-2px); box-shadow: 0 4px 10px rgba(0,0,0,0.08); }
    .a11y-card.aktif { border-color: var(--a11y-blue); outline: 2px solid var(--a11y-blue); outline-offset: -2px; }
    
    /* IKON DALAM KARTU */
    .a11y-card-icon { height: 32px; display: flex; align-items: center; justify-content: center; font-size: 24px; font-weight: 800; color: #172b4d; }
    .a11y-card-icon svg { width: 28px; height: 28px; fill: currentColor; }
    .a11y-card-icon.circle-bg svg { background: #f0f2f5; border-radius: 50%; padding: 5px; width: 36px; height: 36px; }
    .a11y-card-title { font-size: 11px; font-weight: 700; color: var(--a11y-text); line-height: 1.2; }

    /* INDIKATOR BAR (Slider) - Mendukung hingga 4 step */
    .a11y-bars { display: flex; gap: 3px; width: 60%; height: 4px; margin-top: 5px; }
    .a11y-bar { flex: 1; background: var(--a11y-bar-off); border-radius: 2px; }
    .a11y-card.step-1 .a11y-bar:nth-child(1) { background: var(--a11y-bar-on); }
    .a11y-card.step-2 .a11y-bar:nth-child(1), .a11y-card.step-2 .a11y-bar:nth-child(2) { background: var(--a11y-bar-on); }
    .a11y-card.step-3 .a11y-bar:nth-child(1), .a11y-card.step-3 .a11y-bar:nth-child(2), .a11y-card.step-3 .a11y-bar:nth-child(3) { background: var(--a11y-bar-on); }
    .a11y-card.step-4 .a11y-bar { background: var(--a11y-bar-on); }

    /* TOMBOL RESET BESAR */
    .a11y-footer { padding: 15px 20px; background: var(--a11y-bg); border-top: 1px solid #dfe1e6; }
    .a11y-reset-btn { width: 100%; background: var(--a11y-blue); color: white; border: none; border-radius: 30px; padding: 12px; font-size: 13px; font-weight: 700; cursor: pointer; display: flex; justify-content: center; align-items: center; gap: 8px; transition: background 0.2s; }
    .a11y-reset-btn:hover { background: #0043a6; }

    /* =========================================
       CSS EFEK DISABILITAS (DI BODY) 
       ========================================= */
    body.efek-teks-besar-1 * { font-size: 110% !important; }
    body.efek-teks-besar-2 * { font-size: 120% !important; }
    body.efek-teks-besar-3 * { font-size: 130% !important; }
    body.efek-teks-besar-4 * { font-size: 140% !important; }

    body.efek-teks-kecil-1 * { font-size: 90% !important; }
    body.efek-teks-kecil-2 * { font-size: 80% !important; }
    body.efek-teks-kecil-3 * { font-size: 70% !important; }

    body.efek-spasi-besar-1 * { letter-spacing: 0.05em !important; word-spacing: 0.1em !important; }
    body.efek-spasi-besar-2 * { letter-spacing: 0.1em !important; word-spacing: 0.2em !important; }
    body.efek-spasi-besar-3 * { letter-spacing: 0.15em !important; word-spacing: 0.3em !important; }

    body.efek-tinggi-garis-1 * { line-height: 1.5 !important; }
    body.efek-tinggi-garis-2 * { line-height: 1.75 !important; }
    body.efek-tinggi-garis-3 * { line-height: 2.0 !important; }

    body.efek-kontras-1 { filter: contrast(120%) !important; }
    body.efek-kontras-2 { filter: contrast(150%) !important; }
    body.efek-kontras-3 { background-color: #121212 !important; color: #fff !important; }
    body.efek-kontras-3 * { background-color: #121212 !important; color: #fff !important; border-color: #555 !important; }

    body.efek-desaturasi-1 { filter: saturate(50%) !important; }
    body.efek-desaturasi-2 { filter: saturate(25%) !important; }
    body.efek-desaturasi-3 { filter: grayscale(100%) !important; } /* Monokrom */

    body.efek-rata-kiri-1 *, body.efek-rata-kiri-2 *, body.efek-rata-kiri-3 * { text-align: left !important; }

    body.efek-font-disleksia-1 *, body.efek-font-disleksia-2 * { font-family: "Comic Sans MS", "OpenDyslexic", sans-serif !important; }

    body.efek-kursor-besar-1, body.efek-kursor-besar-1 * { cursor: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><path fill="%23000" stroke="%23fff" stroke-width="2" d="M5.5 3.21V20.8c0 .45.54.67.85.35l4.86-4.86a.5.5 0 0 1 .35-.15h6.87c.45 0 .67-.54.35-.85L5.5 3.21z"/></svg>'), auto !important; }
    body.efek-kursor-besar-2, body.efek-kursor-besar-2 * { cursor: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24"><path fill="%23000" stroke="%23fff" stroke-width="2" d="M5.5 3.21V20.8c0 .45.54.67.85.35l4.86-4.86a.5.5 0 0 1 .35-.15h6.87c.45 0 .67-.54.35-.85L5.5 3.21z"/></svg>'), auto !important; }

    body.efek-sembunyi-gambar img, body.efek-sembunyi-gambar video { opacity: 0 !important; visibility: hidden !important; }
    body.efek-garis-bawah a { text-decoration: underline !important; font-weight: bold !important; background: #ffeb3b !important; color: #000 !important; }
    body.efek-henti-animasi *, body.efek-henti-animasi *:before, body.efek-henti-animasi *:after { animation-play-state: paused !important; transition: none !important; scroll-behavior: auto !important; }
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
        <div class="a11y-profile-icon"><svg viewBox="0 0 24 24"><path d="M12 4a4 4 0 1 1 0 8 4 4 0 0 1 0-8zm0 10c4.42 0 8 1.79 8 4v2H4v-2c0-2.21 3.58-4 8-4z"/></svg></div>
        Buta Warna Profil Aktif ▼
    </div>

    <div class="a11y-content">
        <div class="a11y-grid-2">
            <div class="a11y-card" data-action="profil-motorik" style="flex-direction:row; justify-content:flex-start; padding:10px;">
                <div class="a11y-card-icon circle-bg"><svg viewBox="0 0 24 24"><path d="M12 2c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2 .9-2 2-2zm-3 7h6v5h-2v6h-2v-6H9V9z"/></svg></div>
                <div class="a11y-card-title text-left">Gangguan Motorik</div>
            </div>
            <div class="a11y-card" data-action="profil-netra" style="flex-direction:row; justify-content:flex-start; padding:10px;">
                <div class="a11y-card-icon circle-bg"><svg viewBox="0 0 24 24"><path d="M12 3v18m-4-14v10m8-10v10m-12-6v2m16-2v2"/></svg></div>
                <div class="a11y-card-title text-left">Netra Total</div>
            </div>
            <div class="a11y-card" data-action="profil-butawarna" style="flex-direction:row; justify-content:flex-start; padding:10px;">
                <div class="a11y-card-icon circle-bg"><svg viewBox="0 0 24 24"><path d="M12 21c-3.87 0-7-3.13-7-7 0-4.33 6-11 7-11s7 6.67 7 11c0 3.87-3.13 7-7 7zm-1-12.87V19c2.76 0 5-2.24 5-5 0-2.6-3.18-7.24-5-8.87z"/></svg></div>
                <div class="a11y-card-title text-left">Buta Warna</div>
            </div>
            <div class="a11y-card" data-action="profil-disleksia" style="flex-direction:row; justify-content:flex-start; padding:10px;">
                <div class="a11y-card-icon circle-bg" style="font-size:16px;">Df</div>
                <div class="a11y-card-title text-left">Disleksia</div>
            </div>
            <div class="a11y-card" data-action="profil-penglihatan" style="flex-direction:row; justify-content:flex-start; padding:10px;">
                <div class="a11y-card-icon circle-bg"><svg viewBox="0 0 24 24"><path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/></svg></div>
                <div class="a11y-card-title text-left">Gangguan Penglihatan</div>
            </div>
            <div class="a11y-card" data-action="profil-kognitif" style="flex-direction:row; justify-content:flex-start; padding:10px;">
                <div class="a11y-card-icon circle-bg"><svg viewBox="0 0 24 24"><path d="M20.5 11H19V7c0-1.1-.9-2-2-2h-4V3.5C13 2.12 11.88 1 10.5 1S8 2.12 8 3.5V5H4c-1.1 0-1.99.9-1.99 2v3.8H3.5c1.49 0 2.7 1.21 2.7 2.7s-1.21 2.7-2.7 2.7H2V20c0 1.1.9 2 2 2h3.8v-1.5c0-1.49 1.21-2.7 2.7-2.7 1.49 0 2.7 1.21 2.7 2.7V22H17c1.1 0 2-.9 2-2v-4h1.5c1.38 0 2.5-1.12 2.5-2.5S21.88 11 20.5 11z"/></svg></div>
                <div class="a11y-card-title text-left">Kognitif & Pembelajaran</div>
            </div>
            <div class="a11y-card" data-action="profil-epilepsi" style="flex-direction:row; justify-content:flex-start; padding:10px;">
                <div class="a11y-card-icon circle-bg"><svg viewBox="0 0 24 24"><path d="M12 3c-4.97 0-9 4.03-9 9s4.03 9 9 9 9-4.03 9-9-4.03-9-9-9zm0 16c-3.86 0-7-3.14-7-7s3.14-7 7-7 7 3.14 7 7-3.14 7-7 7zm1-11h-2v3H8v2h3v3h2v-3h3v-2h-3V8z"/></svg></div>
                <div class="a11y-card-title text-left">Kejang dan Epilepsi</div>
            </div>
            <div class="a11y-card" data-action="profil-adhd" style="flex-direction:row; justify-content:flex-start; padding:10px;">
                <div class="a11y-card-icon circle-bg"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="8" fill="none" stroke="currentColor" stroke-width="2"/><circle cx="12" cy="12" r="3" fill="currentColor"/></svg></div>
                <div class="a11y-card-title text-left">ADHD</div>
            </div>
        </div>

        <hr style="border-color:#dfe1e6; margin:0;">

        <div class="a11y-grid-3">
            <div class="a11y-card" data-action="efek-suara">
                <div class="a11y-card-icon"><svg viewBox="0 0 24 24"><path d="M12 3v18m-4-14v10m8-10v10m-12-6v2m16-2v2" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg></div>
                <div class="a11y-card-title">Moda Suara</div>
            </div>
            <div class="a11y-card" data-action="efek-teks-besar" data-steps="4">
                <div class="a11y-card-icon">T<span style="font-size:32px;">T</span></div>
                <div class="a11y-card-title">Perbesar Teks</div>
                <div class="a11y-bars"><div class="a11y-bar"></div><div class="a11y-bar"></div><div class="a11y-bar"></div><div class="a11y-bar"></div></div>
            </div>
            <div class="a11y-card" data-action="efek-teks-kecil" data-steps="4">
                <div class="a11y-card-icon" style="font-size:20px;">T<span>T</span></div>
                <div class="a11y-card-title">Perkecil Teks</div>
                <div class="a11y-bars"><div class="a11y-bar"></div><div class="a11y-bar"></div><div class="a11y-bar"></div><div class="a11y-bar"></div></div>
            </div>

            <div class="a11y-card" data-action="efek-desaturasi" data-steps="3">
                <div class="a11y-card-icon"><svg viewBox="0 0 24 24"><path d="M12 21c-3.87 0-7-3.13-7-7 0-4.33 6-11 7-11s7 6.67 7 11c0 3.87-3.13 7-7 7zm-1-12.87V19c2.76 0 5-2.24 5-5 0-2.6-3.18-7.24-5-8.87z"/></svg></div>
                <div class="a11y-card-title">Desaturasi</div>
                <div class="a11y-bars"><div class="a11y-bar"></div><div class="a11y-bar"></div><div class="a11y-bar"></div></div>
            </div>
            <div class="a11y-card" data-action="efek-kontras" data-steps="3">
                <div class="a11y-card-icon"><svg viewBox="0 0 24 24"><path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5z"/></svg></div>
                <div class="a11y-card-title">Kontras+ / Gelap</div>
                <div class="a11y-bars"><div class="a11y-bar"></div><div class="a11y-bar"></div><div class="a11y-bar"></div></div>
            </div>
            <div class="a11y-card" data-action="efek-sembunyi-gambar">
                <div class="a11y-card-icon">
                    <svg viewBox="0 0 24 24"><path d="M21 19V5c0-1.1-.9-2-2-2H5.83L21 18.17zM2.81 2.81L1.39 4.22 3 5.83V19c0 1.1.9 2 2 2h13.17l1.61 1.61 1.41-1.41L2.81 2.81zM5 19V7.83l5.09 5.09L9 14.5l-4 5z"/></svg>
                </div>
                <div class="a11y-card-title">Sembunyikan Gambar</div>
            </div>

            <div class="a11y-card" data-action="efek-rata-kiri" data-steps="3">
                <div class="a11y-card-icon"><svg viewBox="0 0 24 24"><path d="M3 21h18v-2H3v2zm0-4h12v-2H3v2zm0-4h18v-2H3v2zm0-4h12V7H3v2zm0-6v2h18V3H3z"/></svg></div>
                <div class="a11y-card-title">Rata Kiri</div>
                <div class="a11y-bars"><div class="a11y-bar"></div><div class="a11y-bar"></div><div class="a11y-bar"></div></div>
            </div>
            <div class="a11y-card" data-action="efek-font-disleksia" data-steps="2">
                <div class="a11y-card-icon" style="font-size:32px;">Df</div>
                <div class="a11y-card-title">Ramah Disleksia</div>
                <div class="a11y-bars" style="width:40%;"><div class="a11y-bar"></div><div class="a11y-bar"></div></div>
            </div>
            <div class="a11y-card" data-action="efek-tinggi-garis" data-steps="3">
                <div class="a11y-card-icon"><svg viewBox="0 0 24 24"><path d="M3 15h18v-2H3v2zm0 4h18v-2H3v2zm0-8h18V9H3v2zm0-6v2h18V5H3z"/><path d="M12 2l-3 3h2v14H9l3 3 3-3h-2V5h2z" fill="#0052cc" opacity="0.5"/></svg></div>
                <div class="a11y-card-title">Tinggi Garis</div>
                <div class="a11y-bars"><div class="a11y-bar"></div><div class="a11y-bar"></div><div class="a11y-bar"></div></div>
            </div>

            <div class="a11y-card" data-action="efek-henti-animasi">
                <div class="a11y-card-icon"><svg viewBox="0 0 24 24"><path d="M6 2v6h.01L6 8.01 10 12l-4 4 .01.01H6V22h12v-5.99h-.01L18 16l-4-4 4-3.99-.01-.01H18V2H6zm10 14.5V20H8v-3.5l4-4 4 4zm-4-5l-4-4V4h8v3.5l-4 4z"/></svg></div>
                <div class="a11y-card-title">Animasi Dijeda</div>
            </div>
            <div class="a11y-card" data-action="efek-kursor-besar" data-steps="2">
                <div class="a11y-card-icon"><svg viewBox="0 0 24 24" style="transform: rotate(-45deg);"><path d="M7 2l12 11.2-5.8.5 3.3 7.3-2.2.9-3.2-7.4-4.4 4.7z"/></svg></div>
                <div class="a11y-card-title">Kursor</div>
                <div class="a11y-bars" style="width:40%;"><div class="a11y-bar"></div><div class="a11y-bar"></div></div>
            </div>
            <div class="a11y-card" data-action="efek-spasi-besar" data-steps="3">
                <div class="a11y-card-icon"><svg viewBox="0 0 24 24"><path d="M9 11v2h6v-2h-6zm12-4H3v2h18V7zM3 17h18v-2H3v2z"/></svg></div>
                <div class="a11y-card-title">Spasi Teks</div>
                <div class="a11y-bars"><div class="a11y-bar"></div><div class="a11y-bar"></div><div class="a11y-bar"></div></div>
            </div>

            <div class="a11y-card" data-action="efek-garis-bawah">
                <div class="a11y-card-icon"><u>U</u></div>
                <div class="a11y-card-title">Garis Bawahi Tautan</div>
            </div>
            <div class="a11y-card" data-action="efek-keterangan">
                <div class="a11y-card-icon"><svg viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"/></svg></div>
                <div class="a11y-card-title">Keterangan Alat</div>
            </div>
        </div>
    </div>

    <div class="a11y-footer">
        <button class="a11y-reset-btn" id="a11y-reset">
            <svg style="width:16px;fill:white;" viewBox="0 0 24 24"><path d="M17.65 6.35C16.2 4.9 14.21 4 12 4c-4.42 0-7.99 3.58-7.99 8s3.57 8 7.99 8c3.73 0 6.84-2.55 7.73-6h-2.08c-.82 2.33-3.04 4-5.65 4-3.31 0-6-2.69-6-6s2.69-6 6-6c1.66 0 3.14.69 4.22 1.78L13 11h7V4l-2.35 2.35z"/></svg>
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

    // 1. Logika Buka Tutup
    trigger.addEventListener('click', () => panel.classList.add('buka'));
    closeBtn.addEventListener('click', () => panel.classList.remove('buka'));
    document.addEventListener('keydown', (e) => { if (e.ctrlKey && e.key.toLowerCase() === 'u') { e.preventDefault(); panel.classList.toggle('buka'); }});

    // 2. Terapkan Efek Kelas ke Body
    function bersihkanEfekBertingkat(aksi, maxSteps) {
        for(let i=1; i<=maxSteps; i++) body.classList.remove(aksi + '-' + i);
        body.classList.remove(aksi);
    }

    function terapkanEfek(aksi, step, maxSteps) {
        bersihkanEfekBertingkat(aksi, maxSteps);
        
        if (maxSteps > 0 && step > 0) {
            body.classList.add(aksi + '-' + step);
        } else if (maxSteps === 0 && step === 1) {
            body.classList.add(aksi);
        }

        if(step > 0) {
            localStorage.setItem(aksi, step);
        } else {
            localStorage.removeItem(aksi);
        }
    }

    // 3. Muat Ulang dari LocalStorage
    cards.forEach(card => {
        const aksi = card.getAttribute('data-action');
        const maxSteps = parseInt(card.getAttribute('data-steps')) || 0;
        const savedData = localStorage.getItem(aksi);

        if (savedData) {
            const stepVal = parseInt(savedData);
            card.classList.add('aktif');
            if (maxSteps > 0) {
                card.classList.add('step-' + stepVal);
                card.dataset.currentStep = stepVal;
            } else {
                card.dataset.currentStep = 1;
            }
            terapkanEfek(aksi, stepVal, maxSteps);
        } else {
            card.dataset.currentStep = 0;
        }

        // 4. Interaksi Klik
        card.addEventListener('click', () => {
            let step = parseInt(card.dataset.currentStep || 0);
            
            if (maxSteps > 0) {
                step = (step >= maxSteps) ? 0 : (step + 1); // Looping step
            } else {
                step = (step === 0) ? 1 : 0; // Toggle biasa
            }
            
            card.dataset.currentStep = step;
            card.className = 'a11y-card'; // Buang kelas aktif dan step sebelumnya
            
            if (step > 0) {
                card.classList.add('aktif');
                if(maxSteps > 0) card.classList.add('step-' + step);
            }
            terapkanEfek(aksi, step, maxSteps);
        });
    });

    // 5. Tombol Reset
    resetBtn.addEventListener('click', () => {
        cards.forEach(card => {
            const aksi = card.getAttribute('data-action');
            const maxSteps = parseInt(card.getAttribute('data-steps')) || 0;
            bersihkanEfekBertingkat(aksi, maxSteps);
            card.className = 'a11y-card'; 
            card.dataset.currentStep = 0;
            localStorage.removeItem(aksi);
        });
    });
});
</script>