@extends('site.layouts.home-signed.layout')
@section('content')
    <div class="container-fluid mt-3 pt-3">
        <div class="row">
            <!-- القسم الجانبي -->
            @include('site.content.profile-sidebar')

            <!-- قسم تعديل البيانات -->
            <section class=" content-sec col-lg-7 col-md-6">
                <div class="page-head p-3 ">
                    <h3>البحث الالي</h3>
                     
                </div>
                <!-- قسم تعديل الاقامة -->
                <form action="{{ url($lang, 'ai-search') }}" id="form-search" name="form-search" method="post"
                    autocomplete="off">
                    @csrf
                    <div class=" input-block bg-white p-4 rounded shadow box-form">
                      
                        <div class="edit-details__content">
                            <div class="row">
                                <div class="col-md-12 form-group"> 
                                    <p>البحث بالذكاء الاصطناعي</p>                                    
                                </div>  
                                <div class="submit-block text-center col-md-12"><button type="submit"
                                    class="btn btn-lg btn-primary btn-submit">بحث</button></div>                             
                            </div>
                        </div>
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

        // var cityurl = "{{ url('cities', 'ItemId') }}";
        var selcity = "";
        var checkmailurl = "{{ url('checkmail') }}";
     
        var token = '{{ csrf_token() }}';
        var success_msg = "تم الحفظ بنجاح";
        var fail_msg = "لم يتم الحفظ";
        $(function() {
            /* Rounded Dots Dark */

            /* 3d Dark */


            /* Dark Thin */

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
