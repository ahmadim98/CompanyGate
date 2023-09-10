@if ( Auth::user()->role  === 'admin')
@extends('master')

@section('titleclass')
    edituser_title
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
            <h2 class="page-title mb-4 edituser_title"></h2>
          </div>
          <form action="{{ route('EditUser', ['id' => $user->id])}}" method="post">
            @csrf
            @method('PUT')
            <div class="card shadow mb-4">
              <div class="card-header">
                <strong class="card-title userdetails_title"></strong>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group mb-3">
                      <label for="simpleinput" class="empid_form"></label>
                      <input type="text" id="empID" name="empid" class="form-control" value="{{$user->empid}}">
                    </div>
                    <div class="form-group mb-3">
                      <label for="simpleinput" class="username_form"></label>
                      <input type="text" id="username" name="username" class="form-control" value="{{$user->username}}">
                    </div>
                    <div class="form-group mb-3">
                      <label for="example-email" class="email_form"></label>
                      <input type="email" id="email" name="email" class="form-control" placeholder="example@example.com" value="{{$user->email}}">
                    </div>
                    <div class="form-group mb-3">
                      <label for="example-password" class="password_form"></label>
                      <input type="password" id="password" name="password" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                      <label for="example-password" class="confirmpassword_form"></label>
                      <input type="password" id="confirmpassword" class="form-control" value="">
                    </div>
                    <div class="form-group mb-3">
                      <label for="example-select" class="role_form"></label>
                      <select class="form-control" id="role" name="role">
                        
                        <option value="admin" @if($user->role === 'admin') selected="selected" @endif>Admin</option>
                        <option value="manager" @if($user->role === 'manager') selected="selected" @endif>Manager</option>
                        <option value="writer" @if($user->role === 'writer') selected="selected" @endif>Writer</option>
                        <option value="employer" @if($user->role === 'employer') selected="selected" @endif>Employer</option>
                      </select>
                    </div>
                  </div> <!-- /.col -->
                </div>
              </div>
            </div>
           <!-- .row -->
           <a href="{{ url('/manageusers') }}" class="btn mb-2 btn-danger btn-lg cancel_button"></a>
           <button type="submit" class="btn mb-2 btn-warning btn-lg edit_button"></button>
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
