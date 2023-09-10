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

           <div class="row  mb-3" style="padding-top: 20px;">
            <div class="col">
              <h2 class='h5 page-title certifications_and_courses_title'></h2>
            </div>
           </div><!-- .row-->

           <div class="row">
            <!-- .col -->
            <div class="col-md-2">
             <div class="card shadow mb-3">
               <div class="card-body text-center" style="padding:0.60rem 1.25rem">
                 <div class="avatar avatar-lg mt-4">
                   <a href="">
                     <img src="{{asset('assets/assets/images/ksu_logo.png')}}" alt="..." class="avatar-img">
                   </a>
                 </div>
                 <div class="card-text my-2">
                   <strong class="card-title my-0">هندسة البرمجيات</strong>
                   <p class="small text-muted mb-0">جامعة الملك سعود</p>
                   <div class="badge badge-light text-muted" style="display: block; white-space: normal;">المملكة العربية السعودية , الرياض</div>
                 </div>
               </div> <!-- ./card-text -->
               <div class="card-footer" style="padding:0.15rem 1.25rem;">
                 <div class="row align-items-center justify-content-between">
                   <div class="col-auto">
                     <small>2021-01-15</small>
                   </div>
                   
                 </div>
               </div> <!-- /.card-footer -->
             </div>
           </div><!-- .col -->
           <div class="col-md-2">
            <div class="card shadow mb-3">
              <div class="card-body text-center" style="padding:0.60rem 1.25rem">
                <div class="avatar avatar-lg mt-4">
                  <a href="">
                    <img src="{{asset('assets/assets/images/ksu_logo.png')}}" alt="..." class="avatar-img">
                  </a>
                </div>
                <div class="card-text my-2">
                  <strong class="card-title my-0">هندسة البرمجيات</strong>
                  <p class="small text-muted mb-0">جامعة الملك سعود</p>
                  <div class="badge badge-light text-muted" style="display: block; white-space: normal;">المملكة العربية السعودية , الرياض</div>
                </div>
              </div> <!-- ./card-text -->
              <div class="card-footer" style="padding:0.15rem 1.25rem;">
                <div class="row align-items-center justify-content-between">
                  <div class="col-auto">
                    <small>2021-01-15</small>
                  </div>
                  
                </div>
              </div> <!-- /.card-footer -->
            </div>
          </div><!-- .col -->
           <!-- .col -->
           <div class="col-md-2">
             <div class="card shadow mb-3">
               <div class="card-body text-center" style="padding:0.60rem 1.25rem">
                 <div class="avatar avatar-lg mt-4">
                   <a href="">
                     <img src="{{asset('assets/assets/images/ksu_logo.png')}}" alt="..." class="avatar-img">
                   </a>
                 </div>
                 <div class="card-text my-2">
                   <strong class="card-title my-0">هندسة البرمجيات</strong>
                   <p class="small text-muted mb-0">جامعة الملك سعود</p>
                   <div class="badge badge-light text-muted" style="display: block; white-space: normal;">المملكة العربية السعودية , الرياض</div>
                 </div>
               </div> <!-- ./card-text -->
               <div class="card-footer" style="padding:0.15rem 1.25rem;">
                 <div class="row align-items-center justify-content-between">
                   <div class="col-auto">
                     <small>2021-01-15</small>
                   </div>
                   
                 </div>
               </div> <!-- /.card-footer -->
             </div>
           </div>

           <div class="col-md-2">
             <div class="card shadow mb-3">
               <div class="card-body text-center" style="padding:0.60rem 1.25rem">
                 <div class="avatar avatar-lg mt-4">
                   <a href="">
                     <img src="{{asset('assets/assets/images/ksu_logo.png')}}" alt="..." class="avatar-img">
                   </a>
                 </div>
                 <div class="card-text my-2">
                   <strong class="card-title my-0">هندسة البرمجيات</strong>
                   <p class="small text-muted mb-0">جامعة الملك سعود</p>
                   <div class="badge badge-light text-muted" style="display: block; white-space: normal;">المملكة العربية السعودية , الرياض</div>
                 </div>
               </div> <!-- ./card-text -->
               <div class="card-footer" style="padding:0.15rem 1.25rem;">
                 <div class="row align-items-center justify-content-between">
                   <div class="col-auto">
                     <small>2021-01-15</small>
                     <button type="button" style="background-color: transparent;background-repeat: no-repeat;border: none;cursor: pointer;overflow: hidden;outline: none;"
                      onclick='editAction("1","testtest")' data-toggle='modal' data-target='#editModal'>
                      <i class="fe fe-edit fe-16" style="color:orange"></i>
                     </button>
                     <button type="button" style="background-color: transparent;background-repeat: no-repeat;border: none;cursor: pointer;overflow: hidden;outline: none;"
                      onclick='deleteAction("1")' data-toggle='modal' data-target='#confirmDeleteModal'>
                      <i class="fe fe-trash fe-16" style="color:red"></i>
                     </button>
                   </div>
                   
                 </div>
               </div> <!-- /.card-footer -->
             </div>
           </div>

           <div class="col-md-2">
            <div class="card shadow mb-3">
              <div class="card-body text-center" style="padding:0.60rem 1.25rem">
                <div class="avatar avatar-lg mt-4">
                  <i class="fe fe-plus-circle fe-55 text-success"></i>
                </div>
                <div class="card-text my-2">
                  <button type="button" class="btn mb-2 btn-success add_button" onclick='addAction("testtest")' data-toggle='modal' data-target='#addModal'></button>
                </div>
              </div> <!-- ./card-text -->

            </div>
           </div>

         </div>
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