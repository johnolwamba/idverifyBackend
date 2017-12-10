<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">IDVERIFY</a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href=""><i class="fa fa-user fa-fw"></i> User Profile</a>
                </li>
                <li class="divider"></li>
                <li><a href="{{ route('logout') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li>
                    <a href="{{ route('home') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                </li>
                <li class="active">
                    <a href="{{ route('students') }}"><i class="fa fa-user-md fa-fw"></i> Students</a>
                </li>
                @can('view-staff')
                 <li>
                    <a href="{{ route('staff') }}"><i class="fa fa-users fa-fw"></i> Staff</a>
                </li>
                @endcan
                <li>
                    <a href="{{ route('blocked-students') }}"><i class="fa fa-lock fa-fw"></i> Blocked Students</a>
                </li>
                <li>
                    <a href="{{ route('gates') }}"><i class="fa fa-gear fa-fw"></i> Gates</a>
                </li>
                <li>
                    <a href="{{ route('scans') }}"><i class="fa fa-mobile-phone fa-fw"></i> Scans</a>
                </li>
                @can('view-reports')
                <li>
                    <a href="{{ route('reports') }}"><i class="fa fa-bar-chart-o fa-fw"></i> Reports</a>
                </li>
                <li>
                    <a href="{{ route('analytics') }}"><i class="fa fa-bar-chart-o fa-fw"></i> Analytics</a>
                </li>
                 @endcan
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>