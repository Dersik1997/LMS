<style>
    .accessibility-icon, 
    .accessibility-menu, 
    ._accessibility-menu { 
        z-index: 2147483647 !important; 
        font-family: 'Plus Jakarta Sans', sans-serif !important; 
    }
</style>

<script src="https://cdn.jsdelivr.net/gh/fathulhudoyo/Fitur_Disabilitas@@main/accessibility.min.js"></script>

<script>
    (function jalankanWidget() {
        if (typeof Accessibility !== 'undefined') {
            new Accessibility({
                icon: {
                    position: { bottom: { size: 25, units: 'px' }, right: { size: 25, units: 'px' }, type: 'fixed' },
                    zIndex: '2147483647',
                    backgroundColor: '#0056b3',
                    color: '#ffffff'
                },
                labels: {
                    resetTitle: 'Kembali ke Awal',
                    closeTitle: 'Tutup',
                    menuTitle: 'Aksesibilitas ULD',
                    increaseText: 'Perbesar Teks',
                    decreaseText: 'Perkecil Teks',
                    increaseTextSpacing: 'Perbesar Spasi',
                    decreaseTextSpacing: 'Perkecil Spasi',
                    invertColors: 'Kontras Tinggi',
                    grayHues: 'Mode Monokrom',
                    underlineLinks: 'Sorot Tautan',
                    bigCursor: 'Kursor Besar',
                    readingGuide: 'Panduan Membaca',
                    disableAnimations: 'Hentikan Animasi'
                },
                modules: {
                    textToSpeech: false, 
                    speechToText: false
                },
                session: {
                    persistent: true
                }
            });
        } else {
            setTimeout(jalankanWidget, 200);
        }
    })();
</script>