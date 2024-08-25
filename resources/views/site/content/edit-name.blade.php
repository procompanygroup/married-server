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
                <form action="{{ route('client.updatename', $lang) }}" id="form-profile" method="post" autocomplete="off">
                    <h3 class="footer-title">تعديل اسم المستخدم</h3>
                    <!-- قسم تعديل  -->
                    <div class=" input-block bg-white p-4 rounded shadow  one-box ">
                        <div class="edit-details__content">
                            <div class="input-block edit-block">
                                <div style="height:30px"></div>
                                <div class="row">
                                    <div class="col-md-12 form-group"><label>اسم المستخدم<sup>*</sup></label>
                                        <input type="text" class="form-control   required" name="name" id="name"
                                            value="{{ $client->name }}" placeholder="ادخل اسم المستخدم">
                                        <div id="name-error" class="invalid-feedback"></div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    @csrf
                    <div class="submit-block text-center">
                        <button type="button" class="btn btn-lg btn-primary btn-submit"> تعديل </button>
                    </div>
                </form>
            </section>
        </div>
    </div>
@endsection
@section('js')
    <script>
        // var fail_msg = "لم يتم الحفظ";
        var lang = "{{ $lang }}";




        var token = '{{ csrf_token() }}';
        var success_msg = "تم الحفظ بنجاح";
        var fail_msg = "لم يتم الحفظ";
    </script>
    <script src="{{ url('assets/site/js/sweetalert.min.js') }}"></script>
    <script src="{{ url('assets/site/js/custom/validate.js') }}"></script>
    <script src="{{ url('assets/site/js/custom/edit-account.js') }}"></script>
@endsection