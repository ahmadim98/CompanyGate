@extends('master')

@section('titleclass')
    employerstitle
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('assets/css/dataTables.bootstrap4.css')}}">
@endsection

@section('pagecontent')
<main role="main" class="main-content">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-12">
          <div class="row align-items-center mb-2">
            <div class="col" >
              <h2 class='h5 page-title employerstitle'></h2>
            </div>
          </div>
          <div class="row my-4">
            <!-- Small table -->
            <div class="col-md-12">
              <div class="card shadow">
                <div class="card-body">
                  <!-- table -->
                  <table class="table datatables" id="dataTable-1">
                    <thead>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div>
              </div>
            </div> <!-- simple table -->
          </div> <!-- end section -->
        </div> <!-- .col-12 -->
      </div> <!-- .row -->
    </div> <!-- .container-fluid -->
    
  </main> <!-- main -->
@endsection

@section('javascript')
@endsection

@section('dataTable_Library')
    <script src='{{asset('assets/js/jquery.dataTables.min.js')}}'></script>
    <script src='{{asset('assets/js/dataTables.bootstrap4.min.js')}}'></script>
@endsection