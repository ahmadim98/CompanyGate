    @yield('javascript_front')
    <!-- .wrapper -->
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/moment.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/simplebar.min.js')}}"></script>
    <script src="{{asset('assets/js/daterangepicker.js')}}"></script>
    <script src="{{asset('assets/js/jquery.stickOnScroll.js')}}"></script>
    <script src="{{asset('assets/js/tinycolor-min.js')}}"></script>
    <script src="{{asset('assets/js/config.js')}}"></script>
    <script src="{{asset('assets/js/d3.min.js')}}"></script>
    <script src="{{asset('assets/js/topojson.min.js')}}"></script>
    <script src="{{asset('assets/js/datamaps.all.min.js')}}"></script>
    <script src="{{asset('assets/js/datamaps-zoomto.js')}}"></script>
    <script src="{{asset('assets/js/datamaps.custom.js')}}"></script>

    <script src="{{asset('assets/js/gauge.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.sparkline.min.js')}}"></script>

    @yield('javascript_middle')

    <script src="{{asset('assets/js/jquery.mask.min.js')}}"></script>
    
    <script src="{{asset('assets/js/jquery.steps.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.validate.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.timepicker.js')}}"></script>

    <script src="{{asset('assets/js/splide.min.js')}}"></script>

    <!-- Temporarliy importing the translation this way until the site published on http-->
    <script src="{{asset('assets/data/lang.js')}}"></script>
    
    <!-- Importing the sciprt which is responsible for the statistics -->
    <script src="{{asset('assets/js/statistics.js')}}"></script>

    @yield('dataTable_Library')
    
    <!-- Importing the sciprt which is responsible for the language change -->
    <script src="{{asset('assets/js/language-switch.js')}}"></script>

    <script src="{{asset('assets/js/customized-js.js')}}"></script>

    <script src="{{asset('assets/js/apps.js')}}"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];

      function gtag()
      {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());
      gtag('config', 'UA-56159088-1');
    </script>

    @yield('javascript')