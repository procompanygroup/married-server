@extends('site.layouts.home-signed.layout')

@section('content')
    <!-- المحتوى الرئيسي -->
    <div class="container-fluid mt-3 pt-3">
        <div class="row">

            @include('site.content.profile-sidebar')
            <!-- قسم تعديل البيانات -->
            <section class=" content-sec col-lg-7 col-md-6">

                <div class="  " style="margin-top:0">
                    <div class="dashboard-page__block">
                        <div class="block-user-data">
                            <div class="user-data">
                                <figure><a href="/ar/my-photo" class="upload-photo"> <img
                                            src="{{ auth()->guard('client')->user()->image_path }}" alt=""> </a>
                                    <i class="status status--online"></i>
                                </figure>
                                <div class="membership-infos">
                                    <h4>اسم العضو : {{ auth()->guard('client')->user()->name }}</h4>
                                    <p><strong>تاريخ التسجيل : </strong><span dir="auto">{{ $user_reg_date }}</span>
                                    </p>
                                </div>
                            </div>
                            <div class="dashboard-page__link">
                                <div class="btn-links">
                                    <ul>
                                        {{-- <li><a href="/ar/settings" class="btn btn-sm btn-with-icon btn-outline-primary"
                                                title="إعداداتي"><i class="bi bi-gear"></i> </a></li> --}}
                                        <li><a href="{{ route('client.account', $lang) }}"
                                                class="btn btn-sm btn-with-icon btn-outline-danger" title="تعديل بياناتي"><i
                                                    class="bi bi-pen"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="dashboard-page__user-infolist">
                            <ul>
                                <li>
                                    <h6>لمشاهدة ملفك الشخصي&nbsp;:&nbsp;</h6><strong><a href="/ar/members/10004477">إضغط
                                            هنا</a></strong>
                                </li>
                                <li>
                                    <h6>الوقت في الموقع&nbsp;:&nbsp;</h6><strong>توقيت غرينتش</strong>
                                </li>
                                  <li> لتغيير حالة ظهورك في الموقع من متصل الى خفي أو العكس <strong><a
                                            href="/ar/settings">إضغط هنا</a></strong></li> 
                            </ul>
                        </div> --}}
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="dashboard-page__block dashboard-page__block--equal block-premium-status">
                            <div class="subscribe">
                                <h3 class="text-center">
                                    <div style="color: #1767A1 ;font-size: 50px;"><i class="bi bi-award"></i></div>
                                    <span>باقات التميز</span>
                                </h3>
                                <p> باقة التميز مجموعة من الخصائص والخدمات المتميزة تساعدك للتوفق و النجاح <br><a
                                        href="{{ url($lang, 'subscribe') }}" class="btn btn-action"> إشتراك <i
                                            class="ico las ico-long-arrow-alt-left"></i></a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="dashboard-page__block dashboard-page__block--equal block-counters">
                            <div class="row">
                                <div class="col"><a href="{{ url($lang, 'who-like-me') }}">
                                        <i style="font-size: 50px; color:#da4761;" class="bi bi-person-hearts"></i>
                                        @if ($counts_arr['who_like_me_count'] > 0)
                                            <h6 dir="auto"> يوجد
                                                <strong>({{ $counts_arr['who_like_me_count'] }})</strong> عضو مهتم بك </h6>
                                        @else
                                            <h6 dir="auto"> لا يوجد بعد أعضاء مهتمون بك </h6>
                                        @endif

                                    </a></div>
                                <div class="col"><a href="{{ url($lang, 'who-visited-me') }}">
                                        <i style="font-size: 50px; color:#da4761;" class="bi bi bi-eye"></i>
                                        @if ($counts_arr['who_visited_me_today_count'] > 0)
                                            <h6 dir="auto"> يوجد
                                                <strong>({{ $counts_arr['who_visited_me_today_count'] }})</strong> عضو زار
                                                ملفك اليوم </h6>
                                        @else
                                            <h6 dir="auto"> لا توجد زيارات جديدة لملفك اليوم </h6>
                                        @endif
                                    </a></div>
                                <div class="col"><a href="{{ url($lang . '/members', 'image') }}">
                                        <i style="font-size: 50px; color:#da4761;" class="bi bi-images"></i>
                                        @if ($counts_arr['show_image_count'] > 0)
                                            <h6 dir="auto"> يوجد
                                                <strong>({{ $counts_arr['show_image_count'] }})</strong> عضو أعطاك صلاحية
                                                مشاهدة صورته </h6>
                                        @else
                                            <h6 dir="auto"> لا أحد بَعْد أعطاك صلاحية مشاهدة صورته </h6>
                                        @endif
                                    </a></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 m-0 block-last-notifications">
                        <div class="dashboard-page__block dashboard-page__block--equal">
                            <h2>آخر الإشعارات</h2>
                            <ul>
                                @forelse ($counts_arr['last_notify_list'] as $notification)
                                    <li class="table-row notification   ">
                                        <div class="avatar">
                                            <img src="{{ $notification['client_image'] }}" class="user-avatar">
                                        </div>
                                        <div class="content user-profile-line user-card-line  col col-sm-9">

                                            <div class="content">
                                                <p dir="auto">العضو <a class="open-notification r2"
                                                        href="{{ url($lang . '/member', $notification['client_id']) }}">
                                                        {{ $notification['client_name'] }} </a>
                                                    {{ $notification['body'] }}</p><span
                                                    class="time">{{ $notification['sincedate'] }} </span>
                                            </div>
                                        </div>
                                    </li>
                                @empty
                                    <li class="table-row notification   ">
                                        <div class="table-cell text-center">
                                            <span class="user-residency" dir="auto"> لايوجد إشعارات</span>
                                        </div>
                                    </li>
                                @endforelse
                                 
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- قسم البحث  -->

                {{-- أحدث الأعضاء --}}



            </section>



        </div>
    </div>
@endsection
@section('css')
    <link href="{{ url('assets/site/css/custom/profile.css') }}" rel="stylesheet">
    <link href="{{ url('assets/site/css/custom/slide-range.css') }}" rel="stylesheet">
@endsection
