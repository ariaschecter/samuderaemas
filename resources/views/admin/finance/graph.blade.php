@extends('admin.admin_master')
@section('admin')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">{{ $string }}</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.finance.index') }}">Finance</a></li>
                            <li class="breadcrumb-item active">Graph</a></li>
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
                        {!! $chart1->renderHtml() !!}
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection


@section('javascript')
{!! $chart1->renderChartJsLibrary() !!}
{!! $chart1->renderJs() !!}
@endsection
