@extends('layouts.index')

@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Transaksi</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active">Pemasukan</li>
        </ol>
        <div class="row mb-12">
            {{-- bagian edit / from endit taro disini --}}
            <div class="card">
                <div class="card-header">

                </div>
                <form action="{{route('transaksi.update', $data->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body p-2">
                        <!-- Advanced Form Elements -->
                        <div class="input-group mb-3">
                          <label for="inputDate" class="col-sm-3 col-form-label">Total Tagihan</label>
                          <span class="input-group-text">Rp</span>
                          <input type="text" value="{{$data->total_tagihan}}" name="total_tagihan" class="form-control" required aria-label="Amount (to the nearest dollar)">
                          <span class="input-group-text">.00</span>
                        </div><!-- End General Form Elements -->
                        <div class="input-group mb-3">
                          <label for="inputDate" class="col-sm-3 col-form-label">Jumlah Bayar</label>
                          <span class="input-group-text">Rp</span>
                          <input type="text" value="{{$data->nominal_bayar}}" name="nominal_bayar" class="form-control"required aria-label="Amount (to the nearest dollar)">
                          <span class="input-group-text">.00</span>
                        </div><!-- End General Form Elements -->
                        <div class="input-group mb-3">
                            <label for="inputDate" class="col-sm-3 col-form-label">Mitra</label>
                            <select id="inputState" name="mitra_id" class="form-select" required>
                              <option selected>pilih...</option>
                              @foreach ($mitra as $item)
                              <option value="{{$item->id}}"{{$item->id == $data->mitra_id ? 'selected': ''}}>{{$item->nama}}</option>   
                              @endforeach
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <label for="inputDate" class="col-sm-3 col-form-label">Produk</label>
                            <select id="inputState" name="produk_id" class="form-select" required>
                              <option selected>pilih...</option>
                              @foreach ($produk as $item)
                              <option value="{{$item->id}}">{{$item->nama_produk ? 'selected': ''}}</option>   
                              @endforeach
                            </select>
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