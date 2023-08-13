<?php

namespace App\Http\Controllers;

use App\Models\Mitra;
use Illuminate\Http\Request;

class MitraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Mitra::all();
        return view('mitra.index', compact('data'));
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
        $data = Mitra::create([
            'no_anggota' => uniqid(),
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'jenis' => $request->jenis,
            'no_kontak' => $request->no_kontak,
        ]);

        if ($data) {
            return redirect()->route('mitra.index');
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = Mitra::findOrFail($id);

        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Mitra::findOrFail($id);
        
        return view('mitra.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = Mitra::findOrFail($id);

        $data->nama = $request->nama;
        $data->alamat = $request->alamat;
        $data->no_kontak = $request->no_kontak;
        $data->jenis = $request->jenis;
        
        $data->update();
        
        {
            return redirect()->route('mitra.index');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mitra $mitra)
    {
        //
    }
}