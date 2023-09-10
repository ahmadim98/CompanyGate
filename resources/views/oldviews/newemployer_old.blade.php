@extends('master')

@section('titleclass')
    addnewemployer_title
@endsection

@section('css')

@endsection

@section('pagecontent')
<main role="main" class="main-content">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-12">
          <div class="w-50 mx-auto text-center justify-content-center">
            <h2 class="page-title mb-4 addnewemployer_title"></h2>
          </div>
          <form action="{{ route('NewEmployer', $employer) }}" method="POST">
            @csrf
            <div class="card shadow mb-4">
              <div class="card-header">
                <strong class="card-title employerdetails_title"></strong>
              </div>
              <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                      <div class="form-group mb-3">
                        <label for="simpleinput" class="empid_form"></label>
                        <input type="text" id="simpleinput" class="form-control" value="{{$employer->empid}}">
                      </div>
                      <div class="form-group mb-3">
                        <label for="simpleinput" class="name_form"></label>
                        <input type="text" id="simpleinput" class="form-control" value="{{$employer->name}}">
                      </div>
                      <div class="form-group mb-3">
                        <label for="example-email" class="email_form"></label>
                        <input type="email" id="example-email" name="example-email" class="form-control" placeholder="example@example.com" value="{{$employer->email}}">
                      </div>
                      <div class="form-group mb-3">
                        <label for="simpleinput" class="phone_form"></label>
                        <input type="text" id="simpleinput" class="form-control" value="{{$employer->phone}}">
                      </div>
                      <div class="form-group mb-3">
                        <label for="simpleinput" class="Ext_form"></label>
                        <input type="text" id="simpleinput" class="form-control" value="{{$employer->ext}}">
                      </div>
                      <div class="form-group mb-3">
                        <label for="simpleinput" class="position_form"></label>
                        <input type="text" id="simpleinput" class="form-control" value="{{$employer->position}}">
                      </div>
                      <div class="form-group mb-3">
                        <label for="simpleinput" class="department_form"></label>
                        <input type="text" id="simpleinput" class="form-control" value="{{$employer->department}}">
                      </div>
                    </div> <!-- /.col -->
                </div>
              </div>
            </div>
           <!-- .row -->
           <a href="{{ url('/manageemployers') }}" class="btn mb-2 btn-danger btn-lg cancel_button"></a>
           <button type="submit" class="btn mb-2 btn-success btn-lg add_button"></button>
        </div> <!-- .col-12 -->
      </form>
      </div> <!-- .row -->
    </div> <!-- .container-fluid -->
  </main> <!-- main -->
@endsection

@section('javascript')
@endsection