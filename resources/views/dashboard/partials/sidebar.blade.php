<aside
    class="bg-gradient-to-b from-blue-900 via-blue-800 to-blue-900 text-white w-64 flex-shrink-0 hidden md:flex flex-col shadow-2xl">
    <div class="p-6 border-b border-blue-700">
        <div class="flex items-center space-x-2">
            <svg class="w-8 h-8 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
            </svg>
            <div>
                <h2 class="text-xl font-bold text-white">Eduinklusif</h2>
                <p class="text-blue-200 text-xs mt-0.5">
                    @if (auth()->user()->isGuru())
                        <span class="text-blue-400">Guru</span> Panel
                    @elseif(auth()->user()->isSiswa())
                        <span class="text-blue-400">Siswa</span> Panel
                    @elseif(auth()->user()->isOrangtua())
                        <span class="text-blue-400">Orang Tua</span> Panel
                    @endif
                </p>
            </div>
        </div>
    </div>

    <nav class="flex-1 px-4 space-y-1 overflow-y-auto py-4">
        @if (auth()->user()->isGuru())
            <a href="{{ route('guru.dashboard') }}"
                class="flex items-center px-4 py-3 text-blue-100 hover:bg-blue-600 hover:text-white rounded-lg transition {{ request()->routeIs('guru.dashboard') ? 'bg-gradient-to-r from-blue-600 to-blue-700 text-white shadow-lg' : '' }}">
                <svg class="h-5 w-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                Dashboard
            </a>
            <a href="{{ route('guru.courses') }}"
                class="flex items-center px-4 py-3 text-blue-100 hover:bg-blue-600 hover:text-white rounded-lg transition {{ request()->routeIs('guru.courses*') ? 'bg-gradient-to-r from-blue-600 to-blue-700 text-white shadow-lg' : '' }}">
                <svg class="h-5 w-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
                Kursus Saya
            </a>
            <a href="{{ route('guru.assignments') }}"
                class="flex items-center px-4 py-3 text-blue-100 hover:bg-blue-600 hover:text-white rounded-lg transition {{ request()->routeIs('guru.assignments*') ? 'bg-gradient-to-r from-blue-600 to-blue-700 text-white shadow-lg' : '' }}">
                <svg class="h-5 w-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                Tugas
            </a>
        @elseif(auth()->user()->isSiswa())
            <a href="{{ route('siswa.dashboard') }}"
                class="flex items-center px-4 py-3 text-blue-100 hover:bg-blue-600 hover:text-white rounded-lg transition {{ request()->routeIs('siswa.dashboard') ? 'bg-gradient-to-r from-blue-600 to-blue-700 text-white shadow-lg' : '' }}">
                <svg class="h-5 w-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                Dashboard
            </a>
            <a href="{{ route('siswa.courses') }}"
                class="flex items-center px-4 py-3 text-blue-100 hover:bg-blue-600 hover:text-white rounded-lg transition {{ request()->routeIs('siswa.courses') ? 'bg-gradient-to-r from-blue-600 to-blue-700 text-white shadow-lg' : '' }}">
                <svg class="h-5 w-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
                Kursus Saya
            </a>
            <a href="{{ route('siswa.courses.browse') }}"
                class="flex items-center px-4 py-3 text-blue-100 hover:bg-blue-600 hover:text-white rounded-lg transition {{ request()->routeIs('siswa.courses.browse') ? 'bg-gradient-to-r from-blue-600 to-blue-700 text-white shadow-lg' : '' }}">
                <svg class="h-5 w-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
                Jelajahi Kursus
            </a>
            <a href="{{ route('siswa.assignments') }}"
                class="flex items-center px-4 py-3 text-blue-100 hover:bg-blue-600 hover:text-white rounded-lg transition {{ request()->routeIs('siswa.assignments*') ? 'bg-gradient-to-r from-blue-600 to-blue-700 text-white shadow-lg' : '' }}">
                <svg class="h-5 w-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                Tugas
            </a>
        @elseif(auth()->user()->isOrangtua())
            <a href="{{ route('orangtua.dashboard') }}"
                class="flex items-center px-4 py-3 text-blue-100 hover:bg-blue-600 hover:text-white rounded-lg transition {{ request()->routeIs('orangtua.dashboard') ? 'bg-gradient-to-r from-blue-600 to-blue-700 text-white shadow-lg' : '' }}">
                <svg class="h-5 w-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                Dashboard
            </a>
            <a href="{{ route('orangtua.children') }}"
                class="flex items-center px-4 py-3 text-blue-100 hover:bg-blue-600 hover:text-white rounded-lg transition {{ request()->routeIs('orangtua.children*') ? 'bg-gradient-to-r from-blue-600 to-blue-700 text-white shadow-lg' : '' }}">
                <svg class="h-5 w-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
                Data Anak
            </a>
        @endif
    </nav>

    {{-- <div class="p-4 border-t border-blue-700">
        <div class="flex items-center">
            <img src="{{ auth()->user()->photo ?? 'https://ui-avatars.com/api/?name=' . urlencode(auth()->user()->name) }}"
                alt="{{ auth()->user()->name }}" class="h-10 w-10 rounded-full">
            <div class="ml-3">
                <p class="text-sm font-medium text-white">{{ auth()->user()->name }}</p>
                <p class="text-xs text-blue-200">{{ auth()->user()->email }}</p>
            </div>
        </div>
    </div> --}}
</aside>
