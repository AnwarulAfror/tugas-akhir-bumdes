@extends('layouts.index')

@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Produk</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active">Produk</li>
        </ol>
        <div class="row mb-12">
            {{-- bagian edit / from endit taro disini --}}
            <div class="card">
                <div class="card-header">

                </div>
                <form action="{{route('produk.update', $data->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body p-2">
                        <div class="row mb-3">
                            <label for="inputDate" class="col-sm-3 col-form-label">Nama Produk</label>
                            <div class="col-sm-9">
                            <input type="text" value="{{$data->nama_produk}}" name="nama_produk" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputDate" class="col-sm-3 col-form-label">Keterangan</label>
                            <div class="col-sm-9">
                            <input type="text" value="{{$data->keterangan}}" name="keterangan" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputDate" class="col-sm-3 col-form-label">Keterangan</label>
                            <div class="col-sm-9">
                            <select name="cara_bayar" class="form-control" required id="">
                                <option value="langsung" {{$data->cara_bayar == 'langsung' ? 'selected' : ''}}>Lansung</option>
                                <option value="angsuran" {{$data->cara_bayar == 'angsuran' ? 'selected' : ''}}>Angsuran</option>
                            </select>
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