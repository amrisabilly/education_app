@extends('dashboard.layouts.app')

@section('title', $course->title)
@section('page-title', 'Detail Kursus')

@section('content')
    <div class="space-y-6">
        <!-- Course Header -->
        <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-lg shadow p-6">
            <div class="flex items-start justify-between">
                <div class="flex-1">
                    <div class="flex items-center space-x-3 mb-2">
                        <h1 class="text-3xl font-bold text-gray-900">{{ $course->title }}</h1>
                        <span
                            class="px-3 py-1 text-sm font-medium rounded-full
                        @if ($course->status === 'published') bg-blue-100 text-blue-800
                        @elseif($course->status === 'draft') bg-blue-100 text-blue-800
                        @else bg-gray-100 text-gray-800 @endif">
                            {{ ucfirst($course->status) }}
                        </span>
                    </div>
                    <p class="text-gray-700 mt-2">{{ $course->description }}</p>

                    <div class="flex items-center mt-4 space-x-6 text-sm text-gray-600">
                        <span class="flex items-center">
                            <svg class="h-5 w-5 mr-2 text-blue-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                            {{ $course->students->count() }} siswa terdaftar
                        </span>
                        <span class="flex items-center">
                            <svg class="h-5 w-5 mr-2 text-blue-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            {{ $course->duration_hours }} jam
                        </span>
                        <span class="flex items-center">
                            <svg class="h-5 w-5 mr-2 text-blue-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z" />
                            </svg>
                            {{ ucfirst($course->level) }}
                        </span>
                    </div>
                </div>

                <div class="flex space-x-2">
                    <a href="{{ route('guru.courses.edit', $course) }}"
                        class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                        Edit Kursus
                    </a>
                </div>
            </div>
        </div>

        <!-- Lessons Section -->
        <div class="bg-white rounded-lg shadow">
            <div class="p-6 border-b border-gray-200">
                <div class="flex items-center justify-between">
                    <h2 class="text-xl font-bold text-gray-800">Materi Pembelajaran</h2>
                    <a href="{{ route('guru.courses.lessons.create', $course) }}"
                        class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 flex items-center space-x-2">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        <span>Tambah Materi</span>
                    </a>
                </div>
            </div>

            <div class="p-6">
                @if ($course->lessons->isEmpty())
                    <div class="text-center py-8">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        <p class="mt-2 text-gray-500">Belum ada materi. Mulai tambahkan materi pembelajaran.</p>
                    </div>
                @else
                    <div class="space-y-3">
                        @foreach ($course->lessons->sortBy('order') as $lesson)
                            <div
                                class="flex items-center justify-between p-4 bg-gradient-to-r from-blue-50 to-blue-100 rounded-lg hover:shadow transition">
                                <div class="flex items-center space-x-4">
                                    <div
                                        class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center text-white font-bold">
                                        {{ $lesson->order }}
                                    </div>
                                    <div>
                                        <h3 class="font-semibold text-gray-800">{{ $lesson->title }}</h3>
                                        <p class="text-sm text-gray-600">{{ $lesson->duration_minutes }} menit</p>
                                    </div>
                                </div>
                                <div class="flex space-x-2">
                                    <a href="{{ route('guru.courses.lessons.edit', [$course, $lesson]) }}"
                                        class="p-2 text-blue-600 hover:bg-blue-100 rounded">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                        </svg>
                                    </a>
                                    <form action="{{ route('guru.courses.lessons.destroy', [$course, $lesson]) }}"
                                        method="POST" onsubmit="return confirm('Yakin ingin menghapus materi ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 text-red-600 hover:bg-red-100 rounded">
                                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>

        <!-- Assignments Section -->
        <div class="bg-white rounded-lg shadow">
            <div class="p-6 border-b border-gray-200">
                <div class="flex items-center justify-between">
                    <h2 class="text-xl font-bold text-gray-800">Tugas & Penilaian</h2>
                    <a href="{{ route('guru.courses.assignments.create', $course) }}"
                        class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 flex items-center space-x-2">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        <span>Tambah Tugas</span>
                    </a>
                </div>
            </div>

            <div class="p-6">
                @if ($course->assignments->isEmpty())
                    <div class="text-center py-8">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                        <p class="mt-2 text-gray-500">Belum ada tugas. Tambahkan tugas untuk siswa.</p>
                    </div>
                @else
                    <div class="space-y-3">
                        @foreach ($course->assignments as $assignment)
                            <div
                                class="flex items-center justify-between p-4 bg-gradient-to-r from-green-50 to-emerald-50 rounded-lg hover:shadow transition">
                                <div>
                                    <h3 class="font-semibold text-gray-800">{{ $assignment->title }}</h3>
                                    <p class="text-sm text-gray-600">Deadline:
                                        {{ $assignment->due_date->format('d M Y') }}</p>
                                    <p class="text-sm text-gray-500">Max Score: {{ $assignment->max_score }}</p>
                                </div>
                                <div class="flex space-x-2">
                                    <button class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">
                                        Lihat Submisi
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>

        <!-- Enrolled Students -->
        <div class="bg-white rounded-lg shadow">
            <div class="p-6 border-b border-gray-200">
                <h2 class="text-xl font-bold text-gray-800">Siswa Terdaftar ({{ $course->students->count() }})</h2>
            </div>

            <div class="p-6">
                @if ($course->students->isEmpty())
                    <div class="text-center py-8">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        <p class="mt-2 text-gray-500">Belum ada siswa yang mendaftar.</p>
                    </div>
                @else
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach ($course->students as $student)
                            <div class="flex items-center space-x-3 p-4 bg-gray-50 rounded-lg">
                                <img src="{{ $student->photo ? asset('storage/' . $student->photo) : 'https://ui-avatars.com/api/?name=' . urlencode($student->name) }}"
                                    alt="{{ $student->name }}" class="h-12 w-12 rounded-full">
                                <div>
                                    <h4 class="font-medium text-gray-800">{{ $student->name }}</h4>
                                    <p class="text-sm text-gray-600">{{ $student->email }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
