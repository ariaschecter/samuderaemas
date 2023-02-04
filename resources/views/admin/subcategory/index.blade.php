@extends('admin.admin_master')
@section('admin')
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
                            <li class="breadcrumb-item active">{{ $category->category_name }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        {{-- Start Table Batik --}}
        <div>
            <a href="{{ route('batik.add', $category->category_slug) }}" class="btn btn-primary mb-2">Add Batik</a>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">All Batik</h4>

                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Batik Picture</th>
                                        <th>Category</th>
                                        <th>Sub Category</th>
                                        <th>Batik Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @php($i = 1)
                                    @foreach ($batiks as $batik)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>
                                                <a href="{{ asset('storage/' . $batik->batik_picture) }}" class="image-popup-no-margins">
                                                    <img src="{{ asset('storage/' . $batik->batik_picture) }}" alt="{{ $batik->batik_name }} Picture" style="width: 50px; height: 50px">
                                                </a>
                                            </td>
                                            <td>{{ $batik->category->category_name }}</td>
                                            <td>{{ ($batik->sub_category == null ? 'Null' : $batik->sub_category->sub_name) }}</td>
                                            <td>{{ $batik->batik_name }}</td>
                                            <td>
                                                {{-- <a href="{{ route('sub.category.index', $sub->category_slug) }}" class="btn btn-primary sm" title="Show Data"><i class="fas fa-eye"></i></a> --}}
                                                <a href="{{ route('batik.edit', [$batik->category->category_slug, $batik->id]) }}" class="btn btn-info sm" title="Edit Data"><i class="fas fa-edit"></i></a>
                                                <a href="{{ route('batik.delete', [$batik->category->category_slug, $batik->id]) }}" class="btn btn-danger sm" title="Delete Data" id="delete"><i class="fas fa-trash-alt"></i></a>
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
        {{-- End Table Batik --}}

        {{-- Start Table Sub Category --}}
        <div>
            <a href="{{ route('sub.category.add', $category->category_slug) }}" class="btn btn-primary mb-2">Add Sub Category</a>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">All Sub Category</h4>

                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Category Name</th>
                                        <th>Sub Category Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @php($i = 1)
                                    @foreach ($subcategories as $sub)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $sub->category->category_name }}</td>
                                            <td>{{ $sub->sub_name }}</td>
                                            <td>
                                                {{-- <a href="{{ route('sub.category.index', $sub->category_slug) }}" class="btn btn-primary sm" title="Show Data"><i class="fas fa-eye"></i></a> --}}
                                                <a href="{{ route('sub.category.edit', [$sub->category->category_slug, $sub->id]) }}" class="btn btn-info sm" title="Edit Data"><i class="fas fa-edit"></i></a>
                                                <a href="{{ route('sub.category.delete', [$sub->category->category_slug, $sub->id]) }}" class="btn btn-danger sm" title="Delete Data" id="delete"><i class="fas fa-trash-alt"></i></a>
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
        {{-- End Table Sub Category --}}

    </div>
</div>
@endsection
