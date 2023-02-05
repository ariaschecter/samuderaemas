@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<div class="page-content">
  <div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Tambah Finance</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.finance.index') }}">Finance</a></li>
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

                <h4 class="card-title">Tambah Finance </h4>

                <form method="post" action="{{ route('admin.finance.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="row mb-3">
                        <label for="type_finance" class="col-sm-2 col-form-label">Type Finance</label>
                        <div class="col-sm-10">
                            <select class="form-select" aria-label="Default Select Example" name="type_finance" id="type_finance">
                                    <option value="PEMASUKAN">PEMASUKAN</option>
                                    <option value="PENGELUARAN">PENGELUARAN</option>
                            </select>
                            @error('type_finance') <span class="text-danger"> {{ $message }}</span> @enderror
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label for="nominal_finance" class="col-sm-2 col-form-label">Nominal Finance</label>
                        <div class="col-sm-10">
                            <input name="nominal_finance" class="form-control" type="number" value="{{ old('nominal_finance') }}" id="nominal_finance">
                            @error('nominal_finance')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label for="deskripsi_finance" class="col-sm-2 col-form-label">Deskripsi Finance</label>
                        <div class="col-sm-10">
                            <textarea name="deskripsi_finance" class="form-control" cols="30" rows="10">{{ old('deskripsi_finance') }}</textarea>
                            @error('deskripsi_finance')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <!-- end row -->

                    <input type="submit" class="btn btn-info waves-effect waves-light" value="Insert Finance Data">
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
