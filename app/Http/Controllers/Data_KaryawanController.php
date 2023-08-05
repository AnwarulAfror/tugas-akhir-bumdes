<?php

namespace App\Http\Controllers;

use App\Models\Data_Karyawan;
use Illuminate\Http\Request;

class Data_karyawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Data_Karyawan::all();
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
        $data = Data_Karyawan::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'jabatan' => $request->jabatan,
        ]);

        if ($data) {
            return redirect()->route('karyawan.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($data)
    {
        $data = Data_Karyawan::findOrFail();

        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Data_Karyawan $data_Karyawan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Data_Karyawan $data_Karyawan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Data_Karyawan $data_Karyawan)
    {
        //
    }
}