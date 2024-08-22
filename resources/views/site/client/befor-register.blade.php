@extends('site.layouts.home.layout')
@section('content')
    <div class="signup-page">
        <div class="page-hero"></div>
        <main class="container">
            <div class="row main-content">
                <section class="col-md-12">
                    <div class="before-register">
                        <h1 class="text-center"> قسم التسجيل </h1>
                        <div> أقسم بالله العظيم أني لم أدخل هذا الموقع إلا بهدف الزواج الشرعي وليس لأي هدف آخر ؛ وأعاهد
                            الله وأعاهدكم&nbsp;على أن أكون ملتزما ب<a href="/ar/terms-conditions">شروط و قوانين
                                الموقع</a>، عسى ربي يكتب لي الخير في هذا المكان.</div>
                        <div class="btf-control block-oathed">
                            <input type="checkbox" name="oathed" id="oathed" class="btf-checkbox"> 
                                <label for="oathed" class="btf-label"><b>لقد قمت بأداء القسم،
                                    وسألتزم به</b></label></div>
                        <div class="before-register__gselect">
                            <ul>
                                <li class="male"><button id="male" class="befor-btn">
                                        <figure>
                                            <img src="{{ asset('assets/site/img/male-user.png') }}" alt="تسجيل زوج">
                                            <img src="{{ asset('assets/site/img/plus.svg') }}" class="icon-add" alt="جديد">

                                        </figure>
                                        <span> التسجيل كَـزوج </span>
                                    </button></li>
                                <li class="female"><button id="female" class="befor-btn">
                                        <figure><img src="{{ asset('assets/site/img/female-user.png') }}" alt="تسجيل زوجة">
                                            <img src="{{ asset('assets/site/img/plus.svg') }}" class="icon-add" alt="جديد">
                                        </figure><span> التسجيل كَـزوجة </span>
                                    </button></li>
                            </ul>
                        </div>
                    </div>
                </section>
            </div>
        </main>
    </div>
@endsection
@section('css')
    <link href="{{ asset('assets/site/css/custom/befor-register.css') }}" rel="stylesheet">
@endsection

@section('js')
<script>
var fail_msg= "الرجاء أداء القسم قبل التسجيل بالموقع";
//var success_msg="سيتم الانتقال الى صفحة الاشتراك";
var beforurl= "{{ url('befor-reg') }}";
var regurl= "{{ url($lang,'register') }}";
var token= '{{ csrf_token() }}';
</script>
<script src="{{ url('assets/site/js/sweetalert.min.js') }}"></script>
<script src="{{ url('assets/site/js/custom/validate.js') }}"></script>
    <script src="{{ url('assets/site/js/custom/befor-reg.js') }}"></script>

@endsection
 
