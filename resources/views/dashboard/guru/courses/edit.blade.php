@extends('dashboard.layouts.app')

@section('title', 'Edit Kursus')
@section('page-title', 'Edit Kursus')

@section('content')
    <div class="max-w-3xl mx-auto">
        <div class="bg-white rounded-lg shadow p-6">
            <form action="{{ route('guru.courses.update', $course) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="space-y-6">
                    <!-- Title -->
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700">Judul Kursus</label>
                        <input type="text" name="title" id="title" value="{{ old('title', $course->title) }}"
                            required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        @error('title')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                        <textarea name="description" id="description" rows="4" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('description', $course->description) }}</textarea>
                        @error('description')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Level -->
                    <div>
                        <label for="level" class="block text-sm font-medium text-gray-700">Level</label>
                        <select name="level" id="level" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            <option value="beginner" {{ old('level', $course->level) === 'beginner' ? 'selected' : '' }}>
                                Beginner</option>
                            <option value="intermediate"
                                {{ old('level', $course->level) === 'intermediate' ? 'selected' : '' }}>Intermediate
                            </option>
                            <option value="advanced" {{ old('level', $course->level) === 'advanced' ? 'selected' : '' }}>
                                Advanced</option>
                        </select>
                        @error('level')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Status -->
                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                        <select name="status" id="status" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            <option value="draft" {{ old('status', $course->status) === 'draft' ? 'selected' : '' }}>Draft
                            </option>
                            <option value="published"
                                {{ old('status', $course->status) === 'published' ? 'selected' : '' }}>Published</option>
                            <option value="archived" {{ old('status', $course->status) === 'archived' ? 'selected' : '' }}>
                                Archived</option>
                        </select>
                        @error('status')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Duration -->
                    <div>
                        <label for="duration_hours" class="block text-sm font-medium text-gray-700">Durasi (jam)</label>
                        <input type="number" name="duration_hours" id="duration_hours"
                            value="{{ old('duration_hours', $course->duration_hours) }}" min="1" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        @error('duration_hours')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Thumbnail -->
                    <div>
                        <label for="thumbnail" class="block text-sm font-medium text-gray-700">Thumbnail</label>
                        @if ($course->thumbnail)
                            <img src="{{ asset('storage/' . $course->thumbnail) }}" alt="Current thumbnail"
                                class="mt-2 h-32 w-auto rounded">
                        @endif
                        <input type="file" name="thumbnail" id="thumbnail" accept="image/*"
                            class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                        @error('thumbnail')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Buttons -->
                    <div class="flex items-center justify-end space-x-3 pt-4 border-t">
                        <a href="{{ route('guru.courses') }}"
                            class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300">
                            Batal
                        </a>
                        <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                            Update Kursus
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
