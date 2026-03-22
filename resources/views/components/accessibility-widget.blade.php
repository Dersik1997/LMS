<style>
    :root {
        --a11y-blue: #0052cc;
        --a11y-bg: #f4f5f7;
        --a11y-card: #ffffff;
        --a11y-text: #172b4d;
        --a11y-bar-off: #dfe1e6;
        --a11y-bar-on: #0052cc;
    }

    /* FOKUS & TRIGGER */
    button:focus-visible { outline: 3px solid #ffab00 !important; outline-offset: 2px !important; }
    #a11y-trigger {
        position: fixed; bottom: 30px; right: 30px; z-index: 2147483647;
        width: 60px; height: 60px; border-radius: 50%; background: var(--a11y-blue);
        border: 3px solid #fff; box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        cursor: grab; display: flex; align-items: center; justify-content: center; padding: 0; touch-action: none;
    }
    #a11y-trigger svg { width: 38px; height: 38px; fill: white; pointer-events: none; }

    /* PANEL MENU */
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
    .a11y-close { background: rgba(0,0,0,0.2); border: none; color: white !important; width: 34px; height: 34px; border-radius: 50%; cursor: pointer; display: flex; align-items: center; justify-content: center; }
    .a11y-profile { background: #e9ecef; border: none; width: 100%; text-align: left; padding: 12px 20px; border-bottom: 1px solid #dfe1e6; display: flex; align-items: center; gap: 10px; cursor: pointer; font-weight: 700 !important; }
    .a11y-content { padding: 15px 20px; overflow-y: auto; flex-grow: 1; display: flex; flex-direction: column; gap: 15px; }
    
    .a11y-grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 10px; }
    .a11y-grid-3 { display: grid; grid-template-columns: repeat(3, 1fr); gap: 10px; }
    .a11y-card { background: var(--a11y-card) !important; border: 2px solid transparent !important; border-radius: 12px !important; padding: 10px 5px; display: flex; flex-direction: column; align-items: center; justify-content: center; gap: 8px; cursor: pointer; box-shadow: 0 2px 6px rgba(0,0,0,0.05); min-height: 95px; transition: 0.2s; position: relative; }
    .a11y-card.aktif { border-color: var(--a11y-blue) !important; background: #f0f7ff !important; }
    .a11y-card-icon svg { width: 28px; height: 28px; fill: #172b4d !important; }
    .a11y-card.aktif .a11y-card-icon svg { fill: var(--a11y-blue) !important; }
    .a11y-card-title { font-size: 11px !important; font-weight: 700 !important; text-align: center; line-height: 1.2 !important; }
    .circle-bg svg { background: #e2e8f0; border-radius: 50%; padding: 6px; width: 34px; height: 34px; }

    .a11y-bars { display: flex; gap: 4px; width: 50%; height: 4px; margin-top: 5px; }
    .a11y-bar { flex: 1; background: var(--a11y-bar-off); border-radius: 2px; }
    .a11y-card.step-1 .a11y-bar:nth-child(1), .a11y-card.step-2 .a11y-bar:nth-child(1), .a11y-card.step-2 .a11y-bar:nth-child(2),
    .a11y-card.step-3 .a11y-bar:nth-child(1), .a11y-card.step-3 .a11y-bar:nth-child(2), .a11y-card.step-3 .a11y-bar:nth-child(3),
    .a11y-card.step-4 .a11y-bar { background: var(--a11y-bar-on) !important; }

    .a11y-footer { padding: 15px 20px; background: var(--a11y-bg); border-top: 1px solid #dfe1e6; }
    .a11y-reset-btn { width: 100%; background: var(--a11y-blue); color: white !important; border: none; border-radius: 30px; padding: 14px; font-weight: 700 !important; cursor: pointer; display: flex; justify-content: center; align-items: center; gap: 10px; }

    /* =================================================================
       LOGIKA CSS EFEK (DENGAN PERBAIKAN TOTAL)
       ================================================================= */
    
    /* Perkecil Teks */
    body.efek-teks-kecil-1 *:not(#a11y-panel *) { font-size: 0.95em !important; }
    body.efek-teks-kecil-2 *:not(#a11y-panel *) { font-size: 0.85em !important; }
    body.efek-teks-kecil-3 *:not(#a11y-panel *) { font-size: 0.75em !important; }
    body.efek-teks-kecil-4 *:not(#a11y-panel *) { font-size: 0.65em !important; }

    /* Kejenuhan */
    body.efek-desaturasi-1 *:not(#a11y-panel *) { filter: saturate(50%) !important; }
    body.efek-desaturasi-2 *:not(#a11y-panel *) { filter: saturate(10%) !important; }
    body.efek-desaturasi-3 *:not(#a11y-panel *) { filter: grayscale(100%) !important; }

    /* Kontras */
    body.efek-kontras-1 *:not(#a11y-panel *) { filter: contrast(125%) !important; }
    body.efek-kontras-2 *:not(#a11y-panel *) { filter: contrast(175%) !important; }
    body.efek-kontras-3 *:not(#a11y-panel *) { background: #000 !important; color: #ffff00 !important; filter: contrast(200%) !important; }

    /* Rata Tulisan (Sangat Kuat) */
    body.efek-rata-kiri *:not(#a11y-panel *) { text-align: left !important; align-items: flex-start !important; justify-content: flex-start !important; }

    /* Sembunyi Gambar (Menghapus visual elemen media) */
    body.efek-sembunyi-gambar img:not(#a11y-panel *), 
    body.efek-sembunyi-gambar video, 
    body.efek-sembunyi-gambar svg:not(#a11y-trigger *):not(#a11y-panel *),
    body.efek-sembunyi-gambar [style*="background-image"] { opacity: 0 !important; visibility: hidden !important; pointer-events: none !important; }

    /* Tinggi Garis */
    body.efek-tinggi-garis-1 *:not(#a11y-panel *) { line-height: 1.6 !important; }
    body.efek-tinggi-garis-2 *:not(#a11y-panel *) { line-height: 2.0 !important; }
    body.efek-tinggi-garis-3 *:not(#a11y-panel *) { line-height: 2.5 !important; }

    /* Spasi Teks */
    body.efek-spasi-teks-1 *:not(#a11y-panel *) { letter-spacing: 1px !important; }
    body.efek-spasi-teks-2 *:not(#a11y-panel *) { letter-spacing: 3px !important; }
    body.efek-spasi-teks-3 *:not(#a11y-panel *) { letter-spacing: 5px !important; }

    /* Jeda Animasi */
    body.efek-henti-animasi *, body.efek-henti-animasi *::before, body.efek-henti-animasi *::after {
        animation-duration: 0s !important;
        animation-iteration-count: 1 !important;
        transition-duration: 0s !important;
    }

    /* Kursor Besar */
    body.efek-kursor-besar-1, body.efek-kursor-besar-1 *:not(#a11y-panel *) { cursor: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><path d="M7 2l12 11.2-5.8.5 3.3 7.3-2.2.9-3.2-7.4-4.4 4.7z"/></svg>'), auto !important; }
    body.efek-kursor-besar-2, body.efek-kursor-besar-2 *:not(#a11y-panel *) { cursor: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24"><path d="M7 2l12 11.2-5.8.5 3.3 7.3-2.2.9-3.2-7.4-4.4 4.7z"/></svg>'), auto !important; }
    body.efek-kursor-besar-3, body.efek-kursor-besar-3 *:not(#a11y-panel *) { cursor: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="%23ffff00" stroke="black"><path d="M7 2l12 11.2-5.8.5 3.3 7.3-2.2.9-3.2-7.4-4.4 4.7z"/></svg>'), auto !important; }

    .sr-only { position: absolute; width: 1px; height: 1px; padding: 0; margin: -1px; overflow: hidden; clip: rect(0, 0, 0, 0); white-space: nowrap; border-width: 0; }
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const trigger = document.getElementById('a11y-trigger'), panel = document.getElementById('a11y-panel'), body = document.body;
    const cards = document.querySelectorAll('.a11y-card'), resetBtn = document.getElementById('a11y-reset');

    // Audit Profil: Menambah fitur yang masuk akal untuk tiap kondisi
    const profilCfg = {
        'profil-motorik': { 'efek-kursor-besar': 2, 'efek-henti-animasi': 1 },
        'profil-netra': { 'efek-teks-besar': 4, 'efek-desaturasi': 3, 'efek-kontras': 2 },
        'profil-butawarna': { 'efek-desaturasi': 3 },
        'profil-disleksia': { 'efek-spasi-teks': 2, 'efek-tinggi-garis': 2 },
        'profil-kognitif': { 'efek-henti-animasi': 1, 'efek-rata-kiri': 1 },
        'profil-epilepsi': { 'efek-henti-animasi': 1, 'efek-desaturasi': 2 },
        'profil-adhd': { 'efek-henti-animasi': 1, 'efek-spasi-teks': 1 }
    };

    function terapkan(aksi, step) {
        const btn = document.querySelector(`[data-action="${aksi}"]`);
        // Hapus step 1-4
        for(let i=1; i<=4; i++) body.classList.remove(`${aksi}-${i}`);
        body.classList.remove(aksi);

        if(step > 0) {
            const className = btn?.dataset.steps ? `${aksi}-${step}` : aksi;
            body.classList.add(className);
            localStorage.setItem(aksi, step);
        } else {
            localStorage.removeItem(aksi);
        }
    }

    // Logika Klik Card
    cards.forEach(card => {
        const aksi = card.dataset.action;
        const saved = localStorage.getItem(aksi);
        if(saved) {
            card.dataset.currentStep = saved;
            card.classList.add('aktif');
            if(card.dataset.steps) card.classList.add('step-'+saved);
            terapkan(aksi, saved);
        }

        card.addEventListener('click', () => {
            if(aksi.startsWith('profil-')) {
                resetBtn.click();
                card.classList.add('aktif');
                if(profilCfg[aksi]) {
                    Object.entries(profilCfg[aksi]).forEach(([f, l]) => {
                        const b = document.querySelector(`[data-action="${f}"]`);
                        if(b) {
                            b.dataset.currentStep = l;
                            b.classList.add('aktif');
                            if(b.dataset.steps) b.classList.add('step-'+l);
                            terapkan(f, l);
                        }
                    });
                }
            } else {
                let s = parseInt(card.dataset.currentStep || 0);
                let m = parseInt(card.dataset.steps || 0);
                s = m > 0 ? (s >= m ? 0 : s + 1) : (s === 0 ? 1 : 0);
                card.dataset.currentStep = s;
                card.className = 'a11y-card';
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

    // Handle Drag
    let isDrag = false, moved = false, sx, sy;
    trigger.addEventListener('mousedown', e => { isDrag = true; moved = false; sx = e.clientX - trigger.offsetLeft; sy = e.clientY - trigger.offsetTop; });
    document.addEventListener('mousemove', e => { if(!isDrag) return; moved = true; trigger.style.left = (e.clientX-sx)+'px'; trigger.style.top = (e.clientY-sy)+'px'; trigger.style.right='auto'; trigger.style.bottom='auto'; });
    document.addEventListener('mouseup', () => { isDrag = false; });
    trigger.addEventListener('click', () => { if(!moved) panel.classList.toggle('buka'); });
    document.getElementById('a11y-close-btn').addEventListener('click', () => panel.classList.remove('buka'));
});
</script>