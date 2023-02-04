@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<div class="page-content">
  <div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Tambah Wisata</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.wisata.index') }}">Wisata</a></li>
                        <li class="breadcrumb-item active">Tambah</li>
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

                <h4 class="card-title">Tambah Wisata </h4>

                <form method="post" action="{{ route('admin.wisata.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="row mb-3">
                        <label for="judul_wisata" class="col-sm-2 col-form-label">Judul Wisata</label>
                        <div class="col-sm-10">
                            <input name="judul_wisata" class="form-control" type="text" value="{{ old('judul_wisata') }}" id="judul_wisata">
                            @error('judul_wisata')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label for="lokasi_wisata" class="col-sm-2 col-form-label">Lokasi Wisata</label>
                        <div class="col-sm-10">
                            <input name="lokasi_wisata" class="form-control" type="text" value="{{ old('lokasi_wisata') }}" id="lokasi_wisata">
                            @error('lokasi_wisata')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label for="link_lokasi_wisata" class="col-sm-2 col-form-label">Link Lokasi Wisata</label>
                        <div class="col-sm-10">
                            <input name="link_lokasi_wisata" class="form-control" type="text" value="{{ old('link_lokasi_wisata') }}" id="link_lokasi_wisata">
                            @error('link_lokasi_wisata')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label for="deskripsi_wisata" class="col-sm-2 col-form-label">Deskripsi Wisata</label>
                        <div class="col-sm-10">
                            <textarea name="deskripsi_wisata" id="elm1" cols="30" rows="10">{{ old('deskripsi_wisata') }}</textarea>
                            @error('deskripsi_wisata')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label for="gambar_wisata" class="col-sm-2 col-form-label">Gambar Wisata </label>
                        <div class="col-sm-10">
                            <input name="gambar_wisata" class="form-control" type="file"  id="image">
                                @error('gambar_wisata') <span class="text-danger"> {{ $message }}</span> @enderror
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">  </label>
                        <div class="col-sm-10">
                            <img id="showImage" class="img-fluid img-thumbnail" src="{{ asset('backend/assets/images/no-image.jpg') }}" alt="Image Show">
                        </div>
                    </div>
                    <!-- end row -->


                    <input type="submit" class="btn btn-info waves-effect waves-light" value="Insert Wisata Data">
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
