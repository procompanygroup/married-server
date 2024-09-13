   @include('site.layouts.home.chat')
   <!-- الفوتر -->
   <footer class=" text-center text-lg-start mt-5">
       <div class="container p-4">
           <div class="row">
               <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                   <h5 class="text-uppercase footer-title">روابط مفيدة</h5>
                   <ul class="list-unstyled mb-0">
                       <li><button Type="button" name="show-chat-btn">Show Chat</button></li>
                       <li><a href="#" class="text-dark">رابط 2</a></li>
                       <li><a href="#" class="text-dark">رابط 3</a></li>
                       <li><a href="#" class="text-dark">رابط 4</a></li>
                       <li><a href="#" class="text-dark">رابط 5</a></li>
                   </ul>
               </div>
               <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                   <h5 class="text-uppercase footer-title">الدعم الفني</h5>
                   <ul class="list-unstyled mb-0">

                       <li><a href="#" class="text-dark">رابط 2</a></li>
                       <li><a href="#" class="text-dark">رابط 3</a></li>
                       <li><a href="#" class="text-dark">رابط 4</a></li>
                       <li><a href="#" class="text-dark">رابط 5</a></li>
                   </ul>
               </div>
               <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                   <h5 class="text-uppercase footer-title">العنوان 3</h5>
                   <ul class="list-unstyled mb-0">
                       <li><a href="#" class="text-dark">رابط 1</a></li>
                       <li><a href="#" class="text-dark">رابط 2</a></li>
                       <li><a href="#" class="text-dark">رابط 3</a></li>
                       <li><a href="#" class="text-dark">رابط 4</a></li>
                       <li><a href="#" class="text-dark">رابط 5</a></li>
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
