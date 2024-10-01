@extends('admin.layouts.layout')

@section('page-title')
الباقات
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1></h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('/admin') }}">الرئيسية</a></li>
                            <li class="breadcrumb-item active"><a href="{{ route('package.index') }}">الباقات</a></li>
                            <li class="breadcrumb-item active">جديد</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <!-- Horizontal Form -->
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">جديد</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                            <i class="fas fa-minus"></i></button>
                    </div>
                </div>
                <!-- form start -->
                <div class="card-body  row">
                    <div class="col-lg-8">
                        <form class="form-horizontal" name="create_form" method="POST"
                            action="{{ route('package.store') }}" enctype="multipart/form-data" id="create_form">
                            @csrf
                            <!-- name start -->
                            <div class="form-group row">
                                <label for="name" class="col-sm-3 col-form-label">الباقة</label>
                                <div class="col-sm-9">
                                    <input type="text" name="name"class="form-control" id="name"
                                        placeholder="* الاسم" value="">
                                    <span id="name-error" class="error invalid-feedback"></span>
                                </div>
                            </div>
                            <!-- name end -->
                            <!-- code start -->
                            <div class="form-group row">
                                <label for="code" class="col-sm-3 col-form-label">الرمز</label>
                                <div class="col-sm-9">
                                    <input type="text" name="code"class="form-control" id="code"
                                        placeholder="* الرمز" value="">
                                    <span id="code-error" class="error invalid-feedback"></span>
                                </div>
                            </div>
                            <!-- code end -->

                            <!-- chat_count start -->
                            <div class="form-group row">
                                <label for="chat_count" class="col-sm-3 col-form-label">عدد المحادثات</label>
                                <div class="col-sm-9">
                                    <input type="text" name="chat_count"class="form-control" id="chat_count"
                                        placeholder="* عدد المحادثات" value="">
                                    <span id="chat_count-error" class="error invalid-feedback"></span>
                                </div>
                            </div>
                            <!-- chat_count end -->

                            <!-- search_count start -->
                            <div class="form-group row">
                                <label for="search_count" class="col-sm-3 col-form-label"> عدد عمليات البحث</label>
                                <div class="col-sm-9">
                                    <input type="text" name="search_count"class="form-control" id="search_count"
                                        placeholder="* عدد عمليات البحث" value="">
                                    <span id="search_count-error" class="error invalid-feedback"></span>
                                </div>
                            </div>
                            <!-- search_count end -->
                            <!-- favorite_count start -->
                            <div class="form-group row">
                                <label for="favorite_count" class="col-sm-3 col-form-label">عدد الاشخاص في قائمة
                                    الاهتمام</label>
                                <div class="col-sm-9">
                                    <input type="text" name="favorite_count"class="form-control" id="favorite_count"
                                        placeholder="* عدد الاشخاص " value="">
                                    <span id="favorite_count-error" class="error invalid-feedback"></span>
                                </div>
                            </div>
                            <!-- favorite_count end -->
                            <!-- hidden_feature start -->
                            <div class="form-group row">
                                <label for="hidden_feature" class="col-sm-4 col-form-label"> السماح بالتصفح الخفي</label>
                                <div class="col-sm-8 custom-control custom-switch ">
                                    <input type="checkbox" class="custom-control-input" id="hidden_feature"
                                        name="hidden_feature" value="1" checked>
                                    <label class="custom-control-label" for="hidden_feature"
                                        id="hidden_feature_lbl">مفعل</label>
                                    <span id="hidden_feature-error" class="error invalid-feedback"></span>
                                </div>
                            </div>
                            <!-- hidden_feature end -->

                            <!-- show_img start -->
                            <div class="form-group row">
                                <label for="show_img" class="col-sm-4 col-form-label"> السماح بإظهار الصورة
                                    للاعضاء</label>
                                <div class="col-sm-8 custom-control custom-switch ">
                                    <input type="checkbox" class="custom-control-input" id="show_img" name="show_img"
                                        value="1" checked>
                                    <label class="custom-control-label" for="show_img" id="show_img_lbl">مفعل</label>
                                    <span id="show_img-error" class="error invalid-feedback"></span>
                                </div>
                            </div>
                            <!-- show_img end -->

                            <!-- special_member start -->
                            <div class="form-group row">
                                <label for="special_member" class="col-sm-4 col-form-label"> عضو مميز</label>
                                <div class="col-sm-8 custom-control custom-switch ">
                                    <input type="checkbox" class="custom-control-input" id="special_member"
                                        name="special_member" value="1" checked>
                                    <label class="custom-control-label" for="special_member"
                                        id="special_member_lbl">مفعل</label>
                                    <span id="special_member-error" class="error invalid-feedback"></span>
                                </div>
                            </div>
                            <!-- special_member end -->

                            <!-- edit_name start -->
                            <div class="form-group row">
                                <label for="edit_name" class="col-sm-4 col-form-label"> السماح بتعديل الاسم</label>
                                <div class="col-sm-8 custom-control custom-switch ">
                                    <input type="checkbox" class="custom-control-input" id="edit_name" name="edit_name"
                                        value="1" checked>
                                    <label class="custom-control-label" for="edit_name" id="edit_name_lbl">مفعل</label>
                                    <span id="edit_name-error" class="error invalid-feedback"></span>
                                </div>
                            </div>
                            <!-- edit_name end -->

                            <!-- is_expire start -->
                            <div class="form-group row">
                                <label for="is_expire" class="col-sm-4 col-form-label"> يوجد تاريخ صلاحية</label>
                                <div class="col-sm-8 custom-control custom-switch ">
                                    <input type="checkbox" class="custom-control-input" id="is_expire" name="is_expire"
                                        value="1" checked>
                                    <label class="custom-control-label" for="is_expire" id="is_expire_lbl">مفعل</label>
                                    <span id="is_expire-error" class="error invalid-feedback"></span>
                                </div>
                            </div>
                            <!-- is_expire end -->

                            <!-- expire_duration start -->
                            <div class="form-group row">
                                <label for="expire_duration" class="col-sm-3 col-form-label"> مدة الصلاحية</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="expire_duration" id="expire_duration"
                                        placeholder="* المجموعة" value="">
                                        <option value="0">اختر المدة</option>
                                        @php
                                        $i=1;
                                         for($i==1;$i<=12;$i++) 
                                          {
                                            @endphp
                                            <option value="{{ $i }}">{{ $i }}</option> 
                                            @php
                                          }
                                          @endphp
                                        
                                    </select>
                                    شهر
                                    <span id="expire_duration-error" class="error invalid-feedback"></span>
                                </div>
                            </div>
                            <!-- expire_duration end -->
                            <!-- price start -->
                            <div class="form-group row">
                                <label for="price" class="col-sm-3 col-form-label">السعر</label>
                                <div class="col-sm-9">
                                    <input type="text" name="price"class="form-control" id="price"
                                        placeholder="* السعر " value="">
                                    <span id="price-error" class="error invalid-feedback"></span>
                                </div>
                            </div>
                            <!-- price end -->
                            <!-- is_active start -->
                            <div class="form-group row">
                                <label for="is_active" class="col-sm-4 col-form-label">الحالة</label>
                                <div class="col-sm-8 custom-control custom-switch ">
                                    <input type="checkbox" class="custom-control-input" id="is_active" name="is_active"
                                        value="1" checked>
                                    <label class="custom-control-label" for="is_active" id="is_active_lbl">مفعل</label>
                                    <span id="is_active-error" class="error invalid-feedback"></span>
                                </div>
                            </div>
                            <!-- is_active end -->


                            <!-- image start -->
                            <div class="form-group">
                                <!-- <label for="customFile">Custom File</label> -->
                                <div class="form-group row">
                                    <label for="image" class="col-sm-3 col-form-label">الصورة</label>
                                    <div class="col-sm-9">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="image"
                                                id="image">
                                            <label class="custom-file-label" id="image_label"
                                                for="image">{{ __('general.choose image', [], 'ar') }}</label>
                                            <span id="image-error" class="error invalid-feedback"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- image end -->
                            <div class="form-group row">
                                <div class="col-sm-2 col-form-label"></div>
                                <div class="col-sm-10">
                                    <button type="submit" name="btn_save"
                                        class="btn btn-primary btn-submit">{{ __('general.save', [], 'ar') }}</button>
                                    <a class="btn btn-danger float-right "
                                        href="{{ url('admin/setting/translate') }}">{{ __('general.cancel', [], 'ar') }}</a>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="col-lg-4  sm-3  ">
                        <img alt="" id="imgshow" style="float: left !important;"
                            class="rounded img-thumbnail wd-100p float-sm-right  mg-t-10 mg-sm-t-0"
                            src="{{ URL::asset('assets/admin/dist/img/default.png') }}">
                    </div>

                </div>
            </div>
            <!-- first_name end -->
            <!-- /.card-body -->
            <div class="card-footer">
            </div>
            <!-- /.card-footer -->
    </div>
    <!-- /.card -->
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <!-- /.card -->
@endsection
@section('js')
<script src="{{ URL::asset('assets/admin/js/custom/validate.js') }}"></script>
    <script src="{{ URL::asset('assets/admin/js/custom/package.js') }}"></script>
@endsection
@section('css')
@endsection
