<!DOCTYPE html>
<html lang="en" dir="ltr" data-startbar="dark" data-bs-theme="light">

<head>
    @yield('meta&title')
    <title>Admin | WORLDCULTURE TRAVELS</title>

    @include('admin-template.layouts.head')
</head>

<body>
    @include('admin-template.layouts.top-bar')
    @include('admin-template.layouts.left-bar')

    <!-- Page Content -->
    <div class="page-wrapper">
        <!-- Page Content-->
        <div class="page-content">
            <div class="container-fluid">
                @yield('content')
            </div><!-- container -->
            @include('admin-template.layouts.footer')
        </div>
        <!-- end page content -->
    </div>
    <!-- end page-wrapper -->

    @include('admin-template.layouts.scripts')
    @yield('page-scripts')
</body>
<!--end body-->

</html>
