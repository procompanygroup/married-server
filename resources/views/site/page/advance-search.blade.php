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
                        <div class="col-md-3 col-sm-6 sub-item">
                            <a href="#" class=" tab-btn active text-center">معايير البحث</a>

                        </div>
                        <div class="col-md-3 col-sm-6 sub-item item-dis">
                            <a href="#"class="disactive text-center" id="a-result"> نتائج البحث </a>
                        </div>
                        <div class="col-6 col-sm-12">

                        </div>
                    </div>
                </div>
                <!-- قسم تعديل الاقامة -->
                <form action="{{ url($lang, 'advance-search') }}" id="form-search" name="form-search" method="post"
                    autocomplete="off">
                    @csrf
                    <div class=" input-block bg-white p-4 rounded shadow box-form">
                        <h5 class="mb-4">الجنسية و الإقامة</h5>
                        <div class="edit-details__content">
                            <div class="row">
                                <div class="col-md-6 form-group"><label class="input-name">مكان الإقامة :</label>

                                    <div class="box-inputs  ">
                                        <div class="content-3" style="max-height: 230px;" tabindex="0">
                                            <div class="search" dir="rtl">
                                                <ul>
                                                    <li>
                                                        <div class="btf-control checkbox-control">
                                                            <input type="checkbox" name="residence[]" value="0"
                                                                id="res-0" class="btf-checkbox" checked>
                                                            <label for="res-0" class="btf-label color-pink ">لا
                                                                يهم</label>
                                                        </div>
                                                    </li>

                                                    @foreach ($prop_group['countries'] as $country)
                                                        <li>
                                                            <div class="btf-control checkbox-control">
                                                                <input type="checkbox" name="residence[]"
                                                                    value="{{ $country->id }}" id="res-{{ $country->id }}"
                                                                    class="btf-checkbox"> <label
                                                                    for="res-{{ $country->id }}"
                                                                    class="btf-label ">{{ $country->name_ar }}</label>
                                                            </div>
                                                        </li>
                                                    @endforeach

                                                </ul>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6 form-group"><label class="input-name">الجنسية :</label>
                                    <div class="box-inputs  ">
                                        <div class="content-3" style="max-height: 230px;" tabindex="0">
                                            <div class="search" dir="rtl">
                                                <ul>
                                                    <li>
                                                        <div class="btf-control checkbox-control">
                                                            <input type="checkbox" name="nationality[]" value="0"
                                                                id="nat-0" class="btf-checkbox" checked>
                                                            <label for="nat-0" class="btf-label color-pink ">لا
                                                                يهم</label>
                                                        </div>
                                                    </li>
                                                    @foreach ($prop_group['countries'] as $country)
                                                        <li>
                                                            <div class="btf-control checkbox-control"><input type="checkbox"
                                                                    name="nationality[]" value="{{ $country->id }}"
                                                                    id="nat-{{ $country->id }}" class="btf-checkbox">
                                                                <label for="nat-{{ $country->id }}"
                                                                    class="btf-label ">{{ $country->name_ar }}</label>
                                                            </div>
                                                        </li>
                                                    @endforeach

                                                </ul>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- قسم تعديل  -->
                    <div class=" input-block bg-white p-4 rounded shadow box-form">
                        <h5 class="mb-4">الحالة الإجتماعية</h5>
                        <div class="edit-details__content">
                            <div class="row">
                                <div class="col-md-6 form-group box-marriage-type"><label class="input-name">نوع الزواج
                                        :</label>
                                    <div class="box-inputs">
                                        <ul class="no-list-style hor">
                                            @if ($client->gender == 'male')
                                                <li>
                                                    <div class="btf-control checkbox-control hor-div"><input type="radio"
                                                            name="wife_num_female" value="0" id="mt-0"
                                                            class="btf-checkbox" checked> <label for="mt-0"
                                                            class="btf-label p-0 color-pink">&nbsp;لا يهم </label></div>
                                                </li>
                                                @foreach ($prop_group['wife_num_female']['optionsvalues'] as $family_options)
                                                    <li>
                                                        <div class="btf-control checkbox-control hor-div">
                                                            <input type="radio" name="wife_num_female"
                                                                value="{{ $family_options['id'] }}"
                                                                id="wnf-{{ $family_options['id'] }}" class="btf-checkbox">
                                                            <label for="wnf-{{ $family_options['id'] }}"
                                                                class="btf-label p-0 ">{{ $family_options['tr_title'] }}</label>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            @else
                                                <li>
                                                    <div class="btf-control checkbox-control hor-div"><input type="radio"
                                                            name="wife_num" value="0" id="mt-0"
                                                            class="btf-checkbox" checked> <label for="mt-0"
                                                            class="btf-label p-0 color-pink">&nbsp;لا يهم </label></div>
                                                </li>
                                                @foreach ($prop_group['wife_num']['optionsvalues'] as $family_options)
                                                    <li>
                                                        <div class="btf-control checkbox-control hor-div">
                                                            <input type="radio" name="wife_num"
                                                                value="{{ $family_options['id'] }}"
                                                                id="wn-{{ $family_options['id'] }}" class="btf-checkbox">
                                                            <label for="wn-{{ $family_options['id'] }}"
                                                                class="btf-label p-0 ">{{ $family_options['tr_title'] }}</label>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            @endif

                                        </ul>
                                        <div class="clean"></div>
                                    </div>
                                </div>
                                <div class="col-md-6 form-group d-md-block"><label>العمر</label>
                                    <div dir="ltr">
                                        <b class="b-slide">18</b> <input id="age-slide" name="age" type="text"
                                            class="span2" value="" data-slider-min="18" data-slider-max="100"
                                            data-slider-step="1" data-slider-value="[18,100]" /> <b class="b-slide">
                                            100</b>
                                    </div>
                                </div>
                                <div class="col-md-12 form-group box-marital-status"><label class="input-name">الحالة
                                        العائلية :</label>
                                    <div class="box-inputs">

                                        <ul class="no-list-style hor">
                                            @if ($client->gender == 'male')
                                                <li>
                                                    <div class="btf-control checkbox-control hor-div">
                                                        <input type="checkbox" name="family_status_female[]"
                                                            value="0" id="fsf-0" class="btf-checkbox"
                                                            checked="checked">
                                                        <label for="fsf-0" class="btf-label p-0 color-pink">لا
                                                            يهم</label>
                                                    </div>
                                                </li>
                                                @foreach ($prop_group['family_status_female']['optionsvalues'] as $family_options)
                                                    <li>
                                                        <div class="btf-control checkbox-control hor-div"><input
                                                                type="checkbox" name="family_status_female[]"
                                                                value="{{ $family_options['id'] }}"
                                                                id="fsf-{{ $family_options['id'] }}"
                                                                class="btf-checkbox"> <label
                                                                for="fsf-{{ $family_options['id'] }}"
                                                                class="btf-label p-0 ">{{ $family_options['tr_title'] }}</label>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            @else
                                                <li>
                                                    <div class="btf-control checkbox-control hor-div">
                                                        <input type="checkbox" name="family_status[]" value="0"
                                                            id="fs-0" class="btf-checkbox" checked="checked">
                                                        <label for="fs-0" class="btf-label p-0 color-pink">لا
                                                            يهم</label>
                                                    </div>
                                                </li>
                                                @foreach ($prop_group['family_status']['optionsvalues'] as $family_options)
                                                    <li>
                                                        <div class="btf-control checkbox-control hor-div">
                                                            <input type="checkbox" name="family_status[]"
                                                                value="{{ $family_options['id'] }}"
                                                                id="fs-{{ $family_options['id'] }}" class="btf-checkbox">
                                                            <label for="fs-{{ $family_options['id'] }}"
                                                                class="btf-label p-0 ">{{ $family_options['tr_title'] }}</label>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            @endif

                                        </ul>
                                        <div class="clean"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- قسم المظهر  -->
                    <div class=" input-block bg-white p-4 rounded shadow box-form">
                        <h5 class="mb-4">المظهر</h5>
                        <div class="edit-details__content">
                            <div class="row">
                                <div class="col-md-6 form-group"><label class="input-name">لون البشرة :</label>

                                    <div class="box-inputs  ">
                                        <div class="content-3" style="max-height: 230px;" tabindex="0">
                                            <div class="search" dir="rtl">
                                                <ul>
                                                    <li>
                                                        <div class="btf-control checkbox-control">
                                                            <input type="checkbox" name="skin[]" value="0"
                                                                id="sk-0" class="btf-checkbox" checked="checked">
                                                            <label for="sk-0" class="btf-label color-pink ">لا
                                                                يهم</label>
                                                        </div>
                                                    </li>
                                                    @foreach ($prop_group['skin']['optionsvalues'] as $skin)
                                                        <li>
                                                            <div class="btf-control checkbox-control"><input
                                                                    type="checkbox" name="skin[]"
                                                                    value="{{ $skin['id'] }}"
                                                                    id="sk-{{ $skin['id'] }}" class="btf-checkbox">
                                                                <label for="sk-{{ $skin['id'] }}"
                                                                    class="btf-label ">{{ $skin['tr_title'] }}</label>
                                                            </div>
                                                        </li>
                                                    @endforeach

                                                </ul>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 form-group"><label class="input-name">بنية الجسم :</label>
                                    <div class="box-inputs  ">
                                        <div class="content-3" style="max-height: 230px;" tabindex="0">
                                            <div class="search" dir="rtl">
                                                <ul>
                                                    <li>
                                                        <div class="btf-control checkbox-control">
                                                            <input type="checkbox" name="body[]" value="0"
                                                                id="bo-0" class="btf-checkbox" checked>
                                                            <label for="bo-0" class="btf-label color-pink ">لا
                                                                يهم</label>
                                                        </div>
                                                    </li>
                                                    @foreach ($prop_group['body']['optionsvalues'] as $body)
                                                        <li>
                                                            <div class="btf-control checkbox-control">
                                                                <input type="checkbox" name="body[]"
                                                                    value="{{ $body['id'] }}"
                                                                    id="bo-{{ $body['id'] }}" class="btf-checkbox">
                                                                <label for="bo-{{ $body['id'] }}"
                                                                    class="btf-label ">{{ $body['tr_title'] }}</label>
                                                            </div>
                                                        </li>
                                                    @endforeach


                                                </ul>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 form-group d-md-block"><label>الوزن (كغ)</label>
                                    <div dir="ltr">
                                        <b class="b-slide">40</b> <input type="text" name="weight"
                                            id="slider-weight" class="span2" value="" data-slider-min="40"
                                            data-slider-max="200" data-slider-step="1" data-slider-value="[40,200]" /> <b
                                            class="b-slide">
                                            200</b>
                                    </div>
                                </div>
                                <div class="col-md-6 form-group d-md-block"><label>الطول (سم)</label>
                                    <div dir="ltr">
                                        <b class="b-slide">110</b> <input type="text" name="height"
                                            id="slider-height" class="span2  " value="" data-slider-min="110"
                                            data-slider-max="225" data-slider-step="1" data-slider-value="[110,225]" />
                                        <b class="b-slide">
                                            225</b>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- قسم الدراسة  -->
                    <div class=" input-block bg-white p-4 rounded shadow box-form">
                        <h5 class="mb-4">الدراسة و العمل</h5>
                        <div class="edit-details__content">
                            <div class="row">
                                <div class="col-md-6 form-group"><label class="input-name">المستوى التعليمي :</label>

                                    <div class="box-inputs  ">
                                        <div class="content-3" style="max-height: 230px;" tabindex="0">
                                            <div class="search" dir="rtl">
                                                <ul>
                                                    <li>
                                                        <div class="btf-control checkbox-control">
                                                            <input type="checkbox" name="education[]" value="0"
                                                                id="ed-0" class="btf-checkbox" checked>
                                                            <label for="ed-0" class="btf-label color-pink ">لا
                                                                يهم</label>
                                                        </div>
                                                    </li>
                                                    @foreach ($prop_group['education']['optionsvalues'] as $education)
                                                        <li>
                                                            <div class="btf-control checkbox-control"><input
                                                                    type="checkbox" name="education[]"
                                                                    value="{{ $education['id'] }}"
                                                                    id="ed-{{ $education['id'] }}" class="btf-checkbox">
                                                                <label for="ed-{{ $education['id'] }}"
                                                                    class="btf-label ">{{ $education['tr_title'] }}</label>
                                                            </div>
                                                        </li>
                                                    @endforeach

                                                </ul>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 form-group"><label class="input-name">مجال العمل : </label>
                                    <div class="box-inputs  ">
                                        <div class="content-3" style="max-height: 230px;" tabindex="0">
                                            <div class="search" dir="rtl">
                                                <ul>
                                                    <li>
                                                        <div class="btf-control checkbox-control">
                                                            <input type="checkbox" name="work[]" value="0"
                                                                id="wo-0" class="btf-checkbox" checked>
                                                            <label for="wo-0" class="btf-label color-pink ">لا
                                                                يهم</label>
                                                        </div>
                                                    </li>
                                                    @foreach ($prop_group['work']['optionsvalues'] as $work)
                                                        <li>
                                                            <div class="btf-control checkbox-control">
                                                                <input type="checkbox" name="work[]"
                                                                    value="{{ $work['id'] }}"
                                                                    id="wo-{{ $work['id'] }}"
                                                                    class="btf-checkbox"><label
                                                                    for="wo-{{ $work['id'] }}"
                                                                    class="btf-label ">{{ $work['tr_title'] }}</label>
                                                            </div>
                                                        </li>
                                                    @endforeach

                                                </ul>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 form-group box-marital-status"><label class="input-name">الوضع
                                        المادي :</label>
                                    <div class="box-inputs">
                                        <ul class="no-list-style hor">
                                            <li>
                                                <div class="btf-control checkbox-control hor-div">
                                                    <input type="checkbox" name="financial[]" value="0"
                                                        id="fi-0" class="btf-checkbox" checked="checked">
                                                    <label for="fi-0" class="btf-label p-0 color-pink">&nbsp;لا يهم
                                                    </label>
                                                </div>
                                            </li>
                                            @foreach ($prop_group['financial']['optionsvalues'] as $financial)
                                                <li>
                                                    <div class="btf-control checkbox-control hor-div"><input
                                                            type="checkbox" name="financial[]"
                                                            value="{{ $financial['id'] }}"
                                                            id="fi-{{ $financial['id'] }}" class="btf-checkbox"> <label
                                                            for="fi-{{ $financial['id'] }}"
                                                            class="btf-label p-0 ">{{ $financial['tr_title'] }}</label>
                                                    </div>
                                                </li>
                                            @endforeach

                                        </ul>
                                        <div class="clean"></div>
                                    </div>
                                </div>


                            </div>
                        </div>

                    </div>



                    <!-- قسم تعديل  -->
                    <div class=" input-block bg-white p-4 rounded shadow box-form  box-form-last">
                        <h5 class="mb-4">الإلتزام الديني:</h5>
                        <div class="edit-details__content">
                            <div class="row">
                                <div class="col-md-6 form-group"><label class="input-name">التدين :</label>

                                    <div class="box-inputs  ">
                                        <div class="content-3" style="max-height: 230px;" tabindex="0">
                                            <div class="search" dir="rtl">
                                                <ul>
                                                    <li>
                                                        <div class="btf-control checkbox-control">
                                                            <input type="checkbox" name="religiosity[]" value="0"
                                                                id="rel-0" class="btf-checkbox" checked="checked">
                                                            <label for="rel-0" class="btf-label color-pink ">لا
                                                                يهم</label>
                                                        </div>
                                                    </li>
                                                    @foreach ($prop_group['religiosity']['optionsvalues'] as $religiosity)
                                                        <li>
                                                            <div class="btf-control checkbox-control"><input
                                                                    type="checkbox" name="religiosity[]"
                                                                    value="{{ $religiosity['id'] }}"
                                                                    id="rel-{{ $religiosity['id'] }}"
                                                                    class="btf-checkbox"> <label
                                                                    for="rel-{{ $religiosity['id'] }}"
                                                                    class="btf-label ">{{ $religiosity['tr_title'] }}</label>
                                                            </div>
                                                        </li>
                                                    @endforeach

                                                </ul>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 form-group"><label class="input-name">الصلاة : </label>
                                    <div class="box-inputs  ">
                                        <div class="content-3" style="max-height: 230px;" tabindex="0">
                                            <div class="search" dir="rtl">
                                                <ul>
                                                    <li>
                                                        <div class="btf-control checkbox-control">
                                                            <input type="checkbox" name="prayer[]" value="0"
                                                                id="pr-0" class="btf-checkbox" checked="checked">
                                                            <label for="pr-0" class="btf-label color-pink ">لا
                                                                يهم</label>
                                                        </div>
                                                    </li>
                                                    @foreach ($prop_group['prayer']['optionsvalues'] as $prayer)
                                                        <li>
                                                            <div class="btf-control checkbox-control"><input
                                                                    type="checkbox" name="prayer[]"
                                                                    value="{{ $prayer['id'] }}"
                                                                    id="pr-{{ $prayer['id'] }}" class="btf-checkbox">
                                                                <label for="pr-{{ $prayer['id'] }}"
                                                                    class="btf-label ">{{ $prayer['tr_title'] }}</label>
                                                            </div>
                                                        </li>
                                                    @endforeach

                                                </ul>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 form-group box-marital-status">
                                    @if ($client->gender == 'male')
                                        <label class="input-name">الحجاب
                                            :</label>
                                        <div class="box-inputs">
                                            <ul class="no-list-style hor">
                                                <li>
                                                    <div class="btf-control checkbox-control hor-div">
                                                        <input type="checkbox" name="veil[]" value="0"
                                                            id="ve-0" class="btf-checkbox" checked="checked">
                                                        <label for="ve-0" class="btf-label p-0 color-pink">لا
                                                            يهم</label>
                                                    </div>
                                                </li>
                                                @foreach ($prop_group['veil']['optionsvalues'] as $veil)
                                                    <li>
                                                        <div class="btf-control checkbox-control hor-div">
                                                            <input type="checkbox" name="veil[]"
                                                                value="{{ $veil['id'] }}" id="ve-{{ $veil['id'] }}"
                                                                class="btf-checkbox"> <label for="ve-{{ $veil['id'] }}"
                                                                class="btf-label p-0 ">{{ $veil['tr_title'] }}</label>
                                                        </div>
                                                    </li>
                                                @endforeach

                                            </ul>
                                            <div class="clean"></div>
                                        </div>
                                    @else
                                        <label class="input-name">اللحية:
                                            :</label>
                                        <div class="box-inputs">

                                            <ul class="no-list-style hor">
                                                <li>
                                                    <div class="btf-control checkbox-control hor-div">
                                                        <input type="radio" name="beard" value="0"
                                                            id="be-0" class="btf-checkbox" checked> <label
                                                            for="be-0" class="btf-label p-0  color-pink">لا
                                                            يهم</label>
                                                    </div>
                                                </li>
                                                @foreach ($prop_group['beard']['optionsvalues'] as $beard)
                                                    <li>
                                                        <div class="btf-control checkbox-control hor-div">
                                                            <input type="radio" name="beard"
                                                                value="{{ $beard['id'] }}" id="be-{{ $beard['id'] }}"
                                                                class="btf-checkbox"> <label for="be-{{ $beard['id'] }}"
                                                                class="btf-label p-0 ">{{ $beard['tr_title'] }}</label>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>


                                            <div class="clean"></div>
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-12 form-group box-marital-status">
                                    <label class="input-name">التدخين
                                        :</label>
                                    <div class="box-inputs">
                                        <ul class="no-list-style hor">
                                            <li>
                                                <div class="btf-control checkbox-control hor-div">
                                                    <input type="radio" name="smoking" value="0" id="sm-0"
                                                        class="btf-checkbox" checked> <label for="sm-0"
                                                        class="btf-label p-0  color-pink">لا يهم</label>
                                                </div>
                                            </li>
                                            @foreach ($prop_group['smoking']['optionsvalues'] as $smoking)
                                                <li>
                                                    <div class="btf-control checkbox-control hor-div">
                                                        <input type="radio" name="smoking"
                                                            value="{{ $smoking['id'] }}" id="sm-{{ $smoking['id'] }}"
                                                            class="btf-checkbox"> <label for="sm-{{ $smoking['id'] }}"
                                                            class="btf-label p-0 ">{{ $smoking['tr_title'] }}</label>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="submit-block text-center"><button type="submit"
                            class="btn btn-lg btn-primary btn-submit">بحث</button></div>
                </form>

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
        var checkmailurl = "{{ url('checkmail') }}";
        var nowyear = "{{ $nowyear }}";
        var token = '{{ csrf_token() }}';
        var success_msg = "تم الحفظ بنجاح";
        var fail_msg = "لم يتم الحفظ";
        $(function() {
            @include('site.page.sub-all.count-alert') 

        });
    </script>
    <script src="{{ url('assets/site/js/sweetalert.min.js') }}"></script>
    <script src="{{ url('assets/site/js/custom/validate.js') }}"></script>
    <script src="{{ url('assets/site/js/custom/advanec-search.js') }}"></script>
    <script src="{{ url('assets/site/bootstrap/jquery.mCustomScrollbar.concat.min.js') }}"></script>
@endsection
@section('css')
    <link href="{{ url('assets/site/bootstrap/jquery.mCustomScrollbar.min.css') }}" rel="stylesheet">
    <link href="{{ url('assets/site/css/custom/adv-srch.css') }}" rel="stylesheet">
    <link href="{{ url('assets/site/css/custom/slide-range.css') }}" rel="stylesheet">
@endsection
