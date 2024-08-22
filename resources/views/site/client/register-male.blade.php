@extends('site.layouts.home.layout')
@section('content')
    <div class="signup-page">
        <div class="page-hero"></div>
        <main class="container">
            <div class="row main-content">
                <section class="col-md-12">
                    <form action="{{ url($lang, 'register') }}" id="form-signup" method="post" autocomplete="off">
                        <div class="signup-form">
                            <h1>تسجيل زوج</h1>
                            <div class="row"> </div>
                            <div class="signup-form__steps">
                                <ol>
                                    <li id="st1" class="active"><span class="signup-form__steps--number">1</span></li>
                                    <li id="st2"><span class="signup-form__steps--number">2</span></li>
                                    <li id="st3"><span class="signup-form__steps--number">3</span></li>
                                    <li id="st4"><span class="signup-form__steps--number">4</span></li>
                                    <li id="st5"><span class="signup-form__steps--number">5</span></li>
                                </ol>
                                <div class="signup-form__steps--progress-bar">
                                    <div class="signup-form__steps--progress" style="width:25%"></div>
                                </div>
                            </div>
                            <div class="signup-form__content show " id="signup-step1">
                                <h2>معلومات تسجيل الدخول</h2>
                                <div class="row">
                                    <div class="form-group col-md-6"><label>إسم المستخدم <sup>*</sup></label> <label
                                            class="validating-username options">
                                            <img class="loading" style=" display: none;"
                                                src="{{ asset('assets/site/img/svg-spinner.svg') }}" width="24px"
                                                height="24px" alt="تحميل"> <span style="color: red; display: none;">غير
                                                متاح</span></label>
                                        <input class="form-control   required " name="name" id="name"
                                            placeholder="أدخل إسم المستخدم الخاص بك" value="" maxlength="15"
                                            autocomplete="off">
                                    </div>
                                    <div class="col-md-6">
                                        <div class="signup-form__rules">
                                            <h3>إسم المستخدم :</h3>
                                            <ul>
                                                <li>يجب ان يكون اقل من 15 حرف</li>
                                                <li>يجب ان يكون محترما لائقا بك و ليس سخيفا او مهينا</li>
                                                <li>سيظهر لكل الاعضاء</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6"><label>البريد الإلكتروني</label> 
                                        <img class="loading mail-load" style=" display: none;"
                                        src="{{ asset('assets/site/img/svg-spinner.svg') }}" width="24px"
                                        height="24px" alt="تحميل">
                                        <span id="validate-email" style="display: none;"></span>
                                        <input type="email"
                                            class="form-control  " name="email" id="email"
                                            placeholder="أدخل بريدك الالكتروني" value=""></div>
                                    <div class="col-md-6"></div>
                                    <div class="form-group col-md-6 pass"><label>كلمة المرور <sup>*</sup></label> <input
                                            type="password" class="form-control   required" name="password" id="password"
                                            placeholder="كلمة المرور" value="" minlength="6" autocomplete="off">
                                    </div>
                                    <div class="form-group col-md-6 pass"><label>تاكيد كلمة المرور <sup>*</sup></label>
                                        <input type="password" class="form-control   required" name="confirm_password"
                                            id="confirm_password" placeholder="اعادة كتابة كلمة المرور" value=""
                                            minlength="6" autocomplete="off">
                                    </div>
                                </div>
                                <h2>الحالة الإجتماعية</h2>
                                <div class="row">
                                    <div class="col-md-6 form-group"><label>نوع الزواج <sup>*</sup></label>
                                        <div class="dropdown bootstrap-select std_select std_select_big required">
                                            <select name="wife_num" id="wife_num"
                                                class=" form-control std_select std_select_big required mobile-device">
                                                <option value="0">إختر ..</option>

                                                @foreach ($prop_group['wife_num']['optionsvalues'] as $family_options)
                                                    <option value="{{ $family_options['id'] }}">
                                                        {{ $family_options['tr_title'] }}</option>
                                                @endforeach
                                            </select>


                                        </div>
                                    </div>
                                    <div class="col-md-6 form-group"><label>الحالة العائلية <sup>*</sup></label>
                                        <div class="dropdown bootstrap-select std_select std_select_big required">
                                            <select name="family_status" id="family_status"
                                                class=" form-control std_select std_select_big required mobile-device">
                                                <option value="0">إختر ..</option>
                                                @foreach ($prop_group['family_status']['optionsvalues'] as $family_options)
                                                    <option value="{{ $family_options['id'] }}">
                                                        {{ $family_options['tr_title'] }}</option>
                                                @endforeach
                                            </select>


                                        </div>
                                    </div>
                                    <div class="col-md-6 form-group"><label>تاريخ الميلاد <sup>*</sup></label>

                                        <div id="birthdatepicker" class="input-group date " data-date-format="dd-mm-yyyy">
                                            <input class="form-control" name="birthdate" id="birthdate" type="text" />
                                            <span class="input-group-addon">
                                                <i class="bi bi-calendar"></i>
                                            </span>
                                        </div>

                                    </div>
                                    <div class="col-md-6 form-group"><label>عدد الأطفال <sup>*</sup></label>
                                        <div class="dropdown bootstrap-select std_select std_select_big required dropup">
                                            <select name="children_num" id="children_num"
                                                class="form-control std_select std_select_big required mobile-device">
                                                <option value="-1">إختر ..</option>
                                                <option value="0" selected="">بدون أطفال</option>
                                                @php
                                                    $i = 0;
                                                @endphp
                                                @for ($i = 1; $i <= 10; $i++)
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor

                                            </select>


                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div
                                        class="col-md-12 btn-box d-flex justify-content-between flex-row-reverse signup-form__btns">
                                        <button type="button" class="btn btn-lg btn-primary next" data-step="2">التالي
                                            <i class="icon_nextone"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="signup-form__content " id="signup-step2">
                                <h2>الجنسية و الإقامة</h2>
                                <div class="row">
                                    <div class="col-md-6 form-group"><label>مكان الإقامة <sup>*</sup></label>
                                        <div class="dropdown bootstrap-select std_select std_select_big required">
                                            <select name="residence" id="residence"
                                                class=" form-control std_select std_select_big required mobile-device">
                                                <option value="0">إختر ..</option>
                                                @foreach ($prop_group['countries'] as $country)
                                                    <option value="{{ $country->id }}">{{ $country->name_ar }}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>
                                    <div class="col-md-6 form-group"><label>الجنسية <sup>*</sup></label>
                                        <div class="dropdown bootstrap-select std_select std_select_big required">

                                            <select name="nationality" id="nationality"
                                                class=" form-control std_select std_select_big required mobile-device">
                                                <option value="0">إختر ..</option>

                                                @foreach ($prop_group['countries'] as $country)
                                                    <option value="{{ $country->id }}">{{ $country->name_ar }}</option>
                                                @endforeach
                                                </select>

                                        </div>
                                    </div>
                                    <div class="col-md-6 form-group"><label>المدينة <sup>*</sup></label> <label
                                            class="loading options" style="display: none;"> </label>
                                        <img class="loading city-load" style=" display: none;"
                                            src="{{ asset('assets/site/img/svg-spinner.svg') }}" width="24px"
                                            height="24px" alt="تحميل">

                                        <div class="dropdown bootstrap-select std_select std_select_big required dropup">
                                            <select name="city" id="city"
                                                class=" form-control std_select std_select_big required mobile-device"
                                                data-defaultvalue="0">
                                                <option></option>
                                            </select>


                                        </div>
                                    </div>

                                </div>
                                <h2>مواصفاتك</h2>
                                <div class="row">
                                    <div class="col-md-6 form-group"><label>الوزن (كغ) <sup>*</sup></label>
                                        <div class="dropdown bootstrap-select std_select std_select_big required">
                                            <select name="weight"  id="weight"
                                                class="form-control std_select std_select_big required mobile-device">
                                                <option value="0">إختر ..</option>
                                                @php
                                                    $i = 0;
                                                @endphp
                                                @for ($i = 40; $i <= 200; $i++)
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor
                                            </select>

                                        </div>
                                    </div>
                                    <div class="col-md-6 form-group"><label>الطول (سم) <sup>*</sup></label>
                                        <div class="dropdown bootstrap-select std_select std_select_big required">
                                            <select name="height" id="height"
                                                class="form-control std_select std_select_big required mobile-device">
                                                <option value="0">إختر ..</option>
                                                
                                                @php
                                                    $i = 0;
                                                @endphp
                                                @for ($i = 110; $i <= 225; $i++)
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 form-group"><label>لون البشرة <sup>*</sup></label>
                                        <div class="dropdown bootstrap-select std_select std_select_big required">
                                            <select
                                                name="skin" id="skin"
                                                class="form-control std_select std_select_big required mobile-device">
                                                <option value="0">إختر ..</option>
                                                @foreach ($prop_group['skin']['optionsvalues'] as $skin)
                                                <option value="{{ $skin['id'] }}">
                                                    {{ $skin['tr_title'] }}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 form-group"><label>بنية الجسم<sup>*</sup></label>
                                        <div class="dropdown bootstrap-select std_select std_select_big required"><select
                                                name="body" id="body"
                                                class="form-control std_select std_select_big required mobile-device">
                                                <option value="0">إختر ..</option>
                                                @foreach ($prop_group['body']['optionsvalues'] as $body)
                                                <option value="{{ $body['id'] }}">
                                                    {{ $body['tr_title'] }}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div
                                        class="col-md-12 btn-box d-flex justify-content-between flex-row-reverse signup-form__btns">
                                        <button type="button" class="btn btn-lg btn-primary next"
                                            data-step="3"><span>التالي</span><i class="icon_nextone"></i></button>
                                        <button type="button" class="btn btn-lg btn-outline-primary prev"
                                            data-step="1"><i class="ico ico-angle-right"></i>
                                            <span>السابق</span></button>
                                    </div>
                                </div>
                            </div>
                            <div class="signup-form__content  " id="signup-step3">
                                <h2>الإلتزام الديني</h2>
                                <div class="row">
                                    <div class="col-md-6 form-group"><label>التدين <sup>*</sup></label>
                                        <div class="dropdown bootstrap-select std_select std_select_big required">
                                            <select name="religiosity" id="religiosity"
                                                class="form-control std_select std_select_big required mobile-device">
                                                <option value="0">إختر ..</option>
                                                @foreach ($prop_group['religiosity']['optionsvalues'] as $religiosity)
                                                <option value="{{ $religiosity['id'] }}">
                                                    {{ $religiosity['tr_title'] }}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 form-group"><label>الصلاة <sup>*</sup></label>
                                        <div class="dropdown bootstrap-select std_select std_select_big required">
                                            <select name="prayer" id="prayer"
                                                class="form-control std_select std_select_big required mobile-device">
                                                <option value="0">إختر ..</option>
                                                @foreach ($prop_group['prayer']['optionsvalues'] as $prayer)
                                                <option value="{{ $prayer['id'] }}">
                                                    {{ $prayer['tr_title'] }}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 form-group"><label>التدخين <sup>*</sup></label>
                                        <div class="dropdown bootstrap-select std_select std_select_big required">
                                            <select name="smoking" id="smoking"
                                                class="form-control std_select std_select_big required mobile-device">
                                                <option value="0">إختر ..</option>
                                                @foreach ($prop_group['smoking']['optionsvalues'] as $smoking)
                                                <option value="{{ $smoking['id'] }}">
                                                    {{ $smoking['tr_title'] }}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 form-group"><label>اللحية <sup>*</sup></label>
                                        <div class="dropdown bootstrap-select std_select std_select_big required">
                                            <select name="beard" id="beard"
                                                class="form-control std_select std_select_big required mobile-device">
                                                <option value="0">إختر ..</option>
                                                @foreach ($prop_group['beard']['optionsvalues'] as $beard)
                                                <option value="{{ $beard['id'] }}">
                                                    {{ $beard['tr_title'] }}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <h2>الدراسة و العمل</h2>
                                <div class="row">
                                    <div class="col-md-6 form-group"><label>المستوى التعليمي <sup>*</sup></label>
                                        <div class="dropdown bootstrap-select std_select std_select_big required">
                                            <select name="education" id="education"
                                                class="form-control std_select std_select_big required mobile-device">
                                                <option value="0">إختر ..</option>
                                                @foreach ($prop_group['education']['optionsvalues'] as $education)
                                                <option value="{{ $education['id'] }}">
                                                    {{ $education['tr_title'] }}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 form-group"><label>الوضع المادي <sup>*</sup></label>
                                        <div class="dropdown bootstrap-select std_select std_select_big required">
                                            <select name="financial" id="financial"
                                                class="form-control std_select std_select_big required mobile-device">
                                                <option value="0">إختر ..</option>
                                                @foreach ($prop_group['financial']['optionsvalues'] as $financial)
                                                <option value="{{ $financial['id'] }}">
                                                    {{ $financial['tr_title'] }}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 form-group"><label>مجال العمل <sup>*</sup></label>
                                        <div class="dropdown bootstrap-select std_select std_select_big required">
                                            <select name="work" id="work"
                                                class="form-control std_select std_select_big required mobile-device">
                                                <option value="0">إختر ..</option>                                                
                                                @foreach ($prop_group['work']['optionsvalues'] as $work)
                                                <option value="{{ $work['id'] }}">{{ $work['tr_title'] }}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 form-group"><label>الوظيفة <sup>*</sup></label>
                                         <input dir="auto" class="form-control  required" name="job" id="job"
                                            value="بدون عمل حاليا" placeholder="ادخل الوظيفة"></div>
                                   
                                            <div class="col-md-6 form-group"><label>{{$prop_group['income']['tr_title']}}<sup>*</sup></label>
                                        <div class="dropdown bootstrap-select std_select std_select_big dropup">
                                            <select name="income" id="income"
                                                class="form-control std_select std_select_big mobile-device"
                                                data-defaultvalue="0">
                                                <option value="0">إختر ..</option>
                                                @foreach ($prop_group['income']['optionsvalues'] as $income)
                                                <option value="{{ $income['id'] }}">{{ $income['tr_title'] }}</option>
                                            @endforeach
                                            </select>

                                        </div>
                                    </div>
                                    <div class="col-md-6 form-group"><label>الحالة الصحية <sup>*</sup></label>
                                        <div class="dropdown bootstrap-select std_select std_select_big">
                                            <select
                                                name="health" id="health"
                                                class="form-control std_select std_select_big mobile-device">
                                                <option value="">إختر ..</option>
                                                @foreach ($prop_group['health']['optionsvalues'] as $health)
                                                <option value="{{ $health['id'] }}">{{ $health['tr_title'] }}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div
                                        class="col-md-12 btn-box d-flex justify-content-between flex-row-reverse signup-form__btns">
                                        <button type="button" class="btn btn-lg btn-primary next" data-step="4">التالي
                                            <i class="icon_nextone"></i></button> <button type="button"
                                            class="btn btn-lg btn-outline-primary prev" data-step="2"><i
                                                class="ico ico-angle-right"></i> <span>السابق</span></button>
                                    </div>
                                </div>
                            </div>
                            <div class="signup-form__content " id="signup-step4">
                                <div class="row">


                                    <div class="col-md-12">
                                        <div class="row signup-form__subcontent">
                                            <div class="col-md-12">
                                                <h2>مواصفات شريكة حياتك التي ترغب الإرتباط بها</h2>
                                                <p>يرجى الكتابة بطريقة جادة. يمنع كتابة البريد الإلكتروني أو رقم الهاتف
                                                    في هذا المكان</p>
                                            </div>
                                            <div class="row col-md-12">
                                                <div class="col-md-12">
                                                    <textarea name="partner" id="partner" class="form-control"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row signup-form__subcontent">
                                            <div class="col-md-12">
                                                <h2>تحدث عن نفسك</h2>
                                                <p>يرجى الكتابة بطريقة جادة. يمنع كتابة البريد الإلكتروني أو رقم الهاتف
                                                    في هذا المكان</p>
                                            </div>
                                            <div class="row col-md-12">
                                                <div class="col-md-12">
                                                    <textarea name="about_me" id="about_me" class="form-control"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="col-md-12 btn-box d-flex justify-content-between flex-row-reverse signup-form__btns">
                                        <button type="button" class="btn btn-lg btn-primary next" data-step="5">التالي
                                            <i class="icon_nextone"></i></button> <button type="button"
                                            class="btn btn-lg btn-outline-primary prev" data-step="3"><i
                                                class="ico ico-angle-right"></i> <span>السابق</span></button>
                                    </div>
                                </div>
                            </div>
                            <div class="signup-form__content" id="signup-step5">
                                <h2>البيانات السرية</h2>
                                <div class="row">
                                    <div class="form-group col-md-6"><label>الاسم الكامل <sup>*</sup></label> 
                                        <input class="form-control  " name="first_name" id="first_name" value=""
                                            placeholder="اسمك الكامل"></div>
                                    <div class="form-group col-md-6"><label>رقم الجوال <sup>*</sup></label> 
                                        <input
                                            class="form-control " name="mobile" id="mobile" value=""
                                            placeholder="إدخل رقم هاتفك">
                                        </div>
                                    <div class="col-md-12">
                                        <div class="signup-form__rules signup-form__rules--data">
                                            <h3>حول اسمك الكامل و رقم جوالك :</h3>
                                            <ul>
                                                <li>الاسم الكامل ورقم الجوال معلومات خاصة بالإدارة ولن تظهر لأحد أبدا
                                                </li>
                                                <li>كتابتك لهذه المعلومات بالشكل الصحيح هو تأكيد منك على جديتك في الزواج
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12 conditions-accept">
                                        <div class="btf-control"><input type="checkbox" name="acceptConditions" id="acceptConditions"
                                                class="btf-checkbox" id="accept-conditions" value="1"> <label
                                                class="btf-label" for="accept-conditions">&nbsp;لقد قرأت <a
                                                    href="/ar/terms-conditions" target="_blank">شروط و قوانين
                                                    الإستخدام</a> وأوافق على كل ماجاء فيها وسألتزم بها إن شاء
                                                الله.</label></div>
                                    </div>
                                    <div
                                        class="col-md-12 btn-box d-flex justify-content-between flex-row-reverse signup-form__btns">
                                        <button type="submit" class="btn btn-lg btn-primary next btn"
                                            data-step="6">حفظ</button> 
                                            <button type="button" class="btn btn-lg btn-outline-primary prev" data-step="4"><i
                                                class="ico ico-angle-right"></i> <span>السابق</span></button>
                                    </div>
                                </div>
                            </div>
                            <div class="signup-form__content" id="signup-step6">
                                <div class="row">
                                    <div class="col-md-12"><button type="button "
                                            class="btn btn-lg btn-outline-primary loading  "><img
                                                src="{{ asset('assets/site/img/svg-spinner.svg') }}" width="24px"
                                                height="24px" alt="تحميل">
                                            <span>جاري التدقيق في بياناتك ..</span></button></div>
                                </div>
                            </div>
                        </div><input type="hidden" name="gender" value="male">
                        @csrf
                    </form>
                </section>
            </div>
        </main>
    </div>
@endsection
@section('css')
    <link href="{{ asset('assets/site/css/custom/sign-form.css') }}" rel="stylesheet">
@endsection
@section('js')
    <script>
        var input_required = "{{ $sitedataCtrlr->gettrans($register, 'required') }}";
        var input_email = "{{ $sitedataCtrlr->gettrans($register, 'input-email') }}";
        var success_msg = "{{ $sitedataCtrlr->gettrans($register, 'success-register') }}";
        var fail_msg = "{{ $sitedataCtrlr->gettrans($register, 'fail-register') }}";
        var lang = "{{ $lang }}";
        var verifurl = "{{ route('verify.index') }}";
        var cityurl = "{{ url('cities', 'ItemId') }}";
        var checkmailurl = "{{ url('checkmail') }}";
        var nowyear = "{{ $nowyear}}";
        var token= '{{ csrf_token() }}';
    </script>
    <script src="{{ url('assets/site/js/sweetalert.min.js') }}"></script>
    <script src="{{ url('assets/site/js/custom/validate.js') }}"></script>
    <script src="{{ url('assets/site/js/custom/register.js') }}"></script>
@endsection
