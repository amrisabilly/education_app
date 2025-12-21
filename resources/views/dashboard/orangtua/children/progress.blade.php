@extends('dashboard.layouts.app')

@section('title', 'Progress ' . $child->name)
@section('page-title', 'Progress Belajar - ' . $child->name)

@section('content')
    <div class="space-y-6">
        <!-- Child Info -->
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <img src="{{ $child->photo ?? 'https://ui-avatars.com/api/?name=' . urlencode($child->name) }}"
                    alt="{{ $child->name }}" class="h-20 w-20 rounded-full">
                <div class="ml-6">
                    <h2 class="text-2xl font-bold text-gray-800">{{ $child->name }}</h2>
                    <p class="text-gray-600">{{ $child->email }}</p>
                </div>
            </div>
        </div>

        <!-- Course Progress -->
        <div class="bg-white rounded-lg shadow">
            <div class="p-6 border-b border-gray-200">
                <h2 class="text-xl font-semibold text-gray-800">Progress Kursus</h2>
            </div>

            <div class="p-6">
                @if ($enrollments->isEmpty())
                    <p class="text-gray-500 text-center py-8">Belum mengikuti kursus apapun.</p>
                @else
                    <div class="space-y-4">
                        @foreach ($enrollments as $enrollment)
                            <div class="border border-gray-200 rounded-lg p-4">
                                <div class="flex items-start justify-between mb-3">
                                    <div>
                                        <h3 class="font-semibold text-gray-800">{{ $enrollment->course->title }}</h3>
                                        <p class="text-sm text-gray-600">Pengajar: {{ $enrollment->course->teacher->name }}
                                        </p>
                                    </div>
                                    <span
                                        class="px-3 py-1 text-xs font-medium rounded-full
                                    @if ($enrollment->status === 'completed') bg-green-100 text-green-800
                                    @elseif($enrollment->status === 'active') bg-blue-100 text-blue-800
                                    @else bg-gray-100 text-gray-800 @endif">
                                        {{ ucfirst($enrollment->status) }}
                                    </span>
                                </div>

                                <div>
                                    <div class="flex items-center justify-between text-sm mb-1">
                                        <span class="text-gray-600">Progress</span>
                                        <span class="font-medium text-gray-700">{{ $enrollment->progress }}%</span>
                                    </div>
                                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                                        <div class="bg-purple-600 h-2.5 rounded-full"
                                            style="width: {{ $enrollment->progress }}%"></div>
                                    </div>
                                </div>

                                <p class="text-sm text-gray-500 mt-3">
                                    Terdaftar sejak: {{ $enrollment->enrolled_at->format('d M Y') }}
                                    @if ($enrollment->completed_at)
                                        | Selesai: {{ $enrollment->completed_at->format('d M Y') }}
                                    @endif
                                </p>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>

        <!-- Recent Submissions -->
        <div class="bg-white rounded-lg shadow">
            <div class="p-6 border-b border-gray-200">
                <h2 class="text-xl font-semibold text-gray-800">Tugas Terbaru</h2>
            </div>

            <div class="p-6">
                @if ($submissions->isEmpty())
                    <p class="text-gray-500 text-center py-8">Belum ada submission tugas.</p>
                @else
                    <div class="space-y-4">
                        @foreach ($submissions as $submission)
                            <div class="border border-gray-200 rounded-lg p-4">
                                <div class="flex items-start justify-between">
                                    <div class="flex-1">
                                        <h3 class="font-semibold text-gray-800">{{ $submission->assignment->title }}</h3>
                                        <p class="text-sm text-gray-600">Kursus:
                                            {{ $submission->assignment->course->title }}</p>
                                        <p class="text-sm text-gray-500 mt-2">Dikumpulkan:
                                            {{ $submission->submitted_at->format('d M Y H:i') }}</p>
                                    </div>
                                    <div class="text-right">
                                        @if ($submission->score !== null)
                                            <div class="text-2xl font-bold text-green-600">{{ $submission->score }}</div>
                                            <p class="text-sm text-gray-500">/ {{ $submission->assignment->max_score }}</p>
                                        @else
                                            <span
                                                class="px-3 py-1 text-xs font-medium rounded-full bg-yellow-100 text-yellow-800">
                                                Belum dinilai
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                @if ($submission->feedback)
                                    <div class="mt-3 p-3 bg-gray-50 rounded-lg">
                                        <p class="text-sm font-medium text-gray-700">Feedback:</p>
                                        <p class="text-sm text-gray-600 mt-1">{{ $submission->feedback }}</p>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>

        <div class="flex justify-end">
            <a href="{{ route('orangtua.dashboard') }}"
                class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300">
                Kembali
            </a>
        </div>
    </div>
@endsection
