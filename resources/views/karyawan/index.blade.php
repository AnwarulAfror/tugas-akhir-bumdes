@extends('layouts.index')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Kontak</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active">Karyawan</li>
        </ol>
        <div class="row">
            <div class="col-lg-12">
              <div class="modal fade" id="basicModal" tabindex="-1">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Basic Modal</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      
                  <div class="row mb-3">
                    <label for="inputDate" class="col-sm-2 col-form-label">Tanggal</label>
                    <div class="col-sm-10">
                      <input type="date" class="form-control">
                    </div>
                  </div>
                <!-- Advanced Form Elements -->
                <div class="input-group mb-3">
                  <label for="inputDate" class="col-sm-2 col-form-label">Jumlah</label>
                  <span class="input-group-text">Rp</span>
                  <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                  <span class="input-group-text">.00</span>
                </div><!-- End General Form Elements -->
                <div class="input-group mb-3">
                  <label for="inputDate" class="col-sm-2 col-form-label">Pilih</label>
                  <select id="inputState" class="form-select">
                    <option selected>Choose...</option>
                    <option>...</option>
                  </select>
                </div>
              </div>
               <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                 <button type="button" class="btn btn-primary">Save changes</button>
               </div>
                 </div>
                </div>
              </div>
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Karyawan</h5>
                  <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#basicModal">
                    Basic Modal
                  </button>
                  <!-- Table with stripped rows -->
                  <table class="table datatable">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Jabatan</th>
                        <th scope="col">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($data as $item)
                          <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{$item->nama}}</td>
                            <td>{{$item->alamat}}</td>
                            <td>{{$item->jabatan}}</td>
                            <td>
                              <div class="form-group">
                                <a href="javascript:void(0)" class="btn btn-xs btn-primary" data-id="{{$item->id}}" data-bs-toggle="modal" data-bs-target="#edit"><i class="fa fa-edit"></i>Edit</a>
                              </div>
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
        <nav>
        </nav>
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