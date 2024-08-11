@extends('admin.layouts.layout')
 
@section('page-title')
المجموعات
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
              <li class="breadcrumb-item active"><a href="{{url('admin/propdep/')}}">المجموعات</a></li>
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
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                      <i class="fas fa-minus"></i></button>                     
                  </div>
                </div>
                <!-- form start -->
                <div class="card-body  row">
                    <div class="col-lg-8">
                        <form class="form-horizontal" name="create_form" method="POST" action="{{ url('admin/propdep') }}"
                        enctype="multipart/form-data" id="create_form">
                            @csrf 
                            <!-- Email start -->
                            <div class="form-group row">
                                <label for="name" class="col-sm-3 col-form-label">الاسم</label>
                                <div class="col-sm-9">
                                    <input type="text" name="name"class="form-control"   id="name"
                                    placeholder="* الاسم" value="">
                                    <span id="name-error" class="error invalid-feedback"></span>
                                </div>
                            </div>
                            <!-- Email end -->
                            <!-- name start -->
                          
                            <!-- name end -->
                         
 

                            <div class="form-group row">
                                <div class="col-sm-2 col-form-label"></div>
                                <div class="col-sm-10">                                     
                                    <button type="submit"  name="btn_save" 
                                        class="btn btn-primary btn-submit">{{ __('general.save',[],'ar') }}</button>
                                    <a class="btn btn-danger float-right " href="{{url('admin/propdep')}}">{{ __('general.cancel',[],'ar') }}</a>
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
