@extends('site.layouts.home-signed.layout')
@section('content')
    <div class="container-fluid mt-3 pt-3">
        <div class="row">
            <!-- القسم الجانبي -->
            @include('site.content.profile-sidebar')
            <!-- قسم تعديل البيانات -->
            <section class=" content-sec col-lg-7 col-md-6">
                @if($edit_name==1)
                <form action="{{ route('client.updatename', $lang) }}" id="form-profile" method="post" autocomplete="off">
                    @endif
                    <h3 class="footer-title">تعديل اسم المستخدم</h3>
                    <!-- قسم تعديل  -->
                    <div class=" input-block bg-white p-4 rounded shadow  one-box ">
                        <div class="edit-details__content">
                            <div class="input-block edit-block">
                                <div style="height:30px"></div>
                                <div class="row">
                                    @if($edit_name==1)
                                    <div class="col-md-12 form-group"><label>اسم المستخدم<sup>*</sup></label>
                                        <input type="text" class="form-control   required" name="name" id="name"
                                            value="{{ $client->name }}" placeholder="ادخل اسم المستخدم">
                                        <div id="name-error" class="invalid-feedback"></div>
                                    </div>
                                    @else
                                    <p class=" col-md-12 text-center">انت غير مشترك بهذه الميزة </p> 
                                    @endif

                                </div>
                            </div>

                        </div>
                    </div>
                    @csrf
                    @if($edit_name==1)
                    <div class="submit-block text-center">
                        <button type="button" class="btn btn-lg btn-primary btn-submit"> تعديل </button>
                    </div>
               
                </form>
                @endif
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
