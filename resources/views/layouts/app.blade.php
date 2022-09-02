<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

    <title>{{ @$pageTitle }}</title>
    @stack('style')
</head>
<body>

<!--  Start:: Navbar  -->
@include('layouts.navbar')
<!--  End:: Navbar  -->

<div class="container mt-5">
    @if(Session::has('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
    @endif

    @if (@$errors->any())
        @foreach ($errors->all() as $error)

            <div class="alert alert-danger">
                {{ $error }}
            </div>
        @endforeach
    @endif
</div>
<!--  Start:: Main Content  -->
<div class="container mt-5">
    @yield('content')
</div>
<!--  End:: Main Content  -->

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
@stack('script')


</body>
</html>
