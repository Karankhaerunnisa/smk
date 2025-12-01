<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cek Status Pendaftaran - {{ \App\Models\Setting::getValue('school_name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 font-sans antialiased min-h-screen flex flex-col">

    <nav x-data="{ open: false }" class="bg-white shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">

                <div class="flex items-center gap-3">
                    <img src="{{ asset('images/' . \App\Models\Setting::getValue('app_logo', 'default.png')) }}"
                        class="h-10 w-auto" alt="Logo">
                    <div>
                        <div class="font-bold text-blue-900 leading-tight">
                            {{ \App\Models\Setting::getValue('school_name') }}
                        </div>
                        <div class="text-xs text-gray-500">
                            SPMB Online {{ \App\Models\Setting::getValue('academic_year') }}
                        </div>
                    </div>
                </div>

                <div class="hidden md:flex items-center space-x-4">
                    <a href="{{ route('home') }}"
                        class="text-sm font-medium text-gray-600 hover:text-blue-600 flex items-center transition">
                        <x-heroicon-o-home class="w-4 h-4 mr-1" />
                        Beranda
                    </a>
                    <a href="{{ route('login') }}"
                        class="text-sm font-medium text-gray-600 hover:text-blue-600 flex items-center transition">
                        <x-heroicon-o-lock-closed class="w-4 h-4 mr-1" />
                        Admin Login
                    </a>
                </div>

                <div class="-mr-2 flex items-center md:hidden">
                    <button @click="open = !open"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none transition duration-150 ease-in-out">
                        <x-heroicon-o-bars-3 class="h-6 w-6" x-show="!open" />
                        <x-heroicon-o-x-mark class="h-6 w-6" x-show="open" style="display: none;" />
                    </button>
                </div>
            </div>
        </div>

        <div x-show="open" x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 -translate-y-2" class="md:hidden border-t border-gray-100 bg-white"
            style="display: none;">

            <div class="pt-2 pb-3 space-y-1 px-4">
                <a href="{{ route('home') }}"
                    class="block w-full text-left px-3 py-2 rounded-md text-base font-medium text-gray-600 hover:text-blue-600 hover:bg-gray-50 transition">
                    <div class="flex items-center">
                        <x-heroicon-o-home class="w-5 h-5 mr-2" />
                        Beranda
                    </div>
                </a>

                <a href="{{ route('login') }}"
                    class="block w-full text-left px-3 py-2 rounded-md text-base font-medium text-gray-600 hover:text-blue-600 hover:bg-gray-50 transition">
                    <div class="flex items-center">
                        <x-heroicon-o-lock-closed class="w-5 h-5 mr-2" />
                        Admin Login
                    </div>
                </a>
            </div>
        </div>
    </nav>

    <main class="flex-grow flex flex-col items-center justify-center p-4">

        <div class="w-full max-w-md bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden mb-6">
            <div class="bg-blue-600 px-6 py-4">
                <h2 class="text-lg font-bold text-white flex items-center">
                    <x-heroicon-o-magnifying-glass class="w-5 h-5 mr-2" />
                    Cek Status Pendaftaran
                </h2>
            </div>

            <div class="p-6">
                <form action="{{ route('registration.check-status') }}" method="POST">
                    @csrf

                    @if(session('error'))
                    <div class="bg-red-50 text-red-600 text-sm p-3 rounded-md mb-4 flex items-center">
                        <x-heroicon-o-exclamation-circle class="w-5 h-5 mr-2" />
                        {{ session('error') }}
                    </div>
                    @endif

                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Nomor Pendaftaran</label>
                            <input type="text" name="registration_number" value="{{ old('registration_number') }}"
                                required placeholder="Contoh: PPDB2025ABCDE"
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 uppercase">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Lahir</label>
                            <input type="date" name="birth_date" value="{{ old('birth_date') }}" required
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            <p class="text-xs text-gray-500 mt-1">*Digunakan untuk verifikasi keamanan.</p>
                        </div>

                        <button type="submit"
                            class="w-full bg-blue-600 text-white font-bold py-2 rounded-md hover:bg-blue-700 transition shadow-sm">
                            Cek Status
                        </button>
                    </div>
                </form>
            </div>
        </div>

        @if(isset($registrant))
        <div
            class="w-full max-w-md bg-white rounded-xl shadow-lg border border-blue-100 overflow-hidden animate-fade-in-up">
            <div class="p-6 text-center border-b border-gray-100">
                <div class="mb-2">
                    <span
                        class="px-4 py-1.5 rounded-full text-sm font-bold bg-{{ $registrant->status->color() }}-100 text-{{ $registrant->status->color() }}-700">
                        {{ $registrant->status->label() }}
                    </span>
                </div>
                <h3 class="text-xl font-bold text-gray-900">{{ $registrant->name }}</h3>
                <p class="text-gray-500 text-sm">{{ $registrant->registration_number }}</p>
            </div>

            <div class="p-6 bg-gray-50 space-y-3 text-sm">
                <div class="flex justify-between">
                    <span class="text-gray-500">Jurusan Pilihan</span>
                    <span class="font-medium text-gray-900">{{ $registrant->major->name }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-500">Tanggal Daftar</span>
                    <span class="font-medium text-gray-900">{{ $registrant->created_at->format('d M Y') }}</span>
                </div>

                @if($registrant->admin_note)
                <div class="mt-4 p-3 bg-yellow-50 border border-yellow-200 rounded-md text-left">
                    <span class="block text-xs font-bold text-yellow-700 uppercase mb-1">Catatan Panitia:</span>
                    <p class="text-gray-700">{{ $registrant->admin_note }}</p>
                </div>
                @endif
            </div>

            <div class="p-4 bg-white border-t border-gray-100">
                <a href="{{ route('registration.print', $registrant->registration_number) }}" target="_blank"
                    class="block w-full text-center text-blue-600 font-bold hover:underline">
                    Cetak Ulang Bukti Pendaftaran
                </a>
            </div>
        </div>
        @endif

    </main>

    <footer class="bg-white border-t border-gray-100 py-6 text-center text-sm text-gray-500">
        &copy; {{ date('Y') }} {{ \App\Models\Setting::getValue('school_name') }}.
    </footer>

</body>

</html>
