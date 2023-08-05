<?php

namespace App\Http\Controllers;

use App\Models\Mitra;
use App\Models\Produk;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Transaksi::with('mitra')->with('produk')->where('jenis_transaksi', 'keluar')->get();
        $mitra = Mitra::all();
        $produk = Produk::all();
        return view('transaksi.keluar.index', compact(['data', 'mitra', 'produk']));
    }

    public function index2()
    {
        $data = Transaksi::with('produk')->with('mitra')->where('jenis_transaksi', 'masuk')->get();
        // dd($data);
        $mitra = Mitra::all();
        $produk = Produk::all();
        if ($data)
        {
            return view('transaksi.masuk.index', compact(['data', 'mitra', 'produk']));    
        } else {
            return view('transaksi.masuk.index', compact(['data', 'mitra', 'produk']));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        if ($request->jenis_transaksi == 'masuk')
        {
            $produk = Produk::where('id', $request->produk_id)->first();
            if ($produk->cara_bayar == 'langsung'){
                $jenisTransaksi = 'lunas';
            } else {
                if ($request->total_tagihan !== $request->nominal_bayar) {
                    $jenisTransaksi = 'belum lunas';
                } else {
                    $jenisTransaksi = 'lunas';
                }
            }
        } else {
            $jenisTransaksi = 'lunas';
        }
        
        $data = Transaksi::create([
            'mitra_id' => $request->mitra_id,
            'produk_id' => $request->produk_id,
            'total_tagihan' => $request->total_tagihan,
            'nominal_bayar' => $request->nominal_bayar,
            'keterangan' => $request->keterangan,
            'jenis_transaksi' => $request->jenis_transaksi,
            'status' => $jenisTransaksi,
        ]);
        if ($data)
        {
            if ($request->jenis_transaksi == 'masuk')
            {
                return redirect()->route('transaksi.masuk');
            } else {
                return redirect()->route('transaksi.keluar');
                
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }
}