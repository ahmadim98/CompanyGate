@extends('master')

@section('titleclass')
    settings_nav
@endsection

@section('css')

@endsection

@section('pagecontent')
<main role="main" class="main-content">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-12">
          <div class="row align-items-center mb-2">
            <div class="col">
              <h2 class='h5 page-title settingspage_title'></h2>
            </div>
            <form action="{{ route('SetSettings') }}" method="post">
              @csrf
              </div>
                <div class="card shadow mb-4">
                  <div class="card-header">
                    <strong class="card-title settings_nav"></strong>
                  </div>
                  <div class="card-body">
                    <p class="mb-2"><strong class="thememode_form"></strong></p>
                    <div class="custom-control custom-radio">
                      <input type="radio" id="customRadio1" name="thememode" class="custom-control-input" value="light" checked="">
                      <label class="custom-control-label thememode_light" for="customRadio1"></label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input type="radio" id="customRadio2" name="thememode" class="custom-control-input" value="dark">
                      <label class="custom-control-label thememode_dark" for="customRadio2"></label>
                    </div>
                  </div>
                </div>
           <!-- .row -->
          <button type="submit" class="btn mb-2 btn-success btn-lg save_button"></button>
        </div> <!-- .col-12 -->
        </form>
        </div> <!-- .col-12 -->
      </div> <!-- .row -->
    </div>
@endsection

@section('javascript')
  <script>
    var theme_config = '{{ $config }}';
    
    var mode = JSON.parse(theme_config.replace(/&quot;/g,'"'));

    if(mode.theme_mode == 'light'){
      document.getElementById('customRadio1').checked = true;
    }else{
      document.getElementById('customRadio2').checked = true;
    }
  </script>
@endsection