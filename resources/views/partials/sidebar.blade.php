<aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
    <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
      <i class="fe fe-x"><span class="sr-only"></span></i>
    </a>
    <nav class="vertnav navbar navbar-light">
      <!-- nav bar -->
      <div class="w-100 d-flex">
        <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="{{ url('/') }}">
          <img src="{{asset('assets/assets/cg_logo2.png')}}" style="width:112px;" />
        </a>
      </div>
      
      <p class="text-muted nav-heading mt-4 mb-1 main_title_nav"></p>
      <ul class="navbar-nav flex-fill w-100 mb-2">
        
        <li class="nav-item w-100">
          <a class="nav-link" href="{{ url('/') }}">
            <span class='sr-only'>(current)</span>
            <i class='fe fe-home fe-16'></i><span class='ml-3 item-text'><div class="dashboard_nav"></div></span>
          </a>
        </li>

        <li class="nav-item w-100">
          <a class="nav-link" href="{{ url('/news') }}">
            <i class='fe fe-tv fe-16'></i><span class='ml-3 item-text'><div class="news_nav"></div></span>
          </a>
        </li>

        <li class="nav-item dropdown">
          <a href="#employers_drop" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
            <i class='fe fe-users fe-16'></i><span class='ml-3 item-text'><div class="employers_nav"></div></span>
          </a>
          <ul class="collapse list-unstyled pl-4 w-100" id="employers_drop">
            <a class="nav-link pl-3" href="{{ url('/employers') }}">
              <span class='ml-1 employers_search_nav'></span>
            </a>
            <a class="nav-link pl-3" href="{{ url('/emonth') }}">
              <span class='ml-1 employers_top_nav'></span>
            </a>
          </ul>
        </li>
        
        <li class="nav-item w-100">
          <a class="nav-link" href="{{ url('/cawards') }}">
            <i class='fe fe-award fe-16'></i><span class='ml-3 item-text company_awards_nav'></span>
          </a>
        </li>

        @if ( Auth::user()->role  === 'admin' || Auth::user()->role === 'manager')
        <li class="nav-item w-100">
          <a class="nav-link" href="{{ url('/statistics') }}" >
            <i class='fe fe-pie-chart fe-16'></i><span class='ml-3 item-text statistics_nav'></span>
          </a>
        </li>
        @endif

      </ul>

      @if ( Auth::user()->role  === 'admin' || Auth::user()->role === 'manager' || Auth::user()->role === 'writer')
      <p class="text-muted nav-heading mt-4 mb-1 communications_title_nav"></p>
      <ul class="navbar-nav flex-fill w-100 mb-2">
        <li class="nav-item w-100">
          <a class="nav-link" href="{{ url('/managenews') }}">
            <i class='fe fe-radio fe-16'></i><span class='ml-3 item-text managenews_nav'></span>
          </a>
        </li>

        <li class="nav-item w-100">
          <a class="nav-link" href="{{ url('managenews/addnews') }}">
            <i class='fe fe-terminal fe-16'></i><span class='ml-3 item-text addnews_nav'></span>
          </a>
        </li>
      </ul>
      @endif


      @if ( Auth::user()->role  === 'admin')
      <p class="text-muted nav-heading mt-4 mb-1" >
        <span class="systemadminstrator_nav"></span>
      </p>
      <ul class="navbar-nav flex-fill w-100 mb-2">
        <li class="nav-item w-100">
          <a class="nav-link" href="{{ url('/manageemployers') }}">
            <i class='fe fe-user fe-16'></i><span class='ml-3 item-text manageemployers_nav'></span>
          </a>
        </li>

        <li class="nav-item w-100">
          <a class="nav-link" href="{{ url('/manageusers') }}">
            <i class='fe fe-user-plus fe-16'></i><span class='ml-3 item-text manageusers_nav'></span>
          </a>
        </li>

        <li class="nav-item w-100">
          <a class="nav-link" href="{{ url('/settings') }}">
            <i class='fe fe-settings fe-16'></i><span class='ml-3 item-text settings_nav'></span>
          </a>
        </li>
      </ul>
      @endif

      
      <div class="btn-box w-100 mt-4 mb-1">
        <a href="{{ url('/support-center') }}" target="_blank" class="btn mb-2 btn-primary btn-lg btn-block">
          <i class='fe fe-phone-call fe-12 mx-2'></i><span class='small helpdesk_button'></span>
        </a>
      </div>
    </nav>
  </aside>