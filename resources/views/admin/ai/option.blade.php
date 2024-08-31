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
       
              <li class="breadcrumb-item active">  قيم المواصفات</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">  :قيم الصفة <span>{{ $property->name }}</span></h3>

          <div class="card-tools">
        
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
             
          </div>
        </div>
        <div class="card-body">
          <form class="form-horizontal" name="create_form" method="POST"
          action="{{ url('admin/ai/saverange') }}" enctype="multipart/form-data" id="create_form">
          @csrf
          <div class="form-group row">
            <label for="property_id" class="col-sm-3 col-form-label">القيمة الاساسية</label>
            <div class="col-sm-9">
                <select class="form-control " name="mainop_id" id="mainop_id" placeholder="* القيمة"
                    value="">
                    <option value="0">اختر القيمة</option>
                    @foreach ($List as $mainop)
                        <option value="{{ $mainop->id }}">{{ $mainop->name }} </option>
                    @endforeach
                </select>
                <span id="mainop_id-error" class="error invalid-feedback"></span>
            </div>
        </div>


        <div class="form-group row">
          <div class="col-sm-2 col-form-label"></div>
          <div class="col-sm-10">
              <button type="submit" name="btn_save"
                  class="btn btn-primary btn-submit">{{ __('general.save', [], 'ar') }}</button>
              <a class="btn btn-danger float-right "
                  href="{{ url('admin/option') }}">{{ __('general.cancel', [], 'ar') }}</a>
          </div>
      </div>

        <table id="example1" class="table table-bordered table-striped table-hover">
          <thead>
            <tr>
                <th>#</th>
              <th>القيمة</th>
               </tr>

            </thead>
            <tbody>
              <tr>
                <th scope="row"> </th>                   
              
              <td>   
         
                       </td>                
            </tr>
 
       
            </tbody>    
                          
              </table>
          </form>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
      
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
	 
 
  <!-- /.modal -->
@endsection

@section('js')
 <!-- DataTables -->
<script src="{{ URL::asset('assets/admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ URL::asset('assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ URL::asset('assets/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ URL::asset('assets/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/admin/js/custom/ai.js')}}"></script>
<!-- page script -->
<script>

  var filltableurl="{{url('admin/ai/optionrange', 'itemId')}}"
  $(function () {
    $("#example1").DataTable({
      "paging": true,
      "responsive": true,     
      "info": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
    
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
@endsection

 