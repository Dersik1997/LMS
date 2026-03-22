<style>
    :root {
        --a11y-blue: #0052cc;
        --a11y-bg: #f4f5f7;
        --a11y-card: #ffffff;
        --a11y-text: #172b4d;
        --a11y-bar-off: #dfe1e6;
        --a11y-bar-on: #0052cc;
    }

    /* TOMBOL TRIGGER (Draggable) */
    #a11y-trigger {
        position: fixed; bottom: 30px; right: 30px; z-index: 2147483647;
        width: 60px; height: 60px; border-radius: 50%; background: var(--a11y-blue);
        border: 3px solid #fff; box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        cursor: grab; display: flex; align-items: center; justify-content: center; padding: 0;
        touch-action: none;
    }
    #a11y-trigger svg { width: 35px; height: 35px; fill: white; pointer-events: none; }

    /* PANEL MENU (Isolated) */
    #a11y-panel {
        position: fixed; top: 0; right: -450px; width: 420px; height: 100vh;
        background: var(--a11y-bg) !important; z-index: 2147483647;
        box-shadow: -10px 0 30px rgba(0,0,0,0.15); 
        transition: right 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
        display: flex; flex-direction: column; 
        font-family: 'Plus Jakarta Sans', sans-serif !important;
        visibility: hidden;
        color: var(--a11y-text) !important;
    }
    #a11y-panel.buka { right: 0; visibility: visible; }

    /* MENGUNCI UKURAN FONT DI DALAM PANEL AGAR TETAP NORMAL */
    #a11y-panel * {
        font-size: 14px !important;
        line-height: normal !important;
        letter-spacing: normal !important;
        text-transform: none !important;
    }
    #a11y-panel h2 { font-size: 16px !important; font-weight: 700 !important; }
    #a11y-panel .a11y-card-title { font-size: 11px !important; font-weight: 700 !important; }

    /* DESAIN KOMPONEN PANEL */
    .a11y-header { background: var(--a11y-blue); color: white !important; padding: 18px 20px; display: flex; justify-content: space-between; align-items: center; }
    .a11y-close { background: rgba(0,0,0,0.2); border: none; color: white !important; width: 34px; height: 34px; border-radius: 50%; cursor: pointer; display: flex; align-items: center; justify-content: center; }
    .a11y-profile { background: #e9ecef; border: none; width: 100%; text-align: left; padding: 12px 20px; border-bottom: 1px solid #dfe1e6; display: flex; align-items: center; gap: 10px; cursor: pointer; color: var(--a11y-text) !important; font-weight: 700; }
    .a11y-content { padding: 15px 20px; overflow-y: auto; flex-grow: 1; display: flex; flex-direction: column; gap: 15px; }
    .a11y-grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 10px; }
    .a11y-grid-3 { display: grid; grid-template-columns: repeat(3, 1fr); gap: 10px; }
    .a11y-card { background: var(--a11y-card); border: 2px solid transparent; border-radius: 12px; padding: 10px 5px; display: flex; flex-direction: column; align-items: center; justify-content: center; gap: 8px; cursor: pointer; box-shadow: 0 2px 6px rgba(0,0,0,0.05); min-height: 90px; }
    .a11y-card.aktif { border-color: var(--a11y-blue); background: #f0f7ff; }
    .a11y-card-icon svg { width: 28px; height: 28px; fill: #172b4d; }
    .a11y-card.aktif .a11y-card-icon svg { fill: var(--a11y-blue); }
    .circle-bg svg { background: #e2e8f0; border-radius: 50%; padding: 6px; width: 34px; height: 34px; }
    .a11y-bars { display: flex; gap: 4px; width: 50%; height: 4px; margin-top: 5px; }
    .a11y-bar { flex: 1; background: var(--a11y-bar-off); border-radius: 2px; }
    .a11y-card.step-1 .a11y-bar:nth-child(1), .a11y-card.step-2 .a11y-bar:nth-child(1), .a11y-card.step-2 .a11y-bar:nth-child(2),
    .a11y-card.step-3 .a11y-bar:nth-child(1), .a11y-card.step-3 .a11y-bar:nth-child(2), .a11y-card.step-3 .a11y-bar:nth-child(3),
    .a11y-card.step-4 .a11y-bar { background: var(--a11y-bar-on) !important; }
    .a11y-footer { padding: 15px 20px; background: var(--a11y-bg); border-top: 1px solid #dfe1e6; }
    .a11y-reset-btn { width: 100%; background: var(--a11y-blue); color: white !important; border: none; border-radius: 30px; padding: 12px; font-weight: 700; cursor: pointer; }

    /* =================================================================
       LOGIKA ISOLASI: Efek hanya kena Website, bukan Panel
       ================================================================= */
    
    /* TEKS BESAR */
    body.efek-teks-besar-1 *:not(#a11y-panel *) { font-size: 110% !important; }
    body.efek-teks-besar-2 *:not(#a11y-panel *) { font-size: 120% !important; }
    body.efek-teks-besar-3 *:not(#a11y-panel *) { font-size: 130% !important; }
    body.efek-teks-besar-4 *:not(#a11y-panel *) { font-size: 140% !important; }

    /* DESATURASI (Grayscale) - Panel tetap berwarna */
    body.efek-desaturasi-1 *:not(#a11y-panel *):not(#a11y-trigger) { filter: saturate(50%); }
    body.efek-desaturasi-2 *:not(#a11y-panel *):not(#a11y-trigger) { filter: saturate(20%); }
    body.efek-desaturasi-3 *:not(#a11y-panel *):not(#a11y-trigger) { filter: grayscale(100%); }

    /* KONTRAS TINGGI - Panel tetap standar */
    body.efek-kontras-3 *:not(#a11y-panel *) { background-color: #000 !important; color: #fff !important; border-color: #fff !important; }

    /* FONT DISLEKSIA */
    body.efek-font-disleksia-1 *:not(#a11y-panel *) { font-family: "Comic Sans MS", sans-serif !important; }
    body.efek-font-disleksia-2 *:not(#a11y-panel *) { font-family: "OpenDyslexic", sans-serif !important; }

    .sr-only { position: absolute; width: 1px; height: 1px; padding: 0; margin: -1px; overflow: hidden; clip: rect(0, 0, 0, 0); white-space: nowrap; border-width: 0; }
</style>

<div id="a11y-announcer" class="sr-only" aria-live="polite"></div>

<button id="a11y-trigger" title="Menu Aksesibilitas">
    <svg viewBox="0 0 24 24"><path d="M12 2c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2 .9-2 2-2zm9 7h-6v13h-2v-6h-2v6H9V9H3V7h18v2z"/></svg>
</button>

<div id="a11y-panel">
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
            <button class="a11y-card" data-action="profil-motorik">
                <div class="a11y-card-icon circle-bg"><svg viewBox="0 0 24 24"><path d="M12 2c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2 .9-2 2-2zm-3 7h6v5h-2v6h-2v-6H9V9z"/></svg></div>
                <div class="a11y-card-title">Motorik</div>
            </button>
            <button class="a11y-card" data-action="profil-netra">
                <div class="a11y-card-icon circle-bg"><svg viewBox="0 0 24 24"><path d="M12 3v18m-4-14v10m8-10v10"/></svg></div>
                <div class="a11y-card-title">Netra Total</div>
            </button>
        </div>

        <div class="a11y-grid-3">
            <button class="a11y-card" data-action="efek-teks-besar" data-steps="4">
                <div class="a11y-card-icon">T<span style="font-size:30px;">T</span></div>
                <div class="a11y-card-title">Teks Besar</div>
                <div class="a11y-bars"><div class="a11y-bar"></div><div class="a11y-bar"></div><div class="a11y-bar"></div><div class="a11y-bar"></div></div>
            </button>
            <button class="a11y-card" data-action="efek-desaturasi" data-steps="3">
                <div class="a11y-card-icon"><svg viewBox="0 0 24 24"><path d="M12 21c-3.87 0-7-3.13-7-7 0-4.33 6-11 7-11s7 6.67 7 11c0 3.87-3.13 7-7 7z"/></svg></div>
                <div class="a11y-card-title">Warna</div>
                <div class="a11y-bars"><div class="a11y-bar"></div><div class="a11y-bar"></div><div class="a11y-bar"></div></div>
            </button>
            <button class="a11y-card" data-action="efek-font-disleksia" data-steps="2">
                <div class="a11y-card-icon">Df</div>
                <div class="a11y-card-title">Disleksia</div>
                <div class="a11y-bars"><div class="a11y-bar"></div><div class="a11y-bar"></div></div>
            </button>
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

    const profil = {
        'profil-motorik': { 'efek-teks-besar': 1 },
        'profil-netra': { 'efek-teks-besar': 4, 'efek-desaturasi': 3 }
    };

    // 1. DRAGGABLE
    let isDrag = false, hasMoved = false, sx, sy;
    trigger.addEventListener('mousedown', e => { isDrag = true; hasMoved = false; sx = e.clientX - trigger.offsetLeft; sy = e.clientY - trigger.offsetTop; });
    document.addEventListener('mousemove', e => { if(!isDrag) return; hasMoved = true; trigger.style.left = (e.clientX-sx)+'px'; trigger.style.top = (e.clientY-sy)+'px'; trigger.style.right='auto'; trigger.style.bottom='auto'; });
    document.addEventListener('mouseup', () => { if(isDrag && hasMoved) { localStorage.setItem('a11y_x', trigger.style.left); localStorage.setItem('a11y_y', trigger.style.top); } isDrag = false; });

    // 2. TOGGLE PANEL
    trigger.addEventListener('click', () => { if(!hasMoved) panel.classList.toggle('buka'); });
    document.getElementById('a11y-close-btn').addEventListener('click', () => panel.classList.remove('buka'));

    // 3. EFEK & MEMORI
    function terapkan(aksi, step) {
        const btn = document.querySelector(`[data-action="${aksi}"]`);
        for(let i=1; i<=4; i++) body.classList.remove(`${aksi}-${i}`);
        body.classList.remove(aksi);

        if(step > 0) {
            body.classList.add(btn?.dataset.steps ? `${aksi}-${step}` : aksi);
            localStorage.setItem(aksi, step);
        } else localStorage.removeItem(aksi);
    }

    cards.forEach(card => {
        const aksi = card.dataset.action;
        const saved = localStorage.getItem(aksi);
        if(saved) { card.classList.add('aktif'); card.dataset.currentStep = saved; if(card.dataset.steps) card.classList.add('step-'+saved); terapkan(aksi, saved); }

        card.addEventListener('click', () => {
            if(aksi.startsWith('profil-')) {
                resetBtn.click(); card.classList.add('aktif');
                Object.entries(profil[aksi]).forEach(([f, l]) => {
                    const b = document.querySelector(`[data-action="${f}"]`);
                    b.dataset.currentStep = l; b.classList.add('aktif'); if(b.dataset.steps) b.classList.add('step-'+l);
                    terapkan(f, l);
                });
            } else {
                let s = parseInt(card.dataset.currentStep || 0), m = parseInt(card.dataset.steps || 0);
                s = m > 0 ? (s >= m ? 0 : s + 1) : (s === 0 ? 1 : 0);
                card.dataset.currentStep = s; card.className = 'a11y-card';
                if(s > 0) { card.classList.add('aktif'); if(m > 0) card.classList.add('step-'+s); }
                terapkan(aksi, s);
            }
        });
    });

    resetBtn.addEventListener('click', () => { cards.forEach(c => { terapkan(c.dataset.action, 0); c.className = 'a11y-card'; c.dataset.currentStep = 0; }); });

    if(localStorage.getItem('a11y_x')) { trigger.style.left = localStorage.getItem('a11y_x'); trigger.style.top = localStorage.getItem('a11y_y'); trigger.style.right='auto'; trigger.style.bottom='auto'; }
});
</script>