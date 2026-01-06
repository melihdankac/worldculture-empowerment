@extends('admin-template.layouts.app')
@section('meta&title')
    <title> Memberships | WORLDCULTURE EMPOWERMENT</title>
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
                        <li class="breadcrumb-item active">Memberships</li>
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
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>status</th>
                                    <th data-type="date" data-format="DD/MM/YYYY">Start Date</th>
                                    <th data-type="date" data-format="DD/MM/YYYY">End Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($memberships as $membership)
                                    <tr>
                                        <td>{{ $membership->donor->first_name }}</td>
                                        <td>{{ $membership->donor->last_name }}</td>
                                        <td>{{ $membership->donor->email }}</td>
                                        <td>{{ $membership->donor->phone }}</td>
                                        <td>{{ $membership->donor->address }}</td>
                                        <td>
                                            @php
                                                $statusMap = [
                                                    'pending' => ['label' => 'Pending Payment', 'class' => 'warning'],
                                                    'pending_verification' => [
                                                        'label' => 'Waiting Approval',
                                                        'class' => 'info',
                                                    ],
                                                    'active' => ['label' => 'Active Member', 'class' => 'success'],
                                                    'rejected' => ['label' => 'Rejected', 'class' => 'danger'],
                                                    'cancelled' => ['label' => 'Cancelled', 'class' => 'secondary'],
                                                    'expired' => ['label' => 'Expired', 'class' => 'dark'],
                                                ];

                                                $status = $statusMap[$membership->membership_status] ?? [
                                                    'label' => ucfirst($membership->membership_status),
                                                    'class' => 'light',
                                                ];
                                            @endphp

                                            <span
                                                class="badge bg-{{ $status['class'] }}-subtle text-{{ $status['class'] }} fs-6">
                                                {{ $status['label'] }}
                                            </span>
                                        </td>
                                        <td>{{ optional($membership->start_date)->format('d.m.Y') ?? '—' }}</td>
                                        <td>{{ optional($membership->end_date)->format('d.m.Y') ?? '—' }}</td>
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
