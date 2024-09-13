 @extends('site.layouts.home-signed.layout')
 
@section('content')
    <div class="container-fluid mt-3 pt-3">
        <div class="row">
            <!-- القسم الجانبي -->
            @include('site.content.profile-sidebar')

         
            <section class=" content-sec col-lg-7 col-md-6 page">

                <div class="page-body pl-0 pr-0 user-profile-page user-profile-male user-profile-100 not-contactable" >
                    <div class="row profile-cover">
                        <div class="col-md-12">
                            <div class="membership-type">
                                <div class="membership-type-desc"> عضوية مميزة </div>
                                <div class="membership-type-stars">
                                    <div class="star"></div>
                                    <div class="star"></div>
                                    <div class="star"></div>
                                    <div class="star"></div>
                                    <div class="star"></div>
                                </div>
                            </div>
                            <div class="controls"><a href="#" class="exit"><i
                                        class="ico las ico-times"></i></a></div>
                            <div class="options"><a href="/ar/members/100" target="_blank" class="btn-new-window"></a></div>
                        </div>
                    </div>
                    <div class="main" style="padding-bottom: 65px;">
                        <div class="row">
                            <div class="col-md-12 masthead-data">
                                <div class="avatar  " > 
                                    <img src="{{ $client->client->image_path }}" class="avatar-male"
                                        alt="صورة المستخدم" > </div>
                                <div class="data">
                                    <div class="brief">
                                        <h1 class="user-username"><span>{{ $client->client->name }}</span>
                                         
                                            <span >                                                
                                                <img src="{{ url('assets/site/img/flags/32x32/'.$client->nationality->code.'.png') }}"
                                                    alt="{{ $client->nationality->country_name }}"> </span>
                                        </h1><span class="user-age" dir="auto"> {{ $client->client->age }} سنة </span>
@if($client->client->gender=='male')
<span class="user-maritalStatus"> {{ $client->family_status->option_name }}</span>
<span class="user-country"> مقيم في
    <strong>{{ $client->residence->country_name}}</strong> </span>
@else
<span class="user-maritalStatus"> {{ $client->family_status_female->option_name }}</span>
<span class="user-country"> مقيمة في
    <strong>{{ $client->residence->country_name}}</strong> </span>
    @endif
                                     
                                    </div>
                                    <div class="options" >
                                         
                                        <div class="option btn-send-message" data-user-name="{{ $client->client->name }}"  ><span><i class="bi bi-envelope-fill"></i></span> <span> رسالة </span></div>
                                        <div class="option btn-add-to-favorite"><span><i class="bi bi-heart-fill"></i></span> <span> إهتمام </span></div>
                                        <div class="option btn-add-to-blacklist"><span><i class="bi bi-x-circle-fill"></i></span> <span> تجاهل </span></div>
                                        <div class="option btn-report"><span><i class="bi bi-flag-fill"></i></span> <span> إبلاغ </span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 secondary-data">
                                <div class="data-block">
                                    <div class="data-block-title"></div>
                                    <div class="data-block-content">
                                        <ul>
                                            <li class="user-id"><span class="field-name"> رقم العضوية </span><span
                                                    class="field-value">{{ $client->client->id }} </span></li>
                                            <li class="Last-login-date"><span class="field-name"> تاريخ آخر زيارة
                                                </span><span class="field-value">{{ $lastseen_at }}</span></li>
                                            <li class="registration-date"><span class="field-name"> تاريخ التسجيل
                                                </span><span class="field-value">{{$since_register}}</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8 essencial-data">
                                <div class="data-block">
                                    <div class="data-block-title ico-map">
                                        <h2><i class="bi bi-house"></i> السكن و الحالة الإجتماعية </h2>
                                    </div>
                                    <div class="data-block-content">
                                        <ul>
                                            <li><span class="field-name"> الجنسية </span>
                                                <span class="field-value">{{ $client->nationality->country_name}}</span></li>
                                            <li><span class="field-name"> مكان الإقامة </span><span class="field-value">
                                                {{  $client->residence->country_name}}<i class="separator-dash"></i>{{  $client->residence->city_name}} </span></li>
                                            <li><span class="field-name"> الحالة العائلية </span><span class="field-value">
                                                {{ $client->client->age }} سنة <i class="separator-dash"></i>  {{ $client->family_status_female->option_name }} <br> @if($client->children_num->val==0) بدون أطفال @else {{ $client->children_num->val }} طفل @endif</span></li>
                                            <li><span class="field-name"> نوع الزواج </span>
                                                <span class="field-value">@if($client->client->gender=='male') {{ $client->wife_num->option_name}} @else  {{ $client->wife_num_female->option_name}} @endif </span></li>
                                            <li><span class="field-name"> الإلتزام الديني </span>
                                                <span class="field-value">{{ $client->religiosity->option_name}} </span></li>
                                            <li><span class="field-name"> الصلاة </span><span class="field-value">{{ $client->prayer->option_name}}</span></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="data-block">
                                    <div class="data-block-title ico-appearance">
                                        <h2><i class="bi bi-heart"></i> المظهر و الصحة </h2>
                                    </div>
                                    <div class="data-block-content">
                                        <ul>
                                            <li><span class="field-name"> لون البشرة </span>
                                                <span class="field-value">{{ $client->skin->option_name}}</span></li>
                                            <li><span class="field-name"> الطول و الوزن </span>
                                                <span class="field-value">{{ $client->height->val}} سم , {{ $client->weight->val}} كغ </span></li>
                                            <li><span class="field-name"> بنية الجسم </span>
                                                <span class="field-value">{{ $client->body->option_name}}</span></li>
                                            <li>
                                                @if($client->client->gender=='male') 
                                                <span class="field-name"> اللحية </span>
                                                <span class="field-value">{{ $client->beard->option_name}} </span>                                               
                                                @else  
                                                <span class="field-name">الحجاب</span>
                                                <span class="field-value">{{ $client->veil->option_name}} </span> 
                                                @endif
                                            </li>
                                            <li><span class="field-name"> الحالة الصحية </span>
                                                <span class="field-value">{{ $client->health->option_name}} </span></li>
                                            <li><span class="field-name"> التدخين </span>
                                                <span class="field-value">{{ $client->smoking->option_name}} </span></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="data-block">
                                    <div class="data-block-title ico-work">
                                        <h2><i class="bi bi-briefcase"></i> الدراسة و العمل </h2>
                                    </div>
                                    <div class="data-block-content">
                                        <ul>
                                            <li><span class="field-name"> المؤهل التعليمي </span><span
                                                    class="field-value">{{ $client->education->option_name}}</span></li>
                                            <li><span class="field-name"> مجال العمل </span>
                                                <span class="field-value">{{ $client->work->option_name}}</span></li>
                                            <li class="data-job"><span class="field-name"> الوظيفة </span>
                                                <span class="field-value">{{ $client->job->val}}</span></li>
                                            <li><span class="field-name"> الدخل الشهري </span>
                                                <span class="field-value">{{ $client->income->option_name}} </span></li>
                                            <li><span class="field-name"> الوضع المادي </span>
                                                <span class="field-value">{{ $client->financial->option_name}}</span></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="data-block data-about-me">
                                    <div class="data-block-title ico-pen">
                                        <h2><i class="bi bi-person"></i> مواصفاتي أنا </h2>
                                    </div>
                                    <div class="data-block-content">
                                        <ul>
                                            <li style="width:auto">
                                                @if( is_null($client->about_me->val)|| empty($client->about_me->val))
                                                <p class="empty-data">لا توجد بيانات</p>
                                                @else
                                                <p >{{ $client->about_me->val}}</p>
                                                @endif 
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="data-block data-about-partner">
                                    <div class="data-block-title ico-pen">
                                        <h2><i class="bi bi-heart-fill"></i> مواصفات شريك حياتي </h2>
                                    </div>
                                    <div class="data-block-content">
                                        <ul>
                                            <li style="width:auto">
                                                @if( is_null($client->partner->val)|| empty($client->partner->val))
                                                <p class="empty-data">لا توجد بيانات</p>
                                                @else
                                                <p >{{ $client->partner->val}}</p>
                                                @endif 
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                </div>

<input type="hidden" name="member-num" value="{{$client->client->id}}">
            </section>



        </div>
    </div>
@endsection
@section('css')
<link href="{{ url('assets/site/css/custom/member.css') }}" rel="stylesheet">

@endsection
@section('js')
    <script>
        // var fail_msg = "لم يتم الحفظ";
     
    </script>
    <script src="{{ url('assets/site/js/sweetalert.min.js') }}"></script>
    <script src="{{ url('assets/site/js/custom/validate.js') }}"></script>
    <script src="{{ url('assets/site/js/custom/member.js') }}"></script>

@endsection
