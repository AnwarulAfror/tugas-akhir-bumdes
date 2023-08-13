<?php

namespace App\Http\Controllers;

use App\Models\DataKaryawan;
use Illuminate\Http\Request;

class DataKaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DataKaryawan::all();
        return view('karyawan.index', compact('data'));
        
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
        $data = DataKaryawan::create([
            'no_karyawan' => uniqid(),
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'jabatan' => $request->jabatan,
            'no_kontak' => $request->no_kontak,
        ]);

        if ($data)
        {
            return redirect()->route('karyawan.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(DataKaryawan $dataKaryawan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = DataKaryawan::findOrFail($id);
        
        return view('karyawan.edit',compact('data') );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = DataKaryawan::findOrFail ($id);
        $data->nama = $request->nama;
        $data->alamat = $request->alamat;
        $data->jabatan = $request->jabatan;
        $data->no_kontak = $request->no_kontak;
        
        $data->update();
        
        {
            return redirect()->route('karyawan.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DataKaryawan $dataKaryawan)
    {
        //
    }
}