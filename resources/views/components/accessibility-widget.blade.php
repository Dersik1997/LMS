<style>
    /* Memaksa Widget Berada Paling Depan */
    .accessibility-icon, 
    .accessibility-menu, 
    ._accessibility-menu { 
        z-index: 2147483647 !important; 
        font-family: 'Plus Jakarta Sans', sans-serif !important; 
    }
</style>

<script src="https://cdn.jsdelivr.net/gh/fathulhudoyo/Fitur_Disabilitas@main/accessibility.min.js"></script>

<script>
    (function jalankanWidget() {
        // Cek apakah library dari GitHub fathulhudoyo sudah selesai didownload
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
                    // Dimatikan mutlak agar tidak merusak fitur Suara Dosen/Mahasiswa bawaan Anda
                    textToSpeech: false, 
                    speechToText: false
                },
                session: {
                    persistent: true // Otomatis simpan pengaturan agar tidak riset saat pindah halaman
                }
            });
            console.log("Widget Aksesibilitas dari GitHub Fathulhudoyo Aktif!");
        } else {
            // Jika CDN lemot, sistem akan menunggu 0.2 detik dan mencoba menyalakan lagi secara otomatis
            setTimeout(jalankanWidget, 200);
        }
    })();
</script>