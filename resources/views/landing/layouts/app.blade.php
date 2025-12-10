<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Berbinar - Edukasi Online' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 md:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center gap-2">
                    <div class="w-10 h-10 bg-gradient-to-br from-blue-600 to-blue-800 rounded-lg flex items-center justify-center">
                        <span class="text-white font-bold text-lg">B</span>
                    </div>
                    <span class="font-bold text-xl text-gray-900 hidden sm:inline">Berbinar</span>
                </div>
                <div class="flex items-center gap-4">
                    <!-- Show login button if not authenticated, show user menu if authenticated -->
                    @if(session()->has('user'))
                        <span class="text-gray-600 font-medium hidden sm:inline">{{ session('user')['name'] }}</span>
                        <form action="{{ route('auth.logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="text-gray-600 hover:text-gray-900 font-medium transition">
                                Logout
                            </button>
                        </form>
                        <div class="w-10 h-10 bg-gradient-to-br from-purple-500 to-pink-500 rounded-full flex items-center justify-center cursor-pointer hover:opacity-80 transition">
                            <span class="text-white font-bold">{{ substr(session('user')['name'], 0, 1) }}</span>
                        </div>
                    @else
                        <a href="{{ route('auth.login.page') }}" class="text-gray-600 hover:text-gray-900 font-medium transition">Bantuan</a>
                        <a href="{{ route('auth.login.page') }}" class="text-gray-600 hover:text-gray-900 font-medium transition">Pengaturan</a>
                        <a href="{{ route('auth.login.page') }}" class="px-4 py-2 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition">
                            Masuk
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-200 mt-12">
        <div class="max-w-7xl mx-auto px-4 md:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
                <div>
                    <h3 class="font-bold text-gray-900 mb-4">Tentang Berbinar</h3>
                    <p class="text-gray-600 text-sm">Platform edukasi online untuk semua kalangan</p>
                </div>
                <div>
                    <h3 class="font-bold text-gray-900 mb-4">Produk</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="text-gray-600 hover:text-blue-600 transition">Kursus</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-blue-600 transition">Materi</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-blue-600 transition">Bank Soal</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-bold text-gray-900 mb-4">Bantuan</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="text-gray-600 hover:text-blue-600 transition">FAQ</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-blue-600 transition">Kontak</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-blue-600 transition">Hubungi Kami</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-bold text-gray-900 mb-4">Legal</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="text-gray-600 hover:text-blue-600 transition">Privasi</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-blue-600 transition">Syarat & Ketentuan</a></li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-200 pt-8 text-center text-gray-600 text-sm">
                <p>&copy; 2025 Berbinar. Semua hak dilindungi.</p>
            </div>
        </div>
    </footer>
</body>
</html>
