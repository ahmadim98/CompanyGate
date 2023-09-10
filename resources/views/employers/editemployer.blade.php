@if ( Auth::user()->role  === 'admin')
@extends('master')

@section('titleclass')
    editemployer_title
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
            <h2 class="page-title mb-4 editemployer_title"></h2>
          </div>
          <form action="{{ route('UpdateEmployer', ['id' => $employer->empID])}}" method="post">
            @csrf
            @method('PUT')
            <div class="card shadow mb-4">
              <div class="card-header">
                <strong class="card-title employerdetails_title"></strong>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group mb-3">
                      <label for="simpleinput" class="empid_form"></label>
                      <input type="text" id="empid" name="empID" class="form-control" value="{{$employer->empID}}">
                    </div>
                    <div class="form-group mb-3">
                      <label for="simpleinput" class="name_form"></label>
                      <input type="text" id="name" name="name" class="form-control" value="{{$employer->name}}">
                    </div>
                    <div class="form-group mb-3">
                      <label for="example-email" class="email_form"></label>
                      <input type="email" id="email" name="email" class="form-control" placeholder="example@example.com" value="{{$employer->email}}">
                    </div>
                    <div class="form-group mb-3">
                      <label for="simpleinput" class="phone_form"></label>
                      <input type="text" id="phone" name="phone" class="form-control" value="{{$employer->phone}}">
                    </div>
                    <div class="form-group mb-3">
                      <label for="simpleinput" class="Ext_form"></label>
                      <input type="text" id="ext" name="ext" class="form-control" value="{{$employer->ext}}">
                    </div>
                    <div class="form-group mb-3">
                      <label for="simpleinput" class="position_form"></label>
                      <input type="text" id="position" name="position" class="form-control" value="{{$employer->position}}">
                    </div>
                    <div class="form-group mb-3">
                      <label for="simpleinput" class="department_form"></label>
                      <input type="text" id="department" name="department" class="form-control" value="{{$employer->department}}">
                    </div>
                  </div> <!-- /.col -->
                </div>
              </div>
            </div>
           <!-- .row -->
           <a href="{{ url('/manageemployers') }}" class="btn mb-2 btn-danger btn-lg cancel_button"></a>
           <button type="submit" class="btn mb-2 btn-warning btn-lg edit_button"></button>
        </div> <!-- .col-12 -->
      </form>
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
