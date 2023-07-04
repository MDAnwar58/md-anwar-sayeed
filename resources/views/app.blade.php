<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <link href="{{ asset('assets/images/favicon.ico') }}" rel="icon" type="image/x-icon" />
    <title>MR-X</title>

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    {{-- axios --}}
    <script src="{{ asset('assets/js/axios.min.js') }}"></script>
</head>
<body>

    @include('components.navbar')

    @include('components.loader')

    <div class="" id="content-div">
        @yield('content')
    </div>

    @include('components.footer')

    <script src="{{ asset('https://code.jquery.com/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js') }}"></script>
    @yield('script')
</body>
</html>
