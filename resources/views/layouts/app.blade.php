<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="{{'admin_asset/vendor/fontawesome-free/css/all.min.css'}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('admin_asset/css/sb-admin-2.min.css')}}" rel="stylesheet">

    {{-- sweet alert --}}
    <script src="
        https://cdn.jsdelivr.net/npm/sweetalert@2.1.2/dist/sweetalert.min.js
     "></script>

     
    </head>
    
    <body>
      
      {{-- section product --}}
      <div class="">
        @yield('container')
      </div>
      {{-- end section product --}}
    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('admin_asset/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admin_asset/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('admin_asset/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('admin_asset/js/sb-admin-2.min.js')}}"></script>

    <!-- Page level plugins -->
    <script src="{{asset('admin_asset/vendor/chart.js/Chart.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('admin_asset/js/demo/chart-area-demo.js')}}"></script>
    <script src="{{asset('admin_asset/js/demo/chart-pie-demo.js')}}"></script>

</body>

</html>