@extends('layouts.app')

@section('content')
<div class="space-y-6">

    {{-- HEADER FORM --}}
    <div class="flex justify-between items-center">
        <div>
            <h2 class="text-xl font-semibold">Tambah Obat</h2>
        </div>

        <button class="flex items-center gap-2 bg-gray-100 hover:bg-gray-200 text-gray-700 px-4 py-2 rounded-lg transition">
            <i class="ri-file-download-line text-lg"></i>
            Export file
        </button>
    </div>

    {{-- CARD FORM --}}
    <div class="bg-white rounded-xl shadow p-8">

        <h3 class="text-center text-lg font-semibold mb-2">Formulir Penambahan Obat</h3>
        <p class="text-center text-gray-500 mb-8 text-sm">
            Pastikan seluruh informasi terisi dengan lengkap dan akurat
        </p>

        <form action="{{ route('obat.store') }}" method="POST">
            @csrf

            <div class="grid grid-cols-2 gap-6">

                {{-- KODE --}}
                <div>
                    <label class="block text-sm font-medium mb-1">Kode*</label>
                    <input type="text" name="kode"
                           class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-400 focus:border-blue-400">
                </div>

                {{-- HARGA MODAL --}}
                <div>
                    <label class="block text-sm font-medium mb-1">Harga Modal*</label>
                    <input type="number" name="harga_modal" placeholder="Rp"
                           class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-400 focus:border-blue-400">
                </div>

                {{-- NAMA OBAT --}}
                <div>
                    <label class="block text-sm font-medium mb-1">Nama Obat*</label>
                    <input type="text" name="nama_obat"
                           class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-400 focus:border-blue-400">
                </div>

                {{-- HARGA JUAL --}}
                <div>
                    <label class="block text-sm font-medium mb-1">Harga Jual*</label>
                    <input type="number" name="harga_jual" placeholder="Rp"
                           class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-400 focus:border-blue-400">
                </div>

                {{-- KATEGORI --}}
                <div>
                    <label class="block text-sm font-medium mb-1">Kategori*</label>
                    <input type="text" name="kategori"
                           class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-400 focus:border-blue-400">
                </div>

                {{-- SATUAN JUAL --}}
                <div>
                    <label class="block text-sm font-medium mb-1">Satuan Jual*</label>
                    <input type="text" name="satuan_jual"
                           class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-400 focus:border-blue-400">
                </div>

                {{-- STOK --}}
                <div>
                    <label class="block text-sm font-medium mb-1">Jumlah Stok*</label>
                    <input type="number" name="stok"
                           class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-400 focus:border-blue-400">
                </div>

                {{-- TANGGAL MASUK --}}
                <div>
                    <label class="block text-sm font-medium mb-1">Tanggal Masuk*</label>
                    <input type="date" name="tanggal_masuk"
                           class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-400 focus:border-blue-400">
                </div>

                {{-- LETAK RAK --}}
                <div>
                    <label class="block text-sm font-medium mb-1">Letak Rak*</label>
                    <input type="text" name="letak_rak"
                           class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-400 focus:border-blue-400">
                </div>

                {{-- TANGGAL KADALUARSA --}}
                <div>
                    <label class="block text-sm font-medium mb-1">Tanggal Kadaluarsa*</label>
                    <input type="date" name="tanggal_kadaluarsa"
                           class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-400 focus:border-blue-400">
                </div>

            </div>

            {{-- CATATAN --}}
            <p class="text-sm text-gray-500 mt-6">
                Kolom yang diberi tanda (*) merupakan data wajib.
            </p>

            {{-- BUTTONS --}}
            <div class="flex justify-end gap-4 mt-8">
                <a href="/obat"
                   class="px-6 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg transition">
                    Batal
                </a>

                <button type="submit"
                        class="px-6 py-2 bg-blue-700 hover:bg-blue-800 text-white rounded-lg transition">
                    Simpan
                </button>
            </div>

        </form>
    </div>
</div>
@endsection
