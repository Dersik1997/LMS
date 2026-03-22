<link rel="stylesheet" href="{{ asset('css/accessibility.css') }}">

<button id="a11y-toggle-btn" class="a11y-btn" aria-label="Buka Menu Aksesibilitas">
    <img src="{{ asset('images/accessibility-icon.jpg') }}" alt="Aksesibilitas">
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

<script src="{{ asset('js/accessibility.js') }}"></script>