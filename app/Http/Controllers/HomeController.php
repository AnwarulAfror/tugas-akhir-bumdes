<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
{
    $total_tagihan = DB::table('transaksis as t')->select('t.nominal_bayar')->where('t.jenis_transaksi', 'masuk')->sum('t.nominal_bayar');
    $total_pengeluaran = DB::table('transaksis as t')->select('t.nominal_bayar')->where('t.jenis_transaksi', 'keluar')->sum('t.nominal_bayar');
    return view('home.index', compact('total_tagihan', 'total_pengeluaran'));
}

}