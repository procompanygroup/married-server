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

                                <p>اختر الباقة المناسبة </p>

                            </div>
                            @if (isset($item))
                                <div class="row text-center" style="display: flex;justify-content: space-evenly;">

                                    <div class="col-lg-4 col-sm-4 col-xs-12 wow fadeInUp plan-container"
                                        data-wow-duration="1s" data-wow-delay="0.1s" data-wow-offset="0">
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
                                            <ul style="padding-right: 0px; font-size: 14px;">
                                                <li>الرسائل <strong>{{ $item->chat_count }}</strong> رسالة</li>
                                                <li>عمليات البحث <strong>{{ $item->search_count }}</strong> عملية</li>
                                                <li>قائمة الاهتمام <strong>{{ $item->favorite_count }}</strong> شخص</li>
                                                <li>
                                                    @if ($item->hidden_feature == 1)
                                                        <i class="bi bi-check lead text-success plan-check "></i>
                                                    @else
                                                        <i class="bi bi-x lead text-danger plan-check "></i>
                                                    @endif التصفح الخفي
                                                </li>
                                                <li>
                                                    @if ($item->show_img == 1)
                                                        <i class="bi bi-check lead text-success plan-check "></i>
                                                    @else
                                                        <i class="bi bi-x lead text-danger plan-check "></i>
                                                    @endif إظهار الصورة
                                                </li>
                                                <li>
                                                    @if ($item->special_member == 1)
                                                        <i class="bi bi-check lead text-success plan-check "></i>
                                                    @else
                                                        <i class="bi bi-x lead text-danger plan-check "></i>
                                                    @endif عضو مميز
                                                </li>
                                                <li>
                                                    @if ($item->edit_name == 1)
                                                        <i class="bi bi-check lead text-success plan-check "></i>
                                                    @else
                                                        <i class="bi bi-x lead text-danger plan-check "></i>
                                                    @endif تعديل الاسم
                                                </li>

                                            </ul>

                                        </div>
                                    </div><!--- END COL -->



                                </div><!--- END ROW -->
                        </div><!--- END CONTAINER -->
                        @endif
                        <div class="row text-center">

                            <div class="container mt-5">
                                <h2>إختر طريقة الدفع</h2>
                                @if (session('error'))
                                    <div class="alert alert-danger">{{ session('error') }}</div>
                                @endif

                                @if (session('success'))
                                    <div class="alert alert-success">{{ session('success') }}</div>
                                @endif

                                <form id="paymentForm" action="{{ route('payment.process') }}" method="POST"
                                    id="payment-form">
                                    @csrf
                                    <div class="form-group">
                                        <label for="amount">المبلغ (USD): </label><label for="amount">
                                            @if (isset($item))
                                                {{ $item->price }}
                                            @endif
                                        </label>
                                        <input type="hidden" name="amount"
                                            value="@if (isset($item)) {{ $item->price }} @endif"
                                            class="form-control" id="amount">
                                        <input type="hidden" name="pack"
                                            value="@if (isset($item)) {{ $item->id }} @endif"
                                            class="form-control">
                                    </div>
                                    <!-- اختيار طريقة الدفع -->
                                    <div class="mb-3">
                                        <label class="form-label">اختر طريقة الدفع</label><br>
                                        <input type="radio" name="payment_method" value="paypal" id="paypal">
                                        PayPal<br>
                                        <input type="radio" name="payment_method" value="credit_card" id="creditCard">
                                        بطاقة الائتمان<br>
                                        <input type="radio" name="payment_method" value="bank_transfer" id="bankTransfer">
                                        التحويل البنكي<br>
                                    </div>

                                    <!-- معلومات بطاقة الائتمان -->
                                    <div id="creditCardInfo" class="d-none">
                                        <div class="mb-3">
                                            <label for="cardNumber" class="form-label">رقم البطاقة</label>
                                            <input type="text" class="form-control" id="cardNumber"
                                                placeholder="أدخل رقم البطاقة">
                                        </div>
                                        <div class="mb-3">
                                            <label for="cardExpiry" class="form-label">تاريخ الانتهاء</label>
                                            <input type="text" class="form-control" id="cardExpiry" placeholder="MM/YY">
                                        </div>
                                        <div class="mb-3">
                                            <label for="cardCVC" class="form-label">رمز الأمان (CVC)</label>
                                            <input type="text" class="form-control" id="cardCVC" placeholder="CVC">
                                        </div>
                                        <div class="mb-3">
                                            <img id="cardImage" src="" alt="نوع البطاقة"
                                                style="display: none; width: 100px;">
                                        </div>
                                    </div>

                                    <!-- زر الدفع -->
                                    <button type="submit" class="btn btn-primary">ادفع الآن</button>
                                </form>
                            </div>

                            <script src="https://js.stripe.com/v3/"></script>
                            <script></script>
                        </div>
                    </section>
                </div>
                @csrf
                <div class="submit-block text-center">
                    
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
