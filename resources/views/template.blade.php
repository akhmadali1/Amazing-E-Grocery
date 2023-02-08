<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script>
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #AFEACE;">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <a href="/" class="navbar-brand fs-1 fw-bold" style="color: black">Amazing E-Grocery</a>
                    @if (Auth::user() == null)
                        <li class="nav-item">
                            <a href="/register/{{__('auth.link')}}" class="btn btn-warning fs-5 mt-3 me-1">{{__('auth.Register')}}</a>
                        </li>
                        <li class="nav-item">
                            <a href="/login" class="btn btn-warning fs-5 mt-3 ms-1">{{__('auth.Login')}}</a>
                        </li>
                    @else
                        <form class="d-flex" action="/logout" method="POST">
                            @csrf
                            <input class="btn btn-warning fs-5 mt-3 ms-1" type="submit" value="Logout">
                        </form>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    @if (Auth::user() != null)
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #FBDF52;">
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
              <li class="nav-item">
                <a class="nav-link active fs-4 fw-bold me-5" aria-current="page" href="/home">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active fs-4 fw-bold ms-5 me-5" href="/showcart">Cart</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active fs-4 fw-bold ms-5 me-5" href="/profile">Profile</a>
              </li>
              @if (Auth::user() != null && Auth::user()->role == 'Admin')
                <li class="nav-item">
                    <a class="nav-link active fs-4 fw-bold ms-5" href="/maintenance">Account Maintenance</a>
                </li>
              @endif
            </ul>
          </div>
        </div>
      </nav>
    @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @elseif (session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        <div class="p-5">
            @yield('content')
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
        </script>
    </body>
    <footer>
        <div class="text-center p-4 fw-bold" style="background-color: #AFEACE;">
            © Amazing E-Grocery 2023
        </div>
    </footer>
    <script>
        var msg = '{{ Session::get('alert') }}';
        var exist = '{{ Session::has('alert') }}';
        if (exist) {
            alert(msg);
        }
    </script>

    </html>
