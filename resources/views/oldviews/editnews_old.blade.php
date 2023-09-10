@if ( Auth::user()->role  === 'admin' || Auth::user()->role === 'manager' || Auth::user()->role === 'writer')
@extends('master')

@section('titleclass')
  editnews_title
@endsection

@section('css')

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
          <a href="{{ url('/managenews') }}" class="btn mb-2 btn-danger btn-lg cancel_button"></a>
          <button type="submit" class="btn mb-2 btn-warning btn-lg edit_button"></button>
        </div> <!-- .col-12 -->
      </form>
      </div> <!-- .row -->
    </div> <!-- .container-fluid -->
  </main> <!-- main -->
@endsection

@section('javascript')
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

    newsstring = '{!! $news->text !!}'.replace(/\s/g, '');

    originalNews = JSON.parse(newsstring);

    quill.setContents(originalNews);

    var form = document.querySelector('form');
    form.onsubmit = function() {
      var newstitle = $('#newstitle').val();
      var newstext = quill.getContents();
      
      console.log(newstext);
      console.log(newstitle);

      var finaldata = JSON.parse(JSON.stringify({newstitle,newstext}));
      
      var form = $(this);
      var actionUrl = form.attr('action');

      console.log(finaldata);

      $.ajax({
          type: "PUT",
          url: actionUrl,
          data: finaldata,
          success: function(data)
          {
            console.log("success");// show response from the php script.
            //console.log(data);
            location.href = "{{ url('/managenews') }}"
          }
      });
      
      return true;
    };

  </script>
@endsection
@else
  <script type="text/javascript">
    window.location = "{{ url('/') }}";//here double curly bracket
  </script>
@endif
