@extends('admin.admin_master')
@section('admin')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Wisata</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Wisata</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <a href="{{ route('admin.wisata.add') }}" class="btn btn-primary mb-2">Tambah Wisata</a>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Wisata Data</h4>

                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Judul Wisata</th>
                                    <th>Foto Wisata</th>
                                    <th>Deskripsi Wisata</th>
                                    <th>Lokasi Wisata</th>
                                    <th>Link Wisata</th>
                                    <th>Action</th>
                                </tr>
                            </thead>


                            <tbody>
                                @php($i = 1)
                                @foreach ($wisatas as $wisata)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $wisata->judul_wisata }}</td>
                                        <td>
                                            <a href="{{ asset('storage/' . $wisata->image->first()->gambar) }}" class="image-popup-no-margins"><img src="{{ asset('storage/' . $wisata->image->first()->gambar) }}" style="height: 10em" alt="Gambar Wisata"></a>
                                        </td>
                                        <td>{!! Str::of($wisata->deskripsi_wisata)->limit(30) !!}</td>
                                        <td>{{ Str::of($wisata->lokasi_wisata)->limit(30) }}</td>
                                        <td>{{ Str::of($wisata->link_lokasi_wisata)->limit(30) }}</td>
                                        <td>
                                            <a href="{{ route('admin.wisata.show', $wisata->id) }}" class="btn btn-primary sm" title="Show Data"><i class="fas fa-eye"></i></a>
                                            <a href="{{ route('admin.wisata.edit', $wisata->id) }}" class="btn btn-info sm" title="Edit Data"><i class="fas fa-edit"></i></a>
                                            <a href="{{ route('admin.wisata.delete', $wisata->id) }}" class="btn btn-danger sm" title="Delete Data" id="delete"><i class="fas fa-trash-alt"></i></a>
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
