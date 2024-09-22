@extends('site.layouts.home-signed.layout')
@section('content')
    <div class="container-fluid mt-3 pt-3">
        <div class="row">
            <!-- القسم الجانبي -->
            @include('site.content.profile-sidebar')
            <!-- قسم تعديل البيانات -->
            <section class=" content-sec col-lg-7 col-md-6">
                <form action="{{ route('client.update_image', $lang) }}" id="form-profile" method="post" autocomplete="off">
                    <h3 class="footer-title">صورتي</h3>
                    <!-- قسم تعديل  -->
                    <div class=" input-block bg-white p-4 rounded shadow  one-box ">
                        <div class="edit-details__content">
                            <div class="input-block edit-block">
                                <div style="height:30px"></div>
                                <div class="row">
                                    <div class="col-md-8 form-group"><label>الصورة<sup></sup></label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="image"
                                                id="image">
                                            <label class="custom-file-label text-center" id="image_label" for="image">{{ __('general.choose image',[],'ar') }}</label>
                                            <span id="image-error" class="error invalid-feedback"></span>
                                        </div>
                                       
                                    </div>
                                   
                                    <div class="col-lg-4  sm-3  ">
                                        <img alt="" id="imgshow" style="float: left !important;"
                                            class="rounded img-thumbnail wd-100p float-sm-right  mg-t-10 mg-sm-t-0" src="#" >
                                    </div>

                                </div>
                            </div>

                        </div>
                      
                    </div>
                    @csrf
                    <div class="submit-block text-center">
                        <button type="button" id="btn-submit-img" class="btn btn-lg btn-primary "> حفظ </button>
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
