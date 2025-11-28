@extends('layouts.admin')

@section('title', 'Data Pendaftar')

@section('content')

    <div class="bg-white rounded-lg shadow-sm border border-gray-100 p-6 mb-6">
        <form method="GET" action="{{ route('admin.registrants.index') }}">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-4 items-end">

                <div class="md:col-span-3">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                    <select name="status" class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm">
                        <option value="">Semua Status</option>
                        @foreach($statuses as $status)
                            <option value="{{ $status->value }}" {{ request('status') == $status->value ? 'selected' : '' }}>
                                {{ $status->label() }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="md:col-span-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Jurusan</label>
                    <select name="majorCode" class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm">
                        <option value="">Semua Jurusan</option>
                        @foreach($majors as $major)
                            <option value="{{ $major->code }}" {{ request('majorCode') == $major->code ? 'selected' : '' }}>
                                {{ $major->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="md:col-span-5 flex gap-2">
                    <div class="flex-1">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Cari</label>
                        <input type="text" name="search" value="{{ request('search') }}"
                               placeholder="Nama atau No. Pendaftaran"
                               class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm">
                    </div>
                    <button type="submit" class="bg-blue-600 text-white px-5 py-2 rounded-md hover:bg-blue-700 transition-colors text-sm font-medium self-end h-[38px] flex items-center">
                        <x-heroicon-o-magnifying-glass class="w-4 h-4 mr-2" />
                        Filter
                    </button>
                </div>

            </div>
        </form>
    </div>

    <div class="flex flex-col md:flex-row justify-between items-center mb-4 gap-4">
        <div class="flex items-center gap-4">
            <button type="button" class="bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700 transition-colors text-sm font-medium flex items-center shadow-sm">
                <x-heroicon-o-document-arrow-down class="w-4 h-4 mr-2" />
                Export ke Excel
            </button>

            <span class="text-sm text-gray-600 font-medium flex items-center">
                <x-heroicon-o-users class="w-4 h-4 mr-2 text-gray-400" />
                Total: {{ $registrants->total() }} pendaftar
            </span>
        </div>

        </div>

    <div class="bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead class="bg-blue-600 text-white">
                    <tr>
                        <th class="p-4 text-xs font-semibold uppercase tracking-wider w-12">No</th>
                        <th class="p-4 text-xs font-semibold uppercase tracking-wider">No. Pendaftaran</th>
                        <th class="p-4 text-xs font-semibold uppercase tracking-wider">Nama</th>
                        <th class="p-4 text-xs font-semibold uppercase tracking-wider">Jurusan</th>
                        <th class="p-4 text-xs font-semibold uppercase tracking-wider">Kontak</th>
                        <th class="p-4 text-xs font-semibold uppercase tracking-wider">Tanggal Daftar</th>
                        <th class="p-4 text-xs font-semibold uppercase tracking-wider text-center">Status</th>
                        <th class="p-4 text-xs font-semibold uppercase tracking-wider text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($registrants as $index => $reg)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="p-4 text-sm text-gray-500">
                            {{ ($registrants->currentPage() - 1) * $registrants->perPage() + $loop->iteration }}
                        </td>

                        <td class="p-4">
                            <span class="font-mono text-sm font-bold text-gray-700">{{ $reg->registration_number }}</span>
                        </td>

                        <td class="p-4">
                            <div class="font-bold text-gray-800">{{ $reg->name }}</div>
                            <div class="text-xs text-gray-500 mt-1 flex items-center">
                                <x-heroicon-o-map-pin class="w-3 h-3 mr-1" />
                                {{ $reg->birth_place }}, {{ $reg->birth_date->format('d-m-Y') }}
                            </div>
                        </td>

                        <td class="p-4 text-sm text-gray-600">
                            {{ $reg->major->name }}
                        </td>

                        <td class="p-4 text-sm">
                            <div class="flex items-center text-gray-600 mb-1">
                                <x-heroicon-o-phone class="w-3 h-3 mr-2" />
                                {{ $reg->guardians->first()->phone ?? '-' }}
                            </div>
                            <div class="flex items-center text-gray-600">
                                <x-heroicon-o-envelope class="w-3 h-3 mr-2" />
                                {{ $reg->email }}
                            </div>
                        </td>

                        <td class="p-4 text-sm text-gray-600">
                            {{ $reg->created_at->format('d/m/Y H:i') }}
                        </td>

                        <td class="p-4 text-center">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-{{ $reg->status->color() }}-100 text-{{ $reg->status->color() }}-700">
                                {{ $reg->status->label() }}
                            </span>
                        </td>

                        <td class="p-4 text-center">
                            <a href="{{ route('admin.registrants.show', $reg->registration_number) }}"
                               class="inline-flex items-center justify-center w-8 h-8 bg-blue-50 text-blue-600 rounded-full hover:bg-blue-600 hover:text-white transition-all shadow-sm"
                               title="Lihat Detail">
                                <x-heroicon-o-eye class="w-4 h-4" />
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="p-8 text-center text-gray-500">
                            <div class="flex flex-col items-center justify-center">
                                <x-heroicon-o-inbox class="w-12 h-12 text-gray-300 mb-3" />
                                <p>Tidak ada data pendaftar yang ditemukan.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="px-6 py-4 border-t border-gray-100 bg-gray-50">
            {{ $registrants->withQueryString()->links() }}
        </div>
    </div>

@endsection
