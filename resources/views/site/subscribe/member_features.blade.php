@extends('site.layouts.home-signed.layout')
@section('content')
    <div class="container-fluid mt-3 pt-3">
        <div class="row">
            <!-- القسم الجانبي -->
            @include('site.content.profile-sidebar')
            <!-- قسم تعديل البيانات -->
            <section class=" content-sec col-lg-7 col-md-6">

                <h3 class="footer-title">الميزات</h3>
                <!-- قسم تعديل  -->
                <div class=" bg-white p-4 rounded shadow  one-box ">
                    <section id="pricing" class="pricing-content section-padding">
                        <div class="container">
                            <div class="section-title text-center">

                                <p> الباقات الفعالة </p>

                            </div>

                            <div class="row text-center" style="display: flex;justify-content: space-evenly;">
  <div class="col-lg-12 col-sm-12 col-xs-12">
                            <table class="table table-striped table-hover">
 
  <tbody>
    <tr>
      <th scope="row " class="text-right" width="200px;">الباقة</th>
      @foreach($items as $item)
      <td>{{ $item->package->name }}</td>
      @endforeach      
    </tr>
    <tr>
      <th scope="row" class="text-right" width="200px;">تاريخ الانتهاء</th>
     
      @foreach($items as $item)
      <td>{{Carbon\Carbon::parse($item->end_date)->toDateString() }}</td>
      @endforeach   
    </tr>
    <tr>
      <th scope="row"  class="text-right" width="200px;">الرسائل</th>
      @foreach($items as $item)
      <td> {{ $item->chat_count }} / {{ $item->chat_count_remain }}</td>
      @endforeach       
    </tr>
    <tr>
        <th scope="row"  class="text-right" width="200px;">عمليات البحث </th>
        @foreach($items as $item)
      <td> {{ $item->search_count }} / {{ $item->search_count_remain }}</td>
      @endforeach 
        
      </tr>
       
      <tr>
        <th scope="row"  class="text-right" width="200px;">قائمة الاهتمام </th>
        @foreach($items as $item)
        <td> {{ $item->favorite_count }} / {{ $item->favorite_count_remain }}</td>
        @endforeach         
      </tr>
      <tr>
        <th scope="row"  class="text-right" width="200px;">التصفح الخفي</th>
        @foreach($items as $item)
        <td> @if ($item->hidden_feature == 1)
            <i class="bi bi-check lead text-success plan-check "></i>
        @else
            <i class="bi bi-x lead text-danger plan-check "></i>
        @endif</td>
        @endforeach        
      </tr>
      <tr>
        <th scope="row"  class="text-right" width="200px;">إظهار الصورة</th>
        @foreach($items as $item)
        <td> @if ($item->show_img == 1)
            <i class="bi bi-check lead text-success plan-check "></i>
        @else
            <i class="bi bi-x lead text-danger plan-check "></i>
        @endif</td>
        @endforeach  
        
      </tr>
      <tr>
        <th scope="row" class="text-right" width="200px;">عضو مميز</th>
        @foreach($items as $item)
        <td> @if ($item->special_member == 1)
            <i class="bi bi-check lead text-success plan-check "></i>
        @else
            <i class="bi bi-x lead text-danger plan-check "></i>
        @endif</td>
        @endforeach        
      </tr>
      <tr>
        <th scope="row"  class="text-right" width="200px;">تعديل الاسم</th>
        @foreach($items as $item)
        <td> @if ($item->edit_name == 1)
            <i class="bi bi-check lead text-success plan-check "></i>
        @else
            <i class="bi bi-x lead text-danger plan-check "></i>
        @endif</td>
        @endforeach           
      </tr>

  </tbody>
</table>
</div>
</div>
                         
                        </div><!--- END CONTAINER -->
                     
                       
                    </section>
                </div>
               
                <div class="submit-block text-center">
                    
                </div>

            </section>
        </div>
    </div>
@endsection
@section('js')
    <script>
        // var fail_msg = "لم يتم الحفظ";
        var lang = "{{ $lang }}";
        var token = '{{ csrf_token() }}';
        var success_msg = "تم الحفظ بنجاح";
        var fail_msg = "لم يتم الحفظ";
    </script>
    <script src="{{ url('assets/site/js/sweetalert.min.js') }}"></script>

    <script src="{{ url('assets/site/js/custom/subscribe.js') }}"></script>
@endsection
@section('css')
    <link href="{{ url('assets/site/css/custom/subscribe.css') }}" rel="stylesheet">
@endsection
