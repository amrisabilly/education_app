# 🎓 Panduan Lengkap E-Learning System

## 📋 Deskripsi Sistem

Sistem E-Learning yang lengkap dengan fitur:

-   **Guru** dapat membuat kursus, materi pembelajaran, dan tugas
-   **Siswa** dapat belajar dari materi dan mengerjakan tugas
-   **Orangtua** dapat memonitor progress anak mereka

## 🚀 Setup & Installation

### Database Seeder

Jalankan seeder untuk mengisi data dummy:

```bash
php artisan migrate:fresh
php artisan db:seed --class=CompleteElearningSeeder
```

## 👥 Akun Login Testing

### Guru (Teacher)

-   **Email:** guru1@elearning.com
-   **Password:** password
-   **Nama:** Prof. Ahmad Hidayat

-   **Email:** guru2@elearning.com
-   **Password:** password
-   **Nama:** Dr. Siti Nurjanah

### Siswa (Student)

-   **Email:** siswa1@elearning.com
-   **Password:** password
-   **Nama:** Budi Santoso

-   **Email:** siswa2@elearning.com
-   **Password:** password
-   **Nama:** Ani Wijaya

-   **Email:** siswa3@elearning.com
-   **Password:** password
-   **Nama:** Citra Dewi

### Orangtua (Parent)

-   **Email:** orangtua1@elearning.com
-   **Password:** password
-   **Nama:** Pak Santoso (Orangtua dari Budi Santoso)

-   **Email:** orangtua2@elearning.com
-   **Password:** password
-   **Nama:** Ibu Wijaya (Orangtua dari Ani Wijaya)

## 📚 Fitur Sistem

### 🎯 Fitur Guru

#### 1. Dashboard Guru

-   Lihat statistik: Total Kursus, Total Siswa, Total Materi, Tugas Pending
-   Monitor kursus yang diajar

#### 2. Manajemen Kursus

**Lokasi:** Dashboard Guru → Kursus

**Membuat Kursus:**

1. Klik "Tambah Kursus"
2. Isi form (Judul, Deskripsi, Level, Durasi, dsb)
3. Klik "Simpan"

**Edit/Hapus Kursus:**

-   Masuk ke detail kursus
-   Klik tombol "Edit Kursus" atau icon hapus

#### 3. Manajemen Materi Pembelajaran

**Lokasi:** Dashboard Guru → Kursus → Detail Kursus

**Menambah Materi:**

1. Klik "Tambah Materi" di section Materi Pembelajaran
2. Isi form:
    - Judul Materi
    - Konten (mendukung HTML)
    - URL Video (opsional, dari YouTube)
    - Durasi dalam menit
3. Klik "Simpan Materi"

**Fitur Materi:**

-   ✅ Konten teks dengan HTML formatting
-   🎥 Video pembelajaran dari YouTube
-   ⏱️ Tracking durasi belajar
-   📊 Urutan materi otomatis

**Edit/Hapus Materi:**

-   Klik icon edit (pensil) untuk mengedit
-   Klik icon hapus (sampah) untuk menghapus

#### 4. Manajemen Tugas & Penilaian

**Lokasi:** Dashboard Guru → Kursus → Detail Kursus

**Menambah Tugas:**

1. Klik "Tambah Tugas" di section Tugas & Penilaian
2. Isi form:
    - Judul Tugas
    - Deskripsi (instruksi lengkap)
    - Deadline (tanggal dan waktu)
    - Nilai Maksimal (1-100)
3. Klik "Simpan Tugas"

**Menilai Tugas Siswa:**

1. Klik tugas yang ingin dinilai
2. Lihat daftar submission siswa
3. Untuk setiap submission yang belum dinilai:
    - Masukkan nilai (0 sampai max_score)
    - Tambahkan feedback (opsional)
    - Klik "Nilai"

**Fitur Penilaian:**

-   📝 Lihat jawaban siswa
-   📎 Download file lampiran
-   ⭐ Berikan nilai dan feedback
-   📊 Track status pengumpulan

### 📖 Fitur Siswa

#### 1. Dashboard Siswa

-   Lihat statistik: Modul Selesai, Total Poin, Badge, Hari Belajar
-   Akses cepat ke kursus yang diikuti

#### 2. Belajar dari Materi

**Lokasi:** Dashboard Siswa → Kursus Saya → Pilih Kursus

**Mengakses Materi:**

1. Pilih kursus yang ingin dipelajari
2. Tab "Materi" menampilkan daftar materi
3. Klik "Mulai" pada materi yang ingin dipelajari

**Fitur Belajar:**

-   📺 Tonton video pembelajaran (jika ada)
-   📄 Baca konten materi lengkap
-   ✅ Tandai materi selesai
-   📊 Progress tracking otomatis
-   ⬅️➡️ Navigasi antar materi

#### 3. Mengerjakan Tugas

**Lokasi:** Dashboard Siswa → Kursus → Tab Tugas

**Submit Tugas:**

1. Lihat daftar tugas di tab "Tugas"
2. Klik "Kumpulkan" pada tugas yang ingin dikerjakan
3. Isi form submission:
    - Tulis jawaban Anda
    - Upload file (opsional: PDF, DOC, DOCX, ZIP max 10MB)
4. Klik "Kumpulkan Tugas"

**Fitur Tugas:**

-   ⏰ Lihat deadline tugas
-   📝 Submit jawaban dengan file attachment
-   ⭐ Lihat nilai dan feedback dari guru
-   📊 Status: Waiting/Submitted/Graded

#### 4. Monitoring Progress

-   Progress bar per kursus
-   Jumlah materi yang diselesaikan
-   Nilai tugas yang sudah dikerjakan

### 👨‍👩‍👧 Fitur Orangtua

#### 1. Dashboard Orangtua

-   Lihat daftar anak yang dimonitor
-   Statistik total anak dan kursus

#### 2. Monitoring Progress Anak

**Lokasi:** Dashboard Orangtua → Pilih Anak

**Fitur Monitoring:**

-   📊 Lihat semua kursus yang diikuti anak
-   📈 Progress setiap kursus
-   ⭐ Nilai tugas anak
-   📚 Aktivitas belajar

**Informasi yang Ditampilkan:**

-   Nama kursus
-   Progress pembelajaran (%)
-   Status enrollment
-   Guru pengajar

## 🔄 Flow Kerja Sistem

### Skenario Lengkap: Dari Guru Mengajar hingga Orangtua Monitoring

#### Step 1: Guru Membuat Kursus

```
Guru Login → Dashboard → Kursus → Tambah Kursus
→ Isi detail kursus → Simpan
```

#### Step 2: Guru Menambah Materi

```
Guru → Detail Kursus → Tambah Materi
→ Isi judul, konten, video URL, durasi → Simpan
→ Ulangi untuk semua materi
```

#### Step 3: Guru Membuat Tugas

```
Guru → Detail Kursus → Tambah Tugas
→ Isi judul, deskripsi, deadline, max score → Simpan
```

#### Step 4: Siswa Mendaftar Kursus

```
Siswa Login → Dashboard → Jelajahi Kursus
→ Pilih kursus → Daftar
```

#### Step 5: Siswa Belajar

```
Siswa → Kursus Saya → Pilih Kursus
→ Klik Mulai pada materi
→ Baca/tonton materi
→ Tandai Selesai
→ Lanjut ke materi berikutnya
```

#### Step 6: Siswa Mengerjakan Tugas

```
Siswa → Kursus → Tab Tugas
→ Klik Kumpulkan
→ Tulis jawaban + upload file
→ Kumpulkan Tugas
```

#### Step 7: Guru Menilai

```
Guru → Assignments → Pilih Tugas
→ Lihat submission siswa
→ Masukkan nilai dan feedback
→ Klik Nilai
```

#### Step 8: Orangtua Monitoring

```
Orangtua Login → Dashboard
→ Lihat anak yang dimonitor
→ Klik nama anak → Lihat progress
→ Monitor nilai dan aktivitas
```

## 📊 Data Sample yang Tersedia

### Kursus:

1. **Matematika Dasar** (4 materi)

    - Pengenalan Matematika
    - Operasi Hitung Penjumlahan dan Pengurangan
    - Perkalian dan Pembagian
    - Pengenalan Aljabar

2. **Bahasa Indonesia** (3 materi)

    - Pengenalan Bahasa Indonesia
    - Struktur Kalimat
    - Menulis Paragraf

3. **Sains untuk Pemula** (2 materi)
    - Pengenalan Sains
    - Metode Ilmiah

### Tugas:

-   Latihan Operasi Hitung (Matematika)
-   Quiz Aljabar (Matematika)
-   Menulis Paragraf Deskriptif (Bahasa Indonesia)
-   Laporan Percobaan Sederhana (Sains)

### Enrollment & Progress:

-   Siswa1 (Budi): Enrolled di Matematika (50%) dan Bahasa Indonesia (33%)
-   Siswa2 (Ani): Enrolled di Matematika (75%) dan Sains (50%)
-   Siswa3 (Citra): Enrolled di Bahasa Indonesia (0%)

### Submissions:

-   Budi sudah submit 2 tugas (sudah dinilai)
-   Ani sudah submit 1 tugas (masih waiting)

## 🛠️ Teknologi yang Digunakan

-   **Backend:** Laravel 10
-   **Frontend:** Blade Templates + Tailwind CSS + Alpine.js
-   **Database:** MySQL
-   **Authentication:** Laravel Sanctum
-   **File Storage:** Laravel Storage

## 📝 Routes Penting

### Guru Routes

```
/guru/dashboard - Dashboard guru
/guru/courses - Daftar kursus
/guru/courses/{course} - Detail kursus
/guru/courses/{course}/lessons/create - Tambah materi
/guru/courses/{course}/assignments/create - Tambah tugas
/guru/assignments/{assignment} - Detail & nilai tugas
```

### Siswa Routes

```
/siswa/dashboard - Dashboard siswa
/siswa/courses - Kursus yang diikuti
/siswa/courses/{course} - Detail kursus
/siswa/courses/{course}/lessons/{lesson} - Belajar materi
/siswa/assignments/{assignment}/submit - Submit tugas
```

### Orangtua Routes

```
/orangtua/dashboard - Dashboard orangtua
/orangtua/children/{child}/courses - Kursus anak
```

## 🎨 Color Palette

Sistem menggunakan color palette **blue-600** secara konsisten:

-   Primary: `blue-600` (#2563eb)
-   Hover: `blue-700` (#1d4ed8)
-   Light: `blue-50` (#eff6ff)
-   Background: `blue-100` (#dbeafe)

## 🔐 Security Features

-   ✅ Role-based access control (guru/siswa/orangtua)
-   ✅ Course ownership validation
-   ✅ Enrollment verification
-   ✅ Policy-based authorization
-   ✅ CSRF protection
-   ✅ File upload validation

## 📱 Responsive Design

-   Desktop, tablet, dan mobile friendly
-   Sidebar navigation yang adaptive
-   Grid layout yang responsive

## 💡 Tips Penggunaan

### Untuk Guru:

-   Buat materi secara berurutan dengan order yang jelas
-   Sertakan video untuk materi yang kompleks
-   Berikan feedback detail saat menilai tugas
-   Set deadline yang realistis untuk tugas

### Untuk Siswa:

-   Selesaikan materi secara berurutan
-   Tandai materi sebagai selesai untuk tracking progress
-   Submit tugas sebelum deadline
-   Baca feedback dari guru untuk improvement

### Untuk Orangtua:

-   Cek progress anak secara berkala
-   Monitor nilai tugas
-   Dukung anak dalam menyelesaikan kursus

## 🐛 Troubleshooting

### Issue: Tidak bisa login

**Solusi:** Pastikan email dan password benar. Gunakan akun dari daftar di atas.

### Issue: Video tidak muncul

**Solusi:** Pastikan URL video dalam format yang benar (YouTube embed URL).

### Issue: File tidak bisa diupload

**Solusi:** Cek ukuran file (max 10MB) dan format (PDF, DOC, DOCX, ZIP).

### Issue: Progress tidak update

**Solusi:** Klik "Tandai Selesai" pada setiap materi yang sudah dipelajari.

## 📞 Support

Jika menemukan bug atau butuh bantuan, silakan buat issue di repository atau hubungi developer.

---

**Happy Learning! 🎓**
