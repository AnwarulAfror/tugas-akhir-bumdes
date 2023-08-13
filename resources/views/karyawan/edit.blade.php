@extends('layouts.index')

@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Karyawan</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active">Karyawan</li>
        </ol>
        <div class="row mb-12">
            {{-- bagian edit / from endit taro disini --}}
            <div class="card">
                <div class="card-header">

                </div>
                <form action="{{route('karyawan.update', $data->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body p-2">
                        <div class="row mb-3">
                            <label for="inputDate" class="col-sm-3 col-form-label">Nama</label>
                            <div class="col-sm-9">
                            <input type="text" value="{{$data->nama}}" name="nama" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputDate" class="col-sm-3 col-form-label">Alamat</label>
                            <div class="col-sm-9">
                            <input type="text" value="{{$data->alamat}}" name="alamat" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputDate" class="col-sm-3 col-form-label">Jabatan</label>
                            <div class="col-sm-9">
                            <select name="jabatan" class="form-control" id="">
                                <option value="ketua" {{$data->jabatan == 'ketua' ? 'selected' : ''}}>ketua</option>
                                <option value="bendahara" {{$data->jabatan == 'bendahara' ? 'selected' : ''}}>Bendahara</option>
                                <option value="wakil_ketua" {{$data->jabatan == 'wakil_ketua' ? 'selected' : ''}}>Wakil Ketua</option>
                            </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputDate" class="col-sm-3 col-form-label">Kontak</label>
                            <div class="col-sm-9">
                            <input type="text" value="{{$data->no_kontak}}" name="no_kontak" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary float-end">Update</button>
                        <button type="button" onclick="window.history.back()" class="btn btn-secondary float-end">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection