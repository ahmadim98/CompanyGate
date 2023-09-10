@extends('master')

@section('titleclass')
    news_nav
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
                <h2 class='h5 page-title news_nav'></h2>
                </div>
            </div>
            <!-- .row -->
            <div class="row align-items-center mb-3" style="padding-top: 20px;">
                <!-- Log -->
                <div class="col-md-12 mb-4">
                <div class="card shadow">
                    <div class="card-body">
                    <div class="toolbar">
                        <form class="form">
                        <div class="form-row">
                            <div class="form-group col-auto mr-auto">
                            <label class="my-1 mr-2 sr-only" for="inlineFormCustomSelectPref1">Show</label>
                            <select class="custom-select mr-sm-2" id="inlineFormCustomSelectPref1" style="display:none">
                                <option value="">...</option>
                                <option value="1" selected="">10</option>
                                <option value="2" >15</option>
                                <option value="3">20</option>
                            </select>
                            </div>
                            <div class="form-group col-auto">
                            <label for="search" class="sr-only">Search</label>
                            <input type="text" class="form-control" id="search1" value="" placeholder="">
                            </div>
                        </div>
                        </form>
                    </div>
                    <div class="list-group list-group-flush my-n3" id="news_space">
                    </div> <!-- / .list-group -->
                    </div> <nav aria-label="Table Paging" class="mb-0 text-muted my-2">
                        <ul class="pagination justify-content-center mb-0">
                        <li class="page-item"><a class="page-link previous_button" href="#previous" style="border-top-right-radius: 0rem;border-bottom-right-radius: 0rem;"></a></li>
                        <div style="display:flex;" id="pagesList">
                        </div>
                        <li class="page-item"><a class="page-link next_button" href="#next" style="border-top-left-radius: 0rem;border-bottom-left-radius: 0rem;"></a></li>
                        </ul>
                    </nav><!-- / .card-body -->
                </div> <!-- / .card -->
                </div> <!-- / .col -->
            </div>
            </div> <!-- .col-12 -->
        </div> <!-- .row -->
        </div> <!-- .container-fluid -->
    </main> <!-- main -->

@endsection

@section('javascript')
    <script src="{{asset('assets/js/news.js')}}"></script>
@endsection