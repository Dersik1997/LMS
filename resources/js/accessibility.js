document.addEventListener('DOMContentLoaded', () => {
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

    // --- FITUR DRAG AND DROP ---
    let isDragging = false;
    let hasDragged = false;

    // Load posisi terakhir dari localStorage
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

    // --- BUKA/TUTUP PANEL ---
    if (toggleBtn && closeBtn && panel) {
        toggleBtn.addEventListener('click', (e) => {
            if (hasDragged) {
                e.preventDefault();
                hasDragged = false;
                return;
            }
            panel.classList.toggle('active');
        });
        closeBtn.addEventListener('click', () => panel.classList.remove('active'));
    }

    // --- LOAD FITUR DARI LOCAL STORAGE ---
    for (const [action, className] of Object.entries(features)) {
        if (localStorage.getItem(className) === 'true') {
            body.classList.add(className);
            const btn = document.querySelector(`[data-action="${action}"]`);
            if (btn) btn.classList.add('active');
        }
    }

    // --- TOGGLE FITUR SAAT DIKLIK ---
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

    // --- RESET SEMUA PENGATURAN ---
    const resetBtn = document.querySelector('.a11y-reset');
    if (resetBtn) {
        resetBtn.addEventListener('click', () => {
            // Reset efek
            for (const className of Object.values(features)) {
                body.classList.remove(className);
                localStorage.removeItem(className);
            }
            document.querySelectorAll('.a11y-option').forEach(btn => btn.classList.remove('active'));
            
            // Reset posisi tombol
            localStorage.removeItem('a11y-btn-left');
            localStorage.removeItem('a11y-btn-top');
            if (toggleBtn) {
                toggleBtn.style.left = '';
                toggleBtn.style.top = '';
                toggleBtn.style.bottom = '20px';
                toggleBtn.style.right = '20px';
            }
            
            // Tutup panel
            panel.classList.remove('active');
        });
    }
});