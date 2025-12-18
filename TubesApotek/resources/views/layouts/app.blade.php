<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Aplikasi Klinik' }}</title>

    {{-- Tailwind --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Inter Font --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>

    {{-- Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet">
</head>

<body class="bg-[#f2f6fc]">

    <div class="flex h-screen">

        {{-- SIDEBAR --}}
        <aside class="w-64 bg-[#0b3c7d] text-white flex flex-col p-6 shadow-lg relative z-20">
            <h2 class="font-bold text-2xl tracking-wide mb-10">Apotek<br>Surya Medika</h2>

            <nav class="space-y-2 font-medium">
                <a href="/dashboard"
                   class="flex items-center gap-3 p-3 rounded-lg transition
                   hover:bg-[#124d9e] {{ request()->is('dashboard') ? 'bg-[#124d9e]' : '' }}">
                    <i class="ri-home-4-line text-xl"></i>
                    Beranda
                </a>

                <a href="/obat"
                   class="flex items-center gap-3 p-3 rounded-lg transition
                   hover:bg-[#124d9e] {{ request()->is('obat') ? 'bg-[#124d9e]' : '' }}">
                    <i class="ri-capsule-line text-xl"></i>
                    Daftar Obat
                </a>

                <a href="/faktur"
                   class="flex items-center gap-3 p-3 rounded-lg transition
                   hover:bg-[#124d9e] {{ request()->is('faktur') ? 'bg-[#124d9e]' : '' }}">
                    <i class="ri-file-list-3-line text-xl"></i>
                    Daftar Faktur
                </a>

                <a href="/history-obat"
                   class="flex items-center gap-3 p-3 rounded-lg transition
                   hover:bg-[#124d9e] {{ request()->is('history-obat') ? 'bg-[#124d9e]' : '' }}">
                    <i class="ri-history-line text-xl"></i>
                    History
                </a>
            </nav>

            <div class="mt-auto">
                <a href="/logout"
                   class="flex items-center gap-3 mt-6 p-3 rounded-lg transition text-red-300 hover:bg-red-700/20">
                    <i class="ri-logout-box-r-line text-xl"></i> Keluar
                </a>
            </div>
        </aside>

        {{-- MAIN WRAPPER --}}
        <div class="flex-1 flex flex-col overflow-y-auto">

            {{-- HEADER --}}
            <header class="bg-white px-6 py-4 shadow-sm flex justify-between items-center sticky top-0 z-10">
                <h1 class="text-xl font-semibold tracking-wide">{{ $title ?? '' }}</h1>

                <div class="flex items-center gap-6">
                    {{-- notif --}}
                    <button class="relative">
                        <i class="ri-notification-3-line text-2xl text-gray-600"></i>
                        <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs w-4 h-4 rounded-full flex items-center justify-center">3</span>
                    </button>

                    {{-- profile --}}
                    <div class="relative group cursor-pointer">
                        <div class="flex items-center gap-3">
                            <img src="https://via.placeholder.com/36"
                                 class="rounded-full w-9 h-9 border shadow">
                            <span class="font-medium">Elysia (Owner)</span>
                            <i class="ri-arrow-down-s-line text-lg"></i>
                        </div>

                        {{-- Dropdown --}}
                        <div class="absolute right-0 mt-3 w-40 bg-white rounded-lg shadow-lg hidden group-hover:block z-30">
                            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Profile</a>
                            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Pengaturan</a>
                            <a href="/logout" class="block px-4 py-2 text-red-600 hover:bg-gray-100">Logout</a>
                        </div>
                    </div>
                </div>
            </header>

            {{-- CONTENT --}}
            <main class="p-8">
                {{-- CARD WRAPPER --}}
                <div class="bg-white shadow-md rounded-xl p-6">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

</body>
</html>
