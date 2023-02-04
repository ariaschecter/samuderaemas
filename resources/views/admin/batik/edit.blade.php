@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">{{ $batik->category->category_name }} Category</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('city.index') }}">City</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('category.index', $batik->category->city->city_slug) }}">{{ $batik->category->city->city_name }}</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('sub.category.index', $batik->category->category_slug) }}">{{ $batik->category->category_name }}</a></li>
                            <li class="breadcrumb-item active">Edit Batik</li>
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

                <h4 class="card-title">Add City </h4>

                <form method="post" action="{{ route('batik.update', [$selected_category->category_slug, $batik->id]) }}" enctype="multipart/form-data">
                    @csrf

                    <div class="row mb-3">
                        <label for="category_id" class="col-sm-2 col-form-label">Batik Category</label>
                        <div class="col-sm-10">
                            <select class="form-select" aria-label="Default Select Example" name="category_id" id="category_id">
                                <option>Open this select menu</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ ($category->id == $batik->category_id ? 'selected' : '') }}>{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                            @error('category_id') <span class="text-danger"> {{ $message }}</span> @enderror
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label for="sub_id" class="col-sm-2 col-form-label">Batik Sub Category <span class="badge rounded-pill bg-info float-end">Optional</span></label>
                        <div class="col-sm-10">
                            <select class="form-select" aria-label="Default Select Example" name="sub_id" id="sub_id">
                                <option value="">-- Select Sub Category / Null --</option>
                                @foreach ($selected_category->sub_category as $sub)
                                    <option value="{{ $sub->id }}" {{ ($sub->id == $batik->sub_id ? 'selected' : '') }}>{{ $sub->sub_name }}</option>
                                @endforeach
                            </select>
                            @error('sub_id') <span class="text-danger"> {{ $message }}</span> @enderror
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label for="batik_name" class="col-sm-2 col-form-label">Batik Name</label>
                        <div class="col-sm-10">
                            <input name="batik_name" class="form-control" type="text" value="{{ $batik->batik_name }}" id="batik_name">
                            @error('batik_name') <span class="text-danger"> {{ $message }}</span> @enderror
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label for="batik_picture" class="col-sm-2 col-form-label">Batik Picture </label>
                        <div class="col-sm-10">
                            <input name="batik_picture" class="form-control" type="file"  id="image">
                                @error('batik_picture') <span class="text-danger"> {{ $message }}</span> @enderror
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">  </label>
                        <div class="col-sm-10">
                            <img id="showImage" class="img-fluid img-thumbnail" src="{{ asset('storage/' . $batik->batik_picture) }}" alt="Image Show">
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label for="batik_description" class="col-sm-2 col-form-label">Batik Description</label>
                        <div class="col-sm-10">
                            <textarea name="batik_description" id="elm1" cols="30" rows="10">{{ $batik->batik_description }}</textarea>
                            @error('batik_description')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <!-- end row -->

                    <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Batik Data">
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

<script>
    $(document).ready(function () {

        /*------------------------------------------
        --------------------------------------------
        Country Dropdown Change Event
        --------------------------------------------
        --------------------------------------------*/
        $('#category_id').on('change', function () {
            var id_category = this.value;
            $("#sub_id").html('');
            $.ajax({
                url: "{{url('api/fetch-sub-category')}}",
                type: "POST",
                data: {
                    category_id: id_category,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (result) {
                    $('#sub_id').html('<option value="">-- Select Sub Category / Null --</option>');
                    $.each(result.sub_categories, function (key, value) {
                        $("#sub_id").append('<option value="' + value
                            .id + '">' + value.sub_name + '</option>');
                    });
                }
            });
        });
    });
</script>

@endsection
