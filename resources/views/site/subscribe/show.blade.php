@extends('site.layouts.home-signed.layout')
@section('content')
    <div class="container-fluid mt-3 pt-3">
        <div class="row">
            <!-- القسم الجانبي -->
            @include('site.content.profile-sidebar')
            <!-- قسم تعديل البيانات -->
            <section class=" content-sec col-lg-7 col-md-6">
                
                    <h3 class="footer-title">باقات التميز</h3>
                    <!-- قسم تعديل  -->
                    <div class=" bg-white p-4 rounded shadow  one-box ">
                        <section id="pricing" class="pricing-content section-padding">
                            <div class="container">					
                                <div class="section-title text-center">
                                    <h1>اختر باقة للاشتراك</h1>
                                    <p>اختر الباقة المناسبة </p>
                                
                                </div>					
                                <div class="row text-center">	
                                    @forelse ($List as $item)
                                    <div class="col-lg-4 col-sm-4 col-xs-12 wow fadeInUp plan-container" data-wow-duration="1s" data-wow-delay="0.1s" data-wow-offset="0">
                                        <div class="single-pricing">
                                            <div class="price-head">								
                                                <h2>{{ $item->name }}</h2>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <h1 class="price">${{ $item->price }}</h1>
                                            <h5>كل <strong>{{ $item->expire_duration }}</strong> شهر </h5>
                                            <ul style="padding-right: 0px; font-size: 14px;" >
                                                <li>الرسائل <strong>{{ $item->chat_count}}</strong> رسالة</li>
                                                <li>عمليات البحث <strong>{{ $item->search_count}}</strong> عملية</li>
                                                <li>قائمة الاهتمام <strong>{{ $item->favorite_count}}</strong> شخص</li>
                                                <li>@if( $item->hidden_feature==1)
                                                    <i class="bi bi-check lead text-success plan-check "></i>                                                   
                                                    @else
                                                    <i class="bi bi-x lead text-danger plan-check "></i>                                                     
                                                    @endif التصفح الخفي</li>
                                                <li>@if( $item->show_img==1)
                                                    <i class="bi bi-check lead text-success plan-check "></i>                                                   
                                                    @else
                                                    <i class="bi bi-x lead text-danger plan-check "></i>                                                     
                                                    @endif إظهار الصورة</li>
                                                <li>@if( $item->special_member==1)
                                                    <i class="bi bi-check lead text-success plan-check "></i>                                                   
                                                    @else
                                                    <i class="bi bi-x lead text-danger plan-check "></i>                                                     
                                                    @endif عضو مميز</li>
                                                <li>@if( $item->edit_name==1)
                                                    <i class="bi bi-check lead text-success plan-check "></i>                                                   
                                                    @else
                                                    <i class="bi bi-x lead text-danger plan-check "></i>                                                     
                                                    @endif تعديل الاسم</li>                                            
                                               
                                            </ul>
                                            <form action ="{{ url($lang.'/subscribe/payment') }}" method="POST"  >
                                            @csrf
                                            <input type="hidden" name="pack" value="{{ $item->id }}">
                                            <button type="submit" class="plan-btn">ابدأ </button>
                                            </form>
                                        </div>
                                    </div><!--- END COL -->   
                                    @empty
                                        <p>لايوجد باقات حاليا</p>
                                    @endforelse 
                                    
                                  
                                </div><!--- END ROW -->
                            </div><!--- END CONTAINER -->
                        </section>
                    </div>
                    @csrf
                 
               
            </section>
        </div>
    </div>
@endsection
@section('js')
    <script>
        // var fail_msg = "لم يتم الحفظ";
        var lang = "{{ $lang }}";
        var token = '{{ csrf_token() }}';
        var success_msg = "تم الحفظ بنجاح";
        var fail_msg = "لم يتم الحفظ";
    </script>
    <script src="{{ url('assets/site/js/sweetalert.min.js') }}"></script>
 
    <script src="{{ url('assets/site/js/custom/subscribe.js') }}"></script>
@endsection
@section('css')
    <link href="{{ url('assets/site/css/custom/subscribe.css') }}" rel="stylesheet">
 
@endsection
