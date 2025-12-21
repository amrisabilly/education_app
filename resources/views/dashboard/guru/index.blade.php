@extends('dashboard.layouts.app')

@section('title', 'Dashboard Guru')
@section('page-title', 'Dashboard Guru')

@section('content')
    <div class="space-y-6">
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
                        <p class="text-blue-700 text-sm font-medium">Total Kursus</p>
                        <p class="text-3xl font-bold text-blue-900">{{ $totalCourses }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-lg shadow-lg p-6 border border-blue-200">
                <div class="flex items-center">
                    <div class="p-3 rounded-xl bg-blue-600 shadow">
                        <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-blue-700 text-sm font-medium">Total Siswa</p>
                        <p class="text-3xl font-bold text-blue-900">{{ $totalStudents }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-lg shadow-lg p-6 border border-blue-200">
                <div class="flex items-center">
                    <div class="p-3 rounded-xl bg-blue-600 shadow">
                        <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-blue-700 text-sm font-medium">Tugas Pending</p>
                        <p class="text-3xl font-bold text-blue-900">{{ $pendingSubmissions }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Courses List -->
        <div class="bg-white rounded-lg shadow">
            <div class="p-6 border-b border-gray-200">
                <div class="flex items-center justify-between">
                    <h2 class="text-xl font-semibold text-gray-800">Kursus Saya</h2>
                    <a href="{{ route('guru.courses.create') }}"
                        class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                        + Buat Kursus Baru
                    </a>
                </div>
            </div>

            <div class="p-6">
                @if ($courses->isEmpty())
                    <p class="text-gray-500 text-center py-8">Belum ada kursus. Mulai buat kursus pertama Anda!</p>
                @else
                    <div class="space-y-4">
                        @foreach ($courses as $course)
                            <div class="border border-gray-200 rounded-lg p-4 hover:border-blue-500 transition">
                                <div class="flex items-start justify-between">
                                    <div class="flex-1">
                                        <h3 class="text-lg font-semibold text-gray-800">{{ $course->title }}</h3>
                                        <p class="text-gray-600 text-sm mt-1 line-clamp-2">{{ $course->description }}</p>
                                        <div class="flex items-center mt-3 space-x-4 text-sm text-gray-500">
                                            <span class="flex items-center">
                                                <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                                </svg>
                                                {{ $course->students_count }} siswa
                                            </span>
                                            <span class="flex items-center">
                                                <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                                </svg>
                                                {{ $course->lessons_count }} materi
                                            </span>
                                            <span
                                                class="px-2 py-1 text-xs rounded-full
                                            @if ($course->status === 'published') bg-blue-100 text-blue-800
                                            @elseif($course->status === 'draft') bg-blue-100 text-blue-800
                                            @else bg-gray-100 text-gray-800 @endif">
                                                {{ ucfirst($course->status) }}
                                            </span>
                                        </div>
                                    </div>
                                    <a href="{{ route('guru.courses.show', $course) }}"
                                        class="ml-4 text-blue-600 hover:text-blue-800">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 5l7 7-7 7" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="mt-6 text-center">
                        <a href="{{ route('guru.courses') }}" class="text-blue-600 hover:text-blue-800">Lihat Semua Kursus
                            →</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
