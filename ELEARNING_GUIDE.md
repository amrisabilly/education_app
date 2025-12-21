# E-Learning Platform

Platform e-learning lengkap dengan sistem role-based untuk Siswa, Guru, dan Orangtua.

## Fitur Utama

### 👨‍🎓 Untuk Siswa

-   Dashboard interaktif dengan progress tracking
-   Jelajahi dan daftar ke kursus yang tersedia
-   Akses materi pembelajaran (lessons)
-   Kerjakan dan submit tugas
-   Lihat nilai dan feedback dari guru

### 👨‍🏫 Untuk Guru

-   Dashboard manajemen kursus
-   Buat dan kelola kursus (CRUD)
-   Tambah materi pembelajaran (lessons)
-   Buat dan kelola tugas (assignments)
-   Nilai dan beri feedback ke siswa
-   Lihat daftar siswa yang terdaftar

### 👪 Untuk Orangtua

-   Dashboard monitoring anak
-   Hubungkan dengan akun anak via email
-   Pantau progress belajar anak
-   Lihat kursus yang diikuti anak
-   Lihat nilai dan tugas anak

## Teknologi

-   **Backend**: Laravel 10.x
-   **Frontend**: Blade Templates + Tailwind CSS + Alpine.js
-   **Database**: MySQL
-   **Authentication**: Laravel Auth

## Instalasi

### Persyaratan

-   PHP >= 8.1
-   Composer
-   MySQL
-   Node.js & NPM

### Langkah Instalasi

1. **Clone atau gunakan project ini**

2. **Install Dependencies**

```bash
composer install
npm install
```

3. **Setup Environment**

```bash
cp .env.example .env
php artisan key:generate
```

4. **Konfigurasi Database**
   Edit file `.env` dan sesuaikan konfigurasi database:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=education_app
DB_USERNAME=root
DB_PASSWORD=
```

5. **Jalankan Migration**

```bash
php artisan migrate
```

6. **Jalankan Seeder (Opsional - untuk data demo)**

```bash
php artisan db:seed --class=DemoSeeder
```

7. **Build Assets**

```bash
npm run dev
```

8. **Jalankan Server**

```bash
php artisan serve
```

Aplikasi akan berjalan di `http://localhost:8000`

## Login Demo (Jika Menggunakan Seeder)

| Role     | Email                  | Password |
| -------- | ---------------------- | -------- |
| Admin    | admin@elearning.com    | password |
| Guru     | guru@elearning.com     | password |
| Siswa    | siswa@elearning.com    | password |
| Orangtua | orangtua@elearning.com | password |

## Struktur Database

### Users Table

-   Menyimpan semua user (admin, guru, siswa, orangtua)
-   Field: id, name, email, role, phone, address, photo, password

### Courses Table

-   Kursus yang dibuat oleh guru
-   Field: id, teacher_id, title, slug, description, thumbnail, level, status, duration_hours

### Lessons Table

-   Materi pembelajaran dalam kursus
-   Field: id, course_id, title, content, video_url, order, duration_minutes

### Enrollments Table

-   Pendaftaran siswa ke kursus
-   Field: id, student_id, course_id, status, progress, enrolled_at, completed_at

### Assignments Table

-   Tugas yang diberikan dalam kursus
-   Field: id, course_id, title, description, due_date, max_score

### Submissions Table

-   Pengumpulan tugas oleh siswa
-   Field: id, assignment_id, student_id, content, file_path, score, feedback, status

### Student_Parents Table

-   Relasi antara siswa dan orangtua
-   Field: id, student_id, parent_id

## Routes

### Authentication

-   `GET /login` - Halaman login
-   `POST /login` - Process login
-   `GET /register` - Halaman register
-   `POST /register` - Process register
-   `POST /logout` - Logout

### Dashboard Guru

-   `GET /guru/dashboard` - Dashboard guru
-   `GET /guru/courses` - Daftar kursus
-   `GET /guru/courses/create` - Form buat kursus
-   `POST /guru/courses` - Simpan kursus baru
-   `GET /guru/courses/{course}` - Detail kursus
-   `GET /guru/courses/{course}/edit` - Form edit kursus
-   `PUT /guru/courses/{course}` - Update kursus
-   `DELETE /guru/courses/{course}` - Hapus kursus
-   `GET /guru/assignments` - Daftar tugas
-   `POST /guru/submissions/{submission}/grade` - Nilai tugas siswa

### Dashboard Siswa

-   `GET /siswa/dashboard` - Dashboard siswa
-   `GET /siswa/courses` - Kursus yang diikuti
-   `GET /siswa/courses/browse` - Jelajahi kursus
-   `POST /siswa/courses/{course}/enroll` - Daftar ke kursus
-   `GET /siswa/courses/{course}` - Detail kursus
-   `GET /siswa/assignments` - Daftar tugas
-   `POST /siswa/assignments/{assignment}/submit` - Submit tugas

### Dashboard Orangtua

-   `GET /orangtua/dashboard` - Dashboard orangtua
-   `GET /orangtua/children` - Daftar anak
-   `POST /orangtua/children/link` - Hubungkan dengan anak
-   `GET /orangtua/children/{child}/progress` - Progress belajar anak
-   `GET /orangtua/children/{child}/courses` - Kursus yang diikuti anak

## Middleware & Authorization

### Middleware

-   `role:guru` - Hanya untuk guru
-   `role:siswa` - Hanya untuk siswa
-   `role:orangtua` - Hanya untuk orangtua
-   `auth` - Harus login

### Policies

-   `CoursePolicy` - Mengatur akses ke kursus
    -   `view` - Melihat kursus
    -   `create` - Membuat kursus (guru only)
    -   `update` - Edit kursus (pemilik only)
    -   `delete` - Hapus kursus (pemilik only)

## Customization

### Menambah Level Kursus

Edit enum di migration `create_courses_table.php`:

```php
$table->enum('level', ['beginner', 'intermediate', 'advanced', 'expert'])
```

### Menambah Status Enrollment

Edit enum di migration `create_enrollments_table.php`:

```php
$table->enum('status', ['active', 'completed', 'dropped', 'suspended'])
```

## Fitur Yang Bisa Dikembangkan

-   [ ] Live chat antara guru dan siswa
-   [ ] Forum diskusi per kursus
-   [ ] Quiz dan ujian online
-   [ ] Sertifikat digital
-   [ ] Video streaming untuk materi
-   [ ] Payment gateway untuk kursus berbayar
-   [ ] Rating dan review kursus
-   [ ] Notifikasi real-time
-   [ ] Export data ke PDF/Excel
-   [ ] Gamification (badges, points)

## Troubleshooting

### Error: "Class 'App\Http\Middleware\CheckRole' not found"

Pastikan sudah menjalankan:

```bash
composer dump-autoload
```

### Error Migration

Hapus database dan buat ulang:

```bash
php artisan migrate:fresh
```

### Asset tidak muncul

Jalankan:

```bash
npm run build
php artisan storage:link
```

## License

Open-source software.

## Support

Untuk pertanyaan dan bantuan, silakan buat issue di repository ini.
