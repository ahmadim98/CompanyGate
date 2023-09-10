@extends('master')

@section('titleclass')
    employer_of_month_header
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
              <h2 class='h5 page-title employer_of_month_header'></h2>
            </div>
          </div>
        

          <div class="row">                 

            @foreach ($emonth as $employer)
                <!-- .col -->
                <div class="col-md-2">
                  <div class="card shadow mb-3">
                    <div class="card-body text-center" style="padding:0.60rem 1.25rem">
                      <div class="avatar avatar-lg mt-4">
                        <a href="">
                          <i class="fe fe-award fe-55"></i>
                        </a>
                      </div>
                      <div class="card-text my-2">
                        <strong class="card-title my-0">{{ $employer->name }}</strong>
                        <p class="small text-muted mb-0">{{ $employer->department }}</p>
                      </div>
                    </div> <!-- ./card-text -->
                    <div class="card-footer" style="padding:0.15rem 1.25rem;">
                      <div class="row align-items-center justify-content-between">
                        <div class="col-auto">
                          <small style="display: flex;">
                            <div class="month_{{ $employer->month }}"></div>&nbsp;{{ $employer->year }}
                            @if ( Auth::user()->role  === 'admin' || Auth::user()->role === 'manager')
                              <button type="button" style="background-color: transparent;background-repeat: no-repeat;border: none;cursor: pointer;overflow: hidden;outline: none;"
                              onclick='deleteAction({{ $employer->id }})' data-toggle='modal' data-target='#confirmDeleteModal'>
                              <i class="fe fe-trash fe-16" style="color:red"></i>
                              </button>
                              <button type="button" style="background-color: transparent;background-repeat: no-repeat;border: none;cursor: pointer;overflow: hidden;outline: none;"
                              onclick='editAction({{ $employer->id }})' data-toggle='modal' data-target='#editModal'>
                              <i class="fe fe-edit fe-16" style="color:orange"></i>
                              </button>
                            @endif
                          </small>
                        </div>
                        
                      </div>
                    </div> <!-- /.card-footer -->
                  </div>
                </div><!-- .col -->
            @endforeach

            @if ( Auth::user()->role  === 'admin' || Auth::user()->role === 'manager')
            <div class="col-md-2">
              <div class="card shadow mb-3">
                <div class="card-body text-center" style="padding:0.60rem 1.25rem">
                  <div class="avatar avatar-lg mt-4">
                    <i class="fe fe-plus-circle fe-55 text-success"></i>
                  </div>
                  <div class="card-text my-2">
                    <button type="button" class="btn mb-2 btn-success add_button" data-toggle='modal' data-target='#addModal'></button>
                  </div>
                </div> <!-- ./card-text -->
              </div>
            </div>
            @endif
          </div>
        </div> <!-- .col-12 -->
      </div> <!-- .row -->
    </div>

    <!-- Modal -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <form id="deleteModal" action="{{ route('DelEmonth') }}" method="post">
          @csrf
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title confirmDelete_modaltitle" id="confirmModalLabel"></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body confirmDeleteEmployer_modaltext">
            </div>
            <div class="modal-footer">
              @method('delete')
              <input type="hidden" id="emonth_id" name="id" value="">
              <button type="button" class="btn btn-secondary cancel_button" data-dismiss="modal"></button>
              <button type="submit" class="btn btn-primary confirm_button"></button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <form id="addModal" action="{{ route('AddEMonth') }}" method="post">
          @csrf
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title addnewemployer_title" id="addModalLabel"></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-group mb-3">
                <label for="simpleinput" class="name_form"></label>
                <input type="text" id="simpleinput" name="name" class="form-control">
              </div>
              <div class="form-group mb-3">
                <label for="simpleinput" class="department_form"></label>
                <input type="text" id="simpleinput" name="department" class="form-control">
              </div>
              <div class="form-group mb-3">
                <label for="simpleinput" class="month_input"></label>
                <input type="text" id="simpleinput" name="month" class="form-control">
              </div>
              <div class="form-group mb-3">
                <label for="simpleinput" class="year_input"></label>
                <input type="text" id="simpleinput" name="year" class="form-control">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary cancel_button" data-dismiss="modal"></button>
              <button type="submit" class="btn btn-primary confirm_button"></button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <form id="editModal" action="{{ route('EditEmonth') }}" method="post">
          @csrf
          @method('PUT')
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title editemployer_title" id="addModalLabel"></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            
            <input type="hidden" id="edit_id" name="id" class="form-control">

            <div class="modal-body">
              <div class="form-group mb-3">
                <label for="simpleinput" class="name_form"></label>
                <input type="text" id="edit_name" name="name" class="form-control">
              </div>
              <div class="form-group mb-3">
                <label for="simpleinput" class="department_form"></label>
                <input type="text" id="edit_department" name="department" class="form-control">
              </div>
              <div class="form-group mb-3">
                <label for="simpleinput" class="month_input"></label>
                <input type="text" id="edit_month" name="month" class="form-control">
              </div>
              <div class="form-group mb-3">
                <label for="simpleinput" class="year_input"></label>
                <input type="text" id="edit_year" name="year" class="form-control">
              </div>
            </div>
            <div class="modal-footer">
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
      $("#emonth_id").val(id);
    }

    function editAction(id){
      $("#edit_id").val(id);

      var url = '{{ route("getEmonth" , ["id" => ":id"]) }}';
      url = url.replace(':id', id);

      $.ajax({
        type: "GET",
        url: url,
        success: function (data) {
          $("#edit_name").val(data.name);
          $("#edit_department").val(data.department);
          $("#edit_month").val(data.month);
          $("#edit_year").val(data.year);
        }
      });
    }

  </script>
@endsection