@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<div class="page-content">
  <div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Add User</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Setting</li>
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

                <form method="post" action="{{ route('home.setting.store', $setting->id) }}" enctype="multipart/form-data">
                    @csrf

                    <div class="row mb-3">
                        <label for="setting_title" class="col-sm-2 col-form-label">Title Website</label>
                        <div class="col-sm-10">
                            <input name="setting_title" class="form-control" type="text" value="{{ $setting->setting_title }}" id="setting_title">
                            @error('setting_title')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label for="setting_address" class="col-sm-2 col-form-label">Address Footer</label>
                        <div class="col-sm-10">
                            <input name="setting_address" class="form-control" type="text" value="{{ $setting->setting_address }}" id="setting_address">
                            @error('setting_address')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label for="setting_description_footer" class="col-sm-2 col-form-label">Description Footer</label>
                        <div class="col-sm-10">
                            <input name="setting_description_footer" class="form-control" type="text" value="{{ $setting->setting_description_footer }}" id="setting_description_footer">
                            @error('setting_description_footer')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label for="setting_no_phone" class="col-sm-2 col-form-label">No Phone Footer</label>
                        <div class="col-sm-10">
                            <input name="setting_no_phone" class="form-control" type="text" value="{{ $setting->setting_no_phone }}" id="setting_no_phone">
                            @error('setting_no_phone')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label for="setting_email" class="col-sm-2 col-form-label">Email Footer</label>
                        <div class="col-sm-10">
                            <input name="setting_email" class="form-control" type="text" value="{{ $setting->setting_email }}" id="setting_email">
                            @error('setting_email')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label for="setting_banner" class="col-sm-2 col-form-label">Banner Frontend <span class="text-info">optional</span></label>
                        <div class="col-sm-10">
                          <input name="setting_banner" class="form-control" type="file"  id="image">
                              @error('setting_banner')
                                  <span class="text-danger"> {{ $message }}</span>
                              @enderror
                        </div>
                    </div>
                    <!-- end row -->

                      <div class="row mb-3">
                         <label for="example-text-input" class="col-sm-2 col-form-label">  </label>
                        <div class="col-sm-10">
                            <img id="showImage" class="img-fluid img-thumbnail" src="{{ asset('storage/' . $setting->setting_banner) }}" alt="Image Show">
                        </div>
                    </div>
                    <!-- end row -->



                  <!-- end row -->
                    <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Setting Data">
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
