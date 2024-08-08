@extends('admin.layouts.layout')
 
@section('page-title')
{{ __('general.managers',[],'ar') }}
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
              <li class="breadcrumb-item active"><a href="{{ route('user.index') }}">{{ __('general.managers',[],'ar') }}</a></li>
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
                  <h3 class="card-title">مدير جديد</h3>        
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                      <i class="fas fa-minus"></i></button>                     
                  </div>
                </div>
                <!-- form start -->
                <div class="card-body  row">
                    <div class="col-lg-8">
                        <form class="form-horizontal" name="create_form" method="POST" action="{{route('user.store')}}" 
                            enctype="multipart/form-data" id="create_form">
                            @csrf 
                            <!-- Email start -->
                            <div class="form-group row">
                                <label for="email" class="col-sm-3 col-form-label">{{ __('general.email',[],'ar') }}</label>
                                <div class="col-sm-9">
                                    <input type="text" name="email"class="form-control" id="email"
                                        placeholder="* {{ __('general.email',[],'ar') }}" value="">
                                    <span id="email-error" class="error invalid-feedback"></span>
                                </div>
                            </div>
                            <!-- Email end -->
                            <!-- name start -->
                            <div class="form-group row">
                                <label for="name" class="col-sm-3 col-form-label">{{ __('general.user_name',[],'ar') }}</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control " name="name" id="name"
                                        placeholder="* {{ __('general.user_name',[],'ar') }}" value="">
                                    <span id="name-error" class="error invalid-feedback"></span>
                                </div>
                            </div>
                            <!-- name end -->
                            <!-- Password start -->
                            <div class="form-group row">
                                <label for="password" class="col-sm-3 col-form-label">{{ __('general.password',[],'ar') }}</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control  " name="password" id="password"
                                        placeholder="* {{ __('general.password',[],'ar') }}" value="">
                                    <span id="password-error" class="error invalid-feedback"></span>
                                </div>
                            </div>
                            <!-- Password end -->
                            <!--Confirm Password start -->
                            <div class="form-group row">
                                <label for="confirm_password" class="col-sm-3 col-form-label">{{ __('general.confirm_password',[],'ar') }}</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control  " id="confirm_password"
                                        name="confirm_password" placeholder="* {{ __('general.confirm_password',[],'ar') }}" value="">
                                    <span id="confirm_password-error" class="error invalid-feedback"></span>
                                </div>
                            </div>
                            <!-- Confirm Password end -->
                          
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
                                <div class="col-sm-2 col-form-label"></div>
                                <div class="col-sm-10">                                     
                                    <button type="submit" type="submit" name="btn_update" id="btn_update"
                                        class="btn btn-primary ">{{ __('general.save',[],'ar') }}</button>
                                    <a class="btn btn-danger float-right " href="{{ route('user.index') }}">{{ __('general.cancel',[],'ar') }}</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-4  sm-3  ">
                        <img alt="" id="imgshow" style="float: left !important;" 
                            class="rounded img-thumbnail wd-100p float-sm-right  mg-t-10 mg-sm-t-0" src="{{URL::asset('assets/admin/dist/img/default.png')}}" >
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
    <script src="{{ URL::asset('assets/admin/js/custom/profile.js') }}"></script>
    <script >
 var emptyimg ="{{URL::asset('assets/img/photos/1.jpg')}}";
</script>
   
@endsection
@section('css')
@endsection
