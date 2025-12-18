@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto space-y-6">

    {{-- HEADER --}}
    <div class="flex justify-between items-center">
        <h2 class="text-xl font-semibold">Detail Obat</h2>

        <a href="{{ route('obat.index') }}"
           class="px-4 py-2 bg-gray-200 hover:bg-gray-300 rounded-lg text-sm">
            Kembali
        </a>
    </div>

    {{-- CARD DETAIL --}}
    <div class="bg-white shadow rounded-xl p-6 space-y-4">

        {{-- STATUS BADGE --}}
        @php
            $color = match($obat->status) {
                'aman'    => 'bg-green-100 text-green-700 border-green-300',
                'periksa' => 'bg-yellow-100 text-yellow-700 border-yellow-300',
                'segera'  => 'bg-red-100 text-red-700 border-red-300',
                default   => 'bg-gray-100 text-gray-700 border-gray-300'
            };
        @endphp

        <div>
            <span class="px-3 py-1 text-xs rounded-full border {{ $color }}">
                Status: {{ ucfirst($obat->status) }}
            </span>
        </div>

        {{-- DATA --}}
        <div class="grid grid-cols-2 gap-4">
            <div>
                <p class="font-medium text-gray-700">Kode</p>
                <p>{{ $obat->kode }}</p>
            </div>
            <div>
                <p class="font-medium text-gray-700">Nama Obat</p>
                <p>{{ $obat->nama_obat }}</p>
            </div>

            <div>
                <p class="font-medium text-gray-700">Kategori</p>
                <p>{{ $obat->kategori }}</p>
            </div>

            <div>
                <p class="font-medium text-gray-700">Stok</p>
                <p>{{ $obat->stok }}</p>
            </div>

            <div>
                <p class="font-medium text-gray-700">Letak Rak</p>
                <p>{{ $obat->letak_rak }}</p>
            </div>

            <div>
                <p class="font-medium text-gray-700">Satuan Jual</p>
                <p>{{ $obat->satuan_jual }}</p>
            </div>

            <div>
                <p class="font-medium text-gray-700">Tanggal Masuk</p>
                <p>{{ $obat->tanggal_masuk }}</p>
            </div>

            <div>
                <p class="font-medium text-gray-700">Tanggal Kadaluarsa</p>
                <p>{{ $obat->tanggal_kadaluarsa }}</p>
            </div>

            <div>
                <p class="font-medium text-gray-700">Sisa Hari</p>
                <p>{{ $obat->sisa_hari }} hari</p>
            </div>

            <div>
                <p class="font-medium text-gray-700">Harga Modal</p>
                <p>Rp {{ number_format($obat->harga_modal, 0, ',', '.') }}</p>
            </div>

            <div>
                <p class="font-medium text-gray-700">Harga Jual</p>
                <p>Rp {{ number_format($obat->harga_jual, 0, ',', '.') }}</p>
            </div>
        </div>

        {{-- TOMBOL AKSI --}}
        <div class="flex gap-3 pt-4">
            <a href="{{ route('obat.edit', $obat->id) }}"
               class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 text-sm">
                Edit
            </a>

            <form action="{{ route('obat.destroy', $obat->id) }}" method="POST"
                  onsubmit="return confirm('Yakin hapus obat ini?')">
                @csrf
                @method('DELETE')
                <button type="submit"
                        class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 text-sm">
                    Hapus
                </button>
            </form>
        </div>

    </div>
</div>
@endsection
