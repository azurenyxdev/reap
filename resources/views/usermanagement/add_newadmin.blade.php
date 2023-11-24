<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head><script src="../assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.118.2">
    <title>{{ $title }}</title>

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
      <div class="col-md-5">
        <main class="form-signin">
          <h1 class="h3 mb-3 fw-normal text-center">Add New Admin</h1>
          <form action="/reap/public/add_newadmin" method="POST">
            @csrf
            <div class="form-floating">
              <input type="name" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Name" value="{{ old('name') }}" required>
              <label for="name">Name</label>
              @error('name')                
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-floating">
              <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email" value="{{ old('email') }}" required>
              <label for="floatingInput">Email</label>
              @error('email')                
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-floating">
              <input type="username" name="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Username" value="{{ old('username') }}" required>
              <label for="floatingInput">Username</label>
              @error('username')                
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-floating">
              <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="floatingPassword" placeholder="Password" required>
              <label for="floatingPassword">Password</label>
              @error('password')                
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>

            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" name="access" class="custom-control-input" value="r" checked>
              <label class="custom-control-label" for="customRadioInline1">Read</label>
              <input type="radio" name="access" class="custom-control-input" value="e">
              <label class="custom-control-label" for="customRadioInline2">Edit</label>
              <input type="radio" name="access" class="custom-control-input" value="d"> 
              <label class="custom-control-label" for="customRadioInline3">Delete</label>
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
