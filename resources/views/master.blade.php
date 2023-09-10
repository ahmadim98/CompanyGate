@guest
  <script type="text/javascript">
    window.location = "{{ url('/login') }}";//here double curly bracket
  </script>
@endguest
@auth

<!doctype html>
<html lang="en">
  <head>

    @include('partials.header')

  </head>
  
  <body class="vertical  {{Config::get('template.theme_mode');}} rtl ">

    <div class="wrapper">

      @include('partials.topnav')

      @include('partials.sidebar')

      @yield('pagecontent')

    </div> 

    @include('partials.footer')
  
  </body>
</html>
@endauth