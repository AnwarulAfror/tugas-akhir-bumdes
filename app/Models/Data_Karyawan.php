<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data_Karyawan extends Model
{
    use HasFactory;
    protected $fillable = ['nama', 'alamat', 'jabatan'];

    public function data_karyawan()
    {
        return $this->hasMany(Data_Karyawan::class);
    }
}