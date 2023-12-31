@extends('layouts.index')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Transaksi</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Mitra</li>
            </ol>
            <div class="row">
              <div class="col-lg-12">
                <div class="modal fade" id="tambah" tabindex="-1">
                  <form action="{{route('mitra.store')}}" method="post">
                    @csrf
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Tambah Data</h5>
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
                          <!-- Advanced Form Elements -->
                          <!-- End General Form Elements -->
                          <div class="input-group mb-3">
                            <label for="inputDate" class="col-sm-3 col-form-label">Jenis Mitra</label>
                            <select id="inputState" name="jenis" class="form-select" required>
                              <option value="">Pilih</option>
                              <option value="kelompok">Kelopok</option>
                              <option value="perorangan">Perorangan</option>
                            </select>
                          </div>
                          <div class="row mb-3">
                            <label for="inputDate" class="col-sm-3 col-form-label">Kontak</label>
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
                      <h5 class="card-title">Data Mitra</h5>
                      <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#tambah">
                        Tambah Data
                      </button>
                      <!-- Table with stripped rows -->
                      <table class="table datatable">
                        <thead>
                          <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Jenis</th>
                            <th scope="col">Kontak</th>
                            <th scope="col">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($data as $item)
                          <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{$item->nama}}</td>
                            <td>{{$item->alamat}}</td>
                            <td>{{$item->jenis}}</td>
                            <td>{{$item->no_kontak}}</td>
                            <td>
                                <a href="{{route('mitra.edit', $item->id)}}" class="btn btn-xs btn-primary" data-id="{{$item->id}}"><i class="fa fa-edit"></i>Edit</a>
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
    </main>
@endsection
{{-- tambahan java script --}}
@push('css')
    
@endpush

@push('javascript')
    <script>
      $(document).ready(function(){
        $('#btnEdit').on('click', function() {
          let id = $(this).data('id');
          let url = $(this).data('url');
          let token = $("meta[name='csrf-token']").attr("content");
          
          $.ajax({
            url: url,
            type: 'GET',
            data: {
              '_token': token
            },
            success: function(e) {
              console.log(e);
              $('#id').val(e.id);
              $('#nama').val(e.nama);
              $('#alamat').val(e.alamat);
              $(`#select option[value=${e.jenis}]`).attr('selected', 'selected');
              // $('#select').select2().trigger('change');
              $('#no_kontak').val(e.no_kontak);
            }
          })
        });

        $('#update').on('click', function() {
          let id = $('#id').val();
          $.ajax({
            url: `/mitra/${id}`,
            type: 'PUT',
            data: {
              '_token': $("meta[name='csrf-token']").attr("content"),
              'nama': $('$nama').val(),
              'alamat': $('$alamt').val(),
              'jenis': $('$jenis').val(),
              'no_kontak': $('$no_kontak').val(),
            },
            success: function(e){
              window.location.refresh();
            }
          })
        })
      })
    </script>
@endpush