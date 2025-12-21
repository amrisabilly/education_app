<nav class="bg-white shadow-sm sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 md:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <div class="flex items-center gap-2">
                <a href="{{ route('home') }}" class="flex items-center gap-2">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                    <span class="font-bold text-xl text-gray-900 hidden sm:inline">Eduinklusif</span>
                </a>
            </div>
            <div class="flex items-center gap-4">
                <!-- Show login button if not authenticated, show user menu if authenticated -->
                @auth
                    <span class="text-gray-600 font-medium hidden sm:inline">{{ auth()->user()->name }}</span>
                    <a href="@if (auth()->user()->isGuru()) {{ route('guru.dashboard') }}
                             @elseif(auth()->user()->isSiswa()) {{ route('siswa.dashboard') }}
                             @elseif(auth()->user()->isOrangtua()) {{ route('orangtua.dashboard') }}
                             @else /admin/dashboard @endif"
                        class="text-blue-600 hover:text-blue-700 font-medium transition">
                        Dashboard
                    </a>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="text-gray-600 hover:text-gray-900 font-medium transition">
                            Logout
                        </button>
                    </form>
                    <div
                        class="w-10 h-10 bg-gradient-to-br from-blue-500 to-blue-600 rounded-full flex items-center justify-center cursor-pointer hover:opacity-80 transition">
                        <span class="text-white font-bold">{{ substr(auth()->user()->name, 0, 1) }}</span>
                    </div>
                @else
                    <a href="{{ route('register') }}"
                        class="text-gray-600 hover:text-gray-900 font-medium transition">Daftar</a>
                    <a href="{{ route('login') }}"
                        class="px-4 py-2 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition">
                        Masuk
                    </a>
                @endauth
            </div>
        </div>
    </div>
</nav>
