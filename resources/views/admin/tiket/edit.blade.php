@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<div class="page-content">
  <div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Edit Tiket Wisata</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.wisata.show', $tiket->wisata->id) }}">{{ $tiket->wisata->judul_wisata }}</a></li>
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

                <h4 class="card-title">Edit Tiket Wisata </h4>

                <form method="post" action="{{ route('admin.tiket.update', $tiket->id) }}" enctype="multipart/form-data">
                    @csrf

                    <div class="row mb-3">
                        <label for="hari_tiket" class="col-sm-2 col-form-label">Hari Tiket</label>
                        <div class="col-sm-10">
                            <input name="hari_tiket" class="form-control" type="text" value="{{ $tiket->hari_tiket }}" id="hari_tiket">
                            <div class="text-muted">Ex : Senin - Jumat</div>
                            @error('hari_tiket')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label for="orang_tiket" class="col-sm-2 col-form-label">Tiket Orang</label>
                        <div class="col-sm-10">
                            <input name="orang_tiket" class="form-control" type="number" value="{{ $tiket->orang_tiket }}" id="orang_tiket">
                            @error('orang_tiket')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label for="motor_tiket" class="col-sm-2 col-form-label">Tiket Motor</label>
                        <div class="col-sm-10">
                            <input name="motor_tiket" class="form-control" type="number" value="{{ $tiket->motor_tiket }}" id="motor_tiket">
                            @error('motor_tiket')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label for="mobil_tiket" class="col-sm-2 col-form-label">Tiket Mobil</label>
                        <div class="col-sm-10">
                            <input name="mobil_tiket" class="form-control" type="number" value="{{ $tiket->mobil_tiket }}" id="mobil_tiket">
                            @error('mobil_tiket')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <!-- end row -->

                    <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Tiket Data">
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
