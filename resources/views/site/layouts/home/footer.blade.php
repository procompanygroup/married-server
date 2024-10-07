   @include('site.layouts.home.chat')
   <!-- الفوتر -->
   <footer class=" text-center text-lg-start mt-5">
       <div class="container p-4">
           <div class="row">
            <div class="col-lg-3 col-md-6 mb-3  text-dark">
                <h5 class="text-uppercase footer-title"> <a class="navbar-brand" style="margin-right: 0px;" href="{{ url('/') }}">
                    <img src="{{ $mainarr['logo']}}"  alt="Logo" class="logo">
                </a></h5>
                <h4   >{{$mainarr['title']}}</h4>
                <p  > للزواج الإسلامي </p>
           
            <p class="intto-desc">نبحث لك عن نصفك الآخر</p>
                <ul class="list-unstyled mb-0">
                    <li></li>
                    
                </ul>
            </div>
               <div class="col-lg-3 col-md-6 mb-4 mb-md-0 footer-menu">
                   <h5 class="text-uppercase footer-title">من نحن</h5>
                 
                   <ul class="  mb-0">                    
                       <li><a href="{{ url($lang.'/page'.'/'.'about-us') }}" class="text-dark">نبذة عنا</a></li>                      
                       <li><a href="{{ url($lang.'/page'.'/'.'contact-us') }}" class="text-dark">اتصل بنا</a></li>  
                       @if(!auth()->guard('client')->check())                   
                       <li><a href="{{ url($lang,'befor-reg') }}" class="text-dark">اشتراك</a></li>   
                       @endif
                                   
                   </ul>
                   
               </div>
               <div class="col-lg-3 col-md-6 mb-4 mb-md-0 footer-menu">
                   <h5 class="text-uppercase footer-title">روابط مفيدة</h5>
                   <ul class=" mb-0">
                       <li><a href="{{ url($lang.'/page'.'/'.'terms') }}" class="text-dark">الشروط و الاحكام</a></li>
                       <li><a href="{{ url($lang.'/page'.'/'.'privacy') }}" class="text-dark">سياسة الخصوصية</a></li> 
                       @if(auth()->guard('client')->check())
                       <li><a href="{{ url($lang,'subscribe') }}" class="text-dark">الباقات</a></li>     
                       @endif            
                   </ul>
               </div>
               <div class="col-lg-3 col-md-6 mb-4 mb-md-0 footer-menu">
                   <h5 class="text-uppercase footer-title">قوائم الاعضاء</h5>
                   <ul class="mb-0">
                       <li><a href="{{ url($lang.'/members','online') }}" class="text-dark">المتواجدون الآن</a></li>
                       <li><a href="{{ url($lang.'/members','new') }}" class="text-dark">أعضاء جدد</a></li>
                       <li><a href="{{ url($lang.'/members','special') }}" class="text-dark">الأعضاء المتميزين</a></li>
                       <li><a href="{{ url($lang.'/members','health-cases') }}" class="text-dark">الحالات الصحية</a></li>
                      
                   </ul>
               </div>
           </div>
       </div>
   </footer>


   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
   <script src="{{ url('assets/site/bootstrap/dist/js/bootstrap.min.js') }}"></script>

   <script src="{{ url('assets/site/js/custom/script.js') }}"></script>
   <script src="{{ url('assets/site/bootstrap/bootstrap-slider.js') }}"></script>
   <script src="{{ url('assets/site/bootstrap/bootstrap-datepicker.min.js') }}"></script>
   <script src="{{ url('assets/site/js/owl.carousel.min.js') }}"></script>
   <script src="{{ url('assets/site/js/custom/main.js') }}"></script>
   <script src="{{ url('assets/site/js/sweetalert.min.js') }}"></script>
   
   @yield('js')

   </body>

   </html>
