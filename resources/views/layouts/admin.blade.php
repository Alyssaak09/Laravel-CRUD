<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lara LMS</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
                <div class="container">
                  <a class="navbar-brand fw-bold fs-3" href="#">Laravel LMS</a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
                    data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" 
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
              
                  <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                      <li class="nav-item">
                        <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="#">Home</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link {{ Request::is('students*') ? 'active' : '' }}" href="{{ route('students.index') }}">Students</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link {{ Request::is('course*') ? 'active' : '' }}" href="{{ route('course.index') }}">Courses</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </nav>              
        </div>
    </div>
    <div class="container mt-5">
        {{-- Bootstrap Alert Messages --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    
        @if (session('info'))
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                {{ session('info') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    
        {{-- Page Content --}}
        <div class="row">
            <div class="col-md-12">
                @yield('content')
            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3QnGZc1Rj4Zc+asvc4RjaOIgT3aWZIb3Uds2C3O4C2lJ6R/NQ0D84OrGiZ9cF1E" crossorigin="anonymous"></script>
    <script>
        @if(Session::has('success'))
            toastr.success("{{ Session::get('success') }}")
        @endif
        @if( Session::has('info'))
            toastr.info("{{ Session::get('info') }}")
        @endif
        @if( Session::has('error'))
            toastr.info("{{ Session::get('error') }}")
        @endif
    </script>

</body>
</html>


