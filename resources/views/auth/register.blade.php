
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
    <link href="{{ asset('assets/css/main.css?version=4.4.0') }}" rel="stylesheet">
  </head>
  <body>
    <div class="all-wrapper menu-side with-pattern">
      <div class="auth-box-w wider">
        <div class="logo-w">
          <a href="index.html"><img alt="" src="img/logo-big.png"></a>
        </div>
        <h4 class="auth-header">
          Register Account
        </h4>
        <form action="{{ route('register') }}" method="POST">
            @csrf
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for=""> First Name</label><input class="form-control" placeholder="Enter First Name" type="text" name="first_name">
                <div class="pre-icon os-icon os-icon-user-male-circle"></div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for=""> Last Name</label><input class="form-control" placeholder="Enter Full Name" type="text" name="last_name">
                <div class="pre-icon os-icon os-icon-user-male-circle"></div>
              </div>
            </div>
          </div>
          

          <div class="form-group">
            <label for=""> Email address</label><input class="form-control" placeholder="Enter email" type="email" name="email" autocomplete="off">
            <div class="pre-icon os-icon os-icon-email-2-at2"></div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for=""> Password</label><input class="form-control" placeholder="Password" type="password" name="password">
                <div class="pre-icon os-icon os-icon-fingerprint"></div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="">Confirm Password</label><input class="form-control" name="password_confirmation" placeholder="Confirm Password" type="password">
              </div>
            </div>
          </div>
          
          <div class="buttons-w">
            <button class="btn btn-primary" type="submit">Register</button>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
