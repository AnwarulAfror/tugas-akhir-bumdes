<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $fillable = ['mitra_id','produk_id','total_tagihan','nominal_bayar','jenis_transaksi', 'keterangan','status'];

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }

    public function mitra()
    {
        return $this->belongsTo(Mitra::class);
    }
}