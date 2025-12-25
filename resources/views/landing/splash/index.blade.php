@extends('landing.layouts.app', [
    'title' => 'Eduinlkusif - Platform Edukasi Digital',
])

@section('style')
    <style>
        dotlottie-wc {
            width: 100%;
            height: 100%;
        }
    </style>
@endsection

@section('content')
    <!-- Hero Section -->
    <section
        class="relative min-h-screen flex items-center justify-center px-4 md:px-6 lg:px-8 bg-gradient-to-br from-blue-600 to-blue-800 text-white">
        <div class="max-w-6xl mx-auto w-full ">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <!-- Left Content -->
                <div class="space-y-6">
                    <h1 class="text-5xl md:text-6xl font-bold text-white leading-tight">
                        Belajar Tanpa Batas, Berkembang Tanpa Henti
                    </h1>
                    <p class="text-lg md:text-xl text-blue-100">
                        Platform edukasi digital yang dirancang khusus untuk mendukung pembelajaran siswa dengan materi
                        berkualitas, AI tutor, dan sistem gamifikasi yang menyenangkan.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <!-- Updated links to use named routes -->
                        <a href="{{ route('login') }}"
                            class="px-8 py-3 bg-white text-blue-600 font-bold rounded-lg hover:bg-blue-50 transition text-center">
                            Login
                        </a>
                        <a href="{{ route('register') }}"
                            class="px-8 py-3 border-2 border-white text-white font-bold rounded-lg hover:bg-white hover:text-blue-600 transition text-center">
                            Daftar Gratis
                        </a>
                    </div>
                </div>

                <!-- Right Illustration -->
                <div class="hidden lg:block">
                    <div class="bg-blue-500 rounded-3xl p-8 shadow-2xl">
                        <div class="w-50 h-50 mb-4 mx-auto">
                            <dotlottie-wc src="https://lottie.host/faa90182-ae54-4e87-b663-05f0ffb40e07/NGH42EF3lk.lottie"
                                autoplay loop></dotlottie-wc>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-20 px-4 md:px-6 lg:px-8 bg-white">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                    Fitur Unggulan Kami
                </h2>
                <p class="text-lg text-gray-600">
                    Semua yang Anda butuhkan untuk pembelajaran yang efektif dan menyenangkan
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Feature 1: Materi Digital -->
                <div
                    class="bg-gradient-to-br from-blue-50 to-blue-100 p-8 rounded-2xl shadow-lg hover:shadow-xl transition">
                    <div class="w-14 h-14 bg-blue-600 rounded-xl flex items-center justify-center mb-4">
                        <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.669 0-3.218.51-4.5 1.385A7.968 7.968 0 009 4.804z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Materi Digital Berkualitas</h3>
                    <p class="text-gray-700">
                        Akses ribuan materi pembelajaran dari video interaktif hingga e-book lengkap sesuai kurikulum
                        nasional.
                    </p>
                </div>

                <!-- Feature 2: AI Tutor -->
                <div
                    class="bg-gradient-to-br from-blue-50 to-blue-100 p-8 rounded-2xl shadow-lg hover:shadow-xl transition">
                    <div class="w-14 h-14 bg-blue-600 rounded-xl flex items-center justify-center mb-4">
                        <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M9.5 2a.5.5 0 01.5.5v1.414l1.707-1.707a.5.5 0 01.707.707L10.707 4.5h1.414a.5.5 0 010 1h-2a.5.5 0 01-.5-.5v-2a.5.5 0 01.5-.5zm5 2.5a1 1 0 11-2 0 1 1 0 012 0zM9.5 9a.5.5 0 01.5.5v2a.5.5 0 01-1 0v-2a.5.5 0 01.5-.5z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">AI Chatbot Asisten</h3>
                    <p class="text-gray-700">
                        Tanya jawab dengan AI tutor yang siap membantu 24/7 untuk menjawab pertanyaan pembelajaran Anda.
                    </p>
                </div>

                <!-- Feature 3: Bank Soal -->
                <div
                    class="bg-gradient-to-br from-blue-50 to-blue-100 p-8 rounded-2xl shadow-lg hover:shadow-xl transition">
                    <div class="w-14 h-14 bg-blue-600 rounded-xl flex items-center justify-center mb-4">
                        <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M6 5a3 3 0 011 5.82A3 3 0 0113 10a1 1 0 11-2 0 1 1 0 00-1-1 1 1 0 10-2 0A1 1 0 016 5z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Bank Soal Lengkap</h3>
                    <p class="text-gray-700">
                        Berlatih dengan ribuan soal adaptif yang menyesuaikan dengan tingkat pemahaman Anda.
                    </p>
                </div>

                <!-- Feature 4: Gamifikasi -->
                <div
                    class="bg-gradient-to-br from-blue-50 to-blue-100 p-8 rounded-2xl shadow-lg hover:shadow-xl transition">
                    <div class="w-14 h-14 bg-blue-600 rounded-xl flex items-center justify-center mb-4">
                        <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Poin & Badge Gamifikasi</h3>
                    <p class="text-gray-700">
                        Kumpulkan poin dan badge untuk setiap pencapaian, buat belajar lebih menyenangkan dan memotivasi.
                    </p>
                </div>

                <!-- Feature 5: Progress Tracking -->
                <div
                    class="bg-gradient-to-br from-blue-50 to-blue-100 p-8 rounded-2xl shadow-lg hover:shadow-xl transition">
                    <div class="w-14 h-14 bg-blue-600 rounded-xl flex items-center justify-center mb-4">
                        <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Lacak Progres Belajar</h3>
                    <p class="text-gray-700">
                        Pantau perkembangan pembelajaran Anda secara real-time dengan dashboard yang detail dan mudah
                        dipahami.
                    </p>
                </div>

                <!-- Feature 6: Offline Mode -->
                <div
                    class="bg-gradient-to-br from-blue-50 to-blue-100 p-8 rounded-2xl shadow-lg hover:shadow-xl transition">
                    <div class="w-14 h-14 bg-blue-600 rounded-xl flex items-center justify-center mb-4">
                        <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.3A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Mode Offline</h3>
                    <p class="text-gray-700">
                        Download materi dan soal untuk belajar offline, otomatis sinkronisasi saat terhubung internet.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-16 px-4 md:px-6 lg:px-8 bg-blue-600 text-white">
        <div class="max-w-6xl mx-auto">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                <div>
                    <p class="text-white text-sm md:text-base">10K+ Siswa Aktif</p>
                </div>
                <div>
                    <p class="text-4xl md:text-5xl font-bold mb-2">500+</p>
                    <p class="text-blue-100 text-sm md:text-base">Materi Digital</p>
                </div>
                <div>
                    <p class="text-4xl md:text-5xl font-bold mb-2">2K+</p>
                    <p class="text-blue-100 text-sm md:text-base">Bank Soal</p>
                </div>
                <div>
                    <p class="text-4xl md:text-5xl font-bold mb-2">98%</p>
                    <p class="text-blue-100 text-sm md:text-base">Kepuasan Pengguna</p>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
    <script src="https://unpkg.com/@lottiefiles/dotlottie-wc@latest/dist/dotlottie-wc.js" type="module"></script>
@endpush
