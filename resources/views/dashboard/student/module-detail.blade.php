@extends('landing.layouts.app', [
    'title' => 'Modul Detail - Eduinlkusif',
])

@section('content')
    <!-- Breadcrumb & Header -->
    <section class="bg-gradient-to-r from-blue-600 to-blue-800 text-white px-4 md:px-6 lg:px-8 py-8">
        <div class="max-w-7xl mx-auto">
            <div class="flex items-center gap-2 mb-4 text-sm text-blue-100">
                <a href="/dashboard/student" class="hover:text-white">Dashboard</a>
                <span>/</span>
                <span>Modul 2: Aljabar Dasar</span>
            </div>
            <h1 class="text-4xl font-bold mb-2">Modul 2: Aljabar Dasar</h1>
            <p class="text-blue-100">Kuasai konsep aljabar dan persamaan linier dengan mudah</p>
        </div>
    </section>

    <!-- Main Content -->
    <section class="px-4 md:px-6 lg:px-8 py-8 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Left Column: Video & Content -->
                <div class="lg:col-span-2">
                    <!-- Video Player -->
                    <div class="mb-8 bg-black rounded-2xl overflow-hidden shadow-lg">
                        <div class="aspect-video bg-gray-900 flex items-center justify-center">
                            <svg class="w-20 h-20 text-gray-600" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z" />
                            </svg>
                        </div>
                    </div>

                    <!-- Content Info -->
                    <div class="bg-white rounded-2xl shadow-sm p-8 mb-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-4">Pembelajaran: Pengenalan Aljabar</h2>
                        <p class="text-gray-700 leading-relaxed mb-6">
                            Aljabar adalah cabang matematika yang menggunakan simbol dan huruf untuk mewakili angka dan
                            nilai.
                            Dalam modul ini, Anda akan belajar tentang variabel, ekspresi aljabar, dan cara menyelesaikan
                            persamaan
                            linier sederhana. Kami akan memulai dengan konsep dasar dan secara bertahap naik ke tingkat yang
                            lebih kompleks.
                        </p>

                        <div class="border-t pt-6">
                            <h3 class="text-lg font-bold text-gray-900 mb-4">Topik yang Akan Dipelajari:</h3>
                            <ul class="space-y-3">
                                <li class="flex items-start gap-3">
                                    <svg class="w-5 h-5 text-blue-600 flex-shrink-0 mt-0.5" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span class="text-gray-700">Memahami variabel dan konstanta</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <svg class="w-5 h-5 text-blue-600 flex-shrink-0 mt-0.5" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span class="text-gray-700">Menyederhanakan ekspresi aljabar</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <svg class="w-5 h-5 text-blue-600 flex-shrink-0 mt-0.5" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span class="text-gray-700">Menyelesaikan persamaan linear</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <svg class="w-5 h-5 text-blue-600 flex-shrink-0 mt-0.5" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span class="text-gray-700">Aplikasi aljabar dalam kehidupan sehari-hari</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Navigation -->
                    <div class="flex gap-4 mb-8">
                        <a href="#"
                            class="flex-1 px-6 py-3 bg-white border-2 border-gray-300 text-gray-900 font-bold rounded-lg hover:bg-gray-50 transition text-center">
                            Pelajaran Sebelumnya
                        </a>
                        <a href="#"
                            class="flex-1 px-6 py-3 bg-blue-600 text-white font-bold rounded-lg hover:bg-blue-700 transition text-center">
                            Pelajaran Berikutnya
                        </a>
                    </div>

                    <!-- Quiz Section -->
                    <div class="bg-gradient-to-r from-blue-50 to-blue-100 border-2 border-blue-200 rounded-2xl p-8">
                        <div class="flex items-center justify-between">
                            <div>
                                <h3 class="text-2xl font-bold text-gray-900 mb-2">Siap Menguji Pemahaman?</h3>
                                <p class="text-gray-700">Ikuti kuis untuk mengetahui seberapa baik Anda memahami materi ini
                                </p>
                            </div>
                            <a href="{{ route('student.module.quiz', ['id' => $moduleId]) }}"
                                class="px-8 py-4 bg-blue-600 text-white font-bold rounded-lg hover:bg-blue-700 transition whitespace-nowrap">
                                Mulai Kuis
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Sidebar -->
                <div class="lg:col-span-1">
                    <!-- Fixed sticky positioning to properly stay in viewport -->
                    <div class="sticky top-24">
                        <!-- Progress Card -->
                        <div class="bg-white rounded-2xl shadow-sm p-6 mb-6">
                            <h3 class="text-lg font-bold text-gray-900 mb-4">Progress Modul</h3>

                            <!-- Progress Bar -->
                            <div class="mb-6">
                                <div class="flex justify-between items-center mb-2">
                                    <span class="text-sm font-medium text-gray-600">Selesai</span>
                                    <span class="text-lg font-bold text-blue-600">40%</span>
                                </div>
                                <div class="w-full bg-gray-200 h-3 rounded-full overflow-hidden">
                                    <div class="bg-gradient-to-r from-blue-500 to-blue-600 h-full w-2/5"></div>
                                </div>
                            </div>

                            <!-- Stats -->
                            <div class="space-y-3 border-t pt-6">
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600 font-medium">Pelajaran Selesai</span>
                                    <span class="text-lg font-bold text-gray-900">4/10</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600 font-medium">Waktu Belajar</span>
                                    <span class="text-lg font-bold text-gray-900">2j 30m</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600 font-medium">Poin Diraih</span>
                                    <span class="text-lg font-bold text-blue-600">280</span>
                                </div>
                            </div>
                        </div>

                        <!-- Lessons List - Improved Layout -->
                        <div class="bg-white rounded-2xl shadow-sm overflow-hidden">
                            <div class="bg-gradient-to-r from-blue-600 to-blue-700 text-white p-6">
                                <h3 class="text-lg font-bold">Daftar Pelajaran (10 Bagian)</h3>
                            </div>

                            <!-- Improved lessons list with numbered steps instead of simple list -->
                            <div class="divide-y max-h-96 overflow-y-auto">
                                <!-- Lesson 1: Completed -->
                                <div
                                    class="p-4 hover:bg-gray-50 transition cursor-pointer bg-blue-50 border-l-4 border-blue-600">
                                    <div class="flex items-start gap-3">
                                        <div
                                            class="flex items-center justify-center w-6 h-6 bg-blue-600 text-white rounded-full flex-shrink-0 text-xs font-bold">
                                            1</div>
                                        <div class="flex-1">
                                            <p class="font-bold text-gray-900">Pengenalan Aljabar</p>
                                            <p class="text-xs text-gray-600 mt-1">15:30 menit</p>
                                        </div>
                                        <svg class="w-4 h-4 text-blue-600 flex-shrink-0" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </div>

                                <!-- Lesson 2: Completed -->
                                <div
                                    class="p-4 hover:bg-gray-50 transition cursor-pointer bg-blue-50 border-l-4 border-blue-600">
                                    <div class="flex items-start gap-3">
                                        <div
                                            class="flex items-center justify-center w-6 h-6 bg-blue-600 text-white rounded-full flex-shrink-0 text-xs font-bold">
                                            2</div>
                                        <div class="flex-1">
                                            <p class="font-bold text-gray-900">Variabel dan Konstanta</p>
                                            <p class="text-xs text-gray-600 mt-1">12:45 menit</p>
                                        </div>
                                        <svg class="w-4 h-4 text-blue-600 flex-shrink-0" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </div>

                                <!-- Lesson 3: Completed -->
                                <div
                                    class="p-4 hover:bg-gray-50 transition cursor-pointer bg-blue-50 border-l-4 border-blue-600">
                                    <div class="flex items-start gap-3">
                                        <div
                                            class="flex items-center justify-center w-6 h-6 bg-blue-600 text-white rounded-full flex-shrink-0 text-xs font-bold">
                                            3</div>
                                        <div class="flex-1">
                                            <p class="font-bold text-gray-900">Ekspresi Aljabar</p>
                                            <p class="text-xs text-gray-600 mt-1">18:20 menit</p>
                                        </div>
                                        <svg class="w-4 h-4 text-blue-600 flex-shrink-0" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </div>

                                <!-- Lesson 4: Completed -->
                                <div
                                    class="p-4 hover:bg-gray-50 transition cursor-pointer bg-blue-50 border-l-4 border-blue-600">
                                    <div class="flex items-start gap-3">
                                        <div
                                            class="flex items-center justify-center w-6 h-6 bg-blue-600 text-white rounded-full flex-shrink-0 text-xs font-bold">
                                            4</div>
                                        <div class="flex-1">
                                            <p class="font-bold text-gray-900">Penyederhanaan Ekspresi</p>
                                            <p class="text-xs text-gray-600 mt-1">22:15 menit</p>
                                        </div>
                                        <svg class="w-4 h-4 text-blue-600 flex-shrink-0" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </div>

                                <!-- Lesson 5: Currently Active -->
                                <div
                                    class="p-4 hover:bg-gray-50 transition cursor-pointer bg-blue-50 border-l-4 border-blue-600">
                                    <div class="flex items-start gap-3">
                                        <div
                                            class="flex items-center justify-center w-6 h-6 bg-blue-600 text-white rounded-full flex-shrink-0 text-xs font-bold">
                                            5</div>
                                        <div class="flex-1">
                                            <p class="font-bold text-gray-900">Persamaan Linear</p>
                                            <p class="text-xs text-gray-600 mt-1">Sedang berlangsung</p>
                                        </div>
                                        <svg class="w-4 h-4 text-blue-600 flex-shrink-0" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path
                                                d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z" />
                                        </svg>
                                    </div>
                                </div>

                                <!-- Lesson 6: Locked -->
                                <div class="p-4 opacity-50 cursor-not-allowed">
                                    <div class="flex items-start gap-3">
                                        <div
                                            class="flex items-center justify-center w-6 h-6 bg-gray-400 text-white rounded-full flex-shrink-0 text-xs font-bold">
                                            6</div>
                                        <div class="flex-1">
                                            <p class="font-bold text-gray-900">Sistem Persamaan</p>
                                            <p class="text-xs text-gray-600 mt-1">Terkunci</p>
                                        </div>
                                        <svg class="w-4 h-4 text-gray-400 flex-shrink-0" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </div>

                                <!-- Lesson 7-10: Locked -->
                                <div class="p-4 opacity-50 cursor-not-allowed">
                                    <div class="flex items-start gap-3">
                                        <div
                                            class="flex items-center justify-center w-6 h-6 bg-gray-400 text-white rounded-full flex-shrink-0 text-xs font-bold">
                                            7</div>
                                        <div class="flex-1">
                                            <p class="font-bold text-gray-900">Grafik Persamaan</p>
                                            <p class="text-xs text-gray-600 mt-1">Terkunci</p>
                                        </div>
                                        <svg class="w-4 h-4 text-gray-400 flex-shrink-0" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </div>

                                <div class="p-4 opacity-50 cursor-not-allowed">
                                    <div class="flex items-start gap-3">
                                        <div
                                            class="flex items-center justify-center w-6 h-6 bg-gray-400 text-white rounded-full flex-shrink-0 text-xs font-bold">
                                            8</div>
                                        <div class="flex-1">
                                            <p class="font-bold text-gray-900">Aplikasi Praktis</p>
                                            <p class="text-xs text-gray-600 mt-1">Terkunci</p>
                                        </div>
                                        <svg class="w-4 h-4 text-gray-400 flex-shrink-0" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </div>

                                <div class="p-4 opacity-50 cursor-not-allowed">
                                    <div class="flex items-start gap-3">
                                        <div
                                            class="flex items-center justify-center w-6 h-6 bg-gray-400 text-white rounded-full flex-shrink-0 text-xs font-bold">
                                            9</div>
                                        <div class="flex-1">
                                            <p class="font-bold text-gray-900">Studi Kasus</p>
                                            <p class="text-xs text-gray-600 mt-1">Terkunci</p>
                                        </div>
                                        <svg class="w-4 h-4 text-gray-400 flex-shrink-0" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </div>

                                <div class="p-4 opacity-50 cursor-not-allowed">
                                    <div class="flex items-start gap-3">
                                        <div
                                            class="flex items-center justify-center w-6 h-6 bg-gray-400 text-white rounded-full flex-shrink-0 text-xs font-bold">
                                            10</div>
                                        <div class="flex-1">
                                            <p class="font-bold text-gray-900">Praktik Soal & Quiz</p>
                                            <p class="text-xs text-gray-600 mt-1">Terkunci</p>
                                        </div>
                                        <svg class="w-4 h-4 text-gray-400 flex-shrink-0" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Resources Section -->
    <section class="px-4 md:px-6 lg:px-8 py-12 bg-white border-t">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-3xl font-bold text-gray-900 mb-8">Materi Pendukung</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- PDF Slide -->
                <a href="#"
                    class="bg-gradient-to-br from-blue-50 to-blue-100 border-2 border-blue-200 rounded-xl p-6 hover:shadow-lg transition text-center">
                    <svg class="w-12 h-12 text-blue-600 mx-auto mb-3" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M8 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM15 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z" />
                        <path
                            d="M3 4a1 1 0 00-1 1v10a1 1 0 001 1h1.05a2.5 2.5 0 014.9 0H10a1 1 0 001-1V5a1 1 0 00-1-1H3zM14 7a1 1 0 00-1 1v6.05A2.5 2.5 0 0115.95 16H17a1 1 0 001-1v-5a1 1 0 00-.293-.707l-2-2A1 1 0 0015 7h-1z" />
                    </svg>
                    <h3 class="font-bold text-gray-900 mb-1">Slide Presentasi</h3>
                    <p class="text-sm text-gray-600">Download PDF slides lengkap</p>
                </a>

                <!-- Code Examples -->
                <a href="#"
                    class="bg-gradient-to-br from-blue-50 to-blue-100 border-2 border-blue-200 rounded-xl p-6 hover:shadow-lg transition text-center">
                    <svg class="w-12 h-12 text-blue-600 mx-auto mb-3" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M2 5a2 2 0 012-2h12a2 2 0 012 2v10a2 2 0 01-2 2H4a2 2 0 01-2-2V5z" />
                    </svg>
                    <h3 class="font-bold text-gray-900 mb-1">Contoh Soal</h3>
                    <p class="text-sm text-gray-600">Lihat contoh dan solusi</p>
                </a>

                <!-- Worksheet -->
                <a href="#"
                    class="bg-gradient-to-br from-blue-50 to-blue-100 border-2 border-blue-200 rounded-xl p-6 hover:shadow-lg transition text-center">
                    <svg class="w-12 h-12 text-blue-600 mx-auto mb-3" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H7a1 1 0 01-1-1v-6z"
                            clip-rule="evenodd" />
                    </svg>
                    <h3 class="font-bold text-gray-900 mb-1">Worksheet</h3>
                    <p class="text-sm text-gray-600">Praktik dengan lembar kerja</p>
                </a>

                <!-- External Links -->
                <a href="#"
                    class="bg-gradient-to-br from-blue-50 to-blue-100 border-2 border-blue-200 rounded-xl p-6 hover:shadow-lg transition text-center">
                    <svg class="w-12 h-12 text-blue-600 mx-auto mb-3" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M11 3a1 1 0 10-2 0v1a1 1 0 102 0V3zM15.657 5.757a1 1 0 00-1.414-1.414l-.707.707a1 1 0 001.414 1.414l.707-.707zM18 10a1 1 0 01-1 1h-1a1 1 0 110-2h1a1 1 0 011 1zM15.657 14.243a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414l.707.707zM11 17a1 1 0 102 0v-1a1 1 0 10-2 0v1zM4.343 14.243a1 1 0 00-1.414-1.414l-.707.707a1 1 0 001.414 1.414l.707-.707zM2 10a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM4.343 5.757a1 1 0 000-1.414L3.636 3.636a1 1 0 00-1.414 1.414l.707.707z" />
                    </svg>
                    <h3 class="font-bold text-gray-900 mb-1">Referensi Eksternal</h3>
                    <p class="text-sm text-gray-600">Link materi tambahan</p>
                </a>
            </div>
        </div>
    </section>
@endsection
