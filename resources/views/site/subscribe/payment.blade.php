@extends('site.layouts.home-signed.layout')
@section('content')
    <div class="container-fluid mt-3 pt-3">
        <div class="row">
            <!-- القسم الجانبي -->
            @include('site.content.profile-sidebar')
            <!-- قسم تعديل البيانات -->
            <section class=" content-sec col-lg-7 col-md-6">
                
                    <h3 class="footer-title">طرق الدفع</h3>
                    <!-- قسم تعديل  -->
                    <div class=" bg-white p-4 rounded shadow  one-box ">
                        <section id="pricing" class="pricing-content section-padding">
                            <div class="container">					
                                <div class="section-title text-center">
                                    <h1>اختر طريقة دفع</h1>
                                    <p>اختر الباقة المناسبة </p>
                                
                                </div>					
                                <div class="row text-center" style="display: flex;justify-content: space-evenly;">	
                               
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
                                          
                                        </div>
                                    </div><!--- END COL -->   
                                  
                                    
                                  
                                </div><!--- END ROW -->
                            </div><!--- END CONTAINER -->

                            <div class="row text-center"  >	

                                <div class="container mt-5">
                                    <h2>Select Payment Method</h2>
                            
                                    @if(session('error'))
                                        <div class="alert alert-danger">{{ session('error') }}</div>
                                    @endif
                            
                                    @if(session('success'))
                                        <div class="alert alert-success">{{ session('success') }}</div>
                                    @endif
                            
                                    <form action="{{ route('payment.process') }}" method="POST" id="payment-form">
                                        @csrf
                                        <div class="form-group">
                                            <label for="amount">Amount (USD):</label>
                                            <input type="number" name="amount" class="form-control" id="amount" placeholder="Enter amount">
                                        </div>
                            
                                        <div class="form-group">
                                            <label for="payment-method">Select Payment Method:</label>
                                            <select name="payment_method" class="form-control" id="payment-method">
                                                <option value="paypal">PayPal</option>
                                                <option value="credit_card">Credit Card</option>
                                                <option value="bank_transfer">Direct Bank Transfer</option>
                                            </select>
                                        </div>
                            
                                        <div id="credit-card-details" style="display:none;">
                                            <div class="form-group">
                                                <label for="card-holder-name">Card Holder Name</label>
                                                <input id="card-holder-name" class="form-control" type="text">
                                            </div>
                                            <div class="form-group">
                                                <label for="card-element">Credit or debit card</label>
                                                <div id="card-element" class="form-control"></div>
                                            </div>
                                        </div>
                            
                                        <button type="submit" class="btn btn-primary">Submit Payment</button>
                                    </form>
                                </div>
                            
                                <script src="https://js.stripe.com/v3/"></script>
                                <script>
                                    document.getElementById('payment-method').addEventListener('change', function (e) {
                                        const creditCardDetails = document.getElementById('credit-card-details');
                                        if (e.target.value === 'credit_card') {
                                            creditCardDetails.style.display = 'block';
                                        } else {
                                            creditCardDetails.style.display = 'none';
                                        }
                                    });
                                </script>
                            </div>
                        </section>
                    </div>
                    @csrf
                    <div class="submit-block text-center">
                        <button type="button" class="btn btn-lg btn-primary btn-submit"> تعديل </button>
                    </div>
               
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
