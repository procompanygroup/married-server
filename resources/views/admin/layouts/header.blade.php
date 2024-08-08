<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
      <!-- Navbar -->
      <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
          
        </ul>
    
        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
          
          
        
          <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
              <img src="{{auth()->user()->image_path}}" class="user-image img-circle elevation-2" alt="User Image">
              <span class="d-none d-md-inline">{{auth()->user()->name}}</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <!-- User image -->
              <li class="user-header bg-primary">
                <img src="{{auth()->user()->image_path}}" class="img-circle elevation-2" alt="User Image">
    
                <p>
                    {{auth()->user()->full_name}}
                  <small>{{auth()->user()->role}}</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
               
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <a href="{{route('user.editprofile',auth()->user()->id)}}" class="btn btn-default btn-flat">الملف الشخصي</a>
              
                <form method="POST" action="{{ route('logout') }}" class="btn btn-default btn-flat float-right">
                    @csrf
                    <a href="{{route('logout')}}"  onclick="event.preventDefault();  this.closest('form').submit();" >تسجيل خروج</a>
            </form>

              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
              <i class="fas fa-expand-arrows-alt"></i>
            </a>
          </li>
        
        </ul>
      </nav>
      <!-- /.navbar -->