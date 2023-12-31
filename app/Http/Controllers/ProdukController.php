<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Produk::all();
        return view('produks.index', compact('data'));
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
        $data = Produk::create([
            'nama_produk' => $request->nama_produk,
            'keterangan' => $request->keterangan,
            'cara_bayar' => $request->cara_bayar,
        ]);

        if ($data)
        {
            return redirect()->route('produk.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Produk::findOrFail($id);
        
        return view('produks.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = Produk::findOrFail($id);
        
        $data->nama_produk = $request->nama_produk;
        $data->keterangan = $request->keterangan;
        $data->cara_bayar = $request->cara_bayar;

        $data->update();

        return redirect()->route('produk.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk $produk)
    {
        //
    }
}