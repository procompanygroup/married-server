     <body dir="rtl">

         <!--  الرئيسية   -->

         <nav class="navbar navbar-expand-lg navbar-light   main-navbar  fixed-top " id="main-fix">

             <div class="container">
                 <button class="navbar-toggler" type="button" id="menu-toggle">
                     <span class="navbar-toggler-icon"></span>
                 </button>
                 <a class="navbar-brand" href="{{ url('/') }}">
                     <img src="{{ $mainarr['logo'] }}" alt="Logo" class="logo">
                 </a>

                 <div class="collapse navbar-collapse justify-content-center">
                     <ul class="navbar-nav">


                         <!-- باقي العناصر -->
                         <li class="nav-item">
                             <a class="nav-link" href="{{ route('site.home') }}"><i class="bi bi-house"></i>
                                 الرئيسية</a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link" href="{{ url($lang . '/members', 'online') }}"><i
                                     class="bi bi-people"></i> المتواجدون الآن</a>
                         </li>

                         <li class="nav-item">
                             <a class="nav-link" href="{{ url($lang . '/members', 'new') }}"> <i class="bi bi-star"></i>
                                 أعضاء جدد</a>
                         </li>


                         <li class="nav-item">
                             <a class="nav-link" href="{{ url($lang . '/members', 'health-cases') }}"><i
                                     class="bi bi-heart"></i> الحالات الصحية</a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link" href="#"><i class="bi bi-heart"></i> قصص النجاح </a>
                         </li>
                     </ul>
                     <div class="sign">
                         @if (Auth::guard('client')->check())
                             @if (auth()->guard('client')->user()->code)
                                 <a class=" a-menu" href="{{ route('verify.index') }}">
                                     تأكيد الحساب
                                 </a>
                             @else
                                 <a class=" a-menu" href="{{ url($lang, 'befor-reg') }}">
                                     اشتراك
                                 </a>
                                 <a class=" a-menu" href="{{ route('login.client', $lang) }}">
                                     تسجيل دخول
                                 </a>
                             @endif
                         @else
                             <a class=" a-menu" href="{{ url($lang, 'befor-reg') }}">
                                 اشتراك
                             </a>
                             <a class=" a-menu" href="{{ route('login.client', $lang) }}">
                                 تسجيل دخول
                             </a>
                         @endif
                     </div>
                 </div>
             </div>




         </nav>
         <div id="sidebar" class="sidebar">
             <button class="btn-close" id="close-sidebar"><i class="fa fa-times"></i></button>

             <ul class="navbar-nav">


                 <!-- باقي العناصر -->
                 <li class="nav-item">
                     <a class="nav-link" href="{{ route('site.home') }}"><i class="bi bi-people"></i>الرئيسية</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="{{ url($lang . '/members', 'online') }}"><i class="bi bi-people"></i>
                         المتواجدون الآن</a>
                 </li>

                 <li class="nav-item">
                     <a class="nav-link" href="{{ url($lang . '/members', 'new') }}"> <i class="bi bi-star"></i> أعضاء
                         جدد</a>
                 </li>


                 <li class="nav-item">
                     <a class="nav-link" href="{{ url($lang . '/members', 'health-cases') }}"><i
                             class="bi bi-heart"></i>
                         الحالات الصحية</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="#"><i class="bi bi-heart"></i> قصص النجاح </a>
                 </li>
                 <li class="nav-item sign-sm">
                     <a class="nav-link" href="{{ url($lang, 'befor-reg') }}"> اشتراك</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="{{ route('login.client', $lang) }}"> تسجيل دخول </a>
                 </li>
             </ul>


         </div>
