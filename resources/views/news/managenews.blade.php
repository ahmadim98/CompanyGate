@if ( Auth::user()->role  === 'admin' || Auth::user()->role === 'manager' || Auth::user()->role === 'writer')
@extends('master')

@section('titleclass')
    managenews_nav
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('assets/css/dataTables.bootstrap4.css')}}">
@endsection

@section('pagecontent')
    
<main role="main" class="main-content">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-12">
          @if (Request::get('status') == 'new')
            <div class="alert alert-success successadd_message" role="alert"></div>
          @endif
          <div class="row align-items-center mb-2">
            <div class="col" >
              <h2 class='h5 page-title managenews_nav'></h2>
            </div>
          </div>
          <div class="row my-4">
            <!-- Small table -->
            <div class="col-md-12">
              <div class="card shadow">
                <div class="card-body">
                  <!-- table -->
                  <table class="table datatables" id="dataTable-2">
                    <thead>
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

    <!-- Modal -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <form id="deleteModal" action="{{ route('DelNews') }}" method="post">
          @csrf
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title confirmDelete_modaltitle" id="confirmModalLabel"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body confirmDelete_modaltext">
          </div>
          <div class="modal-footer">
            @method('delete')
            <input type="hidden" id="newsid" name="newsid" value="">
            <button type="button" class="btn btn-secondary cancel_button" data-dismiss="modal"></button>
            <button type="submit" class="btn btn-primary confirm_button"></button>
          </div>
        </div>
        </form>
      </div>
    </div>

  </main> <!-- main -->

@endsection

@section('javascript')
  <script>
    function deleteAction(id){
      $("#newsid").val(id);
    }

    $('.successadd_message').delay(3000).fadeOut(200);
  </script>
@endsection

@section('dataTable_Library')
    <script src='{{asset('assets/js/jquery.dataTables.min.js')}}'></script>
    <script src='{{asset('assets/js/dataTables.bootstrap4.min.js')}}'></script>
@endsection
@else
  <script type="text/javascript">
    window.location = "{{ url('/') }}";//here double curly bracket
  </script>
@endif
