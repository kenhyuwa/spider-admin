<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login System</title>

    <!-- Styles -->
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vendor/spider/bootstrap/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('vendor/spider/alte/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('vendor/spider/alte/dist/css/AdminLTE.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('vendor/spider/alte/plugins/iCheck/square/blue.css') }}">
    {{-- Animate --}}
    <link rel="stylesheet" href="{{ asset('vendor/spider/SweetAlert/animate.css') }}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="">{!! config('spider.application_name') !!}</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
      @if( Session::has( 'success' ) )
        <div id="callout" class="callout callout-info" style="cursor: pointer;padding-top: 1px;padding-bottom: 1px;">
            <center><h5>{{ Session::get('success') }}</h5></center>
        </div>
      @endif
        <p class="login-box-msg">Sign in to start your session</p>
        <form role="form" method="POST" action="{{ url(config('spider.route_prefix').'/login') }}">
            {{ csrf_field() }}
          <div class="form-group has-feedback{{ $errors->has('name') ? ' has-error' : '' }}">
            <input type="text" class="form-control" placeholder="Username" name="name" value="{{ old('name') }}" required autofocus autocomplete="off">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
          </div>
          <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
            <input type="password" class="form-control" name="password" placeholder="Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
          </div>
          <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12">
              <button type="submit" class="btn btn-primary btn-block btn-flat"><i class="fa fa-key"></i> Sign In</button>
            </div><!-- /.col -->
            <div class="col-xs-8">
              <div class="checkbox icheck">
                <label for="remember">
                  <input type="checkbox" id="remember" name="remember"> Remember Me
                </label>
              </div>
            </div><!-- /.col -->
          </div>
        </form>

        {{-- <a href="{{ url('/password/reset') }}">I forgot my password</a> --}}

        <div class="social-auth-links text-center">
          <small>
              <p>&copy;&nbsp;2016 All rights reserved.<br/><a href="{!! config('spider.developer_web') !!}" target="_blank">Supported by {!! config('spider.developer_name') !!}</a></p>
          </small>
        </div><!-- /.social-auth-links -->

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="{{ asset('vendor/spider/alte/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{{ asset('vendor/spider/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- iCheck -->
    <script src="{{ asset('vendor/spider/alte/plugins/iCheck/icheck.min.js') }}"></script>
    <script>
    var logOn = function()
    {
      $('.login-logo').addClass('animated zoomIn');
    }
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });

        logOn();

        $('#callout').click(function(){
            $(this).fadeOut('fast');
        });

        @if($errors->has('name'))
          $('.login-box-body').addClass('animated wobble');
        @elseif($errors->has('password'))
          $('.login-box-body').addClass('animated flash');
        @endif

      });
    </script>
  </body>
</html>
