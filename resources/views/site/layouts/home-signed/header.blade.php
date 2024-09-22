<body dir="rtl">
    <!-- القائمة العلوية -->
    <nav class="navbar navbar-expand-lg navbar-light  top-menu-content " id="top-navbar">
        <div class="user-menu  ">
            <div class="dropdown show">
                <a class="a-menu" href="#" role="button" id="dropdownMenuLink"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="{{ auth()->guard('client')->user()->image_path }}" alt="User Image" class="user-image rounded-circle">
                </a>
                <div class="dropdown-menu text-right" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item"   href="{{ route('client.account',$lang) }}"><i class="bi bi-person"></i> الملف الشخصي </a>
                    <a class="dropdown-item"   href="{{  url($lang,'setting') }}"><i class="bi bi-gear"></i> إعداداتي </a>
                    <a class="dropdown-item"   href="{{  route('client.edit_image',$lang) }}"><i class="bi bi-gear"></i>صورتي</a>
                    <form method="POST" action="{{ route('logout.client') }}"  >
                        @csrf
                        <a class="dropdown-item"  onclick="event.preventDefault();this.closest('form').submit();" href="#"><i class="bi bi-box-arrow-right"></i> تسجيل خروج</a>
 
                </form> 
               
                    
                </div>
            </div>
        </div>
    </nav>
    <!--  الرئيسية في  -->

    <nav class="navbar navbar-expand-lg navbar-light   main-navbar " id="main-fix">
        <div class="container">

            <button class="navbar-toggler" type="button" id="menu-toggle">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#">
                <img src="{{ $mainarr['logo']}}" alt="Logo" class="logo">
            </a>
            <div class="collapse navbar-collapse justify-content-center">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('site.home') }}"><i class="bi bi-house"></i> الرئيسية</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url($lang,'search') }}"><i class="bi bi-search"></i>البحث</a>
                    </li>
                    <!-- باقي العناصر -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url($lang.'/members','online') }}"><i class="bi bi-people"></i> المتواجدون الآن</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url($lang.'/members','new') }}"> <i class="bi bi-star"></i> أعضاء جدد</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url($lang.'/members','special') }}"> <i class="bi bi-award"></i> الأعضاء المتميزين</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url($lang.'/members','health-cases') }}"><i class="bi bi-heart"></i> الحالات الصحية</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <div id="sidebar" class="sidebar">
        <button class="btn-close" id="close-sidebar"><i class="fa fa-times"></i></button>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('site.home') }}"><i class="bi bi-house"></i> الرئيسية</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url($lang,'search') }}"><i class="bi bi-search"></i> البحث عن أعضاء</a>
            </li>
            <!-- باقي العناصر -->
            <li class="nav-item">
                <a class="nav-link" href="{{ url($lang.'/members','online') }}"><i class="bi bi-people"></i> المتواجدون الآن</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url($lang.'/members','new') }}"><i class="bi bi-star"></i> أعضاء جدد</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"> <i class="bi bi-award"></i> الأعضاء المتميزين</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url($lang.'/members','health-cases') }}"><i class="bi bi-heart"></i> الحالات الصحية</a>
            </li>
        </ul>
    </div>

 