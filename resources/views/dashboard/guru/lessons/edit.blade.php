@extends('dashboard.layouts.app')

@section('title', 'Edit Materi')
@section('page-title', 'Edit Materi Pembelajaran')

@section('content')
    <div class="max-w-3xl">
        <div class="bg-white rounded-lg shadow p-6">
            <div class="mb-6">
                <h2 class="text-2xl font-bold text-gray-800">Edit Materi</h2>
                <p class="text-gray-600 mt-1">Kursus: <strong>{{ $course->title }}</strong></p>
            </div>

            <form action="{{ route('guru.courses.lessons.update', [$course, $lesson]) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Judul Materi</label>
                        <input type="text" name="title" value="{{ old('title', $lesson->title) }}" required
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        @error('title')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Konten Materi</label>
                        <textarea name="content" rows="12" required
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('content', $lesson->content) }}</textarea>
                        @error('content')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">URL Video (Opsional)</label>
                        <input type="url" name="video_url" value="{{ old('video_url', $lesson->video_url) }}"
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        @error('video_url')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Durasi (Menit)</label>
                        <input type="number" name="duration_minutes"
                            value="{{ old('duration_minutes', $lesson->duration_minutes) }}" required min="1"
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        @error('duration_minutes')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mt-6 flex gap-3">
                    <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                        Update Materi
                    </button>
                    <a href="{{ route('guru.courses.show', $course) }}"
                        class="px-6 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
