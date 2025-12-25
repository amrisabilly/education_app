@extends('dashboard.layouts.app')

@section('title', 'Daftar Anak')
@section('page-title', 'Daftar Anak')

@section('content')
    <div class="space-y-6">
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-bold text-gray-800">Kelola Data Anak</h1>
            <button onclick="openLinkModal()" class="px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700">
                + Hubungkan Anak Baru
            </button>
        </div>

        @if ($children->isEmpty())
            <div class="bg-white rounded-lg shadow p-12 text-center">
                <svg class="mx-auto h-16 w-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
                <h3 class="mt-4 text-lg font-medium text-gray-900">Belum ada anak terhubung</h3>
                <p class="mt-2 text-gray-500">Mulai dengan menghubungkan akun anak Anda.</p>
                <button onclick="openLinkModal()"
                    class="mt-4 inline-block px-6 py-3 bg-purple-600 text-white rounded-lg hover:bg-purple-700">
                    Hubungkan Anak
                </button>
            </div>
        @else
            <div class="grid grid-cols-1 gap-6">
                @foreach ($children as $child)
                    <div class="bg-white rounded-lg shadow hover:shadow-lg transition p-6">
                        <div class="flex items-start justify-between">
                            <div class="flex items-start space-x-4">
                                <img src="{{ $child->photo ? asset('storage/' . $child->photo) : 'https://ui-avatars.com/api/?name=' . urlencode($child->name) }}"
                                    alt="{{ $child->name }}" class="h-20 w-20 rounded-full">
                                <div>
                                    <h3 class="text-xl font-semibold text-gray-800">{{ $child->name }}</h3>
                                    <p class="text-gray-600 mt-1">{{ $child->email }}</p>
                                    @if ($child->phone)
                                        <p class="text-gray-600 text-sm mt-1">{{ $child->phone }}</p>
                                    @endif

                                    <div class="flex items-center mt-3 space-x-4 text-sm text-gray-500">
                                        <span class="flex items-center">
                                            <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
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

            <div class="mt-6">
                {{ $children->links() }}
            </div>
        @endif
    </div>

    <!-- Link Child Modal -->
    <div id="linkModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white rounded-lg p-6 max-w-md w-full mx-4">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Hubungkan dengan Anak</h3>

            <form action="{{ route('orangtua.children.link') }}" method="POST">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Email Siswa</label>
                        <input type="email" name="student_email" required placeholder="siswa@example.com"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500">
                        <p class="mt-1 text-xs text-gray-500">Masukkan email akun siswa yang ingin dihubungkan</p>
                    </div>

                    <div class="flex justify-end space-x-3">
                        <button type="button" onclick="closeLinkModal()"
                            class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300">
                            Batal
                        </button>
                        <button type="submit" class="px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700">
                            Hubungkan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @push('scripts')
        <script>
            function openLinkModal() {
                document.getElementById('linkModal').classList.remove('hidden');
            }

            function closeLinkModal() {
                document.getElementById('linkModal').classList.add('hidden');
            }
        </script>
    @endpush
@endsection
