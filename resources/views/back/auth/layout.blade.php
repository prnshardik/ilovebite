<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    @yield('meta')

    <title>{{ _settings('SITE_TITLE') }} | @yield('title')</title>

    <link href="{{ asset('back/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('back/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('back/vendors/themify-icons/css/themify-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('back/css/main.css') }}" rel="stylesheet" />
    <link href="{{ asset('back/css/pages/auth-light.css') }}" rel="stylesheet" />

    <link href="{{ asset('back/vendors/toastr/toastr.min.css') }}" rel="stylesheet" />

    <style> .error{ color:red; } </style>
</head>

<body class="bg-silver-300">

    <div class="content">
        @yield('content')
    </div>

    <div class="sidenav-backdrop backdrop"></div>

    <div class="preloader-backdrop">
        <div class="page-preloader">Loading</div>
    </div>

    <script src="{{ asset('back/vendors/jquery/dist/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('back/vendors/popper.js/dist/umd/popper.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('back/vendors/bootstrap/dist/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('back/vendors/jquery-validation/dist/jquery.validate.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('back/js/app.js') }}" type="text/javascript"></script>

    <script src="{{ asset('back/vendors/toastr/toastr.min.js') }}" type="text/javascript"></script>

    <script>
        @php
            $success = '';
            if(\Session::has('success'))
                $success = \Session::get('success');

            $error = '';
            if(\Session::has('error'))
                $error = \Session::get('error');
        @endphp

        var success = "{{ $success }}";
        var error = "{{ $error }}";

        if(success != ''){ toastr.success(success, 'Success'); }

        if(error != ''){ toastr.error(error, 'error'); }
    </script>

    @yield('scripts')
</body>

</html>
