@extends('landing.layouts.app', [
    'title' => 'Kuis - Berbinar',
])

@section('content')
    <!-- Header -->
    <section class="bg-gradient-to-r from-blue-600 to-blue-800 text-white px-4 md:px-6 lg:px-8 py-8">
        <div class="max-w-4xl mx-auto">
            <div class="flex items-center gap-2 mb-4 text-sm text-blue-100">
                <a href="{{ route('student.index') }}" class="hover:text-white">Dashboard</a>
                <span>/</span>
                <a href="{{ route('student.module.show', ['id' => $moduleId]) }}" class="hover:text-white">Modul {{ $moduleId }}</a>
                <span>/</span>
                <span>Kuis</span>
            </div>
            <h1 class="text-3xl font-bold mb-2">{{ $quiz['title'] }}</h1>
            <p class="text-blue-100">{{ $quiz['description'] }}</p>
        </div>
    </section>

    <!-- Quiz Container -->
    <section class="px-4 md:px-6 lg:px-8 py-12 bg-gray-50 min-h-screen">
        <div class="max-w-4xl mx-auto">
            <!-- Wrapping quiz in form for submission -->
            <form action="{{ route('student.module.quiz.submit', ['id' => $moduleId]) }}" method="POST">
                @csrf
                
                <!-- Progress Bar -->
                <div class="mb-8 bg-white rounded-2xl shadow-sm p-6">
                    <div class="flex justify-between items-center mb-4">
                        <div>
                            <p class="text-sm text-gray-600 font-medium">Total Soal: {{ $quiz['totalQuestions'] }}</p>
                            <h2 class="text-xl font-bold text-gray-900 mt-1">Kerjakan semua soal di bawah</h2>
                        </div>
                    </div>
                    <div class="w-full bg-gray-200 h-3 rounded-full overflow-hidden">
                        <div class="bg-gradient-to-r from-blue-500 to-blue-600 h-full w-1/5"></div>
                    </div>
                </div>

                <!-- Question Cards -->
                @for($i = 1; $i <= $quiz['totalQuestions']; $i++)
                    <div class="bg-white rounded-2xl shadow-sm p-8 mb-8">
                        <!-- Question -->
                        <div class="mb-8">
                            <h3 class="text-2xl font-bold text-gray-900 mb-2">
                                Pertanyaan {{ $i }}
                            </h3>
                            @if($i == 1)
                                <p class="text-lg text-gray-700 leading-relaxed">Berapakah hasil dari 5 + 3?</p>
                            @elseif($i == 2)
                                <p class="text-lg text-gray-700 leading-relaxed">Jika 2x + 5 = 13, maka nilai dari x adalah?</p>
                            @elseif($i == 3)
                                <p class="text-lg text-gray-700 leading-relaxed">Sederhanakan ekspresi: 3x + 2x - 5 = ?</p>
                            @elseif($i == 4)
                                <p class="text-lg text-gray-700 leading-relaxed">Hasil dari (2x + 3)(x - 1) adalah?</p>
                            @else
                                <p class="text-lg text-gray-700 leading-relaxed">Faktorkan: x² + 5x + 6 = ?</p>
                            @endif
                        </div>

                        <!-- Answer Options -->
                        <div class="space-y-4 mb-8">
                            @php
                                $options = [];
                                if($i == 1) {
                                    $options = ['A' => '6', 'B' => '8', 'C' => '10', 'D' => '12', 'E' => '14'];
                                } elseif($i == 2) {
                                    $options = ['A' => 'x = 2', 'B' => 'x = 3', 'C' => 'x = 4', 'D' => 'x = 5', 'E' => 'x = 6'];
                                } elseif($i == 3) {
                                    $options = ['A' => '5x - 5', 'B' => '5x + 5', 'C' => 'x - 5', 'D' => '5x - 5', 'E' => '6x - 5'];
                                } elseif($i == 4) {
                                    $options = ['A' => '2x² - x - 3', 'B' => '2x² + x + 3', 'C' => '2x² + x - 3', 'D' => '2x + 3', 'E' => 'x - 1'];
                                } else {
                                    $options = ['A' => '(x + 1)(x + 6)', 'B' => '(x + 2)(x + 3)', 'C' => '(x - 2)(x - 3)', 'D' => '(x + 2)(x - 3)', 'E' => '(x + 3)(x + 2)'];
                                }
                            @endphp

                            @foreach($options as $label => $text)
                                <label class="flex items-start p-6 border-2 border-gray-200 rounded-xl hover:border-blue-400 hover:bg-blue-50 transition cursor-pointer group">
                                    <!-- Using name array for form submission -->
                                    <input type="radio" name="answers[{{ $i }}]" value="{{ $label }}" class="w-5 h-5 text-blue-600 cursor-pointer mt-1 flex-shrink-0" />
                                    <div class="flex-1 ml-4">
                                        <p class="font-bold text-gray-900">{{ $label }}. {{ $text }}</p>
                                    </div>
                                </label>
                            @endforeach
                        </div>
                    </div>
                @endfor

                <!-- Submit Button -->
                <div class="flex gap-4">
                    <a href="{{ route('student.module.show', ['id' => $moduleId]) }}" class="flex-1 px-6 py-4 bg-white border-2 border-gray-300 text-gray-900 font-bold rounded-lg hover:bg-gray-50 transition text-center">
                        Batal
                    </a>
                    <button type="submit" class="flex-1 px-6 py-4 bg-green-600 text-white font-bold rounded-lg hover:bg-green-700 transition">
                        Selesaikan Kuis
                    </button>
                </div>
            </form>
        </div>
    </section>
@endsection
