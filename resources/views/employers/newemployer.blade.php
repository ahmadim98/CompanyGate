@if ( Auth::user()->role  === 'admin')
@extends('master')

@section('titleclass')
    addnewemployer_title
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
            <h2 class="page-title mb-4 addnewemployer_title"></h2>
          </div>
          <form action="{{ route('NewEmployer') }}" method="post">
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
                        <input type="text" id="empID" name="empID" class="form-control" >
                      </div>
                      <div class="form-group mb-3">
                        <label for="simpleinput" class="name_form"></label>
                        <input type="text" id="name" name="name" class="form-control">
                      </div>
                      <div class="form-group mb-3">
                        <label for="example-email" class="email_form"></label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="example@example.com">
                      </div>
                      <div class="form-group mb-3">
                        <label for="simpleinput" class="phone_form"></label>
                        <input type="text" id="phone" name="phone" class="form-control">
                      </div>
                      <div class="form-group mb-3">
                        <label for="simpleinput" class="Ext_form"></label>
                        <input type="text" id="ext" name="ext" class="form-control">
                      </div>
                      <div class="form-group mb-3">
                        <label for="simpleinput" class="position_form"></label>
                        <input type="text" id="position" name="position" class="form-control">
                      </div>
                      <div class="form-group mb-3">
                        <label for="simpleinput" class="department_form"></label>
                        <input type="text" id="department" name="department" class="form-control">
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
          <!-- Modal -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">

          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title confirmDelete_modaltitle" id="confirmModalLabel"></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body confirmDeleteCert_modaltext">
            </div>
            <div class="modal-footer">

              <input type="hidden" id="employerId" name="empID" value="">
              <button type="button" class="btn btn-secondary cancel_button" data-dismiss="modal"></button>
              <button type="submit" class="btn btn-primary confirm_button"></button>
            </div>
          </div>

      </div>
    </div>

    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">

          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title editCerts_modaltext" id="editModalLabel"></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-group mb-3">
                <label for="simpleinput" class="certlogo_form"></label>
                <input type="select" id="simpleinput" class="form-control">
              </div>
              <div class="form-group mb-3">
                <label for="simpleinput" class="certname_form"></label>
                <input type="text" id="simpleinput" class="form-control">
              </div>
              <div class="form-group mb-3">
                <label for="simpleinput" class="certlocation_form"></label>
                <input type="text" id="simpleinput" class="form-control">
              </div>
              <div class="form-group mb-3">
                <label for="simpleinput" class="certissue_form"></label>
                <input type="text" id="simpleinput" class="form-control">
              </div>
              <div class="form-group mb-3">
                <label for="simpleinput" class="certdate_form"></label>
                <input type="text" id="simpleinput" class="form-control">
              </div>
            </div>
            <div class="modal-footer">

              <input type="hidden" id="employerId" name="empID" value="">
              <button type="button" class="btn btn-secondary cancel_button" data-dismiss="modal"></button>
              <button type="submit" class="btn btn-primary confirm_button"></button>
            </div>
          </div>

      </div>
    </div>

    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">

          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title certadd_form" id="addModalLabel"></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-group mb-3">
                <label for="simpleinput" class="certname_form"></label>
                <input type="text" id="simpleinput" class="form-control">
              </div>
              <div class="form-group mb-3">
                <label for="simpleinput" class="certlocation_form"></label>
                <input type="text" id="simpleinput" class="form-control">
              </div>
              <div class="form-group mb-3">
                <label for="simpleinput" class="certissue_form"></label>
                <input type="text" id="simpleinput" class="form-control">
              </div>
              <div class="form-group mb-3">
                <label for="simpleinput" class="certdate_form"></label>
                <input type="text" id="simpleinput" class="form-control">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary cancel_button" data-dismiss="modal"></button>
              <button type="submit" class="btn btn-primary confirm_button"></button>
            </div>
          </div>

      </div>
    </div>

    </div> <!-- .container-fluid -->
  </main> <!-- main -->
@endsection

@section('javascript')
  <script src="{{asset('assets/js/select2.min.js')}}"></script>
  <script>
    function deleteAction(id){
      //$("#employerId").val(id);
      console.log('delete this shit');
    }

    function editAction(id,inputs){
      console.log('edit this shit');
    }

    function addAction(inputs){
      console.log('add this shit');
    }
  </script>
@endsection
@else
  <script type="text/javascript">
    window.location = "{{ url('/') }}";//here double curly bracket
  </script>
@endif
