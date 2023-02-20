@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<div class="page-content">
  <div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Edit Gambar</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        @if ($gambar->kegiatan_id)
                        <li class="breadcrumb-item"><a href="{{ route('admin.kegiatan.show', $gambar->kegiatan_id) }}">{{ $gambar->kegiatan->judul_kegiatan }}</a></li>
                        @elseif($gambar->wisata_id)
                        <li class="breadcrumb-item"><a href="{{ route('admin.wisata.show', $gambar->wisata_id) }}">{{ $gambar->wisata->judul_wisata }}</a></li>
                        @elseif($gambar->usaha_id)
                        <li class="breadcrumb-item"><a href="{{ route('admin.usaha.show', $gambar->usaha_id) }}">{{ $gambar->usaha->nama_usaha }}</a></li>
                        @endif
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

                <h4 class="card-title">Edit Gambar </h4>

                <form method="post" action="{{ route('admin.gambar.update', $gambar->id) }}" enctype="multipart/form-data">
                    @csrf

                    <div class="row mb-3">
                        <label for="gambar" class="col-sm-2 col-form-label">Gambar Kegiatan </label>
                        <div class="col-sm-10">
                            <input name="gambar" class="form-control" type="file"  id="image">
                                @error('gambar') <span class="text-danger"> {{ $message }}</span> @enderror
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">  </label>
                        <div class="col-sm-10">
                            <img id="showImage" class="img-fluid img-thumbnail" src="{{ asset($gambar->gambar) }}" alt="Image Show">
                        </div>
                    </div>
                    <!-- end row -->


                    <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Gambar Data">
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
