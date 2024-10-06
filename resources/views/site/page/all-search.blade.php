@extends('site.layouts.home-signed.layout')
@section('content')
    <div class="container-fluid mt-3 pt-3">
        <div class="row">
            <!-- القسم الجانبي -->
            @include('site.content.profile-sidebar')

            <!-- قسم تعديل البيانات -->
            <section class=" content-sec col-lg-7 col-md-6">
                     <div class="page-head p-3 ">
                      @if ($client->gender == 'male')
                    <h3>البحث عن زوجة</h3>
                    @else
                    <h3>البحث عن زوج</h3>
                    @endif
                </div>
 
 
                <div class="accordion" id="accordionExample">
                    <div class="card">
                      <div class="card-header table-head " id="headingOne">
                        <h2 class="mb-0">
                          <a class="btn    btn-block text-right"  data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                           بحث بإسم المستخدم
                          </a>
                        </h2>
                      </div>
                  
                      <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body">                           
                            @include('site.page.sub-all.name-search')                        
                        </div>
                      </div>
                    </div>
                    <div class="card">
                      <div class="card-header table-head" id="headingTwo">
                        <h2 class="mb-0">
                          <a class="btn   btn-block text-right collapsed"   data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                          بحث سريع
                          </a>
                        </h2>
                      </div>
                      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="card-body">
                            @include('site.page.sub-all.quick-search') 
                           
                        </div>
                      </div>
                    </div>
                    <div class="card">
                      <div class="card-header table-head" id="headingThree">
                        <h2 class="mb-0">
                          <a class="btn   btn-block text-right collapsed"   data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                           بحث متقدم
                          </a>
                        </h2>
                      </div>
                      <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                        <div class="card-body">
                            @include('site.page.sub-all.advance-search')
                          </div>
                      </div>
                    </div>

                    <div class="card">
                        <div class="card-header table-head" id="headingFour">
                          <h2 class="mb-0">
                            <a class="btn   btn-block text-right collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
                             بحث الي
                            </a>
                          </h2>
                        </div>
                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                          <div class="card-body">
                          
                              <form action="{{ url($lang,'ai-search') }}" id="ai-search-form" name="ai-search-form" method="post" autocomplete="off">
                              
                                  <div class="col-md-12 form-group">
                                      <p>البحث بالذكاء الاصطناعي</p>
                                  </div>
                                  <div>@csrf</div>
                                  <input type="hidden" name="type" value="ai">
                                  <div class="submit-block text-center col-md-12">
                                      <button type="submit" class="btn btn-lg btn-primary btn-submit" id="btn-ai-search">بحث</button>
                                  </div>
                                  
                              </form>
 
                          </div>
                        </div>
                      </div>
                  </div>
 
               
            </section>
        </div>
    </div>


@endsection
@section('js')
    <script>
        // var fail_msg = "لم يتم الحفظ";
        var lang = "{{ $lang }}";

        var cityurl = "{{ url('cities', 'ItemId') }}";
        var selcity = "";
        var checkmailurl = "{{ url('checkmail') }}";
        var nowyear = "{{ $nowyear }}";
        var token = '{{ csrf_token() }}';
        var success_msg = "تم الحفظ بنجاح";
        var fail_msg = "لم يتم الحفظ";
        $(function() {
          @include('site.page.sub-all.count-alert') 

        });
    </script>
    <script src="{{ url('assets/site/js/sweetalert.min.js') }}"></script>
    <script src="{{ url('assets/site/js/custom/validate.js') }}"></script>
    <script src="{{ url('assets/site/js/custom/advanec-search.js') }}"></script>

    <script src="{{ url('assets/site/bootstrap/jquery.mCustomScrollbar.concat.min.js') }}"></script>
@endsection
@section('css')
    <link href="{{ url('assets/site/bootstrap/jquery.mCustomScrollbar.min.css') }}" rel="stylesheet">
    <link href="{{ url('assets/site/css/custom/adv-srch.css') }}" rel="stylesheet">
    <link href="{{ url('assets/site/css/custom/all-srch.css') }}" rel="stylesheet">
    
    <link href="{{ url('assets/site/css/custom/slide-range.css') }}" rel="stylesheet">
@endsection
