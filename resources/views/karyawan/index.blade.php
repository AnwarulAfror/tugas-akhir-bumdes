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
              <div class="modal fade" id="basicModal" tabindex="-1">
                <form action="{{ route('karyawan.store')}}" method="post">
                @csrf
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Tambah Karyawan</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                        <div class="modal-body">
                          <div class="row mb-3">
                            <label for="inputDate" class="col-sm-3 col-form-label">Nama</label>
                              <div class="col-sm-9">
                                <input type="text" name="nama" class="form-control" required>
                              </div>
                          </div>
                            <div class="row mb-3">
                              <label for="inputDate" class="col-sm-3 col-form-label">Alamat</label>
                                <div class="col-sm-9">
                                  <input type="text" name="alamat" class="form-control" required>
                                </div>
                            </div>
                            <!-- Advanced Form Elements --><!-- End General Form Elements -->
                            <div class="input-group mb-2">
                              <label for="inputDate" class="col-sm-4 col-form-label">Jabatan</label>
                                <select id="inputState" name="jabatan" class="form-select" required>
                                <option value="">Pilih</option>
                                <option value="ketua">Ketua</option>
                                <option value="wakil_ketua">Wakil Ketua</option>
                                <option value="bendahara">Bendahara</option>
                              </select>
                            </div>
                            <div class="row mb-3">
                              <label for="inputDate" class="col-sm-3 col-form-label">No Kontak</label>
                                <div class="col-sm-9">
                                  <input type="text" name="no_kontak" class="form-control" required>
                                </div>
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
                      <h5 class="card-title">Data Karyawan</h5>
                      <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#basicModal">
                      Tambah Karyawan
                      </button>
                      <!-- Table with stripped rows -->
                      <table class="table datatable">
                        <thead>
                          <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Jabatan</th>
                            <th scope="col">No Kontak</th>
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
                            <td>{{$item->no_kontak}}</td>
                            <td>
                              <a href="{{route('karyawan.edit', $item->id)}}" class="btn btn-xs btn-primary" data-id="{{$item->id}}"><i class="fa fa-edit"></i>Edit</a>
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