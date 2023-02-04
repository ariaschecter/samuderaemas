@extends('admin.admin_master')
@section('admin')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">All City</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">City</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <a href="{{ route('city.add') }}" class="btn btn-primary mb-2">Add City</a>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">All City Data</h4>

                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>City Name</th>
                                    <th>City Picture</th>
                                    <th>Action</th>
                                </tr>
                            </thead>


                            <tbody>
                                @php($i = 1)
                                @foreach ($cities as $city)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $city->city_name }}</td>
                                        <td>
                                            <a href="{{ asset('storage/' . $city->city_picture) }}" class="image-popup-no-margins">
                                                <img src="{{ asset('storage/' . $city->city_picture) }}" alt="city picture" style="width: 50px; height: 50px">
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ route('category.index', $city->city_slug) }}" class="btn btn-primary sm" title="Show Data"><i class="fas fa-eye"></i></a>
                                            <a href="{{ route('city.edit', $city->id) }}" class="btn btn-info sm" title="Edit Data"><i class="fas fa-edit"></i></a>
                                            <a href="{{ route('city.delete', $city->id) }}" class="btn btn-danger sm" title="Delete Data" id="delete"><i class="fas fa-trash-alt"></i></a>
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
