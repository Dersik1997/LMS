<style>
.a11y-btn { position: fixed; bottom: 20px; right: 20px; z-index: 9999; background: #0056b3; border: 2px solid white; cursor: grab; transition: transform 0.2s; touch-action: none; border-radius: 50%; width: 55px; height: 55px; display: flex; align-items: center; justify-content: center; box-shadow: 0 4px 10px rgba(0,0,0,0.3); }
.a11y-btn:active { cursor: grabbing; transform: scale(0.95); }
.a11y-btn svg { width: 35px; height: 35px; fill: white; user-select: none; pointer-events: none; }

.a11y-panel { position: fixed; bottom: 90px; right: 20px; width: 320px; background: #fff; border: 2px solid #0056b3; border-radius: 12px; z-index: 9998; display: none; flex-direction: column; box-shadow: 0 10px 25px rgba(0,0,0,0.2); overflow: hidden; font-family: sans-serif; }
.a11y-panel.active { display: flex; }
.a11y-header { background: #0056b3; color: white; padding: 15px; display: flex; justify-content: space-between; align-items: center; }
.a11y-header h3 { margin: 0; font-size: 16px; font-weight: bold; }
.a11y-close { background: none; border: none; color: white; font-size: 24px; cursor: pointer; line-height: 1; }
.a11y-body { padding: 15px; display: grid; grid-template-columns: 1fr 1fr; gap: 8px; max-height: 400px; overflow-y: auto; }

.a11y-option { padding: 10px; border: 1px solid #cbd5e1; background: #f8fafc; border-radius: 6px; cursor: pointer; text-align: center; font-size: 12px; font-weight: 600; color: #334155; transition: all 0.2s; display: flex; flex-direction: column; align-items: center; gap: 5px; }
.a11y-option:hover { background: #e2e8f0; }
.a11y-option.active { background: #0056b3; color: white; border-color: #0056b3; }
.a11y-reset { grid-column: span 2; margin-top: 10px; padding: 12px; background: #ef4444; color: white; border: none; border-radius: 6px; cursor: pointer; font-weight: bold; transition: background 0.2s; }
.a11y-reset:hover { background: #dc2626; }

/* KELAS EFEK DISABILITAS */
body.a11y-large-text * { font-size: 115% !important; }
body.a11y-high-contrast { background-color: #121212 !important; color: #ffff00 !important; }
body.a11y-high-contrast * { background-color: #121212 !important; color: #ffff00 !important; border-color: #ffff00 !important; }
body.a11y-dyslexia * { font-family: "Comic Sans MS", "OpenDyslexic", sans-serif !important; }
body.a11y-highlight-links a { background-color: yellow !important; color: black !important; text-decoration: underline !important; font-weight: bold !important; padding: 2px !important; }
body.a11y-grayscale { filter: grayscale(100%) !important; }
body.a11y-large-cursor, body.a11y-large-cursor * { cursor: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><path fill="%23000" stroke="%23fff" stroke-width="2" d="M5.5 3.21V20.8c0 .45.54.67.85.35l4.86-4.86a.5.5 0 0 1 .35-.15h6.87c.45 0 .67-.54.35-.85L5.5 3.21z"/></svg>'), auto !important; }
body.a11y-stop-animations *, body.a11y-stop-animations *:before, body.a11y-stop-animations *:after { animation-play-state: paused !important; transition: none !important; scroll-behavior: auto !important; }
body.a11y-loose-spacing * { letter-spacing: 0.12em !important; word-spacing: 0.16em !important; line-height: 1.8 !important; }
</style>

<button id="a11y-toggle-btn" class="a11y-btn" aria-label="Buka Menu Aksesibilitas">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
        <circle cx="12" cy="4" r="2.5"/>
        <path d="M21 9h-6V7c0-1.1-.9-2-2-2h-2c-1.1 0-2 .9-2 2v2H3v2h6v12h2v-6h2v6h2V11h6V9z"/>
    </svg>
</button>

<div id="a11y-panel" class="a11y-panel">
    <div class="a11y-header">
        <h3>Fitur Disabilitas</h3>
        <button id="a11y-close-btn" class="a11y-close">&times;</button>
    </div>
    <div class="a11y-body">
        <button class="a11y-option" data-action="toggle-text"><span>🔍</span>Teks Lebih Besar</button>
        <button class="a11y-option" data-action="toggle-contrast"><span>🌗</span>Kontras Tinggi</button>
        <button class="a11y-option" data-action="toggle-dyslexia"><span>🅰️</span>Font Disleksia</button>
        <button class="a11y-option" data-action="toggle-links"><span>🔗</span>Sorot Tautan</button>
        <button class="a11y-option" data-action="toggle-grayscale"><span>🎞️</span>Monokrom</button>
        <button class="a11y-option" data-action="toggle-cursor"><span>🖱️</span>Kursor Besar</button>
        <button class="a11y-option" data-action="toggle-animations"><span>⏸️</span>Stop Animasi</button>
        <button class="a11y-option" data-action="toggle-spacing"><span>📏</span>Spasi Longgar</button>
        <button class="a11y-reset" data-action="reset-all">🔄 Kembalikan ke Awal</button>
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
        'toggle-spacing': 'a11y-loose-spacing'
    };

    let isDragging = false;
    let hasDragged = false;

    // Load posisi
    const savedLeft = localStorage.getItem('a11y-btn-left');
    const savedTop = localStorage.getItem('a11y-btn-top');
    if (savedLeft && savedTop && toggleBtn) {
        toggleBtn.style.left = savedLeft;
        toggleBtn.style.top = savedTop;
        toggleBtn.style.bottom = 'auto';
        toggleBtn.style.right = 'auto';
    }

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

    // Load Efek
    for (const [action, className] of Object.entries(features)) {
        if (localStorage.getItem(className) === 'true') {
            body.classList.add(className);
            const btn = document.querySelector(`[data-action="${action}"]`);
            if (btn) btn.classList.add('active');
        }
    }

    // Toggle Efek
    document.querySelectorAll('.a11y-option').forEach(button => {
        button.addEventListener('click', (e) => {
            const btn = e.currentTarget; 
            const action = btn.getAttribute('data-action');
            const className = features[action];
            body.classList.toggle(className);
            btn.classList.toggle('active');
            localStorage.setItem(className, body.classList.contains(className));
        });
    });

    // Reset
    const resetBtn = document.querySelector('.a11y-reset');
    if (resetBtn) {
        resetBtn.addEventListener('click', () => {
            for (const className of Object.values(features)) {
                body.classList.remove(className);
                localStorage.removeItem(className);
            }
            document.querySelectorAll('.a11y-option').forEach(btn => btn.classList.remove('active'));
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