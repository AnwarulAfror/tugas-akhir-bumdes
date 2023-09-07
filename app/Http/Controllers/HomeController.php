<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
{
    $total_tagihan = Transaksi::where('total_tagihan', 'total_tagihan')->sum('transaksis.total_tagihan');
    $nominal_bayar = Transaksi::where('nominal_bayar', 'nominal_bayar')->sum('transaksis.nominal_bayar');
    $total_tagihan = $total_tagihan - $total_tagihan;
    $labaRugi = $nominal_bayar - $nominal_bayar;
// dd($total_tagihan,$labaRugi);
    return view('home.index', compact('total_tagihan', 'labaRugi'));
}

}