<!DOCTYPE html>
<html lang="ar" dir="rtl">
  @php
  $sitedataCtrlr=new App\Http\Controllers\Web\SiteDataController();
$mainarr= $sitedataCtrlr->Fillfordash();
@endphp
@include('admin.layouts.head')
@include('admin.layouts.header')
  @include('admin.layouts.sidebar')

@yield('content')
@include('admin.layouts.footer')

</html>
