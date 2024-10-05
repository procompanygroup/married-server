@extends('site.layouts.home-signed.layout')
@section('content')
    <div class="container-fluid mt-3 pt-3">
        <div class="row">
            <!-- القسم الجانبي -->
            @include('site.content.profile-sidebar')
            <!-- قسم تعديل البيانات -->
            <section class=" content-sec col-lg-7 col-md-6">

                <h3 class="footer-title">صورتي</h3>
                <!-- قسم تعديل  -->
                <div class=" input-block bg-white p-4 rounded shadow  one-box ">
                    <div class="edit-details__content">
                        <div class="input-block edit-block">
                            <div style="height:30px"></div>
                            <div class="row">
                                <div class="col-md-8 form-group">
                                    <form action="{{ route('client.update_image', $lang) }}" id="form-profile"
                                        method="post" autocomplete="off">

                                        <label>الصورة<sup></sup></label>

                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="image" id="image">
                                            <label class="custom-file-label text-center" id="image_label"
                                                for="image">{{ __('general.choose image', [], 'ar') }}</label>
                                            <span id="image-error" class="error invalid-feedback"></span>
                                        </div>

                                        <div class="submit-block text-center one-box">
                                            <button type="button" id="btn-submit-img" class="btn btn-lg btn-primary "> حفظ
                                            </button>
                                        </div>
                                        @csrf
                                    </form>
                                </div>

                                <div class="col-lg-4  sm-3">

                                    <img alt="" id="imgshow"
                                        class=" img-thumbnail wd-100p float-sm-right  mg-t-10 mg-sm-t-0 img-profile-edit"
                                        src="{{ $client->image_path }}">
                                    @if (!(is_null($client->image) || $client->image == ''))
                                        <button class="btn-del-photo" data-original-title="" title=""
                                            data-toggle="modal" data-target="#favoriteModal"><i
                                                class="bi bi-trash"></i></button>
                                    @endif
                                </div>

                            </div>
                        </div>

                    </div>

                </div>
                @if (!(is_null($client->image) || $client->image == ''))
                    <form action="{{ url('update-member-image') }}" id="form-image-member" method="post"
                        autocomplete="off">
                        <div class=" input-block bg-white p-4 rounded shadow box-form show-block">
                            <h5 class="mb-4">المسموح لهم بمشاهدة صورتي</h5>
                            <div class="edit-details__content">
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        @if($show_img==1)
                                        <div class="search" dir="rtl">
                                            <ul class="hor ver">
                                                <li>
                                                    <div class="btf-control checkbox-control">
                                                        <input type="radio" name="client_group" value="0"
                                                            id="client_group-0" class="btf-checkbox"  @if($client->show_image!=1)  checked  @endif>
                                                        <label for="client_group-0" class="btf-label color-pink ">لا
                                                            احد</label>
                                                    </div>
                                                </li>


                                                <li>
                                                    <div class="btf-control checkbox-control">
                                                        <input type="radio" name="client_group" value="1"
                                                            id="my-fave" class="btf-checkbox" @if($client->show_image==1)  checked  @endif>
                                                        <label for="my-fave" class="btf-label "> أعضاء من قائمة
                                                            إهتمامي<span> (<span id="showcount">{{ $countshow }}</span>)  عضو</span></label>
                                                    </div>
                                                </li>


                                            </ul>
                                        </div>
                                        <div class="box-inputs fav-content">
                                            <div class="content-3" style="max-height: 230px;" tabindex="0">
                                                <div class="search" dir="rtl">

                                                    <ul>

                                                        @forelse ($favorite_list as $client)
                                                            <li>
                                                                <div class="btf-control checkbox-control ">
                                                                    <input type="checkbox" name="fav[]"
                                                                        value="{{ $client['client']->id }}"
                                                                        id="fav-{{ $client['client']->id }}"
                                                                        class="btf-checkbox favcheck"  @if($client['is_showimage']==1)  checked  @endif>
                                                                    <label for="fav-{{ $client['client']->id }}"
                                                                        class="btf-label  ">
                                                                        <div class="data">
                                                                            <div class="essential-data"><span
                                                                                    class="user-username">
                                                                                    <b dir="auto">
                                                                                        {{ $client['client']->name }}</b>
                                                                                    <img src="{{ url('assets/site/img/flags/32x32/' . $client['nationality']->code . '.png') }}"
                                                                                        alt="{{ $client['nationality']->country_name }}">
                                                                                </span> </div>

                                                                            <div class="secondary-data">
                                                                                <span class="user-age"
                                                                                    dir="auto">{{ $client['client']->age }}
                                                                                    سنة</span>
                                                                                <span class="separator-dash">-</span>
                                                                                @if ($client['client']->is_special == 1)
                                                                                    @if ($client['client']->gender == 'male')
                                                                                        <span class="premium">(مميز )</span>
                                                                                    @else
                                                                                        <span class="premium">( مميزة
                                                                                            )</span>
                                                                                    @endif
                                                                                    <span class="separator-dash">-</span>
                                                                                @endif

                                                                                <span
                                                                                    class="color-pink user-maritalStatus">{{ $client['family_status_female']->option_name }}</span>

                                                                                <span class="separator-dash">-</span>
                                                                                <span class="user-residency"
                                                                                    dir="auto">الاقامة:
                                                                                    <strong
                                                                                        class="color-blue user-country">{{ $client['residence']->country_name }}</strong>
                                                                                    /<strong
                                                                                        class="color-blue user-city">{{ $client['residence']->city_name }}</strong>
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                    </label>

                                                                </div>
                                                            </li>
                                                        @empty
                                                            <div class="table-row fs-normal   ">
                                                                <div class="table-cell text-center">
                                                                    <span class="user-residency" dir="auto"> لايوجد
                                                                        عناصر</span>
                                                                </div>
                                                            </div>
                                                        @endforelse
                                                    </ul>

                                                </div>

                                            </div>
                                        </div>
                                        @else
                                        <p>انت غير مشترك بهذه الميزة </p> 
                                        @endif
                                      

                                    </div>

                                </div>
                                @if($show_img==1)
                                <div class="submit-block text-center one-box">
                                    <button type="button" id="btn-image-member" class="btn  btn-primary "> حفظ التعديلات
                                    </button>
                                </div>
                                @endif
                            </div>

                        </div>
                        @csrf
                    </form>
                @endif
                <form action="{{ url($lang, 'delete-image') }}" id="form-del-image" name="form-del-image"
                    method="post" autocomplete="off">
                    @csrf
                </form>
            </section>
        </div>
    </div>
    @include('site.page.sub-all.fave-modal')
@endsection
@section('css')
    <link href="{{ url('assets/site/css/custom/profile.css') }}" rel="stylesheet">
    <link href="{{ url('assets/site/bootstrap/jquery.mCustomScrollbar.min.css') }}" rel="stylesheet">
    <link href="{{ url('assets/site/css/custom/member.css') }}" rel="stylesheet">
    <link href="{{ url('assets/site/css/custom/adv-srch.css') }}" rel="stylesheet">
    <link href="{{ url('assets/site/css/custom/slide-range.css') }}" rel="stylesheet">
@endsection
@section('js')
    <script>
        // var fail_msg = "لم يتم الحفظ";
        var lang = "{{ $lang }}";
        var token = '{{ csrf_token() }}';
        var success_msg = "تم الحفظ بنجاح";
        var fail_msg = "لم يتم الحفظ";
        var  countShow={{ $countshow }};
    </script>

    <script src="{{ url('assets/site/js/sweetalert.min.js') }}"></script>
    <script src="{{ url('assets/site/js/custom/validate.js') }}"></script>
    <script src="{{ url('assets/site/js/custom/edit-image.js') }}"></script>

    <script src="{{ url('assets/site/bootstrap/jquery.mCustomScrollbar.concat.min.js') }}"></script>
@endsection
