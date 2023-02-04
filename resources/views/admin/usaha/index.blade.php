@extends('admin.admin_master')
@section('admin')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Usaha</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Usaha</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <a href="{{ route('admin.usaha.add') }}" class="btn btn-primary mb-2">Tambah Usaha</a>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Usaha Data</h4>

                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Usaha</th>
                                    <th>Harga</th>
                                    <th>Lokasi Usaha</th>
                                    <th>Contact Person</th>
                                    <th>Deskripsi Usaha</th>
                                    <th>Action</th>
                                </tr>
                            </thead>


                            <tbody>
                                @php($i = 1)
                                @foreach ($usahas as $usaha)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $usaha->nama_usaha }}</td>
                                        <td>Rp. {{ number_format($usaha->harga_usaha) . ' / ' . $usaha->satuan_usaha }}</td>
                                        <td>{{ $usaha->lokasi_usaha }}</td>
                                        <td>{{ $usaha->cp_usaha }}</td>
                                        <td>{!! Str::of($usaha->deskripsi_usaha)->limit(50) !!}</td>
                                        <td>
                                            <a href="{{ route('admin.usaha.show', $usaha->id) }}" class="btn btn-primary sm" title="Show Data"><i class="fas fa-eye"></i></a>
                                            <a href="{{ route('admin.usaha.edit', $usaha->id) }}" class="btn btn-info sm" title="Edit Data"><i class="fas fa-edit"></i></a>
                                            <a href="{{ route('admin.usaha.delete', $usaha->id) }}" class="btn btn-danger sm" title="Delete Data" id="delete"><i class="fas fa-trash-alt"></i></a>
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
