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
                                <th><label>رقم العضوية</label></th>
                                <td>10004477</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <th><label>إسم المستخدم</label></th>
                                <td dir="auto">12312ahmad-2024</td>
                                <td><a href="/ar/edit-username"
                                        class="btn btn-sm btn-outline-danger  edit-btn btn-edit-username"><i
                                            class="bi bi-pen"></i>
                                        <span>تعديل إسم المستخدم</span></a></td>
                            </tr>
                            <tr>
                                <th><label>تاريخ التسجيل</label></th>
                                <td dir="auto"> الثلاثاء، 06 أغسطس 2024 – 12:30 </td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <th><label>كلمة المرور <sup>*</sup></label></th>
                                <td><input type="password" class="form-control" name="password" value="*******"
                                        readonly="readonly"></td>
                                <td><a href="/ar/edit-password" class="btn btn-sm btn-outline-danger  edit-btn"><i
                                            class="bi bi-pen"></i>
                                        <span>تعديل كلمة السر</span></a></td>
                            </tr>
                            <tr class="email-block">
                                <th><label>البريد الإلكتروني </label>:</th>
                                <td><input type="email" class="form-control" name="email" value="najyms@gmail.com"
                                        readonly="readonly"></td>
                                <td class="actions">
                                    <div><a href="/ar/edit-email" class="btn btn-sm btn-outline-danger  edit-btn">
                                            <i class="bi bi-pen"></i> تعديل بريدك الإكتروني </a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="edit-details__more">
                    <p> هل ترغب بحذف عضويتك ؟ <a href="/ar/delete-account">حذف</a></p>
                </div>
            </div>
            <!-- قسم تعديل الاقامة -->
            <div class=" input-block bg-white p-4 rounded shadow box-form">
                <h5 class="mb-4">الجنسية و الإقامة</h5>
                <div class="edit-details__content">
                    <div class="row">
                        <div class="col-md-6 form-group"><label>مكان الإقامة <sup>*</sup></label>
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
                        <div class="col-md-6 form-group"><label>الجنسية <sup>*</sup></label>
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

                                <div class="dropdown-menu ">
                                    <div class="inner show" role="listbox" id="bs-select-2" tabindex="-1">
                                        <ul class="dropdown-menu inner show" role="presentation"></ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 form-group"><label>المدينة <sup>*</sup></label> <label
                                class="loading options" style="display: none;"> </label>
                            <div class="dropdown bootstrap-select std_select std_select_big required dropup">
                                <select name="city"
                                    class=" form-control std_select std_select_big required mobile-device"
                                    data-defaultvalue="0">
                                    <option>تحميل ..</option>
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
                        <div class="col-md-6 form-group"><label>نوع الزواج <sup>*</sup></label>
                            <div class="dropdown bootstrap-select std_select std_select_big required">
                                <select name="marriageType"
                                    class=" form-control std_select std_select_big required mobile-device">
                                    <option value="">إختر ..</option>
                                    <option value="3" selected="" data-alias="">زوجة اولى</option>
                                    <option value="4" data-alias="">زوجة ثانية</option>
                                </select>


                            </div>
                        </div>
                        <div class="col-md-6 form-group"><label>الحالة العائلية <sup>*</sup></label>
                            <div class="dropdown bootstrap-select std_select std_select_big required">
                                <select name="maritalStatus"
                                    class=" form-control std_select std_select_big required mobile-device">
                                    <option value="">إختر ..</option>
                                    <option value="2" selected="" data-alias="">عازب</option>
                                    <option value="3" data-alias="">مطلق</option>
                                    <option value="4" data-alias="">ارمل</option>
                                    <option value="5" data-alias="" disabled="disabled" style="display: none;">متزوج
                                    </option>
                                </select>


                            </div>
                        </div>
                        <div class="col-md-6 form-group"><label>العمر <sup>*</sup></label>
                            <div class="dropdown bootstrap-select std_select std_select_big required">
                                <select name="age"
                                    class="form-control std_select std_select_big required mobile-device">
                                    <option value="">إختر ..</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                    <option value="24">24</option>
                                    <option value="25">25</option>
                                    <option value="26">26</option>
                                    <option value="27">27</option>
                                    <option value="28">28</option>
                                    <option value="29">29</option>
                                    <option value="30">30</option>
                                    <option value="31">31</option>
                                    <option value="32">32</option>
                                    <option value="33">33</option>
                                    <option value="34">34</option>
                                    <option value="35">35</option>
                                    <option value="36">36</option>
                                    <option value="37">37</option>
                                    <option value="38">38</option>
                                    <option value="39">39</option>
                                    <option value="40" selected="">40</option>
                                    <option value="41">41</option>
                                    <option value="42">42</option>
                                    <option value="43">43</option>
                                    <option value="44">44</option>
                                    <option value="45">45</option>
                                    <option value="46">46</option>
                                    <option value="47">47</option>
                                    <option value="48">48</option>
                                    <option value="49">49</option>
                                    <option value="50">50</option>
                                    <option value="51">51</option>
                                    <option value="52">52</option>
                                    <option value="53">53</option>
                                    <option value="54">54</option>
                                    <option value="55">55</option>
                                    <option value="56">56</option>
                                    <option value="57">57</option>
                                    <option value="58">58</option>
                                    <option value="59">59</option>
                                    <option value="60">60</option>
                                    <option value="61">61</option>
                                    <option value="62">62</option>
                                    <option value="63">63</option>
                                    <option value="64">64</option>
                                    <option value="65">65</option>
                                    <option value="66">66</option>
                                    <option value="67">67</option>
                                    <option value="68">68</option>
                                    <option value="69">69</option>
                                    <option value="70">70</option>
                                    <option value="71">71</option>
                                    <option value="72">72</option>
                                    <option value="73">73</option>
                                    <option value="74">74</option>
                                    <option value="75">75</option>
                                    <option value="76">76</option>
                                    <option value="77">77</option>
                                    <option value="78">78</option>
                                    <option value="79">79</option>
                                    <option value="80">80</option>
                                    <option value="81">81</option>
                                    <option value="82">82</option>
                                    <option value="83">83</option>
                                    <option value="84">84</option>
                                    <option value="85">85</option>
                                    <option value="86">86</option>
                                    <option value="87">87</option>
                                    <option value="88">88</option>
                                    <option value="89">89</option>
                                    <option value="90">90</option>
                                </select>


                            </div>
                        </div>
                        <div class="col-md-6 form-group"><label>عدد الأطفال <sup>*</sup></label>
                            <div class="dropdown bootstrap-select std_select std_select_big required dropup">
                                <select name="nbChildren"
                                    class="form-control std_select std_select_big required mobile-device">
                                    <option value="">إختر ..</option>
                                    <option value="0" selected="">بدون أطفال</option>
                                    <option value="1" disabled="disabled" style="display: none;">طفل واحد</option>
                                    <option value="2" disabled="disabled" style="display: none;">طفلان</option>
                                    <option value="3" disabled="disabled" style="display: none;">3</option>
                                    <option value="4" disabled="disabled" style="display: none;">4</option>
                                    <option value="5" disabled="disabled" style="display: none;">5</option>
                                    <option value="6" disabled="disabled" style="display: none;">6</option>
                                    <option value="7" disabled="disabled" style="display: none;">7</option>
                                    <option value="8" disabled="disabled" style="display: none;">8</option>
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
                                <select name="weight"
                                    class="form-control std_select std_select_big required mobile-device">
                                    <option value="">إختر ..</option>
                                    <option value="40">40</option>
                                    <option value="41">41</option>
                                    <option value="42">42</option>
                                    <option value="43">43</option>
                                    <option value="44">44</option>
                                    <option value="45">45</option>
                                    <option value="46">46</option>
                                    <option value="47">47</option>
                                    <option value="48">48</option>
                                    <option value="49">49</option>
                                    <option value="50">50</option>
                                    <option value="51">51</option>
                                    <option value="52">52</option>
                                    <option value="53">53</option>
                                    <option value="54">54</option>
                                    <option value="55">55</option>
                                    <option value="56">56</option>
                                    <option value="57">57</option>
                                    <option value="58">58</option>
                                    <option value="59">59</option>
                                    <option value="60">60</option>
                                    <option value="61">61</option>
                                    <option value="62">62</option>
                                    <option value="63">63</option>
                                    <option value="64">64</option>
                                    <option value="65">65</option>
                                    <option value="66">66</option>
                                    <option value="67">67</option>
                                    <option value="68">68</option>
                                    <option value="69">69</option>
                                    <option value="70" selected="">70</option>
                                    <option value="71">71</option>
                                    <option value="72">72</option>
                                    <option value="73">73</option>
                                    <option value="74">74</option>
                                    <option value="75">75</option>
                                    <option value="76">76</option>
                                    <option value="77">77</option>
                                    <option value="78">78</option>
                                    <option value="79">79</option>
                                    <option value="80">80</option>
                                    <option value="81">81</option>
                                    <option value="82">82</option>
                                    <option value="83">83</option>
                                    <option value="84">84</option>
                                    <option value="85">85</option>
                                    <option value="86">86</option>
                                    <option value="87">87</option>
                                    <option value="88">88</option>
                                    <option value="89">89</option>
                                    <option value="90">90</option>
                                    <option value="91">91</option>
                                    <option value="92">92</option>
                                    <option value="93">93</option>
                                    <option value="94">94</option>
                                    <option value="95">95</option>
                                    <option value="96">96</option>
                                    <option value="97">97</option>
                                    <option value="98">98</option>
                                    <option value="99">99</option>
                                    <option value="100">100</option>
                                    <option value="101">101</option>
                                    <option value="102">102</option>
                                    <option value="103">103</option>
                                    <option value="104">104</option>
                                    <option value="105">105</option>
                                    <option value="106">106</option>
                                    <option value="107">107</option>
                                    <option value="108">108</option>
                                    <option value="109">109</option>
                                    <option value="110">110</option>
                                    <option value="111">111</option>
                                    <option value="112">112</option>
                                    <option value="113">113</option>
                                    <option value="114">114</option>
                                    <option value="115">115</option>
                                    <option value="116">116</option>
                                    <option value="117">117</option>
                                    <option value="118">118</option>
                                    <option value="119">119</option>
                                    <option value="120">120</option>
                                    <option value="121">121</option>
                                    <option value="122">122</option>
                                    <option value="123">123</option>
                                    <option value="124">124</option>
                                    <option value="125">125</option>
                                    <option value="126">126</option>
                                    <option value="127">127</option>
                                    <option value="128">128</option>
                                    <option value="129">129</option>
                                    <option value="130">130</option>
                                    <option value="131">131</option>
                                    <option value="132">132</option>
                                    <option value="133">133</option>
                                    <option value="134">134</option>
                                    <option value="135">135</option>
                                    <option value="136">136</option>
                                    <option value="137">137</option>
                                    <option value="138">138</option>
                                    <option value="139">139</option>
                                    <option value="140">140</option>
                                    <option value="141">141</option>
                                    <option value="142">142</option>
                                    <option value="143">143</option>
                                    <option value="144">144</option>
                                    <option value="145">145</option>
                                    <option value="146">146</option>
                                    <option value="147">147</option>
                                    <option value="148">148</option>
                                    <option value="149">149</option>
                                    <option value="150">150</option>
                                    <option value="151">151</option>
                                    <option value="152">152</option>
                                    <option value="153">153</option>
                                    <option value="154">154</option>
                                    <option value="155">155</option>
                                    <option value="156">156</option>
                                    <option value="157">157</option>
                                    <option value="158">158</option>
                                    <option value="159">159</option>
                                    <option value="160">160</option>
                                    <option value="161">161</option>
                                    <option value="162">162</option>
                                    <option value="163">163</option>
                                    <option value="164">164</option>
                                    <option value="165">165</option>
                                    <option value="166">166</option>
                                    <option value="167">167</option>
                                    <option value="168">168</option>
                                    <option value="169">169</option>
                                    <option value="170">170</option>
                                    <option value="171">171</option>
                                    <option value="172">172</option>
                                    <option value="173">173</option>
                                    <option value="174">174</option>
                                    <option value="175">175</option>
                                    <option value="176">176</option>
                                    <option value="177">177</option>
                                    <option value="178">178</option>
                                    <option value="179">179</option>
                                    <option value="180">180</option>
                                    <option value="181">181</option>
                                    <option value="182">182</option>
                                    <option value="183">183</option>
                                    <option value="184">184</option>
                                    <option value="185">185</option>
                                    <option value="186">186</option>
                                    <option value="187">187</option>
                                    <option value="188">188</option>
                                    <option value="189">189</option>
                                    <option value="190">190</option>
                                    <option value="191">191</option>
                                    <option value="192">192</option>
                                    <option value="193">193</option>
                                    <option value="194">194</option>
                                    <option value="195">195</option>
                                    <option value="196">196</option>
                                    <option value="197">197</option>
                                    <option value="198">198</option>
                                    <option value="199">199</option>
                                    <option value="200">200</option>
                                </select>

                            </div>
                        </div>
                        <div class="col-md-6 form-group"><label>الطول (سم) <sup>*</sup></label>
                            <div class="dropdown bootstrap-select std_select std_select_big required">
                                <select name="height"
                                    class="form-control std_select std_select_big required mobile-device">
                                    <option value="">إختر ..</option>
                                    <option value="110">110</option>
                                    <option value="111">111</option>
                                    <option value="112">112</option>
                                    <option value="113">113</option>
                                    <option value="114">114</option>
                                    <option value="115">115</option>
                                    <option value="116">116</option>
                                    <option value="117">117</option>
                                    <option value="118">118</option>
                                    <option value="119">119</option>
                                    <option value="120">120</option>
                                    <option value="121">121</option>
                                    <option value="122">122</option>
                                    <option value="123">123</option>
                                    <option value="124">124</option>
                                    <option value="125">125</option>
                                    <option value="126">126</option>
                                    <option value="127">127</option>
                                    <option value="128">128</option>
                                    <option value="129">129</option>
                                    <option value="130">130</option>
                                    <option value="131">131</option>
                                    <option value="132">132</option>
                                    <option value="133">133</option>
                                    <option value="134">134</option>
                                    <option value="135">135</option>
                                    <option value="136">136</option>
                                    <option value="137">137</option>
                                    <option value="138">138</option>
                                    <option value="139">139</option>
                                    <option value="140">140</option>
                                    <option value="141">141</option>
                                    <option value="142">142</option>
                                    <option value="143">143</option>
                                    <option value="144">144</option>
                                    <option value="145">145</option>
                                    <option value="146">146</option>
                                    <option value="147">147</option>
                                    <option value="148">148</option>
                                    <option value="149">149</option>
                                    <option value="150">150</option>
                                    <option value="151">151</option>
                                    <option value="152">152</option>
                                    <option value="153">153</option>
                                    <option value="154">154</option>
                                    <option value="155">155</option>
                                    <option value="156">156</option>
                                    <option value="157">157</option>
                                    <option value="158">158</option>
                                    <option value="159">159</option>
                                    <option value="160">160</option>
                                    <option value="161">161</option>
                                    <option value="162">162</option>
                                    <option value="163">163</option>
                                    <option value="164">164</option>
                                    <option value="165">165</option>
                                    <option value="166">166</option>
                                    <option value="167">167</option>
                                    <option value="168">168</option>
                                    <option value="169">169</option>
                                    <option value="170">170</option>
                                    <option value="171">171</option>
                                    <option value="172">172</option>
                                    <option value="173">173</option>
                                    <option value="174">174</option>
                                    <option value="175" selected="">175</option>
                                    <option value="176">176</option>
                                    <option value="177">177</option>
                                    <option value="178">178</option>
                                    <option value="179">179</option>
                                    <option value="180">180</option>
                                    <option value="181">181</option>
                                    <option value="182">182</option>
                                    <option value="183">183</option>
                                    <option value="184">184</option>
                                    <option value="185">185</option>
                                    <option value="186">186</option>
                                    <option value="187">187</option>
                                    <option value="188">188</option>
                                    <option value="189">189</option>
                                    <option value="190">190</option>
                                    <option value="191">191</option>
                                    <option value="192">192</option>
                                    <option value="193">193</option>
                                    <option value="194">194</option>
                                    <option value="195">195</option>
                                    <option value="196">196</option>
                                    <option value="197">197</option>
                                    <option value="198">198</option>
                                    <option value="199">199</option>
                                    <option value="200">200</option>
                                    <option value="201">201</option>
                                    <option value="202">202</option>
                                    <option value="203">203</option>
                                    <option value="204">204</option>
                                    <option value="205">205</option>
                                    <option value="206">206</option>
                                    <option value="207">207</option>
                                    <option value="208">208</option>
                                    <option value="209">209</option>
                                    <option value="210">210</option>
                                    <option value="211">211</option>
                                    <option value="212">212</option>
                                    <option value="213">213</option>
                                    <option value="214">214</option>
                                    <option value="215">215</option>
                                    <option value="216">216</option>
                                    <option value="217">217</option>
                                    <option value="218">218</option>
                                    <option value="219">219</option>
                                    <option value="220">220</option>
                                    <option value="221">221</option>
                                    <option value="222">222</option>
                                    <option value="223">223</option>
                                    <option value="224">224</option>
                                    <option value="225">225</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 form-group"><label>لون البشرة <sup>*</sup></label>
                            <div class="dropdown bootstrap-select std_select std_select_big required"><select
                                    name="skinColor"
                                    class="form-control std_select std_select_big required mobile-device">
                                    <option value="">إختر ..</option>
                                    <option value="2" selected="" data-alias="">أبيض</option>
                                    <option value="3" data-alias="">حنطي مائل للبياض</option>
                                    <option value="4" data-alias="">حنطي مائل للسمار</option>
                                    <option value="5" data-alias="">اسمر فاتح</option>
                                    <option value="6" data-alias="">اسمر غامق</option>
                                    <option value="7" data-alias="">اسود</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 form-group"><label>بنية الجسم<sup>*</sup></label>
                            <div class="dropdown bootstrap-select std_select std_select_big required"><select
                                    name="bodyShape"
                                    class="form-control std_select std_select_big required mobile-device">
                                    <option value="">إختر ..</option>
                                    <option value="2" data-alias="">نحيف/رفيع</option>
                                    <option value="3" selected="" data-alias="">متوسط البنية</option>
                                    <option value="4" data-alias="">قوام رياضي</option>
                                    <option value="5" data-alias="">سمين</option>
                                    <option value="6" data-alias="">ضخم</option>
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
                                <select name="religiousCommitment"
                                    class="form-control std_select std_select_big required mobile-device">
                                    <option value="">إختر ..</option>
                                    <option value="2" data-alias="">غير متدين</option>
                                    <option value="3" data-alias="">متدين قليلا</option>
                                    <option value="4" selected="" data-alias="">متدين</option>
                                    <option value="5" data-alias="">متدين كثيرا</option>
                                    <option value="6" data-alias="">أفضل أن لا أقول</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 form-group"><label>الصلاة <sup>*</sup></label>
                            <div class="dropdown bootstrap-select std_select std_select_big required">
                                <select name="prayer"
                                    class="form-control std_select std_select_big required mobile-device">
                                    <option value="">إختر ..</option>
                                    <option value="5" selected="" data-alias="">أصلي دائما</option>
                                    <option value="4" data-alias="">أصلي اغلب الأوقات</option>
                                    <option value="3" data-alias="">أصلي بعض الاحيان</option>
                                    <option value="2" data-alias="">لا أصلي</option>
                                    <option value="6" data-alias="">أفضل أن لا أقول</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 form-group"><label>التدخين <sup>*</sup></label>
                            <div class="dropdown bootstrap-select std_select std_select_big required">
                                <select name="smoking"
                                    class="form-control std_select std_select_big required mobile-device">
                                    <option value="">إختر ..</option>
                                    <option value="2" selected="" data-alias="">لا</option>
                                    <option value="3" data-alias="">نعم</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 form-group"><label>اللحية <sup>*</sup></label>
                            <div class="dropdown bootstrap-select std_select std_select_big required">
                                <select name="beard"
                                    class="form-control std_select std_select_big required mobile-device">
                                    <option value="">إختر ..</option>
                                    <option value="7" selected="" data-alias="">لا</option>
                                    <option value="8" data-alias="">نعم</option>
                                </select>
                            </div>
                        </div>
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
                                <select name="educationLevel"
                                    class="form-control std_select std_select_big required mobile-device">
                                    <option value="">إختر ..</option>
                                    <option value="2" data-alias="">دراسة اعدادية</option>
                                    <option value="3" data-alias="">دراسة ثانوية</option>
                                    <option value="4" selected="" data-alias="">دراسة جامعية</option>
                                    <option value="5" data-alias="">دكتوراه</option>
                                    <option value="6" data-alias="">دراسة ذاتية</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 form-group"><label>الوضع المادي <sup>*</sup></label>
                            <div class="dropdown bootstrap-select std_select std_select_big required">
                                <select name="financialStatus"
                                    class="form-control std_select std_select_big required mobile-device">
                                    <option value="">إختر ..</option>
                                    <option value="2" selected="" data-alias="">فقير</option>
                                    <option value="3" data-alias="">قريب من المتوسط</option>
                                    <option value="4" data-alias="">متوسط</option>
                                    <option value="5" data-alias="">اكثر من المتوسط</option>
                                    <option value="6" data-alias="">جيد</option>
                                    <option value="7" data-alias="">ميسور</option>
                                    <option value="8" data-alias="">ثري</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 form-group"><label>مجال العمل <sup>*</sup></label>
                            <div class="dropdown bootstrap-select std_select std_select_big required">
                                <select name="jobCategory"
                                    class="form-control std_select std_select_big required mobile-device">
                                    <option value="">إختر ..</option>
                                    <option value="2" selected="" data-alias="">بدون عمل حاليا</option>
                                    <option value="3" data-alias="">لا زلت أدرس</option>
                                    <option value="4" data-alias="">سكرتارية</option>
                                    <option value="5" data-alias="">مجال الفن / الأدب</option>
                                    <option value="6" data-alias="">الإدارة</option>
                                    <option value="7" data-alias="">مجال التجارة</option>
                                    <option value="8" data-alias="">مجال الأغذية</option>
                                    <option value="9" data-alias="">مجال الإنشاءات والبناء</option>
                                    <option value="10" data-alias="">مجال القانون</option>
                                    <option value="11" data-alias="">مجال الطب</option>
                                    <option value="12" data-alias="">السياسة / الحكومة</option>
                                    <option value="13" data-alias="">متقاعد</option>
                                    <option value="14" data-alias="">التسويق والمبيعات</option>
                                    <option value="15" data-alias="">صاحب عمل خاص</option>
                                    <option value="16" data-alias="">مجال التدريس</option>
                                    <option value="17" data-alias="">مجال الهندسة / العلوم</option>
                                    <option value="18" data-alias="">مجال النقل</option>
                                    <option value="19" data-alias="">مجال الكمبيوتر أو المعلومات</option>
                                    <option value="20" data-alias="">شيء آخر</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 form-group"><label>الوظيفة <sup>*</sup></label> <input dir="auto"
                                class="form-control  required" name="job" value="بدون عمل حاليا"
                                placeholder="ادخل الوظيفة"></div>
                        <div class="col-md-6 form-group"><label>الدخل الشهري <sup>*</sup></label>
                            <div class="dropdown bootstrap-select std_select std_select_big dropup">
                                <select name="salary" class="form-control std_select std_select_big mobile-device"
                                    data-defaultvalue="0">
                                    <option value="0">إختر ..</option>
                                    <option value="5">بدون دخل شهري</option>
                                    <option value="49">اقل من 8000 ليرة</option>
                                    <option value="50">بين 8000 و 15000 ليرة</option>
                                    <option value="51">بين 15000 و 25000 ليرة</option>
                                    <option value="52">بين 25000 و 40000 ليرة</option>
                                    <option value="53">بين 40000 و 60000 ليرة</option>
                                    <option value="54">بين 60000 و 80000 ليرة</option>
                                    <option selected="" value="55">بين 80000 و 120000 ليرة</option>
                                    <option value="56">بين 120000 و 150000 ليرة</option>
                                    <option value="57">اكثر من 150000 ليرة</option>
                                </select>

                            </div>
                        </div>
                        <div class="col-md-6 form-group"><label>الحالة الصحية <sup>*</sup></label>
                            <div class="dropdown bootstrap-select std_select std_select_big"><select
                                    name="healthStatus"
                                    class="form-control std_select std_select_big mobile-device">
                                    <option value="">إختر ..</option>
                                    <option value="4" selected="" data-alias="">بصحة جيدة و الحمد لله</option>
                                    <option value="5" data-alias="">اعاقة حركية</option>
                                    <option value="6" data-alias="">اعاقة فكرية</option>
                                    <option value="7" data-alias="">اكتئاب</option>
                                    <option value="8" data-alias="">انحناء وتقـوس</option>
                                    <option value="9" data-alias="">انفصام شخصية</option>
                                    <option value="10" data-alias="">باطنية</option>
                                    <option value="11" data-alias="">برص</option>
                                    <option value="12" data-alias="">بصريــة</option>
                                    <option value="13" data-alias="">بهاق</option>
                                    <option value="14" data-alias="">جلدية</option>
                                    <option value="15" data-alias="">حروق مشوهة</option>
                                    <option value="16" data-alias="">سكري</option>
                                    <option value="17" data-alias="">سمعية</option>
                                    <option value="18" data-alias="">الكلام - النطق</option>
                                    <option value="19" data-alias="">سمنة مفرطة</option>
                                    <option value="20" data-alias="">شلل أطفال</option>
                                    <option value="21" data-alias="">شلل رباعي</option>
                                    <option value="22" data-alias="">شلل نصفي</option>
                                    <option value="23" data-alias="">صدفية</option>
                                    <option value="24" data-alias="">صرع</option>
                                    <option value="26" data-alias="">عجز جنـسي</option>
                                    <option value="27" data-alias="">عقم</option>
                                    <option value="28" data-alias="">فقدان طرف أو عضو</option>
                                    <option value="29" data-alias="">قزم</option>
                                    <option value="30" data-alias="">متلازمة داون</option>
                                    <option value="31" data-alias="">نفسية</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- مواصفات شريكة -->
            <div class=" input-block bg-white p-4 rounded shadow box-form">
                <h5 class="mb-4">مواصفات شريكة حياتك التي ترغب الإرتباط بها</h5>
                <p><strong>يرجى الكتابة بطريقة جادة. يمنع كتابة البريد الإلكتروني أو رقم الهاتف في هذا
                        المكان</strong></p>
                <div class="row">
                    <div class="col-md-12"><textarea name="aboutPartner" class="form-control"></textarea></div>
                </div>

            </div>

            <!-- تحدث عن نفسك-->
            <div class=" input-block bg-white p-4 rounded shadow box-form">
                <h5 class="mb-4">تحدث عن نفسك</h5>
                <p><strong>يرجى الكتابة بطريقة جادة. يمنع كتابة البريد الإلكتروني أو رقم الهاتف في هذا
                        المكان</strong></p>
                <div class="row">
                    <div class="col-md-12"><textarea name="aboutMe" class="form-control"></textarea></div>
                </div>

            </div>


            <!-- البيانات السرية-->
            <div class=" input-block bg-white p-4 rounded shadow box-form  box-form-last">
                <h5 class="mb-4">البيانات السرية</h5>
                <div class="row">
                    <div class="col-md-6 form-group"><label>الاسم الكامل <sup>*</sup></label> <input
                            class="form-control  " name="fullname" value="احمد مصري"
                            placeholder="اسمك الكامل"></div>
                    <div class="col-md-6 form-group"><label>رقم الجوال <sup>*</sup></label> <input
                            class="form-control  " name="phoneNumber" value="939696798"
                            placeholder="إدخل رقم هاتفك"></div>
                </div>
                <div class="input-feature-block">
                    <h6 class="feature-h" ><strong>حول اسمك الكامل و رقم جوالك :</strong></h6>
                    <ul>
                        <li>الاسم الكامل ورقم الجوال معلومات خاصة بالإدارة ولن تظهر لأحد أبدا</li>
                        <li>كتابتك لهذه المعلومات بالشكل الصحيح هو تأكيد منك على جديتك في الزواج</li>
                    </ul>
                </div>

            </div>
            <div class="submit-block text-center"><button type="button" class="btn btn-lg btn-primary formSubmit"
                    onclick="editProfile.check()"> تعديل بياناتي </button></div>

        </section>



    </div>
</div>


    @endsection
