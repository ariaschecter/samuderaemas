@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<div class="page-content">
  <div class="container-fluid">

    <div class="row">
      <div class="col-12">
          <div class="card">
              <div class="card-body">

                <h4 class="card-title">Add City </h4>

                <form method="post" action="{{ route('batik.store', $category->category_slug) }}" enctype="multipart/form-data">
                    @csrf

                    <div class="row mb-3">
                        <label for="category_id" class="col-sm-2 col-form-label">Batik Category</label>
                        <div class="col-sm-10">
                            <select class="form-select" aria-label="Default Select Example" name="category_id" id="category_id">
                                {{-- <option selected>Open this select menu</option> --}}
                                {{-- @foreach ($categories as $category) --}}
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                {{-- @endforeach --}}
                            </select>
                            @error('category_id') <span class="text-danger"> {{ $message }}</span> @enderror
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label for="sub_id" class="col-sm-2 col-form-label">Batik Sub Category <span class="badge rounded-pill bg-info float-end">Optional</span></label>
                        <div class="col-sm-10">
                            <select id="sub_id" name="sub_id" class="form-control">
                            </select>
                            @error('sub_id') <span class="text-danger"> {{ $message }}</span> @enderror
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label for="batik_name" class="col-sm-2 col-form-label">Batik Name</label>
                        <div class="col-sm-10">
                            <input name="batik_name" class="form-control" type="text" value="{{ old('batik_name') }}" id="batik_name">
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
                            <img id="showImage" class="img-fluid img-thumbnail" src="{{ asset('backend/assets/images/no-image.jpg') }}" alt="Image Show">
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label for="batik_description" class="col-sm-2 col-form-label">Batik Description</label>
                        <div class="col-sm-10">
                            <textarea name="batik_description" id="elm1" cols="30" rows="10">{{ old('batik_description') }}</textarea>
                            @error('batik_description')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <!-- end row -->

                    <input type="submit" class="btn btn-info waves-effect waves-light" value="Insert Batik Data">
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
