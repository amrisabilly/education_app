@extends('dashboard.layouts.app')

@section('title', 'Edit Profil')
@section('page-title', 'Edit Profil')

@section('content')
    <div class="max-w-3xl mx-auto">
        <div class="bg-white rounded-lg shadow p-6">
            <div class="mb-6">
                <h2 class="text-2xl font-bold text-gray-800">Edit Profil</h2>
                <p class="text-gray-600 mt-1">Perbarui informasi profil Anda</p>
            </div>

            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="space-y-6">
                    <!-- Photo Upload -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Foto Profil</label>
                        <div class="flex items-center gap-4">
                            <img id="photoPreview"
                                src="{{ $user->photo ? asset('storage/' . $user->photo) : 'https://ui-avatars.com/api/?name=' . urlencode($user->name) . '&size=200' }}"
                                alt="{{ $user->name }}" class="w-20 h-20 rounded-full">
                            <div>
                                <input type="file" name="photo" id="photo" accept="image/*"
                                    class="block w-full text-sm text-gray-500
                                    file:mr-4 file:py-2 file:px-4
                                    file:rounded-lg file:border-0
                                    file:text-sm file:font-semibold
                                    file:bg-blue-50 file:text-blue-700
                                    hover:file:bg-blue-100"
                                    onchange="previewPhoto(event)">
                                <p class="text-xs text-gray-500 mt-1">JPG, PNG atau JPEG (Max. 2MB)</p>
                            </div>
                        </div>
                        @error('photo')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Name -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
                        <input type="text" name="name" value="{{ old('name', $user->name) }}" required
                            class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                        @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                        <input type="email" name="email" value="{{ old('email', $user->email) }}" required
                            class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                        @error('email')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Phone -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">No. Telepon</label>
                        <input type="tel" name="phone" value="{{ old('phone', $user->phone) }}"
                            class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                        @error('phone')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Role (disabled) -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Role</label>
                        <input type="text" value="{{ ucfirst($user->role) }}" disabled
                            class="w-full rounded-lg border-gray-300 bg-gray-100 cursor-not-allowed">
                        <p class="text-xs text-gray-500 mt-1">Role tidak dapat diubah</p>
                    </div>
                </div>

                <div class="mt-8 flex gap-3">
                    <button type="submit"
                        class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 font-medium">
                        Simpan Perubahan
                    </button>
                    <a href="{{ route('profile.show') }}"
                        class="px-6 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 font-medium">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>

    <script>
        function previewPhoto(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('photoPreview').src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        }
    </script>
@endsection
