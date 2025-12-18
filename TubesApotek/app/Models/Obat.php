<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory;

    protected $table = 'obat'; // atau nama tabel kamu

    protected $fillable = [
        'kode',
        'nama_obat',
        'kategori',
        'stok',
        'letak_rak',
        'tanggal_masuk',
        'tanggal_kadaluarsa',
        'harga_modal',
        'harga_jual',
        'satuan_jual',
        'sisa_hari',
        'status'
    ];
}
