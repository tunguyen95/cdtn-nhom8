<!DOCTYPE html>
<html>
    <head>
        <title> @yield('title') </title>
        <link rel="icon" href="{{ url('Frontend/img/logo_title1.png') }}" type="image/gif" sizes="32x32">
        <script>
            var SiteUrl = '{{url("/")}}';
        </script>
        @includeif ('backend.layouts.partial._angular')
        @includeif ('backend.layouts.partial._default_css')
        @includeif ('backend.layouts.partial._css')
        @yield('myCss')
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
    </head>
    <body class="hold-transition skin-blue sidebar-mini" style=" height: 100%;">
        <div class="wrapper">
            @includeif ('backend.layouts.partial._header')
            @includeif ('backend.layouts.partial._menu')
            @yield('content')
            @includeif ('backend.layouts.partial._default_js')
            @includeif ('backend.layouts.partial._js')
            @yield('myJs')
            @includeif ('backend.layouts.partial._footer')
        </div>
    </body>
</html>
