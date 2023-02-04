@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<div class="page-content">
  <div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Edit Usaha</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.usaha.index') }}">Usaha</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
      <div class="col-12">
          <div class="card">
              <div class="card-body">

                <h4 class="card-title">Edit Usaha </h4>

                <form method="post" action="{{ route('admin.usaha.update', $usaha->id) }}" enctype="multipart/form-data">
                    @csrf

                    <div class="row mb-3">
                        <label for="nama_usaha" class="col-sm-2 col-form-label">Nama Usaha</label>
                        <div class="col-sm-10">
                            <input name="nama_usaha" class="form-control" type="text" value="{{ $usaha->nama_usaha }}" id="nama_usaha">
                            @error('nama_usaha')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label for="lokasi_usaha" class="col-sm-2 col-form-label">Lokasi Usaha</label>
                        <div class="col-sm-10">
                            <input name="lokasi_usaha" class="form-control" type="text" value="{{ $usaha->lokasi_usaha }}" id="lokasi_usaha">
                            @error('lokasi_usaha')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label for="cp_usaha" class="col-sm-2 col-form-label">Kontak Usaha (CP)</label>
                        <div class="col-sm-10">
                            <input name="cp_usaha" class="form-control" type="text" value="{{ $usaha->cp_usaha }}" id="cp_usaha">
                            @error('cp_usaha')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label for="harga_usaha" class="col-sm-2 col-form-label">Harga</label>
                        <div class="col-sm-4">
                            <input name="harga_usaha" class="form-control" type="number" value="{{ $usaha->harga_usaha }}" id="harga_usaha">
                            @error('harga_usaha')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                        <label for="satuan_usaha" class="col-sm-1 col-form-label">Satuan</label>
                        <div class="col-sm-5">
                            <input name="satuan_usaha" class="form-control" type="text" value="{{ $usaha->satuan_usaha }}" id="satuan_usaha">
                            @error('satuan_usaha')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label for="deskripsi_usaha" class="col-sm-2 col-form-label">Deskripsi Usaha</label>
                        <div class="col-sm-10">
                            <textarea name="deskripsi_usaha" id="elm1" cols="30" rows="10">{{ $usaha->deskripsi_usaha }}</textarea>
                            @error('deskripsi_usaha')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <!-- end row -->

                    <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Usaha Data">
                  </form>

              </div>
          </div>

  </div>
</div>

<script>
  $(document).ready(function() {
    $('#image').change(function(e) {
      const reader = new FileReader();
      reader.onload = function(e) {
        $('#showImage').attr('src', e.target.result);
      }
      reader.readAsDataURL(e.target.files['0']);
    })
  })
</script>

@endsection
