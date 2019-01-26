<!-- Preloader -->
    <div class="mask"><div id="loader"></div></div>
    <!--/Preloader -->

    <!-- Wrap all page content here -->
    <div id="wrap">


      <!-- Make page fluid -->
      <div class="row">

<!-- Fixed navbar -->
        <div class="navbar navbar-default navbar-fixed-top" role="navigation">
          


          <!-- Branding -->
          <div class="navbar-header col-md-2">
            <a class="navbar-brand" href="index.html">
              <strong>TYR</strong> <span class="divider vertical"></span> ION
            </a>
            <div class="sidebar-collapse">
              <a href="#">
                <i class="fa fa-bars"></i>
              </a>
            </div>
          </div>
          <!-- Branding end -->


          <!-- .nav-collapse -->
          <div class="navbar-collapse">
            

            

            <!-- Content collapsing at 768px to sidebar -->
            <div class="collapsing-content">


              <!-- Search -->
              <div class="search">
                <input type="text" placeholder="&#61442; Search in form elements...">
              </div>
              <!-- Search end -->


            </div>
            <!-- /Content collapsing at 768px to sidebar -->



            <!-- Sidebar -->
            <ul class="nav navbar-nav side-nav" id="navigation">
              <li class="collapsed-content">
                <!-- Collapsed content pasting here at 768px -->
              </li>
              <li class="user-status status-online" id="user-status">
                <div class="profile-photo">
                  <img src="{{ asset('images/profile-photo.jpg') }}" alt />
                </div>
                <div class="user">
                  {{ Auth::user()->name }}
                  
                </div>
              </li>
              
              <li>
                <a href="{{ route('email.compose') }}" title="Compose Email">
                  <i class="fa fa-edit">
                    <span class="overlay-label green"></span>
                  </i>
                  Compose Email
                </a>
              </li>

              <li {!! $page == 'dashboard' ? 'class = "active" ' : '' !!}>
                <a href="{{ route('dashboard') }}" title="Dashboard">
                  <i class="fa fa-dashboard">
                    <span class="overlay-label orange"></span>
                  </i>
                  Dashboard
                </a>
              </li>

              <li {!! $page == 'users' ? 'class = "active" ' : '' !!}>
                <a href="{{ route('users') }}"  title="Users & Groups">
                  <i class="fa fa-group">
                    <span class="overlay-label green"></span>
                  </i>
                  <b>Users & Groups</b>
                </a>
                
              </li>

              <li {!! $page == 'templates' ? 'class = "active" ' : '' !!}>
                <a href="{{ route('templates') }}"  title="Templates">
                  <i class="fa fa-paperclip">
                    <span class="overlay-label orange"></span>
                  </i>
                  <b>Templates</b>
                </a>
                
              </li>
              
              <li {!! $page == 'profiles' ? 'class = "active" ' : '' !!}>
                <a href="{{ route('profiles') }}"  title="Profiles">
                  <i class="fa fa-cogs">
                    <span class="overlay-label green"></span>
                  </i>
                  <b>Profiles</b>
                </a>
                
              </li>

              <li>
                <a href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"  title="Logout">
                  <i class="fa fa-sign-out">
                    <span class="overlay-label orange"></span>
                  </i>
                  <b>Logout</b>
                </a>

                <form action="{{ route('logout') }}" method="post" class="form-inline" id = "logout-form">
                  {{ csrf_field() }}
                </form>
                
              </li>


            </ul>
            <!-- Sidebar end -->





          </div>
          <!--/.nav-collapse -->





        </div>
        <!-- Fixed navbar end -->