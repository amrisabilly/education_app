@extends('landing.layouts.app', [
    'title' => 'Hasil Kuis - Berbinar',
])

@section('content')
    <!-- Header -->
    <section class="bg-gradient-to-r from-green-600 to-green-800 text-white px-4 md:px-6 lg:px-8 py-8">
        <div class="max-w-4xl mx-auto">
            <div class="flex items-center gap-2 mb-4 text-sm text-green-100">
                <a href="/dashboard/student" class="hover:text-white">Dashboard</a>
                <span>/</span>
                <a href="/dashboard/student/module/2" class="hover:text-white">Modul 2</a>
                <span>/</span>
                <span>Hasil Kuis</span>
            </div>
            <h1 class="text-3xl font-bold mb-2">Hasil Kuis Anda</h1>
            <p class="text-green-100">Kuis selesai! Lihat hasil dan penjelasan di bawah</p>
        </div>
    </section>

    <!-- Results Container -->
    <section class="px-4 md:px-6 lg:px-8 py-12 bg-gray-50 min-h-screen">
        <div class="max-w-4xl mx-auto">
            <!-- Score Card -->
            <div class="bg-gradient-to-br from-green-50 to-green-100 border-2 border-green-200 rounded-3xl p-12 mb-8 shadow-lg text-center">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Skor Akhir Anda</h2>
                
                <div class="flex items-center justify-center gap-8 mb-8">
                    <!-- Circle Score -->
                    <div class="relative w-40 h-40 flex items-center justify-center">
                        <svg class="w-40 h-40 transform -rotate-90" viewBox="0 0 160 160">
                            <circle cx="80" cy="80" r="70" fill="none" stroke="#e5e7eb" stroke-width="12"/>
                            <circle cx="80" cy="80" r="70" fill="none" stroke="#16a34a" stroke-width="12" 
                                stroke-dasharray="329.87 461.81" stroke-linecap="round"/>
                        </svg>
                        <div class="absolute text-center">
                            <p class="text-5xl font-bold text-green-600">85</p>
                            <p class="text-gray-600 font-medium">dari 100</p>
                        </div>
                    </div>

                    <!-- Stats -->
                    <div class="text-left space-y-4">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-green-600 rounded-lg flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600">Jawaban Benar</p>
                                <p class="text-2xl font-bold text-gray-900">4 dari 5</p>
                            </div>
                        </div>

                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-red-600 rounded-lg flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600">Jawaban Salah</p>
                                <p class="text-2xl font-bold text-gray-900">1 dari 5</p>
                            </div>
                        </div>

                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-yellow-600 rounded-lg flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600">Poin Diperoleh</p>
                                <p class="text-2xl font-bold text-gray-900">85 Poin</p>
                            </div>
                        </div>
                    </div>
                </div>

                <p class="text-lg font-semibold text-green-700">
                    Selamat! Anda telah menyelesaikan kuis dengan hasil sangat baik!
                </p>
            </div>

            <!-- Breakdown Section -->
            <div class="bg-white rounded-2xl shadow-sm p-8 mb-8">
                <h3 class="text-2xl font-bold text-gray-900 mb-6">Rincian Jawaban</h3>
                
                <div class="space-y-6">
                    <!-- Question 1: Correct -->
                    <div class="border-2 border-green-200 rounded-xl p-6 bg-green-50">
                        <div class="flex items-start gap-4 mb-4">
                            <div class="w-8 h-8 bg-green-600 rounded-full flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <p class="font-bold text-gray-900">Soal 1: Benar</p>
                                <p class="text-gray-700 mt-1">Berapakah hasil dari 5 + 3?</p>
                                <p class="text-green-700 font-medium mt-2">Jawaban Anda: B. 8 ✓</p>
                            </div>
                        </div>
                    </div>

                    <!-- Question 2: Correct -->
                    <div class="border-2 border-green-200 rounded-xl p-6 bg-green-50">
                        <div class="flex items-start gap-4 mb-4">
                            <div class="w-8 h-8 bg-green-600 rounded-full flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <p class="font-bold text-gray-900">Soal 2: Benar</p>
                                <p class="text-gray-700 mt-1">Jika 2x + 5 = 13, maka x adalah?</p>
                                <p class="text-green-700 font-medium mt-2">Jawaban Anda: C. 4 ✓</p>
                            </div>
                        </div>
                    </div>

                    <!-- Question 3: Wrong -->
                    <div class="border-2 border-red-200 rounded-xl p-6 bg-red-50">
                        <div class="flex items-start gap-4 mb-4">
                            <div class="w-8 h-8 bg-red-600 rounded-full flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <p class="font-bold text-gray-900">Soal 3: Salah</p>
                                <p class="text-gray-700 mt-1">Sederhanakan ekspresi: 3x + 2x - 5 = ?</p>
                                <div class="mt-2 space-y-1">
                                    <p class="text-red-700 font-medium">Jawaban Anda: A. 5x - 5 ✗</p>
                                    <p class="text-green-700 font-medium">Jawaban Benar: D. 5x - 5</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Question 4: Correct -->
                    <div class="border-2 border-green-200 rounded-xl p-6 bg-green-50">
                        <div class="flex items-start gap-4 mb-4">
                            <div class="w-8 h-8 bg-green-600 rounded-full flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <p class="font-bold text-gray-900">Soal 4: Benar</p>
                                <p class="text-gray-700 mt-1">Hasil dari (2x + 3)(x - 1) adalah?</p>
                                <p class="text-green-700 font-medium mt-2">Jawaban Anda: C. 2x² + x - 3 ✓</p>
                            </div>
                        </div>
                    </div>

                    <!-- Question 5: Correct -->
                    <div class="border-2 border-green-200 rounded-xl p-6 bg-green-50">
                        <div class="flex items-start gap-4 mb-4">
                            <div class="w-8 h-8 bg-green-600 rounded-full flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <p class="font-bold text-gray-900">Soal 5: Benar</p>
                                <p class="text-gray-700 mt-1">Faktorkan: x² + 5x + 6 = ?</p>
                                <p class="text-green-700 font-medium mt-2">Jawaban Anda: B. (x + 2)(x + 3) ✓</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="bg-white rounded-2xl shadow-sm p-8">
                <h3 class="text-xl font-bold text-gray-900 mb-6">Langkah Berikutnya</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <a href="/dashboard/student" class="px-6 py-3 bg-white border-2 border-gray-300 text-gray-900 font-bold rounded-lg hover:bg-gray-50 transition text-center">
                        Kembali ke Dashboard
                    </a>
                    <a href="/dashboard/student/module/2" class="px-6 py-3 bg-blue-600 text-white font-bold rounded-lg hover:bg-blue-700 transition text-center">
                        Lanjutkan Modul
                    </a>
                    <a href="#" class="px-6 py-3 border-2 border-blue-600 text-blue-600 font-bold rounded-lg hover:bg-blue-50 transition text-center">
                        Ulangi Kuis
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
