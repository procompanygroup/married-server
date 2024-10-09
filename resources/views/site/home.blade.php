@extends('site.layouts.home.layout')
@section('content') 
 
<section id="intro" class="clearfix">
  <div class="container">
      <div class="row intro-content  ">
          <div class="intro-info col-sm-5  col-sm-offset-0 ">
              <h1><strong>{{$mainarr['title']}}</strong>
                  <p> للزواج الإسلامي </p>
              </h1>
              <p class="intto-desc">نبحث لك عن نصفك الآخر</p>
          </div>
          <div class="intro-img  ">
              <img src="{{ asset('assets/site/img/home-couple.svg')}}" alt="" class="img-fluid">
          </div>
      </div>
  </div>
</section>
<!-- قسم البحث  -->
<div class="container">
  <div class=" input-block bg-white p-4 rounded shadow box-form advance-search__content">


      <div class="edit-details__content ">
          <div class="row">
              <div class="col-md-12 form-group ">
                  <div class="advance-search_head_content">
                      <h3>إبدأ البحث</h3>

                      <div dir="ltr">
                          <input type="checkbox" id="toggle" class="toggleCheckbox" />
                          <label for="toggle" class='toggleContainer   '>
                              <div><span> ابحث عن</span> زوج</div>
                              <div><span> ابحث عن </span>زوجة</div>

                          </label>
                      </div>
                  </div>
              </div>
          </div>
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
                      <select name="maritalStatus" class=" form-control std_select std_select_big mobile-device">
                          <option value="">كل الحالات</option>
                          <option value="6" data-alias="">آنسة</option>
                          <option value="7" data-alias="">مطلقة</option>
                          <option value="8" data-alias="">ارملة</option>
                      </select>

                  </div>
              </div>

              <div class="col-md-6 form-group d-md-block"><label>العمر</label>
                  <div dir="ltr">
                      <b class="b-slide">18</b> <input id="age-slide" type="text" class="span2" value=""
                          data-slider-min="18" data-slider-max="100" data-slider-step="1"
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
                  <input type="submit" class="btn btn-md btn-danger not-register" value="بـحـث">
              </div>
          </div>
      </div>
  </div>

</div>
<!-- قسم الاشتراك   -->
<section class="signup-section">
  <div class="container">
      <div class="row">
          <div class="col-md-12">
              <div class="row">
                  <div class="col-lg-8 signup-section__content">
                      <h2 class="text-center">إشترك مجانا</h2>
                      <p class="text-center"> مودة هو موقع زواج عربي إسلامي يتيح لجميع الاعضاء التسجيل مجانا، وهو
                          للزواج فقط ولا مجال للتعارف أو للصداقة أو غيرها فسياسة الموقع قائمة على تعاليم الدين
                          الإسلامي</p><a href="{{ url($lang,'befor-reg') }}" class="btn btn-lg btn-danger text-center">إشترك
                          الآن</a>
                  </div>
              </div>
            
          </div>
      </div>
       
  </div>
</section>

<!-- قسم اخر الاعضاء  -->
<section class="latest-members">
  <div class="container-fluid">
      <div class="row">
          <div class="col-md-12">
              <h2>آخر الأعضاء دخولا</h2>
              <div class="latest-members__filter">
                  <div class="filter--primary btn-group btn-group-toggle  " data-toggle="buttons">
                    <label class="btn btn-lg btn-link">
                        <input type="radio" name="members_online" id="option1"
                              autocomplete="off" checked="checked" value="all"> الكل </label>
                      <label class="btn btn-lg btn-link">
                          <input type="radio" name="members_online" id="option2" autocomplete="off"
                              value="female"> الإناث </label>
                      <label class="btn btn-lg btn-link active">
                          <input type="radio" name="members_online" id="option3" autocomplete="off" 
                          value="male">
                          الذكور </label>

                  </div>

              </div>
              <div class="site-section bg-left-half mb-5" dir="ltr">
                  <div class="container owl-2-style">
                      <div class="owl-carousel owl-2">

              
                          @foreach ($last_clients as $client)
                          <div class="carusel-item  {{$client['client']->gender }}-item">
                              <div class="all   " dir="rtl" data-slick-index="6" aria-hidden="true"
                                  tabindex="-1" role="option" aria-describedby="slick-slide03">
                                  <div class="user-card user-card  is-contactable @if($client['is_blacklist']==1) blacklisted @endif" id="card-{{ $client['client']->id }}"
                                    data-user-name="{{ $client['client']->name }}"  data-user-id="{{$client['client']->id }}" > 
                                    
                                    <a  href="{{ url($lang . '/member', $client['client']->id) }}" role="link-profile">
                                        <div class="essential-data">
                                            <div class="avatar"> <img src="{{ $client['client']->image_path }}"
                                                    class="avatar-female" alt="صورة العضو"> <i
                                                    class="ico ico-circle user-status online"></i></div>
                                            <div class="data">
                                                <h3><span class="username" dir="auto">{{ $client['client']->name }}</span>
                                                    <img src="{{ url('assets/site/img/flags/32x32/' . $client['nationality']->code . '.png') }}"
                                                        alt="{{ $client['nationality']->country_name }}">
                                                </h3>
                                                <h4> {{ $client['client']->age }} سنة من
                                                    {{ $client['nationality']->country_name }} </h4>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="secondary-data">
                                        <div class="user-location"><i class="bi bi-geo-alt-fill"></i> <span>
                                                {{ $client['residence']->country_name }} /
                                                {{ $client['residence']->city_name }} </span></div>
                                        <div class="user-marital-status"> <span>
                                                @if ($client['client']->gender == 'male')
                                                    {{ $client['family_status']->option_name }}
                                                @else
                                                    {{ $client['family_status_female']->option_name }}
                                                @endif
                                            </span></div>
                                    </div>
                                    <div class="more-data">
                                        <div class="user-last-login"> </div>
                                        <div class="user-options">
                                            <ul>
                                                <li><span class="profile-visited" title="لقد زرت هذا الملف سابقا"></span></li>
                                                <li><button class="btn btn-primary  not-register"  data-user-contactability="1" title="أرسل رسالة"><i class="fas fa-comments"></i></button></li>
                                                <li> 
                                                    <button class="btn btn-outline-light btn-add-to-favorite not-register"  title="  إضافة للإهتمام "><i class="fas fa-heart"></i></button> </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                              </div>
                          </div>
@endforeach

                      </div>
                  </div>
              </div>
          </div>

      </div>
  </div>

  </div>

</section>

<!-- قسم قصص النجاح   -->

  @endsection
  @section('js')
    <script src="{{ url('assets/site/js/custom/home.js') }}"></script>
@endsection
