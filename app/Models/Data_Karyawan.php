<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data_Karyawan extends Model
{
    use HasFactory;
    protected $fillable = ['nama','alamat','jabatan'];

    public function karyawan()
    {
        return $this->belongsTo(Data_Karyawan::class);
    }
}