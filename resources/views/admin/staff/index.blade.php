@extends('admin.admin_master')
@section('admin')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Staff</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Staff</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <a href="{{ route('admin.staff.add') }}" class="btn btn-primary mb-2">Tambah Staff</a>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Staff Data</h4>

                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Staff</th>
                                    <th>Foto Staff</th>
                                    <th>Jabatan Staff</th>
                                    <th>Motivasi Staff</th>
                                    <th>Bio Staff</th>
                                    <th>Action</th>
                                </tr>
                            </thead>


                            <tbody>
                                @php($i = 1)
                                @foreach ($staffs as $staff)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $staff->nama_staff }}</td>
                                        <td>
                                            <a href="{{ asset('storage/' . $staff->gambar_staff) }}" class="image-popup-no-margins"><img src="{{ asset('storage/' . $staff->gambar_staff) }}" style="height: 10em" alt="Gambar Staff"></a>
                                        </td>
                                        <td>{{ $staff->jabatan_staff }}</td>
                                        <td>{{ $staff->motivasi_staff }}</td>
                                        <td>{!! Str::of($staff->bio_staff)->limit(255) !!}</td>
                                        <td>
                                            <a href="{{ route('admin.staff.edit', $staff->id) }}" class="btn btn-info sm" title="Edit Data"><i class="fas fa-edit"></i></a>
                                            <a href="{{ route('admin.staff.delete', $staff->id) }}" class="btn btn-danger sm" title="Delete Data" id="delete"><i class="fas fa-trash-alt"></i></a>
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
