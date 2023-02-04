@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<div class="page-content">
  <div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Tambah Staff</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.staff.index') }}">Staff</a></li>
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

                <h4 class="card-title">Tambah Staff </h4>

                <form method="post" action="{{ route('admin.staff.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="row mb-3">
                        <label for="nama_staff" class="col-sm-2 col-form-label">Nama Staff</label>
                        <div class="col-sm-10">
                            <input name="nama_staff" class="form-control" type="text" value="{{ old('nama_staff') }}" id="nama_staff">
                            @error('nama_staff')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label for="jabatan_staff" class="col-sm-2 col-form-label">Jabatan Staff</label>
                        <div class="col-sm-10">
                            <input name="jabatan_staff" class="form-control" type="text" value="{{ old('jabatan_staff') }}" id="jabatan_staff">
                            @error('jabatan_staff')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label for="motivasi_staff" class="col-sm-2 col-form-label">Motivasi Staff</label>
                        <div class="col-sm-10">
                            <input name="motivasi_staff" class="form-control" type="text" value="{{ old('motivasi_staff') }}" id="motivasi_staff">
                            @error('motivasi_staff')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label for="bio_staff" class="col-sm-2 col-form-label">Bio Staff</label>
                        <div class="col-sm-10">
                            <textarea name="bio_staff" id="elm1" cols="30" rows="10">{{ old('bio_staff') }}</textarea>
                            @error('bio_staff')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label for="gambar_staff" class="col-sm-2 col-form-label">Gambar Staff </label>
                        <div class="col-sm-10">
                            <input name="gambar_staff" class="form-control" type="file"  id="image">
                                @error('gambar_staff') <span class="text-danger"> {{ $message }}</span> @enderror
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


                    <input type="submit" class="btn btn-info waves-effect waves-light" value="Insert Staff Data">
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
