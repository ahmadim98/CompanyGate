@extends('master')

@section('titleclass')
    questionsupport_title
@endsection

@section('css')

@endsection

@section('pagecontent')
<main role="main" class="main-content">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-12">
          <div class="w-50 mx-auto text-center justify-content-center py-5 my-5">
            <h2 class="page-title mb-0 questionsupport_title"></h2>
          </div>
          <div class="row my-4">
            <div class="col-md-12">
              <div class="card shadow bg-success text-center mb-4">
                <div class="card-body p-5">
                  <span class="circle circle-md bg-success-light">
                    <i class="fe fe-message-circle fe-24 text-white"></i>
                  </span>
                  <h3 class="h4 mt-4 mb-1 text-white contactsupport_title"></h3>
                  <p class="text-white mb-4 contactsupportphrase_title"></p>
                  <h4 class="h4 mt-4 mb-1 text-white contactsupport_text"></h4>
                </div> <!-- .card-body -->
              </div> <!-- .card -->
            </div> <!-- .col-md-->
          </div> <!-- .row -->
        </div> <!-- .col-12 -->
      </div> <!-- .row -->
    </div> <!-- .container-fluid -->
  </main> <!-- main -->
@endsection

@section('javascript')
@endsection