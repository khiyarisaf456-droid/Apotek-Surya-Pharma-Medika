@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto space-y-6">

    <div class="flex justify-between items-center">
        <h2 class="text-xl font-semibold">Edit Data Obat</h2>

        <a href="{{ route('obat.index') }}"
           class="px-4 py-2 bg-gray-200 hover:bg-gray-300 rounded-lg text-sm">
            Kembali
        </a>
    </div>

    <form action="{{ route('obat.update', $obat->id) }}" method="POST"
          class="bg-white shadow rounded-xl p-6 space-y-4">
        @csrf
        @method('PUT')

        {{-- KODE --}}
        <div>
            <label class="text-sm font-medium">Kode Obat</label>
            <input type="text" name="kode"
                   value="{{ $obat->kode }}"
                   class="w-full border px-3 py-2 rounded-lg">
        </div>

        {{-- NAMA --}}
        <div>
            <label class="text-sm font-medium">Nama Obat</label>
            <input type="text" name="nama_obat"
                   value="{{ $obat->nama_obat }}"
                   class="w-full border px-3 py-2 rounded-lg">
        </div>

        {{-- KATEGORI --}}
        <div>
            <label class="text-sm font-medium">Kategori</label>
            <input type="text" name="kategori"
                   value="{{ $obat->kategori }}"
                   class="w-full border px-3 py-2 rounded-lg">
        </div>

        {{-- STOK --}}
        <div>
            <label class="text-sm font-medium">Stok</label>
            <input type="number" name="stok"
                   value="{{ $obat->stok }}"
                   class="w-full border px-3 py-2 rounded-lg">
        </div>

        {{-- RAK --}}
        <div>
            <label class="text-sm font-medium">Letak Rak</label>
            <input type="text" name="letak_rak"
                   value="{{ $obat->letak_rak }}"
                   class="w-full border px-3 py-2 rounded-lg">
        </div>

        {{-- TANGGAL --}}
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="text-sm font-medium">Tanggal Masuk</label>
                <input type="date" name="tanggal_masuk"
                       value="{{ $obat->tanggal_masuk }}"
                       class="w-full border px-3 py-2 rounded-lg">
            </div>

            <div>
                <label class="text-sm font-medium">Tanggal Kadaluarsa</label>
                <input type="date" name="tanggal_kadaluarsa"
                       value="{{ $obat->tanggal_kadaluarsa }}"
                       class="w-full border px-3 py-2 rounded-lg">
            </div>
        </div>

        {{-- HARGA --}}
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="text-sm font-medium">Harga Modal</label>
                <input type="number" name="harga_modal"
                       value="{{ $obat->harga_modal }}"
                       class="w-full border px-3 py-2 rounded-lg">
            </div>

            <div>
                <label class="text-sm font-medium">Harga Jual</label>
                <input type="number" name="harga_jual"
                       value="{{ $obat->harga_jual }}"
                       class="w-full border px-3 py-2 rounded-lg">
            </div>
        </div>

        {{-- SATUAN --}}
        <div>
            <label class="text-sm font-medium">Satuan Jual</label>
            <input type="text" name="satuan_jual"
                   value="{{ $obat->satuan_jual }}"
                   class="w-full border px-3 py-2 rounded-lg">
        </div>

        <button class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
            Simpan Perubahan
        </button>

    </form>

</div>
@endsection
