
<!DOCTYPE html>
<html lang="en">

<head>
    <base href="{{asset('')}}">
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="admin_assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="admin_assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        OAuth2 GHTK
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <!-- CSS Files -->
    <link href="admin_assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="admin_assets/css/paper-dashboard.css?v=2.0.0" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="admin_assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="">
<div class="wrapper ">
    @include('admin\sidebar')
    <div class="main-panel">
        <!-- Navbar -->
        @include('admin\header')
        <!-- End Navbar -->

        @yield('content')
    </div>
</div>
<!--   Core JS Files   -->
<script src="admin_assets/js/core/jquery.min.js"></script>
<script src="admin_assets/js/core/popper.min.js"></script>
<script src="admin_assets/js/core/bootstrap.min.js"></script>
<script src="admin_assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>

<!-- Chart JS -->
<script src="admin_assets/js/plugins/chartjs.min.js"></script>
<!--  Notifications Plugin    -->
<script src="admin_assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="admin_assets/js/paper-dashboard.min.js?v=2.0.0" type="text/javascript"></script>
<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
<script src="admin_assets/demo/demo.js"></script>
<script>
    $(document).ready(function() {
        // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
        demo.initChartsPages();
    });
</script>
</body>

</html>
