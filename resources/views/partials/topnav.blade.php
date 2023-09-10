<nav class="topnav navbar navbar-light">
    <button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar">
      <i class="fe fe-menu navbar-toggler-icon"></i>
    </button>
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link text-muted my-2" href="#" data-mode="dark" style="padding:8px 0px">
          <div class="custom-control custom-switch">
            <label class="" for="customSwitches" id="switcherbutton" style="display: flex;align-items: center;">
              <div class="currentLang font-weight-bold">عربي</div>
              /
              <div class="currentLang font-weight-bold">EN</div>
            </label>
          </div>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link text-muted my-2" href="#" id="modeSwitcher" data-mode="dark" style="padding-top: 8px;padding-bottom: 8px;padding-right:0px;padding-left: 22px;">
          <i class="fe fe-sun fe-16"></i>
        </a>
      </li>
      <!--
      <li class="nav-item nav-notif">
        <a class="nav-link text-muted my-2" href="./#" data-toggle="modal" data-target=".modal-notif">
          <span class="fe fe-bell fe-16"></span>
          <span class="dot dot-md bg-success"></span>
        </a>
      </li>
      -->

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-muted pr-0" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="circle circle-lg bg-light" style="width: 32px; height: 32px; vertical-align: middle;">
            <i class="fe fe-user text-primary" style="font-size:20px;"></i>
          </span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item logout_button" href="{{ route('logout') }}"></a>
        </div>
      </li>
    </ul>
  </nav>