@if ( Auth::user()->role  === 'admin' || Auth::user()->role === 'manager' || Auth::user()->role === 'writer')
@extends('master')

@section('titleclass')
    addnews_title
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('assets/css/quill.snow.css')}}">
@endsection

@section('pagecontent')
<main role="main" class="main-content">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-12">
          <div class="w-50 mx-auto text-center justify-content-center">
            <h2 class="page-title mb-4 addnews_title"></h2>
          </div>
          <form action="{{ route('AddNews') }}" method="post" enctype="multipart/form-data">
            <div class="card shadow mb-4">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group mb-3">
                      <h5><label for="simpleinput" class="newstitle_form"></label></h5>
                      <input type="text" id="newstitle" class="form-control">
                    </div>
                  </div> <!-- /.col -->
                </div>
              </div>
            </div>
           <!-- .row -->
           <div class="row mb-4">
            <div class="col-md-12">
              <div class="card shadow">
                <div class="card-body">
                  <h5 class="card-title newstext_form"></h5>
                  <!-- Create the editor container -->
                  <div id="editor-container" style="min-height:100px;">
                  </div>
                </div>
              </div>
            </div>
          </div> <!-- end section -->

          <div class="card shadow mb-4">
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group mb-3">
                    <h5><label for="simpleinput" class="newsimage_form"></label></h5>
                    <div class="custom-control custom-radio">
                      <input type="radio" id="customRadio1" name="image" class="custom-control-input"  checked="">
                      <label class="custom-control-label image_input" for="customRadio1"></label>
                      <div class="mb-3">
                        <input type="file" id="file_input" class="form-control-file" name="file">
                      </div>
                    </div>
                    <div class="custom-control custom-radio">
                      <input type="radio" id="customRadio2" name="image" class="custom-control-input" value="noimage">
                      <label class="custom-control-label noimage_input" for="customRadio2"></label>
                    </div>
                  </div>
                </div> <!-- /.col -->
              </div>
            </div>
          </div>

          <a href="{{ url('/managenews') }}" class="btn mb-2 btn-danger btn-lg cancel_button"></a>
          <button type="submit" class="btn mb-2 btn-success btn-lg add_button"></button>
        </div> <!-- .col-12 -->
      </form>
      </div> <!-- .row -->
    </div> <!-- .container-fluid -->
  </main> <!-- main -->
@endsection

@section('javascript')
  <script src="{{asset('assets/js/quill.min.js')}}"></script>
  
  <script>
    var editor = document.getElementById('editor-container');
    var toolbarOptions = [[{'font': []}],[{'header': [1, 2, 3, 4, 5, 6, false]}],
          ['bold', 'italic', 'underline', 'strike'],['blockquote', 'code-block'],[{'header': 1},{'header': 2}],
          [{'list': 'ordered'},{'list': 'bullet'}],[{'script': 'sub'},{'script': 'super'}],
          [{'indent': '-1'},{'indent': '+1'}],
          [{'direction': 'rtl'}],
          [{'color': []},{'background': []}],
          [{'align': []}],
          ['clean']];
    var quill = new Quill(editor,
    {
      modules:
      {
        toolbar: toolbarOptions
      },
      theme: 'snow'
    });
      
    $('[name="image"]').on('change', function() {
      $("#file_input").val(null);
    });

    var form = document.querySelector('form');
    form.onsubmit = function() {
      event.preventDefault();
      var newstitle = $('#newstitle').val();
      var newstext = JSON.stringify(quill.getContents());
      var newsimage = null;

      if($('[name="image"]').val() !== 'noimage'){
        newsimage = document.getElementById('file_input');
      }

      var formData = new FormData();

      console.log(newstext);

      formData.append('newstext', newstext);
      formData.append('newstitle', newstitle);
      formData.append('newsimage', newsimage.files[0]);

      var form = $(this);
      var actionUrl = form.attr('action');

      $.ajax({
          type: "POST",
          url: actionUrl,
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
          success: function(data)
          {
            console.log("success");// show response from the php script.
            //console.log(data);
            location.href = "{{ url('/managenews?status=new') }}"
          },
          error: function(xhr, status, error) {
            var err = JSON.parse(xhr.responseText);
            console.log(err);
          },
          
      });
      
      return false;
    };
  </script>

@endsection
@else
  <script type="text/javascript">
    window.location = "{{ url('/') }}";//here double curly bracket
  </script>
@endif