     <body dir="rtl"> 
  
      <!--  الرئيسية   -->
  
      <nav class="navbar navbar-expand-lg navbar-light   main-navbar  fixed-top " id="main-fix">
  
          <div class="container">
              <button class="navbar-toggler" type="button" id="menu-toggle">
                  <span class="navbar-toggler-icon"></span>
              </button>
              <a class="navbar-brand" href="{{ url('/') }}">
                  <img src="{{ $mainarr['logo']}}"  alt="Logo" class="logo">
              </a>
  
              <div class="collapse navbar-collapse justify-content-center">
                  <ul class="navbar-nav">
  
  
                      <!-- باقي العناصر -->
                      <li class="nav-item">
                          <a class="nav-link" href="#"><i class="bi bi-people"></i> المتواجدون الآن</a>
                      </li>
  
                      <li class="nav-item">
                          <a class="nav-link" href="#"> <i class="bi bi-star"></i> أعضاء جدد</a>
                      </li>
  
  
                      <li class="nav-item">
                          <a class="nav-link" href="#"><i class="bi bi-heart"></i> الحالات الصحية</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="#"><i class="bi bi-heart"></i> قصص النجاح </a>
                      </li>
                  </ul>
                  <div class="sign">
                      <a class=" a-menu" href="{{ url($lang,'befor-reg') }}">
                          اشتراك
                      </a>
                      <a class=" a-menu" href="{{ route('login.client',$lang) }}">
                          تسجيل دخول
                      </a>
                  </div>
              </div>
          </div>
  
  
  
  
      </nav>
      <div id="sidebar" class="sidebar">
          <button class="btn-close" id="close-sidebar"><i class="fa fa-times"></i></button>
  
          <ul class="navbar-nav">
  
  
              <!-- باقي العناصر -->
              <li class="nav-item">
                  <a class="nav-link" href="#"><i class="bi bi-people"></i> المتواجدون الآن</a>
              </li>
  
              <li class="nav-item">
                  <a class="nav-link" href="#"> <i class="bi bi-star"></i> أعضاء جدد</a>
              </li>
  
  
              <li class="nav-item">
                  <a class="nav-link" href="#"><i class="bi bi-heart"></i> الحالات الصحية</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="#"><i class="bi bi-heart"></i> قصص النجاح </a>
              </li>
              <li class="nav-item sign-sm">
                  <a class="nav-link" href="#"> اشتراك</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('login.client',$lang) }}"> تسجيل دخول </a>
              </li>
          </ul>
  
  
      </div>
  
