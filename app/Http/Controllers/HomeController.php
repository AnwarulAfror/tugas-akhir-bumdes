<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
{
    $total_tagihan = Transaksi::where('nominal_bayar', 'total_tagihan')->sum('transaksis.nominal_bayar');
    $nominal_bayar = Transaksi::where('nominal_bayar', 'nominal_bayar')->sum('transaksis.nominal_bayar');
    $labaHasil = $total_tagihan - $total_tagihan;
    $labaRugi = $nominal_bayar - $nominal_bayar;

    return view('home.index', compact('labaHasil', 'labaRugi'));
}

}