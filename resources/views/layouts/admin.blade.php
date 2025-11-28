<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} Admin</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gray-100">
    <div class="flex h-screen overflow-hidden">

        <!-- Sidebar -->
        <aside class="w-64 bg-gray-900 text-white flex-shrink-0 hidden md:flex flex-col">
            <div class="p-4 border-b border-gray-800 flex items-center gap-3">
                <x-heroicon-o-building-library class="w-8 h-8 text-blue-500" />
                <div>
                    <h1 class="text-lg font-bold">SPMB Admin</h1>
                    <p class="text-xs text-gray-400">SMK Rohmatul Ummah</p>
                </div>
            </div>

            <nav class="flex-1 overflow-y-auto py-4">
                <ul class="space-y-1">

                    <li>
                        <a href="{{ route('admin.dashboard') }}"
                            class="flex items-center px-4 py-3 {{ request()->routeIs('admin.dashboard') ? 'bg-blue-600 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
                            <x-heroicon-o-squares-2x2 class="w-5 h-5 mr-3" />
                            Dashboard
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('admin.registrants.index') }}"
                            class="flex items-center px-4 py-3 {{ request()->routeIs('admin.registrants.*') ? 'bg-blue-600 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
                            <x-heroicon-o-user-group class="w-5 h-5 mr-3" />
                            Data Pendaftar
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('admin.majors.index') }}"
                            class="flex items-center px-4 py-3 {{ request()->routeIs('admin.majors.*') }} text-gray-400 hover:bg-gray-800 hover:text-white">
                            <x-heroicon-o-academic-cap class="w-5 h-5 mr-3" />
                            Kelola Jurusan
                        </a>
                    </li>

                    <li>
                        <a href="#"
                            class="flex items-center px-4 py-3 text-gray-400 hover:bg-gray-800 hover:text-white">
                            <x-heroicon-o-megaphone class="w-5 h-5 mr-3" />
                            Pengumuman
                        </a>
                    </li>

                    <li>
                        <a href="#"
                            class="flex items-center px-4 py-3 text-gray-400 hover:bg-gray-800 hover:text-white">
                            <x-heroicon-o-cog-6-tooth class="w-5 h-5 mr-3" />
                            Pengaturan
                        </a>
                    </li>

                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="w-full flex items-center px-4 py-3 text-gray-400 hover:bg-red-600 hover:text-white transition-colors">
                                <x-heroicon-o-arrow-left-on-rectangle class="w-5 h-5 mr-3" />
                                Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content Wrapper -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top Header -->
            <header class="bg-white shadow-sm h-16 flex items-center justify-between px-6">
                <h2 class="text-xl font-bold text-gray-800">
                    @yield('title', 'Dashboard')
                </h2>

                <div class="flex items-center space-x-4">
                    <div class="text-right mr-2">
                        {{-- <div class="text-sm font-bold text-gray-800">{{ Auth::user()->name }}</div> --}}
                        <div class="text-xs text-gray-500">Administrator</div>
                    </div>
                    <div
                        class="h-10 w-10 rounded-full bg-blue-600 text-white flex items-center justify-center font-bold">
                        {{-- {{ substr(Auth::user()->name, 0, 1) }} --}}
                        <x-heroicon-o-user-circle class="w-6 h-6" />
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 p-6">
                @yield('content')
            </main>
        </div>
    </div>
</body>

</html>
