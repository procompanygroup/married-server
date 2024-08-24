@extends('site.layouts.home-signed.layout')
@section('content')
    <div class="container-fluid mt-3 pt-3">
        <div class="row">
            <!-- القسم الجانبي -->
            <aside class="col-lg-3 col-md-4">
                <div class="profile-sidebar">
                    <div class="profile-header bg-info text-center p-3">
                        <img src="img/user.jpg" alt="User" class="rounded-circle mb-2">
                        <h5>اسم العضو</h5>
                    </div>
                    <div class="profile-content   p-3">
                        <ul class="list-unstyled">
                            <li> <a href="#"><i class="bi bi-award"></i> إمتيازاتي</a></li>
                            <li> <a href="#"><i class="bi bi-bell"></i> الإشعارات</a></li>
                            <li> <a href="#"><i class="bi bi-envelope"></i> بريدي الداخلي</a></li>
                            <li> <a href="#"><i class="bi bi-person-hearts"></i> من هو مهتم بملفي</a></li>
                            <li> <a href="#"><i class="bi bi-heart"></i> قائمة الإهتمام والتجاهل</a></li>
                            <li> <a href="#"><i class="bi bi-eye"></i> من زار بياناتي</a></li>
                            <li> <a href="#"><i class="bi bi-images"></i> صور الأعضاء</a></li>
                            <li> <a href="#"><i class="bi bi-search"></i> الباحث الآلي</a></li>
                            <li> <a href="#"><i class="bi bi-card-checklist"></i> تفعيل بطاقة مودة</a></li>
                        </ul>
                    </div>
                </div>
            </aside>

            <!-- قسم تعديل البيانات -->
            <section class=" content-sec col-lg-7 col-md-6">

                <h3>تعديل بياناتي</h3>
                <div class="bg-white p-4 rounded shadow box-form">
                    <h5 class="mb-4">معلومات تسجيل الدخول</h5>
                    <div class="edit-details__content">
                        <table>
                            <tbody>
                                <tr>
                                    {{-- <th><label>رقم العضوية</label></th>
                                <td>10004477</td>
                                <td>&nbsp;</td> --}}
                                </tr>
                                <tr>
                                    <th><label>إسم المستخدم</label></th>
                                    <td dir="auto">{{ $client->client->name }}</td>
                                    <td><a href="{{ route('client.edit_username', $lang) }}"
                                            class="btn btn-sm btn-outline-danger  edit-btn btn-edit-username"><i
                                                class="bi bi-pen"></i>
                                            <span>تعديل إسم المستخدم</span></a></td>
                                </tr>
                                <tr>
                                    <th><label>تاريخ التسجيل</label></th>
                                    <td dir="auto">{{ $user_reg_date }}</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <th><label>كلمة المرور <sup>*</sup></label></th>
                                    <td><input type="password" class="form-control" name="password" value="*******"
                                            readonly="readonly"></td>
                                    <td><a href="{{ route('client.edit_password', $lang) }}"
                                            class="btn btn-sm btn-outline-danger  edit-btn"><i class="bi bi-pen"></i>
                                            <span>تعديل كلمة السر</span></a></td>
                                </tr>
                                <tr class="email-block">
                                    <th><label>البريد الإلكتروني </label>:</th>
                                    <td><input type="email" class="form-control" name="email"
                                            value="{{ $client->client->email }}" readonly="readonly"></td>
                                    <td class="actions">
                                        <div><a href="{{ route('client.edit_email', $lang) }}"
                                                class="btn btn-sm btn-outline-danger  edit-btn">
                                                <i class="bi bi-pen"></i> تعديل بريدك الإكتروني </a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="edit-details__more">
                        <form action ="{{ url('u/delete') }}" method="POST" name="del-form" id="del-form"
                            enctype="multipart/form-data">
                            @csrf
                            <p> هل ترغب بحذف عضويتك ؟ <button type="submit" id="btn-delete" class="btn-delete">حذف</button>
                            </p>

                        </form>

                    </div>
                </div>
                <!-- قسم تعديل الاقامة -->
                <form action="{{ route('client.update', $lang) }}" id="form-profile" name="form-profile" method="post" autocomplete="off">
                    <div class=" input-block bg-white p-4 rounded shadow box-form">
                        <h5 class="mb-4">الجنسية و الإقامة</h5>
                        <div class="edit-details__content">
                            <div class="row">
                                <div class="col-md-6 form-group"><label>مكان الإقامة <sup>*</sup></label>
                                    <div class="dropdown bootstrap-select std_select std_select_big required">
                                        <select name="residence" id="residence"
                                            class=" form-control std_select std_select_big required mobile-device">
                                            <option value="0">إختر ..</option>
                                            @foreach ($prop_group['countries'] as $country)
                                                <option value="{{ $country->id }}"
                                                    @if ($client->residence->country_id == $country->id) @selected(true) @endif>
                                                    {{ $country->name_ar }}</option>
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
                                                <option value="{{ $country->id }}"
                                                    @if ($client->nationality->country_id == $country->id) @selected(true) @endif>
                                                    {{ $country->name_ar }}</option>
                                            @endforeach
                                        </select>

                                        <div class="dropdown-menu ">
                                            <div class="inner show" role="listbox" id="bs-select-2" tabindex="-1">
                                                <ul class="dropdown-menu inner show" role="presentation"></ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 form-group"><label>المدينة <sup>*</sup></label>
                                    <label class="loading options" style="display: none;"> </label>
                                    <img class="loading city-load" style=" display: none;"
                                        src="{{ asset('assets/site/img/svg-spinner.svg') }}" width="24px" height="24px"
                                        alt="تحميل">

                                    <div class="dropdown bootstrap-select std_select std_select_big required dropup">
                                        <select name="city" id="city"
                                            class=" form-control std_select std_select_big required mobile-device"
                                            data-defaultvalue="0">
                                            <option></option>
                                        </select>


                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

                    <!-- قسم الحالة الإجتماعية-->
                    <div class=" input-block bg-white p-4 rounded shadow box-form">
                        <h5 class="mb-4">الحالة الإجتماعية</h5>
                        <div class="edit-details__content">
                            <div class="row">
                                @if ($client->client->gender == 'male')
                                    <div class="col-md-6 form-group"><label>نوع الزواج <sup>*</sup></label>
                                        <div class="dropdown bootstrap-select std_select std_select_big required">
                                            <select name="wife_num" id="wife_num"
                                                class=" form-control std_select std_select_big required mobile-device">
                                                <option value="0">إختر ..</option>
                                                @foreach ($prop_group['wife_num']['optionsvalues'] as $family_options)
                                                    <option value="{{ $family_options['id'] }}"
                                                        @if ($client->wife_num->option_id == $family_options['id']) @selected(true) @endif>
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
                                                    <option value="{{ $family_options['id'] }}"
                                                        @if ($client->family_status->option_id == $family_options['id']) @selected(true) @endif>
                                                        {{ $family_options['tr_title'] }}</option>
                                                @endforeach
                                            </select>


                                        </div>
                                    </div>
                                @else
                                    <div class="col-md-6 form-group"><label>نوع الزواج <sup>*</sup></label>
                                        <div class="dropdown bootstrap-select std_select std_select_big required">
                                            <select name="wife_num_female" id="wife_num_female"
                                                class=" form-control std_select std_select_big required mobile-device">
                                                <option value="0">إختر ..</option>
                                                @foreach ($prop_group['wife_num_female']['optionsvalues'] as $family_options)
                                                    <option value="{{ $family_options['id'] }}"
                                                        @if ($client->wife_num_female->option_id == $family_options['id']) @selected(true) @endif>
                                                        {{ $family_options['tr_title'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6 form-group"><label>الحالة العائلية <sup>*</sup></label>
                                        <div class="dropdown bootstrap-select std_select std_select_big required">
                                            <select name="family_status_female" id="family_status_female"
                                                class=" form-control std_select std_select_big required mobile-device">
                                                <option value="0">إختر ..</option>
                                                @foreach ($prop_group['family_status_female']['optionsvalues'] as $family_options)
                                                    <option value="{{ $family_options['id'] }}"
                                                        @if ($client->family_status_female->option_id == $family_options['id']) @selected(true) @endif>
                                                        {{ $family_options['tr_title'] }}</option>
                                                @endforeach
                                            </select>


                                        </div>
                                    </div>
                                @endif



                                <div class="col-md-6 form-group"><label>تاريخ الميلاد <sup>*</sup></label>
                                    <div id="birthdatepicker" class="input-group date " data-date-format="dd-mm-yyyy">
                                        <input class="form-control" name="birthdate" id="birthdate" type="text"
                                            value="{{ $birthdateStr }}" />
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
                                            <option value="0"
                                                @if ($client->children_num->val == 0) @selected(true) @endif>بدون
                                                أطفال</option>
                                            @php
                                                $i = 0;
                                            @endphp
                                            @for ($i = 1; $i <= 10; $i++)
                                                <option value="{{ $i }}"
                                                    @if ($client->children_num->val == $i) @selected(true) @endif>
                                                    {{ $i }}</option>
                                            @endfor

                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>


                    <!-- مواصفاتك-->
                    <div class=" input-block bg-white p-4 rounded shadow box-form">
                        <h5 class="mb-4">مواصفاتك</h5>
                        <div class="edit-details__content">
                            <div class="row">
                                <div class="col-md-6 form-group"><label>الوزن (كغ) <sup>*</sup></label>
                                    <div class="dropdown bootstrap-select std_select std_select_big required">
                                        <select name="weight" id="weight"
                                            class="form-control std_select std_select_big required mobile-device">
                                            <option value="0">إختر ..</option>
                                            @php
                                                $i = 0;
                                            @endphp
                                            @for ($i = 40; $i <= 200; $i++)
                                                <option value="{{ $i }}"
                                                    @if ($client->weight->val == $i) @selected(true) @endif>
                                                    {{ $i }}</option>
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
                                                <option value="{{ $i }}"
                                                    @if ($client->height->val == $i) @selected(true) @endif>
                                                    {{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 form-group"><label>لون البشرة <sup>*</sup></label>
                                    <div class="dropdown bootstrap-select std_select std_select_big required">
                                        <select name="skin" id="skin"
                                            class="form-control std_select std_select_big required mobile-device">
                                            <option value="0">إختر ..</option>
                                            @foreach ($prop_group['skin']['optionsvalues'] as $skin)
                                                <option value="{{ $skin['id'] }}"
                                                    @if ($client->skin->option_id == $skin['id']) @selected(true) @endif>
                                                    {{ $skin['tr_title'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 form-group"><label>بنية الجسم<sup>*</sup></label>
                                    <div class="dropdown bootstrap-select std_select std_select_big required">
                                        <select name="body" id="body"
                                            class="form-control std_select std_select_big required mobile-device">
                                            <option value="0">إختر ..</option>
                                            @foreach ($prop_group['body']['optionsvalues'] as $body)
                                                <option value="{{ $body['id'] }}"
                                                    @if ($client->body->option_id == $body['id']) @selected(true) @endif>
                                                    {{ $body['tr_title'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>



                    <!-- الإلتزام الديني-->
                    <div class=" input-block bg-white p-4 rounded shadow box-form">
                        <h5 class="mb-4">الإلتزام الديني</h5>
                        <div class="edit-details__content">
                            <div class="row">
                                <div class="col-md-6 form-group"><label>التدين <sup>*</sup></label>
                                    <div class="dropdown bootstrap-select std_select std_select_big required">
                                        <select name="religiosity" id="religiosity"
                                            class="form-control std_select std_select_big required mobile-device">
                                            <option value="0">إختر ..</option>
                                            @foreach ($prop_group['religiosity']['optionsvalues'] as $religiosity)
                                                <option value="{{ $religiosity['id'] }}"
                                                    @if ($client->religiosity->option_id == $religiosity['id']) @selected(true) @endif>
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
                                                <option value="{{ $prayer['id'] }}"
                                                    @if ($client->prayer->option_id == $prayer['id']) @selected(true) @endif>
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
                                                <option value="{{ $smoking['id'] }}"
                                                    @if ($client->smoking->option_id == $smoking['id']) @selected(true) @endif>
                                                    {{ $smoking['tr_title'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                @if ($client->client->gender == 'male')
                                    <div class="col-md-6 form-group"><label>اللحية <sup>*</sup></label>
                                        <div class="dropdown bootstrap-select std_select std_select_big required">
                                            <select name="beard" id="beard"
                                                class="form-control std_select std_select_big required mobile-device">
                                                <option value="0">إختر ..</option>
                                                @foreach ($prop_group['beard']['optionsvalues'] as $beard)
                                                    <option value="{{ $beard['id'] }}"
                                                        @if ($client->beard->option_id == $beard['id']) @selected(true) @endif>
                                                        {{ $beard['tr_title'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                @else
                                    <div class="col-md-6 form-group"><label>الحجاب<sup>*</sup></label>
                                        <div class="dropdown bootstrap-select std_select std_select_big required">
                                            <select name="veil" id="veil"
                                                class="form-control std_select std_select_big required mobile-device">
                                                <option value="0">إختر ..</option>
                                                @foreach ($prop_group['veil']['optionsvalues'] as $veil)
                                                    <option value="{{ $veil['id'] }}"
                                                        @if ($client->veil->option_id == $veil['id']) @selected(true) @endif>
                                                        {{ $veil['tr_title'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>

                    </div>


                    <!-- الدراسة و العمل -->
                    <div class=" input-block bg-white p-4 rounded shadow box-form">
                        <h5 class="mb-4">الدراسة و العمل</h5>
                        <div class="edit-details__content">
                            <div class="row">
                                <div class="col-md-6 form-group"><label>المستوى التعليمي <sup>*</sup></label>
                                    <div class="dropdown bootstrap-select std_select std_select_big required">
                                        <select name="education" id="education"
                                            class="form-control std_select std_select_big required mobile-device">
                                            <option value="0">إختر ..</option>
                                            @foreach ($prop_group['education']['optionsvalues'] as $education)
                                                <option value="{{ $education['id'] }}"
                                                    @if ($client->education->option_id == $education['id']) @selected(true) @endif>
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
                                                <option value="{{ $financial['id'] }}"
                                                    @if ($client->financial->option_id == $financial['id']) @selected(true) @endif>
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
                                                <option value="{{ $work['id'] }}"
                                                    @if ($client->work->option_id == $work['id']) @selected(true) @endif>
                                                    {{ $work['tr_title'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 form-group"><label>الوظيفة <sup>*</sup></label>
                                    <input dir="auto" class="form-control  required" name="job" id="job"
                                        value="{{ $client->job->val }}" placeholder="ادخل الوظيفة">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>{{ $prop_group['income']['tr_title'] }}<sup>*</sup></label>
                                    <div class="dropdown bootstrap-select std_select std_select_big dropup">
                                        <select name="income" id="income"
                                            class="form-control std_select std_select_big mobile-device"
                                            data-defaultvalue="0">
                                            <option value="0">إختر ..</option>
                                            @foreach ($prop_group['income']['optionsvalues'] as $income)
                                                <option value="{{ $income['id'] }}"
                                                    @if ($client->income->option_id == $income['id']) @selected(true) @endif>
                                                    {{ $income['tr_title'] }}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                                <div class="col-md-6 form-group"><label>الحالة الصحية <sup>*</sup></label>
                                    <div class="dropdown bootstrap-select std_select std_select_big">
                                        <select name="health" id="health"
                                            class="form-control std_select std_select_big mobile-device">
                                            <option value="">إختر ..</option>
                                            @foreach ($prop_group['health']['optionsvalues'] as $health)
                                                <option value="{{ $health['id'] }}"
                                                    @if ($client->health->option_id == $health['id']) @selected(true) @endif>
                                                    {{ $health['tr_title'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- مواصفات شريكة -->
                    <div class=" input-block bg-white p-4 rounded shadow box-form">
                        @if ($client->client->gender == 'male')
                            <h5 class="mb-4">مواصفات شريكة حياتك التي ترغب الإرتباط بها</h5>
                        @else
                            <h2>مواصفات شريك حياتك الذي ترغبين الإرتباط به</h2>
                        @endif
                        <p><strong>يرجى الكتابة بطريقة جادة. يمنع كتابة البريد الإلكتروني أو رقم الهاتف في هذا
                                المكان</strong></p>
                        <div class="row">
                            <div class="col-md-12">
                                <textarea name="partner" id="partner" class="form-control">{{ $client->partner->val }}</textarea>
                            </div>
                        </div>

                    </div>

                    <!-- تحدث عن نفسك-->
                    <div class=" input-block bg-white p-4 rounded shadow box-form">
                        @if ($client->client->gender == 'male')
                            <h5 class="mb-4">تحدث عن نفسك</h5>
                        @else
                            <h5 class="mb-4">تحدثي عن نفسك</h5>
                        @endif
                        <p><strong>يرجى الكتابة بطريقة جادة. يمنع كتابة البريد الإلكتروني أو رقم الهاتف في هذا
                                المكان</strong></p>
                        <div class="row">
                            <div class="col-md-12">
                                <textarea name="about_me" id="about_me" class="form-control">{{ $client->about_me->val }}</textarea>
                            </div>
                        </div>

                    </div>


                    <!-- البيانات السرية-->
                    <div class=" input-block bg-white p-4 rounded shadow box-form  box-form-last">
                        <h5 class="mb-4">البيانات السرية</h5>
                        <div class="row">
                            <div class="col-md-6 form-group"><label>الاسم الكامل <sup>*</sup></label>
                                <input class="form-control  " name="first_name" id="first_name"
                                    value="{{ $client->client->first_name }}" placeholder="اسمك الكامل">
                            </div>
                            <div class="col-md-6 form-group"><label>رقم الجوال <sup>*</sup></label>
                                <input class="form-control " name="mobile" id="mobile"
                                    value="{{ $client->client->mobile }}" placeholder="إدخل رقم هاتفك">
                            </div>
                        </div>
                        <div class="input-feature-block">
                            <h6 class="feature-h"><strong>حول اسمك الكامل و رقم جوالك :</strong></h6>
                            <ul>
                                <li>الاسم الكامل ورقم الجوال معلومات خاصة بالإدارة ولن تظهر لأحد أبدا</li>
                                <li>كتابتك لهذه المعلومات بالشكل الصحيح هو تأكيد منك على جديتك في الزواج</li>
                            </ul>
                        </div>

                        <input type="hidden" name="gender" value="{{ $client->client->gender }}">
                        @csrf
                    </div>
                    <div class="submit-block text-center"><button type="button"
                            class="btn btn-lg btn-primary btn-submit"> تعديل بياناتي </button></div>
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
        var selcity = "{{ $client->residence->city_id }}";
        var checkmailurl = "{{ url('checkmail') }}";
        var nowyear = "{{ $nowyear }}";
        var token = '{{ csrf_token() }}';
        var success_msg = "تم الحفظ بنجاح";
        var fail_msg = "لم يتم الحفظ";
    </script>
    <script src="{{ url('assets/site/js/sweetalert.min.js') }}"></script>
    <script src="{{ url('assets/site/js/custom/validate.js') }}"></script>
    <script src="{{ url('assets/site/js/custom/edit-profile.js') }}"></script>
@endsection
