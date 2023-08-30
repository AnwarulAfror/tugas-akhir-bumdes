@extends('layouts.index')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Transaksi</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item">Transaksi</li>
          <li class="breadcrumb-item active">Pengeluaran</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">  
             <!-- Basic Modal -->
            <div class="modal fade" id="basicModal" tabindex="-1">
              <form action="{{route('transaksi.store')}}" method="post">
                  @csrf
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title">Tambah Data</h5>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <!-- Advanced Form Elements -->
                    <div class="input-group mb-3">
                      <label for="inputDate" class="col-sm-3 col-form-label">Total Tagihan</label>
                      <span class="input-group-text">Rp</span>
                      <input type="text" name="total_tagihan" class="form-control" required aria-label="Amount (to the nearest dollar)">
                      <span class="input-group-text">.00</span>
                    </div><!-- End General Form Elements -->
                    <div class="input-group mb-3">
                      <label for="inputDate" class="col-sm-3 col-form-label">Jumlah Bayar</label>
                      <span class="input-group-text">Rp</span>
                      <input type="text" name="nominal_bayar" class="form-control"required aria-label="Amount (to the nearest dollar)">
                      <span class="input-group-text">.00</span>
                    </div><!-- End General Form Elements -->
                    <div class="input-group mb-3">
                      <label for="inputDate" class="col-sm-3 col-form-label">Mitra</label>
                      <select id="inputState" name="mitra_id" class="form-select" required>
                        <option value="">pilih...</option>
                        @foreach ($mitra as $item)
                        <option value="{{$item->id}}">{{$item->nama}}</option>   
                        @endforeach
                      </select>
                    </div>
                    <div class="input-group mb-3">
                      <label for="inputDate" class="col-sm-3 col-form-label">Keterangan</label>
                      <input type="text" name="keterangan" class="form-control" required>
                    </div>
                    <input type="hidden" value="keluar" name="jenis_transaksi">
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
                </div>
              </div>
              </form>
            </div>
            <div class="row">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Tambah Data Pengeluaran</h5>
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#basicModal">
                      Tambah Data Pengeluaran
                    </button>
                    <!-- Table with stripped rows -->
                    <table class="table datatable">
                      <thead>
                        <tr>
                          <th scope="col">No</th>
                          <th scope="col">Mitra</th>
                          <th scope="col">Nominal</th>
                          <th scope="col">Keterangan</th>
                          <th scope="col">Jenis</th>
                          <th scope="col">Status</th>
                          <th scope="col">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($data as $item)
                        <tr>
                          <th scope="row">{{$loop->iteration}}</th>
                          <td>{{$item->mitra ? $item->mitra->nama : ''}}</td>
                          <td>{{$item->nominal_bayar}}</td>
                          <td>{{$item->keterangan}}</td>
                          <td>{{$item->jenis_transaksi}}</td>
                          <td>{{$item->status}}</td>
                          <td>
                            <a href="{{route('transaksi.edit', $item->id)}}" class="btn btn-xs btn-primary" data-id="{{$item->id}}"><i class="fa fa-edit"></i>Edit</a>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                    <!-- End Table with stripped rows -->
                  </div>
                </div>
              </div>
            </div>
      </div>
    </section>
</main>
@endsection
{{-- tambahan java script --}}
@push('css')
    
@endpush

@push('javascript')
    <script>
      
    </script>
@endpush