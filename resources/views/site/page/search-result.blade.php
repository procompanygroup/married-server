@extends('site.layouts.home-signed.layout')
@section('content')
    <div class="container-fluid mt-3 pt-3">
        <div class="row">
            <!-- القسم الجانبي -->
            @include('site.content.profile-sidebar')

            <!-- قسم تعديل البيانات -->
            <section class=" content-sec col-lg-7 col-md-6">

                <div class="page-head p-3 ">
                    <h3>البحث المتقدم</h3>
                    <div class="row sub-menu">
                        <div class="col-md-3 col-sm-6 sub-item item-dis">
                            <a href="{{ url($lang,'advance-search') }}" class="disactive   text-center ">معايير البحث</a>

                        </div>
                        <div class="col-md-3 col-sm-6 sub-item">
                            <a href="#"class=" tab-btn active text-center"> نتائج البحث </a>
                        </div>
                        <div class="col-6 col-sm-12">

                        </div>
                    </div>
                </div>
                <!-- قسم تعديل الاقامة -->
            

                <div class="table standard members-list" style="height: auto !important;">
                    <div class="table-head fs-normal color-gray-dark">
                        <div class="table-cell"> ملف العضو </div>
                        <div class="table-cell added-at" style="width:130px"> تاريخ التسجيل </div>
                    </div>
                    <div class="table-body" style="height: auto !important;">


                        @foreach ($clients as $client)

                        <div class="table-row fs-normal   ">
                            <div class="table-cell">
                                <div class="user-profile-line user-card-line-9920457 female"> <a href="/ar/members/9920457"
                                        role="link-profile">
                                        <div class="avatar"> <img src="{{   $client['client']->image_path }}"
                                                class="avatar-female" alt="صورة العضو"  > </div>
                                        <div class="data">
                                            <div class="essential-data"><span class="user-username"><b dir="auto"> {{ $client['client']->name }}</b> 
                                                <img src="{{ url('assets/site/img/flags/32x32/'.$client['nationality']->code.'.png') }}" alt="{{ $client['nationality']->country_name }}"> </span> </div>
           
                                            <div class="secondary-data"> <span class="user-age" dir="auto">{{ $client['client']->age }} سنة</span><span class="separator-dash"></span> <span
                                                    class="color-pink user-maritalStatus">{{ $client['family_status_female']->option_name }}</span><span
                                                    class="separator-dash separator-user-age"></span> <span
                                                    class="user-residency" dir="auto"> مقيمة في <strong
                                                        class="color-blue user-country">{{ $client['residence']->country_name }}</strong> بـ <strong
                                                        class="color-blue user-city">{{ $client['residence']->city_name }}</strong> </span> </div>
                                        </div>
                                    </a> </div>
                            </div>
                            <div class="table-cell added-at" style="width:130px">{{ $client['since_register']  }} </div>
                        </div>
                        @endforeach
                       
                      
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
@section('js')
    <script>
        // var fail_msg = "لم يتم الحفظ";
        var lang = "{{ $lang }}";

        var cityurl = "{{ url('cities', 'ItemId') }}";
        var selcity = "";


        var token = '{{ csrf_token() }}';
        var success_msg = "تم الحفظ بنجاح";
        var fail_msg = "لم يتم الحفظ";
        $(function() {
            /* Rounded Dots Dark */

            /* 3d Dark */


            /* Dark Thin */

        });
    </script>
    <script src="{{ url('assets/site/js/sweetalert.min.js') }}"></script>
    <script src="{{ url('assets/site/js/custom/validate.js') }}"></script>
 
    <script src="{{ url('assets/site/bootstrap/jquery.mCustomScrollbar.concat.min.js') }}"></script>
@endsection
@section('css')
    <link href="{{ url('assets/site/bootstrap/jquery.mCustomScrollbar.min.css') }}" rel="stylesheet">
    <link href="{{ url('assets/site/css/custom/srch-result.css') }}" rel="stylesheet">
    <link href="{{ url('assets/site/css/custom/slide-range.css') }}" rel="stylesheet">
@endsection
