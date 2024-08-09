@extends('admin.layouts.layout')
 
@section('page-title')
الاعدادات
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
              <li class="breadcrumb-item active">  الاعدادات العامة </li>
              <li class="breadcrumb-item active">معلومات الموقع</li>
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
                  <h3 class="card-title"></h3>        
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                      <i class="fas fa-minus"></i></button>                     
                  </div>
                </div>
                <!-- form start -->
                <div class="card-body  row">
                    <div class="col-lg-8">
                        <form action="{{ url('admin/setting/updateinfo', [$titlerow->id]) }}" id="title-form" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                           
                            <!-- name start -->
                            <div class="form-group row">
                                <label for="name" class="col-sm-3 col-form-label">الاسم</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control " name="name" id="name"
                                    placeholder="* الاسم" value="{{ $titlerow->value1 }}">
                                    <span id="name-error" class="error invalid-feedback"></span>
                                </div>
                            </div>
                            <!-- name end -->
                           
                      

                            <div class="form-group row">
                                <div class="col-sm-2 col-form-label"></div>
                                <div class="col-sm-10">                                     
                                    <button type="submit"   name="btn-title" id="btn-title"
                                        class="btn btn-primary btn-submit">{{ __('general.save',[],'ar') }}</button>
                                
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-4  sm-3  ">
                         
                    </div>
                </div>
            </div>

            <!-- first_name end -->
            <div class="card card-info">
                <div class="card-header">
                  <h3 class="card-title"></h3>        
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                      <i class="fas fa-minus"></i></button>                     
                  </div>
                </div>
                <!-- form start -->
                <div class="card-body  row">
                    <div class="col-lg-8">
                        <form action="{{ url('admin/setting/updateinfo', [$iconrow->id]) }}" id="icon-form" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                        
                           
                            <div class="form-group">
                                <!-- <label for="customFile">Custom File</label> -->
                                <div class="form-group row">
                                    <label for="icon_input" class="col-sm-3 col-form-label">Icon</label>
                                    <div class="col-sm-9">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input"name="icon_input" id="icon_input">
                                            <label class="custom-file-label" id="image_label" for="icon_input">{{ __('general.choose image',[],'ar') }}</label>
                                            <span id="icon_input-error" class="error invalid-feedback"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>   
                               <div class="form-group row">
                                <div class="col-sm-2 col-form-label"></div>
                                <div class="col-sm-10">                                     
                                    <button type="submit"   name="btn-icon" id="btn-icon"
                                        class="btn btn-primary btn-submit">{{ __('general.save',[],'ar') }}</button>
                                
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-4  sm-3  ">
                        <img alt="" id="faviconshow" style="float: left !important;"
                            class="rounded img-thumbnail wd-100p float-sm-right  mg-t-10 mg-sm-t-0" src="{{ $favicon }}" >
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
             <!-- first_name end -->
             <div class="card card-info">
                <div class="card-header">
                  <h3 class="card-title"></h3>        
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                      <i class="fas fa-minus"></i></button>                     
                  </div>
                </div>
                <!-- form start -->
                <div class="card-body  row">
                    <div class="col-lg-8">
                        <form action="{{ url('admin/setting/updateinfo', [$logorow->id]) }}" id="logo-form" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                        
                           
                            <div class="form-group">
                                <!-- <label for="customFile">Custom File</label> -->
                                <div class="form-group row">
                                    <label for="logo_input" class="col-sm-3 col-form-label">شعار الموقع</label>
                                    <div class="col-sm-9">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input"name="logo_input" id="logo_input">
                                            <label class="custom-file-label" id="logo_input_label" for="logo_input">{{ __('general.choose image',[],'ar') }}</label>
                                            <span id="logo_input-error" class="error invalid-feedback"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>   
                               <div class="form-group row">
                                <div class="col-sm-2 col-form-label"></div>
                                <div class="col-sm-10">                                     
                                    <button type="submit"    id="btn-logo"
                                        class="btn btn-primary btn-submit">{{ __('general.save',[],'ar') }}</button>
                                
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-4  sm-3  ">
                        <img alt="" id="logoshow" style="float: left !important;"
                            class="rounded img-thumbnail wd-100p float-sm-right  mg-t-10 mg-sm-t-0" src="{{ $logo }}" >
                    </div>
                </div>
            </div>

            <div class="card card-info">
                <div class="card-header">
                  <h3 class="card-title"></h3>        
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                      <i class="fas fa-minus"></i></button>                     
                  </div>
                </div>
                <!-- form start -->
                <div class="card-body  row">
                    <div class="col-lg-8">
                        <form action="{{ url('admin/setting/updateinfo', [$facerow->id]) }}" id="face-form" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                           
                            <!-- name start -->
                            <div class="form-group row">
                                <label for="face" class="col-sm-3 col-form-label">حساب الفايسبوك</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control " name="face" id="face"
                                    placeholder=" حساب الفايسبوك" value="{{ $facerow->value1 }}">
                                    <span id="face-error" class="error invalid-feedback"></span>
                                </div>
                            </div>
                            <!-- name end -->
                            <div class="form-group row">
                                <label for="twitter" class="col-sm-3 col-form-label">حساب التويتر</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control " name="twitter" id="twitter"
                                    placeholder=" حساب التويتر" value="{{ $twitterrow->value1 }}">
                                    <span id="twitter-error" class="error invalid-feedback"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2 col-form-label"></div>
                                <div class="col-sm-10">                                     
                                    <button type="submit"    id="btn-social"
                                        class="btn btn-primary btn-submit">{{ __('general.save',[],'ar') }}</button>
                                
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-4  sm-3  ">
                         
                    </div>
                </div>
            </div>
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
<script src="{{ URL::asset('assets/admin/js/custom/settinginfo.js') }}"></script>
@endsection
@section('css')
@endsection
