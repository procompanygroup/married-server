@extends('site.layouts.home-signed.layout')
@section('content')
    <div class="container-fluid mt-3 pt-3">
        <div class="row">
            <!-- القسم الجانبي -->
            @include('site.content.profile-sidebar')

            <!-- قسم تعديل البيانات -->
            <section class=" content-sec col-lg-7 col-md-6">

                <div class="page-head p-3 ">
                    <h3>الاشعارات</h3>


                </div>
                <!--   table-->


                <div class="table standard members-list" style="height: auto !important;">
                    <div class="table-head fs-normal color-gray-dark">
                        <div class="table-cell"> الاشعار </div>
                        <div class="table-cell added-at" style="width:130px">التاريخ </div>

                    </div>
                    <div class="table-body" style="height: auto !important;">


                        @forelse ($notify_list as $notification)
                            <div class="table-row fs-normal   ">
                                <div class="table-cell">
@if($notification['side']=='member') 
                                    <div class="notify-row">

                                        <div class="avatar"> <img src="{{ $notification['client_image']}}" class="avatar-female" alt="صورة العضو">
                                        </div>
                                        <div class="data notify-data">
                                            <div class="essential-data"> العضو<b dir="auto"> <a  href="{{ url($lang . '/member', $notification['client_id']) }}" role="link-profile">
                                                        <span class="user-username"> {{ $notification['client_name'] }} </span></a></b>
                                                        {{ $notification['body'] }}</div>


                                        </div>
                                    </div>
                                    @endif

                                </div>
                                <div class="table-cell added-at" style="width:130px">{{ $notification['sincedate'] }}</div>

                            </div>
                        @empty
                            <div class="table-row fs-normal   ">
                                <div class="table-cell text-center">
                                    <span class="user-residency" dir="auto"> لايوجد عناصر</span>
                                </div>
                            </div>
                        @endforelse


                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
@section('js')
    <script>
        // var fail_msg = "لم يتم الحفظ";
        var delurl = "{{ url('favorite/delete') }}";
        var type = "{{ $type }}"
    </script>
    <script src="{{ url('assets/site/js/sweetalert.min.js') }}"></script>
    <script src="{{ url('assets/site/js/custom/validate.js') }}"></script>
    <script src="{{ url('assets/site/js/custom/fav-list.js') }}"></script>

    <script src="{{ url('assets/site/bootstrap/jquery.mCustomScrollbar.concat.min.js') }}"></script>
@endsection
@section('css')
    <link href="{{ url('assets/site/bootstrap/jquery.mCustomScrollbar.min.css') }}" rel="stylesheet">
    <link href="{{ url('assets/site/css/custom/srch-result.css') }}" rel="stylesheet">
    <link href="{{ url('assets/site/css/custom/slide-range.css') }}" rel="stylesheet">
@endsection
