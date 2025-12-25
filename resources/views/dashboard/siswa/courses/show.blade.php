@extends('dashboard.layouts.app')

@section('title', $course->title)
@section('page-title', 'Detail Kursus')

@section('content')
    <div class="space-y-6">
        <!-- Course Header -->
        <div class="bg-gradient-to-br from-blue-50 to-purple-50 rounded-lg shadow p-6">
            <div class="flex items-start justify-between">
                <div class="flex-1">
                    <h1 class="text-3xl font-bold text-gray-900">{{ $course->title }}</h1>
                    <p class="text-gray-700 mt-2">{{ $course->description }}</p>

                    <div class="flex items-center mt-4 space-x-6 text-sm text-gray-600">
                        <span class="flex items-center">
                            <img src="{{ $course->teacher->photo ? asset('storage/' . $course->teacher->photo) : 'https://ui-avatars.com/api/?name=' . urlencode($course->teacher->name) }}"
                                alt="{{ $course->teacher->name }}" class="h-6 w-6 rounded-full mr-2">
                            {{ $course->teacher->name }}
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
            </div>

            <!-- Progress Bar -->
            <div class="mt-6">
                <div class="flex items-center justify-between mb-2">
                    <span class="text-sm font-medium text-gray-700">Progress Pembelajaran</span>
                    <span class="text-sm font-bold text-blue-600">{{ $enrollment->progress }}%</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-3">
                    <div class="bg-gradient-to-r from-blue-500 to-blue-700 h-3 rounded-full transition-all duration-500"
                        style="width: {{ $enrollment->progress }}%"></div>
                </div>
            </div>
        </div>

        <!-- Course Content Tabs -->
        <div class="bg-white rounded-lg shadow" x-data="{ activeTab: 'lessons' }">
            <!-- Tab Headers -->
            <div class="border-b border-gray-200">
                <nav class="flex space-x-8 px-6" aria-label="Tabs">
                    <button @click="activeTab = 'lessons'"
                        :class="activeTab === 'lessons' ? 'border-blue-600 text-blue-600' :
                            'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'"
                        class="py-4 px-1 border-b-2 font-medium text-sm transition">
                        Materi Pembelajaran
                    </button>
                    <button @click="activeTab = 'assignments'"
                        :class="activeTab === 'assignments' ? 'border-blue-600 text-blue-600' :
                            'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'"
                        class="py-4 px-1 border-b-2 font-medium text-sm transition">
                        Tugas
                    </button>
                </nav>
            </div>

            <!-- Tab Content -->
            <div class="p-6">
                <!-- Lessons Tab -->
                <div x-show="activeTab === 'lessons'" x-transition>
                    @if ($course->lessons->isEmpty())
                        <div class="text-center py-8">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            <p class="mt-2 text-gray-500">Belum ada materi pembelajaran.</p>
                        </div>
                    @else
                        <div class="space-y-3">
                            @foreach ($course->lessons->sortBy('order') as $lesson)
                                <div
                                    class="flex items-center justify-between p-4 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-lg hover:shadow transition cursor-pointer">
                                    <div class="flex items-center space-x-4 flex-1">
                                        <div
                                            class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center text-white font-bold flex-shrink-0">
                                            {{ $lesson->order }}
                                        </div>
                                        <div class="flex-1">
                                            <h3 class="font-semibold text-gray-800">{{ $lesson->title }}</h3>
                                            <p class="text-sm text-gray-600">{{ $lesson->duration_minutes }} menit</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center space-x-3">
                                        @if ($lesson->video_url)
                                            <span
                                                class="px-3 py-1 bg-blue-100 text-blue-600 text-xs font-medium rounded-full">
                                                Video
                                            </span>
                                        @endif
                                        <a href="{{ route('siswa.lessons.show', [$course, $lesson]) }}"
                                            class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 flex items-center space-x-2">
                                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            <span>Mulai</span>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>

                <!-- Assignments Tab -->
                <div x-show="activeTab === 'assignments'" x-transition>
                    @if ($course->assignments->isEmpty())
                        <div class="text-center py-8">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                            </svg>
                            <p class="mt-2 text-gray-500">Belum ada tugas.</p>
                        </div>
                    @else
                        <div class="space-y-4">
                            @foreach ($course->assignments as $assignment)
                                @php
                                    $submission = $assignment->submissions->where('student_id', auth()->id())->first();
                                @endphp
                                <div
                                    class="p-4 bg-gradient-to-r from-blue-50 to-blue-100 rounded-lg border border-blue-200">
                                    <div class="flex items-start justify-between">
                                        <div class="flex-1">
                                            <h3 class="font-semibold text-gray-800 text-lg">{{ $assignment->title }}</h3>
                                            <p class="text-gray-600 mt-1">{{ $assignment->description }}</p>

                                            <div class="flex items-center mt-3 space-x-4 text-sm text-gray-600">
                                                <span class="flex items-center">
                                                    <svg class="h-5 w-5 mr-1 text-blue-600" fill="none"
                                                        stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                    </svg>
                                                    Deadline: {{ $assignment->due_date->format('d M Y H:i') }}
                                                </span>
                                                <span class="flex items-center">
                                                    <svg class="h-5 w-5 mr-1 text-blue-600" fill="none"
                                                        stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                                                    </svg>
                                                    Max Score: {{ $assignment->max_score }}
                                                </span>
                                            </div>

                                            @if ($submission)
                                                <div class="mt-3 p-3 bg-white rounded border border-blue-300">
                                                    <div class="flex items-center justify-between">
                                                        <div>
                                                            <span
                                                                class="px-2 py-1 text-xs font-medium rounded-full
                                                                @if ($submission->status === 'graded') bg-blue-100 text-blue-800
                                                                @elseif($submission->status === 'submitted') bg-blue-100 text-blue-800
                                                                @else bg-gray-100 text-gray-800 @endif">
                                                                {{ ucfirst($submission->status) }}
                                                            </span>
                                                            @if ($submission->status === 'graded')
                                                                <span class="ml-2 font-bold text-blue-600">
                                                                    Score:
                                                                    {{ $submission->score }}/{{ $assignment->max_score }}
                                                                </span>
                                                            @endif
                                                        </div>
                                                        <span class="text-sm text-gray-500">
                                                            Submitted: {{ $submission->created_at->format('d M Y H:i') }}
                                                        </span>
                                                    </div>
                                                    @if ($submission->feedback)
                                                        <div class="mt-2 text-sm text-gray-700">
                                                            <strong>Feedback:</strong> {{ $submission->feedback }}
                                                        </div>
                                                    @endif
                                                </div>
                                            @endif
                                        </div>

                                        @if (!$submission)
                                            <button type="button"
                                                onclick="openSubmitModal({{ $assignment->id }}, '{{ $assignment->title }}')"
                                                class="ml-4 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 flex items-center space-x-2">
                                                <svg class="h-5 w-5" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                                </svg>
                                                <span>Kumpulkan</span>
                                            </button>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Submit Modal -->
    <div id="submitModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full z-50">
        <div class="relative top-20 mx-auto p-5 border w-full max-w-2xl shadow-lg rounded-md bg-white">
            <div class="mb-4">
                <h3 class="text-lg font-bold text-gray-900" id="modalTitle">Kumpulkan Tugas</h3>
            </div>
            <form id="submitForm" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Jawaban Anda</label>
                        <textarea name="content" rows="8" required
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                            placeholder="Tulis jawaban atau penjelasan tugas Anda di sini..."></textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">File Lampiran (Opsional)</label>
                        <input type="file" name="file" accept=".pdf,.doc,.docx,.zip"
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        <p class="mt-1 text-xs text-gray-500">Format: PDF, DOC, DOCX, ZIP (Maks 10MB)</p>
                    </div>
                </div>
                <div class="mt-6 flex justify-end gap-3">
                    <button type="button" onclick="closeSubmitModal()"
                        class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300">
                        Batal
                    </button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                        Kumpulkan Tugas
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openSubmitModal(assignmentId, title) {
            document.getElementById('modalTitle').textContent = 'Kumpulkan Tugas: ' + title;
            document.getElementById('submitForm').action = `/siswa/assignments/${assignmentId}/submit`;
            document.getElementById('submitModal').classList.remove('hidden');
        }

        function closeSubmitModal() {
            document.getElementById('submitModal').classList.add('hidden');
            document.getElementById('submitForm').reset();
        }

        // Close modal when clicking outside
        document.getElementById('submitModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeSubmitModal();
            }
        });
    </script>
@endsection
