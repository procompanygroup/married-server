@extends('site.layouts.home.layout')

@section('content')
   	   
      <div class="container">
      <div class=" col-md-6 bg-white p-4 rounded shadow box-form">
        <h5 class="mb-4 text-center"> تسجيل الدخول</h5>
        <div class="edit-details__content">
            <form   action ="{{ url($lang,'login') }}" method="POST"  name="login-form"   id="login-form" enctype="multipart/form-data">
              @csrf
                <div class="form-group">
                    <label for="username">اسم المستخدم:</label>
                    <input class="form-control  " placeholder="أدخل اسم المستخدم الخاص بك" type="email" id="email" name="email"  >
                </div>
                <div class="form-group">
                    <label for="password">كلمة المرور:</label>
                    <input class="form-control  " placeholder="كلمة المرور" type="password" id="password" name="password"  >
                </div>
               
                <div class="text-center" >
                    <button type="submit"  class="btn-submit ">الدخول</button>
                </div>
            </form>
            <div class="sec">
                <p>
                    {{$sitedataCtrlr->gettrans($login,'forgot-password')}}
                    <a href="{{route('client.password.request')}}">{{$sitedataCtrlr->gettrans($login,'recovery-password')}}</a>
                </p>
                <p>
                    {{$sitedataCtrlr->gettrans($login,'no-account')}}
                    <a href="{{ url($lang,'register') }}">إشترك مجانا الآن</a>
                </p>
                
    </div>
        </div>
       
    </div>
</div>
@endsection
@section('js')
<script>
var input_required= "{{$sitedataCtrlr->gettrans($login,'required')}}";
var input_email= "{{$sitedataCtrlr->gettrans($login,'input-email')}}";
var auth_failed= "{{$sitedataCtrlr->gettrans($login,'auth-failed')}}";
var fail_msg= "{{$sitedataCtrlr->gettrans($login,'fail-login')}}";
var verifurl="{{route('verify.index')}}"; 
 var lang="{{ $lang }}";
</script>
<script src="{{ url('assets/site/js/sweetalert.min.js') }}"></script>
<script src="{{ url('assets/site/js/custom/validate.js') }}"></script>
<script src="{{ url('assets/site/js/custom/login.js') }}"></script>
@endsection
@section('css')
<link href="{{ asset('assets/site/css/custom/login.css') }}" rel="stylesheet">
@endsection
