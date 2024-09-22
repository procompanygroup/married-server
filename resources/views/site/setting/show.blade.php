@extends('site.layouts.home-signed.layout')
@section('content')
<div class="container-fluid mt-3 pt-3">
    <div class="row">
        <!-- القسم الجانبي -->
        @include('site.content.profile-sidebar')

        <!-- قسم تعديل البيانات -->
        <section class=" content-sec col-lg-7 col-md-6">

            <h3>إعداداتي</h3>
            <div class="bg-white p-4 rounded shadow box-form">
                <h5 class="mb-4"> الإعدادات العامة </h5>
                <div class="edit-details__content">
                    <form action="{{ url('setting') }}" id="form-setting" name="form-setting" method="post" autocomplete="off">
                        @csrf
                    <table class="col-sm-12">
                        <tbody>                           
                            <tr>
                                <th class="col-sm-3"><label> التصفح الخفي</label></th>
                                <td  >
                                    <div class="col-sm-10 custom-control custom-switch ">
                                        <input type="checkbox" class="custom-control-input" id="is_hidden" name="is_hidden"
                                            value="{{ $client->is_hidden }}" @if ( $client->is_hidden=='1') @checked(true) @endif >
                                        <label class="custom-control-label" for="is_hidden" id="is_hidden_lbl"></label>
                                        <span id="is_hidden-error" class="error invalid-feedback"></span>
                                    </div>
                                </td>

                            </tr>
                            <tr dir="auto text-center">
                                <td dir="auto text-center " colspan="2">
                                    <div class="submit-block text-center "><button type="button"
                                        class="btn btn-lg btn-primary btn-submit">حفظ</button></div>
                                </td>
                            </tr>


                        </tbody>
                    </table>
                    </form>
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