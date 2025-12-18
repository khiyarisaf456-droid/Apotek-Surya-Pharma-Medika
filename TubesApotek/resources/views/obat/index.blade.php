@extends('layouts.app')

@section('content')
<div class="space-y-6">

    {{-- HEADER --}}
    <div class="flex justify-between items-center">
        <h2 class="text-xl font-semibold">Daftar Obat</h2>

        <a href="{{ route('obat.create') }}"
           class="px-4 py-2 bg-blue-700 hover:bg-blue-800 text-white rounded-lg transition">
            + Tambah Obat
        </a>
    </div>

    <div class="bg-white shadow rounded-xl p-6">

        {{-- FILTER & SEARCH --}}
        <div class="flex justify-between mb-4">
            <button onclick="toggleFilter()"
                class="px-4 py-2 bg-gray-200 hover:bg-gray-300 rounded-lg text-sm">
                Filter
            </button>

            <form method="GET" action="{{ route('obat.index') }}">
                <input name="search" value="{{ request('search') }}"
                    type="text" placeholder="Cari obat..."
                    class="border border-gray-300 px-3 py-2 rounded-lg w-64 focus:ring-2 focus:ring-blue-300">
            </form>
        </div>

        {{-- FILTER PANEL --}}
        <div id="filterPanel" class="hidden p-4 mb-5 border rounded-lg bg-gray-50">
            <form method="GET" action="{{ route('obat.index') }}" class="grid grid-cols-2 gap-4">

                <div>
                    <label class="text-sm font-medium">Kategori</label>
                    <select name="kategori" class="w-full border p-2 rounded">
                        <option value="">Semua</option>
                        @foreach ($kategoriList as $k)
                            <option value="{{ $k }}" {{ request('kategori') == $k ? 'selected' : '' }}>
                                {{ ucfirst($k) }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="text-sm font-medium">Status</label>
                    <select name="status" class="w-full border p-2 rounded">
                        <option value="">Semua</option>
                        <option value="aman" {{ request('status') == 'aman' ? 'selected' : '' }}>Aman</option>
                        <option value="periksa" {{ request('status') == 'periksa' ? 'selected' : '' }}>Periksa</option>
                        <option value="segera" {{ request('status') == 'segera' ? 'selected' : '' }}>Segera</option>
                    </select>
                </div>

                <div>
                    <label class="text-sm font-medium">Stok Minimum</label>
                    <input type="number" name="stok_min" class="w-full border p-2 rounded"
                           value="{{ request('stok_min') }}">
                </div>

                <div>
                    <label class="text-sm font-medium">Stok Maksimum</label>
                    <input type="number" name="stok_max" class="w-full border p-2 rounded"
                           value="{{ request('stok_max') }}">
                </div>

                <div>
                    <label class="text-sm font-medium">Tanggal Masuk Dari</label>
                    <input type="date" name="masuk_dari" class="w-full border p-2 rounded"
                           value="{{ request('masuk_dari') }}">
                </div>

                <div>
                    <label class="text-sm font-medium">Tanggal Masuk Sampai</label>
                    <input type="date" name="masuk_sampai" class="w-full border p-2 rounded"
                           value="{{ request('masuk_sampai') }}">
                </div>

                <div>
                    <label class="text-sm font-medium">Kadaluarsa Dari</label>
                    <input type="date" name="exp_dari" class="w-full border p-2 rounded"
                           value="{{ request('exp_dari') }}">
                </div>

                <div>
                    <label class="text-sm font-medium">Kadaluarsa Sampai</label>
                    <input type="date" name="exp_sampai" class="w-full border p-2 rounded"
                           value="{{ request('exp_sampai') }}">
                </div>

                <div class="col-span-2 flex justify-end gap-3 mt-2">
                    <a href="{{ route('obat.index') }}"
                       class="px-3 py-2 bg-gray-300 text-sm rounded-lg">Reset</a>

                    <button class="px-4 py-2 bg-blue-600 text-white rounded-lg text-sm">
                        Terapkan Filter
                    </button>
                </div>

            </form>
        </div>

        {{-- TABLE --}}
        <div class="overflow-x-auto">
            <table class="w-full text-sm border-collapse">

                <thead>
                    <tr class="bg-gray-100 border-b">
                        <th class="px-4 py-3 text-left">Kode</th>
                        <th class="px-4 py-3 text-left">Nama Obat</th>
                        <th class="px-4 py-3 text-left">Kategori</th>
                        <th class="px-4 py-3 text-left">Stok</th>
                        <th class="px-4 py-3 text-left">Kadaluarsa</th>
                        <th class="px-4 py-3 text-left">Sisa Hari</th>
                        <th class="px-4 py-3 text-left">Status</th>
                        <th class="px-4 py-3 text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($obat as $o)
                    <tr class="border-b hover:bg-gray-50">

                        <td class="px-4 py-3">{{ $o->kode }}</td>
                        <td class="px-4 py-3">{{ $o->nama_obat }}</td>
                        <td class="px-4 py-3">{{ $o->kategori }}</td>
                        <td class="px-4 py-3">{{ $o->stok }}</td>
                        <td class="px-4 py-3">{{ $o->tanggal_kadaluarsa }}</td>
                        <td class="px-4 py-3">{{ $o->sisa_hari }} hari</td>

                        <td class="px-4 py-3">
                            <span class="px-3 py-1 rounded-full border text-xs font-medium">
                                {{ ucfirst($o->status) }}
                            </span>
                        </td>

                        {{-- AKSI (ICON) --}}
                        <td class="px-4 py-3 flex justify-center gap-2">

                            <a href="{{ route('obat.show', $o->id) }}"
                               class="p-2 bg-gray-100 hover:bg-gray-200 rounded-lg text-gray-700"
                               title="Detail">
                                <i class="ri-eye-line"></i>
                            </a>

                            <a href="{{ route('obat.edit', $o->id) }}"
                               class="p-2 bg-blue-600 hover:bg-blue-700 rounded-lg text-white"
                               title="Edit">
                                <i class="ri-pencil-line"></i>
                            </a>

                            <form action="{{ route('obat.destroy', $o->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Hapus obat ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="p-2 bg-red-500 hover:bg-red-600 rounded-lg text-white"
                                        title="Hapus">
                                    <i class="ri-delete-bin-line"></i>
                                </button>
                            </form>

                        </td>

                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
</div>

<script>
function toggleFilter() {
    document.getElementById('filterPanel').classList.toggle('hidden');
}
</script>
@endsection
