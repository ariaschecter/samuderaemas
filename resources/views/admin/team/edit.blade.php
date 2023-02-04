@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<div class="page-content">
  <div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Edit Team</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('home.team.index') }}">Team</a></li>
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

                <h4 class="card-title">Edit Team </h4>

                <form method="post" action="{{ route('home.team.update', $team->id) }}" enctype="multipart/form-data">
                    @csrf

                    <div class="row mb-3">
                        <label for="team_name" class="col-sm-2 col-form-label">Team Name</label>
                        <div class="col-sm-10">
                            <input name="team_name" class="form-control" type="text" value="{{ $team->team_name }}" id="team_name">
                            @error('team_name')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label for="team_positition" class="col-sm-2 col-form-label">Team Positition</label>
                        <div class="col-sm-10">
                            <input name="team_positition" class="form-control" type="text" value="{{ $team->team_positition }}" id="team_positition">
                            @error('team_positition')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <!-- end row -->

                  <div class="row mb-3">
                      <label for="team_picture" class="col-sm-2 col-form-label">Team Picture </label>
                      <div class="col-sm-10">
                        <input name="team_picture" class="form-control" type="file"  id="image">
                            @error('team_picture')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                      </div>
                  </div>
                  <!-- end row -->

                    <div class="row mb-3">
                       <label for="example-text-input" class="col-sm-2 col-form-label">  </label>
                      <div class="col-sm-10">
                          <img id="showImage" class="img-fluid img-thumbnail" src="{{ asset('storage/' . $team->team_picture) }}" alt="Image Show">
                      </div>
                  </div>
                  <!-- end row -->
                    <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Team Data">
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
