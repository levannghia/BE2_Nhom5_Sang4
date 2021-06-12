<!doctype blade.php>
<blade.php class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Farmstore - @yield('title')</title>
        <meta name="description" content="">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('\img\logo-icon.png')}}">
		
		<!-- all css here -->
        <link rel="stylesheet" href="{{asset('css\bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('css\plugin.css')}}">
        <link rel="stylesheet" href="{{asset('css\bundle.css')}}">
        <link rel="stylesheet" href="{{asset('css\style.css')}}">
        <link rel="stylesheet" href="{{asset('css\responsive.css')}}">
        <script src="{{asset('js\vendor\modernizr-2.8.3.min.js')}}"></script>
    </head>
    <body>
        @include('partial.header')
        @yield('content')
        @include('partial.footer')
        @yield('script')
    </body>
</blade.php>
