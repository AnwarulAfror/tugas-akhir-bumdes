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
              <div class="modal fade" id="basicModal" tabindex="-1">
                <form action="{{ route('produk.store')}}" method="post">
                @csrf
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Tambah Produk</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                        <div class="modal-body">
                          <div class="row mb-3">
                            <label for="inputDate" class="col-sm-3 col-form-label">Nama Produk</label>
                              <div class="col-sm-9">
                                <input type="text" name="nama_produk" class="form-control" required>
                              </div>
                          </div>
                            <div class="row mb-3">
                              <label for="inputDate" class="col-sm-3 col-form-label">Keterangan</label>
                                <div class="col-sm-9">
                                  <input type="text" name="keterangan" class="form-control" required>
                                </div>
                            </div>
                            <!-- Advanced Form Elements --><!-- End General Form Elements -->
                            <div class="input-group mb-2">
                              <label for="inputDate" class="col-sm-4 col-form-label">Jenis Pembayaran</label>
                                <select id="inputState" name="cara_bayar" class="form-select" required>
                                <option value="">Pilih</option>
                                <option value="langsung">Langsung</option>
                                <option value="angsuran">Angsuran</option>
                              </select>
                            </div>
                        </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan Data</button>
                          </div>
                    </div>
                  </div>
                </form>
              </div>
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Data Produk</h5>
                      <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#basicModal">
                      Tambah Produk
                      </button>
                      <!-- Table with stripped rows -->
                      <table class="table datatable">
                        <thead>
                          <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Produk</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Jenis Pembayaran</th>
                            <th scope="col">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($data as $item)
                          <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{$item->nama_produk}}</td>
                            <td>{{$item->keterangan}}</td>
                            <td>{{$item->cara_bayar}}</td>
                            <td>
                              <a href="{{route('produk.edit', $item->id)}}" class="btn btn-xs btn-primary" data-id="{{$item->id}}"><i class="fa fa-edit"></i>Edit</a>
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
    </main>
@endsection
{{-- tambahan java script --}}
@push('css')
    
@endpush

@push('javascript')
    <script>
      
    </script>
@endpush