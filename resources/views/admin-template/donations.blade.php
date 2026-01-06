@extends('admin-template.layouts.app')
@section('meta&title')
    <title> Donations | WORLDCULTURE EMPOWERMENT</title>
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
                        <li class="breadcrumb-item active">Donations</li>
                    </ol>
                </div>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div><!--end row-->
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h4 class="card-title">Customers Details</h4>
                        </div><!--end col-->
                    </div> <!--end row-->
                </div><!--end card-header-->
                <div class="card-body pt-0">
                    <div class="table-responsive">
                        <table class="table datatable" id="datatable_1">
                            <thead class="table-light">
                                <tr>
                                    <th>Donor Name</th>
                                    <th>Donation Type</th>
                                    <th>Supported Project</th>
                                    <th>Amount</th>
                                    <th>status</th>
                                    <th>Wants Invoice</th>
                                    <th>Message</th>
                                    <th data-type="date" data-format="DD/MM/YYYY">Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($donations as $donation)
                                    <tr>
                                        <td>{{ $donation->donor->first_name }} {{ $donation->donor->last_name }}</td>
                                        <td>{{ $donation->donation_type }}</td>
                                        <td>{{ $donation->supported_project }}</td>
                                        <td>{{ $donation->amount }}</td>
                                        <td>
                                            @php
                                                $statusMap = [
                                                    'pending' => ['label' => 'Pending Payment', 'class' => 'warning'],
                                                    'paid' => ['label' => 'Paid', 'class' => 'success'],
                                                    'cancelled' => ['label' => 'Cancelled', 'class' => 'secondary'],
                                                ];

                                                $status = $statusMap[$donation->payment_status] ?? [
                                                    'label' => ucfirst($donation->payment_status),
                                                    'class' => 'light',
                                                ];
                                            @endphp

                                            <span
                                                class="badge bg-{{ $status['class'] }}-subtle text-{{ $status['class'] }} fs-6">
                                                {{ $status['label'] }}
                                            </span>
                                        </td>
                                        <td>
                                            <span>
                                                @if ($donation->wants_invoice)
                                                    <i class="las la-check-circle text-success fs-4"></i>
                                                @else
                                                    <i class="las la-times-circle text-danger fs-4"></i>
                                                @endif
                                            </span>
                                        </td>
                                        <td>{{ $donation->message }}</td>
                                        <td>{{ optional($donation->updated_at)->format('d.m.Y') ?? '—' }}</td>
                                        <td>
                                            Very soon...
                                            {{-- <button type="button"
                                                class="btn btn-outline-primary dropdown-toggle rounded-pill"
                                                data-bs-toggle="dropdown" aria-expanded="false">Actions <i
                                                    class="las la-angle-down ms-1"></i></button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">Payment Details</a>
                                                <a class="dropdown-item" href="#">Another action</a>
                                                <a class="dropdown-item" href="#">Something else here</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#">Separated link</a>
                                            </div> --}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div><!--end card-body-->
            </div><!--end card-->
        </div> <!--end col-->
    </div><!--end row-->
@endsection

@section('page-scripts')
@endsection
