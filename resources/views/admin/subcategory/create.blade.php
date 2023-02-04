@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">{{ $category->category_name }} Category</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('city.index') }}">City</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('category.index', $category->city->city_slug) }}">{{ $category->city->city_name }}</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('sub.category.index', $category->category_slug) }}">{{ $category->category_name }}</a></li>
                            <li class="breadcrumb-item active">Add Sub Category</li>
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

                <h4 class="card-title">Add Sub Category </h4>

                <form method="post" action="{{ route('sub.category.store', $category->category_slug) }}" enctype="multipart/form-data">
                    @csrf

                    <div class="row mb-3">
                        <label for="category_id" class="col-sm-2 col-form-label">Category</label>
                        <div class="col-sm-10">
                            <input name="category_id" class="form-control" type="text" value="{{ $category->category_name }}" id="category_id" readonly>
                            @error('category_id')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label for="sub_name" class="col-sm-2 col-form-label">Sub Category Name</label>
                        <div class="col-sm-10">
                            <input name="sub_name" class="form-control" type="text" value="{{ old('sub_name') }}" id="sub_name">
                            @error('sub_name')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <!-- end row -->

                    <input type="submit" class="btn btn-info waves-effect waves-light" value="Insert Sub Category Data">
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
