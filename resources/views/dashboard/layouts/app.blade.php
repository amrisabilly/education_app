<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Eduinklusif - Belajar Tanpa Batas</title>
    <meta name="description"
        content="Eduinklusif adalah platform edukasi digital yang menyediakan ribuan materi video interaktif dan bank soal untuk berkembang tanpa henti.">
    <link rel="shortcut icon" href="{{ asset('assets/images/landing/favicion/logo_eduinklusif.webp') }}"
        type="image/x-icon" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
    <link rel="preconnect" href="https://unpkg.com">
    <link rel="preconnect" href="https://lottie.host">
    <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module" defer>
    </script>
</head>

<body class="bg-gray-100">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        @include('dashboard.partials.sidebar')

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Navbar -->
            @include('dashboard.partials.navbar')

            <!-- Page Content -->
            <main class="flex-1 overflow-y-auto p-6">
                @if (session('success'))
                    <div class="mb-4 bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="mb-4 bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded">
                        {{ session('error') }}
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    <!-- Chatbot for Siswa Role -->
    @if (auth()->user()->role === 'siswa')
        @include('dashboard.partials.chatbot')
    @endif

    @stack('scripts')
</body>

</html>
