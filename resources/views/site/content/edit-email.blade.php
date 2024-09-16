@extends('site.layouts.home-signed.layout')
@section('content')
    <div class="container-fluid mt-3 pt-3">
        <div class="row">
            <!-- القسم الجانبي -->
            @include('site.content.profile-sidebar')
            <!-- قسم تعديل البيانات -->
            <section class=" content-sec col-lg-7 col-md-6">
                <form action="{{ route('client.updateemail', $lang) }}" id="form-profile" method="post" autocomplete="off">
                    <h3 class="footer-title">تعديل البريد الإكتروني</h3>          
                    <!-- قسم تعديل  -->
                  
                        <div class=" input-block bg-white p-4 rounded shadow  one-box ">                             
                            <div class="edit-details__content">                              
                                <div class="input-block edit-block">
                                    <div style="height:30px"></div>
                                  
                                    <div class="row">
                                        <div class="col-md-12 form-group"><label>البريد الالكتروني<sup>*</sup></label> 
                                            <input  type="text" class="form-control   required"  name="email"  id="email" value="{{ $client->email }}" placeholder="ادخل البريد الالكتروني " >
                                            <div id="email-error" class="invalid-feedback"></div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>


                        @csrf
                       
                        <div class="submit-block text-center">
                            <button type="button" class="btn btn-lg btn-primary btn-submit"> تعديل  </button></div>
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
        var success_msg = "تم الحغظ بنجاح";
        var fail_msg = "لم يتم الحفظ";
    </script>
    <script src="{{ url('assets/site/js/sweetalert.min.js') }}"></script>
    <script src="{{ url('assets/site/js/custom/validate.js') }}"></script>
    <script src="{{ url('assets/site/js/custom/edit-account.js') }}"></script>
@endsection
