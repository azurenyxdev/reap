<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap-5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Boxicons CSS -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/style.css">
    <!-- font CSS -->
    <link href='https://fonts.googleapis.com/css?family=League Spartan' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <!-- Datatables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
  

    <title>{{ $title }}</title>
  </head>
  <body>
    <script src="css/jquery/jquery.min.js"></script>
    
    @include('partials.navbar')
    <div class="container-fluid">
      <div class="row">
        @include('partials.sidebar')

        <div class="container content mt-5">
            @yield('container')
        </div>
        @yield('listmodal')
      </div>
    </div>
    <script src="css/bootstrap-5.3.2/js./bootstrap.bundle.min.js" ></script>

    <script>
    </script>
  </body>
</html>