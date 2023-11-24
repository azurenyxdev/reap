<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head><script src="../assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.118.2">
    <title>Sign in</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sign-in/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3"> 

    <link rel="stylesheet" href="css/style.css"> 
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom styles for this template -->
    <link href="sign-in.css" rel="stylesheet">
  </head>
  <body>

    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-4">

          @if (session()->has('loginError'))        
            <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
              {{ session('loginError') }}  
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          @endif

          <main class="form-signin">
            <h1 class="h3 mb-3 fw-normal text-center">Please sign in</h1>
            <form action="/reap/public/login" method="POST">
              @csrf
              <div class="form-floating">
                <input type="username" class="form-control" @error('username') is-invalid @enderror name="username" id="username" placeholder="Username" value="{{ old('username') }}" autofocus required>
                <label for="username">Username</label>
                @error('email')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="form-floating">
                <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                <label for="password">Password</label>
              </div>
      
              <button class="btn btn-primary w-100 py-2 mt-3" type="submit">Sign in</button>
            </form>
          </main>
        </div>
      </div>    
    </div>

  <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

  </body>
</html>
