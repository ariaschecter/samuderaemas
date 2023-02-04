@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<div class="page-content">
  <div class="container-fluid">
    
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Add Category</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('home.category.index') }}">Category</a></li>
                        <li class="breadcrumb-item active">Add</li>
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

                <h4 class="card-title">Add Category </h4>

                <form method="post" action="{{ route('home.category.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="row mb-3">
                        <label for="city_id" class="col-sm-2 col-form-label">City</label>
                        <div class="col-sm-10">
                            <select class="form-select" aria-label="Default Select Example" name="city_id" id="city_id">
                                <option>Open this select menu</option>
                                @foreach ($cities as $city)
                                    <option value="{{ $city->id }}" {{ ($city->id == old('city_id') ? 'selected' : '') }}>{{ $city->city_name }}</option>
                                @endforeach
                            </select>
                            @error('city_id') <span class="text-danger"> {{ $message }}</span> @enderror
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label for="category_no" class="col-sm-2 col-form-label">Category Nomor</label>
                        <div class="col-sm-10">
                            <input name="category_no" class="form-control" type="number" value="{{ old('category_no') }}" id="category_no">
                            @error('category_no')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label for="category_name" class="col-sm-2 col-form-label">Category Name</label>
                        <div class="col-sm-10">
                            <input name="category_name" class="form-control" type="text" value="{{ old('category_name') }}" id="category_name">
                            @error('category_name')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <!-- end row -->

                    <input type="submit" class="btn btn-info waves-effect waves-light" value="Insert Category Data">
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
