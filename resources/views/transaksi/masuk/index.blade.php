@extends('layouts.index')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Transaksi</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item">Transaksi</li>
          <li class="breadcrumb-item active">Pemasukan</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    
    <section class="section">
      <div class="row">
              
             <!-- Basic Modal -->
            <div class="modal fade" id="tambah" tabindex="-1">
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
                        <div class="input-group mb-4">
                          <label for="inputDate" class="col-sm-3 col-form-label">Total Tagihan</label>
                          <span class="input-group-text">Rp</span>
                          <input type="text" name="total_tagihan" class="form-control" aria-label="Amount (to the nearest dollar)">
                          <span class="input-group-text">.00</span>
                        </div><!-- End General Form Elements -->
                        <div class="input-group mb-4">
                          <label for="inputDate" class="col-sm-3 col-form-label">Jumlah Bayar</label>
                          <span class="input-group-text">Rp</span>
                          <input type="text" name="nominal_bayar" class="form-control" aria-label="Amount (to the nearest dollar)">
                          <span class="input-group-text">.00</span>
                        </div><!-- End General Form Elements -->
                        <div class="input-group mb-4">
                          <label for="inputDate" class="col-sm-3 col-form-label">Mitra</label>
                          <select id="inputState" name="mitra_id" class="form-select">
                            <option selected>pilih...</option>
                            @foreach ($mitra as $item)
                            <option value="{{$item->id}}">{{$item->nama}}</option>   
                            @endforeach
                          </select>
                        </div>
                        <div class="input-group mb-4">
                          <label for="inputDate" class="col-sm-3 col-form-label">Produk</label>
                          <select id="inputState" name="produk_id" class="form-select">
                            <option selected>pilih...</option>
                            @foreach ($produk as $item)
                            <option value="{{$item->id}}">{{$item->nama_produk}}</option>   
                            @endforeach
                          </select>
                        </div>
                        <input type="hidden" value="masuk" name="jenis_transaksi">
                     </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                  </div>
                </div>
              </form>
            </div>
          <div class="modal fade" id="edit" tabindex="-1">
            <form action="{{route('transaksi.store')}}" method="post">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                   <h5 class="modal-title">Edit Data</h5>
                   <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <!-- Advanced Form Elements -->
                  <div class="input-group mb-4">
                    <label for="inputDate" class="col-sm-3 col-form-label">Total Tagihan</label>
                    <span class="input-group-text">Rp</span>
                    <input type="text" name="total_tagihan" id="total_tagihan" class="form-control" aria-label="Amount (to the nearest dollar)">
                    <span class="input-group-text">.00</span>
                  </div><!-- End General Form Elements -->
                  <div class="input-group mb-4">
                    <label for="inputDate" class="col-sm-3 col-form-label">Jumlah Bayar</label>
                    <span class="input-group-text">Rp</span>
                    <input type="text" name="nominal_bayar" id="nominal_bayar" class="form-control" aria-label="Amount (to the nearest dollar)">
                    <span class="input-group-text">.00</span>
                  </div><!-- End General Form Elements -->
                  <div class="input-group mb-4">
                    <label for="inputDate" class="col-sm-3 col-form-label">Mitra</label>
                    <select id="inputState" name="mitra_id" id="mitra_id" class="form-select">
                      <option>pilih...</option>
                      @foreach ($mitra as $item)
                      <option value="{{$item->id}}">{{$item->nama}}</option>   
                      @endforeach
                    </select>
                  </div>
                  <div class="input-group mb-4">
                    <label for="inputDate" class="col-sm-3 col-form-label">Produk</label>
                    <select id="inputState" name="produk_id" id="produk_id" class="form-select">
                      <option selected>pilih...</option>
                      @foreach ($produk as $item)
                      <option value="{{$item->id}}">{{$item->nama_produk}}</option>   
                      @endforeach
                    </select>
                  </div>
                  <input type="hidden" value="masuk" name="jenis_transaksi" id="jenis_transaksi">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
              </div>
            </div>
            </form>
          </div><!-- End Basic Modal-->
            <div class="row">
              <div class="col-lg-12">
      
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Datatables</h5>
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#tambah">
                      Tambah Data
                    </button>
                    <!-- Table with stripped rows -->
                    <table class="table datatable">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Mitra</th>
                          <th scope="col">Produk</th>
                          <th scope="col">Total Tagihan</th>
                          <th scope="col">Nominal</th>
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
                          <td>{{$item->produk->nama_produk}}</td>
                          <td>{{$item->total_tagihan}}</td>
                          <td>{{$item->nominal_bayar}}</td>
                          <td>{{$item->jenis_transaksi}}</td>
                          <td>{{$item->status}}</td>
                          <td>
                            <a href="#" class="btn btn-xs btn-primary" data-id="{{$item->id}}" data-bs-toggle="modal" data-bs-target="#edit"><i class="fa fa-edit"></i>Edit</a>
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