@extends('admin.admin_master')
@section('admin')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">All Team</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Team</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <a href="{{ route('home.team.add') }}" class="btn btn-primary mb-2">Add Team</a>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">All Team Data</h4>

                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Team Name</th>
                                    <th>Team Picture</th>
                                    <th>Team Positition</th>
                                    <th>Action</th>
                                </tr>
                            </thead>


                            <tbody>
                                @php($i = 1)
                                @foreach ($teams as $team)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $team->team_name }}</td>
                                        <td>
                                            <a href="{{ asset('storage/' . $team->team_picture) }}" class="image-popup-no-margins">
                                                <img src="{{ asset('storage/' . $team->team_picture) }}" alt="team picture" style="width: 50px; height: 50px">
                                            </a>
                                        </td>
                                        <td>{{ $team->team_positition }}</td>
                                        <td>
                                            <a href="{{ route('home.team.edit', $team->id) }}" class="btn btn-info sm" title="Edit Data"><i class="fas fa-edit"></i></a>
                                            <a href="{{ route('home.team.delete', $team->id) }}" class="btn btn-danger sm" title="Delete Data" id="delete"><i class="fas fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div>
</div>
@endsection
