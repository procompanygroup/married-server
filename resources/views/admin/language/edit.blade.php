@extends('admin.layouts.layout')
 
@section('page-title')
اللغة
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
              <li class="breadcrumb-item active"><a href="{{ route('language.index') }}">اللغة</a></li>
              <li class="breadcrumb-item active">تعديل</li>
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
                  <h3 class="card-title">تعديل</h3>        
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                      <i class="fas fa-minus"></i></button>                     
                  </div>
                </div>
                <!-- form start -->
                <div class="card-body  row">
                    <div class="col-lg-8">
                        <form class="form-horizontal" name="create_form" method="POST" action="{{route('language.update', $item->id)}}" 
                            enctype="multipart/form-data" id="create_form">
                            @csrf 
                            <!-- Email start -->
                            <div class="form-group row">
                                <label for="code" class="col-sm-3 col-form-label">الرمز</label>
                                <div class="col-sm-9">
                                    <input type="text" name="code"class="form-control"   id="code"
                                    placeholder="* الرمز" value="{{ $item->code }}">
                                    <span id="code-error" class="error invalid-feedback"></span>
                                </div>
                            </div>
                            <!-- Email end -->
                            <!-- name start -->
                            <div class="form-group row">
                                <label for="name" class="col-sm-3 col-form-label">الاسم</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control " name="name" id="name"
                                    placeholder="* الاسم" value="{{ $item->name }}">
                                    <span id="name-error" class="error invalid-feedback"></span>
                                </div>
                            </div>
                            <!-- name end -->
                           
                            
                            <!-- first_name start -->
                            <div class="form-group">
                                <!-- <label for="customFile">Custom File</label> -->
                                <div class="form-group row">
                                    <label for="image" class="col-sm-3 col-form-label">الصورة</label>
                                    <div class="col-sm-9">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="image"
                                                id="image">
                                            <label class="custom-file-label" id="image_label" for="image">{{ __('general.choose image',[],'ar') }}</label>
                                            <span id="image-error" class="error invalid-feedback"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>   
                            
                            <div class="form-group row">
                                <label for="status" class="col-sm-2 col-form-label">الحالة</label>
                                <div class="col-sm-10 custom-control custom-switch ">
                                    <input type="checkbox" class="custom-control-input" id="status" name="status"
                                    value="{{ $item->status }}" @if ( $item->status=='1') @checked(true) @endif >
                                    <label class="custom-control-label" for="status" id="status_lbl">مفعل</label>
                                    <span id="status-error" class="error invalid-feedback"></span>
                                </div>
                            </div>

                            <div class="form-group row">
                              <label for="is_default" class="col-sm-2 col-form-label">افتراضي</label>
                              <div class="col-sm-10 custom-control custom-switch ">
                                  <input type="checkbox" class="custom-control-input" id="is_default" name="is_default"
                                  value="{{ $item->is_default }}" @if ( $item->is_default=='1') @checked(true) @endif >
                                  <label class="custom-control-label" for="is_default" id="is_default_lbl">افتراضي</label>
                                  <span id="is_default-error" class="error invalid-feedback"></span>
                              </div>
                          </div>

                            <div class="form-group row">
                                <div class="col-sm-2 col-form-label"></div>
                                <div class="col-sm-10">                                     
                                    <button type="submit" type="submit" name="btn_update" id="btn_update"
                                        class="btn btn-primary btn-submit">{{ __('general.save',[],'ar') }}</button>
                                    <a class="btn btn-danger float-right " href="{{ route('language.index') }}">{{ __('general.cancel',[],'ar') }}</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-4  sm-3  ">
                        <img alt="" id="imgshow" style="float: left !important;"
                            class="rounded img-thumbnail wd-100p float-sm-right  mg-t-10 mg-sm-t-0" src="{{ $item->image_path }}" >
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
    <script src="{{ URL::asset('assets/admin/js/custom/lang.js') }}"></script>
@endsection
@section('css')
@endsection
