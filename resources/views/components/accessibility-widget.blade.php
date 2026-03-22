<style>
    /* Memastikan elemen ikon dan menu dari library ini menembus overlay hitam portal Anda */
    .accessibility-icon, 
    .accessibility-menu, 
    ._accessibility-menu { 
        z-index: 9999999 !important; 
        font-family: 'Plus Jakarta Sans', sans-serif !important; 
    }
</style>

<script>
    function jalankanWidgetInklusi() {
        // Cek apakah library sudah berhasil ditarik dari server CDN
        if (typeof Accessibility !== 'undefined') {
            new Accessibility({
                icon: {
                    position: {
                        bottom: { size: 25, units: 'px' },
                        right: { size: 25, units: 'px' },
                        type: 'fixed'
                    },
                    zIndex: '9999999',
                    backgroundColor: '#0056b3', // Biru khas UMMI
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
                    // Fitur Pembaca Layar bawaan widget DIMATIKAN agar tidak 
                    // bertabrakan dengan sistem suara canggih di halaman Anda.
                    textToSpeech: false,
                    speechToText: false
                },
                session: {
                    persistent: true // INI YANG MEMBUATNYA TIDAK RISET SAAT PINDAH HALAMAN
                }
            });
            console.log("Widget Joogps Accessibility Berhasil Dimuat!");
        } else {
            console.error("Gagal memuat Widget. Cek koneksi internet atau firewall.");
        }
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/accessibility/dist/accessibility.min.js" onload="jalankanWidgetInklusi()"></script>