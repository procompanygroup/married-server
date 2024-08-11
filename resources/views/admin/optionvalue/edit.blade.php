@extends('admin.layouts.layout')

@section('page-title')
    الترجمة
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
                            <li class="breadcrumb-item active"><a href="{{ url('admin/property') }}">المواصفات</a></li>
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
                </div>
                <!-- form start -->
                <div class="card-body  row">
                  <div class="col-lg-8">
                      <form class="form-horizontal" name="create_form" method="POST"
                          action="{{ url('admin/property/update',$item->id) }}" enctype="multipart/form-data" id="create_form">
                          @csrf
                          <!-- Email start -->
                          <div class="form-group row">
                              <label for="name" class="col-sm-3 col-form-label">الاسم</label>
                              <div class="col-sm-9">
                                  <input type="name" name="name"class="form-control" id="name"
                                      placeholder="* الاسم" value="{{ $item->name }}">
                                  <span id="name-error" class="error invalid-feedback"></span>
                              </div>
                          </div>
                          <!-- Email end -->
                          <!-- name start -->
                          <div class="form-group row">
                              <label for="dep_id" class="col-sm-3 col-form-label">المجموعة</label>
                              <div class="col-sm-9">
                                  <select class="form-control " name="dep_id" id="dep_id" placeholder="* المجموعة"
                                      value="">
                                      <option value="0">اختر المجموعة</option>
                                      @foreach ($dep_list as $dep)
                                          <option value="{{ $dep->id }}"  @if ($dep->id==$item->dep_id) @selected(true)  @endif>{{ $dep->name }}</option>
                                      @endforeach
                                  </select>
                                  <span id="dep_id-error" class="error invalid-feedback"></span>
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="type" class="col-sm-3 col-form-label">نوع البيانات</label>
                              <div class="col-sm-9">
                                  <select class="form-control " name="type" id="type" placeholder="* المجموعة"
                                      value="">
                                      <option value="0">اختر نوع البيانات</option>
                                      <option value="string" @if ($item->type=='string') @selected(true)  @endif >نص</option>
                                      <option value="integer" @if ($item->type=='integer') @selected(true)  @endif >رقم</option>
                                      <option value="datetime" @if ($item->type=='datetime') @selected(true)  @endif >تاريخ</option>
                                  </select>
                                  <span id="type-error" class="error invalid-feedback"></span>
                              </div>
                          </div>
                          <!-- name end -->
                          <div class="form-group row">
                              <label for="notes" class="col-sm-3 col-form-label">ملاحظات</label>
                              <div class="col-sm-9">
                                  <input type="notes" name="notes"class="form-control" id="notes"
                                      placeholder=" ملاحظات" value="{{ $item->notes }}">
                                  <span id="notes-error" class="error invalid-feedback"></span>
                              </div>
                          </div>

                          <div class="form-group row">
                              <label for="status" class="col-sm-2 col-form-label">متعدد القيم</label>
                              <div class="col-sm-10 custom-control custom-switch ">
                                  <input type="checkbox" class="custom-control-input" id="is_multivalue"
                                      name="is_multivalue"   value="{{ $item->is_multivalue }}" @if ( $item->is_multivalue=='1') @checked(true) @endif>
                                  <label class="custom-control-label" for="is_multivalue" id="is_multivalue_lbl">متعدد
                                      القيم</label>
                                  <span id="is_multivalue-error" class="error invalid-feedback"></span>
                              </div>
                          </div>

                          <div class="form-group row">
                              <label for="is_active" class="col-sm-2 col-form-label">الحالة</label>
                              <div class="col-sm-10 custom-control custom-switch ">
                                  <input type="checkbox" class="custom-control-input" id="is_active" name="is_active"
                                  value="{{ $item->is_active }}" @if ( $item->is_active=='1') @checked(true) @endif >
                                  <label class="custom-control-label" for="is_active" id="is_active_lbl">مفعل</label>
                                  <span id="is_active-error" class="error invalid-feedback"></span>
                              </div>
                          </div>
                          <!-- first_name start -->
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
                          src="{{ $item->image_path }}">
                  </div>

              </div>
                <hr>

                <!--translation && media -->
                <div class="col-12 col-sm-12">
                    <div class="card card-primary card-tabs">
                        <div class="card-header p-0 pt-1">
                            <ul class="nav nav-tabs" id="project-tabs-one-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="custom-tabs-one-trans-tab" data-toggle="pill"
                                        href="#custom-tabs-one-trans" role="tab" aria-controls="custom-tabs-one-trans"
                                        aria-selected="true">الترجمة</a>
                                </li>

                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="project-tabs-one-tabContent">
                                <div class="tab-pane fade show active" id="custom-tabs-one-trans" role="tabpanel"
                                    aria-labelledby="custom-tabs-one-trans-tab">
                                    <p>تعديل الترجمة</p>

                                    <div class="card card-primary card-outline card-outline-tabs">
                                        <div class="card-header p-0 border-bottom-0">
                                            <ul class="nav nav-tabs" id="trans-tabs-four-tab" role="tablist">

                                                @foreach ($lang_list as $lang)
                                                    <li class="nav-item">
                                                        <a class="nav-link @once active @endonce"
                                                            id="lang-{{ $lang->id }}-tab" data-toggle="pill"
                                                            href="#lang-{{ $lang->id }}" role="tab"
                                                            aria-controls="lang-{{ $lang->id }}"
                                                            aria-selected="true">{{ $lang->name }}</a>
                                                    </li>
                                                @endforeach

                                            </ul>
                                        </div>
                                        <div class="card-body">
                                            <div class="tab-content" id="trans-tabs-four-tabContent">
                                                @foreach ($lang_list as $lang)
                                                    <div class="tab-pane fade @once show active @endonce "
                                                        id="lang-{{ $lang->id }}" role="tabpanel"
                                                        aria-labelledby="lang-{{ $lang->id }}-tab">
                                                        <form class="form-horizontal"
                                                            name="update_trans_form-{{ $lang->id }}" method="POST"
                                                            action="{{ route('langpost.updateprop', $item->id) }}"
                                                            enctype="multipart/form-data"
                                                            id="update_trans_form-{{ $lang->id }}">
                                                            @csrf

                                                            <div class="form-group row">
                                                                <label for="title_trans"
                                                                    class="col-sm-2 col-form-label">الاسم</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control"
                                                                        name="title_trans" id="title_trans"
                                                                        placeholder="* Title"
                                                                        value="@if ($lang->langposts->first()) {{ $lang->langposts->first()->title_trans }} @endif">

                                                                    <span id="title_trans-error"
                                                                        class="error invalid-feedback"></span>

                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label for="content_trans"
                                                                    class="col-sm-2 col-form-label">الوصف</label>
                                                                <div class="col-sm-10">
                                                                    <textarea class="textarea" name="content_trans" id="content_trans" rows="10"
                                                                        placeholder="Place the translation here"
                                                                        style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
@if ($lang->langposts->first())
{{ $lang->langposts->first()->content_trans }}
@endif
</textarea>
                                                                    <span id="content_trans-error"
                                                                        class="error invalid-feedback"></span>
                                                                </div>
                                                            </div>
                                                            <input type="hidden" value="{{ $lang->id }}"
                                                                name="lang_id">

                                                            <div class="form-group row">
                                                                <div class="col-sm-2 col-form-label"></div>
                                                                <div class="col-sm-10">
                                                                    <button type="submit" type="submit"
                                                                        name="btn_update_trans-{{ $lang->id }}"
                                                                        id="btn_update_trans-{{ $lang->id }}"
                                                                        class="btn btn-primary btn-submit">Save</button>
                                                                </div>
                                                            </div>
                                                        </form>


                                                    </div>
                                                @endforeach

                                            </div>
                                        </div>
                                        <!-- /.card -->
                                    </div>

                                </div>
                                <!-- /.Media -->

                                <!-- /.Media  end-->
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
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
@endsection


@section('css')
    {{-- <link rel="stylesheet" href="{{ URL::asset('assets/admin/css/custom/content.css') }}">  --}}
    <!-- summernote -->
    <link rel="stylesheet" href="{{ URL::asset('assets/admin/plugins/summernote/summernote-bs4.min.css') }}">
@endsection
@section('js')
    <script src="{{ URL::asset('assets/admin/js/custom/validate.js') }}"></script>
    <script src="{{ URL::asset('assets/admin//plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script src="{{ URL::asset('assets/admin/js/custom/property.js') }}"></script>
    <script>
        $(function() {
            $('.textarea').summernote();

        });
    </script>
@endsection
