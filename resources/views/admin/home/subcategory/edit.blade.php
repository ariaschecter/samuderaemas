@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<div class="page-content">
  <div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Edit Sub Category</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('home.subcategory.index') }}">Sub Category</a></li>
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

                <h4 class="card-title">Edit Sub Category </h4>

                <form method="post" action="{{ route('home.subcategory.update', $subcategory->id) }}" enctype="multipart/form-data">
                    @csrf

                    <div class="row mb-3">
                        <label for="city_id" class="col-sm-2 col-form-label">Batik City</label>
                        <div class="col-sm-10">
                            <select class="form-select" aria-label="Default Select Example" name="city_id" id="city_id">
                                <option>Open this select menu</option>
                                @foreach ($cities as $city)
                                    <option value="{{ $city->id }}" {{ ($city->id == $subcategory->category->city_id ? 'selected' : '') }}>{{ $city->city_name }}</option>
                                @endforeach
                            </select>
                            @error('city_id') <span class="text-danger"> {{ $message }}</span> @enderror
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label for="category_id" class="col-sm-2 col-form-label">Batik Category</label>
                        <div class="col-sm-10">
                            <select class="form-select" aria-label="Default Select Example" name="category_id" id="category_id">
                                <option value="" >-- Select Sub Category / Null --</option>
                                @foreach ($selected_city->category as $category)
                                    <option value="{{ $category->id }}" {{ ($category->id == $subcategory->category_id ? 'selected' : '') }}>{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                            @error('category_id') <span class="text-danger"> {{ $message }}</span> @enderror
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label for="sub_name" class="col-sm-2 col-form-label">Sub Category Name</label>
                        <div class="col-sm-10">
                            <input name="sub_name" class="form-control" type="text" value="{{ $subcategory->sub_name }}" id="sub_name">
                            @error('sub_name')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <!-- end row -->

                    <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Sub Category Data">
                  </form>

              </div>
          </div>

  </div>
</div>

<script>
    $(document).ready(function () {

/*------------------------------------------
--------------------------------------------
Country Dropdown Change Event
--------------------------------------------
--------------------------------------------*/
    $('#city_id').on('change', function () {
        var id_city = this.value;
        $("#category_id").html('');
        $.ajax({
            url: "{{url('api/fetch-category')}}",
            type: "POST",
            data: {
                city_id: id_city,
                _token: '{{csrf_token()}}'
            },
            dataType: 'json',
            success: function (result) {
                $('#category_id').html('<option value="">-- Select Category --</option>');
                $.each(result.categories, function (key, value) {
                    $("#category_id").append('<option value="' + value
                        .id + '">' + value.category_name + '</option>');
                });
            }
        });
    });
});
</script>

@endsection
