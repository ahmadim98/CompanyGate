@extends('master')

@section('titleclass')
    dashboard_nav
@endsection

@section('css')

@endsection

@section('pagecontent')

<main role="main" class="main-content">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-12">
          <div class="row align-items-center mb-2">
            <div class="col" >
              <h2 class='h5 page-title dashboard_nav'></h2>
            </div>
            <div class="col-auto">
              <form class="form-inline">
                <div class="form-group d-none d-lg-inline">
                  <label for="reportrange" class="sr-only">Date Ranges</label>
                  <div id="reportrange" class="px-2 py-2 text-muted">
                    <span class="small">June 1, 2022 - June 30, 2022</span>
                  </div>
                </div>
                <div class="form-group">
                  <button type="button" class="btn btn-sm"><span class="fe fe-refresh-ccw fe-16 text-muted"></span></button>
                </div>
              </form>
            </div>
          </div>
          
           <!-- .row -->
          <div class="row">
            <!-- Recent Activity -->
            <div class="col-md-12 col-lg-3" style="height:340px;">
              <div class="card shadow eq-card mb-4">
                <div class="card-body">
                    <div class="col-12 mb-4 text-center">
<span class="circle circle-lg bg-light" style="width: 120px; height: 120px;">
                        <i class="fe fe-user fe-55 text-primary"></i>
                      </span>
</div>
                  
                  <div class="row items-align-center">
                    
                    <div class="col-12 text-center">
                      <p class="text-muted mb-2">المعلومات الشخصية</p>
                      <h6 class="mb-3">{{$employer->name}}</h6>
                      
                    <h6 class="mb-3">{{$employer->position}}</h6><h6 class="mb-1">{{$employer->department}}</h6></div>
                    
                  </div>
                </div> <!-- .card-body -->
              </div> <!-- .card -->
            </div>
         <!-- / .col-md-6 -->
            <!-- Striped rows -->
            <div class="col-md-12 col-lg-9">
              <div class="card shadow">
                <div class="card-header" style="padding:0.35rem 1.25rem;">
                  <strong class='card-title news_nav'></strong>
                  <a class='float-right small text-muted showall_button' href='{{ url('/news') }}'></a>
                </div>
                <div class="card-body my-n2">
                  <section class="splide" aria-label="News Area" dir="ltr">
                    <div class="splide__track">
                      <ul class="splide__list" style="height:512px;">

                        @foreach ($latest_news as $news)
                          <li class="splide__slide" style="position: relative;">
                            @if(is_null($news->image))
                              <i class="fe fe-tv text-primary" style="font-size:105px;"></i>
                            @else 
                              
                              <img src="{{asset('storage/news_images/'.$news->image.'')}}" alt="news image" style=" display: block;
                              max-width:600px;
                              max-height:337.50px;
                              width: auto;
                              height: auto;">
                            @endif

                            <h3 class="slide_property"><a href="{{ url('/news/'.strval($news->id)) }}">{{$news->title}}....</a></h3>
                          </li>
                        @endforeach
                      </ul>
                    </div>
                  </section>
                </div>
              </div>
            </div> <!-- Striped rows -->
          </div> 
          @php $certifications_decoded = json_decode($certifications,true); @endphp
          @if (count($certifications_decoded) > 0)
          <div class="row align-items-center mb-3" style="padding-top: 20px;">
            <div class="col">
              <h2 class='h5 page-title certifications_and_courses_title'></h2>
            </div>
          </div><!-- .row-->
          @endif
          
        <div class="row">

            @foreach ($certifications_decoded as $certificate)
              <div class="col-md-2">
                <div class="card shadow mb-3">
                  <div class="card-body text-center" style="padding:0.60rem 1.25rem">
                    <div class="avatar avatar-lg mt-4">
                      <a href="">
                        <img src="{{$certificate['logo']}}" alt="..." class="avatar-img">
                      </a>
                    </div>
                    <div class="card-text my-2">
                      <strong class="card-title my-0">{{$certificate['name']}}</strong>
                      <p class="small text-muted mb-0">{{$certificate['institute']}}</p>
                      <div class="badge badge-light text-muted" style="display: block; white-space: normal;">{{$certificate['location']}}</div>
                    </div>
                  </div> <!-- ./card-text -->
                  <div class="card-footer" style="padding:0.15rem 1.25rem;">
                    <div class="row align-items-center justify-content-between">
                      <div class="col-auto">
                        <small>{{$certificate['date']}}</small>
                      </div>
                      
                    </div>
                  </div> <!-- /.card-footer -->
                </div>
              </div><!-- .col -->
            @endforeach

          </div>
        </div> <!-- .col-12 -->
      </div> <!-- .row -->
    </div> <!-- .container-fluid -->
  </main> <!-- main -->

@endsection

@section('javascript')
<script>
  document.addEventListener( 'DOMContentLoaded', function() {
    var splide = new Splide( '.splide' );
    splide.mount();
  } );
</script>
@endsection