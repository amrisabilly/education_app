<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Enrollment;
use App\Models\Assignment;
use App\Models\StudentParent;
use Illuminate\Support\Facades\Hash;

class DemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Admin
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@elearning.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'phone' => '081234567890',
        ]);

        // Create Guru
        $guru1 = User::create([
            'name' => 'Budi Santoso',
            'email' => 'guru@elearning.com',
            'password' => Hash::make('password'),
            'role' => 'guru',
            'phone' => '081234567891',
        ]);

        $guru2 = User::create([
            'name' => 'Siti Nurhaliza',
            'email' => 'guru2@elearning.com',
            'password' => Hash::make('password'),
            'role' => 'guru',
            'phone' => '081234567892',
        ]);

        // Create Siswa
        $siswa1 = User::create([
            'name' => 'Andi Wijaya',
            'email' => 'siswa@elearning.com',
            'password' => Hash::make('password'),
            'role' => 'siswa',
            'phone' => '081234567893',
        ]);

        $siswa2 = User::create([
            'name' => 'Dewi Lestari',
            'email' => 'siswa2@elearning.com',
            'password' => Hash::make('password'),
            'role' => 'siswa',
            'phone' => '081234567894',
        ]);

        // Create Orangtua
        $orangtua = User::create([
            'name' => 'Ibu Andi',
            'email' => 'orangtua@elearning.com',
            'password' => Hash::make('password'),
            'role' => 'orangtua',
            'phone' => '081234567895',
        ]);

        // Link parent to student
        StudentParent::create([
            'parent_id' => $orangtua->id,
            'student_id' => $siswa1->id,
        ]);

        // Create Courses
        $course1 = Course::create([
            'teacher_id' => $guru1->id,
            'title' => 'Pemrograman Web dengan Laravel',
            'slug' => 'pemrograman-web-dengan-laravel',
            'description' => 'Belajar membuat aplikasi web modern menggunakan framework Laravel dari dasar hingga mahir.',
            'level' => 'intermediate',
            'status' => 'published',
            'duration_hours' => 40,
        ]);

        $course2 = Course::create([
            'teacher_id' => $guru1->id,
            'title' => 'Dasar-Dasar JavaScript',
            'slug' => 'dasar-dasar-javascript',
            'description' => 'Pelajari konsep dasar JavaScript untuk pengembangan web interaktif.',
            'level' => 'beginner',
            'status' => 'published',
            'duration_hours' => 20,
        ]);

        $course3 = Course::create([
            'teacher_id' => $guru2->id,
            'title' => 'Machine Learning untuk Pemula',
            'slug' => 'machine-learning-untuk-pemula',
            'description' => 'Memahami konsep machine learning dan implementasinya dengan Python.',
            'level' => 'advanced',
            'status' => 'published',
            'duration_hours' => 50,
        ]);

        // Create Lessons for Course 1
        Lesson::create([
            'course_id' => $course1->id,
            'title' => 'Pengenalan Laravel',
            'content' => 'Laravel adalah framework PHP yang powerful dan elegant untuk pengembangan web.',
            'order' => 1,
            'duration_minutes' => 30,
        ]);

        Lesson::create([
            'course_id' => $course1->id,
            'title' => 'Routing dan Controller',
            'content' => 'Pelajari cara membuat routing dan controller di Laravel.',
            'order' => 2,
            'duration_minutes' => 45,
        ]);

        // Create Lessons for Course 2
        Lesson::create([
            'course_id' => $course2->id,
            'title' => 'Variabel dan Tipe Data',
            'content' => 'Memahami cara mendeklarasikan variabel dan berbagai tipe data di JavaScript.',
            'order' => 1,
            'duration_minutes' => 40,
        ]);

        // Create Enrollments
        Enrollment::create([
            'student_id' => $siswa1->id,
            'course_id' => $course1->id,
            'status' => 'active',
            'progress' => 25,
        ]);

        Enrollment::create([
            'student_id' => $siswa1->id,
            'course_id' => $course2->id,
            'status' => 'active',
            'progress' => 50,
        ]);

        Enrollment::create([
            'student_id' => $siswa2->id,
            'course_id' => $course1->id,
            'status' => 'active',
            'progress' => 10,
        ]);

        // Create Assignments
        Assignment::create([
            'course_id' => $course1->id,
            'title' => 'Tugas 1: Buat CRUD Sederhana',
            'description' => 'Buatlah aplikasi CRUD sederhana menggunakan Laravel',
            'due_date' => now()->addDays(7),
            'max_score' => 100,
        ]);

        Assignment::create([
            'course_id' => $course2->id,
            'title' => 'Tugas 1: Calculator JavaScript',
            'description' => 'Buat calculator sederhana menggunakan JavaScript',
            'due_date' => now()->addDays(5),
            'max_score' => 100,
        ]);

        $this->command->info('Demo data created successfully!');
        $this->command->info('---');
        $this->command->info('Login Credentials:');
        $this->command->info('Admin: admin@elearning.com / password');
        $this->command->info('Guru: guru@elearning.com / password');
        $this->command->info('Siswa: siswa@elearning.com / password');
        $this->command->info('Orangtua: orangtua@elearning.com / password');
    }
}
