<style>
.a11y-btn { position: fixed; bottom: 20px; right: 20px; z-index: 9999; background: #0056b3; border: 3px solid #e0f2fe; cursor: grab; transition: transform 0.2s; touch-action: none; border-radius: 50%; width: 60px; height: 60px; display: flex; align-items: center; justify-content: center; box-shadow: 0 6px 15px rgba(0,86,179,0.4); }
.a11y-btn:active { cursor: grabbing; transform: scale(0.95); }
.a11y-btn svg { width: 38px; height: 38px; fill: white; pointer-events: none; }

.a11y-panel { position: fixed; bottom: 95px; right: 20px; width: 340px; background: #ffffff; border: 1px solid #e2e8f0; border-radius: 16px; z-index: 9998; display: none; flex-direction: column; box-shadow: 0 20px 40px rgba(0,0,0,0.15); font-family: 'Segoe UI', system-ui, sans-serif; overflow: hidden; }
.a11y-panel.active { display: flex; }
.a11y-header { background: #0056b3; color: white; padding: 16px 20px; display: flex; justify-content: space-between; align-items: center; }
.a11y-header h3 { margin: 0; font-size: 16px; font-weight: 700; display: flex; align-items: center; gap: 8px; }
.a11y-close { background: none; border: none; color: white; font-size: 28px; cursor: pointer; line-height: 1; padding: 0; margin: 0; opacity: 0.8; transition: opacity 0.2s; }
.a11y-close:hover { opacity: 1; }

.a11y-body { padding: 15px 20px; max-height: 65vh; overflow-y: auto; background: #f8fafc; }
.a11y-section-title { font-size: 11px; font-weight: 700; color: #64748b; margin: 15px 0 10px 0; text-transform: uppercase; letter-spacing: 0.5px; }
.a11y-section-title:first-child { margin-top: 0; }
.a11y-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 10px; }

.a11y-option { padding: 12px 8px; border: 1px solid #cbd5e1; background: #ffffff; border-radius: 10px; cursor: pointer; text-align: center; font-size: 12px; font-weight: 600; color: #334155; transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1); display: flex; flex-direction: column; align-items: center; gap: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.02); }
.a11y-option i { font-size: 20px; font-style: normal; }
.a11y-option:hover { border-color: #0056b3; transform: translateY(-2px); box-shadow: 0 4px 6px rgba(0,86,179,0.1); }
.a11y-option.active { background: #0056b3; color: white; border-color: #0056b3; }

.a11y-reset { width: 100%; margin-top: 15px; padding: 14px; background: #ef4444; color: white; border: none; border-radius: 10px; cursor: pointer; font-weight: bold; font-size: 13px; transition: background 0.2s; display: flex; justify-content: center; align-items: center; gap: 8px; }
.a11y-reset:hover { background: #dc2626; }

/* KELAS EFEK DISABILITAS */
body.a11y-large-text * { font-size: 115% !important; line-height: 1.6 !important; }
body.a11y-high-contrast { background-color: #121212 !important; color: #ffff00 !important; }
body.a11y-high-contrast * { background-color: #121212 !important; color: #ffff00 !important; border-color: #ffff00 !important; }
body.a11y-dyslexia * { font-family: "OpenDyslexic", "Comic Sans MS", sans-serif !important; }
body.a11y-highlight-links a { background-color: yellow !important; color: black !important; text-decoration: underline !important; font-weight: bold !important; padding: 2px 4px !important; border-radius: 4px !important; }
body.a11y-grayscale { filter: grayscale(100%) !important; }
body.a11y-large-cursor, body.a11y-large-cursor * { cursor: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><path fill="%23000" stroke="%23fff" stroke-width="2" d="M5.5 3.21V20.8c0 .45.54.67.85.35l4.86-4.86a.5.5 0 0 1 .35-.15h6.87c.45 0 .67-.54.35-.85L5.5 3.21z"/></svg>'), auto !important; }
body.a11y-stop-animations *, body.a11y-stop-animations *:before, body.a11y-stop-animations *:after { animation-play-state: paused !important; transition: none !important; scroll-behavior: auto !important; }
body.a11y-loose-spacing * { letter-spacing: 0.12em !important; word-spacing: 0.16em !important; line-height: 1.8 !important; }

/* KURSOR KHUSUS SAAT MODE PEMBACA LAYAR AKTIF */
body.a11y-speech-active, body.a11y-speech-active * { cursor: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><path fill="%230056b3" d="M3 9v6h4l5 5V4L7 9H3zm13.5 3c0-1.77-1.02-3.29-2.5-4.03v8.05c1.48-.73 2.5-2.25 2.5-4.02zM14 3.23v2.06c2.89.86 5 3.54 5 6.71s-2.11 5.85-5 6.71v2.06c4.01-.91 7-4.49 7-8.77s-2.99-7.86-7-8.77z"/></svg>'), auto !important; }
</style>

<button id="a11y-toggle-btn" class="a11y-btn" aria-label="Buka Menu Aksesibilitas">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
        <circle cx="12" cy="4" r="2.5"/>
        <path d="M21 9h-6V7c0-1.1-.9-2-2-2h-2c-1.1 0-2 .9-2 2v2H3v2h6v12h2v-6h2v6h2V11h6V9z"/>
    </svg>
</button>

<div id="a11y-panel" class="a11y-panel">
    <div class="a11y-header">
        <h3>Aksesibilitas Cerdas</h3>
        <button id="a11y-close-btn" class="a11y-close">&times;</button>
    </div>
    <div class="a11y-body">
        
        <div class="a11y-section-title">Mode Profil (Sekali Klik)</div>
        <div class="a11y-grid">
            <button class="a11y-option" data-action="toggle-animations"><i>⚡</i>Aman Epilepsi</button>
            <button class="a11y-option" data-action="toggle-dyslexia"><i>🅰️</i>Ramah Disleksia</button>
        </div>

        <div class="a11y-section-title">Asisten Suara</div>
        <div class="a11y-grid" style="grid-template-columns: 1fr;">
            <button class="a11y-option" data-action="toggle-speech" style="flex-direction: row; justify-content: center;">
                <i>🔊</i> Klik & Baca Teks (Suara)
            </button>
        </div>

        <div class="a11y-section-title">Penyesuaian Visual</div>
        <div class="a11y-grid">
            <button class="a11y-option" data-action="toggle-text"><i>🔍</i>Teks Besar</button>
            <button class="a11y-option" data-action="toggle-contrast"><i>🌗</i>Kontras Tinggi</button>
            <button class="a11y-option" data-action="toggle-links"><i>🔗</i>Sorot Tautan</button>
            <button class="a11y-option" data-action="toggle-spacing"><i>📏</i>Spasi Longgar</button>
            <button class="a11y-option" data-action="toggle-grayscale"><i>🎞️</i>Monokrom</button>
            <button class="a11y-option" data-action="toggle-cursor"><i>🖱️</i>Kursor Besar</button>
        </div>
        
        <button class="a11y-reset" data-action="reset-all"><i>🔄</i> Kembalikan ke Standar</button>
    </div>
</div>

<script>
(function() {
    const toggleBtn = document.getElementById('a11y-toggle-btn');
    const closeBtn = document.getElementById('a11y-close-btn');
    const panel = document.getElementById('a11y-panel');
    const body = document.body;

    const features = {
        'toggle-text': 'a11y-large-text',
        'toggle-contrast': 'a11y-high-contrast',
        'toggle-dyslexia': 'a11y-dyslexia',
        'toggle-links': 'a11y-highlight-links',
        'toggle-grayscale': 'a11y-grayscale',
        'toggle-cursor': 'a11y-large-cursor',
        'toggle-animations': 'a11y-stop-animations',
        'toggle-spacing': 'a11y-loose-spacing',
        'toggle-speech': 'a11y-speech-active' // Fitur Suara
    };

    let isDragging = false;
    let hasDragged = false;
    let synth = window.speechSynthesis;

    // Load Posisi Tombol
    const savedLeft = localStorage.getItem('a11y-btn-left');
    const savedTop = localStorage.getItem('a11y-btn-top');
    if (savedLeft && savedTop && toggleBtn) {
        toggleBtn.style.left = savedLeft;
        toggleBtn.style.top = savedTop;
        toggleBtn.style.bottom = 'auto';
        toggleBtn.style.right = 'auto';
    }

    // Fungsi Drag and Drop
    if (toggleBtn) {
        toggleBtn.addEventListener('mousedown', (e) => {
            isDragging = true;
            hasDragged = false;
            let shiftX = e.clientX - toggleBtn.getBoundingClientRect().left;
            let shiftY = e.clientY - toggleBtn.getBoundingClientRect().top;

            function moveAt(pageX, pageY) {
                toggleBtn.style.left = pageX - shiftX + 'px';
                toggleBtn.style.top = pageY - shiftY + 'px';
                toggleBtn.style.bottom = 'auto';
                toggleBtn.style.right = 'auto';
            }

            function onMouseMove(event) {
                isDragging = true;
                hasDragged = true;
                moveAt(event.pageX, event.pageY);
            }

            document.addEventListener('mousemove', onMouseMove);
            document.addEventListener('mouseup', () => {
                if(isDragging) {
                    document.removeEventListener('mousemove', onMouseMove);
                    isDragging = false;
                    if(hasDragged) {
                        localStorage.setItem('a11y-btn-left', toggleBtn.style.left);
                        localStorage.setItem('a11y-btn-top', toggleBtn.style.top);
                    }
                }
            }, { once: true });
        });
        toggleBtn.ondragstart = function() { return false; };
    }

    // Buka Tutup Panel
    if (toggleBtn && closeBtn && panel) {
        toggleBtn.addEventListener('click', (e) => {
            if (hasDragged) { e.preventDefault(); hasDragged = false; return; }
            panel.classList.toggle('active');
        });
        closeBtn.addEventListener('click', () => panel.classList.remove('active'));
    }

    // Fungsi Membaca Teks (Text-to-Speech)
    function readTextAloud(e) {
        if (!body.classList.contains('a11y-speech-active')) return;
        
        // Jangan baca teks di dalam widget itu sendiri
        if (e.target.closest('#a11y-panel') || e.target.closest('#a11y-toggle-btn')) return;

        synth.cancel(); // Hentikan suara sebelumnya
        let textToRead = e.target.innerText || e.target.textContent;
        
        if (textToRead && textToRead.trim() !== '') {
            let utterance = new SpeechSynthesisUtterance(textToRead);
            utterance.lang = 'id-ID'; // Logat Bahasa Indonesia
            utterance.rate = 0.9; // Kecepatan sedikit dilambatkan agar jelas
            synth.speak(utterance);
        }
    }

    // Load Efek dari Memori Browser saat Pindah Halaman
    for (const [action, className] of Object.entries(features)) {
        if (localStorage.getItem(className) === 'true') {
            body.classList.add(className);
            const btn = document.querySelector(`[data-action="${action}"]`);
            if (btn) btn.classList.add('active');
            
            // Khusus jika fitur suara aktif dari halaman sebelumnya
            if(action === 'toggle-speech') {
                document.addEventListener('click', readTextAloud);
            }
        }
    }

    // Event Klik Tombol Fitur
    document.querySelectorAll('.a11y-option').forEach(button => {
        button.addEventListener('click', (e) => {
            const btn = e.currentTarget; 
            const action = btn.getAttribute('data-action');
            const className = features[action];
            
            body.classList.toggle(className);
            btn.classList.toggle('active');
            localStorage.setItem(className, body.classList.contains(className));

            // Logika Khusus Tombol Suara
            if (action === 'toggle-speech') {
                if (body.classList.contains(className)) {
                    document.addEventListener('click', readTextAloud);
                } else {
                    document.removeEventListener('click', readTextAloud);
                    synth.cancel();
                }
            }
        });
    });

    // Tombol Reset
    const resetBtn = document.querySelector('.a11y-reset');
    if (resetBtn) {
        resetBtn.addEventListener('click', () => {
            for (const className of Object.values(features)) {
                body.classList.remove(className);
                localStorage.removeItem(className);
            }
            document.querySelectorAll('.a11y-option').forEach(btn => btn.classList.remove('active'));
            
            // Reset Suara & Posisi
            document.removeEventListener('click', readTextAloud);
            synth.cancel();
            localStorage.removeItem('a11y-btn-left');
            localStorage.removeItem('a11y-btn-top');
            
            if (toggleBtn) {
                toggleBtn.style.left = ''; toggleBtn.style.top = ''; toggleBtn.style.bottom = '20px'; toggleBtn.style.right = '20px';
            }
            panel.classList.remove('active');
        });
    }
})();
</script>