@extends('admin.admin_master')
@section('admin')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Finance</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Finance</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <a href="{{ route('admin.finance.add') }}" class="btn btn-primary mb-2">Tambah Finance</a>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Finance Data</h4>

                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tipe Finance</th>
                                    <th>Nominal Finance</th>
                                    <th>Deskripsi Finance</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>


                            <tbody>
                                @php($i = 1)
                                @foreach ($finances as $finance)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $finance->type_finance}}</td>
                                        <td>Rp. {{ number_format($finance->nominal_finance) }}</td>
                                        <td>{{ $finance->deskripsi_finance }}</td>
                                        <td>{{ \Carbon\Carbon::parse($finance->created_at)->format('d M Y') }}</td>
                                        <td>
                                            <a href="{{ route('admin.finance.edit', $finance->id) }}" class="btn btn-info sm" title="Edit Data"><i class="fas fa-edit"></i></a>
                                            <a href="{{ route('admin.finance.delete', $finance->id) }}" class="btn btn-danger sm" title="Delete Data" id="delete"><i class="fas fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-2">Graph Range Finance</h4>

                        <form action="{{ route('admin.graph.index') }}" method="post">
                            @csrf
                            <div class="row mb-3">
                                <label for="date_start" class="col-sm-2 col-md-1 col-form-label">Date Start</label>
                                <div class="col-sm-10 col-md-2">
                                    <input class="form-control" type="date" value="{{ date('Y-m') }}-01" id="date_start" name="date_start">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="date_end" class="col-sm-2 col-md-1 col-form-label">Date End</label>
                                <div class="col-sm-10 col-md-2">
                                    <input class="form-control" type="date" value="{{ date('Y-m-d') }}" id="date_end" name="date_end">
                                </div>
                            </div>
                            <input type="submit" class="btn btn-info waves-effect waves-light" value="See Graph">
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
