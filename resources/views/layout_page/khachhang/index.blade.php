<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>@yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Responsive bootstrap 4 admin template" name="description">
        <meta content="Coderthemes" name="author">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <!-- App favicon -->
        <script src="{{asset('admin_assets/assets/js/vendor.min.js')}}"></script>

        @yield('css')

        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
        {{-- <link rel="shortcut icon" href="{{asset('favicon.ico')}}"> --}}
        <!-- App css -->
        <link href="{{asset('admin_assets/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" id="bootstrap-stylesheet">
        <link href="{{asset('admin_assets/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('admin_assets/assets/css/app.min.css')}}" rel="stylesheet" type="text/css" id="app-stylesheet">

    </head>

    <body>

        <!-- Begin page -->
        <div id="wrapper">


            @include('layout_page.khachhang.header')
            <!-- end Topbar -->

            @include('layout_page.khachhang.menu')
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                    <!-- Start container-fluid -->
                    @yield('content')
                    <!-- end container-fluid -->



                    <!-- Footer Start -->
                    @include('layout_page.khachhang.footer')

                    <!-- end Footer -->

                </div>
                <!-- end content -->

            </div>
            <!-- END content-page -->

        </div>
        <script>
            $(document).ready(function() {
                $('#example').DataTable();
            } );
        </script>
        <!-- END wrapper -->
        <!-- Vendor js -->


        <script src="{{asset('admin_assets/assets/libs/morris-js/morris.min.js')}}"></script>
        <script src="{{asset('admin_assets/assets/libs/raphael/raphael.min.js')}}"></script>

        <script src="{{asset('admin_assets/assets/js/pages/dashboard.init.js')}}"></script>
        <script src="{{asset('admin_assets/assets/js/app.min.js')}}"></script>

        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
        <!-- App js -->
        @yield('script')
    </body>

</html>
