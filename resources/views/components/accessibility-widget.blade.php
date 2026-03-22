<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LMS Inklusi - Portal Dosen - Elgar Ahmadal</title>
    <style>
        /* CSS Kustom untuk Situs Web Dasbor Dosen (image_10.png) */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            display: flex;
            background-color: #f0f2f5;
            color: #172b4d;
        }

        /* Bilah Sisi Kiri */
        .sidebar {
            width: 250px;
            background-color: #e9ecef;
            color: #0052cc;
            padding: 20px;
            box-sizing: border-box;
            height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .sidebar-header {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 30px;
        }

        .sidebar-logo {
            width: 40px;
            height: 40px;
            background-color: #f0f2f5;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 20px;
        }

        .sidebar-title-group {
            display: flex;
            flex-direction: column;
        }

        .sidebar-title {
            font-weight: bold;
            font-size: 16px;
        }

        .sidebar-subtitle {
            font-size: 12px;
            color: #172b4d;
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px;
            cursor: pointer;
            border-radius: 5px;
            font-size: 14px;
        }

        .nav-item:hover {
            background-color: #dfe1e6;
        }

        .nav-item.active {
            background-color: #d2e3fc;
            font-weight: bold;
        }

        .nav-icon {
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .nav-item.keluar {
            margin-top: auto;
            color: #de350b;
        }

        /* Konten Utama */
        .main-content {
            flex: 1;
            padding: 20px 40px;
            box-sizing: border-box;
            display: flex;
            gap: 40px;
        }

        .dashboard-main {
            flex: 1;
        }

        /* Tajuk Atas */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 40px;
        }

        .user-greeting {
            font-size: 24px;
            font-weight: bold;
        }

        .user-date {
            font-size: 12px;
            color: #a0a0a0;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .user-name-group {
            display: flex;
            flex-direction: column;
            text-align: right;
        }

        .user-name {
            font-weight: bold;
            font-size: 14px;
        }

        .user-nidn {
            font-size: 12px;
            color: #172b4d;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            background-color: #0052cc;
            color: #ffffff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 18px;
        }

        /* Kartu Summary */
        .summary-cards {
            display: flex;
            gap: 20px;
            margin-bottom: 40px;
        }

        .summary-card {
            flex: 1;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
            display: flex;
            gap: 15px;
            align-items: center;
        }

        .summary-icon {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
        }

        .summary-card.kelas .summary-icon { background-color: #e3f2fd; }
        .summary-card.mahasiswa .summary-icon { background-color: #fff3e0; }
        .summary-card.tugas .summary-icon { background-color: #e8f5e9; }

        .summary-info {
            display: flex;
            flex-direction: column;
        }

        .summary-label {
            font-size: 12px;
            color: #a0a0a0;
        }

        .summary-value {
            font-size: 20px;
            font-weight: bold;
        }

        /* Kartu Mata Kuliah */
        .section-title-group {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .section-title {
            font-size: 18px;
            font-weight: bold;
            color: #172b4d;
        }

        .see-all {
            font-size: 14px;
            color: #0052cc;
            cursor: pointer;
        }

        .courses-list {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .course-card {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .course-icon {
            width: 50px;
            height: 50px;
            background-color: #e3f2fd;
            color: #0052cc;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 18px;
        }

        .course-card.pe .course-icon { background-color: #f3e5f5; color: #7b1fa2; }

        .course-info {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .course-name {
            font-weight: bold;
            font-size: 16px;
        }

        .course-details {
            display: flex;
            gap: 10px;
            font-size: 12px;
            color: #172b4d;
        }

        .course-sks {
            color: #0052cc;
        }

        .course-time {
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 12px;
            color: #a0a0a0;
        }

        .course-sks-text {
            border: 1px solid #c2dbff;
            background-color: #e9f2ff;
            color: #0052cc;
            padding: 2px 6px;
            border-radius: 5px;
            font-weight: bold;
        }

        .course-action {
            cursor: pointer;
        }

        /* Bilah Sisi Kanan */
        .sidebar-right {
            width: 350px;
            display: flex;
            flex-direction: column;
            gap: 40px;
        }

        .schedule-card, .grading-card {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 30px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            gap: 15px;
        }

        .grading-card {
            background-color: #fff9e6;
        }

        .schedule-card.no-schedule {
            color: #a0a0a0;
            background-color: #ffffff;
            box-shadow: none;
            border: 1px solid #dfe1e6;
        }

        .schedule-section-title {
            font-weight: bold;
            font-size: 18px;
            color: #172b4d;
            margin-bottom: -10px;
        }

        .schedule-title {
            font-weight: bold;
            font-size: 16px;
            color: #172b4d;
        }

        .schedule-time {
            font-size: 12px;
            color: #a0a0a0;
        }

        .section-icon {
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background-color: #f0f2f5;
        }

        .grading-icon {
            color: #ffab00;
        }

        .section-message-group {
            display: flex;
            flex-direction: column;
        }

        .section-message {
            font-size: 14px;
        }

        .section-message-detail {
            font-size: 12px;
            color: #a0a0a0;
        }

        .grading-title {
            font-weight: bold;
            font-size: 16px;
            color: #de350b;
        }

        .grading-message {
            font-size: 12px;
            color: #de350b;
        }

        /* Widget Aksesibilitas */
        #accessibility-widget {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 60px;
            height: 60px;
            cursor: move;
            z-index: 10000;
        }

        #accessibility-logo {
            width: 60px;
            height: 60px;
            cursor: pointer;
        }

        #accessibility-panel {
            display: none;
            position: fixed;
            bottom: 90px;
            right: 20px;
            width: 360px;
            background-color: #ffffff;
            border-radius: 20px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            z-index: 10001;
            overflow: hidden;
        }

        /* Tajuk Menu Aksesibilitas (image_11.png) */
        .accessibility-panel-header {
            background-color: #0052cc;
            color: #ffffff;
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .accessibility-panel-title {
            font-weight: bold;
            font-size: 16px;
        }

        .close-panel {
            cursor: pointer;
        }

        /* Panel Konten (image_11.png & image_12.png) */
        .accessibility-panel-content {
            padding: 20px;
            box-sizing: border-box;
            background-color: #f0f2f5;
        }

        .profile-dropdown {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 10px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
        }

        .accessibility-logo-small {
            width: 30px;
            height: 30px;
        }

        .profile-label {
            font-weight: bold;
            font-size: 14px;
        }

        .card-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
            margin-bottom: 20px;
        }

        .card-grid-3 {
            grid-template-columns: 1fr 1fr 1fr;
        }

        .accessibility-card {
            background-color: #ffffff;
            border-radius: 15px;
            padding: 15px;
            text-align: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
            cursor: pointer;
        }

        .accessibility-card:hover {
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .accessibility-icon-card {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .accessibility-label-card {
            font-size: 12px;
            font-weight: bold;
        }

        .accessibility-icon-small {
            width: 25px;
            height: 25px;
        }

        .accessibility-card-title {
            font-weight: bold;
            font-size: 12px;
            margin-bottom: -5px;
        }

        /* Indikator Status (image_14.png) */
        .card-status {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            border: 2px solid #a0a0a0;
            margin-top: -5px;
        }

        .card-status.active {
            border-color: #0052cc;
            background-color: #0052cc;
        }

        .accessibility-card.active {
            background-color: #0052cc;
            color: #ffffff;
        }

        /* Tombol Atur Ulang (image_13.png) */
        .reset-button {
            display: block;
            width: 100%;
            padding: 15px;
            background-color: #0052cc;
            color: #ffffff;
            border: none;
            border-radius: 100px;
            font-weight: bold;
            font-size: 14px;
            cursor: pointer;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .reset-button:hover {
            background-color: #0043a6;
        }

        /* Kelas Aksesibilitas kustom untuk gaya website (image_10.png) */
        body.grayscale { filter: grayscale(100%); }
        body.contrast-mode { filter: contrast(150%); }
        body.inverted-colors { filter: invert(100%); }
        body.dark-mode {
            background-color: #1a1a1a;
            color: #f0f2f5;
        }
        body.dark-mode .sidebar, body.dark-mode .header, body.dark-mode .summary-card,
        body.dark-mode .course-card, body.dark-mode .schedule-card, body.dark-mode .grading-card {
            background-color: #2c2c2c;
            color: #f0f2f5;
        }
        body.dark-mode .section-title, body.dark-mode .sidebar-subtitle, body.dark-mode .summary-value { color: #f0f2f5; }
        body.dark-mode .see-all { color: #8ab4f8; }
        body.dark-mode .course-icon { background-color: #444444; color: #8ab4f8; }
        body.dark-mode .nav-item { color: #8ab4f8; }
        body.dark-mode .nav-item.active { background-color: #555555; color: #ffffff; }

        body.large-text * { font-size: 1.15em; }
        body.spaced-text * { letter-spacing: 0.1em; line-height: 1.6; }
        body.highlight-links a { background-color: yellow; color: black; font-weight: bold; text-decoration: underline; }
        body.large-cursor { cursor: url('large_cursor.png'), auto; }
        body.legible-font * { font-family: 'Open Dyslexic', Arial, sans-serif; }

    </style>
</head>
<body id="dashboard-body">
    <div class="sidebar">
        <div class="sidebar-header">
            <div class="sidebar-logo">UL</div>
            <div class="sidebar-title-group">
                <div class="sidebar-title">LMS Inklusi</div>
                <div class="sidebar-subtitle">PORTAL DOSEN</div>
            </div>
        </div>
        <div class="nav-item active"><div class="nav-icon"><img src="icon_home_blue.png" alt="Beranda"></div>Beranda</div>
        <div class="nav-item"><div class="nav-icon"><img src="icon_book.png" alt="Mata Kuliah"></div>Mata Kuliah</div>
        <div class="nav-item"><div class="nav-icon"><img src="icon_schedule.png" alt="Jadwal Mengajar"></div>Jadwal Mengajar</div>
        <div class="nav-item"><div class="nav-icon"><img src="icon_input.png" alt="Input Nilai"></div>Input Nilai</div>
        <div class="nav-item"><div class="nav-icon"><img src="icon_test.png" alt="Kelola Ujian"></div>Kelola Ujian</div>
        <div class="nav-item"><div class="nav-icon"><img src="icon_message.png" alt="Pesan"></div>Pesan</div>
        <div class="nav-item"><div class="nav-icon"><img src="icon_bell.png" alt="Pemberitahuan"></div>Pemberitahuan</div>
        <div class="nav-item"><div class="nav-icon"><img src="icon_user.png" alt="Profil Saya"></div>Profil Saya</div>
        <div class="nav-item keluar"><div class="nav-icon"><img src="icon_logout.png" alt="Keluar"></div>Keluar</div>
    </div>
    <div class="main-content">
        <div class="dashboard-main">
            <div class="header">
                <div>
                    <div class="user-greeting">Halo, Pak Elgar</div>
                    <div class="user-date">MINGGU, 22 MARET 2026</div>
                </div>
                <div class="user-info">
                    <div class="user-name-group">
                        <div class="user-name">Elgar Ahmadal</div>
                        <div class="user-nidn">NIDN: 12345678</div>
                    </div>
                    <div class="user-avatar">EA</div>
                </div>
            </div>
            <div class="summary-cards">
                <div class="summary-card kelas">
                    <div class="summary-icon"><img src="icon_book_summary.png" alt="Kelas Diampu"></div>
                    <div class="summary-info">
                        <div class="summary-label">KELAS DIAMPU</div>
                        <div class="summary-value">2 <span style="font-size:12px; font-weight:normal;">Kelas</span></div>
                    </div>
                </div>
                <div class="summary-card mahasiswa">
                    <div class="summary-icon"><img src="icon_user_group.png" alt="Total Mahasiswa"></div>
                    <div class="summary-info">
                        <div class="summary-label">TOTAL MAHASISWA</div>
                        <div class="summary-value">1 <span style="font-size:12px; font-weight:normal;">Orang</span></div>
                    </div>
                </div>
                <div class="summary-card tugas">
                    <div class="summary-icon"><img src="icon_doc.png" alt="Perlu Dinilai"></div>
                    <div class="summary-info">
                        <div class="summary-label">PERLU DINILAI</div>
                        <div class="summary-value">0 <span style="font-size:12px; font-weight:normal;">Tugas</span></div>
                    </div>
                </div>
            </div>
            <div class="section-title-group">
                <div class="section-title">MATA KULIAH DIAMPU</div>
                <div class="see-all">Lihat Semua</div>
            </div>
            <div class="courses-list">
                <div class="course-card al">
                    <div class="course-icon">AL</div>
                    <div class="course-info">
                        <div class="course-name">Algoritma</div>
                        <div class="course-details"><span>KELAS N5D1UG</span> <span class="course-sks-text">3 SKS</span></div>
                    </div>
                    <div class="course-time">Selasa, 13:30:00</div>
                    <div class="course-action"><img src="icon_arrow.png" alt="Pilih Mata Kuliah"></div>
                </div>
                <div class="course-card pe">
                    <div class="course-icon">PE</div>
                    <div class="course-info">
                        <div class="course-name">Pengukuran untuk SD</div>
                        <div class="course-details"><span>KELAS MH4CKX</span> <span class="course-sks-text">3 SKS</span></div>
                    </div>
                    <div class="course-time">Senin, 08:40:00</div>
                    <div class="course-action"><img src="icon_arrow.png" alt="Pilih Mata Kuliah"></div>
                </div>
            </div>
        </div>
        <div class="sidebar-right">
            <div class="schedule-section-title">MENGAJAR HARI INI</div>
            <div class="schedule-card no-schedule">
                <div class="section-icon"><img src="icon_clock_black.png" alt="Jam"></div>
                <div class="section-message-group">
                    <div class="section-message">Tidak ada jadwal hari ini.</div>
                    <div class="section-message-detail">Istirahatlah sejenak, Pak!</div>
                </div>
            </div>
            <div class="grading-card">
                <div class="section-icon grading-icon"><img src="icon_alert.png" alt="Peringatan"></div>
                <div class="grading-title">Batas Waktu Penilaian</div>
                <div class="grading-message">Segera input nilai mahasiswa sebelum periode akademik berakhir minggu depan.</div>
            </div>
        </div>
    </div>

    <div id="accessibility-widget">
        <img id="accessibility-logo" src="image_17.png" alt="Widget Aksesibilitas">
    </div>

    <div id="accessibility-panel">
        <div class="accessibility-panel-header">
            <div class="accessibility-panel-title">Menu Aksesibilitas (CTRL+U)</div>
            <div class="close-panel" id="close-panel">X</div>
        </div>
        <div class="accessibility-panel-content">
            <div class="profile-dropdown">
                <img src="image_17.png" class="accessibility-logo-small" alt="Widget Aksesibilitas">
                <div class="profile-label">Buta Warna Profil Aktif</div>
                <div style="margin-left:auto;">▼</div>
            </div>
            <div class="card-grid">
                <div class="accessibility-card active" data-profile="motoric"><img src="accessibility_motoric.png" class="accessibility-icon-card"><span>Gangguan Motorik</span></div>
                <div class="accessibility-card" data-profile="blindness"><img src="accessibility_blindness.png" class="accessibility-icon-card"><span>Netra Total</span></div>
                <div class="accessibility-card" data-profile="colorblind"><img src="accessibility_colorblind.png" class="accessibility-icon-card"><span>Buta Warna</span></div>
                <div class="accessibility-card" data-profile="dyslexia"><img src="accessibility_dyslexia.png" class="accessibility-icon-card"><span>Disleksia</span></div>
                <div class="accessibility-card" data-profile="visual"><img src="accessibility_visual.png" class="accessibility-icon-card"><span>Gangguan Penglihatan</span></div>
                <div class="accessibility-card" data-profile="cognitive"><img src="accessibility_cognitive.png" class="accessibility-icon-card"><span>Kognitif & Pembelajaran</span></div>
                <div class="accessibility-card" data-profile="epilepsy"><img src="accessibility_epilepsy.png" class="accessibility-icon-card"><span>Kejang dan Epilepsi</span></div>
                <div class="accessibility-card" data-profile="adhd"><img src="accessibility_adhd.png" class="accessibility-icon-card"><span>ADHD</span></div>
            </div>
            <hr style="border-color:#dfe1e6; margin:0; margin-bottom:20px;">
            <div class="card-grid card-grid-3">
                <div class="accessibility-card active" data-action="voice" style="padding:15px;"><img src="voice_mode.png" class="accessibility-icon-small"><span>Moda Suara</span></div>
                <div class="accessibility-card active" data-action="large-text" style="padding:15px;"><img src="large_text.png" class="accessibility-icon-small"><span>Perbesar Teks</span></div>
                <div class="accessibility-card active" data-action="small-text" style="padding:15px;"><img src="small_text.png" class="accessibility-icon-small"><span>Perkecil Teks</span></div>
            </div>
            <div class="card-grid card-grid-3">
                <div class="accessibility-card active" data-action="grayscale" style="padding:15px;"><img src="color_desaturate.png" class="accessibility-icon-small"><span>Desaturasi</span></div>
                <div class="accessibility-card active" data-action="dark-mode" style="padding:15px;"><img src="dark_mode.png" class="accessibility-icon-small"><span>Latar Gelap</span></div>
                <div class="accessibility-card active" data-action="hide-images" style="padding:15px;"><img src="hide_images.png" class="accessibility-icon-small"><span>Sembunyikan Gambar</span></div>
            </div>
            <div class="card-grid card-grid-3">
                <div class="accessibility-card active" data-action="align-left" style="padding:15px;"><img src="align_left.png" class="accessibility-icon-small"><span>Rata Kiri</span></div>
                <div class="accessibility-card active" data-action="dyslexia-friendly" style="padding:15px;"><img src="dyslexia_friendly.png" class="accessibility-icon-small"><span>Ramah Disleksia</span></div>
                <div class="accessibility-card active" data-action="line-height" style="padding:15px;"><img src="line_height.png" class="accessibility-icon-small"><span>Tinggi Garis (1.75X)</span></div>
            </div>
            <div class="card-grid card-grid-3">
                <div class="accessibility-card active" data-action="pause-animations" style="padding:15px;"><img src="pause_animations.png" class="accessibility-icon-small"><span>Animasi Dijeda</span></div>
                <div class="accessibility-card active" data-action="large-cursor" style="padding:15px;"><img src="large_cursor_icon.png" class="accessibility-icon-small"><span>Kursor</span></div>
                <div class="accessibility-card active" data-action="text-spacing" style="padding:15px;"><img src="text_spacing.png" class="accessibility-icon-small"><span>Spasi Ringan</span></div>
            </div>
            <div class="card-grid card-grid-3">
                <div class="accessibility-card active" data-action="underline-links" style="padding:15px;"><img src="underline_links.png" class="accessibility-icon-small"><span>Garis Bawahi Tautan</span></div>
                <div class="accessibility-card active" data-action="tooltips" style="padding:15px;"><img src="tooltips.png" class="accessibility-icon-small"><span>Keterangan Alat</span></div>
            </div>
            <button class="reset-button"><img src="icon_reset.png">Atur Ulang Semua Pengaturan Aksesibilitas</button>
        </div>
    </div>

    <script>
        // JavaScript untuk Interaktivitas Widget Aksesibilitas
        const widget = document.getElementById('accessibility-widget');
        const logo = document.getElementById('accessibility-logo');
        const panel = document.getElementById('accessibility-panel');
        const closePanel = document.getElementById('close-panel');
        const dashboardBody = document.getElementById('dashboard-body');

        // Fungsi Drag-and-Drop untuk Widget (image_10.png)
        let isDragging = false;
        let offsetX, offsetY;

        // Muat posisi terakhir dari localStorage
        const savedPosition = JSON.parse(localStorage.getItem('accessibility_widget_position'));
        if (savedPosition) {
            widget.style.left = savedPosition.left + 'px';
            widget.style.top = savedPosition.top + 'px';
            widget.style.right = 'auto'; // Pastikan gaya default tidak mengganggu
            widget.style.bottom = 'auto';
        }

        widget.addEventListener('mousedown', (e) => {
            isDragging = true;
            offsetX = e.clientX - widget.getBoundingClientRect().left;
            offsetY = e.clientY - widget.getBoundingClientRect().top;
            widget.style.cursor = 'grabbing';
            e.stopPropagation(); // Mencegah klik logo saat mousedown
        });

        document.addEventListener('mousemove', (e) => {
            if (isDragging) {
                const newLeft = e.clientX - offsetX;
                const newTop = e.clientY - offsetY;
                widget.style.left = newLeft + 'px';
                widget.style.top = newTop + 'px';
                widget.style.right = 'auto';
                widget.style.bottom = 'auto';
            }
        });

        document.addEventListener('mouseup', () => {
            if (isDragging) {
                isDragging = false;
                widget.style.cursor = 'move';
                // Simpan posisi ke localStorage
                localStorage.setItem('accessibility_widget_position', JSON.stringify({
                    left: widget.offsetLeft,
                    top: widget.offsetTop
                }));
            }
        });

        // Buka/Tutup Menu Aksesibilitas (CTRL+U atau klik logo)
        function togglePanel() {
            if (panel.style.display === 'block') {
                panel.style.display = 'none';
            } else {
                panel.style.display = 'block';
            }
        }

        logo.addEventListener('click', () => {
            // Hanya buka panel jika tidak sedang diseret
            if (!isDragging) {
                togglePanel();
            }
        });

        closePanel.addEventListener('click', togglePanel);

        document.addEventListener('keydown', (e) => {
            if (e.ctrlKey && e.key.toUpperCase() === 'U') {
                e.preventDefault(); // Mencegah tindakan default browser
                togglePanel();
            }
        });

        // Fitur Aksesibilitas - Penanganan Profil (image_11.png & image_15.png)
        const profileCards = document.querySelectorAll('.accessibility-card[data-profile]');
        profileCards.forEach(card => {
            card.addEventListener('click', () => {
                const profile = card.getAttribute('data-profile');
                // Hapus profil aktif lainnya
                profileCards.forEach(c => c.classList.remove('active'));
                card.classList.add('active');
                // Terapkan perubahan gaya berdasarkan profil
                terapkanProfil(profile);
            });
        });

        function terapkanProfil(profil) {
            dashboardBody.className = ''; // Hapus semua kelas aksesibilitas sebelumnya
            if (profil === 'motoric') dashboardBody.classList.add('accessibility-motoric');
            else if (profil === 'blindness') dashboardBody.classList.add('accessibility-blindness');
            // Tambahkan logika profil lainnya
            console.log(`Profil ${profil} diterapkan.`);
        }

        // Fitur Aksesibilitas - Penanganan Aksi Bertingkat (image_11.png, image_12.png, image_14.png, image_16.png)
        const actionCards = document.querySelectorAll('.accessibility-card[data-action]');
        actionCards.forEach(card => {
            card.addEventListener('click', () => {
                const action = card.getAttribute('data-action');
                terapkanAksi(action, card);
            });
        });

        function terapkanAksi(aksi, kartu) {
            // Aksi Hidup/Mati
            if (['hide-images', 'pause-animations', 'tooltips', 'underline-links'].includes(aksi)) {
                if (kartu.classList.contains('active')) {
                    kartu.classList.remove('active');
                    if (aksi === 'hide-images') dashboardBody.classList.remove('efek-sembunyi-gambar');
                    if (aksi === 'pause-animations') dashboardBody.classList.remove('efek-henti-animasi');
                    if (aksi === 'underline-links') dashboardBody.classList.remove('efek-garis-bawah');
                } else {
                    kartu.classList.add('active');
                    if (aksi === 'hide-images') dashboardBody.classList.add('efek-sembunyi-gambar');
                    if (aksi === 'pause-animations') dashboardBody.classList.add('efek-henti-animasi');
                    if (aksi === 'underline-links') dashboardBody.classList.add('efek-garis-bawah');
                }
            }
            // Aksi Bertingkat
            else if (aksi === 'large-text') {
                // Siklus melalui level teks: 0, 1, 2, 3
                let level = parseInt(kartu.getAttribute('data-level')) || 0;
                level = (level + 1) % 4;
                kartu.setAttribute('data-level', level);
                dashboardBody.classList.remove('efek-teks-besar');
                if (level > 0) dashboardBody.classList.add('efek-teks-besar');
                dashboardBody.style.fontSize = level === 0 ? '' : `${100 + level * 10}%`;
                console.log(`Perbesar Teks level ${level} diterapkan.`);
            }
            // Tambahkan logika aksi bertingkat lainnya
            console.log(`Aksi ${aksi} diterapkan.`);
        }

        // Atur Ulang Semua Pengaturan (image_13.png)
        const resetButton = document.querySelector('.reset-button');
        resetButton.addEventListener('click', () => {
            dashboardBody.className = ''; // Hapus semua kelas aksesibilitas
            dashboardBody.style.fontSize = ''; // Reset ukuran font
            // Reset status kartu
            profileCards.forEach(card => card.classList.remove('active'));
            profileCards[0].classList.add('active'); // Reset ke profil default
            actionCards.forEach(card => card.classList.remove('active'));
            console.log('Semua pengaturan aksesibilitas diatur ulang.');
        });

    </script>
</body>
</html>