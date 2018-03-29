<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> @yield('title') </title>
    @includeif('backend.layouts.partial._default_css')
    <link rel="stylesheet" href="{{ url('') }}/plugins/iCheck/square/blue.css">
    @includeif('backend.layouts.partial._css')
    @yield('myCss')
    <script>
        var SiteUrl = '{{url("/")}}';
    </script>
    
    <!-- <script src="{{ url('js/ctrl/backend/loginCtrl.js') }}"></script> -->
    
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href="../../index2.html"><b>Admin</b>LTE</a>
            </div>
          <!-- /.login-logo -->
          <div class="login-box-body">
            <form action="{{ url('admin/login') }}" method="POST">
                <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
                    @csrf
                    <input type="email" class="form-control" name="email" placeholder="Email" value="{{old('email')}}">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @if ($errors->has('email'))
                        <div class="text-left text-danger" style="margin-top: 5px;">
                            <strong>{{ $errors->first('email') }}</strong>
                        </div>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }}">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    @if ($errors->has('password'))
                        <div class="text-left text-danger" style="margin-top: 5px;">
                            <strong>{{ $errors->first('password') }}</strong>
                        </div>
                    @endif
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label>
                                <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false" style="position: relative;"><input type="checkbox" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> Remember Me
                            </label>
                        </div>
                    </div>
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Đăng nhập</button>
                    </div>
                </div>
            </form>
          </div>
        </div>
        @includeif('backend.layouts.partial._default_js')
        @includeif('backend.layouts.partial._js')
        @yield('myJs')

    </body>
</html>