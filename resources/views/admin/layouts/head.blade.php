<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">   
  <title>لوحة التحكم  | @yield('page-title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
  
<link rel="icon" href="{{$mainarr['favicon']}}" type="image/x-icon"/>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ url('assets/admin/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
 
    <link rel="stylesheet" href="{{ url('assets/admin/dist/css/adminlte.rtl.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/admin/css/styles.css') }}">
@yield('css')
  </head>


 
 