
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
  <body class="auth-wrapper">
    <div class="all-wrapper menu-side with-pattern">
      <div class="auth-box-w">
        @if(Session::has('error_message'))
        <div class="px-4 pt-5 mb-0">
          <div class="alert alert-sm alert-danger alert-block text-center" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>{{ session('error_message') }}</strong>
          </div>
        </div>
        @endif
        <div class="logo-w">
          <a href="index.html"><img alt="" src="{{ asset('assets/img/logo-big.png') }}"></a>
        </div>
        <h4 class="auth-header">
          Login
        </h4>
        <form action="{{ route('login') }}" method="POST">
            @csrf
          <div class="form-group mb-0">
            <label for="">Email</label><input class="form-control" value="{{ old('email') }}" placeholder="Enter your email" type="email" name="email">
            <div class="pre-icon os-icon os-icon-email-2-at2"></div>
          </div>
          @error('email') <div style="font-size: 9pt" class="pt-1 text-danger">{{ $message }} </div> @enderror
         

          <div class="form-group mt-2 mb-0">
            <label for="">Password</label><input class="form-control" placeholder="Enter your password" type="password" name="password">
            <div class="pre-icon os-icon os-icon-fingerprint"></div>
          </div>
          @error('password') <div style="font-size: 9pt" class="pt-1 text-danger">{{ $message }} </div> @enderror
         

          <div class="buttons-w">
            <button type="submit" class="btn btn-primary">Log me in</button>
            <div class="form-check-inline">
              <label class="form-check-label"><input class="form-check-input" type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>Remember Me</label>
            </div>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
