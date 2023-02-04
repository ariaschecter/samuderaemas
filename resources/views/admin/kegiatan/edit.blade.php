@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<div class="page-content">
  <div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Edit Kegiatan</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.kegiatan.index') }}">Kegiatan</a></li>
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

                <h4 class="card-title">Edit Kegiatan </h4>

                <form method="post" action="{{ route('admin.kegiatan.update', $kegiatan->id) }}" enctype="multipart/form-data">
                    @csrf

                    <div class="row mb-3">
                        <label for="judul_kegiatan" class="col-sm-2 col-form-label">Judul Kegiatan</label>
                        <div class="col-sm-10">
                            <input name="judul_kegiatan" class="form-control" type="text" value="{{ $kegiatan->judul_kegiatan }}" id="judul_kegiatan">
                            @error('judul_kegiatan')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label for="tempat_kegiatan" class="col-sm-2 col-form-label">Tenoat Kegiatan</label>
                        <div class="col-sm-10">
                            <input name="tempat_kegiatan" class="form-control" type="text" value="{{ $kegiatan->tempat_kegiatan }}" id="tempat_kegiatan">
                            @error('tempat_kegiatan')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label for="deskripsi_kegiatan" class="col-sm-2 col-form-label">Deskripsi Kegiatan</label>
                        <div class="col-sm-10">
                            <textarea name="deskripsi_kegiatan" id="elm1" cols="30" rows="10">{{ $kegiatan->deskripsi_kegiatan }}</textarea>
                            @error('deskripsi_kegiatan')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <!-- end row -->

                    <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Kegiatan Data">
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
