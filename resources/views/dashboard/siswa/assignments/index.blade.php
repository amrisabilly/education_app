@extends('dashboard.layouts.app')

@section('title', 'Tugas')
@section('page-title', 'Daftar Tugas')

@section('content')
    <div class="space-y-6">
        @if ($assignments->isEmpty())
            <div class="bg-white rounded-lg shadow p-12 text-center">
                <svg class="mx-auto h-16 w-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                <h3 class="mt-4 text-lg font-medium text-gray-900">Tidak ada tugas</h3>
                <p class="mt-2 text-gray-500">Belum ada tugas yang tersedia.</p>
            </div>
        @else
            <div class="space-y-4">
                @foreach ($assignments as $assignment)
                    @php
                        $submission = $assignment->submissions->where('student_id', auth()->id())->first();
                    @endphp
                    <div class="bg-white rounded-lg shadow p-6">
                        <div class="flex items-start justify-between">
                            <div class="flex-1">
                                <h3 class="text-lg font-semibold text-gray-800">{{ $assignment->title }}</h3>
                                <p class="text-sm text-gray-600 mt-1">Kursus: {{ $assignment->course->title }}</p>
                                <p class="text-gray-700 mt-2">{{ $assignment->description }}</p>

                                <div class="flex items-center mt-3 space-x-4 text-sm">
                                    <span class="text-gray-500">
                                        Deadline: {{ $assignment->due_date->format('d M Y, H:i') }}
                                    </span>
                                    <span class="text-gray-500">
                                        Max Score: {{ $assignment->max_score }}
                                    </span>
                                </div>
                            </div>

                            <div class="ml-6">
                                @if ($submission)
                                    @if ($submission->score !== null)
                                        <div class="text-center">
                                            <div class="text-3xl font-bold text-blue-600">{{ $submission->score }}</div>
                                            <p class="text-sm text-gray-500">/ {{ $assignment->max_score }}</p>
                                            <span
                                                class="mt-2 inline-block px-3 py-1 text-xs font-medium rounded-full bg-blue-100 text-blue-800">
                                                Dinilai
                                            </span>
                                        </div>
                                    @else
                                        <span class="px-4 py-2 text-sm font-medium rounded-full bg-blue-100 text-blue-800">
                                            Menunggu Penilaian
                                        </span>
                                    @endif
                                @else
                                    <button onclick="openSubmitModal{{ $assignment->id }}()"
                                        class="px-4 py-2 bg-blue-600 text-white text-sm rounded-lg hover:bg-blue-700">
                                        Submit Tugas
                                    </button>
                                @endif
                            </div>
                        </div>

                        @if ($submission && $submission->feedback)
                            <div class="mt-4 p-4 bg-blue-50 rounded-lg">
                                <p class="text-sm font-medium text-blue-900">Feedback dari Guru:</p>
                                <p class="text-sm text-blue-800 mt-1">{{ $submission->feedback }}</p>
                            </div>
                        @endif
                    </div>

                    <!-- Submit Modal -->
                    @if (!$submission)
                        <div id="submitModal{{ $assignment->id }}"
                            class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
                            <div class="bg-white rounded-lg p-6 max-w-lg w-full mx-4">
                                <h3 class="text-lg font-semibold text-gray-800 mb-4">Submit Tugas: {{ $assignment->title }}
                                </h3>

                                <form action="{{ route('siswa.assignments.submit', $assignment) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="space-y-4">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Jawaban</label>
                                            <textarea name="content" rows="4" required
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"></textarea>
                                        </div>

                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Upload File
                                                (Opsional)
                                            </label>
                                            <input type="file" name="file"
                                                class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                                        </div>

                                        <div class="flex justify-end space-x-3">
                                            <button type="button" onclick="closeSubmitModal{{ $assignment->id }}()"
                                                class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300">
                                                Batal
                                            </button>
                                            <button type="submit"
                                                class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                                                Submit
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <script>
                            function openSubmitModal{{ $assignment->id }}() {
                                document.getElementById('submitModal{{ $assignment->id }}').classList.remove('hidden');
                            }

                            function closeSubmitModal{{ $assignment->id }}() {
                                document.getElementById('submitModal{{ $assignment->id }}').classList.add('hidden');
                            }
                        </script>
                    @endif
                @endforeach
            </div>

            <div class="mt-6">
                {{ $assignments->links() }}
            </div>
        @endif
    </div>
@endsection
