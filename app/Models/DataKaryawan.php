<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataKaryawan extends Model
{
    use HasFactory;
    
    protected $fillable = ['no_karyawan', 'nama', 'alamat', 'jabatan', 'no_kontak'];
    
    public function DataKaryawan()
    {
        return $this->hasMany(DataKaryawan::class);
    }
}