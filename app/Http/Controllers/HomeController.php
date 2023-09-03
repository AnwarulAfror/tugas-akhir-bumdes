<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $pemasukan = Transaksi :: sum ('transaksis.total_tagihan');
        $pengeluaran = Transaksi :: sum ('transaksis.nominal_bayar');
        return view('home.index', compact(['pemasukan', 'pengeluaran']));
        // $pengeluaran = Transaksi :: sum ('transaksis.nominal_bayar');
        // return view('home.index', compact(['pengeluaran']));
    }
}