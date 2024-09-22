@extends('admin.layouts.layout')
 
@section('page-title')
خيارات الابلاغ
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
              <li class="breadcrumb-item active"><a href="{{ route('reportoption.index') }}">خيارات الابلاغ</a></li>
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
                        <form class="form-horizontal" name="create_form"  action="{{route('reportoption.update', $item->id)}}" 
                           id="create_form">
                            @csrf
                             
                            
                            <!-- name start -->
                            <div class="form-group row">
                                <label for="content" class="col-sm-3 col-form-label">السبب</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control " name="content" id="content"
                                    placeholder="* السبب" value="{{ $item->content }}">
                                    <span id="content-error" class="error invalid-feedback"></span>
                                </div>
                            </div>
                            <!-- name end -->
                           
                            
                            
                            
                            <div class="form-group row">
                                <label for="is_active" class="col-sm-2 col-form-label">الحالة</label>
                                <div class="col-sm-10 custom-control custom-switch ">
                                    <input type="checkbox" class="custom-control-input" id="is_active" name="is_active"
                                    value="{{ $item->is_active }}" @if ( $item->is_active=='1') @checked(true) @endif >
                                    <label class="custom-control-label" for="is_active" id="is_active_lbl">مفعل</label>
                                    <span id="is_active-error" class="error invalid-feedback"></span>
                                </div>
                            </div>

                        

                            <div class="form-group row">
                                <div class="col-sm-2 col-form-label"></div>
                                <div class="col-sm-10">                                     
                                    <button type="submit"  name="btn_update" id="btn_update"
                                        class="btn btn-primary btn-submit">{{ __('general.save',[],'ar') }}</button>
                                    <a class="btn btn-danger float-right " href="{{ route('reportoption.index') }}">{{ __('general.cancel',[],'ar') }}</a>
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
    <script src="{{ URL::asset('assets/admin/js/custom/validate.js') }}"></script>
    <script src="{{ URL::asset('assets/admin/js/custom/reportoption.js') }}"></script>
@endsection
@section('css')
@endsection