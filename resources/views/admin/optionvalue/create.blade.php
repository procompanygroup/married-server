@extends('admin.layouts.layout')

@section('page-title')
    قيم المواصفات
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
                            <li class="breadcrumb-item active"><a href="{{ url('admin/option/') }}"> قيم المواصفات</a></li>
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
                            action="{{ url('admin/option') }}" enctype="multipart/form-data" id="create_form">
                            @csrf
                            <!-- Email start -->
                            <div class="form-group row">
                                <label for="name" class="col-sm-3 col-form-label">الاسم</label>
                                <div class="col-sm-9">
                                    <input type="name" name="name"class="form-control" id="name"
                                        placeholder="* الاسم" value="">
                                    <span id="name-error" class="error invalid-feedback"></span>
                                </div>
                            </div>
                            <!-- Email end -->
                            <!-- name start -->
                            <div class="form-group row">
                                <label for="property_id" class="col-sm-3 col-form-label">الصفة</label>
                                <div class="col-sm-9">
                                    <select class="form-control " name="property_id" id="property_id" placeholder="* الصفة"
                                        value="">
                                        <option value="0">اختر الصفة</option>
                                        @foreach ($property_list as $prop)
                                            <option value="{{ $prop->id }}">{{ $prop->name }}-{{ $prop->propertydep->name }}</option>
                                        @endforeach
                                    </select>
                                    <span id="property_id-error" class="error invalid-feedback"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="type" class="col-sm-3 col-form-label">نوع البيانات</label>
                                <div class="col-sm-9">
                                    <select class="form-control " name="type" id="type" placeholder="* المجموعة"
                                        value="">
                                        <option value="0">اختر نوع البيانات</option>
                                        <option value="string">نص</option>
                                        <option value="integer">رقم</option>
                                        
                                    </select>
                                    <span id="type-error" class="error invalid-feedback"></span>
                                </div>
                            </div>
                            <!-- name end -->
                            <div class="form-group row">
                                <label for="op_val" class="col-sm-3 col-form-label">القيمة</label>
                                <div class="col-sm-9">
                                    <input type="text" name="op_val" class="form-control" id="op_val"
                                        placeholder="* القيمة" value="">
                                    <span id="op_val-error" class="error invalid-feedback"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="notes" class="col-sm-3 col-form-label">ملاحظات</label>
                                <div class="col-sm-9">
                                    <input type="text" name="notes"class="form-control" id="notes"
                                        placeholder=" ملاحظات" value="">
                                    <span id="notes-error" class="error invalid-feedback"></span>
                                </div>
                            </div>

                           

                            <div class="form-group row">
                                <label for="is_active" class="col-sm-2 col-form-label">الحالة</label>
                                <div class="col-sm-10 custom-control custom-switch ">
                                    <input type="checkbox" class="custom-control-input" id="is_active" name="is_active"
                                        value="1" checked>
                                    <label class="custom-control-label" for="is_active" id="is_active_lbl">مفعل</label>
                                    <span id="is_active-error" class="error invalid-feedback"></span>
                                </div>
                            </div>
                            <!-- first_name start -->
                           

                            <div class="form-group row">
                                <div class="col-sm-2 col-form-label"></div>
                                <div class="col-sm-10">
                                    <button type="submit" name="btn_save"
                                        class="btn btn-primary btn-submit">{{ __('general.save', [], 'ar') }}</button>
                                    <a class="btn btn-danger float-right "
                                        href="{{ url('admin/option') }}">{{ __('general.cancel', [], 'ar') }}</a>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="col-lg-4  sm-3  ">
                        
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
    <script src="{{ URL::asset('assets/admin/js/custom/property.js') }}"></script>
@endsection
@section('css')
@endsection
