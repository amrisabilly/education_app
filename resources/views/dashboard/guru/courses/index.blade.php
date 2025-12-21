@extends('dashboard.layouts.app')

@section('title', 'Kursus Saya')
@section('page-title', 'Kursus Saya')

@section('content')
    <div class="space-y-6">
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-bold text-gray-800">Kelola Kursus</h1>
            <a href="{{ route('guru.courses.create') }}"
                class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                + Buat Kursus Baru
            </a>
        </div>

        @if ($courses->isEmpty())
            <div class="bg-white rounded-lg shadow p-12 text-center">
                <svg class="mx-auto h-16 w-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
                <h3 class="mt-4 text-lg font-medium text-gray-900">Belum ada kursus</h3>
                <p class="mt-2 text-gray-500">Mulai dengan membuat kursus pertama Anda.</p>
                <a href="{{ route('guru.courses.create') }}"
                    class="mt-4 inline-block px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                    Buat Kursus
                </a>
            </div>
        @else
            <div class="grid grid-cols-1 gap-6">
                @foreach ($courses as $course)
                    <div class="bg-white rounded-lg shadow hover:shadow-lg transition">
                        <div class="p-6">
                            <div class="flex items-start justify-between">
                                <div class="flex-1">
                                    <div class="flex items-center space-x-3">
                                        <h3 class="text-xl font-semibold text-gray-800">{{ $course->title }}</h3>
                                        <span
                                            class="px-3 py-1 text-xs font-medium rounded-full
                                        @if ($course->status === 'published') bg-green-100 text-green-800
                                        @elseif($course->status === 'draft') bg-yellow-100 text-yellow-800
                                        @else bg-gray-100 text-gray-800 @endif">
                                            {{ ucfirst($course->status) }}
                                        </span>
                                    </div>
                                    <p class="text-gray-600 mt-2">{{ Str::limit($course->description, 150) }}</p>

                                    <div class="flex items-center mt-4 space-x-6 text-sm text-gray-500">
                                        <span class="flex items-center">
                                            <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                            </svg>
                                            {{ $course->students_count }} siswa terdaftar
                                        </span>
                                        <span class="flex items-center">
                                            <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            {{ $course->duration_hours }} jam
                                        </span>
                                        <span class="flex items-center">
                                            <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z" />
                                            </svg>
                                            {{ ucfirst($course->level) }}
                                        </span>
                                    </div>
                                </div>

                                <div class="ml-6 flex flex-col space-y-2">
                                    @if ($course->status === 'draft')
                                        <form action="{{ route('guru.courses.toggle-publish', $course) }}" method="POST">
                                            @csrf
                                            <button type="submit"
                                                class="w-full px-4 py-2 bg-green-600 text-white text-sm rounded-lg hover:bg-green-700">
                                                <svg class="inline h-4 w-4 mr-1" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M5 13l4 4L19 7" />
                                                </svg>
                                                Publish
                                            </button>
                                        </form>
                                    @elseif($course->status === 'published')
                                        <form action="{{ route('guru.courses.toggle-publish', $course) }}" method="POST">
                                            @csrf
                                            <button type="submit"
                                                class="w-full px-4 py-2 bg-yellow-600 text-white text-sm rounded-lg hover:bg-yellow-700">
                                                <svg class="inline h-4 w-4 mr-1" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                                Unpublish
                                            </button>
                                        </form>
                                    @endif
                                    <a href="{{ route('guru.courses.show', $course) }}"
                                        class="px-4 py-2 bg-blue-600 text-white text-sm rounded-lg hover:bg-blue-700 text-center">
                                        Detail
                                    </a>
                                    <a href="{{ route('guru.courses.edit', $course) }}"
                                        class="px-4 py-2 bg-gray-200 text-gray-700 text-sm rounded-lg hover:bg-gray-300 text-center">
                                        Edit
                                    </a>
                                    <form action="{{ route('guru.courses.delete', $course) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus kursus ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="w-full px-4 py-2 bg-red-600 text-white text-sm rounded-lg hover:bg-red-700">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-6">
                {{ $courses->links() }}
            </div>
        @endif
    </div>
@endsection
