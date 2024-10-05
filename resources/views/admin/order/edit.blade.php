@extends('admin.layouts.layout')

@section('page-title')
    الطلبات
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
                            <li class="breadcrumb-item active"><a href="{{ route('order.index') }}">الطلبات</a></li>
                            <li class="breadcrumb-item active">تفاصيل</li>
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
                    <h3 class="card-title">تفاصيل</h3>
                </div>
                <!-- form start -->
                <div class="card-body  row">
                  <div class="col-lg-8">
                    <form class="form-horizontal" name="create_form" method="POST"
                    action="{{ url('admin/order/update',$item->id) }}" enctype="multipart/form-data" id="create_form">
                    @csrf
                    <div class="form-group row">
                        <label for="order_num" class="col-sm-3 col-form-label">رقم الطلب</label>
                        <div class="col-sm-9">
                            <input type="text" name="order_num"class="form-control" id="order_num" disabled
                                 value="{{ $item->order_num}}">
                            <span id="order_num-error" class="error invalid-feedback"></span>
                        </div>
                    </div>
                    <!-- name start -->
                    <div class="form-group row">
                        <label for="name" class="col-sm-3 col-form-label">العضو</label>
                        <div class="col-sm-9">
                            <input type="text" name="name"class="form-control"  disabled
                                value="{{ $item->client->name }}">
                            <span id="name-error" class="error invalid-feedback"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="pname" class="col-sm-3 col-form-label">الباقة</label>
                        <div class="col-sm-9">
                            <input type="text" name="pname"class="form-control"   disabled
                                 value="{{ $item->package->name }}">
                            <span id="pname-error" class="error invalid-feedback"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="amount" class="col-sm-3 col-form-label">المبلغ</label>
                        <div class="col-sm-9">
                            <input type="text" name="amount"class="form-control"  disabled
                               value="{{ $item->amount }}">
                            <span id="amount-error" class="error invalid-feedback"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="created_at" class="col-sm-3 col-form-label">التاريخ</label>
                        <div class="col-sm-9">
                            <input type="text" name="created_at"class="form-control"  disabled
                               value="{{ $item->created_at }}">
                            <span id="created_at-error" class="error invalid-feedback"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="status" class="col-sm-3 col-form-label">الحالة</label>
                        <div class="col-sm-9">
                            <input type="text" name="status"class="form-control"   disabled
                                 value="{{ $item->status}}">
                            <span id="status-error" class="error invalid-feedback"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="trans_num" class="col-sm-3 col-form-label">رقم الاشعار</label>
                        <div class="col-sm-9">
                            <input type="text" name="trans_num"class="form-control" id="trans_num"  
                                  value="{{ $item->trans_num }}">
                            <span id="trans_num-error" class="error invalid-feedback"></span>
                        </div>
                    </div>
                   
                   


                    <!-- image start -->
                    
                    <!-- image end -->
                    <div class="form-group row">
                        <div class="col-sm-2 col-form-label"></div>
                        <div class="col-sm-10">
                            <button type="submit" name="btn_save"
                                class="btn btn-primary btn-submit">تأكيد</button>
                            <a class="btn btn-danger float-right "
                                href="{{ url('admin/setting/translate') }}">{{ __('general.cancel', [], 'ar') }}</a>
                        </div>
                    </div>
                </form>
                  </div>

                  <div class="col-lg-4  sm-3  ">
                      
                  </div>

              </div>
                <hr>

             

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
@endsection


@section('css')
    {{-- <link rel="stylesheet" href="{{ URL::asset('assets/admin/css/custom/content.css') }}">  --}}
    <!-- summernote -->
    <link rel="stylesheet" href="{{ URL::asset('assets/admin/plugins/summernote/summernote-bs4.min.css') }}">
@endsection
@section('js')
    <script src="{{ URL::asset('assets/admin/js/custom/validate.js') }}"></script>
    <script src="{{ URL::asset('assets/admin//plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script src="{{ URL::asset('assets/admin/js/custom/order.js') }}"></script>
    <script>
        $(function() {
            $('.textarea').summernote();

        });
    </script>
@endsection
