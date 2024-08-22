@extends('site.layouts.home-signed.layout')

@section('content')
 
    <!-- المحتوى الرئيسي -->
    <div class="container-fluid mt-3 pt-3">
        <div class="row">
            <!-- القسم الجانبي -->
            <aside class="col-lg-3 col-md-4">
                <div class="profile-sidebar">
                    <div class="profile-header bg-info text-center p-3">
                        <img src="{{ auth()->guard('client')->user()->image_path }}" alt="User" class="rounded-circle mb-2">
                        <h5>{{ auth()->guard('client')->user()->name }}</h5>
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

                <div class="  " style="margin-top:0">
                    <div class="dashboard-page__block">
                        <div class="block-user-data">
                            <div class="user-data">
                                <figure><a href="/ar/my-photo" class="upload-photo"> <img
                                            src="{{ auth()->guard('client')->user()->image_path }}" alt=""  > </a>
                                            <i
                                        class="status status--online"></i> </figure>
                                <div class="membership-infos">
                                    <h4>اسم العضو : {{ auth()->guard('client')->user()->name }}</h4>
                                    <p><strong>تاريخ التسجيل : </strong><span dir="auto">{{$user_reg_date}}</span>
                                         </p>
                                </div>
                            </div>
                            <div class="dashboard-page__link">
                                <div class="btn-links">
                                    <ul>
                                        {{-- <li><a href="/ar/settings" class="btn btn-sm btn-with-icon btn-outline-primary"
                                                title="إعداداتي"><i class="bi bi-gear"></i> </a></li> --}}
                                        <li><a href="{{ route('client.account',$lang) }}" class="btn btn-sm btn-with-icon btn-outline-danger"
                                                title="تعديل بياناتي"><i class="bi bi-pen"></i></a></li>
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
                                <h3>
                                    <figure><img src="/images/cbe36d2cb9b9860df296.svg" loading="eager"></figure><span>باقة
                                        التميز</span>
                                </h3>
                                <p> باقة التميز مجموعة من الخصائص والخدمات المتميزة تساعدك للتوفق و النجاح <br><a
                                        href="/ar/subscribe-premium" class="btn btn-action"> إشتراك <i
                                            class="ico las ico-long-arrow-alt-left"></i></a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="dashboard-page__block dashboard-page__block--equal block-counters">
                            <div class="row">
                                <div class="col"><a href="/ar/who-likes-me">
                                        <figure><img src="/images/9bce593f66045e67ece9.svg" alt="" loading="eager">
                                        </figure>
                                        <h6 dir="auto"> لا يوجد بعد أعضاء مهتمون بك </h6>
                                    </a></div>
                                <div class="col"><a href="/ar/who-visited-me">
                                        <figure><img src="/images/1103d0e88d5c927f10d2.svg" alt=""
                                                loading="eager"></figure>
                                        <h6 dir="auto"> لا توجد زيارات جديدة لملفك اليوم </h6>
                                    </a></div>
                                <div class="col"><a href="/ar/members-photos">
                                        <figure><img src="/images/4e08c650c5845c89fb11.svg" alt=""
                                                loading="eager"></figure>
                                        <h6 dir="auto"> لا أحد بَعْد أعطاك صلاحية مشاهدة صورته </h6>
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
                                <li class="table-row notification   ">
                                    <div class="content user-profile-line user-card-line-6682412  ">
                                        <figure class="avatar"> <img src="/images/7d89341fe90e6802d1d9.png"
                                                class="user-avatar" loading="eager"> </figure>
                                        <div class="content">
                                            <p dir="auto">العضو <a class="open-notification r2"
                                                    href="/ar/members/6682412" data-user-favorited="0"
                                                    data-user-blacklisted="0">joury al</a> قام بزيارة ملفك</p><span
                                                class="time">منذ 14 يومًا</span>
                                        </div>
                                    </div>
                                </li>
                                <li class="table-row notification   ">
                                    <div class="content user-profile-line user-card-line-6682412  ">
                                        <figure class="avatar"> <img src="/images/7d89341fe90e6802d1d9.png"
                                                class="user-avatar" loading="eager"> </figure>
                                        <div class="content">
                                            <p dir="auto">العضو <a class="open-notification r2"
                                                    href="/ar/members/6682412" data-user-favorited="0"
                                                    data-user-blacklisted="0">joury al</a> قام بزيارة ملفك</p><span
                                                class="time">منذ 15 يومًا</span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- قسم البحث  -->

                <div class=" input-block bg-white p-4 rounded shadow box-form advance-search__content  ">


                    <div class="edit-details__content   ">
                        <h3>البحث المتقدم</h3>
                        <div class="row">
                            <div class="col-md-4 form-group"><label>مكان الإقامة <sup>*</sup></label>
                                <div class="dropdown bootstrap-select std_select std_select_big required">
                                    <select name="country"
                                        class=" form-control std_select std_select_big required mobile-device">
                                        <option value="">إختر ..</option>
                                        <option value="jo">الأردن</option>
                                        <option value="ae">الإمارات</option>
                                        <option value="bh">البحرين</option>
                                        <option value="dz">الجزائر</option>
                                        <option value="sa">السعودية</option>
                                        <option value="sd">السودان</option>
                                        <option value="so">الصومال</option>
                                        <option value="iq">العراق</option>
                                        <option value="kw">الكويت</option>
                                        <option value="ma">المغرب</option>
                                        <option value="ye">اليمن</option>
                                        <option value="tn">تونس</option>
                                        <option value="km">جزر القمر</option>
                                        <option value="dj">جيبوتي</option>
                                        <option value="sy" selected="">سوريا</option>
                                        <option value="om">عمان</option>
                                        <option value="il">فلسطين</option>
                                        <option value="qa">قطر</option>
                                        <option value="lb">لبنان</option>
                                        <option value="ly">ليبيا</option>
                                        <option value="eg">مصر</option>
                                        <option value="mr">موريتانيا</option>
                                        <option value="et">إثيوبيا</option>
                                        <option value="am">أرمينيا</option>
                                        <option value="er">إريتريا</option>
                                        <option value="es">أسبانيا</option>
                                        <option value="uk">المملكة المتحدة</option>
                                        <option value="af">أفغانستان</option>
                                        <option value="al">ألبانيا</option>
                                        <option value="de">ألمانيا</option>
                                        <option value="id">إندونيسيا</option>
                                        <option value="uy">أورغواي</option>
                                        <option value="ir">إيران</option>
                                        <option value="ie">أيرلندا</option>
                                        <option value="is">أيسلندا</option>
                                        <option value="it">إيطاليا</option>
                                        <option value="az">ازيربيجان</option>
                                        <option value="au">استراليا</option>
                                        <option value="ar">الأرجنتين</option>
                                        <option value="ec">الإكوادور</option>
                                        <option value="br">البرازيل</option>
                                        <option value="pt">البرتغال</option>
                                        <option value="ba">البوسنةوالهرسك</option>
                                        <option value="tp">تيمورالشرقية</option>
                                        <option value="dk">الدانمارك</option>
                                        <option value="sv">السلفادور</option>
                                        <option value="sn">السنغال</option>
                                        <option value="se">السويد</option>
                                        <option value="cn">الصين</option>
                                        <option value="ga">الغابون</option>
                                        <option value="va">الفاتيكان</option>
                                        <option value="cm">الكاميرون</option>
                                        <option value="cg">جمهورية الكونغو</option>
                                        <option value="hu">المجر</option>
                                        <option value="mx">المكسيك</option>
                                        <option value="no">النرويج</option>
                                        <option value="at">النمسا</option>
                                        <option value="ne">النيجر</option>
                                        <option value="in">الهند</option>
                                        <option value="us">أمريكا</option>
                                        <option value="jp">اليابان</option>
                                        <option value="gr">اليونان</option>
                                        <option value="ao">انغولا</option>
                                        <option value="uz">اوزبيكستان</option>
                                        <option value="ug">اوغندا</option>
                                        <option value="ua">اوكرانيا</option>
                                        <option value="ee">ايستونيا</option>
                                        <option value="py">باراغواي</option>
                                        <option value="pk">باكستان</option>
                                        <option value="bn">بروناي دار السلام</option>
                                        <option value="be">بلجيكا</option>
                                        <option value="bg">بلغاريا</option>
                                        <option value="bd">بنجلاديش</option>
                                        <option value="pa">بنما</option>
                                        <option value="bw">بوتسوانا</option>
                                        <option value="pr">بورتوريكو</option>
                                        <option value="bf">بوركينا فاسو</option>
                                        <option value="bi">بوروندى</option>
                                        <option value="pl">بولا ندا</option>
                                        <option value="pe">بيرو</option>
                                        <option value="by">بيلاروسيا</option>
                                        <option value="bz">بيليز</option>
                                        <option value="bj">بينين</option>
                                        <option value="tj">تاجاكستان</option>
                                        <option value="th">تايلاند</option>
                                        <option value="tw">تايوان</option>
                                        <option value="tm">تركمينستان</option>
                                        <option value="tr">تركيا</option>
                                        <option value="tt">ترينيداد وتوباغو</option>
                                        <option value="td">تشاد</option>
                                        <option value="tz">تنزانيا</option>
                                        <option value="jm">جامايكا</option>
                                        <option value="bs">جزر الباهاماس</option>
                                        <option value="ph">جزر الفليبين</option>
                                        <option value="ky">جزر سيمان</option>
                                        <option value="sk">سلوفاكيا</option>
                                        <option value="cf">جمهوريةأفريقياالوسطى</option>
                                        <option value="cz">جمهورية التشيك</option>
                                        <option value="do">جمهوريةالدومينيكان</option>
                                        <option value="za">جنوب أفريقيا</option>
                                        <option value="ge">جيورجيا</option>
                                        <option value="gt">جواتيمالا</option>
                                        <option value="rw">رواندا</option>
                                        <option value="ru">روسيا</option>
                                        <option value="ro">رومانيا</option>
                                        <option value="zr">زائير</option>
                                        <option value="zm">زامبيا</option>
                                        <option value="zw">زيمبابوي</option>
                                        <option value="ic">Côte d'Ivoire</option>
                                        <option value="as">سامواالأمريكية</option>
                                        <option value="sm">سان مار</option>
                                        <option value="lk">سريلانكا</option>
                                        <option value="si">سلوفينيا</option>
                                        <option value="sg">سنغافورة</option>
                                        <option value="sz">سوازيلاند</option>
                                        <option value="ch">سويسرا</option>
                                        <option value="sl">سيراليون</option>
                                        <option value="sc">سيشيل</option>
                                        <option value="cl">شيلى</option>
                                        <option value="gm">غامبيا</option>
                                        <option value="gh">غانا</option>
                                        <option value="gy">غويان</option>
                                        <option value="fr">فرنسا</option>
                                        <option value="ve">فنزويلا</option>
                                        <option value="fi">فنلندا</option>
                                        <option value="fj">فيجى</option>
                                        <option value="vn">فيتنام</option>
                                        <option value="cy">قبرص</option>
                                        <option value="kz">كازاخستان</option>
                                        <option value="hr">كرواتيا</option>
                                        <option value="ca">كندا</option>
                                        <option value="cu">كوبا</option>
                                        <option value="kr">كوريا الجنوبية</option>
                                        <option value="kp">كوريا الشمالية</option>
                                        <option value="cr">كوستاريكا</option>
                                        <option value="co">كولومبيا</option>
                                        <option value="kg">كيرجستان</option>
                                        <option value="ke">كينيا</option>
                                        <option value="lv">لاتفيا</option>
                                        <option value="la">لاوس</option>
                                        <option value="lu">لوكسمبورغ</option>
                                        <option value="lr">ليبريا</option>
                                        <option value="lt">ليتوانيا</option>
                                        <option value="ls">ليسوتو</option>
                                        <option value="mv">المالديف</option>
                                        <option value="mt">مالطا</option>
                                        <option value="ml">مالى</option>
                                        <option value="my">ماليزيا</option>
                                        <option value="mg">مدغشقر</option>
                                        <option value="mk">مقدونيا</option>
                                        <option value="mw">ملاوي</option>
                                        <option value="mn">منغوليا</option>
                                        <option value="mu">موريشيوس</option>
                                        <option value="mz">موزمبيق</option>
                                        <option value="mc">موناكو</option>
                                        <option value="mm">ميانمار</option>
                                        <option value="na">ناميبيا</option>
                                        <option value="np">نيبال</option>
                                        <option value="ng">نيجيريا</option>
                                        <option value="ni">نيكاراجوا</option>
                                        <option value="nz">نيو زيلندا</option>
                                        <option value="ht">هاييتي</option>
                                        <option value="hn">هندوراس</option>
                                        <option value="an">هولانده انتيلاس</option>
                                        <option value="nl">هولندا</option>
                                        <option value="hk">هونج كونج</option>
                                    </select>


                                </div>
                            </div>
                            <div class="col-md-4 form-group"><label>الجنسية <sup>*</sup></label>
                                <div class="dropdown bootstrap-select std_select std_select_big required">
                                    <select name="nationality"
                                        class=" form-control std_select std_select_big required mobile-device">
                                        <option value="">إختر ..</option>
                                        <option value="jo">الأردن</option>
                                        <option value="ae">الإمارات</option>
                                        <option value="bh">البحرين</option>
                                        <option value="dz">الجزائر</option>
                                        <option value="sa">السعودية</option>
                                        <option value="sd">السودان</option>
                                        <option value="so">الصومال</option>
                                        <option value="iq">العراق</option>
                                        <option value="kw">الكويت</option>
                                        <option value="ma">المغرب</option>
                                        <option value="ye">اليمن</option>
                                        <option value="tn">تونس</option>
                                        <option value="km">جزر القمر</option>
                                        <option value="dj">جيبوتي</option>
                                        <option value="sy" selected="">سوريا</option>
                                        <option value="om">عمان</option>
                                        <option value="il">فلسطين</option>
                                        <option value="qa">قطر</option>
                                        <option value="lb">لبنان</option>
                                        <option value="ly">ليبيا</option>
                                        <option value="eg">مصر</option>
                                        <option value="mr">موريتانيا</option>
                                        <option value="et">إثيوبيا</option>
                                        <option value="am">أرمينيا</option>
                                        <option value="er">إريتريا</option>
                                        <option value="es">أسبانيا</option>
                                        <option value="uk">المملكة المتحدة</option>
                                        <option value="af">أفغانستان</option>
                                        <option value="al">ألبانيا</option>
                                        <option value="de">ألمانيا</option>
                                        <option value="id">إندونيسيا</option>
                                        <option value="uy">أورغواي</option>
                                        <option value="ir">إيران</option>
                                        <option value="ie">أيرلندا</option>
                                        <option value="is">أيسلندا</option>
                                        <option value="it">إيطاليا</option>
                                        <option value="az">ازيربيجان</option>
                                        <option value="au">استراليا</option>
                                        <option value="ar">الأرجنتين</option>
                                        <option value="ec">الإكوادور</option>
                                        <option value="br">البرازيل</option>
                                        <option value="pt">البرتغال</option>
                                        <option value="ba">البوسنةوالهرسك</option>
                                        <option value="tp">تيمورالشرقية</option>
                                        <option value="dk">الدانمارك</option>
                                        <option value="sv">السلفادور</option>
                                        <option value="sn">السنغال</option>
                                        <option value="se">السويد</option>
                                        <option value="cn">الصين</option>
                                        <option value="ga">الغابون</option>
                                        <option value="va">الفاتيكان</option>
                                        <option value="cm">الكاميرون</option>
                                        <option value="cg">جمهورية الكونغو</option>
                                        <option value="hu">المجر</option>
                                        <option value="mx">المكسيك</option>
                                        <option value="no">النرويج</option>
                                        <option value="at">النمسا</option>
                                        <option value="ne">النيجر</option>
                                        <option value="in">الهند</option>
                                        <option value="us">أمريكا</option>
                                        <option value="jp">اليابان</option>
                                        <option value="gr">اليونان</option>
                                        <option value="ao">انغولا</option>
                                        <option value="uz">اوزبيكستان</option>
                                        <option value="ug">اوغندا</option>
                                        <option value="ua">اوكرانيا</option>
                                        <option value="ee">ايستونيا</option>
                                        <option value="py">باراغواي</option>
                                        <option value="pk">باكستان</option>
                                        <option value="bn">بروناي دار السلام</option>
                                        <option value="be">بلجيكا</option>
                                        <option value="bg">بلغاريا</option>
                                        <option value="bd">بنجلاديش</option>
                                        <option value="pa">بنما</option>
                                        <option value="bw">بوتسوانا</option>
                                        <option value="pr">بورتوريكو</option>
                                        <option value="bf">بوركينا فاسو</option>
                                        <option value="bi">بوروندى</option>
                                        <option value="pl">بولا ندا</option>
                                        <option value="pe">بيرو</option>
                                        <option value="by">بيلاروسيا</option>
                                        <option value="bz">بيليز</option>
                                        <option value="bj">بينين</option>
                                        <option value="tj">تاجاكستان</option>
                                        <option value="th">تايلاند</option>
                                        <option value="tw">تايوان</option>
                                        <option value="tm">تركمينستان</option>
                                        <option value="tr">تركيا</option>
                                        <option value="tt">ترينيداد وتوباغو</option>
                                        <option value="td">تشاد</option>
                                        <option value="tz">تنزانيا</option>
                                        <option value="jm">جامايكا</option>
                                        <option value="bs">جزر الباهاماس</option>
                                        <option value="ph">جزر الفليبين</option>
                                        <option value="ky">جزر سيمان</option>
                                        <option value="sk">سلوفاكيا</option>
                                        <option value="cf">جمهوريةأفريقياالوسطى</option>
                                        <option value="cz">جمهورية التشيك</option>
                                        <option value="do">جمهوريةالدومينيكان</option>
                                        <option value="za">جنوب أفريقيا</option>
                                        <option value="ge">جيورجيا</option>
                                        <option value="gt">جواتيمالا</option>
                                        <option value="rw">رواندا</option>
                                        <option value="ru">روسيا</option>
                                        <option value="ro">رومانيا</option>
                                        <option value="zr">زائير</option>
                                        <option value="zm">زامبيا</option>
                                        <option value="zw">زيمبابوي</option>
                                        <option value="ic">Côte d'Ivoire</option>
                                        <option value="as">سامواالأمريكية</option>
                                        <option value="sm">سان مار</option>
                                        <option value="lk">سريلانكا</option>
                                        <option value="si">سلوفينيا</option>
                                        <option value="sg">سنغافورة</option>
                                        <option value="sz">سوازيلاند</option>
                                        <option value="ch">سويسرا</option>
                                        <option value="sl">سيراليون</option>
                                        <option value="sc">سيشيل</option>
                                        <option value="cl">شيلى</option>
                                        <option value="gm">غامبيا</option>
                                        <option value="gh">غانا</option>
                                        <option value="gy">غويان</option>
                                        <option value="fr">فرنسا</option>
                                        <option value="ve">فنزويلا</option>
                                        <option value="fi">فنلندا</option>
                                        <option value="fj">فيجى</option>
                                        <option value="vn">فيتنام</option>
                                        <option value="cy">قبرص</option>
                                        <option value="kz">كازاخستان</option>
                                        <option value="hr">كرواتيا</option>
                                        <option value="ca">كندا</option>
                                        <option value="cu">كوبا</option>
                                        <option value="kr">كوريا الجنوبية</option>
                                        <option value="kp">كوريا الشمالية</option>
                                        <option value="cr">كوستاريكا</option>
                                        <option value="co">كولومبيا</option>
                                        <option value="kg">كيرجستان</option>
                                        <option value="ke">كينيا</option>
                                        <option value="lv">لاتفيا</option>
                                        <option value="la">لاوس</option>
                                        <option value="lu">لوكسمبورغ</option>
                                        <option value="lr">ليبريا</option>
                                        <option value="lt">ليتوانيا</option>
                                        <option value="ls">ليسوتو</option>
                                        <option value="mv">المالديف</option>
                                        <option value="mt">مالطا</option>
                                        <option value="ml">مالى</option>
                                        <option value="my">ماليزيا</option>
                                        <option value="mg">مدغشقر</option>
                                        <option value="mk">مقدونيا</option>
                                        <option value="mw">ملاوي</option>
                                        <option value="mn">منغوليا</option>
                                        <option value="mu">موريشيوس</option>
                                        <option value="mz">موزمبيق</option>
                                        <option value="mc">موناكو</option>
                                        <option value="mm">ميانمار</option>
                                        <option value="na">ناميبيا</option>
                                        <option value="np">نيبال</option>
                                        <option value="ng">نيجيريا</option>
                                        <option value="ni">نيكاراجوا</option>
                                        <option value="nz">نيو زيلندا</option>
                                        <option value="ht">هاييتي</option>
                                        <option value="hn">هندوراس</option>
                                        <option value="an">هولانده انتيلاس</option>
                                        <option value="nl">هولندا</option>
                                        <option value="hk">هونج كونج</option>
                                    </select>


                                </div>
                            </div>
                            <div class="col-md-4 form-group d-none d-md-block"><label>الحالة العائلية</label>
                                <div class="dropdown bootstrap-select std_select std_select_big dropup">
                                    <select name="maritalStatus"
                                        class=" form-control std_select std_select_big mobile-device">
                                        <option value="">كل الحالات</option>
                                        <option value="6" data-alias="">آنسة</option>
                                        <option value="7" data-alias="">مطلقة</option>
                                        <option value="8" data-alias="">ارملة</option>
                                    </select>

                                </div>
                            </div>

                            <div class="col-md-6 form-group d-md-block"><label>العمر</label>
                                <div dir="ltr">
                                    <b class="b-slide">18</b> <input id="age-slide" type="text" class="span2"
                                        value="" data-slider-min="18" data-slider-max="100" data-slider-step="1"
                                        data-slider-value="[18,100]" /> <b class="b-slide"> 100</b>
                                </div>
                            </div>
                            <div class="col-md-6 form-group  d-md-block"><label>الترتيب</label>
                                <div class="dropdown bootstrap-select std_select std_select_big dropup">
                                    <select name="sort" class="form-control  std_select std_select_big mobile-device">
                                        <option value="">لا يهم</option>
                                        <option value="lastlogin desc" data-alias="">حسب الآخر دخولا</option>
                                        <option value="postdate desc" data-alias="">حسب تاريخ التسجيل</option>
                                        <option value="age" data-alias="">حسب العمر</option>
                                        <option value="country" data-alias="">حسب مكان الاقامة</option>
                                    </select>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-12 text-center">
                            <div style="height:15px"></div>
                            <div>
                                <input type="submit" class="btn btn-md btn-danger formsearch" value="بـحـث">
                            </div>
                        </div>
                    </div>
                </div>
                {{-- أحدث الأعضاء --}}
                <div class="row block-recent-members" style="height: auto !important;">
                    <div class="col-md-12">
                        <h2>أحدث الأعضاء</h2>
                    </div>
                    <div class="col-md-6">
                        <div class="user-card user-card-9434454 not-contactable" data-user-id="9434454">
                                <a href="/ar/members/9434454" role="link-profile" tabindex="-1">
                                    <div class="essential-data">
                                        <div class="avatar"> <img src="{{ asset('assets/site/img/male-user.png')}}" class="avatar-male"
                                                alt="صورة العضو"  > <i
                                                class="ico ico-circle user-status online"></i></div>
                                        <div class="data">
                                            <h3><span class="username" dir="auto">ورد يوسف</span> <img
                                                    src="{{ asset('assets/site/img/flag.gif')}}" alt="سوريا"  > </h3>
                                            <h4> 38 سنة من سوريا </h4>
                                        </div>
                                    </div>
                                </a>
                                <div class="secondary-data">
                                    <div class="user-location"><i
                                            class="bi bi-geo-alt-fill user-location-bi"></i>
                                        <span> سوريا / حماة </span>
                                    </div>
                                    <div class="user-marital-status"><i
                                            class="bi bi-heart-half user-location-bi"></i><span> عازب
                                        </span></div>
                                </div>
                                <div class="more-data">
                                    <div class="user-last-login"> </div>
                                    <div class="user-options">
                                        <ul>
                                            <li><span class="profile-visited"
                                                    title="لقد زرت هذا الملف سابقا"></span></li>
                                            <li><button class="btn btn-primary btn-send-message"
                                                    data-user-id="9434454" data-user-name="ورد يوسف"
                                                    data-user-gender="male" data-user-online="1"
                                                    data-user-premium="" data-user-last-login=""
                                                    data-user-favorited="" data-user-blacklisted=""
                                                    data-user-disabled="0" data-user-contactability=""
                                                    title="أرسل رسالة" tabindex="-1"><i
                                                        class="fas fa-comments"></i></button></li>
                                            <li> <button class="btn btn-outline-light btn-add-to-favorite"
                                                    data-user-id="9434454" data-user-name="ورد يوسف"
                                                    title="إضافة للإهتمام" tabindex="-1"><i
                                                        class="fas fa-heart"></i></button> </li>
                                            <li><button
                                                    class="btn btn-outline-light btn-remove-from-blacklist"
                                                    data-user-id="9434454" data-user-name="ورد يوسف"
                                                    title="لقد تجاهلت هذا العضو" tabindex="-1"><i
                                                        class="fas fa-ban"></i></button></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                    </div>

                    <div class="col-md-6">
                        <div class="user-card user-card-9434454 not-contactable" data-user-id="9434454">
                                <a href="/ar/members/9434454" role="link-profile" tabindex="-1">
                                    <div class="essential-data">
                                        <div class="avatar"> <img src="{{ asset('assets/site/img/male-user.png')}}" class="avatar-male"
                                                alt="صورة العضو"  > <i
                                                class="ico ico-circle user-status online"></i></div>
                                        <div class="data">
                                            <h3><span class="username" dir="auto">ورد يوسف</span> <img
                                                    src="{{ asset('assets/site/img/flag.gif')}}" alt="سوريا"  > </h3>
                                            <h4> 38 سنة من سوريا </h4>
                                        </div>
                                    </div>
                                </a>
                                <div class="secondary-data">
                                    <div class="user-location"><i
                                            class="bi bi-geo-alt-fill user-location-bi"></i>
                                        <span> سوريا / حماة </span>
                                    </div>
                                    <div class="user-marital-status"><i
                                            class="bi bi-heart-half user-location-bi"></i><span> عازب
                                        </span></div>
                                </div>
                                <div class="more-data">
                                    <div class="user-last-login"> </div>
                                    <div class="user-options">
                                        <ul>
                                            <li><span class="profile-visited"
                                                    title="لقد زرت هذا الملف سابقا"></span></li>
                                            <li><button class="btn btn-primary btn-send-message"
                                                    data-user-id="9434454" data-user-name="ورد يوسف"
                                                    data-user-gender="male" data-user-online="1"
                                                    data-user-premium="" data-user-last-login=""
                                                    data-user-favorited="" data-user-blacklisted=""
                                                    data-user-disabled="0" data-user-contactability=""
                                                    title="أرسل رسالة" tabindex="-1"><i
                                                        class="fas fa-comments"></i></button></li>
                                            <li> <button class="btn btn-outline-light btn-add-to-favorite"
                                                    data-user-id="9434454" data-user-name="ورد يوسف"
                                                    title="إضافة للإهتمام" tabindex="-1"><i
                                                        class="fas fa-heart"></i></button> </li>
                                            <li><button
                                                    class="btn btn-outline-light btn-remove-from-blacklist"
                                                    data-user-id="9434454" data-user-name="ورد يوسف"
                                                    title="لقد تجاهلت هذا العضو" tabindex="-1"><i
                                                        class="fas fa-ban"></i></button></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                    </div>


                    <div class="col-md-6">
                        <div class="user-card user-card-9434454 not-contactable" data-user-id="9434454">
                                <a href="/ar/members/9434454" role="link-profile" tabindex="-1">
                                    <div class="essential-data">
                                        <div class="avatar"> <img src="{{ asset('assets/site/img/male-user.png')}}" class="avatar-male"
                                                alt="صورة العضو"  > <i
                                                class="ico ico-circle user-status online"></i></div>
                                        <div class="data">
                                            <h3><span class="username" dir="auto">ورد يوسف</span> <img
                                                    src="{{ asset('assets/site/img/flag.gif')}}" alt="سوريا"  > </h3>
                                            <h4> 38 سنة من سوريا </h4>
                                        </div>
                                    </div>
                                </a>
                                <div class="secondary-data">
                                    <div class="user-location"><i
                                            class="bi bi-geo-alt-fill user-location-bi"></i>
                                        <span> سوريا / حماة </span>
                                    </div>
                                    <div class="user-marital-status"><i
                                            class="bi bi-heart-half user-location-bi"></i><span> عازب
                                        </span></div>
                                </div>
                                <div class="more-data">
                                    <div class="user-last-login"> </div>
                                    <div class="user-options">
                                        <ul>
                                            <li><span class="profile-visited"
                                                    title="لقد زرت هذا الملف سابقا"></span></li>
                                            <li><button class="btn btn-primary btn-send-message"
                                                    data-user-id="9434454" data-user-name="ورد يوسف"
                                                    data-user-gender="male" data-user-online="1"
                                                    data-user-premium="" data-user-last-login=""
                                                    data-user-favorited="" data-user-blacklisted=""
                                                    data-user-disabled="0" data-user-contactability=""
                                                    title="أرسل رسالة" tabindex="-1"><i
                                                        class="fas fa-comments"></i></button></li>
                                            <li> <button class="btn btn-outline-light btn-add-to-favorite"
                                                    data-user-id="9434454" data-user-name="ورد يوسف"
                                                    title="إضافة للإهتمام" tabindex="-1"><i
                                                        class="fas fa-heart"></i></button> </li>
                                            <li><button
                                                    class="btn btn-outline-light btn-remove-from-blacklist"
                                                    data-user-id="9434454" data-user-name="ورد يوسف"
                                                    title="لقد تجاهلت هذا العضو" tabindex="-1"><i
                                                        class="fas fa-ban"></i></button></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                    </div>

                    <div class="col-md-6">
                        <div class="user-card user-card-9434454 not-contactable" data-user-id="9434454">
                                <a href="/ar/members/9434454" role="link-profile" tabindex="-1">
                                    <div class="essential-data">
                                        <div class="avatar"> <img src="{{ asset('assets/site/img/male-user.png')}}" class="avatar-male"
                                                alt="صورة العضو"  > <i
                                                class="ico ico-circle user-status online"></i></div>
                                        <div class="data">
                                            <h3><span class="username" dir="auto">ورد يوسف</span> <img
                                                    src="{{ asset('assets/site/img/flag.gif')}}" alt="سوريا"  > </h3>
                                            <h4> 38 سنة من سوريا </h4>
                                        </div>
                                    </div>
                                </a>
                                <div class="secondary-data">
                                    <div class="user-location"><i
                                            class="bi bi-geo-alt-fill user-location-bi"></i>
                                        <span> سوريا / حماة </span>
                                    </div>
                                    <div class="user-marital-status"><i
                                            class="bi bi-heart-half user-location-bi"></i><span> عازب
                                        </span></div>
                                </div>
                                <div class="more-data">
                                    <div class="user-last-login"> </div>
                                    <div class="user-options">
                                        <ul>
                                            <li><span class="profile-visited"
                                                    title="لقد زرت هذا الملف سابقا"></span></li>
                                            <li><button class="btn btn-primary btn-send-message"
                                                    data-user-id="9434454" data-user-name="ورد يوسف"
                                                    data-user-gender="male" data-user-online="1"
                                                    data-user-premium="" data-user-last-login=""
                                                    data-user-favorited="" data-user-blacklisted=""
                                                    data-user-disabled="0" data-user-contactability=""
                                                    title="أرسل رسالة" tabindex="-1"><i
                                                        class="fas fa-comments"></i></button></li>
                                            <li> <button class="btn btn-outline-light btn-add-to-favorite"
                                                    data-user-id="9434454" data-user-name="ورد يوسف"
                                                    title="إضافة للإهتمام" tabindex="-1"><i
                                                        class="fas fa-heart"></i></button> </li>
                                            <li><button
                                                    class="btn btn-outline-light btn-remove-from-blacklist"
                                                    data-user-id="9434454" data-user-name="ورد يوسف"
                                                    title="لقد تجاهلت هذا العضو" tabindex="-1"><i
                                                        class="fas fa-ban"></i></button></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                    </div>


                  
                    <div class="col-md-12"><a href="/ar/new-members" class="btn btn-action"> المزيد 
                        <i class="bi bi-arrow-left"></i></a></div>
                </div>



            </section>



        </div>
    </div>
@endsection
@section('css')
    <link href="{{ url('assets/site/css/custom/profile.css') }}" rel="stylesheet">
    <link href="{{ url('assets/site/css/custom/slide-range.css') }}" rel="stylesheet">
@endsection
