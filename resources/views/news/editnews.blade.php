@if ( Auth::user()->role  === 'admin' || Auth::user()->role === 'manager' || Auth::user()->role === 'writer')
@extends('master')

@section('titleclass')
  editnews_title
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
            <h2 class="page-title mb-4 editnews_title"></h2>
          </div>
          <form action="{{ route('UpdateNews', ['id' => $news->id])}}" method="post">
            @csrf
            @method('PUT')
            <div class="card shadow mb-4">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group mb-3">
                      <h5><label for="simpleinput" class="newstitle_form"></label></h5>
                      <input type="text" id="newstitle" class="form-control" value="{{$news->title}}">
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
                      <input type="radio" id="customRadio1" name="image" class="custom-control-input imageinput" value="keepimage">
                      <label class="custom-control-label keepimage_radio" for="customRadio1"></label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input type="radio" id="customRadio2" name="image" class="custom-control-input imageinput" >
                      <label class="custom-control-label newimage_radio" for="customRadio2"></label>
                      <div class="mb-3">
                        <input type="file" id="file_input" class="form-control-file" name="file">
                      </div>
                    </div>
                    <div class="custom-control custom-radio">
                      <input type="radio" id="customRadio3" name="image" class="custom-control-input imageinput" value="noimage">
                      <label class="custom-control-label noimage_radio" for="customRadio3"></label>
                    </div>
                  </div>
                </div> <!-- /.col -->
              </div>
            </div>
          </div>
          <a href="{{ url('/managenews') }}" class="btn mb-2 btn-danger btn-lg cancel_button"></a>
          <button type="submit" class="btn mb-2 btn-warning btn-lg edit_button"></button>
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

    //NewsRetrieved = "{{$news->text}}".replace(/&quot;/ig,'"');

    newsstring = '{!! $news->text !!}'.replace(/\n/g, '\\n');

    originalNews = JSON.parse(newsstring);

    quill.setContents(originalNews);

    var imageNews = '{{$news->image}}';

    if(!imageNews)
    {
      document.getElementById('customRadio2').checked = true;
      document.getElementById('customRadio1').disabled = true;
    }else{
      document.getElementById('customRadio1').checked = true;
    }

    var form = document.querySelector('form');
    form.onsubmit = function() {
      event.preventDefault();
      var newstitle = $('#newstitle').val();
      var newstext = JSON.stringify(quill.getContents());
      var newsimage = null;

      if($('[name="image"]:checked').val() !== 'noimage' && $('[name="image"]:checked').val() !== 'keepimage'){
        newsimage = document.getElementById('file_input');
      }else {
        newsimage = $('[name="image"]:checked').val();
      }

      var formData = new FormData();

      formData.append('newstext', newstext);
      formData.append('newstitle', newstitle);

      if($('[name="image"]:checked').val() !== 'noimage' && $('[name="image"]:checked').val() !== 'keepimage'){
        formData.append('newsimage', newsimage.files[0]);
      }else {
        formData.append('newsimage', newsimage);
      }
      
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
            location.href = "{{ url('/managenews') }}"
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
