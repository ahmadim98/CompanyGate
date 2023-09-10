@extends('master')

@section('titleclass')
@endsection

@section('titletext')
{{ $news->title }}
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('assets/css/quill.snow.css')}}">
@endsection

@section('pagecontent')
<main role="main" class="main-content">
    <div class="container-fluid">
      @if(!is_null($news->image))
      <img src="{{asset('storage/news_images/'.$news->image.'')}}" alt="news image" style=" display: block;
      max-width:600px;
      width: auto;
      margin-left: auto;
  margin-right: auto;
      margin-bottom:22px;">
      @endif

      <div class="row justify-content-center">
        <div class="col-12">
          <div class="row align-items-center mb-2">
            <div class="col" >
              <h5 class='h5 page-title' style="font-size:45px">{{ $news->title }}</h5>
            </div>
          </div>
        </div>
      </div>
      <div>
        <p style="font-size:20px;border-radius: 2px;border: 1px solid rgb(206 212 218 / 4%);" id="news_text"></p>
      </div>
       <div class="card mb-6" >
        <p style="text-align:left;margin-bottom:0px;">
          {{ $news->created_at }}
          <span style="float:right;">
            كتب من قبل : {{ $news->userid}}
          </span>
        </p>
       </div>
    </div> <!-- .container-fluid -->
  </main> <!-- main -->
@endsection

@section('javascript')
  <script src="{{asset('assets/js/quill.min.js')}}"></script>
  <script>
    var quill = new Quill('#news_text', {
      modules: {
        toolbar: false
      },
      //theme: 'snow'
    });

    quill.disable()

    var newsstring = '{!! $news->text !!}'.replace(/\n/g, '\\n');

    news = JSON.parse(newsstring);

    quill.setContents(news);
  </script>
@endsection