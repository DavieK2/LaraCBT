
<!DOCTYPE html>
<html>
  <head>
    <title>I-Tech Education Portal</title>
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
            <div class="row mb-0 pb-0">
              <div class="col-md-6">
                <div class="form-group">
                  <label for=""> First Name</label><input class="form-control" placeholder="Enter First Name" type="text" name="first_name">
                  <div class="pre-icon os-icon os-icon-user-male-circle"></div>
                </div>
                @error('first_name') <div style="font-size: 9pt" class="pt-1 text-danger">{{ $message }} </div> @enderror
              </div>
             
              <div class="col-md-6">
                <div class="form-group">
                  <label for=""> Last Name</label><input class="form-control" placeholder="Enter Last Name" type="text" name="last_name">
                </div>
                @error('last_name') <div style="font-size: 9pt" class="pt-1 text-danger">{{ $message }} </div> @enderror
              </div>
            </div>
         

          <div class="form-group mb-0 pt-1">
            <label for=""> Email address</label><input class="form-control" placeholder="Enter email" value="{{ old('email') }}" type="email" name="email">
            <div class="pre-icon os-icon os-icon-email-2-at2"></div>
          </div>
          @error('email') <div style="font-size: 9pt" class="pt-1 text-danger">{{ $message }} </div> @enderror

          <div class="form-group mb-0 pt-3">
            <label for=""> School Name</label><input class="form-control" placeholder="Enter School Name" value="{{ old('school_name') }}" type="text" name="school_name">
            <div class="pre-icon os-icon os-icon-pencil-1"></div>
          </div>
          @error('school_name') <div style="font-size: 9pt" class="pt-1 text-danger">{{ $message }} </div> @enderror

          <div class="row mb-0 pt-3">
            <div class="col-sm-6">
              <div class="form-group">
                <label for=""> Password</label><input class="form-control" placeholder="Password" type="password" name="password">
                <div class="pre-icon os-icon os-icon-fingerprint"></div>
              </div>
            </div>

            <div class="col-sm-6">
              <div class="form-group">
                <label for="">Confirm Password</label><input class="form-control" name="password_confirmation" placeholder="Confirm Password" type="password">
              </div>
            </div>
          </div>
          @error('password') <div style="font-size: 9pt" class="pt-1 text-danger">{{ $message }} </div> @enderror
          
          <div class="buttons-w">
            <button class="btn btn-primary" type="submit">Register</button>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
