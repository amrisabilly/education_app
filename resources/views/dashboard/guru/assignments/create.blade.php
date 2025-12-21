@extends('dashboard.layouts.app')

@section('title', 'Tambah Tugas')
@section('page-title', 'Tambah Tugas Baru')

@section('content')
    <div class="max-w-3xl">
        <div class="bg-white rounded-lg shadow p-6">
            <div class="mb-6">
                <h2 class="text-2xl font-bold text-gray-800">Tambah Tugas Baru</h2>
                <p class="text-gray-600 mt-1">Kursus: <strong>{{ $course->title }}</strong></p>
            </div>

            <form action="{{ route('guru.courses.assignments.store', $course) }}" method="POST">
                @csrf

                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Judul Tugas</label>
                        <input type="text" name="title" value="{{ old('title') }}" required
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                            placeholder="Contoh: Latihan Soal Aljabar">
                        @error('title')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Deskripsi Tugas</label>
                        <textarea name="description" rows="6" required
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                            placeholder="Jelaskan detail tugas yang harus dikerjakan siswa...">{{ old('description') }}</textarea>
                        @error('description')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal Deadline</label>
                            <input type="datetime-local" name="due_date" value="{{ old('due_date') }}" required
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            @error('due_date')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Nilai Maksimal</label>
                            <input type="number" name="max_score" value="{{ old('max_score', 100) }}" required
                                min="1" max="100"
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            @error('max_score')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mt-6 flex gap-3">
                    <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                        Simpan Tugas
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
