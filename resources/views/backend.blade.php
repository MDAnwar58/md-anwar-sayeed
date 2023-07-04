<!DOCTYPE html>
<html lang="en" data-bs-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Admin Panel</title>

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/dropify/css/dropify.min.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
</head>

<body>
    {{-- sidebar --}}
    <div class="row container">
        <div class="col-sm-2 bg-dark">
            @include('admin.partails.sidebar')
        </div>
        <div class="col-sm-10 content_col pt-5 ps-3">
            @if (Session::has('error'))
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="alert alert-danger">{{ Session::get('error') }}</div>
                    </div>
                </div>
            @elseif (Session::has('success'))
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="alert alert-success">{{ Session::get('success') }}</div>
                    </div>
                </div>
            @endif
            @yield('content')
        </div>
    </div>


    <script src="{{ asset('https://code.jquery.com/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('assets/dropify/js/dropify.min.js') }}"></script>
    <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js') }}"></script>
    @yield('script')
</body>

</html>
