@extends('dashboard.layouts.app')

@section('title', 'Dashboard Orangtua')
@section('page-title', 'Dashboard Orangtua')

@section('content')
    <div class="space-y-6">
        <!-- Welcome Section -->
        <div class="bg-gradient-to-r from-blue-500 to-blue-600 rounded-lg shadow-lg p-6 text-white">
            <h1 class="text-2xl font-bold">Selamat Datang, {{ auth()->user()->name }}!</h1>
            <p class="mt-2 text-blue-100">Pantau perkembangan belajar anak Anda</p>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-lg shadow-lg p-6 border border-blue-200">
                <div class="flex items-center">
                    <div class="p-3 rounded-xl bg-blue-600 shadow">
                        <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-blue-700 text-sm font-medium">Total Anak</p>
                        <p class="text-3xl font-bold text-blue-900">{{ $totalChildren }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-lg shadow-lg p-6 border border-blue-200">
                <div class="flex items-center">
                    <div class="p-3 rounded-xl bg-blue-600 shadow">
                        <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-blue-700 text-sm font-medium">Total Kursus Diikuti</p>
                        <p class="text-3xl font-bold text-blue-900">{{ $totalEnrollments }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Link Child Section -->
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-lg font-semibold text-gray-800 mb-4">Hubungkan dengan Anak</h2>
            <form action="{{ route('orangtua.children.link') }}" method="POST" class="flex gap-3">
                @csrf
                <input type="email" name="student_email" placeholder="Masukkan email anak" required
                    class="flex-1 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                    Hubungkan
                </button>
            </form>
            <p class="mt-2 text-sm text-gray-500">Masukkan alamat email anak yang terdaftar sebagai siswa untuk memantau
                perkembangan mereka.</p>
        </div>

        <!-- Children List -->
        <div class="bg-white rounded-lg shadow">
            <div class="p-6 border-b border-gray-200">
                <h2 class="text-xl font-semibold text-gray-800">Data Anak</h2>
            </div>

            <div class="p-6">
                @if ($children->isEmpty())
                    <div class="text-center py-12">
                        <svg class="mx-auto h-16 w-16 text-gray-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        <h3 class="mt-4 text-lg font-medium text-gray-900">Belum ada data anak</h3>
                        <p class="mt-2 text-gray-500">Hubungkan akun Anda dengan akun anak untuk memantau perkembangan
                            mereka.</p>
                    </div>
                @else
                    <div class="space-y-4">
                        @foreach ($children as $child)
                            <div class="border border-gray-200 rounded-lg p-6 hover:border-purple-500 transition">
                                <div class="flex items-start justify-between">
                                    <div class="flex items-center flex-1">
                                        <img src="{{ $child->photo ?? 'https://ui-avatars.com/api/?name=' . urlencode($child->name) }}"
                                            alt="{{ $child->name }}" class="h-16 w-16 rounded-full">
                                        <div class="ml-4">
                                            <h3 class="text-lg font-semibold text-gray-800">{{ $child->name }}</h3>
                                            <p class="text-gray-600 text-sm">{{ $child->email }}</p>
                                            <div class="flex items-center mt-2 space-x-4 text-sm text-gray-500">
                                                <span class="flex items-center">
                                                    <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                                    </svg>
                                                    {{ $child->enrollments_count }} kursus
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex flex-col space-y-2">
                                        <a href="{{ route('orangtua.children.progress', $child) }}"
                                            class="px-4 py-2 bg-purple-600 text-white text-sm rounded-lg hover:bg-purple-700 text-center">
                                            Lihat Progress
                                        </a>
                                        <a href="{{ route('orangtua.children.courses', $child) }}"
                                            class="px-4 py-2 bg-gray-200 text-gray-700 text-sm rounded-lg hover:bg-gray-300 text-center">
                                            Lihat Kursus
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
