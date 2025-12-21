<?php

namespace Database\Seeders;

use App\Models\Assignment;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Lesson;
use App\Models\StudentParent;
use App\Models\Submission;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CompleteElearningSeeder extends Seeder
{
    public function run()
    {
        // Create Guru
        $guru1 = User::create([
            'name' => 'Prof. Ahmad Hidayat',
            'email' => 'guru1@elearning.com',
            'password' => Hash::make('password'),
            'role' => 'guru',
        ]);

        $guru2 = User::create([
            'name' => 'Dr. Siti Nurjanah',
            'email' => 'guru2@elearning.com',
            'password' => Hash::make('password'),
            'role' => 'guru',
        ]);

        // Create Siswa
        $siswa1 = User::create([
            'name' => 'Budi Santoso',
            'email' => 'siswa1@elearning.com',
            'password' => Hash::make('password'),
            'role' => 'siswa',
        ]);

        $siswa2 = User::create([
            'name' => 'Ani Wijaya',
            'email' => 'siswa2@elearning.com',
            'password' => Hash::make('password'),
            'role' => 'siswa',
        ]);

        $siswa3 = User::create([
            'name' => 'Citra Dewi',
            'email' => 'siswa3@elearning.com',
            'password' => Hash::make('password'),
            'role' => 'siswa',
        ]);

        // Create Orangtua
        $orangtua1 = User::create([
            'name' => 'Pak Santoso',
            'email' => 'orangtua1@elearning.com',
            'password' => Hash::make('password'),
            'role' => 'orangtua',
        ]);

        $orangtua2 = User::create([
            'name' => 'Ibu Wijaya',
            'email' => 'orangtua2@elearning.com',
            'password' => Hash::make('password'),
            'role' => 'orangtua',
        ]);

        // Link orangtua dengan siswa
        StudentParent::create([
            'student_id' => $siswa1->id,
            'parent_id' => $orangtua1->id,
        ]);

        StudentParent::create([
            'student_id' => $siswa2->id,
            'parent_id' => $orangtua2->id,
        ]);

        // Create Courses
        $course1 = Course::create([
            'title' => 'Matematika Dasar',
            'slug' => 'matematika-dasar',
            'description' => 'Pelajari konsep dasar matematika mulai dari operasi hitung, aljabar, hingga geometri.',
            'teacher_id' => $guru1->id,
            'level' => 'beginner',
            'duration_hours' => 20,
            'status' => 'published',
        ]);

        $course2 = Course::create([
            'title' => 'Bahasa Indonesia',
            'slug' => 'bahasa-indonesia',
            'description' => 'Meningkatkan kemampuan berbahasa Indonesia yang baik dan benar, menulis, dan membaca.',
            'teacher_id' => $guru2->id,
            'level' => 'beginner',
            'duration_hours' => 15,
            'status' => 'published',
        ]);

        $course3 = Course::create([
            'title' => 'Sains untuk Pemula',
            'slug' => 'sains-untuk-pemula',
            'description' => 'Eksplorasi dunia sains melalui percobaan sederhana dan penjelasan konsep dasar.',
            'teacher_id' => $guru1->id,
            'level' => 'beginner',
            'duration_hours' => 18,
            'status' => 'published',
        ]);

        // Create Lessons for Course 1 (Matematika Dasar)
        $lessons1 = [
            [
                'title' => 'Pengenalan Matematika',
                'content' => '<h2>Selamat Datang di Matematika Dasar</h2><p>Matematika adalah ilmu tentang bilangan, struktur, ruang, dan perubahan. Dalam pelajaran ini, kita akan mempelajari konsep dasar matematika yang akan menjadi fondasi untuk pembelajaran lebih lanjut.</p><h3>Yang Akan Dipelajari:</h3><ul><li>Operasi hitung dasar</li><li>Bilangan bulat dan pecahan</li><li>Aljabar sederhana</li><li>Geometri dasar</li></ul>',
                'video_url' => 'https://www.youtube.com/watch?v=example1',
                'duration_minutes' => 30,
                'order' => 1,
            ],
            [
                'title' => 'Operasi Hitung Penjumlahan dan Pengurangan',
                'content' => '<h2>Penjumlahan dan Pengurangan</h2><p>Penjumlahan adalah operasi menambahkan dua bilangan atau lebih. Pengurangan adalah operasi mengurangi satu bilangan dari bilangan lain.</p><h3>Contoh Penjumlahan:</h3><p>5 + 3 = 8</p><p>12 + 7 = 19</p><h3>Contoh Pengurangan:</h3><p>10 - 4 = 6</p><p>20 - 8 = 12</p><h3>Latihan:</h3><p>Cobalah selesaikan: 15 + 23 = ?</p>',
                'video_url' => 'https://www.youtube.com/watch?v=example2',
                'duration_minutes' => 45,
                'order' => 2,
            ],
            [
                'title' => 'Perkalian dan Pembagian',
                'content' => '<h2>Perkalian dan Pembagian</h2><p>Perkalian adalah penjumlahan berulang. Pembagian adalah operasi kebalikan dari perkalian.</p><h3>Tabel Perkalian:</h3><p>2 × 3 = 6 (sama dengan 2 + 2 + 2)</p><p>4 × 5 = 20</p><h3>Pembagian:</h3><p>12 ÷ 3 = 4</p><p>20 ÷ 5 = 4</p>',
                'video_url' => null,
                'duration_minutes' => 40,
                'order' => 3,
            ],
            [
                'title' => 'Pengenalan Aljabar',
                'content' => '<h2>Aljabar Dasar</h2><p>Aljabar menggunakan huruf untuk mewakili angka. Ini membantu kita menyelesaikan masalah yang lebih kompleks.</p><h3>Variabel:</h3><p>x, y, z adalah contoh variabel</p><h3>Persamaan Sederhana:</h3><p>x + 5 = 10</p><p>Maka x = 5</p>',
                'video_url' => 'https://www.youtube.com/watch?v=example3',
                'duration_minutes' => 50,
                'order' => 4,
            ],
        ];

        foreach ($lessons1 as $lessonData) {
            $course1->lessons()->create($lessonData);
        }

        // Create Lessons for Course 2 (Bahasa Indonesia)
        $lessons2 = [
            [
                'title' => 'Pengenalan Bahasa Indonesia',
                'content' => '<h2>Bahasa Indonesia yang Baik dan Benar</h2><p>Bahasa Indonesia adalah bahasa resmi dan bahasa persatuan Republik Indonesia. Dalam kursus ini, kita akan belajar menggunakan bahasa Indonesia dengan baik dan benar.</p>',
                'video_url' => 'https://www.youtube.com/watch?v=example4',
                'duration_minutes' => 35,
                'order' => 1,
            ],
            [
                'title' => 'Struktur Kalimat',
                'content' => '<h2>Membuat Kalimat yang Efektif</h2><p>Kalimat yang baik memiliki subjek, predikat, dan objek. Contoh: Saya (subjek) membaca (predikat) buku (objek).</p>',
                'video_url' => null,
                'duration_minutes' => 40,
                'order' => 2,
            ],
            [
                'title' => 'Menulis Paragraf',
                'content' => '<h2>Menulis Paragraf yang Baik</h2><p>Paragraf adalah kumpulan kalimat yang membahas satu ide pokok. Setiap paragraf harus memiliki kalimat utama dan kalimat penjelas.</p>',
                'video_url' => 'https://www.youtube.com/watch?v=example5',
                'duration_minutes' => 45,
                'order' => 3,
            ],
        ];

        foreach ($lessons2 as $lessonData) {
            $course2->lessons()->create($lessonData);
        }

        // Create Lessons for Course 3 (Sains)
        $lessons3 = [
            [
                'title' => 'Pengenalan Sains',
                'content' => '<h2>Apa itu Sains?</h2><p>Sains adalah ilmu yang mempelajari alam dan fenomena di sekitar kita melalui observasi dan eksperimen.</p>',
                'video_url' => 'https://www.youtube.com/watch?v=example6',
                'duration_minutes' => 30,
                'order' => 1,
            ],
            [
                'title' => 'Metode Ilmiah',
                'content' => '<h2>Langkah-langkah Metode Ilmiah</h2><ol><li>Observasi</li><li>Pertanyaan</li><li>Hipotesis</li><li>Eksperimen</li><li>Kesimpulan</li></ol>',
                'video_url' => null,
                'duration_minutes' => 40,
                'order' => 2,
            ],
        ];

        foreach ($lessons3 as $lessonData) {
            $course3->lessons()->create($lessonData);
        }

        // Create Assignments
        $assignment1 = Assignment::create([
            'course_id' => $course1->id,
            'title' => 'Latihan Operasi Hitung',
            'description' => 'Selesaikan 10 soal operasi hitung dasar yang telah disediakan. Tunjukkan cara pengerjaan anda.',
            'due_date' => now()->addDays(7),
            'max_score' => 100,
        ]);

        $assignment2 = Assignment::create([
            'course_id' => $course1->id,
            'title' => 'Quiz Aljabar',
            'description' => 'Kerjakan soal-soal aljabar dan jelaskan langkah penyelesaiannya.',
            'due_date' => now()->addDays(14),
            'max_score' => 100,
        ]);

        $assignment3 = Assignment::create([
            'course_id' => $course2->id,
            'title' => 'Menulis Paragraf Deskriptif',
            'description' => 'Buatlah paragraf deskriptif tentang tempat favorit Anda dengan minimal 5 kalimat.',
            'due_date' => now()->addDays(7),
            'max_score' => 100,
        ]);

        $assignment4 = Assignment::create([
            'course_id' => $course3->id,
            'title' => 'Laporan Percobaan Sederhana',
            'description' => 'Lakukan percobaan sederhana di rumah dan buat laporannya menggunakan metode ilmiah.',
            'due_date' => now()->addDays(10),
            'max_score' => 100,
        ]);

        // Enroll students to courses
        $enrollments = [
            ['course_id' => $course1->id, 'student_id' => $siswa1->id, 'progress' => 50, 'completed_lessons' => 2],
            ['course_id' => $course2->id, 'student_id' => $siswa1->id, 'progress' => 33, 'completed_lessons' => 1],
            ['course_id' => $course1->id, 'student_id' => $siswa2->id, 'progress' => 75, 'completed_lessons' => 3],
            ['course_id' => $course3->id, 'student_id' => $siswa2->id, 'progress' => 50, 'completed_lessons' => 1],
            ['course_id' => $course2->id, 'student_id' => $siswa3->id, 'progress' => 0, 'completed_lessons' => 0],
        ];

        foreach ($enrollments as $enrollment) {
            Enrollment::create(array_merge($enrollment, [
                'enrolled_at' => now(),
                'status' => 'active',
            ]));
        }

        // Create some submissions
        $submissions = [
            [
                'assignment_id' => $assignment1->id,
                'student_id' => $siswa1->id,
                'content' => 'Berikut adalah jawaban saya untuk latihan operasi hitung:\n1. 5 + 3 = 8\n2. 10 - 4 = 6\n3. 7 × 8 = 56\n...',
                'status' => 'graded',
                'score' => 85,
                'feedback' => 'Pekerjaan bagus! Perhitungan sudah benar. Perhatikan cara penulisan yang lebih rapi.',
                'graded_at' => now(),
            ],
            [
                'assignment_id' => $assignment3->id,
                'student_id' => $siswa1->id,
                'content' => 'Tempat favorit saya adalah taman kota. Taman ini memiliki banyak pohon rindang. Udara di sana sangat sejuk dan segar. Banyak orang berolahraga di pagi hari. Saya suka duduk di bangku taman sambil membaca buku.',
                'status' => 'graded',
                'score' => 90,
                'feedback' => 'Paragraf deskriptif yang baik! Kalimatnya jelas dan mudah dipahami.',
                'graded_at' => now(),
            ],
            [
                'assignment_id' => $assignment1->id,
                'student_id' => $siswa2->id,
                'content' => 'Jawaban tugas operasi hitung saya...',
                'status' => 'submitted',
                'score' => null,
                'feedback' => null,
                'graded_at' => null,
            ],
        ];

        foreach ($submissions as $submission) {
            Submission::create($submission);
        }

        $this->command->info('✅ Complete E-Learning data seeded successfully!');
        $this->command->info('');
        $this->command->info('Login Credentials:');
        $this->command->info('Guru: guru1@elearning.com / password');
        $this->command->info('Guru: guru2@elearning.com / password');
        $this->command->info('Siswa: siswa1@elearning.com / password');
        $this->command->info('Siswa: siswa2@elearning.com / password');
        $this->command->info('Orangtua: orangtua1@elearning.com / password');
        $this->command->info('Orangtua: orangtua2@elearning.com / password');
    }
}
