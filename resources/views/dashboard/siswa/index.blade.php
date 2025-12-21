@extends('dashboard.layouts.app')

@section('title', 'Dashboard Siswa')
@section('page-title', 'Dashboard Siswa')

@section('content')
    <div class="space-y-6">
        <!-- Welcome Section -->
        <div class="bg-gradient-to-r from-blue-500 to-blue-600 rounded-lg shadow-lg p-6 text-white">
            <h1 class="text-2xl font-bold">Selamat Datang, {{ auth()->user()->name }}!</h1>
            <p class="mt-2 text-blue-100">Mari lanjutkan pembelajaran Anda hari ini</p>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-lg shadow-lg p-6 border border-blue-200">
                <div class="flex items-center">
                    <div class="p-3 rounded-xl bg-blue-600 shadow">
                        <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-blue-700 text-sm font-medium">Kursus Aktif</p>
                        <p class="text-3xl font-bold text-blue-900">{{ $totalCourses }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-lg shadow-lg p-6 border border-blue-200">
                <div class="flex items-center">
                    <div class="p-3 rounded-xl bg-blue-600 shadow">
                        <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-blue-700 text-sm font-medium">Kursus Selesai</p>
                        <p class="text-3xl font-bold text-blue-900">{{ $completedCourses }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-lg shadow-lg p-6 border border-blue-200">
                <div class="flex items-center">
                    <div class="p-3 rounded-xl bg-blue-600 shadow">
                        <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-blue-700 text-sm font-medium">Tugas Pending</p>
                        <p class="text-3xl font-bold text-blue-900">{{ $pendingAssignments }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- My Courses -->
        <div class="bg-white rounded-lg shadow">
            <div class="p-6 border-b border-gray-200">
                <div class="flex items-center justify-between">
                    <h2 class="text-xl font-semibold text-gray-800">Kursus Saya</h2>
                    <a href="{{ route('siswa.courses.browse') }}"
                        class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                        Jelajahi Kursus →
                    </a>
                </div>
            </div>

            <div class="p-6">
                @if ($enrollments->isEmpty())
                    <div class="text-center py-12">
                        <svg class="mx-auto h-16 w-16 text-gray-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                        <h3 class="mt-4 text-lg font-medium text-gray-900">Belum ada kursus</h3>
                        <p class="mt-2 text-gray-500">Mulai jelajahi dan daftar ke kursus yang Anda minati.</p>
                        <a href="{{ route('siswa.courses.browse') }}"
                            class="mt-4 inline-block px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                            Jelajahi Kursus
                        </a>
                    </div>
                @else
                    <div class="space-y-4">
                        @foreach ($enrollments as $enrollment)
                            <div class="border border-gray-200 rounded-lg p-4 hover:border-blue-500 transition">
                                <div class="flex items-start justify-between">
                                    <div class="flex-1">
                                        <h3 class="text-lg font-semibold text-gray-800">{{ $enrollment->course->title }}
                                        </h3>
                                        <p class="text-gray-600 text-sm mt-1">Pengajar:
                                            {{ $enrollment->course->teacher->name }}</p>

                                        <!-- Progress Bar -->
                                        <div class="mt-3">
                                            <div class="flex items-center justify-between text-sm mb-1">
                                                <span class="text-gray-600">Progress</span>
                                                <span class="font-medium text-gray-700">{{ $enrollment->progress }}%</span>
                                            </div>
                                            <div class="w-full bg-gray-200 rounded-full h-2">
                                                <div class="bg-blue-600 h-2 rounded-full"
                                                    style="width: {{ $enrollment->progress }}%"></div>
                                            </div>
                                        </div>

                                        <div class="flex items-center mt-3 space-x-4 text-sm text-gray-500">
                                            <span
                                                class="px-2 py-1 text-xs rounded-full
                                            @if ($enrollment->status === 'completed') bg-green-100 text-green-800
                                            @elseif($enrollment->status === 'active') bg-blue-100 text-blue-800
                                            @else bg-gray-100 text-gray-800 @endif">
                                                {{ ucfirst($enrollment->status) }}
                                            </span>
                                            <span>Terdaftar: {{ $enrollment->enrolled_at->format('d M Y') }}</span>
                                        </div>
                                    </div>
                                    <a href="{{ route('siswa.courses.show', $enrollment->course) }}"
                                        class="ml-4 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                                        Lanjutkan
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="mt-6 text-center">
                        <a href="{{ route('siswa.courses') }}" class="text-blue-600 hover:text-blue-800">Lihat Semua Kursus
                            →</a>
                    </div>
                @endif
            </div>
        </div>

        <!-- Available Courses -->
        @if ($availableCourses->isNotEmpty())
            <div class="bg-white rounded-lg shadow">
                <div class="p-6 border-b border-gray-200">
                    <div class="flex items-center justify-between">
                        <h2 class="text-xl font-semibold text-gray-800">Kursus Tersedia</h2>
                        <a href="{{ route('siswa.courses.browse') }}"
                            class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                            Lihat Semua →
                        </a>
                    </div>
                </div>

                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($availableCourses as $course)
                            <div
                                class="bg-white border border-gray-200 rounded-lg shadow hover:shadow-lg transition overflow-hidden">
                                @if ($course->thumbnail)
                                    <img src="{{ asset('storage/' . $course->thumbnail) }}" alt="{{ $course->title }}"
                                        class="w-full h-40 object-cover">
                                @else
                                    <div
                                        class="w-full h-40 bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center">
                                        <svg class="h-12 w-12 text-white opacity-50" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                        </svg>
                                    </div>
                                @endif

                                <div class="p-4">
                                    <div class="flex items-center justify-between mb-2">
                                        <span class="px-2 py-1 text-xs font-medium rounded-full bg-blue-100 text-blue-800">
                                            {{ ucfirst($course->level) }}
                                        </span>
                                        <span class="text-xs text-gray-500">
                                            <svg class="inline h-4 w-4" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                            </svg>
                                            {{ $course->students_count }} siswa
                                        </span>
                                    </div>

                                    <h3 class="text-base font-semibold text-gray-800 mb-1 line-clamp-2">
                                        {{ $course->title }}</h3>
                                    <p class="text-gray-600 text-xs mb-3">Oleh: {{ $course->teacher->name }}</p>

                                    <form action="{{ route('siswa.courses.enroll', $course) }}" method="POST">
                                        @csrf
                                        <button type="submit"
                                            class="w-full px-4 py-2 bg-blue-600 text-white text-sm rounded-lg hover:bg-blue-700">
                                            Daftar Sekarang
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
