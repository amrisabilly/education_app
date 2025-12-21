@extends('dashboard.layouts.app')

@section('title', 'Kursus Saya')
@section('page-title', 'Kursus Saya')

@section('content')
    <div class="space-y-6">
        @if ($enrolledCourses->isEmpty())
            <div class="bg-white rounded-lg shadow p-12 text-center">
                <svg class="mx-auto h-16 w-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
                <h3 class="mt-4 text-lg font-medium text-gray-900">Belum ada kursus</h3>
                <p class="mt-2 text-gray-500">Mulai dengan jelajahi kursus yang tersedia.</p>
                <a href="{{ route('siswa.courses.browse') }}"
                    class="mt-4 inline-block px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                    Jelajahi Kursus
                </a>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($enrolledCourses as $course)
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
                            <h3 class="text-lg font-semibold text-gray-800 mb-2">{{ $course->title }}</h3>
                            <p class="text-gray-600 text-sm mb-3">Pengajar: {{ $course->teacher->name }}</p>

                            <!-- Progress -->
                            @php
                                $enrollment = $course->enrollments->where('student_id', auth()->id())->first();
                            @endphp
                            <div class="mb-4">
                                <div class="flex items-center justify-between text-sm mb-1">
                                    <span class="text-gray-600">Progress</span>
                                    <span class="font-medium text-gray-700">{{ $enrollment->progress ?? 0 }}%</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2">
                                    <div class="bg-blue-600 h-2 rounded-full"
                                        style="width: {{ $enrollment->progress ?? 0 }}%"></div>
                                </div>
                            </div>

                            <a href="{{ route('siswa.courses.show', $course) }}"
                                class="block w-full text-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                                Lanjutkan Belajar
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-8">
                {{ $enrolledCourses->links() }}
            </div>
        @endif
    </div>
@endsection
