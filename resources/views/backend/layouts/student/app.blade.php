
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>I-Tech CBT</title>

    <!-- Prevent the demo from appearing in search engines -->
    <meta name="robots" content="noindex">

    <!-- Perfect Scrollbar -->
    <link type="text/css" href="{{ asset('student/assets/vendor/perfect-scrollbar.css') }}" rel="stylesheet">

    <!-- Fix Footer CSS -->
    <link type="text/css" href="{{ asset('student/assets/vendor/fix-footer.css') }}" rel="stylesheet">

    <!-- Material Design Icons -->
    <link type="text/css" href="{{ asset('student/assets/css/material-icons.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('student/assets/css/material-icons.rtl.css') }}" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link type="text/css" href="{{ asset('student/assets/css/fontawesome.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('student/assets/css/fontawesome.rtl.css') }}" rel="stylesheet">

    <!-- Preloader -->
    <link type="text/css" href="{{ asset('student/assets/css/preloader.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('student/assets/css/preloader.rtl.css') }}" rel="stylesheet">

    <!-- App CSS -->
    <link type="text/css" href="{{ asset('student/assets/css/app.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('student/assets/css/app.rtl.css') }}" rel="stylesheet">
    <livewire:styles />

</head>

<body class="layout-navbar-mini"> 
    <div class="preloader">
        <div class="sk-double-bounce">
            <div class="sk-child sk-double-bounce1"></div>
            <div class="sk-child sk-double-bounce2"></div>
        </div>
    </div>

    <div class="mdk-header-layout js-mdk-header-layout">
        <div class="mdk-header-layout__content page-content ">
            @include('sweetalert::alert')
            @yield('content')
        </div>
    </div>


    <!-- jQuery -->
    <livewire:scripts />
    <script src="{{ asset('student/assets/vendor/jquery.min.js') }}"></script>

    <!-- Bootstrap -->
    <script src="{{ asset('student/assets/vendor/popper.min.js') }}"></script>
    <script src="{{ asset('student/assets/vendor/bootstrap.min.js') }}"></script>

    <!-- Perfect Scrollbar -->
    <script src="{{ asset('student/assets/vendor/perfect-scrollbar.min.js') }}"></script>

    <!-- DOM Factory -->
    <script src="{{ asset('student/assets/vendor/dom-factory.js') }}"></script>

    <!-- MDK -->
    <script src="{{ asset('student/assets/vendor/material-design-kit.js') }}"></script>

    <!-- Fix Footer -->
    <script src="{{ asset('student/assets/vendor/fix-footer.js') }}"></script>

    <!-- Chart.js -->
    <script src="{{ asset('student/assets/vendor/Chart.min.js') }}"></script>

    <!-- App JS -->
    <script src="{{ asset('student/assets/js/app.js') }}"></script>

    <!-- Highlight.js -->
    <script src="{{ asset('student/assets/js/hljs.js') }}"></script>

    <!-- App Settings (safe to remove) -->
    <script src="{{ asset('student/assets/js/app-settings.js') }}"></script>




</body>

</html>