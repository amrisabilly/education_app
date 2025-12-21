@extends('dashboard.layouts.app')

@section('title', 'Daftar Tugas')
@section('page-title', 'Manajemen Tugas')

@section('content')
    <div class="space-y-6">
        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-lg shadow p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-blue-600">Total Tugas</p>
                        <p class="text-3xl font-bold text-blue-900 mt-2">{{ $assignments->total() }}</p>
                    </div>
                    <div class="p-3 bg-blue-600 rounded-lg">
                        <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-lg shadow p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-blue-600">Menunggu Penilaian</p>
                        <p class="text-3xl font-bold text-blue-900 mt-2">{{ $pendingSubmissions }}</p>
                    </div>
                    <div class="p-3 bg-blue-600 rounded-lg">
                        <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-lg shadow p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-blue-600">Total Submission</p>
                        <p class="text-3xl font-bold text-blue-900 mt-2">
                            {{ $assignments->sum(function ($a) {return $a->submissions->count();}) }}
                        </p>
                    </div>
                    <div class="p-3 bg-blue-600 rounded-lg">
                        <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Assignments List -->
        <div class="bg-white rounded-lg shadow">
            <div class="p-6 border-b">
                <h2 class="text-xl font-bold text-gray-800">Semua Tugas</h2>
            </div>

            <div class="p-6">
                @if ($assignments->isEmpty())
                    <div class="text-center py-12">
                        <svg class="mx-auto h-16 w-16 text-gray-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                        <h3 class="mt-4 text-lg font-medium text-gray-900">Belum ada tugas</h3>
                        <p class="mt-2 text-gray-500">Mulai dengan membuat tugas di kursus Anda.</p>
                        <a href="{{ route('guru.courses') }}"
                            class="mt-4 inline-block px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                            Lihat Kursus
                        </a>
                    </div>
                @else
                    <div class="space-y-4">
                        @foreach ($assignments as $assignment)
                            <div class="border rounded-lg p-6 hover:shadow-md transition">
                                <div class="flex items-start justify-between">
                                    <div class="flex-1">
                                        <div class="flex items-center gap-3 mb-2">
                                            <h3 class="text-lg font-semibold text-gray-800">
                                                {{ $assignment->title }}
                                            </h3>
                                            @php
                                                $isOverdue = $assignment->due_date->isPast();
                                                $pending = $assignment->submissions
                                                    ->where('status', 'submitted')
                                                    ->count();
                                            @endphp
                                            @if ($pending > 0)
                                                <span
                                                    class="px-3 py-1 bg-blue-100 text-blue-800 text-xs font-medium rounded-full">
                                                    {{ $pending }} menunggu
                                                </span>
                                            @endif
                                        </div>

                                        <div class="flex items-center gap-2 text-sm text-gray-600 mb-3">
                                            <span class="px-3 py-1 bg-blue-50 text-blue-700 rounded-full">
                                                {{ $assignment->course->title }}
                                            </span>
                                        </div>

                                        <p class="text-gray-600 text-sm mb-4">
                                            {{ Str::limit($assignment->description, 150) }}</p>

                                        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 text-sm">
                                            <div class="flex items-center text-gray-600">
                                                <svg class="h-5 w-5 mr-2 text-blue-600" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                                <span>
                                                    Deadline:
                                                    <strong class="{{ $isOverdue ? 'text-red-600' : 'text-gray-800' }}">
                                                        {{ $assignment->due_date->format('d M Y, H:i') }}
                                                    </strong>
                                                </span>
                                            </div>

                                            <div class="flex items-center text-gray-600">
                                                <svg class="h-5 w-5 mr-2 text-blue-600" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                                <span>Max Score: <strong>{{ $assignment->max_score }}</strong></span>
                                            </div>

                                            <div class="flex items-center text-gray-600">
                                                <svg class="h-5 w-5 mr-2 text-blue-600" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                                </svg>
                                                <span>
                                                    Submissions: <strong>{{ $assignment->submissions->count() }}</strong>
                                                </span>
                                            </div>

                                            <div class="flex items-center text-gray-600">
                                                <svg class="h-5 w-5 mr-2 text-blue-600" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                                                </svg>
                                                <span>
                                                    Graded:
                                                    <strong>{{ $assignment->submissions->where('status', 'graded')->count() }}</strong>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex flex-col gap-2 ml-4">
                                        <a href="{{ route('guru.assignments.show', $assignment) }}"
                                            class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 text-sm whitespace-nowrap">
                                            Lihat Detail
                                        </a>
                                        <a href="{{ route('guru.courses.assignments.edit', [$assignment->course, $assignment]) }}"
                                            class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 text-sm whitespace-nowrap">
                                            Edit
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="mt-6">
                        {{ $assignments->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
