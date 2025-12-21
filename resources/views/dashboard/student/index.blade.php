@extends('landing.layouts.app', [
    'title' => 'Dashboard Siswa - Eduinlkusif',
])

@section('content')
    <!-- Dashboard Header -->
    <section class="bg-gradient-to-r from-blue-600 to-blue-800 text-white px-4 md:px-6 lg:px-8 py-12">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
                <div>
                    <!-- Display logged-in user name dynamically from session -->
                    <h1 class="text-4xl font-bold mb-2">Selamat Datang, {{ session('user')['name'] }}!</h1>
                    <p class="text-blue-100">Level: {{ session('user')['level'] }} | Kelas: {{ session('user')['kelas'] }}
                    </p>
                </div>
                <div class="flex gap-4">
                    <a href="#"
                        class="px-6 py-3 bg-white text-blue-600 font-bold rounded-lg hover:bg-blue-50 transition">
                        Profil
                    </a>
                    <form action="{{ route('auth.logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit"
                            class="px-6 py-3 border-2 border-white text-white font-bold rounded-lg hover:bg-blue-700 transition">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Cards -->
    <section class="px-4 md:px-6 lg:px-8 py-8 bg-gray-50">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <!-- Card: Modul Selesai -->
                <div class="bg-white p-6 rounded-xl shadow-sm hover:shadow-md transition">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 text-sm font-medium">Modul Selesai</p>
                            <p class="text-3xl font-bold text-gray-900 mt-2">12</p>
                        </div>
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Card: Total Poin -->
                <div class="bg-white p-6 rounded-xl shadow-sm hover:shadow-md transition">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 text-sm font-medium">Total Poin</p>
                            <p class="text-3xl font-bold text-gray-900 mt-2">2,450</p>
                        </div>
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Card: Badge Diperoleh -->
                <div class="bg-white p-6 rounded-xl shadow-sm hover:shadow-md transition">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 text-sm font-medium">Badge</p>
                            <p class="text-3xl font-bold text-gray-900 mt-2">8</p>
                        </div>
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v4h8v-4zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Card: Hari Belajar -->
                <div class="bg-white p-6 rounded-xl shadow-sm hover:shadow-md transition">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 text-sm font-medium">Hari Belajar</p>
                            <p class="text-3xl font-bold text-gray-900 mt-2">24</p>
                        </div>
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v2a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a2 2 0 002 2h8a2 2 0 002-2H6z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modules Section -->
    <section class="px-4 md:px-6 lg:px-8 py-12 bg-white">
        <div class="max-w-7xl mx-auto">
            <div class="mb-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Modul Pembelajaran</h2>
            </div>

            <!-- Modules Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
                <!-- Mengubah dari hardcoded ke dynamic menggunakan loop modules -->
                @forelse($modules as $module)
                    <div
                        class="bg-white rounded-xl shadow-md hover:shadow-lg transition border-l-4 
                    @if ($module['status'] === 'completed') border-green-500
                    @elseif($module['status'] === 'in_progress') border-blue-500
                    @else border-gray-300 @endif
                ">
                        <!-- Module Header -->
                        <div class="p-6 pb-4 border-b border-gray-100">
                            <div class="flex justify-between items-start mb-4">
                                <h3 class="text-lg font-bold text-gray-900 flex-1">
                                    {{ $module['title'] }}
                                </h3>
                                @if ($module['status'] === 'completed')
                                    <span
                                        class="px-3 py-1 bg-blue-100 text-blue-800 text-xs font-bold rounded-full">Selesai</span>
                                @elseif($module['status'] === 'in_progress')
                                    <span class="px-3 py-1 bg-blue-100 text-blue-800 text-xs font-bold rounded-full">Sedang
                                        Belajar</span>
                                @else
                                    <span
                                        class="px-3 py-1 bg-gray-100 text-gray-600 text-xs font-bold rounded-full">Terkunci</span>
                                @endif
                            </div>

                            <!-- Progress Bar -->
                            <div class="space-y-2">
                                <div class="flex justify-between items-center text-sm">
                                    <span class="text-gray-600">{{ $module['completedLessons'] }}/{{ $module['lessons'] }}
                                        Pelajaran</span>
                                    <span class="text-gray-900 font-bold">{{ $module['progress'] }}%</span>
                                </div>
                                <div class="w-full bg-gray-200 h-2 rounded-full overflow-hidden">
                                    <div class="bg-gradient-to-r from-blue-500 to-blue-600 h-full"
                                        style="width: {{ $module['progress'] }}%"></div>
                                </div>
                            </div>
                        </div>

                        <!-- Module Footer with Actions -->
                        <div class="p-6 pt-4">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-4">
                                    <div>
                                        <p class="text-2xl font-bold text-blue-600">{{ $module['points'] }}</p>
                                        <p class="text-xs text-gray-600">Poin</p>
                                    </div>
                                </div>

                                <!-- Action Button -->
                                @if ($module['status'] === 'locked')
                                    <button disabled
                                        class="px-6 py-3 bg-gray-300 text-gray-600 font-bold rounded-lg cursor-not-allowed">
                                        Terkunci
                                    </button>
                                @elseif($module['status'] === 'completed')
                                    <a href="{{ route('student.module.show', ['id' => $module['id']]) }}"
                                        class="px-6 py-3 bg-blue-600 text-white font-bold rounded-lg hover:bg-blue-700 transition">
                                        Review
                                    </a>
                                @else
                                    <a href="{{ route('student.module.show', ['id' => $module['id']]) }}"
                                        class="px-6 py-3 bg-blue-600 text-white font-bold rounded-lg hover:bg-blue-700 transition">
                                        Lanjutkan
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="col-span-full text-center text-gray-600">Tidak ada modul tersedia</p>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Achievements Section -->
    <section class="px-4 md:px-6 lg:px-8 py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-3xl font-bold text-gray-900 mb-8">Badge & Pencapaian</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <!-- Badge: Starter -->
                <div class="bg-white p-6 rounded-2xl shadow-sm text-center hover:shadow-md transition">
                    <div
                        class="w-20 h-20 bg-gradient-to-br from-blue-400 to-blue-500 rounded-full flex items-center justify-center mx-auto mb-4 shadow-lg">
                        <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-1">Starter</h3>
                    <p class="text-gray-600 text-sm">Selesaikan modul pertama</p>
                </div>

                <!-- Badge: Achiever -->
                <div class="bg-white p-6 rounded-2xl shadow-sm text-center hover:shadow-md transition">
                    <div
                        class="w-20 h-20 bg-gradient-to-br from-blue-400 to-blue-500 rounded-full flex items-center justify-center mx-auto mb-4 shadow-lg">
                        <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-1">Achiever</h3>
                    <p class="text-gray-600 text-sm">Raih 1000 poin</p>
                </div>

                <!-- Badge: Scholar -->
                <div class="bg-white p-6 rounded-2xl shadow-sm text-center hover:shadow-md transition">
                    <div
                        class="w-20 h-20 bg-gradient-to-br from-blue-400 to-blue-500 rounded-full flex items-center justify-center mx-auto mb-4 shadow-lg">
                        <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-1">Scholar</h3>
                    <p class="text-gray-600 text-sm">Selesaikan 5 modul</p>
                </div>

                <!-- Badge: Master -->
                <div class="bg-white p-6 rounded-2xl shadow-sm text-center hover:shadow-md transition opacity-50">
                    <div
                        class="w-20 h-20 bg-gradient-to-br from-gray-400 to-gray-500 rounded-full flex items-center justify-center mx-auto mb-4 shadow-lg">
                        <svg class="w-10 h-10 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-1">Master</h3>
                    <p class="text-gray-600 text-sm">Selesaikan semua modul</p>
                </div>
            </div>
        </div>
    </section>
@endsection
