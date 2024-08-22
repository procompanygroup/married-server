<!DOCTYPE html>
@if ($defultlang->code=='ar')
<html lang="ar" dir="rtl">
  @else
  <html  >
@endif

  @php
      $sitedataCtrlr=new App\Http\Controllers\Web\SiteDataController();  
      $mainarr=$sitedataCtrlr->FillStaticData();
      
    // $f_menu=  $sitedataCtrlr->getbycode($defultlang->id,['footer-menu']);
    //  $h_menu=  $sitedataCtrlr->getbycode($defultlang->id,['header']);


    // $mainmenuarr=$sitedataCtrlr->getmenubyloc('main-menu');
     //$footermenuarr=$sitedataCtrlr->getmenubyloc('footer-menu');
  
    @endphp
  
  @include('site.layouts.home.head') 
  @include('site.layouts.home-signed.header') 
  @yield('content')
  @include('site.layouts.home.footer')
 
 
</html>
