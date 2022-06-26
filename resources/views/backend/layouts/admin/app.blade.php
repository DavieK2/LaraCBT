<!DOCTYPE html>
<html>
  <head>
    <title>Admin Dashboard HTML Template</title>
    <meta charset="utf-8">
    <meta content="ie=edge" http-equiv="x-ua-compatible">
    <meta content="template language" name="keywords">
    <meta content="Admin dashboard html template" name="description">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <link href="favicon.png" rel="shortcut icon">
    <link href="apple-touch-icon.png" rel="apple-touch-icon">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/bower_components/select2/dist/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/bower_components/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/bower_components/dropzone/dist/dropzone.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/bower_components/fullcalendar/dist/fullcalendar.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/bower_components/perfect-scrollbar/css/perfect-scrollbar.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/bower_components/slick-carousel/slick/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/bower_components/datetimepicker/jquery.datetimepicker.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/main.css?version=4.4.0') }}" rel="stylesheet">
    <style>
      .newsidebar{
          height: 100%; 
          position:fixed; 
          overflow-x:hidden;
          z-index:999;
          top:0
          }
      
      

      .newcontent{
          margin-left: 16rem;
      }

      @media screen and (max-width: 400px) {
          .newcontent{
              margin-left: 0;
          }
          
      }

      @media screen and (max-width: 1024px) {
          .newcontent{
              margin-left: 4.5rem;
          }
          
      }

      
      .scrollbar-primary::-webkit-scrollbar {
        width: 5px;
        height: 5px;
        display: none;
        overflow-x: hidden;
        background-color: #020da729;
      }

      .scrollbar-primary::-webkit-scrollbar-thumb {
          border-radius: 10px;
          -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
          background-color: #1e62eb;
          display: none;
          overflow-x: hidden;

      }

      .scrollbar-info::-webkit-scrollbar {
          width: 5px;
          height: 5px;
          overflow-x: hidden;
          background-color: #020da729;
      }

      .scrollbar-info::-webkit-scrollbar-thumb {
          border-radius: 10px;
          -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
          background-color: #1e62eb;
          overflow-x: hidden;

      }


    </style>
    <livewire:styles />
    @yield('style')
  </head>
  <body class="menu-position-side menu-side-left full-screen with-content-panel h-100">
    <div class="all-wrapper with-side-panel solid-bg-all">
      
      <div class="layout-w" >
       
        @include('backend.layouts.sidebar')

        @include('backend.layouts.mobile_sidebar')
        <!--------------------
        END - Main Menu
        -------------------->
       <div class="content-w newcontent">
          <!--------------------
          START - Top Bar
          -------------------->
          @include('backend.layouts.topbar')
          <!--------------------
          END - Top Bar
          -------------------->
          <div class="mt-5">
            @yield('content')
          </div>
          
        </div>
        </div>
      </div>
      <div class="display-type"></div>
    </div>
    
    <livewire:scripts />
    <script src="{{ asset('assets/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/bower_components/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('assets/bower_components/moment/moment.js') }}"></script>
    <script src="{{ asset('assets/bower_components/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/bower_components/jquery-bar-rating/dist/jquery.barrating.min.js') }}"></script>
    <script src="{{ asset('assets/bower_components/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('assets/bower_components/bootstrap-validator/dist/validator.min.js') }}"></script>
    <script src="{{ asset('assets/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('assets/bower_components/datetimepicker/jquery.datetimepicker.full.min.js') }}"></script>
    <script src="{{ asset('assets/bower_components/ion.rangeSlider/js/ion.rangeSlider.min.js') }}"></script>
    <script src="{{ asset('assets/bower_components/dropzone/dist/dropzone.js') }}"></script>
    <script src="{{ asset('assets/bower_components/editable-table/mindmup-editabletable.js') }}"></script>
    <script src="{{ asset('assets/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/bower_components/fullcalendar/dist/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('assets/bower_components/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('assets/bower_components/tether/dist/js/tether.min.js') }}"></script>
    <script src="{{ asset('assets/bower_components/slick-carousel/slick/slick.min.js') }}"></script>
    <script src="{{ asset('assets/bower_components/bootstrap/js/dist/util.js') }}"></script>
    <script src="{{ asset('assets/bower_components/bootstrap/js/dist/alert.js') }}"></script>
    <script src="{{ asset('assets/bower_components/bootstrap/js/dist/button.js') }}"></script>
    <script src="{{ asset('assets/bower_components/bootstrap/js/dist/carousel.js') }}"></script>
    <script src="{{ asset('assets/bower_components/bootstrap/js/dist/collapse.js') }}"></script>
    <script src="{{ asset('assets/bower_components/bootstrap/js/dist/dropdown.js') }}"></script>
    <script src="{{ asset('assets/bower_components/bootstrap/js/dist/modal.js') }}"></script>
    <script src="{{ asset('assets/bower_components/bootstrap/js/dist/tab.js') }}"></script>
    <script src="{{ asset('assets/bower_components/bootstrap/js/dist/tooltip.js') }}"></script>
    <script src="{{ asset('assets/bower_components/bootstrap/js/dist/popover.js') }}"></script>
    <script src="{{ asset('assets/js/demo_customizer.js?version=4.4.0') }}"></script>
    <script src="{{ asset('assets/js/main.js?version=4.4.0') }}"></script>
    
    <script>
      $(document).ready(function (e) {
        $('.datepicker').datetimepicker({
          timepicker: false,
          datepicker: true,
          format: 'Y-m-d H:i',
          hours12: false,
          step: 30
        });
      });
    </script>
    
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
      
      ga('create', 'UA-XXXXXXX-9', 'auto');
      ga('send', 'pageview');
    </script>
  </body>
</html>
