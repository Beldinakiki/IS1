<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Concert Hive</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-sm bg-dark">

<!-- Links -->

   
<!-- Inside your HTML element -->
<div style="text-align: center-right;">
        <img src="/assets/images/blacklogo.png" alt="Logo" style="width: 200px; height: auto;" />
    </div>
</div>
<div style="display: flex; align-items: center; justify-content: space-between; background-color: #333;">
    <div style="flex: 1;">
        <a class="nav-link text-light" href="/events">Events</a>
    </div>




</nav>


@if($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <strong> {{$message}}</strong>
</div>

@endif
@yield('content')
</body>
</html>