@extends('dashboard.layouts.app')

@section('title', 'Jelajahi Kursus')
@section('page-title', 'Jelajahi Kursus')

@section('content')
    <div class="space-y-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Temukan Kursus yang Tepat untuk Anda</h1>
            <p class="text-gray-600 mt-1">Jelajahi berbagai kursus yang tersedia dan mulai belajar hari ini</p>
        </div>


        @if ($courses->isEmpty())
            <div class="bg-white rounded-lg shadow p-12 text-center">
                <svg class="mx-auto h-16 w-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
                <h3 class="mt-4 text-lg font-medium text-gray-900">Tidak ada kursus tersedia</h3>
                <p class="mt-2 text-gray-500">
                    @if ($allCourses->total() > 0)
                        Anda sudah mengikuti semua kursus yang tersedia.
                    @else
                        Saat ini belum ada kursus yang dapat Anda ikuti. Silakan hubungi guru untuk membuat kursus baru.
                    @endif
                </p>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($courses as $course)
                    <div class="bg-white rounded-lg shadow hover:shadow-xl transition overflow-hidden">
                        @if ($course->thumbnail)
                            <img src="{{ asset('storage/' . $course->thumbnail) }}" alt="{{ $course->title }}"
                                class="w-full h-48 object-cover">
                        @else
                            <div
                                class="w-full h-48 bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center">
                                <svg class="h-16 w-16 text-white opacity-50" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                </svg>
                            </div>
                        @endif

                        <div class="p-6">
                            <div class="flex items-center justify-between mb-2">
                                <span class="px-2 py-1 text-xs font-medium rounded-full bg-blue-100 text-blue-800">
                                    {{ ucfirst($course->level) }}
                                </span>
                                <span class="text-sm text-gray-500">{{ $course->duration_hours }} jam</span>
                            </div>

                            <h3 class="text-lg font-semibold text-gray-800 mb-2">{{ $course->title }}</h3>
                            <p class="text-gray-600 text-sm mb-4 line-clamp-3">{{ $course->description }}</p>

                            <div class="flex items-center text-sm text-gray-500 mb-4">
                                <img src="{{ $course->teacher->photo ?? 'https://ui-avatars.com/api/?name=' . urlencode($course->teacher->name) }}"
                                    alt="{{ $course->teacher->name }}" class="h-6 w-6 rounded-full mr-2">
                                <span>{{ $course->teacher->name }}</span>
                            </div>

                            <div class="flex items-center justify-between pt-4 border-t">
                                <span class="text-sm text-gray-500">
                                    <svg class="inline h-4 w-4 mr-1" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                    </svg>
                                    {{ $course->students_count }} siswa
                                </span>

                                <form action="{{ route('siswa.courses.enroll', $course) }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="px-4 py-2 bg-blue-600 text-white text-sm rounded-lg hover:bg-blue-700">
                                        Daftar
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-8">
                {{ $courses->links() }}
            </div>
        @endif
    </div>
@endsection
