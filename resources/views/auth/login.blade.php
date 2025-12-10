<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Berbinar Edukasi</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen flex items-center justify-center">
    <div class="w-full max-w-md">
        <div class="bg-white rounded-lg shadow-lg p-8">
            <div class="flex justify-center mb-8">
                <div class="w-16 h-16 bg-gradient-to-br from-blue-600 to-blue-800 rounded-lg flex items-center justify-center">
                    <span class="text-white font-bold text-3xl">B</span>
                </div>
            </div>

            <h1 class="text-3xl font-bold text-center text-gray-900 mb-2">Berbinar</h1>
            <p class="text-center text-gray-600 mb-8">Masuk ke akun Anda untuk memulai belajar</p>

            <form action="{{ route('auth.login') }}" method="POST" class="space-y-5">
                @csrf

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        value="{{ old('email') }}"
                        placeholder="nama@example.com" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        required
                    >
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        placeholder="Masukkan password Anda" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        required
                    >
                    @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="role" class="block text-sm font-medium text-gray-700 mb-2">Login Sebagai</label>
                    <select 
                        id="role" 
                        name="role" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        required
                    >
                        <option value="">Pilih Role</option>
                        <option value="siswa">Siswa</option>
                        <option value="guru">Guru</option>
                        <option value="orang_tua">Orang Tua</option>
                    </select>
                    @error('role')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center">
                    <input 
                        type="checkbox" 
                        id="remember" 
                        name="remember" 
                        class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded cursor-pointer"
                    >
                    <label for="remember" class="ml-2 block text-sm text-gray-700">Ingat saya</label>
                </div>

                <button 
                    type="submit" 
                    class="w-full bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-semibold py-2 px-4 rounded-lg transition duration-200 ease-in-out transform hover:scale-105"
                >
                    Masuk
                </button>
            </form>

            <div class="mt-6 p-4 bg-blue-50 rounded-lg border border-blue-200">
                <p class="text-xs font-semibold text-blue-900 mb-2">Demo Test Credentials:</p>
                <p class="text-xs text-blue-800 mb-1"><strong>Email:</strong> siswa@example.com</p>
                <p class="text-xs text-blue-800 mb-1"><strong>Password:</strong> password123</p>
                <p class="text-xs text-blue-800"><strong>Role:</strong> Siswa</p>
            </div>

            <div class="text-center mt-6">
                <p class="text-gray-600 text-sm">Belum punya akun? <a href="{{ route('auth.register.page') }}" class="text-blue-600 hover:text-blue-700 font-semibold">Daftar di sini</a></p>
            </div>
        </div>
    </div>
</body>
</html>