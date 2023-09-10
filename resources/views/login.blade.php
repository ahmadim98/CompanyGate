@guest
<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    
    <title class="loginpage_title"></title>
    
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/simplebar.css')}}">
    <!---->
    <!-- Fonts CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Tajawal&display=swap" rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/select2.css')}}">
    <!-- App CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/app-light.css')}}" id="lightTheme" disabled>
    <link rel="stylesheet" href="{{asset('assets/css/app-dark.css')}}" id="darkTheme">

  </head>
  
  <body class="vertical  {{Config::get('template.theme_mode');}} rtl ">

    <div class="wrapper vh-100" style="overflow-y: hidden;overflow-x: hidden;">
        <div class="row align-items-center h-100">
          <form class="col-lg-3 col-md-4 col-10 mx-auto text-center" action="{{ route('AuthLogin') }}" method="post">
            @csrf
            <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="./index.html">
              <img src="{{asset('assets/assets/cg_logo5.png')}}" style="
              width: 273px;
              margin-bottom: 20px;
          " />
            </a>
            <h1 class="h6 mb-3 loginpage_title"></h1>
            
            <!--<div class="checkbox mb-3">
              <div class="alert alert-primary" role="alert">
                <div>
                  <span class="informlogin_title"></span>
                  <hr style="margin-top:3.5px;margin-bottom:3.5px">
                  <span class="informlogin">Role: <strong style="color:black;">Admin</strong></span><br>
                  <span class="informlogin">Username: ahmad</span><br>
                  <span class="informlogin">Password: 12345678</span>
                  <hr style="margin-top:3.5px;margin-bottom:3.5px">
                  <span class="informlogin">Role: <strong style="color:black;">Writer</strong></span><br>
                  <span class="informlogin">Username: ahussain</span><br>
                  <span class="informlogin">Password: 12345678</span>
                  <hr style="margin-top:3.5px;margin-bottom:3.5px">
                  <span class="informlogin">Role: <strong style="color:black;">Manager</strong></span><br>
                  <span class="informlogin">Username: abdulaziz</span><br>
                  <span class="informlogin">Password: 12345678</span>
                  <hr style="margin-top:3.5px;margin-bottom:3.5px">
                  <span class="informlogin">Role: <strong style="color:black;">Employer</strong></span><br>
                  <span class="informlogin">Username: layla</span><br>
                  <span class="informlogin">Password: 12345678</span>
                </div>
              </div>
            </div>-->
            
            <div class="form-group">
              <label for="inputUsername" class="sr-only username_form"></label>
              <input type="text" id="inputUsername" name="username" class="form-control form-control-lg" placeholder="اسم المستخدم / Username" required="" autofocus="">
            </div>
            <div class="form-group">
              <label for="inputPassword" class="sr-only password_form"></label>
              <input type="password" id="inputPassword" name="password" class="form-control form-control-lg" placeholder="كلمة المرور / Password" required="">
            </div>

            <div class="checkbox mb-3">
              <label class="rememberme_form">
                <input type="checkbox" value="remember-me" class="">
              </label>
            </div>

            <button class="btn btn-lg btn-primary btn-block login_button" type="submit"></button>
            <p class="mt-5 mb-3 text-muted">© 2023</p>
          </form>
        </div>
      </div>

    @include('partials.footer')
  
  </body>
</html>
@endguest
@auth
  <script type="text/javascript">
    window.location = "{{ url('/') }}";//here double curly bracket
  </script>
@endauth