<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mitra extends Model
{
    use HasFactory;

    protected $fillable = ['no_anggota', 'nama', 'alamat', 'jenis', 'no_kontak'];

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }
}