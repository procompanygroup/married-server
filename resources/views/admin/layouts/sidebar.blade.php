  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin') }}" class="brand-link">
      <img src="{{$mainarr['logo']}}" alt="{{$mainarr['title']}}" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">{{$mainarr['title']}}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{auth()->user()->image_path}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{route('user.editprofile',auth()->user()->id)}}" class="d-block">{{auth()->user()->full_name}}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
               <li class="nav-item  ">
                <a href="#" class="nav-link ">                   
                  <i class="nav-icon fa fa-users" aria-hidden="true"  ></i>
                  <p>
                    المدراء
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href= "{{ route('user.index') }}" class="nav-link ">
                      <i class="far fa fa-list-alt nav-icon"></i>
                      <p>عرض</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('user.create')}}" class="nav-link">
                      <i class="far fa fa-plus-square nav-icon"></i>
                      <p>اضافة</p>
                    </a>
                  </li>
                 
                </ul>
              </li>
              <li class="nav-item  ">
                <a href="#" class="nav-link ">                   
                  <i class="nav-icon far fa fa-language" aria-hidden="true"  ></i>
                  <p>
                    اللغة
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href= "{{ route('language.index') }}" class="nav-link ">
                      <i class="far fa fa-list-alt nav-icon"></i>
                      <p>عرض</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('language.create')}}" class="nav-link">
                      <i class="far fa fa-plus-square nav-icon"></i>
                      <p>اضافة</p>
                    </a>
                  </li>
                 
                </ul>
              </li>
         
              <li class="nav-item  ">
                <a href="#" class="nav-link ">                   
                  <i class="nav-icon far fa fa-cog" aria-hidden="true"  ></i>
                  <p>
                    الاعدادات العامة
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href= "{{url('admin/setting/siteinfo')}}" class="nav-link ">
                      <i class="far fa fa-list-alt nav-icon"></i>
                      <p>معلومات الموقع</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href= "{{url('admin/setting/head')}}" class="nav-link ">
                      <i class="far fa fa-list-alt nav-icon"></i>
                      <p>HEADER</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href= "{{url('admin/setting/footer')}}" class="nav-link ">
                      <i class="far fa fa-list-alt nav-icon"></i>
                      <p>FOOTER</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('admin/setting/translate')}}" class="nav-link">
                      <i class="nav-icon far fa fa-language" aria-hidden="true"  ></i>
                      <p>الترجمة</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('reportoption.index')}}" class="nav-link">
                      <i class="nav-icon far fa fa-flag" aria-hidden="true"  ></i>
                      <p>خيارات الابلاغ</p>
                    </a>
                  </li>
                </ul>
              </li>
          

              <li class="nav-item  ">
                <a href="{{url('admin/page')}}"  class="nav-link ">                   
                  <i class="nav-icon fas fa-book"></i></i>
                  <p>
                     الصفحات الثابتة
                     
                  </p>
                </a>                 
              </li>
              <li class="nav-item  ">
                <a href="#" class="nav-link ">                   
                  <i class="nav-icon far fa fa-user" aria-hidden="true"  ></i>
                  <p>
                    الاعضاء
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href= "{{url('admin/client')}}" class="nav-link ">
                      <i class="far fa fa-list-alt nav-icon"></i>
                      <p>عرض</p>
                    </a>
                  </li>
                  
                 
                </ul>
              </li>
              <li class="nav-item  ">
                <a href="#" class="nav-link ">                   
                  <i class="nav-icon far fa fa-user" aria-hidden="true"  ></i>
                  <p>
                    المواصفات
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href= "{{url('admin/propdep')}}" class="nav-link ">
                      <i class="far fa fa-list-alt nav-icon"></i>
                      <p>المجموعات</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href= "{{url('admin/property')}}" class="nav-link ">
                      <i class="far fa fa-list-alt nav-icon"></i>
                      <p>الخصائص</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href= "{{url('admin/option')}}" class="nav-link ">
                      <i class="far fa fa-list-alt nav-icon"></i>
                      <p>القيم</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href= "{{url('admin/ai/property')}}" class="nav-link ">
                      <i class="far fa fa-list-alt nav-icon"></i>
                      <p>البحث الالي</p>
                    </a>
                  </li>
                 
                </ul>
              </li>
              <li class="nav-item  ">
                <a href="#" class="nav-link ">                   
                  <i class="nav-icon far fa fa-user" aria-hidden="true"  ></i>
                  <p>
                    الباقات
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href= "{{route('package.index')}}" class="nav-link ">
                      <i class="far fa fa-list-alt nav-icon"></i>
                      <p>جميع الباقات</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href= "{{route('package.index')}}" class="nav-link ">
                      <i class="far fa fa-list-alt nav-icon"></i>
                      <p> المشتركين</p>
                    </a>
                  </li>
                 
                </ul>
              </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
