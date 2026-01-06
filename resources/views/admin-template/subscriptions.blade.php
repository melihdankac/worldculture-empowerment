@extends('admin-template.layouts.app')
@section('meta&title')
    <title> Subscriptions | WORLDCULTURE EMPOWERMENT</title>
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                <h4 class="page-title">Datatable</h4>
                <div class="">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('wcepanel.dashboard') }}">WCE Panel</a>
                        </li><!--end nav-item-->
                        <li class="breadcrumb-item active">Subscriptions</li>
                    </ol>
                </div>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div><!--end row-->
@endsection

@section('page-scripts')
@endsection
