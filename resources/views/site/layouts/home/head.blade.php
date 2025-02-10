<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    @foreach ($mainarr['headerlist'] as $headrow)
        {{ Str::of($headrow['value1'])->toHtmlString() }}
    @endforeach
    <link href="{{ $mainarr['favicon'] }}" rel="icon">
    <title>
        {{ $mainarr['title'] }} @yield('page-title')
    </title>

    <link href="{{ url('assets/site/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- إضافة Bootstrap Icons -->
    <link href="{{ url('assets/site/bootstrap/bootstrap-icons/font/bootstrap-icons.css') }}" rel="stylesheet">

    <link href="{{ url('assets/site/css/owl.carousel.min.css') }}" rel="stylesheet">

    <link href="{{ url('assets/site/css/custom/style.css') }}" rel="stylesheet">
    @if (!Auth::guard('client')->check())
        <link href="{{ url('assets/site/css/custom/home.css') }}" rel="stylesheet">
    @else
        @if (Auth::guard('client')->user()->code)
            <link href="{{ url('assets/site/css/custom/home.css') }}" rel="stylesheet">
        @endif
    @endif
    <link href="{{ url('assets/site/bootstrap/bootstrap-slider.css') }}" rel="stylesheet">

    <link href="{{ url('assets/site/css/custom/custom-owl.css') }}" rel="stylesheet">


    <!-- Custom styles -->
    @yield('cssbefor')

    @yield('css')
    <link href="{{ url('assets/site/bootstrap/bootstrap-datepicker.min.css') }}" rel="stylesheet">
</head>
