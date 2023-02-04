@extends('admin.admin_master')
@section('admin')
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">{{ $city->city_name }} City</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('city.index') }}">City</a></li>
                            <li class="breadcrumb-item active">{{ $city->city_name }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        {{-- Start Table Category --}}
        <div>
            <a href="{{ route('category.add', $city->city_slug) }}" class="btn btn-primary mb-2">Add Category</a>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">All Category</h4>

                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Category Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td>{{ $category->category_no }}</td>
                                            <td>{{ $category->category_name }}</td>
                                            <td>
                                                <a href="{{ route('sub.category.index', $category->category_slug) }}" class="btn btn-primary sm" title="Show Data"><i class="fas fa-eye"></i></a>
                                                <a href="{{ route('category.edit', [$category->city->city_slug, $category->id]) }}" class="btn btn-info sm" title="Edit Data"><i class="fas fa-edit"></i></a>
                                                <a href="{{ route('category.delete', [$category->city->city_slug, $category->id]) }}" class="btn btn-danger sm" title="Delete Data" id="delete"><i class="fas fa-trash-alt"></i></a>
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
        {{-- End Table Category --}}

    </div>
</div>
@endsection
