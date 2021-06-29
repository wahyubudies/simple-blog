<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @yield('title')
  <!-- Favicon -->
  <link rel="icon" href="/img/brand/favicon.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <link rel="stylesheet" href="/vendor/bootstrap/dist/css/bootstrap.min.css">
  <!-- Icons -->
  <link rel="stylesheet" href="/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Page plugins -->
  <!-- Argon CSS -->
  <link rel="stylesheet" href="/css/argon.css?v=1.2.0" type="text/css">
  <!-- Toastr -->
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">  
</head>
<body>
  @include('layouts.sidenav')
  <!-- Main content -->  
  <div class="main-content" id="panel">
    <!-- Page content -->
    @yield('content')
  </div> 
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="/vendor/jquery/dist/jquery.min.js"></script>
  <script src="/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="/vendor/js-cookie/js.cookie.js"></script>
  <script src="/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Optional JS -->
  <script src="/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="/vendor/chart.js/dist/Chart.extension.js"></script>
  <!-- Argon JS -->
  <script src="/js/argon.js?v=1.2.0"></script>
  <!-- Toastr -->
  <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  @yield('toastr')
</body>
</html>