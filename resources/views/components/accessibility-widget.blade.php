<style>
    .accessibility-icon, 
    .accessibility-menu, 
    ._accessibility-menu { 
        z-index: 2147483647 !important; /* Angka z-index tertinggi di HTML */
        font-family: 'Plus Jakarta Sans', sans-serif !important; 
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/accessibility/dist/accessibility.min.js"></script>

<script>
    (function jalankanWidget() {
        // Cek apakah sistem "Accessibility" sudah masuk ke browser
        if (typeof Accessibility !== 'undefined') {
            new Accessibility({
                icon: {
                    position: {
                        bottom: { size: 25, units: 'px' },
                        right: { size: 25, units: 'px' },
                        type: 'fixed'
                    },
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
                    textToSpeech: false, // Dimatikan agar tidak bentrok
                    speechToText: false
                },
                session: {
                    persistent: true // Mencegah riset saat pindah halaman
                }
            });
            console.log("Widget Aksesibilitas Aktif!");
        } else {
            // Jika belum siap, tunggu 0.2 detik lalu coba lagi secara otomatis
            setTimeout(jalankanWidget, 200);
        }
    })();
</script>