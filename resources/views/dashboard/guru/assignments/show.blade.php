@extends('dashboard.layouts.app')

@section('title', 'Detail Tugas')
@section('page-title', $assignment->title)

@section('content')
    <div class="space-y-6">
        <!-- Assignment Details -->
        <div class="bg-white rounded-lg shadow p-6">
            <div class="border-b pb-4 mb-4">
                <h2 class="text-2xl font-bold text-gray-800">{{ $assignment->title }}</h2>
                <p class="text-gray-600 mt-1">Kursus: {{ $assignment->course->title }}</p>
            </div>

            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <p class="text-sm text-gray-600">Deadline</p>
                    <p class="font-medium">{{ $assignment->due_date->format('d M Y, H:i') }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Nilai Maksimal</p>
                    <p class="font-medium">{{ $assignment->max_score }}</p>
                </div>
            </div>

            <div>
                <p class="text-sm text-gray-600 mb-2">Deskripsi</p>
                <p class="text-gray-800">{{ $assignment->description }}</p>
            </div>
        </div>

        <!-- Submissions List -->
        <div class="bg-white rounded-lg shadow">
            <div class="p-6 border-b">
                <h3 class="text-xl font-bold text-gray-800">
                    Pengumpulan Tugas ({{ $assignment->submissions->count() }})
                </h3>
            </div>

            <div class="p-6">
                @if ($assignment->submissions->isEmpty())
                    <p class="text-center text-gray-500 py-8">Belum ada siswa yang mengumpulkan tugas</p>
                @else
                    <div class="space-y-4">
                        @foreach ($assignment->submissions as $submission)
                            <div class="border rounded-lg p-4">
                                <div class="flex items-start justify-between mb-3">
                                    <div>
                                        <h4 class="font-semibold text-gray-800">{{ $submission->student->name }}</h4>
                                        <p class="text-sm text-gray-500">{{ $submission->created_at->format('d M Y, H:i') }}
                                        </p>
                                    </div>
                                    <span
                                        class="px-3 py-1 rounded-full text-xs font-medium
                                        @if ($submission->status === 'graded') bg-blue-100 text-blue-800
                                        @else bg-blue-100 text-blue-800 @endif">
                                        {{ ucfirst($submission->status) }}
                                    </span>
                                </div>

                                <div class="bg-gray-50 rounded p-3 mb-3">
                                    <p class="text-sm text-gray-700">{{ $submission->content }}</p>
                                    @if ($submission->file_path)
                                        <a href="{{ asset('storage/' . $submission->file_path) }}" target="_blank"
                                            class="text-sm text-blue-600 hover:underline mt-2 inline-block">
                                            📎 Lihat File Lampiran
                                        </a>
                                    @endif
                                </div>

                                @if ($submission->status === 'submitted')
                                    <form action="{{ route('guru.assignments.grade', [$assignment, $submission]) }}"
                                        method="POST">
                                        @csrf
                                        <div class="grid grid-cols-12 gap-3">
                                            <div class="col-span-3">
                                                <input type="number" name="score" min="0"
                                                    max="{{ $assignment->max_score }}" placeholder="Nilai" required
                                                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                            </div>
                                            <div class="col-span-7">
                                                <input type="text" name="feedback" placeholder="Feedback (opsional)"
                                                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                            </div>
                                            <div class="col-span-2">
                                                <button type="submit"
                                                    class="w-full px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                                                    Nilai
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                @else
                                    <div class="bg-blue-50 rounded p-3">
                                        <div class="flex items-center justify-between">
                                            <div>
                                                <p class="text-sm font-medium text-blue-900">Nilai:
                                                    {{ $submission->score }}/{{ $assignment->max_score }}</p>
                                                @if ($submission->feedback)
                                                    <p class="text-sm text-blue-700 mt-1">{{ $submission->feedback }}</p>
                                                @endif
                                            </div>
                                            <p class="text-xs text-blue-600">Dinilai
                                                {{ $submission->graded_at->diffForHumans() }}</p>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
