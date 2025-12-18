<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obat;
use Carbon\Carbon;

class ObatController extends Controller
{
    // ========================================
    // INDEX LIST + SEARCH + FILTER
    // ========================================
    public function index(Request $request)
    {
        // Ambil daftar kategori unik
        $kategoriList = Obat::select('kategori')->distinct()->pluck('kategori');

        // Query awal
        $query = Obat::query();

        // ========== SEARCH ==========
        if ($request->search) {
            $q = $request->search;
            $query->where(function ($x) use ($q) {
                $x->where('nama_obat', 'like', "%$q%")
                  ->orWhere('kode', 'like', "%$q%")
                  ->orWhere('kategori', 'like', "%$q%");
            });
        }

        // ========== FILTER KATEGORI ==========
        if ($request->kategori) {
            $query->where('kategori', $request->kategori);
        }

        // ========== FILTER STATUS ==========
        if ($request->status) {
            $query->where('status', $request->status);
        }

        // ========== FILTER STOK ==========
        if ($request->stok_min !== null) {
            $query->where('stok', '>=', $request->stok_min);
        }

        if ($request->stok_max !== null) {
            $query->where('stok', '<=', $request->stok_max);
        }

        // ========== FILTER TANGGAL MASUK ==========
        if ($request->masuk_dari) {
            $query->whereDate('tanggal_masuk', '>=', $request->masuk_dari);
        }

        if ($request->masuk_sampai) {
            $query->whereDate('tanggal_masuk', '<=', $request->masuk_sampai);
        }

        // ========== FILTER TANGGAL EXP ==========
        if ($request->exp_dari) {
            $query->whereDate('tanggal_kadaluarsa', '>=', $request->exp_dari);
        }

        if ($request->exp_sampai) {
            $query->whereDate('tanggal_kadaluarsa', '<=', $request->exp_sampai);
        }

        // Ambil hasil akhir
        $obat = $query->orderBy('nama_obat')->get();

        return view('obat.index', compact('obat', 'kategoriList'));
    }

    // ========================================
    // SHOW DETAIL
    // ========================================
    public function show($id)
    {
        $obat = Obat::findOrFail($id);
        return view('obat.show', compact('obat'));
    }

    // ========================================
    // FORM TAMBAH
    // ========================================
    public function create()
    {
        return view('obat.tambah');
    }

    // ========================================
    // STORE DATA BARU
    // ========================================
    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required',
            'nama_obat' => 'required',
            'kategori' => 'required',
            'stok' => 'required|numeric',
            'letak_rak' => 'required',
            'tanggal_masuk' => 'required|date',
            'tanggal_kadaluarsa' => 'required|date',
            'harga_modal' => 'required|numeric',
            'harga_jual' => 'required|numeric',
            'satuan_jual' => 'required',
        ]);

        $this->processSave(new Obat(), $request);

        return redirect()->route('obat.index')->with('success', 'Obat berhasil ditambahkan!');
    }

    // ========================================
    // FORM EDIT
    // ========================================
    public function edit($id)
    {
        $obat = Obat::findOrFail($id);
        return view('obat.edit', compact('obat'));
    }

    // ========================================
    // UPDATE DATA
    // ========================================
    public function update(Request $request, $id)
    {
        $request->validate([
            'kode' => 'required',
            'nama_obat' => 'required',
            'kategori' => 'required',
            'stok' => 'required|numeric',
            'letak_rak' => 'required',
            'tanggal_masuk' => 'required|date',
            'tanggal_kadaluarsa' => 'required|date',
            'harga_modal' => 'required|numeric',
            'harga_jual' => 'required|numeric',
            'satuan_jual' => 'required',
        ]);

        $obat = Obat::findOrFail($id);
        $this->processSave($obat, $request);

        return redirect()->route('obat.index')->with('success', 'Obat berhasil diperbarui!');
    }

    // ========================================
    // FUNGSI REUSABLE UNTUK SIMPAN/UPDATE
    // ========================================
    private function processSave($obat, $request)
    {
        // Hitung sisa hari
        $masuk = Carbon::parse($request->tanggal_masuk);
        $exp   = Carbon::parse($request->tanggal_kadaluarsa);

        $sisa_hari = $masuk->diffInDays($exp, false);

        // Tentukan status
        if ($sisa_hari <= 7) {
            $status = 'segera';
        } elseif ($sisa_hari <= 30) {
            $status = 'periksa';
        } else {
            $status = 'aman';
        }

        // Simpan data
        $obat->kode = $request->kode;
        $obat->nama_obat = $request->nama_obat;
        $obat->kategori = $request->kategori;
        $obat->stok = $request->stok;
        $obat->letak_rak = $request->letak_rak;
        $obat->tanggal_masuk = $request->tanggal_masuk;
        $obat->tanggal_kadaluarsa = $request->tanggal_kadaluarsa;
        $obat->harga_modal = $request->harga_modal;
        $obat->harga_jual = $request->harga_jual;
        $obat->satuan_jual = $request->satuan_jual;
        $obat->sisa_hari = $sisa_hari;
        $obat->status = $status;

        $obat->save();
    }

    // ========================================
    // DELETE
    // ========================================
    public function destroy($id)
    {
        Obat::destroy($id);
        return redirect()->route('obat.index')->with('success', 'Obat berhasil dihapus!');
    }
}
