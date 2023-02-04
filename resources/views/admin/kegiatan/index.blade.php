@extends('admin.admin_master')
@section('admin')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Kegiatan</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Kegiatan</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <a href="{{ route('admin.kegiatan.add') }}" class="btn btn-primary mb-2">Tambah Kegiatan</a>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Kegiatan Data</h4>

                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Judul Kegiatan</th>
                                    <th>Foto Kegiatan</th>
                                    <th>Deskripsi Kegiatan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>


                            <tbody>
                                @php($i = 1)
                                @foreach ($kegiatans as $kegiatan)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $kegiatan->judul_kegiatan }}</td>
                                        <td>
                                            <a href="{{ asset('storage/' . $kegiatan->image->first()->gambar) }}" class="image-popup-no-margins"><img src="{{ asset('storage/' . $kegiatan->image->first()->gambar) }}" style="height: 10em" alt="Gambar Kegiatan"></a>
                                        </td>
                                        <td>{!! Str::of($kegiatan->deskripsi_kegiatan)->limit(144) !!}</td>
                                        <td>
                                            <a href="{{ route('admin.kegiatan.show', $kegiatan->id) }}" class="btn btn-primary sm" title="Show Data"><i class="fas fa-eye"></i></a>
                                            <a href="{{ route('admin.kegiatan.edit', $kegiatan->id) }}" class="btn btn-info sm" title="Edit Data"><i class="fas fa-edit"></i></a>
                                            <a href="{{ route('admin.kegiatan.delete', $kegiatan->id) }}" class="btn btn-danger sm" title="Delete Data" id="delete"><i class="fas fa-trash-alt"></i></a>
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
