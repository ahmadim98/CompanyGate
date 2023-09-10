@if ( Auth::user()->role  === 'admin')
@extends('master')

@section('titleclass')
    addnewuser_title
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('assets/css/select2.css')}}">
@endsection

@section('pagecontent')
  <main role="main" class="main-content">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-12">
          <div class="w-50 mx-auto text-center justify-content-center">
            <h2 class="page-title mb-4 addnewuser_title"></h2>
          </div>
          <form action="{{ route('NewUser') }}" method="post">
            @csrf
            <div class="card shadow mb-4">
              <div class="card-header">
                <strong class="card-title userdetails_title"></strong>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group mb-3">
                      <label for="simpleinput" class="empid_form"></label>
                      <input type="text" id="empID" name="empID" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                      <label for="simpleinput" class="username_form"></label>
                      <input type="text" id="username" name="username" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                      <label for="example-email" class="email_form"></label>
                      <input type="email" id="email" name="email" class="form-control" placeholder="example@example.com">
                    </div>
                    <div class="form-group mb-3">
                      <label for="example-password" class="password_form"></label>
                      <input type="password" id="password" name="password" class="form-control" value="">
                    </div>
                    <div class="form-group mb-3">
                      <label for="example-password" class="confirmpassword_form"></label>
                      <input type="password" id="confirmpass" class="form-control" value="">
                    </div>
                    <div class="form-group mb-3">
                      <label for="example-select" class="role_form"></label>
                      <select class="form-control" id="role" name="role">
                        <option value="admin">Admin</option>
                        <option value="manager">Manager</option>
                        <option value="writer">Writer</option>
                        <option value="employer">Employer</option>
                      </select>
                    </div>
                  </div> <!-- /.col -->
                </div>
              </div>
            </div>
           <!-- .row -->
           <a href="{{ url('/manageusers') }}" class="btn mb-2 btn-danger btn-lg cancel_button"></a>
           <button type="submit" class="btn mb-2 btn-success btn-lg add_button"></button>
          </form>
        </div> <!-- .col-12 -->
      </div> <!-- .row -->
    </div> <!-- .container-fluid -->
  </main> <!-- main -->
@endsection

@section('javascript')
  <script src="{{asset('assets/js/select2.min.js')}}"></script>
@endsection
@else
  <script type="text/javascript">
    window.location = "{{ url('/') }}";//here double curly bracket
  </script>
@endif
