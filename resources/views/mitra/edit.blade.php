@extends('layouts.index')

@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Mitra</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active">Mitra</li>
        </ol>
        <div class="row mb-12">
            {{-- bagian edit / from endit taro disini --}}
            <div class="card">
                <div class="card-header">

                </div>
                <form action="{{route('mitra.update', $data->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body p-2">
                        <div class="row mb-3">
                            <label for="inputDate" class="col-sm-3 col-form-label">Nama</label>
                            <div class="col-sm-9">
                            <input type="text" value="{{$data->nama}}" name="nama" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputDate" class="col-sm-3 col-form-label">Alamat</label>
                            <div class="col-sm-9">
                            <input type="text" value="{{$data->alamat}}" name="alamat" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputDate" class="col-sm-3 col-form-label">Jenis</label>
                            <div class="col-sm-9">
                            <select name="jenis" class="form-control" id="">
                                <option value="kelompok" {{$data->jenis == 'kelompok' ? 'selected' : ''}}>Kelompok</option>
                                <option value="perorangan" {{$data->cara_bayar == 'perorangan' ? 'selected' : ''}}>Perorangan</option>
                            </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputDate" class="col-sm-3 col-form-label">Kontak</label>
                            <div class="col-sm-9">
                            <input type="text" value="{{$data->no_kontak}}" name="no_kontak" class="form-control" required>
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