<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes - LMS Inklusi UMMI
|--------------------------------------------------------------------------
*/

// ========================================================================
// 1. AUTHENTICATION (Login & Public)
// ========================================================================

Route::get('/', function () {
    return view('login'); 
})->name('login');

Route::post('/login-process', function () {
    return redirect()->route('dashboard'); 
})->name('login.post');

Route::get('/logout', function () {
    return redirect()->route('login');
})->name('logout');


// ========================================================================
// 2. 🎓 AREA MAHASISWA (Student)
// ========================================================================

Route::get('/dashboard', function () { 
    return view('dashboard'); 
})->name('dashboard');

Route::get('/profil', function () { 
    return view('profile'); 
})->name('profile');

Route::get('/pemberitahuan', function () { 
    return view('notifications'); 
})->name('notifications');

Route::get('/pesan', function () { 
    return view('messages'); 
})->name('messages');

Route::get('/bantuan', function () { 
    return view('help'); 
})->name('help');

Route::get('/mata-kuliah', function () { 
    return view('courses'); 
})->name('courses');

// Contoh Route (sesuaikan dengan controller kamu)
Route::get('/gabung-kelas', function () {
    return view('join_course');
})->name('courses.join');


// --- Group: Detail Mata Kuliah Mahasiswa ---
Route::prefix('mata-kuliah/struktur-data')->group(function () {
    
    Route::get('/', function () { 
        return view('course_detail'); 
    })->name('course.detail');

    Route::get('/topik/array', function () { 
        return view('topic_detail'); 
    })->name('topic.detail');

    Route::get('/penugasan', function () { 
        return view('course_assignments'); 
    })->name('course.assignments');

    Route::get('/penugasan/detail', function () { 
        return view('assignment_detail'); 
    })->name('assignment.detail');

    Route::get('/presensi', function () { 
        return view('course_attendance'); 
    })->name('course.attendance');

    Route::get('/anggota', function () { 
        return view('course_members'); 
    })->name('course.members');
});


// --- Group: Ujian Online Mahasiswa ---
Route::prefix('ujian')->group(function () {
    Route::get('/', function () { 
        return view('exams'); 
    })->name('exams');

    Route::get('/gabung', function () { 
        return view('join_exam'); 
    })->name('join.exam');

    Route::get('/mulai', function () { 
        return view('exam_start'); 
    })->name('exam.start'); 
});


// ========================================================================
// 3. 👨‍🏫 AREA DOSEN (Lecturer)
// ========================================================================

Route::prefix('dosen')->group(function () {
    
    // --- A. Menu Utama Sidebar Dosen ---

    Route::get('/', function () {
        return view('dosen_dashboard'); 
    })->name('dosen.dashboard');

    Route::get('/mata-kuliah', function () {
        return view('dosen_courses'); 
    })->name('dosen.courses');

    Route::get('/jadwal', function () {
        return view('dosen_schedule'); 
    })->name('dosen.schedule');

    Route::get('/penilaian', function () {
        return view('dosen_grading'); 
    })->name('dosen.grading');

    Route::get('/ujian', function () {
        return view('dosen_exams'); 
    })->name('dosen.exams');

    Route::get('/pesan', function () {
        return view('dosen_messages'); 
    })->name('dosen.messages');

    Route::get('/profil', function () {
        return view('dosen_profile'); 
    })->name('dosen.profile');


    // --- B. Manajemen Kelas Spesifik (Tab View) ---
    // Semua route di bawah ini diawali dengan /dosen/kelas/struktur-data/
    Route::prefix('kelas/struktur-data')->group(function () {
        
        // 1. Kelola Materi & Modul (Home Kelas)
        Route::get('/kelola', function () {
            return view('dosen_manage_course'); 
        })->name('dosen.course.manage');

        // 2. Absensi Kelas
        Route::get('/absensi', function () {
            return view('dosen_course_attendance'); 
        })->name('dosen.course.attendance');

        // 2.b Input Absensi Manual
        Route::get('/absensi/input', function () {
            return view('dosen_attendance_input'); 
        })->name('dosen.attendance.input');

        // 2.c Riwayat Absensi (FIXED: Masuk dalam grup)
        Route::get('/absensi/riwayat', function () {
            return view('dosen_attendance_history'); 
        })->name('dosen.attendance.history');

        // 3. Penugasan Kelas
        Route::get('/penugasan', function () {
            return view('dosen_course_assignments'); 
        })->name('dosen.course.assignments');

        // 3.b Buat Tugas Baru (FIXED: Masuk dalam grup)
        Route::get('/penugasan/buat', function () {
            return view('dosen_create_assignment'); 
        })->name('dosen.assignment.create');

        // 4. Peserta Kelas
        Route::get('/peserta', function () {
            return view('dosen_course_students'); 
        })->name('dosen.course.students');

        // 5. Rekap Nilai Kelas (Index)
        Route::get('/rekap-nilai', function () {
            return view('dosen_course_grades'); 
        })->name('dosen.course.grades');

        // 5.a Edit Bobot Nilai (FIXED: Masuk dalam grup)
        Route::get('/rekap-nilai/bobot', function () {
            return view('dosen_course_grades_settings'); 
        })->name('dosen.grades.settings');

        // 5.b Edit Nilai Mahasiswa (FIXED: Masuk dalam grup)
        Route::get('/rekap-nilai/edit', function () {
            return view('dosen_course_grades_edit'); 
        })->name('dosen.grades.edit');
        
        // 5.b Edit Nilai Mahasiswa (FIXED: Masuk dalam grup)
       // Route untuk Halaman Kelola Detail Sesi (Materi & Diskusi)
Route::get('/dosen/session/{id}/manage', function ($id) {
    return view('dosen_manage_session_detail'); 
})->name('dosen.course.session.detail');

Route::get('/assignment/{id}/grade', function ($id) {
        return view('dosen_grade_assignment'); // Pastikan nama file blade-nya sesuai
    })->name('dosen.assignment.grade');
    });

});