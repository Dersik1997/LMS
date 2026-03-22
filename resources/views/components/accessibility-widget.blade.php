<style>
    /* Memastikan widget selalu berada di atas layar Aktivasi Suara (z-index: 100) */
    ._accessibility-menu { z-index: 999999 !important; font-family: 'Plus Jakarta Sans', sans-serif !important; }
    .accessibility-icon { z-index: 999999 !important; }
</style>

<script src="https://cdn.jsdelivr.net/npm/accessibility/dist/accessibility.min.js"></script>

<script>
    window.addEventListener('load', function() {
        new Accessibility({
            // Konfigurasi Ikon & Tampilan
            icon: {
                position: {
                    bottom: { size: 25, units: 'px' },
                    right: { size: 25, units: 'px' },
                    type: 'fixed'
                },
                dimensions: {
                    width: { size: 60, units: 'px' },
                    height: { size: 60, units: 'px' }
                },
                zIndex: '999999',
                backgroundColor: '#0056b3', // Warna biru 
                color: '#ffffff'
            },

            // Konfigurasi Bahasa (Terjemahan ke Bahasa Indonesia)
            labels: {
                resetTitle: 'Reset (Kembali ke Awal)',
                closeTitle: 'Tutup Menu',
                menuTitle: 'Aksesibilitas ULD',
                increaseText: 'Perbesar Teks',
                decreaseText: 'Perkecil Teks',
                increaseTextSpacing: 'Perbesar Spasi',
                decreaseTextSpacing: 'Perkecil Spasi',
                increaseLineHeight: 'Jarak Baris (+)',
                decreaseLineHeight: 'Jarak Baris (-)',
                invertColors: 'Kontras Tinggi',
                grayHues: 'Mode Monokrom',
                underlineLinks: 'Sorot Tautan',
                bigCursor: 'Kursor Besar',
                readingGuide: 'Panduan Membaca',
                annotations: 'Anotasi Teks',
                disableAnimations: 'Hentikan Animasi'
            },

            // Konfigurasi Fitur yang Diaktifkan
            modules: {
                increaseText: true,
                decreaseText: true,
                invertColors: true,
                increaseTextSpacing: true,
                decreaseTextSpacing: true,
                increaseLineHeight: true,
                decreaseLineHeight: true,
                grayHues: true,
                underlineLinks: true,
                bigCursor: true,
                readingGuide: true,
                annotations: true,
                disableAnimations: true,

                // SANGAT PENTING: Matikan fitur suara agar tidak bentrok dengan
                // script window.speechSynthesis di halaman utama Anda!
                textToSpeech: false,
                speechToText: false
            },

            // Konfigurasi Penyimpanan (Wajib agar tidak riset saat pindah halaman)
            session: {
                persistent: true // Menginstruksikan library menggunakan localStorage
            }
        });
    }, false);
</script>