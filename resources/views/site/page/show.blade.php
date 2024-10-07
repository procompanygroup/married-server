@extends('site.layouts.home-signed.layout')
@section('content')
<div class="container-fluid mt-3 pt-3">
    <div class="row">
        <!-- القسم الجانبي -->
        @include('site.content.profile-sidebar')

       
        <section class=" content-sec col-lg-7 col-md-6">

            <h3>{{ $page['tr_title'] }}</h3>
            <div class="bg-white p-4 rounded shadow box-form">
                 
                <div class="edit-details__content">
                  <div class="category-details">
                    <p>{{Str::of($page['tr_content'])->toHtmlString()}}</p>
                  </div>
                </div>
                        </div>


        </section>
    </div>
</div>


@endsection
@section('js')
<script>
 
    var success_msg = "تم الحفظ بنجاح";
    var fail_msg = "لم يتم الحفظ";
</script>
<script src="{{ url('assets/site/js/sweetalert.min.js') }}"></script>
<script src="{{ url('assets/site/js/custom/setting.js') }}"></script>
@endsection