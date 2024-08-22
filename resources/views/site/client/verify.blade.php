<!DOCTYPE html>
 
<html lang="ar" dir="rtl">
  @php
  $sitedataCtrlr=new App\Http\Controllers\Web\SiteDataController();  
  $mainarr=$sitedataCtrlr->FillStaticData();
  @endphp
@include('site.layouts.home.head-sign')
<body dir="rtl"> 
   	    <!-- محتوى الصفحة -->
          
 
          <div class="login-container">
            <h1>التحقق من الكود</h1>
            <form action ="{{ route('verify.store') }}" method="POST" name="login-form" id="login-form" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label for="code">رمز التحقق:</label>
                <input type="text" class="form-control" id="code"  name="code"  placeholder="أدخل رمز التحقق">
                <div  id="code-error" class="invalid-feedback"></div>
              </div>             
              <div class="btn-contain">
                  <button type="submit" class="btn btn-primary   btn-submit">تأكيد</button>
                </div>
            </form>        
            <h2 class="text-center">
               
            </h2>
        </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="{{ url('assets/site/bootstrap/dist/js/bootstrap.min.js') }}"></script>

{{-- <script src="{{ url('assets/site/js/custom/script.js') }}"></script> --}}
  <script src="{{ url('assets/site/bootstrap/bootstrap-slider.js') }}"></script>  
  <script src="{{ url('assets/site/bootstrap/bootstrap-datepicker.min.js') }}"></script> 
<script src="{{ url('assets/site/js/owl.carousel.min.js') }}"></script>  
{{-- <script src="{{ url('assets/site/js/custom/main.js') }}"></script>  --}}
<script src="{{ url('assets/site/js/sweetalert.min.js') }}"></script>  
 

</body>
</html>
 