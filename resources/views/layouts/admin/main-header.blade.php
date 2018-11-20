<header class="main-header">

        <!-- Logo -->
        <a href="{{ url('/admin') }}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>LP</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Laravel Passport</b></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
           {{--
            <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-user-o"></i>
                <span class="hidden-xs">{{ Auth::user()->first_name ." ". Auth::user()->last_name  }}</span>
                </a>
                <ul class="dropdown-menu">
                <!-- User image -->

                <li class="user-header">
                        <i class="fa fa-user-o fa-5x"></i>
                        <p>
                        {{ Auth::user()->first_name ." ". Auth::user()->last_name  }}
                        <small>Member since  {{  date("d-m-Y", strtotime(Auth::user()->created_at) )   }}</small>
                        </p>
                    </li>
                    <!-- Menu Footer-->
                    <li class="user-footer">
                        <div class="pull-left">

                        </div>
                        <div class="pull-right">
                        <a href="{{url('/logout')}}" class="btn btn-default btn-flat">Sign out</a>
                        </div>
                    </li>
                </ul>
            </li>
              --}}
            <!-- Control Sidebar Toggle Button -->
            </ul>
        </div>

        </nav>
    </header>
