@if ( Auth::user()->role  === 'admin' || Auth::user()->role === 'manager' || Auth::user()->role === 'writer')

@else
  <script type="text/javascript">
    window.location = "{{ url('/') }}";//here double curly bracket
  </script>
@endif

@if ( Auth::user()->role  === 'admin')

@else
  <script type="text/javascript">
    window.location = "{{ url('/') }}";//here double curly bracket
  </script>
@endif