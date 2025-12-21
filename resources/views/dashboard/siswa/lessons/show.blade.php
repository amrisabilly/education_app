@extends('dashboard.layouts.app')

@section('title', $lesson->title)
@section('page-title', $lesson->title)

@section('content')
    <div class="space-y-6">
        <!-- Breadcrumb -->
        <nav class="flex text-sm text-gray-600">
            <a href="{{ route('siswa.courses') }}" class="hover:text-blue-600">Kursus Saya</a>
            <span class="mx-2">/</span>
            <a href="{{ route('siswa.courses.show', $course) }}" class="hover:text-blue-600">{{ $course->title }}</a>
            <span class="mx-2">/</span>
            <span class="text-gray-900">{{ $lesson->title }}</span>
        </nav>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Main Content -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-lg shadow p-6">
                    <h1 class="text-2xl font-bold text-gray-800 mb-4">{{ $lesson->title }}</h1>

                    @if ($lesson->video_url)
                        <div class="mb-6">
                            <div class="aspect-video bg-gray-900 rounded-lg flex items-center justify-center">
                                <iframe width="100%" height="100%" src="{{ $lesson->video_url }}" frameborder="0"
                                    allowfullscreen class="rounded-lg"></iframe>
                            </div>
                        </div>
                    @endif

                    <div class="prose max-w-none">
                        {!! $lesson->content !!}
                    </div>

                    <!-- Navigation -->
                    <div class="mt-8 flex gap-3">
                        @if ($previousLesson)
                            <a href="{{ route('siswa.lessons.show', [$course, $previousLesson]) }}"
                                class="px-6 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300">
                                ← Materi Sebelumnya
                            </a>
                        @endif

                        @if ($isCompleted)
                            <button id="completeBtn" disabled
                                class="px-6 py-2 bg-green-600 text-white rounded-lg opacity-75 cursor-not-allowed">
                                ✓ Selesai
                            </button>
                        @else
                            <button onclick="markComplete()" id="completeBtn"
                                class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                                ✓ Tandai Selesai
                            </button>
                        @endif

                        @if ($nextLesson)
                            <a href="{{ route('siswa.lessons.show', [$course, $nextLesson]) }}"
                                class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 ml-auto">
                                Materi Berikutnya →
                            </a>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-lg shadow p-6 sticky top-6">
                    <h3 class="font-bold text-gray-800 mb-4">Daftar Materi</h3>
                    <div class="space-y-2">
                        @foreach ($course->lessons->sortBy('order') as $l)
                            @php
                                $isLessonCompleted = $l->isCompletedBy(auth()->id());
                            @endphp
                            <a href="{{ route('siswa.lessons.show', [$course, $l]) }}"
                                class="block p-3 rounded-lg transition {{ $l->id === $lesson->id ? 'bg-blue-50 border-l-4 border-blue-600' : 'hover:bg-gray-50' }}">
                                <div class="flex items-start gap-3">
                                    @if ($isLessonCompleted)
                                        <span
                                            class="flex-shrink-0 w-6 h-6 bg-green-600 text-white rounded-full flex items-center justify-center text-xs">
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </span>
                                    @else
                                        <span
                                            class="flex-shrink-0 w-6 h-6 bg-blue-600 text-white rounded-full flex items-center justify-center text-xs font-bold">
                                            {{ $l->order }}
                                        </span>
                                    @endif
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-medium text-gray-800 truncate">{{ $l->title }}</p>
                                        <p class="text-xs text-gray-500">{{ $l->duration_minutes }} menit</p>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>

                    <div class="mt-6 pt-6 border-t">
                        <div class="flex justify-between text-sm mb-2">
                            <span class="text-gray-600">Progress</span>
                            <span class="font-bold text-blue-600">{{ $enrollment->progress }}%</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-blue-600 h-2 rounded-full" style="width: {{ $enrollment->progress }}%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function markComplete() {
            fetch('{{ route('siswa.lessons.complete', [$course, $lesson]) }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    const btn = document.getElementById('completeBtn');
                    btn.textContent = '✓ Selesai';
                    btn.disabled = true;
                    btn.classList.remove('bg-blue-600', 'hover:bg-blue-700');
                    btn.classList.add('bg-green-600', 'opacity-75', 'cursor-not-allowed');

                    // Show success message
                    if (data.success) {
                        // Reload page to update progress and sidebar
                        setTimeout(() => location.reload(), 800);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Gagal menandai materi selesai. Silakan coba lagi.');
                });
        }
    </script>
@endsection
